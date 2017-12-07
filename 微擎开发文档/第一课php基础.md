>流程控制,break终止 continue 跳过

~~~
if(expr){

}elseif(expr){

}else{

}

switch(val){
   case v1:
   			break;
	default:
    
}

while(expr){

}

do{

}while(expr)

for(expr1;expr2;expr3){

}

foreach($arr as   $k=>$v){

}

~~~

>特殊写法  

endif endfor endwhile endswitch endforeach
>逻辑运算

|| 或
&& 与
! 非
>引用全局变量
~~~
global $str;
~~~
>字符串定义
~~~
$is = "ok";
$str = <<<EOF
   my name $is Jiang Qihui!
EOF;
~~~
>传值和传引用
~~~
按值传递：函数范围内对值的任何改变在函数外部都会被忽略
按引用传递：函数范围内对值的任何改变在函数外部也能反映出这些修改
优缺点：按值传递时，php必须复制值。特别是对于大型的字符串和对象来说，这将会是一个代价很大的操作。按引用传递则不需要复制值，对于性能提高很有好处。
~~~
>控制错误@
~~~
@fn()
~~~
>GET和POST区别
~~~
get是发送请求HTTP协议通过url参数传递进行接收,而post是实体数据,可以通过表单提交大量信息.
~~~
>session和cookie区别
~~~
session:储存用户访问的全局唯一变量,存储在服务器上的php指定的目录中的（session_dir）的位置进行的存放
 cookie:用来存储连续訪問一个頁面时所使用，是存储在客户端，对于Cookie来说是存储在用户WIN的Temp目录中的。
两者都可通过时间来设置时间长短
~~~
>echo(),print(),print_r()区别
~~~
echo是PHP语句, print和print_r是函数,语句没有返回值,函数可以有返回值
print()只能打印出简单类型变量的值(如int,string)
print_r()可以打印出复杂类型变量的值(如数组,对象)
echo  输出一个或者多个字符串
~~~
>优化mysql
~~~
选择正确数据类型,设置合适的字段长度
优化查询语句,事务处理,建立索引
使用左右连接替代子查询
~~~
>include和require,include_once和require_once
~~~
require 出现错误停止运行
include 出现错误继续运行
include_once和require_once 有重复不会出错,只处理一次
一般选用 require_once
~~~
>常见状态
~~~
200 成功 404未找到   301跳转  401未授权
~~~