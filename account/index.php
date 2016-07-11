<?php
session_start();

echo "<a href='../index.php'>返回</a>";
echo "<h2>个人资料</h2>";
require_once '../model/usersService.class.php';

$usersserv=new usersService();

$arr=$usersserv->getUser($_SESSION['loginuser']);

/**
 * 接收返回的消息
 */
if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
    switch($msg){
        case '1':
            echo "<script>alert('修改成功'); window.location='index.php'</script>";
            break;
        case '2':
            echo "<script>alert('修改失败'); window.location='index.php'</script>";
            break;
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人资料</title>
    <link rel="stylesheet" href="css/account.css" type="text/css"/>
</head>
<body>
<div id="main">
<table id="table-1">
    <tr>
        <td colspan="2"><img class="heads-img" src="../<?php echo $arr[0]['heads_url'];?>"></td>
    </tr>
    <tr>
        <td colspan="2"><br/>
            <form action="../heads_update_file.php" method="post" enctype="multipart/form-data">
                <label for="file">选择:</label>
                <input type="file" name="file" id="file"/>
                <input type="submit" name="submit" value="上传" />
            </form>
        </td>
    </tr>
    <tr>
        <td>id</td>
        <td><?php echo $arr[0]['uid'];?></td>
    </tr>
    <tr>
        <td>昵称</td>
        <td><?php echo $arr[0]['uname'];?></td>
    </tr>
    <tr>
        <td>电话</td>
        <td><?php echo $arr[0]['tel'];?></td>
    </tr>
    <tr>
        <td>QQ</td>
        <td><?php echo $arr[0]['qq'];?></td>
    </tr>
    <tr>
        <td>喜欢</td>
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
</div>
</body>
</html>
