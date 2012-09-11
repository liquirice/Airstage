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
$select = 'SELECT * FROM `Activities` WHERE rno = "'.$_SESSION['rno'].'" LIMIT 1';
$result = mysqli_query($conn, $select);
$url = mysqli_fetch_array($result);
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
			$('#date').datepicker(
				$.datepicker.regional['zh-TW']
			);
			
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
//判定此活動不是該使用者分享的
if($url['stu_id'] != $_SESSION['stu_id'] || $_SESSION['stu_id'] == ''){
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
		<img border="0" src="jpg/bl.jpg" width="1" height="20"></td>
		<td align="left" width="70">&nbsp;</td>
	</tr>
</table>
<!--底部選項-->
</div>
        </td>
    </tr>
</table>';
		}
}
//判定此活動是該使用者分享的
else if($url['stu_id'] == $_SESSION['stu_id']){
	//一開始呈現的資料
	if($_SESSION['record'] == 'update'){
		echo '
		<form action="apply02.php?action=correct" method="post" name="form" target="_self">
			<table background="jpg/box3.png" style="background-repeat:no-repeat" width="918" height="545">
				<tr>
				<td width="507">
					<table width="507" height="100%" align="left" cellspacing="0" cellpadding="0" style="margin:0; padding:0; border:none" align="center" >
						<tr>
							<td align="center" height="80" colspan="2"></td>
						</tr>
						<tr>
							<td><img src="../../../../activities/jpg/cub.png" />活動分類</td>
							<td>
								<select name="type">';
								if($url['type'] == 'clubs'){
									echo'
        								<option value="clubs" selected>社團組織</option>
            							<option value="departments">校內系所</option>
            							<option value="authorities">校方機構</option>
            							<option value="concerts">藝文音樂</option>';
								}
								else if($url['type'] == 'departments'){
									echo'
        								<option value="clubs">社團組織</option>
            							<option value="departments" selected>校內系所</option>
            							<option value="authorities">校方機構</option>
            							<option value="concerts">藝文音樂</option>';
								}
								else if($url['type'] == 'authorities'){
									echo'
        								<option value="clubs">社團組織</option>
            							<option value="departments">校內系所</option>
            							<option value="authorities" selected>校方機構</option>
            							<option value="concerts">藝文音樂</option>';
								}
								else if($url['type'] == 'concerts'){
									echo'
        								<option value="clubs">社團組織</option>
            							<option value="departments">校內系所</option>
            							<option value="authorities">校方機構</option>
            							<option value="concerts" selected>藝文音樂</option>';
								}
							echo'
        						</select>
							</td>
						</tr>
						<tr>
							<td><img src="../../../../activities/jpg/cub.png" />大標題</td>
							<td><input type="text" name="title" value="'.$url['title'].'" placeholder="2012中山校園演唱會" /></td>
						</tr>
						<tr>
							<td colspan="2"><img src="../../../../activities/jpg/cub.png" />活動簡介<br />
							&nbsp;&nbsp;&nbsp;<textarea rows="4" cols="50" name="description" placeholder="演出藝人：陳綺貞|盧廣仲|魏如萱|蛋堡|李佳薇|張芸京|玩聲樂團 (host:NONO)">'.$url['description'].'</textarea></td>
						</tr>
						<tr>
							<td><img src="../../../../activities/jpg/cub.png" />活動名稱</td>
							<td><input type="text" name="name" placeholder="活末日之花　奇蹟綻放" value="'.$url['name'].'" /></td>
						</tr>
						<tr>
							<td><img src="../../../../activities/jpg/cub.png" />時間</td>
							<td><input type="text" name="time" placeholder="2012/05/25" id="date" value="'.$url['time'].'" />&nbsp;&nbsp;<input type="text" name="extratime" placeholder=" 5:45 開放入場" value="'.$url['extratime'].'" /></td>
						</tr>
						<tr>
							<td><img src="../../../../activities/jpg/cub.png" />地點</td>
							<td><input type="text" name="venue" value="'.$url['venue'].'" placeholder="西子灣沙灘海水浴場" /></td>
						</tr>
						<tr>
							<td><img src="../../../../activities/jpg/cub.png" />費用</td>
							<td><input type="text" size="53" name="fee" value="'.$url['fee'].'" placeholder="貴賓票－免費 校內票－$250 校外票－$400" /></td>
						</tr>
						<tr>
							<td><img src="../../../../activities/jpg/cub.png" />主辦單位</td>
							<td><input type="text" size="53" name="host" value="'.$url['host'].'" placeholder="中山大學學生會" /></td>
						<tr>
					</table>
				</td>
				<td valign="top">
					<table>
						<tr>
							<td height="80" colspan="2"></td>
						</tr>
						<tr>
							<td colspan="2" class="type" width="100"><img src="../../../../activities/jpg/cub.png" />活動主頁<br /><br />&nbsp;&nbsp;&nbsp;<input type="text" size="50" value="'.$url['url1'].'" name="url1" placeholder="Google協作平台、無名小站等,沒有可空白" /><br />&nbsp;&nbsp;&nbsp;<input type="button" onclick="window.open(\'https://sites.google.com/\')" value="申請Google協作平台" /></td>
    					</tr>
    					<!--網址2-->
    					<tr>
    						<td colspan="2" class="type" width="100"><img src="../../../../activities/jpg/cub.png" />Facebook網址<br /><br />&nbsp;&nbsp;&nbsp;<input type="text" size="50" value="'.$url['url2'].'" name="url2" placeholder="活動資訊的Facebook網址" /></td>
    					</tr>
						<tr>
							<td height="100" align="center" valign="middle" bgcolor="#f1f1f1">是否需要開啟【線上報名】與【有誰參加】的功能?<br /><br />';
							if($url['signup'] == 'yes'){
								echo '
									<input type="radio" value="yes" name="signup" checked="checked" />需要&nbsp;&nbsp;<input type="radio" name="signup" value="no" />不需要</td>
								</tr>';
							}
							else if($url['signup'] == 'no'){
								echo '
									<input type="radio" value="yes" name="signup" />需要&nbsp;&nbsp;<input type="radio" name="signup" value="no" checked="checked" />不需要</td>
								</tr>';
							}
						echo '
						<tr>
    						<td colspan="2" align="center"><br /><input type="submit" value="" style="background-image:url(../../../../activities/jpg/bt.png); background-repeat:no-repeat; width:127px; height:41px; cursor:pointer" /></td>
    					</tr></table>
					</td>
					</tr>
				</table>
			</form>';
}
//提交資料
	else if($_SESSION['record'] == 'correct'){
		$type = $_POST['type'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$name = $_POST['name'];
		$time = $_POST['time'];
		$extratime = $_POST['extratime'];
		$venue = $_POST['venue'];
		$fee = $_POST['fee'];
		$host = $_POST['host'];
		$url1 = $_POST['url1'];
		$url2 = $_POST['url2'];
		$signup = $_POST['signup'];
		
		$update = "UPDATE Activities SET type = '$type', title = '$title', description = '$description', name = '$name', time = '$time', extratime = '$extratime', venue = '$venue', fee = '$fee', host = '$host', url1 = '$url1', url2 = '$url2', signup = '$signup' WHERE rno = ".$url['rno']."";
		//將資料更新至Activities
		if(mysqli_query($conn,$update)){
			$check = "SELECT event".$url['rno']." FROM `List`";
			//判定如果需要使用報名系統
			if($signup == 'yes'){
				//如果已經建立好list的報名名單
				if(mysqli_query($conn, $check)){
					header("location:./apply02.php?action=poster");
				}
				//如果尚未建立list的報名名單
				else{
					$newevent = 'ALTER TABLE `List` ADD `event'.$url['rno'].'` VARCHAR( 10 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL';
					$newextra = 'ALTER TABLE `List` ADD `extra'.$url['rno'].'` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL';
					//如果成功建立list資料表
					if(mysqli_query($conn, $newevent) && mysqli_query($conn, $newextra)){
						header("location:./apply02.php?action=poster");
					}
					//建立list資料表失敗
					else {
						echo "<script type='text/javascript' language='javascript'>alert('系統錯誤!請再試一次'); location.href='share.php?action=update';</script>";
					}
				}
				
			}
			//不需要使用報名系統
			else if($signup == 'no'){
				//如果已經建立好資料表就刪除
				if(mysqli_query($conn, $check)){
					//刪除資料表
					header("location:./apply02.php?action=poster");
				}
				//如果沒有就跳過
				else{
					header("location:./apply02.php?action=poster");
				}
			}
		}
		//提交失敗
		else{
			echo "<script type='text/javascript' language='javascript'>alert('提交失敗!請再試一次'); location.href='apply02.php?action=update';</script>";
		}
	}
	else if($_SESSION['record'] == 'poster'){
		echo '
			<!--第三部份-->
			<table cellspacing="0" background="jpg/box3.png" style="background-repeat:no-repeat" width="918" height="545">
    			<tr>';
				if($url['poster'] == ''){
					echo '<td height="423"></td>';
				}
				else{
					echo'<td height="423" align="center"><img src="../../../../activities/poster/'.$url['poster'].'"</td>';
				}
		echo '
    			</tr>
    			<!--上傳圖片-->
    			<tr align="center">
    				<td><form id="imageform" method="post" enctype="multipart/form-data" action="apply02.php?action=upload" target="_self"><img src="../../../../activities/jpg/cub.png" />上傳海報<input type="file" name="photoimg" id="photoimg" placeholder="限jpg檔,大小不可超過1MB" /></td>
				</tr>
				<tr align="center">
					<td align="center"><input type="submit" value="" style="background-image:url(../../../../activities/jpg/bt2.png); background-repeat:no-repeat; width:127px; height:41px; cursor:pointer" /></form></td>
				</tr>
				<tr>
					<td align="center"><input type="button" onClick="top.window.close();" value="不需更新" /></td>
				</tr>
			</table>';
	}
	else if($_SESSION['record'] == 'upload'){
		$path = "../../../../activities/poster/";
		$valid_formats = array("jpg");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name)){
				list($txt, $ext) = explode(".", $name);
				if(in_array($ext,$valid_formats)){
					if($size<(1024*1024)){
						$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
						$tmp = $_FILES['photoimg']['tmp_name'];
						if(move_uploaded_file($tmp, $path.$actual_image_name)){
							mysqli_query($conn,"UPDATE `Activities`  SET `poster` = '$actual_image_name' WHERE `rno` = '".$url['rno']."'");
							$_SESSION['record'] = '';
							echo "<script type='text/javascript' language='javascript'>alert('修改成功!'); top.window.close();</script>";
						}
						else{
							echo "<script type='text/javascript' language='javascript'>alert('上傳失敗'); location.href='apply02.php?action=poster';</script>";
						}
					}
					else{
						echo "<script type='text/javascript' language='javascript'>alert('圖片不可超過1MB'); location.href='apply02.php?action=poster';</script>";
					}
				}
				else{
					echo "<script type='text/javascript' language='javascript'>alert('圖片只限JPG');  location.href='apply02.php?action=poster';</script>";
				}
			}
			else{
				echo "<script type=\"text/javascript\" language=\"javascript\">alert('請選擇圖片'); location.href='apply02.php?action=poster';</script>";
			}
			exit;
		}
	}
}
?>


</body>
</html>
