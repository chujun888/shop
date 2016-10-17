<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php echo ($title); ?></title>
	<link rel="stylesheet" href="/Public/Home/style/base.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/global.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/header.css" type="text/css">
            <?php foreach($style as $k=>$v):?>
	<link rel="stylesheet" href="/Public/Home/style/<?php echo ($v); ?>.css" type="text/css">
            <?php endforeach;?>
	<link rel="stylesheet" href="/Public/Home/style/bottomnav.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/footer.css" type="text/css">
        
	<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/header.js"></script>
        <?php foreach($js as $k=>$v):?>
	<script type="text/javascript" src="/Public/Home/js/<?php echo ($v); ?>.js"></script>
        <?php endforeach;?>
        <script>var is_login=0;</script>
</head>
<body>
	<!-- 顶部导航 start -->
	<div class="topnav">
		<div class="topnav_bd w1210 bc">
			<div class="topnav_left">
				
			</div>
			<div class="topnav_right fr">
				<ul>
                                    <li>您好，欢迎来到京西！<span id="login">[<a href="/login.html">登录</a>] [<a href="/register.html">免费注册</a>] </span></li>
					<li class="line">|</li>
                                        <span id='order'></span>
					<li class="line">|</li>
					<li>客户服务</li>
                                        <li class='line'>|</li>
                                        <li><a href="/index.html">首页</a></li>
                                        <span id="log"><li><a href="/Home/index/logout">退出</a></li></span>

				</ul>
			</div>
		</div>
	</div>
	<!-- 顶部导航 end -->
<style>

</style>
	<div style="clear:both;"></div>

	<!-- 头部 start -->
	<div class="header w1210 bc mt15">
		<!-- 头部上半部分 start 包括 logo、搜索、用户中心和购物车结算 -->
		<div class="logo w1210">
			<h1 class="fl"><a href="index.html"><img src="/Public/Home/images/logo.png" alt="京西商城"></a></h1>
			<!-- 头部搜索 start -->
			<div class="search fl">
				<div class="search_form">
					<div class="form_left fl"></div>
					<form action="" name="serarch" method="get" class="fl">
						<input type="text" class="txt" id='key' value="请输入商品关键字" /><input type="submit" class="btn" value="搜索" onclick='location.href="/Home/Search/key/val/"+$("#key").val();return false;'/>
					</form>
					<div class="form_right fl"></div>
				</div>
				
				<div style="clear:both;"></div>

				<div class="hot_search">
					<strong>热门搜索:</strong>
					<a href="">D-Link无线路由</a>
					<a href="">休闲男鞋</a>
					<a href="">TCL空调</a>
					<a href="">耐克篮球鞋</a>
				</div>
			</div>
			<!-- 头部搜索 end -->

			<!-- 用户中心 start-->
			<div class="user fl">
				<dl>
					<dt>
						<em></em>
						<a href="">用户中心</a>
						<b></b>
					</dt>
					<dd>
						<div class="prompt">
							您好，请<a href="">登录</a>
						</div>
						<div class="uclist mt10">
							<ul class="list1 fl">
								<li><a href="">用户信息></a></li>
								<li><a href="">我的订单></a></li>
								<li><a href="">收货地址></a></li>
								<li><a href="">我的收藏></a></li>
							</ul>

							<ul class="fl">
								<li><a href="">我的留言></a></li>
								<li><a href="">我的红包></a></li>
								<li><a href="">我的评论></a></li>
								<li><a href="">资金管理></a></li>
							</ul>

						</div>
						<div style="clear:both;"></div>
						<div class="viewlist mt10">
							<h3>最近浏览的商品：</h3>
							<ul id='recent'>
								
								
							</ul>
						</div>
					</dd>
				</dl>
			</div>
			<!-- 用户中心 end-->

			<!-- 购物车 start -->
			<div class="cart fl">
				<dl>
					<dt>
						<a href="/Home/cart/lst">去购物车结算</a>
						<b></b>
					</dt>
					<dd>
						<div class="prompt" id="prom">
							
                                                  
						</div>
					</dd>
				</dl>
			</div>
			<!-- 购物车 end -->
		</div>
		<!-- 头部上半部分 end -->
		
		<div style="clear:both;"></div>

		<!-- 导航条部分 start -->
		<div class="nav w1210 bc mt10">
			<!--  商品分类部分 start-->
			<div class="category fl <?php if(!$show):?>cat1<?php endif;?>"> <!-- 非首页，需要添加cat1类 -->
				<div class="cat_hd <?php if(!$show):?>off<?php endif;?>">  <!-- 注意，首页在此div上只需要添加cat_hd类，非首页，默认收缩分类时添加上off类，鼠标滑过时展开菜单则将off类换成on类 -->
					<h2>全部商品分类</h2>
					<em></em>
				</div>
				
				<div class="cat_bd <?php if(!$show):?>none<?php endif;?>">
<?php foreach($cats as $k=>$v):?>
					<div class="cat <?php if($k==0) echo 'item1';?>">
						<h3><a href="/Home/Search/cat/id/<?php echo ($v["id"]); ?>"><?php echo ($v["cat_name"]); ?></a> <b></b></h3>

						<div class="cat_detail">
<?php foreach($v['children'] as $k1=>$v1):?>                                                    
                                                     <dl <?php if($k1==0):?>class="dl_1st"<?php endif;?>>
								<dt><a href="/Home/Search/cat/id/<?php echo ($v1["id"]); ?>"><?php echo ($v1["cat_name"]); ?></a></dt>
								<dd>
<?php foreach($v1['children'] as $k2=>$v2):?>				
									<a href="/Home/Search/cat/id/<?php echo ($v2["id"]); ?>"><?php echo ($v2["cat_name"]); ?></a>	
<?php endforeach;?>                                                                       
								</dd>
							</dl>
<?php endforeach;?>
						</div>
					</div>

					
<?php endforeach;?>				
                                </div>
			</div>
			<!--  商品分类部分 end--> 

			<div class="navitems fl">
				<ul class="fl">
					<li class="current"><a href="">首页</a></li>
					<li><a href="">电脑频道</a></li>
					<li><a href="">家用电器</a></li>
					<li><a href="">品牌大全</a></li>
					<li><a href="">团购</a></li>
					<li><a href="">积分商城</a></li>
					<li><a href="">夺宝奇兵</a></li>
				</ul>
				<div class="right_corner fl"></div>
			</div>
		</div>
		<!-- 导航条部分 end -->
	</div>
	<!-- 头部 end-->
	
	<div style="clear:both;"></div>
        <script>
            $.ajax({
                type:'get',
                dataType:'json',
                url:'/Home/Index/ajaxRecent',
                success:function(data){
                    $.each(data,function(k,v){
                       $('#recent').append('<li><a href="/goods/goods_'+v.id+'.html"><img src="<?php echo C('SHOW_PATH');?>'+v.sm_logo+'" alt="" /></a></li>'); 
                    });
                }
            });
            //获取购物车数据
            $.ajax({
                type:'get',
                dataType:'json',
                url:'/Home/cart/ajaxCartList',
                success:function(data){
                  
                    if(data){
                        $('#prom').empty();
                        var html = "<ul style='background:white;width:400px;border:1px;'>";
                         $(data).each(function(k,v){
                                 html += "<li style='padding:10px;'>";
                                 html += '<img width="50" src="/Uploads/'+v.goods.sm_logo+'" />';
                                 html += v.goods.goods_name;
                                 html += '</li>';
                         });
                         html += "</ul>";
                         $("#prom").html(html);
                    }
             
                }
            });
        </script>

	<div style="clear:both;"></div>

	<!-- 列表主体 start -->
	<div class="list w1210 bc mt10">
		<!-- 面包屑导航 start -->
		<div class="breadcrumb">
                    <h2>当前位置：<a href="/index.html">首页</a> > 关键词 > <?php echo I('get.val');?></h2>
		</div>
		<!-- 面包屑导航 end -->

		<!-- 左侧内容 start -->
		<div class="list_left fl mt10">
			<!-- 分类列表 start -->
			<div class="catlist">
				<h2>电脑、办公</h2>
				<div class="catlist_wrap">
					<div class="child">
						<h3 class="on"><b></b>电脑整机</h3>
						<ul>
							<li><a href="">笔记本</a></li>
							<li><a href="">超极本</a></li>
							<li><a href="">平板电脑</a></li>
						</ul>
					</div>

					<div class="child">
						<h3><b></b>电脑配件</h3>
						<ul class="none">
							<li><a href="">CPU</a></li>
							<li><a href="">主板</a></li>
							<li><a href="">显卡</a></li>
						</ul>
					</div>

					<div class="child">
						<h3><b></b>办公打印</h3>
						<ul class="none">
							<li><a href="">打印机</a></li>
							<li><a href="">一体机</a></li>
							<li><a href="">投影机</a></li>
							</li>
						</ul>
					</div>

					<div class="child">
						<h3><b></b>网络产品</h3>
						<ul class="none">
							<li><a href="">路由器</a></li>
							<li><a href="">网卡</a></li>
							<li><a href="">交换机</a></li>
							</li>
						</ul>
					</div>

					<div class="child">
						<h3><b></b>外设产品</h3>
						<ul class="none">
							<li><a href="">鼠标</a></li>
							<li><a href="">键盘</a></li>
							<li><a href="">U盘</a></li>
						</ul>
					</div>
				</div>
				
				<div style="clear:both; height:1px;"></div>
			</div>
			<!-- 分类列表 end -->
				
			<div style="clear:both;"></div>	

			<!-- 新品推荐 start -->
			<div class="newgoods leftbar mt10">
				<h2><strong>新品推荐</strong></h2>
				<div class="leftbar_wrap">
					<ul>
						<li>
							<dl>
								<dt><a href=""><img src="/Public/Home/images/list_hot1.jpg" alt="" /></a></dt>
								<dd><a href="">美即流金丝语悦白美颜新年装4送3</a></dd>
								<dd><strong>￥777.50</strong></dd>
							</dl>
						</li>

						<li>
							<dl>
								<dt><a href=""><img src="/Public/Home/images/list_hot2.jpg" alt="" /></a></dt>
								<dd><a href="">领券满399减50 金斯利安多维片</a></dd>
								<dd><strong>￥239.00</strong></dd>
							</dl>
						</li>

						<li class="last">
							<dl>
								<dt><a href=""><img src="/Public/Home/images/list_hot3.jpg" alt="" /></a></dt>
								<dd><a href="">皮尔卡丹pierrecardin 男士长...</a></dd>
								<dd><strong>￥1240.50</strong></dd>
							</dl>
						</li>
					</ul>
				</div>
			</div>
			<!-- 新品推荐 end -->

			<!--热销排行 start -->
			<div class="hotgoods leftbar mt10">
				<h2><strong>热销排行榜</strong></h2>
				<div class="leftbar_wrap">
					<ul>
						<li></li>
					</ul>
				</div>
			</div>
			<!--热销排行 end -->

			<!-- 最近浏览 start -->
			<div class="viewd leftbar mt10">
				<h2><a href="">清空</a><strong>最近浏览过的商品</strong></h2>
				<div class="leftbar_wrap">
					<dl>
						<dt><a href=""><img src="/Public/Home/images/hpG4.jpg" alt="" /></a></dt>
						<dd><a href="">惠普G4-1332TX 14英寸笔记...</a></dd>
					</dl>

					<dl class="last">
						<dt><a href=""><img src="/Public/Home/images/crazy4.jpg" alt="" /></a></dt>
						<dd><a href="">直降200元！TCL正1.5匹空调</a></dd>
					</dl>
				</div>
			</div>
			<!-- 最近浏览 end -->
		</div>
		<!-- 左侧内容 end -->
	       <a name='mao'></a>
		<!-- 列表内容 start -->
		<div class="list_bd fl ml10 mt10">
			<!-- 热卖、促销 start -->
			<div class="list_top">
				<!-- 热卖推荐 start -->
				<div class="hotsale fl">
					<h2><strong><span class="none">热卖推荐</span></strong></h2>
					<ul>
						<li>
							<dl>
								<dt><a href=""><img src="/Public/Home/images/hpG4.jpg" alt="" /></a></dt>
								<dd class="name"><a href="">惠普G4-1332TX 14英寸笔记本电脑 （i5-2450M 2G 5</a></dd>
								<dd class="price">特价：<strong>￥2999.00</strong></dd>
								<dd class="buy"><span>立即抢购</span></dd>
							</dl>
						</li>

						<li>
							<dl>
								<dt><a href=""><img src="/Public/Home/images/list_hot3.jpg" alt="" /></a></dt>
								<dd class="name"><a href="">ThinkPad E42014英寸笔记本电脑</a></dd>
								<dd class="price">特价：<strong>￥4199.00</strong></dd>
								<dd class="buy"><span>立即抢购</span></dd>
							</dl>
						</li>

						<li>
							<dl>
								<dt><a href=""><img src="/Public/Home/images/acer4739.jpg" alt="" /></a></dt>
								<dd class="name"><a href="">宏碁AS4739-382G32Mnkk 14英寸笔记本电脑</a></dd>
								<dd class="price">特价：<strong>￥2799.00</strong></dd>
								<dd class="buy"><span>立即抢购</span></dd>
							</dl>
						</li>
					</ul>
				</div>
				<!-- 热卖推荐 end -->

				<!-- 促销活动 start -->
				<div class="promote fl">
					<h2><strong><span class="none">促销活动</span></strong></h2>
					<ul>
						<li><b>.</b><a href="">DIY装机之向雷锋同志学习！</a></li>
						<li><b>.</b><a href="">京东宏碁联合促销送好礼！</a></li>
						<li><b>.</b><a href="">台式机笔记本三月巨惠！</a></li>
						<li><b>.</b><a href="">富勒A53g智能人手识别鼠标</a></li>
						<li><b>.</b><a href="">希捷硬盘白色情人节专场</a></li>
					</ul>

				</div>
				<!-- 促销活动 end -->
			</div>
			<!-- 热卖、促销 end -->
			
			<div style="clear:both;"></div>
                        
                        <style>
                               #search_condition{margin:10px;padding-right:0;cursor: pointer;}
				#search_condition .shaixuan{border:1px solid #F00;padding:5px;margin:5px;}
				#search_condition .span{border-left:1px solid #F00;padding:5px;margin-left: 2px;}
				#search_condition span a:hover{background:#F00;color:#FFF;padding:5px;margin-right:0;text-decoration: none;}
                        </style>
                        <div id='search_condition'>
                        筛选条件：
                        <?php if($brand=$_GET['brand']):$brand=trim(strchr($brand,'-'),'-'); ?>
                        <span class='shaixuan'><a href='<?php echo filter_url("brand");?>#mao'>品牌：<?php echo ($brand); ?><span class='span'>×</span></a></span>
                        <?php endif;?>
                         <?php if($brand=$_GET['price']): ?>
                        <span class='shaixuan'><a href='<?php echo filter_url("price");?>#mao'>价格：<?php echo ($brand); ?><span class='span'>×</span></a></span>
                        <?php endif;?>
                        <?php foreach($_GET as $k=>$v):?>
                            <?php if(strpos($k,'attr_')===0): $str=strstr($v,'-');$name=str_replace($str,'',$v);$value=trim($str,'-');?>
                                 <span class='shaixuan'><a href='<?php echo filter_url($k);?>#mao'><?php echo ($name); ?>：<?php echo ($value); ?><span class='span'>×</span></a></span>
                            <?php endif;?>
                        <?php endforeach;?>
                        
                        </div>
			<!-- 商品筛选 start -->
			<div class="filter mt10">
                            <h2><a href="">重置筛选条件</a> <strong>商品筛选</strong></h2>
				<div class="filter_wrap">
                                     <?php if(!$_GET['brand']):?>
					<dl>
                                           
						<dt>品牌：</dt>
						<dd class="cur"><a href="">不限</a></dd>
                                                <?php foreach($data['brands'] as $k=>$v):?>
						<dd><a href="/Home/Search/key/val/%E5%8F%91%E9%80%81%E5%88%B0/brand/<?php echo ($v["id"]); ?>-<?php echo ($v["brand_name"]); ?>#mao"><?php echo ($v['brand_name']); ?></a></dd>
                                                <?php endforeach;?>
                                           
					</dl>
                                    <?php endif;?>
                                    <?php if(!$_GET['price']):?>
					<dl>
						<dt>价格：</dt>
						<dd class="cur"><a href="">不限</a></dd>
                                                <?php foreach($data['price'] as $k=>$v):?>
						<dd><a href="/Home/Search/key/val/%E5%8F%91%E9%80%81%E5%88%B0/price/<?php echo ($v); ?>#mao"><?php echo ($v); ?></a></dd>
                                                <?php endforeach;?>
						
					</dl>
                                    <?php endif;?>
                                       <?php foreach($data['attrs'] as $k=>$v): $arr=explode('-',$k); $attr_name=$arr[0];$id=$arr[1];?>
                                       <?php if(!$_GET['attr_'.$id]):?>
                                       <dl> 
						<dt><?php echo ($attr_name); ?>：</dt>
						<dd class="cur"><a href="">不限</a></dd>
                                                <?php foreach($v as $k1=>$v1):?>
						<dd><a href="/Home/Search/key/val/%E5%8F%91%E9%80%81%E5%88%B0/attr_<?php echo ($id); ?>/<?php echo ($attr_name); ?>-<?php echo ($v1); ?>#mao"><?php echo ($v1); ?></a></dd>
						
                                                <?php endforeach;?>
					</dl>
                                       <?php endif;?>
                                       <?php endforeach;?>
					
				</div>
			</div>
			<!-- 商品筛选 end -->
			
			<div style="clear:both;"></div>

			<!-- 排序 start -->
			<div class="sort mt10">
                            <dl>   <a name='select'></a>
					<dt>排序：</dt>
                                        <dd <?php if(!I('get.orderby')||strpos(I('get.orderby'),'num')!==false):?>class="cur"<?php endif;?>><a href="<?php echo filter_url('orderby');if(I('get.orderby')=='num_desc') echo '/orderby/num_asc';else echo '/orderby/num_desc'; ?>#select">销量</a></dd>
					<dd <?php if(strpos(I('get.orderby'),'pri')!==false):?>class="cur"<?php endif;?>> <a href="<?php echo filter_url('orderby');if(I('get.orderby')=='pri_desc') echo '/orderby/pri_asc';else echo '/orderby/pri_desc'; ?>#select">价格</a></dd>
					<dd <?php if(strpos(I('get.orderby'),'comment')!==false):?>class="cur"<?php endif;?>><a href="<?php echo filter_url('orderby');if(I('get.orderby')=='comment_desc') echo '/orderby/comment_asc';else echo '/orderby/comment_desc'; ?>#select">评论数</a></dd>
					<dd <?php if(strpos(I('get.orderby'),'time')!==false):?>class="cur"<?php endif;?>><a href="<?php echo filter_url('orderby');if(I('get.orderby')=='time_desc') echo '/orderby/time_asc';else echo '/orderby/time_desc'; ?>#select">上架时间</a></dd>
				</dl>
			</div>
			<!-- 排序 end -->
			
			<div style="clear:both;"></div>

			<!-- 商品列表 start-->
			<div class="goodslist mt10">
				<ul>
                                    <?php $path=C('GOODS_PATH'); foreach($result as $k=>$v):?>
					<li>
						<dl>
							<dt><a href="<?php echo ($path); ?>goods_<?php echo ($v["id"]); ?>.html"><?php showImage($v['sm_logo']);?></a></dt>
							<dd><a href="<?php echo ($path); ?>goods_<?php echo ($v["id"]); ?>.html"><?php echo ($v["goods_name"]); ?></a></dt>
							<dd><strong>￥<?php echo ($v["shop_price"]); ?></strong></dt>
							<dd><a href=""><em>已有10人评价,销量<?php echo ($v["num"]); ?></em></a></dt>
						</dl>
					</li>
                                    <?php endforeach;?>
				

				
				</ul>
			</div>
			<!-- 商品列表 end-->

			<!-- 分页信息 start -->
			<div class="page mt20">
<!--				<a href="">首页</a>
				<a href="">上一页</a>
				<a href="">1</a>
				<a href="">2</a>
				<a href="" class="cur">3</a>
				<a href="">4</a>
				<a href="">5</a>
				<a href="">下一页</a>
				<a href="">尾页</a>&nbsp;&nbsp; 
				<span>
					<em>共8页&nbsp;&nbsp;到第 <input type="text" class="page_num" value="3"/> 页</em>
					<a href="" class="skipsearch" href="javascript:;">确定</a>
				</span>-->
                                <?php echo ($fpage); ?>
			</div>
			<!-- 分页信息 end -->

		</div>
		<!-- 列表内容 end -->
	</div>
	<!-- 列表主体 end-->

	<div style="clear:both;"></div>
	<!-- 底部导航 start -->
	<div class="bottomnav w1210 bc mt10">
		<div class="bnav1">
			<h3><b></b> <em>购物指南</em></h3>
			<ul>
				<li><a href="">购物流程</a></li>
				<li><a href="">会员介绍</a></li>
				<li><a href="">团购/机票/充值/点卡</a></li>
				<li><a href="">常见问题</a></li>
				<li><a href="">大家电</a></li>
				<li><a href="">联系客服</a></li>
			</ul>
		</div>
		
		<div class="bnav2">
			<h3><b></b> <em>配送方式</em></h3>
			<ul>
				<li><a href="">上门自提</a></li>
				<li><a href="">快速运输</a></li>
				<li><a href="">特快专递（EMS）</a></li>
				<li><a href="">如何送礼</a></li>
				<li><a href="">海外购物</a></li>
			</ul>
		</div>

		
		<div class="bnav3">
			<h3><b></b> <em>支付方式</em></h3>
			<ul>
				<li><a href="">货到付款</a></li>
				<li><a href="">在线支付</a></li>
				<li><a href="">分期付款</a></li>
				<li><a href="">邮局汇款</a></li>
				<li><a href="">公司转账</a></li>
			</ul>
		</div>

		<div class="bnav4">
			<h3><b></b> <em>售后服务</em></h3>
			<ul>
				<li><a href="">退换货政策</a></li>
				<li><a href="">退换货流程</a></li>
				<li><a href="">价格保护</a></li>
				<li><a href="">退款说明</a></li>
				<li><a href="">返修/退换货</a></li>
				<li><a href="">退款申请</a></li>
			</ul>
		</div>

		<div class="bnav5">
			<h3><b></b> <em>特色服务</em></h3>
			<ul>
				<li><a href="">夺宝岛</a></li>
				<li><a href="">DIY装机</a></li>
				<li><a href="">延保服务</a></li>
				<li><a href="">家电下乡</a></li>
				<li><a href="">京东礼品卡</a></li>
				<li><a href="">能效补贴</a></li>
			</ul>
		</div>
	</div>
	<!-- 底部导航 end -->

	<div style="clear:both;"></div>


	<!-- 底部版权 start -->
	<div class="footer w1210 bc mt10">
		<p class="links">
			<a href="">关于我们</a> |
			<a href="">联系我们</a> |
			<a href="">人才招聘</a> |
			<a href="">商家入驻</a> |
			<a href="">千寻网</a> |
			<a href="">奢侈品网</a> |
			<a href="">广告服务</a> |
			<a href="">移动终端</a> |
			<a href="">友情链接</a> |
			<a href="">销售联盟</a> |
			<a href="">京西论坛</a>
		</p>
		<p class="copyright">
			 © 2005-2013 京东网上商城 版权所有，并保留所有权利。  ICP备案证书号:京ICP证070359号 
		</p>
		<p class="auth">
			<a href=""><img src="/Public/Home/images/xin.png" alt="" /></a>
			<a href=""><img src="/Public/Home/images/kexin.jpg" alt="" /></a>
			<a href=""><img src="/Public/Home/images/police.jpg" alt="" /></a>
			<a href=""><img src="/Public/Home/images/beian.gif" alt="" /></a>
		</p>
	</div>
	<!-- 底部版权 end -->

</body>
</html>
<script>
   login();
   function login(){
       $.ajax({
    type:'get',
    dataType:'json',
    url:'/Home/index/ajaxLogin',
    success:function(data){
         if(data.ok==1){
             is_login=1;
              $('#login').html('[<a href="#">'+data.user+'</a>]');
              $('#log').html('<li><a href="/Home/index/logout">退出</a></li>');
              $('#order').html("<li><a href='/Home/My/lst'>我的订单</a></li>");
         }
    }
   });
   }
</script>