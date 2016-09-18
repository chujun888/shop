<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: goods_list.htm 17126 2010-04-23 10:30:26Z liuhui $ -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtmltransitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商之翼 管理中心 - 商品列表 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/admin/Public/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/admin/Public/styles/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/admin/Public/js/jquery-1.6.2.min.js"></script><script type="text/javascript" src="/admin/Public/js/jquery.json.js"></script><script type="text/javascript" src="/js/transport.js"></script><script type="text/javascript" src="/admin/Public/js/common.js"></script><script language="JavaScript">
<!--
// 这里把JS用到的所有语言都赋值到这里
var process_request = "正在处理您的请求...";
var todolist_caption = "记事本";
var todolist_autosave = "自动保存";
var todolist_save = "保存";
var todolist_clear = "清除";
var todolist_confirm_save = "是否将更改保存到记事本？";
var todolist_confirm_clear = "是否清空内容？";
var goods_name_not_null = "商品名称不能为空。";
var goods_cat_not_null = "商品分类必须选择。";
var category_cat_not_null = "分类名称不能为空";
var brand_cat_not_null = "品牌名称不能为空";
var goods_cat_not_leaf = "您选择的商品分类不是底级分类，请选择底级分类。";
var shop_price_not_null = "本店售价不能为空。";
var shop_price_not_number = "本店售价不是数值。";
var select_please = "请选择...";
var button_add = "添加";
var button_del = "删除";
var spec_value_not_null = "规格不能为空";
var spec_price_not_number = "加价不是数字";
var market_price_not_number = "市场价格不是数字";
var goods_number_not_int = "商品库存不是整数";
var warn_number_not_int = "库存警告不是整数";
var promote_not_lt = "促销开始日期不能大于结束日期";
var promote_start_not_null = "促销开始时间不能为空";
var promote_end_not_null = "促销结束时间不能为空";
var drop_img_confirm = "您确实要删除该图片吗？";
var batch_no_on_sale = "您确实要将选定的商品下架吗？";
var batch_trash_confirm = "您确实要把选中的商品放入回收站吗？";
var go_category_page = "本页数据将丢失，确认要去商品分类页添加分类吗？";
var go_brand_page = "本页数据将丢失，确认要去商品品牌页添加品牌吗？";
var volume_num_not_null = "请输入优惠数量";
var volume_num_not_number = "优惠数量不是数字";
var volume_price_not_null = "请输入优惠价格";
var volume_price_not_number = "优惠价格不是数字";
var cancel_color = "无样式";
//-->
</script>
</head>
<body>

<div id="menu_list" onmouseover="show_popup()" onmouseout="hide_popup()">
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
<span class="action-span"><a href="goods.php?act=add">添加新商品</a></span>
<span class="action-span1"><a href="index.php?act=main">商之翼 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品列表 </span>
<div style="clear:both"></div>
</h1>
<script type="text/javascript" src="/js/utils.js"></script>
<!-- 商品搜索 -->
<!-- $Id: goods_search.htm 16790 2009-11-10 08:56:15Z wangleisvn $ -->
<link href="/admin/Public/styles/zTree/zTreeStyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/admin/Public/js/jquery.ztree.all-3.5.min.js"></script><script type="text/javascript" src="/admin/Public/js/category_selecter.js"></script><div class="form-div">
  <form action="/admin/Back/Goods/lst" name="searchForm">
    <img src="/admin/Public/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
        <!-- 分类 -->
     <input type="text" id="cat_name" name="cat_name" nowvalue="" value="" >
	<input type="hidden" id="cat_id" name="cat_id" value="">
    <!-- 推荐 -->
	    <select name="intro_type"><option value="0">全部</option><option value="is_best">精品</option><option value="is_new">新品</option><option value="is_hot">热销</option><option value="is_promote">特价</option><option value="all_type">全部推荐</option></select>
	           <!-- 上架 -->
      <select name="is_on_sale"><option value=''>全部</option><option value="1">上架</option><option value="0">下架</option></select>
        <!-- 关键字 -->
    关键字 <input type="text" name="keyword" size="15" />
    <input type="submit" value=" 搜索 " class="button" />
  </form>
</div>
<!-- 商品列表 -->
<form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
  <!-- start goods list -->
  <div class="list-div" id="listDiv">
<table cellpadding="3" cellspacing="1">
  <tr>
    <th>
      <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox" />
      <a href="javascript:listTable.sort('goods_id'); ">编号</a><img src="/admin/Public/images/sort_desc.gif"/>    </th>
	    <th><a href="javascript:listTable.sort('goods_name'); ">商品名称</a></th>
    <th><a href="javascript:listTable.sort('goods_sn'); ">货号</a></th>
    <th><a href="javascript:listTable.sort('shop_price'); ">价格</a></th>
    <th><a href="javascript:listTable.sort('is_on_sale'); ">上架</a></th>
    <th><a href="javascript:listTable.sort('is_best'); ">精品</a></th>
    <th><a href="javascript:listTable.sort('is_new'); ">新品</a></th>
    <th><a href="javascript:listTable.sort('is_hot'); ">热销</a></th>
	    <th><a href="javascript:listTable.sort('sort_order'); ">推荐排序</a></th>
        <th><a href="javascript:listTable.sort('goods_number'); ">库存</a></th>
        <th>标签</th> <!-- 晒单插件 增加 by www.68ecshop.com -->
    <th>操作</th>
  <tr>
    <tr>
    <td><input type="checkbox" name="checkboxes[]" value="233" />233</td>
	    <td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 233)">测试商品</span></td>
    <td><span onclick="listTable.edit(this, 'edit_goods_sn', 233)">ECS000233</span></td>
    <td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 233)">0.10
    </span></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 233)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_best', 233)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_new', 233)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_hot', 233)" /></td>
	    <td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 233)">100</span></td>
        <td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 233)">71</span></td>
        <td align="center"><a href="goods_tag.php?act=list&goods_id=233" target="_blank">标签</a></td> <!-- 晒单插件 增加 by www.68ecshop.com -->
    <td align="center">
      <a href="/goods.php?id=233" target="_blank" title="查看"><img src="/admin/Public/images/icon_view.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=edit&goods_id=233&extension_code=" title="编辑"><img src="/admin/Public/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=copy&goods_id=233&extension_code=" title="复制"><img src="/admin/Public/images/icon_copy.gif" width="16" height="16" border="0" /></a>
      <a href="javascript:;" onclick="listTable.remove(233, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/admin/Public/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <img src="/admin/Public/images/empty.gif" width="16" height="16" border="0" />            <a href="getTaoBaoGoods.php?gid=233"><img src="/admin/Public/images/comment_icon.png" border="0" width="21" height="18" /></a>
    </td>
  </tr>
    <tr>
    <td><input type="checkbox" name="checkboxes[]" value="232" />232</td>
	    <td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 232)">奇居良品 欧式家居装饰摆件 可莉尔裂纹贴花陶瓷水果盘</span></td>
    <td><span onclick="listTable.edit(this, 'edit_goods_sn', 232)">ECS000232</span></td>
    <td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 232)">274.00
    </span></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 232)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_best', 232)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 232)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_hot', 232)" /></td>
	    <td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 232)">100</span></td>
        <td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 232)">1000</span></td>
        <td align="center"><a href="goods_tag.php?act=list&goods_id=232" target="_blank">标签</a></td> <!-- 晒单插件 增加 by www.68ecshop.com -->
    <td align="center">
      <a href="/goods.php?id=232" target="_blank" title="查看"><img src="/admin/Public/images/icon_view.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=edit&goods_id=232&extension_code=" title="编辑"><img src="/admin/Public/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=copy&goods_id=232&extension_code=" title="复制"><img src="/admin/Public/images/icon_copy.gif" width="16" height="16" border="0" /></a>
      <a href="javascript:;" onclick="listTable.remove(232, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/admin/Public/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <img src="/admin/Public/images/empty.gif" width="16" height="16" border="0" />            <a href="getTaoBaoGoods.php?gid=232"><img src="/admin/Public/images/comment_icon.png" border="0" width="21" height="18" /></a>
    </td>
  </tr>
    <tr>
    <td><input type="checkbox" name="checkboxes[]" value="231" />231</td>
	    <td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 231)">可爱卡通餐盘水果盘点心盘 盘子儿童托盘餐具6件套</span></td>
    <td><span onclick="listTable.edit(this, 'edit_goods_sn', 231)">ECS000231</span></td>
    <td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 231)">99.00
    </span></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 231)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_best', 231)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 231)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 231)" /></td>
	    <td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 231)">100</span></td>
        <td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 231)">3332</span></td>
        <td align="center"><a href="goods_tag.php?act=list&goods_id=231" target="_blank">标签</a></td> <!-- 晒单插件 增加 by www.68ecshop.com -->
    <td align="center">
      <a href="/goods.php?id=231" target="_blank" title="查看"><img src="/admin/Public/images/icon_view.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=edit&goods_id=231&extension_code=" title="编辑"><img src="/admin/Public/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=copy&goods_id=231&extension_code=" title="复制"><img src="/admin/Public/images/icon_copy.gif" width="16" height="16" border="0" /></a>
      <a href="javascript:;" onclick="listTable.remove(231, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/admin/Public/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <img src="/admin/Public/images/empty.gif" width="16" height="16" border="0" />            <a href="getTaoBaoGoods.php?gid=231"><img src="/admin/Public/images/comment_icon.png" border="0" width="21" height="18" /></a>
    </td>
  </tr>
    <tr>
    <td><input type="checkbox" name="checkboxes[]" value="230" />230</td>
	    <td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 230)">304不锈钢宝宝分格餐盘 儿童餐具分隔格碗餐盘婴儿盘</span></td>
    <td><span onclick="listTable.edit(this, 'edit_goods_sn', 230)">ECS000230</span></td>
    <td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 230)">35.00
    </span></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 230)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_best', 230)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 230)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 230)" /></td>
	    <td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 230)">100</span></td>
        <td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 230)">3330</span></td>
        <td align="center"><a href="goods_tag.php?act=list&goods_id=230" target="_blank">标签</a></td> <!-- 晒单插件 增加 by www.68ecshop.com -->
    <td align="center">
      <a href="/goods.php?id=230" target="_blank" title="查看"><img src="/admin/Public/images/icon_view.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=edit&goods_id=230&extension_code=" title="编辑"><img src="/admin/Public/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=copy&goods_id=230&extension_code=" title="复制"><img src="/admin/Public/images/icon_copy.gif" width="16" height="16" border="0" /></a>
      <a href="javascript:;" onclick="listTable.remove(230, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/admin/Public/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <img src="/admin/Public/images/empty.gif" width="16" height="16" border="0" />            <a href="getTaoBaoGoods.php?gid=230"><img src="/admin/Public/images/comment_icon.png" border="0" width="21" height="18" /></a>
    </td>
  </tr>
    <tr>
    <td><input type="checkbox" name="checkboxes[]" value="229" />229</td>
	    <td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 229)">Jaka蝴蝶夫人浮雕陶瓷分层水果盘 点心盘子 双层三层 多款可选</span></td>
    <td><span onclick="listTable.edit(this, 'edit_goods_sn', 229)">ECS000229</span></td>
    <td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 229)">116.00
    </span></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 229)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_best', 229)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 229)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 229)" /></td>
	    <td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 229)">100</span></td>
        <td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 229)">3333</span></td>
        <td align="center"><a href="goods_tag.php?act=list&goods_id=229" target="_blank">标签</a></td> <!-- 晒单插件 增加 by www.68ecshop.com -->
    <td align="center">
      <a href="/goods.php?id=229" target="_blank" title="查看"><img src="/admin/Public/images/icon_view.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=edit&goods_id=229&extension_code=" title="编辑"><img src="/admin/Public/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=copy&goods_id=229&extension_code=" title="复制"><img src="/admin/Public/images/icon_copy.gif" width="16" height="16" border="0" /></a>
      <a href="javascript:;" onclick="listTable.remove(229, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/admin/Public/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <img src="/admin/Public/images/empty.gif" width="16" height="16" border="0" />            <a href="getTaoBaoGoods.php?gid=229"><img src="/admin/Public/images/comment_icon.png" border="0" width="21" height="18" /></a>
    </td>
  </tr>
    <tr>
    <td><input type="checkbox" name="checkboxes[]" value="228" />228</td>
	    <td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 228)">剑林 景德镇陶瓷56头韩式餐具套装 红袖添香 FZG453HX56</span></td>
    <td><span onclick="listTable.edit(this, 'edit_goods_sn', 228)">ECS000228</span></td>
    <td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 228)">299.00
    </span></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 228)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_best', 228)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 228)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 228)" /></td>
	    <td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 228)">100</span></td>
        <td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 228)">3333</span></td>
        <td align="center"><a href="goods_tag.php?act=list&goods_id=228" target="_blank">标签</a></td> <!-- 晒单插件 增加 by www.68ecshop.com -->
    <td align="center">
      <a href="/goods.php?id=228" target="_blank" title="查看"><img src="/admin/Public/images/icon_view.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=edit&goods_id=228&extension_code=" title="编辑"><img src="/admin/Public/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=copy&goods_id=228&extension_code=" title="复制"><img src="/admin/Public/images/icon_copy.gif" width="16" height="16" border="0" /></a>
      <a href="javascript:;" onclick="listTable.remove(228, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/admin/Public/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <img src="/admin/Public/images/empty.gif" width="16" height="16" border="0" />            <a href="getTaoBaoGoods.php?gid=228"><img src="/admin/Public/images/comment_icon.png" border="0" width="21" height="18" /></a>
    </td>
  </tr>
    <tr>
    <td><input type="checkbox" name="checkboxes[]" value="227" />227</td>
	    <td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 227)">雅诚德Arst餐具套装56头套装中式碗碟套装陶瓷碗碟套装釉上彩</span></td>
    <td><span onclick="listTable.edit(this, 'edit_goods_sn', 227)">ECS000227</span></td>
    <td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 227)">455.00
    </span></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 227)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_best', 227)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 227)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 227)" /></td>
	    <td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 227)">100</span></td>
        <td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 227)">3333</span></td>
        <td align="center"><a href="goods_tag.php?act=list&goods_id=227" target="_blank">标签</a></td> <!-- 晒单插件 增加 by www.68ecshop.com -->
    <td align="center">
      <a href="/goods.php?id=227" target="_blank" title="查看"><img src="/admin/Public/images/icon_view.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=edit&goods_id=227&extension_code=" title="编辑"><img src="/admin/Public/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=copy&goods_id=227&extension_code=" title="复制"><img src="/admin/Public/images/icon_copy.gif" width="16" height="16" border="0" /></a>
      <a href="javascript:;" onclick="listTable.remove(227, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/admin/Public/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <img src="/admin/Public/images/empty.gif" width="16" height="16" border="0" />            <a href="getTaoBaoGoods.php?gid=227"><img src="/admin/Public/images/comment_icon.png" border="0" width="21" height="18" /></a>
    </td>
  </tr>
    <tr>
    <td><input type="checkbox" name="checkboxes[]" value="226" />226</td>
	    <td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 226)">亿嘉IJARL 时尚陶瓷28头韩式骨瓷餐具套装 东洋之心</span></td>
    <td><span onclick="listTable.edit(this, 'edit_goods_sn', 226)">ECS000226</span></td>
    <td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 226)">239.00
    </span></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 226)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_best', 226)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 226)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 226)" /></td>
	    <td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 226)">100</span></td>
        <td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 226)">3333</span></td>
        <td align="center"><a href="goods_tag.php?act=list&goods_id=226" target="_blank">标签</a></td> <!-- 晒单插件 增加 by www.68ecshop.com -->
    <td align="center">
      <a href="/goods.php?id=226" target="_blank" title="查看"><img src="/admin/Public/images/icon_view.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=edit&goods_id=226&extension_code=" title="编辑"><img src="/admin/Public/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=copy&goods_id=226&extension_code=" title="复制"><img src="/admin/Public/images/icon_copy.gif" width="16" height="16" border="0" /></a>
      <a href="javascript:;" onclick="listTable.remove(226, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/admin/Public/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <img src="/admin/Public/images/empty.gif" width="16" height="16" border="0" />            <a href="getTaoBaoGoods.php?gid=226"><img src="/admin/Public/images/comment_icon.png" border="0" width="21" height="18" /></a>
    </td>
  </tr>
    <tr>
    <td><input type="checkbox" name="checkboxes[]" value="225" />225</td>
	    <td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 225)">樱之歌 52头 紫玉情缘 餐具套装</span></td>
    <td><span onclick="listTable.edit(this, 'edit_goods_sn', 225)">ECS000225</span></td>
    <td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 225)">239.00
    </span></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 225)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_best', 225)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 225)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 225)" /></td>
	    <td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 225)">100</span></td>
        <td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 225)">3333</span></td>
        <td align="center"><a href="goods_tag.php?act=list&goods_id=225" target="_blank">标签</a></td> <!-- 晒单插件 增加 by www.68ecshop.com -->
    <td align="center">
      <a href="/goods.php?id=225" target="_blank" title="查看"><img src="/admin/Public/images/icon_view.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=edit&goods_id=225&extension_code=" title="编辑"><img src="/admin/Public/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=copy&goods_id=225&extension_code=" title="复制"><img src="/admin/Public/images/icon_copy.gif" width="16" height="16" border="0" /></a>
      <a href="javascript:;" onclick="listTable.remove(225, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/admin/Public/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <img src="/admin/Public/images/empty.gif" width="16" height="16" border="0" />            <a href="getTaoBaoGoods.php?gid=225"><img src="/admin/Public/images/comment_icon.png" border="0" width="21" height="18" /></a>
    </td>
  </tr>
    <tr>
    <td><input type="checkbox" name="checkboxes[]" value="224" />224</td>
	    <td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 224)">中派 进口芬兰松木家具实木儿童高低床子母床上下铺带梯柜双层床</span></td>
    <td><span onclick="listTable.edit(this, 'edit_goods_sn', 224)">ECS000224</span></td>
    <td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 224)">4600.00
    </span></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 224)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 224)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 224)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_hot', 224)" /></td>
	    <td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 224)">100</span></td>
        <td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 224)">5888</span></td>
        <td align="center"><a href="goods_tag.php?act=list&goods_id=224" target="_blank">标签</a></td> <!-- 晒单插件 增加 by www.68ecshop.com -->
    <td align="center">
      <a href="/goods.php?id=224" target="_blank" title="查看"><img src="/admin/Public/images/icon_view.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=edit&goods_id=224&extension_code=" title="编辑"><img src="/admin/Public/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=copy&goods_id=224&extension_code=" title="复制"><img src="/admin/Public/images/icon_copy.gif" width="16" height="16" border="0" /></a>
      <a href="javascript:;" onclick="listTable.remove(224, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/admin/Public/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <img src="/admin/Public/images/empty.gif" width="16" height="16" border="0" />            <a href="getTaoBaoGoods.php?gid=224"><img src="/admin/Public/images/comment_icon.png" border="0" width="21" height="18" /></a>
    </td>
  </tr>
    <tr>
    <td><input type="checkbox" name="checkboxes[]" value="223" />223</td>
	    <td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 223)">乐和居 双人床 床 榻榻米床 头层真皮</span></td>
    <td><span onclick="listTable.edit(this, 'edit_goods_sn', 223)">ECS000223</span></td>
    <td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 223)">2999.00
    </span></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 223)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 223)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 223)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_hot', 223)" /></td>
	    <td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 223)">100</span></td>
        <td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 223)">5888</span></td>
        <td align="center"><a href="goods_tag.php?act=list&goods_id=223" target="_blank">标签</a></td> <!-- 晒单插件 增加 by www.68ecshop.com -->
    <td align="center">
      <a href="/goods.php?id=223" target="_blank" title="查看"><img src="/admin/Public/images/icon_view.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=edit&goods_id=223&extension_code=" title="编辑"><img src="/admin/Public/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=copy&goods_id=223&extension_code=" title="复制"><img src="/admin/Public/images/icon_copy.gif" width="16" height="16" border="0" /></a>
      <a href="javascript:;" onclick="listTable.remove(223, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/admin/Public/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <img src="/admin/Public/images/empty.gif" width="16" height="16" border="0" />            <a href="getTaoBaoGoods.php?gid=223"><img src="/admin/Public/images/comment_icon.png" border="0" width="21" height="18" /></a>
    </td>
  </tr>
    <tr>
    <td><input type="checkbox" name="checkboxes[]" value="222" />222</td>
	    <td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 222)">美姿蓝 家具 床 皮床 皮艺床 双人床 真皮床</span></td>
    <td><span onclick="listTable.edit(this, 'edit_goods_sn', 222)">ECS000222</span></td>
    <td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 222)">1390.00
    </span></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 222)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_best', 222)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 222)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_hot', 222)" /></td>
	    <td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 222)">1000</span></td>
        <td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 222)">43451</span></td>
        <td align="center"><a href="goods_tag.php?act=list&goods_id=222" target="_blank">标签</a></td> <!-- 晒单插件 增加 by www.68ecshop.com -->
    <td align="center">
      <a href="/goods.php?id=222" target="_blank" title="查看"><img src="/admin/Public/images/icon_view.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=edit&goods_id=222&extension_code=" title="编辑"><img src="/admin/Public/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=copy&goods_id=222&extension_code=" title="复制"><img src="/admin/Public/images/icon_copy.gif" width="16" height="16" border="0" /></a>
      <a href="javascript:;" onclick="listTable.remove(222, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/admin/Public/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <img src="/admin/Public/images/empty.gif" width="16" height="16" border="0" />            <a href="getTaoBaoGoods.php?gid=222"><img src="/admin/Public/images/comment_icon.png" border="0" width="21" height="18" /></a>
    </td>
  </tr>
    <tr>
    <td><input type="checkbox" name="checkboxes[]" value="221" />221</td>
	    <td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 221)">易简 专业婴儿儿童理发器 充电防水静音/HK668A(小鱼）</span></td>
    <td><span onclick="listTable.edit(this, 'edit_goods_sn', 221)">ECS000221</span></td>
    <td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 221)">89.00
    </span></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 221)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_best', 221)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 221)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 221)" /></td>
	    <td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 221)">100</span></td>
        <td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 221)">6788</span></td>
        <td align="center"><a href="goods_tag.php?act=list&goods_id=221" target="_blank">标签</a></td> <!-- 晒单插件 增加 by www.68ecshop.com -->
    <td align="center">
      <a href="/goods.php?id=221" target="_blank" title="查看"><img src="/admin/Public/images/icon_view.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=edit&goods_id=221&extension_code=" title="编辑"><img src="/admin/Public/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=copy&goods_id=221&extension_code=" title="复制"><img src="/admin/Public/images/icon_copy.gif" width="16" height="16" border="0" /></a>
      <a href="javascript:;" onclick="listTable.remove(221, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/admin/Public/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <img src="/admin/Public/images/empty.gif" width="16" height="16" border="0" />            <a href="getTaoBaoGoods.php?gid=221"><img src="/admin/Public/images/comment_icon.png" border="0" width="21" height="18" /></a>
    </td>
  </tr>
    <tr>
    <td><input type="checkbox" name="checkboxes[]" value="220" />220</td>
	    <td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 220)">润本（RUNBEN）驱蚊手环 植物精油驱蚊贴3条装</span></td>
    <td><span onclick="listTable.edit(this, 'edit_goods_sn', 220)">ECS000220</span></td>
    <td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 220)">13.50
    </span></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 220)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_best', 220)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 220)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 220)" /></td>
	    <td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 220)">100</span></td>
        <td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 220)">6788</span></td>
        <td align="center"><a href="goods_tag.php?act=list&goods_id=220" target="_blank">标签</a></td> <!-- 晒单插件 增加 by www.68ecshop.com -->
    <td align="center">
      <a href="/goods.php?id=220" target="_blank" title="查看"><img src="/admin/Public/images/icon_view.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=edit&goods_id=220&extension_code=" title="编辑"><img src="/admin/Public/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=copy&goods_id=220&extension_code=" title="复制"><img src="/admin/Public/images/icon_copy.gif" width="16" height="16" border="0" /></a>
      <a href="javascript:;" onclick="listTable.remove(220, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/admin/Public/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <img src="/admin/Public/images/empty.gif" width="16" height="16" border="0" />            <a href="getTaoBaoGoods.php?gid=220"><img src="/admin/Public/images/comment_icon.png" border="0" width="21" height="18" /></a>
    </td>
  </tr>
    <tr>
    <td><input type="checkbox" name="checkboxes[]" value="219" />219</td>
	    <td class="first-cell" style=""><span onclick="listTable.edit(this, 'edit_goods_name', 219)">润本 儿童宝宝无味电热蚊香液 婴儿无刺激(无味型)</span></td>
    <td><span onclick="listTable.edit(this, 'edit_goods_sn', 219)">ECS000219</span></td>
    <td align="right"><span onclick="listTable.edit(this, 'edit_goods_price', 219)">24.00
    </span></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_on_sale', 219)" /></td>
    <td align="center"><img src="/admin/Public/images/no.gif" onclick="listTable.toggle(this, 'toggle_best', 219)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_new', 219)" /></td>
    <td align="center"><img src="/admin/Public/images/yes.gif" onclick="listTable.toggle(this, 'toggle_hot', 219)" /></td>
	    <td align="center"><span onclick="listTable.edit(this, 'edit_sort_order', 219)">100</span></td>
        <td align="right"><span onclick="listTable.edit(this, 'edit_goods_number', 219)">8999</span></td>
        <td align="center"><a href="goods_tag.php?act=list&goods_id=219" target="_blank">标签</a></td> <!-- 晒单插件 增加 by www.68ecshop.com -->
    <td align="center">
      <a href="/goods.php?id=219" target="_blank" title="查看"><img src="/admin/Public/images/icon_view.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=edit&goods_id=219&extension_code=" title="编辑"><img src="/admin/Public/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a href="goods.php?act=copy&goods_id=219&extension_code=" title="复制"><img src="/admin/Public/images/icon_copy.gif" width="16" height="16" border="0" /></a>
      <a href="javascript:;" onclick="listTable.remove(219, '您确实要把该商品放入回收站吗？')" title="回收站"><img src="/admin/Public/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <img src="/admin/Public/images/empty.gif" width="16" height="16" border="0" />            <a href="getTaoBaoGoods.php?gid=219"><img src="/admin/Public/images/comment_icon.png" border="0" width="21" height="18" /></a>
    </td>
  </tr>
  </table>
<!-- end goods list -->

<!-- 分页 -->
<table id="page-table" cellspacing="0">
  <tr>
    <td align="right" nowrap="true">
          <!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
            <div id="turn-page">
        总计  <span id="totalRecords">117</span>
        个记录分为 <span id="totalPages">8</span>
        页当前第 <span id="pageCurrent">1</span>
        页，每页 <input type='text' size='3' id='pageSize' value="15" onkeypress="return listTable.changePageSize(event)" />
        <span id="page-link">
          <a href="javascript:listTable.gotoPageFirst()">第一页</a>
          <a href="javascript:listTable.gotoPagePrev()">上一页</a>
          <a href="javascript:listTable.gotoPageNext()">下一页</a>
          <a href="javascript:listTable.gotoPageLast()">最末页</a>
          <select id="gotoPage" onchange="listTable.gotoPage(this.value)">
            <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='8'>8</option>          </select>
        </span>
      </div>
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


//-->
</script>
</body>
</html>