<?php
session_start();

echo "<h2>个人资料</h2>";
require_once '../model/usersService.class.php';

$usersserv=new usersService();

$arr=$usersserv->getUser($_SESSION['loginuser']);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人资料</title>
</head>
<body>
<table>
    <tr>
        <td>id</td>
        <td><?php echo $arr[0]['uid'];?></td>
    </tr>
    <tr>
        <td>name</td>
        <td><?php echo $arr[0]['uname'];?></td>
    </tr>
    <tr>
        <td>tel</td>
        <td><?php echo $arr[0]['tel'];?></td>
    </tr>
    <tr>
        <td>qq</td>
        <td><?php echo $arr[0]['qq'];?></td>
    </tr>
    <tr>
        <td>likes</td>
        <td>
            <?php
            //根据文章的id获取文章信息
            $likes_str=$arr[0]['likes'];
            $likes_str=mb_substr($likes_str,1);
            $arr=explode("@",$likes_str);
            foreach($arr as $k=>$v){
                echo $v." ";
            }
            ?>
        </td>
    </tr>
</table>
</body>
</html>
