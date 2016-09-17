<?php
return array(
    #数据库配置
    "database"=>array(
        'host'=>'localhost',
        'port'=>'3306',
        'user'=>'root',
        'password'=>'123',
        'db'=>'test',
        'prefix'=>''
    ),
     #数据库驱动
    'db'=>'PDODB', #MYSQLDB PDODB
    #默认分发参数
    "default_m"=>"Home",
    "default_c"=>"Index",
    "default_a"=>"index",
   
    #验证码参数
    'code_len'=>'4', #验证码长度
    
   #文件上传参数 1M
    
);
