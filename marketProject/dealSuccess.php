<?php
	session_start();
	
	//Last Modified 2012.12.02
	//PEAR function
	require_once "..\member\PEAR\Mail-1.2.0\Mail.php";
	include('..\member\PEAR\Mail-1.2.0\Mail\mime.php');
	
	
	function winnerNotification( $id, $trade_id, $conn ) {
		// Send email to the winner about the trading result and the remnants.
		
		//catch the information
		$result_email = mysql_query("SELECT * FROM `member` WHERE `stu_id`=`".$id."`");
		$row_email = mysql_fetch_array($result_email);
		
		//catch product information
		$result_product = mysql_query("SELECT * FROM `marketsecondhand_productinfo` as `i` ".
		"RIGHT JOIN `marketsecondhand_trade` as `t` ON `i`.`trade_id` = `t`.`trade_id` WHERE `t`.`trade_id` = ".$trade_id."");
		$row_product = mysql_fetch_array($result_product);
				
		$from = "airstagestudio@gmail.com";
		$to = $row_email['email'];
		$subject = "[系統寄信]Airstage二手市集得標通知";
		$body = '<p style="size:20px,font-weight:bold;">親愛的'.$row_email['name'].'同學：</p>'.
		'<p style="margin-left:50px;">恭喜您成功在Airstage二手市場得標</br></br>'.
		'商品編號：'.$row_product['title'].'</br>'.
		'商品名稱：'.$row_product['title'].'：</br>'.
		'商品剩餘數量：'.$left.'</br></br>'.
		'感謝您對Airstage二手市集的支持！</p>'.
		'<p style="margin-left:300px;margin-top:200px;"><a href="http://www.airstage.com.tw/">Airstage</a></p>';
		$host = "smtp.gmail.com";
		$username = "airstagestudio"; // same as $from in most cases
		$password = "86088608";
		
		$headers = array ('From' => $from,
		'To' => $to,
		'Subject' => $subject
		);
		
		$mime = new Mail_Mime("\n");
		$mime->setHTMLBody($body);
		
		$body = $mime->get();
		$headers = $mime->headers($headers);
		
		$email = Mail::factory('smtp',
		array ('host' => $host,
		'auth' => true,
		'username' => $username,
		'password' => $password
		)
		);
		
		$result = $email->send($to, $headers, $body);
		
		if (PEAR::isError($result))
		echo "Error occurred: " . $result->getMessage();
		else;
	
		//echo $id . '<br />';
	}
	
	function loserNotification( $id, $trade_id, $conn ) {
		// Send email to the loser about the remaining numbers and change their bidList.
				
		//catch the information
		$result_email = mysql_query("SELECT * FROM `member` WHERE `stu_id`=`".$id."`");
		$row_email = mysql_fetch_array($result_email);
		
		//catch product information
		$result_product = mysql_query("SELECT * FROM `marketsecondhand_productinfo` as `i` ".
		"RIGHT JOIN `marketsecondhand_trade` as `t` ON `i`.`trade_id` = `t`.`trade_id` WHERE `t`.`trade_id` = ".$trade_id."");
		$row_product = mysql_fetch_array($result_product);
				
		$from = "airstagestudio@gmail.com";
		$to = $row_email['email'];
		$subject = "[系統寄信]Airstage二手市集未得標通知";
		$body = '<p style="size:20px,font-weight:bold;">親愛的'.$row_email['name'].'同學：</p>'.
		'<p style="margin-left:50px;">您在Airstage二手市場投標的商品已由其他使用者得標，歡迎到市集選購其他商品</br></br>'.
		'商品編號：'.$row_product['title'].'</br>'.
		'商品名稱：'.$row_product['title'].'：</br>'.
		'商品剩餘數量：'.$left.'</br></br>'.
		'感謝您對Airstage二手市集的支持！</p>'.
		'<p style="margin-left:300px;margin-top:200px;"><a href="http://www.airstage.com.tw/">Airstage</a></p>';
		$host = "smtp.gmail.com";
		$username = "airstagestudio"; // same as $from in most cases
		$password = "86088608";
		
		$headers = array ('From' => $from,
		'To' => $to,
		'Subject' => $subject
		);
		
		$mime = new Mail_Mime("\n");
		$mime->setHTMLBody($body);
		
		$body = $mime->get();
		$headers = $mime->headers($headers);
		
		$email = Mail::factory('smtp',
		array ('host' => $host,
		'auth' => true,
		'username' => $username,
		'password' => $password
		)
		);
		
		$result = $email->send($to, $headers, $body);
		//echo $id . '<br />';
	}
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		require_once( "../connectVar.php" );
		
		$stu_id = $_SESSION['stu_id'];
		$trade_id = mysqli_real_escape_string( $conn, trim($_GET['trade']) );
		$buyer_id = mysqli_real_escape_string( $conn, trim($_GET['buyer']) );
		
		$query = "SELECT marketSecondHand_bidList.*, marketSecondHand_trade.* " .
				 "FROM marketSecondHand_trade " .
				 "LEFT JOIN marketSecondHand_bidList ON marketSecondHand_bidList.trade_id = marketSecondHand_trade.trade_id " .
				 "WHERE marketSecondHand_trade.trade_id = '$trade_id' AND marketSecondHand_trade.stu_id = '$stu_id'";
		
		$result = mysqli_query( $conn, $query ) or die('Forbidden!');
		
		// Mark the winner.
		$query = "UPDATE marketSecondHand_bidList SET buy_list = 1 WHERE bidder_id = '$buyer_id'";
		$setWinner = mysqli_query( $conn, $query ) or die('setWinner Error!');
		
		// Update the product number.
		$left = $row['number'] - $row['wanted_number'];
		
		if( $left >= 0 ) {
			$query = "UPDATE marketSecondHand_trade SET number = '$left' WHERE marketSecondHand_trade.trade_id = '$trade_id'";
			$updateNum = mysqli_query( $conn, $query ) or die('updateNum Error!');
		} else {
			echo 'Number Error!';
			exit();
		}
				
		// Give all the commit user notifications about the product dealing info.
		while( $line = mysqli_fetch_array($result) ) {
			if( $line['bidder_id'] == $buyer_id ) {
				// The winner condition.
				winnerNotification( $line['bidder_id'], $row['trade_id'], $conn );
			} else {
				// The common condition.
				loserNotification( $line['bidder_id'],$row['trade_id'], $conn );
			}
		}
	}
?>