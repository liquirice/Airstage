<?php
	// Last Modified Day : 2012.10.07
	session_start();
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		require_once( "../connectVar.php" );
		$stu_id = $_SESSION['stu_id'];
		
		$query = "SELECT COUNT(markTime), * FROM Member " .
				 "LEFT JOIN marketSecondHand_trade ON Member.stu_id = marketSecondHand_trade.stu_id " .
				 "LEFT JOIN marketSecondHand_bidList ON marketSecondHand_trade.trade_id = marketSecondHand_bidList.trade_id " .
				 "LEFT JOIN marketSecondHand_time ON marketSecondHand_trade.trade_id = marketSecondHand_time.trade_id " .
				 "LEFT JOIN marketSecondHand_chasingList ON marketSecondHand_trade.trade_id = marketSecondHand_chasingList.trade_id " .
				 "WHERE Member.stu_id = '$stu_id'";
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
        <strong>Airstage 提醒：</strong>記得用點案的方式打開各個市場的清單唷！
    </div>
    
    <!-- Second Hand Area -->
	<div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
          <h3>二手市場</h3>
        </a>
      </div>
      <div id="collapseOne" class="accordion-body collapse in">
        <div class="accordion-inner">
          <table class="table table-striped">
		      <thead>
		        <tr>
		          <th>#</th>
		          <th>商品名稱 <i class="icon-chevron-down"></i></th>
		          <th>出價金額 <i class="icon-chevron-down"></i></th>
		          <th>出價人數 <i class="icon-chevron-down"></i></th>
		          <th>追蹤人數 <i class="icon-chevron-down"></i></th>
		          <th>出價時間 <i class="icon-chevron-down"></i></th>
		          <th>狀態 <i class="icon-chevron-down"></i></th>
		          <th>買賣管理</th>       
		        </tr>
		      </thead>
		      <tbody>
		        <tr>
		          <td>1</td>
		          <td><a href = "#">Adobe Photoshop CS6</a></td>
		          <td>       
			      	NT$2400          	
		          </td>
		          <td>20 人</td>
		          <td>2 人</td>
		          <td>2012 / 10 / 10</td>
		          <td><font color="red">拍賣中</font></td>
		          <td>
		          	<a href="productSellInterfaceS.php"><button class="btn btn-info">前往 <i class="icon-edit icon-white"></i></button></a>
		          </td>       
		        </tr>
		        <tr>
		          <td>2</td>
		          <td><a href = "#">Adobe Photoshop CS6</a></td>
		          <td>
			          NT$5000          
			      </td>
		          <td>100 人</td>
		          <td>72 人</td>
		          <td>2012 / 10 / 10</td>
		          <td>已結案</td>
		          <td>
			      	<a href=""><button class="btn btn-info">前往 <i class="icon-edit icon-white"></i></button></a>			   
		          </td>
		        </tr>
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
			  <!--tr>
		          <td>1</td>
		          <td><a href = "#">Adobe Photoshop CS6</a></td>
		          <td>NT$200000</td>
		          <td>40 人</td>
		          <td>21 人</td>
		          <td><a href="">00:00:03</a></td>          
		          <td>
			        <a href="productSellInterfaceC.php"><button class="btn btn-info">前往 <i class="icon-edit icon-white"></i></button></a>
		          </td>       
		        </tr>
		        <tr>
		          <td>2</td>
		          <td><a href = "#">Adobe Photoshop CS6</a></td>
		          <td>NT$200000</td>
		          <td>52 人</td>
		          <td>45 人</td>          
		          <td>已結標</td>
		          <td>
			      	<a href=""><button class="btn btn-info">前往 <i class="icon-edit icon-white"></i></button></a>
		          </td>
		        </tr-->
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
		        <!--tr>
		          <td>1</td>
		          <td><a href = "#">Adobe Photoshop CS6</a></td>
		          <td>NT$200000</td>
		          <td>20 人</td>
		          <td>4 人</td>
		          <td><a href="#">00:00:04</a></td>
		          <td>已結團</td>
		          <td>
			        <a href=""><button class="btn btn-info">前往 <i class="icon-edit icon-white"></i></button></a>
		          </td>       
		        </tr>
		        <tr>
		          <td>2</td>
		          <td><a href = "#">Adobe Photoshop CS6</a></td>
		          <td>NT$200000</td>
		          <td>20 人	</td>
		          <td>4 人</td>
		          <td><a href="#">00:00:04</a></td>
		          <td><font color="red">揪團中</font></td>
		          <td>
			        <a href=""><button class="btn btn-info">前往 <i class="icon-edit icon-white"></i></button></a>
		          </td>
		        </tr-->
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