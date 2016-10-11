<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller{
   /**
    * 购物车添加商品
    */
    public function add(){
         if(IS_POST){
              $attrs=I('post.attr');
                #将属性装换为排序字符串
                if($attrs){
                   sort($attrs);
                   $attrs=  implode(',', $attrs);
                }
             //添加数据
             $data=array('goods_id'=>I('post.id'),'attr_id'=>$attrs,'goods_num'=>I('post.goods_num'),'addtime'=>time());
             
             //添加商品到购物车 登录-》数据库  |   cookie
             if($m_id=session('m_id')){
                 $m_cart=D('Home/Cart');
                
                 $data['member_id']=$m_id;
                 //数据库中是否存在
                 if($row=$m_cart->where(array('goods_id'=>I('post.id'),'attr_id'=>$attrs,'member_id'=>$m_id))->find()){
                    $m_cart->where("id={$row['id']}")->setInc('goods_num',I('post.goods_num'));
                      $this->redirect('lst');
                      exit;
                 }
                 else{
                    if($m_cart->add($data)){
                        $this->redirect('lst');
                        exit;
                    }
                 }   
                     $this->error('添加失败');
                     exit;
                 
             }
             //商品添加到cookie
             else{
                 $arr=  cookie('carts')?unserialize(cookie('carts')):array();
                 //该商品类型已经存在
                 $flag=false;
                 foreach($arr as $k=>&$v){
                   
                     if($v['goods_id']==I('post.id') && $v['attr_id']==$attrs){
                         $v['goods_num']+=I('post.goods_num');
                         $flag=true;
                     }
                 }
               
                 if(!$flag){
                       $arr[]=$data;
                 }           
                 cookie('carts',  serialize($arr));
                 $this->redirect('lst');
             }
         }
    }
    
    /**
     * 购物车展示
     */
    public function lst(){
       $m_cart = D('Home/Cart');
       $data= $m_cart -> getCarts();
      
        $this->assign(
             array(
                 'data'=>$data['data'],
                 'total'=>$data['total'],
                 'title'=>'购物车页面',
                 'style'=>array('cart'),
                 'js'=>array('cart1')
             )
        );
        $this->display();
    }
    
    public function ajaxDelete(){
        $m_cart=D('Home/Cart');
       $attr=I('get.attr');
   
        if($m_cart->del(I('get.id'),$attr)){
            echo json_encode(array('ok'=>1));
        }
        else
            echo json_encode (array('ok'=>0));
        
    }
    
    /**
     * ajax获取购物车列表
     */
    public function ajaxCartList(){
        $data=D('Home/Cart')->getCarts();
       
        echo json_encode($data);
    }
    
    /**
     * ajax修改购物车数量
     */
    public function ajaxChange(){
        $m_cart=D('Home/Cart');
       $m_cart->change(I('get.id'),I('get.val'));
       
    }
    
}
