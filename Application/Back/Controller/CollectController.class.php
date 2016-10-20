<?php
namespace Back\Controller;
use Think\Controller;
class CollectController extends Controller{
    private $curl;
    
    public function getGoods(){
        
        if(IS_POST){
            //设置超期时间
            set_time_limit(0);
             if((!$url=I('post.url')) && (!$cat_id=I('post.cat_id'))){
                 $this->error('请输入网址和分类','',1);
                 exit;
             }
            
             $curl=  curl_init();
             $this->curl=$curl;
             //获取网址内容
             $str=$this->getCurl($url);
             //匹配列表中的一个商品 U 取消贪婪匹配  s包含换行
             $preg_all='/data-img="1"(.*)<i class="promo-words"/sU';
             //列表中的单个商品
             //$preg_xi='/(src="(.*)".*href="(.*)".*<em>(.*)<|data-lazy-img="(.*)".*href="(.*)".*<em>(.*)<)/sU';
             $preg_xi='/(src="|data-lazy-img=")(.*)".*href="(.*)".*<em>(.*)</sU';
             //商品详情页的图片信息
             $preg_xiang="/src='(.*)'/sU";
             preg_match_all($preg_all,$str,$preg_one);
             
             //商品模型
             $m_goods=M('goods');
             $m_pic=M('pic');
             //循环读取每个商品的信息
             foreach($preg_one[1] as $k=>$v){
                 if($k<21){
                    preg_match($preg_xi, $v, $xi);              
                    $code=uniqid();
                    $date=  date('Y-m-d');
                    //生成商品logo
                    //商品文件夹
                    if(!is_dir(C('UPLOAD_PATH').'Goods/'.$date)){
                        mkdir(C('UPLOAD_PATH').'Goods/'.$date);
                    }
                    $logo='Goods/'.$date."/{$code}.jpg";
                    $sm_logo='Goods/'.$date."/sm_{$code}.jpg";
                    $data['logo']=$logo;
                    file_put_contents(C('UPLOAD_PATH').$logo, $this->getCurl("http:".$xi[2]));
                    $data['goods_name']=$xi[4];
                    //请求商品地址获得商品图片
                    preg_match($preg_xiang, $this->getCurl('http:'.$xi[3]),$res);
                    file_put_contents(C('UPLOAD_PATH').$sm_logo, $this->getCurl("http:".$res[1]));
                    $data['sm_logo']=$sm_logo;
                    $data['addtime']=time();
                    $data['cat_id']=I('post.cat_id');
                    $id=$m_goods->add($data);
                    file_get_contents(C('SITE')."index.php/index/goods/id/$id");
                    sleep(3);
                 }
                 
             }
             exit;
            
        }
        //获取所有分类的树状展示
        $m_cat=D('Back/Category');
        $cats=$m_cat->getTree();
        $this->assign('cats',$cats);
        $this->display();
    }
    /**
     * 初始化curl
     */
    public function getCurl($url){
        $curl=$this->curl;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
        curl_setopt($curl, CURLOPT_HEADER,false);
        return curl_exec($curl);
    }
    
}
