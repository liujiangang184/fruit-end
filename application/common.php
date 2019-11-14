<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * 校验token
 * 1.接受到token
 *      headers get post =>token
 *      1.1 判断
 *          存在
 * 2.校验
 *      JWT::verify('','')
 * */
use think\JWT;

function checkToken(){
    // 解析token
    $token=request()->header('token');
    $getToken=request()->get('token');
    $postToken=request()->post('token');
    if($token){
        $auth=$token;
    }else if ($getToken){
        $auth=$getToken;
    }else if($postToken){
        $auth=$postToken;
    }else{
        json(['code'=>401,'msg'=>'token不能为空'])->send();
        exit();
    }
    $result=JWT::verify($auth,config('jwtkey'));
    if(!$result){
        json(['code'=>401,'msg'=>'token验证失败'])->send();
        exit();
    }
    request()->id=$result['id'];
    request()->nickname=$result['nickname'];


}

 function SexCodeToText($code){
    $result='未填写';
    switch ($code){
        case 0:
            $result='未填写';
            break;
        case 1:
            $result='男';
            break;
        case 2:
            $result='女';
            break;
        default:
            $result='未填写';
    }
 }
