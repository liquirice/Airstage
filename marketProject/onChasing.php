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
	<title>Student Market - 商品追蹤清單</title>
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
		<li class="active">追蹤清單</li>
	</ul>
	
	<!-- Warning Area -->
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Airstage 提醒：</strong>已由他人結案的物品會自動從追蹤清單中移除喔！
    </div>
	
	
	<!-- Second Hand Area -->
	<h3>二手市場</h3>
	<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>商品名稱 <i class="icon-chevron-down"></i></th>
          <th>賣方資料 <i class="icon-chevron-down"></i></th>
          <th>商品狀態 <i class="icon-chevron-down"></i></th>
          <th>追蹤時間 <i class="icon-chevron-down"></th>
          <th>標記 <i class="icon-chevron-down"></i></th>
          <th>操作選項</th>          
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><a href = "#">Adobe Photoshop CS6</a></td>
          <td>       
	      	<a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Archerwind</a>          	
          </td>
          <td>已結案</td>
          <td></td>
          <td><i class="icon-star"></i></td>
          <td>
	          <div class="btn-group">
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="icon-star"></i> 加入標記</a></li>
                  <li><a href="#"><i class="icon-trash"></i> 刪除選項</a></li>                  
                  <!--li class="divider"></li-->               
                </ul>
              </div><!-- /btn-group -->
          </td>       
        </tr>
        <tr>
          <td>2</td>
          <td><a href = "#">Adobe Photoshop CS6</a></td>
          <td>
	          <a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Archerwind</a>
          </td>
          <td><font color="red">出價中</font></td>
          <td>2012 / 10 / 10</td>
          <td></td>
          <td>
	          <div class="btn-group">
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="icon-star"></i> 加入標記</a></li>
                  <li><a href="#"><i class="icon-trash"></i> 刪除選項</a></li>                  
                  <!--li class="divider"></li-->               
                </ul>
              </div><!-- /btn-group -->
          </td>
        </tr>
        
        <tr>
          <td>3</td>
          <td><a href = "#">Adobe Photoshop CS6</a></td>
          <td>
	          <a href="#" rel="popover" title="Archerwind" data-content="And here's some amazing content. It's very engaging. right?">Archerwind</a>
          </td>
          <td>已結案</td>
          <td></td>
          <td></td>
          <td>
	          <div class="btn-group">
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="icon-star"></i> 加入標記</a></li>
                  <li><a href="#"><i class="icon-trash"></i> 刪除選項</a></li>                  
                  <!--li class="divider"></li-->               
                </ul>
              </div><!-- /btn-group -->
          </td>
        </tr>
      </tbody>
    </table>
    
    
    <hr class="bs-docs-separator">
    <!-- Contention Area -->
    <h3>限時競標</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>商品名稱 <i class="icon-chevron-down"></i></th>
          <th>目前價格 <i class="icon-chevron-down"></i></th>
          <th>商品狀態 <i class="icon-chevron-down"></i></th>
          <th>追蹤時間 <i class="icon-chevron-down"></th>
          <th>標記 <i class="icon-chevron-down"></i></th>
          <th>操作選項</th>          
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><a href = "#">Adobe Photoshop CS6</a></td>
          <td>NT$200000</td>
          <td>已結案</td>
          <td>2012 / 10 / 10</td>
          <td><i class="icon-star"></i></td>
          <td>
	          <div class="btn-group">
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="icon-star"></i> 加入標記</a></li>
                  <li><a href="#"><i class="icon-trash"></i> 刪除選項</a></li>                  
                  <!--li class="divider"></li-->               
                </ul>
              </div><!-- /btn-group -->
          </td>       
        </tr>
        <tr>
          <td>2</td>
          <td><a href = "#">Adobe Photoshop CS6</a></td>
          <td>NT$200000</td>
          <td><font color="red">競標中</font></td>
          <td></td>
          <td></td>
          <td>
	          <div class="btn-group">
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="icon-star"></i> 加入標記</a></li>
                  <li><a href="#"><i class="icon-trash"></i> 刪除選項</a></li>                  
                  <!--li class="divider"></li-->               
                </ul>
              </div><!-- /btn-group -->
          </td>
        </tr>
        
        <tr>
          <td>3</td>
          <td><a href = "#">Adobe Photoshop CS6</a></td>
          <td>NT$200000</td>
          <td>已結案</td>
          <td></td>
          <td></td>
          <td>
	          <div class="btn-group">
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="icon-star"></i> 加入標記</a></li>
                  <li><a href="#"><i class="icon-trash"></i> 刪除選項</a></li>                  
                  <!--li class="divider"></li-->               
                </ul>
              </div><!-- /btn-group -->
          </td>
        </tr>
      </tbody>
    </table>
    
    
    <hr class="bs-docs-separator">
    <!-- Group Shop Area -->
    <h3>校園團購</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>商品名稱 <i class="icon-chevron-down"></i></th>
          <th>目前價格 <i class="icon-chevron-down"></i></th>
          <th>商品狀態 <i class="icon-chevron-down"></i></th>
          <th>追蹤時間 <i class="icon-chevron-down"></th>
          <th>標記 <i class="icon-chevron-down"></i></th>
          <th>操作選項</th>          
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td><a href = "#">Adobe Photoshop CS6</a></td>
          <td>NT$200000</td>
          <td>已結案</td>
          <td>2012 / 10 / 10</td>
          <td><i class="icon-star"></i></td>
          <td>
	          <div class="btn-group">
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="icon-star"></i> 加入標記</a></li>
                  <li><a href="#"><i class="icon-trash"></i> 刪除選項</a></li>                  
                  <!--li class="divider"></li-->               
                </ul>
              </div><!-- /btn-group -->
          </td>       
        </tr>
        <tr>
          <td>2</td>
          <td><a href = "#">Adobe Photoshop CS6</a></td>
          <td>NT$200000</td>
          <td><font color="red">揪團中(20人	)</font></td>
          <td></td>
          <td></td>
          <td>
	          <div class="btn-group">
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="icon-star"></i> 加入標記</a></li>
                  <li><a href="#"><i class="icon-trash"></i> 刪除選項</a></li>                  
                  <!--li class="divider"></li-->               
                </ul>
              </div><!-- /btn-group -->
          </td>
        </tr>
        
        <tr>
          <td>3</td>
          <td><a href = "#">Adobe Photoshop CS6</a></td>
          <td>NT$200000</td>
          <td>已結案</td>
          <td></td>
          <td></td>
          <td>
	          <div class="btn-group">
                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="icon-star"></i> 加入標記</a></li>
                  <li><a href="#"><i class="icon-trash"></i> 刪除選項</a></li>                  
                  <!--li class="divider"></li-->               
                </ul>
              </div><!-- /btn-group -->
          </td>
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