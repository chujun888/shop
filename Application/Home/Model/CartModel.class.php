<?php
namespace Home\Model;
use Think\Model;
class CartModel extends Model{
    protected $insertFields='goods_id,goods_num,attr_id,member_id,addtime';
    
    /**
     * 将cookie中购物车数据移入session
     *
     */
    public function moveData(){
        if($carts=cookie('carts')){
            $carts= unserialize($carts);
            foreach($carts as $k=>$v){
                //数据库中是否存在
                if($row=$this->where(array('member_id'=>session('m_id'),'goods_id'=>$v['goods_id'],'attr_id'=>$v['attr_id']))->find()){
                    $this->where("id={$row['id']}")->setInc('goods_num',$v['goods_num']);
                }
                //已经存在
                else{
                    $v['member_id']=session('m_id');
                    $this->add($v);
                }
            }
            
        }
    }
    
    /**
     * 获取购物车中的数据
     */
    public function getCarts(){
        $data=array();
        #登录
        if($m_id=session('m_id')){
            $data=$this->where(array('member_id'=>array('eq',$m_id)))->select();
        }
        #cookie
        else{
            if(cookie('carts')){
                $data=  unserialize(cookie('carts'));
            }
        }
        foreach($data as $k=>&$v){
            //取出 商品名字，sm_logo, 价格，属性
            $m_goods=D('Back/goods');
            $v['goods']=$m_goods->field('goods_name,sm_logo')->find($v['goods_id']);
            $v['goods']['price']=$m_goods->getPrice($v['goods_id']);
            //属性
            $m_attr=D('Back/GoodsAttr');
            $v['attrs']=$m_attr->field('b.attr_name,a.attr_value')->where(array('a.id'=>array('in',$v['attr_id'])))->alias('a')->join('__ATTR__ b on a.attr_id=b.id')->select();
        }
        return $data;
    }
    
    /**
     * 删除购物车中数据
     */
    public function delete($id,$attr){
          
        if($m_id=session('m_id')){
        
            if($this->where(array('goods_id'=>array('eq',$id),'attr_id'=>array('eq',$attr)))->delete())
                    return true;
            return false;
        }
        //cookie中删除
       
        $carts=  unserialize(cookie('carts'));
        foreach($carts as $k=>$v){
            if($v['goods_id']==$id && $v['attr_id']==$attr){
                //删除该元素
                unset($carts[$k]);
            }
        }
    
        cookie('carts',  serialize($carts));
        return true;
    }
    
    

    
    
    
}
