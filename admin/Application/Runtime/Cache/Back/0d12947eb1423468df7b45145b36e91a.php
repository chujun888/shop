<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: user_info.htm 16854 2009-12-07 06:20:09Z sxc_shop $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商之翼 管理中心 - 添加会员 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/admin/Public/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/admin/Public/styles/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/admin/Public/js/jquery-1.6.2.min.js"></script><script type="text/javascript" src="/admin/Public/js/jquery.json.js"></script><script type="text/javascript" src="/js/transport.js"></script><script type="text/javascript" src="/admin/Public/js/common.js"></script>
</head>
<body>

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
parent.main_frame.document.getElementById('menu_list').style.display = 'block';
}
function hide_popup(){

parent.main_frame.document.getElementById('menu_list').style.display = 'none';
}
</script>
<h1>
<span class="action-span"><a href="users.php?act=list">会员列表</a></span>
<span class="action-span1"><a href="index.php?act=main">商之翼 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加会员 </span>
<div style="clear:both"></div>
</h1>
<script type="text/javascript" src="/js/transport.org.js"></script><script type="text/javascript" src="/js/region.js"></script><div class="main-div">
<!-- #代码增加2014-12-23 by www.68ecshop.com  _star -->
<form method="post" action="users.php" name="theForm" onsubmit="return validate()" enctype="multipart/form-data">
<!-- #代码增加2014-12-23 by www.68ecshop.com  _end -->
<table width="100%" >
  <tr>
    <td class="label">会员名称:</td>
    <td><input type="text" name="username" maxlength="60" value="" /><span class="require-field">*</span></td>
  </tr>
    <tr>
    <td class="label">邮件地址:</td>
    <td><input type="text" id="email" name="email" maxlength="60" size="40" value="" /><span class="require-field">*</span></td>
  </tr>
  <tr>
    <td class="label">手机:</td>
    <td><input type="text" id="mobile_phone" name="mobile_phone" maxlength="60" size="40" value="" /><span class="require-field">*</span></td>
  </tr>
    <tr>
    <td class="label">登录密码:</td>
    <td><input type="password" name="password" maxlength="20" size="20" /><span class="require-field">*</span></td>
  </tr>
  <tr>
    <td class="label">确认密码:</td>
    <td><input type="password" name="confirm_password" maxlength="20" size="20" /><span class="require-field">*</span></td>
  </tr>
    <tr>
    <td class="label">会员等级:</td>
    <td><select name="user_rank">
      <option value="0">非特殊等级</option>
      <option value="5">QQ</option>    </select></td>
  </tr>
  <tr>
    <td class="label">性别:</td>
    <td><input type="radio" name="sex" value="0" checked>&nbsp;保密&nbsp;<input type="radio" name="sex" value="1">&nbsp;男&nbsp;<input type="radio" name="sex" value="2">&nbsp;女&nbsp;</td>
  </tr>

  <tr>
    <td class="label">信用额度:</td>
    <td><input name="credit_line" type="text" id="credit_line" value="0" size="10" /></td>
  </tr>
    <!-- #代码增加2014-12-23 by www.68ecshop.com  _star -->
  <tr>
  	<td class="label">真实姓名:</td>
    <td><input type="text" name="real_name" size="40" class="inputBg" value=""/></td>
  </tr>

  
  <tr>
  	<td class="label">现居地:</td>
    <td>
    			<select name="country" id="selCountries" onchange="region.changed(this, 1, 'selProvinces')">
                <option value="0">请选择</option>
                                <option value="1" >中国</option>
                              </select>
              <select name="province" id="selProvinces" onchange="region.changed(this, 2, 'selCities')">
                <option value="0">请选择</option>
                              </select>
              <select name="city" id="selCities" onchange="region.changed(this, 3, 'selDistricts')">
                <option value="0">请选择</option>
                              </select>
              <select name="district" id="selDistricts" style="display:none">
                <option value="0">请选择</option>
                              </select>
    </td>
  </tr>
  <tr>
  	<td class="label">详细地址:</td>
    <td><input type="text" name="address" value="" /></td>
  </tr>
  
  <tr>
  	<td class="label">审核状态:</td>
    <td>
    	<select name="status">
        	<option value="0"  selected="selected">请选择审核状态</option>
            <option value="1" >审核通过</option>
            <option value="2" >审核中</option>
            <option value="3" >审核不通过</option>      
        </select>
    </td>
  </tr>
  <!-- #代码增加2014-12-23 by www.68ecshop.com  _end -->
      <tr>
    <td colspan="2" align="center">
      <input type="submit" value=" 确定 " class="button" />
      <input type="reset" value=" 重置 " class="button" />
      <input type="hidden" name="act" value="insert" />
      <input type="hidden" name="id" value="" />    </td>
  </tr>
</table>

</form>
</div>
<script type="text/javascript" src="/js/utils.js"></script><script type="text/javascript" src="/admin/Public/js/validator.js"></script>
<script language="JavaScript">
<!--
region.isAdmin = true;


<div id="footer">
共执行 7 个查询，用时 0.302643 秒，Gzip 已禁用，内存占用 2.812 MB<br />
版权所有 &copy; 2008-2015 秦皇岛商之翼网络科技有限公司，并保留所有权利。</div>


<!--
<embed src="/admin/Public/images/online.wav" width="0" height="0" autostart="false" name="msgBeep" id="msgBeep" enablejavascript="true"/>
-->
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://active.macromedia.com/flash2/cabs/swflash.cab#version=4,0,0,0" id="msgBeep" width="1" height="1">
  <param name="movie" value="/admin/Public/images/online.swf">
  <param name="quality" value="high">
  <embed src="/admin/Public/images/online.swf" name="msgBeep" id="msgBeep" quality="high" width="0" height="0" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?p1_prod_version=shockwaveflash">
  </embed>
</object>

<script language="JavaScript">
document.onmousemove=function(e)
{
  var obj = Utils.srcElement(e);
  if (typeof(obj.onclick) == 'function' && obj.onclick.toString().indexOf('listTable.edit') != -1)
  {
    obj.title = '点击修改内容';
    obj.style.cssText = 'background: #278296;';
    obj.onmouseout = function(e)
    {
      this.style.cssText = '';
    }
  }
  else if (typeof(obj.href) != 'undefined' && obj.href.indexOf('listTable.sort') != -1)
  {
    obj.title = '点击对列表排序';
  }
}
<!--


var MyTodolist;
function showTodoList(adminid)
{
  if(!MyTodolist)
  {
    var global = $import("/js/global.js","js");
    global.onload = global.onreadystatechange= function()
    {
      if(this.readyState && this.readyState=="loading")return;
      var md5 = $import("/admin/Public/js/md5.js","js");
      md5.onload = md5.onreadystatechange= function()
      {
        if(this.readyState && this.readyState=="loading")return;
        var todolist = $import("/admin/Public/js/todolist.js","js");
        todolist.onload = todolist.onreadystatechange = function()
        {
          if(this.readyState && this.readyState=="loading")return;
          MyTodolist = new Todolist();
          MyTodolist.show();
        }
      }
    }
  }
  else
  {
    if(MyTodolist.visibility)
    {
      MyTodolist.hide();
    }
    else
    {
      MyTodolist.show();
    }
  }
}

if (Browser.isIE)
{
  onscroll = function()
  {
    //document.getElementById('calculator').style.top = document.body.scrollTop;
    document.getElementById('popMsg').style.top = (document.body.scrollTop + document.body.clientHeight - document.getElementById('popMsg').offsetHeight) + "px";
  }
}

if (document.getElementById("listDiv"))
{
  document.getElementById("listDiv").onmouseover = function(e)
  {
    obj = Utils.srcElement(e);

    if (obj)
    {
      if (obj.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode;
      else if (obj.parentNode.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode.parentNode;
      else return;

      for (i = 0; i < row.cells.length; i++)
      {
        if (row.cells[i].tagName != "TH") row.cells[i].style.backgroundColor = '#F4FAFB';
      }
    }

  }

  document.getElementById("listDiv").onmouseout = function(e)
  {
    obj = Utils.srcElement(e);

    if (obj)
    {
      if (obj.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode;
      else if (obj.parentNode.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode.parentNode;
      else return;

      for (i = 0; i < row.cells.length; i++)
      {
          if (row.cells[i].tagName != "TH") row.cells[i].style.backgroundColor = '#FFF';
      }
    }
  }

  document.getElementById("listDiv").onclick = function(e)
  {
    var obj = Utils.srcElement(e);

    if (obj.tagName == "INPUT" && obj.type == "checkbox")
    {
      if (!document.forms['listForm'])
      {
        return;
      }
      var nodes = document.forms['listForm'].elements;
      var checked = false;

      for (i = 0; i < nodes.length; i++)
      {
        if (nodes[i].checked)
        {
           checked = true;
           break;
         }
      }

      if(document.getElementById("btnSubmit"))
      {
        document.getElementById("btnSubmit").disabled = !checked;
      }
      for (i = 1; i <= 10; i++)
      {
        if (document.getElementById("btnSubmit" + i))
        {
          document.getElementById("btnSubmit" + i).disabled = !checked;
        }
      }
    }
  }

}

//-->
</script>
</body>
</html>