<?php
namespace Home\Model;
use Think\Model;
class OrderModel extends Model{
    protected  $insertFields='shr_name,shr_tel,shr_pro,shr_city,shr_arae,shr_address';
    protected $_validate=array(
        array('shr_name','require','收货人不能为空',1),
        array('shr_name','require','省份不能为空',1),
        array('shr_city','require','城市不能为空',1),
        array('shr_arae','require','地区不能为空',1),
        array('shr_tel','number','电话必须是数字',1),
        array('shr_tel','11','电话格式11位',1,'length'),
        
        array('shr_address','5,100','详细地址不能少于5个字符',1,'length')
    );
    
    /**
     * 从购物车中添加订单,检查库存，减少库存，生成订单，生成商品订单
     */
    protected function _before_insert(&$data,$options){
        
        $data['member_id']=session('m_id');
        $data['addtime']=time();
        
        //获取购物车列表
        $m_cart=D('Home/Cart');
        $carts=$m_cart->getCarts();
        //购物车无商品
        if(!$carts){
            $this->error='购物车内无商品';
            return false;
        }
        //订单总价
        $data['total_price']=$carts['total'];
        //文件锁防止并发下单
        $lock=fopen('/Public/nlock','r');
        flock($lock, LOCK_EX);
        //检查库存
        $m_goods_number=M('GoodsNumber');
        header('content-type:text/html;charset=utf-8');
        $cart=$carts['data'];
        foreach($cart as $k=>$v){
           
            //如果存在库存设置则修改，未设置库存则不考虑
            if(($row1=$m_goods_number->where(array('goods_id'=>array('eq',$v['goods_id']),'goods_attr_id'=>array('eq',$v['attr_id'])))->find())||($row2=$m_goods_number->where(array('goods_id'=>array('eq',$v['goods_id']),'goods_attr_id'=>array('eq',$v['goods_attr_id'])))->find())){
                $row=$row1?$row1:$row2;
               
                if($row['goods_number']-$v['goods_num']<0){
                    $goods=M('goods')->field('goods_name')->find($v['goods_id']);
                    $this->error=$goods['goods_name'].'的库存不足,剩余'.$row['goods_number'].'个';
                    
                    return false;
                }
            }          
        }
        flock($lock, LOCK_UN);
        fclose($lock);
        //开启事务
         $this->startTrans();
        //1.减库存
        foreach($cart as $k=>$v){
            if($flag=$m_goods_number->execute("update __GOODS_NUMBER__ set goods_number=goods_number-{$v['goods_num']} where goods_id={$v['goods_id']}  and (goods_attr_id='{$v['attr_id']}' or goods_attr_id='{$v['goods_id']}')")){
                if(!$flag)
                {
                    $this->rollback();
                    $this->error='修改库存失败';return false;
                }
            }
        }
        
    }
    
    /**
     * 插入后
     */
    protected  function _after_insert($data, $options) {
       parent::_after_insert($data, $options);
        /*****添加商品订单表******/
        $m_order_goods=M('OrderGoods');
        $id=$data['id'];
        $m_id=$data['member_id'];
        $m_cart=D('Home/Cart');
        $carts=$m_cart->getCarts();$cart=$carts['data'];
        foreach($cart as $k=>$v){
            $flag=$m_order_goods->add(array('order_id'=>$id,'member_id'=>$m_id,'goods_id'=>$v['goods_id'],'attr_id'=>$v['attr_id'],'goods_num'=>$v['goods_num'],'price'=>$v['goods']['price']));
        
            if(!$flag){
                $this->error='商品订单生成错误';
                $this->rollback ();
                return false;
            }
        }
        //清空购物车
       $m_cart->where(array('member_id'=>array('eq',$m_id)))->delete();
       $this->commit();
       return $id;
    }
    
    /**
     * 设置订单支付成功后的状态
     */
    public function setPaid($order_id){
        /**
         * 1.pay_status =1
         * 2.会员积分增加
         */
        $m_id=session('m_id');
        $this->where("id=$order_id")->setField('pay_statu',1);
        $row=$this->field('total_price')->find($order_id);
        $total=$row['total_price'];
        $m_member=M('Member');
        $m_member->where("id=$m_id")->setInc('jifen',$total);
        $m_member->where("id=$m_id")->setInc('jyz',$total);
        
    }
}

