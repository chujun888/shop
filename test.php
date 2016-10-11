<?php
 if($_POST){ 
     //不限连接超时时间
     set_time_limit(0);
    $curl=  curl_init();   
    //获取curl请求
    function get($url){
        global $curl;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        $str=  curl_exec($curl);
        return $str;
    }
    
    preg_match_all('/<a href="(.*)" title="/',get($_POST['url']),$arr);
    echo '<table><th>公司名称</th><th>公司行业</th><th>公司地址</th><th>联系人</th><th>联系电话</th><th>公司网站</th>';
    //从详情页取出数据
    foreach($arr[1] as $k=>$v){
        echo '<tr>';
        $web="http://www.ntqyw.com/".$v;
        
        $str=get($web);
        preg_match('/line-height:35px">(.*)</',$str,$comp_name);//公司名称
        echo "<td>{$comp_name[1]}</td>";
        preg_match_all('/height="30" style="border-bottom:#CCCCCC dotted 1px">(.*)</',$str,$res);
         echo "<td>{$res[1][0]}</td>";
         echo "<td>{$res[1][2]}</td>";
         echo "<td>{$res[1][3]}</td>";
         echo "<td>{$res[1][5]}</td>";
         echo "<td>{$res[1][6]}</td>";
        echo '</tr>';
        
    }
    echo '</table>';
 }
?>
<html>
    <body>
        <form action="" method="post">
            <input type="text" name="url">
            <input type="submit" value='get'/>
        </form>
    </body>
</html>

