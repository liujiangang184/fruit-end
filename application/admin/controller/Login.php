<?php
/**
 * Created by PhpStorm.
 * User: 剑港
 * Date: 2019/10/29
 * Time: 10:51
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;
use think\Exception;
use think\JWT;

class Login extends Controller
{
    public function index(){
        try{

        }catch (Exception $exception){
            return json([
                'code'=>config('code.fail'),
                'msg'=>'登录失败',
            ]);
        }
        $data=$this->request->post();
        $salt=config('salt');
        $password=$data['password'];
        /*   $data['password']=md5(crypt($password,md5($salt)));*/
        $data['password']=md5($password);
        $result=Db::table('manage')->where($data)->find();
        if($result){
            $payload=['id'=>$result['id'],'names'=>$result['names']];
            $token=JWT::getToken($payload,config('jwtkey'));
            return json([
                'code'=>config('code.success'),
                'msg'=>'登录成功',
                'data'=>[
                    'token'=>$token
                ]
            ]);
        }else{
            return json([
                'code'=>config('code.fail'),
                'msg'=>'登录失败',
            ]);
        }

    /*    print_r($salt);
        print_r($result);*/
    }

}