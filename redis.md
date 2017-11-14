# redis安装操作

- 安装地址:https://github.com/dmajkic/redis/downloads
下载对应的版本

- 在cmd下切换到安装目录运行命令:redis-server.exe redis.conf

-  另开一个cmd,切换到安装目录下运行:redis-cli.exe -h 127.0.0.1 -p 6379
测试代码

~~~
set test helloword
get test
~~~

- 下载http://windows.php.net/downloads/pecl/releases/

- 将php_redis.dll放入php的ext文件夹中，然后再php.ini添加代码

~~~
php_igbinary.dll
extension=php_redis.dll
~~~

- 测试

~~~
$redis = new redis(); 
$result = $redis->connect('127.0.0.1', 6379); 
var_dump($result); //结果：bool(true) 

if (!(extension_loaded('redis'))){
	echo 'PHP 未安装 redis 扩展';
	}else{
   echo "已安装redis";
  }
~~~