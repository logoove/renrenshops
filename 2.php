<?php
header("Content-Type:text/html;charset=UTF-8");
include "pdo/db.php";
/*
T1	%CA%FD%D1%A7
B1	%BC%EC%CB%F7
D1	%CC%E2%C3%FB
R0	V5
RecRtn	50
D3	%CC%E2%C3%FB
R1	V2
R2	V3
R3	V8
*/
//form http://61.184.81.185:8000/searchbook.ASP
$url2 = "http://61.184.81.185:8000/searchbook2.ASP";
$url3 = "http://61.184.81.185:8000/searchbook2.asp";
$arr = array(
'T1'	=>mb_convert_encoding('美术',"gb2312",'utf-8'),
'B1'	=>mb_convert_encoding('检索',"gb2312",'utf-8'),
'D1'	=>mb_convert_encoding('题名',"gb2312",'utf-8'),
'R0'	=>'V5',
'RecRtn'	=>'10',
'D3'	=>mb_convert_encoding('题名',"gb2312",'utf-8'),
'R1'	=>'V2',
'R2'	=>'V3',
'R3'	=>'V8',
);
$arr2 =  array(
'tj3'	=>mb_convert_encoding('美术',"gb2312",'utf-8'),
'tj1'	=>mb_convert_encoding('题名',"gb2312",'utf-8'),
'tj2'	=>mb_convert_encoding('题名',"gb2312",'utf-8'),
'R0'	=>'V5',
'RVal'	=>'10',
'curpage'	=>'2',
'R1'	=>'V2',
'R2'	=>'V3',
'R3'	=>'V8',
);
$arr2 =http_build_query($arr2);

$arr =http_build_query($arr);
//$url1 = "http://61.184.81.185:8000/searchbook.ASP";
//$cookie_file = dirname(__FILE__).'/cookie.txt';
/*
$ch1 = curl_init($url1);
curl_setopt($ch1, CURLOPT_HEADER, 0);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_COOKIEJAR,  $cookie_file);
curl_exec($ch1);
curl_close($ch1);*/
$ch = curl_init();
//curl_setopt($ch, CURLOPT_REFERER, "http://61.184.81.185:8000/searchbook.ASP");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_URL,$url2);
curl_setopt($ch, CURLOPT_POSTFIELDS,$arr);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
$data = curl_exec($ch);
curl_close($ch);
$data = mb_convert_encoding($data,"utf-8",'gb2312');
//dump($data);

$data3 = get($url3.'?'.$arr2);
$data3 = mb_convert_encoding($data3,"utf-8",'gb2312');
dump($data3);