<?php
/**
 * Created by PhpStorm.
 * User: 剑港
 * Date: 2019/11/11
 * Time: 15:36
 */

namespace app\common\model;


use think\Model;

class Cartmodel extends Model
{
    protected $table = 'cart';

    public function queryone($uid)
    {
        return $this->field('cid,total,price')->where('id', $uid)->find();
    }

    public function insertCart($data)
    {
        return $this->allowField(true)->save($data);
    }

    public function cartInc($uid,$field,$value=1)
    {
        return $this->where('id',$uid)->setInc($field,$value);
    }
    public function cartDec($uid,$field,$value=1){
        return $this->where('id',$uid)->setDec($field,$value);
    }
    public function cartUpdate($where,$value){
        return $this->where($where)->update($value);
    }
    public function deleteCart($where){
        return $this->where($where)->delete();
    }
}