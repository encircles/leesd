<?php
require_once '../model/udService.class.php';
require_once '../model/usersService.class.php';
require_once '../model/ctService.class.php';

if(isset($_REQUEST['delcontentid'])){
    if(empty($_REQUEST['delcontentid'])){
        die("delete error");
    }
    $udserv=new udService();
    $ctserv=new ctService();
    $b=$udserv->delContent($_REQUEST['delcontentid']);
    if($b==1){
        $ctserv->delComment($_REQUEST['delcontentid']);
        header("Location:../index.php?msg=delok");
        exit();
    }else{
        die("删除留言失败");
    }
}

if(isset($_REQUEST['deluid'])){
    if(empty($_REQUEST['deluid'])){
        die("delete user error");
    }
    $userserv=new usersService();
    $ctserv=new ctService();
    $b=$userserv->delUser($_REQUEST['deluid']);
    if($b==1){
        $ctserv->delUserComment($_REQUEST['deluid']);
        header("Location:../manage/index.php?msg=deluidok");
        exit();
    }else{
        die("删除用户失败");
    }
}

?>
