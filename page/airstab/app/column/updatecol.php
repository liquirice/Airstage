<?php
session_start();
include('../../../../conn.php');
$action = $_GET['type'];
$_SESSION["rnoCol"] = $_GET['rno'];

$shelf = $_POST["shelf"];
$type = $_POST['type'];
$title = $_POST['title'];
$display = $_POST['display'];
$realcontent = str_replace("\"", "'", $_POST['realcontent']);
$pic = $_POST["pic"];
$stu_id = $_SESSION['stu_id'];
$front_name = $_FILES['front_pic']['name'];
$front_type = $_FILES['front_pic']['type'];
$front_size = $_FILES['front_pic']['size'];

$post = "UPDATE Col SET class=\"$type\", title=\"$title\", display=\"$display\", realcontent=\"$realcontent\", shelf=\"$shelf\" WHERE rno=".$_SESSION["rnoCol"]."";
if(mysqli_query($conn, $post)){
	if($front_name != "") {
		if( (($front_type == 'image/gif') || ($front_type == 'image/jpeg') || ($front_type == 'image/png') || ($front_type == 'image/pjpeg')) && ($front_size > 0) && ($front_size <= 1048576) ) {
			if( $_FILES['front_pic']['error'] == 0 ) {
				// Move to the target folder.
				if(!is_dir("../../../../accounts/images/".$stu_id."/col"))
					mkdir("../../../../accounts/images/".$stu_id."/col", 0777);
				$ext=explode(".", $front_name);
				if( move_uploaded_file( $_FILES["front_pic"]["tmp_name"], "../../../../accounts/images/".$stu_id."/col/".$_SESSION["rnoCol"].".".$ext[1]) ) {
					$query = "UPDATE Col SET front = '".$_SESSION["rnoCol"].".".$ext[1]."' WHERE rno = ".$_SESSION["rnoCol"]."";
					if(mysqli_query( $conn, $query )){
						if($shelf == "article")
							echo "<script language='javascript' type='text/javascript'>alert('PO文成功!'); window.location.href='read.php?rno=".$_SESSION["rnoCol"]."';</script>";
						else
							echo "<script language='javascript' type='text/javascript'>alert('儲存成功!'); window.location.href='shelf.php';</script>";
					}
					else {
						echo "<script language='javascript' type='text/javascript'>alert('更新失敗!請重新再來'); history.back();</script>";
					}
				}
				else
					echo "<script language='javascript' type='text/javascript'>alert('上傳圖片有誤!請重新再來'); history.back();</script>";
			}
			else
				echo "<script language='javascript' type='text/javascript'>alert('圖片有誤!錯誤信息:".$_FILES["front_pic"]["error"]."'); history.back();</script>";
		}
		else
			echo"<script language='javascript' type='text/javascript'>alert('格式或檔案大小有誤!'); history.back();</script>";
	}
	else{
		if($shelf == "article")
			echo "<script language='javascript' type='text/javascript'>alert('PO文成功!'); window.location.href='read.php?rno=".$_SESSION["rnoCol"]."';</script>";
		else
			echo "<script language='javascript' type='text/javascript'>alert('儲存成功!'); window.location.href='shelf.php';</script>";
	}
}
else{
	echo "<script language='javascript' type='text/javascript'>alert('更新失敗!請重新再來'); history.back();</script>";
}
?>