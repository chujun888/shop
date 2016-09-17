<?php
//include_once FRAMEWORK_PATH.'Factory.class.php';
class Model{
    protected $_prefix;
    public $_dao;
    protected $_table;
    #初始化dao
    protected function _init($config=array()){
        $this->_dao=$GLOBALS['config']['db']::getNew($config);
        $this->_prefix=$GLOBALS['config']['database']['prefix'];
        
    }
    /**
     * 
     * @param type $model string 表名
     */
    public function __construct($model='') {
        $this->_init();
        //直接使用model时指定表名
        if($model)
        $this->_table=$this->_prefix.$model;
    }
   /**添加
    * @param $data arary 关联数组
    */
    public function insert($data){
        //insert into php34 values  ('a'=>'a','b'=>'b'); 
      $ks='';$vs='';
       $data=$this->_dao->quote($data);
       foreach($data as $k=>$v){
           if($k=='id')
               continue;
           $ks.="$k,";
           $vs.="$v,";
       }
       $ks=  rtrim($ks,',');
       $vs=  rtrim($vs,',');
       
       $sql="insert into {$this->_table} ($ks) values ($vs)";
       $this->_dao->execute($sql);
       return $this->_dao->getId();
        
    }
    //删除
    public function delete($id){
        if(is_numeric($id)){
            $sql="delete from {$this->_table} where id=$id";
            return $this->_dao->execute($sql);
        }
    }
    //修改
    public function save($data){
        //update php34 set a=a where id=5
        $data=$this->_dao->quote($data);
      
        $where='';
        foreach($data as $k=>$v){
            if($k=='id')
                continue;
            $where.="$k=$v,";
        }
        $where=  rtrim($where,',');
        $sql="update {$this->_table} set $where where id={$data['id']}";
        $this->_dao->execute($sql);
        return true;
    }
    //查
    public function select($data=''){
        //获取所有
        if(empty($data)){
            $sql="select * from {$this->_table}";
            return $this->_dao->getAll($sql);
        }
        //根据条件获取
        else if(is_array($data)){
            //select * from php where a=b and c=d
           $where='';
            $data=$this->_dao->quote($data);
            foreach($data as $k=>$v){
                $where.="$k=$v and ";
            }
            $where=  rtrim($where,'and ');
            $sql="select * from {$this->_table} where $where";
            return $this->_dao->getAll($sql);
        }
        //获取一行
        else{
             $sql="select * from {$this->_table} where id=$data";
            return $this->_dao->getRow($sql);
        }
    }
    
}