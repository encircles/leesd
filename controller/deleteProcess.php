<?php
require_once '../model/udService.class.php';
require_once '../model/usersService.class.php';
require_once '../model/ctService.class.php';

if(isset($_GET['delcontentid'])){
    if(empty($_GET['delcontentid'])){
        die("delete error");
    }
    $udserv=new udService();
    $ctserv=new ctService();
    $b=$udserv->delContent($_GET['delcontentid']);
    if($b==1){
        $ctserv->delComment($_GET['delcontentid']);
        header("Location:../index.php?msg=delok");
        exit();
    }else{
        die("删除留言失败");
    }
}

if(isset($_GET['deluid'])){
    if(empty($_GET['deluid'])){
        die("delete user error");
    }
    $userserv=new usersService();
    $ctserv=new ctService();
    $b=$userserv->delUser($_GET['deluid']);
    if($b==1){
        $ctserv->delUserComment($_GET['deluid']);
        header("Location:../manage/index.php?msg=deluidok");
        exit();
    }else{
        die("删除用户失败");
    }
}

?>
