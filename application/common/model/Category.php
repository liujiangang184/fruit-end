<?php
/**
 * Created by PhpStorm.
 * User: 剑港
 * Date: 2019/10/29
 * Time: 17:14
 */

namespace app\common\model;


use think\Db;
use think\Model;

class Category extends Model
{
//protected $table

    public function insert($data)
    {
        $data['create_time'] = time();
        $data['update_time'] = time();
        return $this->save($data);
    }
    public function query(){
        return Db::table('Category')->select();
    }
}


