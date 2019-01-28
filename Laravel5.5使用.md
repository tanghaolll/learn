# <p align="center"> Laravel5.5使用</p>
## 常用的artisan 命令

|    命令                       | 说明                |
|:--------:                    | :--:                |
| php artisan serve            | 启动服务             |
| php artisan migrate:install  | 数据迁移             |
| php artisan make:controller  | 创建控制器           |

### DB 配置：

1. 在目录 ： `config\databases`
    通常直接配置根目录的环境变量  `.env`文件
2. 测试DB是否连接成功  `php artisan migrate:install`

### 路由配置：

1. 在目录  `route\web.php`
2. `Route::post('指向url','控制器@方法');`

###  模板配置：
1. 目录: `resource\view`
2. layout :
   主模板文件： `main.blade.php`  包含其他模板内容 :`@yield("content")`   
                          引入主模板的其他部分 `include("layout.名字")` 
   其他模板文件： `index.blade.php`  继承主模板文件 `@extends("layout.main")`          
                              被包含模板内容 `@section("content")   内容   @endsection` 
                    