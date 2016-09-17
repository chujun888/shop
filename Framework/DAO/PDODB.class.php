<?php
class PDODB implements I_DAO{
      private $_username;
      private $_password;
      private $_db;
      private $_host;
      private $_post;
      private $_dns;
      private $_driver;
      private $_pdo;
      #预防出现 object convered to int 的情况将pdostatement 对象赋值
      private $_state;
      private static $_Instance;
      private function __construct($config) {
               //初始化配置
                $this->_host=isset($config['host'])?$config['host']:$GLOBALS['config']['database']['host'];
                $this->_username=isset($config['user'])?$config['user']:$GLOBALS['config']['database']['user'];
                 $this->_password=isset($config['password'])?$config['password']:$GLOBALS['config']['database']['password'];
                 $this->_db=isset($config['db'])?$config['db']:$GLOBALS['config']['database']['db'];
		//初始化1.选择数据库 2.编码 3.连接数据库
                $this->_port=isset($config['port'])?$config['port']:$GLOBALS['config']['database']['port'];
                $this->_initDns();
                $this->_initDriver();
                $this->_initPdo();
      }
      private function __clone(){
          
      }
      #返回一个pdo对象
     public static function getNew($config=array()){
		if (! static::$_Instance instanceof static) {
			static::$_Instance = new static($config);
		}
		return static::$_Instance;
	}
      #初始化dns
      private function _initDns(){
          $this->_dns="mysql:host={$this->_host};dbname={$this->_db};post={$this->_post};";
      }
      #初始化driver
      private function _initDriver(){
          $this->_driver=array(
             PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"
          );
      }
      #初始化pdo
      private function _initPdo(){
          $this->_pdo=new PDO($this->_dns, $this->_username, $this->_password, $this->_driver);
      }
        public function query($sql) {
		$result = $this->_pdo->query($sql);
                if(!$result)
		{
		$error_info = $this->_pdo->errorInfo();
		echo "<br />执行失败。";
		echo "<br />失败的sql语句为：" . $sql;		echo "<br />出错信息为：" . $error_info[2];
			echo "<br />错误代号为：" . $error_info[1];
			die;
		}             
		$this->_state=$result;
                
	}
        
        //执行语句
        public function execute($sql){
            $this->query($sql);
            return true;
        }

	public function getAll($sql) {
		//执行
		$this->query($sql);
		//获取数据，关联
		$list = $this->_state->fetchAll(PDO::FETCH_ASSOC);
		//关闭光标（释放）
                $this->_state->closeCursor();
		return $list;
	}

	public function getRow($sql) {
		$this->query($sql);
		$row = $this->_state->fetch(PDO::FETCH_ASSOC);
		$this->_state->closeCursor();
	return $row;
	}

	public function getOne($sql) {
		$this->query($sql);
		$string =$this->_state->fetchColumn();
		$this->_state->closeCursor();
		return $string;
	}

	public function quote($data) {
                if(empty($data))
                    return $data;
                return is_array($data)?array_map(array($this,'quote'),$data):$this->_pdo->quote($data);
		
	}
        //获取最后一条插入的id
        public function getId(){
            return $this->_pdo->lastInsertId();
        }

}