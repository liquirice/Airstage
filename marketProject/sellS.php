<?php
	// Last Modified Day : 2012.09.23
	
	Session_start();
	
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
		//以後cat1+cat2+cat3會改成直接由表單中的cat3來決定
		$cat1 = mysqli_real_escape_string( $conn, trim( $_POST['cat1']) );
		$cat2 = mysqli_real_escape_string( $conn, trim( $_POST['cat2']) );
		$cat3 = mysqli_real_escape_string( $conn, trim( $_POST['cat3']) );
		$categoryS = $cat1.$cat2.$cat3;
		$title = mysqli_real_escape_string( $conn, ltrim( $_POST['title']) );
		$number = mysqli_real_escape_string( $conn, trim( $_POST['number']) );
		$end_date = mysqli_real_escape_string( $conn, trim( $_POST['end_date']) );
		$end_time = mysqli_real_escape_string( $conn, trim( $_POST['end_time']) ).":00";
		$description= mysqli_real_escape_string( $conn, str_replace( chr(13).chr(10), "<br>", $_POST['product_detail'] ) );
		//$_POST['product_info']);
		
		//處理圖片
		/* Profile Pic.
		$picName = $_FILES['product_pic']['name'];
		$picType = $_FILES['product_pic']['type'];
		$picSize = $_FILES['product_pic']['size'];
			
		if( !empty($picName) ) {
			if( (($picType == 'image/gif') || ($picType == 'image/jpeg') || ($picType == 'image/png') || ($picType == 'image/pjpeg')) && ($picSize > 0) && ($picSize <= MAXSIZE) ) {
				if( $_FILES['product_pic']['error'] == 0 ) {
					// Move to the target folder.
					$target = ;
					if( move_uploaded_file( $_FILES['product_pic']['tmp_name'], $target) ) {
						$query = "UPDATE member_Info SET product_pic = '$picName' WHERE stu_id = '$stu_id'";
						$result = mysqli_query( $conn, $query ) or die('Update Error0');
					}
				}
			}
		}
		*/
		
		//marketsecondhand_time
		//1.[預設]刊登期間最長30天，day*24+hr<720；　2.紀錄現在時間&結束時間；　3.寫進time資料表，並取得time_id
		//有bug
		$start_date = date("Y-m-d");
		$start_time = date("H:i:s");
		if( date('Y-m-d', strtotime('+30 DAY')) < $end_date ) { echo '<script type="text/javascript">alert("物品刊登時間請勿超過30天!"); history.back();</script>'; }
		else{
			$time_insert = "INSERT INTO `airstage`.`marketSecondHand_time` (`time_id`, `start_date`, `start_time`, `end_date`, `end_time`) VALUES ('', '{$start_date}', '{$start_time}', '{$end_date}', '{$end_time}')";
			$time_check = mysqli_query($conn,$time_insert);
			$time_id = mysqli_insert_id($conn);
			echo "<script type='text/javascript'>alert('{$time_check}!');</script>";
		}
		
		
		//marketsecondhand_productinfo
		//1.title / description / product_pic(可省) 2.description要注意換行 3.寫進資料表，並取得product_id
		$info_insert = "INSERT INTO `airstage`.`marketSecondHand_productInfo` (`product_id`, `title`, `description`, `product_pic`) VALUES (NULL, '{$title}', '{$description}', '')";
		$info_check = mysqli_query($conn,$info_insert);
		$product_id = mysqli_insert_id($conn);
		echo "<script type='text/javascript'>alert('{$product_id}!');</script>";
		
		//marketsecondhand_trade
		//1.stu_id / trade_id / least_price / number / product_id / time_id / category / exist=-1
		$trade_insert = "INSERT INTO `airstage`.`marketSecondHand_trade` (`stu_id`, `trade_id`, `least_price`, `number`, `product_id`, `time_id`, `category`, `exist`) VALUES ('$stu_id', '', '$least_price', '$number', '$product_id', '$time_id', '$categoryS', '-1')";
		$trade_check = mysqli_query($conn,$trade_insert);
		$trade_id = mysqli_insert_id($conn);
		echo "<script type='text/javascript'>alert('{$trade_check}!');</script>";
		
		//三張資料表皆成功寫入，更新exist = 1
		if( $time_check && $info_check && $trade_check )
		{
			$exist1 = "UPDATE `airstage`.`marketSecondHand_trade` SET `exist` = '1' WHERE `marketSecondHand_trade`.`trade_id` = '$trade_id';";
			echo "<script type='text/javascript'>alert('OK!'); history.back();</script>";
		}
		else
		{
			echo mysqli_error($info_check);
			echo "<script type='text/javascript'>alert('NO!');</script>";
		}
	}
	/*
	function time_insert()
	{
	}
	function productinfo_insert()
	{
	}
	function trade_insert()
	{
	}
	*/
?>