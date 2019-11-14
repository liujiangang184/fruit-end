<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Exception;

class Category extends Controller
{
    protected  function _initialize()
    {
        checkToken();
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(){
        try{
            $model=model('Category');
            $data=$model->query();
            if ($data){
                return json([
                    'code'=>config('code.success'),
                    'msg'=>'数据获取成功',
                    'data'=>$data
                ]);
            }else{
                return json([
                    'code'=>config('code.fail'),
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
        $data=$this->request->post();
        $validate=validate('Category');
        if (!$validate->scene('insert')->check($data)){
            return json([
                'code'=>config('code.fail'),
                'msg'=>$validate->getError()
            ]);

        }
        $model=model('Category');
        $result=$model->insert($data);
        if ($result>0){
            return json([
                'code'=>config('code.success'),
                'msg'=>'分类添加成功',
            ]);
        }else{
            return json([
                'code'=>config('code.fail'),
                'msg'=>'分类添加失败',
            ]);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        $model=model('Category');
        $result=$model->query($id);
        if ($result > 0){
            return json([
                'code'=>config('code.success'),
                'msg'=>'数据获取成功'

            ]);
        }else{
            return json([
                'code'=>config('code.fail'),

                'msg'=>'数据获取失败'
            ]);
        }
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
        try{
            $model=model('Category');
            $result=$model->del($id);
            if ($result > 0){
                return json([
                    'code'=>config('code.success'),
                    'msg'=>'数据删除成功'
                ]);
            }else{
                return json([
                    'code'=>config('code.fail'),
                    'msg'=>'数据删除失败'
                ]);
            }
        }catch (Exception $exception){
            return json([
                'code'=>config('code.fail'),
                'msg'=>'数据添加失败请联系管理员'
            ]);
        }

    }
}






