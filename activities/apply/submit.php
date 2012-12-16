<?php
require("../../global/connectVar.php");
session_start();
$rno = $_SESSION['rno'];

if($_GET['type'] == "signup"){
	$stu_id = clean($_POST['stu_id']);
	$name = clean($_POST['name']);
	$username = clean($_POST['username']);
	$departments = clean($_POST['departments']);
	$year = clean($_POST['year']);
	$gender = clean($_POST['gender']);
	$email = clean($_POST['email']);
	$psw = clean($_POST['psw']);
	$hp = clean($_POST['phone']);
	$fb = clean($_POST['fb']);
	$transport = clean($_POST['trans']);
	$food = clean($_POST['food']);
	$extra = clean($_POST['extra']);
	
	$stu_id_check = "SELECT * FROM Member WHERE stu_id = '$stu_id'";
	$check = mysqli_query($conn, $stu_id_check);
	if(mysqli_num_rows($check) != 0){
		echo '<script type="text/javascript" language="javascript">alert("你已經註冊會員,請登入後再報名!"); location.href="signup.php"</script>';
	}
	else {
	
	$member = "INSERT INTO Member(stu_id, name, username, department, grade, gender, email, psw) VALUES('$stu_id', '$name', '$username', '$departments', '$year', '$gender', '$email', '$psw') ";
	$signup = "INSERT INTO member_detail(student_id, name, id, department, grade, gender, email, passwd, hp, fb, transport, food) VALUES('$stu_id', '$name', '$username', '$departments', '$year', '$gender', '$email', '$psw', '$hp', '$fb', '$transport', '$food')";
	$list = "INSERT INTO List(event".$rno.", extra".$rno.") VALUES('$stu_id', '$extra')";
	
	if(mysqli_query($conn, $member) && mysqli_query($conn, $list)){
		echo '<script type="text/javascript" language="javascript">alert("報名成功!"); location.href="list.php"</script>';
	}
	else{
		echo '<script type="text/javascript" language="javascript">alert("報名失敗,請重新報名!'.$list.'"); </script>';
	}
}
}
else if($_GET['type'] == "logged"){
	$hp = clean($_POST['phone']);
	$fb = clean($_POST['fb']);
	$transport = clean($_POST['trans']);
	$food = clean($_POST['food']);
	$extra = clean($_POST['extra']);
	
	$signup = "UPDATE member_detail SET hp = $hp, fb = $fb, transport = $transport, food = $food WHERE student_id = ".$_SESSION['stu_id']."";
	$list = "INSERT INTO List(".$_SESSION['rno'].", extra".$_SESSION['rno'].") VALUES('".$_SESSION['stu_id']."', '$extra')";
	
	if(mysqli_query($conn, $signup) && mysqli_query($conn, $list)){
		echo '<script type="text/javascript" language="javascript">alert("報名成功!"); location.href="list.php"</script>';
	}
	else{
		echo '<script type="text/javascript" language="javascript">alert("報名失敗,請重新報名!"); history.back();</script>';
	}

	
}

?>