<?php
class Captcha{
        /**
         * 生成验证码
         * @param $config array 
         */
        function generate($config=array()){
            $charts="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
            $code_len=isset($config['code_len'])?$config['code_len']:$GLOBALS['config']['code_len'];
            #随机生成字符
            $str_len=  strlen($charts)-1;
            $str='';
            for($i=0;$i<$code_len;$i++){
                $rand=mt_rand(0, $str_len);
                $str.=$charts[$rand];
            }
            //入库
            $_SESSION['captcha']=$str;
            #画布地址
            $imagePath=TOOL_PATH."Captcha/captcha_bg".mt_rand(1,4).".jpg";
            //创建画布
            $img=imagecreatefromjpeg($imagePath);
            //字体大小
            $font=5;
            //给字体随机分配颜色
            $imgColor=  mt_rand(1, 2)==1?imagecolorallocate($img, 0, 0, 0):imagecolorallocate($img,0xff,0xff,0xff);
            //字体位置
            $x=(imagesx($img)-$code_len*  imagefontwidth($font))/2;
            $y=(imagesy($img)-imagefontheight($font))/2;
            header('Content-type:image/jpeg;');
            #图片写上字符
            imagestring($img, $font, $x, $y, $str, $imgColor);
            #输出
            imagejpeg($img);
        }
        #检验验证码
        function check($code=''){
            if(!$code)
                $code=$_POST['captcha'];
            $code=  strtolower($code);
            $captcha=  strtolower($_SESSION['captcha']);
            if($code==$captcha)
                return true;
            return false;
        }
}