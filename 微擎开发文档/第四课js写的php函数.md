###js的php函数
>browser变量,浏览器,语言,是否wifi
~~~
 {"version":{"ie":false,"opera":false,"webKit":false,"firefox":true,"mobile":false,"ios":false,"android":false,"iphone":false,"ipad":false,"weixin":false},"language":"zh-cn","wifi",true}
~~~
>转换实体与还原
~~~
htmlencode(str)
htmldecode(str)
~~~
>时间
~~~
date() Y-m-d H:i:s返回带0 Y-n-j不带0
z一年中第几天要+1才正确
w星期0是周日 N 7是周日
D三个字母星期 l英语星期
 W周
F月份英语
L闰年判断
c带时区日期时间 r英文形式

time()返回php形式10位时间
strtotime()转换成时间戳 支持'06:08:59' "2014-2-3" "now"  "+1 day" "+1 week" "+2 days"
microtime()微秒返回 "0.992 1434963474" microtime().split(" ")[1]
~~~
>转换整形
~~~
intval(9.2,8) 转换成整形 第二个表示数据的进制 转换不了返回0
floatval(1.2) 浮点型 
~~~
>判断是否为空
~~~
empty()是否为空 0  false null ''  [] {} undefined
isset()是否赋值 undefined返回false
~~~
>编码解码url  编码解码base64
~~~
urlencode()
urldecode()
base64_encode()
base64_decode()
~~~
~~~
function_exists('alert') 检测函数是否存在
in_array(1, ['1', '2', '3']); 是否在数组中
range ( 0, 12 ); 生成数组 range( 'a', 'i' ); range( 0, 100, 10 );第三个参数步长
strip_tags("<div>111") 去除html
round(1.456,1) 四舍五入
rand(1,10) 生成随机数1-10 前后都包含
ceil(1.2) 进1
floor(3.555) 舍去法
strtolower()转大写
strtoupper()小写
ucfirst()首字母大写
base_convert(99,16,2) 进制之间转换
trim()去除多空格 中间的也去掉
utf8_encode(str)编码成utf8
utf8_decode(str)解码
preg_replace(/N/,"32","分数是N分")
strlen('1我2') 中文2个字符
strtrim(var) 去除多空格
timeline()时间线
strfind(string, find) 查找子字符串
json2str()   str2json()
setcookie('v',1,60)设置cookie 获取 默认60s
implode(',',[1,2,3]) 转换成字符串
explode(",","1,2,3") 分割成数组
strcut("我爱中国人",4,"...")  截取字符串汉字占两个 英文一个 
~~~
>cookie
~~~
setcookie( "foo" ); 获取
setcookie( "foo", "bar", 5 ); 5天过期
setcookie( "foo", false ); 删除
~~~
>检测变量
~~~
is_eq(str1,str2) 是否相等
is_num("1") 是否数字
is_phone("1") 是否手机号
is_qq()
is_id(str) 是否身份证
is_chinese(str) 是否中文
is_reg(str) //是否由字母和数字，下划线,点号组成.且开头的只能是下划线和字母
is_tel(str) 电话测试 校验普通电话、传真号码：可以“+”开头，除数字外，可含有“-”
is_ip(str) 是否IP
is_zipcode(str) 是否邮编
is_email(邮箱)
is_english(str) 是否英文
is_url(str) 是否url
is_int(1,0,100) 是否在0到100之间
is_float(1.2,1.1,1.9) 是否在1.1-1.9之间
is_http() 是否包含http或https
date_eq(strDate1,strDate2) 判断是否第一个日期大于第二个
~~~