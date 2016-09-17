<?php
//db
class MysqlDB{
	//实例化对象
	private static $link;
	#连接资源
	private $resource;
	#数据库配置
	private $host;
	private $user;
	private $password;
	private $db;
	private function __clone(){}
	private function __construct($config){
                //初始化配置
                $this->host=isset($config['host'])?$config['host']:$GLOBALS['config']['database']['host'];
                $this->user=isset($config['user'])?$config['user']:$GLOBALS['config']['database']['user'];
                 $this->password=isset($config['password'])?$config['password']:$GLOBALS['config']['database']['password'];
                 $this->db=isset($config['db'])?$config['db']:$GLOBALS['config']['database']['db'];
		//初始化1.选择数据库 2.编码 3.连接数据库
                $this->port=isset($config['port'])?$config['port']:$GLOBALS['config']['database']['port'];
		if($res=$this->connect())
               
			$this->resource=$res;
		else
			return false;
		$this->select_db();
		$this->charset();
	}
	#返回对象方法
	/**
	*@param $config arr 数据库的配置
	**/
	public static function getNew($config=array()){
		if(!self::$link){
			
			self::$link=new self($config);
			
		}
		return self::$link;
	}
	//连接数据库
	private function connect(){
		if($res=mysql_connect($this->host,$this->user,$this->password))
			return $res;
		else
			return false;
	}
	//设置编码
	private function charset(){
		mysql_set_charset('utf8',$this->resource);
	}
	#选择数据库
	private function select_db(){
		mysql_select_db($this->db,$this->resource);
	}
        #查询方法
        public function query($sql){
            #防止sql注入
       
            if($res=mysql_query($sql,$this->resource))
                    return $res;
             die('语句执行错误'.'错误代号为'.mysql_errno().'错误原因为'.mysql_error());
        }
        #获取所有记录
        public function getAll($sql){
            $res=$this->query($sql);
            $arr=array();
            //将每一行数据存储
            while($row=mysql_fetch_row($res)){
                $arr[]=$row;
            }
            return $arr;
        }
        #获取一行记录
        public function getRow($sql){
            $res=$this->query($sql);
            return mysql_fetch_row($res);
        }
        #获取一个记录
        public function getOne($sql){
            $res=$this->query($sql);
            $res=mysql_fetch_row($res);
            return $res[0];
        }
}


