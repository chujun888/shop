<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/admin/Public/styles/general.css" rel="stylesheet" type="text/css" />


<style type="text/css">
#header-div {
  background:url(/admin/Public/images/top_bg.gif) repeat-x;

}
a{font-family:"微软雅黑";}
#logo-div {
  height: 68px; width:275px;   float: left;
}

#admininfo-div{height:68px; line-height:68px; width:250px; float:left;}
#admininfo-div span.left{float:left;height:68px; line-height:58px;background:url(/admin/Public/images/ui_04.png) no-repeat 10px 12px; text-indent:30px; color:#d2d4d1;}
#admininfo-div span.right{float:left;height:68px; line-height:58px;background:url(/admin/Public/images/ui_17.png) no-repeat 5px 13px; text-indent:20px; color:#e9e9e9;}
#admininfo-div span.right a{color:#e9e9e9;}

#license-div {
  height: 68px;
  float: left;
  text-align:left;
  vertical-align:middle;
  line-height:58px;
}
#license1-div {
  height: 68px;
  float: left; text-align:left;
  vertical-align:middle;
  line-height:68px;
}

#license-div a:visited, #license-div a:link {
  color: #EB8A3D;
}

#license-div a:hover {
  text-decoration: none;
  color: #EB8A3D;
}

#submenu-div {
  height: 68px;
}

#submenu-div ul {
  margin: 0;
  padding: 0;
  list-style-type: none;
}

#submenu-div li {
float: right;
 width:77px;  text-align:center; height:68px; background:url(/admin/Public/images/top_line.gif) no-repeat left top;
}
#submenu-div li a{
display:block; background:url(/admin/Public/images/top_header.png) no-repeat left top; padding-top:30px; height:38px; line-height:38px;
}

#submenu-div li.show_1 a{
	background-position: 8px -3px;
}
#submenu-div li.show_2 a{
	background-position: -66px -3px;
}
#submenu-div li.show_3 a{
	background-position: -135px -3px;
}
#submenu-div li.show_4 a{
	background-position: -206px -3px;
}
#submenu-div li.show_5 a{
	background-position: -281px -3px;
}
#submenu-div li.show_6 a{
	background-position: -352px -3px;
}
#submenu-div li.show_7 a{
	background-position: -420px -3px;
}
#submenu-div li.show_8 a{
	background-position: -488px -3px;
}
#submenu-div li.show_9 a{
	background-position: -562px -3px;
}
#submenu-div li.show_11 a{
	background-position: -636px -3px;
}
#submenu-div a:visited, #submenu-div a:link {
  color: #ffffff;
  text-decoration: none;
}

#submenu-div li a:hover {
background:url(/admin/Public/images/top_header_hover.png) no-repeat; 
}
#submenu-div li.show_1 a:hover{
	background-position: -2px -1px;
}
#submenu-div li.show_2 a:hover{
	background-position: -76px -1px;
}
#submenu-div li.show_3 a:hover{
	background-position: -145px -1px;
}
#submenu-div li.show_4 a:hover{
	background-position: -216px -1px;
}
#submenu-div li.show_5 a:hover{
	background-position: -291px -1px;
}
#submenu-div li.show_6 a:hover{
	background-position: -362px -1px;
}
#submenu-div li.show_7 a:hover{
	background-position: -430px -1px;
}
#submenu-div li.show_8 a:hover{
	background-position: -498px -1px;
}
#submenu-div li.show_9 a:hover{
	background-position: -572px -1px;
}
#submenu-div li.show_11 a:hover{
	background-position: -646px -1px;
}
#loading-div {
  clear: right;
  text-align: right;
  display: block;
}

#menu-div {
  height: 45px;
  line-height:45px;
}

#menu-div ul {
  margin: 0;
  padding: 0;
  list-style-type: none; 
}

#menu-div li {
  float: left; 
}
#menu-div li.midd_21 {
	background:url(/admin/Public/images/midd.png) no-repeat;background-position:10px 13px; border-left:4px #0e94d1 solid; text-indent:12px;

}
#menu-div li.midd_22 {
		background:url(/admin/Public/images/midd.png) no-repeat;background-position:0px -18px;

}
#menu-div li.midd_23 {
	background:url(/admin/Public/images/midd.png) no-repeat;background-position:0px -54px;

}
#menu-div li.midd_1 {
	background:url(/admin/Public/images/midd.png) no-repeat;background-position:0px -93px;
}
#menu-div li.midd_2 {
	background:url(/admin/Public/images/midd.png) no-repeat;background-position:0px -133px;
}
#menu-div li.midd_3 {
	background:url(/admin/Public/images/midd.png) no-repeat;background-position:0px -172px;
}
#menu-div li.midd_4 {
	background:url(/admin/Public/images/midd.png) no-repeat;background-position:0px -208px;
}
#menu-div li.midd_5 {
	background:url(/admin/Public/images/midd.png) no-repeat;background-position:0px -245px;
}
#menu-div li#xinjian_div {
	background:url(/admin/Public/images/midd.png) no-repeat;background-position:0px -274px;
}

#menu-div li span{
background:url(/admin/Public/images/numberico.png) no-repeat right bottom; display:inline-block; color:#FFF; font-size:12px; height:18px; padding:0px; text-align:center; line-height:18px; padding-right:8px; margin-left:5px;}
#menu-div li span em{
background:url(/admin/Public/images/numberico.png) no-repeat left top; width:8px;display:inline-block;font-size:12px;  height:18px; vertical-align:top;}
#menu-div a:visited, #menu-div a:link {
  display:block;
  padding: 0 20px;
  text-decoration: none;
  color: #5f5f5f;
}

#menu-div a:hover {
  color: #5f5f5f;
}

#submenu-div a.fix-submenu{clear:both; margin-left:5px; padding:1px 5px; *padding:3px 5px 5px; background:#DDEEF2; color:#FA841E;}
#submenu-div a.fix-submenu:hover{padding:1px 5px; *padding:3px 5px 5px; background:#FFF; color:#FA841E;}
#menu-div li.fix-spacel{background:none;}
#menu-div li.fix-spacer{background:none;}
#tabbar-div {
  background:#0e94d1; font-family:"微软雅黑";
width:196px; height:45px; float:left; line-height:45px; color:#ffffff; font-size:14px; font-weight:bold; text-indent:18px;
}

.top_mune{height:45px; line-height:45px; background:#e6e6e6;}


#mask {
	BACKGROUND: #000; WIDTH: 100%; POSITION: absolute; HEIGHT: 100%; opacity: .5
}
#popupmenu {
	DISPLAY: none; Z-INDEX: 900; WIDTH: 100%; POSITION: absolute; TOP: 50px; HEIGHT: 100%
}
.shwobox1 {
	BORDER-RIGHT: #c8d2d5 2px solid; Z-INDEX: 9; RIGHT: 3px; WIDTH: 485px; BORDER-BOTTOM: #c8d2d5 2px solid; ZOOM: 1; POSITION: absolute; TOP: 0px; BACKGROUND-COLOR: #f5fafe
}
.shwobox1 .box {
	BORDER-RIGHT: #4294ce 1px solid; PADDING-RIGHT: 20px; BORDER-TOP: #4294ce 1px solid; PADDING-LEFT: 20px; PADDING-BOTTOM: 58px; BORDER-LEFT: #4294ce 1px solid; PADDING-TOP: 10px; BORDER-BOTTOM: #4294ce 1px solid; ZOOM: 1
}
.shwobox1 .box DL {
	PADDING-LEFT: 10px; FLOAT: left; WIDTH: 100px; PADDING-TOP: 10px
}
.shwobox1 .box DL DT {
	FONT-WEIGHT: bold; FONT-SIZE: 16px; LINE-HEIGHT: 30px; HEIGHT: 30px
}
.shwobox1 .box DL DT A {
	COLOR: #069
}
.shwobox1 .box DD {


	FONT-SIZE: 14px; LINE-HEIGHT: 1.8
}
.shwobox1 .box DD A {
	COLOR: #333
}
.shwobox1 .box DD A:hover {
	COLOR: #f00
}
.shwobox1 .box EM {
	Z-INDEX: 99; RIGHT: 10px; WIDTH: 17px; CURSOR: pointer; BOTTOM: 10px; POSITION: absolute; HEIGHT: 17px
}
</style>
<script type="text/javascript" src="..//admin/Public/js/transport.org.js"></script><script type="text/javascript">
onload = function()
{
  Ajax.call('index.php?is_ajax=1&act=license','', start_sendmail_Response, 'GET', 'JSON');
}
/**
 * 帮助系统调用
 */
function web_address()
{
  var ne_add = parent.document.getElementById('main-frame');
  var ne_list = ne_add.contentWindow.document.getElementById('search_id').innerHTML;
  ne_list.replace('-', '');
  var arr = ne_list.split('-');
  window.open('help.php?al='+arr[arr.length - 1],'_blank');
}


/**
 * 授权检测回调处理
 */
function start_sendmail_Response(result)
{
  // 运行正常
  if (result.error == 0)
  {
    var str = '';
		if (result['content']['auth_str'])
		{
			str = '<a href="javascript:void(0);" target="_blank">' + result['content']['auth_str'];
			if (result['content']['auth_type'])
			{
				str += '[' + result['content']['auth_type'] + ']';
			}
			str += '</a> ';
		}

    document.getElementById('license-div').innerHTML = str;
  }
}

function modalDialog(url, name, width, height)
{
  if (width == undefined)
  {
    width = 400;
  }
  if (height == undefined)
  {
    height = 300;
  }

  if (window.showModalDialog)
  {
    window.showModalDialog(url, name, 'dialogWidth=' + (width) + 'px; dialogHeight=' + (height+5) + 'px; status=off');
  }
  else
  {
    x = (window.screen.width - width) / 2;
    y = (window.screen.height - height) / 2;

    window.open(url, name, 'height='+height+', width='+width+', left='+x+', top='+y+', toolbar=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, modal=yes');
  }
}

function ShowToDoList()
{
  try
  {
    var mainFrame = window.top.frames['main_frame'];
    mainFrame.window.showTodoList(adminId);
  }
  catch (ex)
  {
  }
}


var adminId = "2"; 
</script>
<script>
function toggleMenu_top(){
frmBody1 = parent.document.getElementById('frame-all');
 if (frmBody1.rows == "113,*")
  {
frmBody1.rows="40,*";
	document.getElementById("header-div").style.display="none";
document.getElementById("midd_show").innerHTML="显示";
	}
  else
  {
frmBody1.rows="113,*";
		document.getElementById("header-div").style.display="block";
	document.getElementById("midd_show").innerHTML="隐藏";
}
}
</script>
</head>
<body>
<div id="header-div" style="display:block;">
<div id="logo-div"><img src="/admin/Public/images/ecshop_logo.png" alt="68ECSHOP" /></div>

<div id="license-div" style="bgcolor:#000000;"></div>
  <div id="license1-div" style="bgcolor:#000000;">
         </div> 
<div id="submenu-div">
<ul>
<li class="show_9"><a href="/admin/Back/Index/logout" target="_top">退出</a></li>
<!--<li class="show_8"><a href="javascript:web_address();">帮助</a></li>-->
<li class="show_8"><a href="http://www.68ecshop.com/ecshop_school.html" target="_blank">帮助</a></li>
<li class="show_7"><a href="http://www.68ecshop.com/ecshop_topic/company/"  target="_blank">关于我们</a></li>
<li class="show_6"><a href="/admin/Back/manage/edit/id/<?php echo session('id');?>" target="main_frame">个人设置</a></li>


<li class="show_5"><a href="message.php?act=list" target="main_frame">管理留言</a></li>

<!--<li class="show_11"><a href="index.php?act=clear_cache_mobile" class="qinghc" target="main_frame">手机缓存</a></li>
<li class="show_4"> <a href="index.php?act=clear_cache" class="qinghc" target="main_frame">清除缓存</a></li>
<li class="show_4"><a href="index.php?act=clear_html"  target="main_frame">更新全部静态</a></li>
<li class="show_4"><a href="index.php?act=clear_index"  target="main_frame">更新首页静态</a></li>
<li class="show_1"><a href="../" target="_blank">查看网店</a></li>--></ul>
       <div id="load-div" style="padding: 5px 0px 0 0; text-align: right; color: #FF9900; display: none;width:20%;float:right; height:68px; line-height:58px;"> 正在处理您的请求...</div>
  </div>
</div>
<div class="top_mune">
<div id="tabbar-div">
导航菜单</div>
<script>
function show_popup(){
frmBody = parent.document.getElementById('frame-body');
if (frmBody.cols == "37, 12, *")
{
parent.main_frame.document.getElementById('menu_list').style.left = '195px';
}
else
{
parent.main_frame.document.getElementById('menu_list').style.left = '40px';
}
if(parent.main_frame.document.getElementById('menu_list').style.display == 'none')
{
setTimeout("parent.main_frame.document.getElementById('menu_list').style.display = 'block';",1);
}
else{
setTimeout("parent.main_frame.document.getElementById('menu_list').style.display = 'none';",1);
}
}
function hide_popup(){

setTimeout("parent.main_frame.document.getElementById('menu_list').style.display = 'none';",1);
}
</script>
 
<div id="menu-div">
<ul>
<li class="midd_21"><a href="javascript:void(0)" onclick="toggleMenu_top();" id="midd_show">隐藏</a></li>
<!--<li id="xinjian_div">
<a href="javascript:void(0)" onmouseover="show_popup()" style="display:block;"> 新建 </a>
</li>
    
-->    <li class="midd_22"><a href="/admin/Back/Index/main" target="main_frame">起始页</a></li>
<!--    <li class="midd_23"><a href="privilege.php?act=modif" target="main_frame">设置导航栏</a></li>-->
    <li class="midd_1"><a href="/admin/Back/goods/lst" target="main_frame">商品列表<span><em></em>117</span></a></li>
    <li class="midd_2"><a href="javascript:void(0);" target="main_frame">订单列表<span><em></em>0</span></a></li>
<!--    <li class="midd_3"><a href="comment_manage.php?act=list" target="main_frame">用户评论<span><em></em>143</span></a></li>
    <li class="midd_4"><a href="users.php?act=list" target="main_frame">会员列表</a></li>
    <li class="midd_5"><a href="shop_config.php?act=list_edit" target="main_frame">商店设置</a></li>-->
    <li class="fix-spacer"></li>
      
  </ul>
    
  <br class="clear" />
</div>
</div>
</body>
</html>