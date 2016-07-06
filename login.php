<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
</head>
<body>
<a href="index.php">返回首页</a>
<form action="controller/loginProcess.php" method="post">
    <h1>用户登录</h1>
    <table>
        <tr><td>用户名: </td><td colspan="2"><input type="text" name="username"/></td></tr>
        <tr><td>密&nbsp;&nbsp;&nbsp;&nbsp;码: </td><td colspan="2"><input type="password" name="password"/></td></tr>
        <tr>
            <td>验证码</td>
            <td style="width: 50px;"><input style="width: 50px;" type="text" name="checkCode" /></td>
            <td><img src="checkCode.php" onclick="this.src='checkCode.php?aa='+Math.random()" /></td>
        </tr>
        <tr><td><input type="submit" value="登录"/></td><td><input type="reset" value="重填"/></td></tr>

    </table>

</form>
<?php

if(!empty($_GET['msg'])){
    switch($_GET['msg']){
        case '1': echo "<span style='color:red'>用户名不能为空</span>"; break;
        case '2': echo "<span style='color:red'>密码不能为空</span>"; break;
        case '3': echo "<span style='color:red'>帐号或密码错误</span>"; break;
        case '4': echo "<span style='color:red'>注册成功,请登录!</span>"; break;
        case '5': echo "<span style='color:red'>请填写验证码!</span>"; break;
        case '6': echo "<span style='color:red'>验证码错误!</span>"; break;

    }
}

?>
</body>
</html>