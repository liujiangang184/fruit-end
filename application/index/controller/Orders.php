<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Orders extends Controller
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        checkToken();
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
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
     * 1.能否生成  total price goods（status）
     * 2.生成订单；待支付
     * 3.修改购物车
     *      3.1 删除购物车附表已下单的商品
     *      3.2 购物车主表 total 0 price 0
     */
    public function save(Request $request)
    {
        $uid=$this->request->id;
        $cartModel=model('Cartmodel');
        $cartInfo=$cartModel->queryone($uid);
        if (!$cartInfo){
            return json([
                'code'=>config('code.fail'),
                'msg'=>'不存在购物车'
            ]);
        }
        if ($cartInfo['total']==0){
            return json([
                'code'=>config('code.fail'),
                'msg'=>'请选择至少一件商品'
            ]);
        }

        $ordersModel=model('Ordersmodel');
        $ordersData=['uid'=>$uid];
         // 价格
        $ordersData['price']=$cartInfo['price'];
         //地址
        $ordersData['aid']=0;
         //订单号
        $ordersData['ordersnum']=time().mt_rand(0,10000);  //mt_rand 获取一个随机数
        // 订单状态
        $ordersData['status']=0;
        // 当前人的购物车，购物车里面选中的商品的信息
        $cartExtraModel=model('Cartextramodel');
        $selectGoods=$cartExtraModel->queryselectgoods(['uid'=>$uid,'status'=>1]);
        $selectGoods=json_encode($selectGoods);
        $ordersData['goods']=$selectGoods;

        Db::startTrans();

        $ordersResult=$ordersModel->insertOrders($ordersData);
        // 操作购物车
        $deleteGoodsResult= $cartExtraModel->deletegoods(['uid'=>$uid,'status'=>1]);
        $existGoods=$cartExtraModel->querygoods($uid);
        if ($existGoods){
            // 更新
            $cartResult=$cartModel->cartUpdate(['id'=>$uid],['total'=>0],['price'=>0]);
        }else{
            // 删除
            $cartResult=$cartModel->deleteCart(['id=>$uid']);
        }
        if ($ordersResult && $deleteGoodsResult && $cartResult){
            Db::commit();
            return json([
                'code' => config('code.success'),
                'msg' => "下单成功",
            ]);
        }else{
            Db::rollback();
            return json([
                'code' => config('code.fail'),
                'msg' => "下单失败",
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
