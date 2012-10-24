<?php
	session_start();
	
	function winnerNotification( $id, $conn ) {
		// Send email to the winner about the trading result and the remnants.
		echo $id . '<br />';
	}
	
	function loserNotification( $id, $conn ) {
		// Send email to the loser about the remaining numbers and change their bidList.
		echo $id . '<br />';
	}
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		require_once( "../connectVar.php" );
		
		$stu_id = $_SESSION['stu_id'];
		$trade_id = mysqli_real_escape_string( $conn, trim($_GET['trade']) );
		$buyer_id = mysqli_real_escape_string( $conn, trim($_GET['buyer']) );
		
		$query = "SELECT marketSecondHand_bidList.*, marketSecondHand_trade.number " .
				 "FROM marketSecondHand_trade " .
				 "LEFT JOIN marketSecondHand_bidList ON marketSecondHand_bidList.trade_id = marketSecondHand_trade.trade_id " .
				 "WHERE marketSecondHand_trade.trade_id = '$trade_id' AND marketSecondHand_trade.stu_id = '$stu_id'";
		
		$result = mysqli_query( $conn, $query ) or die('Forbidden!');
		
		// Mark the winner.
		$query = "UPDATE marketSecondHand_bidList SET buy_list = 1 WHERE bidder_id = '$buyer_id'";
		$setWinner = mysqli_query( $conn, $query ) or die('setWinner Error!');
		
		// Update the product number.
		$left = $row['number'] - $row['wanted_number'];
		$query = "UPDATE marketSecondHand_trade SET number = '$left' WHERE marketSecondHand_trade.trade_id = '$trade_id'";
		$updateNum = mysqli_query( $conn, $query ) or die('updateNum Error!');
		
		// Give all the commit user notifications about the product dealing info.
		while( $line = mysqli_fetch_array($result) ) {
			if( $line['bidder_id'] == $buyer_id ) {
				// The winner condition.
				winnerNotification( $line['bidder_id'], $conn );
			} else {
				// The common condition.
				loserNotification( $line['bidder_id'], $conn );
			}
		}
	}
?>