<?php
require_once '../model/udService.class.php';

$udserv=new udService();

if(!isset($_POST['title'])){
    die('user title not define');
}
if(!isset($_POST['name'])){
    die('user name not define');
}
if(!isset($_POST['content'])){
    die('user content not define');
}
$title=$_POST['title'];
if(empty($title)){
    die('title is empty');
}
$name=$_POST['name'];
if(empty($name)){
    die('name is empty');
}
$content=$_POST['content'];
if(empty($content)){
    die('content is empty');
}
$nowtime=$_POST['nowtime'];
if(empty($nowtime)){
    $nowtime="无法获取时间";
}

$b=$udserv->addContent($name,$title,$content,$nowtime);
if($b==1){
    header("Location:../index.php?msg=addok");
    exit();
}else{
    echo '没有行受印象';
}
?>
