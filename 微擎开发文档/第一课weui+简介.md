## WeUI+简介

WeUI+是本书作者yoby,在微信官方weui0.44基础上,添加weui1.1开发而成的增强版weui,包含weui基本功能,另外增加更多组件,总共大小有上百个,采用最新zepto为基础库.

WeUI+使用方法非常简单,根据演示案例使用即可,照猫画虎,本书章节会逐渐介绍如何使用,让你更加爱上weui+.

[在线演示http://weixin.yoby123.cn/weui/](http://weixin.yoby123.cn/weui/)

[github下载 http://github.com/logoove/weui](http://github.com/logoove/weui)

#### 使用方法
~~~
<link rel="stylesheet" href="weuix.min.css"/>
<script src="zepto.min.js"></script>
~~~
只需要加载这两个文件即可,演示css加载三个文件是因为方便我开发调试,生产环境只需要加载weuix.min.css,这个文件已经包含所有css,相当于演示中weui.css,weui2.css,weui3.css.上面zepto.min.js包含的并非只有zepto,还包含很多插件,如果演示页面没有明确说明需要加载单个js,就说明已包含在内.

所以只需要上面两个文件,就可以使用weui+大部分功能.
~~~
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Hello world</title>
 <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
 <link rel="stylesheet" href="weuix.min.css"/>
<script src="zepto.min.js"></script>
</head>
<body ontouchstart  class="page-bg">
<div class="page-bd-15">
Hello World
</div>
</body>
</html>
~~~

这是一个最简单的例子



