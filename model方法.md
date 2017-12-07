m("user") 

~~~
m("user")->getOpenid();//获取openid 

m("user")->getInfo();//获取用户信息 

m("user")->followed($openid);//判断某用户是否关注本公众号 
~~~
m('util')

~~~
m('util')->getExpressList('youshuwuliu','518266033534'); //查询物流信息,返回信息,第一个是物流代码,第二个是单号
Array
(
    [0] => Array
        (
            [time] => 2017-09-26 07:12:33
            [step] => 签收
        )

    [1] => Array
        (
            [time] => 2017-09-25 16:28:50
            [step] => 快件已签收，签收人是【图片签收】
        )
)
m('util')->getIpAddress();//获取地址信息 返回格式JSON
Array
(
    [ret] => 1
    [start] => -1
    [end] => -1
    [country] => 中国
    [province] => 江苏
    [city] => 苏州
    [district] => 
    [isp] => 
    [type] => 
    [desc] => 
)
m('util')->checkRemoteFileExists('http://www.baidu.com');//检测网站状态是否200,是返回true,否返回false

 params ：lat1 纬度1； lng1 经度1； lat2 纬度2； lng2 经度2； len_type （1:m or 2:km);
m('util')->GetDistance($lat1, $lng1, $lat2, $lng2, $len_type = 1, $decimal = 2);//根据经纬度计算距离

~~~
m('Message')

~~~
用户openid,模板id,模板数组,跳转连接
m('Message')->sendTplNotice($touser, $template_id, $postdata, $url = '');//发送模板消息,无48小时之内与公众号互动过限制
用户openid,url跳转地址
m('Message')->sendTexts($openid, $content, $url = '', $account = NULL)//发送客服消息 48小时内有互动
m('Message')->sendImage($openid, $mediaid);//发送图片 参数2是媒体id
m('Message')->sendNews($openid, $articles, $account = NULL)//图文消息

~~~
m('express')->getExpressList();获取快递列表
