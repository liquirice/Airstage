<?php
	// Last Modified Day : 2012.10.07
	require_once( "../global/setSession.php" );
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		require_once( "../connectVar.php" );
		$stu_id = $_SESSION['stu_id'];
		
		require_once( "UserQueryFunction.php" );
		
		if( isset($_GET['permute']) ) {
			@$permute = mysqli_real_escape_string( $conn, trim($_GET['permute']) );
			@$priority = mysqli_real_escape_string( $conn, trim($_GET['priority']) );
			
			if( $priority == 'u' ) {
				$query = "SELECT marketSecondHand_trade.trade_id, title, Member.username, exist, markTime, star FROM marketSecondHand_chasingList " .
						 "LEFT JOIN marketSecondHand_trade ON marketSecondHand_chasingList.trade_id = marketSecondHand_trade.trade_id " .
						 "LEFT JOIN marketSecondHand_productInfo ON marketSecondHand_trade.product_id = marketSecondHand_productInfo.product_id " .
						 "LEFT JOIN Member ON marketSecondHand_trade.stu_id = Member.stu_id " .
						 "WHERE marketSecondHand_chasingList.stu_id = '$stu_id'" .
						 "ORDER BY $permute DESC";
			} else if( $priority == 'd' ) {
				$query = "SELECT marketSecondHand_trade.trade_id, title, Member.username, exist, markTime, star FROM marketSecondHand_chasingList " .
						 "LEFT JOIN marketSecondHand_trade ON marketSecondHand_chasingList.trade_id = marketSecondHand_trade.trade_id " .
						 "LEFT JOIN marketSecondHand_productInfo ON marketSecondHand_trade.product_id = marketSecondHand_productInfo.product_id " .
						 "LEFT JOIN Member ON marketSecondHand_trade.stu_id = Member.stu_id " .
						 "WHERE marketSecondHand_chasingList.stu_id = '$stu_id'" .				
						 "ORDER BY $permute ASC";
			}	
		} else {
			$permute = '';
			$query = "SELECT marketSecondHand_trade.trade_id, title, Member.username, exist, markTime, star FROM marketSecondHand_chasingList " .
					 "LEFT JOIN marketSecondHand_trade ON marketSecondHand_chasingList.trade_id = marketSecondHand_trade.trade_id " .
					 "LEFT JOIN marketSecondHand_productInfo ON marketSecondHand_trade.product_id = marketSecondHand_productInfo.product_id " .
					 "LEFT JOIN Member ON marketSecondHand_trade.stu_id = Member.stu_id " .
					 "WHERE marketSecondHand_chasingList.stu_id = '$stu_id'" .
					 "ORDER BY markTime DESC";
		}
		
		$resultSecondHand = mysqli_query( $conn, $query ) or die('query Error');
	}
?>

<!DOCTYPE HTML>
<head>
	<title>Student Market - 商品追蹤清單</title>
	<link href = "../tm2.ico" rel = "shortcut icon" />
	<link href = "css/bootstrap.css" rel = "stylesheet" />
	<link href = "css/baseCss.css" rel = "stylesheet" />
	<link href="css/docs.css" rel="stylesheet">
	<meta http-equiv = "Content-Type" content = "text/html; charset = utf8" />
	<meta http-equiv = "Content-Language" content = "zh-tw" />
	<style>
		h3, h2, h1, table, tr, td, li, ul, th {
			font-family: "微軟正黑體", "Arial";
		}
	</style>
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
	
	<ul class="breadcrumb" style="font-family: '微軟正黑體', 'Arial';">
		<li><a href="marketIndex.php">市場首頁</a> <span class="divider">/</span></li>
		<li>交易管理介面 <span class="divider">/</span></li>
		<li class="active">追蹤清單</li>
	</ul>
	
	<!-- Warning Area -->
	<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Airstage 提醒：</strong>可以由標記功能去標出自己特別中意的物品唷！ 目前賣方資料排序功能暫不開放。
    </div>
	
	
	<!-- Second Hand Area -->
	<h3><a href = "#">二手市場</a></h3>
	<blockquote>
		<small style="font-family: '微軟正黑體', 'Arial';">Second-Hand Market</small>
	</blockquote>
	
	<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>
          	商品名稱 
	        <?php
				if( @$permute == '' || $priority == 'u' ) echo '<a href="onChasing.php?permute=title&priority=d">';
				else echo '<a href="onChasing.php?permute=title&priority=u">';
				
				if( @$permute == 'title' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
				else echo '<i class="icon-chevron-down"></i></a>';	
			?>  
          </th>
          <th>
          	賣方資料 <i class="icon-chevron-down"></i>
          </th>
          <th>
          	商品狀態
          	<?php
				if( @$permute == '' || @$priority == 'u' ) echo '<a href="onChasing.php?permute=exist&priority=d">';
				else echo '<a href="onChasing.php?permute=exist&priority=u">';
				
				if( @$permute == 'exist' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
				else echo '<i class="icon-chevron-down"></i></a>';	
			?>
          </th>
          <th>
          	追蹤時間 
          	<?php
				if( @$permute == '' || $priority == 'u' ) echo '<a href="onChasing.php?permute=markTime&priority=d">';
				else echo '<a href="onChasing.php?permute=markTime&priority=u">';
				
				if( @$permute == 'markTime' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
				else echo '<i class="icon-chevron-down"></i></a>';	
			?>
          </th>
          <th>
          	標記
          	<?php
				if( @$permute == '' || $priority == 'u' ) echo '<a href="onChasing.php?permute=star&priority=d">';
				else echo '<a href="onChasing.php?permute=star&priority=u">';
				
				if( @$permute == 'star' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
				else echo '<i class="icon-chevron-down"></i></a>';	
			?>
          </th>
          <th>操作選項</th>          
        </tr>
      </thead>
      <tbody>
      </tbody>
      <?php
      	$counter = 1;
      	while( $row = mysqli_fetch_array($resultSecondHand) ) {
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
				if( $row['exist'] == 1 ) echo '<font color="red">競標中</font>';
				else echo '已結案';			
		    ?>
          </td>
          <td>
	        <?php echo $row['markTime']; ?>
          </td>
          <td>
	      	<?php
				if( $row['star'] == 1 ) echo '<i class="icon-star"></i>';
			?>
          </td>
          <td>
	          <div class="btn-group">
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
				<?php
					if( $row['star'] == 0 ) {
				?>
					<li><a href="secondHand_addChasingStar.php?trade=<?php echo $row['trade_id']; ?>"><i class="icon-star"></i> 加入標記</a></li>
				<?php	
					} else {
				?>
					<li><a href="secondHand_deleteChasingStar.php?trade=<?php echo $row['trade_id']; ?>"><i class="icon-fire"></i> 移除標記</a></li>
				<?php
					} // End else.
                ?>  
				  <li><a href="secondHand_deleteChasing.php?trade=<?php echo $row['trade_id']; ?>"><i class="icon-trash"></i> 刪除選項</a></li>                                               
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
    <h3><a href = "#">限時競標</a></h3>
    <blockquote>
    	<small>Contention Market</small>
    </blockquote>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>
			商品名稱 <i class="icon-chevron-down"></i>
		  </th>
          <th>
			目前價格 <i class="icon-chevron-down"></i>
			<?php
				//if( @$permute == '' || $priority == 'u' ) echo '<a href="onChasing.php?permute=current_price&priority=d">';
				//else echo '<a href="onChasing.php?permute=current_price&priority=u">';
				
				//if( @$permute == 'current_price' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
				//else echo '<i class="icon-chevron-down"></i></a>';	
			?>
			</a>
		  </th>
          <th>
			商品狀態 <i class="icon-chevron-down"></i>
		  </th>
          <th>
			追蹤時間 <i class="icon-chevron-down"></i>
		  </th>
          <th>
			標記	<i class="icon-chevron-down"></i>
		  </th>
          <th>操作選項</th>          
        </tr>
      </thead>
	  
      <tbody>
	  <?php
		//$counter = 1;
		//while( $row = mysqli_fetch_array( $result )  ) {
	  ?>
        <!--tr>
          <td>
			<?php //echo $counter; ?>
		  </td>
          <td>
			<a href = "#"><?php //echo $row['title']; ?></a>
		  </td>
          <td>
			<?php //echo $row['current_price']; ?>
		  </td>
          <td>
			<?php
				//if( $row['exist'] == 1 ) echo '<font color="red">競標中</font>';
				//else echo '已結案';			
		    ?>
		  </td>
          <td>
			<?php //echo $row['markTime']; ?>
		  </td>
          <td>
			<?php
				//if( $row['star'] == 1 ) echo '<i class="icon-star"></i>';
			?>
		  </td>
          <td>
	          <div class="btn-group">
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
				<?php
					//if( $row['star'] == 0 ) {
				?>
					<li><a href="addChasingStar.php?trade=<?php //echo $row['trade_id']; ?>"><i class="icon-star"></i> 加入標記</a></li>
				<?php	
					//} else {
				?>
					<li><a href="deleteChasingStar.php?trade=<?php //echo $row['trade_id']; ?>"><i class="icon-fire"></i> 移除標記</a></li>
				<?php
					//} // End else.
                ?>  
				  <li><a href="deleteChasing.php?trade=<?php //echo $row['trade_id']; ?>"><i class="icon-trash"></i> 刪除選項</a></li>                                               
                </ul>
              </div>
          </td>       
        </tr-->
		
	<?php
			//$counter++;
		//} // End while.
	?>
      </tbody>
    </table>
    
    
    <hr class="bs-docs-separator">
    <!-- Group Shop Area -->
    <h3><a href = "">校園團購</a></h3>
    <blockquote>
  		<small>Group-shop Market</small>
  	</blockquote>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>商品名稱 <i class="icon-chevron-down"></i></th>
          <th>目前價格 <i class="icon-chevron-down"></i></th>
          <th>商品狀態 <i class="icon-chevron-down"></i></th>
          <th>追蹤時間 <i class="icon-chevron-down"></th>
          <th>標記 <i class="icon-chevron-down"></i></th>
          <th>操作選項</th>          
        </tr>
      </thead>
      <tbody>
        
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