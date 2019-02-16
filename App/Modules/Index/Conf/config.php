<?php

return array(
    //'TAGLIB_LOAD'       => true,    //加载标签库打开
    'APP_AUTOLOAD_PATH' => '@.TagLib',
    'TAGLIB_BUILD_IN'   => 'Cx,Nav',  //Cx为核心标签库名称，Nav为自定义标签库名称,不能弄错。

    //是否开启静态缓存
    'HTML_CACHE_ON' => true,
    //静态缓存规则
    'HTML_CACHE_RULES' => array(
        'Show:index' => array('{:module}_{:action}_{id}',10),
    ),
    //静态缓存方式
    'HTML_CACHE_TYPE' => 'File',
);