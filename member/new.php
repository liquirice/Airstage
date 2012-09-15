<?php

// Last Modified Day : 2012.09.15
require_once("../connectVar.php");

Session_start();

if( 1 /*$_SESSION['pass_phrase'] == $_POST['captcha'] && $_POST['captcha'] !=""*/)
{
	$username = clean($_POST['username']);
	$psw = clean($_POST['psw']);//拿掉sha1作測試
	$name = clean($_POST['name']);
	$stu_id = strtoupper(clean($_POST['stu_id']));
	$department = clean($_POST['department']);
	$grade = clean($_POST['grade']);
	$gender = clean($_POST['gender']);
	$email = clean($_POST['email']);
	
	//檢查是否重複註冊
	
	$check_id = mysqli_query($conn,"SELECT `username` FROM `member` WHERE `username` = '{$username}'");
	if( mysql_num_rows($check_id) != 0 ){
		echo "<script type='text/javascript' language='javascript'>alert('註冊失敗！此帳號已被註冊，請重新輸入'); history.back();</script>";
		exit();
	}

	$insert = "INSERT INTO `Member`(`username`, `stu_id`, `psw`, `name`, `department`, `grade`, `gender`, `email`) VALUES('{$username}', '{$stu_id}', '{$psw}', '{$name}', '{$department}', '{$grade}', '{$gender}', '{$email}')";
	$MInfo_insert = "INSERT INTO `member_info` (`stu_id`, `facebook`, `msn`, `twitter`, `plurk`, `skype`, `phone`, `food`, `home`, `id`, `dorm`, `room`, `outAddr`, `car`, `profile_pic`) VALUES ('{$stu_id}', '', '', '', '', '', '', '0', '', '', '', '000', '', '0', '');";
	/*display_check這個資料表太聰明了，只要是曾經加入過的學號，就算項目有被刪除，也沒辦法重新註冊*/
	$DCheck_insert = "INSERT INTO `display_check` (`stu_id`, `stu_id_c`, `name_c`, `gender_c`, `grade_c`, `facebook_c`, `msn_c`, `twitter_c`, `plurk_c`, `skype_c`, `phone_c`, `email_c`, `home_c`, `dorm_c`, `outAddr_c`, `car_c`, `profile_pic_c`) VALUES ('{$stu_id}', 'on', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', 'on');";

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