<?php 
namespace Back\Model;
use Think\Model;
class   ManageModel extends Model{
    #添加时允许插入的字段
     protected $insertFields='admin_name,admin_pwd,is_use';
    protected $updateFields='id,admin_name,admin_pwd,is_use';
    #自动验证
     protected $_validate=array(
		 array('admin_name','require','管理员姓名不能为空',1),
		 array('admin_name','0,20','管理员姓名应小于20',0,'length'),
		 array('admin_pwd','require','密码md5加密不能为空',1),
		 array('admin_pwd','0,32','密码md5加密应小于32',0,'length'),
		 array('is_use','number','是否启用1：启用2：禁用必须是数字'),
);
     #自动完成
     protected $_auto=array(
      array('addtime','time','','function'),
      array('admin_pwd','md5','','function'),

 
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
