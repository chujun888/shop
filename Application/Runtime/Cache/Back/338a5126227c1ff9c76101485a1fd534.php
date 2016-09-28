<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: goods_list.htm 17126 2010-04-23 10:30:26Z liuhui $ -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtmltransitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商之翼 管理中心 - 商品类型列表 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/admin/Public/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/admin/Public/styles/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/admin/Public/js/jquery-1.6.2.min.js"></script><script type="text/javascript" src="/admin/Public/js/jquery.json.js"></script><script type="text/javascript" src="__PUBLIC__/js/transport.js"></script><script type="text/javascript" src="/admin/Public/js/common.js"></script>
</head>
<body>
<h1>
<span class="action-span"><a href="/admin/Back/Type/add">添加新商品类型</a></span>
<span class="action-span1"><a href="/admin/Back/index/main">商之翼 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品列表 </span>
<div style="clear:both"></div>
</h1>
<script type="text/javascript" src="__PUBLIC__/js/utils.js"></script>
<!-- 商品搜索 
 $Id: goods_search.htm 16790 2009-11-10 08:56:15Z wangleisvn $ 
<link href="/admin/Public/styles/zTree/zTreeStyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/admin/Public/js/jquery.ztree.all-3.5.min.js"></script><script type="text/javascript" src="/admin/Public/js/category_selecter.js"></script><div class="form-div">
    <form action="/admin/Back/Type/lst" name='search' method="post">
    <img src="/admin/Public/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
         关键字 
        关键字 <input type="text" name="keyword" size="15" value=""/>
          <input type="submit" value=" 搜索" class="button" />
  </form>
</div>-->
<!-- 商品列表 -->
<form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
  <!-- start goods list -->
  <div class="list-div" id="listDiv">
<table cellpadding="3" cellspacing="1">
  <tr>
    <th>
     
      <a href="javascript:listTable.sort('goods_id'); ">编号</a><img src="/admin/Public/images/sort_desc.gif"/>    </th>
              <th><a href='#'></a>类型名称</th>
              
    <th>操作</th>
    
<!-- 循环输出-->    
    
<?php foreach($data as $k=>$v):?>  <tr>
    <tr>
    <td><?php echo ($v["id"]); ?></td>
         	 <td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 233)"><?php echo ($v["type_name"]); ?></span></td>
            
        
    <td align="center">
        <span style="margin-bottom: 20px;"><u><a href="/admin/Back/attr/lst/type_id/<?php echo ($v["id"]); ?>">属性列表</a></u></span>  
      <a href="/admin/Back/Type/edit/id/<?php echo ($v["id"]); ?>" title="编辑"><img src="/admin/Public/images/icon_edit.gif" width="16" height="16" border="0" /></a>  
      <a href="javascript:;" onclick="remove(this,<?php echo ($v["id"]); ?>);" title="删除"><img src="/admin/Public/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <img src="/admin/Public/images/empty.gif" width="16" height="16" border="0" />          
    </td>
    </tr>
<?php endforeach;?>  </table>

<!-- end goods list -->

<!-- 分页 -->
<table id="page-table" cellspacing="0">
  <tr>
    <td align="right" nowrap="true">
         <?php echo ($fpage); ?>
    </td>
  </tr>
</table>

</div>


</form>



  
<div id="footer">
共执行 7 个查询，用时 0.460674 秒，Gzip 已禁用，内存占用 6.910 MB<br />
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
    var global = $import("../js/global.js","js");
    global.onload = global.onreadystatechange= function()
    {
      if(this.readyState && this.readyState=="loading")return;
      var md5 = $import("js/md5.js","js");
      md5.onload = md5.onreadystatechange= function()
      {
        if(this.readyState && this.readyState=="loading")return;
        var todolist = $import("js/todolist.js","js");
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
function remove(e,id){
    if(confirm('确定要删除吗？')){
        
        //数据库删除
        $.ajax({
            url:"/admin/Back/Type/delete/id/"+id,
            type:'get',
            dataType:'json',
            success:function(data){
                if(data.ok==1)
                $(e).parent().parent().remove();
            }
        });
//        
    }
}    
//-->
</script>
</body>
</html>