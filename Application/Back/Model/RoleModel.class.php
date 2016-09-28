<?php 
namespace Back\Model;
use Think\Model;
class   RoleModel extends Model{
    #添加时允许插入的字段
     protected $insertFields='role_name,role_describe';
    protected $updateFields='id,role_name,role_describe';
    #自动验证
     protected $_validate=array(
		 array('role_name','require','角色名称不能为空',1),
		 array('role_name','0,30','角色名称应小于30',0,'length'),
);

     //插入前钩子函数
     protected function _before_insert(&$data, $options) {
         parent::_before_insert($data, $options);
         
     }
     
     /**
      * 删除
      */
     protected function _before_delete($options) {
         parent::_before_delete($options);
         $id=$options['where']['id'];
         //删除权限
         $m_role_pri=M('rolePrivilege');
         $m_role_pri->where(array('role_id'=>array('eq',$id)))->delete();
     }
     
     /**
      * 插入后
      */
     protected  function _after_insert($data, $options) {
         parent::_after_insert($data, $options);
         $id=$data['id'];
         if($ids=I('post.pris')){
            $m_role_pri=M('rolePrivilege');
            foreach($ids as $k=>$v){
                $m_role_pri->add(array('role_id'=>$id,'privilege_id'=>$v));
            }
         }
     }
     

     
     /**
      * 
      */
          /**
      * 修改前钩字
      */
     protected function _before_update(&$data, $options){
       
         parent::_before_update($data, $options);
     
         $id=$options['where']['id'];
         $ids=I('post.pris');
         
         if($ids){
             $m_role_privilege=M('rolePrivilege');
             $m_role_privilege->where("role_id=$id")->delete();
             foreach($ids as $k=>$v)
            {
                 $m_role_privilege->add(array('role_id'=>$id,'privilege_id'=>$v));
                 
             }
         }
        
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
        $data=$this->where($where)->limit($offset,$per)->order("$way $order ")->select();
                return array('data'=>$data,'fpage'=>$fpage);
     }
     
          
     
     
  
}
