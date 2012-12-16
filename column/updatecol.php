<?php
session_start();
require('../global/connectVar.php');
$action = $_GET['type'];

$shelf = $_POST["shelf"];
$type = $_POST['type'];
$smalltype = $_POST['smalltype'];
$title = $_POST['title'];
$display = $_POST['display'];
$realcontent = str_replace("\"", "'", $_POST['editor1']);
$pic = $_POST["pic"];
$stu_id = $_SESSION['stu_id'];
$front_name = $_FILES['front_pic']['name'];
$front_type = $_FILES['front_pic']['type'];
$front_size = $_FILES['front_pic']['size'];

$post = "UPDATE Col SET class=\"$type\", type=\"$smalltype\", title=\"$title\", display=\"$display\", realcontent=\"$realcontent\", shelf=\"$shelf\" WHERE rno=".$_SESSION['readrno']."";
if(mysqli_query($conn, $post)){
	if($front_name != "") {
		if( (($front_type == 'image/gif') || ($front_type == 'image/jpeg') || ($front_type == 'image/png') || ($front_type == 'image/pjpeg')) && ($front_size > 0) && ($front_size <= 1048576) ) {
			if( $_FILES['front_pic']['error'] == 0 ) {
				// Move to the target folder.
				$ext=explode(".", $front_name);
				if( move_uploaded_file( $_FILES["front_pic"]["tmp_name"], "../member/images/".$stu_id."/column/".$_SESSION['readrno'].".".$ext[1]) ) {
					$query = "UPDATE Col SET front = '".$_SESSION['readrno'].".".$ext[1]."' WHERE rno = ".$_SESSION['readrno']."";
					if(mysqli_query( $conn, $query )){
						if($shelf == "article")
							echo "<script language='javascript' type='text/javascript'>alert('PO文成功!'); window.location.href='read.php?rno=".$_SESSION['readrno']."';</script>";
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
			echo "<script language='javascript' type='text/javascript'>alert('PO文成功!'); window.location.href='read.php?rno=".$_SESSION['readrno']."';</script>";
		else
			echo "<script language='javascript' type='text/javascript'>alert('儲存成功!'); window.location.href='shelf.php';</script>";
	}
}
else{
	echo "<script language='javascript' type='text/javascript'>alert('更新失敗!請重新再來$post'); history.back();</script>";
}
?>