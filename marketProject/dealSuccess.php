<?php
	require_once( "../global/setSession.php" );
	
	//Last Modified 2012.12.02
	//PEAR function
	require_once 'Mail.php';
	include('Mail/mime.php');
	
	
	function winnerNotification( $id, $trade_id,$left, $conn ) {
		// Send email to the winner about the trading result and the remnants.
		
		//catch the information

		$find_mail = "SELECT * FROM `Member` WHERE `stu_id`='".$id."'";
		$result_mail = mysqli_query( $conn,$find_mail );
		$row_mail = mysqli_fetch_array($result_mail);
		
		
		//catch product information
		$find_product = "SELECT * FROM `marketSecondHand_productInfo` as `i` ".
						"RIGHT JOIN `marketSecondHand_trade` as `t` ON `i`.`product_id` = `t`.`product_id` WHERE `t`.`trade_id` = '".$trade_id."'";
		$result_product = mysqli_query($conn,$find_product );
		$row_product = mysqli_fetch_array($result_product);
		
		$email_account = substr($id,-9);
				
			$from = 'airstagestudio@gmail.com';
			$to = "b".$email_account."@student.nsysu.edu.tw";
			$subject = '[系統寄信]Airstage二手市集得標通知';
			$html = '<p style="size:20px,font-weight:bold;">親愛的 '.$row_mail['username'].' 同學：</p>'.
		'<p style="margin-left:50px;">恭喜您成功在Airstage二手市場得標</p>'.
		'<p style="margin-left:50px;">商品名稱：'.$row_product['title'].'</p>'.
		'<p style="margin-left:50px;">商品剩餘數量：'.$left.'</p>'.
		'<p style="margin-left:50px;">感謝您對Airstage二手市集的支持！</p>'.
		'<p style="margin-left:300px;margin-top:20px;"><a href="http://www.airstage.com.tw/">Airstage</a></p>';
			
			$host = 'ssl://smtp.gmail.com';
			$username = 'airstagestudio@gmail.com'; // same as $from
			$password = '86088608';

			$headers = array('From' => $from,
				'To' => $to,
				'Subject' => '=?utf8?B?' . base64_encode($subject) . '?=', 
                'Content-type' => 'text/html; charset=utf-8'
			);
			
			$mime = new Mail_Mime("\n");
			$mime->setHTMLBody($html);
			
			$mime_params = array(
			  'text_encoding' => '7bit',
			  'text_charset'  => 'UTF-8',
			  'html_charset'  => 'UTF-8',
			  'head_charset'  => 'UTF-8'
			);
			
			$body = $mime->get($mime_params);
			$headers = $mime->headers($headers);
			
			$email = Mail::factory('smtp',
				array('host' => $host,
					'auth' => true,
					'username' => $username,
					'password' => $password,
					'port' => 465
				)
			);
			
			$result = $email->send($to, $headers, $body);
			
			if(PEAR::isError($result))
				echo 'Error occurred: ' . $result->getMessage();
			else
				;
				echo '<script type="text/javascript">alert("回覆已送出!"); location.href="sellerInterface.php"</script>';
					}
	
	function loserNotification( $id, $trade_id,$left, $conn ) {
		// Send email to the loser about the remaining numbers and change their bidList.
				
		//catch the information
		$find_mail = "SELECT * FROM `Member` WHERE `stu_id`='".$id."'";
		$result_mail = mysqli_query( $conn,$find_mail);
		$row_mail = mysqli_fetch_array($result_mail);
		
		//catch product information
		$find_product = "SELECT * FROM `marketSecondHand_productInfo` as `i` ".
						"RIGHT JOIN `marketSecondHand_trade` as `t` ON `i`.`product_id` = `t`.`product_id` WHERE `t`.`trade_id` = '".$trade_id."'";
		$result_product = mysqli_query( $conn,$find_product);
		$row_product = mysqli_fetch_array($result_product);
		
			$email_account = substr($id,-9);
				
			$from = 'airstagestudio@gmail.com';
			$to = "b".$email_account."@student.nsysu.edu.tw";
			$subject = '[系統寄信]Airstage二手市集未得標通知';
			$html = '<p style="size:20px,font-weight:bold;">親愛的'.$row_mail['name'].'同學：</p>'.
		'<p style="margin-left:50px;">您在Airstage二手市場投標的商品已由其他使用者得標，歡迎到市集選購其他商品</p>'.
		'<p style="margin-left:50px;">商品名稱：'.$row_product['title'].'</p>'.
		'<p style="margin-left:50px;">商品剩餘數量：'.$left.'</p>'.
		'<p style="margin-left:50px;">感謝您對Airstage二手市集的支持！</p>'.
		'<p style="margin-left:300px;margin-top:20px;"><a href="http://www.airstage.com.tw/">Airstage</a></p>';
			
			$host = 'ssl://smtp.gmail.com';
			$username = 'airstagestudio@gmail.com'; // same as $from
			$password = '86088608';

			$headers = array('From' => $from,
				'To' => $to,
				'Subject' => '=?utf8?B?' . base64_encode($subject) . '?=', 
                'Content-type' => 'text/html; charset=utf-8'
			);
			
			$mime = new Mail_Mime("\n");
			$mime->setHTMLBody($html);
			
			$mime_params = array(
			  'text_encoding' => '7bit',
			  'text_charset'  => 'UTF-8',
			  'html_charset'  => 'UTF-8',
			  'head_charset'  => 'UTF-8'
			);
			
			$body = $mime->get($mime_params);
			$headers = $mime->headers($headers);
			
			$email = Mail::factory('smtp',
				array('host' => $host,
					'auth' => true,
					'username' => $username,
					'password' => $password,
					'port' => 465
				)
			);
			
			$result = $email->send($to, $headers, $body);
			
			if(PEAR::isError($result))
				echo 'Error occurred: ' . $result->getMessage();
			else
				;
				echo '<script type="text/javascript">alert("回覆已送出!"); location.href="sellerInterface.php"</script>';
					
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
		$row = mysqli_fetch_array($result);
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
		
		$query = "SELECT marketSecondHand_bidList.*, marketSecondHand_trade.* " .
				 "FROM marketSecondHand_trade " .
				 "LEFT JOIN marketSecondHand_bidList ON marketSecondHand_bidList.trade_id = marketSecondHand_trade.trade_id " .
				 "WHERE marketSecondHand_trade.trade_id = '$trade_id' AND marketSecondHand_trade.stu_id = '$stu_id'";
		
		$result = mysqli_query( $conn, $query ) or die('Forbidden!');
				
		// Give all the commit user notifications about the product dealing info.
		while( $line = mysqli_fetch_array($result) ) {
			if( $line['bidder_id'] == $buyer_id ) {
				// The winner condition.
				winnerNotification( $line['bidder_id'], $row['trade_id'],$left, $conn );
			} else {
				// The common condition.
				loserNotification( $line['bidder_id'],$row['trade_id'],$left, $conn );
			}
		}
	}
?>