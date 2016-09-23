<?php 
namespace Back\Controller;
use Think\Controller;
class CategoryController extends Controller{
    
    //添加
    public function add(){
      $m_category=D('Back/category');
      if(IS_POST){
         
          //create第二个参数1:添加2.修改
          
          if($m_category->create(I('post.'),1)){
              if($m_category->add()){
                $this->success('添加成功', U('lst'));
                exit;                
              }
          }
          $this->error($m_category->getError());
      }
      //获取所有商品分类，并树装展示
      $data=$m_category->getTree();
   
      $this->assign('data',$data);
      $this->display();   
    }
    
    //显示列表
    public function lst(){
        $m_category=D('Back/category');
        $data=$m_category->search();
        $this->assign('data',$data['data']);
        #分页信息
       $this->assign('fpage',$data['fpage']);
        $this->display();
    }
    
    /**
     * 修改
     */
    public function edit(){
        $m_category=D('Back/category');
        if(IS_POST){
            if($m_category->create(I('post.'),2)!==false){       
                if($m_category->save()){
                    $this->success ('修改成功', U('lst'));
                    exit;
                }
            }
            $this->error($m_category->getError());
        }
        $data=$m_category->find(I('get.id'));
        //取出所有分类所有信息
        $cats=$m_category->getTree();
        $this->assign('cats',$cats);
        //该类及所有子分类的id
        $children=$m_category->getChildren($data['id']);
        $children[]=$data['id'];
        
        $this->assign('children',$children);
        $this->assign('data',$data);
        $this->display();
        
    }
    
    /**
     * 删除
     */
    public function delete(){
        $m_category=D('Back/category');
        $children=$m_category->getChildren(I('get.id'));
        if($m_category->delete(I('get.id')))
            $data=array('ok'=>1,'len'=>count($children));
        else
            $data=array('ok'=>0);
        echo  json_encode($data);
    }
    
}
