>cookie

 设置cookie,有效期60s,不写长期有效
`setcookie('var','100',time()+60)`
获取cookie
`$_COOKIE['']`
删除cookie,time()-1也可以
`setcookie('val','',0)`
>session

创建session
~~~
session_start();
$_SESSION['admin']=1;
~~~
删除一个
unset($_SESSION['admin'])
删除多个
$_SESSION = array();
销毁
session_destroy()