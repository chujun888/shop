<?php
class BaseController extends Controller{
    protected function _check(){
        //是否已验证通过
        if(!isset($_SESSION['admin_name']))
            $this->_jump ("index.php?c=login", '请登录',2);
    }
    public function __construct() {
        parent::__construct();
        $this->_check();
          
    }
}
