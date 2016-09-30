<?php
return array(
    //页面布局
     'LAYOUT_ON'             =>  true, // 是否启用布局
    'LAYOUT_NAME'           =>  'layout', // 当前布局名称 默认为layout
    //开启缓存
    'HTML_CACHE_ON'     =>    false, // 开启静态缓存
    'HTML_CACHE_TIME'   =>    84500,   // 全局静态缓存有效期（秒）
    'HTML_FILE_SUFFIX'  =>    '.html', // 设置静态缓存文件后缀
    'HTML_CACHE_RULES'  =>     array(  // 定义静态缓存规则)
        "index:index"   => array('index',84500),
        
    ),
   'HTML_PATH'         =>'/',
    
);