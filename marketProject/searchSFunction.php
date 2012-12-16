<?php 

/*加入追蹤*/
function add_chase( $stu_id, $trade_id ) {
	$check_query = "SELECT `star` FROM `chasing_list` WHERE `stu_id` = '$stu_id' AND `trade_id` = '$trade_id'";
	$chech_result = mysqli_query( $conn, $check_query );	
	$num = mysqli_num_rows($result);
	if( $num == 1 )
	{	//delete
		$query = "DELETE FROM `chasing_list` WHERE `stu_id` = '$stu_id' AND `trade_id` = '$trade_id'";
		$alt = "已從追蹤清單移除";
	}
	else if( $num == 0 )
	{	
		//查無商品的話?
		
		//insert
		$query = "INSERT INTO `chasing_list`(`stu_id`, `trade_id`, `star`) VALUES ('$stu_id', '$trade_id', 1)";
		$alt = "已加入追蹤清單";
	}
	if( mysqli_query( $conn, $query ) )
	{
		echo '<script type="text/javascript">alert("'.$alt.'");</script>';
	}
	else
	{
		echo '<script type="text/javascript">alert("追蹤失敗，請重新嘗試或聯絡管理人員");</script>';
	}	
}

/*印出分類*/
function echoCategory($category){
	$category_1 = substr($category, 0, 2);
	$category_2 = substr($category, 0, 6);
	$category_3 = substr($category, 0, 10);
	//判斷第1層目錄
	switch ($category_1){
		case '01':
			$category_1 = 書籍雜誌;
			break;
		case '02':
			$category_1 = 生活雜務;
			break;
	}
	//判斷第2層目錄
	switch ($category_2){
		case '010001':
			$category_2 = 課程用書;
			break;
		case '010002':
			$category_2 = 一般書籍;
			break;
		case '010003':
			$category_2 = 報刊雜誌;
			break;
		case '010004':
			$category_2 = 外文書籍;
			break;
		case '020001':
			$category_2 = 服飾精品;
			break;
		case '020002':
			$category_2 = 美容保養;
			break;
		case '020003':
			$category_2 = 文具小物;
			break;
		case '020004':
			$category_2 = '3C產品';
			break;
		case '020005':
			$category_2 = 各式票券;
			break;
		case '020006':
			$category_2 = 家具家電;
			break;
		case '020007':
			$category_2 = 交通工具;
			break;
		case '020008':
			$category_2 = 食品;
			break;
		case '020009':
			$category_2 = 其他雜物;
			break;
	}
	//判斷第3層目錄
	switch ($category_3){
		case '0100010001':
			$category_3 = 文學院;
			break;
		case '0100010002':
			$category_3 = 理學院;
			break;
		case '0100010003':
			$category_3 = 工學院;
			break;
		case '0100010004':
			$category_3 = 管理學院;
			break;
		case '0100010005':
			$category_3 = 海洋科學院;
			break;
		case '0100010006':
			$category_3 = 社會科學院;
			break;
		case '0100010007':
			$category_3 = 通識課程;
			break;
		case '0100010008':
			$category_3 = 其他課程;
			break;
		case '0100020001':
			$category_3 = 商業理財;
			break;
		case '0100020002':
			$category_3 = 文學小說;
			break;
		case '0100020003':
			$category_3 = 藝術設計;
			break;
		case '0100020004':
			$category_3 = 人文科普;
			break;
		case '0100020005':
			$category_3 = 語言電腦;
			break;
		case '0100020006':
			$category_3 = 心靈養生;
			break;
		case '0100020007':
			$category_3 = 休閒生活;
			break;
		case '0100020008':
			$category_3 = 其他書籍;
			break;
		case '0100030001':
			$category_3 = 新聞時事;
			break;
		case '0100030002':
			$category_3 = 財經企管;
			break;
		case '0100030003':
			$category_3 = 語言、文學、史地;
			break;
		case '0100030004':
			$category_3 = 科學、電腦;
			break;
		case '0100030005':
			$category_3 = 藝術、設計、攝影;
			break;
		case '0100030006':
			$category_3 = 相機攝影;
			break;
		case '0100030007':
			$category_3 = 流行時尚、影視偶像;
			break;
		case '0100030008':
			$category_3 = 旅遊、休閒、生活;
			break;
		case '0100030009':
			$category_3 = 其他雜誌;
			break;
		case '0100040001':
			$category_3 = 商業理財;
			break;
		case '0100040002':
			$category_3 = 文學小說;
			break;
		case '0100040003':
			$category_3 = 藝術設計;
			break;
		case '0100040004':
			$category_3 = 人文科普;
			break;
		case '0100040005':
			$category_3 = 語言電腦;
			break;
		case '0100040006':
			$category_3 = 心靈養生;
			break;
		case '0100040007':
			$category_3 = 休閒生活;
			break;
		case '0100040008':
			$category_3 = 其他書籍;
			break;
		case '0200010001':
			$category_3 = 女性時裝;
			break;
		case '0200010002':
			$category_3 = 男性時裝;
			break;
		case '0200010003':
			$category_3 = 其他;
			break;
		case '0200020001':
			$category_3 = 保養用品;
			break;
		case '0200020002':
			$category_3 = 化妝用品;
			break;
		case '0200020003':
			$category_3 = 健身用品;
			break;
		case '0200020004':
			$category_3 = 清潔用品;
			break;
		case '0200020005':
			$category_3 = 其他;
			break;
		case '0200030001':
			$category_3 = 文具用品;
			break;
		case '0200030002':
			$category_3 = 收納整理;
			break;
		case '0200030003':
			$category_3 = 其他;
			break;
		case '0200040001':
			$category_3 = 電腦與周邊;
			break;
		case '0200040002':
			$category_3 = 手機與周邊;
			break;
		case '0200040003':
			$category_3 = 影音與周邊;
			break;
		case '0200040004':
			$category_3 = 其他;
			break;
		case '0200050001':
			$category_3 = 交通票券;
			break;
		case '0200050002':
			$category_3 = 活動票券;
			break;
		case '0200050003':
			$category_3 = 餐券票券;
			break;
		case '0200050004':
			$category_3 = 電影票券;
			break;
		case '0200050005':
			$category_3 = 其他;
			break;
		case '0200060001':
			$category_3 = 電冰箱;
			break;
		case '0200060002':
			$category_3 = 廚房家電;
			break;
		case '0200060003':
			$category_3 = 其他家電;
			break;
		case '0200060004':
			$category_3 = 衛浴用品;
			break;
		case '0200060005':
			$category_3 = 各種家具;
			break;
		case '0200070001':
			$category_3 = 腳踏車;
			break;
		case '0200070002':
			$category_3 = 其他;
			break;
		case '0200080001':
			$category_3 = 食品;
			break;
		case '0200090001':
			$category_3 = 其他;
			break;
	}

	$echoCat[1] = $category_1;
	$echoCat[2] = $category_2;
	$echoCat[3] = $category_3;
	
	return $echoCat;
}

?>