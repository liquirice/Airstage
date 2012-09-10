<?php
include("./lib/connection.php");
$result = mysql_query("SELECT * FROM member_detail WHERE student_id = '{$_GET['student_id']}'");


$data = mysql_fetch_array($result);



$sql="DELETE FROM member_detail WHERE student_id='{$data['student_id']}'";

if (!mysql_query($sql)){
  die('Error : ' . mysql_error());
  }
else{
	echo "1 record Dropped",$sql;
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    			window.alert('Succesfully Deleted')
    			window.location.href='revise_list.php';
    			</SCRIPT>");
	}
  	


							
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
</body>
</html>