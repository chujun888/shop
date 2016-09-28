<?php 
namespace Back\Model;
use Think\Model;
class   BrandModel extends Model{
    #添加时允许插入的字段
     protected $insertFields='brand_name,url';
    protected $updateFields='id,brand_name,url';
    #自动验证
     protected $_validate=array(
		 array('brand_name','require','品牌名称不能为空',1),
		 array('brand_name','0,50','品牌名称应小于50',0,'length'),
		 array('url','0,140','品牌官网应小于140',0,'length'),
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
