<?php
return array(
	//'配置项'=>'配置值'
	'MODULE_ALLOW_LIST' => array('Home', 'Back'), # 允许访问的模块列表
	'DEFAULT_MODULE' => 'Back',	# 默认的模块
	'URL_MODEL' => 2, # URL模式，2 REWRITE模式
            /* 数据库设置 */
        'DB_TYPE'               =>  'mysql',     // 数据库类型
        'DB_HOST'               =>  'localhost', // 服务器地址
        'DB_NAME'               =>  'php34',          // 数据库名
        'DB_USER'               =>  'root',      // 用户名
        'DB_PWD'                =>  '123',          // 密码
        'DB_PORT'               =>  '3306',        // 端口
        'DB_PREFIX'             =>  'php34_',    // 数据库表前缀
       /* I函数过滤规则 */
        'DEFAULT_FILTER'        =>  'htmlspecialchars,trim', // 默认参数过滤方法 用于I函数...
       'TMPL_ACTION_ERROR'     =>  ':tmp', // 默认错误跳转对应的模板文件
       'TMPL_ACTION_SUCCESS'   =>  ':tmp', // 默认成功跳转对应的模板文件
      /**文件上传**/
       'UPLOAD_PATH'           =>'./Uploads/',  //文件上传地址        
       'SHOW_PATH'             =>'/admin/Uploads/'    //文件显示地址
);