<?php
class LoginController extends Controller{
    function IndexAction(){
                if($_POST){
                    $m_admin=new AdminModel();
                    if($m_admin->check()){
                        $this->_jump ("index.php?c=Admin");       
                    }
                    else
                       $this->_jump ("index.php?c=Login",'输入信息错误',2);
                       exit;
                        
                }
    
		require VIEW_PATH.'login.html';
	}
        function captchaAction(){
            $capt=new Captcha();
            $capt->generate();
        }
}