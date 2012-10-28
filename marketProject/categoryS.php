<?php
	// Last Modified Day : 2012.10.14
	// No need to login to browse the products.
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
		.nav h4{
			text-align:top;
			line-height:30px; 
		}
		.well li{
			list-style-image:url('sqpurple.gif');
			line-height:28px;
		}
		ul{
			list-style-type:none;
		}
		/*每個主分類在最後多一條底線
		.tab-content{
			padding-bottom: 9px; border-bottom: 1px solid #ddd;
		}
		*/
	</style>
</head>

<body>

<?php
	require_once( "marketNavi.php" );
	require_once( "marketAnnouce.php" );
?>

<!-- Container Start -->
<div class = "container">
	<div class="progress progress-striped active">
			<div class="bar bar-primary" style="width: 60%;"></div>
	</div>

    <?php
	    require_once( "memberStateLine.php" );
	?>
		
	<!--Breadcrumbs-->
	<ul class="breadcrumb">
		<li><a href="marketIndex.php">市場首頁</a> <span class="divider">/</span></li>
		<li><a href="#">限時競標</a> <span class="divider">/</span></li>
		<li class="active">全部分類</li>
	</ul>
	
	<!-- Warning Area -->
	<div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Attention!</strong> &nbsp;請務必閱讀競標規則再進入唷！
    </div>
	
	<!--a href="#books_and_ magazine">ttt</a-->
	
	<!--總分類列表-->
	<div class="">
		<!--books and magazine-->
		<ul class="nav nav-tabs">
			<li><h4><i class="icon-book"></i> <a name="books_and_ magazine" href="#">書籍雜誌</a></h4></li>
		</ul>
		<div class="tab-content">
			<div class="row-fluid">
				<div class="span3 well well-small">
					<ul>
					<li><h5><a href="#">校內課程用書</a></h5></li>
						<ul>
						<li><a href="#">文學院</a></li>
						<li><a href="#">理學院</a></li>
						<li><a href="#">工學院</a></li>
						<li><a href="#">管理學院</a></li>
						<li><a href="#">海洋科學院</a></li>
						<li><a href="#">社會科學院</a></li>
						<li><a href="#">通識課程</a></li>
						<li><a href="#">其他課程</a></li>
						</ul>
					</ul> 
				</div>
				<div class="span3 well well-small">
					<ul>
					<li><h5><a href="#">一般書籍</a></h5></li>
						<ul>
						<li><a href="#">商業理財</a></li>
						<li><a href="#">文學小說</a></li>
						<li><a href="#">藝術設計</a></li>
						<li><a href="#">人文科普</a></li>
						<li><a href="#">語言電腦</a></li>
						<li><a href="#">休閒生活</a></li>
						<li><a href="#">畫冊漫畫</a></li>
						<li><a href="#">其他書籍</a></li>
						</ul>
					</ul> 
				</div>
				<div class="span3 well well-small">
					<ul>
					<li><h5><a href="#">雜誌期刊</a></h5></li>
						<ul>
						<li><a href="#">新聞時事</a></li>
						<li><a href="#">財經商管</a></li>
						<li><a href="#">語言、文學、史地</a></li>
						<li><a href="#">科學、電腦</a></li>
						<li><a href="#">藝術、設計、攝影</a></li>
						<li><a href="#">流行時尚、影視偶像</a></li>
						<li><a href="#">旅遊、休閒、生活</a></li>
						<li><a href="#">其他雜誌</a></li>
						</ul>
					</ul> 
				</div>
				<div class="span3 well well-small">
					<ul>
					<li><h5><a href="#">外文書</a></h5></li>
						<ul>
						<li><a href="#">商業理財</a></li>
						<li><a href="#">文學小說</a></li>
						<li><a href="#">藝術設計</a></li>
						<li><a href="#">人文科普</a></li>
						<li><a href="#">語言電腦</a></li>
						<li><a href="#">休閒生活</a></li>
						<li><a href="#">畫冊漫畫</a></li>
						<li><a href="#">其他書籍</a></li>
						</ul>
					</ul> 
				</div>
			</div>
			
		</div>
		
		
		<ul class="nav nav-tabs">
			<li class="active"><span style="text-align:top;line-height:50px; "> <i class="icon-shopping-cart"></i> <strong>服飾精品</strong></span></li>
		</ul>
		<div class="tab-content">
			<div class="row-fluid">
				<div class="span3 well well-small">
					<ul>
					<li><h5>女用</h5></li>
						<ul>
						<li>服飾</li>
						<li>包款</li>
						<li>鞋子</li>
						<li>配件</li>
						<li>其他</li>
						</ul>
					</ul> 
				</div>
				<div class="span3 well well-small">
					<ul>
					<li><h5>男用</h5></li>
						<ul>
						<li>服飾</li>
						<li>包款</li>
						<li>鞋子</li>
						<li>配件</li>
						<li>其他</li>
						</ul>
					</ul> 
				</div>
			</div>
		</div>
		
		<ul class="nav nav-tabs">
			<li class="active"><span style="text-align:top;line-height:50px; "> <i class="icon-book"></i> <strong>生活雜物</strong></span></li>
		</ul>
		<div class="tab-content">
			<div class="row-fluid">
				<div class="span3 well well-small">
					<ul>
					<li><h5>生活家電</h5></li>
						<ul>
						<li>電冰箱</li>
						<li>其他</li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						</ul>
					</ul> 
				</div>
				<div class="span3 well well-small">
					<ul>
					<li><h5>電腦及週邊產品</h5></li>
						<ul>
						<li>桌電筆電</li>
						<li>週邊設備</li>
						<li>電腦零組件</li>
						<li>軟體</li>
						<li>網路設備</li>
						<li>其他</li>
						<li></li>
						<li></li>
						</ul>
					</ul> 
				</div>
				<div class="span3 well well-small">
					<ul>
					<li><h5>第二層小標題。最多四項</h5></li>
						<ul>
						<li>第三層小分類。最多七項+一個其他(盡量)</li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						</ul>
					</ul> 
				</div>
				<div class="span3 well well-small">
					<ul>
					<li><h5>第二層小標題。最多四項</h5></li>
						<ul>
						<li>第三層小分類。最多七項+一個其他(盡量)</li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						</ul>
					</ul> 
				</div>
			</div>
		</div>
		
		<ul class="nav nav-tabs">
			<li class="active"><span style="text-align:top;line-height:50px; "> <i class="icon-book"></i> <strong>第一層標題</strong></span></li>
		</ul>
		<div class="tab-content">
			<div class="row-fluid">
				<div class="span3 well well-small">
					<ul>
					<li><h5>第二層小標題。最多四項</h5></li>
						<ul>
						<li>第三層小分類。最多七項+一個其他(盡量)</li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						</ul>
					</ul> 
				</div>
				<div class="span3 well well-small">
					<ul>
						<li><h5>第二層小標題。最多四項</h5></li>
						<ul>
							<li>第三層小分類。最多七項+一個其他(盡量)</li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
						</ul>
					</ul> 
				</div>
				<div class="span3 well well-small">
					<ul>
					<li><h5>第二層小標題。最多四項</h5></li>
						<ul>
						<li>第三層小分類。最多七項+一個其他(盡量)</li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						</ul>
					</ul> 
				</div>
				<div class="span3 well well-small">
					<ul>
					<li><h5>第二層小標題。最多四項</h5></li>
						<ul>
						<li>第三層小分類。最多七項+一個其他(盡量)</li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						</ul>
					</ul> 
				</div>
			</div>
		</div>
		
		<!--ul class="nav nav-tabs">
			<li class="active"><span style="text-align:top;line-height:50px; "> <i class="icon-book"></i> <strong>第一層標題</strong></span></li>
		</ul>
		<div class="tab-content">
			<div class="row-fluid">
				<div class="span3 well well-small">
					<ul>
					<li><h5>第二層小標題。最多四項</h5></li>
						<ul>
						<li>第三層小分類。最多七項+一個其他(盡量)</li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						</ul>
					</ul> 
				</div>
			</div>
		</div-->
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