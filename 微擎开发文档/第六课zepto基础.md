### zepto核心基础
>遍历数组
~~~
$.each([1,2,4,5,6],function(t,n){
aa[t].value=n;
});
~~~
>选择
~~~
var ss=[];
var c = $("#q option:selected").each(function(){ss.push($(this).val())});

var dd = $('input[name="d"]:checked').val(); 单选

var dd=[];$('input[name="d"]:checked').each(function(){dd.push($(this).val())});

~~~
>dom与zepto转换
~~~
var dom = $("#ss")[0]; dom
var z= $(document.getElementById("id"));
~~~
>data
~~~
var data = $('#data').data('title');获取
$('#data').removeData('x'); 移除
$('#data').data('x',{"qq":"89"});设置
~~~
>元素操作
~~~
$('<li>new list item</li>').appendTo('ul'); 添加到ul内部
$('ul').append('<li>new list item</li>');同上

$('ul').after("<p>你好</p>") ul之后
$('ul').before('<p>你好</p>') 外部之前

 $('ul').children('*:nth-child(2n)').css('color','red');//偶数行设置红色
~~~ 
>获取设置属性
~~~
$("#q").attr("href","http://www.x.com");//添加属性
var q = $("#q").attr("id");//读取
$("#q").attr("id",null);//删除
var q = $("#q").attr({"href":"#","data-sex":"男",});//多个属性
~~~