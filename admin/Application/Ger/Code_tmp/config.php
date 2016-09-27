return array(
'tableName'=>'<?php echo $tableInfo['name'];?>',#表名
'tableCN' =>'<?php echo $tableInfo['comment'];?>',#表中文名
'TPName'=>'<?php $arr=explode('_', $tableInfo['name']);echo ucfirst($arr[1]);?>',#tp中使用的表名(首字母大写)
'tpName'=>'<?php $arr=explode('_', $tableInfo['name']);echo $arr[1];?>',#tp中使用的表名(首字母大写)
'digui'=>'',//是否无限极
'diguiName'=>'',//无限循环的字段名

<?php
   $_pk='id';#主键
   $fields=array();#允许插入的字段名
   $map=array();#允许字段的所有信息
   foreach($tableFields as $k=>$v){
       if($v['key']=='PRI'){
           $_pk=$v['field'];
           continue;
       }
       //图片，addtime 不需要插入
       if(preg_match('/(logo|sm_logo|addtime)/',$v['field']))
               continue;
       $map[]=$v;
       $fields[]=$v['field'];
   }
   $f_map=  implode(',', $fields);#插入表名集合
?>
'_pk'       =>'<?=$_pk?>',#主键字段
'insertField'=>'<?php echo $f_map;?>',
'updateField'=>'<?php echo 'id,'.$f_map;?>',
'validate'=>"array(
<?php foreach ($map as $k=>$v){
    //不为空
    if($v['null']=='NO' && $v['default']===NULL)
        echo "\t\t array('${v['field']}','require','{$v['comment']}不能为空',1),\r\n";
    //数字
    if(strpos($v['type'],'int')!==false || strpos($v['type'],'decimal')!==false )
        echo "\t\t array('${v['field']}','number','{$v['comment']}必须是数字'),\r\n";
    //字符限制
    if(strpos($v['type'], 'char')!==false){
        preg_match('/\d+/',$v['type'],$res);
        echo "\t\t array('${v['field']}','0,{$res[0]}','{$v['comment']}应小于{$res[0]}',0,'length'),\r\n";
    }
}
    
?>
)",
'fields'=>array(
<?php foreach($tableFields as $k=>$v):?>
<?php if($v['key'] || preg_match('/(logo|sm_logo|addtime)/',$v['field'])) continue;?>
     array(
     'text'=>'<?=$v['field'];?>',
     'name'=>'<?=$v['comment'];?>',
     'type'=><?php if($v['type']=='text'):?>'html',<?php elseif(preg_match('/(pwd|password)/', $v['field'])):?>'password',<?php else:?>'text',<?php endif; echo "\r\n";?>
     'default'=>'',
     'unique'=>'<?php if($v['null']=='NO' && $v['default']===NULL) echo 'yes';?>',
     ),
<?php endforeach;?> 
     ),
  
);