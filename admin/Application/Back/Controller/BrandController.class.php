<?php 
namespace Back\Controller;
use Base\Controller;
class BrandController extends BaseController{
    
    //添加
    public function add(){
      if(IS_POST){
          $m_brand=D('Back/brand');
          //create第二个参数1:添加2.修改
          
          if($m_brand->create(I('post.'),1)){
              if($m_brand->add()){
                $this->success('添加成功', U('lst'));
                exit;                
              }
          }
          $this->error($m_brand->getError());
      }
      $this->display();   
    }
    
    //显示列表
    public function lst(){
        $m_brand=D('Back/brand');
        $data=$m_brand->search();
      
        $this->assign('data',$data['data']);
        #分页信息
       $this->assign('fpage',$data['fpage']);
        $this->display();
    }
    
    /**
     * 修改
     */
    public function edit(){
        $m_brand=D('Back/brand');
        if(IS_POST){
            if($m_brand->create(I('post.'),2)){       
                if($m_brand->save()){
                    $this->success ('修改成功', U('lst'));
                    exit;
                }
            }
            $this->error($m_brand->getError());
        }
        $data=$m_brand->find(I('get.id'));
        $this->assign('data',$data);
        $this->display();
        
    }
    
    /**
     * 删除
     */
    public function delete(){
        $m_brand=D('Back/brand');
        if($m_brand->delete(I('get.id')))
            $data=array('ok'=>1);
        else
            $data=array('ok'=>0);
        echo  json_encode($data);
    }
    
}
