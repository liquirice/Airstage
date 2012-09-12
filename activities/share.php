<?php
header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
session_start();
if(empty($_SESSION['name']) || empty($_SESSION['stu_id'])){
		echo '<script type="text/javascript" language="javascript">alert("請先登入!"); location.href="../member/login.php";</script>';
}
include('../conn.php');

if(isset($_GET['action']) == false){
	$_SESSION['record']= 'share';
}
else if($_GET['action']){
	$_SESSION['record']=$_GET['action'];
}

$select = 'SELECT * FROM `Activities` ORDER BY rno DESC LIMIT 1';
$last = mysqli_query($conn, $select);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>分享新活動</title>
<link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon"/>
<link href="../plugin/jquery-ui/css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet" type="text/css" />
<link href="../css/validate.css" rel="stylesheet" type="text/css" />
<style>
td{font-size:10pt;}
.ui-datepicker { width: 23em; padding: .2em .2em 0; display: none; font-size: 62.5%; }
.preview
{
width:200px;
border:solid 1px #dedede;
padding:10px;
}
#preview
{
color:#cc0000;
font-size:12px
}

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

</style>
<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" language="javascript" src="../plugin/jquery-ui/js/jquery-ui-1.8.21.custom.min.js"></script>
<script type="text/javascript" language="javascript" src="http://jquery-ui.googlecode.com/svn/trunk/ui/i18n/jquery.ui.datepicker-zh-TW.js"></script>
<script type="text/javascript" language="javascript" src="../plugin/validate/jquery.validate.js"></script>
<script type="text/javascript" language="javascript">
        $(function(){
			$('#datepicker').datepicker(
				$.datepicker.regional['zh-TW']
			);
			
		});
		
</script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $('#form').validate({
		success: 'valid',
		rules:{
			type:{valid:true},
			title:{required:true},
			description:{required:true},
			name:{required:true},
			time:{required:true},
			venue:{required:true},
			host:{required:true},
			url1:{url:true},
			url2:{url:true},
		},
		errorPlacement: function(error, element) { //指定错误信息位置 
			error.insertAfter(element);
		},
	});
});
$.validator.addMethod("valid", function(type, element) {
        return (this.optional(element) || type != 'null')
    }, "請選擇活動分類");
</script>
</head>

<body>
<?php
//提交資料
if($_SESSION['record'] === 'submit'){
	$_SESSION['record']=$_GET['action'];
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
		$note = $_POST['note'];
		$signup = $_POST['signup'];
		
		$insert = "INSERT INTO Activities(type, title, description, name, time, extratime, venue, fee, host, url1, url2, stu_id, note, signup) VALUES('$type', '$title', '$description', '$name', '$time', '$extratime', '$venue', '$fee', '$host', '$url1', '$url2', '".$_SESSION['stu_id']."', '$note', '$signup')";
		
		if(mysqli_query($conn,$insert)){
			if($signup == 'yes' && $url1 != ''){
				$lastrno = mysqli_fetch_array($last);
				$_SESSION['rnotemp'] = $lastrno['rno'];
				$newevent = 'ALTER TABLE `List` ADD `event'.$_SESSION['rnotemp'].'` VARCHAR( 10 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL';
				$newextra = 'ALTER TABLE `List` ADD `extra'.$_SESSION['rnotemp'].'` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL';
				if(mysqli_query($conn, $newevent) && mysqli_query($conn, $newextra)){
					header("location:./share.php?action=poster");
				}
				else {
					echo "<script type='text/javascript' language='javascript'>alert('系統錯誤!請再試一次'); location.href='share.php?action=share';</script>";
				}
				
			}
			else{
				$_SESSION['rnotemp'] = mysqli_num_rows($last) + 1;
				header("location:./share.php?action=poster");
			}
		}
		else{
			echo "<script type='text/javascript' language='javascript'>alert('提交失敗!請再試一次'); location.href='share.php?action=share';</script>";
		}
	}
//選擇海報
else if($_SESSION['record'] == 'poster'){
	echo '<!--第三部份-->
	<table cellspacing="0" background="jpg/box_share2.png" style="background-repeat:no-repeat" width="916" height="546">
    <tr>
    	<td height="423"></td>
    </tr>
    <!--上傳圖片-->
    <tr align="center">
    	<td><form id="imageform" method="post" enctype="multipart/form-data" action="share.php?action=upload" target="_self"><img src="jpg/cub.png" />上傳海報<input type="file" name="photoimg" id="photoimg" placeholder="限jpg檔,大小不可超過1MB" /></td>
	</tr>
	<tr align="center">
		<td align="center"><input type="submit" value="" style="background-image:url(jpg/bt2.png); background-repeat:no-repeat; width:127px; height:41px; cursor:pointer" /></form></td>
	</tr>
	</table>';
}

//上傳海報
else if($_SESSION['record'] == 'upload'){
	$path = "poster/";

	$valid_formats = array("jpg");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
									if(mysqli_query($conn,"UPDATE `Activities`  SET `poster` = '$actual_image_name' WHERE `rno` = ".$_SESSION['rnotemp']."")){
									unset($_SESSION['rnotemp']);
									echo "<script type='text/javascript' language='javascript'>alert('分享成功!'); window.opener.location.reload(true); window.close();</script>";
									}
									else{
										echo "<script type='text/javascript' language='javascript'>alert('分享失敗!'); location.href='share.php?action=poster';</script>";
									}
									
								}
							else{
								echo "<script type='text/javascript' language='javascript'>alert('上傳失敗'); location.href='share.php?action=poster';</script>";
							}
						}
					else{
						echo "<script type='text/javascript' language='javascript'>alert('圖片不可超過1MB'); location.href='share.php?action=poster';</script>";
					}
					}
					else{
						echo "<script type='text/javascript' language='javascript'>alert('圖片只限JPG');  location.href='share.php?action=poster';</script>";
					}
				}
				
			else{
				echo "<script type=\"text/javascript\" language=\"javascript\">alert('請選擇圖片'); location.href='share.php?action=poster';</script>";
			}
				
			exit;
		}
}
//進入填寫資料
else if($_SESSION['record'] == 'share'){
	echo '
<!--填寫資料-->
<form method="post" action="share.php?action=submit" target="_self" id="form">
<table width="919" height="546" border="0" cellspacing="0" align="left" background="jpg/box_share.png" style="background-repeat:no-repeat">
<tr valign="top">
	<td>
    <!--第一部份-->
	<table width="507" align="left">
    <tr>
    	<td width="507" height="80" colspan="2"></td>
    </tr>
    <!--活動分類-->
    <tr>
    	<td colspan="2" class="type" width="100"><img src="jpg/cub.png" />活動分類</td>
		<td width="407" align="left">
        <select name="type" id="type">
			<option selected="selected" value="null">====請選擇====</option>
        	<option value="clubs">社團組織</option>
            <option value="departments">校內系所</option>
            <option value="authorities">校方機構</option>
            <option value="concerts">藝文音樂</option>
        </select>
    	</td>
    </tr>
    <!--大標題-->
    <tr>
    	<td colspan="2" class="type" width="100"><img src="jpg/cub.png" />大標題</td>
        <td><input type="text" id="title" name="title" placeholder="2012中山校園演唱會" /></td>
    </tr>
    <!--活動簡介-->
    <tr>
    	<td colspan="3" class="type" width="100"><img src="jpg/cub.png" />活動簡介<br /><br />
        &nbsp;&nbsp;&nbsp;<input type="text" maxlength="80" size="75" name="description" id="description" placeholder="演出藝人：陳綺貞|盧廣仲|魏如萱|蛋堡|李佳薇|張芸京|玩聲樂團 (host:NONO)" /></td>
    </tr>
    <!--活動名稱-->
    <tr>
    	<td colspan="2" class="type" width="100"><img src="jpg/cub.png" />活動名稱</td>
        <td><input type="text" size="53" name="name" id="name" placeholder="活末日之花　奇蹟綻放" /></td>
    </tr>
    <!--時間-->
    <tr>
    	<td colspan="2" class="type" width="100"><img src="jpg/cub.png" />時間</td>
        <td width="407"><input type="text" name="time" placeholder="2012/05/25" id="datepicker" />&nbsp;&nbsp;
		<input type="text" name="extratime" id="extratime" placeholder=" 5:45 開放入場" /></td>
    </tr>
    <!--地點-->
    <tr>
    	<td colspan="2" class="type" width="100"><img src="jpg/cub.png" />地點</td>
        <td><input type="text" name="venue" id="venue" placeholder="西子灣沙灘海水浴場" /></td>
    </tr>
    <!--費用-->
    <tr>
    	<td colspan="2" class="type" width="100"><img src="jpg/cub.png" />費用</td>
        <td><input type="text" size="53" name="fee" id="fee" placeholder="貴賓票－免費 校內票－$250 校外票－$400" /></td>
    </tr>
    <!--主辦單位-->
    <tr>
    	<td colspan="2" class="type" width="100"><img src="jpg/cub.png" />主辦單位</td>
        <td><input type="text" name="host" id="host" placeholder="中山大學學生會" /></td>
    </tr>
	</table>
</td>
<!--第一部份結束-->
<!--第二部份-->
<td>
	<table>
    <tr>
    	<td colspan="2" height="80"></td>
    <!--網址1-->
    <tr>
    	<td colspan="2" class="type" width="100"><img src="jpg/cub.png" />活動主頁<br /><br />
     	&nbsp;&nbsp;&nbsp;<input type="text" size="50" name="url1" id="url1" placeholder="Google協作平台、無名小站等,沒有可空白" /><br />
&nbsp;&nbsp;&nbsp;<input type="button" onclick="window.open(\'https://sites.google.com/\')" value="申請Google協作平台" /></td>
    </tr>
    <!--網址2-->
    <tr>
    	<td colspan="2" class="type" width="100"><img src="jpg/cub.png" />Facebook網址<br /><br />
        &nbsp;&nbsp;&nbsp;<input type="text" size="50" name="url2" id="url2" placeholder="活動資訊的Facebook網址" /></td>
    </tr>
	<tr>
		<td colspan="2" class="type" width="100"><img src="jpg/cub.png" />附註<br /><br />
		&nbsp;&nbsp;&nbsp;<textarea name="note" cols="30" id="note"" placeholder="注意事項" rows="4"></textarea></td>
	</tr>
	<tr>
		<td height="100" align="center" valign="middle" colspan="2" bgcolor="#f1f1f1">是否需要開啟【線上報名】與【有誰參加】的功能?<br /><span style="color:#F00">如果沒有活動首頁將無法開啟此功能哦!</span><br />
		<input type="radio" value="yes" name="signup" checked="checked" />需要&nbsp;&nbsp;<input type="radio" name="signup" value="no" />不需要</td>
		</tr>
    <!--第二部份結束-->
	
	
    <!--提交所有填寫資料-->
    <tr>
    	<td colspan="2" align="center"><br /><input type="submit" value="" style="background-image:url(jpg/bt.png); background-repeat:no-repeat; width:127px; height:41px; cursor:pointer" /></td>
    </tr>        
</table>
</td>
</tr>
</table>
</form>';
}
?>
</html>