<?php
require_once './model/ctService.class.php';

if(empty($_GET['id'])){
    die("参数不完整");
}
$id=$_GET['id'];

$ctserv=new ctService();
echo $ctserv->getCommentCount($id);
?>
