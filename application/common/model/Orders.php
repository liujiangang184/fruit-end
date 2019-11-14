<?php
/**
 * Created by PhpStorm.
 * User: 剑港
 * Date: 2019/11/14
 * Time: 16:22
 */

namespace app\common\model;


use think\Model;

class Orders extends Model
{
    protected $table = 'orders';
    public function insertOrders($data){
        return $this->allowField(true)->save($data);
    }
}