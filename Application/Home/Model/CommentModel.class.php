<?php
namespace Home\Model;
use Think\Model;
class CommentModel extends Model{
    //允许插入的字段
    protected $insertFields="content,star,goods_id,impress";
    //表单验证
    protected $_validate=array(
        array('content','require','内容不能为空',1),
        array('star','require','评分不能为空',1),    
    );
    
    /**
     * 插入前
     */
    protected function _before_insert(&$data, $options) {
        parent::_before_insert($data, $options);
        $goods_id=$data['goods_id'];
        $data['addtime']=date('Y-m-d H:i:s');
        $data['member_id']=session('m_id');
        //插入印象
        $impress=I('post.impress');
        $m_impress=M('impression');
        $impress= trim(str_replace('，', ',', $impress));
        $impress=  explode(',', $impress);
        foreach($impress as $k=>$v){
            //如果印象名称已经存在加一
            if($row=$m_impress->where("imp_name='$v' and goods_id=$goods_id")->find()){
                $m_impress->where("id={$row['id']}")->setInc('imp_count',1);
            }
            else{
                $m_impress->add(array('imp_name'=>$v,'goods_id'=>$goods_id));
            }
        }
        
    }
    
    //取出商品评论数据
    public function search($goods_id=''){
         $listrows=5;
        //取出ajax的所有数据
        $page=I('get.page',1);
        if($page==1){
            //商品所有的评论信息
            $row=$this->where(array('goods_id'=>array('eq',$goods_id)))->field('id,star')->select();
            $count=count($row);
            $good=0;$cha=0;$zhong=0;
            foreach($row as $k=>$v){
                if($v['star']==3)
                    $zhong++;
                else if($v['star']<3)
                    $cha++;
                else
                    $good++;
            }
            $zhong=ceil(($zhong/$count)*100);
            $cha=ceil(($cha/$count)*100);
            $good=ceil(($good/$count)*100);
            //取出所有的印象
            $impress=M('impression')->where(array('goods_id'=>array('eq',$goods_id)))->field('id,imp_name,imp_count')->select();
           
            $page=new \Libs\PageAjax($count,$listrows);
            $fpage=$page->fpage();
            $data['fpage']=$fpage;$data['zhong']=$zhong;$data['cha']=$cha;$data['good']=$good;$data['impress']=$impress;     
        }
        //获取当前分页下的数据
        $offset=($page-1)*$listrows;
        $res=$this->where(array('goods_id'=>array('eq',$goods_id)))->field('a.*,b.user')->alias('a')->join('__MEMBER__ b on b.id=a.member_id')->limit("$offset,$listrows")->select();
        //获取评论对应的回复
        $m_replay=M('replay');
        foreach($res as $k=>$v){
            $result=$m_replay->where("comment_id={$v['id']}")->field()->join("__MEMBER__ b on b.id=a.member_id")->field('b.user,a.*')->alias('a')->select();
            $res[$k]['total']=  count($result);
            $res[$k]['replay']=$result;
        }
        $data['res']=$res;
        return $data;
    }
}

