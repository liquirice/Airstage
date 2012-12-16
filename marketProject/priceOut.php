<?php
	require_once( "../global/setSession.php" );
	require_once("../global/connectVar.php");
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入唷～"); location.href="../index.php"</script>';
		exit();
	} else {
		// TODO
		// 判斷為"新增"或"修改"出價
		// 測試資料
		$stu_id = $_SESSION['stu_id'];
		$trade_id = mysqli_real_escape_string( $conn, trim($_GET['trade']) );
		
		$query = "SELECT marketSecondHand_bidList.*, marketSecondHand_productInfo.title FROM marketSecondHand_bidList " . 
				 "LEFT JOIN marketSecondHand_trade ON marketSecondHand_bidList.trade_id = marketSecondHand_trade.trade_id " .
				 "LEFT JOIN marketSecondHand_productInfo ON marketSecondHand_trade.product_id = marketSecondHand_productInfo.product_id " .
				 "WHERE marketSecondHand_bidList.trade_id = '$trade_id' AND marketSecondHand_bidList.bidder_id = '$stu_id'";
		$result = mysqli_query( $conn, $query ) or die('Query Error');
		
		if( mysqli_num_rows($result) == 0 ) {
			// New Price Out.
		} else {
			// Modify The Previous Price.
			if( $row['buy_list'] == 1 ) {
				echo '<script type="text/javascript">alert("您已經得標囉~不能再修改出價了"); location.href="buyerInterface.php"</script>';
			}
			$row = mysqli_fetch_array( $result );
		}
	} 
?>
<!DOCTYPE HTML>
<head>
	<title>Airstage Market - 商品出價頁</title>
	<link href = "../tm2.ico" rel = "shortcut icon" />
	<link href = "css/bootstrap.css" rel = "stylesheet" />
	<link href = "css/baseCss.css" rel = "stylesheet" />
	<link href="css/docs.css" rel="stylesheet">
	<meta http-equiv = "Content-Type" content = "text/html; charset = utf8" />
	<meta http-equiv = "Content-Language" content = "zh-tw" />
	<style>
		h3, h2, h1, table, tr, td, li, ul, th, p, legend, label, option, button {
			font-family: "微軟正黑體", "Arial";
		}
	</style>
	<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" language="javascript">var app = "market";</script>
</head>

<body>
	<?php
		require_once( "marketNavi.php" );
		require_once( "marketAnnouce.php" );
	?>

	<!-- Container Start -->
	<div class = "container" >
		<?php
			require_once( "memberStateLine.php" );
		?>
	
		<ul class="breadcrumb">
			<li><a href="marketIndex.php">市場首頁</a> <span class="divider">/</span></li>
			<li class="active">商品出價頁</li>
		</ul>
	
		<!-- Warning Area -->
		<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Airstage 提醒 : </strong>可以在跟賣方溝通之後修改您的出價唷! 
		</div>
	
		<form class="form-horizontal" action="buyS.php" method="post">
		<legend>商品出價單</legend>
			<div class="control-group">
				<input type="hidden" name="trade" id="trade" value="<?php echo $trade_id; ?>">
				<label class="control-label">商品標題</label>
				<div class="controls" style="font-family: '微軟正黑體', 'Arial';">
					<?php echo $row['title']; ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">我要用 </label>
				<div class="controls">
					<input type="radio" name="pay_type" id="pay_type" value="0" <?php if( $row['exchange_type'] == 0 ) echo 'checked'; ?> />&nbsp; 錢 &nbsp;
					<input type="radio" name="pay_type" id="pay_type" value="1" <?php if( $row['exchange_type'] == 1 ) echo 'checked'; ?>/>&nbsp; 物品 &nbsp;　
					<input type="radio" name="pay_type" id="pay_type" value="2" <?php if( $row['exchange_type'] == 2 ) echo 'checked'; ?>/>&nbsp; 錢+物品 &nbsp;　
					<input type="text" name="pay_info" id="pay_info" value="<?php echo $row['exchange_info']; ?>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">交換</label>
				<div class="controls">
					<input class="input-mini" type="text" name="num" id="num" value="<?php echo $row['wanted_number']; ?>" /> 個
				</div>
			</div>			
			<div class="control-group">
				<div class="controls">
				<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> 確定出價</button>
			</div>
		</form>
	</div>
</div>


</div>
<!-- End Container -->


<?php
	require_once( "marketFooter.php" );
?>


<script src = "js/bootstrap-modal.js"></script>
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