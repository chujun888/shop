<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: role_info.htm 14216 2010-01-08 02:27:21Z liuhui $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>商之翼 管理中心 - 修改角色 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/styles/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/js/jquery-1.6.2.min.js"></script><script type="text/javascript" src="/Public/js/jquery.json.js"></script><script type="text/javascript" src="../js/transport.js"></script><script type="text/javascript" src="/Public/js/common.js"></script>
</head>
<body>


<h1>
<span class="action-span"><a href="/Back/Role/lst">角色列表</a></span>
<span class="action-span1"><a href="/Back/index/main">商之翼 管理中心</a> </span><span id="search_id" class="action-span1"> - 角色修改 </span>
<div style="clear:both"></div>
</h1>
<form method="POST" action="" name="theFrom">
<div class="list-div">
<table width="100%">
    <input type='hidden' value='<?php echo I('get.id');?>' name='id'/>
  <tr>
    <td class="label">角色名</td>
    <td>
      <input type="text" name="role_name" maxlength="20" value="<?php echo ($data["role_name"]); ?>" size="34"/><span class="require-field">*</span></td>
  </tr>
  <tr>
    <td class="label">角色描述</td>
    <td>
    <textarea name="role_describe" cols="31" rows="6"><?php echo ($data["role_describe"]); ?></textarea>
</td>
  </tr>
  </table>
<table cellspacing='1' id="list-table">
<?php foreach($pris as $k=>$v):?>
 <tr>
  <td width="18%" valign="top" class="first-cell">
      <input name="pris[]" <?php if(in_array($v['id'],$ids)) echo 'checked';?> type="checkbox" value="<?php echo ($v["id"]); ?>" onclick="check(this)" class="checkbox"><?php echo ($v["pri_name"]); ?>  </td>
  <td>
 <?php foreach($v['children'] as $k1=>$v1):?>
        <div style="width:200px;float:left;">
    <label for="goods_manage"><input <?php if(in_array($v1['id'],$ids)) echo 'checked';?> type="checkbox" name="pris[]" value="<?php echo ($v1["id"]); ?>" id="goods_manage" class="checkbox"  onclick="checkPrev(this)" title=""/>
    <?php echo ($v1['pri_name']); ?></label>
    </div>
 <?php endforeach;?>
   </td>
 </tr>
<?php endforeach;?>

  <tr>
    <td align="center" colspan="2" >
      <input type="checkbox" name="checkall" value="checkbox" onclick="checkAll(this);" class="checkbox" />全选      &nbsp;&nbsp;&nbsp;&nbsp;
      <input type="submit"     value=" 保存 " class="button" />&nbsp;&nbsp;&nbsp;
      <input type="reset" value=" 重置 " class="button" />
    
    </td>
  </tr>
</table>
</div>
</form>


<script language="javascript">

</script>

<div id="footer">
共执行 3 个查询，用时 0.016185 秒，Gzip 已禁用，内存占用 2.516 MB<br />
版权所有 &copy; 2008-2015 秦皇岛商之翼网络科技有限公司，并保留所有权利。</div>
<script type="text/javascript" src="../js/utils.js"></script><!-- 新订单提示信息 -->


<!--
<embed src="/Public/images/online.wav" width="0" height="0" autostart="false" name="msgBeep" id="msgBeep" enablejavascript="true"/>
-->


<script language="JavaScript">
//选中之后的
function check(e){
    var td=$(e).parent().next('td');
    
    var flag=$(e).prop('checked');
   
    td.find('input[type=checkbox]').prop('checked',flag);
}

//全选
function checkAll(e){
    var flag=$(e).prop('checked');
    $(e.form).find('input[type=checkbox]').prop('checked',flag);
}

function checkPrev(e){
   var p=$(e).parent().parent().parent();
   p.prev('td').find('input[type=checkbox]').prop('checked',true);
}

//-->
</script>
</body>
</html>