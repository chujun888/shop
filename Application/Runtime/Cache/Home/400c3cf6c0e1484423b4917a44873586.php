<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        
	<title>系统提示</title>
	<link rel="stylesheet" href="/Public/Home/style/base.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/global.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/header.css" type="text/css">
        
	<link rel="stylesheet" href="/Public/Home/style/bottomnav.css" type="text/css">
	<link rel="stylesheet" href="/Public/Home/style/footer.css" type="text/css">
        
	<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/header.js"></script>
       
</head>
    <style>
        /*代码增加2014-12-23 by www.68ecshop.com  _end */
/*系统信息提示 2015-07-16*/
.message {
	background: #FAFAFA;
	padding: 20px 0px 20px;
	clear: both
}
.message .message_all {
	width: 1150px;
	height: auto;
	margin: 0 auto;
	padding: 15px 30px;
	background: #ffffff;
}
.message .message_all .message_tit {
	height: 40px;
	line-height: 40px;
	font-size: 18px;
	border-bottom: 1px #eaeaea solid
}
.message .message_all .message_con {
	min-height: 80px;
	height: auto;
	width: 1150px;
	padding: 60px 0px;
	text-align: center;
}
.message .message_all .message_con p {
	height: 30px;
	line-height: 30px;
	font-family: microsoft yahei
}
.message .message_all .message_con p.msg_con {
	color: #E31939;
	font-size: 14px;
}
    </style>
<body>
	<!-- 顶部导航 start -->
	<div class="topnav">
		<div class="topnav_bd w1210 bc">
			<div class="topnav_left">
				
			</div>
			<div class="topnav_right fr">
				<ul>
					<li>您好，欢迎来到京西！[<a href="login.html">登录</a>] [<a href="register.html">免费注册</a>] </li>
					<li class="line">|</li>
					<li>我的订单</li>
					<li class="line">|</li>
					<li>客户服务</li>

				</ul>
			</div>
		</div>
	</div>
	<!-- 顶部导航 end -->
<div class="message">
    <div class="message_all">
      <h3 class="message_tit">系统信息</h3>
      <div class="message_con">
          <p class="msg_con"><?php if(isset($message)) echo $message;else echo $error;?></p>     
          <p><a href="<?php echo ($jumpUrl); ?>" id='second'>等待后<?php echo ($waitSecond); ?>秒后跳转</a></p>
                        </div>
    </div>
</div>
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
    var url="<?php echo ($jumpUrl); ?>";
    var time=<?php echo ($waitSecond); ?>;
    setInterval(setTime,1000);
    function setTime(){
        time--;
        if(time==0)
            location.href=url;
        else{
            $('#second').text("等待后"+time+"跳转");
        }
    }
</script>