<?php
//定义你的访问密码后上传
$auth = '123456';

define('IN_SYS', true);
require './framework/bootstrap.inc.php';
load()->web('template');
load()->web('common');
load()->model('user');

if($_W['ispost'] && $_GPC['auth'] == $auth && $auth != '') {
	$isok = true;
	$username = trim($_GPC['username']);
	$password = $_GPC['password'];
	if(!empty($username) && !empty($password)) {
		
		$member = user_single(array('username'=>$username));
		if(empty($member)) {
			message('输入的用户名不存在.');
		}
		$hash = user_hash($password, $member['salt']);
		$r = array();
		$r['password'] = $hash;
		pdo_update('users', $r, array('uid'=>$member['uid']));
		exit('<script>alert("密码修改成功, 请重新登陆, 并尽快删除本文件, 避免密码泄露隐患.");location.href = "./"</script>');
	}
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="./resource/favicon.png">
	<title>密码找回工具 FOR 0.6 - 微擎 - 公众平台自助引擎 -  Powered by WE7.CC</title>
	<link href="./web/resource/css/bootstrap.min.css" rel="stylesheet">
	<link href="./web/resource/css/font-awesome.min.css" rel="stylesheet">
	<link href="./web/resource/css/common.css" rel="stylesheet">
	<script src="./web/resource/js/require.js"></script>
	<script src="./web/resource/js/app/config.js"></script>
</head>
<body>
<div class="main">
	<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data" onsubmit="return formcheck(this)">
		<div class="panel panel-default" style="margin:10px;">
			<div class="panel-heading">
				重置密码 <span class="text-muted">如果你的管理密码意外遗失, 请使用此工具重置密码, 重置成功后请尽快将此文件从服务器删除, 避免造成安全隐患</span>
			</div>
			<div class="panel-body">
				<?php if($isok) {?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">用户名:</label>
					<div class="col-sm-9">
						<input name="auth" type="hidden" value="<?php echo $auth;?>" />
						<input name="username" type="text" class="form-control" placeholder="请输入你要重置密码的用户名">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">新的登录密码:</label>
					<div class="col-sm-9">
						<input name="password" type="password" class="form-control" placeholder="">
					</div>
				</div>
				<?php } else {?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">请输入访问密码</label>
					<div class="col-sm-9">
						<input name="auth" type="password" class="form-control" placeholder="">
					</div>
				</div>
				<?php }?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label"></label>
					<div class="col-sm-9">
						<button type="submit" class="btn btn-primary btn-block" name="submit" value="提交">提交</button>
						<input type="hidden" name="token" value="{$_W['token']}" />
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
</body>
</html>