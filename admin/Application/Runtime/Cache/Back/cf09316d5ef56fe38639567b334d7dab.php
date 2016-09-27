<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: category_list.htm 17019 2010-01-29 10:10:34Z liuhui $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商之翼 管理中心 - 商品分类 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/admin/Public/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/admin/Public/styles/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/admin/Public/js/jquery-1.6.2.min.js"></script><script type="text/javascript" src="/admin/Public/js/jquery.json.js"></script><script type="text/javascript" src="../js/transport.js"></script><script type="text/javascript" src="/admin/Public/js/common.js"></script>
</head>
<body>

<h1>
<span class="action-span"><a href="/admin/Back/Privilege/add">添加权限</a></span>
<span class="action-span1"><a href="/admin/Back/index/main">商之翼 管理中心</a> </span><span id="search_id" class="action-span1"> - 权限分类 </span>
<div style="clear:both"></div>
</h1>

<!-- $Id: brand_search.htm 2015-02-10 deruek $ -->
<script type="text/javascript" src="/js/utils.js"></script>



<form method="post" action="" name="listForm">
<!-- start ad position list -->
<div class="list-div" id="listDiv">

<table width="100%" cellspacing="1" cellpadding="2" id="list-table">
  <tr>
    <th>权限名称&nbsp;&nbsp;<a href="javascript:;" onclick="expandAll(this)">[全部收缩]</a></th>
              <th><a href='#'>是否在菜单栏显示（点击修改）</a></th>
              <th><a href='#'>模块名称</a></th>
              <th><a href='#'>控制器名称</a></th>
              <th><a href='#'>动作名称</a></th>
              
    <th>操作</th>
  </tr>
    <?php foreach($data as $k=>$v):?>
    <tr align="center" class="0" id="0_1">
    <td align="left" class="first-cell" >
            <img src="/admin/Public/images/menu_minus.gif" id="icon_0_1" width="9" height="9" border="0" style="margin-left:0em" onclick="rowClicked(this)" />
            <span>
      <!-- 0-默认列表 1-搜索匹配列表 其他-搜索未匹配列表 -->
           <?php echo ($v["pri_name"]); ?>
            </span>
        </td>
    <td width="10%" onclick="change(this)" id="<?php echo ($v["id"]); ?>"><img src="/admin/Public/images/<?php if($v['is_show']) echo 'yes';else echo 'no'; ?>.gif"/></td>
    <td width="10%"><span onclick="listTable.edit(this, 'edit_measure_unit', 1)"><?php echo ($v["module_name"]); ?></span></td>
    <td width="10%"><?php echo ($v["controller_name"]); ?></td>
    <td width="10%"><?php echo ($v["action_name"]); ?></td>
   
    <td width="24%" align="center">
 
        <a href="/admin/Back/Privilege/edit/id/<?php echo ($v["id"]); ?>">编辑</a> |
    <a href="/admin/Back/Privilege/delete/id/<?php echo ($v["id"]); ?>" onclick="return confirm('确定要删除该权限吗？');" title="移除">移除</a
	  <!--代码修改_start Byjdy-->
	 
    </td>
  </tr>
    <?php foreach($v['children'] as $k1=>$v1):?>
    <tr align="center" class="1" id="1_14">
    <td align="left" class="first-cell" >
            <img src="/admin/Public/images/menu_minus.gif" id="icon_1_14" width="9" height="9" border="0" style="margin-left:1em" onclick="rowClicked(this)" />
            <span>
      <!-- 0-默认列表 1-搜索匹配列表 其他-搜索未匹配列表 -->
           <?php echo ($v1["pri_name"]); ?>
            </span>
        </td>
        <td width="10%" onclick="change(this)" id="<?php echo ($v1["id"]); ?>"><img src="/admin/Public/images/<?php if($v1['is_show']) echo 'yes';else echo 'no'; ?>.gif"/></td>
    <td width="10%"><?php echo ($v1["module_name"]); ?></td>
    <td width="10%"><?php echo ($v1["controller_name"]); ?></td>
    <td width="10%"><?php echo ($v1["action_name"]); ?></td>
  
  
    <td width="24%" align="center">
      
            <a href="/admin/Back/Privilege/edit/id/<?php echo ($v1["id"]); ?>">编辑</a> |
        <a href="/admin/Back/Privilege/delete/id/<?php echo ($v1["id"]); ?>"  onclick="return confirm('确定要删除该权限吗？');" title="移除">移除</a>
	  <!--代码修改_start Byjdy-->
    </td>
  </tr>
  
  <?php foreach($v1['children'] as $k2=>$v2):?>  
    <tr align="center" class="2" id="2_20">
    <td align="left" class="first-cell" >
            <img src="/admin/Public/images/menu_minus.gif" id="icon_2_20" width="9" height="9" border="0" style="margin-left:2em" onclick="rowClicked(this)" />
            <span>
      <!-- 0-默认列表 1-搜索匹配列表 其他-搜索未匹配列表 -->
         <?php echo ($v2["pri_name"]); ?>
            </span>
        </td>
    <td width="10%" onclick="change(this)" id="<?php echo ($v2["id"]); ?>><img src="/admin/Public/images/<?php if($v2['is_show']) echo 'yes';else echo 'no'; ?>.gif"/></td>
    <td width="10%"><?php echo ($v2["module_name"]); ?></td>
    <td width="10%"><?php echo ($v2["controller_name"]); ?></td>
    <td width="10%"><?php echo ($v2["action_name"]); ?></td>
   
    <td width="24%" align="center">
    
      <a href="/admin/Back/Privilege/edit/id/<?php echo ($v2["id"]); ?>">编辑</a> |
      <a href="/admin/Back/Privilege/delete/id/<?php echo ($v2["id"]); ?>"  onclick="return confirm('确定要删除该权限吗？');" title="移除">移除</a>
	  <!--代码修改_start Byjdy-->
	  	  <!--代码修改_end Byjdy-->
    </td>
  </tr>
  <?php endforeach;?>
  <?php endforeach;?>
  <?php endforeach;?> 
    
    

  </table>
</div>
</form>


<script language="JavaScript">
<!--
//修改权限显示状态
function change(e){
    $.ajax({
        type:'get',
        dataType:'json',
        url:"/admin/Back/Privilege/ajaxShow/id/"+$(e).attr('id'),
        success:function(data){
           
            $(e).find('img').prop('src',"/admin/Public/images/"+data.ok+".gif");
        }
    });
}


var imgPlus = new Image();
imgPlus.src = "/admin/Public/images/menu_plus.gif";

/**
 * 折叠分类列表
 */
function rowClicked(obj)
{
  // 当前图像
  img = obj;
  // 取得上二级tr>td>img对象
  obj = obj.parentNode.parentNode;
  // 整个分类列表表格
 
  var tbl = document.getElementById("list-table");
  // 当前分类级别
  var lvl = parseInt(obj.className);
  // 是否找到元素
  var fnd = false;
  var sub_display = img.src.indexOf('menu_minus.gif') > 0 ? 'none' : (Browser.isIE) ? 'block' : 'table-row' ;
  // 遍历所有的分类
  for (i = 0; i < tbl.rows.length; i++)
  {
      var row = tbl.rows[i];
      if (row == obj)
      {
          // 找到当前行
          fnd = true;
          //document.getElementById('result').innerHTML += 'Find row at ' + i +"<br/>";
      }
      else
      {
          if (fnd == true)
          {
              var cur = parseInt(row.className);
              var icon = 'icon_' + row.id;
              if (cur > lvl)
              {
                  row.style.display = sub_display;
                  if (sub_display != 'none')
                  {
                      var iconimg = document.getElementById(icon);
                      iconimg.src = iconimg.src.replace('plus.gif', 'minus.gif');
                  }
              }
              else
              {
                  fnd = false;
                  break;
              }
          }
      }
  }

  for (i = 0; i < obj.cells[0].childNodes.length; i++)
  {
      var imgObj = obj.cells[0].childNodes[i];
      if (imgObj.tagName == "IMG" && imgObj.src != 'images/menu_arrow.gif')
      {
          imgObj.src = (imgObj.src == imgPlus.src) ? '/admin/Public/images/menu_minus.gif' : imgPlus.src;
      }
  }
}

/**
 * 展开或折叠所有分类
 * 直接调用了rowClicked()函数，由于其函数内每次都会扫描整张表所以效率会比较低，数据量大会出现卡顿现象
 */
var expand = true;
function expandAll(obj)
{
	
	var selecter;
	
	if(expand)
	{
		// 收缩
		selecter = "img[src*='menu_minus.gif'],img[src*='menu_plus.gif']";
		$(obj).html("[全部展开]");
		$(selecter).parents("tr[class!='0']").hide();
		$(selecter).attr("src", "/admin/Public/images/menu_plus.gif");
	}
	else
	{
		// 展开
		selecter = "img[src*='menu_plus.gif'],img[src*='menu_minus.gif']";
		$(obj).html("[全部收缩]");
		$(selecter).parents("tr").show();
		$(selecter).attr("src", "/admin/Public/images/menu_minus.gif");
	}
	
	// 标识展开/收缩状态
	expand = !expand;
}
//-->
</script>


<div id="footer">
共执行 1 个查询，用时 0.026338 秒，Gzip 已禁用，内存占用 4.070 MB<br />
版权所有 &copy; 2008-2015 秦皇岛商之翼网络科技有限公司，并保留所有权利。</div>
<!-- 新订单提示信息 -->
<div id="popMsg">
  <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#cfdef4" border="0">
  <tr>
    <td style="color: #0f2c8c" width="30" height="24"></td>
    <td style="font-weight: normal; color: #1f336b; padding-top: 4px;padding-left: 4px" valign="center" width="100%"> 新订单通知</td>
    <td style="padding-top: 2px;padding-right:2px" valign="center" align="right" width="19"><span title="关闭" style="cursor: hand;cursor:pointer;color:red;font-size:12px;font-weight:bold;margin-right:4px;" onclick="Message.close()" >×</span><!-- <img title=关闭 style="cursor: hand" onclick=closediv() hspace=3 src="msgclose.jpg"> --></td>
  </tr>
  <tr>
    <td style="padding-right: 1px; padding-bottom: 1px" colspan="3" height="70">
    <div id="popMsgContent">
      <p>您有 <strong style="color:#ff0000" id="spanNewOrder">1</strong> 个新订单以及       <strong style="color:#ff0000" id="spanNewPaid">0</strong> 个新付款的订单</p>
      <p align="center" style="word-break:break-all"><a href="order.php?act=list"><span style="color:#ff0000">点击查看新订单</span></a></p>
    </div>
    </td>
  </tr>
  </table>
</div>



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