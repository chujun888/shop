<?php 
namespace Back\Model;
use Think\Model;
class   MemberLevelModel extends Model{
    #添加时允许插入的字段
     protected $insertFields='level_name,bottom_num,top_num,rate';
    protected $updateFields='id,level_name,bottom_num,top_num,rate';
    #自动验证
     protected $_validate=array(
		 array('level_name','require','级别名称不能为空',1),
		 array('level_name','0,30','级别名称应小于30',0,'length'),
		 array('bottom_num','require','积分下线不能为空',1),
		 array('bottom_num','number','积分下线必须是数字'),
		 array('top_num','require','积分下限不能为空',1),
		 array('top_num','number','积分下限必须是数字'),
		 array('rate','number','必须是数字'),
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
        /*****条件*****/
        $where=array();
        $where['is_delete']=array('eq',$is_delete);
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
