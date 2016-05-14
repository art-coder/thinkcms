<?php
return array(
    //'配置项'=>'配置值'
    'WEB_NAME' => 'ThinkCMS',
    'CMS_VERSION' => 0.1,// 版本信息
    'URL_MODEL' => '2', //URL模式
    'SHOW_PAGE_TRACE' => true,
//    'TMPL_ENGINE_TYPE' => 'smarty',
    'URL_CASE_INSENSITIVE' => false,//大小写敏感开启

    /* 数据库设置 */
    'DB_TYPE' => 'mysql',     // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'tpcms',          // 数据库名
    'DB_USER' => 'root',      // 用户名
    'DB_PWD' => '123456',          // 密码
    'DB_DEBUG' => TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE' => true,        // 启用字段缓存

    // 允许访问的模块列表
    'MODULE_ALLOW_LIST' => array('Home', 'Admin', 'User'),
    'DEFAULT_MODULE' => 'Home', // 默认模块

    'APP_SUB_DOMAIN_DEPLOY' => 1, // 开启子域名配置
    'APP_SUB_DOMAIN_RULES' => array(
        'admin' => 'Admin', // admin子域名指向Admin模块
        'www' => 'Home', // www子域名指向Home模块
    ),

    'TAGLIB_PRE_LOAD' => 'Common\TagLib\Tags',   // 需要额外加载的标签库(须指定标签库名称)，多个以逗号分隔



    'DEFAULT_THEME' => 'Bootstrap',// 设置默认主题
    /* 模板相关配置 */
    //此处只做模板使用，具体替换在COMMON模块中的set_theme函数,该函数替换MODULE_NAME,DEFAULT_THEME两个值为设置值
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__IMG__'    => __ROOT__ . '/Public/DEFAULT_THEME/images',
        '__CSS__'    => __ROOT__ . '/Public/DEFAULT_THEME/css',
        '__JS__'     => __ROOT__ . '/Public/DEFAULT_THEME/js',
        '__THEME__'     => __ROOT__ . '/Public/DEFAULT_THEME',
        '__PLUGINS__'     => __ROOT__ . '/Public/Plugins',
    ),


);