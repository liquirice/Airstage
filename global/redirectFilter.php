<?php
	$direct = "http://www.airstage.com.tw/index.php";
	$current = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
	
	if( $direct != $current ) {
		header("Location: http://www.airstage.com.tw/index.php");
		exit;
	}
?>