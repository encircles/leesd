<?php
session_start();
if(empty($_SESSION['loginuser'])){
    exit("<a href='../index.php'>返回主页</a>");
}

require_once '../model/usersService.class.php';
require_once '../model/Fenye.class.php';

$usersservice=new usersService();
$fenye=new Fenye();

if(!empty($_GET['page'])){
    if($_GET['page']<1){
        die("输入错误");
    }
    $_GET['page']=ceil($_GET['page']);
    $fenye->setPageNow($_GET['page']);
}

$fenye->setPageSize(10);
//$fenye->setPageNow(3);

//判断是否是搜索的结果
if(empty($_GET['searchVal'])){
    $usersservice->getFenyePage($fenye);
}else{
    echo "<br/><span style='font-size: 20px;'>search 搜索\"{$_GET['searchVal']}\":<br/><br/></span>";
    $usersservice->getFenyePage($fenye,"search",$_GET['searchVal']);
}

if($_GET['page']>$fenye->getPageCount()){
    die("输入错误");
}

$arr=$fenye->getResArray();

echo <<<EOF
<div class="contentdiv">
<table class="contenttable">
    <tr>
    <th>uid</th>
    <th>名字</th>
    <th>电话</th>
    <th>QQ</th>
    <th>权限等级</th>
    <th></th>
    <th></th>
    </tr>
EOF;

foreach($arr as $key=>$value){
    echo "<tr>";
    foreach($value as $k=>$v){
        if($k=="password"||$k=="likes"){

        }else{
            echo "<td>$v</td>";
        }

    }
    echo "<td><a href='javascript:showpage(\"./editUser.php?uid={$value['uid']}&uname={$value['uname']}&
password={$value['password']}&tel={$value['tel']}&qq={$value['qq']}&p_level={$value['p_level']}\")'>
            编辑</a></td>";
    if($value['uid']!="10000"){
        echo "<td><a href='../controller/deleteProcess.php?deluid={$value['uid']}'
                onclick='return delMsg({$value['uid']})'>删除用户</a></td>";
    }
    echo "</tr>";
}

//导航条

echo "</table></div>";
if($fenye->getRowCount()>0){
    echo "<div class='fenyeDiv'>".$fenye->getNavigate()."</div>";
}


?>