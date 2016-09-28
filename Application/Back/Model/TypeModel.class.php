<?php 
namespace Back\Model;
use Think\Model;
class   TypeModel extends Model{
    #添加时允许插入的字段
     protected $insertFields='type_name';
    protected $updateFields='id,type_name';
    #自动验证
     protected $_validate=array(
		 array('type_name','require','不能为空',1),
		 array('type_name','0,30','应小于30',0,'length'),
);
     #自动完成
     protected $_auto=array(
      array('addtime','time','','function'),

 
     );
     //插入前钩子函数
     protected function _before_insert(&$data, $options) {
         parent::_before_insert($data, $options);
     }
     
     /**
      * 修改前钩字
      */
     protected function _before_update(&$data, $options) {
         parent::_before_update($data, $options);
     }
     
     /**
      * 删除前钩子
      */
     protected function _before_delete($options) {
         parent::_before_delete($options);
         //删除该分类下的属性
         $id=$options['where']['id'];
         M('Attr')->where(array('type_id'=>array('eq',$id)))->delete();
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
        #获取分页信息 total per pa 
        $page=new \Libs\Page($count,$per);
        
        $fpage=$page->fpage();        
        $data=$this->where($where)->order("$way $order ")->select();
        return array('data'=>$data,'fpage'=>$fpage);
     }
     
     
     
  
}
