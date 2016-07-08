<?php
session_start();

require_once './model/udService.class.php';
require_once './model/Fenye.class.php';
require_once './model/usersService.class.php';
require_once './model/ctService.class.php';

$udserv=new udService();
$userservice=new usersService();
$fenye=new Fenye();
// 这里我们需要根据用户的点击来修改$pageNow这个值
// 这里我们需要判断是否有这个page发送过来
if(!empty($_REQUEST['page'])){
	if($_REQUEST['page']<1){
		die("输入错误");
	}
    $_REQUEST['page']=ceil($_REQUEST['page']);
	$fenye->setPageNow($_REQUEST['page']);
}

if(!empty($_REQUEST['msg'])){
	if($_REQUEST['msg']=='addok'){
		echo "<script>alert('添加成功');
			window.location.href='index.php'; </script>";
	}else if($_REQUEST['msg']=='delok'){
		echo "<script>alert('删除成功');
			window.location.href='index.php'; </script>";
	}
}

//$arr=$udserv->getContentArr();
$udserv->getFenyePage($fenye);

if($_REQUEST['page']>$fenye->getPageCount()){
	die("输入错误");
}

$arr=$fenye->getResArray();

//echo "<br/><div class='fenyeDiv'>".$fenye->getNavigate()."</div><hr/>";

for ($i=0; $i < count($arr); $i++) {
	$id=$arr[$i]['id'];
	$name = htmlspecialchars($arr[$i]['name'], ENT_QUOTES);
	$title = htmlspecialchars($arr[$i]['title'], ENT_QUOTES);
	$content = htmlspecialchars($arr[$i]['content'], ENT_QUOTES);
	$nowtime = htmlspecialchars($arr[$i]['nowtime'], ENT_QUOTES);
    $hearts=$arr[$i]['hearts'];

	echo "<div class='conts'><table style='width:100%;'>
	        <tr><td class='titlecss' colspan='2'>{$title}</td></tr>
	        <tr><td colspan='2' class='namecss'>From:&nbsp;&nbsp;{$name}</td></tr>
	        <tr><td colspan='2'>Content:</td></tr>
	        <tr><td colspan='2'><hr class='hrclass'/></td></tr>
	        <tr><td colspan='2' height='15'></td></tr><tr><td colspan='2' class='textindent'><pre>";

    //判断文章长度
    if(strlen($content)>100){
        echo "<a class='opend' href='javascript:openDiv(\"{$id}{$i}\")'>";
        echo "<div id='bt2{$id}{$i}' style='display: none;'>收起↑↑</div></a>";
        echo "<div id='divs{$id}{$i}' class='openDiv'>";
        echo mb_substr($content,0,300,"UTF-8");
        echo "</div>";
        echo "<div id='divh{$id}{$i}' class='openDiv' style='display: none;'>";
        echo $content;
        echo "</div>";
        echo "<a class='opend' href='javascript:openDiv(\"{$id}{$i}\")'>";
        echo "<div id='bt1{$id}{$i}'>展开↓↓</div></a>";
    }else{
        echo $content;
    }

    echo "</pre></td></tr>";

    echo "<tr><td style='color:#a4a4a4;'><br/>";

    //判断是否点过赞
    if(empty($_SESSION['UID'])){
        echo "<div class='heartDiv' id='heart' onclick='window.alert(\"请登录\")'></div>";
    }else{
        $likes_arr=$userservice->getLikesArr($_SESSION['UID']);
        if($userservice->checkLikes($likes_arr,$id)){
            echo "<div class='heartDiv' onclick='return addheart2($id,this)' id='heart'></div>";
        }else{
            echo "<div style='color:#ff0000' onclick='return addheart2($id,this)' "
                ."class='heartDiv' id='heart_other'></div>";
        }
    }
    echo "<span id='zanDIv{$id}' class='zanDiv'>$hearts</span>";

    //评论部分
    $ctserv=new ctService();
    $comment_arr=$ctserv->getComment($id);
    $count_ct=0;
    if($comment_arr){
        foreach($comment_arr as $key=>$value){
            if($value['id']==$id){
                $count_ct=count($comment_arr);
            }
        }
    }

    echo "<span id='commentDiv{$id}' class='commentDiv' "
        ."onclick='openComment({$id})'>评论</span>";
    //评论数
    echo "<span id='commentCount{$id}' class='commentCountDiv'>"
        .$count_ct."</span>";
    echo "<div id='comment{$id}' style='display:none;'>";

	echo "<div id='showCommentDiv{$id}' class='showCommentDiv'>";
	echo "</div>";

    

    echo <<<EOF


    <textarea id="commentText{$id}" class="commentText" rows="1" draggable="false"></textarea><br/>
    <input class="conmentBt" type="button" onclick="addComment({$id},'{$_SESSION['UID']}','{$_SESSION['loginuser']}','{$name}')"
     value="回复"/>
EOF;
    echo "</div>";


    echo "</td>";


    //发布时间
    echo "<td class='nowtime_td'><br/><div class='nowtime'>{$nowtime}";
			if(!empty($_SESSION['loginuser'])){
				if($_SESSION['pLevel']==255){
					echo "&nbsp;<a onclick='return confirmDelete(\"{$name}\",\"{$title}\")' href='
					controller/deleteProcess.php?delcontentid={$id}'>删除</a>";
				}

			}
	        echo "</div></td></tr>";



    echo "</table><br/></div>";

}

echo "<br/><div class='fenyeDiv'>".$fenye->getNavigate()."</div>";

?>
