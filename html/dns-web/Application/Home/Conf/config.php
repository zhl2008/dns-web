<?php
return array(
	'VIEW_PATH' =>  './html/', //指定模板目录
	'URL_PARAMS_BIND'  =>  true, //开启url参数绑定功能
	'URL_HTML_SUFFIX'=>'iscc',  //开启伪静态
	'URL_CASE_INSENSITIVE' =>true,//url大小写不敏感
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'dns_manager',          // 数据库名
    'DB_USER'               =>  'dns',      // 用户名
    'DB_PWD'                =>  'dns_dns',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_FIELDS_CACHE'=>false,// 关闭字段缓存
    'URL_MODEL' =>2,
    'DB_CHARSET' => 'utf8',
);