<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商之翼 管理中心 - 商品添加 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/styles/main.css" rel="stylesheet" type="text/css" />
<!-- 修改 by www.68ecshop.com 百度编辑器 begin -->
<script type="text/javascript" src="/Public/js/jquery.js"></script><script type="text/javascript" src="/Public/js/jquery.json.js"></script><script type="text/javascript" src="/Public/js/transport_bd.js"></script><script type="text/javascript" src="/Public/js/common.js"></script><!-- 修改 by www.68ecshop.com 百度编辑器 end -->
<link rel="stylesheet" type="text/css" href="/Public/timePicker/jquery.datetimepicker.css"/>
</head>
<body>


<h1>
<span class="action-span"><a href="/Back/Goods/lst">商品列表</a></span>
<span class="action-span1"><a href="/Back/index/main">商之翼 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加新商品 </span>
<div style="clear:both"></div>
</h1>
 <script type="text/javascript" src="/js/utils.js"></script><script type="text/javascript" src="/Public/js/selectzone_bd.js"></script><script type="text/javascript" src="/Public/js/colorselector.js"></script><!-- 修改 by www.68ecshop.com 百度编辑器 end -->
<script type="text/javascript" src="/js/calendar.php?lang="></script>
<link href="/js/calendar/calendar.css" rel="stylesheet" type="text/css" />
<!-- zTree Style -->
<link href="/Public/styles/zTree/zTreeStyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/js/jquery.ztree.all-3.5.min.js"></script><script type="text/javascript" src="/Public/js/category_selecter.js"></script> 
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
							<img src="/Public/images/color_selecter.gif" style="margin-top:-1px;" />
						</div>

						<span class="require-field">*</span>					</td>
				</tr>

				<tr>
					<td class="label">商品分类：</td>
                                        <td>
                                            <select name='cat_id'><option value=''>请选择...</option><?php foreach($cats as $k=>$v):?><option value='<?php echo ($v["id"]); ?>'><?php echo str_repeat('&nbsp;',$v['level']*5); echo ($v["cat_name"]); ?></option><?php endforeach;?></select>
		
						 <span class="require-field">*</span>						
					</td>
				</tr>
                            	<tr>
					<td class="label">扩展分类：</td>
					<td>
						   <input type="button" value="添加" onclick="addCat(this);" class="button" />
                                                   <select name='ext_cat[]'><option value=''>请选择...</option><?php foreach($cats as $k=>$v):?><option value='<?php echo ($v["id"]); ?>' ><?php echo str_repeat('&nbsp;',$v['level']*5); echo ($v["cat_name"]); ?></option><?php endforeach;?></select>
					</td>
				</tr>
                                <tr>
					<td class="label">品牌：</td>
					<td>			
						<?php getSelect('brand_id','brand','brand_name','id');?>
					</td>
				</tr>
			

					</td>
				</tr>
								<tr>
					<td class="label">本店售价：</td>
					<td>
						<input type="text" name="shop_price"  size="20" onblur="priceSetted()" />
						<input type="button" value="按市场价计算" onclick="marketPriceSetted()" />
						<span class="require-field">*</span>					</td>
				</tr>
								<tr>
					<td class="label">
						<a href="javascript:showNotice('noticeUserPrice');" title="点击此处查看提示信息">
							<img src="/Public/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息">
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
						<input type="text" name="market_price"  size="20" />
						<input type="button" value="取整数" onclick="integral_market_price()" />
					</td>
				</tr>
				<tr>
					<td class="label">
						<a href="javascript:showNotice('giveIntegral');" title="点击此处查看提示信息">
							<img src="/Public/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息">
						</a>
						赠送消费积分数：					</td>
					<td>
						<input type="text" name="jifen"  size="20" />
						<br />
						<span class="notice-span" style="display:block"  id="giveIntegral">购买该商品时赠送消费积分数,-1表示按商品价格赠送</span>
					</td>
				</tr>
				<tr>
					<td class="label">
						<a href="javascript:showNotice('rankIntegral');" title="点击此处查看提示信息">
							<img src="/Public/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息">
						</a>
						赠送等级积分数：					</td>
					<td>
						<input type="text" name="jyz"  size="20" />
						<br />
						<span class="notice-span" style="display:block"  id="rankIntegral">购买该商品时赠送等级积分数,-1表示按商品价格赠送</span>
					</td>
				</tr>

				<tr>
					<td class="label">
						<label for="is_promote">
							<input type="checkbox" id="is_promote" name="is_promote"   value='1'onclick="isPromote(this);" />
							促销价：						</label>
					</td>
					<td id="promote_3">
						<input type="text" id="promote" name="promote_price" value='0.00' readonly='readonly'  size="20" />
					</td>
				</tr>

				<tr id="promote_4">
					<td class="label" id="promote_5">促销日期：</td>
					<td id="promote_6">
						<input name="promote_start_time" type="text" id="promote_start_time"  readonly="readonly" />
						
						-
						<input name="promote_end_time" type="text" id="promote_end_time"  readonly="readonly" />
						
					</td>
				</tr>




				<tr>
					<td class="label">上传商品图片：</td>
					<td>
						<input type="file" name="logo" size="35" />
												<img src="/Public/images/no.gif" />
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
							<img src="/Public/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息">
						</a>
						商品库存数量：					</td>
					<!--            <td><input type="text" name="goods_number" value="1" size="20"  /><br />-->
					<td>
						<input type="text" name="goods_number" size="20" />
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
				<tr >
					<td class="label">
						<a href="javascript:showNotice('noticeGoodsType');" title="点击此处查看提示信息">
							<img src="/Public/images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息">
						</a>
						商品类型：					</td>
					<td>
						<select name="type_id" onchange="getAttrList(this)">
							<option value="0">请选择商品类型</option>
                                                        <?php foreach($types as $k=>$v):?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["type_name"]); ?></option><?php endforeach;?>
					
						</select>
						<br />
                                                <span class="notice-span" style="display:block"  id="noticeGoodsType">请选择商品的所属类型，进而完善此商品的属性</span>                                      
					</td>
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

<script src="/Public/timePicker/jquery.datetimepicker.js"></script>
<!-- end goods form -->
<script type="text/javascript" src="/Public/js/validator.js"></script><script type="text/javascript" src="/Public/js/tab.js"></script><script language="JavaScript">
    var logic = function( currentDateTime ){
	if( currentDateTime.getDay()==6 ){
		this.setOptions({
			minTime:'11:00'
		});
	}else
		this.setOptions({
			minTime:'8:00'
		});
};
    $('#promote_start_time').datetimepicker({
	onChangeDateTime:logic,
	onShow:logic
    });
    $('#promote_end_time').datetimepicker({
            onChangeDateTime:logic,
            onShow:logic
    });
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

//添加图片
function add(e){
    $(e).parent().parent().append("<input type='file' name='pics[]' />");
}

//添加扩展分类
function addCat(e){
    var clone=$(e).next().clone();
    
    $(e).parent().append(clone);
    
 
}
//获取属性列表
function getAttrList(e){
   var value=$(e).val();
    $.ajax({
        type:'get',
        dataType:'json',
        success:function(data){
            $('#properties-table').find('tr:gt(0)').remove();
            $.each(data,function(k,v){
              
                //清空属性值
                
                var add='';
                if(v.attr_type!=0){
                    add='<a href="javascript:void(0);" onclick=addNew(this)><span >[+]</span></a>';
                }
                    //输出文本框
                if(!v.attr_option_value)
                  $('#properties-table').append('<tr ><td class="label">'+add+v.attr_name+'：</td><td><input type="text" name="attr['+v.id+'][]"/><br /></td></tr>');
                else{
                //下拉列表
                    var str='<tr ><td class="label">'+add+v.attr_name+'：</td><td><select name="attr['+v.id+'][]"><option value="">请选择...</option>';
                    var arr=v.attr_option_value.split(',');
                    $.each(arr,function(k1,v2){
                        str+="<option value='"+v2+"'>"+v2+"</option>";
                    });
                    str+="</select><br /></td></tr>";
                    $('#properties-table').append(str);

                }
            });
           
        },
        url:'/Back/Goods/ajaxAttr/type_id/'+value,
        
    });
}

//克隆或删除新的属性
function addNew(e){
     var flag=$(e).find('span').text();
     var p=$(e).parent().parent()
     
     //减号删除
     if(flag=='[-]'){
         p.remove();
     }
    //加号克隆复制
    else{
        var clone=p.clone();
        clone.find('span').text('[-]');
        //清除clone的选中状态
     
        clone.find('option').attr('selected',false);
        p.after(clone);
    }
}
//促销可选 promote st
function isPromote(e){
    //选中促销
    if($(e).attr('checked')){
        $("#promote,#st").removeAttr('readonly');
    }
    else{
        $('#promote,#st').attr('readonly','readonly');
    }
}



  
</script>

<div id="footer">
共执行 10 个查询，用时 0.955376 秒，Gzip 已禁用，内存占用 7.405 MB<br />
版权所有 &copy; 2008-2015 秦皇岛商之翼网络科技有限公司，并保留所有权利。</div>
</body>
</html>