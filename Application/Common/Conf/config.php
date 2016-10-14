<?php
return array(
	//'配置项'=>'配置值'
	'MODULE_ALLOW_LIST' => array('Home', 'Back','Ger'), # 允许访问的模块列表
	'DEFAULT_MODULE' => 'Home',	# 默认的模块
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
      
          /**文件上传**/
       'UPLOAD_PATH'           =>'./Uploads/',  //文件上传地址        
       'SHOW_PATH'             =>'/Uploads/' ,   //文件显示地址
       /***外部继承包***/
       'INCLUDE_PATH'=>'/includes/',
        /**换行符**/
       'LINE_FEED'             =>"\r\n",
     /* 数据缓存设置 */
    'DATA_CACHE_TIME'       =>  84600,      // 数据缓存有效期 0表示永久缓存
    'DATA_CACHE_TYPE'       =>  'Memcache',  // 数据缓存类型,支持:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator
    'MEMCACHE_HOST'         =>'tcp://127.0.0.1:11211',
    /****商品详情页缓存地址******/
    'GOODS_PATH'    => '/Goods/',
     
);