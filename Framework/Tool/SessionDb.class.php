<?php
class SessionDb{
    public  $_db;
    #初始化session
    protected function _init(){
        #实现session入库
        session_set_save_handler(array($this,"sessionOpen"),array( $this,"sessionClose"),array($this, "sessionRead"), array($this,"sessionWrite"),array($this, "sessionDestory"),array($this, "sessionGc"));    
    }
    public function __construct(){
        $this->_init();
        @session_start();
    }
  function sessionOpen(){
     
        #连接数据库
       
       $db=$GLOBALS['config']['db']::getNew();  
       $this->_db=$db;
    }
   function sessionClose(){}
   function sessionRead($id){
        $sql="select session_content from session where id='$id'";
       
        if($res=$this->_db->getOne($sql))
                return $res;
        return '';
    }
    function sessionWrite($id,$content){
       
        $sql="replace into session values ('$id','$content',unix_timestamp())";
       
       return  $this->_db->query($sql);
    }
   function sessionDestory($id){
       $sql="delete from session where id='$id'";
       return $this->_db->query($sql);
   }
   function sessionGc($life_time){
       //定时删除
       $sql="delete from php34 where last_time<unix_timestamp()-$lifetime";
       return $this->_db->query($sql);
   }
}
