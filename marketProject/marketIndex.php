<<<<<<< HEAD
<?php
	// No need to login to browse the products.
	require_once( "redirectFilter.php" );
	require_once( "../global/setSession.php" );
    require_once("../global/connectVar.php");
?>

<!DOCTYPE HTML>
<head>
	<title>Airstage - Student Market</title>
	<link href = "../tm2.ico" rel = "shortcut icon" />
	<link href = "css/bootstrap.css" rel = "stylesheet" />
	<link href = "css/baseCss.css" rel = "stylesheet" />
	<link href="css/docs.css" rel="stylesheet">
	<meta http-equiv = "Content-Type" content = "text/html; charset = utf8" />
	<meta http-equiv = "Content-Language" content = "zh-tw" />
	<style>
		h3, h2, h1, table, tr, td, li, ul, th, p {
			font-family: "微軟正黑體", "Arial";
		}
	</style>
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
	
	<!-- Warning Area -->
	<div class="alert alert-danger fade in" style="font-family: '微軟正黑體', 'Arial';">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Attention!</strong> 請務必閱讀市場規則再進入唷！ 
		方便的市集使用教學請點 <a href = "http://www.airstage.com.tw/column/read.php?rno=107" target="_blank">Click</a>
    </div>
	
	<div class="row-fluid">
		<ul class="thumbnails">
			<li class="span4" style = "background-color: #FBFBFB;">
				<div class="thumbnail" style="height: 463px;">			
					<div class="tooltip-demo">
						<ul class="bs-docs-tooltip-examples">
							<li>
								<a href="categoryS.php" class="thumbnail" rel="tooltip" data-placement="top" title="點我進入">
									<img src="img/secondHand_300x300.jpg" alt="二手交易市場" />
								</a>
								<div class="bs-docs-example-popover">
						          	<div class="bottom">
						            	<!--div class="arrow"></div-->
					            		<h3 class="popover-title">二手交易市場</h3>
					            		<div class="popover-content">
					            			<p>一個給中山西子灣大學學生掏寶與二手交易的好地方．請先看完版規再進入唷!</p>
					            		</div>
						            </div>						       
						            <!-- Rule Button of Second Hand Board -->
									<div id="ruleSecond" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-header">
										 	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										 	<h3 id="myModalLabel">二手交易規則</h3>
										</div>
										<div class="modal-body" style="text-align: left; font-family: '微軟正黑體', 'Arial'">
											1. 活體色情菸酒醫療器材不可販售，包括宿舍床位轉移資格。<br />
											2. 侵害他人著作權 / 商標 / 專利等權利之侵權物品，不可販售。<br />
											3. 違反公共秩序、善良風俗或依法令禁止販售之商品，不可販售。<br />
											4. 發文上沒有限制單日篇數，但會審查其資料有效性，如發現亂者，將以停權處置。<br />
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
												<li><a href="categoryS.php"><i class="icon-globe"></i> 全部分類</a></li>				  
												<li><a href="marketSearch.php?ct=01"><i class="icon-book"></i> 書籍雜誌</a></li>				
												<li><a href="marketSearch.php?ct=02"><i class="icon-question-sign"></i> 生活雜務</a></li>
											</ul>
										</div>
										<a data-toggle="modal" href="#ruleSecond" class="btn btn-danger btn-large"><i class = "icon-ok icon-white"></i> 交易規則</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</li>
			
			
			<li class="span4" style = "background-color: #FBFBFB;">
				<div class="thumbnail" style="height: 463px;">
					<div class="tooltip-demo">
						<ul class="bs-docs-tooltip-examples">
							<li>
								<a href="#" class="thumbnail" rel="tooltip" data-placement="top" title="近期開放">
									<img src="img/contention_300x300.jpg" alt="限時競標" />
								</a>
								<div class="bs-docs-example-popover">
						          	<div class="bottom">
						            	<!--div class="arrow"></div-->
					            		<h3 class="popover-title">限時競標</h3>
					            		<div class="popover-content">
					            			<p>校園限時競標活動!<br />近期開跑!</p>
					            		</div>
						            </div>
						            <!-- Rule Button of Contention Market -->
									<div id="ruleContention" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-header">
										 	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										 	<h3 id="myModalLabel">競標市場規則</h3>
										</div>
										<div class="modal-body">
											Will Complete Soon...
										</div>
										<div class="modal-footer">
										  	<button class="btn btn-primary" data-dismiss="modal">了解</button>
										</div>
									</div>
									<div class="btn-toolbar">
										<div class="btn-group">
											<button class="btn btn-primary btn-large" disabled><i class = "icon-hand-up icon-white"></i> 競標分類</button>
											<button class="btn btn-primary dropdown-toggle btn-large" data-toggle="dropdown" disabled>
												<span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<li><a href = "#"><i class = "icon-folder-open"></i> 全部分類</a></li>
												<!--li><a href = "#"><i class = "icon-book"></i> 書本區</a></li>
												<li><a href = "#"><i class = "icon-eye-open"></i> 雜物區</a></li-->											
											</ul>
										</div>
										<a data-toggle="modal" href="#ruleContention" class="btn btn-danger btn-large"><i class = "icon-ok icon-white"></i> 競標規則</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</li>
			
			
			<li class="span4" style = "background-color: #FBFBFB;">
				<div class="thumbnail" style="height: 463px;">
					<div class="tooltip-demo">
						<ul class="bs-docs-tooltip-examples">
							<li>
								<a href="#" class="thumbnail" rel="tooltip" data-placement="top" title="近期開放">
									<img src="img/groupShop_300x300.jpg" alt="校園團購" />
								</a>
								<div class="bs-docs-example-popover" style="font-family: '微軟正黑體';">
						          	<div class="bottom">
						            	<!--div class="arrow"></div-->
					            		<h3 class="popover-title">校園團購</h3>
					            		<div class="popover-content">
					            			<p>團購撿便宜都在這裡!<br />近期開跑囉</p>
					            		</div>					            		
						            </div>
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
									<div class="btn-toolbar">
										<div class="btn-group">
											<button class="btn btn-primary btn-large" disabled><i class = "icon-lock icon-white"></i> 團購分類</button>
											<button class="btn btn-primary dropdown-toggle btn-large" data-toggle="dropdown" disabled>
												<span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<li><a href = "#"><i class = "icon-folder-open"></i> 全部分類</a></li>
												<!--li><a href = "#"><i class = "icon-book"></i> 教課書區</a></li>
												<li><a href = "#"><i class = "icon-eye-open"></i> 飲食區</a></li>
												<li><a href = "#"><i class = "icon-search"></i> 求物區</a></li-->
											</ul>
										</div>
										<a data-toggle="modal" href="#ruleGroup" class="btn btn-danger btn-large"><i class = "icon-align-right icon-white"></i> 團購規則</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</li>
		</ul>
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
=======
<?php
	// Last Modified Day : 2012.09.26
	// No need to login to browse the products.
	require_once( "../global/setSession.php" );
?>

<!DOCTYPE HTML>
<head>
	<title>Airstage - Student Market</title>
	<link href = "../tm2.ico" rel = "shortcut icon" />
	<link href = "css/bootstrap.css" rel = "stylesheet" />
	<link href = "css/baseCss.css" rel = "stylesheet" />
	<link href="css/docs.css" rel="stylesheet">
	<meta http-equiv = "Content-Type" content = "text/html; charset = utf8" />
	<meta http-equiv = "Content-Language" content = "zh-tw" />
	<style>
		h4, h3, h2, h1, table, tr, td, li, ul, th, label, legend, button {
			font-family: "微軟正黑體", "Arial";
		}
	</style>
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
	
	<div class="row-fluid">
		<ul class="thumbnails">
			<li class="span4" style = "background-color: #FBFBFB;">
				<div class="thumbnail" style="height: 510px;">
					<!--img src="http://placehold.it/300x300" alt=""-->
					<div class="tooltip-demo">
						<ul class="bs-docs-tooltip-examples">
							<li>
								<a href="#" class="thumbnail" rel="tooltip" data-placement="top" title="點我進入">
									<img src="img/secondHand_300x300.jpg" alt="二手交易市場" />
								</a>
								<div class="bs-docs-example-popover">
						          	<div class="bottom">
						            	<!--div class="arrow"></div-->
					            		<h3 class="popover-title">二手交易市場</h3>
					            		<div class="popover-content">
					            			<p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
					            		</div>
						            </div>						       
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
												<li><a href = "#"><i class = "icon-book"></i> 二手書</a></li>
												<li><a href = "#"><i class = "icon-eye-open"></i> 雜物區</a></li>
												<li><a href = "#"><i class = "icon-search"></i> 求物區</a></li>
											</ul>
										</div>
										<a data-toggle="modal" href="#ruleSecond" class="btn btn-danger btn-large"><i class = "icon-ok icon-white"></i> 交易規則</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</li>
			
			
			<li class="span4" style = "background-color: #FBFBFB;">
				<div class="thumbnail" style="height: 510px;">
					<!--img src="http://placehold.it/300x300" alt=""-->
					<div class="tooltip-demo">
						<ul class="bs-docs-tooltip-examples">
							<li>
								<a href="#" class="thumbnail" rel="tooltip" data-placement="top" title="近期開放">
									<img src="img/contention_300x300.jpg" alt="限時競標" />
								</a>
								<div class="bs-docs-example-popover">
						          	<div class="bottom">
						            	<!--div class="arrow"></div-->
					            		<h3 class="popover-title">限時競標</h3>
					            		<div class="popover-content">
					            			<p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
					            		</div>
						            </div>
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
											<button class="btn btn-primary btn-large" disabled><i class = "icon-hand-up icon-white"></i> 競標分類</button>
											<button class="btn btn-primary dropdown-toggle btn-large" data-toggle="dropdown" disabled>
												<span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<li><a href = "#"><i class = "icon-folder-open"></i> 全部分類</a></li>
												<li><a href = "#"><i class = "icon-book"></i> 書本區</a></li>
												<li><a href = "#"><i class = "icon-eye-open"></i> 雜物區</a></li>											
											</ul>
										</div>
										<a data-toggle="modal" href="#ruleContention" class="btn btn-danger btn-large"><i class = "icon-ok icon-white"></i> 競標規則</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</li>
			
			
			<li class="span4" style = "background-color: #FBFBFB;">
				<div class="thumbnail" style="height: 510px;">
					<!--img src="http://placehold.it/300x300" alt=""-->
					<div class="tooltip-demo">
						<ul class="bs-docs-tooltip-examples">
							<li>
								<a href="#" class="thumbnail" rel="tooltip" data-placement="top" title="近期開放">
									<img src="img/groupShop_300x300.jpg" alt="校園團購" />
								</a>
								<div class="bs-docs-example-popover">
						          	<div class="bottom">
						            	<!--div class="arrow"></div-->
					            		<h3 class="popover-title">校園團購</h3>
					            		<div class="popover-content">
					            			<p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
					            		</div>					            		
						            </div>
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
									<div class="btn-toolbar">
										<div class="btn-group">
											<button class="btn btn-primary btn-large" disabled><i class = "icon-lock icon-white"></i> 團購分類</button>
											<button class="btn btn-primary dropdown-toggle btn-large" data-toggle="dropdown" disabled>
												<span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<li><a href = "#"><i class = "icon-folder-open"></i> 全部分類</a></li>
												<li><a href = "#"><i class = "icon-book"></i> 教課書區</a></li>
												<li><a href = "#"><i class = "icon-eye-open"></i> 飲食區</a></li>
												<li><a href = "#"><i class = "icon-search"></i> 求物區</a></li>
											</ul>
										</div>
										<a data-toggle="modal" href="#ruleGroup" class="btn btn-danger btn-large"><i class = "icon-align-right icon-white"></i> 團購規則</a>
									</div>
								</div>
							</li>
						</ul>
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
>>>>>>> 8196fc654633f729663dc150d634f0eef8af1a58
</html>