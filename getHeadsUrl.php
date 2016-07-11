<?php
session_start();
if(empty($_SESSION['loginuser'])){
    die("找不到页面 404");
}
require_once './model/usersService.class.php';

$userv= new usersService();

$arr=$userv->getHeadsUrl($_SESSION['loginuser']);

echo $arr[0]['heads_url'];

?>
