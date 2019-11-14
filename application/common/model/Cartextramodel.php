<?php
/**
 * Created by PhpStorm.
 * User: 剑港
 * Date: 2019/11/11
 * Time: 17:08
 */

namespace app\common\model;


use think\Model;

class Cartextramodel extends Model
{
    public $table = 'cart_extra';

    public function queryone($data)
    {
        return $this->where($data)->find();
    }
    public function insertgoods($data){
        return $this->allowField('true')->save($data);
    }
    // 谁的购物车里面的哪件商品 num
    public  function goodsnumInc($where){
        return $this->where($where)->setInc('num');
    }
    public function querygoods($uid){
        return $this->where('uid,$uid')->select();
    }
    public  function updategoods($where,$value){
        return $this->where($where)->update($value);
    }
    public function queryselectgoods($where){
        return $this->field('gid,num')->where($where)->select();
    }
    public function deletegoods($where){
        return $this->where($where)->delete();
    }
}