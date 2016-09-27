<?php
namespace Back\Controller;
use Think\Controller;
class BaseController extends Controller{
    public function __construct() {
        
        parent::__construct();
        $this->check();
        $this->checkPri();
    }
    //验证用户是否登录
    protected  function check(){
          if(!session('id')){
              $this->error('请登录', U('login/index'));
              exit;
          }
    }
    //检查权限是否通过
    protected function checkPri(){
        $c_name=CONTROLLER_NAME;
        $a_name=ACTION_NAME;
        $id=  session('id');$role_id=session('role_id');
        
        if($id==1 || strcasecmp($c_name, 'index')==0){
            return;
        }
        //取出所有通过的权限
        
        $data=M()->query("select * from __PRIVILEGE__ where id in (select privilege_id from __ROLE_PRIVILEGE__ where role_id =$role_id) and controller_name='$c_name' and action_name='$a_name'");
        
        if(!$data){
            $this->error('无权访问该模块，请重新登录',U('login/index'));
            exit;
        }
    }
    
}
