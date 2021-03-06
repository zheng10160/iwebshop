<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo isset($httpcode)?$httpcode:"";?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<div class="page-header">
			<div class="alert alert-danger">
			    <h1>
			    	<?php echo isset($httpcode)?$httpcode:"";?>
			        <small><?php echo isset($data)?$data:"";?></small>
			    </h1>
			</div>
		</div>

		<div class="alert alert-success">
			<p>1.检查刚才的输入</p>
			<p>2.到<a href="<?php echo IUrl::creatUrl("/site/help_list");?>">帮助中心</a>寻求帮助</p>
			<p>3.去其他地方逛逛：<a href='javascript:void(0)' class='blue' onclick='window.history.go(-1);'>返回上一级操作</a> | <a class="blue" href="<?php echo IUrl::creatUrl("");?>">网站首页</a> | <a class="blue" href="<?php echo IUrl::creatUrl("/ucenter/order");?>">我的订单</a> | <a class="blue" href="<?php echo IUrl::creatUrl("/simple/cart");?>">我的购物车</a></p>
		</div>
	</div>
</body>
</html>