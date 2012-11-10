<?php
// Last Modified Day : 2012.09.23
// copy from member/new.php
require_once("../connectVar.php");

Session_start();

	if( isset($_SESSION['stu_id']) || isset($_SESSION['name']) || isset($_SESSION['auth']) ) {
		echo '<script type="text/javascript">alert("你已經是會員囉!"); location.href="../index.php"</script>';
	exit();
	}

 echo "sysyem is working now...";

if( 1 /*$_SESSION['pass_phrase'] == $_POST['captcha'] && $_POST['captcha'] !=""*/)
{
	$username = clean($_POST['username']);
	$stu_id = strtoupper(clean($_POST['stu_id']));
	
	$result = mysqli_query($conn,"( SELECT * FROM `Member` WHERE `stu_id` = '{$stu_id}' ) UNION ( SELECT * FROM `Member` WHERE  `username` = '{$username}' )");
	
	while( $check = mysqli_fetch_assoc($result) )
	{
		if( $username == $check['username'] ) 
		{
			if( $stu_id != $check['stu_id'] ){
				/*此帳號已有人使用，請重新輸入*/
				echo "<script type='text/javascript' language='javascript'>alert('註冊失敗！此帳號已被註冊，請重新輸入'); history.back();</script>";
				exit();
			}
			else{
				/*帳號和學號皆和資料相同，是否忘記曾經註冊過？（忘記密碼）*/
				echo '<script type="text/javascript" language="javascript">alert("註冊失敗！此帳號及學號已被註冊！\n您是否忘記您的密碼？"); location.href="./forgetPassword.php";</script>';
				exit();
			}	
		}
		else
		{
			if( $check['AUTH'] > 0) {
				/*學號已被註冊，已通過信箱驗證。是否忘記曾經註冊過？*/
				echo '<script type="text/javascript" language="javascript">alert("註冊失敗！此學號已被註冊！\n您是否忘記您的帳號密碼？"); location.href="./forgetPassword.php";</script>';
				exit();
			}
			else {
				/*學號已被註冊，但尚未通過信箱驗證。1.重發認證信／2.帳號遭盜用，請洽管理人*/
				echo '<script type="text/javascript" language="javascript">alert("註冊失敗！此學號已被註冊！如有問題請洽管理人員。"); location.href="../index.php";</script>';
				exit();
			}
		}
	}

	$psw = sha1(mysqli_real_escape_string( $conn, trim( $_POST['psw']) ));
	$name = mysqli_real_escape_string( $conn, trim( $_POST['name']) );
	$department = mysqli_real_escape_string( $conn, trim( $_POST['department']) );
	$grade = mysqli_real_escape_string( $conn, trim( $_POST['grade']) );
	$gender = mysqli_real_escape_string( $conn, trim( $_POST['gender']) );
	$email = mysqli_real_escape_string( $conn, trim( $_POST['email']) );
	$fb_id = mysqli_real_escape_string( $conn, trim( $_POST['fb_id']) );

	$insert = "INSERT INTO `Member`(`username`, `stu_id`, `psw`, `name`, `department`, `grade`, `gender`, `email`) VALUES('{$username}', '{$stu_id}', '{$psw}', '{$name}', '{$department}', '{$grade}', '{$gender}', '{$email}')";
	$MInfo_insert = "INSERT INTO `member_Info` (`stu_id`, `facebook`, `msn`, `twitter`, `plurk`, `skype`, `phone`, `food`, `home`, `id`, `dorm`, `room`, `outAddr`, `car`, `profile_pic`) VALUES ('{$stu_id}', '{$fb_id}', '', '', '', '', '', '0', '', '', '', '000', '', '0', '');";
	$DCheck_insert = "INSERT INTO `display_check` (`stu_id`, `stu_id_c`, `name_c`, `username_c`,`gender_c`, `grade_c`, `facebook_c`, `msn_c`, `twitter_c`, `plurk_c`, `skype_c`, `phone_c`, `email_c`, `home_c`, `dorm_c`, `outAddr_c`, `car_c`, `profile_pic_c`) VALUES ('{$stu_id}', 'on', '', '', '','', 'on', '', '', '', '', '', '', '', '', '', '', 'on');";

	if( mysqli_query($conn,$insert) && mysqli_query($conn,$MInfo_insert) && mysqli_query($conn,$DCheck_insert) ){
		mkdir("../accounts/images/{$stu_id}");
		$_SESSION['stu_name'] = $name;
		echo "<script type='text/javascript' language='javascript'>alert('註冊成功!'); location.href='register_mail.php'</script>;";
	}
	else{
		echo "<script type='text/javascript' language='javascript'>alert('註冊失敗!請再試一次'); history.back();</script>";
	}

}
else
{
	echo "<script type='text/javascript' language='javascript'>alert('驗證碼有誤！請重新輸入'); history.back();</script>";
}

?>