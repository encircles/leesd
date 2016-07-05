<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册用户</title>
</head>
<body>
<a href="index.php">返回首页</a>
<h1>注册</h1>
<form action="controller/registerProcess.php" method="post">
    <table>
        <tr>
            <td>用户名:</td>
            <td colspan="2"><input type="text" name="username"/></td>
        </tr>
        <tr>
            <td>密码:</td>
            <td colspan="2"><input type="password" name="password"/></td>
        </tr>
        <tr>
            <td>电话:</td>
            <td colspan="2"><input type="text" name="tel"/></td>
        </tr>
        <tr>
            <td>QQ:</td>
            <td colspan="2"><input type="text" name="qq"/></td>
        </tr>
        <tr>
            <td>验证码</td>
            <td style="width: 50px;"><input style="width: 50px;" type="text" name="checkCode" /></td>
            <td><img src="checkCode.php" onclick="this.src='checkCode.php?aa='+Math.random()" /></td>
        </tr>
        <tr>
            <td><input type="submit" value="注册"/></td>
            <td><input type="reset" value="重填"/></td>
        </tr>
    </table>
</form>
<?php
if(!empty($_GET['msg'])){
    switch($_GET['msg']){
        case '1': echo "<span style='color:red'>用户名不能为空</span>"; break;
        case '2': echo "<span style='color:red'>密码不能为空</span>"; break;
        case '3': echo "<span style='color:red'>电话不能为空</span>"; break;
        case '4': echo "<span style='color:red'>qq不能为空'</span>"; break;
        case '5': echo "<span style='color:red'>用户已存在,请重新输入用户名!</span>"; break;
        case '6': echo "<span style='color:red'>请填写验证码!</span>"; break;
        case '7': echo "<span style='color:red'>验证码错误!</span>"; break;
    }
}
?>
</body>
</html>