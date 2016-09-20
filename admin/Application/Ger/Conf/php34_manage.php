<?php 
return array(
'tableName'=>'php34_manage',#表名
'tableCN' =>'',#表中文名
'TPName'=>'Manage',#tp中使用的表名(首字母大写)
'tpName'=>'manage',#tp中使用的表名(首字母大写)

'_pk'       =>'id',#主键字段
'insertField'=>'admin_name,admin_pwd,is_use',
'updateField'=>'id,admin_name,admin_pwd,is_use',
'validate'=>"array(
		 array('admin_name','require','管理员姓名不能为空',1),
		 array('admin_name','0,20','管理员姓名应小于20',0,'length'),
		 array('admin_pwd','require','密码md5加密不能为空',1),
		 array('admin_pwd','0,32','密码md5加密应小于32',0,'length'),
		 array('is_use','number','是否启用1：启用2：禁用必须是数字'),
)",
'fields'=>array(
     array(
     'text'=>'admin_name',
     'name'=>'管理员姓名',
     'type'=>'text',
     'default'=>'',
     'unique'=>'yes',
     ),
     array(
     'text'=>'admin_pwd',
     'name'=>'密码md5加密',
     'type'=>'password',
     'default'=>'',
     'unique'=>'yes',
     ),
 
     ),
  
);