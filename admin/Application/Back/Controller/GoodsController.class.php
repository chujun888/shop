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
        $m_goods=D('Back/Goods');
        $data=$m_goods->search();
      
        $this->assign('data',$data['data']);
        #分页信息
       $this->assign('fpage',$data['fpage']);
        $this->display();
    }
    
    /**
     * 修改
     */
    public function edit(){
        $m_goods=D('Back/goods');
        if(IS_POST){
            if($m_goods->create(I('post.'),2)){       
                if($m_goods->save()){
                    $this->success ('修改成功', U('lst'));
                    exit;
                }
            }
            $this->error($m_goods->getError());
        }
        $data=$m_goods->find(I('get.id'));
        $this->assign('data',$data);
        $this->display();
        
    }
    
    /**
     * 删除
     */
    public function delete(){
        $m_goods=D('Back/goods');
        if($m_goods->delete(I('get.id')))
            $data=array('ok'=>1);
        else
            $data=array('ok'=>0);
        echo  json_encode($data);
    }
    
}
