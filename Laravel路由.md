### Laravel路由
#### 1. 基础方式：一个url+一个闭包

```
 Route::get("user", function(){
	 return 'hello user'
 })
```
- 定义在web.php中的路由，属于web中间件组下，提供会话状态和CSRF保护等
- 定义在api.php中的路由，属于api中间件组下，是无状态的，并且默认会在路由前面加上`/api`前缀，可以通过修改`RouteServiceprovider`这个类更改
#### 2. 可使用的路由方法

    Route::get($url,$callback)
    Route::post($url,$callback)
    Route::put($url,$callback)
    Route::delete($url,$callback)
    Route::patch($url,$callback)
    Route::options($url,$callback)
想要同时响应多个类型可以使用patch或者all

    Route::match(['get','post'],"/super",function(){
    return "text"
    })
    Route::any("/super",function(){
	return "text1"
	})
#### 3. csrf验证
post,put,delete请求的时候应该带上csrf不然是无法发起请求的

    <form action="/text" method="POST">
    @csrf
    </form>
#### 4.  重定向路由

    Route::redirect("/super","/rest",301)
    Route::permanentRedirect("rr","ee")
    
 默认的状态码是302，可以通过第三个参数自定义状态 eg:301
 也可以通过permanentRedirect,返回301
#### 5. 路由携带参数

    Route::get("/user/{id?}",function($id){
		    return "user".$id    })
携带的参数要通过{}中，如果自定义参数在参数的名字后面加个?，默认值为1
#### 6. 正则判断路由

    Route::get("/text/{id}/{name}",function($id,$name){
		    return $id $nam
    })->where(['id'=>'[0-9+]','name'=>'[a-z]+'])
#### 7.全局约束
可以再`RouteServiceProvider` 的`boot`方法中定义

    public function boot()
    {
        //
        Route::pattern("name",'[a-z]+');
        parent::boot();

    }
#### 8. 路由组和中间件

    Route::middleware(["first","second"])->group({
    //  会顺序执行中间件first，second
	    Route::get("ttt","UserController@index")
    })
    Route::namespace('Admin')->group(function () {
    // 在 「App\Http\Controllers\Admin」 命名空间下的控制器
    })
#### 9. 路由前缀

    Route::prefix("admin")->group(function(){
    //路由组下所有的路由都会加上前缀
    //admin/text
	    Route::get("/text","UserController@text")
    })
#### 10. 可以直接参数返回模型的实例（隐式绑定）

    Route::get('api/users/{user}', function (App\User $user) {
    return $user->email;
    });
    
####    11. 自定义参数

    public function getRouteKeyName()
    {
	    return 'slug';
    }
如果不想以id为参数，可以重写模型中额getRouteKeyName()方法
#### 12. 显式绑定
在RouteServiceProvider的boot方法中修改

    public function boot()
    {
	    parent::boot();
	    Route::model('user', App\User::class);
    }
    Route::get('profile/{user}', function (App\User $user) {
    //});
    
   我们已经将所有 {user} 参数绑定至 App\User 模型
####    13. 限流路由

    Route::middleware('throttle:60,1')->group(function(){
	    Route::get("/tt"."TtController@index")
    })
第一个参数为路由的的次数，第二个为参数为时间，每分钟60次






