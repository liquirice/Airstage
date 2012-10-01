<?php
	// Last Modified Day : 2012.10.01
	// No need to login to browse the products.
	session_start();
?>

<!DOCTYPE HTML>
<head>
	<title>Airstage - Student Market - Trivial</title>
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
	<div class="bs-docs-example">
		<ul class="nav nav-tabs">
			<li><a href="contentionBoard.php">全部分類</a></li>
			<li><a href="bookC.php">二手書區</a></li>
			<!--li class="dropdown ">
		    	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Dropdown <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">Action</a></li>
		          <li><a href="#">Another action</a></li>
		          <li><a href="#">Something else here</a></li>
		          <li class="divider"></li>
		          <li><a href="#">Separated link</a></li>
		        </ul>
		     </li-->
	      <li class="active"><a href="#">雜物區</a></li>
	    </ul>
	    
	    <!-- Product Info -->
		<div class="mini-layout fluid">
	    	<div class="mini-layout-sidebar">
		    	<div class="bs-docs-grid">
		            <div class="row show-grid">
		              <div class="span1">1</div>
		            </div>
		    	</div>
	    	</div>
	    	<div class="mini-layout-body">
		    	
	    	</div>
	    </div>
	    
	    <div class="bs-docs-grid">
	        <div class="row show-grid">
	          <div class="span1">1</div>
	          <div class="span1">1</div>
	          <div class="span1">1</div>
	          <div class="span1">1</div>
	          <div class="span1">1</div>
	          <div class="span1">1</div>
	          <div class="span1">1</div>
	          <div class="span1">1</div>
	          <div class="span1">1</div>
	        </div>
	        <div class="row show-grid">
	          <div class="span2">2</div>
	          <div class="span3">3</div>
	          <div class="span4">4</div>
	        </div>
	        <div class="row show-grid">
	          <div class="span4">4</div>
	          <div class="span5">5</div>
	        </div>
	        <div class="row show-grid">
	          <div class="span9">9</div>
	        </div>
	        <div class="row show-grid">
	          <div class="span11">11</div>
	        </div>
	    </div>   
    </div>
		
	<!-- Warning Area -->
	<div class="alert alert-info fade in">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Attention!</strong> &nbsp;請看清楚商品說明再進行出價唷！
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