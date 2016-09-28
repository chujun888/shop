<?php 
namespace Back\Model;
use Think\Model;
class   PrivilegeModel extends Model{
    #添加时允许插入的字段
     protected $insertFields='pri_name,parent_id,module_name,controller_name,action_name,is_show';
    protected $updateFields='id,pri_name,parent_id,module_name,controller_name,action_name,is_show';
    #自动验证
     protected $_validate=array(
		 array('pri_name','require','权限名称不能为空',1),
		 array('pri_name','0,32','权限名称应小于32',0,'length'),
		 array('parent_id','number','上级权限的ID 0：代表顶级权限必须是数字'),
		
		 array('module_name','0,32','模块名称应小于32',0,'length'),
	
		 array('controller_name','0,32','控制器名称应小于32',0,'length'),
		 
		 array('action_name','0,32','动作名称应小于32',0,'length'),
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
     
           /**
      * 数据树装排列
      */
     public function getTree($data=array()){
         if(empty($data))
            $data=$this->field('id,pri_name,parent_id')->select();
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
     
     
          
     
     
  
}
