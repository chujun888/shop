<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商之翼 管理中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/admin/Public/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/admin/Public/styles/main.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="..//admin/Public/js/utils.js"></script><script type="text/javascript" src="/admin/Public/js/validator.js"></script><script language="JavaScript">
<!--
// 这里把JS用到的所有语言都赋值到这里
var process_request = "正在处理您的请求...";
var todolist_caption = "记事本";
var todolist_autosave = "自动保存";
var todolist_save = "保存";
var todolist_clear = "清除";
var todolist_confirm_save = "是否将更改保存到记事本？";
var todolist_confirm_clear = "是否清空内容？";
var user_name_empty = "管理员用户名不能为空!";
var password_invaild = "密码必须同时包含字母及数字且长度不能小于6!";
var email_empty = "Email地址不能为空!";
var email_error = "Email地址格式不正确!";
var password_error = "两次输入的密码不一致!";
var captcha_empty = "您没有输入验证码!";

if (window.parent != window)
{
  window.top.location.href = location.href;
}

//-->
</script>
</head>
<body style="background:url(/admin/Public/images/login_bg.png) repeat-x;padding:0px;">
<div style="width:1210px;height:768px;margin:0 auto;background:url(/admin/Public/images/login_dl.jpg) no-repeat; " >
<form method="post" action="privilege.php" name='theForm' onsubmit="return validate()">
  <table cellspacing="0" cellpadding="0" style=" padding-top:295px; " align="center" class="login_dl">
  <tr>
<td class="dl">
      <table cellspacing="0" cellpadding="0" width="100%">
      <tr>
        <td class="dl_1" width="22%">用户名</td>
        <td><input type="text" name="username" class="text_input1"/></td>
      </tr>
      <tr>
        <td class="dl_2">密　码</td>
        <td><input type="password" name="password"  class="text_input1"/></td>
      </tr>
           <tr class="low_height">
        <td>&nbsp;</td>
        <td><input type="checkbox" value="1" name="remember" id="remember" /><label for="remember" >保存登录信息。</label></td></tr>
      <tr>
      	<td colspan="2" align="center"><input type="submit" value="登&nbsp;录" class="button2" /></td>
      </tr>
      <tr class="low_height1">
        <td colspan="2" align="right">&raquo; <a href="../" >返回首页</a> &raquo; <a href="get_password.php?act=forget_pwd">您忘记了密码吗?</a></td>
      </tr>
      </table>
    </td>
  </tr>
  </table>
  <input type="hidden" name="act" value="signin" />
</form>
</div>
<script language="JavaScript">
<!--
  document.forms['theForm'].elements['username'].focus();
  
  /**
   * 检查表单输入的内容
   */
  function validate()
  {
    var validator = new Validator('theForm');
    validator.required('username', user_name_empty);
    //validator.required('password', password_empty);
    if (document.forms['theForm'].elements['captcha'])
    {
      validator.required('captcha', captcha_empty);
    }
    return validator.passed();
  }
  
//-->
</script>
</body>