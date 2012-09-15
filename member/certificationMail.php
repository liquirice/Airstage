<?php
	// Last Modified Day : 2012.09.15
	require_once( "../connectVar.php" );
	require_once( "Mail.php" );
	require_once( "Mail/mime.php" );

	//get Random String function
	function getRandomStr($returnSize="8",$appendStr="",$Type="1",$RandomStr="")
	{
		if (strlen($RandomStr)==0){
			$RandomStr="0123456789abcdefghijklmnopqrstuvwxyz";
		}
		$RandomStrSize=strlen($RandomStr);
		for ($i=1;$i<=$returnSize;$i++){ 
			//$rg=rand(0,100)%strlen($RandomStr);
			$returnStr.=$RandomStr[rand(0,$RandomStrSize-1)];
		}
		if($Type=="1"){
			$returnStr=$appendStr.$returnStr;
		}else if($Type=="2"){
			$returnStr=$returnStr.$appendStr;
		}
		return $returnStr;
	}

	Session_start();
	
	if( !isset($_SESSION['name']) ) {
		echo '<script type="text/javascript">alert("請先登入唷～"); location.href="../index.php"</script>';
	}

	$sqlevent = mysqli_query($conn,"SELECT * FROM `member` WHERE `username` = '{$_SESSION['name']}'");
	$getresult = mysqli_fetch_array($sqlevent);
	$AUTH = $getresult['AUTH'];
	
	//判斷會員是否通過認證
	if($AUTH == 0)
	{
		$username = $getresult['username'];
		$name = $getresult['name'];
		$email = $getresult['email'];
						
		$token = getRandomStr(5, sha1($getresult['stu_id']), 1);
		
		//發認證信給未認證會員
		
		$gmail["host"] = 'ssl://smtp.gmail.com';
		$gmail["port"] = '465';
		$gmail["auth"] = true;
		$gmail["username"] = 'airstagestudio@gmail.com';
		$gmail["password"] = '86088608';
	
		$recipients = $email;
	
		$headers['From']    = 'Studio Airstage<airstagestudio@gmail.com>';
		$headers['To']      = $email;
		$headers['Subject'] = 'Airstage Studio - 註冊認證信';
	
		$msg = "<p>  ** 本電子郵件為自動生成郵件，請勿直接回復。 **<br>";
		$msg .= "<div>{$name} 您好：";
		$msg .= "<blockquote><p>感謝您註冊Airstage :)<br>您的帳號：{$username}</p>";
		/*幫我檢查一下check.php的正確路徑是否為:http://airstage/member/check.php*/
		$msg .= "<p>請點擊以下網址，通過e-mail認證程序：<br><a href='http://airstage/member/check.php?user={$username}&token={$token}'>http://airstage/member/check.php?user={$username}&token={$token}</a><br>升級為Airstage認證會員後，就能夠享受Airstage的完整會員功能及服務囉！</p>";
		$msg .= "<p>Airstage 歡迎您的加入。<br><br>國立中山大學&nbsp;|&nbsp;Airstage&nbsp;Studio&nbsp;|&nbsp;西灣人 - <a href='http://www.airstage.com.tw/'>http://www.airstage.com.tw/</a></p>";
		$msg .= "</blockquote></div>";
		$msg .= "<p> ** 本電子郵件為自動生成郵件，請勿直接回復。 **</p>";
//		$msg .= "";
	
		$mime = new Mail_mime();
		$mime->setHTMLBody($msg);
	
		$param['html_charset'] = 'utf-8';
		$param['head_charset'] = 'utf-8';
		$body = $mime->get($param);
		$headers = $mime->headers($headers);

		$smtp = Mail::factory('smtp', $gmail);
		$mail = $smtp->send($recipients, $headers, $body);
		
		if(PEAR::isError($mail)){
			unset($_SESSION['name']);
			echo "<script language='javascript'>alert('email failed!!');</script>";
		}
		else{
			unset($_SESSION['name']);
			echo "<script language='javascript'>alert('密碼已發到您的e-mail，請記得去收信哦！');document.location.href = 'login.php'</script>";
		}
	}
	else
	{
		//非未認證會員則跳回index頁
		echo '<script type="text/javascript">alert("您已經是認證會員！"); location.href="../index.php"</script>';
	}
?>