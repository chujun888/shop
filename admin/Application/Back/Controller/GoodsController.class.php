<?php
namespace Back\Controller;
use Base\Controller;
class GoodsController extends BaseController{
    
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
          //取出所有商品分类
          $cats=D('Back/Category')->getTree();
          $this->assign('cats',$cats);
          //取出所有类型
          $types=D('Back/Type')->select();
          $this->assign('types',$types);
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
               
            }
            $this->error($m_goods->getError());
        }      
        
        $id=I('get.id');
        //取出所有商品类型
        $types=M('type')->select();
        $this->assign('types',$types);
        
        $data=$m_goods->find($id);
        //取出所有的商品属性
        $attrs=M('attr')->field("a.*,b.*,a.id a_id")->where("type_id={$data['type_id']}")->alias('a')->join("left join __GOODS_ATTR__ b on b.attr_id = a.id")->having("b.goods_id=$id or b.goods_id IS NULL")->select();
       
        $this->assign('attrs',$attrs);
        
       
        
        /*******会员价格********/
        $member=M('memberLevel');
        $levels=$member->alias('a')->field('a.id,a.level_name,b.youhui_price as price')->join("left join php34_youhui_price as b on a.id=b.youhui_num and b.goods_id=$id")->select();             
        $this->assign(array('levels'=>$levels));
        
        /*****商品图片******/
        $pics=M('pic')->where(array('goods_id'=>array('eq',$id)))->select();
        $this->assign('pics',$pics);
        
        /*****商品分类******/
        $cats=D('Back/Category')->getTree();
        $this->assign('cats',$cats);
        
        /****获取扩展分类****/
        $ext=M('extCat');
        $exts=$ext->where(array('goods_id'=>array('eq',I('get.id'))))->select();
        
        $this->assign('exts',$exts);
        $this->assign('data',$data);
        $this->display();
        
    }
    
    /**
     * 放入回收站
     */
    public function recycle(){
        $m_goods=D('Back/goods');
       if($m_goods->save(array('id'=>I('get.id'),'is_delete'=>1))!==false)
           $data=array('ok'=>1);
        else
            $data=array('ok'=>0);
        echo  json_encode($data);
    }
    
    /**
     * 商品库存
     */
    public function goodsNumber(){
       if($_POST){
           /*****插入库存数量******/
           $id=I('post.id');
         $goods_number=M('goodsNumber');
         //删除
         $goods_number->where(array('goods_id'=>array('eq',$id)))->delete();
         if($number=I('post.number')){
             foreach($number as $k=>$v){
                 $k=trim($k,"'");
                 if($v)
                 $goods_number->add(array('goods_id'=>$id,'goods_attr_id'=>$k,'goods_number'=>$v));
             }
         }
         $this->success('库存修改成功',U('lst'));
         exit;
       }
        //获取商品下不止一个属性的商品属性
        $attrs=M('goodsAttr')->field('group_concat(a.id) ids,group_concat(a.attr_value) attr_value,b.attr_name')->where(array('goods_id'=>array('eq',I('get.id'))))->alias('a')->join('__ATTR__ b on b.id=a.attr_id')->group('a.attr_id')->having("count(*)>1")->select();
        //整理得 array(array(array(1,2,3),array('1','2','3'),'attr_name));
        $arr=array();
        foreach($attrs as $k=>$v){
            $arr1=array();
            $ids=  explode(',', $v['ids']);
            $values=explode(',',$v['attr_value']);
            foreach($ids as $k1=>$v1){
                $arr1[]=array('id'=>$v1,'value'=>$values[$k1],'attr_name'=>$v['attr_name']);        
            }
           $arr[$k]=$arr1;
        }
        $arr=$this->getDcar($arr); 
        //取出已有数据
        $goods_number=M('goodsNumber');   
        $res=$goods_number->where(array('goods_id'=>array('eq',I('get.id'))))->select();
        $arr_1=array();
        foreach($res as $k=>$v){
           $arr_1[$v['goods_attr_id']]=$v['goods_number']; 
        }
       
        $this->assign('res',$arr_1);
        
        $this->assign('data',$arr);
        $this->display();
    }
    
    /**
     * 获取数组的笛卡尔积
     */
    function getDcar($data){
       
        $count=count($data);
        $result=$data[0];
       
        for($i=1;$i<$count;$i++){
            $result=$this->getTwo($result, $data[$i]);
        }
       
        return $result;
    }
    
    /**
     * 获取两个数组的笛卡尔积
     */
    function getTwo($one,$two){
        $result=array();
      
        foreach($one as $k=>$v){
            foreach($two as $k1=>$v1){
                $result[]=array($v,$v1);
            }
        } 
        return $result;
    }
    
    /**
     * 删除商品
     */
    public function delete(){
        $m_goods=D('Back/Goods');
        if($m_goods->delete(I('get.id'))!==false){
            $this->success('删除成功',U('lst'));
            exit;
        }
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
    
    /**
     * ajax请求获取属性
     */
    function ajaxAttr(){
        $attr=D('Back/Attr')->where(array('type_id'=>array('eq',I('get.type_id'))))->select();
        echo json_encode($attr);
    }
    
}
