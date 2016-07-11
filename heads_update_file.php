<?php
session_start();
if(empty($_SESSION['loginuser'])){
    die("error");
}
require_once './model/usersService.class.php';

if ((($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/pjpeg"))
    && ($_FILES["file"]["size"] < 20000))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "Error: " . $_FILES["file"]["error"] . "<br />";
    }
    else
    {
        /*echo "Upload: " . $_FILES["file"]["name"] . "<br />";
        echo "Type: " . $_FILES["file"]["type"] . "<br />";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
        echo "Stored in: " . $_FILES["file"]["tmp_name"];
        echo "<br/>";*/
        $userv= new usersService();
        $_FILES["file"]["name"]=$_SESSION['loginuser'].".jpg";
        $url="images/userheads/" . $_FILES["file"]["name"];
        $b=$userv->setHeadsUrl($_SESSION['loginuser'],$url);
        if($b==0){
            die("修改头像失败");
        }
        move_uploaded_file($_FILES["file"]["tmp_name"],
            "images/userheads/" . $_FILES["file"]["name"]);
        //echo "images/userheads/" . $_FILES["file"]["name"];
        header("Location:./account/index.php?msg=1");
    }
}
else
{
    header("Location:./account/index.php?msg=2");
}