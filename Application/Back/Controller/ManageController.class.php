<?php 
namespace Back\Controller;
use Base\Controller;
class ManageController extends BaseController{
    
    //添加
    public function add(){
      if(IS_POST){
          $m_manage=D('Back/manage');
          //create第二个参数1:添加2.修改      
          if($m_manage->create(I('post.'),1)){
              if($m_manage->add()){
                $this->success('添加成功', U('lst'));
                exit;                
              }
          }
          $this->error($m_manage->getError());
      }
      //取出所有角色
      $roles=M('role')->select();
      $this->assign('roles',$roles);
      
      $this->display();   
    }
    
    //显示列表
    public function lst(){
        $m_manage=D('Back/manage');
        $data=$m_manage->search();
      
        $this->assign('data',$data['data']);
        #分页信息
       $this->assign('fpage',$data['fpage']);
        $this->display();
    }
    
    /**
     * 修改
     */
    public function edit(){
        $m_manage=D('Back/manage');
        if(IS_POST){
            if($m_manage->create(I('post.'),2)!==false){       
                if($m_manage->save()){
                    $this->success ('修改成功', U('lst'));
                    exit;
                }
            }
            $this->error($m_manage->getError());
        }
        //获取所有角色
        $roles=D('Back/role')->select();
        $this->assign('roles',$roles);
        
        $data=$m_manage->find(I('get.id'));
        $this->assign('data',$data);
        $this->display();
        
    }
    
    /**
     * 删除
     */
    public function delete(){
        $m_manage=D('Back/manage');
        if($m_manage->delete(I('get.id')))
            $data=array('ok'=>1);
        else
            $data=array('ok'=>0);
        echo  json_encode($data);
    }
    
}
