<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends Controller{
    
    /**
     * 订单清单页
     */
    
    public function lst(){
        $m_cart=D('Home/Cart');
         //未登录跳转到登录页面
        if(!$m_id=session('m_id')){
            session('return','order/lst');
            header('location:/login.html');
        }
        $carts=$m_cart->getCarts();
        if(!$carts){
            $this->error('购物车中无商品','',1);
        }
        
        $this->assign(array(
            'data'=>$carts['data'],
            'total'=>$carts['total'],
            'style'=>array('fillin'),
            'js'=>array('cart2'),
            'title'=>'填写核对订单信息'
        ));
        $this->display();
    }
    
    /**
     * 添加订单
     */
    public function add(){
        //未登录跳转到登录页面
        if(!$m_id=session('m_id')){
            session('return','order/lst');
            header('location:/login.html');
        }
        $m_order=D('Home/Order');
        //添加订单成功
        if($m_order->create(I('post.'))){
            if($id=$m_order->add()){
        
            $this->redirect('success',array('id'=>$id));
            }
                    
             
        }
            $this->error($m_order->getError(),'',2);
            exit;
                
    }
    
    /**
     * 订单生成成功
     */
    public function success(){
        $order_id=I('get.id');
        $pay=alipay($order);
        $this->assign(array(
            'pay'=>$pay,
            'title'=>'成功提交订单',
            'style'=>array('success','cart'),
     
        ));
        
        $this->display();
    }
    
    /**
     * 订单支付后接受消息
     */
    public function receive(){
        $m=D('Home/Order');
       
        require C('INCLUDE_PATH').'notify_url.php';
    }
}
