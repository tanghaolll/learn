# <p align="center">源码安装php 和 swoole</p>
### 一. 安装php
1. 登陆官网下载最新php  [php最新版本](http://www.php.net/)
2. 解压源码包 tar `-xzvf  [源码包]`
3. 进入解压后的php目录 ，使用 `./configure --prefix=php安装目录` 进行编译
4. `make`
5.  可以检测一下 `make test`
6.  `make install`
7.  进入php安装目录，`.\binb\php -m` 可以查看安装的php扩展


安装注意事项：
1. 安装前一定要确保有：`gcc autoconfig`
2. 安装完成后需要去源码包，把`php.ini-development` 或者`php.ini-production` 复制到你的php/etc下面
3. 命令 `php -i | grep php.ini` 可以看到执行的php.ini文件的路径



### 二.安装swoole
1. 在swoole的安装包，执行`php\bin\phpize` 生成configure文件
2. `. /configure --with-php-config=/usr/local/php/bin/php-conf` 找到属于哪个php
3. `make`
4. `make install`
5. 修改`php.ini`配置文件增加swoole扩展


###三. 安装redis
1. 下载redis研所包
2. make
3. 进入redis/src目录 执行 ./redis-server 开启redis服务
4. 使用异步redis 需要一个redis包 [hiredis](https://github.com/redis/hiredis)
5. make
6. make install
7. ldconfig
8. 从新编译swoole `.\configure --with-php-config=/usr/local/php/bin/php-conf  --enable-async-redis`
9. make
10. make install
11. 查看异步redis是否成功 `php --ri swoole`