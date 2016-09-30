<?php
namespace Back\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function index(){
        if(IS_POST){
            $m_manage=D('Back/Manage');
            $where['admin_name']=I('post.admin_name');
            $where['admin_pwd']=md5(I('post.admin_pwd'));
            $row=$m_manage->where($where)->find();     
            //验证通过
            if($row){    
                session_set_cookie_params(86500);
                
                session('id',$row['id']);
                session('admin_name',$row['admin_name']);
                session('role_id',$row['role_id']);
                $this->redirect('index/index');
                exit;
            }
            $this->error("用户名或密码错误");
            exit;
            
        }
        $this->display();
    }
}
