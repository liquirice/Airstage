<?php
	// Last Modified Day : 2012.10.13
	session_start();
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		require_once( "../connectVar.php" );
		$stu_id = $_SESSION['stu_id'];
		$trade = mysqli_real_escape_string( $conn, trim($_GET['trade']) );
		
		$query = "UPDATE marketSecondHand_chasingList SET star = 0 WHERE stu_id = '$stu_id' AND trade_id = '$trade'";
		$result = mysqli_query( $conn, $query ) or die('Delete Fail!');
		echo '<script type="text/javascript"> location.href="onChasing.php"</script>';
	}
?>