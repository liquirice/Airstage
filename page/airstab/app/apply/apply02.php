<?php
session_start();
if(empty($_SESSION['name']) && empty($_SESSION['stu_id'])){
		$_SESSION['name'] = '';
		$_SESSION['stu_id'] = '';
}
include("../../../../conn.php");
if(empty($_SESSION['rno']) && empty($_GET['rno'])){
	echo '<script type="text/javascript" language="javascript">alert("請從首頁進入!"); location.href = "http://www.airstage.com.tw/nsysu/airs/index.php"</script>';
}
else if(empty($_SESSION['rno']) && empty($_GET['rno']) == false){
	$_SESSION['rno'] = $_GET['rno'];
}
else if(empty($_SESSION['rno']) == false && empty($_GET['rno']) == false){
	if($_SESSION['rno'] != $_GET['rno']){
		$_SESSION['rno'] = $_GET['rno'];
	}
}

if(isset($_GET['action']) == false){
	$_SESSION['record']= 'update';
}
else if($_GET['action']){
	$_SESSION['record']=$_GET['action'];
}
if(isset($_GET['option']) == false){
	$_SESSION['option']= 'type';
}
else if($_GET['option']){
	$_SESSION['option']=$_GET['option'];
}
$select = 'SELECT * FROM `Activities` WHERE rno = "'.$_SESSION['rno'].'" LIMIT 1';
$result = mysqli_query($conn, $select);
$url = mysqli_fetch_array($result);
$urltemp = ''.$url['stu_id'].',';
$i=0;
$urls = explode(",", $urltemp);
while($urls[$i] != NULL){
	$i++;
}
?>
<html>

<head>

<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<?php
	echo '<title>'.$url['title'].'</title>';
?>
<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" language="javascript" src="../../../../plugin/jquery-ui/js/jquery-ui-1.8.21.custom.min.js"></script>
<script type="text/javascript" language="javascript" src="http://jquery-ui.googlecode.com/svn/trunk/ui/i18n/jquery.ui.datepicker-zh-TW.js"></script>
<script type="text/javascript" language="javascript">
$(function(){
	$('#date').datepicker($.datepicker.regional['zh-TW']);
	$('#update').hide();
	$('#adminlist').hide();
	$('#private').hide();
	$(document).ready(function() {
    	$('#rev').click(function(){
			$('#select').fadeOut('fast',function(){
				$('#update').fadeIn('fast');
				$('#table').css('background-image','url(jpg/re_back.png)');
			})
		})
		$('#sek').click(function(){
			$('#select').fadeOut('fast',function(){
				$('#adminlist').fadeIn('fast');
				$('#table').css('background-image','url(jpg/sek_back.png)');
			})
		})
		$('#set').click(function(){
			$('#select').fadeOut('fast',function(){
				$('#private').fadeIn('fast');
				$('#table').css('background-image','url(jpg/set_back.png)');
			})
		})
		$('.back').click(function(){
			if($('#update').css('display') == 'block'){
				$('#update').fadeOut('fast',function(){
					$('#select').fadeIn('fast');
					$('#table').css('background-image','url(jpg/rev_back.png)');
				})
			}
			else if($('#adminlist').css('display') == 'block'){
				$('#adminlist').fadeOut('fast',function(){
					$('#select').fadeIn('fast');
					$('#table').css('background-image','url(jpg/rev_back.png)');
				})
			}
			else if($('#private').css('display') == 'block'){
				$('#private').fadeOut('fast',function(){
					$('#select').fadeIn('fast');
					$('#table').css('background-image','url(jpg/rev_back.png)');
				})
			}
			else if($('#img').css('display') == 'block'){
				$('#img').fadeOut('fast',function(){
					$('#select').fadeIn('fast');
					$('#table').css('background-image','url(jpg/rev_back.png)');
				})
			}
		})
	});
});
		
</script>
<link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon"/>
<link href="../../../../plugin/jquery-ui/css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
td{
	font-size:12px;
}
.ui-datepicker { width: 23em; padding: .2em .2em 0; display: none; font-size: 62.5%; }

</style>
</head>

<body>
<?php

while($i != -1){
//判定此活動是該使用者分享的
if($urls[$i-1] == $_SESSION['stu_id']){
		echo '
		<table background="'; if($_SESSION['record'] == 'poster'){ echo 'jpg/re_back.png';} else if($_SESSION['option'] == 'type'){ echo 'jpg/rev_back.png';} echo'" style="background-repeat:no-repeat" width="947" height="573" align="center" id="table">
			<tr>
				<td align="center">';
				if($_SESSION['option'] == 'type'){
					echo'
					<div id="select">
						<a style="cursor:pointer" id="rev"><img src="jpg/rev_b1.png" name="rev" onMouseOver="document.rev.src=\'jpg/rev_b2.png\'" onMouseOut="document.rev.src=\'jpg/rev_b1.png\'" /></a>&nbsp;&nbsp;';
						if($url['signup'] == 'yes'){
						echo'
						<a style="cursor:pointer" id="sek"><img src="jpg/sek_b1.png" name="sek" onMouseOver="document.sek.src=\'jpg/sek_b2.png\'" onMouseOut="document.sek.src=\'jpg/sek_b1.png\'" /></a>&nbsp;&nbsp;';
						}
						echo'
						<a style="cursor:pointer" id="set"><img src="jpg/set_b1.png" name="set" onMouseOver="document.set.src=\'jpg/set_b2.png\'" onMouseOut="document.set.src=\'jpg/set_b1.png\'" /></a>&nbsp;&nbsp;
					</div>';
				}
					include('update.php');
					include('adminlist.php');
					include('private.php');
				echo'
				</td>
			</tr>
		</table>';
}
//判定此活動不是該使用者分享的
else if($urls[$i-1] != $_SESSION['stu_id'] || $_SESSION['stu_id'] == ''){
	echo '
<table width="100%" height="100%" align="left" cellspacing="0" cellpadding="0" style="margin:0; padding:0; border:none" >
	<tr>
    	<td height="100%" width="100%"><iframe id="frame" src="'.$url['url1'].'" width=100% height=100% marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="yes" align="left"></iframe></td>
    </tr>
    <tr>
    	<td>
        	<div align="center">
<!--底部選項-->
<table border="0" width="100%" height="65"  background="jpg/background.jpg" >
	<tr>
		<td align="left">
        	<font color="#0066CC">
			<span style="vertical-align: medium; font-size: 11pt; font-weight: 700">&nbsp;<a href="../../../../index.php" target="new" style="cursor:pointer"><img border="0" src="jpg/airstage.jpg" width="147" height="34"></a></span></font></td>
		<td align="left" width="5">
		<img border="0" src="jpg/bl.jpg" width="1" height="20"></td>
		<td align="center" width="81"><span style="vertical-align: medium">
		<font color="#0066CC"><span style="font-weight: 700; font-size: 11pt">
		<a onClick="document.getElementById(\'frame\').src="'.$url['url1'].'" style="cursor:pointer">
		<span style="text-decoration: none"><font color="#0066CC">首頁</font></span></a></span></font></span></td>
		<td align="left" width="2">
		<img border="0" src="jpg/bl.jpg" width="1" height="20"></td>
		<td align="center" width="81">
		<a href="'.$url['url2'].'" target="new" style="cursor:pointer">
		<span style="font-weight: 700; font-size: 11pt; vertical-align: medium; text-decoration: none">
		<font color="#0066CC">FB活動頁</font></span></a></td>
		<td align="left" width="4">
		<img border="0" src="jpg/bl.jpg" width="1" height="20"></td>';
        
		if($url['signup'] == 'yes'){
		echo '
		<td align="center" width="89">
        <a onClick="document.getElementById(\'frame\').src=\'list.php\'" style="cursor:pointer"><span style="vertical-align: medium">
		<font color="#0066CC"><span style="font-weight: 700; font-size: 11pt">
		有誰參加?</span></font></span></a></td>
		<td align="left" width="1">
		<img border="0" src="jpg/bl.jpg" width="1" height="20"></td>
		<td align="center" width="80"><a onClick="document.getElementById(\'frame\').src=\'signup.php\'" style="cursor:pointer"><span style="vertical-align: medium">
		<font color="#FF0000"><span style="font-weight: 700; font-size: 11pt">我要</span></font></span><font color="#FF0000"><span style="vertical-align: medium; font-size: 11pt; font-weight: 700">報名</span></font></a></td>
		
		<td align="left" width="3">
		<img border="0" src="jpg/bl.jpg" width="1" height="20"></td>';
		}
		echo'
		<td align="left" width="70">&nbsp;</td>
	</tr>
</table>
<!--底部選項-->
</div>
        </td>
    </tr>
</table>';
}
$i--;
}
?>
</body>
</html>
