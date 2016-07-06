<?php
session_start();
require_once '../model/usersService.class.php';


//验证码
if(empty($_POST['checkCode'])){
    header("Location:../login.php?msg=5");
    exit();
}

$checkCode=$_POST['checkCode'];
if($checkCode!=$_SESSION['myCheckCode']){
    header("Location:../login.php?msg=6");
    exit();
}

if(empty($_POST['username'])){
    header("Location:../login.php?msg=1");
    exit();
}
$username=$_POST['username'];
if(empty($_POST['password'])){
    header("Location:../login.php?msg=2");
    exit();
}
$password=$_POST['password'];

$usersservice=new usersService();

if($arr=$usersservice->checkUser($username,$password)){
    //session_start();
    $_SESSION['loginuser']=$username;
    $_SESSION['pLevel']=$arr['p_level'];
    $_SESSION['UID']=$arr['uid'];
    header("Location:../index.php");
}else{
    header("Location:../login.php?msg=3");
    exit();
}

?>
