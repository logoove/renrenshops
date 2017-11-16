<?php
global $_W;
if (!function_exists('dump')) {
function dump($arr){
	echo '<pre>'.print_r($arr,TRUE).'</pre>';
}

}
function get($url){   
 $ch = curl_init();
 preg_match('/https:\/\//',$url)?$ssl=TRUE:$ssl=FALSE;
 curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_HEADER, 0);
if($ssl){
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
}
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$data  =  curl_exec($ch);
curl_close($ch);
return $data; 
}
function table_arr($table) {   
        $table = preg_replace("'<table[^>]*?>'si","",$table);  
        $table = preg_replace("'<tr[^>]*?>'si","",$table);   
        $table = preg_replace("'<td[^>]*?>'si","",$table);   
        $table = str_replace("</tr>","{tr}",$table);   
        $table = str_replace("</td>","{td}",$table);   
        //去掉 HTML 标记    
        $table = preg_replace("'<[/!]*?[^<>]*?>'si","",$table);  
        //去掉空白字符     
        $table = preg_replace("'([rn])[s]+'","",$table);
        $table = preg_replace('/&nbsp;/',"",$table);   
        $table = str_replace(" ","",$table);   
        $table = str_replace(" ","",$table);   
           
        $table = explode('{tr}', $table);   
        array_pop($table);   
        foreach ($table as $key=>$tr) {   
                $td = explode('{td}', $tr);   
                array_pop($td);   
            $td_array[] = $td;    
        }   
        return $td_array;   
}
function getbook1($key){
global $seturl,$setimg;
$url = "http://61.184.81.185:8000/searchbook2.ASP";
$arr = array(
'T1'	=>mb_convert_encoding($key,"gb2312",'utf-8'),
'B1'	=>mb_convert_encoding('检索',"gb2312",'utf-8'),
'D1'	=>mb_convert_encoding('题名',"gb2312",'utf-8'),
'R0'	=>'V5',
'RecRtn'	=>'7',
'D3'	=>mb_convert_encoding('题名',"gb2312",'utf-8'),
'R1'	=>'V2',
'R2'	=>'V3',
'R3'	=>'V8',
);
$arr =http_build_query($arr);
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POSTFIELDS,$arr);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);
$data = mb_convert_encoding($data,"utf-8",'gb2312');
preg_match('/上一页([\s\S]*?)<a/',$data,$page);
$pages = trim($page[1]);
$is = (empty($pages))?"no":"yes";
if($is=="no"){
return "搜索的图书不存在，请<a href='https://www.baidu.com'>留言</a>";
}else{

preg_match('/\<table ([\s\S]*?)<\/table\>/',$data,$match);
$matchs = preg_replace('/<p>/','',$match[0]);
$matchs = preg_replace('/<\/p>/','',$matchs);
$matchs = preg_replace('/<\/td>\s*<tr>/','</td></tr><tr>',$matchs);
$matchs = preg_replace('/<\/tr>\s*<\/tr>/','</tr>',$matchs);
preg_match_all("/<a href='(.*?)'/",$matchs,$arrs);
$urlarr =  $arrs[1];
$table = table_arr($matchs);
$news[] = array(
			'title' =>"第".$pages."页,回复p+数字翻页,注意不可大于总页数",
			'description' =>'',
			'picurl' => "../book/tu.jpg",
			'url' =>"https://www.baidu.com"
		);
foreach($table as $k=>$v){
    if($k>0){
    $urls = "http://61.184.81.185:8000/".$urlarr[$k-1];
		$news[] = array(
			'title' =>"题名:".trim($v[0])."\n责任者:".trim($v[1])."\n出版信息:".trim($v[2])."索书号:".trim($v[3])."\n藏馆:".trim($v[4])."\n借阅册次:".trim($v[5]),
			'description' =>'',
			'picurl' => '',
			'url' =>"../book/book.php?url=".base64_encode($urls)
		);
		}
		}
return $news;}
}
function getbook2($key,$p){
$url = "http://61.184.81.185:8000/searchbook2.ASP";
$arr =  array(
'tj3'	=>mb_convert_encoding($key,"gb2312",'utf-8'),
'tj1'	=>mb_convert_encoding('题名',"gb2312",'utf-8'),
'tj2'	=>mb_convert_encoding('题名',"gb2312",'utf-8'),
'R0'	=>'V5',
'RVal'	=>'7',
'curpage'	=>$p,
'R1'	=>'V2',
'R2'	=>'V3',
'R3'	=>'V8',
);
$arr =http_build_query($arr);
$data = get($url.'?'.$arr);

$data = mb_convert_encoding($data,"utf-8",'gb2312');
preg_match('/上一页([\s\S]*?)下一页/',$data,$page);
$pagek = strip_tags($page[1]);
$is = (empty($pagek))?"no":"yes";
if($is=="no"){
return "输入页数不存在";
}else{
$pages = trim($pagek);
preg_match('/\<table ([\s\S]*?)<\/table\>/',$data,$match);
$matchs = preg_replace('/<p>/','',$match[0]);
$matchs = preg_replace('/<\/p>/','',$matchs);
$matchs = preg_replace('/<\/td>\s*<tr>/','</td></tr><tr>',$matchs);
$matchs = preg_replace('/<\/tr>\s*<\/tr>/','</tr>',$matchs);
preg_match_all("/<a href='(.*?)'/",$matchs,$arrs);
$urlarr =  $arrs[1];
$table = table_arr($matchs);
$news[] = array(
			'title' =>"第".$pages."页,回复p+数字翻页,注意不可大于总页数",
			'description' =>'',
			'picurl' => "../book/tu.jpg",
			'url' =>"https://www.baidu.com"
		);
foreach($table as $k=>$v){
    if($k>0){
      $urls = "http://61.184.81.185:8000/".$urlarr[$k-1];
		$news[] = array(
			'title' =>"题名:".trim($v[0])."\n责任者:".trim($v[1])."\n出版信息:".trim($v[2])."索书号:".trim($v[3])."\n藏馆:".trim($v[4])."\n借阅册次:".trim($v[5]),
			'description' =>'',
			'picurl' => '',
			'url' =>"../book/book.php?url=".base64_encode($urls)
		);
		}
		}
return $news;

}
}


$weid = $_W['uniacid'];
$openid = $_W['openid'];
$keyword=trim($this->message['content']);
$key = mb_substr($keyword, 0,2,'utf-8');
$re = preg_match('/馆藏(.*)/', $keyword, $matchs);
if($key=="馆藏"){
$row = pdo_fetch("SELECT * FROM ".tablename('yoby_books')." WHERE weid = :weid and openid = :openid", array(':weid'=>$weid ,":openid"=>$openid));
if(empty($row)){
pdo_insert('yoby_books',array('weid'=>$weid,'openid'=>$openid,'book'=>$matchs[1]));
}else{
pdo_update('yoby_books',array('book'=>$matchs[1]),array('id'=>$row['id']));
}

if(!empty($matchs[1])){
$news  =  getbook1($matchs[1]);
if(is_array($news)){

return $this->respNews($news);

}else{
return $this->respText($news);
}
return $this->respNews($news);
}else{
return $this->respText("搜索图书名称不能为空,请输入[藏馆+图书名]");
}
}else{
$pp =trim(substr($keyword,1));
$row = pdo_fetch("SELECT * FROM ".tablename('yoby_books')." WHERE weid = :weid and openid = :openid", array(':weid'=>$weid ,":openid"=>$openid));
if(empty($row)){
return $this->respText("必须先查询到图书才能翻页");
}else{
$kk = $row['book'];
$str = getbook2($kk,$pp);
if(is_array($str)){
if(count($str)>1){
return $this->respNews($str);
}else{
return $this->respText('输入页数不存在');
}
}else{
return $this->respText($str);
}


}

}