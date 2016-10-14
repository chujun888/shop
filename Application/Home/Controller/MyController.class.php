<?php
namespace Home\Controller;
use Think\Controller;
class MyController extends Controller{
    public function lst(){
        $m_cats=D('Back/Category');    
        $cats=$m_cats->getNest();
        $data=M('Order')->field("a.id,group_concat(c.sm_logo) sm_logo,a.shr_name,a.total_price,a.addtime,a.pay_statu  p,group_concat(c.id) goods_id")->where(array('a.member_id'=>array('eq',session('m_id'))))->alias('a')->join("__ORDER_GOODS__ as b on b.order_id=a.id")->join("__GOODS__  c on b.goods_id=c.id")->group("a.id")->select();
       
        $this->assign(array(
            'data'=>$data,
            'cats'=>$cats,
            'title'=>'我的订单',
            'style'=>array('home','order','cart'),
            'js'=>array('home'),
            'show'=>0,
        ));
        $this->display();
    }
}
