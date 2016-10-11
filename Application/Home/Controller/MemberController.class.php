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
                      $this->success('注册成功！',U('login'));
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
    
   /**
    * 登录
    */
    public function login(){
      if($_POST){
          $m_member=D('Home/Member');
       
            if($m_member->validate($m_member->_login_validate)->create(I('post.'))){
                if($m_member->login()){
                    if($return=session('return')){
                        $this->redirect($return);
                        exit;
                    }
                    header("location:/index.html");
                }
             }   
         
                $this->error($m_member->getError(),'',1);
                 exit;
          
      }
       $this->assign(array(
           'title'=>'登录商城',
           'style'=>array('login'),
       ));
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
    
    /**
     * 生成验证码
     */
    public function verify(){
        $config=array(  
        'fontSize'  =>  25,              // 验证码字体大小(px)
        'useCurve'  =>  false,            // 是否画混淆曲线
        'useNoise'  =>  false,            // 是否添加杂点	
         'length'    =>  4,               // 验证码位数
           'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
        );
        $verify=new \Think\Verify($config);
        $verify->entry();
    }
    
}
