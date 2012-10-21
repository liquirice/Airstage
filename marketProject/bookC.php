<?php
	// Last Modified Day : 2012.10.01
	// No need to login to browse the products.
	session_start();
?>

<!DOCTYPE HTML>
<head>
	<title>Airstage - Student Market - SecondBook</title>
	<link href = "../tm2.ico" rel = "shortcut icon" />
	<link href = "css/bootstrap.css" rel = "stylesheet" />
	<link href = "css/baseCss.css" rel = "stylesheet" />
	<link href="css/docs.css" rel="stylesheet">
	<meta http-equiv = "Content-Type" content = "text/html; charset = utf8" />
	<meta http-equiv = "Content-Language" content = "zh-tw" />
	<style>
		.span2 {
			text-align:right;
			vertical-align:center;
			background-color:;
		}
		#myTabContent {
			border-left-color:#ff0000;
		}
		ul.vertical_list {
			display:inline;
			list-style:inside;
			
		}
		ul.vertical_list li {
			float:left;
			margin-left:5px;
			margin-bottom:5px;
			width:140px;
		}
		.tab-content {
			padding-left:20px;
			padding-right:10px;
		}
	</style>
	<script>
	
	</script>
</head>

<body>

<?php
	require_once( "marketNavi.php" );
	require_once( "marketAnnouce.php" );
?>

<!-- Container Start -->
<div class = "container">

	<!--進度條-->
	<div class="progress progress-striped active">
		<div class="bar bar-primary" style="width: 5%;"></div>
	</div>
	
	<!--market bar-->
    <?php
	    require_once( "memberStateLine.php" );
	?>
	
	<!--路徑欄-->
	<ul class="breadcrumb">
		<li><a href="marketIndex.php">市場首頁</a> <span class="divider">/</span></li>
		<li><a href="contentionBoard.php">限時競標</a> <span class="divider">/</span></li>
		<!--li><a href="contentionBoard.php">分類搜尋</a> <span class="divider">/</span></li-->
		<li class="active">書籍雜誌</li>
	</ul>
	
	<!--次分類與其次次分類項目-->
	<!--目標: 滑鼠移上次分類可以看到次次分類，點次分類or次次分類皆可以看到該分類全部商品(javascript)-->
	<div class="row-fluid" >
		<div class="span2">
			<h4>書籍雜誌</h4>
		</div>
		<div class="span10">
			<ul class="nav nav-tabs" id="myTab">
				<li class="active"><a data-toggle="tab" href="#textbook">校內課程用書</a></li>
				<li><a data-toggle="tab" href="#books">一般書籍</a></li>
				<li><a data-toggle="tab" href="#">次分類</a></li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div id="textbook" class="tab-pane fade in active">
					<ul class="vertical_list">
						<li><a href="#">文學院</a></li>
						<li><a href="#">理學院</a></li>
						<li><a href="#">工學院</a></li>
						<li><a href="#">管理學院</a></li>
						<li><a href="#">海洋科學院</a></li>
						<li><a href="#">社會科學院</a></li>
						<li><a href="#">通識課程</a></li>
						<li><a href="#">其他課程</a></li>
					</ul>
				</div>
				<div id="books" class="tab-pane fade">
					<p>content</p>
				</div>
				<div id="" class="tab-pane fade">
					<p>次次分類</p>
				</div>
			</div>
		</div>
	</div>
	<hr/>
		
	<!-- Warning Area -->
	<div class="alert alert-info fade in">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Attention!</strong> &nbsp;請看清楚商品說明再進行出價唷！
    </div>
	
	<!--商品廣告列-->
	<div>
	<div class="row-fluid">
		<div class="carousel slide" id="myCarousel">
			<div class="carousel-inner">
				<div class="item active">
					<img alt="" src="tpic/01.png" />
					<div class="carousel-caption" style="height:30px;">
						<h4>First Thumbnail label</h4>
						<p>content</p>
					</div>
				</div>
				<div class="item">
					<img alt="" src="tpic/02.png">
					<div class="carousel-caption" style="height:30px;">
						<h4>First Thumbnail label</h4>
						<p>content</p>
					</div>
				</div>
				<div class="item">
					<img alt="" src="tpic/03.png">
					<div class="carousel-caption" style="height:30px;">
						<h4>Third Thumbnail label</h4>
						<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
					</div>
				</div>
			</div>
			<a data-slide="prev" href="#myCarousel" class="left carousel-control">‹</a>
			<a data-slide="next" href="#myCarousel" class="right carousel-control">›</a>
		</div>
	</div>
	</div>
	
	<div class="accordion" id="accordion2">
		<div class="accordion-group span5">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
					Collapsible Group Item #2
				</a>
			</div>
			<div id="collapseTwo" class="accordion-body collapse">
				<div class="accordion-inner">
					Anim pariatur cliche...
				</div>
			</div>
		</div>
	</div>
</div>
	
	<!-- Page Button -->
	<div class="pagination pagination-centered">
      <ul>
        <li class="disabled"><a href="#">&laquo;</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li class="disabled"><a href="#">&raquo;</a></li>
     </ul>
    </div>

</div>


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