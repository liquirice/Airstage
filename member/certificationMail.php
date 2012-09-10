<?php
	// Last Modified Day : 2012.09.10
	require_once( "../connectVar.php" );
	
	$id = $_POST['id'];
	$email = $_POST['email'];
	
	$host = 'ssl://smtp.gmail.com';
	$port = '465';
	$user = 'airstagestudio@gmail.com';
	$pswd = '86088608';
	$from = 'Studio Airstage<airstagestudio@gmail.com>';
	$to = $email;
	
	$sqlevent = mysqli_query($conn,"SELECT * FROM `Member` WHERE `username`='".$id."' AND `email` ='".$email."'");
	$getresult = mysqli_fetch_array($sqlevent);
	$getid = $getresult['username'];
	$getname = $getresult['name'];
	$getpsw = $getresult['psw'];
	
	/*============subject為寄件標題，email内容由以下開始==================*/
		$subject = 'Airstage Studio - 密碼通知';
	
	$nl = "\r\n";
	$message = '';
	$message .= '<html>'.$nl;
	$message .= '<body style="font-size:13px;">';
	$message .= '<b>親愛的&nbsp;'.$getname.'：</b><br>'.$nl;
	$message .= '您的密碼認證已通過<br>'.$nl;
	$message .= '您的帳號:&nbsp;'.$getid.'<br>'.$nl;
	$message .= '您的密碼:&nbsp;'.$getpsw.'<br>'.$nl;
	$message .= '<span style="color:#990000;">本電子郵件爲自動生成郵件，請勿直接回復。<br>'.$nl;
	$message .= '若有任何有關平台的疑問，請洽平台負責人：&nbsp;郭宇軒&nbsp;|&nbsp;e-mail:&nbsp;<a href="mailto:shdowwings@gmail.com">shdowwings@gmail.com</a><br>'.$nl;
	$message .= '若有任何有關系統的疑問，請洽系統負責人：&nbsp;甘忠禾&nbsp;|&nbsp;e-mail:&nbsp;<a href="mailto:two_saki@hotmail.com">two_saki@hotmail.com</a><br>'.$nl;
	$message .= '<br>'.$nl;
	$message .= '國立中山大學&nbsp;|&nbsp;Airstage&nbsp;Studio&nbsp;|&nbsp;西灣人<br></span>'.$nl;
	$message .= '</body>'.$nl;
	$message .= '</html>'.$nl;
	/*==================email内容至此結束，準備發送email===================*/
	$headers = array('From'=>$from, 'To'=>$to, 'Subject'=>$subject, 'MIME-Version'=>'1.0', 'Content-Type'=>'text/html; charset=utf-8', 'Content-Transfer-Encoding'=>'8bit');
	$smtp = Mail::factory('smtp', array('host'=>$host, 'port'=>$port, 'auth'=>true, 'username'=>$user, 'password'=>$pswd));
	$mail = $smtp->send($to, $headers, $message); //由此發送email
	/*===================檢查email發送情況，成功與否=======================*/
	if(PEAR::isError($mail)){
		echo "<script language='javascript'>alert('email failed!!');</script>";
	}
	else{
		echo "<script language='javascript'>alert('密碼已發到您的e-mail，請記得去收信哦！');document.location.href = 'login.php'</script>";
	}
?>