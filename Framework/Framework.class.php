<?php
class Framework{
    static function run(){
    	self::set_ini();
        self::_initRoot();
        //导入配置参数
        $GLOBALS['config']=require_once APPLICATION_PATH.'conf.php';
        self::_initParam();
        self::_initAutoload();
        self::_initAC();
    }
    /**
    *设置php_ini信息
    *
    **/
    private static function set_ini(){
    	 // ini_set('session.save_handler','memcache');
    	 // ini_set('session.save_path','tcp://127.0.0.1:11211');
    }
    //定义文件常量
    private static function _initRoot(){
        define('DS',DIRECTORY_SEPARATOR);
        define('ROOT_PATH',  getcwd().'/');
        define('APPLICATION_PATH',ROOT_PATH.'Application/');
        define('FRAMEWORK_PATH',ROOT_PATH.'Framework/');
        define('WEB_PATH',ROOT_PATH.'Web/');
        define('UPLOAD_PATH',ROOT_PATH.'Upload/');
        define('TOOL_PATH',FRAMEWORK_PATH.'Tool/');#工具目录
        define('DAO_PATH', FRAMEWORK_PATH.'Dao/');#工具目录
    }
    //参数分发，确定相关目录
    private static function _initParam(){
        define('MODULE',isset($_GET['m'])?$_GET['m']:$GLOBALS['config']['default_m']);
        define('CONTROLLER',isset($_GET['c'])?$_GET['c']:$GLOBALS['config']['default_c']);
        define('ACTION',isset($_GET['a'])?$_GET['a']:$GLOBALS['config']['default_a']);
        define('VIEW_PATH',APPLICATION_PATH.MODULE.'/View/'.CONTROLLER.'/'); #view所在目录
        define('CUR_WEB_PATH',WEB_PATH.MODULE.'/'); #web文件目录
    }
    //自动加载
    private static function _initAutoload(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }
    static  function  autoload($name){
            $name=  ucfirst($name);
            //系统类
            $class_list=array('Factory','Controller','Model');
            $dao_list=array('I_DAO','MysqlDB','PDODB');
            $other_list=array('Smarty'=>TOOL_PATH.'Smarty'.DS.'Smarty.class.php');
            if(in_array($name, $class_list)){
                include_once FRAMEWORK_PATH.$name.'.class.php';
            }

            //dao
            else if(in_array($name, $dao_list))
                    include_once DAO_PATH.$name.'.class.php';
            //加载控制器
            else if(substr($name,-10)=='Controller'){
                include_once APPLICATION_PATH.MODULE."/Controller/$name.class.php";
            }
            //加载模型
             else if(substr($name,-5)=='Model'){
                include_once APPLICATION_PATH.MODULE."/Model/$name.class.php";
            }
            //other
            else if(isset($other_list[$name])){
                require_once $other_list[$name];
            }
            //加载工具类
            else{
    
                #工具类
                if(file_exists(TOOL_PATH.$name.'.class.php'))
                        require TOOL_PATH.$name.'.class.php';
            }
    }
    //加载控制器和方法
    private static function _initAC(){
       //请求控制器和方法
        $c_name=CONTROLLER.'Controller';
        $a_name=ACTION.'Action';
        $controller=new $c_name;
        $controller->$a_name();
    }
} 
