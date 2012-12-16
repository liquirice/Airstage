<?php
	// Last Modified Day : 2012.10.07
	require_once( "../global/setSession.php" );
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		require_once( "../global/connectVar.php" );
		require_once( "UserQueryFunction.php" );
		$stu_id = $_SESSION['stu_id'];
		
		if( isset($_GET['permute']) ) {
			@$permute = mysqli_real_escape_string( $conn, trim($_GET['permute']) );
			@$priority = mysqli_real_escape_string( $conn, trim($_GET['priority']) );
		
			if( $priority == 'u' ) {
				$query = "SELECT marketSecondHand_productInfo.title, Member.username, marketSecondHand_trade.exist, marketSecondHand_time.start_date, marketSecondHand_bidList.*, " .
						 "( SELECT COUNT(bidder_id) " . 
						 "FROM marketSecondHand_bidList WHERE marketSecondHand_bidList.trade_id = marketSecondHand_trade.trade_id ) AS BidNum, " . 
						 "( SELECT COUNT(buyer_id) FROM marketSecondHand_comment INNER JOIN marketSecondHand_bidList Using(trade_id) " . 
						 "WHERE marketSecondHand_comment.buyer_id = '$stu_id' AND marketSecondHand_bidList.trade_id = marketSecondHand_comment.trade_id ) AS CounFeed " .
						 "FROM marketSecondHand_trade " .
				         "LEFT JOIN marketSecondHand_bidList ON marketSecondHand_bidList.trade_id = marketSecondHand_trade.trade_id " .
						 "LEFT JOIN marketSecondHand_productInfo ON marketSecondHand_productInfo.product_id = marketSecondHand_trade.product_id " .
						 "LEFT JOIN Member ON marketSecondHand_trade.stu_id = Member.stu_id " .
						 "LEFT JOIN marketSecondHand_time ON marketSecondHand_time.time_id = marketSecondHand_trade.time_id " .
						 "WHERE marketSecondHand_bidList.bidder_id = '$stu_id'" .
						 "ORDER BY $permute DESC";
			} else if( $priority == 'd' ) {
				$query = "SELECT marketSecondHand_productInfo.title, Member.username, marketSecondHand_trade.exist, marketSecondHand_time.start_date, marketSecondHand_bidList.*, " .
						 "( SELECT COUNT(bidder_id) " . 
						 "FROM marketSecondHand_bidList WHERE marketSecondHand_bidList.trade_id = marketSecondHand_trade.trade_id ) AS BidNum, " . 
						 "( SELECT COUNT(buyer_id) FROM marketSecondHand_comment INNER JOIN marketSecondHand_bidList Using(trade_id) " . 
						 "WHERE marketSecondHand_comment.buyer_id = '$stu_id' AND marketSecondHand_bidList.trade_id = marketSecondHand_comment.trade_id ) AS CounFeed " .
						 "FROM marketSecondHand_trade " .
				         "LEFT JOIN marketSecondHand_bidList ON marketSecondHand_bidList.trade_id = marketSecondHand_trade.trade_id " .
						 "LEFT JOIN marketSecondHand_productInfo ON marketSecondHand_productInfo.product_id = marketSecondHand_trade.product_id " .
						 "LEFT JOIN Member ON marketSecondHand_trade.stu_id = Member.stu_id " .
						 "LEFT JOIN marketSecondHand_time ON marketSecondHand_time.time_id = marketSecondHand_trade.time_id " .
						 "WHERE marketSecondHand_bidList.bidder_id = '$stu_id'" .
						 "ORDER BY $permute ASC";
			}
		} else {
			$permute = '';
			$query = "SELECT marketSecondHand_productInfo.title, Member.username, marketSecondHand_trade.exist, marketSecondHand_time.start_date, marketSecondHand_bidList.*, " .
					 "( SELECT COUNT(bidder_id) " . 
					 "FROM marketSecondHand_bidList WHERE marketSecondHand_bidList.trade_id = marketSecondHand_trade.trade_id ) AS BidNum, " . 
					 "( SELECT COUNT(buyer_id) FROM marketSecondHand_comment INNER JOIN marketSecondHand_bidList Using(trade_id) " . 
					 "WHERE marketSecondHand_comment.buyer_id = '$stu_id' AND marketSecondHand_bidList.trade_id = marketSecondHand_comment.trade_id ) AS CounFeed " .
					 "FROM marketSecondHand_trade " .
			         "LEFT JOIN marketSecondHand_bidList ON marketSecondHand_bidList.trade_id = marketSecondHand_trade.trade_id " .
					 "LEFT JOIN marketSecondHand_productInfo ON marketSecondHand_productInfo.product_id = marketSecondHand_trade.product_id " .
					 "LEFT JOIN Member ON marketSecondHand_trade.stu_id = Member.stu_id " .
					 "LEFT JOIN marketSecondHand_time ON marketSecondHand_time.time_id = marketSecondHand_trade.time_id " .
					 "WHERE marketSecondHand_bidList.bidder_id = '$stu_id'";
		}
		
		$resultSecond = mysqli_query( $conn, $query ) or die('Second Die!');
	}
?>

<!DOCTYPE HTML>
<head>
	<title>Student Market - 買方總管理介面</title>
	<link href = "../tm2.ico" rel = "shortcut icon" />
	<link href = "css/bootstrap.css" rel = "stylesheet" />
	<link href = "css/baseCss.css" rel = "stylesheet" />
	<link href = "css/docs.css" rel = "stylesheet" />
	<meta http-equiv = "Content-Type" content = "text/html; charset = utf8" />
	<meta http-equiv = "Content-Language" content = "zh-tw" />
	<style>
		h3, h2, h1, table, tr, td, li, ul, th, p {
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
	//require_once( "sideBarNavi.php" );	
?>

<!-- Container Start -->
<div class = "container" >
    <?php
	    require_once( "memberStateLine.php" );
	?>
	
	<ul class="breadcrumb">
		<li><a href="marketIndex.php">市場首頁</a> <span class="divider">/</span></li>
		<li>交易管理介面 <span class="divider">/</span></li>
		<li class="active">買方總管理</li>
	</ul>
	
	<!-- Warning Area -->
	<div class="alert alert-info fade in" style="font-family: '微軟正黑體';">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Airstage 提醒：</strong>得標的物品無法刪除記錄唷！ 只有得標的物品才能夠進行回饋呢！ 目前賣方資料與回饋排序功能暫不開放。
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
						if( @$permute == '' || $priority == 'u' ) echo '<a href="buyerInterface.php?permute=title&priority=d">';
						else echo '<a href="buyerInterface.php?permute=title&priority=u">';
						
						if( @$permute == 'title' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>
		          </th>
		          <th>賣方資料 <i class="icon-chevron-down"></i></th>
		          <th>
		          	交易方式 
		          	<?php
						if( @$permute == '' || $priority == 'u' ) echo '<a href="buyerInterface.php?permute=exchange_type&priority=d">';
						else echo '<a href="buyerInterface.php?permute=exchange_type&priority=u">';
						
						if( @$permute == 'exchange_type' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>
		          </th>
		          <th>
		          	商品狀況 
		          	<?php
						if( @$permute == '' || @$priority == 'u' ) echo '<a href="buyerInterface.php?permute=exist&priority=d">';
						else echo '<a href="buyerInterface.php?permute=exist&priority=u">';
						
						if( @$permute == 'exist' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>
		          </th>
		          <th>
		          	搶手 
		          	<?php
						if( @$permute == '' || $priority == 'u' ) echo '<a href="buyerInterface.php?permute=BidNum&priority=d">';
						else echo '<a href="buyerInterface.php?permute=BidNum&priority=u">';
						
						if( @$permute == 'BidNum' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>
		          </th>
		          <th>
		          	拍賣日期
		          	<?php
						if( @$permute == '' || $priority == 'u' ) echo '<a href="buyerInterface.php?permute=start_date&priority=d">';
						else echo '<a href="buyerInterface.php?permute=start_date&priority=u">';
						
						if( @$permute == 'start_date' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>
		          </th>   
		          <th>
		          	得標
		          	<?php
						if( @$permute == '' || $priority == 'u' ) echo '<a href="buyerInterface.php?permute=buy_list&priority=d">';
						else echo '<a href="buyerInterface.php?permute=buy_list&priority=u">';
						
						if( @$permute == 'buy_list' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>
		          </th> 
		          <th>
		          	回饋		       
		          	<?php
		          		// Fix the sorting bug from the SQL query.
						if( @$permute == '' || $priority == 'u' ) echo '<a href="buyerInterface.php?permute=FeedBack&priority=d">';
						else echo '<a href="buyerInterface.php?permute=FeedBack&priority=u">';
						
						if( @$permute == 'FeedBack' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>
		          </th>
		          <th>刪除</th>     
		        </tr>
		      </thead>
		      <tbody>
		      <?php
		      	$counter = 1;
		      	while( $row = mysqli_fetch_array($resultSecond) ) {
		      ?>
		        <tr>
		          <td><?php echo $counter; ?></td>
		          <td>
		          	<a href = "productDetail.php?trade=<?php echo $row['trade_id']; ?>"><?php echo $row['title']; ?></a>
		          </td>
		          <td>       
			      	<a href="#" rel="popover" data-placement="bottom" title="<?php echo $row['username']; ?>" data-content="<?php getSellerInfo($row['username'], $conn); ?>"><?php echo $row['username']; ?></a>          	
		          </td>
		          <td>
			          <?php 
			          	if( $row['exchange_type'] == 0 ) echo '金錢';
			          	else if( $row['exchange_type'] == 1 ) echo'以物易物';
			          	else echo '其他'; 
			          ?>
		          </td>
		          <td>
		          	<?php
		          		if( $row['exist'] == 1 ) echo '<font color="red">拍賣中</font>';
		          		else echo '已結標';
		          	?>
		          </td>
		          <td>
			          <?php echo $row['BidNum']; ?>
		          </td>
		          <td>
		          	<?php echo $row['start_date']; ?>
		          </td>	
		          <td>
		          	<?php
		          		if( $row['buy_list'] == 1 ) echo '<i class="icon-ok"></i>'; 
		          		else echo '<i class="icon-thumbs-down"></i>';
		          	?>
		          </td>
		          <td>
		          	<?php		          	
		          		if( $row['buy_list'] == 1 ) {
			          		if( $row['FeedBack'] == 0 ) echo '<a href="feedbackS.php?trade='. $row['trade_id'] .'">未評分</a>';
							else echo '已評分';
		          		}
		          	?>		          
		          </td>
		          <td>
		          	<?php
				  		if( $row['exist'] == 0 ) {
							if( $row['buy_list'] == 0 ){
								echo '<a href="deleteBuyList.php?trade=' . $row['trade_id'] . '"><i class="icon-trash"></i> 刪除</a>';
							}
						}
				  	?>
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
        <form action="" method="post">
          <table class="table table-striped">
		      <thead>
		        <tr>
		          <th>#</th>
		          <th>商品名稱 <i class="icon-chevron-down"></i></th>
		          <th>賣方資料 <i class="icon-chevron-down"></i></th>
		          <th>目前價格 <i class="icon-chevron-down"></i></th>
		          <th>目前得標 <i class="icon-chevron-down"></i></th>
		          <th>剩餘時間 <i class="icon-chevron-down"></i></th> 
		          <th>出價人數 <i class="icon-chevron-down"></i></th>   
		          <th>得標 <i class="icon-chevron-down"></i></th> 
		          <th>刪除</th>    
		        </tr>
		      </thead>
		      <tbody>
			  <?php
				//$counter = 1;
				//while( $row = mysqli_fetch_array($result) ) {
			  ?>
		        <!--tr>
		          <td><?php //echo $counter; ?></td>
		          <td>
					<a href = "#"><?php //echo $row['title']; ?></a>
				  </td>
		          <td>       
			      	<a href="#" rel="popover" title="<?php //echo $row['username']; ?>" data-content="<?php //getSellerInfo($row['username'], $conn); ?>"><?php //echo $row['username']; ?></a>          	
		          </td>
		          <td>NT$<?php //echo $row['current_price']; ?></td>
		          <td>
			        <a href="#" rel="popover" title="<?php //echo "<font color='red'>得標者</font>"; ?>" data-content="<?php //getWinnerInfo($row['get_stu_id'], $conn); ?>"><?php //echo $row['get_stu_id']; ?></a>
		          </td>
		          <td>
				  <?php
					//if( $row['exist'] != 0 ) echo '<a href="#"><i class="icon-repeat"></i> 00:00:30s</a>';
					//else echo '<i class="icon-ban-circle"></i> 已結標';
				  ?>
				  </td>
		          <td>
					<a href="#"><i class="icon-shopping-cart"></i> 50人</a>
				  </td>   
		          <td>
					<?php
						//if( $row['get_stu_id'] == $stu_id ) echo '<i class="icon-ok"></i>';
						//else echo '<i class="icon-thumbs-down"></i>';
					?>
				  </td>   
		          <td>
				  	<input type="checkbox" id="inlineCheckbox1" value="option1" name="">
		          </td> 		          
		        </tr-->
			<?php
					//$counter++;
				//} // End while.
			?>
		      </tbody>
		    </table>
		    <!--button type="submit" name = "delete" class="btn btn-danger "><i class="icon-trash icon-white"></i> 刪除勾選資料</button--> 
        </form>    
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
        <form action="" method="post">
          <table class="table table-striped">
		      <thead>
		        <tr>
		          <th>#</th>
		          <th>商品名稱 <i class="icon-chevron-down"></i></th>
		          <th>揪團人 <i class="icon-chevron-down"></i></th>
		          <th>成交價格 <i class="icon-chevron-down"></i></th>
		          <th>剩餘時間 <i class="icon-chevron-down"></th>
		          <th>省下 <i class="icon-chevron-down"></i></th>
		          <th>跟團人數 <i class="icon-chevron-down"></i></th> 
		          <th>成團 <i class="icon-chevron-down"></i></th>
		          <th>刪除</th>        
		        </tr>
		      </thead>
		      <tbody>
		        
		      </tbody>
		    </table>
		    <!--button type="submit" name = "delete" class="btn btn-danger "><i class="icon-trash icon-white"></i> 刪除勾選資料</button--> 
        </form>
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