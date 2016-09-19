<?php

/**
*$data string|data 需要过滤的数据
**/

function removeXSS($data){
    require_once '../includes/htmlpurifier/HTMLPurifier.auto.php';
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
 * @param $data array 上传文件数组
**/
function uploadOne($data){
	$upload=new \Think\Upload();
        $upload->rootPath=C('UPLOAD_PATH');
        $upload->savePath='Goods/';
        if($res=$upload->uploadOne($data)){
            $ret['logo']=$res['savepath'].$res['savename'];
            $image=new \Think\Image();
            $image->open(C('UPLOAD_PATH').$ret['logo']);
            $image->thumb(200, 200);
            $sm_path=C('UPLOAD_PATH').$res['savepath'].'sm_'.$res['savename'];
            $image->save($sm_path);
            $ret['sm_logo']=$sm_path;
            return $ret;
        }
        //返回错误信息
        $res['error']=$upload->getError();
        return $res;
}