<?php
class GoodsController extends BaseController{
	public function addAction(){
                if($_POST){
                   $m=new Model('goods');
                  $m->insert($_POST);
                  //插入的id
                  $last_id=$m->_dao->getId();
                  //生成静态页面
                  ob_start();
                  $this->listAction($last_id);
                  $str=ob_get_clean();
                  ob_end_clean();
                  $file_name= uniqid('goods_').'.html';  
                  $static_url=$file_name;
                  file_put_contents(CUR_WEB_PATH.'Static/'.$file_name, $str);
                  $flag=$m->save(array('id'=>$last_id,'static_url'=>$static_url));
                  echo $str;
                  exit;
                      
                }
		$m=new Model('goods');
               
		require VIEW_PATH.'add.html';
	}
        public function listAction($id=''){
            if(isset($_GET['id']))
                $id=$_GET['id'];
            $m=new Model('goods');
            $row=$m->select($id);         
            require VIEW_PATH.'list.html';
        }
}