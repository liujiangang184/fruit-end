<?php
/**
 * Created by PhpStorm.
 * User: 80752
 * Date: 2019/11/7
 * Time: 12:05
 */

namespace app\common\model;


use think\Model;

class Users extends Model
{
    protected $table='users';
    protected $autoWriteTimestamp = true;   // 设置默认时间

    public function insert($data){
        return $this->allowField(true)->save($data);
    }
    public function queryusers($where=[]){
        return $this->where($where)->select();
    }
   /* public function queryone($uid){
        return $this->where('id',$uid)->find();
    }*/
}
