定位
~~~
.c{
	position: absolute;//脱离文档 绝对定位
	relative 相对定位
	fixeld 不滚动
	static 默认
	z-index: 1;层关系
	top: auto;
	left: auto;
	right: auto;
	bottom: auto;
}
~~~
布局
~~~
.c{
	display:inline;默认内联元素
	none 隐藏
	block 块元素
	inline-block 内联块元素
	
	float:none;不浮动
	left right
	
	clear: both;清除浮动
	
	visibility: visible;对象可视
	hidden对象隐藏
	
	overflow: visible;溢出内容不作处理,可能超出容器
	hidden隐藏不出现滚动条
	scroll滚动
	auto溢出出现滚动,不溢出没有
	
	overflow-x: visible;
	overflow-y: visible;
	同上,表示水平方向和垂直方向
	
}
~~~
尺寸,支持像素 em 百分比等
~~~
.c{
	width: auto;
	12px   10%
	
	min-width: 0;
	max-width: none;没有最大宽度
	
	height: auto;
	min-height: 0;
	max-height: none;
}
~~~
内外补白
~~~
.c{
	margin: auto;可以负值
	margin-top: auto;上
	margin-bottom: auto;下
	margin-left: auto;
	margin-right: auto;
	padding: 1px;不可以负值,也没有自动
	padding-bottom:1%;
	padding-top: inherit;
	padding-left: inherit;
	padding-right:1px;
	
}
~~~
边框
~~~
.c{
	border: 1px solid #fff;
	
	border-width: 1px;
	border-style: solid;实线
	none;没有边框,默认值
	dotted;点状
	dashed;虚线
	
	border-color: #fff;
	
	border-top: 1px solid #fff;
	border-bottom: !important;
	border-left: !important;
	border-right: !important;	
}
~~~
背景
~~~
.c{
	background:url(test1.jpg) no-repeat scroll 0% 0%;
	
	background-color: transparent;默认透明
	background-image: none;无图
	url(1.img)
	background-repeat: repeat;平铺
	no-repeat 不平铺
	repeat-x ;repeat-y 横纵平铺
	
	background-attachment: scroll; 滚动
	fixed;固定
	
	background-position: 0% 0%;
	left center right top bottom;
	
	background-origin: padding-box;背景从content显示
	border-box;从border区域开始
	padding-box;从padding开始
	
	background-clip: border-box;从padding向外剪裁
	border-box;从border开始,不含
	content-box;从content开始剪切
	text;从内容开始
	
	background-size: auto;背景大小自动
	cover;等比缩放完全覆盖,会出容器
	contain;等比缩放宽高和容器相等,始终在容器内
}
~~~
颜色
~~~
.c{
	color: #FFF;文本颜色
	opacity: 1;1是不透明 0完全透明 取值0.0-1
}
~~~
字体
~~~
.c{
	font: 12px Simsun,arial,sans-serif;
	
	font-style: normal;字体正常
	italic;斜体
	font-weight: normal;正常相当于400
	bold 粗体相当于700
	bolder 特粗 相当于b strong
	
	font-size:12px;
	font-family: arial; 	
}
~~~
文本
~~~
.c{
	text-transform: none;
	capitalize;首字母大写
	uppercase;转换大写
	lowercase;转小写
	
	white-space: normal;空格处理默认
pre-wrap;不合并空白,边界处换行
	nowrap;强制同一行显示,合并多余空白,直到br
	
	word-break: normal;换行
	break-all;
	
	word-wrap: normal;
	break-word;边界处换行
	
	text-align: center;left;right;
	
	text-indent: 0;缩进
	
	vertical-align: baseline;
	sub;下标
	super;上标
	middle;居中
	
	line-height: normal;行高
	
}
~~~
列表样式
~~~
.c{
	list-style:disc outside none;
	list-style-image: none;不指定图像
	list-style-position: outside;文本以外
	inside;文本以内
	
	list-style-type: disc;实心圆
	circle;空心圆
	square;实心方块
	decimal;数字
	none;不使用	
}
~~~
表格样式
~~~
.c{
	border-collapse: collapse;合并边框
}
~~~
用户界面
~~~
.c{
	text-overflow: clip;文本溢出不显示...
	ellipsis;显示
	
	outline: none;轮廓样式无轮廓
	
	cursor: pointer;手 move移动
	支持url()
	
	box-sizing: content-box;盒子padding和border不包括在宽高内
	border-box;包含内;
	
	user-select:text;可以选择文本
	none;文本不能选择
}
~~~
选择
~~~
ul>li{
	//子选择器
}
ul li{
	//包含选择
}
p+p{
	//相邻选择
}
p~p{
	//兄弟选择
}
input[type="text"]{{
	//属性选择
}
a:link{
	
}
a:visited{
	
}
a:hover{
	
}
a:active{
	
}
a:focus{
	
}
ul li:first-child{
	//第一个
}
ul li:last-child{
	//最后一个
}
~~~