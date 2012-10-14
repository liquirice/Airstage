<?php
	// Last Modified Day : 2012.10.07
	session_start();
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		require_once( "../connectVar.php" );
		$stu_id = $_SESSION['stu_id'];
		
		//$query = "SELECT * FROM "
	}
?>

<!DOCTYPE HTML>
<head>
	<title>Airstage - 市場成交紀錄</title>
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
		<li class="active">成交記錄</li>
	</ul>
	
	<!-- Warning Area -->
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Airstage 提醒：</strong>順利完成交易後記得要上線寫回饋給賣家，好讓大家可以知道品質好壞並進行改善喔。
    </div>
	
	
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
          <h3>二手市場</h3>
        </a>
      </div>
      <div id="collapseOne" class="accordion-body collapse">
        <div class="accordion-inner">
          <table class="table table-striped">
		      <thead>
		        <tr>
		          <th>#</th>
		          <th>商品名稱 <i class="icon-chevron-down"></i></th>
		          <th>賣方資料 <i class="icon-chevron-down"></i></th>
		          <th>交易方式 <i class="icon-chevron-down"></i></th>
		          <th>成交價格 <i class="icon-chevron-down"></i></th>
		          <th>成交時間 <i class="icon-chevron-down"></th>
		          <th>回饋 <i class="icon-chevron-down"></i></th>         
		        </tr>
		      </thead>
		      <tbody>
		        <tr>
		          <td>1</td>
		          <td><a href = "#">Adobe Photoshop CS6</a></td>
		          <td>       
			      	<a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Archerwind</a>          	
		          </td>
		          <td>金錢</td>
		          <td>NT$1500</td>
		          <td>2012 / 10 / 10</td>
		          <td><a href="feedback.php"><i class="icon-gift"></i> 尚未回饋</a></td>		             
		        </tr>
		        <tr>
		          <td>2</td>
		          <td><a href = "#">Adobe Photoshop CS6</a></td>
		          <td>
			          <a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Archerwind	</a>
		          </td>
		          <td>以物易物</td>
		          <td>兩隻泰迪熊</td>
		          <td>2012 / 10 / 10</td>
		          <td>		          	
		          	<a href="#"><i class="icon-ok"></i> 查看回饋</a>
		          </td>		         
		        </tr>
		      </tbody>
		    </table> 
        </div>
      </div>
    </div>
    
    <hr class="bs-docs-separator">
    
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
          <h3>限時競標</h3>
        </a>
      </div>
      <div id="collapseTwo" class="accordion-body collapse in">
        <div class="accordion-inner">
          <table class="table table-striped">
		      <thead>
		        <tr>
		          <th>#</th>
		          <th>商品名稱 <i class="icon-chevron-down"></i></th>
		          <th>賣方資料 <i class="icon-chevron-down"></i></th>
		          <th>成交價格 <i class="icon-chevron-down"></i></th>
		          <th>成交時間 <i class="icon-chevron-down"></th>
		          <th>回饋 <i class="icon-chevron-down"></i></th> 
		          <th>出價記錄 </th>        
		        </tr>
		      </thead>
		      <tbody>
		        <tr>
		          <td>1</td>
		          <td><a href = "#">Adobe Photoshop CS6</a></td>
		          <td>       
			      	<a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Archerwind</a>          	
		          </td>
		          <td>NT$1500</td>
		          <td>2012 / 10 / 10</td>
		          <td><a href="#"><i class="icon-gift"></i> 尚未回饋</a></td>
		          <td><a href="#"><i class="icon-shopping-cart"></i> 查看</a></td>       
		        </tr>
		        <tr>
		          <td>2</td>
		          <td><a href = "#">Adobe Photoshop CS6</a></td>
		          <td>
			          <a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Archerwind</a>
		          </td>
		          <td>NT$5600</td>
		          <td>2012 / 10 / 10</td>
		          <td><a href="#"><i class="icon-ok"></i> 查看回饋</a></td>
		          <td><a href="#"><i class="icon-shopping-cart"></i> 查看</a></td>
		        </tr>
		      </tbody>
		    </table>
        </div>
      </div>
    </div>
    
    <hr class="bs-docs-separator">
    
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
          <h3>校園團購</h3>
        </a>
      </div>
      <div id="collapseThree" class="accordion-body collapse">
        <div class="accordion-inner">
          <table class="table table-striped">
		      <thead>
		        <tr>
		          <th>#</th>
		          <th>商品名稱 <i class="icon-chevron-down"></i></th>
		          <th>賣方資料 <i class="icon-chevron-down"></i></th>
		          <th>成交價格 <i class="icon-chevron-down"></i></th>
		          <th>成交時間 <i class="icon-chevron-down"></th>
		          <th>回饋 <i class="icon-chevron-down"></i></th>
		          <th>交易人數 <i class="icon-chevron-down"></i></th>         
		        </tr>
		      </thead>
		      <tbody>
		        <tr>
		          <td>1</td>
		          <td><a href = "#">Adobe Photoshop CS6</a></td>
		          <td>       
			      	<a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Archerwind</a>          	
		          </td>
		          <td>NT$1500</td>
		          <td>2012 / 10 / 10</td>
		          <td><a href="#"><i class="icon-gift"></i> 尚未回饋</a></td>
		          <td><i class="icon-shopping-cart"></i> 70</td>       
		        </tr>
		        <tr>
		          <td>2</td>
		          <td><a href = "#">Adobe Photoshop CS6</a></td>
		          <td>
			          <a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Archerwind</a>
		          </td>
		          <td>NT$5600</td>
		          <td>2012 / 10 / 10</td>
		          <td><a href="#"><i class="icon-ok"></i> 查看回饋</a></td>
		          <td><i class="icon-shopping-cart"></i> 20</td>
		        </tr>
		      </tbody>
		    </table>
        </div>
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
</html>