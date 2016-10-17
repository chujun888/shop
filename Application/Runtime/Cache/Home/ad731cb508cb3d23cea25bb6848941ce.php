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

	<!-- 主体部分 start -->
	<div class="mycart w990 mt10 bc">
		<h2><span>我的购物车</span></h2>
		<table>
			<thead>
				<tr>
					<th class="col1">商品名称</th>
					<th class="col2">商品信息</th>
					<th class="col3">单价</th>
					<th class="col4">数量</th>	
					<th class="col5">小计</th>
					<th class="col6">操作</th>
				</tr>
			</thead>
			<tbody>
                            <?php foreach($data as $k=>$v):?>
				<tr>
					<td class="col1"><a href="/goods/goods_<?php echo ($v["goods_id"]); ?>.html"><?php showImage($v['goods']['sm_logo']);?></a>  <strong><a href=""><?php echo ($v['goods']['goods_name']); ?></a></strong></td>
					<td class="col2"> <?php foreach($v['attrs'] as $k1=>$v1):?><p><?php echo ($v1['attr_name']); ?>：<?php echo ($v1["attr_value"]); ?></p><?php endforeach;?>  </td>
					<td class="col3">￥<span><?php echo ($v['goods']['price']); ?></span></td>
					<td class="col4" id='<?php echo ($v["goods_id"]); ?>-<?php echo ($v["attr_id"]); ?>'> 
						<a href="javascript:;" class="reduce_num" onclick='change(-1,this)'></a>
						<input type="text" name="amount" value="<?php echo ($v['goods_num']); ?>" onblur='change(2,this)' class="amount"/>
						<a href="javascript:;" class="add_num" onclick='change(1,this)'></a>
					</td>
					<td class="col5">￥<span><?php echo $v['goods']['price']*$v['goods_num'];?></span></td>
                                        <td class="col6"><a href="javascript:void(0);" id='<?php echo ($v["goods_id"]); ?>' attr="<?php echo ($v["attr_id"]); ?>" onclick='removeCart(this)'>删除</a></td>
				</tr>
                           <?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="6">购物金额总计： <strong>￥ <span id="total"><?php echo ($total); ?></span></strong></td>
				</tr>
			</tfoot>
		</table>
		<div class="cart_btn w990 bc mt10">
			<a href="/index.html" class="continue">继续购物</a>
			<a href="/Home/Order/lst" class="checkout">结 算</a>
		</div>
	</div>
	<!-- 主体部分 end -->

	<div style="clear:both;"></div>
        <script>
            //删除数据
           function removeCart(e){
               if(confirm('确定删除吗')){
               $.ajax({
                   type:'get',
                   dataType:'json',
                   url:'/Home/Cart/ajaxDelete/id/'+$(e).attr('id')+'/attr/'+$(e).attr('attr'),
                   success:function(data){
                       if(data.ok==1){
                           $(e).parent().parent().remove();
                       }
                       else{
                           alert('删除失败');
                       }
                   }
               });
           }
         }
         function  change(type,e){
            var val=$(e).parent().find('input').val();
            var id=$(e).parent().attr('id');
            //商品数量
            if(type==1){
                val++;
            }
            if(type==-1){
                val--;
            }
           $.ajax({
               type:'get',
               dataType:'json',
               url:'/Home/Cart/ajaxChange/id/'+id+'/val/'+val,
           });
            
         }
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