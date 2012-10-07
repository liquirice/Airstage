<?php
	// Last Modified Day : 2012.10.07
	session_start();
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
			
	}
?>

<!DOCTYPE HTML>
<head>
	<title>Airstage - Student Market - Entrance</title>
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
		<li><a href="tradeHistory.php">成交記錄</a> <span class="divider">/</span></li>
		<li class="active">交易回饋單填寫</li>
	</ul>
	
	<!-- Warning Area -->
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Airstage 提醒：</strong>感謝您用心填寫回饋單，AIRSTAGE會拿出更高品質的服務來回應。        
    </div>
	
	<?php
		// If feedback has been writen. 
	?>
	
	
	<?php
		// If the feedback hasn't set.
	?>
	
	<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	  <dl class="dl-horizontal" style="font-size: 18px;	">
        <dt><i class="icon-bookmark"></i> 商品名稱</dt>
        <dd>Adobe InDesign CS6</dd>
        
        <br />
        
        <dt><i class="icon-globe"></i> 成交位置</dt>
        <dd>二手市場</dd>
        
        <br />
        
        <dt><i class="icon-user"></i> 賣方資料</dt>
        <dd>
        	<a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Archerwind	</a>
        </dd>     
        
        <br />
        
        <dt><i class="icon-resize-small"></i> 交易方式</dt>
        <dd>金錢</dd>
        
        <br />
        
        <dt><i class="icon-shopping-cart"></i> 成交金額</dt>
        <dd>NT$15000</dd>
        
        <br />
        
        <dt><i class="icon-thumbs-up"></i> 評鑑等級</dt>
        <dd>
	        <div class="btn-group" data-toggle="buttons-radio">
		        <button type="button" class="btn btn-danger">感覺很差</button>
		        <button type="button" class="btn btn-warning">不太愉快</button>
		        <button type="button" class="btn btn-primary">普普通通</button>
		        <button type="button" class="btn btn-info">態度不錯</button>
		        <button type="button" class="btn btn-success">讓人放心</button>
		    </div>
        </dd>
        
        <br />
        
        <dt><i class="icon-tasks"></i> 回饋評論</dt>
        <dd>
	        <textarea name="commit" rows="6" cols=""></textarea>
        </dd>
        
        <br />
        
        <dt></dt>
        <dd><button class="btn" type="submit" name = "feedbackSubmit"><i class="icon-pencil"></i> 送出回饋</button></dd>
      </dl>
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