### ajax
>POST返回默认json,html,jsonp,xml,text
~~~
$.post("1.php",{a:1,b:"2"},function(res){
alert(JSON.stringify(res));
},'json');
~~~
>GET
~~~
$.get("1.php",{a:1,b:"2"},function(res){
alert(JSON.stringify(res));
},'json');
$.get("1.php",function(res){
alert(JSON.stringify(res));
});
JSONP写法
$.getJSON("1.php?callback=?",{"data":1}, function(res) {
  alert(JSON.stringify(res));
    });
$.getJSON("1.php?callback=?", function(res) {
  alert(JSON.stringify(res));
    });    
~~~
>ajax
~~~
$(document).on('ajaxBeforeSend', function(e, xhr, options){
//请求前每次会执行
});
$.ajax({
        type:'POST',//POST,默认GET
        url:'1.php',
        data:{name:"12"},
        dataType:'json',//json jsonp xml html text
        timeout:15000,//0不超时
        success:function(data){

},
        error:function(xhr,type){
            alert("ajax出错了")
        }
    });
~~~
