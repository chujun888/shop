<?php
class Controller{
	#初始化header
	protected function _initCont(){
		header("Content-type:text/html;charset=utf-8");
	}
	public function __construct(){
		$this->_initCont();
                //开启session机制
		 session_start();
		
             
	}
        #跳转
        protected function _jump($url,$info='',$wait=0){
            #提示跳转
            if($info){
                  header("Refresh:$wait;Url=$url");
                  echo $info;
            }
            #立即跳转
            else
                header("Location:$url");
            die();
        }
}