<?php

header("Content-type:text/html;charset=utf-8");

session_start();
if(empty($_SESSION['loginuser'])){
    exit("<a href='../index.php'>返回主页</a>");
}

if(!empty($_REQUEST['searchVal'])){
    $_SESSION['searchVal']=$_REQUEST['searchVal'];
}
if(!empty($_REQUEST['type'])){
    $_SESSION['searchVal']="";
}

require_once '../model/udService.class.php';
require_once '../model/Fenye.class.php';

$udserv=new udService();
$fenye=new Fenye();

if(!empty($_REQUEST['page'])){
    if($_REQUEST['page']<1){
        die("输入错误");
    }
    $_REQUEST['page']=ceil($_REQUEST['page']);
    $fenye->setPageNow($_REQUEST['page']);
}

$fenye->setPageSize(10);

if(!empty($_SESSION['searchVal'])){
    echo "<br/><span style='font-size: 20px;'>search 搜索\"{$_SESSION['searchVal']}\":<br/><br/></span>";
}
$udserv->getAjaxFenyePage($fenye,"search",$_SESSION['searchVal']);

if($_REQUEST['page']>$fenye->getPageCount()){
    die("输入错误");
}

$arr=$fenye->getResArray();

echo <<<EOF
<div class="contentdiv">
<table class="contenttable">
    <tr>
    <th>留言信息id</th>
    <th>作者</th>
    <th>标题</th>
    <th>内容</th>
    <th>发布时间</th>
    <th></th>
    <th></th>
    </tr>
EOF;

for ($i=0; $i < count($arr); $i++) {
    $id=$arr[$i]['id'];
    $name = htmlspecialchars($arr[$i]['name'], ENT_QUOTES);
    $title = htmlspecialchars($arr[$i]['title'], ENT_QUOTES);
    $content = htmlspecialchars($arr[$i]['content'], ENT_QUOTES);
    $nowtime = htmlspecialchars($arr[$i]['nowtime'], ENT_QUOTES);

    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$name</td>";
    echo "<td>$title</td>";
    if(strlen($content)>20){
        echo "<td>".mb_substr($content,0,20,'UTF-8')."......<a onclick='showHideDiv($i)' style='cursor: pointer;'>更多</a>
        <div id='hidecontent{$i}' class='hidecontent' style='display:none;'>
        <a onclick='showHideDiv($i)' style='cursor: pointer;font-size:30px;'>点此关闭此窗口</a><br/><textarea>{$content}
        </textarea></div>

        </td>";
    }else{
        echo "<td>$content</td>";

    }
    echo "<td>$nowtime</td>";
    echo "<td><a href='javascript:showpage(\"./editLeaveMsg.php?&id={$id}&name={$name}&
title={$title}&content={$content}&nowtime={$nowtime}\")'>
            编辑</a></td>";
    echo "<td><a href='../controller/deleteProcess.php?deluid={$value['uid']}'
          onclick='return delMsg({$value['uid']})'>删除留言</a></td>";

    echo "</tr>";
}

echo "</table></div>";
if($fenye->getRowCount()>0){
    echo "<div class='fenyeDiv'>".$fenye->getNavigate()."</div>";
}



















/*header("Content-type:text/html;charset=utf-8");

session_start();
if(empty($_SESSION['loginuser'])){
    exit("<a href='../index.php'>返回主页</a>");
}

require_once '../model/udService.class.php';
require_once '../model/Fenye.class.php';

$udserv=new udService();
$fenye=new Fenye();

if(!empty($_REQUEST['page'])){
    if($_REQUEST['page']<1){
        die("输入错误");
    }
    $_REQUEST['page']=ceil($_REQUEST['page']);
    $fenye->setPageNow($_REQUEST['page']);
}

$fenye->setPageSize(10);

//判断是否是搜索的结果
if(empty($_REQUEST['searchVal'])){
    $udserv->getAjaxFenyePage($fenye);
}else{
    echo "<br/><span style='font-size: 20px;'>search 搜索\"{$_REQUEST['searchVal']}\":<br/><br/></span>";
    $udserv->getAjaxFenyePage($fenye,"search",$_REQUEST['searchVal']);
}

if($_REQUEST['page']>$fenye->getPageCount()){
    die("输入错误");
}

$arr=$fenye->getResArray();

echo <<<EOF
<div class="contentdiv">
<table class="contenttable">
    <tr>
    <th>留言信息id</th>
    <th>作者</th>
    <th>标题</th>
    <th>内容</th>
    <th>发布时间</th>
    <th></th>
    <th></th>
    </tr>
EOF;

for ($i=0; $i < count($arr); $i++) {
    $id=$arr[$i]['id'];
    $name = htmlspecialchars($arr[$i]['name'], ENT_QUOTES);
    $title = htmlspecialchars($arr[$i]['title'], ENT_QUOTES);
    $content = htmlspecialchars($arr[$i]['content'], ENT_QUOTES);
    $nowtime = htmlspecialchars($arr[$i]['nowtime'], ENT_QUOTES);

    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$name</td>";
    echo "<td>$title</td>";
    if(strlen($content)>20){
        echo "<td>".mb_substr($content,0,20,'UTF-8')."......<a onclick='showHideDiv($i)' style='cursor: pointer;'>更多</a>
        <div id='hidecontent{$i}' class='hidecontent' style='display:none;'>
        <a onclick='showHideDiv($i)' style='cursor: pointer;font-size:30px;'>点此关闭此窗口</a><br/><textarea>{$content}
        </textarea></div>

        </td>";
    }else{
        echo "<td>$content</td>";

    }
    echo "<td>$nowtime</td>";
    echo "<td><a href='javascript:showpage(\"./editLeaveMsg.php?&id={$id}&name={$name}&
title={$title}&content={$content}&nowtime={$nowtime}\")'>
            编辑</a></td>";
    echo "<td><a href='../controller/deleteProcess.php?deluid={$value['uid']}'
          onclick='return delMsg({$value['uid']})'>删除留言</a></td>";

    echo "</tr>";
}

echo "</table></div>";
if($fenye->getRowCount()>0){
    echo "<div class='fenyeDiv'>".$fenye->getNavigate()."</div>";
}

*/?>
