<?php 
namespace Back\Controller;
use Base\Controller;
class PrivilegeController extends BaseController{
    
    //添加
    public function add(){
      if(IS_POST){
          $m_privilege=D('Back/privilege');
          //create第二个参数1:添加2.修改
          //循环插入权限
          $name=$this->getArr(I('post.pri_name'));
          $controller=I('post.controller_name');
          $action=$this->getArr(I('post.action_name'));
          $module=I('post.module_name');
          foreach($name as $k=>$v){
                $flag=$m_privilege->add(array('parent_id'=>I('post.parent_id'),'is_show'=>I('post.is_show'),'module_name'=>$module,'controller_name'=>$controller,'pri_name'=>$v,'action_name'=>isset($action[$k])?$action[$k]:''));
                if(!$flag){
                    $this->error($m_privilege->getError());
                    exit;
                }
          }
          $this->success('权限添加成功', U('lst'));
          exit;
          
      }
      //获取所有权限
      $m_pri=D('Back/Privilege');
    
      $data=$m_pri->getTree();
      $this->assign('data',$data);
      
      $this->display();   
    }
    
    //将，替换成,并转化成数组
    public function getArr($str){
        $str=  str_replace('，', ',', $str);
        $arr=  explode(',', $str);
        return $arr;
        
    }
    
    //显示列表
    public function lst(){
         $m_privilege=D('Back/privilege');   
       // $data=$m_privilege->search();
         $data=$m_privilege->getNest();
        $this->assign('data',$data);
        #分页信息
      
        $this->display();
    }
    
    /**
     * 修改
     */
    public function edit(){
        $m_privilege=D('Back/privilege');
        if(IS_POST){
            if($m_privilege->create(I('post.'),2)!==false){       
                if($m_privilege->save()){
                    $this->success ('修改成功', U('lst'));
                    exit;
                }
            }
            $this->error($m_privilege->getError());
        }
        $data=$m_privilege->find(I('get.id'));
        //获取当前权限的子集权限
        $child=$m_privilege->getChildren($data['id']);
        $child[]=I('get.id');
        //所有权限
        $privileges=$m_privilege->where(array('id'=>array('not in',$child)))->select();
        $privileges=$m_privilege->getTree($privileges);
        $this->assign('pris',$privileges);
        
        $this->assign('data',$data);
        $this->display();
        
    }
    
    /**
     * 删除
     */
    public function delete(){
        $m_privilege=D('Back/privilege');
        $id=I('get.id');
        //获取子权限
        $child=$m_privilege->getChildren($id);
        $child[]=$id;
       
        if($m_privilege->where(array('id'=>array('in',$child)))->delete()){
            $this->success('删除成功',U('lst'));
            exit;
        }
        
    }
    
    /**
     * ajax修改是否显示
     */
    public function ajaxShow(){
        $m_priv=D('Back/privilege');
        $id=I('get.id');
        $row=$m_priv->find($id);
        if($row['is_show']){
            if($m_priv->save(array('id'=>$id,'is_show'=>0))){
                echo json_encode(array('ok'=>'no'));
                exit;
            }
        }
        else{
              if($m_priv->save(array('id'=>$id,'is_show'=>1))){
                echo json_encode(array('ok'=>'yes'));
                exit;
            }
        }
    }
    
}
