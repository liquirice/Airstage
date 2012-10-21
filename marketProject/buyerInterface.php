<?php
	// Last Modified Day : 2012.10.07
	session_start();
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		require_once( "../connectVar.php" );
		$stu_id = $_SESSION['stu_id'];
		
		require_once( "UserQueryFunction.php" );
		
		/*$query = "SELECT * FROM marketContention_history " .
		         "LEFT JOIN marketContention_trade ON  marketContention_history.trade_id = marketContention_trade.trade_id " .
				 "LEFT JOIN product_info ON marketContention_trade.product_id = product_info.product_id " .
				 "LEFT JOIN Member ON marketContention_trade.stu_id = Member.stu_id " .
				 "LEFT JOIN member_info ON Member.stu_id = member_info.stu_id " .
				 "WHERE marketContention_history.stu_id = '$stu_id'";
		$result = mysqli_query( $conn, $query );*/
	}
?>

<!DOCTYPE HTML>
<head>
	<title>Student Market - 買方總管理介面</title>
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
		<li class="active">買方總管理</li>
	</ul>
	
	<!-- Warning Area -->
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Airstage 提醒：</strong>要記得把已經結案的物品刪除唷！不然畫面會很亂XD
    </div>
	
	
	<!-- Second Hand Area -->
	<div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
          <h3>二手市場</h3>
        </a>
      </div>
      <div id="collapseOne" class="accordion-body collapse">
        <div class="accordion-inner">
        <form action="" method="post">
          <table class="table table-striped">
		      <thead>
		        <tr>
		          <th>#</th>
		          <th>商品名稱 <i class="icon-chevron-down"></i></th>
		          <th>賣方資料 <i class="icon-chevron-down"></i></th>
		          <th>交易方式 <i class="icon-chevron-down"></i></th>
		          <th>商品狀況 <i class="icon-chevron-down"></i></th>
		          <th>搶手人數 <i class="icon-chevron-down"></i></th>
		          <th>拍賣日期 <i class="icon-chevron-down"></i></th>   
		          <th>得標 <i class="icon-chevron-down"></i></th> 
		          <th>刪除</th>     
		        </tr>
		      </thead>
		      <tbody>
		        <tr>
		          <td>1</td>
		          <td><a href = "#">Adobe Photoshop CS6</a></td>
		          <td>       
			      	<a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Archerwind</a>          	
		          </td>
		          <td>金錢</td>
		          <td><font color="red">拍賣中</font></td>
		          <td>40人</td>
		          <td>2012 / 10 / 10</td>	
		          <td><i class="icon-ok"></i></td>
		          <td>
				  	<input type="checkbox" id="inlineCheckbox1" value="option1" name="">
		          </td>	             
		        </tr>
		        <tr>
		          <td>2</td>
		          <td><a href = "#">Adobe Photoshop CS6</a></td>
		          <td>
			          <a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Archerwind</a>
		          </td>
		          <td>以物易物</td>
		          <td>已結案</td>
		          <td>170人</td>
		          <td>2012 / 10 / 10</td>	
		          <td><i class="icon-thumbs-down"></i></td>	 
		          <td>
				  	<input type="checkbox" id="inlineCheckbox1" value="option1" name="">
		          </td>        
		        </tr>
		      </tbody>
		    </table>
		    <button type="submit" name = "delete" class="btn btn-danger "><i class="icon-trash icon-white"></i> 刪除勾選資料</button> 
        </form>
        </div>
      </div>
    </div>
    
    <hr class="bs-docs-separator">
    
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
          <h3>限時競標</h3>
        </a>
      </div>
      <div id="collapseTwo" class="accordion-body collapse in">
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
				$counter = 1;
				while( $row = mysqli_fetch_array($result) ) {
			  ?>
		        <tr>
		          <td><?php echo $counter; ?></td>
		          <td>
					<a href = "#"><?php echo $row['title']; ?></a>
				  </td>
		          <td>       
			      	<a href="#" rel="popover" title="<?php echo $row['username']; ?>" data-content="<?php getSellerInfo($row['username'], $conn); ?>"><?php echo $row['username']; ?></a>          	
		          </td>
		          <td>NT$<?php echo $row['current_price']; ?></td>
		          <td>
			        <a href="#" rel="popover" title="<?php echo "<font color='red'>得標者</font>"; ?>" data-content="<?php getWinnerInfo($row['get_stu_id'], $conn); ?>"><?php echo $row['get_stu_id']; ?></a>
		          </td>
		          <td>
				  <?php
					if( $row['exist'] != 0 ) echo '<a href="#"><i class="icon-repeat"></i> 00:00:30s</a>';
					else echo '<i class="icon-ban-circle"></i> 已結標';
				  ?>
				  </td>
		          <td>
					<a href="#"><i class="icon-shopping-cart"></i> 50人</a>
				  </td>   
		          <td>
					<?php
						if( $row['get_stu_id'] == $stu_id ) echo '<i class="icon-ok"></i>';
						else echo '<i class="icon-thumbs-down"></i>';
					?>
				  </td>   
		          <td>
				  	<input type="checkbox" id="inlineCheckbox1" value="option1" name="">
		          </td> 		          
		        </tr>
			<?php
					$counter++;
				} // End while.
			?>
		      </tbody>
		    </table>
		    <button type="submit" name = "delete" class="btn btn-danger "><i class="icon-trash icon-white"></i> 刪除勾選資料</button> 
        </form>    
        </div>
      </div>
    </div>
    
    <hr class="bs-docs-separator">
    
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
          <h3>校園團購</h3>
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
		        <tr>
		          <td>1</td>
		          <td><a href = "#">Adobe Photoshop CS6</a></td>
		          <td>       
			      	<a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Archerwind</a>          	
		          </td>
		          <td>NT$1500</td>
		          <td><a href="#"><i class="icon-repeat"></i> 00:00:30s</a></td>
		          <td><a href="#"><i class="icon-gift"></i> NT$30</a></td>
		          <td><a href="#"><i class="icon-shopping-cart"></i> 70人</a></td> 
		          <td><i class="icon-ok"></i></td>  
		          <td>
				  	<input type="checkbox" id="inlineCheckbox1" value="option1" name="">
		          </td>    
		        </tr>
		        <tr>
		          <td>2</td>
		          <td><a href = "#">Adobe Photoshop CS6</a></td>
		          <td>
			          <a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Archerwind</a>
		          </td>
		          <td>NT$5600</td>
		          <td><a href="#"><i class="icon-repeat"></i> 已結團</a></td>
		          <td><a href="#"><i class="icon-ok"></i> NT$700</a></td>
		          <td><a href="#"><i class="icon-shopping-cart"></i> 20人</a></td>
		          <td><i class="icon-thumbs-down"></i></td>
		          <td>
				  	<input type="checkbox" id="inlineCheckbox1" value="option1" name="">
		          </td>
		        </tr>
		      </tbody>
		    </table>
		    <button type="submit" name = "delete" class="btn btn-danger "><i class="icon-trash icon-white"></i> 刪除勾選資料</button> 
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