<!--設計時千萬記得改utf8編碼-->

<?php
	// Last Modified Day : 
	// 
//	require_once( "../setSession.php" );
	require_once("../connectVar.php");
	
	/*搜尋關鍵值，設定預設值*/
	$order_by = 1;		//排序依據: 1:上架時間 / 2:截標時間
	$exsit_status = 1;	//截標狀態: 0:已下架 / 1:販售中 / 2:全部
	$show_num = 5;		//顯示結果筆數
	$show_method = "ASC";	//排序方式: 1:升序ASC / 2:降序DESC
	$search_time = date();	//送出查詢時間
	
	/*設定search query*/
	function search_query( $order_by, $exsit_status, $show_num, $show_method )
	{
		$query  = "SELECT *, COUNT(*) ";
		/*連結三個資料表: trade, product, time*/
		$query .= "FROM( ( ( marketSecondHand_bidList INNER JOIN marketSecondHand_trade USING(trade_id) ) INNER JOIN marketSecondHand_productInfo USING ( product_id ))INNER JOIN marketsecondhand_time USING ( time_id ) )";
		/*截標狀態*/
		if ( $exsit_status < 2)	{ $query .= "WHERE `marketSecondHand_trade`.`exist` = '{$exsit_status}' "; }
		$query .= "GROUP BY `trade_id` ";
		/*排序依據+排序方式*/
		switch($order_by){
			case 1 :
				$query .= "ORDER BY `marketSecondHand_time`.`start_date`  {$show_method}, `marketSecondHand_time`.`start_time` {$show_method} ";
				break;
			case 2 :
				$query .= "ORDER BY `marketSecondHand_time`.`end_date` {$show_method}, `marketSecondHand_time`.`end_time` {$show_method} ";
				break;
		}
		/*顯示筆數*/
		$query .= "LIMIT 0,{$show_num} ";
		return $query;
	}
/*	
	function product_detail($detail)
	{
		$detail = mysqli_fetch_assoc($result);
		
		$trade_id = $detail['trade_id'];
		$product_id = $detail['product_id'];
		$time_id = $detail['time_id'];
		$least_price = $detail['least_price'];
		$number = $detail['number'];
		$category = $detail['category'];
		$exist = $detail['exist'];
		$start_date = $detail['start_date'];
		$start_time = $detail['start_time'];
		$end_date = $detail['end_date'];
		$end_time = $detail['end_time'];
		$title = $detail['title'];
		$description = $detail['description'];
		$product_pic = $detail['product_pic'];
		$bidder_num = $detail['COUNT(*)'];
		//$ = $detail[''];

		//分開抓(廢棄)
		//$bidList_query = "SELECT * FROM `marketSecondHand_bidList` WHERE `trade_id` = '{$trade_id}' ";
		//$bidList_result = mysqli_query( $conn, $bidList_query );
		//$bidder_num = mysqli_num_rows( $bidList_result );
		
	}
*/	
	$query = search_query( $order_by, $exsit_status, $show_num, $show_method );
//	echo $query;
	$result = mysqli_query( $conn, $query );
	while($row = mysqli_fetch_assoc($result))
	{
		$trade_id = $detail['trade_id'];
		$product_id = $detail['product_id'];
		$time_id = $detail['time_id'];
		$least_price = $detail['least_price'];
		$number = $detail['number'];
		$category = $detail['category'];
		$exist = $detail['exist'];
		$start_date = $detail['start_date'];
		$start_time = $detail['start_time'];
		$end_date = $detail['end_date'];
		$end_time = $detail['end_time'];
		$title = $detail['title'];
		$description = $detail['description'];
		$product_pic = $detail['product_pic'];
		$bidder_num = $detail['COUNT(*)'];
		//$ = $detail[''];

		print_r($row);
		echo "</br>";
	}
	
?>

<!DOCTYPE HTML>
<head>
	<title>Airstage - Student Market - Contention</title>
	<link href = "../tm2.ico" rel = "shortcut icon" />
	<link href = "css/bootstrap.css" rel = "stylesheet" />
	<link href = "css/baseCss.css" rel = "stylesheet" />
	<link href="css/docs.css" rel="stylesheet">
	<meta http-equiv = "Content-Type" content = "text/html; charset = utf8" />
	<meta http-equiv = "Content-Language" content = "zh-tw" />
	<style>
	</style>
</head>

<body>

<!--header-->
<?php
	require_once( "marketNavi.php" );
	require_once( "marketAnnouce.php" );
?>

<!--整頁內容包container裡面-->
<div class = "container" >

	<!--進度條-->
	<div class="progress progress-striped active">
		<div class="bar bar-primary" style="width: 60%;"></div>
	</div>
	
	<!--market bar-->
    <?php
	    require_once( "memberStateLine.php" );
	?>
	
	<!--路徑欄-->
	<ul class="breadcrumb">
		<li><a href="marketIndex.php">市場首頁</a> <span class="divider">/</span></li>
		<!--li>子目錄 <span class="divider">/</span></li-->
		<li class="active">當前頁面</li>
	</ul>

	<!-- Warning Area -->
	<div class="alert alert-danger fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Attention!</strong> &nbsp;請務必閱讀競標規則再進入唷！
	</div>
	
	<!--每個橫段有row、row-fluid(稍擠)二種選擇-->
	<div class="row">
		<!-- 空間內由一至數個span*組成，*=1~12 -->
		<!-- 數量不限，*的總合<=12，12為最佳狀態剛好填滿。以下為範例-->
		<div class="span6"></div>
		<div class="span6"></div>
	</div>
	<div class="row-fluid">
		<div class="span2"></div>
		<div class="span4"></div>
		<div class="span3"></div>
		<div class="span3"></div>
	</div>
</div>

<!--Footer-->
<?php
	require_once( "marketFooter.php" );
	
	//$_SERVER['PHP_SELF'];
?>

<script src = "js/bootstrap-modal.js"></script>
<script src = "js/jquery.js"></script>
<script src = "js/application.js"></script>
<script src = "js/bootstrap-transition.js"></script>
<script src = "js/bootstrap-alert.js"></script>
<script src = "js/bootstrap-modal.js"></script>
<script src = "js/bootstrap-dropdown.js"></script>
<script src = "js/bootstrap-scrollspy.js"></script>
<script src = "js/bootstrap-tab.js"></script>
<script src = "js/bootstrap-tooltip.js"></script>
<script src = "js/bootstrap-popover.js"></script>
<script src = "js/bootstrap-button.js"></script>
<script src = "js/bootstrap-collapse.js"></script>
<script src = "js/bootstrap-carousel.js"></script>
<script src = "js/bootstrap-typeahead.js"></script>
<script src = "js/bootstrap-affix.js"></script>
</body>
</html>