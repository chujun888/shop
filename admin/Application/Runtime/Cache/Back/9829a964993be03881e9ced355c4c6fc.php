<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商之翼 管理中心 - 商品添加 </title>
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
                                <tr>
					<td class="label">品牌：</td>
					<td>			
						<?php getSelect('brand_id','brand','brand_name','id');?>
					</td>
				</tr>
				<tr>
					<td class="label">扩展分类：</td>
					<td>
						<input type="button" value="添加" onclick="addOtherCat(this.parentNode)" class="button" />
												<select name="ext_cat[]" onchange="hideCatDiv()" ><option value="0">请选择...</option><option value="1" >食品生鲜</option><option value="14" >&nbsp;&nbsp;&nbsp;&nbsp;进口水果</option></select>
					</td>
				</tr>

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
					<td><?php foreach($levels as $k=>$v):?>
						<?php echo ($v["level_name"]); ?>				<span id="nrank_1"></span>
                                                 <input type="text" name="level[<?php echo ($v["id"]); ?>]"/><?php if(($k+1)%2==0) echo '<br/>'; endforeach;?>

												<br />
						<span class="notice-span" style="display:block"  id="noticeUserPrice">会员价格为-1时表示会员价格按会员等级折扣率计算。你也可以为每个等级指定一个固定价格</span>
					</td>
				</tr>
				


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
												<img src="/admin/Public/images/no.gif" />
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
</style>
												
						
						<br>
						<br>
						<div class="attr-color-div">
														<span class="attr-front" id="color_1">
										<a href="javascript:void(0);" onclick="javascript:add(this)">添加图片</a>
							</span><input type='file' name='pics[]'/>
													</div>
                                                    <div width="100%"  style="border:1px #eee solid; margin-top:5px;"></div>
					</td>
				</tr>
				<tr>
					<td>&nbsp;<input id="goods_info_submit" type="submit" value=" 确定 " class="button" />
				<input id="goods_info_reset" type="reset" value=" 重置 " class="button" /></td>
				</tr>
			</table>

			
			<div class="button-div">
				
				
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
function add(e){
    $(e).parent().parent().append("<input type='file' name='pics[]' />");
}





  
</script>
<div id="footer">
共执行 10 个查询，用时 0.955376 秒，Gzip 已禁用，内存占用 7.405 MB<br />
版权所有 &copy; 2008-2015 秦皇岛商之翼网络科技有限公司，并保留所有权利。</div>
</body>
</html>