<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商之翼 管理中心 - 商品修改 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/admin/Public/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/admin/Public/styles/main.css" rel="stylesheet" type="text/css" />
<!-- 修改 by www.68ecshop.com 百度编辑器 begin -->
<script type="text/javascript" src="/admin/Public/js/jquery.js"></script><script type="text/javascript" src="/admin/Public/js/jquery.json.js"></script><script type="text/javascript" src="/admin/Public/js/transport_bd.js"></script><script type="text/javascript" src="/admin/Public/js/common.js"></script><!-- 修改 by www.68ecshop.com 百度编辑器 end -->
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
<span class="action-span"><a href="/admin/Back/Goods/lst">商品列表</a></span>
<span class="action-span1"><a href="index.php?act=main">商之翼 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品修改 </span>
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
			<input type='hidden' name='id' value='<?php echo ($data["id"]); ?>'/>
			<!-- 閫氱敤淇℃伅 -->
			<table width="100%" id="general-table" align="center">
				<tr>
					<td class="label">商品名称：</td>
					<td>
						<input type="text" name="goods_name" value="<?php echo ($data["goods_name"]); ?>" style="float:left;color:;" size="30" />
						<div style="background-color:;float:left;margin-left:2px;" id="font_color" onclick="ColorSelecter.Show(this);">
							<img src="/admin/Public/images/color_selecter.gif" style="margin-top:-1px;" />
						</div>

						<span class="require-field">*</span>					</td>
				</tr>

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
                                <td class="label">品牌：</td>
					<td>			
						<?php getSelect('brand_id','brand','brand_name','id',$data['brand_id']);?>
					</td>
				<tr>
					<td class="label">扩展分类：</td>
					<td>
						<input type="button" value="添加" onclick="addOtherCat(this.parentNode)" class="button" />
												<select name="ext_cat[]" onchange="hideCatDiv()" ><option value="0">请选择...</option><option value="1" >食品生鲜</option><option value="14" >&nbsp;&nbsp;&nbsp;&nbsp;进口水果</option><option value="16" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;樱桃车厘子</option><option value="20" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;奇异果猕猴桃</option><option value="17" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;芒果桃李</option><option value="21" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;凤梨蓝莓</option><option value="18" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龙眼荔枝</option><option value="15" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;释迦芭乐</option><option value="22" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;榴莲山竹</option><option value="19" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;小波</option><option value="13" >&nbsp;&nbsp;&nbsp;&nbsp;糖果巧克力</option><option value="30" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;果冻</option><option value="27" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;软糖</option><option value="24" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;巧克力</option><option value="28" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;奶糖</option><option value="25" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;口香糖</option><option value="29" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;QQ糖</option><option value="26" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;棒棒糖</option><option value="9" >&nbsp;&nbsp;&nbsp;&nbsp;牛奶乳品</option><option value="33" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;儿童奶</option><option value="37" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;全脂奶</option><option value="34" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;酸奶</option><option value="31" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;常温奶</option><option value="38" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;成人奶粉</option><option value="35" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;豆奶</option><option value="32" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;乳饮料</option><option value="36" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;低脂奶</option><option value="10" >&nbsp;&nbsp;&nbsp;&nbsp;坚果炒货</option><option value="46" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;杏仁</option><option value="43" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;腰果</option><option value="40" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;夏威夷果</option><option value="44" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;瓜子</option><option value="41" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;碧根果</option><option value="45" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;花生</option><option value="42" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;开心果</option><option value="39" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;核桃</option><option value="12" >&nbsp;&nbsp;&nbsp;&nbsp;蜜饯果干</option><option value="49" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;葡萄干</option><option value="53" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;橄榄</option><option value="50" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;芒果干</option><option value="47" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;红枣</option><option value="54" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;其他</option><option value="51" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;香蕉干</option><option value="48" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;莓类</option><option value="52" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;山楂片</option><option value="2" >服装服饰</option><option value="60" >&nbsp;&nbsp;&nbsp;&nbsp;箱包馆</option><option value="108" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;拉杆包</option><option value="105" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;男士钱包</option><option value="102" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手提女包</option><option value="106" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;旅行箱</option><option value="103" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;女士钱包</option><option value="107" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;拉杆箱</option><option value="104" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;男士双肩</option><option value="101" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;单肩女包</option><option value="57" >&nbsp;&nbsp;&nbsp;&nbsp;男装馆</option><option value="82" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;长袖衬衫</option><option value="79" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;夹克</option><option value="83" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;休闲短裤</option><option value="80" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;风衣</option><option value="77" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;休闲裤</option><option value="84" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;POLO衫</option><option value="81" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;针织衫</option><option value="78" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;牛仔裤</option><option value="55" >&nbsp;&nbsp;&nbsp;&nbsp;女装馆</option><option value="66" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;牛仔裤</option><option value="63" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;棉麻T恤</option><option value="67" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;短外套</option><option value="64" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;时尚套装</option><option value="61" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;连衣裙</option><option value="68" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;防晒衫</option><option value="65" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;复古旗袍</option><option value="62" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;连体裤</option><option value="58" >&nbsp;&nbsp;&nbsp;&nbsp;户外鞋服</option><option value="92" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;登山鞋</option><option value="89" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;迷彩裤</option><option value="86" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;篮球鞋</option><option value="90" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;沙滩鞋</option><option value="87" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;帆布鞋</option><option value="91" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;钓鱼服</option><option value="88" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;羽毛球鞋</option><option value="85" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;跑步鞋</option><option value="59" >&nbsp;&nbsp;&nbsp;&nbsp;女鞋馆</option><option value="98" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;帆布鞋</option><option value="95" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;高跟鞋</option><option value="99" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;乐福鞋</option><option value="96" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;坡跟单鞋</option><option value="93" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;高跟凉拖</option><option value="100" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;松糕鞋</option><option value="97" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;浅口单鞋</option><option value="94" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;平底鞋</option><option value="56" >&nbsp;&nbsp;&nbsp;&nbsp;内衣馆</option><option value="76" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;瘦腿袜</option><option value="73" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;男士内裤</option><option value="70" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;薄款文胸</option><option value="74" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;夏季睡衣</option><option value="71" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;无钢圈文胸</option><option value="75" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;性感睡衣</option><option value="72" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;女士内裤</option><option value="69" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;聚拢文胸</option><option value="3" >个护化妆</option><option value="113" >&nbsp;&nbsp;&nbsp;&nbsp;香水彩妆</option><option value="143" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;套装</option><option value="140" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;唇部</option><option value="137" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;底妆</option><option value="141" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;美甲</option><option value="138" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;腮红</option><option value="142" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;美容工具</option><option value="139" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;眼部</option><option value="136" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;香水</option><option value="111" >&nbsp;&nbsp;&nbsp;&nbsp;身体护肤</option><option value="130" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 美胸</option><option value="127" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;颈部</option><option value="131" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;套装</option><option value="128" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手足</option><option value="125" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;沐浴</option><option value="129" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;纤体塑形</option><option value="126" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;润肤</option><option value="112" >&nbsp;&nbsp;&nbsp;&nbsp;口腔护理</option><option value="134" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;漱口水</option><option value="135" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;套装</option><option value="132" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;牙膏/牙粉</option><option value="133" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;牙刷/牙线</option><option value="109" >&nbsp;&nbsp;&nbsp;&nbsp;面部护肤</option><option value="114" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;清洁</option><option value="118" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;套装</option><option value="115" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;护肤</option><option value="116" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;面膜</option><option value="117" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;剃须</option><option value="110" >&nbsp;&nbsp;&nbsp;&nbsp;洗发护发</option><option value="124" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;套装</option><option value="121" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;染发</option><option value="122" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;造型</option><option value="119" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;洗发</option><option value="123" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;假发</option><option value="120" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;护发</option><option value="4" >手机数码</option><option value="146" >&nbsp;&nbsp;&nbsp;&nbsp;数码影音</option><option value="175" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;户外器材</option><option value="172" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;拍立得</option><option value="176" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数码相框</option><option value="173" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;运动相机</option><option value="170" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数码相机</option><option value="177" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;影棚器材</option><option value="174" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;摄像机</option><option value="171" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;单反相机</option><option value="147" >&nbsp;&nbsp;&nbsp;&nbsp;智能设备</option><option value="169" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;体感车</option><option value="166" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;智能眼镜</option><option value="167" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;运动跟踪器</option><option value="164" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;智能手环</option><option value="168" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;智能家居</option><option value="165" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;智能手表</option><option value="144" >&nbsp;&nbsp;&nbsp;&nbsp;热卖手机</option><option value="153" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;联通4G</option><option value="150" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;小米特供</option><option value="154" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电信4G</option><option value="151" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;魅族手机</option><option value="148" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;三星盖乐世</option><option value="155" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;移动4G</option><option value="152" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;华为荣耀</option><option value="149" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;iPhone</option><option value="145" >&nbsp;&nbsp;&nbsp;&nbsp;手机配件</option><option value="162" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手机耳机</option><option value="159" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;充电器</option><option value="156" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电池</option><option value="163" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;保护套</option><option value="160" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;创意配件</option><option value="157" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;移动电源</option><option value="161" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手机饰品</option><option value="158" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;蓝牙耳机</option><option value="5" >家用电器</option><option value="178" >&nbsp;&nbsp;&nbsp;&nbsp;大家电</option><option value="188" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;热水器</option><option value="185" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;洗衣机</option><option value="189" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;消毒柜/洗碗机</option><option value="186" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;家庭影院</option><option value="183" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;平板电视</option><option value="190" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;冷柜/冰吧</option><option value="187" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;烟机/灶具</option><option value="184" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;空调冰箱</option><option value="182" >&nbsp;&nbsp;&nbsp;&nbsp;五金家装</option><option value="218" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;家具五金</option><option value="215" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电动工具</option><option value="219" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电工电料</option><option value="216" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手动工具</option><option value="220" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;监控安防</option><option value="217" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;厨卫五金</option><option value="179" >&nbsp;&nbsp;&nbsp;&nbsp;生活电器</option><option value="191" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电风扇</option><option value="196" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;取暖电器</option><option value="193" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;加湿器</option><option value="197" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;饮水机</option><option value="194" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;吸尘器</option><option value="198" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;其它生活电器</option><option value="195" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;挂烫机/熨斗</option><option value="192" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;净化器</option><option value="180" >&nbsp;&nbsp;&nbsp;&nbsp;厨房电器</option><option value="202" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电饼铛/烧烤盘</option><option value="199" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电饭煲</option><option value="206" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;其它厨房电器</option><option value="203" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电炖锅</option><option value="200" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;微波炉</option><option value="204" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;果蔬解毒机</option><option value="201" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电磁炉</option><option value="205" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;养生壶/煎药壶</option><option value="181" >&nbsp;&nbsp;&nbsp;&nbsp;个护健康</option><option value="212" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;血糖仪</option><option value="209" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;按摩椅</option><option value="213" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;计步器/脂肪检测</option><option value="210" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;足浴盆</option><option value="207" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;剃须刀</option><option value="214" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;其它健康电器</option><option value="211" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;健康秤/厨房秤</option><option value="208" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电吹风</option><option value="6" >家纺家居</option><option value="309" >&nbsp;&nbsp;&nbsp;&nbsp;灯具</option><option value="341" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;吊灯</option><option value="338" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;落地灯</option><option value="335" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;吸顶灯</option><option value="339" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;应急灯/手电</option><option value="336" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;筒灯射灯</option><option value="340" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;装饰灯</option><option value="337" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LED灯</option><option value="334" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;台灯</option><option value="310" >&nbsp;&nbsp;&nbsp;&nbsp;家装软饰</option><option value="347" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;装饰字画</option><option value="344" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;沙发垫套/椅垫</option><option value="348" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;墙贴/装饰贴</option><option value="345" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;帘艺隔断</option><option value="342" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;桌布/罩件</option><option value="349" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;摆件花瓶</option><option value="346" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;相框/照片墙</option><option value="343" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;地毯地垫</option><option value="307" >&nbsp;&nbsp;&nbsp;&nbsp;家具</option><option value="325" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;阳台/户外</option><option value="322" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;餐厅家具</option><option value="326" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;沙发</option><option value="323" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;书房家具</option><option value="320" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;卧室家具</option><option value="327" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;鞋架/衣帽架</option><option value="324" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;储物家具</option><option value="321" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;客厅家具</option><option value="311" >&nbsp;&nbsp;&nbsp;&nbsp;生活日用</option><option value="354" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;洗晒/熨烫</option><option value="351" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;雨伞雨具</option><option value="355" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;净化除味</option><option value="352" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;浴室用品</option><option value="353" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;缝纫/针织用品</option><option value="350" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;收纳用品</option><option value="306" >&nbsp;&nbsp;&nbsp;&nbsp;家纺</option><option value="315" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;凉席</option><option value="312" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;床品套件</option><option value="319" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;窗帘/窗纱</option><option value="316" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;床单被罩</option><option value="313" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;被子</option><option value="317" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;毛巾浴巾</option><option value="314" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;蚊帐</option><option value="318" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;床垫/床褥</option><option value="308" >&nbsp;&nbsp;&nbsp;&nbsp;厨具</option><option value="331" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;水具酒具</option><option value="328" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;烹饪锅具</option><option value="332" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;餐具</option><option value="329" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;刀剪菜板</option><option value="333" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;茶具/咖啡具</option><option value="330" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;厨房配件</option><option value="7" >酒类饮料</option><option value="273" >&nbsp;&nbsp;&nbsp;&nbsp;饮料饮品</option><option value="295" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;风味奶</option><option value="292" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;功能饮料</option><option value="289" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;果蔬汁</option><option value="296" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;植物蛋白饮料</option><option value="293" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;纯牛奶</option><option value="290" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;茶饮料</option><option value="294" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;酸奶</option><option value="291" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;碳酸饮料</option><option value="274" >&nbsp;&nbsp;&nbsp;&nbsp;茗茶</option><option value="298" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;铁观音</option><option value="305" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;其他茶</option><option value="302" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;红茶</option><option value="299" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;普洱</option><option value="303" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;花果茶</option><option value="300" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龙井</option><option value="304" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;养生茶</option><option value="301" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;绿茶</option><option value="271" >&nbsp;&nbsp;&nbsp;&nbsp;酒水</option><option value="279" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;黄酒/米酒</option><option value="276" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;白酒</option><option value="280" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;养生酒</option><option value="277" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;啤酒</option><option value="281" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;预调酒</option><option value="278" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;葡萄酒/果酒</option><option value="272" >&nbsp;&nbsp;&nbsp;&nbsp;冲调饮品</option><option value="282" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;蜂蜜</option><option value="286" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;奶茶</option><option value="283" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;成人奶粉</option><option value="287" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;麦片谷物</option><option value="284" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;豆浆/豆奶粉</option><option value="297" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;果味冲调</option><option value="288" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;咖啡</option><option value="285" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;茶叶</option><option value="8" >母婴用品</option><option value="225" >&nbsp;&nbsp;&nbsp;&nbsp;车床/床品</option><option value="260" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;儿童家具</option><option value="257" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;婴儿床</option><option value="261" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;睡袋/抱被</option><option value="258" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;餐椅</option><option value="255" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;安全座椅</option><option value="262" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;凉席/蚊帐</option><option value="259" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;三轮车</option><option value="256" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手推车</option><option value="222" >&nbsp;&nbsp;&nbsp;&nbsp;营养/辅食</option><option value="234" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;果汁/泥</option><option value="238" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;清火开胃</option><option value="235" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;面食类</option><option value="239" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;钙铁锌</option><option value="236" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;宝宝零食</option><option value="233" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;米粉</option><option value="240" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;益生菌</option><option value="237" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DHA</option><option value="226" >&nbsp;&nbsp;&nbsp;&nbsp;孕妈专区</option><option value="266" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;腰凳</option><option value="263" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;孕妇裙</option><option value="270" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;孕妇内裤</option><option value="267" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;妈咪包</option><option value="264" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;打底裤</option><option value="268" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;收腹带</option><option value="265" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;防辐射服</option><option value="269" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;哺乳文胸</option><option value="223" >&nbsp;&nbsp;&nbsp;&nbsp;孕婴洗护</option><option value="247" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;孕妇护肤</option><option value="244" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;防蚊/驱蚊</option><option value="241" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;洗衣液/皂</option><option value="245" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;爽身粉</option><option value="242" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;宝宝沐浴</option><option value="246" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;奶瓶清洗</option><option value="243" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;儿童防晒</option><option value="224" >&nbsp;&nbsp;&nbsp;&nbsp;喂养用品</option><option value="250" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;浴室用品</option><option value="254" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;防溢乳垫</option><option value="251" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;水壶/水杯</option><option value="248" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;奶嘴奶瓶</option><option value="252" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;吸奶器</option><option value="249" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;驱蚊用品</option><option value="253" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;理发器</option><option value="221" >&nbsp;&nbsp;&nbsp;&nbsp;孕婴奶粉</option><option value="231" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2段</option><option value="228" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;孕妈奶粉</option><option value="232" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3段</option><option value="229" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pre段</option><option value="230" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1段</option><option value="227" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;特配奶粉</option></select>
					</td>
				</tr>

					</td>
				</tr>
								<tr>
					<td class="label">本店售价：</td>
					<td>
						<input type="text" name="shop_price" value="<?php echo ($data["shop_price"]); ?>" size="20" onblur="priceSetted()" />
						<input type="button" value="按市场价计算" onclick="marketPriceSetted()" />
						<span class="require-field">*</span>					</td>
				</tr>
											<tr>
					<td class="label">
						<a href="javascript:showNotice('noticeUserPrice');" title="点击此处查看提示信息">
							<img src="/admin/Public/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息">
						</a>
						会员价格：					</td>
					<td><?php foreach($levels as $k=>$v):?>
						<?php echo ($v["level_name"]); ?>				<span id="nrank_1"></span>
                                                <input type="text" name="level[<?php echo ($v["id"]); ?>]" value='<?php if($v['price']) echo $v['price'];?>' '/><?php if(($k+1)%2==0) echo '<br/>'; endforeach;?>

												<br />
						<span class="notice-span" style="display:block"  id="noticeUserPrice">会员价格为-1时表示会员价格按会员等级折扣率计算。你也可以为每个等级指定一个固定价格</span>
					</td>
				</tr>
				


				<tr>
					<td class="label">市场售价：</td>
					<td>
						<input type="text" name="market_price" value="<?php echo ($data["market_price"]); ?>" size="20" />
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




				<tr>
					<td class="label">上传商品图片：</td>
					<td>
						<input type="file" name="logo" size="35" />
                                                <?php if($data['logo']) echo "<a href='/admin/Uploads/".$data['logo']."' style='border:0px;' target='_blank'>";?> <img src="/admin/Public/images/<?php echo empty($data['logo'])?'no':'yes'; ?>.gif"/><?php if($data['logo']) echo '</a/>';?>
												<br />
						
					</td>
				</tr>
				

				
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
.imgUl{list-style-type: none;}
.imgUl li{float:left;padding-left:10px;}
</style>
												
						
						<br>
						<br>
						<div class="attr-color-div">
														<span class="attr-front" id="color_1">
										<a href="javascript:void(0);" onclick="javascript:add(this)">添加图片</a>
							</span><input type='file' name='pics[]'/>
													</div>
                                                    <div width="100%"  style="border:1px #eee solid; margin-top:5px;">
                                                        <!--展示已添加的图片-->
                                                        <ul class='imgUl'>
                                                            <?php $path=C("SHOW_PATH"); foreach($pics as $k=>$v):?>
                                                            <li><input onclick='removeImg(this)' type="button" value=" 删除图片" id='<?php echo $v['id'];?>' class="button" /><br/><?php showImage($path.$v['small_pic']);?></li>
                                                            <?php endforeach;?>
                                                        </ul>
                                                    </div>
					</td>
				</tr>
				<tr>
					<td>&nbsp;<input id="goods_info_submit" type="submit" value=" 确定 " class="button" />
				<input id="goods_info_reset" type="reset" value=" 重置 " class="button" /></td>
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

  function handlePromote(checked)
  {
      document.forms['theForm'].elements['promote_price'].disabled = !checked;
      document.forms['theForm'].elements['selbtn1'].disabled = !checked;
      document.forms['theForm'].elements['selbtn2'].disabled = !checked;
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

//添加按钮
function add(e){
    $(e).parent().parent().append("<input type='file' name='pics[]' />");
}

//ajxa删除图片
function removeImg(e){
    var id=$(e).attr('id');
    
    $.ajax({
        type:'get',
        dataType:'json',
        url:'/admin/Back/Goods/ajaxDel/goods_id/<?php echo I('get.id');?>/id/'+id,
        success:function(res){
            if(res.ok==1){
                $(e).parent().remove();
            }
        }
    });
}


  
</script>
<div id="footer">
共执行 10 个查询，用时 0.955376 秒，Gzip 已禁用，内存占用 7.405 MB<br />
版权所有 &copy; 2008-2015 秦皇岛商之翼网络科技有限公司，并保留所有权利。</div>
</body>
</html>