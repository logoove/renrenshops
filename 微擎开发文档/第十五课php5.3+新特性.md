**const 关键字可用来在类外定义常量 5.3**
const HI="定义常量另一种方法";
**nowdoc传递一段代码不解析变量,类似heredoc5.3**
~~~
$str = <<<'EOD'
这里可以是代码$qq不解析
EOD;
echo $str;
~~~
**命名空间5.3**
~~~
namespace A;
class B{

}
$c = new \A\B();
~~~
**短数组5.4**
~~~
$arr = ["key" => "value", "key2" => "value2"];
$arr = [1,2,3,4];
~~~
**函数返回数组5.4**
myfunc()[0];
**实例化访问类成员5.4**
(new Foo)->bar();
**json不转换中文5.4**
json_encode(array("中文"), JSON_UNESCAPED_UNICODE);
**函数中传递引用**
~~~
function goo(&$a) {
    return $a = 100;
}
$a = 3;
echo goo($a);//输出100
~~~