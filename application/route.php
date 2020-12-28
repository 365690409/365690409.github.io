<?php

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
// 注册路由到index模块的News控制器的read操作
if($_SERVER['SERVER_NAME']=="yuan.webd.com"){
Route::rule('','yuan/index/index');
Route::rule('index','yuan/index/index');
Route::rule('info','yuan/index/info');
Route::rule('img','yuan/index/img');
Route::rule('eidt','yuan/index/eidt');
}
Route::rule(':class/[:id]','index/index/route');
Route::rule('nradmin/set/:class/[:type]/[:id]','nradmin/index/set');
Route::rule('bp/js/jstemp.js','index/index/jstemp');

return [
    //别名配置,别名只能是映射到控制器且访问时必须加上请求的方法
    '__alias__'   => [
    ],
    
//        域名绑定到模块
//        '__domain__'  => [
//            'admin' => 'admin',
//            'api'   => 'api',
//        ],
];
