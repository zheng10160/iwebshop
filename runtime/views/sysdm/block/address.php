<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>修改收货地址</title>
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/form/form.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/jquery/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artdialog/artDialog.js?v=4.8"></script><script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artdialog/plugins/iframeTools.js"></script><link rel="stylesheet" type="text/css" href="/runtime/_systemjs/artdialog/skins/aero.css" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artTemplate/artTemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artTemplate/artTemplate-plugin.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/autovalidate/validate.js?v=5.1"></script><link rel="stylesheet" type="text/css" href="/runtime/_systemjs/autovalidate/style.css" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/areaSelect/areaSelect.js"></script>
	<script type='text/javascript' src="<?php echo IUrl::creatUrl("")."public/javascript/public.js";?>"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.__address * {padding: 0;margin: 0;list-style: none;}
		.__address .__address_alert li {position: relative;margin: 20px 0;height: 40px;}
		.__address .__address_alert li span {
			position: absolute;height: 10px;line-height: 10px;background: #fff;top: -7px;padding: 0 10px;left: 5px;
			color: #999;font-size: 12px;z-index: 1;
		}
		.__address .__address_alert li .__text,.__address .__address_alert li select {
			display: block;width: 100%;height: 16px;line-height: 16px;border-radius: 0;padding: 10px 0;border: none;
			background: #fff;text-indent: 10px;outline: 1px solid #ddd;
		}
		.__address .__address_alert li select {
			width: 30%;float: left;height: 36px;line-height: 36px;margin: 0 0 0 5%;padding: 0;
		}
		.__address .__address_alert li select:nth-of-type(1){margin-left: 0 !important;}
	</style>
</head>

<body class="__address">
	<form action="<?php echo IUrl::creatUrl("/block/address_add");?>" method="post" name="addressForm" class="form-horizontal">
	<input type="hidden" name="id" />
	<section class="__address_alert">
		<ul>
			<li>
				<span>姓名</span>
				<input class="__text" type="text" name="accept_name" pattern='required' alt='姓名不能为空' />
			</li>
			<li>
				<span>省份</span>
				<select name="province" child="city,area"></select>
				<select name="city" child="area"></select>
				<select name="area" pattern="required" alt="请选择收货地区"></select>
			</li>
			<li>
				<span>地址</span>
				<input class="__text" name='address' type="text" alt='地址不能为空' pattern='required' />
			</li>
			<li>
				<span>手机</span>
				<input class="__text" name='mobile' type="text" pattern='mobi' alt='格式不正确' />
			</li>
			<li>
				<span>固话</span>
				<input class="__text" type="text" pattern='phone' name='telphone' empty alt='格式不正确' />
			</li>
			<li>
				<span>邮编</span>
				<input class="__text" name='zip' empty type="text" pattern='zip' alt='格式不正确' />
			</li>
		</ul>
	</section>

</body>

<script type='text/javascript'>
jQuery(function()
{
	var areaInstance = new areaSelect('province');
	areaInstance.init(<?php echo JSON::encode($this->addressRow);?>);

	<?php if($this->addressRow){?>
		var formObj = new Form('addressForm');
		formObj.init(<?php echo JSON::encode($this->addressRow);?>);
	<?php }?>
})
</script>
</html>
