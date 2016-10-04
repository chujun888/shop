<?php
namespace Home\Model;
use Think\Model;
class MemberModel extends Model{
    protected $insertFields="email,mobile,password,captcha,code,confirm_password,type";
    //自动验证
    protected $_validate=array(
        array('email','email','请输入邮箱格式',0,'regex'),
       array('mobile','/^[0-9]{11}$/','手机格式不正确',0,'regex'),
        array('email','','邮箱已存在',0,'unique',1),
        array('mobile','','手机已注册',0,'unique',1),
   
        array('password','require','密码不能为空',1,'regex',1),
        array('confirm_password','password','两次输入密码不一致',1,'confirm',1)
    );
    public $_login_validate=array(
          array('password','require','密码不能为空',1),
     
          array('captcha','checkVerify','验证码不正确',1,'callback'),
          
     
        
    );
    //自动完成
    protected $_auto=array(
        array('password','md5',1,'function'),
        array('addtime','time',1,'function')
    );
    
    /**
     * 
     * @param type $data
     * @param type $options
     */
    protected  function _before_insert(&$data, $options) {
        parent::_before_insert($data, $options);
        if(isset($data['email']))
            $data['user']=$data['email'];
        else
            $data['user']=$data['mobile'];
       
    }
    
    /**
     * 检验验证码
     */
    public function checkVerify($code,$id=''){
         $verify=new \Think\Verify();
      
         return $verify->check($code);
        
    }
    
    /**
     * 登录
     */
    public function login(){
    
          if(!I('post.user')){
              $this->error='用户名不能为空';
              return false;
          }
            //检验用户名密码
            $where['user']=array('eq',I('post.user'));
          
            $where['password']=array('eq',  md5(I('post.password')));
            if($row=$this->where($where)->find()){
                //添加session
                session('m_id',$row['id']);
                session('m_user',$row['user']);
                //取出当前会员的等级id
                $m_member_level=M('memberLevel');
                $where['bottom_num']=array('elt',$row['jyz']);
                $where['top_num']=array('egt',$row['jyz']);
                $row_m=$m_member_level->where($where)->find();
                session('m_level',$row_m['id']);
                $m_cart=D('Home/Cart');
                $m_cart->moveData();
                return true;
            }
            else{
                
                $this->error='用户名密码错误';
                return false;
            }
        
       
    }
    
    
    
}
