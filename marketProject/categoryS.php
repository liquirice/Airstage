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
			/*background-color:;*/
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
			margin-bottom:15px;
			width:140px;
		}
		.tab-content {
			padding-left:20px;
			padding-right:0px;
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
		<li><a href="contentionBoard.php">二手市場</a> <span class="divider">/</span></li>
		<!--li><a href="contentionBoard.php">分類搜尋</a> <span class="divider">/</span></li-->
		<li class="active">分類列表</li>
	</ul>
	
	<!--書籍雜誌-->
	<div class="row-fluid" >
		<div class="span2">
			<h4><a href="searchS.php?ct=01">書籍雜誌</a></h4>
		</div>
		<div class="span10">
			<ul class="nav nav-tabs" id="books">
				<li class="active"><a data-toggle="tab" href="#textbook">課程用書</a></li>
				<li><a data-toggle="tab" href="#book">一般書籍</a></li>
				<li><a data-toggle="tab" href="#magazine">報刊雜誌</a></li>
				<li><a data-toggle="tab" href="#foreign_book">外文書籍</a></li>
			</ul>
			<div class="tab-content" id="booksSubCat">
				<div id="textbook" class="tab-pane fade in active">
					<div class="span12">
						<ul class="vertical_list">
							<li><a href="searchS.php?ct=0100010001">文學院</a></li>
							<li><a href="searchS.php?ct=0100010002">理學院</a></li>
							<li><a href="searchS.php?ct=0100010003">工學院</a></li>
							<li><a href="searchS.php?ct=0100010004">管理學院</a></li>
							<li><a href="searchS.php?ct=0100010005">海洋科學院</a></li>
							<li><a href="searchS.php?ct=0100010006">社會科學院</a></li>
							<li><a href="searchS.php?ct=0100010007">通識課程</a></li>
							<li><a href="searchS.php?ct=0100010008">其他課程</a></li>
						</ul>
					</div>
					<div>
						<i class="icon-chevron-right"></i> <a href="searchS.php?ct=010001">所有課程用書</a>
					</div>
				</div>
				<div id="book" class="tab-pane fade">
					<div class="span12">
						<ul class="vertical_list">
							<li><a href="searchS.php?ct=0100020001">商業理財</a></li>
							<li><a href="searchS.php?ct=0100020002">文學小說</a></li>
							<li><a href="searchS.php?ct=0100020003">藝術設計</a></li>
							<li><a href="searchS.php?ct=0100020004">人文科普</a></li>
							<li><a href="searchS.php?ct=0100020005">語言電腦</a></li>
							<li><a href="searchS.php?ct=0100020006">心靈養生</a></li>
							<li><a href="searchS.php?ct=0100020007">休閒生活</a></li>
							<li><a href="searchS.php?ct=0100020008">其他書籍</a></li>
						</ul>
					</div>
					<div>
						<i class="icon-chevron-right"></i> <a href="searchS.php?ct=010002">所有一般書籍</a>
					</div>
				</div>
				<div id="magazine" class="tab-pane fade">
					<div class="span12">
						<ul class="vertical_list">
							<li><a href="searchS.php?ct=0100030001">新聞時事</a></li>
							<li><a href="searchS.php?ct=0100030003">語言、文學、史地</a></li>
							<li><a href="searchS.php?ct=0100030002">財經企管</a></li>
							<li><a href="searchS.php?ct=0100030004">科學、電腦</a></li>
							<li><a href="searchS.php?ct=0100030005">藝術、設計、攝影</a></li>
							<li><a href="searchS.php?ct=0100030006">相機攝影</a></li>
							<li><a href="searchS.php?ct=0100030007">流行影視</a></li>
							<li><a href="searchS.php?ct=0100030008">旅遊、休閒、生活</a></li>
							<li><a href="searchS.php?ct=0100030009">其他雜誌</a></li>
						</ul>
					</div>
					<div>
						<i class="icon-chevron-right"></i> <a href="searchS.php?ct=010003">所有報刊雜誌</a>
					</div>
				</div>
				<div id="foreign_book" class="tab-pane fade">
					<div class="span12">
						<ul class="vertical_list">
							<li><a href="searchS.php?ct=0100040001">商業理財</a></li>
							<li><a href="searchS.php?ct=0100040002">文學小說</a></li>
							<li><a href="searchS.php?ct=0100040003">藝術設計</a></li>
							<li><a href="searchS.php?ct=0100040004">人文科普</a></li>
							<li><a href="searchS.php?ct=0100040005">語言電腦</a></li>
							<li><a href="searchS.php?ct=0100040006">心靈養生</a></li>
							<li><a href="searchS.php?ct=0100040007">休閒生活</a></li>
							<li><a href="searchS.php?ct=0100040008">其他書籍</a></li>
						</ul>
					</div>
					<div>
						<i class="icon-chevron-right"></i> <a href="searchS.php?ct=010004">所有外文書籍</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--書籍雜誌-->
	
	<hr/>
	
	<!--生活雜物-->	
	<div class="row-fluid" >
		<div class="span2">
			<h4><a href="searchS.php?ct=02">生活雜物</a></h4>
		</div>
		<div class="span10">
			<ul class="nav nav-tabs" id="trivial">
				<li class="active"><a data-toggle="tab" href="#clothes">服飾精品</a></li>
				<li><a data-toggle="tab" href="#beauty_care">美容保養</a></li>
				<li><a data-toggle="tab" href="#stationery">文具小物</a></li>
				<li><a data-toggle="tab" href="#3c">3C產品</a></li>
				<li><a data-toggle="tab" href="#ticket">各式票券</a></li>
				<li><a data-toggle="tab" href="#house">家具家電</a></li>
				<li><a data-toggle="tab" href="#traffic">交通工具</a></li>
				<li><a href="searchS.php?ct=0200080001">食品</a></li>
				<li><a href="searchS.php?ct=0200090001">其他雜物</a></li>
				<!--li><a data-toggle="tab" href="#food">食品</a></li>
				<li><a data-toggle="tab" href="#other">其他雜物</a></li-->
			</ul>
			<div class="tab-content" id="trivialSubCat">
				<div id="clothes" class="tab-pane fade in active">
					<div class="span12">
						<ul class="vertical_list">
							<li><a href="searchS.php?ct=0200010001">女性時裝</a></li>
							<li><a href="searchS.php?ct=0200010002">男性時裝</a></li>
							<li><a href="searchS.php?ct=">其他</a></li>
						</ul>
					</div>
					<div>
						<i class="icon-chevron-right"></i> <a href="searchS.php?ct=020001">所有服飾精品</a>
					</div>
				</div>
				<div id="beauty_care" class="tab-pane fade">
					<div class="span12">
						<ul class="vertical_list">
							<li><a href="searchS.php?ct=0200020001">保養用品</a></li>
							<li><a href="searchS.php?ct=0200020002">化妝用品</a></li>
							<li><a href="searchS.php?ct=0200020003">健身用品</a></li>
							<li><a href="searchS.php?ct=0200020004">清潔用品</a></li>
							<li><a href="searchS.php?ct=0200020005">其他</a></li>
						</ul>
					</div>
					<div>
						<i class="icon-chevron-right"></i> <a href="searchS.php?ct=020002">所有美容保養</a>
					</div>
				</div>
				<div id="stationery" class="tab-pane fade">
					<div class="span12">
						<ul class="vertical_list">
							<li><a href="searchS.php?ct=0200030001">文具用品</a></li>
							<li><a href="searchS.php?ct=0200030002">收納整理</a></li>
							<li><a href="searchS.php?ct=0200030003">其他</a></li>
						</ul>
					</div>
					<div>
						<i class="icon-chevron-right"></i> <a href="searchS.php?ct=020003">所有文具小物</a>
					</div>
				</div>
				<div id="3c" class="tab-pane fade">
					<div class="span12">
						<ul class="vertical_list">
							<li><a href="searchS.php?ct=0200040001">電腦與周邊</a></li>
							<li><a href="searchS.php?ct=0200040002">手機與周邊</a></li>
							<li><a href="searchS.php?ct=0200040003">影音與周邊</a></li>
							<li><a href="searchS.php?ct=0200040005">相機與周邊</a></li>
							<li><a href="searchS.php?ct=0200040004">其他</a></li>
						</ul>
					</div>
					<div>
						<i class="icon-chevron-right"></i> <a href="searchS.php?ct=020004">所有3C產品</a>
					</div>
				</div>
				<div id="ticket" class="tab-pane fade">
					<div class="span12">
						<ul class="vertical_list">
							<li><a href="searchS.php?ct=0200050001">交通票券</a></li>
							<li><a href="searchS.php?ct=0200050002">活動票券</a></li>
							<li><a href="searchS.php?ct=0200050003">餐券禮券</a></li>
							<li><a href="searchS.php?ct=0200050004">電影票券</a></li>
							<li><a href="searchS.php?ct=0200050005">其他</a></li>
						</ul>
					</div>
					<div>
						<i class="icon-chevron-right"></i> <a href="searchS.php?ct=020005">所有各式票券</a>
					</div>
				</div>
				<div id="house" class="tab-pane fade">
					<div class="span12">
						<ul class="vertical_list">
							<li><a href="searchS.php?ct=0200060001">電冰箱</a></li>
							<li><a href="searchS.php?ct=0200060002">廚房家電</a></li>
							<li><a href="searchS.php?ct=0200060003">其他家電</a></li>
							<li><a href="searchS.php?ct=0200060004">衛浴用品</a></li>
							<li><a href="searchS.php?ct=0200060005">各種家具</a></li>
						</ul>
					</div>
					<div>
						<i class="icon-chevron-right"></i> <a href="searchS.php?ct=020006">所有家具家電</a>
					</div>
				</div>
				<div id="traffic" class="tab-pane fade">
					<div class="span12">
						<ul class="vertical_list">
							<li><a href="searchS.php?ct=0200070001">腳踏車</a></li>
							<li><a href="searchS.php?ct=0200050001">交通票券</a></li>
							<li><a href="searchS.php?ct=0200070002">其他</a></li>
						</ul>
					</div>
					<div>
						<i class="icon-chevron-right"></i> <a href="searchS.php?ct=020007">所有交通工具</a>
					</div>
				</div>
				<!--div id="food" class="tab-pane fade">
					<div class="span12">
						<ul class="vertical_list">
							<li><a href="searchS.php?ct=0200080001">食品</a></li>
						</ul>
					</div>
					<div>
						<i class="icon-chevron-right"></i> <a href="searchS.php?ct=020008">所有食品</a>
					</div>
				</div>
				<div id="other" class="tab-pane fade">
					<div class="span12">
						<ul class="vertical_list">
							<li><a href="searchS.php?ct="></a></li>
						</ul>
					</div>
					<div>
						<i class="icon-chevron-right"></i> <a href="searchS.php?ct=">所有</a>
					</div>
				</div-->
			</div>
		</div>
	</div>
	<!--生活雜物-->
	<hr/>
		


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