<?php

echo $_POST['info']."<br/>";


function test($str){
    $at=strpos($str,"@");
    $k=strpos($str," ");
    $r=$k-$at;
    echo "at=".$at."--k=".$k."<br/>";
    echo mb_substr($str,$at,$r+1);


    /*$t=$at+strlen($s);
    echo mb_substr($str,$t);
    $b=strstr($str,"@33 ");*/
//echo strlen($s);
}

test($_POST['info']);


