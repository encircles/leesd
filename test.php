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

        window.onload=function(){
            showpage('./test.php');
        };

        function addcontent(n){

            var div_id="content"+n;
            var content=document.getElementById(div_id).innerHTML;
            var ta=document.getElementById("commentText");
            var str="@"+content+" ";
            var b=ta.value.search(str);
            if(b==-1){
                ta.value=ta.value+str;
            }
            ta.focus();

        }

        function test(){
            var tastr=document.getElementById("commentText").value;
            var info="info="+tastr;
            var xhr=new XMLHttpRequest();
            xhr.onreadystatechange=function(){
                if(xhr.readyState==4){
                    document.getElementById("show").innerHTML=xhr.responseText;
                }
            };
            xhr.open("post","./test3.php");
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
            xhr.send(info);
        }

        function showpage(url){
            var xhr=new XMLHttpRequest();
            xhr.onreadystatechange=function(){
                if(xhr.readyState==4){
                    document.getElementById("showdiv").innerHTML=xhr.responseText;
                }
            };
            xhr.open('get',url);
            xhr.send(null);
        }



    </script>
</head>
<body>

</body>
</html>
<?php
require_once 'model/Fenye.class.php';
require_once 'model/ctService.class.php';

$ctserv=new ctService();
$fenye=new Fenye();

if(!empty($_GET['page'])){
    $fenye->setPageNow($_GET['page']);
}else{
    $fenye->setPageNow(1);
}

$fenye->setPageSize(3);
$ctserv->getCommentAFP($fenye,70);
$res_arr=$fenye->getResArray();


echo "<div id='showdiv'>";

echo "<table>";

foreach($res_arr as $k=>$value){
    echo "<tr>";
    foreach($value as $k=>$v){
        echo "<td>$v</td>";
    }
    echo "</tr>";
}





echo "</table>";
echo $fenye->getNavigate();
echo "</div>";




?>