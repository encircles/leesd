<?php
require_once '../model/usersService.class.php';

session_start();
//验证码
if(empty($_POST['checkCode'])){
    header("Location:../register.php?msg=6");
    exit();
}

$checkCode=$_POST['checkCode'];
if($checkCode!=$_SESSION['myCheckCode']){
    header("Location:../register.php?msg=7");
    exit();
}

if(empty($_POST['username'])){
    header("Location:../register.php?msg=1");
    exit();
}
if(empty($_POST['password'])){
    header("Location:../register.php?msg=2");
    exit();
}
if(empty($_POST['tel'])){
    header("Location:../register.php?msg=3");
    exit();
}
if(empty($_POST['qq'])){
    header("Location:../register.php?msg=4");
    exit();
}
$username=$_POST['username'];
$password=$_POST['password'];
$tel=$_POST['tel'];
$qq=$_POST['qq'];

$usersservice=new usersService();
if($usersservice->checkForRepetition($username)){
    //echo '用户已存在';
    header("Location:../register.php?msg=5");
    exit();
}else{
    //echo '可以注册';
    if($usersservice->addUser($username,$password,$tel,$qq)){
        header("Location:../login.php?msg=4");
        exit();
    }
}

?>
