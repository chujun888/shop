<?php
class AdminModel extends Model{
    private $_logic='manage';
    protected $_table;
    public function __construct($config = array()) {
        parent::__construct($config);
        $this->_initTable();
    }
    //初始化表名
    private function _initTable(){
        $this->_logic='manage';
        $this->_table='`'.$this->_prefix.$this->_logic.'`';
    }
    
    //检查是否登录成功
    function check(){
        $username=$_POST['username'];
        $password=$_POST['password'];
     
        $captcha=  Factory::M('captcha');
        $res=$captcha->check();
       
        if($res&&$result=$this->select(array('admin_name'=>$username,'admin_pwd'=>$password))){
           
            //存入session
            $_SESSION['admin_name']=$result[0]['admin_name'];
            $_SESSION['admin_id']=$result[0]['admin_id'];
            return true;
        }
        return false;
    }
}
