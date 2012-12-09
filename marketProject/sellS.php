<?php
	// Last Modified Day : 2012.09.23
	
	session_start();
	
	//確定登入狀態
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) )
	{
		echo "<script type='text/javascript'>alert('請先登入!'); history.back();</script>";
	}
	else
	{
		//連接資料庫
		require_once("../connectVar.php");
		
		//接收表單資料
		$stu_id = mysqli_real_escape_string( $conn, trim( $_SESSION['stu_id']) );
		$least_price = mysqli_real_escape_string( $conn, trim( $_POST['least_price']) );
		$cat1 = mysqli_real_escape_string( $conn, trim( $_POST['cat1']) );
		$cat2 = mysqli_real_escape_string( $conn, trim( $_POST['cat2']) );
		$cat3 = mysqli_real_escape_string( $conn, trim( $_POST['cat3']) );
		$title = mysqli_real_escape_string( $conn, trim( $_POST['title']) );
		$number = mysqli_real_escape_string( $conn, trim( $_POST['number']) );
		$end_date = mysqli_real_escape_string( $conn, trim( $_POST['end_date']) );
		$end_time = mysqli_real_escape_string( $conn, trim( $_POST['end_time']) ).":00";
		$description = mysqli_real_escape_string( $conn, str_replace( chr(13).chr(10), "<br>", trim($_POST['product_detail']) ) );
		
		//category
		$cat1 = str_pad( $cat1, 2, "0", STR_PAD_LEFT ); 
		$cat2 = str_pad( $cat2, 4, "0", STR_PAD_LEFT ); 		
		$cat3 = str_pad( $cat3, 4, "0", STR_PAD_LEFT ); 
		$categoryS = $cat1.$cat2.$cat3; 
		if( strlen($categoryS) != 10 )
		{
			echo "<script type='text/javascript'>alert('分類編碼有誤，請回上頁重填!'); history.back();</script>";
			exit();
		}
		
		//marketsecondhand_time
		//1.[預設]刊登期間最長30天，day*24+hr<720；　2.紀錄現在時間&結束時間；　3.寫進time資料表，並取得time_id
		//有bug
		$start_date = date("Y-m-d");
		$start_time = date("H:i:s");
		if( date('Y-m-d', strtotime('+30 DAY')) < $end_date )
		{ 
			echo '<script type="text/javascript">alert("物品刊登時間請勿超過30天!"); history.back();</script>'; 
			exit();
		}
		else
		{
			$time_insert = "INSERT INTO `marketSecondHand_time` (`time_id`, `start_date`, `start_time`, `end_date`, `end_time`) VALUES (NULL, '{$start_date}', '{$start_time}', '{$end_date}', '{$end_time}')";
			$time_check = mysqli_query($conn,$time_insert);
			$time_id = mysqli_insert_id($conn);
		}
		
		//marketsecondhand_productinfo
		//1.title / description / product_pic(可省) 2.description要注意換行 3.寫進資料表，並取得product_id
		$info_insert = "INSERT INTO `marketSecondHand_productInfo` (`product_id`, `title`, `description`, `product_pic`) VALUES (NULL, '{$title}', '{$description}', '')";
		$info_check = mysqli_query($conn,$info_insert);
		$product_id = mysqli_insert_id($conn);
		
		//marketsecondhand_trade
		//1.stu_id / trade_id / least_price / number / product_id / time_id / category / exist=-1
		$trade_insert = "INSERT INTO `marketSecondHand_trade` (`stu_id`, `trade_id`, `least_price`, `number`, `product_id`, `time_id`, `category`, `exist`) VALUES ('$stu_id', NULL, '$least_price', '$number', '$product_id', '$time_id', '$categoryS', '-1')";
		$trade_check = mysqli_query($conn,$trade_insert);
		$trade_id = mysqli_insert_id($conn);
		
		// Product Pic
		define( 'MAXSIZE', '1048576' ); // 1MB
		$picName = $_FILES['product_pic']['name'];
		$picType = $_FILES['product_pic']['type'];
		$picSize = $_FILES['product_pic']['size'];
		if( !empty($picName) ) {
			if( (($picType == 'image/gif') || ($picType == 'image/jpeg') || ($picType == 'image/png') || ($picType == 'image/pjpeg')) && ($picSize > 0) && ($picSize <= MAXSIZE) ) {
				if( $_FILES['product_pic']['error'] == 0 ) {
					// Move to the target folder.
					$picName = $trade_id.$picName;
					$target = "../member/images/{$stu_id}/market/".$picName;
					if( move_uploaded_file( $_FILES['product_pic']['tmp_name'], $target ) ) {
						$query = "UPDATE marketSecondHand_productInfo SET product_pic = '$picName' WHERE product_id = '$product_id'";
						$result = mysqli_query( $conn, $query );
					}
				}
			}
		}
		
		
		//三張資料表皆成功寫入，更新exist = 1
		if( $time_check && $info_check && $trade_check )
		{
			$existUpdate = "UPDATE `marketSecondHand_trade` SET `exist` = '1' WHERE `marketSecondHand_trade`.`trade_id` = '$trade_id';";
			if ( mysqli_query( $conn, $existUpdate ) )
				echo "<script type='text/javascript'>alert('物品刊登完成，系統將轉至詳細資訊頁'); location.href='./productDetail.php?trade=$trade_id';</script>";
		}
		else
		{
			$deleteTime = "DELETE FROM `marketSecondHand_time` WHERE `time_id` = '$time_id'";
			mysqli_query( $conn, $deleteTime );
			$deleteInfo = "DELETE FROM `marketSecondHand_productInfo` WHERE `product_id` = '$product_id'";
			mysqli_query( $conn, $deleteInfo );
			$deleteTrade = "DELETE FROM `marketSecondHand_trade` WHERE `trade_id` = '$trade_id'";
			mysqli_query( $conn, $deleteTrade );
			echo '<script type="text/javascript">alert("物品刊登失敗，請稍後再試。"); history.back();</script>'; 
		}
	}
?>