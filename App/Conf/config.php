<?php
return array(
	//数据库配置
    'DB_HOST'   => '127.0.0.1',
    'DB_USER'   => 'root',
    'DB_PWD'    => 'root',
    'DB_NAME'   => 'blog',
    'DB_PREFIX' => 'ningbo_',

    //应用分组
    'APP_GROUP_LIST'  => 'Index,Admin',
    //默认分组
    'DEFAULT_GROUP'   => 'Index',
    //开启独立分组
    'APP_GROUP_MODE'  => 1,
    //独立分组目录
    'APP_GROUP_PATH'  => 'Modules',

    //加载扩展配置文件
    'LOAD_EXT_CONFIG' => 'verify,water',

    // 显示页面Trace信息
    'SHOW_PAGE_TRACE' => true,

    //URL访问地址模式
    'URL_MODEL' => 2,    //0 (普通模式);1 (PATHINFO 模式);2 (REWRITE 模式);3 (兼容模式)
    //URL路由开启
    'URL_ROUTER_ON' => true,
    //URL路由规则
    'URL_ROUTE_RULES' => array(
        //'list/:id' => 'Index/List/index',
        '/^list_(\d+)$/' => 'Index/List/index?id=:1',
        '/^show_(\d+)$/' => 'Index/Show/index?id=:1',
    ),
)
?>