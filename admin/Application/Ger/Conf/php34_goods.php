<?php 
return array(
'tableName'=>'php34_goods',#表名
'tableCN' =>'',#表中文名
'tpName'=>'Goods',#tp中使用的表名
'insertField'=>'goods_name,market_price,jifen,jyz,jifen_price,promote_price,promote_start_time,promote_end_time,seo_keyword,seo_desc,goods_desc',
'updateField'=>'idgoods_name,market_price,jifen,jyz,jifen_price,promote_price,promote_start_time,promote_end_time,seo_keyword,seo_desc,goods_desc',
'validata'=>"array(
array('goods_name','require','商品名称不能为空',1),
array('goods_name','150','商品名称应小于150','length'),
array('market_price','number','必须是数字'),
array('jifen','number','必须是数字'),
array('jyz','number','必须是数字'),
array('jifen_price','number','必须是数字'),
array('promote_price','number','促销价必须是数字'),
array('promote_start_time','number','必须是数字'),
array('promote_end_time','number','必须是数字'),
array('seo_keyword','150','seo关键字应小于150','length'),
array('seo_desc','140','seo描述应小于140','length'),
)",
'fields'=>"array(
         array(    
     'text'=>'goods_name',
     'type'=>'text',
     'default'=>,
     ),
               array(    
     'text'=>'market_price',
     'type'=>'text',
     'default'=>,
     ),
      array(    
     'text'=>'jifen',
     'type'=>'text',
     'default'=>,
     ),
      array(    
     'text'=>'jyz',
     'type'=>'text',
     'default'=>,
     ),
      array(    
     'text'=>'jifen_price',
     'type'=>'text',
     'default'=>,
     ),
         array(    
     'text'=>'promote_price',
     'type'=>'text',
     'default'=>,
     ),
      array(    
     'text'=>'promote_start_time',
     'type'=>'text',
     'default'=>,
     ),
      array(    
     'text'=>'promote_end_time',
     'type'=>'text',
     'default'=>,
     ),
      array(    
     'text'=>'logo',
     'type'=>'text',
     'default'=>,
     ),
      array(    
     'text'=>'sm_logo',
     'type'=>'text',
     'default'=>,
     ),
                        array(    
     'text'=>'seo_keyword',
     'type'=>'text',
     'default'=>,
     ),
      array(    
     'text'=>'seo_desc',
     'type'=>'text',
     'default'=>,
     ),
      array(    
     'text'=>'goods_desc',
     'type'=>'text',
     'default'=>,
     ),
            )',
);