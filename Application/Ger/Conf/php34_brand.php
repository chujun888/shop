<?php 
return array(
'tableName'=>'php34_brand',#表名
'tableCN' =>'商品品牌',#表中文名
'TPName'=>'Brand',#tp中使用的表名(首字母大写)
'tpName'=>'brand',#tp中使用的表名(首字母大写)

'_pk'       =>'id',#主键字段
'insertField'=>'brand_name,url',
'updateField'=>'id,brand_name,url',
'validate'=>"array(
		 array('brand_name','require','品牌名称不能为空',1),
		 array('brand_name','0,50','品牌名称应小于50',0,'length'),
		 array('url','0,140','品牌官网应小于140',0,'length'),
)",
'fields'=>array(
     array(
     'text'=>'brand_name',
     'name'=>'品牌名称',
     'type'=>'text',
     'default'=>'',
     'unique'=>'yes',
     ),
     array(
     'text'=>'url',
     'name'=>'品牌官网',
     'type'=>'text',
     'default'=>'',
     'unique'=>'yes',
     ),
 
     ),
  
);