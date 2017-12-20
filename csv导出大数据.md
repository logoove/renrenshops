#### csv导出大数据使用方法fputcsv()函数;
#### 步骤如下
- 计算出总数据数,大概测试出每次可导出数据量,比如1000条可导出,内存不会溢出;并设置初始导出;下面语句都是需要的,输出缓存,并且保证不会中文乱码

~~~~
		$totalcount = pdo_fetchcolumn("select count(id) from ".tablename('ewei_shop_order').' where uniacid='.$uniacid);
		$pagecount = 1000;
		set_time_limit(0);
		header("Content-type:application/vnd.ms-excel");
    	header("Content-Disposition:attachment;filename=全部订单-".date('Y-m-d-H-i-s').".csv");
   		ob_start();   
    	ob_end_clean();
    	echo "\xEF\xBB\xBF";
~~~

- 设置导出标题字段,并循环输出

~~~
$head = array('openid','粉丝昵称');
$fp = fopen('php://output', 'a');
fputcsv($fp, $head);
for($i=0;$i<intval($totalcount/$pagecount)+1;$i++){
$sql="";
$sql .= ' LIMIT ' . strval($i*$pagecount) . ',' . $pagecount;
$list = pdo_fetchall($sql);
foreach($list as &$row){
$export = array($row['openid'],$row['nickname']);
fputcsv($fp, $export);
}
unset($row);

}
~~~
