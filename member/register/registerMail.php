<?php
	session_start();
	require_once( "../../global/connectVar.php" );
	require_once( "../../global/setSession.php" );
	
	//驗證token ，以 registerMail.php?usr=&token= 進入
	if( !empty($_GET['usr']) && !empty($_GET['token']) )
	{	//get資料
		$usr = mysqli_real_escape_string( $conn, trim($_GET['usr']) );
		$token = mysqli_real_escape_string( $conn, trim($_GET['token']) );
		//連接資料庫 用usr比對stu_id抓出相關資料
		$result = mysqli_query( $conn, "SELECT `stu_id`, `name`, `username`, `AUTH` FROM `Member` WHERE `stu_id` = '{$usr}'" );
		$row = mysqli_fetch_assoc($result);
		$stu_id = $row['stu_id'];
		$name = $row['name'];
		$username = $row['username'];
		$AUTH = $row['AUTH'];
		
		if( $AUTH > 0 )
		{	//其實可省略
			echo '<script type="text/javascript">alert("動作失敗！您已經認證過囉！"); location.href="../index.php";</script>';
			exit();
		}
		else
		{	//判斷token是否正確
			$real_token = $stu_id.$AUTH;
			$real_token = sha1($real_token);
			
			if( $real_token == $token )
			{
				$update_AUTH = "UPDATE `Member` SET `AUTH` = '1' WHERE `stu_id` = '$stu_id'";
				if(mysqli_query($conn, $update_AUTH)) {
					$msg = "認證成功";
					/*echo '<script type="text/javascript">alert("認證成功！\n系統將為您自動登出，請重新登入。"); location.href="./logout.php";</script>';
					exit();*/
				}
				else {
					$msg = "認證失敗 重新整理";
					/*
					echo '<script type="text/javascript">alert("認證失敗！請再試一次！"); location.href="../../index.php";</script>';
					exit();*/
				}
			}
			else
			{
				$msg = "token錯誤";
				/*echo '<script type="text/javascript">alert("認證連結有誤！請重新確認！"); location.href="registerMail.php";</script>';*/
			}
		}
	}
	else if( isset($_SESSION['stu_id']) || isset($_SESSION['name']) || isset($_SESSION['auth']) ) 
	{	//已登入會員，以　registerMail.php　進入
		echo '<script type="text/javascript">alert("test！"); location.href="./index.php"</script>';

		$stu_id = $_SESSION['stu_id'];
		
		$result = mysqli_query( $conn, "SELECT `stu_id`, `name`, `username`, `AUTH` FROM `Member` WHERE `stu_id` = '{$stu_id}'" );
		$row = mysqli_fetch_assoc($result);

		$name = $row['name'];
		$username = $row['username'];
		$AUTH = $row['AUTH'];
	
		if( $AUTH > 0 || $_SESSION['auth'] > 0 ) 
		{	// AUTH > 0 : 已通過認證 -> 跳回首頁
			echo '<script type="text/javascript">alert("動作失敗！您已經認證過囉！"); location.href="../../index.php"</script>';
			exit();
		}
		else if( $AUTH <= 0 && $AUTH > -6 )
		{	// AUTH = 0 ~ 5 : 功能正常
			// 要求重新發信 或是 新註冊會員
			if( isset($_POST['submit']) || $AUTH == 0 )
			{
				$AUTH--;
				$update_AUTH = mysqli_query( $conn, "UPDATE `Member` SET `AUTH` = '$AUTH' WHERE `stu_id` = '$stu_id'" );
				
				$token = $stu_id.$AUTH;
				$token = sha1($token);
				
				/*發信開始*/
				//$recipients = $stu_id . "@student.nsysu.edu.tw";
				$recipients = "tp6u83@gmail.com";
				$headers = "From: Studio Airstage <airstage@airstage.com.tw> Content-Type:text/html";
				$subject = "Airstage Studio - 註冊認證信";
				$message = "<p>** 本電子郵件為自動生成郵件，請勿直接回復。 **</p>";
				$message .= "<div>";
				$message .= "$name 您好：";
				$message .= "<blockquote>";
				$message .= "<p>感謝您註冊Airstage :)</p>";
				$message .= "<p>請點擊以下網址，通過e-mail認證程序：<br>";
				$message .= "<a target='_blank' href='http://www.airstage.com.tw/member/register/registerMail.php?usr=$stu_id&token=$token'>http://www.airstage.com.tw/member/register/registerMail.php?usr=$stu_id&token=$token</a>";
				$message .= "升級為Airstage認證會員後，就能夠享受Airstage的完整會員功能及服務囉！<br>";
				$message .= "</p>";
				$message .= "<p>Airstage 歡迎您的加入。</p>";
				$message .= "</blockquote>";
				$message .= "國立中山大學 | Airstage Studio | 西灣人 - http://www.airstage.com.tw/</div>";
				$message = "<p>** 本電子郵件為自動生成郵件，請勿直接回復。 **</p>";
				//$message .= "<br>";
								
				if( mail( $recipients, $subject, $message, $headers) ) {
					/*顯示發信次數和本次發信時間、告知使用者請用最新的認證信認證*/
					$msg = '<p>首先感謝您註冊Airstage。<br>'.
						   '目前Airstage僅開放給中山大學學生使用。<br>'.
						   '為確認您為中山大學學生，<br>'.
						   '系統目前已依照您所填的學號，發送一封認證信至您的中山大學學生信箱。<br>'.
						   '麻煩您到學生信箱收取認證信，依照信件指示完成最後的註冊動作，<br>';
					if( $AUTH < -1 )
						$msg .= '到目前為止已為您寄送 '.($AUTH*(-1)).' 封認證信，請務必使用最新的認證信做驗證。<br>';
						$msg .= '認證成功即可成為Airstage的認證會員，就能夠享受完整會員功能及服務囉！<br>';
						$msg .= '&nbsp;<br>';
						$msg .= 'Airstage - <a href="http://www.airstage.com.tw/">http://www.airstage.com.tw/</a><br>';
						$msg .= '國立中山大學　學生網路郵局 - <a href="http://student.nsysu.edu.tw/cgi-bin/owmmdir/openwebmail.pl">http://student.nsysu.edu.tw/cgi-bin/owmmdir/openwebmail.pl</a></p>';
				}
				else{
					$AUTH++;
					$update_AUTH = mysqli_query( $conn, "UPDATE `Member` SET `AUTH` = '$AUTH' WHERE `stu_id` = '$stu_id'" );
					$msg = "不好意思，信箱驗證信在發送中出了點問題。請試著重新整理此頁再次啟用功能，或是聯絡管理人員為您處理。<br>";
				}
				/*發信結束*/
			}
			
			// 詢問是否重新寄信
			else
			{	//寄送按鈕和相關提示
				$msg = "<p>目前系統已經發過 ".($AUTH*(-1))." 封認證信至您的信箱。<br>";
				$msg = "記得要去學生信箱收信唷！另外別忘了要使用最新的認證信做驗證。</p>";
				$msg = "<p>若是想重新送信，請按下方按鈕寄信。</p>";
				$msg = "<form action='registerMail.php' method='post'><button class='btn btn-large btn-block btn-primary' type='button'>重新發送認證信</button></form><br>";
			}
		}
		else if( $AUTH <= -6 )
		{
			echo '<script type="text/javascript">alert("動作失敗！您發送了過多的認證信。為保護系統，目前已暫停您寄發認證信的權利。如有問題請聯絡管理人員。"); location.href="./logout.php"</script>';
			exit();
		}
	}
	else
	{
		echo '<script type="text/javascript">alert("請先登入會員！"); location.href="./index.php"</script>';
		exit();
	}

?>

<html>

<head>
	<link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>會員註冊 ─ Airstage 西灣人</title>
	<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript">
		var app = "none";
		function MM_swapImgRestore() { //v3.0
		  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
		}
		function MM_preloadImages() { //v3.0
		  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
			var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
			if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
		}
		
		function MM_findObj(n, d) { //v4.01
		  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
			d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
		  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
		  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
		  if(!x && d.getElementById) x=d.getElementById(n); return x;
		}
		
		function MM_swapImage() { //v3.0
		  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
		   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
		}
	</script>
	<style type="text/css">
		body {
			background-color: #F2F2F2;
			background-image: url(../jpg/background.png);
			background-repeat: repeat-x;
		}
		A.goBackIndex{
			text-decoration: none;
			border-left-color: #98A850;
			border-bottom-color: #98A850;
			border-right-color: #98A850;
			border-top-color: #98A850;
			background-color: #98A850;
			padding: 5px;
			;
			color: #FFF;
			font-size: 14px;
			text-align: center;
		}
	</style>
</head>

<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('jpg/b402.png','jpg/b102.png','jpg/bb302.png')">

<!--?php require_once("../../global/navi_white/navi.php"); ?-->

<div align="center">
	<table border="0" width="980" height="146" cellspacing="0" cellpadding="0" style="color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">
		<tr>
			<td background="http://www.airstage.com.tw/nsysu/airs/jpg/bot.png" valign="top">

				<div align="center">
					<img src="../jpg/cry.png" alt="" width="82" height="16">
					<table border="0" width="963" cellspacing="0" cellpadding="0" height="535">
					<tr>
						<td background="jpg/back.png" width="980" valign="top">
							<div align="center">
								<table border="0" width="45%" cellspacing="0" cellpadding="0" height="455">
									<tr>
										<td colspan="3" background="jpg/bar.png">
											<p align="center">
												<font face="微軟正黑體"><a href="registerLaw.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','jpg/b102.png',1)"><img src="jpg/b1.png" alt="使用條款" name="Image7" width="95" height="41" border="0"></a><img border="0" src="jpg/b2.png" width="95" height="41"><img border="0" src="jpg/b303.png" width="95" height="41"><a href="login.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','jpg/b402.png',1)"><img src="jpg/b4.png" alt="會員登入" name="Image6" width="95" height="41" border="0"></a></font>
										</td>
									</tr>
									<tr>
										<td colspan="3">&nbsp;</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td width="399" height="395" background="jpg/box_mail.png" valign="top">
											<div align="center">
							<table border="0" width="85%" cellspacing="0" cellpadding="0" height="389">
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td height="318" valign="top">
									<p align="center">
									&nbsp;<div align="center">
										<table border="0" width="86%" cellspacing="0" cellpadding="0" height="235" >
											<tr>
												<td height="35">
												<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
												<font face="微軟正黑體"><font color="#676767" size="2">
												</font><font face="微軟正黑體"><b><!--?php echo $name; ?--></b></font><font color="#676767" size="2">同學：</font></font></td>
											</tr>
											<tr>
												<td height="144" style="vertical-align:text-top;">
												<!--
												<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
												<font face="微軟正黑體" color="#676767" size="2">
                                                
												註冊的驗證信已寄到學校信箱囉！<br>
												請盡速至<a href="http://student.nsysu.edu.tw/cgi-bin/owmmdir/openwebmail.pl" style="text-decoration: none"><font color="#009999">中山大學學生網路郵局</font></a>收信以驗證學生身分，完成帳號的開啟。<br>
												<br>
												忘記學校信箱密碼嗎？請直接傳FB訊息給</font><font face="微軟正黑體" size="2" color="#009999">服務中心</font><font face="微軟正黑體" color="#676767" size="2">來進行人工驗證。</font></td>
											</tr>
											<tr>
												<td>
												  <p align="center"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image5','','jpg/bb302.png',1)"><img src="jpg/bb3.png" name="Image5" width="127" height="27" border="0"></a>-->
												  
                                                 <div>
												 <!--?php if($msg) echo $msg;?-->
												 </div>
                                                  <p> <!--span><a class="goBackIndex" href="../../index.php">回首頁</a></span--></p>
												  
                                                  </td>
											</tr>
										</table>
									</div>
									</td>
								</tr>
								</table>
						</div>
						</td>
						<td>&nbsp;</td>
					</tr>
				</table>
			</div>
			</td>
		</tr>
	</table>
</div>

			</td>
		</tr>
		<tr style="background-image:url(../../global/images/last.png)">
			<td><?php require_once("../../global/footer.php"); ?></td>
		</tr>
	</table>
</div>

</body>

</html>
