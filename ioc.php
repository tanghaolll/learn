<?php
/*依赖注入*/

//通用接口
interface Message {
    public function seed();
}

/*发送邮件类*/

class seedEmail implements  Message
{
    public  function seed(){

        return '发送邮件';
        //TODO 邮件接口
    }

}

/*发送短信类*/

class smsEmail implements  Message
{
    public  function seed(){

        return '发送短信';
        //TODO 邮件接口
    }

}

/*订单类*/
class order
{
    protected $messager = '';
    public function __construct(Message $message)
    {
        $this->messager = $message;
    }
    public function seed_msg()
    {
        echo $this->messager->seed();
    }
}
$order = new order(new smsEmail);
$order->seed_msg();
/*--------------------------------end----------------------------*/



class DB{
    public function DB($arg1,$arg2){
        echo 'constructed!'.PHP_EOL;
    }
}

class FileSystem{
    public function FileSystem($arg1,$arg2){
        echo 'constructed!'.PHP_EOL;
    }
}

class Session{
    public function Session($arg1,$arg2){
        echo 'constructed!'.PHP_EOL;
    }
}
/*服务容器*/

class Container{
    public $bindings;
    public function bind($abstract,$concrete){
        $this->bindings[$abstract]=$concrete;
    }
    public function make($abstract,$parameters=[]){
        return call_user_func_array($this->bindings[$abstract],$parameters);
    }
}
/*服务注册（绑定）*/

$container=new Container();
$container->bind('db',function($arg1,$arg2){
    return new DB($arg1,$arg2);
});

$container->bind('session',function($arg1,$arg2){
    return new Session($arg1,$arg2);
});

$container->bind('fs',function($arg1,$arg2){
    return new FileSystem($arg1,$arg2);
});
/*容器依赖*/

class Writer{
    protected $_db;
    protected $_filesystem;
    protected $_session;
    protected $container;
    public function Writer(Container $container){
        $this->_db=$container->make('db',[1,2]);
        $this->_filesystem=$container->make('session',[3,4]);
        $this->_session=$container->make('fs',[5,6]);
    }
}

$writer=new Writer($container);
