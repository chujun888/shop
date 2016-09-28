<?php 
return array(
'tableName'=>'php34_attr',#表名
'tableCN' =>'属性',#表中文名
'TPName'=>'Attr',#tp中使用的表名(首字母大写)
'tpName'=>'attr',#tp中使用的表名(首字母大写)

'_pk'       =>'id',#主键字段
'insertField'=>'attr_name,attr_type,attr_option_value,type_id,sele',
'updateField'=>'id,attr_name,attr_type,attr_option_value,type_id,sele',
'validate'=>"array(
		 array('attr_name','require','属性名称不能为空',1),
		 array('attr_name','0,30','属性名称应小于30',0,'length'),
		 array('attr_option_value','0,150','可选值：多个用,分开应小于150',0,'length'),
		 array('type_id','require','所属类型不能为空',1),
		 array('type_id','number','所属类型必须是数字'),
		 array('sele','number','必须是数字'),
)",
'fields'=>array(
     array(
     'text'=>'attr_name',
     'name'=>'属性名称',
     'type'=>'text',
     'default'=>'',
     'unique'=>'yes',
     ),
     array(
     'text'=>'attr_type',
     'name'=>'属性类型',
     'type'=>'text',
     'default'=>'',
     'unique'=>'',
     ),
     array(
     'text'=>'attr_option_value',
     'name'=>'可选值：（多个用,分开）',
     'type'=>'text',
     'default'=>'',
     'unique'=>'',
     ),
  
 
     ),
  
);