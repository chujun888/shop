<?php
namespace  Home\Controller;
use Think\Controller;
class SearchController extends Controller{
    public function cat(){
        /**搜索结果**/
         $m_search=D('Home/search');
        $result=$m_search->search(I('get.id'));
        $page=$result['fpage'];
        $result=$result['data'];
        
        
        /**搜索条件**/
       
        $condition=$m_search->getCondition(I('get.id'));
        //面包屑导航
        $sup=D('Back/Category')->getSup(I('get.id'));
        
       
        

        
        /**分类列表**/
        if(!$cats=S('cats')){
            $m_cart=D('Back/Category');
            $cats=$m_cart->getNest();
            S('cats',$cats);
        }
       
        $this->assign(array(
            'sup'=>$sup,
            'fpage'=>$page,
            'result'=>$result,
            'data'=>$condition,
            'cats'=>$cats,
            'title'=>'商品列表页',
            'style'=>array('list','common'),
            'js'=>array('list'),
        ));
        $this->display();
    }
    
    /**
     * 根据关键字搜索
     * 
     */
    public function key(){
        $m_search=D('Home/Search');
        /**搜索结果**/
        $resu=$m_search->search('',I('get.val'));
        $page=$resu['fpage'];
        $result=$resu['data'];
        
          /**搜索条件**/
         
        
        $condition=$m_search->getCondition('',$resu['ids']);
    
            
        /**分类列表**/
        if(!$cats=S('cats')){
            $m_cart=D('Back/Category');
            $cats=$m_cart->getNest();
            S('cats',$cats);
        }
       
        $this->assign(array(
            'sup'=>$sup,
            'fpage'=>$page,
            'result'=>$result,
            'data'=>$condition,
            'cats'=>$cats,
            'title'=>'商品列表页',
            'style'=>array('list','common'),
            'js'=>array('list'),
        ));
        $this->display();
    }
    
}
