<?php
	// Last Modified Day : 2012.09.26
	// No need to login to browse the products.
	session_start();
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
<div class = "container">
    <?php
	    require_once( "memberStateLine.php" );
	?>
	
	<div class="row-fluid">
		<ul class="thumbnails">
			<li class="span4">
				<div class="thumbnail">
					<img src="http://placehold.it/300x300" alt="">
					<div class="caption">
						<h3>二手交易市場</h3>
						<p>Description</p>
						
						<p>
							<!-- Rule Button of Second Hand Board -->
							<div id="ruleSecond" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-header">
								 	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								 	<h3 id="myModalLabel">二手交易規則</h3>
								</div>
								<div class="modal-body">
									1.<br />
									2.<br />
									3.<br />
									Will Complete Soon...
								</div>
								<div class="modal-footer">
								  	<button class="btn btn-primary" data-dismiss="modal">了解</button>
								</div>
							</div>
	
							<div class="btn-toolbar">
								<div class="btn-group">
									<button class="btn btn-primary btn-large"><i class = "icon-globe icon-white"></i> 市場分類</button>
									<button class="btn btn-primary dropdown-toggle btn-large" data-toggle="dropdown">
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href = "sellC.php"><i class = "icon-folder-open"></i> 全部分類</a></li>
										<li><a href = "#"><i class = "icon-globe"></i> 二手書區</a></li>
										<li><a href = "#"><i class = "icon-eye-open"></i> 雜物區</a></li>
									</ul>
								</div>
								<a data-toggle="modal" href="#ruleSecond" class="btn btn-danger btn-large"><i class = "icon-ok icon-white"></i> 交易規則</a>
							</div>
						</p>
					</div>
				</div>
			</li>
			<li class="span4">
				<div class="thumbnail">
					<img src="http://placehold.it/300x300" alt="">
					<div class="caption">
						<h3>限時競標</h3>
						<p>Description</p>
						<p>
							<!-- Rule Button of Contention Market -->
							<div id="ruleContention" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-header">
								 	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								 	<h3 id="myModalLabel">競標市場規則</h3>
								</div>
								<div class="modal-body">
									1.<br />
									2.<br />
									3.<br />
									Will Complete Soon...
								</div>
								<div class="modal-footer">
								  	<button class="btn btn-primary" data-dismiss="modal">了解</button>
								</div>
							</div>
							<div class="btn-toolbar">
								<div class="btn-group">
									<button class="btn btn-primary btn-large"><i class = "icon-hand-up icon-white"></i> 競標分類</button>
									<button class="btn btn-primary dropdown-toggle btn-large" data-toggle="dropdown">
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href = "contentionBoard.php"><i class = "icon-folder-open"></i> 全部分類</a></li>
										<li><a href = "bookC.php"><i class = "icon-globe"></i> 二手書區</a></li>
										<li><a href = "trivialC.php"><i class = "icon-eye-open"></i> 雜物區</a></li>
									</ul>
								</div>
								<a data-toggle="modal" href="#ruleContention" class="btn btn-danger btn-large"><i class = "icon-ok icon-white"></i> 競標規則</a>
							</div>
						</p>
					</div>
				</div>
			</li>
			<li class="span4">
				<div class="thumbnail">
					<img src="http://placehold.it/300x300" alt="">
					<div class="caption">
						<h3>校園團購</h3>
						<p>Description</p>
						<p>
							<!-- Rule Button of Group Market -->
							<div id="ruleGroup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-header">
								 	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								 	<h3 id="myModalLabel">校園團購規則</h3>
								</div>
								<div class="modal-body">
									Not Complete Yet
								</div>
								<div class="modal-footer">
								  	<button class="btn btn-primary" data-dismiss="modal">了解</button>
								</div>
							</div>
							<a href="#" class="btn btn-info btn-large"><i class = "icon-lock icon-white"></i> 進入團購</a>
							<a data-toggle="modal" href="#ruleGroup" class="btn btn-danger btn-large"><i class = "icon-align-right icon-white"></i> 校園團購規則</a>
							
						</p>
					</div>
				</div>
			</li>
		</ul>
	</div>
	
	
	<!-- Warning Area -->
	<div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Attention!</strong> &nbsp;請務必閱讀市場規則再進入唷！
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