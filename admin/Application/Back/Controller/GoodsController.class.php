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
          //获取所有商品品牌
          $m_brand=D('Back/brand');
          $brands=$m_brand->field('id,brand_name')->select();
          $this->assign('brands',$brands);
          //取出所有会员价格
          $levels=M('memberLevel')->field('id,level_name')->select();
          $this->assign('levels',$levels);
          
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
                if($m_goods->save()!==false){
                    $this->success ('修改成功', U('lst'));
                    exit;
                }
                var_dump($flag);exit;
            }
            $this->error($m_goods->getError());
        }
        $id=I('get.id');
        $data=$m_goods->find($id);
        /*******会员价格********/
        $member=M('memberLevel');
        $levels=$member->alias('a')->field('a.id,a.level_name,b.youhui_price as price')->join("left join php34_youhui_price as b on a.id=b.youhui_num and b.goods_id=$id")->select();             
        $this->assign(array('levels'=>$levels));
        
        /*****商品图片******/
        $pics=M('pic')->where(array('goods_id'=>array('eq',$id)))->select();
        $this->assign('pics',$pics);
        
        $this->assign('data',$data);
        $this->display();
        
    }
    
    /**
     * 删除
     */
    public function delete(){
        $m_goods=D('Back/goods');
        if($m_goods->save(array('id'=>I('get.id'),'is_delete'=>1)))
            $data=array('ok'=>1);
        else
            $data=array('ok'=>0);
        echo  json_encode($data);
    }
    
    /**
     * ajax请求删除图片
     */
    public function ajaxDel(){
        $goods_id=I('get.goods_id');
        $id=I('get.id');
        $where['id']=array('eq',$id);
        $where['goods_id']=array('eq',$goods_id);
        if(M('pic')->where($where)->delete())
            echo json_encode (array('ok'=>1));
        else 
            echo json_encode (array('ok'=>0));
    }
    
}
