<?php
	// Last Modified Day : 2012.10.07
	session_start();
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		/*require_once( "../connectVar.php" );
		$stu_id = $_SESSION['stu_id'];
		
		$query = "SELECT * FROM chasing_list INNER JOIN marketContention_trade Using(stu_id) WHERE chasing_list.stu_id = '$stu_id'";
		$result = mysqli_query( $conn, $query );*/
	}
?>

<!DOCTYPE HTML>
<head>
	<title>Student Market - 買賣管理</title>
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
		<li><a href="sellerInterface.php">賣方總管理</a> <span class="divider">/</span></li>
		<li class="active">限時競標 - Adobe Photoshop CS6</li>
	</ul>
	
	<!-- Warning Area -->
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Airstage 提醒：</strong>結標之後如果追蹤者有把商品加入標記就會持續顯示再追蹤名單中唷！
    </div>
	
	
	<!-- Second Hand Area -->
	<h3>Adobe Photoshop CS6</h3>
	<h4><font color="red">目前得標者 - Archerwind - NT$70000</font></h4>
	<h4>剩餘時間：<a href="#">00:00:03</a></h4>
	<br />
	
	<h4>出價記錄</h4>	
	<table class="table table-striped" style="width: 500px;">
      <thead>
        <tr>
          <th>#</th>
          <th>出價帳號 <i class="icon-chevron-down"></i></th>
          <th>出價金額 <i class="icon-chevron-down"></i></th>       
          <th>出價時間 <i class="icon-chevron-down"></i></th>     
          <th>買賣管理</th>          
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>
          	<a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Archerwind</a>
          </td>
          <td>       
	      	NT$70000          	
          </td>
          <td>2012 / 10 / 10</td>         
          <td>
          	<a href=""><button class="btn btn-info">前往 <i class="icon-edit icon-white"></i></button></a>
          </td>       
        </tr>
        <tr>
          <td>2</td>
          <td>
	          <a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Eric Kuo</a>
          </td>
          <td>
	          NT$42000          
	      </td>        
          <td>2012 / 10 / 10</td>         
          <td>
	      	<a href=""><button class="btn btn-info">前往 <i class="icon-edit icon-white"></i></button></a>
          </td>
        </tr>
      </tbody>
    </table>
	
    
    <hr class="bs-docs-separator">
    <!-- Contention Area -->
    <h4>追蹤名單</h4>
    <table class="table table-striped" style="width: 300px;">
      <thead>
        <tr>
          <th>#</th>
          <th>追蹤帳號 <i class="icon-chevron-down"></i></th>
          <th>追蹤日期 <i class="icon-chevron-down"></i></th>                 
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>
	          <a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Eric Kuo</a>
          </td>
          <td>2012 / 10 / 10</td>                 
        </tr>
        <tr>
          <td>2</td>
          <td>
	          <a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Archerwind</a>
          </td>
          <td>2012 / 10 / 10</td>          
        </tr>               
      </tbody>
    </table>
	
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