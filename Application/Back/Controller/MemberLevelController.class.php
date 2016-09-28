<?php 
namespace Back\Controller;
use Base\Controller;
class MemberLevelController extends BaseController{
    
    //添加
    public function add(){
      if(IS_POST){
          $m_memberLevel=D('Back/memberLevel');
          //create第二个参数1:添加2.修改
          
          if($m_memberLevel->create(I('post.'),1)){
              if($m_memberLevel->add()){
                $this->success('添加成功', U('lst'));
                exit;                
              }
          }
          $this->error($m_memberLevel->getError());
      }
      $this->display();   
    }
    
    //显示列表
    public function lst(){
        $m_memberLevel=D('Back/memberLevel');
        $data=$m_memberLevel->search();
      
        $this->assign('data',$data['data']);
        #分页信息
       $this->assign('fpage',$data['fpage']);
        $this->display();
    }
    
    /**
     * 修改
     */
    public function edit(){
        $m_memberLevel=D('Back/memberLevel');
        if(IS_POST){
            if($m_memberLevel->create(I('post.'),2)){       
                if($m_memberLevel->save()){
                    $this->success ('修改成功', U('lst'));
                    exit;
                }
            }
            $this->error($m_memberLevel->getError());
        }
        $data=$m_memberLevel->find(I('get.id'));
        $this->assign('data',$data);
        $this->display();
        
    }
    
    /**
     * 删除
     */
    public function delete(){
        $m_memberLevel=D('Back/memberLevel');
        if($m_memberLevel->delete(I('get.id')))
            $data=array('ok'=>1);
        else
            $data=array('ok'=>0);
        echo  json_encode($data);
    }
    
}
