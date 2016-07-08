<?php
/*date_default_timezone_set("prc");
echo date('Y-m-d H:i:s');*/

?>

    <!DOCTYPE HTML>
    <html>
    <head>
        <meta charset="utf-8">
        <title>font</title>
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
        <meta name="author" content="@my_programmer">
        <style type="text/css">
            /*重置{*/
            *{ padding:0;margin:0;} img{border:0;} li{list-style:none;}
            /*}重置*/
            div{font-size:1.2em;}

        </style>
        <script type="text/javascript">

        </script>
    </head>
    <body>

    </body>
    </html>
<?php
require_once 'model/Fenye.class.php';
require_once 'model/SqlHelper.class.php';
$val="测试";
$sql="select * from usersdata where content like '%$val%' or title like '%$val%'";
echo $sql;
$sh=new SqlHelper();
$arr=$sh->execute_dql_arr($sql);

echo "<table>";

foreach($arr as $k=>$v){
    echo "<tr>";
    echo "<td>{$v['title']}</td>";
    if(mb_strlen($v['content'])>20){
        echo "<td>".mb_substr($v['content'],0,5)."</td>";
    }else{
        echo "<td>{$v['content']}</td>";
    }
    echo "</tr>";
}

echo "</table>";

/*echo '<pre>';
print_r($arr);
echo '</pre>';*/




?>