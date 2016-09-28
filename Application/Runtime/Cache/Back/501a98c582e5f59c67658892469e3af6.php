<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: start.htm 17216 2011-01-19 06:03:12Z liubo $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商之翼 管理中心</title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/styles/main.css" rel="stylesheet" type="text/css" />
<!-- 修改 by www.68ecshop.com 百度编辑器 begin -->
<script type="text/javascript" src="/Public/js/jquery.js"></script><script type="text/javascript" src="/Public/js/jquery.json.js"></script><script type="text/javascript" src="/Public/js/transport_bd.js"></script><script type="text/javascript" src="/Public/js/common.js"></script><!-- 修改 by www.68ecshop.com 百度编辑器 end -->
<script language="JavaScript">
<!--
// 这里把JS用到的所有语言都赋值到这里
var process_request = "正在处理您的请求...";
var todolist_caption = "记事本";
var todolist_autosave = "自动保存";
var todolist_save = "保存";
var todolist_clear = "清除";
var todolist_confirm_save = "是否将更改保存到记事本？";
var todolist_confirm_clear = "是否清空内容？";
var expand_all = "展开";
var collapse_all = "闭合";
var shop_name_not_null = "商店名称不能为空";
var good_name_not_null = "商品名称不能为空";
var good_category_not_null = "商品分类不能为空";
var good_number_not_number = "商品数量不是数值";
var good_price_not_number = "商品价格不是数值";
//-->
</script>
</head>
<body>

<div id="menu_list"  onmouseover="show_popup()" onmouseout="hide_popup()">
<ul>
<li><a href="goods.php?act=add" target="main_frame">添加新商品</a></li>
<li><a href="category.php?act=add" target="main_frame">添加商品分类</a></li>
<li><a href="order.php?act=add" target="main_frame">添加订单</a></li>
<li><a href="article.php?act=add" target="main_frame">添加新文章</a></li>
<li><a href="users.php?act=add" target="main_frame">添加会员</a></li>
</ul>
</div>
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
<span class="action-span1"><a href="index.php?act=main">商之翼 管理中心</a> </span><span id="search_id" class="action-span1"></span>
<div style="clear:both"></div>
</h1>
<!-- directory install start -->
<ul id="lilist" style="padding:0; margin: 0; list-style-type:none; color: #CC0000;">
  </ul>
<ul style="padding:0; margin: 0; list-style-type:none; color: #CC0000;">
 <!-- <script type="text/javascript" src="http://bbs.ecshop.com/notice.php?v=1&n=8&f=ul"></script>-->
</ul>
<!-- directory install end -->
<!-- start personal message -->
<!-- end personal message -->
<!-- star 升级 -->

<div class="list-div">
	<div class="important">
    	<ul class="import">
        	<li class="import_1">
            	<div class="module">
            		<i></i>
                	<div class="detail">
                		<strong>0.00</strong>
                		<span>今日销售总额</span>
                	</div>
                </div>
            </li>
            <li class="import_2">
            	<div class="module">
            		<i></i>
                	<div class="detail">
                		<strong>0</strong>
                		<span>今日订单数</span>
                	</div>
                </div>
            </li>
            <li class="import_3">
            	<div class="module">
            		<i></i>
                	<div class="detail">
                		<strong>0</strong>
                		<span>今日注册会员</span>
                	</div>
                </div>
            </li>
            <li class="import_4">
            	<div class="module">
            		<i></i>
                	<div class="detail">
                		<strong>0</strong>
                		<span>今日入驻店铺数</span>
                	</div>
                </div>
            </li>
            <li class="import_5">
            	<div class="module">
            		<i></i>
                	<div class="detail">
                		<strong><a href="supplier.php?act=list" title="待审核店铺" style="color:#FA841E; text-decoration:none">1</a>&nbsp;/&nbsp;7</strong>
                		<span>待审核/店铺总数</span>
                	</div>
                </div>
            </li>
        </ul>
    </div>
</div>
<br />
<div class="list-div">
	<div class="console-detaile">
        <div class="item shop-item">
            <div class="item-hd"><span class="bg1">待处理<em>150 个</em></span></div>
            <div class="item-bd item-bd1">
                <ul class="clearfix">
                    <li>
                        <strong><a href="supplier_rebate.php?act=list&is_pay_ok=0">待处理佣金</a></strong>
                        <span>5 个</span>
                    </li>
                    <li class="li_even">
                        <!-- 代码修改_start  By  www.68ecshop.com -->
                        <!--
                        <strong><a href="goods.php?act=list&supplier_status=0">待审核商品</a></strong>
                        -->
                        <strong><a href="goods.php?act=list&supp=1&supplier_status=0">待审核商品</a></strong>
                        <!-- 代码修改_end  By  www.68ecshop.com -->
                        <span>0 个</span>
                    </li>
                    <li>
                        <strong><a href="user_account.php?act=list&process_type=0&is_paid=0">会员充值</a></strong>
                        <span>0 个</span>
                    </li>
                    <li class="li_even">
                        <strong><a href="user_account.php?act=list&process_type=1&is_paid=0">会员提现</a></strong>
                        <span>0 个</span>
                    </li>
                    <li>
                        <strong><a href="user_msg.php?act=list_all&is_replied=unreplied">会员留言</a></strong>
                        <span>0 个</span>
                    </li>
                    <li class="li_even">
                        <strong><a href="comment_manage.php?act=list&is_replied=unreplied">商品评论</a></strong>
                        <span>143 个</span>
                    </li>
                     <li>
                        <strong><a href="shaidan.php?act=list">用户晒单</a></strong>
                        <span>2 个</span>
                    </li>
                    <li class="li_even">
                        <strong><a href="goods_tags.php?act=list">标签审核</a></strong>
                        <span>0 个</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="item goods-item">
            <div class="item-hd"><span class="bg2">商品<em>215 件</em></span></div>
            <div class="item-bd item-bd2">
                <ul class="clearfix">
                    <li>
                        <strong><a href="goods.php?act=list">自营商品总数</a></strong>
                        <span>117 件</span>
                    </li>                   
                    <li class="li_even">
                        <strong><a href="goods.php?act=list&supp=1">入驻商商品总数</a></strong>
                        <span>98 件</span>
                    </li>
                    <li>
                        <strong><a href="goods.php?act=list&stock_warning=1">库存警告商品数</a>
                        </strong><span>1 件</span>
                    </li>
                    <li class="li_even">
                        <strong><a href="goods.php?act=list&amp;intro_type=is_new">新品推荐数</a></strong>
                        <span>115 件</span>
                    </li>
                    <li>
                        <strong><a href="goods.php?act=list&amp;intro_type=is_best">精品推荐数</a></strong>
                        <span>23 件</span>
                    </li>
                    <li class="li_even">
                        <strong><a href="goods.php?act=list&amp;intro_type=is_hot">热销商品数</a></strong>
                        <span>25 件</span>
                    </li>
                    <li>
                        <strong><a href="goods.php?act=list&amp;intro_type=is_promote">促销商品数</a></strong>
                        <span>0 件</span>
                    </li>
                     <li class="li_even">
                        <strong><a href="goods.php?act=list&is_on_sale=0">已下架商品总数</a></strong>
                         <span>0 件</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="item order-item">
            <div class="item-hd"><span class="bg3">订单<em>0 笔</em></span></div>
            <div class="item-bd item-bd3">
                <ul class="clearfix">
                	<li>
                        <strong><a href="order.php?act=list&composite_status=101">待发货订单</a></strong>
                        <span>0 笔</span>
                    </li>
                	<li class="li_even">
                        <strong><a href="order.php?act=list&composite_status=100">待支付订单</a></strong>
                        <span>0 笔</span>
                    </li>
                    <li>
                        <strong><a href="order.php?act=list&composite_status=0">待确认订单</a></strong>
                        <span>0 笔</span>
                    </li>
                    <li class="li_even">
                        <strong><a href="order.php?act=list&composite_status=6">部分发货订单</a></strong>
                        <span>0 笔</span>
                    </li>
                    <li>
                        <strong><a href="user_account.php?act=list&process_type=1&is_paid=0">退款申请</a></strong>
                        <span>0 笔</span>
                    </li>
                    <li class="li_even">
                        <strong><a href="order.php?act=back_list&status_back=0">退货申请</a></strong>
                        <span>0 笔</span>
                    </li>
                    <li>
                        <strong><a href="goods_booking.php?act=list_all">新缺货登记</a></strong>
                        <span>1 笔</span>
                    </li>
                    <li class="li_even">
                        <strong><a href="order.php?act=list&composite_status=102">已成交订单数</a></strong>
                        <span>0 笔</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div style="height:0px;line-height:0px;clear:both"></div>
<br />
<!-- end order statistics -->
<!--<div class="list-div">
	<div class="order_count">
        <p><span class="tab_front">订单来源统计</span></p>
        <div style='height:400px;width:50%;margin-left:auto;margin-right:auto;' id='froms_chart_div'></div>
    </div>
</div>																 订单排行统计 -->
<br />
<!-- end order statistics -->
<!--<div class="list-div">
	<div class="order_count">
        <p><span class="tab_front">订单排行统计</span></p>
        <div style='height:400px;width:90%;margin-left:auto;margin-right:auto;' id='order_chart_div'></div>
    </div>
</div>-->
<br />
<!--<div class="list-div">
	<div class="order_count">
        <p><span class="tab_front">销售额统计</span></p>
        <div style='height:400px;width:90%;margin-left:auto;margin-right:auto;' id='sales_chart_div'></div>
    </div>
</div>-->
<br />
<div class="list-div">
<table cellspacing='1' cellpadding='3'>
  <tr>
    <th colspan="4" class="group-title">系统信息</th>
  </tr>

  <tr>
    <td>PHP 版本:</td>
    <td id="php_ver"></td>
    <td>MySQL 版本:</td>
    <td id="mysql_ver"></td>
  </tr>
  <tr>
    <td>产品最新版本:</td>
    <td id="pro_ver"></td>
    <td>当前版本:</td>
    <td id="ver"></td>
  </tr>
  <tr>
    <td>编码:</td>
    <td id="charset"></td>
    <td></td>
    <td></td>
  </tr>
</table>
</div>
<script src='/Public/js/echarts-all.js'></script>
<script>
var froms_chart = echarts.init(document.getElementById('froms_chart_div'));
    froms_chart.setOption({"tooltip":{"trigger":"item","formatter":"{a} <br\/>{b} : {c} ({d}%)"},"legend":{"orient":"vertical","x":"left","y":"20","data":null},"toolbox":{"show":true,"feature":{"magicType":{"show":true,"type":["pie","funnel"]},"restore":{"show":true},"saveAsImage":{"show":true}}},"calculabe":true,"series":[{"type":"pie","radius":"55%","center":["50%","60%"],"data":[]}]});
    var order_chart = echarts.init(document.getElementById('order_chart_div'));
    order_chart.setOption({"tooltip":{"trigger":"axis"},"legend":{"data":[]},"toolbox":{"show":true,"x":"right","feature":{"magicType":{"show":true,"type":["line","bar"]},"restore":{"show":true},"saveAsImage":{"show":true}}},"calculable":true,"xAxis":{"type":"category","boundryGap":false,"data":[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17]},"yAxis":{"type":"value","axisLabel":{"formatter":"{value}\u4e2a"}},"series":[{"name":"u8ba2u5355u4e2au6570","type":"line","data":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"markPoint":{"data":[{"type":"max","name":"u6700u5927u503c"},{"type":"min","name":"u6700u5c0fu503c"}]},"markLine":{"data":[{"type":"average","name":"u5e73u5747u503c"}]}}]});
    var sales_chart = echarts.init(document.getElementById('sales_chart_div'));
    sales_chart.setOption({"tooltip":{"trigger":"axis"},"toolbox":{"show":true,"x":"right","feature":{"magicType":{"show":true,"type":["line","bar"]},"restore":{"show":true},"saveAsImage":{"show":true}}},"calculable":true,"xAxis":{"type":"category","boundryGap":false,"data":[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17]},"yAxis":{"type":"value","axisLabel":{"formatter":"{value}\u5143"}},"series":[{"name":"u9500u552eu989d","type":"line","data":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"markPoint":{"data":[{"type":"max","name":"u6700u5927u503c"},{"type":"min","name":"u6700u5c0fu503c"}]},"markLine":{"data":[{"type":"average","name":"u5e73u5747u503c"}]}}]});
</script>
<!-- end 升级 -->




<div id="footer">
共执行 45 个查询，用时 0.064918 秒，Gzip 已禁用，内存占用 3.822 MB<br />
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
    var global = $import("..//Public/js/global.js","js");
    global.onload = global.onreadystatechange= function()
    {
      if(this.readyState && this.readyState=="loading")return;
      var md5 = $import("/Public/js/md5.js","js");
      md5.onload = md5.onreadystatechange= function()
      {
        if(this.readyState && this.readyState=="loading")return;
        var todolist = $import("/Public/js/todolist.js","js");
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