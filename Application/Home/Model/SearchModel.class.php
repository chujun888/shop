<?php
namespace Home\Model;

class SearchModel {
    /**
     * 获取商品搜索提交
     * @param $cat_id int 搜索的分类id
     * @param $ids string 搜索的商品字符串
     */
    public function getCondition($cat_id='',$ids=''){
        
        /*****获取该分类下所有商品****/
        if($cat_id){
            $m_cat=D('Back/Category');
            $ids=$m_cat->getGoods($cat_id);
            if(!$ids)
                return array();
        }
        else{
            if(!$ids)
                return array();
        }
        $data=array();
        /*****获取所有品牌******/
        $brands=M('brand')->alias('a')->join("__GOODS__ b on b.brand_id = a.id")->field('distinct a.id,a.brand_name')->where(array('b.id'=>array('in',$ids)))->select();
        $data['brands']=$brands;
        
        /*****获取价格 一共分6个段****/
        $m_goods=M('goods');
        $row=$m_goods->field("max(shop_price) max,min(shop_price) min")->where(array('id'=>array('in',$ids)))->find();
        $gap=ceil(($row['max']-$row['min'])/9);
        $row['max']>1000?$time=100:$time=10;
        
        $price=array();
        $start=0;$end=ceil(($row['min']+$gap)/$time)*$time-1;
        for($i=0;$i<9;$i++){
            $price[]="{$start}-$end";
            $start=$end+1;
            $end=ceil(($start+$gap)/$time)*$time-1;
            if($i==4)
                $end++;
        }
        $data['price']=$price;
        
        /****获取商品属性*****/
        $arr=M('goodsAttr')->alias('a')->join('__ATTR__ b on b.id=a.attr_id')->field("distinct a.attr_value,b.attr_name,b.id id")->where(array('a.goods_id'=>array('in',$ids)))->select();
        $attrs=array();
        foreach($arr as $k=>$v){
            $attrs[$v['attr_name'].'-'.$v['id']][]=$v['attr_value'];
        }
       $data['attrs']=$attrs;
       return $data;    
    }
    
    /**
     * 获取搜索得到的商品列表
     */
    public function search($cat_id='',$key=''){
        /****搜索条件****/
        //分类搜索分类下的商品
        if($cat_id){
            $m_cate=D('Back/Category');
            $cats=$m_cate->getGoods($cat_id);
             if(!$cats)
                return array();
          
        }
        $where['is_delete']=array('eq',0);
        $where['is_on_sale']=array('eq',1);
        //关键字搜索下
        if($key)
            $where['goods_name']=array('exp',"like '%$key%'");
        
        if($brand=I('get.brand'))
        {
            $brand=str_replace(strstr("$brand",'-'),'',$brand);
            $where['brand_id']=array('eq',$brand);
        
        }
        
        //价格
        if($price=I('get.price')){
            $price=  explode('-', $price);
            $where['shop_price']=array('between',array($price[0],$price[1]));
        }
        
        //属性 attr_5 = 操作系统-andriod
        $m_goods_attr=M('goodsAttr');
        foreach($_GET as $k=>$v){
           
           if(strpos($k, 'attr_')===0){ 
                $str=strstr($v,'-');
                $value=trim($str,'-');
                $id=  str_replace('attr_','',$k);
                $goods=$m_goods_attr->where("attr_id='$id' and attr_value='$value'")->field('group_concat(goods_id) ids')->find();
               
                if(!$goods){
                    //无商品，返回空数组
                    return array();
                }
                $goods= explode(',', $goods['ids']);
                
                //将该数组与之前的去交集
                if(!isset($arr)){
                    $arr=$goods;
                }
                else{
                    $arr=  array_intersect($goods, $arr);
                    if(!$arr)
                        return array();
                }
           }
        }
   
        //存在属性搜索与分类商品取交集
        if($cat_id){
            if($arr){
                $cats=  array_intersect($cats, $arr);
                if(!$cats)
                    return array();
            }
            $where['a.id']=array('in',$cats);
        }
        
        /******排序*****/
        $orderby="num_desc";
        if($get=I('get.orderby')){
            if(in_array($get,array('num_desc','num_asc','pri_desc','pri_asc','comment_desc','comment_asc','time_desc','time_asc',)))
             $orderby=$get;
            $orderby=str_replace('time','a.addtime', $orderby);  
            $orderby=str_replace('pri', 'price', $orderby);  
        }
        $orderby=  explode('_', $orderby);
        
        $m_goods=M('goods');
        //分页
        $row=$m_goods->field('count(*) total,group_concat(id) ids')->where($where)->alias('a')->find();
        $listrows=6;
        $page= new \Libs\Pagef($row['total'],$listrows);
        $fpage=$page->fpage();
         $cur=I('get.page',1);
         $offset=($cur-1)*$listrows;
         
        
        
        $data=$m_goods->field('sm_logo,a.id,goods_name,shop_price,count(b.order_id) num')->join("left join __ORDER_GOODS__ b on b.goods_id=a.id left join __ORDER__ c on b.order_id=c.id and c.pay_statu=1")->alias('a')->order("{$orderby[0]} {$orderby[1]}")->group('a.id')->where($where)->limit($offset,$listrows)->select();
         return array('fpage'=>$fpage,'data'=>$data,'ids'=>$row['ids']);   
        
     }
     
}
