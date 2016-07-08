<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="js/common_tools.js"></script>
    <script type="text/javascript">


        function test(url){
            var arr=new Array();
            arr=splitURL(url);
            alert(arr['uri']);
            alert(arr['info']);
        }

        function test2(url){
            var num=url.indexOf("^");
            alert(num);
        }

        function test3(url){
            alert(getUrlId(url));
        }
    </script>
</head>
<body>

</body>
</html>

<?php

$url="./showcomment.php?&id=70";
$v1="v1";
$v2="v2";
$v3="v3";
$v4="v4";
$v5="v5";

echo <<<EOF
    <input id="test_id" type="button" value="test"
    onclick="test3('{$url}')"/>
EOF;


?>