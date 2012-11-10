<?php
	// Last Modified Day : 2012.11.10
	session_start();
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		require_once( "../connectVar.php" );
		require_once( "UserQueryFunction.php" );
		
		$stu_id = $_SESSION['stu_id'];
		//$trade_id = 4;//mysqli_real_escape_string( $conn, trim($_GET['trade']) );
		
		$query = "SELECT marketSecondHand_bidList.*, Member.username, marketSecondHand_productInfo.title ,marketsecondhand_bidlist.bidder_id " . 
				 "FROM marketSecondHand_bidList " . 
				 "LEFT JOIN marketSecondHand_trade ON marketSecondHand_bidList.trade_id = marketSecondHand_trade.trade_id " .
				 "LEFT JOIN marketSecondHand_productInfo ON marketSecondHand_trade.product_id = marketSecondHand_productInfo.product_id " .
				 "LEFT JOIN Member ON Member.stu_id = marketSecondHand_trade.stu_id " .
				 "WHERE marketSecondHand_bidList.trade_id = '$trade_id' AND marketSecondHand_bidList.bidder_id = '$stu_id' AND marketSecondHand_bidList.buy_list = 1";
		$result = mysqli_query( $conn, $query ) or die('Feedback Error!');
		$row = mysqli_fetch_array( $result );
		
		if( isset($_POST['send']) ) {
			// Insert the feedback to the comment table.			
			$market_reply = 'INSERT INTO `marketsecondhand_comment`(`trade_id`,`buyer_id`,`rate`,`feedback_content`) '.
							'VALUES("'.$_row['stu_id'].'", "'.$_row["bidder_id"].'", "'.$_POST["rate"].'", "'.$_POST["reply"].'")   "';
			$reply_result = mysqli_query($conn, $market_reply);
       		$reply_row = mysqli_fetch_array( $reply_result );
		}
	}
?>

<!DOCTYPE HTML>
<head>
	<title>Airstage - Student Market - Entrance</title>
	<link href = "../tm2.ico" rel = "shortcut icon" />
	<link href = "css/bootstrap.css" rel = "stylesheet" />
	<link href = "css/baseCss.css" rel = "stylesheet" />
	<link href="css/docs.css" rel="stylesheet">
	<meta http-equiv = "Content-Type" content = "text/html; charset = utf8" />
	<meta http-equiv = "Content-Language" content = "zh-tw" />
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
		<li>交易管理介面 <span class="divider">/</span></li>
		<li><a href="buyerInterface.php">買方總管理</a> <span class="divider">/</span></li>
		<li class="active">二手市場 - 交易回饋單填寫</li>
	</ul>
	
	<!-- Warning Area -->
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Airstage 提醒：</strong>感謝您用心填寫回饋單，AIRSTAGE會拿出更高品質的服務來回應。        
    </div>
	

	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal" id="feedback" name="feedback">
    	<legend>交易回饋單</legend>
    	
    	<div class="control-group">
		  <label class="control-label"><i class="icon-bookmark"></i> 商品名稱</label>
		  <div class="controls">
		  	<span class="input-xlarge uneditable-input"><?php echo $row['title']; ?></span>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label"><i class="icon-resize-small"></i> 成交方式</label>
		  <div class="controls">
		  	<span class="input-xlarge uneditable-input">
		  		<?php 
			  		if( $row['exchange_type'] == 0 ) echo '金錢';
			  		else if( $row['exchange_type'] == 1 ) echo '以物易物';
			  		else echo '其他';
		  		?>
		  	</span>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label"><i class="icon-shopping-cart"></i> 成交條件</label>
		  <div class="controls">
		    <span class="input-xlarge uneditable-input"><?php echo $row['exchange_info']; ?></span>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label"><i class="icon-globe"></i> 成交數量</label>
		  <div class="controls">
		    <span class="input-xlarge uneditable-input"><?php echo $row['wanted_number']; ?></span>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label"><i class="icon-user"></i> 賣方資料</label>
		  <div class="controls">
		    <a href="#" rel="popover" title="<?php echo $row['username']; ?>" data-content="<?php getSellerInfo($row['username'], $conn); ?>"><?php echo $row['username']; ?></a>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label"><i class="icon-star"></i> 評分等級</label>
		  <div class="controls">
		    <div class="btn-group" data-toggle="buttons-radio">
		        <button type="button" class="btn btn-danger" name="rate" value="1" >感覺很差</button>
		        <button type="button" class="btn btn-warning" name="rate" value="2" >不太愉快</button>
		        <button type="button" class="btn btn-primary" name="rate" value="3" >普普通通</button>
		        <button type="button" class="btn btn-info" name="rate" value="4" >態度不錯</button>
		        <button type="button" class="btn btn-success" name="rate" value="5" >完美賣家</button>
		    </div>		  
		   </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label"><i class="icon-tasks"></i> 回饋評語</label>
		  <div class="controls">
		    <textarea placeholder="寫下對賣方或本次交易的看法。。。" style="height: 200px;" name="reply"></textarea>
		  </div>
		</div>
    	
    	<div class="form-actions">
		  <button type="submit" class="btn btn-primary" name="send"><i class="icon-pencil icon-white"></i> 送出</button>
		  <button type="reset" class="btn btn-info"><i class="icon-refresh icon-white"></i> 清除重填</button>
		</div>
    </form>
	
</div>
<!-- End Container -->


		

<?php
	require_once( "marketFooter.php" );
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