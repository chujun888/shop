<?php
namespace Back\Model;
use Think\Model;
class GoodsModel extends Model{
    #添加时允许插入的字段
     protected $insertFields='goods_name,cat_id,brand_id,shop_price,market_price,jifen,jyz,jifen_price,is_promote,promote_price,promote_start_time,promote_end_time,is_on_sale,is_new,is_best,is_delete,type_id,seo_keyword,seo_desc,goods_desc,sort_num';
    // protected $updateFields='id,goods_name,cat_id,brand_id,shop_price,market_price,jifen,jyz,jifen_price,is_promote,promote_price,promote_start_time,promote_end_time,is_on_sale,is_new,is_best,is_delete,type_id,seo_keyword,seo_desc,goods_desc,sort_num';
    #自动验证
     protected $_validate=array(
         //验证字段 验证规则 提示信息 合适验证1:必须0:存在验证就验证 2：不为空才验证
         array('goods_name','require','商品名不能为空',1),
        
         array('shop_price','number','请输入数字',2)
     );
     
     //插入前钩子函数
     protected function _before_insert(&$data, $options) {
         parent::_before_insert($data, $options);
         //生成时间
         $data['addtime']=time();
         //过滤goods_desc
         $data['goods_desc']=  removeXSS($_POST['goods_desc']);
         //上传正确
         if($_FILES['logo']['error']==0){
             $upload=new \Think\Upload();
             $upload->rootPath='./Uploads/';
             $upload->savePath='Goods/';
             //$upload->saveName=array('uniqid', 'goods_');
             //上传文件
             $info=$upload->uploadOne($_FILES['logo']);
             if($info){
                 $data['logo']=$info['savepath'].$info['savename'];
                 //上传缩略图
                 $image=new \Think\Image();
                 $image->open('./Uploads/'.$data['logo']);                
                 $image->thumb(200, 200)->save('./Uploads/'.$info['savepath'].'sm_'.$info['savename']);
                 $data['sm_logo']=$info['savepath'].'sm_'.$info['savename'];
             }
             else{
                $this->error=$upload->getError();
                return false;
             }
         }
     }
     
     /**
      * 修改前钩字
      */
     protected function _before_update(&$data, $options) {
         parent::_before_update($data, $options);
         #图片
         if($_FILES['logo']['error']==0){
             $res=uploadOne($_FILES['logo']);
             if(!isset($res['error'])){
                 $data['logo']=$res['logo'];
                 $data['sm_logo']=$res['sm_logo'];
             }
             else{
                 $this->error=$res['error'];
                 return false;
             }
             //删除原来的文件
             $res=$this->field('logo,sm_logo')->find($options['id']);
             unlink(C('UPLOAD_PATH').$res['logo']);
             unlink(C('UPLOAD_PATH').$res['sm_logo']);
                 
         }
     }
     
     
     /**
      * 获取数据
      * @return $data array $data['data']数据信息 $data['fpage'] 分页信息
      */
     public function search($is_delete=0,$per=10){
        $where=array();
        #新品 热销 精品
        if($is_how=I('post.is_how'))
            $where[$is_how]=array('eq',1);
        #关键字
        if($keyword=I('post.keyword'))
            $where['goods_name']=array('like',"%$keyword%");
        #是否上架       
        $is_on_sale=I('post.is_on_sale',-1);
        if($is_on_sale!=-1)
             $where['is_on_sale']=$is_on_sale;
        #是否删除
        $where['is_delete']=array('eq',$is_delete);
        #总记录数
        $count=$this->count();
        #获取分页信息 total per pa 
        $page=new \Libs\Page($count,$per);
        
        $fpage=$page->fpage();
        
        $data=$this->where($where)->select();
        return array('data'=>$data,'fpage'=>$fpage);
     }
     
     
     
  
}
