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

	<div style="clear:both;"></div>
	
	<!-- 页面头部 start -->
	<div class="header w990 bc mt15">
		<div class="logo w990">
			<h2 class="fl"><a href="index.html"><img src="/Public/Home/images/logo.png" alt="京西商城"></a></h2>
			<div class="flow fr flow2">
				<ul>
					<li>1.我的购物车</li>
					<li class="cur">2.填写核对订单信息</li>
					<li>3.成功提交订单</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- 页面头部 end -->
	
	<div style="clear:both;"></div>

	<!-- 主体部分 start -->
	<div class="fillin w990 bc mt15">
		<div class="fillin_hd">
			<h2>填写并核对订单信息</h2>
		</div>

		<div class="fillin_bd">
			<!-- 收货人信息  start-->
			<div class="address">
				<h3>收货人信息</h3>
				

				<div class="address_select ">
				
					<form action="/Home/order/add"  name="address_form" id='add_form'  method='post'>
						<ul>
							<li>
								<label for=""><span>*</span>收 货 人：</label>
								<input type="text" name="shr_name" class="txt" />
							</li>
							<li>
								<label for=""><span>*</span>所在地区：</label>
								<select name="shr_pro" id="province">
                                                                    <option value="">请选择省份</option>
								</select>

								<select name="shr_city" id="city">
                                                                    <option value="">请选择城市</option>
								</select>

								<select name="shr_arae" id="piec">
									<option value="">请选择地区</option>
									
								</select>
							</li>
							<li>
								<label for=""><span>*</span>详细地址：</label>
								<input type="text" name="shr_address" class="txt address"  />
							</li>
							<li>
								<label for=""><span>*</span>手机号码：</label>
								<input type="text" name="shr_tel" class="txt" />
							</li>
						</ul>
					</form>
					<a href="#" class="confirm_btn"><span>保存收货人信息</span></a>
				</div>
			</div>
			<!-- 收货人信息  end-->

			



			

			<!-- 商品清单 start -->
			<div class="goods">
				<h3>商品清单</h3>
				<table>
					<thead>
                                            
						<tr>
							<th class="col1">商品</th>
							<th class="col2">规格</th>
							<th class="col3">价格</th>
							<th class="col4">数量</th>
							<th class="col5">小计</th>
						</tr>	
					</thead>
					<tbody>
                                            <?php foreach($data as $k=>$v):?>
						<tr>
							<td class="col1"><a href=""><?php showImage($v['goods']['sm_logo']);?></a>  <strong><a href=""><?php echo ($v["goods"]["goods_name"]); ?></a></strong></td>
							<td class="col2"> <?php foreach($v['attrs'] as $k1=>$v1):?><p><?php echo ($v1["attr_name"]); ?>：<?php echo ($v1["attr_value"]); ?></p> <?php endforeach;?> </td>
							<td class="col3">￥<?php echo ($v['goods']['price']); ?></td>
							<td class="col4"> <?php echo ($v["goods_num"]); ?></td>
							<td class="col5"><span>￥<?php echo $v['goods_num']*$v['goods']['price'];?></span></td>
						</tr>
					   <?php endforeach;?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="5">
								<ul>
									<li>
										<span><?php count($data);?> 件商品，总商品金额：</span>
										<em>￥<?php echo ($total); ?></em>
									</li>
									
								
								</ul>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- 商品清单 end -->
		
		</div>

		<div class="fillin_ft">
			<a href="javascript:void(0);" onclick='$("#add_form").submit();'><span>提交订单</span></a>
			<p>应付总额：<strong>￥<?php echo ($total); ?>元</strong></p>
			
		</div>
	</div>
	<!-- 主体部分 end -->

	<div style="clear:both;"></div>
        <script>
            var area='';
            $.ajax({
                type:'get',
                dataType:'xml',
                url:'/Public/ChinaArea.xml',
                
                success:function(msg){
                   area=$(msg);
                   //初始化
                  
                   $(msg).find('province').each(function(k,v){
                       $('#province').append("<option value='"+$(v).attr('province')+"'>"+$(v).attr('province')+"</option>");
                       
                   });
                }
            });
            //省份
            $('#province').change(function(e){
               $('#city').empty();
               var province=$(this).val();
               $('#city').append('<option value="">请选择城市</option>');
               area.find('province[province='+province+'] City').each(function(){
                   $('#city').append("<option value='"+$(this).attr('City')+"'>"+$(this).attr('City')+"</option>");
               });
               
            });
            //城市
            $('#city').change(function(e){
              $('#piec').empty();
               var city=$(this).val();
               $('#piec').append('<option value="">请选择地区</option>');
               area.find('City[City='+city+'] Piecearea').each(function(){
                   $('#piec').append("<option value='"+$(this).attr('Piecearea')+"'>"+$(this).attr('Piecearea')+"</option>");
               });
           });
        </script>

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