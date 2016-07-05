<?php
require_once '../model/usersService.class.php';
if(empty($_REQUEST['uid'])){
    die("参数不完整");
}
$uid=$_REQUEST['uid'];
if(empty($_REQUEST['tel'])){
    die("参数不完整");
}
$tel=$_REQUEST['tel'];
if(empty($_REQUEST['qq'])){
    die("参数不完整");
}
$qq=$_REQUEST['qq'];
if(empty($_REQUEST['p_level'])){
    die("参数不完整");
}
$p_level=$_REQUEST['p_level'];
$userserv=new usersService();
$b=$userserv->updateUser($uid,$tel,$qq,$p_level);
if($b==1){
    header("Location:../manage/index.php?msg=updateok");
    exit();
}else{
    die("更新用户失败");
}

?>
