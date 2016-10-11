<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: goods_list.htm 17126 2010-04-23 10:30:26Z liuhui $ -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtmltransitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商之翼 管理中心 - 商品库存修改 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/styles/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/js/jquery-1.6.2.min.js"></script><script type="text/javascript" src="/Public/js/jquery.json.js"></script><script type="text/javascript" src="/js/transport.js"></script><script type="text/javascript" src="/Public/js/common.js"></script>
</head>
<body>



<h1>
<span class="action-span"><a href="/Back/Goods/lst">商品列表</a></span>
<span class="action-span1"><a href="/Back/index/main">商之翼 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品库存修改 </span>
<div style="clear:both"></div>
</h1>
<script type="text/javascript" src="/js/utils.js"></script>
<!-- 商品搜索 -->
<!-- $Id: goods_search.htm 16790 2009-11-10 08:56:15Z wangleisvn $ -->
<link href="/Public/styles/zTree/zTreeStyle.css" rel="stylesheet" type="text/css" />

<!-- 商品列表 -->
<form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
    <input type='hidden' name='id' value='<?php echo I('get.id');?>'/>
  <!-- start goods list -->
  <div class="list-div" id="listDiv">
      <table cellpadding="3" cellspacing="1" >
  <tr>
      <?php foreach($data[0] as $k=>$v): ?>
      <th><?php echo ($v["attr_name"]); ?></th>
      <?php endforeach;?>
      <th>库存量</th>
  </tr>
   <?php if(!$data):?>
    <tr align="center">
        <td><input type='text' name="number[<?php echo I('get.id');?>]" value='<?php if($res[I('get.id')]) echo $res[I('get.id')];?>'/></td>
    </tr>
   <?php endif;?>
       <?php foreach($data as $k=>$v): $arr=array();?>
  <tr align="center">
     
      <?php foreach($v as $k1=>$v1): $arr[]=$v1['id'];?>
      <td><?php echo ($v1["value"]); ?></td>
      
   
      <?php endforeach; sort($arr);$arr=implode(',',$arr);?>
      <td><input type='text' name="number['<?php echo ($arr); ?>']" value='<?php if($res[$arr]) echo $res[$arr];?>'/></td>
  </tr>
       <?php endforeach;?>
         </tr>
  <!-- #代码增加2014-12-23 by www.68ecshop.com  _end -->
      <tr>
          <td colspan="<?php echo count($data[0])+1;?>" align="center">
      <input type="submit" value=" 确定 " class="button" />
      <input type="reset" value=" 重置 " class="button" />
  </tr>
</table>
</div>


</form>



  



<script language="JavaScript">

</script>
</body>
</html>