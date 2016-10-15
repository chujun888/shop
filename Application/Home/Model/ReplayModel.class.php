<?php
namespace Home\Model;
use Think\Model;
class ReplayModel extends Model{
    //允许插入的字段
    protected $insertFields="content,comment_id,member_id";
    //表单验证
    protected $_validate=array(
        array('content','require','内容不能为空',1),
        array('member_id','require','请登录',1),    
    );
    protected function _before_insert(&$data, $options) {
        parent::_before_insert($data, $options);
        $data['addtime']=date('Y-m-d H:i:s');
    }
  
}

