<?php
namespace Ger\Controller;
use Think\Controller;
define('GER_PATH',APP_PATH.'Ger/');
define('CODE_PATH',GER_PATH.'Code_tmp/');
define('CONFIG_PATH',GER_PATH.'Conf/');

class IndexController  extends Controller{
	function index(){
		if(IS_POST){
                 
                    //生成配置文件
                        if(I('post.type')==2){
                            $this->mkConf(I('post.config_name'));
                            exit;
                        }
                     //生成代码 控制器、模型、模板
                        else{
                            //导入配置文件
                            $get=I('post.config_name');
                            $get=explode(',', $get);
                            foreach($get as $k=>$v){
                                //配置文件地址
                                $config_path=CONFIG_PATH."{$v}.php";
                                if(file_exists($config_path)){
                                    $config=require $config_path;
                                    
                                   /**********生成控制器********/
                                   $c_path=APP_PATH.'Back/Controller/'.$config['TPName'].'Controller.class.php';   
                                   ob_start();
                                   require CODE_PATH.'Controller.php';
                                   $str=ob_get_clean();
                                   ob_end_clean(); 
                                   $flag=file_put_contents($c_path, "<?php ".C(LINE_FEED).$str);
                                   if(!$flag)
                                     $this->error ("{$v}代码控制器生成失败");
                                     
                                   /*********生成模型*************/
                                     $m_path=APP_PATH.'Back/Model/'.$config['TPName'].'Model.class.php';   
                                   ob_start();
                                   require CODE_PATH.'Model.php';
                                   $str=ob_get_clean();
                                   ob_end_clean(); 
                                   $flag=file_put_contents($m_path, "<?php ".C(LINE_FEED).$str);
                                   if(!$flag)
                                     $this->error ("{$v}代码模型生成失败");
                                     
                                   /*********生成3个视图***********/
                                   #控制器下的视图目录
                                   if(!is_dir(APP_PATH."Back/View/{$config['TPName']}"))
                                       mkdir (APP_PATH."Back/View/{$config['TPName']}");
                                   #添加方法视图
                                    $va_path=APP_PATH."Back/View/{$config['TPName']}/".'add.html';                                                            
                                   ob_start();
                                   require CODE_PATH.'add.html';
                                   $str=ob_get_clean();
                                   ob_end_clean(); 
                                   $flag=file_put_contents($va_path,$str);
                                   if(!$flag)
                                     $this->error ("{$v}add.html生成失败");
                                   #显示列表视图
                                      $la_path=APP_PATH."Back/View/{$config['TPName']}/".'lst.html';                                                            
                                   ob_start();
                                   require CODE_PATH.'lst.html';
                                   $str=ob_get_clean();
                                   ob_end_clean(); 
                                   $flag=file_put_contents($la_path,$str);
                                   if(!$flag)
                                     $this->error ("{$v}lst.html生成失败");
                                   #修改视图
                                   $ea_path=APP_PATH."Back/View/{$config['TPName']}/".'edit.html';                                                            
                                   ob_start();
                                   require CODE_PATH.'edit.html';
                                   $str=ob_get_clean();
                                   ob_end_clean(); 
                                   $flag=file_put_contents($ea_path,$str);
                                   if(!$flag)
                                     $this->error ("{$v}edit.html生成失败");
                                }
                                //配置文件未生成
                                else
                                {
                                    $this->error('配置文件不存在，请重新生成');
                                    exit;
                                }
                            }
                            //配置文件生成成功
                            $this->success('代码文件生成成功');
                            exit;
                        }
                            
                        
		}
		$this->display();
	}
        
        /**
         * 获得去前缀表名
         * @param $name string
         */
        private function getName($name){
            $arr=  explode('_', $name);
            return ucfirst($arr[1]);
        }
        
        /**
         * 生成配置文件
         */
        private function mkConf($config_name){
            if($config_name){
                $m=M();
                #输入的表名
                $config_name=  str_replace('，', ',', $config_name);
                $table=  explode(',', $config_name);
                //循环生成表结构
                foreach($table as $k=>$v){
                    #表内容
                    $tableInfo=$m->query("show table status where name like '$v'");
                    #表名不存在
                    if(!$tableInfo)
                    {
                        $this->error($v.'表不存在');
                        exit;
                    }
                    $tableInfo=$tableInfo[0];
                    #表字段
                    $tableFields=$m->query("show full fields from $v");
                    //生成配置文件
                    ob_start();
                    include CODE_PATH.'config.php';
                    $str=ob_get_clean();
                    ob_end_clean();
                    $line_feed=C('LINE_FEED');
                    $flag=file_put_contents(CONFIG_PATH.$tableInfo['name'].'.php', "<?php $line_feed".$str);
                    if(!$flag){
                        $this->error ('配置文件生成错误');
                        exit;           
                    }
                }
                $this->success('配置文件生成完毕');
                exit;
                
            }
            else
                $this->error('请输入表名');
            
        }
}