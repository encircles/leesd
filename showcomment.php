<?php
require_once './model/ctService.class.php';
session_start();

if(empty($_SESSION['loginuser'])){
    die("请<a href='login.php'>登录</a>再查看评论");
}

if(empty($_GET['id'])){
    die("参数不完整");
}
$id=$_GET['id'];

$ctserv=new ctService();
$ct_arr=$ctserv->getComment($id);

foreach($ct_arr as $key=>$value){
    if($value['id']==$id){
        $sender=htmlspecialchars($value['sender'], ENT_QUOTES);
        $receiver=htmlspecialchars($value['receiver'], ENT_QUOTES);
        $content=htmlspecialchars($value['content'], ENT_QUOTES);
        if($sender==$_SESSION['loginuser']){
            echo "<a href='javascript:' style='color:#ff0000;'>我</a> : " .$content;
        }else if($sender!=$receiver){
            echo "<a href='javascript:'>$sender</a> : " .$content;
        }else{
            echo "<a href='javascript:'><b>$sender</b></a> : " .$content;
        }

        echo "<br/>{$value['time']}";
        echo "<br/><br/>";
    }

}


?>
