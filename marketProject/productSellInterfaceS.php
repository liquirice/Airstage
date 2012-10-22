<?php
	// Last Modified Day : 2012.10.07
	session_start();
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		require_once( "../connectVar.php" );
		$stu_id = $_SESSION['stu_id'];
		$trade_id = mysqli_real_escape_string( $conn, trim($_GET['trade']) );
		
		require_once( "UserQueryFunction.php" );
		
		// Get title Info.
		$query = "SELECT marketSecondHand_productInfo.title FROM marketSecondHand_trade " .
				 "INNER JOIN marketSecondHand_productInfo Using(product_id) " .
				 "WHERE marketSecondHand_trade.trade_id = '$trade_id' AND marketSecondHand_trade.stu_id = '$stu_id' AND marketSecondHand_productInfo.product_id = marketSecondHand_trade.product_id ";
		
		$resultTitle = mysqli_query( $conn, $query );
		$title = mysqli_fetch_array( $resultTitle );
		
		if( mysqli_num_rows($resultTitle) == 0 ) {
			echo '<script type="text/javascript">alert("You hace no rights to access this page!"); location.href="marketIndex.php"</script>';
		}
		
		// Get Current Winner Info.
		$query = "SELECT marketSecondHand_bidList.exchange_info, Member.username " .
				 "FROM marketSecondHand_trade " .
				 "LEFT JOIN marketSecondHand_bidList ON marketSecondHand_bidList.trade_id = marketSecondHand_trade.trade_id " .
				 "LEFT JOIN Member ON marketSecondHand_bidList.bidder_id = Member.stu_id " .
				 "WHERE marketSecondHand_trade.trade_id = '$trade_id' AND marketSecondHand_trade.stu_id = '$stu_id' AND marketSecondHand_bidList.buy_list = 1";
		
		$resultWinner = mysqli_query( $conn, $query ) or die('Forbidden!'); 
			
		// Get the whole bid list.
		$query = "SELECT Member.username, marketSecondHand_trade.*, marketSecondHand_productInfo.*, marketSecondHand_bidList.* " .
				 "FROM marketSecondHand_trade " . 
				 "LEFT JOIN marketSecondHand_productInfo ON marketSecondHand_productInfo.product_id = marketSecondHand_trade.product_id " .
				 "LEFT JOIN marketSecondHand_bidList ON marketSecondHand_bidList.trade_id = marketSecondHand_trade.trade_id " .				
				 "LEFT JOIN Member ON Member.stu_id = marketSecondHand_bidList.bidder_id " .		
				 "WHERE marketSecondHand_trade.trade_id = '$trade_id' AND marketSecondHand_trade.stu_id = '$stu_id' ";
				 
		$resultSecondHand = mysqli_query( $conn, $query ) or die('Forbidden!');
		
		// Get chasing list.
		$query = "SELECT Member.username, marketSecondHand_chasingList.markTime FROM marketSecondHand_trade " .
				 "LEFT JOIN marketSecondHand_chasingList ON marketSecondHand_chasingList.trade_id = marketSecondHand_trade.trade_id " .
				 "LEFT JOIN Member ON marketSecondHand_chasingList.stu_id = Member.stu_id " .
				 "WHERE marketSecondHand_trade.trade_id = '$trade_id' AND marketSecondHand_trade.stu_id = '$stu_id'";

		$resultChasing = mysqli_query( $conn, $query ) or die('Forbidden!');
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
		<li class="active">二手交易 - <?php echo $title['title']; ?></li>
	</ul>
	
	<!-- Warning Area -->
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Airstage 提醒：</strong><br />
        成交後系統會自動發信給其他出價者關於商品已經賣出的訊息，<br />
        如果剩餘的商品數量為零時則結標，不然仍會繼續拍賣，並告知其他出價者剩餘商品數量。
    </div>
	
	
	<!-- Second Hand Area -->
	<h3><?php echo $title['title']; ?></h3>
	<?php
		while( $winner = mysqli_fetch_array($resultWinner) ) {
	?>
			<h4><font color="red">得標者 - <?php echo $winner['username']; ?> - <?php echo $winner['exchange_info']; ?></font></h4>
	<?php
		}	
	?>
	<br />
	
	<h4>出價記錄</h4>	
	<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>出價帳號 <i class="icon-chevron-down"></i></th>
          <th>出價方式 <i class="icon-chevron-down"></i></th>
          <th>交易條件 <i class="icon-chevron-down"></i></th>       
          <th>出價時間 <i class="icon-chevron-down"></i></th>
          <th>得標 <i class="icon-chevron-down"></i></th>     
          <th>交易管理</th>          
        </tr>
      </thead>
      <tbody>
      <?php
      	$counter = 1;
      	while( $row = mysqli_fetch_array($resultSecondHand) ) {
      ?>
        <tr>
          <td><?php echo $counter; ?></td>
          <td>
          	<a href="#" rel="popover" title="<?php echo $row['username']; ?>" data-content="<?php getSellerInfo($row['username'], $conn); ?>"><?php echo $row['username']; ?></a>
          </td>
          <td>
	        <?php 
	        	if( $row['exchange_type'] == 0 ) echo '金錢';
	        	else if( $row['exchange_type'] == 1 ) echo '以物易物';
	        	else echo '其他';
	        ?>
          </td>
          <td>       
          	<?php echo $row['exchange_info']; ?>
          </td>
          <td>
	        <?php echo $row['update_time']; ?>
          </td> 
          <td>
          	<?php
          		if( $row['buy_list'] == 1 ) echo "<i class='icon-ok'></i>";          		
          	?>
          </td>        
          <td>          	
          	<div class="btn-group">
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action <i class="icon-edit icon-white"></i></button>
                <ul class="dropdown-menu">			
					<li><a href="<?php echo 'dealSuccess.php?trade=' . $row['trade_id'] . '&buyer=' . $row['bidder_id']; ?>"><i class="icon-ok"></i> 成交此筆</a></li>				
					<li><a href="<?php echo 'replyOffer.php?trade=' . $row['trade_id'] . '&buyer=' . $row['bidder_id']; ?>"><i class="icon-envelope"></i> 回覆出價</a></li>				  			                                             
                </ul>
              </div>
          </td>       
        </tr>
      <?php
      		$counter++;
      	}
      ?>
      </tbody>
    </table>
	
    
    <hr class="bs-docs-separator">
    <!-- Contention Area -->
    <h4>追蹤名單</h4>
    <table class="table table-striped" style="width: 300px;">
      <thead>
        <tr>
          <th>#</th>
          <th>追蹤帳號 <i class="icon-chevron-down"></i></th>
          <th>追蹤日期 <i class="icon-chevron-down"></i></th>                 
        </tr>
      </thead>
      <tbody>
      <?php
      	$counter = 1;
      	while( $chasing = mysqli_fetch_array($resultChasing) ) {
      ?>
        <tr>
          <td><?php echo $counter; ?></td>
          <td>
	          <a href="#" rel="popover" title="<?php echo $chasing['username']; ?>" data-content="<?php getSellerInfo($chasing['username'], $conn); ?>"><?php echo $chasing['username']; ?></a>
          </td>
          <td>
          	<?php echo $chasing['markTime']; ?>
          </td>                 
        </tr>                   
      <?php
      		$counter++;
      	}
      ?>
      </tbody>
    </table>
	
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