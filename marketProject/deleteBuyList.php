<<<<<<< HEAD
<?php
	session_start();

	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		require_once( "../connectVar.php" );
		
		$stu_id = $_SESSION['stu_id'];
		$trade_id = mysqli_real_escape_string( $conn, trim($_GET['trade']) );
		
		$query = "DELETE FROM marketSecondHand_bidList " . 
				 "WHERE marketSecondHand_bidList.trade_id = '$trade_id' AND marketSecondHand_bidList.bidder_id ='$stu_id'";
		$result = mysqli_query( $conn, $query ) or die('delete buyer error!');
	}
=======
<?php
	require_once( "../global/setSession.php" );

	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		require_once( "../connectVar.php" );
		
		$stu_id = $_SESSION['stu_id'];
		$trade_id = mysqli_real_escape_string( $conn, trim($_GET['trade']) );
		
		$query = "DELETE FROM marketSecondHand_bidList " . 
				 "WHERE marketSecondHand_bidList.trade_id = '$trade_id' AND marketSecondHand_bidList.bidder_id ='$stu_id'";
		$result = mysqli_query( $conn, $query ) or die('delete buyer error!');
		echo '<script type="text/javascript">location.href="buyerInterface.php"</script>';
	}
>>>>>>> 8196fc654633f729663dc150d634f0eef8af1a58
?>