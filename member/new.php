<?php

// Last Modified Day : 2012.09.23
require_once("../connectVar.php");

Session_start();

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

	$psw = sha1(clean($_POST['psw']));
	$name = clean($_POST['name']);
	/*系級按學號自動判斷*/
	switch(substr($stu_id, 3, 3))
	{
		case 101:
			$department = "中文系";
			break;
		case 102:
			$department = "外文系";
			break;
		case 103:
			$department = "音樂系";
			break;
		case 106:
			$department = "劇藝系";
			break;
		case 201:
			$department = "生科系";
			break;
		case 202:
			$department = "化學系";
			break;
		case 203:
			$department = "物理系";
			break;
		case 204:
			$department = "應數系";
			break;
		case 301:
			$department = "電機系";
			break;
		case 302:
			$department = "機電系";
			break;
		case 304:
			$department = "資工系";
			break;
		case 308:
			$department = "材光系";
			break;
		case 309:
			$department = "光電系";
			break;
		case 310:
			$department = "材光系";
			break;
		case 401:
			$department = "企管系";
			break;
		case 402:
			$department = "資管系";
			break;
		case 403:
			$department = "財管系";
			break;
		case 502:
			$department = "海資系";
			break;
		case 504:
			$department = "海工系";
			break;
/*			
		case :
			$department = "";
			break;
*/
		default:
			echo "<script type='text/javascript' language='javascript'>alert('註冊失敗！無法判別的學號！如有問題請洽管理人員。'); location.href='../index.php'</script>;";
			exit();
	}
	switch(substr($stu_id, 1, 2))
	{
		case '96':
			$grade = 100;
			break;
		case '97':
			$grade = 101;
			break;
		case '98':
			$grade = 102;
			break;
		case '99':
			$grade = 103;
			break;
		case '00':
			$grade = 104;
			break;
		case '01':
			$grade = 105;
			break;
		default :
			echo "<script type='text/javascript' language='javascript'>alert('註冊失敗！目前僅開放在校生註冊！如有問題請洽管理人員。'); location.href='../index.php'</script>;";
			exit();
	}
	$gender = clean($_POST['gender']);
	$email = clean($_POST['email']);

	$insert = "INSERT INTO `Member`(`username`, `stu_id`, `psw`, `name`, `department`, `grade`, `gender`, `email`) VALUES('{$username}', '{$stu_id}', '{$psw}', '{$name}', '{$department}', '{$grade}', '{$gender}', '{$email}')";
	$MInfo_insert = "INSERT INTO `member_Info` (`stu_id`, `facebook`, `msn`, `twitter`, `plurk`, `skype`, `phone`, `food`, `home`, `id`, `dorm`, `room`, `outAddr`, `car`, `profile_pic`) VALUES ('{$stu_id}', '', '', '', '', '', '', '0', '', '', '', '000', '', '0', '');";
	$DCheck_insert = "INSERT INTO `display_check` (`stu_id`, `stu_id_c`, `name_c`, `username_c`,`gender_c`, `grade_c`, `facebook_c`, `msn_c`, `twitter_c`, `plurk_c`, `skype_c`, `phone_c`, `email_c`, `home_c`, `dorm_c`, `outAddr_c`, `car_c`, `profile_pic_c`) VALUES ('{$stu_id}', 'on', '', '', '','', 'on', '', '', '', '', '', '', '', '', '', '', 'on');";

	if( mysqli_query($conn,$insert) && mysqli_query($conn,$MInfo_insert) && mysqli_query($conn,$DCheck_insert) ){
		mkdir("../accounts/images/{$stu_id}");
		$_SESSION['name'] = $username;
		echo "<script type='text/javascript' language='javascript'>alert('註冊成功!'); location.href='certificationMail.php'</script>;";
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