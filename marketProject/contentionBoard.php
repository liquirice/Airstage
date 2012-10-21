<!--設計時千萬記得改utf8編碼-->

<?php
	// Last Modified Day : 
	// 
	session_start();
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
	
	<!--路徑欄-->
	<ul class="breadcrumb">
		<li><a href="marketIndex.php">市場首頁</a> <span class="divider">/</span></li>
		<!--li>子目錄 <span class="divider">/</span></li-->
		<li class="active">當前頁面</li>
	</ul>

	<!-- Warning Area -->
	<div class="alert alert-danger fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Attention!</strong> &nbsp;請務必閱讀競標規則再進入唷！
	</div>
	
	<!--每個橫段有row、row-fluid(稍擠)二種選擇-->
	<div class="row">
		<!-- 空間內由一至數個span*組成，*=1~12 -->
		<!-- 數量不限，*的總合<=12，12為最佳狀態剛好填滿。以下為範例-->
		<div class="span6"></div>
		<div class="span6"></div>
	</div>
	<div class="row-fluid">
		<div class="span2"></div>
		<div class="span4"></div>
		<div class="span3"></div>
		<div class="span3"></div>
	</div>
</div>

<!--Footer-->
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


