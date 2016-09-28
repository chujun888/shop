<?php 
namespace Back\Controller;
use Base\Controller;
class RoleController extends BaseController{
    
    //添加
    public function add(){
      if(IS_POST){
          
          $m_role=D('Back/role');
          //create第二个参数1:添加2.修改
          
          if($m_role->create(I('post.'),1)){
              if($m_role->add()){
                $this->success('添加成功', U('lst'));
                exit;                
              }
          }
          $this->error($m_role->getError());
      }
      //取出所有权限
      $pris=D('Back/Privilege')->getNest();
      $this->assign('pris', $pris);
      
      $this->display();   
    }
    
    //显示列表
    public function lst(){
        $m_role=D('Back/role');
        $data=$m_role->search();
      
        $this->assign('data',$data['data']);
        #分页信息
       $this->assign('fpage',$data['fpage']);
        $this->display();
    }
    
    /**
     * 修改
     */
    public function edit(){
        $m_role=D('Back/role');
        if(IS_POST){
            if($m_role->create(I('post.'),2)){
                if($m_role->save()!==false){
                    $this->success('修改成功',U('lst'));
                    exit;
                }
            }
            $this->error($m_role->getError());
            exit;
        }
        
        
        $data=$m_role->find(I('get.id'));
        $this->assign('data',$data);
        //取出所有权限
        $pris=D('Back/Privilege')->getNest();
        $this->assign('pris',$pris);
        //获取添加的权限
        $ids=M('rolePrivilege')->where(array('role_id'=>array('eq',$data['id'])))->select();
        $arr=array();
        foreach($ids as $k=>$v){
            $arr[]=$v['privilege_id'];
        }
     
        $this->assign('ids',$arr);
        $this->display();
        
    }
    
    /**
     * 删除
     */
    public function delete(){
        $m_role=D('Back/role');
        if($m_role->delete(I('get.id')))
        {
            $this->success('删除成功',U('lst'));
            exit;
        }
        else{
            $this->error($m_role->getError());
        }
    }
    
}
