<?php 
return array(
'tableName'=>'php34_member_level',#表名
'tableCN' =>'会员级别',#表中文名
'TPName'=>'MemberLevel',#tp中使用的表名(首字母大写)
'tpName'=>'memberLevel',#tp中使用的表名(首字母大写)

'_pk'       =>'id',#主键字段
'insertField'=>'level_name,bottom_num,top_num,rate',
'updateField'=>'id,level_name,bottom_num,top_num,rate',
'validate'=>"array(
		 array('level_name','require','级别名称不能为空',1),
		 array('level_name','0,30','级别名称应小于30',0,'length'),
		 array('bottom_num','require','积分下线不能为空',1),
		 array('bottom_num','number','积分下线必须是数字'),
		 array('top_num','require','积分下限不能为空',1),
		 array('top_num','number','积分下限必须是数字'),
		 array('rate','number','必须是数字'),
)",
'fields'=>array(
     array(
     'text'=>'level_name',
     'name'=>'级别名称',
     'type'=>'text',
     'default'=>'',
     'unique'=>'yes',
     ),
     array(
     'text'=>'bottom_num',
     'name'=>'积分下限',
     'type'=>'text',
     'default'=>'',
     'unique'=>'yes',
     ),
     array(
     'text'=>'top_num',
     'name'=>'积分下限',
     'type'=>'text',
     'default'=>'',
     'unique'=>'yes',
     ),
     array(
     'text'=>'rate',
     'name'=>'折扣率',
     'type'=>'text',
     'default'=>'',
     'unique'=>'',
     ),
 
     ),
  
);