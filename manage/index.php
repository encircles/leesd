<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理界面</title>
    <link rel="stylesheet" href="../css/manage.css" type="text/css">
    <script type="text/javascript" src="../js/manage.js"></script>
</head>
<body>

<div>
    <div class="menu">
        <ul class="navi">
            <li><a id="usermanage" onclick="switchNav(this.innerHTML)">用户管理</a></li>
            <li><a id="contentmanage" onclick="switchNav(this.innerHTML)">留言管理</a></li>
            <li class="exit"><a onclick="goToIndex()">返回主页</a></li>
            <li class="searchli"><input id="searchContent" class="searchtext" type="text"/>
                <input class="searchbutton" type="button" value="搜索" onclick="searchContent()"/></li>
        </ul>
    </div>
    <div id="test"></div>
    <div id="userlist" class="userlist"></div>
</div>
</body>
</html>
<?php
if(!empty($_GET['msg'])){
    $msg=$_GET['msg'];
    switch($msg){
        case 'deluidok':
            echo "<script>alert('删除用户成功');window.location.href='index.php';</script>";
            break;
        case 'updateok':
            echo "<script>alert('更新用户成功');window.location.href='index.php';</script>";
            break;
    }
}
?>
