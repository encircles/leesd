<?php
session_start();
date_default_timezone_set("PRC");
$time=date('Y-m-d H:i:s');
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>留言板leesd.net</title>
	<link rel="stylesheet" href="css/global.css" type="text/css"/>
    <link rel="stylesheet" href="css/index.css" type="text/css"/>
	<script type="application/javascript" src="./js/common_tools.js"></script>
	<script type="application/javascript" src="./js/index.js"></script>
</head>
<body id="top">
<div class="report">
            <div class="up">
                <div onclick="location='#top'" id="triangle-up" style='display: none;'></div>
            </div>
    <br/>
    <p>
		<?php
			if(!empty($_SESSION['loginuser'])){
				echo "<div onclick='location=\"#reporttable\"' class='up'><div id='talkbubble'></div></div>";
			}else{
				echo "<div class='up' onclick='alert(\"请登录\")'><div id='talkbubble'></div></div>";
			}
		?>
	</p>
</div>

<div class="mainDiv">
	<div class="lybHead">
		<div class="menudiv" onclick="showDiv('menudiv2')">
			<a class="menu" href="javascript:">
			<div class="bar"></div>
			<div class="bar"></div>
			<div class="bar"></div>
			</a>
		</div>
        <div id="menudiv2" class="menudiv2" style="display: none;">
            <div class="m2k">
                <div class="m2d"><a href="javascript:goToAccount()">个人资料</a></div>
                <div class="m2d"><a href="javascript:">管理留言</a></div>
                <div class="m2d"><a href="javascript:">我喜欢的</a></div>
                <div class="m2d"><a href="javascript:">设置</a></div>
            </div>
        </div>

		<span class="sp1">
			<?php

				if(empty($_SESSION['loginuser'])){
					echo "<div class='login'><a href=\"login.php\">登录</a>&nbsp;<a href=\"register.php\">注册</a></div>";
				}else{
					echo "<div class='login'><span style='color:#2aa7ff;'>" .$_SESSION['loginuser']."</span>&nbsp;";
                    echo "#".$_SESSION['UID']."&nbsp;";
                    if($_SESSION['pLevel']==255){
                        echo "<a href='./manage/index.php'>管理</a>&nbsp;";
                    }
					echo "<a href='javascript:safeQuit()'>退出</a></div>";
				}
			?>

			</span><span class="sp2"><a href="index.php">LEESD.NET</a></span>
	</div>

	<div class="contentdiv">
	<div class="contents">
		<?php
		//输出留言信息
		require_once 'printcontent.php';
		?>
	</div>
	</div>
	<br/><br/><br/>
	<?php if(!empty($_SESSION['loginuser'])){ ?>
	<form action="./controller/addProcess.php" method="post">
		<input type="hidden" name="name" value="<?php echo $_SESSION['loginuser'];?>">
	<div class="reportdiv">
		<table id="reporttable" cellspacing="0" cellpadding="0" style="width:100%">
			<tr>
				<td width="75" height="30">
				标题：
				</td>
				<td>
					<input type="text" name="title" style="width:100%;"/>
				</td>
			</tr>
			<tr>
				<td colspan="2">
				留言内容：
				</td>
			</tr>
			<tr>
				<td colspan="2" >
					<textarea name="content" rows="10" style="width:100%;resize:none;"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<input type="hidden" id="nowtime" name="nowtime" value="<?php echo $time ?>"/>
					<input type="submit" value="发表" style="width:100px; height:30px;"/>

				</td>
				<td align="right">
					<input type="reset" value="重置" style="width:40px; height:30px;"/>
				</td>
			</tr>
		</table>
	</div>

	<br/>
</form>
	<?php } ?>
<div class="footer">
	&copy;2016 LEESD <a href="http://www.miitbeian.gov.cn/" target="_blank">蜀ICP备16007729号</a>
</div>
</div>

</body>
</html>