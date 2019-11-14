<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Good extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        try{
            $dat = $this->request->get();
            if (isset($dat['page']) && !empty($dat['page'])) {
                $page = $dat['page'];
            } else {
                $page = 1;
            }
            if (isset($dat['limit']) && !empty($dat['limit'])) {
                $limit = $dat['limit'];
            } else {
                $limit = 3;
            }
            $cid = $dat['cid'];
            $data = Db::table('goods')->where('cid',$cid)->order('id','asc')->field('id,gname,gthumb,sale,mprice')->paginate($limit,false, [
                'page' => $page
            ]);
            $total = $data->total();
            $goods = $data->items();
            if($total > 0 && count($goods)>0){
                return json([
                    'code'=>config('code.success'),
                    'msg'=>'数据获取成功',
                    'goods'=>$goods,
                    'total'=>$total
                ]);
            }else{
                return json([
                    'code'=>config('code.success'),
                    'msg'=>'暂无数据',
                ]);
            }

        }catch (Exception $exception){
            return json([
                'code'=>config('code.fail'),
                'msg'=>'服务器错误，请联系管理员',
            ]);
        }
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
