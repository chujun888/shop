<?php 
return array(
'tableName'=>'php34_role',#表名
'tableCN' =>'',#表中文名
'TPName'=>'Role',#tp中使用的表名(首字母大写)
'tpName'=>'role',#tp中使用的表名(首字母大写)
'digui'=>'',//是否无限极
'diguiName'=>'',//无限循环的字段名

'_pk'       =>'id',#主键字段
'insertField'=>'role_name',
'updateField'=>'id,role_name',
'validate'=>"array(
		 array('role_name','require','角色名称不能为空',1),
		 array('role_name','0,30','角色名称应小于30',0,'length'),
)",
'fields'=>array(
     array(
     'text'=>'role_name',
     'name'=>'角色名称',
     'type'=>'text',
     'default'=>'',
     'unique'=>'yes',
     ),
 
     ),
  
);