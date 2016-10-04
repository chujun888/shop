<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller{
    public function Index(){
          $m_cats=D('Back/Category');
       
          
            $cats=$m_cats->getNest();
       
        $promotes=$m_cats->getPromote();
        $best=$m_cats->getSelect('is_best');
        $new=$m_cats->getSelect('is_new');
        $hot=$m_cats->getSelect('is_hot');
        //获取推荐楼层
        $floor=$m_cats->getFloor();

        $this->assign(array(
            'floor'=>$floor,
           'promotes'=>$promotes,
            'best'=>$best,
            'new'=>$new,
            'host'=>$hot,
            'show'=>1,
            'js'=>array('index'),
            'style'=>array('index'),
        ));
        $this->assign('cats',$cats);
        $this->assign('title','首页');
        $this->display();
    }
    public function goods(){
        $data=M('goods')->find(I('get.id'));
        $id=I('get.id');
        
        //获取商品属性
        $attr_unique=M('goodsAttr')->field('a.id,a.attr_value,b.attr_name')->where(array('b.attr_type'=>array('eq',0),'a.goods_id'=>array('eq',$id)))->alias('a')->join('__ATTR__ b on b.id=a.attr_id')->select();
        $arr=M('goodsAttr')->where(array('b.attr_type'=>array('eq',1),'a.goods_id'=>array('eq',$id)))->alias('a')->field('a.id,b.attr_name,b.id attr_id,a.attr_value')->join('__ATTR__ b on b.id=a.attr_id')->select();
        $atrrs=array();
        foreach($arr as $k=>$v){
            if(!isset($attrs[$v['attr_name']]))
                $attrs[$v['attr_name']]=array();
            $attrs[$v['attr_name']][]=$v;
        }
     
        //获取商品图片
        $pics=M('pic')->where(array('goods_id'=>array('eq',I('get.id'))))->select();
      
        //获取面包屑导航信息
        $m_cats=D('Back/Category');
        $mianbao=$m_cats->getSup($data['cat_id']);
    
       $mianbao= array_reverse($mianbao);    
         
        //导航条信息
        $cats=$m_cats->getNest();
       
        $this->assign(
        array(
            'attr_unique'=>$attr_unique,
            'attrs'=>$attrs,
            'pics'=>$pics,
            'cats'=>$cats,
            'data'=>$data,
            'mianbao'=>$mianbao,
            'show'=>0,
            'title'=>'商品详情',
            'js'=>array('goods','jqzoom-core'),
            'style'=>array('common','goods','qzoom'),
        )        
        );
        $this->display();
    }
    
    /**
     * 获取最近浏览的记录
     */
    public function  ajaxRecent(){
        if($recent=cookie('recent')){
            $recent=unserialize($recent);
            $data=M('goods')->field('sm_logo,goods_name,id')->where(array('id'=>array('in',$recent)))->select();
        
        }
        else 
         {
            $data=array();
            
         }
        echo json_encode($data);
    }
    
    /**
     * 设置最近浏览的记录
     */
    public function ajaxSetRecent(){
          /********将浏览历史存到cookie中*******/
        //添加浏览记录到最近浏览
        $recent=  cookie('recent')?unserialize(cookie('recent')):array();
        
        array_unshift($recent, I('get.id'));
        //去重
        $recent=array_unique($recent);
        if(count($recent)>6)
            $recent=  array_slice($recent, 0,6);
        
        cookie('recent',  serialize($recent),84600);
        /************/
    }
    

    /**
     * 获取最新的价格
     */
    public function ajaxPrice(){
        $goods_id=I('get.id');
       
        $m_goods=D('Back/Goods');
        echo $m_goods->getPrice($goods_id);
     
    }
    
    /**
     * 获取登录状态
     */
    public function ajaxLogin(){
        if(session('m_id')){
            echo json_encode(array('ok'=>1,'user'=>session('m_user'),'id'=>session('m_id')));
        }
        else{
            echo json_encode(array('ok'=>0));
        }
    }
    
    /**
     * 退出登录
     */
    public function logout(){
        session('m_id',null);
        session('m_user',null);
        session('m_level',null);
        header('location:/login.html');
    }
}
