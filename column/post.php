<?php
session_start();
include('../global/connectVar.php');

$shelf = $_POST["shelf"];
$pic = $_POST["pic"];
$type = $_POST['type'];
$smalltype = $_POST["smalltype"];
$title = $_POST['title'];
$display = $_POST['display'];
$realcontent = $_POST['editor1'];
$stu_id = $_SESSION['stu_id'];
$front_name = $_FILES['front_pic']['name'];
$front_type = $_FILES['front_pic']['type'];
$front_size = $_FILES['front_pic']['size'];

$post = "INSERT INTO Col(class, type, title, display, realcontent, stu_id, shelf) VALUES('$type', '$smalltype', '$title', '$display', '$realcontent', '$stu_id', '$shelf')";
if(mysqli_query($conn, $post)){
	$select = 'SELECT * FROM `Col` ORDER BY rno DESC LIMIT 1';
	$last = mysqli_query($conn, $select);
	$lastrno = mysqli_fetch_array($last);
	$_SESSION['rnoCol'] = $lastrno['rno'];

	if($front_name != "") {
		if( (($front_type == 'image/JPG') || ($front_type == 'image/jpg') || ($front_type == 'image/jpeg') || ($front_type == 'image/png') || ($front_type == 'image/pjpeg')) && ($front_size > 0) && ($front_size <= 1048576) ) {
			if( $_FILES['front_pic']['error'] == 0 ) {
				// Move to the target folder.
				$ext=explode(".", $front_name);
				if( move_uploaded_file( $_FILES["front_pic"]["tmp_name"], "../member/images/".$stu_id."/column/".$_SESSION["rnoCol"].".".$ext[1]) ) {
					$query = "UPDATE Col SET front = '".$_SESSION["rnoCol"].".".$ext[1]."' WHERE rno = ".$_SESSION["rnoCol"]."";
					if(mysqli_query( $conn, $query )){
						if($shelf == "article")
                            echo "<script language='javascript' type='text/javascript'>alert('PO文成功!'); window.location.href='read.php?rno=".$_SESSION["rnoCol"]."'</script>";
                        else
                            echo "<script language='javascript' type='text/javascript'>alert('儲存成功!'); window.location.href='index.php'</script>";
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
		  echo "<script language='javascript' type='text/javascript'>alert('PO文成功!'); window.location.href='read.php?rno=".$_SESSION["rnoCol"]."'</script>";
        else
            echo "<script language='javascript' type='text/javascript'>alert('儲存成功!'); window.location.href='index.php'</script>";
		}
	}

else{
	echo "<script language='javascript' type='text/javascript'>alert('更新失敗!請重新再來'); history.back();</script>";
}
?>