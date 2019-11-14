<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/10/30
 * Time: 23:56
 */

namespace app\common\model;


use think\Db;
use think\Model;

class Goods extends Model
{
    public function goodsinsert($data){
        $data['create_time'] = time();
        $data['update_time'] = time();
        return $this->save($data);
    }
    public function query($dat){

        if(isset($dat['page']) && !empty($dat['page'])){
            $page = $dat['page'];
        }else{
            $page = 1;
        }
        if(isset($dat['limit']) && !empty($dat['limit'])){
            $limit = $dat['limit'];
        }else{
            $limit = 2;
        }
        return Db::table('goods')->alias('g')->join('category','g.cid=category.id')->field('g.cid,g.mprice,g.sale,g.banner,g.gthumb,g.gname,g.stock,g.norms,g.brand,g.description,category.cname')->paginate($limit,false,[
            'page'=>$page
        ]);
    }
    public function del($id){
        return $this->where('cid',$id)->delete();
    }
}