<?php 
namespace Back\Controller;
use Think\Controller;
class TypeController extends Controller{
    
    //添加
    public function add(){
      if(IS_POST){
          $m_type=D('Back/type');
          //create第二个参数1:添加2.修改
          
          if($m_type->create(I('post.'),1)){
              if($m_type->add()){
                $this->success('添加成功', U('lst'));
                exit;                
              }
          }
          $this->error($m_type->getError());
      }
      $this->display();   
    }
    
    //显示列表
    public function lst(){
        $m_type=D('Back/type');
        $data=$m_type->search();
      
        $this->assign('data',$data['data']);
        #分页信息
       $this->assign('fpage',$data['fpage']);
        $this->display();
    }
    
    /**
     * 修改
     */
    public function edit(){
        $m_type=D('Back/type');
        if(IS_POST){
            if($m_type->create(I('post.'),2)){       
                if($m_type->save()){
                    $this->success ('修改成功', U('lst'));
                    exit;
                }
            }
            $this->error($m_type->getError());
        }
        $data=$m_type->find(I('get.id'));
        $this->assign('data',$data);
        $this->display();
        
    }
    
    /**
     * 删除
     */
    public function delete(){
        $m_type=D('Back/type');
        if($m_type->delete(I('get.id')))
            $data=array('ok'=>1);
        else
            $data=array('ok'=>0);
        echo  json_encode($data);
    }
    
}
