<?php 
	session_start();
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		// Query out the avg and show the percentage on the bar chart.
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
		<li class="active">我的評分</li>
	</ul>
	
	<!-- Warning Area -->
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Airstage 提醒：</strong>評分綜合結果會顯示在會員系統中給大家鑑定唷！
    </div>
    
    <div class="page-header">
	  <h1>平均評分 AVG  <small><font color="red"> 4.5</font></small></h1>
	</div>
    
    <h3>評分統計</h3>
    
    完美賣家（5分）
    <div class="progress progress-success progress-striped active">
	  <div class="bar" style="width: 40%;"></div>
	</div>
	態度不錯（4分）
	<div class="progress progress-info progress-striped active">
	  <div class="bar" style="width: 10%;"></div>
	</div>
	普普通通（3分）
	<div class="progress progress-striped active">
	  <div class="bar" style="width: 60%;"></div>
	</div>
	不太愉快（2分）
	<div class="progress progress-warning progress-striped active">
	  <div class="bar" style="width: 90%;"></div>
	</div>
	態度很差（1分）
	<div class="progress progress-danger progress-striped active">
	  <div class="bar" style="width: 50%;"></div>
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