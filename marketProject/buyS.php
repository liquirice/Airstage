<?php
	// Last Modified Day : 2012.12.09
	
	echo "now loading...";

	require_once( "../setSession.php" );
	
	//確定登入狀態
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) )	{
		echo '<script type="text/javascript">alert("請先登入唷～"); history.back();</script>';
		exit();
	} else if( $_SESSION['auth'] < 1 ) {
		echo '<script type="text/javascript">alert("請先通過信箱認證，才可以進行市集的交易唷！"); history.back();"</script>';
		exit();
	}

	//接收資料
	$bidder_id = $_SESSION['stu_id'];
	$trade_id = mysqli_real_escape_string( $conn, trim( $_POST['trade']) );
	$exchange_type = mysqli_real_escape_string( $conn, trim( $_POST['pay_type']) );
	$exchange_info = mysqli_real_escape_string( $conn, trim( $_POST['pay_info']) );
	$wanted_number = mysqli_real_escape_string( $conn, trim( $_POST['num']) );
	
	//連接資料庫
	require_once("../connectVar.php");
	
	//確認商品資訊
	$query = "SELECT * FROM `marketSecondHand_trade` WHERE `trade_id` = '$trade_id'";
	$result = mysqli_query( $conn, $query );
	if( mysqli_num_rows($result) == 0 )	{
		echo '<script type="text/javascript">alert("沒有這項商品唷！"); history.back();</script>';
		exit();
	}

	$row = mysqli_fetch_array($result);

	//商品已結標
	if( $row['exist'] <= 0 ) {
		echo '<script type="text/javascript">alert("出價失敗！商品已經下價或截標囉！"); history.back();</script>';
		exit();
	}
	//出價數 > 剩餘數
	if( $row['number'] < $wanted_number ) {
		echo '<script type="text/javascript">alert("出價失敗！商品剩餘量不足，請重新確認下標數量。"); history.back();</script>';
		exit();
	}
	
	//確認為可出價的商品，查詢買家出價紀錄
	$query = "SELECT * FROM `marketSecondHand_bidList` WHERE `trade_id` = '$trade_id' AND `bidder_id` = '$bidder_id'";
	$result = mysqli_query( $conn, $query );
	$times = mysqli_num_rows($result);
	
	if( $times == 0 )	
	{	//當出價紀錄為0筆 : INSERT
		$bid_query = "INSERT INTO `marketSecondHand_bidList` (`bidder_id`, `trade_id`, `exchange_type`, `exchange_info`, `wanted_number`, `buy_list`, `update_time`) VALUES ( '$bidder_id', '$trade_id', '$exchange_type', '$exchange_info', '$wanted_number', '0', now() );";
	}
	else if( $times == 1 )
	{	//曾出過架 - 更新出價 : UPDATE
		$bid_query = "UPDATE `marketSecondHand_bidList` SET `exchange_type` = '$exchange_type', `exchange_info` = '$exchange_info', `wanted_number` = '$wanted_number' WHERE `bidder_id` = '$bidder_id' AND `trade_id` = '$trade_id' ;";
	}
	else
	{	//出現二筆以上資料 : GG
		echo '<script type="text/javascript">alert("出價失敗！資料庫錯誤！請與管理人員聯絡。"); history.back();</script>';
		exit();
	}
		
	if( mysqli_query( $conn, $bid_query ) )
	{
		echo '<script type="text/javascript">alert("已經完成出價！"); history.back();</script>';
	}
	else
	{
		echo '<script type="text/javascript">alert("出價失敗！請稍後重試！"); history.back();</script>';
	}

?>