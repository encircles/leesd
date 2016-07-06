<?php
require_once '../model/ctService.class.php';
require_once '../model/ct.class.php';
date_default_timezone_set("PRC");

if(empty($_POST['id'])){
    die("参数不完整");
}
$id=$_POST['id'];
if(empty($_POST['uid'])){
    die("参数不完整");
}
$uid=$_POST['uid'];
if(empty($_POST['sender'])){
    die("参数不完整");
}
$sender=$_POST['sender'];
if(empty($_POST['receiver'])){
    die("参数不完整");
}
$receiver=$_POST['receiver'];
if(empty($_POST['content'])){
    die("参数不完整");
}
$content=$_POST['content'];
$time=date('Y-m-d H:i:s');

$ct=new ct($id,$uid,$sender,$receiver,$content,$time);
$ctserv=new ctService();

$ctserv->addComment($ct);


?>
