<?php

/**
*$data string|data 需要过滤的数据
**/

function removeXSS($data){
    require_once '/includes/htmlpurifier/HTMLPurifier.auto.php';
    $_clean_xss_config = HTMLPurifier_Config::createDefault();
    $_clean_xss_config->set('Core.Encoding', 'UTF-8');
    $_clean_xss_config->set('HTML.Allowed','div,b,strong,i,em,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]');
    $_clean_xss_config->set('CSS.AllowedProperties', 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align');
    $_clean_xss_config->set('HTML.TargetBlank', TRUE);
    $_clean_xss_obj = new HTMLPurifier($_clean_xss_config);
    $data=$_clean_xss_obj->purify($data);
    return $data;
}

/**
*上传图片
 * @param $data array =>logo图片地址 =>sm_logo缩略图地址 上传文件数组
 * @param $dir string 上传目录
 * @param $sm bool 是否生成缩略图
**/
function uploadOne($data,$dir="Goods/",$sm=true){
	$upload=new \Think\Upload();
        $upload->rootPath=C('UPLOAD_PATH');
        $upload->savePath=$dir;
        if($res=$upload->uploadOne($data)){
            $ret['logo']=$res['savepath'].$res['savename'];
            if($sm){
                $image=new \Think\Image();
                $image->open(C('UPLOAD_PATH').$ret['logo']);
                $image->thumb(200, 200);
                $sm_path=$res['savepath'].'sm_'.$res['savename'];
                $image->save(C('UPLOAD_PATH').$sm_path);
                //返回缩略图地址
                $ret['sm_logo']=$sm_path;
            }
            return $ret;
        }
        //返回错误信息
        $res['error']=$upload->getError();
        return $res;
}


/**
 * 显示图片 
 * @param $path string 图片地址
 * @param $width int 显示宽度
 * @param $height int 显示高度
 * return image_html string 展示图片的Html代码
 */
function showImage($path,$width=200,$height=200){
    $path=C('SHOW_PATH').$path;
    echo "<image src='$path' />";
}


/**
 * 生成下拉列表
 * @param $name string name属性值
 * @param $table 获取数据的表
 * @param $field 显示的名字
 * @param $wq 
 * 
 */
function getSelect($name,$table,$field,$value,$eq=''){
    $str="<select name='$name'><option value=''>请选择...</option>";
    $m=M($table);
    //获取显示数据
    $data=$m->field("$field,$value")->select();
    foreach($data as $k=>$v){
        $selcted="";
        if($eq && $v[$value]==$eq)
            $selcted="selected='selected'";
        $str.="<option value='{$v[$value]}' $selcted>{$v[$field]}</option>";    
    }
    $str.="</select>";
    echo  $str;
   
    
}