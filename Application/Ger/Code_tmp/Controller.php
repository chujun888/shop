namespace Back\Controller;
use Think\Controller;
class <?php echo $config['TPName'];?>Controller extends Controller{
    
    //添加
    public function add(){
      if(IS_POST){
          $m_<?=$config['tpName']?>=D('Back/<?=$config['tpName']?>');
          //create第二个参数1:添加2.修改
          
          if($m_<?=$config['tpName']?>->create(I('post.'),1)){
              if($m_<?=$config['tpName']?>->add()){
                $this->success('添加成功', U('lst'));
                exit;                
              }
          }
          $this->error($m_<?=$config['tpName']?>->getError());
      }
      $this->display();   
    }
    
    //显示列表
    public function lst(){
        $m_<?=$config['tpName']?>=D('Back/<?=$config['tpName']?>');
        $data=$m_<?=$config['tpName']?>->search();
      
        $this->assign('data',$data['data']);
        #分页信息
       $this->assign('fpage',$data['fpage']);
        $this->display();
    }
    
    /**
     * 修改
     */
    public function edit(){
        $m_<?=$config['tpName']?>=D('Back/<?=$config['tpName']?>');
        if(IS_POST){
            if($m_<?=$config['tpName']?>->create(I('post.'),2)!==false){       
                if($m_<?=$config['tpName']?>->save()){
                    $this->success ('修改成功', U('lst'));
                    exit;
                }
            }
            $this->error($m_<?=$config['tpName']?>->getError());
        }
        $data=$m_<?=$config['tpName']?>->find(I('get.id'));
        $this->assign('data',$data);
        $this->display();
        
    }
    
    /**
     * 删除
     */
    public function delete(){
        $m_<?=$config['tpName']?>=D('Back/<?=$config['tpName']?>');
        if($m_<?=$config['tpName']?>->delete(I('get.<?=$config['_pk']?>')))
            $data=array('ok'=>1);
        else
            $data=array('ok'=>0);
        echo  json_encode($data);
    }
    
}
