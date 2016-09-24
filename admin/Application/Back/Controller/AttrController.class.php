<?php 
namespace Back\Controller;
use Think\Controller;
class AttrController extends Controller{
    
    //添加
    public function add(){
      if(IS_POST){
          $m_attr=D('Back/attr');
          //create第二个参数1:添加2.修改
          
          if($m_attr->create(I('post.'),1)){
              if($m_attr->add()){
                $this->success('添加成功', U('lst',array('type_id'=>I('post.type_id'))));
                exit;                
              }
          }
          $this->error($m_attr->getError());
      }
      $this->display();   
    }
    
    //显示列表
    public function lst(){
        $m_attr=D('Back/attr');
        $data=$m_attr->search();
      
        $this->assign('data',$data['data']);
        #分页信息
       $this->assign('fpage',$data['fpage']);
       //所有类型
       $types=M('type')->select();
       $this->assign('types',$types);
        $this->display();
    }
    
    /**
     * 修改
     */
    public function edit(){
        $m_attr=D('Back/attr');
        if(IS_POST){
            if($m_attr->create(I('post.'),2)!==false){       
                if($m_attr->save()){
                    $this->success ('修改成功', U('lst'));
                    exit;
                }
            }
            $this->error($m_attr->getError());
        }
        $data=$m_attr->find(I('get.id'));
        /*******商品分类*******/
        $types=M('type')->select();
        $this->assign('types',$types);
        $this->assign('data',$data);
        $this->display();
        
    }
    
    /**
     * 删除
     */
    public function delete(){
        $m_attr=D('Back/attr');
        if($m_attr->delete(I('get.id')))
            $data=array('ok'=>1);
        else
            $data=array('ok'=>0);
        echo  json_encode($data);
    }
    
}
