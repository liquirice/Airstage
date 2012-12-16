<?php
	$direct = "http://www.airstage.com.tw/accounts/revises.php";
	$current = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
	
	if( $direct != $current ) {
		header("Location: http://www.airstage.com.tw/accounts/revises.php");
		exit;
	}
?>