<?php
/**
 * 百度翻译模块处理程序
 *
 * @author Yoby
 * @url http://bbs.we7.cc/
 */
defined('IN_IA') or exit('Access Denied');

class Yoby_fanyiModuleProcessor extends WeModuleProcessor {

	public function respond() {
		$keyword= $this->message['content'];
			if(!$this->inContext){
		$string = '翻译模式已进入,自动识别8种语言,输入[退出]二字即可结束此模式';
		$this->beginContext();
	}else{
		$string = '';
		$string .="原文:".$keyword."\n";
		$yuan = $this->translate($keyword,'auto','dan');
		$yuan = $yuan["from"];
	if($yuan!="zh"){
	$c = $this->translate($keyword,'auto','zh');
	$string .="中文:".$c['c']."\n";}
	if($yuan!="en"){
		$c =$this->translate($keyword,'auto','en');
	$string .="英语:".$c['c']."\n";}
	if($yuan!="jp"){
		$c =$this->translate($keyword,'auto','jp');
	$string .="日语:".$c['c']."\n";}
	if($yuan!="kor"){
		$c =$this->translate($keyword,'auto','kor');
	$string .="韩语:".$c['c']."\n";}
	if($yuan!="ru"){
		$c =$this->translate($keyword,'auto','ru');
	$string .="俄语:".$c['c']."\n";}
	if($yuan!="fra"){
		$c =$this->translate($keyword,'auto','fra');
	$string .="法语:".$c['c']."\n";}
	if($yuan!="spa"){
		$c =$this->translate($keyword,'auto','spa');
	$string .="西班牙语:".$c['c']."\n";}
	if($yuan!="yue"){
		$c =$this->translate($keyword,'auto','yue');
			$string .="粤语(繁体):".$c['c'];}
			$string .="\n(输入退出二字就能离开此模式)";
	}
	 if($keyword == '退出'){
             $this->endContext();
             $string = '你已经退出了翻译功能';
             }
	
 return $this->respText($string);

	}

public function translate($query, $from, $to)
{
    $args = array(
        'q' => $query,
        'appid' =>$this->module['config']['aid'],
        'salt' => rand(10000,99999),
        'from' => $from,
        'to' => $to,

    );
    $args['sign'] = $this->buildSign($query,$this->module['config']['aid'], $args['salt'], $this->module['config']['ak']);
    $ret = $this->call("http://api.fanyi.baidu.com/api/trans/vip/translate", $args);
    $ret = json_decode($ret, 1);
    return array(
    'from'=>$ret['from'],
    'to'=>$ret['to'],
    'c'=>$ret['trans_result'][0]['dst']
    ); 
}

//加密
public function buildSign($query, $appID, $salt, $secKey)
{/*{{{*/
    $str = $appID . $query . $salt . $secKey;
    $ret = md5($str);
    return $ret;
}/*}}}*/

//发起网络请求
public  function call($url, $args=null, $method="post", $testflag = 0, $timeout = 10, $headers=array())
{/*{{{*/
    $ret = false;
    $i = 0; 
    while($ret === false) 
    {
        if($i > 1)
            break;
        if($i > 0) 
        {
            sleep(1);
        }
        $ret = $this->callOnce($url, $args, $method, false, $timeout, $headers);
        $i++;
    }
    return $ret;
}/*}}}*/

public function callOnce($url, $args=null, $method="post", $withCookie = false, $timeout = 10, $headers=array())
{/*{{{*/
    $ch = curl_init();
    if($method == "post") 
    {
        $data = $this->convert($args);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_POST, 1);
    }
    else 
    {
        $data = $this->convert($args);
        if($data) 
        {
            if(stripos($url, "?") > 0) 
            {
                $url .= "&$data";
            }
            else 
            {
                $url .= "?$data";
            }
        }
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if(!empty($headers)) 
    {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    if($withCookie)
    {
        curl_setopt($ch, CURLOPT_COOKIEJAR, $_COOKIE);
    }
    $r = curl_exec($ch);
    curl_close($ch);
    return $r;
}/*}}}*/

public  function convert(&$args)
{/*{{{*/
    $data = '';
    if (is_array($args))
    {
        foreach ($args as $key=>$val)
        {
            if (is_array($val))
            {
                foreach ($val as $k=>$v)
                {
                    $data .= $key.'['.$k.']='.rawurlencode($v).'&';
                }
            }
            else
            {
                $data .="$key=".rawurlencode($val)."&";
            }
        }
        return trim($data, "&");
    }
    return $args;
}/*}}}*/

}