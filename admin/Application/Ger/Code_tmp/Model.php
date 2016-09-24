namespace Back\Model;
use Think\Model;
class   <?=$config['TPName']?>Model extends Model{
    #添加时允许插入的字段
     protected $insertFields='<?=$config['insertField']?>';
    protected $updateFields='<?=$config['updateField']?>';
    #自动验证
     protected $_validate=<?=$config['validate']?>;
     #自动完成
     protected $_auto=array(
      array('addtime','time','','function'),
<?php 
foreach($config[fields] as $k=>$v): if($v['type']=='password'):?>
      array('<?=$v['text']?>','md5','','function'),
<?php endif;?>
<?php endforeach;?>

 
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
        $way='<?=$config['_pk']?>';
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
