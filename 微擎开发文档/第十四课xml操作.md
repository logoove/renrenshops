>解析xml文件,后两个参数解析CDATA使用
~~~
$xml = simplexml_load_file('xml.xml',"SimpleXMLElement",LIBXML_NOCDATA);
$xml=simplexml_load_string($note);解析字符串同上
~~~
attributes() 获取属性
