<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: goods_info.htm 17126 2010-04-23 10:30:26Z liuhui $ -->
<!-- 修改 by www.68ecshop.com 百度编辑器 begin -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商之翼 管理中心 - 添加新商品 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/admin/Public/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/admin/Public/styles/main.css" rel="stylesheet" type="text/css" />
<!-- 修改 by www.68ecshop.com 百度编辑器 begin -->
<script type="text/javascript" src="/admin/Public/js/jquery.js"></script><script type="text/javascript" src="/admin/Public/js/jquery.json.js"></script><script type="text/javascript" src="/admin/Public/js/transport_bd.js"></script><script type="text/javascript" src="/admin/Public/js/common.js"></script><!-- 修改 by www.68ecshop.com 百度编辑器 end -->
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
<span class="action-span"><a href="goods.php?act=list">商品列表</a></span>
<span class="action-span1"><a href="index.php?act=main">商之翼 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加新商品 </span>
<div style="clear:both"></div>
</h1>
 <script type="text/javascript" src="/js/utils.js"></script><script type="text/javascript" src="/admin/Public/js/selectzone_bd.js"></script><script type="text/javascript" src="/admin/Public/js/colorselector.js"></script><!-- 修改 by www.68ecshop.com 百度编辑器 end -->
<script type="text/javascript" src="/js/calendar.php?lang="></script>
<link href="/js/calendar/calendar.css" rel="stylesheet" type="text/css" />
<!-- zTree Style -->
<link href="/admin/Public/styles/zTree/zTreeStyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/admin/Public/js/jquery.ztree.all-3.5.min.js"></script><script type="text/javascript" src="/admin/Public/js/category_selecter.js"></script> 
<!-- start goods form -->
<div class="tab-div">
	<!-- tab bar -->
	<div id="tabbar-div">
		<p>
			<span class="tab-front" id="general-tab">通用信息</span>
			<span class="tab-back" id="detail-tab">详细描述</span>
			<span class="tab-back" id="mix-tab">其他信息</span>
						<span class="tab-back" id="properties-tab">商品属性</span>
						<span class="tab-back" id="gallery-tab">商品相册</span>
			
		</p>
	</div>

	<!-- tab body -->
	<div id="tabbody-div">
		<form enctype="multipart/form-data" action="" method="post" name="theForm">
			<!-- 鏈€澶ф枃浠堕檺鍒 -->
			<input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
			<!-- 閫氱敤淇℃伅 -->
			<table width="100%" id="general-table" align="center">
				<tr>
					<td class="label">商品名称：</td>
					<td>
						<input type="text" name="goods_name" value="" style="float:left;color:;" size="30" />
						<div style="background-color:;float:left;margin-left:2px;" id="font_color" onclick="ColorSelecter.Show(this);">
							<img src="/admin/Public/images/color_selecter.gif" style="margin-top:-1px;" />
						</div>
<!--						<input type="hidden" id="goods_name_color" name="goods_name_color" value="" />
						&nbsp;
						<select name="goods_name_style">
							<option value="">字体样式</option>

							<option value="strong">加粗</option><option value="em">斜体</option><option value="u">下划线</option><option value="strike">删除线</option>
						</select>-->
						<span class="require-field">*</span>					</td>
				</tr>
<!--				<tr>
					<td class="label">
						<a href="javascript:showNotice('noticeGoodsSN');" title="点击此处查看提示信息">
							<img src="/admin/Public/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息">
						</a>
						商品货号：					</td>
					<td>
						<input type="text" name="goods_sn" value="" size="20" onblur="checkGoodsSn(this.value,'0')" />
						<span id="goods_sn_notice"></span>
						<br />
						<span class="notice-span" style="display:block"  id="noticeGoodsSN">如果您不输入商品货号，系统将自动生成一个唯一的货号。</span>
					</td>
				</tr>-->
				<tr>
					<td class="label">商品分类：</td>
					<td>
						<input type="text" id="cat_name" name="cat_name" nowvalue="0" value="">
						<input type="hidden" id="cat_id" name="cat_id" value="0">
												<a href="javascript:void(0)" onclick="rapidCatAdd()" title="添加分类" class="special">添加分类</a>
						<span id="category_add" style="display:none;">
							<input class="text" size="10" name="addedCategoryName" />
							<a href="javascript:void(0)" onclick="addCategory()" title=" 确定 " class="special"> 确定 </a>
							<a href="javascript:void(0)" onclick="return goCatPage()" title="分类管理" class="special">分类管理</a>
							<a href="javascript:void(0)" onclick="hideCatDiv()" title="隐藏" class="special"></a>
						</span>
						 <span class="require-field">*</span>						
					</td>
				</tr>
				<tr>
					<td class="label">扩展分类：</td>
					<td>
						<input type="button" value="添加" onclick="addOtherCat(this.parentNode)" class="button" />
												<select name="ext_cat[]" onchange="hideCatDiv()" ><option value="0">请选择...</option><option value="1" >食品生鲜</option><option value="14" >&nbsp;&nbsp;&nbsp;&nbsp;进口水果</option><option value="16" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;樱桃车厘子</option><option value="20" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;奇异果猕猴桃</option><option value="17" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;芒果桃李</option><option value="21" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;凤梨蓝莓</option><option value="18" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龙眼荔枝</option><option value="15" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;释迦芭乐</option><option value="22" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;榴莲山竹</option><option value="19" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;小波</option><option value="13" >&nbsp;&nbsp;&nbsp;&nbsp;糖果巧克力</option><option value="30" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;果冻</option><option value="27" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;软糖</option><option value="24" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;巧克力</option><option value="28" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;奶糖</option><option value="25" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;口香糖</option><option value="29" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;QQ糖</option><option value="26" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;棒棒糖</option><option value="9" >&nbsp;&nbsp;&nbsp;&nbsp;牛奶乳品</option><option value="33" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;儿童奶</option><option value="37" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;全脂奶</option><option value="34" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;酸奶</option><option value="31" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;常温奶</option><option value="38" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;成人奶粉</option><option value="35" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;豆奶</option><option value="32" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;乳饮料</option><option value="36" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;低脂奶</option><option value="10" >&nbsp;&nbsp;&nbsp;&nbsp;坚果炒货</option><option value="46" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;杏仁</option><option value="43" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;腰果</option><option value="40" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;夏威夷果</option><option value="44" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;瓜子</option><option value="41" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;碧根果</option><option value="45" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;花生</option><option value="42" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;开心果</option><option value="39" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;核桃</option><option value="12" >&nbsp;&nbsp;&nbsp;&nbsp;蜜饯果干</option><option value="49" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;葡萄干</option><option value="53" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;橄榄</option><option value="50" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;芒果干</option><option value="47" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;红枣</option><option value="54" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;其他</option><option value="51" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;香蕉干</option><option value="48" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;莓类</option><option value="52" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;山楂片</option><option value="2" >服装服饰</option><option value="60" >&nbsp;&nbsp;&nbsp;&nbsp;箱包馆</option><option value="108" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;拉杆包</option><option value="105" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;男士钱包</option><option value="102" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手提女包</option><option value="106" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;旅行箱</option><option value="103" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;女士钱包</option><option value="107" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;拉杆箱</option><option value="104" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;男士双肩</option><option value="101" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;单肩女包</option><option value="57" >&nbsp;&nbsp;&nbsp;&nbsp;男装馆</option><option value="82" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;长袖衬衫</option><option value="79" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;夹克</option><option value="83" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;休闲短裤</option><option value="80" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;风衣</option><option value="77" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;休闲裤</option><option value="84" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;POLO衫</option><option value="81" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;针织衫</option><option value="78" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;牛仔裤</option><option value="55" >&nbsp;&nbsp;&nbsp;&nbsp;女装馆</option><option value="66" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;牛仔裤</option><option value="63" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;棉麻T恤</option><option value="67" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;短外套</option><option value="64" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;时尚套装</option><option value="61" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;连衣裙</option><option value="68" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;防晒衫</option><option value="65" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;复古旗袍</option><option value="62" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;连体裤</option><option value="58" >&nbsp;&nbsp;&nbsp;&nbsp;户外鞋服</option><option value="92" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;登山鞋</option><option value="89" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;迷彩裤</option><option value="86" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;篮球鞋</option><option value="90" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;沙滩鞋</option><option value="87" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;帆布鞋</option><option value="91" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;钓鱼服</option><option value="88" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;羽毛球鞋</option><option value="85" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;跑步鞋</option><option value="59" >&nbsp;&nbsp;&nbsp;&nbsp;女鞋馆</option><option value="98" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;帆布鞋</option><option value="95" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;高跟鞋</option><option value="99" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;乐福鞋</option><option value="96" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;坡跟单鞋</option><option value="93" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;高跟凉拖</option><option value="100" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;松糕鞋</option><option value="97" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;浅口单鞋</option><option value="94" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;平底鞋</option><option value="56" >&nbsp;&nbsp;&nbsp;&nbsp;内衣馆</option><option value="76" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;瘦腿袜</option><option value="73" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;男士内裤</option><option value="70" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;薄款文胸</option><option value="74" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;夏季睡衣</option><option value="71" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;无钢圈文胸</option><option value="75" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;性感睡衣</option><option value="72" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;女士内裤</option><option value="69" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;聚拢文胸</option><option value="3" >个护化妆</option><option value="113" >&nbsp;&nbsp;&nbsp;&nbsp;香水彩妆</option><option value="143" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;套装</option><option value="140" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;唇部</option><option value="137" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;底妆</option><option value="141" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;美甲</option><option value="138" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;腮红</option><option value="142" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;美容工具</option><option value="139" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;眼部</option><option value="136" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;香水</option><option value="111" >&nbsp;&nbsp;&nbsp;&nbsp;身体护肤</option><option value="130" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 美胸</option><option value="127" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;颈部</option><option value="131" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;套装</option><option value="128" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手足</option><option value="125" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;沐浴</option><option value="129" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;纤体塑形</option><option value="126" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;润肤</option><option value="112" >&nbsp;&nbsp;&nbsp;&nbsp;口腔护理</option><option value="134" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;漱口水</option><option value="135" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;套装</option><option value="132" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;牙膏/牙粉</option><option value="133" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;牙刷/牙线</option><option value="109" >&nbsp;&nbsp;&nbsp;&nbsp;面部护肤</option><option value="114" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;清洁</option><option value="118" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;套装</option><option value="115" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;护肤</option><option value="116" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;面膜</option><option value="117" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;剃须</option><option value="110" >&nbsp;&nbsp;&nbsp;&nbsp;洗发护发</option><option value="124" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;套装</option><option value="121" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;染发</option><option value="122" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;造型</option><option value="119" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;洗发</option><option value="123" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;假发</option><option value="120" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;护发</option><option value="4" >手机数码</option><option value="146" >&nbsp;&nbsp;&nbsp;&nbsp;数码影音</option><option value="175" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;户外器材</option><option value="172" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;拍立得</option><option value="176" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数码相框</option><option value="173" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;运动相机</option><option value="170" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数码相机</option><option value="177" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;影棚器材</option><option value="174" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;摄像机</option><option value="171" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;单反相机</option><option value="147" >&nbsp;&nbsp;&nbsp;&nbsp;智能设备</option><option value="169" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;体感车</option><option value="166" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;智能眼镜</option><option value="167" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;运动跟踪器</option><option value="164" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;智能手环</option><option value="168" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;智能家居</option><option value="165" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;智能手表</option><option value="144" >&nbsp;&nbsp;&nbsp;&nbsp;热卖手机</option><option value="153" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;联通4G</option><option value="150" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;小米特供</option><option value="154" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电信4G</option><option value="151" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;魅族手机</option><option value="148" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;三星盖乐世</option><option value="155" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;移动4G</option><option value="152" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;华为荣耀</option><option value="149" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;iPhone</option><option value="145" >&nbsp;&nbsp;&nbsp;&nbsp;手机配件</option><option value="162" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手机耳机</option><option value="159" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;充电器</option><option value="156" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电池</option><option value="163" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;保护套</option><option value="160" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;创意配件</option><option value="157" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;移动电源</option><option value="161" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手机饰品</option><option value="158" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;蓝牙耳机</option><option value="5" >家用电器</option><option value="178" >&nbsp;&nbsp;&nbsp;&nbsp;大家电</option><option value="188" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;热水器</option><option value="185" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;洗衣机</option><option value="189" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;消毒柜/洗碗机</option><option value="186" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;家庭影院</option><option value="183" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;平板电视</option><option value="190" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;冷柜/冰吧</option><option value="187" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;烟机/灶具</option><option value="184" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;空调冰箱</option><option value="182" >&nbsp;&nbsp;&nbsp;&nbsp;五金家装</option><option value="218" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;家具五金</option><option value="215" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电动工具</option><option value="219" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电工电料</option><option value="216" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手动工具</option><option value="220" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;监控安防</option><option value="217" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;厨卫五金</option><option value="179" >&nbsp;&nbsp;&nbsp;&nbsp;生活电器</option><option value="191" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电风扇</option><option value="196" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;取暖电器</option><option value="193" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;加湿器</option><option value="197" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;饮水机</option><option value="194" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;吸尘器</option><option value="198" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;其它生活电器</option><option value="195" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;挂烫机/熨斗</option><option value="192" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;净化器</option><option value="180" >&nbsp;&nbsp;&nbsp;&nbsp;厨房电器</option><option value="202" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电饼铛/烧烤盘</option><option value="199" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电饭煲</option><option value="206" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;其它厨房电器</option><option value="203" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电炖锅</option><option value="200" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;微波炉</option><option value="204" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;果蔬解毒机</option><option value="201" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电磁炉</option><option value="205" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;养生壶/煎药壶</option><option value="181" >&nbsp;&nbsp;&nbsp;&nbsp;个护健康</option><option value="212" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;血糖仪</option><option value="209" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;按摩椅</option><option value="213" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;计步器/脂肪检测</option><option value="210" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;足浴盆</option><option value="207" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;剃须刀</option><option value="214" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;其它健康电器</option><option value="211" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;健康秤/厨房秤</option><option value="208" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电吹风</option><option value="6" >家纺家居</option><option value="309" >&nbsp;&nbsp;&nbsp;&nbsp;灯具</option><option value="341" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;吊灯</option><option value="338" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;落地灯</option><option value="335" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;吸顶灯</option><option value="339" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;应急灯/手电</option><option value="336" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;筒灯射灯</option><option value="340" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;装饰灯</option><option value="337" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LED灯</option><option value="334" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;台灯</option><option value="310" >&nbsp;&nbsp;&nbsp;&nbsp;家装软饰</option><option value="347" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;装饰字画</option><option value="344" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;沙发垫套/椅垫</option><option value="348" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;墙贴/装饰贴</option><option value="345" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;帘艺隔断</option><option value="342" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;桌布/罩件</option><option value="349" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;摆件花瓶</option><option value="346" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;相框/照片墙</option><option value="343" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;地毯地垫</option><option value="307" >&nbsp;&nbsp;&nbsp;&nbsp;家具</option><option value="325" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;阳台/户外</option><option value="322" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;餐厅家具</option><option value="326" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;沙发</option><option value="323" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;书房家具</option><option value="320" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;卧室家具</option><option value="327" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;鞋架/衣帽架</option><option value="324" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;储物家具</option><option value="321" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;客厅家具</option><option value="311" >&nbsp;&nbsp;&nbsp;&nbsp;生活日用</option><option value="354" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;洗晒/熨烫</option><option value="351" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;雨伞雨具</option><option value="355" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;净化除味</option><option value="352" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;浴室用品</option><option value="353" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;缝纫/针织用品</option><option value="350" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;收纳用品</option><option value="306" >&nbsp;&nbsp;&nbsp;&nbsp;家纺</option><option value="315" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;凉席</option><option value="312" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;床品套件</option><option value="319" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;窗帘/窗纱</option><option value="316" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;床单被罩</option><option value="313" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;被子</option><option value="317" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;毛巾浴巾</option><option value="314" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;蚊帐</option><option value="318" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;床垫/床褥</option><option value="308" >&nbsp;&nbsp;&nbsp;&nbsp;厨具</option><option value="331" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;水具酒具</option><option value="328" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;烹饪锅具</option><option value="332" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;餐具</option><option value="329" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;刀剪菜板</option><option value="333" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;茶具/咖啡具</option><option value="330" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;厨房配件</option><option value="7" >酒类饮料</option><option value="273" >&nbsp;&nbsp;&nbsp;&nbsp;饮料饮品</option><option value="295" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;风味奶</option><option value="292" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;功能饮料</option><option value="289" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;果蔬汁</option><option value="296" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;植物蛋白饮料</option><option value="293" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;纯牛奶</option><option value="290" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;茶饮料</option><option value="294" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;酸奶</option><option value="291" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;碳酸饮料</option><option value="274" >&nbsp;&nbsp;&nbsp;&nbsp;茗茶</option><option value="298" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;铁观音</option><option value="305" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;其他茶</option><option value="302" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;红茶</option><option value="299" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;普洱</option><option value="303" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;花果茶</option><option value="300" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龙井</option><option value="304" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;养生茶</option><option value="301" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;绿茶</option><option value="271" >&nbsp;&nbsp;&nbsp;&nbsp;酒水</option><option value="279" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;黄酒/米酒</option><option value="276" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;白酒</option><option value="280" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;养生酒</option><option value="277" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;啤酒</option><option value="281" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;预调酒</option><option value="278" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;葡萄酒/果酒</option><option value="272" >&nbsp;&nbsp;&nbsp;&nbsp;冲调饮品</option><option value="282" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;蜂蜜</option><option value="286" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;奶茶</option><option value="283" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;成人奶粉</option><option value="287" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;麦片谷物</option><option value="284" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;豆浆/豆奶粉</option><option value="297" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;果味冲调</option><option value="288" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;咖啡</option><option value="285" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;茶叶</option><option value="8" >母婴用品</option><option value="225" >&nbsp;&nbsp;&nbsp;&nbsp;车床/床品</option><option value="260" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;儿童家具</option><option value="257" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;婴儿床</option><option value="261" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;睡袋/抱被</option><option value="258" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;餐椅</option><option value="255" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;安全座椅</option><option value="262" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;凉席/蚊帐</option><option value="259" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;三轮车</option><option value="256" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手推车</option><option value="222" >&nbsp;&nbsp;&nbsp;&nbsp;营养/辅食</option><option value="234" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;果汁/泥</option><option value="238" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;清火开胃</option><option value="235" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;面食类</option><option value="239" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;钙铁锌</option><option value="236" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;宝宝零食</option><option value="233" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;米粉</option><option value="240" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;益生菌</option><option value="237" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DHA</option><option value="226" >&nbsp;&nbsp;&nbsp;&nbsp;孕妈专区</option><option value="266" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;腰凳</option><option value="263" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;孕妇裙</option><option value="270" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;孕妇内裤</option><option value="267" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;妈咪包</option><option value="264" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;打底裤</option><option value="268" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;收腹带</option><option value="265" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;防辐射服</option><option value="269" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;哺乳文胸</option><option value="223" >&nbsp;&nbsp;&nbsp;&nbsp;孕婴洗护</option><option value="247" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;孕妇护肤</option><option value="244" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;防蚊/驱蚊</option><option value="241" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;洗衣液/皂</option><option value="245" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;爽身粉</option><option value="242" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;宝宝沐浴</option><option value="246" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;奶瓶清洗</option><option value="243" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;儿童防晒</option><option value="224" >&nbsp;&nbsp;&nbsp;&nbsp;喂养用品</option><option value="250" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;浴室用品</option><option value="254" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;防溢乳垫</option><option value="251" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;水壶/水杯</option><option value="248" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;奶嘴奶瓶</option><option value="252" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;吸奶器</option><option value="249" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;驱蚊用品</option><option value="253" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;理发器</option><option value="221" >&nbsp;&nbsp;&nbsp;&nbsp;孕婴奶粉</option><option value="231" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2段</option><option value="228" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;孕妈奶粉</option><option value="232" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3段</option><option value="229" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pre段</option><option value="230" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1段</option><option value="227" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;特配奶粉</option></select>
					</td>
				</tr>
<!--				<tr>
					<td class="label">商品品牌：</td>
					<td>
						 代码修改_start_derek20150129admin_goods  www.68ecshop.com 

						<input id="brand_search" name="brand_search" type="text" value="请输入……" onclick="onC_search()" onblur="onB_search()" oninput="onK_search(this.value)" />
						<input id="brand_search_bf" name="brand_search_bf" type="hidden" value="" />
						<input id="brand_search_jt" name="brand_search_jt" type="hidden" value="0" />
						<script language="javascript">
            function onC_search()
			{
				if (document.getElementById("brand_search").value == "请输入……")
					document.getElementById("brand_search").value = "";
				document.getElementById("brand_search_jt").value = 1;
				document.getElementById("brand_content").style.display = "block";
				$("div[id^='@']>div").css('display','block');
			}
            function onB_search()
			{
				if (document.getElementById("brand_search").value == "")
					document.getElementById("brand_search").value = document.getElementById("brand_search_bf").value;
				document.getElementById("brand_search_jt").value = 0;
			}
			function onK_search(w)
			{
				if (w != "")
				{
					$("div[id^='@']>div").css('display','none');
					$("div[id^='@']>div[id*='"+w+"']").css('display','block');
				}
				else
					$("div[id^='@']>div").css('display','block');
			}
            </script>-->

						<!-- 代码修改_end_derek20150129admin_goods  www.68ecshop.com -->
<!--												<a href="javascript:void(0)" title="添加品牌" onclick="rapidBrandAdd()" class="special">添加品牌</a>
						<span id="brand_add" style="display:none;">
							<input class="text" size="15" name="addedBrandName" />
							<a href="javascript:void(0)" onclick="addBrand()" class="special"> 确定 </a>
							<a href="javascript:void(0)" onclick="return goBrandPage()" title="品牌管理" class="special">品牌管理</a>
							<a href="javascript:void(0)" onclick="hideBrandDiv()" title="隐藏" class="special"><<</a>
						</span>
						
						

						<input type="hidden" name="brand_id" id="brand_id" value="0" />

						  
						<script language="javascript">
            function go_brand_id(id,name)
			{
				document.getElementById("brand_id").value = id;
				document.getElementById("brand_search").value = name;
				document.getElementById("brand_content").style.display = "none";
			}
			function no_look_brand_content()
			{
				document.getElementById("brand_content").style.display = "none";
			}
            </script>-->

						<!-- 代码增加_end_derek20150129admin_goods  www.68ecshop.com -->
					</td>
				</tr>
								<tr>
					<td class="label">本店售价：</td>
					<td>
						<input type="text" name="shop_price" value="0" size="20" onblur="priceSetted()" />
						<input type="button" value="按市场价计算" onclick="marketPriceSetted()" />
						<span class="require-field">*</span>					</td>
				</tr>
								<tr>
					<td class="label">
						<a href="javascript:showNotice('noticeUserPrice');" title="点击此处查看提示信息">
							<img src="/admin/Public/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息">
						</a>
						会员价格：					</td>
					<td>
						 普通会员						<span id="nrank_1"></span>
						<input type="text" id="rank_1" name="user_price[]" value="-1" onkeyup="if(parseInt(this.value)<-1){this.value='-1';};set_price_note(1)" size="8" />
						<input type="hidden" name="user_rank[]" value="1" />
<!--						 QQ						<span id="nrank_5"></span>
						<input type="text" id="rank_5" name="user_price[]" value="-1" onkeyup="if(parseInt(this.value)<-1){this.value='-1';};set_price_note(5)" size="8" />
						<input type="hidden" name="user_rank[]" value="5" />
						 铜牌会员						<span id="nrank_2"></span>
						<input type="text" id="rank_2" name="user_price[]" value="-1" onkeyup="if(parseInt(this.value)<-1){this.value='-1';};set_price_note(2)" size="8" />
						<input type="hidden" name="user_rank[]" value="2" />
						 金牌会员						<span id="nrank_3"></span>
						<input type="text" id="rank_3" name="user_price[]" value="-1" onkeyup="if(parseInt(this.value)<-1){this.value='-1';};set_price_note(3)" size="8" />
						<input type="hidden" name="user_rank[]" value="3" />
						 钻石会员						<span id="nrank_4"></span>
						<input type="text" id="rank_4" name="user_price[]" value="-1" onkeyup="if(parseInt(this.value)<-1){this.value='-1';};set_price_note(4)" size="8" />
						<input type="hidden" name="user_rank[]" value="4" />-->
												<br />
						<span class="notice-span" style="display:block"  id="noticeUserPrice">会员价格为-1时表示会员价格按会员等级折扣率计算。你也可以为每个等级指定一个固定价格</span>
					</td>
				</tr>
				
				<!--鍟嗗搧浼樻儬浠锋牸-->
<!--				<tr>
					<td class="label">
						<a href="javascript:showNotice('volumePrice');" title="点击此处查看提示信息">
							<img src="/admin/Public/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息">
						</a>
						商品优惠价格：					</td>
					<td>
						<table width="100%" id="tbody-volume" align="center">
														<tr>
								<td>
																		<a href="javascript:;" onclick="addVolumePrice(this)">[+]</a>
									 优惠数量									<input type="text" name="volume_number[]" size="8" value="" />
									优惠价格									<input type="text" name="volume_price[]" size="8" value="" />
								</td>
							</tr>
													</table>
						<span class="notice-span" style="display:block"  id="volumePrice">购买数量达到优惠数量时享受的优惠价格</span>
					</td>
				</tr>
				鍟嗗搧浼樻儬浠锋牸 end -->

				<tr>
					<td class="label">市场售价：</td>
					<td>
						<input type="text" name="market_price" value="0" size="20" />
						<input type="button" value="取整数" onclick="integral_market_price()" />
					</td>
				</tr>
				<tr>
					<td class="label">
						<a href="javascript:showNotice('giveIntegral');" title="点击此处查看提示信息">
							<img src="/admin/Public/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息">
						</a>
						赠送消费积分数：					</td>
					<td>
						<input type="text" name="jifen" value="-1" size="20" />
						<br />
						<span class="notice-span" style="display:block"  id="giveIntegral">购买该商品时赠送消费积分数,-1表示按商品价格赠送</span>
					</td>
				</tr>
				<tr>
					<td class="label">
						<a href="javascript:showNotice('rankIntegral');" title="点击此处查看提示信息">
							<img src="/admin/Public/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息">
						</a>
						赠送等级积分数：					</td>
					<td>
						<input type="text" name="jyz" value="-1" size="20" />
						<br />
						<span class="notice-span" style="display:block"  id="rankIntegral">购买该商品时赠送等级积分数,-1表示按商品价格赠送</span>
					</td>
				</tr>
				<!-- <tr>
					<td class="label">
						<a href="javascript:showNotice('noticPoints');" title="点击此处查看提示信息">
							<img src="/admin/Public/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息">
						</a>
						积分购买金额：					</td>
					<td>
						<input type="text" name="integral" value="0" size="20" onblur="parseint_integral()" ;/>
						<br />
						<span class="notice-span" style="display:block"  id="noticPoints">(此处需填写金额)购买该商品时最多可以使用积分的金额</span>
					</td>
				</tr> -->
				<tr>
					<td class="label">
						<label for="is_promote">
							<input type="checkbox" id="is_promote" name="is_promote" value="1"  onclick="handlePromote(this.checked);" />
							促销价：						</label>
					</td>
					<td id="promote_3">
						<input type="text" id="promote_1" name="promote_price" value="0" size="20" />
					</td>
				</tr>

				<tr id="promote_4">
					<td class="label" id="promote_5">促销日期：</td>
					<td id="promote_6">
						<input name="promote_start_time" type="text" id="promote_start_date" size="12" value='2016-09-17' readonly="readonly" />
						<input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('promote_start_date', '%Y-%m-%d', false, false, 'selbtn1');" value="选择" class="button" />
						-
						<input name="promote_end_time" type="text" id="promote_end_date" size="12" value='2016-10-17' readonly="readonly" />
						<input name="selbtn2" type="button" id="selbtn2" onclick="return showCalendar('promote_end_date', '%Y-%m-%d', false, false, 'selbtn2');" value="选择" class="button" />
					</td>
				</tr>


<!--				<tr>
					<td class="label">
						<label for="is_buy">
							<input type="checkbox" id="is_buy" name="is_buy" value="1"  onclick="handleBuy(this.checked);" />
							限购数量：
						</label>
					</td>
					<td id="promote_3">
						<input type="text" id="buymax" name="buymax" value="" size="20"  disabled="disabled" />
						<br />
						<span class="notice-span" style="display:block"  id="giveIntegral">表示限购日期内，每个用户最多只能购买多少件。0：表示不限购</span>
					</td>
				</tr>
				<tr id="promote_4">
					<td class="label">限购日期：</td>
					<td>
						<input name="buymax_start_date" type="text" id="buymax_start_date" size="12" value='' readonly="readonly" />
						<input name="selbtn3" type="button" id="selbtn3" onclick="return showCalendar('buymax_start_date', '%Y-%m-%d', false, false, 'selbtn3');" value="选择" class="button"  disabled="disabled" />
						-
						<input name="buymax_end_date" type="text" id="buymax_end_date" size="12" value='' readonly="readonly" />
						<input name="selbtn4" type="button" id="selbtn4" onclick="return showCalendar('buymax_end_date', '%Y-%m-%d', false, false, 'selbtn4');" value="选择" class="button"  disabled="disabled" />
					</td>
				</tr>

				<tr>
					<td class="label" id="promote_5">分成金额：</td>
					<td id="promote_7">
						<input type="text" id="promote_1" name="cost_price" value="0" size="20" />
						<br />
						<span class="notice-span">分成金额为客户购买本商品，其推荐人能够通过分成获得的金额基数</span>
					</td>

				</tr>-->

				<tr>
					<td class="label">上传商品图片：</td>
					<td>
						<input type="file" name="logo" size="35" />
												<img src="/admin/Public/images/no.gif" />
												<br />
						
					</td>
				</tr>
				
<!--				代码增加_start byjdy
				<tr>
					<td class="label">
						<font color=#ff3300>是否显示在频道首页：</font>
					</td>
					<td>
						<input type="checkbox" name="is_catindex" value="1"  />
						打勾表示在频道首页显示，否则不显示。
					</td>
				</tr>
				代码增加_end byjdy-->
				
				<!---->
				
			</table>

			<!-- 璇︾粏鎻忚堪 -->
			<table width="100%" id="detail-table" style="display:none">
				<tr>
					<td>
    <script type="text/javascript" charset="utf-8" 

src="/includes/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" 

src="/includes/ueditor/ueditor.all.js"></script>
    <textarea name="goods_desc" id="goods_desc" style="width:100%;"></textarea>
    <script type="text/javascript">
    UE.getEditor("goods_desc",{
    theme:"default", //皮肤
    lang:"zh-cn",    //语言
    initialFrameWidth:1000,  //初始化编辑器宽度,默认650
    initialFrameHeight:350  //初始化编辑器高度,默认180
    });
    </script></td>
				</tr>
			</table>

			<!-- 鍏朵粬淇℃伅 -->
			<table width="90%" id="mix-table" style="display:none" align="center">
				<tr>
					<td class="label">
						<a href="javascript:showNotice('noticeStorage');" title="点击此处查看提示信息">
							<img src="/admin/Public/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息">
						</a>
						商品库存数量：					</td>
					<!--            <td><input type="text" name="goods_number" value="1" size="20"  /><br />-->
					<td>
						<input type="text" name="goods_number" value="1" size="20" />
						<br />
						<span class="notice-span" style="display:block"  id="noticeStorage">库存在商品为虚货或商品存在货品时为不可编辑状态，库存数值取决于其虚货数量或货品数量</span>
					</td>
				</tr>
<!--				<tr>
					<td class="label">库存警告数量：</td>
					<td>
						<input type="text" name="warn_number" value="1" size="20" />
					</td>
				</tr>-->
								<tr>
					<td class="label">加入推荐：</td>
					<td>
						<input type="checkbox" name="is_best" value="1"  />
						精品						<input type="checkbox" name="is_new" value="1"  />
						新品						<input type="checkbox" name="is_hot" value="1"  />
						热销					</td>
				</tr>
				<tr id="alone_sale_1">
					<td class="label" id="alone_sale_2">上架：</td>
					<td id="alone_sale_3">
						<input type="checkbox" name="is_on_sale" value="1" checked="checked"  />
						打勾表示允许销售，否则不允许销售。					</td>
				</tr>
				
				
				<tr>
					<td class="label">商品关键词：</td>
					<td>
						<input type="text" name="seo_keyword" value="" size="40" />
						用空格分隔					</td>
				</tr>
				
				
			</table>

			<!-- 灞炴€т笌瑙勬牸 -->
						<table width="100%" id="properties-table" style="display:none" align="center">
				<tr>
					<td class="label">
						<a href="javascript:showNotice('noticeGoodsType');" title="点击此处查看提示信息">
							<img src="/admin/Public/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息">
						</a>
						商品类型：					</td>
					<td>
						<select name="goods_type" onchange="getAttrList(0)">
							<option value="0">请选择商品类型</option>

							<option value='1'>手机数码</option><option value='2'>服饰鞋帽</option>
						</select>
						<br />
						<span class="notice-span" style="display:block"  id="noticeGoodsType">请选择商品的所属类型，进而完善此商品的属性</span>
					</td>
				</tr>
				<tr>
					<td id="tbody-goodsAttr" colspan="2" style="padding:0"><table width="100%" id="attrTable"></table><div id="input_txm"></div></td>
				</tr>
			</table>
			
			<!--代码修改_start By www.ecshop68.com  将 商品相册 这部分代码完全修改成下面这样-->
			<table width="100%" id="gallery-table" style="display:none" align="center">
				<!-- 图片列表 -->
				<tr>
					<td>
						<style>
.attr-color-div {
	width: 100%;
	background: #BBDDE5;
	text-indent: 10px;
	height: 26px;
	padding-top: 1px;
}

.attr-front {
	background: #CCFF99;
	line-height: 24px;
	font-weight: bold;
	padding: 6px 15px 6px 18px;
}

.attr-back {
	color: #FF0000;
	font-weight: bold;
	line-height: 24px;
	padding: 6px 15px 6px 18px;
	border-right: 1px solid #FFF;
}
</style>
												<script>
			
			function changeCurrentColor(n)
			{
			for(i=1;i<=1;i++)
			{
				document.getElementById("color_" + i).className = "attr-back";
			}
			document.getElementById("color_" + n).className = "attr-front";
			}
			
			</script>
						<font color=#ff3300>请选择商品颜色</font>
						（点击下面不同颜色切换到该颜色对应的相册）
						<br>
						<br>
						<div class="attr-color-div">
														<span class="attr-front" id="color_1">
								<a href="attr_img_upload.php?goods_id=0&goods_attr_id=" onclick="javascript:changeCurrentColor(1)" target="attr_upload">通用</a>
							</span>
													</div>
						<iframe name="attr_upload" src="attr_img_upload.php?goods_id=0&goods_attr_id=" frameborder=1 scrolling=no width="100%" height="auto" style="min-height:630px; border:1px #eee solid; margin-top:5px;"> </iframe>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
			</table>

			
			<div class="button-div">
				<input type="hidden" name="goods_id" value="0" />
				
				<!--修改代码_start By www.ecshop68.com 主要是给这两个INPUT各自增加了一个ID， id="goods_info_submit"  id="goods_info_reset" -->
				<input id="goods_info_submit" type="submit" value=" 确定 " class="button" />
				<input id="goods_info_reset" type="reset" value=" 重置 " class="button" />
				<!--修改代码_end By www.ecshop68.com-->

			</div>
			<input type="hidden" name="act" value="insert" />
		</form>
	</div>
</div>
<!-- end goods form -->
<script type="text/javascript" src="/admin/Public/js/validator.js"></script><script type="text/javascript" src="/admin/Public/js/tab.js"></script><script language="JavaScript">
  var goodsId = '0';
  var elements = document.forms['theForm'].elements;
  var sz1 = new SelectZone(1, elements['source_select1'], elements['target_select1']);
  var sz2 = new SelectZone(2, elements['source_select2'], elements['target_select2'], elements['price2']);
  var sz3 = new SelectZone(1, elements['source_select3'], elements['target_select3']);
  var marketPriceRate = 1.2;
  var integralPercent = 1;

  
//  onload = function()
//  {
//      handlePromote(document.forms['theForm'].elements['is_promote'].checked);
//
//      if (document.forms['theForm'].elements['auto_thumb'])
//      {
//          handleAutoThumb(document.forms['theForm'].elements['auto_thumb'].checked);
//      }
//
//      // 妫€鏌ユ柊璁㈠崟
//      startCheckOrder();
//      
//            set_price_note(1);
//            set_price_note(5);
//            set_price_note(2);
//            set_price_note(3);
//            set_price_note(4);
//            
//      document.forms['theForm'].reset();
//  }

  function validate(goods_id)
  {
      var validator = new Validator('theForm');
      var goods_sn  = document.forms['theForm'].elements['goods_sn'].value;

      validator.required('goods_name', goods_name_not_null);
      if (document.forms['theForm'].elements['cat_id'].value == 0)
      {
          validator.addErrorMsg(goods_cat_not_null);
      }

      checkVolumeData("1",validator);

      validator.required('shop_price', shop_price_not_null);
      validator.isNumber('shop_price', shop_price_not_number, true);
      validator.isNumber('market_price', market_price_not_number, false);
      if (document.forms['theForm'].elements['is_promote'].checked)
      {
          validator.required('promote_start_date', promote_start_not_null);
          validator.required('promote_end_date', promote_end_not_null);
          validator.islt('promote_start_date', 'promote_end_date', promote_not_lt);
      }

      if (document.forms['theForm'].elements['goods_number'] != undefined)
      {
          validator.isInt('goods_number', goods_number_not_int, false);
          validator.isInt('warn_number', warn_number_not_int, false);
      }

      var callback = function(res)
     {
      if (res.error > 0)
      {
        alert("您输入的货号已存在，请换一个");
      }
      else
      {
         if(validator.passed())
         {
         document.forms['theForm'].submit();
         }
      }
  }
    Ajax.call('goods.php?is_ajax=1&act=check_goods_sn', "goods_sn=" + goods_sn + "&goods_id=" + goods_id, callback, "GET", "JSON");
}

  /**
   * 鍒囨崲鍟嗗搧绫诲瀷
   */
  function getAttrList(goodsId)
  {
      var selGoodsType = document.forms['theForm'].elements['goods_type'];

      if (selGoodsType != undefined)
      {
          var goodsType = selGoodsType.options[selGoodsType.selectedIndex].value;

          Ajax.call('goods.php?is_ajax=1&act=get_attr', 'goods_id=' + goodsId + "&goods_type=" + goodsType, setAttrList, "GET", "JSON");
      }
  }
function array_search_value(arrayinfo,value){
	for(i in arrayinfo){
		if(arrayinfo[i] == value){
			return false;
		}
	}
	return true;
}

  ///条形码选择传值

function getType(txm,id,value,good_id)
{
	
	var txm = txm;
	var cid = id;//所选属性的上级ID
	var val = value;//选中的值
	var goodid = good_id;//商品id
	var parm = new Array();
	var j = 0;
	$('.ctxm_'+txm).each(function(k,v){
		if(array_search_value(parm,v.value)){
			parm[j] = v.value;
			j++;
		}
	})
	
	var par_str = '';
	var parm_key = '';
	var parm_value = '';
	for(i in parm){
		parm_key = '&attr_'+parm[i]+'='; 
		parm_value = '';
		$('.attr_num_'+parm[i]).each(function(key,value){
			if(value.value !=''){
				parm_value += value.value+',';
			}
		})
		par_str += parm_key+parm_value;
	}
	
	Ajax.call('goods.php?is_ajax=1&act=get_txm', 'goods_id=' + goodid + "&id=" + id + par_str , chu, "GET", "JSON");
	
	return;
}
/*条形码数据返回*/
function chu (result)
{
	var opanel = document.getElementById("input_txm");
	var zhi = result.content;
	opanel.innerHTML = zhi;
}
  function setAttrList(result, text_result)
  {
    document.getElementById('tbody-goodsAttr').innerHTML = result.content;
  }

  /**
   * 鎸夋瘮渚嬭?绠椾环鏍
   * @param   string  inputName   杈撳叆妗嗗悕绉
   * @param   float   rate        姣斾緥
   * @param   string  priceName   浠锋牸杈撳叆妗嗗悕绉帮紙濡傛灉娌℃湁锛屽彇shop_price锛
   */
  function computePrice(inputName, rate, priceName)
  {
      var shopPrice = priceName == undefined ? document.forms['theForm'].elements['shop_price'].value : document.forms['theForm'].elements[priceName].value;
      shopPrice = Utils.trim(shopPrice) != '' ? parseFloat(shopPrice)* rate : 0;
      if(inputName == 'integral')
      {
          shopPrice = parseInt(shopPrice);
      }
      shopPrice += "";

      n = shopPrice.lastIndexOf(".");
      if (n > -1)
      {
          shopPrice = shopPrice.substr(0, n + 3);
      }

      if (document.forms['theForm'].elements[inputName] != undefined)
      {
          document.forms['theForm'].elements[inputName].value = shopPrice;
      }
      else
      {
          document.getElementById(inputName).value = shopPrice;
      }
  }

  /**
   * 璁剧疆浜嗕竴涓?晢鍝佷环鏍硷紝鏀瑰彉甯傚満浠锋牸銆佺Н鍒嗕互鍙婁細鍛樹环鏍
   */
  function priceSetted()
  {
    computePrice('market_price', marketPriceRate);
    computePrice('integral', integralPercent / 100);
    
        set_price_note(1);
        set_price_note(5);
        set_price_note(2);
        set_price_note(3);
        set_price_note(4);
        
  }

  /**
   * 璁剧疆浼氬憳浠锋牸娉ㄩ噴
   */
  function set_price_note(rank_id)
  {
    var shop_price = parseFloat(document.forms['theForm'].elements['shop_price'].value);

    var rank = new Array();
    
        rank[1] = 100;
        rank[5] = 100;
        rank[2] = 95;
        rank[3] = 90;
        rank[4] = 85;
        
    if (shop_price >0 && rank[rank_id] && document.getElementById('rank_' + rank_id) && parseInt(document.getElementById('rank_' + rank_id).value) == -1)
    {
      var price = parseInt(shop_price * rank[rank_id] + 0.5) / 100;
      if (document.getElementById('nrank_' + rank_id))
      {
        document.getElementById('nrank_' + rank_id).innerHTML = '(' + price + ')';
      }
    }
    else
    {
      if (document.getElementById('nrank_' + rank_id))
      {
        document.getElementById('nrank_' + rank_id).innerHTML = '';
      }
    }
  }

  /**
   * 鏍规嵁甯傚満浠锋牸锛岃?绠楀苟鏀瑰彉鍟嗗簵浠锋牸銆佺Н鍒嗕互鍙婁細鍛樹环鏍
   */
  function marketPriceSetted()
  {
    computePrice('shop_price', 1/marketPriceRate, 'market_price');
    computePrice('integral', integralPercent / 100);
    
        set_price_note(1);
        set_price_note(5);
        set_price_note(2);
        set_price_note(3);
        set_price_note(4);
        
  }

  /**
   * 鏂板?涓€涓??鏍
   */
  function addSpec(obj)
  {
      var src   = obj.parentNode.parentNode;
      var idx   = rowindex(src);
      var tbl   = document.getElementById('attrTable');
      var row   = tbl.insertRow(idx + 1);
      var cell1 = row.insertCell(-1);
      var cell2 = row.insertCell(-1);
      var regx  = /<a([^>]+)<\/a>/i;

      cell1.className = 'label';
      cell1.innerHTML = src.childNodes[0].innerHTML.replace(/(.*)(addSpec)(.*)(\[)(\+)/i, "$1removeSpec$3$4-");
      cell2.innerHTML = src.childNodes[1].innerHTML.replace(/readOnly([^\s|>]*)/i, '');
  }

  /**
   * 鍒犻櫎瑙勬牸鍊
   */
  function removeSpec(obj)
  {
      var row = rowindex(obj.parentNode.parentNode);
      var tbl = document.getElementById('attrTable');

      tbl.deleteRow(row);
  }

  /**
   * 澶勭悊瑙勬牸
   */
  function handleSpec()
  {
      var elementCount = document.forms['theForm'].elements.length;
      for (var i = 0; i < elementCount; i++)
      {
          var element = document.forms['theForm'].elements[i];
          if (element.id.substr(0, 5) == 'spec_')
          {
              var optCount = element.options.length;
              var value = new Array(optCount);
              for (var j = 0; j < optCount; j++)
              {
                  value[j] = element.options[j].value;
              }

              var hiddenSpec = document.getElementById('hidden_' + element.id);
              hiddenSpec.value = value.join(String.fromCharCode(13)); // 鐢ㄥ洖杞﹂敭闅斿紑姣忎釜瑙勬牸
          }
      }
      return true;
  }

  function handlePromote(checked)
  {
      document.forms['theForm'].elements['promote_price'].disabled = !checked;
      document.forms['theForm'].elements['selbtn1'].disabled = !checked;
      document.forms['theForm'].elements['selbtn2'].disabled = !checked;
  }

   function handleBuy(checked)
  {
      document.forms['theForm'].elements['buymax'].disabled = !checked;
      document.forms['theForm'].elements['selbtn3'].disabled = !checked;
      document.forms['theForm'].elements['selbtn4'].disabled = !checked;
  }
  function handleAutoThumb(checked)
  {
      document.forms['theForm'].elements['goods_thumb'].disabled = checked;
      document.forms['theForm'].elements['goods_thumb_url'].disabled = checked;
  }

  /**
   * 蹇?€熸坊鍔犲搧鐗
   */
  function rapidBrandAdd(conObj)
  {
      var brand_div = document.getElementById("brand_add");

      if(brand_div.style.display != '')
      {
          var brand =document.forms['theForm'].elements['addedBrandName'];
          brand.value = '';
          brand_div.style.display = '';
      }
  }

  function hideBrandDiv()
  {
      var brand_add_div = document.getElementById("brand_add");
      if(brand_add_div.style.display != 'none')
      {
          brand_add_div.style.display = 'none';
      }
  }

  function goBrandPage()
  {
      if(confirm(go_brand_page))
      {
          window.location.href='brand.php?act=add';
      }
      else
      {
          return;
      }
  }

  function rapidCatAdd()
  {
      var cat_div = document.getElementById("category_add");

      if(cat_div.style.display != '')
      {
          var cat =document.forms['theForm'].elements['addedCategoryName'];
          cat.value = '';
          cat_div.style.display = '';
      }
  }

  function addBrand()
  {
      var brand = document.forms['theForm'].elements['addedBrandName'];
      if(brand.value.replace(/^\s+|\s+$/g, '') == '')
      {
          alert(brand_cat_not_null);
          return;
      }

      var params = 'brand=' + brand.value;
      Ajax.call('brand.php?is_ajax=1&act=add_brand', params, addBrandResponse, 'GET', 'JSON');
  }

  function addBrandResponse(result)
  {
      if (result.error == '1' && result.message != '')
      {
          alert(result.message);
          return;
      }

      var brand_div = document.getElementById("brand_add");
      brand_div.style.display = 'none';

      var response = result.content;

	  // 代码增加_start_derek20150129admin_goods  www.68ecshop.com
	  
	  document.getElementById("brand_search").value = response.brand;
	  document.getElementById("brand_id").value = response.id;
	  document.getElementById("xin_brand").innerHTML += "&nbsp;[<a href=javascript:go_brand_id("+response.id+",'"+response.brand+"')>"+response.brand+"</a>]&nbsp;";
	  document.getElementById("xin_brand").style.display = "block";

	  // 代码增加_end_derek20150129admin_goods  www.68ecshop.com

      var selCat = document.forms['theForm'].elements['brand_id'];
      var opt = document.createElement("OPTION");
      opt.value = response.id;
      opt.selected = true;
      opt.text = response.brand;

      if (Browser.isIE)
      {
          selCat.add(opt);
      }
      else
      {
          selCat.appendChild(opt);
      }

      return;
  }

  function addCategory()
  {
      var parent_id = document.forms['theForm'].elements['cat_id'];
      var cat = document.forms['theForm'].elements['addedCategoryName'];
      if(cat.value.replace(/^\s+|\s+$/g, '') == '')
      {
          alert(category_cat_not_null);
          return;
      }
      
      var params = 'parent_id=' + parent_id.value;
      params += '&cat=' + cat.value;
      Ajax.call('category.php?is_ajax=1&act=add_category', params, addCatResponse, 'GET', 'JSON');
  }

  function hideCatDiv()
  {
      var category_add_div = document.getElementById("category_add");
      if(category_add_div.style.display != null)
      {
          category_add_div.style.display = 'none';
      }
  }

  function addCatResponse(result)
  {
      if (result.error == '1' && result.message != '')
      {
          alert(result.message);
          return;
      }

      var category_add_div = document.getElementById("category_add");
      category_add_div.style.display = 'none';

      var response = result.content;
      
      $("#cat_id").val(response.id);
      $("#cat_name").val(response.cat);
      $("#cat_name").attr("nowvalue", response.cat);
      
      $.ajaxCategorySelecter($("#cat_name"), $("#cat_id"), response.id);

      return;
      
      var selCat = document.forms['theForm'].elements['cat_id'];
      var opt = document.createElement("OPTION");
      opt.value = response.id;
      opt.selected = true;
      opt.innerHTML = response.cat;

      //鑾峰彇瀛愬垎绫荤殑绌烘牸鏁
      var str = selCat.options[selCat.selectedIndex].text;
      var temp = str.replace(/^\s+/g, '');
      var lengOfSpace = str.length - temp.length;
      if(response.parent_id != 0)
      {
          lengOfSpace += 4;
      }
      for (i = 0; i < lengOfSpace; i++)
      {
          opt.innerHTML = '&nbsp;' + opt.innerHTML;
      }

      for (i = 0; i < selCat.length; i++)
      {
          if(selCat.options[i].value == response.parent_id)
          {
              if(i == selCat.length)
              {
                  if (Browser.isIE)
                  {
                      selCat.add(opt);
                  }
                  else
                  {
                      selCat.appendChild(opt);
                  }
              }
              else
              {
                  selCat.insertBefore(opt, selCat.options[i + 1]);
              }
              //opt.selected = true;
              break;
          }

      }

      return;
  }

    function goCatPage()
    {
        if(confirm(go_category_page))
        {
            window.location.href='category.php?act=add';
        }
        else
        {
            return;
        }
    }


  /**
   * 鍒犻櫎蹇?€熷垎绫
   */
  function removeCat()
  {
      if(!document.forms['theForm'].elements['parent_cat'] || !document.forms['theForm'].elements['new_cat_name'])
      {
          return;
      }

      var cat_select = document.forms['theForm'].elements['parent_cat'];
      var cat = document.forms['theForm'].elements['new_cat_name'];

      cat.parentNode.removeChild(cat);
      cat_select.parentNode.removeChild(cat_select);
  }

  /**
   * 鍒犻櫎蹇?€熷搧鐗
   */
  function removeBrand()
  {
      if (!document.forms['theForm'].elements['new_brand_name'])
      {
          return;
      }

      var brand = document.theForm.new_brand_name;
      brand.parentNode.removeChild(brand);
  }

  /**
   * 娣诲姞鎵╁睍鍒嗙被
   */
  function addOtherCat(conObj)
  {
      var sel = document.createElement("SELECT");
      var selCat = document.forms['theForm'].elements['other_cat[]'][0];
      
      if(selCat.length == undefined)
      {
    	  selCat = document.forms['theForm'].elements['other_cat[]'];
      }

      for (i = 0; i < selCat.length; i++)
      {
          var opt = document.createElement("OPTION");
          opt.text = selCat.options[i].text;
          opt.value = selCat.options[i].value;
          if (Browser.isIE)
          {
              sel.add(opt);
          }
          else
          {
              sel.appendChild(opt);
          }
      }
      conObj.appendChild(sel);
      sel.name = "other_cat[]";
      sel.onChange = function() {checkIsLeaf(this);};
  }

  /* 鍏宠仈鍟嗗搧鍑芥暟 */
  function searchGoods(szObject, catId, brandId, keyword)
  {
      var filters = new Object;

      filters.cat_id = elements[catId].value;
      filters.brand_id = elements[brandId].value;
      filters.keyword = Utils.trim(elements[keyword].value);
      filters.exclude = document.forms['theForm'].elements['goods_id'].value;

      szObject.loadOptions('get_goods_list', filters);
  }

  /**
   * 鍏宠仈鏂囩珷鍑芥暟
   */
  function searchArticle()
  {
    var filters = new Object;

    filters.title = Utils.trim(elements['article_title'].value);

    sz3.loadOptions('get_article_list', filters);
  }

  /**
   * 鏂板?涓€涓?浘鐗
   */
  function addImg(obj)
  {
      var src  = obj.parentNode.parentNode;
      var idx  = rowindex(src);
      var tbl  = document.getElementById('gallery-table');
      var row  = tbl.insertRow(idx + 1);
      var cell = row.insertCell(-1);
      cell.innerHTML = src.cells[0].innerHTML.replace(/(.*)(addImg)(.*)(\[)(\+)/i, "$1removeImg$3$4-");
  }

  /**
   * 鍒犻櫎鍥剧墖涓婁紶
   */
  function removeImg(obj)
  {
      var row = rowindex(obj.parentNode.parentNode);
      var tbl = document.getElementById('gallery-table');

      tbl.deleteRow(row);
  }

  /**
   * 鍒犻櫎鍥剧墖
   */
  function dropImg(imgId)
  {
    Ajax.call('goods.php?is_ajax=1&act=drop_image', "img_id="+imgId, dropImgResponse, "GET", "JSON");
  }

  function dropImgResponse(result)
  {
      if (result.error == 0)
      {
          document.getElementById('gallery_' + result.content).style.display = 'none';
      }
  }

  /**
   * 灏嗗競鍦轰环鏍煎彇鏁
   */
  function integral_market_price()
  {
    document.forms['theForm'].elements['market_price'].value = parseInt(document.forms['theForm'].elements['market_price'].value);
  }

   /**
   * 灏嗙Н鍒嗚喘涔伴?搴﹀彇鏁
   */
  function parseint_integral()
  {
    document.forms['theForm'].elements['integral'].value = parseInt(document.forms['theForm'].elements['integral'].value);
  }


  /**
  * 妫€鏌ヨ揣鍙锋槸鍚﹀瓨鍦
  */
  function checkGoodsSn(goods_sn, goods_id)
  {
    if (goods_sn == '')
    {
        document.getElementById('goods_sn_notice').innerHTML = "";
        return;
    }

    var callback = function(res)
    {
      if (res.error > 0)
      {
        document.getElementById('goods_sn_notice').innerHTML = res.message;
        document.getElementById('goods_sn_notice').style.color = "red";
      }
      else
      {
        document.getElementById('goods_sn_notice').innerHTML = "";
      }
    }
    Ajax.call('goods.php?is_ajax=1&act=check_goods_sn', "goods_sn=" + goods_sn + "&goods_id=" + goods_id, callback, "GET", "JSON");
  }

  /**
   * 鏂板?涓€涓?紭鎯犱环鏍
   */
  function addVolumePrice(obj)
  {
    var src      = obj.parentNode.parentNode;
    var tbl      = document.getElementById('tbody-volume');

    var validator  = new Validator('theForm');
    checkVolumeData("0",validator);
    if (!validator.passed())
    {
      return false;
    }

    var row  = tbl.insertRow(tbl.rows.length);
    var cell = row.insertCell(-1);
    cell.innerHTML = src.cells[0].innerHTML.replace(/(.*)(addVolumePrice)(.*)(\[)(\+)/i, "$1removeVolumePrice$3$4-");

    var number_list = document.getElementsByName("volume_number[]");
    var price_list  = document.getElementsByName("volume_price[]");

    number_list[number_list.length-1].value = "";
    price_list[price_list.length-1].value   = "";
  }

  /**
   * 鍒犻櫎浼樻儬浠锋牸
   */
  function removeVolumePrice(obj)
  {
    var row = rowindex(obj.parentNode.parentNode);
    var tbl = document.getElementById('tbody-volume');

    tbl.deleteRow(row);
  }

  /**
   * 鏍￠獙浼樻儬鏁版嵁鏄?惁姝ｇ‘
   */
  function checkVolumeData(isSubmit,validator)
  {
    var volumeNum = document.getElementsByName("volume_number[]");
    var volumePri = document.getElementsByName("volume_price[]");
    var numErrNum = 0;
    var priErrNum = 0;

    for (i = 0 ; i < volumePri.length ; i ++)
    {
      if ((isSubmit != 1 || volumeNum.length > 1) && numErrNum <= 0 && volumeNum.item(i).value == "")
      {
        validator.addErrorMsg(volume_num_not_null);
        numErrNum++;
      }

      if (numErrNum <= 0 && Utils.trim(volumeNum.item(i).value) != "" && ! Utils.isNumber(Utils.trim(volumeNum.item(i).value)))
      {
        validator.addErrorMsg(volume_num_not_number);
        numErrNum++;
      }

      if ((isSubmit != 1 || volumePri.length > 1) && priErrNum <= 0 && volumePri.item(i).value == "")
      {
        validator.addErrorMsg(volume_price_not_null);
        priErrNum++;
      }

      if (priErrNum <= 0 && Utils.trim(volumePri.item(i).value) != "" && ! Utils.isNumber(Utils.trim(volumePri.item(i).value)))
      {
        validator.addErrorMsg(volume_price_not_number);
        priErrNum++;
      }
    }
  }
  
</script>
<div id="footer">
共执行 10 个查询，用时 0.955376 秒，Gzip 已禁用，内存占用 7.405 MB<br />
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