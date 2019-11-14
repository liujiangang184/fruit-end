<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

Route::resource('api/category','admin/category');
Route::resource('api/upload','admin/upload');
Route::resource('api/goods','admin/goods');

Route::resource('api/index','index/index');
Route::resource('api/good','index/good');
Route::resource('api/category','index/category');
Route::resource('api/login','index/login');
Route::resource('api/users','index/Users');
Route::resource('api/cart','index/cart');
Route::resource('api/orders','index/orders');

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
