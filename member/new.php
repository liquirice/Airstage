<?php
include("../conn.php");
$name = clean($_POST['name']);
$id = clean($_POST['id']);
$stu_id = clean($_POST['stu_id']);
$gender = clean($_POST['gender']);
$email = clean($_POST['email']);
$psw = clean($_POST['psw']);

$insert = "INSERT INTO Member(name, username, stu_id, gender, email, psw) VALUES('$name', '$id', '$stu_id', '$gender', '$email', '$psw')";

if(mysqli_query($conn,$insert)){
	echo "<script type='text/javascript' language='javascript'>alert('註冊成功!'); location.href='login.php'</script>;";
}
else{
	echo "<script type='text/javascript' language='javascript'>alert('註冊失敗!請再試一次'); history.back();</script>";
}
?>