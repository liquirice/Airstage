<?php
Session_start();

include("../conn.php");

if( $_SESSION['pass_phrase'] == $_POST['captcha'] && $_POST['captcha'] !="")
{
	$username = clean($_POST['username']);
	$psw = sha1(clean($_POST['psw']));
	$name = clean($_POST['name']);
	$stu_id = strtoupper(clean($_POST['stu_id']));
	$department = clean($_POST['department']);
	$grade = clean($_POST['grade']);
	$gender = clean($_POST['gender']);
	$email = clean($_POST['email']);
	
	//檢查是否重複註冊
	$check_id = "SELECT * FROM `member` WHERE `username` = '{$username}' ";
	if(mysqli_query($conn,$check_id)!= null){
		echo "<script type='text/javascript' language='javascript'>alert('註冊失敗！此帳號已被註冊，請重新輸入'); history.back();</script>";
		exit();
	}

	
	$insert = "INSERT INTO Member(username, stu_id, psw, name, department, grade, gender, email) VALUES('$username', '$stu_id', '$psw', '$name', '$department', '$grade', '$gender', '$email')";
	$MInfo_insert = "INSERT INTO member_info(stu_id) VALUES('$stu_id')";
	$MCheck_insert = "INSERT INTO member_check(student_id) VALUES('$stu_id')";

	if(mysqli_query($conn,$insert) && mysqli_query($conn,$MInfo_insert) && mysqli_query($conn,$MCheck_insert)){
		echo "<script type='text/javascript' language='javascript'>alert('註冊成功!'); location.href='login.php'</script>;";
		mkdir("../accounts/images/{$stu_id}");
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