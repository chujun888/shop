<?php 
return array(
'tableName'=>'php34_type',#表名
'tableCN' =>'商品类型',#表中文名
'TPName'=>'Type',#tp中使用的表名(首字母大写)
'tpName'=>'type',#tp中使用的表名(首字母大写)

'_pk'       =>'id',#主键字段
'insertField'=>'type_name',
'updateField'=>'id,type_name',
'validate'=>"array(
		 array('type_name','require','不能为空',1),
		 array('type_name','0,30','应小于30',0,'length'),
)",
'fields'=>array(
     array(
     'text'=>'type_name',
     'name'=>'',
     'type'=>'text',
     'default'=>'',
     'unique'=>'yes',
     ),
 
     ),
  
);