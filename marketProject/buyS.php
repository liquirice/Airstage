<?php
	// Last Modified Day : 2012.09.23
	
	//確定登入狀態
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) )
	{
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	}
	else
	{
		//連接資料庫
		require_once("../connectVar.php");

		session_start();
		
		//
		$bidder_id = mysqli_real_escape_string( $conn, trim( $_SESSION['stu_id']) );
		$trade_id = mysqli_real_escape_string( $conn, trim( $_POST['trade_id']) );
		$exchange_type = mysqli_real_escape_string( $conn, trim( $_POST['exchange_type']) );
		$exchange_info = mysqli_real_escape_string( $conn, trim( $_POST['exchange_info']) );
		$wanted_number = mysqli_real_escape_string( $conn, trim( $_POST['wanted_number']) );
		
		
	}
?>