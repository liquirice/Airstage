<?php
	// Last Modified Day : 
	// 
	session_start();
	
	/*	1.GET關鍵字 -> 支援中文?　：　有就開始搜尋，沒有就列全部
		2.beta: 只從productInfo.title找
			未來:時間, id等等等等
		3.找到符合的項目們，用productInfo.product_id對應marketsecondhand_trade 開始找資料。
	*/
	if( isset($_SESSION['stu_id']) && isset($_SESSION['nick']) ) {
		$login = 1;
	}
	else{
		$login = 0;
	}
	
	$STR_MAXSIZE = 20;
	$keywords = mysqli_real_escape_string( $conn, chop(trim($_GET['keywords'])) );

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
		<li class="active">商品搜尋</li>
	</ul>

	<?php
		//判別關鍵字長度，
		if(  strlen($keywords) >= $STR_MAXSIZE || strlen($keywords) <= 0){
			//字串不符規定:只顯示alert
			echo '<div class="alert alert-danger fade in"><strong>ERROR!</strong>您似乎忘記輸入關鍵字、或是關鍵字太長了，請重新查詢。</div>';
		}
		else{}
	?>

	


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