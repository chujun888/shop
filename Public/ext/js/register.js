//验证手机
function checkMobilePhone(e){
	var value=$(e).val();
	var type=$(e).parent().prev('input').val();

	var preg=/^\d{11}$/;
	var res=value.match(preg);
	$('#mobile_phone_notice').html('');
		
	if(res==null){
		$('#mobile_phone_notice').html('<font color="red">手机格式错误</font>');
		return false;
	}
	//ajax验证唯一性
       
	$.ajax({
		'type':'get',
		'dataType':'json',
		url:'/index.php/member/ajaxCheck/name/'+value+"/type/"+type,
                async:false,
		success:function(data){
			if(data.ok==0){
				$('#mobile_phone_notice').html('<font color="red">手机号已经被注册</font>');
                                
				
				flag=false;
			}
			else{
				$('#mobile_phone_notice').html('<font color="green">手机号可以注册</font><img src="/Public/images/yes.gif"/>');
			       flag=true;
			}
		}
	});
       
        return flag;
		
}

//验证密码
function check_pwd(e){
    var value=$(e).val();
	
	var preg=/^[0-9\D]{6,20}$/;
	var flag=value.match(preg);

	
	
	
	if(flag==null){
		
		$(e).parent().find('#password_notice').html('<font color="red">请输入6-20位字符</font>');

		return false;
	}	
	$(e).parent().find('#password_notice').html('<font color="green">密码格式正确</font><img src="/Public/images/yes.gif"/>');
	return true;
}

//确认密码
function chk_confirm(e){
     var p_value=$(e).parent().prev().find('input[type=password]').val();
     var value=$(e).val();

     if(p_value!=value){
	
			$(e).parent().find('#conform_password_notice').html('<font color="red">两次密码不一致</font>');

			return false;
		}	
		$(e).parent().find('#conform_password_notice').html('<font color="green">两次密码相同</font><img src="/Public/images/yes.gif"/>');
		return true;

}

// check_conform_password()
function  checkEmail(e){
	var value=$(e).val();
	var type=$(e).parent().prev('input').val();

	var preg=/^\w+@([a-zA-Z0-9\-]+\.)+([a-zA-Z0-9]{2,4})+$/;
	var res=value.match(preg);
	$('#email_notice').html('');
		
	if(res==null){
		$('#email_notice').html('<font color="red">邮箱格式错误</font>');
		return false;
	}
	//ajax验证唯一性
	$.ajax({
		'type':'get',
		'dataType':'json',
		url:'/index.php/member/ajaxCheck/name/'+value+"/type/"+type,
		success:function(data){
			if(data.ok==0){
				$('#email_notice').html('<font color="red">邮箱已经被注册</font>');
				return false;
			}
			else{
			
				$('#email_notice').html('<font color="green">邮箱可以注册</font><img src="/Public/images/yes.gif"/>');
				return true;	
			}
		}
	});
		
}