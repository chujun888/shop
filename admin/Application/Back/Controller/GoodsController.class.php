<?php
namespace Back\Controller;
use Think\Controller;
class GoodsController extends Controller{
    
    //添加
    public function add(){
      if(IS_POST){
          $m_goods=D('Back/goods');
          //create第二个参数1:添加2.修改
          
          if($m_goods->create(I('post.'),1)){
              if($m_goods->add()){
                $this->success('添加成功', U('lst'));
                exit;
                
              }
          }
          $this->error($m_goods->getError());
      }
      $this->display();   
    }
    
    //显示列表
    public function lst(){
        $this->display();
    }
    
}
