<?php
	$direct = "http://www.airstage.com.tw/marketProject/marketIndex.php";
	$current = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
	
	if( $direct != $current ) {
		header("Location: http://www.airstage.com.tw/marketProject/marketIndex.php");
		exit;
	}
?>