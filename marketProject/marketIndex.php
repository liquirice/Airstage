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
	<meta http-equiv = "Content-Type" content = "text/html; charset = utf8" />
	<meta http-equiv = "Content-Language" content = "zh-tw" />
</head>

<body>

<?php
	require_once( "marketNavi.php" );
?>

<?php
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
					<img src="http://placehold.it/300x200" alt="">
					<div class="caption">
						<h3>Thumbnail label</h3>
						<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
						<p>
							<!-- Rule Button of Second Hand Board -->
							<div id="ruleSecond" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-header">
								 	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								 	<h3 id="myModalLabel">二手交易市場規則</h3>
								</div>
								<div class="modal-body">
									1.<br />
									2.<br />
									3.<br />
									4.<br />
									5.<br />
									6.<br />
									7.<br />
								</div>
								<div class="modal-footer">
								  	<button class="btn btn-primary" data-dismiss="modal">了解</button>
								</div>
							</div>
							<a href="#" class="btn btn-primary btn-large">進入市場</a>
							<a data-toggle="modal" href="#ruleSecond" class="btn btn-danger btn-large">二手交易規則</a>
							
						</p>
					</div>
				</div>
			</li>
			<li class="span4">
				<div class="thumbnail">
					<img src="http://placehold.it/300x200" alt="">
					<div class="caption">
						<h3>Thumbnail label</h3>
						<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
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
									4.<br />
									5.<br />
									6.<br />
									7.<br />
								</div>
								<div class="modal-footer">
								  	<button class="btn btn-primary" data-dismiss="modal">了解</button>
								</div>
							</div>
							<a href="#" class="btn btn-primary btn-large">進入市場</a>
							<a data-toggle="modal" href="#ruleContention" class="btn btn-danger btn-large">競標市場規則</a>
							
						</p>
					</div>
				</div>
			</li>
			<li class="span4">
				<div class="thumbnail">
					<img src="http://placehold.it/300x200" alt="">
					<div class="caption">
						<h3>Thumbnail label</h3>
						<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
						<p>
							<!-- Rule Button of Group Market -->
							<div id="ruleGroup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-header">
								 	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								 	<h3 id="myModalLabel">校園團購規則</h3>
								</div>
								<div class="modal-body">
									1.<br />
									2.<br />
									3.<br />
									4.<br />
									5.<br />
									6.<br />
									7.<br />
								</div>
								<div class="modal-footer">
								  	<button class="btn btn-primary" data-dismiss="modal">了解</button>
								</div>
							</div>
							<a href="#" class="btn btn-primary btn-large">進入市場</a>
							<a data-toggle="modal" href="#ruleGroup" class="btn btn-danger btn-large">校園團購規則</a>
							
						</p>
					</div>
				</div>
			</li>
		</ul>
	</div>
	
	
	<!-- Warning Area -->
	<div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Attention!</strong> 請務必閱讀市場規則再進入消費唷！
    </div>
		
		
</div>


	
<div class = "container">
		
	
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