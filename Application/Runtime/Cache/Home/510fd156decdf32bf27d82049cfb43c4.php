<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="Generator" content="68ECSHOP v4_2" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<title>用户中心_人人科技znrr.com多商户V4.2  </title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link rel="stylesheet" type="text/css" href="/Public/ext/css/68ecshop_commin.css" />
<link type="text/css" rel="stylesheet" href="/Public/ext/css/passport.css" />
<script type="text/javascript" src="/Public/ext/js/jquery_email.js"></script>
<script type="text/javascript" src="/Public/ext/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/Public/ext/js/validate/jquery.validate.js"></script>
<script type="text/javascript" src="/Public/ext/js/validate/messages_zh.js"></script>
<script type="text/javascript" src="/Public/ext/js/placeholder.js" ></script>
 <script type="text/javascript" src="/Public/ext/js/register.js">
<!--<script type="text/javascript" src="/js/jquery.json.js"></script>

<script type="text/javascript" src="/js/common.js"></script></script><style type="css/text">-->
label .error{
	color: #900;
}
</style>
</head>
<body onclick="ecshop68_onclick();">
	<script>
function erweima1(obj, sType) { var oDiv = document.getElementById(obj); if (sType == 'show') {oDiv.style.display = 'block';} if (sType == 'hide') {oDiv.style.display = 'none';} }
</script>
	<div class="Logo-r">
		<div class="Logo-info-r">
			<a href="./" class="logo"></a>
            <span class="findpw">欢迎注册</span>
			<a href="http://e.t.qq.com/ecshop_moban" class="qq" ></a> 
<a href="http://weibo.com/345752687" class="sina"></a> 
<span href="javascript:void(0)" class="weixin" onmouseover="erweima1('erweima', 'show');" onmouseout="erweima1('erweima', 'hide');"></span>
<div class="erweima" id="erweima">
	<img alt="微信" src="/Public/ext/images/login/weixin3.png" width="167" height="202">
</div>
		</div>
	</div>
	<div class="blank"></div>
	<div class="blank"></div>
	<div class="w">
				<script type="text/javascript" src="/js/utils.js"></script>		<div class="w" id="regist">
			<div class="mcon register_con">
				<div id="reg-pic" class="box-pic box-pic1"></div>
				<div id="login-box" class="uc_box uc_box_reg">
                	<form action="/Home/Member/register" method="post" id="formRegister" name="formRegister">
                        <input type="hidden" id="register_type" name="type" value="mobile" />
                        <ul class="register_tab">
                            <li id="li_register_type_mobile" class="tab_item fl" register_type="mobile">手机注册<span class="bg_ff"></span></li>
                            <li id="li_register_type_email" class="tab_item cur fl" register_type="email">邮箱注册<span class="bg_ff"></span></li>
                            <li class="have_account fr">已有账号！<a href="user.php?act=login">登录</a></li>
                        </ul>
                    </form>
					<form action="/Home/Member/register" method="post" id="mobileForm" onsubmit='return checkForm(this)' name="formUser" >
						<div class="form">
						<input type="hidden" name="type" id='type' value="mobile" />
														<div class="item">
								<input  name="mobile" type="text" id="name" placeholder="手机" onblur="checkMobilePhone(this)"  class="text" />
								<div>
									<span class="label" id="mobile_phone_notice"></span>
								</div>
							</div>
														<div id="o-password">
								<div class="item">
									<input name="password" type="password" id="password" placeholder="密码" onblur="check_pwd(this);" class="text" />
									<i class="i-pass"></i>
									<div id="pwd_notice" >
										<span class="label" id="password_notice"></span>
									</div>
									
								</div>
                                                                
								<div class="item">
									<input type="password" id="confirm_password" name="confirm_password" class="text" placeholder="确认密码" onblur="chk_confirm(this);" autocomplete="off" />
									<i class="i-pass"></i>
									<div>
										<span class="label" id="conform_password_notice"></span>
									</div>
								</div>
							</div>
							
														
														
							<div class="item" style="margin-bottom: 30px;">
								<input id="code" class="text text_te" type="text" placeholder="手机验证码" name="mobile_code">
								<i class="i-phone"></i>
								<input id="zphone" class="zphone" type="button" value="获取手机验证码 ">
								<div>
									<span id="extend_field5i" class="label"></span>
								</div>
							</div>
														
														
		
							<div class="item">
								<input name="act" type="hidden" value="register">
								<input type="hidden" name="back_act" value="user.php" />
								<input type='submit' id="btn_submit" name="Submit"  class="btn-img btn-regist" value="立即注册" />
							</div>
						</div>
					</form>
                                        	<form action="/Home/Member/register" method="post" id="emailForm"  onsubmit='return checkForm(this)' name="formUser" style="display:none">
						<div class="form">
						<input type="hidden" name="type" id='type' value="email" />
														<div class="item">
								<input name="email" type="text" id="name" placeholder="email" onblur="checkEmail(this)" class="text email" />
								<i class="i-email"></i>
								<div>
									<span class="label" id="email_notice"></span>
								</div>
							</div>
														<div id="o-password">
								<div class="item">
									<input name="password" type="password" id="password" placeholder="密码" onblur="check_pwd(this);" onkeyup="checkIntensity(this.value)" class="text" />
									<i class="i-pass"></i>
									<div id="pwd_notice" >
										<span class="label" id="password_notice"></span>
									</div>
									
								</div>
                                                                                                     
								<div class="item">
									<input type="password" id="confirm_password" name="confirm_password" class="text" placeholder="确认密码" onblur="chk_confirm(this)" autocomplete="off" />
									<i class="i-pass"></i>
									<div>
										<span class="label" id="conform_password_notice"></span>
									</div>
								</div>
							</div>
							
														
														
							<div class="item" style="margin-bottom: 30px;">
								<input id="code" class="text text_te" type="text" placeholder="邮箱验证码" name="email_code" maxlength="6">
								<i class="i-email"></i>
								<input id="zemail" class="zemail" type="button" value="获取邮箱验证码 ">
								<div>
									<span id="extend_field5i" class="label"></span>
								</div>
                                                                    </div>
						
														
							
							<div class="item">
								<input name="act" type="hidden" value="register">
								<input type="hidden" name="back_act" value="user.php" />
								<input  id="btn_submit" type='submit' name="Submit" class="btn-img btn-regist" value="立即注册" />
							</div>
						</div>
					</form>
					<!--[if !ie]>form end<![endif]-->
					
				</div>
			</div>
		</div>
				
		<div class="blank"></div>
	</div>
	
<div class="site-footer">
  <div class="wrapper">
    <div class="footer-info clearfix">
      <div class="info-text">
              <p class="nav_bottom">
                    <a href="http://www.68ecshop.com/ecshop_topic/company/" target="_blank">关于我们</a><em >|</em>
               <a href="http://www.68ecshop.com/article-4.html" target="_blank">联系我们</a><em >|</em>
               <a href="apply_index.php" >商家入驻</a><em >|</em>
               <a href="#" >友情链接</a><em >|</em>
               <a href="http://www.68ecshop.com/sitemap.xml" >站点地图</a><em >|</em>
               <a href="#" >手机商城</a><em >|</em>
               <a href="#" >销售联盟</a><em >|</em>
               <a href="#" >商城社区</a><em >|</em>
               <a href="#" >企业文化</a><em >|</em>
               <a href="help.php" >帮助中心</a><em style="display:none">|</em>
                             </p>
         <p>
      <a href="javascript:;">&copy; 2005-2016 人人科技znrr.com多商户V4.2 版权所有，并保留所有权利。</a> <a href="javascript:;">人人科技znrr.com多商户V4.2 </a>
      <a href="javascript:;"></a>
        <a href="javascript:;"></a>
      </p>
      <p>
                                                                                                      </p>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

</script>	<script type="text/javascript">

	
	$().ready(function(){
		//设置高度
		$(".mcon").height($(".uc_box").height());
		
		$("#formUser").submit(function(){
			return register('mobile');
		});
				
		$("#zemail").click(function(){
			sendEmailCode($("#email"), $("#email_code"), $(this));
		});
		
		$("#zphone").click(function(){
			sendMobileCode($("#mobile_phone"), $("#mobile_code"), $(this));
		});
		
		
		$(".register_tab").find(".cur").removeClass("cur");
		$("#li_register_type_mobile").addClass("cur");
                $('#btn_submit').click(function(){
                    
                });
		$(".tab_item").click(function(){
			$('.tab_item').removeClass("cur");
                        $(this).addClass("cur");
                        //email (
                     
                       
                        if($(this).attr('register_type')=='email'){
                            $('#type').val('email');
                            $('#mobileForm').css('display','none');
                            $('#emailForm').css('display','block');
                        }
                        else{
                              $('#type').val('mobile');
                              $('#emailForm').css('display','none');
                              $('#mobileForm').css('display','block');
                        }
                       
		});
	});
        function checkForm(e){
            
       
            var res_2 = chk_confirm($(e).find('#confirm_password'));
            var res_1 = check_pwd($(e).find('#password'));
            var type=$(e).find('#type').val();
         
            if(type=='email'){
              
                 var res=checkEmail($(e).find('#name'));
            }
            else{
           
                var res=checkMobilePhone($(e).find('#name'));
            }
            var flag = res && res_2 && res_1;
            
            
            
            return flag;
        }
</script>
</body>
</html>