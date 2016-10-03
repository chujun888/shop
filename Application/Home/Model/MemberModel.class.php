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
    //自动完成
    protected $_auto=array(
        array('password','md5',1,'function'),
        array('addtime','time',1,'function')
    );
    protected  function _before_insert(&$data, $options) {
        parent::_before_insert($data, $options);
        if(isset($data['email']))
            $data['user']=$data['email'];
        else
            $data['user']=$data['mobile'];
       
    }
    
    
}
