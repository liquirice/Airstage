<?php
	session_start();
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		require_once( "../connectVar.php" );
		require_once( "UserQueryFunction.php" );
		
		$stu_id = $_SESSION['stu_id'];
		$trade_id = mysqli_real_escape_string( $conn, trim($_GET['trade']) );
		$buyer_id = mysqli_real_escape_string( $conn, trim($_GET['buyer']) );
		
		$query = "SELECT marketSecondHand_productInfo.title, marketSecondHand_bidList.*, Member.username, Member.email, marketSecondHand_trade.least_price " .
				 "FROM marketSecondHand_trade " .
				 "LEFT JOIN marketSecondHand_bidList ON marketSecondHand_bidList.trade_id = marketSecondHand_trade.trade_id " .
				 "LEFT JOIN marketSecondHand_productInfo ON marketSecondHand_productInfo.product_id = marketSecondHand_trade.product_id " .
				 "LEFT JOIN Member ON Member.stu_id = marketSecondHand_bidList.bidder_id " .
				 "WHERE marketSecondHand_trade.trade_id = '$trade_id' AND marketSecondHand_trade.stu_id = '$stu_id' AND marketSecondHand_bidList.bidder_id = '$buyer_id'";
				 
		$result = mysqli_query( $conn, $query ) or die('Forbidden!');
		
		/*if( mysqli_num_rows($result) == 0 ) {
			echo '<script type="text/javascript">alert("You have No Rights To Access This Page!"); location.href="marketIndex.php"</script>';	
		}*/
		
		$row = mysqli_fetch_array( $result );
		
		if( isset($_POST['send']) ) {
			// TODO : Send Email to the buyer by gmail.
		}
	}
	
?>

<!DOCTYPE HTML>
<head>
	<title>Student Market - 買賣管理</title>
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
		<li><a href="sellerInterface.php">賣方總管理</a> <span class="divider">/</span></li>
		<li class="active">交易回覆頁 - <?php echo $row['title']; ?></li>
	</ul>
	
	<!-- Warning Area -->
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Airstage 提醒：</strong>寫好的回覆會經由Email的方式發信給該出價者。
    </div>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal">
    	<legend>交易回覆表單</legend>
    	
    	<div class="control-group">
		  <label class="control-label" for="inputEmail">商品名稱</label>
		  <div class="controls">
		  	<span class="input-xlarge uneditable-input"><?php echo $row['title']; ?></span>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label" for="inputEmail">自訂最低出價</label>
		  <div class="controls">
		  	<span class="input-xlarge uneditable-input"><?php echo $row['least_price']; ?></span>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label" for="inputPassword">買方資料</label>
		  <div class="controls">
		    <a href="#" rel="popover" title="<?php echo $row['username']; ?>" data-content="<?php getSellerInfo($row['username'], $conn); ?>"><?php echo $row['username']; ?></a>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label" for="inputPassword">交易方式</label>
		  <div class="controls">
		    <span class="input-xlarge uneditable-input">
		    <?php 
		    	if( $row['exchange_type'] == 0 ) echo '金錢';
		    	else if( $row['exchange_type'] == 1 ) echo'以物易物';
		    	else echo '其他'; 
		    ?>
		    </span>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label" for="inputPassword">買方條件</label>
		  <div class="controls">
		    <span class="input-xlarge uneditable-input"><?php echo $row['exchange_info']; ?></span>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label">回覆需求</label>
		  <div class="controls">
		    <textarea placeholder="寫下想跟買方說的話。。。" style="height: 200px;" name="reply"></textarea>
		  </div>
		</div>
    	
    	<div class="form-actions">
		  <button type="submit" class="btn btn-primary" name="send"><i class="icon-plane icon-white"></i> 寄出</button>
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