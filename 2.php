<?php
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
$url = "http://61.184.81.185:8000/searchbook2.ASP";
$arr = array(
'T1'	=>mb_convert_encoding($key,"gb2312",'utf-8'),
'B1'	=>mb_convert_encoding('检索',"gb2312",'utf-8'),
'D1'	=>mb_convert_encoding('题名',"gb2312",'utf-8'),
'R0'	=>'V5',
'RecRtn'	=>'9',
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
preg_match('/\<table ([\s\S]*?)<\/table\>/',$data,$match);
$matchs = preg_replace('/<p>/','',$match[0]);
$matchs = preg_replace('/<\/p>/','',$matchs);
$matchs = preg_replace('/<\/td>\s*<tr>/','</td></tr><tr>',$matchs);
$matchs = preg_replace('/<\/tr>\s*<\/tr>/','</tr>',$matchs);
$table = table_arr($matchs);
$news[] = array(
			'title' =>"第".$pages."页,回复数字翻页,注意不可大于总页数",
			'description' =>'',
			'picurl' => '',
			'url' =>''
		);
foreach($table as $k=>$v){
    if($k>0){
		$news[] = array(
			'title' =>"题名:".trim($v[0])."\n责任者:".trim($v[1])."\n出版信息:".trim($v[2])."索书号:".trim($v[3])."\n藏馆:".trim($v[4])."\n借阅册次:".trim($v[5]),
			'description' =>'',
			'picurl' => '',
			'url' =>''
		);
		}
		}
return $news;
}
function getbook2($key,$p){
$url = "http://61.184.81.185:8000/searchbook2.ASP";
$arr =  array(
'tj3'	=>mb_convert_encoding($key,"gb2312",'utf-8'),
'tj1'	=>mb_convert_encoding('题名',"gb2312",'utf-8'),
'tj2'	=>mb_convert_encoding('题名',"gb2312",'utf-8'),
'R0'	=>'V5',
'RVal'	=>'9',
'curpage'	=>$p,
'R1'	=>'V2',
'R2'	=>'V3',
'R3'	=>'V8',
);
$arr =http_build_query($arr);
$data = get($url.'?'.$arr);

$data = mb_convert_encoding($data,"utf-8",'gb2312');
preg_match('/上一页([\s\S]*?)<a/',$data,$page);
$is = (empty($page[1]))?:"no":"yes";
if($is=="no"){
return "输入页数不存在";
}else{
$pages = trim($page[1]);
preg_match('/\<table ([\s\S]*?)<\/table\>/',$data,$match);
$matchs = preg_replace('/<p>/','',$match[0]);
$matchs = preg_replace('/<\/p>/','',$matchs);
$matchs = preg_replace('/<\/td>\s*<tr>/','</td></tr><tr>',$matchs);
$matchs = preg_replace('/<\/tr>\s*<\/tr>/','</tr>',$matchs);
$table = table_arr($matchs);
$news[] = array(
			'title' =>"第".$pages."页,回复数字翻页,注意不可大于总页数",
			'description' =>'',
			'picurl' => '',
			'url' =>''
		);
foreach($table as $k=>$v){
    if($k>0){
		$news[] = array(
			'title' =>"题名:".trim($v[0])."\n责任者:".trim($v[1])."\n出版信息:".trim($v[2])."索书号:".trim($v[3])."\n藏馆:".trim($v[4])."\n借阅册次:".trim($v[5]),
			'description' =>'',
			'picurl' => '',
			'url' =>''
		);
		}
		}
return $news;}
}
dump(getbook1('数学'));	
dump(getbook2('数学',20));	