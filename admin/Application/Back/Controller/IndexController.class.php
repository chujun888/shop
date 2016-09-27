<?php
namespace Back\Controller;
use Base\Controller;
class IndexController extends BaseController {
    public function index(){
        $this->display();
    }
    public function left(){
        //取出当前角色所有分类
        $role_id=session('role_id');
        $m_priv=D('Back/privilege');
        $where=array();
        $where['is_show']=array('eq',1);
        //admin取出所有权限
        if(session('id')==1){
            $data=$m_priv->where($where)->select();
        }
        else{
            $data=M()->query("select * from __PRIVILEGE__ where is_show=1 and id in (select privilege_id from __ROLE_PRIVILEGE__ where role_id=$role_id)");
        }
       //嵌套展示
        $data=$m_priv->getNest($data);
        $this->assign('data',$data);
        $this->display();
    }
    public function top(){
        $this->display();
    }
    public function main(){
        $this->display();
    }
    public function test(){
        $this->display('add');
    }
    /**
     * 退出登录
     */
    public function logout(){
        session(null);
        $this->redirect('login/index');
    }
}