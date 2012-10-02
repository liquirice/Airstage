<?php
session_start();
include('../../../../conn.php');

$type = $_POST['type'];
$title = $_POST['title'];
$display = $_POST['display'];
$realcontent = $_POST['realcontent'];
$stu_id = $_SESSION['stu_id'];

$post = "INSERT INTO Col(class, title, display, realcontent, stu_id) VALUES('$type', '$title', '$display', '$realcontent', '$stu_id')";
if(mysqli_query($conn, $post)){
	echo '<script language="javascript" type="text/javascript">alert("PO文成功!");window.location="index.htm";</script>';
}
else{
	echo "<script language='javascript' type='text/javascript'>alert('PO文失敗!請重新再來'); history.back();</script>";
}
?>