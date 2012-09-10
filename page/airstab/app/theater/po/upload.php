<?php

	include("../../../../../conn.php");
	$video = $_POST['video_id'];
	parse_str( parse_url( $video, PHP_URL_QUERY ) );
	$video_id = $v;
	$video_name = $_POST['video_name'];
	$description = $_POST['description'];
	$type = $_POST['type'];
	
	$insert = "INSERT INTO Broadcast(video_name, video_id, description, type) VALUES('$video_name', '$video_id', '$description', '$type')";
	
	if(mysqli_query($conn, $insert)){
		echo '<script language="javascript">alert("請等待管理員驗證後影片才能被分享哦！"); document.location.href="../index.htm"</script>';
	}
	else{
		echo '<script language="javascript">alert("發生錯誤，無法分享成功，請重新嘗試 '.$insert.'");history.back();</script>';
	}
?>