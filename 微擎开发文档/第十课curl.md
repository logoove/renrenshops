~~~
$cookie = tempnam('./temp','cookie');//SAE_TMP_PATH


$ch=curl_init();

curl_setopt($ch, CURLOPT_URL,$url);

curl_setopt($ch, CURLOPT_REFERER, "http://www.chsi.com.cn/cet/ ");//来源

curl_setopt($ch, CURLOPT_HEADER, 0);//头部head不输出  默认

curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (iPhone; CPU iPhone OS 8_4 like Mac OS X)AppleWebKit/600.1.4 (KHTML, like Gecko) Mobile/12H143 MicroMessenger/6.3.9)');//设置浏览器

curl_setopt($ch,CURLOPT_COOKIEFILE, $cookie);//读取cookie

curl_setopt($ch, CURLOPT_POST, 1);//设置post数据

curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); //302跳转

curl_setopt($ch, CURLOPT_POSTFIELDS, $post);//进行post提交

curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//设置返回字符串不输出  *必须

curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);//保存cookie

$data  =  curl_exec($ch);//返回的字符串  *

curl_close($ch);//关闭

设置SSL支持 https开头必须
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
~~~