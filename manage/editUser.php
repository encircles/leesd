<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>编辑用户</title>
    <style>
        .eidttable input{width:300px;height:30px;font-size: 16px;}
        .eidttable td{height:50px;font-size: 20px;}
        .eidttable{padding-left:100px;}
        .h2title{font-size: 20px;}
    </style>
</head>
<body>
<br/><h2 class="h2title">编辑用户</h2>
<form action="../controller/editUserProcess.php" method="post">
    <input type="hidden" name="uid" value="<?php echo $_REQUEST['uid'];?>"/>
    <table class="eidttable">
        <tr>
            <td>uid:</td>
            <td><input type="text" name="Uid" value="<?php echo $_REQUEST['uid'];?>" disabled="disabled"/></td>
        </tr>
        <tr>
            <td>名字:</td>
            <td><input type="text" name="uname" value="<?php echo $_REQUEST['uname'];?>" disabled="disabled"/></td>
        </tr>
        <tr>
            <td>密码:</td>
            <td>-</td>
        </tr>
        <tr>
            <td>电话:</td>
            <td><input type="text" name="tel" value="<?php echo $_REQUEST['tel'];?>"/></td>
        </tr>
        <tr>
            <td>QQ:</td>
            <td><input type="text" name="qq" value="<?php echo $_REQUEST['qq'];?>"/></td>
        </tr>
        <tr>
            <td>权限等级:</td>
            <td><input type="text" name="p_level" value="<?php echo $_REQUEST['p_level'];?>"/></td>
        </tr>
        <tr>
            <td><input type="reset"/></td>
            <td><input type="submit" value="修改"/></td>
        </tr>
    </table>

</form>
</body>
</html>