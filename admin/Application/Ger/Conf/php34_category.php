<?php 
return array(
'tableName'=>'php34_category',#表名
'tableCN' =>'商品分类',#表中文名
'TPName'=>'Category',#tp中使用的表名(首字母大写)
'tpName'=>'category',#tp中使用的表名(首字母大写)

'_pk'       =>'id',#主键字段
'insertField'=>'cat_name,parent_id,cat_desc,sort_order,unit,is_show,filter_attr_id',
'updateField'=>'id,cat_name,parent_id,cat_desc,sort_order,unit,is_show,filter_attr_id',
'validate'=>"array(
		 array('cat_name','0,30','商品类别名称应小于30',0,'length'),
		 array('parent_id','number','商品类别父ID必须是数字'),
		 array('cat_desc','0,255','商品类别描述应小于255',0,'length'),
		
		
		 array('is_show','number','是否显示，默认显示必须是数字'),
		
)",
'fields'=>array(
     array(
     'text'=>'cat_name',
     'name'=>'商品类别名称',
     'type'=>'text',
     'default'=>'',
     'unique'=>'',
     ),
     array(
     'text'=>'cat_desc',
     'name'=>'商品类别描述',
     'type'=>'text',
     'default'=>'',
     'unique'=>'',
     ),
     array(
     'text'=>'is_show',
     'name'=>'是否显示，默认显示',
     'type'=>'text',
     'default'=>'',
     'unique'=>'',
     ),

     ),
  
);