<?php
	session_start();
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		require_once( "../connectVar.php" );
		$stu_id = $_SESSION['stu_id'];
		
		if( isset($_GET['permute']) ) {
			@$permute = mysqli_real_escape_string( $conn, trim($_GET['permute']) );
			@$priority = mysqli_real_escape_string( $conn, trim($_GET['priority']) );
		
			if( $priority == 'u' ) {
				$query = "SELECT trade_id, title, start_date, exist, " . 
						 "( SELECT COUNT(bidder_id) FROM marketSecondHand_bidList WHERE marketSecondHand_trade.trade_id = marketSecondHand_bidList.trade_id ) AS BuyNum, " . 
						 "( SELECT COUNT(markTime) FROM marketSecondHand_chasingList WHERE marketSecondHand_trade.trade_id = marketSecondHand_chasingList.trade_id ) AS Chase " .
						 "FROM marketSecondHand_trade " .		
						 "LEFT JOIN marketSecondHand_productInfo ON marketSecondHand_trade.product_id = marketSecondHand_productInfo.product_id " .					 
						 "LEFT JOIN marketSecondHand_time ON marketSecondHand_trade.time_id = marketSecondHand_time.time_id " .				 
						 "WHERE marketSecondHand_trade.stu_id = '$stu_id'" .
						 "ORDER BY $permute DESC";
			} else if( $priority == 'd' ) {
				$query = "SELECT trade_id, title, start_date, exist, " . 
						 "( SELECT COUNT(bidder_id) FROM marketSecondHand_bidList WHERE marketSecondHand_trade.trade_id = marketSecondHand_bidList.trade_id ) AS BuyNum, " . 
						 "( SELECT COUNT(markTime) FROM marketSecondHand_chasingList WHERE marketSecondHand_trade.trade_id = marketSecondHand_chasingList.trade_id ) AS Chase " .
						 "FROM marketSecondHand_trade " .		
						 "LEFT JOIN marketSecondHand_productInfo ON marketSecondHand_trade.product_id = marketSecondHand_productInfo.product_id " .					 
						 "LEFT JOIN marketSecondHand_time ON marketSecondHand_trade.time_id = marketSecondHand_time.time_id " .				 
						 "WHERE marketSecondHand_trade.stu_id = '$stu_id'" .
						 "ORDER BY $permute ASC";
			}
		} else {
			$query = "SELECT trade_id, title, start_date, exist, " . 
					 "( SELECT COUNT(bidder_id) FROM marketSecondHand_bidList WHERE marketSecondHand_trade.trade_id = marketSecondHand_bidList.trade_id ) AS BuyNum, " . 
					 "( SELECT COUNT(markTime) FROM marketSecondHand_chasingList WHERE marketSecondHand_trade.trade_id = marketSecondHand_chasingList.trade_id ) AS Chase " .
					 "FROM marketSecondHand_trade " .		
					 "LEFT JOIN marketSecondHand_productInfo ON marketSecondHand_trade.product_id = marketSecondHand_productInfo.product_id " .					 
					 "LEFT JOIN marketSecondHand_time ON marketSecondHand_trade.time_id = marketSecondHand_time.time_id " .				 
					 "WHERE marketSecondHand_trade.stu_id = '$stu_id'";			
		}

		$resultSecondHand = mysqli_query( $conn, $query ) or die('Query Error');
		
	}
?>

<!DOCTYPE HTML>
<head>
	<title>Student Market - 賣方總管理</title>
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
		<li class="active">賣方總管理	</li>
	</ul>
	
	<!-- Warning Area -->
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Airstage 提醒：</strong>記得用點按的方式收合各個市場的清單唷！
    </div>
    
    <!-- Second Hand Area -->
	<div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
          <h3>二手市場</h3>
          <blockquote>
          	<small>Second-Hand Market</small>
          </blockquote>
        </a>
      </div>
      <div id="collapseOne" class="accordion-body collapse in">
        <div class="accordion-inner">
          <table class="table table-striped">
		      <thead>		   
		        <tr>
		          <th>#</th>
		          <th>
		          	商品名稱 
		          	<?php
						if( @$permute == '' || $priority == 'u' ) echo '<a href="sellerInterface.php?permute=title&priority=d">';
						else echo '<a href="sellerInterface.php?permute=title&priority=u">';
						
						if( @$permute == 'title' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>			          
		          </th>		      
		          <th>
		          	出價人數
		          	<?php
						if( @$permute == '' || $priority == 'u' ) echo '<a href="sellerInterface.php?permute=BuyNum&priority=d">';
						else echo '<a href="sellerInterface.php?permute=BuyNum&priority=u">';
						
						if( @$permute == 'BuyNum' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>
		          </th>
		          <th>
		          	追蹤人數
		          	<?php
						if( @$permute == '' || $priority == 'u' ) echo '<a href="sellerInterface.php?permute=Chase&priority=d">';
						else echo '<a href="sellerInterface.php?permute=Chase&priority=u">';
						
						if( @$permute == 'Chase' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>
		          </th>
		          <th>
		          	出價時間
		          	<?php
						if( @$permute == '' || $priority == 'u' ) echo '<a href="sellerInterface.php?permute=start_date&priority=d">';
						else echo '<a href="sellerInterface.php?permute=start_date&priority=u">';
						
						if( @$permute == 'start_date' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>
		          </th>
		          <th>
		          	狀態
		          	<?php
						if( @$permute == '' || $priority == 'u' ) echo '<a href="sellerInterface.php?permute=exist&priority=d">';
						else echo '<a href="sellerInterface.php?permute=exist&priority=u">';
						
						if( @$permute == 'exist' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>
		          </th>
		          <th>買賣管理</th>       
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
		          	<a href = "#"><?php echo $row['title']; ?></a>
		          </td>		         
		          <td>
			        <?php echo $row['BuyNum']; ?>  
		          </td>
		          <td>
		          	<?php echo $row['Chase']; ?>	
		          </td>
		          <td>
		          	<?php echo $row['start_date']; ?>
		          </td>		       			        
		          <td>
			          <?php
			          	if( $row['exist'] == 1 ) echo '<font color="red">拍賣中</font>';
			          	else echo '已結案';
			          ?>
		          </td>
		          <td>
		          	<a href="productSellInterfaceS.php?trade=<?php echo $row['trade_id']; ?>"><button class="btn btn-info">前往 <i class="icon-edit icon-white"></i></button></a>
		          </td>       
		        </tr>
		      <?php
		      		$counter++;
		      	}
		      ?>		     
		      </tbody>
		   </table>
        </div>
      </div>
    </div>
    
    
    <hr class="bs-docs-separator">
    
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
          <h3>限時競標</h3>
          <blockquote>
          	<small>Contention Market</small>
          </blockquote>
        </a>
      </div>
      <div id="collapseTwo" class="accordion-body collapse">
        <div class="accordion-inner">
          <table class="table table-striped">
		      <thead>
		        <tr>
		          <th>#</th>
		          <th>商品名稱 <i class="icon-chevron-down"></i></th>
		          <th>目前價格 <i class="icon-chevron-down"></i></th>
		          <th>出價人數 <i class="icon-chevron-down"></i></th>
		          <th>追蹤人數 <i class="icon-chevron-down"></i></th>
		          <th>剩餘時間 <i class="icon-chevron-down"></i></th>          
		          <th>買賣管理</th>     
		        </tr>
		      </thead>
		      <tbody>
			  
		      </tbody>
		   </table>	    
        </div>
      </div>
    </div>
    
    <hr class="bs-docs-separator">
    
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
          <h3>校園團購</h3>
          <blockquote>
          	<small>Group-Shop Market</small>
          </blockquote>
        </a>
      </div>
      <div id="collapseThree" class="accordion-body collapse">
        <div class="accordion-inner">    
          <table class="table table-striped">
		      <thead>
		        <tr>
		          <th>#</th>
		          <th>商品名稱 <i class="icon-chevron-down"></i></th>
		          <th>目前價格 <i class="icon-chevron-down"></i></th>
		          <th>跟團人數 <i class="icon-chevron-down"></i></th>
		          <th>追蹤人數 <i class="icon-chevron-down"></i></th>
		          <th>剩餘時間 <i class="icon-chevron-down"></i></th>
		          <th>狀態 <i class="icon-chevron-down"></i></th>
		          <th>買賣管理</th>       
		        </tr>
		      </thead>
		      <tbody>
		      
		      </tbody>
		   </table>
        </div>
      </div>
    </div>
	
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