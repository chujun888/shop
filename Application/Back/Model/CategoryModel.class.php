<?php 
namespace Back\Model;
use Think\Model;
class   CategoryModel extends Model{
    #添加时允许插入的字段
     protected $insertFields='cat_name,parent_id,cat_desc,sort_order,unit,is_show,filter_attr_id,is_floor';
    protected $updateFields='id,cat_name,parent_id,cat_desc,sort_order,unit,is_show,filter_attr_id,is_floor';
    #自动验证
     protected $_validate=array(
		 array('cat_name','0,30','商品类别名称应小于30',0,'length'),
		 array('parent_id','number','商品类别父ID必须是数字'),
		 array('cat_desc','0,255','商品类别描述应小于255',0,'length'),		
		 array('is_show','number','是否显示，默认显示必须是数字'),
		
);
     #自动完成
     protected $_auto=array(
      array('addtime','time','','function'),

 
     );
     
      /**
      * 获取嵌套展示
      * 
      */
     public function getNest($data=array()){
         if(empty($data)){
             $data=$this->select();
         }
         return $this->_getNest($data);
     }
     
     public function _getNest($data,$pid=0){
         //存放数据
         
         $arr=array();
        
         foreach($data as $k=>$v){
             if($v['parent_id']==$pid)
             {
               
                 $v['children']=$this->_getNest($data,$v['id']);
                 $arr[]=$v;
             }
         }
         return $arr;
     }
     
     /**
      * 数据树装排列
      */
     public function getTree($data=array()){
         if(empty($data))
            $data=$this->field('id,cat_name,parent_id')->select();
          return $this->_getTree($data);
     }
     
     private function _getTree($data,$id=0,$level=0){
         //存储排序好的数组
         static $arr=array();
         foreach($data as $k=>$v){
             if($v['parent_id']==$id){      
                 $v['level']=$level;
                 $arr[]=$v;
                 $this->_getTree($data, $v['id'], $level+1);         
             }
         }
         return $arr;
     }
     
     /**
      * 获取子类ID
      * @param $Id int int
      * @param $data array 筛选的数据
      */
     function getChildren($id,$data=array())
     {
         //所有数据
         if(empty($data))
             $data=$this->select ();
         return $this->_getChildren($id,$data);
     }
     
     private function _getChildren($id,$data){
        static $arr=array();
        foreach($data as $k=>$v){
           if($v['parent_id']==$id){
               $arr[]=$v['id'];
               $this->_getChildren($v['id'], $data);
           }  
        }
        return $arr;
     }
     
     //插入前钩子函数
     protected function _before_insert(&$data, $options) {
         parent::_before_insert($data, $options);
     }
     
     /**
      * 修改前钩字
      */
     protected function _before_update(&$data, $options) {
         parent::_before_update($data, $options);
         //获取该分类的所有子分类，该分类父类不能是子分类
     }
     
     /**
      * 删除前
      */
     protected function _before_delete($data, $options) {
         parent::_before_delete($data, $options);
         //删除所有子分类
        $children=$this->getChildren($options['where']['id']);
         $options['where']['id']=array('IN',  implode(',', $children));
     }


     /**
      * 获取数据
      * @return $data array $data['data']数据信息 $data['fpage'] 分页信息
      */
     public function search($per=10){
        /*****条件*****/
        $where=array();
       
        /*****排序*****/
        #排序对象
        $way='id';
        if(I('get.way'))
           $way=I('get.way');
        #排序升降
        $order='desc';
        if(I('get.order'))
            $order=I('get.order');
         /*****分页*****/
        #总记录数
        $count=$this->count();
        #获取分页信息 total
        $page=new \Libs\Page($count,$per);
        
        $fpage=$page->fpage();
        //获取商品分类
        $data=$this->where($where)->order("$way $order ")->select();
        //获取树状分布
        $data=$this->getTree($data);
        return array('data'=>$data,'fpage'=>$fpage);
     }
     
     /**
      * 获取促销商品
      */
     public function getPromote(){
        $date= strtotime(date('Y-m-d H:i'));
        $where['is_promote']=array('eq',1);
        $where['promote_start_time']=array('lt',$date);
        $where['promote_end_time']=array('gt',$date);
        $goods=M('goods')->field('promote_price,goods_name,promote_price,sm_logo,id')->where($where)->order('id desc')->limit(4)->select();
        return $goods;
        
     }
     
     /**
      * 获取热，最佳，最新商品
      */
     public function getSelect($way){
         $where[$way]=array('eq',1);
         $where['is_on_sale']=array('eq',1);
         $goods=M('goods')->field('shop_price,sm_logo,goods_name,id')->where($where)->order('id desc')->limit(4)->select();
         return $goods;
     }
     
      /**
      * 获取分类及其上级分类
      */
     public function getSup($cat_id){
      
         static $arr=array();//存放所有分类id和名称
         $row=$this->field('id,cat_name,parent_id')->find($cat_id);
         $arr[]=$row;
         if($row['parent_id']>0){
            $this->getSup($row['parent_id']);
         }
         return $arr;
     }
     
     /**
      * 获取推荐楼层
      */
     public function getFloor(){
     
       
      
            $cats=$this->select();
            $m_goods=M('goods');
            //搜索商品条件
            $where['is_on_sale']=1;
            //推荐数据
            $arr=array();
            foreach($cats as $k=>$v){
                if($v['parent_id']==0 && $v['is_floor']==1){
                     $v['rec_cat']=array();
                        $v['unrec_cat']=array();
                    //获取下级推荐不推荐分类
                    foreach($cats as $k1=>$v1){
                        //推荐分类
                       
                        if($v1['parent_id']==$v['id']){
                            if($v1['is_floor']==1){
                                //获取当前分类的8个商品
                                $where['cat_id']=$v1['id'];
                                $goods=$m_goods->field('goods_name,shop_price,sm_logo,id')->where($where)->limit(8)->select();
                                $v1['goods']=$goods;
                                $v['rec_cat'][]=$v1;
                            }
                            //不推荐分类
                           else
                                $v['unrec_cat'][]=$v1;
                        }
                        
                        
                    }
                    $where['cat_id']=$v['id'];
                    $goods=$m_goods->field('goods_name,shop_price,sm_logo,id')->where($where)->limit(8)->select();
                    $v['goods']=$goods;
                    $v['brand']=$this->getBrand($v['id']);
                    $arr[]=$v;
                }
                 
         
         }
         return $arr;
     }
     
     /**
      * 根据分类，获取分类下的品牌信息
      * @param $cat_id int 获取的分类Id
      */
     public function getBrand($cat_id){
         $children=D('Back/Category')->getChildren($cat_id);
         $children[]=$cat_id;
         $brands=M('goods')->alias('a')->join('__BRAND__ as b on b.id=a.brand_id')->field('distinct b.logo,b.id,b.brand_name')->where(array('a.cat_id'=>array('in',$children)))->select();
         return $brands;
     }
     
     
  
}
