## <p align="center" >swoole的使用</p>
### 一.TCP
#### 1 . 建立tcp server
查看进程数：`ps aft | grep tcp.php` 
查看监听的端口 `netstat -anp | grep 9501 `
测试服务端  `telnet 127.0.0.1 9501`

```
<?php
//创建Server对象，监听 127.0.0.1:9501端口
$serv = new swoole_server("127.0.0.1", 9501);
$serv->set([
    "worker_num" => 5, //worker进程数
    "max_request" => 10000
]);
//监听连接进入事件

$serv->on('connect', function ($serv, $fd,$reactor_id) {
echo "Client: {$reactor_id} - {$fd}-Connect.\n";
});

//监听数据接收事件

$serv->on('receive', function ($serv, $fd, $from_id, $data) {
$serv->send($fd, "Server:{$from_id} - {$fd} ".$data);
});

//监听连接关闭事件
$serv->on('close', function ($serv, $fd) {
echo "Client: Close.\n";
});

//启动服务器
$serv->start();
```

#### 2.建立tcp client

```
<?php
//连接swoole tcp 服务
$client = new swoole_client(SWOOLE_SOCK_TCP);
if (!$client->connect("127.0.0.1", 9501)){
    echo "连接失败";
    exit;
}
//php cli内置常量
fwrite(STDOUT,"请输入消息");
$msg = trim(fgets(STDIN));

//发送消息给tcp server
$client->send($msg);

//接受server消息
$result  = $client->recv();
echo $result;
```

### 二. Http Server 服务


```
<?php
$http = new swoole_http_server("0.0.0.0",8811);
$http->set(
    [
        'enable_static_handler' => true,
        //静态资源路径
        'document_root' => "/home/wwwroot/demo.victor-t.cn/data"
    ]
);
$http->on("request",function ($request,$response){
    /*print_r($request->get);*/
    $response->cookie("victor",'xssssss',time() + 1800);
    $response->end("sss".json_encode($request->get));
});
$http->start();
```


### 三. websocket
1. websocket : 基于tcp的一种网络协议，实现了浏览器和服务器之间全双工的通信，允许服务器主动给客户端发送消息

```
<?php
class Ws {
    CONST HOST = "0.0.0.0";
    CONST PORT = 8812;
    public $ws = null;
    public function __construct (){
        $this->ws =  new Swoole\WebSocket\Server("0.0.0.0", 8812);
        $this->ws->on("open",[$this,'onOpen']);
        $this->ws->on("message",[$this,'onMessage']);
        $this->ws->on("close",[$this,'onClose']);
        $this->ws->start();
    }

    /**
     * @param $ws
     * @param $request
     *  监听ws连接事件
     */
    public function onOpen($ws,$request){
        var_dump($request->fd);
    }

    /**
     * @param $ws
     * @param $frame
     * 监听ws消息事件
     */
    public function onMessage($ws,$frame){
        echo "ser-push-message:{$frame->data}\n";
        $ws->push($frame->fd,"server-push:".date("Y-m-d H:m:s")) ;
    }

    /**
     * @param $ws
     * @param $fd
     * 监听关闭事件
     */
    public function onClose($ws,$fd){
        echo "clientid:{$fd}\n";
    }

}
$obj = new Ws();
```






