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
		
		$bidder_id = mysqli_real_escape_string( $conn, trim( $_SESSION['stu_id']) );
		$trade_id = mysqli_real_escape_string( $conn, trim( $_POST['trade_id']) );
		$exchange_type = mysqli_real_escape_string( $conn, trim( $_POST['exchange_type']) );
		$exchange_info = mysqli_real_escape_string( $conn, trim( $_POST['exchange_info']) );
		$wanted_number = mysqli_real_escape_string( $conn, trim( $_POST['wanted_number']) );

		//檢查info字串長度		
		//檢查number是否<=剩餘數量
		
		//僅寫入或更新bidList
		//先用stu_id+trade_id判斷為新出價或更新出價
		$result = mysqli_query( $conn, "SELECT * FROM `marketSecondHand_bidList` WHERE `bidder_id` = '{$bidder_id}' AND `trade_id` = '{$trade_id}'" );
		$new_check = mysqli_fetch_assoc($result);
		
		//結果數量=0:新出價
		if(1){
			//insert: marketSecondHand_bidList
			//bidder_id, trade_id, exchange_type, exchange_info, wanted_number, buy_list=0, update_time=NULL
		}
		//結果數量=1:修改出價
		else if(1){
			//先判斷buy_list為0或1，是否已為得標者(是否要讓已得標者能夠再次出價!?!?!?!?)
			if(!1){}
			else{}
			//where : bidder_id, trade_id
			//update: exchange_type, exchange_info, wanted_number, buy_list=0, update_time=NULL

		}
		//結果數量>1:error
		else{
			echo "<script type='text/javascript'>alert('系統錯誤！請回報管理人員！'); history.back();</script>";
		}
		
	}
?>