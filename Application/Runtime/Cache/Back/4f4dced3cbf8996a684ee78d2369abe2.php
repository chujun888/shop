<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: user_info.htm 16854 2009-12-07 06:20:09Z sxc_shop $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商之翼 管理中心 - 添加属性 </title>
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
    <span class="action-span"><a href="/admin/Back/Attr/lst/type_id/<?php I('get.type_id');?>">属性列表</a></span>
<span class="action-span1"><a href="/admin/Back/index/main">商之翼 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加属性 </span>
<div style="clear:both"></div>
</h1>
<script type="text/javascript" src="/js/transport.org.js"></script><script type="text/javascript" src="/js/region.js"></script><div class="main-div">
<!-- #代码增加2014-12-23 by www.68ecshop.com  _star -->
<form method="post" action="" name="theForm" onsubmit="return validate()" enctype="multipart/form-data">
<!-- #代码增加2014-12-23 by www.68ecshop.com  _end -->
<table width="100%" >
    <input type='hidden' name='type_id' value='<?php echo I('get.type_id');?>'/>
  <tr>
    <td class="label">属性名称:</td>
    <td><input type="text" name="attr_name" maxlength="60" value="" /><span class="require-field">*</span></td>
  </tr>
  <tr>
    <td class="label">属性类型:</td>
    <td>唯一：<input type='radio' name='attr_type' value='0'/>多选：<input type='radio' name='attr_type' value='1'/></td>
  </tr>
  <tr>
    <td class="label">可选值：（多个用,分开）:</td>
    <td><input type="text" name="attr_option_value" maxlength="60" value="" /><span class="require-field"></span></td>
  </tr>
  <!-- #代码增加2014-12-23 by www.68ecshop.com  _end -->
      <tr>
    <td colspan="2" align="center">
      <input type="submit" value=" 确定 " class="button" />
      <input type="reset" value=" 重置 " class="button" />
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