<?php 
namespace Back\Model;
use Think\Model;
class   CategoryModel extends Model{
    #添加时允许插入的字段
     protected $insertFields='cat_name,parent_id,cat_desc,sort_order,unit,is_show,filter_attr_id';
    protected $updateFields='id,cat_name,parent_id,cat_desc,sort_order,unit,is_show,filter_attr_id';
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
     
     
     
  
}
