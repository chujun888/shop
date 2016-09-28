<?php 
namespace Back\Model;
use Think\Model;
class   ManageModel extends Model{
    #添加时允许插入的字段
     protected $insertFields='admin_name,admin_pwd,is_use,re_admin_pwd,role_id';
    protected $updateFields='id,admin_name,admin_pwd,is_use,re_admin_pwd,role_id';
    #自动验证
     protected $_validate=array(
		 array('admin_name','require','管理员姓名不能为空',1),
		 array('admin_name','0,20','管理员姓名应小于20',0,'length'),
		 array('admin_pwd','require','密码不能为空',1,'regex',1),
		 array('admin_pwd','0,32','密码应小于32',0,'length'),
		 array('re_admin_pwd','admin_pwd','确认密码不正确',1,'confirm'),
);
     #自动完成
     protected $_auto=array(
        array('admin_pwd','md5',3,'function'), 
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
         if(empty($data['admin_pwd']))
             unset($data['admin_pwd']);
     }
     
     protected  function _before_delete($options) {
         parent::_before_delete($options);
         $id=$options['where']['id'];
         if($id==1)
             return false;
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
        $count=$this->where($where)->count();
        #获取分页信息 total per pa 
        $page=new \Libs\Page($count,$per);
        $offset=(I('get.page',1)-1)*$per;
        $fpage=$page->fpage();        
        $data=$this->where($where)->limit($offset,$per)->order("$way $order ")->alias('a')->join('left join __ROLE__ b on b.id=a.role_id')->field('a.*,b.role_name')->select();
                return array('data'=>$data,'fpage'=>$fpage);
     }
     
          
     
     
  
}
