### Laravel中间件
#### 1.  创建中间件
`php artisan make：middleware name`会在`app\http\middleware`下面生成你的中间件文件

     public function handle($request, Closure $next)
    {
        if ($request->age <= 200) {
            return redirect('home');
        }

        return $next($request);
    }
#### 2. 前置后置中间件
- 前置

```
<?php
namespace App\Http\Middleware;
use Closure;
class BeforeMiddleware
{
    public function handle($request, Closure $next)
    {
        // 执行一些任务

        return $next($request);
    }
}
```

-  后置
   
```
  <?php
    namespace App\Http\Middleware;
    use Closure;
    class BeforeMiddleware
    {
	    public function handle($request, Closure $next)
	    {
	        // 执行一些任务
	
	        return $next($request);
	    }
    }
   
```
#### 3.定义全局的中间件
只需要在`app\http\kernel.php`中`$middleware`中为你的中间件添加一个名字

```
protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
    'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
    'can' => \Illuminate\Auth\Middleware\Authorize::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
    'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
];
```
#### 4. 中间件组
只需要在`app\http\kernel.php`中`$middlewareGroups`默认定义了web和api两种你可能用到的中间组，

    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];	
```
Route::get('/', function () {
    //
})->middleware('web');

Route::group(['middleware' => ['web']], function () {
    //
});
```
默认情况`RouteServiceProdiver`会将web中间件组分给`web.php`
可以使用` app/Http/Kernel.php` 文`件的 $middlewarePriority` 属性指定中间件优先级














