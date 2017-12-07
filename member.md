### 会员操作

- 获取会员信息

~~~
 $arr= m('member')->getMember($openid);
$userinfo = m('member')->getInfo($openid);//同上功能
返回以下重要字段
uid 在mc_member中id也就是微擎的会员id
openid
realname 真名
mobile 手机号
credit1 积分
credit2 米额/余额
mobileverify 手机验证状态1是验证过
返回数组
~~~
- 积分,余额操作

~~~
 m('member')->setCredit($openid,'credit2',1);
第二个参数是credit1,credit2,表示积分,余额
第三个参数是增加或减少,负数是减,正数是加
无返回值
~~~

- 查询积分

~~~
$a = m('member')->getCredit($openid,'credit2');
返回积分/余额数值
$a = m('member')->getCredits($openid);
返回积分余额数组
~~~

- 检测是否注册

~~~
$a = m('member')->checkMember();
注册返回数组,openid
~~~
支付中获取openid
snsapi_userinfo 是用户信息
~~~
$wxuser = m('member')->wxuser($appid, $secret, $snsapi = 'snsapi_base', $expired = '600');
~~~

退米额

~~~
$mi//米额
$credits = m('member')->getCredit($openid, 'credit2');
if ($credits < $mi) {
            if ($_W['ispost']) {
                show_json(0, '米额不足,请充值');
            }
            else {
                message('米额不足，请充值', mobileUrl('goods',array('cate'=>28)), 'success'); // 线上购买地址
            }
        }
~~~