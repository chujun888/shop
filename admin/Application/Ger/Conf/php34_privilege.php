<?php 
return array(
'tableName'=>'php34_privilege',#表名
'tableCN' =>'权限',#表中文名
'TPName'=>'Privilege',#tp中使用的表名(首字母大写)
'tpName'=>'privilege',#tp中使用的表名(首字母大写)
'digui'=>'1',//是否无限极
'diguiName'=>'pri_name',//无限循环的字段名

'_pk'       =>'id',#主键字段
'insertField'=>'pri_name,parent_id,module_name,controller_name,action_name',
'updateField'=>'id,pri_name,parent_id,module_name,controller_name,action_name',
'validate'=>"array(
		 array('pri_name','require','权限名称不能为空',1),
		 array('pri_name','0,32','权限名称应小于32',0,'length'),
		 array('parent_id','number','上级权限的ID 0：代表顶级权限必须是数字'),
		 array('module_name','require','模块名称不能为空',1),
		 array('module_name','0,32','模块名称应小于32',0,'length'),
		 array('controller_name','require','控制器名称不能为空',1),
		 array('controller_name','0,32','控制器名称应小于32',0,'length'),
		 array('action_name','require','动作名称不能为空',1),
		 array('action_name','0,32','动作名称应小于32',0,'length'),
)",
'fields'=>array(
     array(
     'text'=>'pri_name',
     'name'=>'权限名称',
     'type'=>'text',
     'default'=>'',
     'unique'=>'yes',
     ),
     array(
     'text'=>'parent_id',
     'name'=>'上级权限的ID 0：代表顶级权限',
     'type'=>'text',
     'default'=>'',
     'unique'=>'',
     ),
     array(
     'text'=>'module_name',
     'name'=>'模块名称',
     'type'=>'text',
     'default'=>'',
     'unique'=>'yes',
     ),
     array(
     'text'=>'controller_name',
     'name'=>'控制器名称',
     'type'=>'text',
     'default'=>'',
     'unique'=>'yes',
     ),
     array(
     'text'=>'action_name',
     'name'=>'动作名称',
     'type'=>'text',
     'default'=>'',
     'unique'=>'yes',
     ),
 
     ),
  
);