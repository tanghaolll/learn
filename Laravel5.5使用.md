# <p align="center"> Laravel5.5使用</p>
## 常用的artisan 命令

|    命令                              | 说明                |
|:--------:                           | :--:                |
| php artisan serve                   | 启动服务             |
| php artisan migrate:install         | 生成数据迁移总表      |
| php artisan make:migration  [表]    | 生成数据迁移表        |
| php artisan migrate                 | 执行迁移             |
| php artisan make:controller [name]  | 创建控制器           |
| php artisan make:model  	  [name]  | 创建模型             |
| php artisan tinker                  | 进入tinker环境       |
| php artisan storage:link            | 映射storage文件夹    |
### DB 配置：

1. 在目录 ： `config\databases`
    通常直接配置根目录的环境变量  `.env`文件
2. 测试DB是否连接成功  `php artisan migrate:install`

### 路由配置：

1. 在目录  `route\web.php`
2. `Route::post('指向url','控制器@方法');`
3. 传递模型的路由 路由中的模型名与model中的相对应
    例如：

    `Route::get('/posts/{post}','\App\Http\Controllers\PostController@show');`

```
   public function show(Post $post) {
        return view('post/show',compact("post"));
    }
```

### 常用配置
1. 时区： 目录 `config/app.php`     ` 'timezone' => 'Asia/shanghai',`
2. 翻译文件 ： 目录 `config/app.php`   `'locale' => 'zh'`,
	建立中文翻译目录  `resours/lang/zh`


###  模板配置：
1. 目录: `resource\view`
2. layout :
   主模板文件： `main.blade.php`  包含其他模板内容 :`@yield("content")`   
                          引入主模板的其他部分 `include("layout.名字")` 
   其他模板文件： `index.blade.php`  继承主模板文件 `@extends("layout.main")`          
                              被包含模板内容 `@section("content")   内容   @endsection` 
3. 渲染变量：  ` compact("")`
4.   循环：  `@foreach($post as $value)`  `@endforeach`
5. `laravel`  日期返回的类型都是:  `carbon` 
 [ 修改样式官方AP](https://carbon.nesbot.com/docs/)
6.  `str_limit("$content",100,'...')` 截取多少字符串，多余用第三个参数显示
7.  表单提交生成token   `{{csrf_field()}}`
8.  解析html标签  `{!!变量!!}`
9.  AJAX获取token的办法： `<meta name="csrf-token content="{{csrf_token()}}">`
	获取方式： `$('meta[name="csrf-token"].attr('content')')`
	
### 控制器
1. 数据显示 ` dd(request());`
2. 验证 `$this->vaildate($a,$b,$c)` 
 * $a 验证的数组   `request()`
 * $b 验证规则 

```
['title'=>'String|max:25|min:5|required',
 'content' => 'required|String|min:10']
```

验证数据库唯一：`unique:表，字段`
  * $c 返回的错误信息  `['title.min' => "必须大于10个字符"]`
验证失败返回 `$error->all()` 方法

 
 
### 模型
model 默认表名后面加s，如需设置，`protected $table = 表名`
插入数据`create()`方法，需要在`model`中设置
* `$fillable`允许插入字段或者
* `$guarded`不允许插入字段

### 数据填充：
1. 目录：`database\factories`
2. 执行填充，先进入`tinker环境`   第二步  `factory(App\model:class,10)->make;`
   最后写入数据库  `factory(App\model:class,10)->create;` 
[Faker GIT地址](https://github.com/fzaninotto/Faker)

###    分页
1. 使用自带的的分页，只需调用 `paginate(7)` 方法即可
    例如:   ` $posts = Post::orderby("created_at","desc")->paginate(6);`
    页面渲染只有  `{{$posts->links()}}`                 

### 文件上传
1. .默认会指向  `storage\app`  需要映射 `public\storage`
2. 修改 `config\filesystems.php`  将default指向public
3. 执行 `php artisan storage:link`  
4. 这是`public \storage ` 指向了 `storage\app\public`   
5. 依赖注入上传文件
 
```
public function imageUpload(Request $request){
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/' . $path);
    }
```



