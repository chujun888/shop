<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller{
    public function Index(){
          $m_cats=D('Back/Category');
        $cats=S('cats');
        if(!$cats){
          
            $cats=$m_cats->getNest();
        }
        $promotes=$m_cats->getPromote();
        $best=$m_cats->getSelect('is_best');
        $new=$m_cats->getSelect('is_new');
        $hot=$m_cats->getSelect('is_hot');
        //获取推荐楼层
        $floor=$m_cats->getFloor();

        $this->assign(array(
            'floor'=>$floor,
           'promotes'=>$promotes,
            'best'=>$best,
            'new'=>$new,
            'host'=>$hot,
        ));
        $this->assign('cats',$cats);
        $this->assign('title','首页');
        $this->display();
    }
}
