<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->_siteConfig->name;?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link type="image/x-icon" href="<?php echo IUrl::creatUrl("")."favicon.ico";?>" rel="icon">
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/jquery/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/form/form.js"></script>
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/autovalidate/validate.js?v=5.1"></script><link rel="stylesheet" type="text/css" href="/runtime/_systemjs/autovalidate/style.css" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artdialog/artDialog.js?v=4.8"></script><script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artdialog/plugins/iframeTools.js"></script><link rel="stylesheet" type="text/css" href="/runtime/_systemjs/artdialog/skins/aero.css" />
	<script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artTemplate/artTemplate.js"></script><script type="text/javascript" charset="UTF-8" src="/runtime/_systemjs/artTemplate/artTemplate-plugin.js"></script>
	<!--[if IE]><script src="<?php echo $this->getWebViewPath()."javascript/html5.js";?>"></script><![endif]-->
	<script src='<?php echo $this->getWebViewPath()."javascript/site.js";?>'></script>
	<link rel="stylesheet" href="<?php echo $this->getWebSkinPath()."style/style.css";?>">
  <script type='text/javascript' src='<?php echo IUrl::creatUrl("")."public/javascript/public.js";?>'></script>
</head>
<body>

<!-- 顶部工具栏 -->
<div class="header_top">
	<div class="web">
		<div class="welcome">
			欢迎您来到 <?php echo $this->_siteConfig->name;?>！
		</div>
		<ul class="top_tool">
			<li><a href="<?php echo IUrl::creatUrl("ucenter/index");?>">个人中心</a></li>
			<li><a href="<?php echo IUrl::creatUrl("/simple/seller");?>">申请开店</a></li>
			<li><a href="<?php echo IUrl::creatUrl("/seller/index");?>">商家管理</a></li>
			<li><a href="<?php echo IUrl::creatUrl("/site/help_list");?>">使用帮助</a></li>
		</ul>
	</div>
</div>
<!-- 顶部工具栏 -->
<header class="header">
	<!-- logo与搜索 -->
	<div class="body_wrapper">
		<div class="web">
			<!-- logo -->
			<div class="logo_layer">
				<a title="<?php echo $this->_siteConfig->name;?>" href="<?php echo IUrl::creatUrl("");?>" class="logo">
					<img src="<?php if($this->_siteConfig->logo){?><?php echo IUrl::creatUrl("")."".$this->_siteConfig->logo."";?><?php }else{?><?php echo $this->getWebSkinPath()."image/logo.png";?><?php }?>">
				</a>
			</div>
			<!-- 注册与登录 -->
			<div class="body_toolbar">
				<?php if($this->user){?>
					<div class="body_toolbar_btn userinfo">
						<a href="<?php echo IUrl::creatUrl("/ucenter/index");?>"><?php echo isset($this->user['username'])?$this->user['username']:"";?></a>
						<i></i>
					</div>
					<div class="body_toolbar_layer">
						<div class="toolbar_layer_info">
							<a class="info_photo" href="<?php echo IUrl::creatUrl("/ucenter/index");?>">
								<img id="user_ico_img" src="<?php echo IUrl::creatUrl("".$this->user['head_ico']."");?>" onerror="this.src='<?php echo $this->getWebSkinPath()."image/user_ico.gif";?>'">
							</a>
							<div>
								<a href="<?php echo IUrl::creatUrl("/ucenter/index");?>"><?php echo isset($this->user['username'])?$this->user['username']:"";?> <i class="fa fa-user-md"></i></a>
								<span><?php echo ISafe::get('last_login');?></span>
							</div>
						</div>
						<div class="myorder">
							<dl class="clearfix">
								<dt>
									<span class="fl">我的订单</span>
									<a class="fr" href="<?php echo IUrl::creatUrl("/ucenter/index");?>">更多&gt;</a>
								</dt>
								<dd><a href="<?php echo IUrl::creatUrl("/ucenter/integral");?>">我的积分</a></dd>
								<dd><a href="<?php echo IUrl::creatUrl("/ucenter/account_log");?>">账户余额</a></dd>
								<dd><a href="<?php echo IUrl::creatUrl("/ucenter/evaluation");?>">待评价</a></dd>
								<dd><a href="<?php echo IUrl::creatUrl("/ucenter/refunds");?>">退换货</a></dd>
								<dd><a href="<?php echo IUrl::creatUrl("/ucenter/consult");?>">商品咨询</a></dd>
							</dl>
						</div>
						<div class="myshop"><a href="<?php echo IUrl::creatUrl("/ucenter/index");?>">我的商城</a></div>
						<div class="logout"><a href="<?php echo IUrl::creatUrl("/simple/logout");?>">退出登录</a></div>
					</div>
				<?php }else{?>
					<div class="body_toolbar_btn login_reg">
						<a href="<?php echo IUrl::creatUrl("/simple/login");?>">登录</a>
						<em> | </em>
						<a class="reg" href="<?php echo IUrl::creatUrl("/simple/reg");?>">注册</a>
					</div>
				<?php }?>
			</div>
			<!-- 注册与登录 -->
			<!--购物车模板 开始-->
			<div class="header_cart" name="mycart">
				<a href="<?php echo IUrl::creatUrl("/simple/cart");?>" class="go_cart">
					<i class="fa fa-shopping-cart"></i>
					<em class="sign_total" name="mycart_count"]>0</em>
				</a>
				<div class="cart_simple" id="div_mycart"></div>
			</div>
			<script type='text/html' id='cartTemplete'>
			<div class='cart_panel'>
				<%if(goodsCount){%>
					<!-- 购物车物品列表 -->
					<ul class='cart_list'>
						<%for(var item in goodsData){%>
						<%var data = goodsData[item]%>
						<li id="site_cart_dd_<%=item%>">
							<em><%=(window().parseInt(item)+1)%></em>
							<a target="_blank" href="<?php echo IUrl::creatUrl("/site/products/id/<%=data['goods_id']%>");?>">
								<img src="<%=webroot(data['img'])%>">
							</a>
							<a class="shop_name" target="_blank" href="<?php echo IUrl::creatUrl("/site/products/id/<%=data['goods_id']%>");?>"><%=data['name']%></a>
							<!-- <p class="shop_class"></p> -->
							<div class="shop_price"><p>￥ <%=data['sell_price']%> <span>x <%=data['count']%></span></p></div>
							<i class="fa fa-remove" onclick="removeCart('<%=data['id']%>','<%=data['type']%>');$('#site_cart_dd_<%=item%>').hide('slow');"></i>
						</li>
						<%}%>
					</ul>
					<!-- 购物车物品列表 -->
					<!-- 购物车物品统计 -->
					<div class="cart_total">
						<p>
							共<span name="mycart_count"><%=goodsCount%></span>件
							总额：<em name="mycart_sum">￥<%=goodsSum%></em>
						</p>
						<a href="<?php echo IUrl::creatUrl("simple/cart");?>">结算</a>
					</div>
					<!-- 购物车物品统计 -->
				<%}else{%>
					<!-- 购物车无内容 -->
					<div class='cart_no'>购物车空空如也~</div>
				<%}%>
			</div>
			</script>
			<!--购物车模板 结束-->
			<!-- 搜索框 -->
			<div class="search_box">
					<!-- 搜索内容 -->
				<form method='get' action='<?php echo IUrl::creatUrl("/");?>'>
					<input type='hidden' name='controller' value='site'>
					<input type='hidden' name='action' value='search_list'>
					<div class="search">
						<input type="text" name='word' class="search_keyword" autocomplete="off">
						<button class="search_submit" type="submit">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</form>
				<!-- 热门搜索 -->
				<div class="search_hotwords">
					<?php foreach($items=Api::run('getKeywordList',2) as $key => $item){?>
					<?php $tmpWord = urlencode($item['word']);?>
					<a href="<?php echo IUrl::creatUrl("/site/search_list/word/".$tmpWord."");?>"><?php echo isset($item['word'])?$item['word']:"";?></a>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<!-- logo与搜索 -->

	<!-- 导航栏 -->
	<div class="nav_bar">
		<div class="user_center">
		<div class="web">
			<!-- 分类列表 -->
			<div class="category_list">
				<!-- 全部商品 -->
				<a class="all_goods_sort" href="" target="_blank">
					<h3 class="all">全部商品</h3>
				</a>
				<!-- 全部商品 -->
				<!-- 分类列表-详情 -->
				<ul class="cat_list none">
					<?php foreach($items=Api::run('getCategoryListTop') as $key => $first){?>
					<li>
						<!-- 分类列表-导航模块 -->
						<div class="cat_nav">
							<h3><a href="<?php echo IUrl::creatUrl("/site/pro_list/cat/".$first['id']."");?>"><?php echo isset($first['name'])?$first['name']:"";?></a></h3>
							<?php foreach($items=Api::run('getCategoryByParentid',array('#parent_id#',$first['id']), 3) as $key => $second){?>
							<a href="<?php echo IUrl::creatUrl("/site/pro_list/cat/".$second['id']."");?>"><?php echo isset($second['name'])?$second['name']:"";?></a>
							<?php }?>
							<i class="fa fa-angle-right"></i>
						</div>
						<!-- 分类列表-导航模块 -->
						<!-- 分类列表-导航内容模块 -->
						<div class="cat_more">
							<h3>
								<a href="<?php echo IUrl::creatUrl("/site/pro_list/cat/".$first['id']."");?>">
									<span><?php echo isset($first['name'])?$first['name']:"";?></span>
									<i class="fa fa-angle-right"></i>
								</a>
							</h3>
							<ul class="cat_nav_list">
								<?php foreach($items=Api::run('getCategoryByParentid',array('#parent_id#',$first['id']), 3) as $key => $second){?>
								<li><a href="<?php echo IUrl::creatUrl("/site/pro_list/cat/".$second['id']."");?>"><?php echo isset($second['name'])?$second['name']:"";?></a></li>
								<?php }?>
							</ul>
							<ul class="cat_content_list">
								<?php foreach($items=Api::run('getCategoryExtendList',array('#categroy_id#',$first['id']),4) as $key => $item){?>
								<li>
									<a href="<?php echo IUrl::creatUrl("/site/products/id/".$item['id']."");?>" target="_blank" title="<?php echo isset($item['name'])?$item['name']:"";?>">
										<img class="img-lazyload" src="<?php echo IUrl::creatUrl("/pic/thumb/img/".$item['img']."/w/118/h/118");?>" alt="<?php echo isset($item['name'])?$item['name']:"";?>">
										<h3><?php echo isset($item['name'])?$item['name']:"";?></h3>
										<p class="price">￥ <?php echo isset($item['sell_price'])?$item['sell_price']:"";?></p>
									</a>
								</li>
								<?php }?>
							</ul>
						</div>
						<!-- 分类列表-导航内容模块 -->
					</li>
					<?php }?>
				</ul>
				<!-- 分类列表-详情 -->
			</div>
			<!-- 分类列表 -->
			<!-- 导航索引 -->
			<div class="nav_index">
				<ul class="nav">
					<li class="user_nav_index"><a href="<?php echo IUrl::creatUrl("/site/index");?>"><span>首 页</span></a></li>
					<?php foreach($items=Api::run('getGuideList') as $key => $item){?>
					<li class="user_nav_index"><a href="<?php echo IUrl::creatUrl("".$item['link']."");?>"><span><?php echo isset($item['name'])?$item['name']:"";?></span></a></li>
					<?php }?>
				</ul>
			</div>
		</div>
		</div>
	</div>
</header>

<!-- 个人中心内容 -->
<div class="center_content">
	<section class="breadcrumb">
		<span></span> <a href="<?php echo IUrl::creatUrl("");?>">首页</a> \ <a href="<?php echo IUrl::creatUrl("/ucenter/index");?>">我的账户</a>
	</section>


	<section class="web">
		<div class="ucenter_content_bar">
			<section class="ucenter_main">
				<header class="uc_head">
	<h3>订单详情</h3>
</header>

<section class="order_schedule">
	<ol>
		<?php $orderStep = Order_Class::orderStep($this->order_info)?>
		<?php foreach($items=$orderStep as $eventTime => $stepData){?>
		<li><?php echo isset($eventTime)?$eventTime:"";?>&nbsp;&nbsp;<span class="black"><?php echo isset($stepData)?$stepData:"";?></span></li>
		<?php }?>
	</ol>
	<p>
		<strong>订单号：</strong><?php echo isset($this->order_info['order_no'])?$this->order_info['order_no']:"";?>
		<strong>下单日期：</strong><?php echo isset($this->order_info['create_time'])?$this->order_info['create_time']:"";?>
		<strong>状态：</strong>
		<span class="green bold"><?php echo Order_Class::orderStatusText($orderStatus);?></span>
	</p>

	<p>
		<?php if(in_array($orderStatus,array(1,2))){?>
		<label class="btn btn_orange">
			<input type="button" value="取消订单" onclick='window.location.href="<?php echo IUrl::creatUrl("/ucenter/order_status/order_id/".$this->order_info['order_id']."/op/cancel");?>"' />
		</label>
		<?php }?>

		<?php if($orderStatus == 2){?>
		<label class="btn btn_green">
			<input type="button" value="立即付款" onclick="window.location.href='<?php echo IUrl::creatUrl("/block/doPay/order_id/".$this->order_info['order_id']."");?>'" />
		</label>
		<?php }?>

		<?php if(in_array($orderStatus,array(11,3))){?>
		<label class="btn btn_green">
			<input type="button" value="确认收货" onclick='window.location.href="<?php echo IUrl::creatUrl("/ucenter/order_status/order_id/".$this->order_info['order_id']."/op/confirm");?>"' />
		</label>
		<?php }?>

		<?php if(Order_Class::isRefundmentApply($this->order_info)){?>
		<label class="btn btn_orange">
			<input type="button" value="申请退款" onclick='window.location.href="<?php echo IUrl::creatUrl("/ucenter/refunds_edit/order_id/".$this->order_info['order_id']."");?>"' />
		</label>
		<?php }?>
	</p>
</section>
<header class="uc_head">
	<h3>收件人信息</h3>
</header>

<section class="col_table">
	<table>
		<tr>
			<th>收货人：</th>
			<td><?php echo isset($this->order_info['accept_name'])?$this->order_info['accept_name']:"";?></td>
		</tr>
		<tr>
			<th>地址：</th>
			<td><?php echo isset($this->order_info['province_str'])?$this->order_info['province_str']:"";?> <?php echo isset($this->order_info['city_str'])?$this->order_info['city_str']:"";?> <?php echo isset($this->order_info['area_str'])?$this->order_info['area_str']:"";?> <?php echo isset($this->order_info['address'])?$this->order_info['address']:"";?></td>
		</tr>
		<tr>
			<th>邮编：</th>
			<td><?php echo isset($this->order_info['postcode'])?$this->order_info['postcode']:"";?></td>
		</tr>
		<tr>
			<th>固定电话：</th>
			<td><?php echo isset($this->order_info['telphone'])?$this->order_info['telphone']:"";?></td>
		</tr>
		<tr>
			<th>手机号码：</th>
			<td><?php echo isset($this->order_info['mobile'])?$this->order_info['mobile']:"";?></td>
		</tr>
	</table>
</section>

<header class="uc_head">
	<h3>支付及配送方式</h3>
</header>
<section class="col_table">
	<table>
		<tr>
			<th>配送方式：</th>
			<td><?php echo isset($this->order_info['delivery'])?$this->order_info['delivery']:"";?></td>
		</tr>

		<?php if($this->order_info['takeself']){?>
		<tr>
			<th>自提地址：</th>
			<td>
				<?php echo isset($this->order_info['takeself']['province_str'])?$this->order_info['takeself']['province_str']:"";?>
				<?php echo isset($this->order_info['takeself']['city_str'])?$this->order_info['takeself']['city_str']:"";?>
				<?php echo isset($this->order_info['takeself']['area_str'])?$this->order_info['takeself']['area_str']:"";?>
				<?php echo isset($this->order_info['takeself']['address'])?$this->order_info['takeself']['address']:"";?>
			</td>
		</tr>
		<tr>
			<th>自提联系方式：</th>
			<td>
				座机：<?php echo isset($this->order_info['takeself']['phone'])?$this->order_info['takeself']['phone']:"";?> &nbsp;&nbsp;
				手机：<?php echo isset($this->order_info['takeself']['mobile'])?$this->order_info['takeself']['mobile']:"";?>
			</td>
		</tr>
		<?php }else{?>
		<tr>
			<th>物流公司：</th>
			<td><?php echo isset($this->order_info['freight']['freight_name'])?$this->order_info['freight']['freight_name']:"";?></td>
		</tr>
		<tr>
			<th>快递单号：</th>
			<td><?php echo isset($this->order_info['freight']['delivery_code'])?$this->order_info['freight']['delivery_code']:"";?></td>
		</tr>
		<?php }?>

		<tr>
			<th>支付方式：</th>
			<td><?php echo isset($this->order_info['payment'])?$this->order_info['payment']:"";?></td>
		</tr>

		<?php if($this->order_info['paynote']){?>
		<tr>
			<th>支付说明：</th>
			<td><?php echo isset($this->order_info['paynote'])?$this->order_info['paynote']:"";?></td>
		</tr>
		<?php }?>

		<tr>
			<th>运费：</th>
			<td><?php echo isset($this->order_info['real_freight'])?$this->order_info['real_freight']:"";?></td>
		</tr>

	</table>
</section>

<?php if($this->order_info['invoice']==1){?>
<header class="uc_head">
	<h3>发票信息</h3>
</header>
<section class="col_table">
	<table>
		<tr>
			<th>所需税金：</th>
			<td><?php echo isset($this->order_info['taxes'])?$this->order_info['taxes']:"";?></td>
		</tr>
		<tr>
			<th>发票抬头：</th>
			<td><?php echo CountSum::invoiceText($this->order_info['invoice_info']);?></td>
		</tr>
	</table>
</section>
<?php }?>

<header class="uc_head">
	<h3>商品清单</h3>
</header>

<section class="uc_table">
	<table>
		<thead>
			<tr>
				<th>图片</th>
				<th>商品名称</th>
				<th>赠送积分</th>
				<th>商品价格</th>
				<th>优惠金额</th>
				<th>商品数量</th>
				<th>小计</th>
				<th>配送</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($items=Api::run('getOrderGoodsListByGoodsid',array('#order_id#',$this->order_info['order_id'])) as $key => $good){?>
			<?php $good_info = JSON::decode($good['goods_array'])?>

			<tr>
				<td><img class="pro_pic" src="<?php echo IUrl::creatUrl("".$good['img']."");?>" width="50px" height="50px" onerror='this.src="<?php echo $this->getWebSkinPath()."images/front/nopic_100_100.gif";?>"' /></td>
				<td class="t_l">
					<a class="blue" href="<?php echo IUrl::creatUrl("/site/products/id/".$good['goods_id']."");?>" target='_blank'><?php echo isset($good_info['name'])?$good_info['name']:"";?></a>
					<?php if($good_info['value']!=''){?><p><?php echo isset($good_info['value'])?$good_info['value']:"";?></p><?php }?>
				</td>
				<td><?php echo $good['point']*$good['goods_nums'];?></td>
				<td class="red2">￥<?php echo isset($good['goods_price'])?$good['goods_price']:"";?></td>
				<td class="red2">￥<?php echo $good['goods_price']-$good['real_price'];?></td>
				<td>x <?php echo isset($good['goods_nums'])?$good['goods_nums']:"";?></td>
				<td class="red2 bold">￥<?php echo $good['goods_nums']*$good['real_price'];?></td>
				<td>
					<?php echo Order_Class::goodsSendStatus($good['is_send']);?>
					<?php if($good['delivery_id']){?>
					<a onclick='freightLine(<?php echo isset($good['delivery_id'])?$good['delivery_id']:"";?>);'>查看物流</a>
					<?php }?>
				</td>
			</tr>
			<?php }?>
			<tr>
				<td colspan="8" class="tr">
					<p>商品总金额：￥<?php echo isset($this->order_info['payable_amount'])?$this->order_info['payable_amount']:"";?></p>
					<p>+ 运费：￥<label id="freightFee"><?php echo isset($this->order_info['real_freight'])?$this->order_info['real_freight']:"";?></label>

					<?php if($this->order_info['taxes'] > 0){?>
					<p>+ 税金：￥<?php echo isset($this->order_info['taxes'])?$this->order_info['taxes']:"";?></p>
					<?php }?>

					<?php if($this->order_info['pay_fee'] > 0){?>
					<p>+ 支付手续费：￥<?php echo isset($this->order_info['pay_fee'])?$this->order_info['pay_fee']:"";?></p>
					<?php }?>

					<?php if($this->order_info['insured'] > 0){?>
					<p>+ 保价：￥<?php echo isset($this->order_info['insured'])?$this->order_info['insured']:"";?></p>
					<?php }?>

					<p>订单折扣或涨价：￥<?php echo isset($this->order_info['discount'])?$this->order_info['discount']:"";?></p>

					<?php if($this->order_info['promotions'] > 0){?>
					<p>- 促销优惠金额：￥<?php echo isset($this->order_info['promotions'])?$this->order_info['promotions']:"";?></p>
					<?php }?>

		            <?php if($this->order_info['spend_point'] > 0){?>
		            <p>- 消耗积分：<?php echo isset($this->order_info['spend_point'])?$this->order_info['spend_point']:"";?> 积分</p>
		            <?php }?>
					<p>订单支付金额：<span class="red">￥<label><?php echo isset($this->order_info['order_amount'])?$this->order_info['order_amount']:"";?></label></span></p>
				</td>
			</tr>
		</tbody>
	</table>
</section>

<script>
//快递跟踪
function freightLine(doc_id){
	var urlVal = "<?php echo IUrl::creatUrl("/block/freight/id/@id@");?>";
	urlVal = urlVal.replace("@id@",doc_id);
	art.dialog.open(urlVal,{'title':'轨迹查询',width:'600px',height:'500px'});
}
</script>

			</section>
			<!-- 个人中心内容-功能栏 -->
			<aside class="ucenter_bar">
				<!-- 我的商城 -->
				<div class="ucenter_bar_wapper">
					<a href="<?php echo IUrl::creatUrl("/ucenter/index");?>">我的商城</a>
				</div>
				<!-- 我的商城 -->
				<!-- 功能栏 -->
				<?php $index=0;?>
				<?php foreach($items=menuUcenter::init() as $key => $item){?>
				<?php $index++;?>
				<nav class="user_bar">
					<h3><?php echo isset($key)?$key:"";?></h3>
					<ul>
						<?php foreach($items=$item as $moreKey => $moreValue){?>
						<li><a title="<?php echo isset($moreValue)?$moreValue:"";?>" href="<?php echo IUrl::creatUrl("".$moreKey."");?>"><?php echo isset($moreValue)?$moreValue:"";?></a></li>
						<?php }?>
					</ul>
				</nav>
				<?php }?>
				<!-- 功能栏 -->
			</aside>
			<!-- 个人中心内容-功能栏 -->
		</div>
		<section class="ucenter_goods">
			<h3>也许你会对下列商品感兴趣</h3>
			<ul>
				<?php foreach($items=Api::run('getGoodsByCommendgoods',8) as $key => $item){?>
				<li>
					<a href="<?php echo IUrl::creatUrl("/site/products/id/".$item['id']."");?>">
						<img src="<?php echo IUrl::creatUrl("/pic/thumb/img/".$item['img']."/w/170/h/170");?>" alt="<?php echo isset($item['name'])?$item['name']:"";?>">
						<p class="pro_title"><?php echo isset($item['name'])?$item['name']:"";?></p>
						<p class="pro_price">￥<?php echo isset($item['sell_price'])?$item['sell_price']:"";?></p>
					</a>
				</li>
				<?php }?>
			</ul>
		</section>
	</section>
</div>
<!-- 个人中心内容 -->

<footer class="foot">
	<section class="service">
		<ul>
			<li class="item1">
				<i class="fa fa-star"></i>
				<strong>正品优选</strong>
			</li>
			<li class="item2">
				<i class="fa fa-globe"></i>
				<strong>上市公司</strong>
			</li>
			<li class="item3">
				<i class="fa fa-inbox"></i>
				<strong>300家连锁门店</strong>
			</li>
			<li class="item4">
				<i class="fa fa-map-marker"></i>
				<strong>上百家维修网点 全国联保</strong>
			</li>
		</ul>
	</section>
	<section class="help">
		<div class="prompt_link">
			<?php $catIco = array('help-new','help-delivery','help-pay','help-user','help-service')?>
			<?php foreach($items=Api::run('getHelpCategoryFoot') as $key => $helpCat){?>
			<dl class="help_<?php echo $key+1;?>">
				<dt>
					<p class="line"></p>
					<p class="title"><a href="<?php echo IUrl::creatUrl("/site/help_list/id/".$helpCat['id']."");?>"><?php echo isset($helpCat['name'])?$helpCat['name']:"";?></a></p>
				</dt>
				<?php foreach($items=Api::run('getHelpListByCatidAll',array('#cat_id#',$helpCat['id'])) as $key => $item){?>
				<dd><a href="<?php echo IUrl::creatUrl("/site/help/id/".$item['id']."");?>"><?php echo isset($item['name'])?$item['name']:"";?></a></dd>
				<?php }?>
			</dl>
			<?php }?>
		</div>
		<div class="contact">
			<p class="line"></p>
			<em>400-888-8888</em>
			<span>24小时在线客服(仅收市话费)</span>
			<a href="#"><i class="fa fa-comments"></i> 在线客服</a>
		</div>
	</section>
	<section class="copy">
		<?php echo IFilter::stripSlash($this->_siteConfig->site_footer_code);?>
	</section>
</footer>



<script>
//DOM加载完毕后运行
$(function(){
	//隔行换色
	$(".list_table tr:nth-child(even)").addClass('even');
	$(".list_table tr").hover(
		function () {
			$(this).addClass("sel");
		},
		function () {
			$(this).removeClass("sel");
		}
	);

	//按钮高亮
	var localUrl = "<?php echo IUrl::getUri();?>";
	$('a[href^="'+localUrl+'"]').parent().addClass('current');
});

</script>
</body>
</html>
