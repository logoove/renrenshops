- 导入

~~~
<form id="importform" class="form-horizontal form" action="" method="post" enctype="multipart/form-data">
       <div class="form-group">
            <label class="col-sm-2 control-label must">EXCEL</label>

            <div class="col-sm-5"  style="padding-right:0;" >
                <input type="file" name="excelfile" class="form-control" />
                <span class="help-block">选择excel文件</span>
            </div>
        </div>
    <div class='form-group'>
        <div class="col-sm-12">
            <div class="modal-footer">
           <button type="submit" class="btn btn-primary" name="cancelsend" value="yes">确认导入</button>
 
            </div>
        </div>
    </div>
    
</form>
~~~

php处理

~~~
if ($_W['ispost']) {
	
	$rows = m('excel')->import('excelfile');
	$time = time();
	foreach ($rows as $rownum => $col) {		
		$data = array(
		'uniacid' => $_W['uniacid'],
		'createtime' => $time,
		'category' => trim($col[0]),
		'orderid' => trim($col[1]),
		'isuse' => trim($col[2])
		);
		if (empty($col[0])) {
					continue;
			}
	pdo_insert('ewei',$data);	
}
$this->message('导入成功!',webUrl(''), '');
		}
~~~
- 导出模板,调用以下方法即可

~~~
	public function import()
	{
		$columns = array();
		$columns[] = array('title' => '物流类别', 'field' => '', 'width' => 32);
		$columns[] = array('title' => '物流单号', 'field' => '', 'width' => 32);
    $columns[] = array('title' => '是否使用', 'field' => '', 'width' => 32);
		m('excel')->temp('文件名'. date('Y-m-d-H-i', time()), $columns);
	}
~~~
- 导出excel

~~~
<button type="submit" name="export_order" value="1" class="btn btn-primary btn-sm">导出订单</button>
//$list是数据
		if ($_GPC['export_order'] == 1) {
		$earr = array();
		foreach($list as $v){
		$earr[]=array(
		'openid' => $v['openid'],
		'price' => $v['price'],
		'mobile'=> $v['mobile'],
		); 
		}
		$titlearr = array(
				array('title' => 'openid', 'field' => 'openid', 'width' => 24),
				array('title' => '手机号', 'field' => 'mobile', 'width' => 12),
			  	array('title' => '智慧卡金额', 'field' => 'price', 'width' => 12),
				);
		
		m('excel')->export($earr, array('title' => '订单-' . date('Y-m-d-H-i', time()), 'columns' => $titlearr));

		}
~~~