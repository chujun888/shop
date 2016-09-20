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
      * 获取数据
      * @return $data array $data['data']数据信息 $data['fpage'] 分页信息
      */
     public function search($is_delete=0,$per=10){
        $where=array();
        $where['is_delete']=array('eq',$is_delete);
        #总记录数
        $count=$this->count();
        #获取分页信息 total per pa 
        $page=new \Libs\Page($count,$per);
        
        $fpage=$page->fpage();
        
        $data=$this->where($where)->select();
        return array('data'=>$data,'fpage'=>$fpage);
     }
     
     
     
  
}
