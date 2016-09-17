<?php
class Upload{
    private $_error;
    private $_prefix;#前缀
    private $_size;
    private $_type_map; #类型集合
    private $_ext_type ;#后缀类型
    private $_allow_map; #允许的类型集合
    private $_allow_end_map;#最终允许类型
    public function __construct($config=array()) {
        $this->_prefix=  isset($config['prefix'])?$config['prefix']:'img_';
        $this->_size= isset($config['size'])?$config['size']:1024*1024;
        $this->_type_map = array(
			'.png' 	=> array('image/png', 'image/x-png'),
			'.jpg'	=> array('image/jpeg', 'image/pjpeg'),
			'.jpeg'	=> array('image/jpeg', 'image/pjpeg'),
			'.gif'	=> array('image/gif'),
			);
        $this->_ext_type=array('.png','.jpg','.gif','.jpeg');
        //将所有扩展类型合并，并去重
        $arr=array();
        foreach($this->_ext_type as $k=>$v){
            $arr=array_merge($arr,$this->_type_map[$v]);
        }
        $arr=array_unique($arr);
        $this->_allow_end_map=$arr;
    }
    /**文件上传
     * @param $tmp_file array $_FILE['name']
     */
    public function uploadOne($tmp_file){
        if($this->_check($tmp_file)){
           
            $ext=  strtolower(strchr($tmp_file['name'], '.'));
            $subdir=date('Y-m-d');
            $dir=UPLOAD_PATH.$subdir;
           
            //是佛存在目录
            if(!is_dir(UPLOAD_PATH.$subdir))
                mkdir ($dir);
            $filename=uniqid($this->_prefix).$ext;
            $dir_path=UPLOAD_PATH.$subdir.'/'.$filename;
            //文件转移
        
            if(move_uploaded_file($tmp_file['tmp_name'],$dir_path))
                   return $subdir.'/'.$filename; #返回文件名
            else{
                $this->_error='文件移动失败';
                return false;
            }
        }
        return false;
    }
    #获取错误信息
    public function get_error(){
        return $this->_error;
    }
    #检测文件错误
    private function _check($tmp_file){
        #文件大小
     
        if($tmp_file['size']>$this->_size){
            $this->_error="文件应小于{$this->_size}";
            return false;
        }
        #文件类型1.文件类型检测 2.type检测 3.mime检测
        $ext= strtolower(strchr($tmp_file['name'],'.'));
    
        $res_1=in_array($ext, $this->_ext_type);  
        
        $res_2=in_array($tmp_file['type'],$this->_allow_end_map);       
        
        $fileInfo=new finfo(FILEINFO_MIME_TYPE);#获取可以检测类型信息的文件对象
        $mime_type=$fileInfo->file($tmp_file['tmp_name']);#检测
        $res_3=in_array($mime_type, $this->_allow_end_map);
        //合并文件类型检测
        $res=$res_1 && $res_2 && $res_3;
       
        if(!$res){
            $this->_error='文件类型不符';
            return false;
        }     
        
        if($tmp_file['error']!=0){
            $this->_error='文件上传错误';
            return false;
        }
        return true;
    }
}