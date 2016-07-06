<?php
date_default_timezone_set("prc");
echo date('Y-m-d H:i:s');

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


    </script>
</head>
<body>
<a id="content1" onclick="addcontent(1)" href="javascript:">123</a>
<a id="content2" onclick="addcontent(2)" href="javascript:">33</a>
<textarea id="commentText" class="commentText" rows="1" draggable="false">
</textarea><br/>
<input class="conmentBt" type="button" value="回复" onclick="test()"/>
<div id="show"></div>
</body>
</html>
<?php

echo "test";

?>