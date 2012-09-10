<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<?php
$student_id=$_POST['student_id'];
$name=$_POST['name'];
$gender=$_POST['gender'];
$department=$_POST['department'];
$grade=$_POST['grade'];
$email=$_POST['email'];
$passwd=$_POST['passwd'];
$hp=$_POST['hp'];
$fb=$_POST['fb'];
$twitter=$_POST['twitter'];
$plurk=$_POST['plurk'];
$skype=$_POST['skype'];
$msn=$_POST['msn'];
$second_email=$_POST['second_email'];
$dorm=$_POST['dorm'];
$floor=$_POST['floor'];
$room=$_POST['room'];
$food=$_POST['food'];
$address=$_POST['address'];
$club=$_POST['club'];
$club_id=$_POST['club_id'];
$id=$_POST['id'];
$hometown=$_POST['hometown'];
$home_address=$_POST['home_address'];
$transport=$_POST['transport'];

$student_id_check=$_POST['check_student_id'];
$gender_check=$_POST['check_gender'];
$email_check=$_POST['check_email'];
$hp_check=$_POST['check_hp'];
$fb_check=$_POST['check_fb'];
$twitter_check=$_POST['check_twitter'];
$plurk_check=$_POST['check_plurk'];
$skype_check=$_POST['check_skype'];
$msn_check=$_POST['check_msn'];
$second_email_check=$_POST['check_second_email'];
$dorm_check=$_POST['check_dorm'];
$food_check=$_POST['check_food'];
$address_check=$_POST['check_address'];
$club_check=$_POST['check_club'];
$club_id_check=$_POST['check_club_id'];
$hometown_check=$_POST['check_hometown'];
$home_address_check=$_POST['check_home_address'];
$transport_check=$_POST['check_transport'];
$sql="UPDATE `member_detail` SET `student_id`='$student_id',`name`='$name',`gender`='$gender',`department`='$department'";
?>
</body>
</html>