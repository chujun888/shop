<?php
 if($_POST){ 
     //�������ӳ�ʱʱ��
     set_time_limit(0);
    $curl=  curl_init();   
    //��ȡcurl����
    function get($url){
        global $curl;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        $str=  curl_exec($curl);
        return $str;
    }
    
    preg_match_all('/<a href="(.*)" title="/',get($_POST['url']),$arr);
    echo '<table><th>��˾����</th><th>��˾��ҵ</th><th>��˾��ַ</th><th>��ϵ��</th><th>��ϵ�绰</th><th>��˾��վ</th>';
    //������ҳȡ������
    foreach($arr[1] as $k=>$v){
        echo '<tr>';
        $web="http://www.ntqyw.com/".$v;
        
        $str=get($web);
        preg_match('/line-height:35px">(.*)</',$str,$comp_name);//��˾����
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

