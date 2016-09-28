<?php 
namespace Back\Model;
use Think\Model;
class   AttrModel extends Model{
    #添加时允许插入的字段
     protected $insertFields='attr_name,attr_type,attr_option_value,type_id,sele';
    protected $updateFields='id,attr_name,attr_type,attr_option_value,type_id,sele';
    #自动验证
     protected $_validate=array(
		 array('attr_name','require','属性名称不能为空',1),
		 array('attr_name','0,30','属性名称应小于30',0,'length'),
		 array('attr_option_value','0,150','可选值：多个用,分开应小于150',0,'length'),
		 array('type_id','require','所属类型不能为空',1),
		 array('type_id','number','所属类型必须是数字'),
		 array('sele','number','必须是数字'),
);
     #自动完成
     protected $_auto=array(
      array('addtime','time','','function'),

 
     );
     //插入前钩子函数
     protected function _before_insert(&$data, $options) {
         parent::_before_insert($data, $options);
         //，替换,
         $value=$data['attr_option_value'];
         $data['attr_option_value']=  str_replace('，', ',', $value);
     }
     
     /**
      * 修改前钩字
      */
     protected function _before_update(&$data, $options) {
         parent::_before_update($data, $options);
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
        #商品类型
        $where['type_id']=array('eq',I('get.type_id'));
        /*****分页*****/
        #总记录数
        $count=$this->where($where)->count();
        #获取分页信息 total per 
        $page=new \Libs\Page($count,$per);
        #分页角标
        $offset=(I('get.page',1)-1)*$per;
        $fpage=$page->fpage();        
        $data=$this->where($where)->limit($offset,$per)->order("$way $order ")->select();
        return array('data'=>$data,'fpage'=>$fpage);
     }
     
     
     
  
}
