<?php
Session_start();

include("../conn.php");

if( $_SESSION['pass_phrase'] == $_POST['captcha'] && $_POST['captcha'] !="")
{
	$stu_id = strtoupper(clean($_POST['stu_id']));
	$psw = sha1(clean($_POST['psw']));
	$name = clean($_POST['name']);
	$department = clean($_POST['department']);
	$grade = clean($_POST['grade']);
	$gender = clean($_POST['gender']);
	$email = clean($_POST['email']);
	
	//檢查是否重複註冊
	//有學號被盜用的問題?
/*	$check_id = "SELECT * FROM `member` WHERE `stu_id` = '{$stu_id}' ";
	if(mysqli_query($conn,$check_id)!= null){
		echo "<script type='text/javascript' language='javascript'>alert('註冊失敗！此學號已被註冊'); history.back();</script>";
		break;
	}
*/
	
	$insert = "INSERT INTO Member(stu_id, psw, name, department, grade, gender, email) VALUES('$stu_id', '$psw', '$name', '$department', '$grade', '$gender', '$email')";

	if(mysqli_query($conn,$insert)){
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