<?php
namespace Home\Controller;
use Think\Controller;
class CommentController extends Controller{
    public function add(){
        $m_comment=D('Home/Comment');
        if($m_comment->create(I('post.'))){
            if($id=$m_comment->add()){
                $row=$m_comment->alias('a')->join('__MEMBER__ b on b.id=a.member_id')->field('a.*,b.user')->where("a.id=$id")->find();
                echo json_encode(array('status'=>1,'info'=>$row));
                
            }
        }
        else{
            $this->error($m_comment->getError(),'',FALSE);
        }
    }
    public function lst(){
        $m_comment=D('Home/Comment');
        $data=$m_comment->search(I('get.goods_id'));
       
        echo json_encode($data);
        
    }
    /**
     * ajax回复
     */
    public function replay(){
        $value=I('get.value');
        $id=I('get.id');
        //添加评论
        $data=array('content'=>$value,'comment_id'=>$id,'member_id'=>session('m_id'));
        $m_replay=D('Home/Replay');
        if($m_replay->create($data)){
            if($id=$m_replay->add($data)){
                $row=$m_replay->join("__MEMBER__ b on b.id=a.member_id")->field("a.*,b.user")->alias('a')->where("a.id=$id")->find();
                echo json_encode($row);
            }
        }
        else{
            $this->error($m_replay->getError(),'',false);
        }
        
    }
}

