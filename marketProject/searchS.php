<?php
	// Last Modified Day : 
	// 
	require_once("../setSession.php");
	require_once("../connectVar.php");
	
	$query = "SELECT * FROM ( (`marketSecondHand_trade` INNER JOIN `marketSecondHand_time` USING ( time_id ) ) INNER JOIN `marketSecondHand_productInfo` USING ( product_id ) )  ";
	
	
	//WHERE
	if( !empty($_GET['kwd']) )
	{
		$query .= "WHERE ";
		
		//關鍵字(暫不支援AND和NOT LIKE)
		$keywords = mysqli_real_escape_string( $conn, chop(trim($_GET['kwd'])) );
		$keyword = explode( " ", $keywords );
		$word_num = 0;
		$query .= "( ";
		foreach( $keyword as $word )
		{
			if( $word_num != 0 ){	$query .= "OR "; } 
			$query .= "`title` LIKE '%$word%' ";
			$word_num++;
		}
		$query .= ") ";
		$showAdv = 0;
		//時間
		if( !empty($_GET['d1']) ) { //從~時間
			$dateFrom = mysqli_real_escape_string( $conn, chop(trim($_GET['d1'])) );
			$query .= "AND `start_date` >= '$dateFrom' ";
			$showAdv++;
		}
		if( !empty($_GET['d2']) ) { //到~時間
			$dateTo = mysqli_real_escape_string( $conn, chop(trim($_GET['d2'])) );
			$query .= "AND `end_date` <= '$dateTo' ";
			$showAdv++;
		}
		//價格
		if( !empty($_GET['p1']) ) { //從~元以上
			$priceAbove = mysqli_real_escape_string( $conn, chop(trim($_GET['p1'])) );
			$query .= "AND `least_price` >= '$priceAbove' ";
			$showAdv++;
		}
		if( !empty($_GET['p2']) ) { //到~元以下
			$priceBelow = mysqli_real_escape_string( $conn, chop(trim($_GET['p2'])) );
			$query .= "AND `least_price` <= '$priceBelow' ";
			$showAdv++;
		}
		//exist
		if( !empty($_GET['liv1']) ) { //在架上 liv1 = 1
			$liv1 = mysqli_real_escape_string( $conn, chop(trim($_GET['liv1'])) );
			$showAdv++;
		}
		if( !empty($_GET['liv2']) ) { //已下架 liv2 = 2
			$liv2 = mysqli_real_escape_string( $conn, chop(trim($_GET['liv2'])) );
			$showAdv++;
		}
		$live = $liv1 + $liv2;
		switch( $live )
		{
			case 2 : //已下架 liv2 = 2
				$query .= "AND `exist` = 0 ";
				break;
			case 3 : //liv1 + liv2 = 1+2 = 3 : 列出全部
				$query .= "AND `exist` >= 0 ";
				break;
			default : //預設
				$query .= "AND `exist` = 1 ";
		}
		//seller
		if( !empty($_GET['usr']) ) { //賣家ID (使用LIKE)
			$seller_id = mysqli_real_escape_string( $conn, chop(trim($_GET['usr'])) );
			$query .= "AND `usr` LIKE '%$seller_id%' ";
			$showAdv++;
		}		
		//分類
		if( !empty($_GET['ct']) ) {
			$category = mysqli_real_escape_string( $conn, chop(trim($_GET['ct'])) );
			$category = str_pad( $category, 10, "_" ); 
			$query .= "AND `category` LIKE '$category' ";
		}
	}
	else
	{
		$query = "";
	}
	
	//ORDER BY
	$query .= "ORDER BY ";
	if( !empty($_GET['od']) )
	{
		$order_col = mysqli_real_escape_string( $conn, chop(trim($_GET['od'])) );
		$order_sc = mysqli_real_escape_string( $conn, chop(trim($_GET['sc'])) );
		if( $order_sc == 'de' )	$order_sc = "DESC ";
		else $order_sc = "ASC ";
		
		$query .= "ORDER BY ";
		switch( $order_col )
		{
			case 1 : //上架時間 start_date & start_time
				$query .= "( `start_date` $order_sc, `start_time` $order_sc ) ";
				break;
			case 2 : //截標時間 end_date & end_time
				$query .= "( `end_date` $order_sc, `end_time` $order_sc ) ";
				break;
			case 3 : //價格
				$query .= "`least_price` $order_sc";
				break;
			default : //預設值
				$query .= "`end_date` $order_sc, `end_time` $order_sc ";
		}
	}
	else
	{
		$query .= "`end_date` $order_sc, `end_time` $order_sc ";
	}
	
	//LIMIT
	if( !empty($_GET['p']) )	
		$page = mysqli_real_escape_string( $conn, chop(trim($_GET['p'])) );
	else
		$page = 1;
	if( !empty($_GET['pi']) ){
		$page_item = mysqli_real_escape_string( $conn, chop(trim($_GET['pi'])) );
	}
	else
		$page_item = 9; 
	$query .= "LIMIT ".( $page_item*($page-1) ).",".( $page_item*$page-1 )." ";
	
	if(	mysqli_num_rows($result) <= 0 )
	{
		echo "gg";
	}
	
	
	$result = mysqli_query( $conn, $query );
	while( $row = mysqli_fetch_assoc($result) )
	{
		print_r($row);
		echo "<br>\n";
	}
	echo $query;
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
    <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script-->
	<script type="text/javascript">
		$(document).ready(function(){
			/*
			$('.productTitle').tooltip({
				selector: "a[rel=popover]"
			});	
			*/
			$('.productTitle').popover({
				selector: "a[rel=popover]"
			});	
		});
		
		function showtest01(){
			/*
			$('#tooltip').tooltip('show');
			*/
			$('#popover').popover('show');	
		}
    </script>
	<!--style>
	.span4 {
		padding-left:5px;
		padding-bottom:5px;
		padding-right:5px;
		padding-top:5px;
		height:210px;
		width:280px;
		float:left;
		border-color:#999;
		border-style:solid;
		border-width:2px;
	}	
	.row {
		padding-top:10px;
		padding-bottom:20px;
	}
	.productTitle {
		font-size:17px;
		text-align:center;
		font-family:微軟正黑體;
		font-weight:600;
	}
	.productImg {
		width:130px;
		height:145px;
		padding-top:10px;
		float:left;
	}
	.productText {
		font-size:13px;
		width:145px;
		height:150px;
		padding-top:5px;
		float:right;
		font-family:微軟正黑體;
		color:#666;
	}
	.btn {
		width:88px;
		height:27px;
		text-align:center;
	}
	#btn {
		width:100px;
		height:30px;		
		float:left;
		margin-left:30px;
		font-family:微軟正黑體;
	}
	.popover {
		  width: 280px;
		  font-size: 13px;
		  font-family: 微軟正黑體;
	 }
	 .popover-title {
		  font-size: 14px;
		  font-family: 微軟正黑體;
		  font-weight: 580;
	 }
	/*
	a:link {color:#009; text-decoration:none;}
	a:visited {color:#009; text-decoration:none;} 
	a:hover {color:#06C; text-decoration:underline;} 
	a:active {color:#06C; text-decoration:underline;}
	*/
	</style-->

</head>

<body>

<!--header-->
<?php
	require_once( "marketNavi.php" );
	require_once( "marketAnnouce.php" );
?>

<!--整頁內容包container裡面-->
<div class = "container" >

	<!--market bar-->
    <?php
	    require_once( "memberStateLine.php" );
	?>
	
	<!--?php
		//判別關鍵字長度，
		if(  strlen($keywords) >= $STR_MAXSIZE || strlen($keywords) <= 0){
			//字串不符規定:只顯示alert
			echo '<div class="alert alert-danger fade in"><strong>ERROR!</strong>您似乎忘記輸入關鍵字、或是關鍵字太長了，請重新查詢。</div>';
		}
		else{}
	?-->

  	<!--進階搜尋 開始-->
    <form class="form-search">
    <input type="text" class="input-medium search-query">
    <button type="submit" class="btn">Search</button>
    </form>
<form method="get" action="./marketSearch.php" id="" class="">
    <div class="accordion" id="advanceSearchBlock">
        <div class="accordion-group">
            <div class="accordion-heading">
            	<div class="accordion-inner form-inline">
					關鍵字 <i class="icon-search"></i> 
                    <input type="text" class="input-medium" id="kwd" name="kwd" placeholder="請輸入關鍵字" value="<?php echo $keywords;?>">
    				<!--div class="input-append">
						<input type="text" class="input-medium" id="" name="" placeholder="">
    					<button class="btn" type="button">Search</button>
    				</div-->∣ 
					排序 <i class="icon-resize-vertical"></i> 
                    上架時間 / 
					截標時間 / 
					參考價格 
					∣
					搜尋時間 <i class="icon-time"></i> <?php echo date('Y-m-d h:i:s');?>
					<button type="submit">get sql query</button>
					<span class="pull-right" style="padding-top:3px;">
						<a class="" data-toggle="collapse" data-parent="#advanceSearchBlock" href="#collapseOne">
						進階搜尋 <i class="icon-chevron-down" id="collapseOneTitle"></i>
						</a>
					</span>
            	</div>
            </div>
			<div id="collapseOne" class="accordion-body collapse <?php echo $showAdv?"in":""; ?>">
            	<div class="accordion-inner form-inline">
					<span>
                        日期 <i class="icon-calendar"></i>
                        <input type="text" class="input-small" id="d1" name="d1" placeholder="" value="<?php echo $dateFrom; ?>">
                         - 
                        <input type="text" class="input-small" id="d2" name="d2" placeholder="" value="<?php echo $dateTo; ?>">
					</span>
					　∣　
					<span>
                        價格 <i class="icon-filter"></i>
						<input type="text" class="span1" id="p1" name="p1" placeholder="" value="<?php echo $priceAbove; ?>">
						 - 
						<input type="text" class="span1" id="p2" name="p2" placeholder="" value="<?php echo $priceBelow; ?>">
					</span>
					　∣　
					<span>
                         <i class="icon-zoom-in"></i>  
							<label class="checkbox">
								<input type="checkbox" id="liv1" name="liv1" value="1"> 拍賣中
							</label>
							<label class="checkbox">
								<input type="checkbox" id="liv2" name="liv2" value="2" > 已下架
							</label>
					</span>
					　∣　
					<span>
                        賣方學號 <i class="icon-user"></i> <input type="text" class="span2" id="usr" name="usr" placeholder="">
					</span>
                </div>
            </div>
        </div>
	</div>
</form>
    <!--進階搜尋 結束-->
    
            <div class="row">
            <div class="span4">
           	   <div class="productTitle" >
   			   		<a href="#" rel="popover" data-placement="top" data-trigger="hover" title="類別：　　　　　　商品評價：<br>出價次數：　　　　成交次數：<br>起始時間：<br>結束時間：<br>" data-content="(放置商品說明)">澳洲進口雪花牛</a>
               </div>
           	   <div class="productImg"><img src=".jpg" alt=src"商品名稱"/></div>
               <div class="productText">
                	<font color="#000000">賣方帳號：</font>B004020010<br>
                    <font color="#000000">賣方暱稱：</font><a href="Facebook" title="連至賣家FB">阿花</a><br>
                    <font color="#000000">賣方評價：</font>10000<br>
                    <font color="#000000">參考價格：</font>350000<br>
                    <font color="#000000">出價次數：</font>45<br>
                    <font color="#000000">剩餘數量：</font>1<br>
                    <font color="#000000">全部數量：</font>1
               </div>
               <div id="btn"><button class="btn btn-primary" type="price">我要出價</button></div> 
               <div id="btn"><button class="btn btn-info" type="track">我要追蹤</button></div>
            </div>
            
            <div class="span4">
           	   <div class="productTitle" >
   			   		<a href="#" rel="popover" data-placement="top" data-trigger="hover" title="類別：　　　　　　商品評價：<br>出價次數：　　　　成交次數：<br>起始時間：<br>結束時間：<br>" data-content="(放置商品說明)">澳洲進口雪花牛</a>
               </div>
           	   <div class="productImg"><img src=".jpg" alt=src"商品名稱"/></div>
               <div class="productText">
                	<font color="#000000">賣方帳號：</font>B004020010<br>
                    <font color="#000000">賣方暱稱：</font><a href="Facebook" title="連至賣家FB">阿花</a><br>
                    <font color="#000000">賣方評價：</font>10000<br>
                    <font color="#000000">參考價格：</font>350000<br>
                    <font color="#000000">出價次數：</font>45<br>
                    <font color="#000000">剩餘數量：</font>1<br>
                    <font color="#000000">全部數量：</font>1
               </div>
               <div id="btn"><button class="btn btn-primary" type="price">我要出價</button></div> 
               <div id="btn"><button class="btn btn-info" type="track">我要追蹤</button></div>
            </div>
            
            <div class="span4">
           	   <div class="productTitle" >
   			   		<a href="#" rel="popover" data-placement="top" data-trigger="hover" title="類別：　　　　　　商品評價：<br>出價次數：　　　　成交次數：<br>起始時間：<br>結束時間：<br>" data-content="(放置商品說明)">澳洲進口雪花牛</a>
               </div>
           	   <div class="productImg"><img src=".jpg" alt=src"商品名稱"/></div>
               <div class="productText">
                	<font color="#000000">賣方帳號：</font>B004020010<br>
                    <font color="#000000">賣方暱稱：</font><a href="Facebook" title="連至賣家FB">阿花</a><br>
                    <font color="#000000">賣方評價：</font>10000<br>
                    <font color="#000000">參考價格：</font>350000<br>
                    <font color="#000000">出價次數：</font>45<br>
                    <font color="#000000">剩餘數量：</font>1<br>
                    <font color="#000000">全部數量：</font>1
               </div>
               <div id="btn"><button class="btn btn-primary" type="price">我要出價</button></div> 
               <div id="btn"><button class="btn btn-info" type="track">我要追蹤</button></div>
            </div>
        </div>
    
</div>

<!--Footer-->
<?php
	require_once( "marketFooter.php" );
	
	//$_SERVER['PHP_SELF'];
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