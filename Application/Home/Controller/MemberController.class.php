<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends Controller{
    public function register(){
        if($_POST){
            $m_member=D('Home/Member'); 
            //用户名 邮箱都为填写
            $flag=empty($_POST['email']) && empty($_POST['mobile']);
            
            if(!$flag && $m_member->create(I('post.'))){
               //表单验证成功
                if($m_member->add()){
                      $this->success('注册成功！');
                      exit;
                }
                else
                    $this->error($m_member->getError());
            }
            else{
                if($flag)
                   $this->error ('用户名未填写');
                else
                    $this->error($m_member->getError());
                exit;
            }
        }
        layout(false);
        $this->display();
    }
    
    public function login(){
        layout(false);
        $this->display();
    }
    
    /**
     * ajax验证用户名唯一
     */
    public function ajaxCheck(){
        $name=I('get.name');
      
        $m_member=D('Home/Member');
        $where['user']=array('eq',$name);
        if($m_member->where($where)->find()){
            echo json_encode(array('ok'=>0));
        }
        else
            echo json_encode(array('ok'=>1));
      
    }
    
}
