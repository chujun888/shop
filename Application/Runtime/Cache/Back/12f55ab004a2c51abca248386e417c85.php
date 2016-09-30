<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商之翼 管理中心 - 系统信息 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/styles/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery-1.6.2.min.js"></script><script type="text/javascript" src="/js/jquery.json.js"></script><script type="text/javascript" src="/js/transport.js"></script><script type="text/javascript" src="/js/common.js"></script><script language="JavaScript">
<!--
// 这里把JS用到的所有语言都赋值到这里

//-->
</script>
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
<span class="action-span1"><a href="index.php?act=main">商之翼 管理中心</a> </span><span id="search_id" class="action-span1"> - 系统信息 </span>
<div style="clear:both"></div>
</h1>
<div class="list-div">
  <div style="background:#ffffff; padding: 20px 50px; margin: 2px;">
    <table align="center" width="400" border="0" style="background:#FFF;">
      <tr>
        <td width="50" valign="top">
                    <img src="/Public/images/information.gif" width="32" height="32" border="0" alt="information" />
                  </td>
        <td style="font-size: 14px; font-weight: bold"><?php if(isset($message)) echo $message;else echo $error;?></td>
      </tr>
      <tr>
        <td></td>
        <td id="redirectionMsg">
          如果您不做出选择，将在 <span id="spanSeconds"><?php echo ($waitSecond); ?></span> 秒后跳转到第一个链接地址。        </td>
      </tr>
<!--      <tr>
        <td></td>
        <td>
          <ul style="margin:0; padding:0 10px" class="msg-link">
                        <li><a href="goods.php?act=list" >商品列表</a></li>
                        <li><a href="goods.php?act=add" >添加新商品</a></li>
                      </ul>

        </td>
      </tr>-->
    </table>
  </div>
</div>
<script language="JavaScript">
<!--
var seconds = <?php echo ($waitSecond); ?>;
var defaultUrl = "<?php echo ($jumpUrl); ?>";


onload = function()
{
  if (defaultUrl == 'javascript:history.go(-1)' && window.history.length == 0)
  {
    document.getElementById('redirectionMsg').innerHTML = '';
    return;
  }

  window.setInterval(redirection, 1000);
}
function redirection()
{
  if (seconds <= 0)
  {
    window.clearInterval();
    return;
  }

  seconds --;
  document.getElementById('spanSeconds').innerHTML = seconds;

  if (seconds == 0)
  {
    location.href = defaultUrl;
	window.clearInterval();
  }
}
//-->
</script>

<div id="footer">
共执行 23 个查询，用时 0.039344 秒，Gzip 已禁用，内存占用 5.987 MB<br />
版权所有 &copy; 2008-2015 秦皇岛商之翼网络科技有限公司，并保留所有权利。</div>


<!--
<embed src="/Public/images/online.wav" width="0" height="0" autostart="false" name="msgBeep" id="msgBeep" enablejavascript="true"/>
-->
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://active.macromedia.com/flash2/cabs/swflash.cab#version=4,0,0,0" id="msgBeep" width="1" height="1">
  <param name="movie" value="/Public/images/online.swf">
  <param name="quality" value="high">
  <embed src="/Public/images/online.swf" name="msgBeep" id="msgBeep" quality="high" width="0" height="0" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?p1_prod_version=shockwaveflash">
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
      var md5 = $import("/js/md5.js","js");
      md5.onload = md5.onreadystatechange= function()
      {
        if(this.readyState && this.readyState=="loading")return;
        var todolist = $import("/js/todolist.js","js");
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