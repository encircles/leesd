<?php
session_start();
require_once '../model/udService.class.php';
require_once '../model/usersService.class.php';

if(empty($_REQUEST['id'])){
    die("参数错误");
}
$id=$_REQUEST['id'];
if(empty($_REQUEST['type'])){
    die("参数错误");
}
$type=$_REQUEST['type'];

$udserv=new udService();
$usersservice=new usersService();

$b=null;

if($type=="add"){
    $b=$udserv->addHeart($id,1);
    $usersservice->addLikes($_SESSION['UID'],$id);
}else if($type=="reduce"){
    $b=$udserv->addHeart($id,-1);
    $usersservice->reduceLikes($_SESSION['UID'],$id);
}

if($b==1){
    $arr=$udserv->getHeart($id);
    echo $arr[0]['hearts'];
}

?>
