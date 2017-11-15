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
$url = base64_decode($_GET['url']);

$data = get($url);
$data = mb_convert_encoding($data,"utf-8",'gb2312');
preg_match_all('/\<table ([\s\S]*?)<\/table\>/',$data,$match);
$arr1 = $match[0][0];
$arr2 = $match[0][1];
$table1 = table_arr($arr1);
$table2 = table_arr($arr2);


//dump($table1);
//dump($table2);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
 <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
     <link rel="stylesheet" href='weuix.min.css' />
<script type="text/javascript" src="zepto.min.js"></script>
      <script>
  $(function(){

	  
	  });    
      
      </script>
</head>

<body ontouchstart style="background-color: #f8f8f8;">
<div class="page-hd">
<table class="weui-table weui-border-tb"  >
                <tbody>
                <?php
                foreach($table1 as $k1=>$v1){
                echo " <tr align='left'><td align='left' width='30%'>".trim($v1[0])."</td><td align='left'>".trim($v1[1])."</td></tr>";
                }
                  echo " <tr align='left'><td align='left'>".trim($table2[0][0])."：</td><td align='left'>".trim($table2[1][0])."</td></tr>";
                    echo " <tr><td align='left'>".trim($table2[0][1])."：</td><td align='left'>".trim($table2[1][1])."</td></tr>";
                      echo " <tr><td align='left'>".trim($table2[0][2])."：</td><td align='left'>".trim($table2[1][2])."</td></tr>";
                        echo " <tr><td align='left'>".trim($table2[0][3])."：</td><td align='left'>".trim($table2[1][3])."</td></tr>";
                ?>
               
                </tbody>
            </table>
            </div>
</body>
</html>
