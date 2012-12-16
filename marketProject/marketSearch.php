<?php
	// Last Modified Day : 
	// 
	require_once( "../global/setSession.php" );	//記得改路徑
	require_once( "../global/connectVar.php" );
	require_once( "./searchSFunction.php" );
	require_once( "UserQueryFunction.php" );
	
	/*加入追蹤*/
	$stu_id = $_SESSION['stu_id'];
	$AUTH = $_SESSION['auth'];
	
	if( isset($_POST['add_chase']) ) {
		if( !empty($stu_id) && $AUTH > 0 ) {
			$chase_id = mysqli_real_escape_string( $conn, chop(trim($_POST['add_chase'])) );
			$ac_check_query = "SELECT `star` FROM  `marketSecondHand_chasingList` WHERE `stu_id` = '$stu_id' AND `trade_id` = '$chase_id'";
			$ac_check_result = mysqli_query( $conn, $ac_check_query );	
			$ever_chase = mysqli_num_rows($ac_check_result);
			if( $ever_chase == 1 )
			{	//delete
				$ac_query = "DELETE FROM  `marketSecondHand_chasingList` WHERE `stu_id` = '$stu_id' AND `trade_id` = '$chase_id'";
				$alt = "已從追蹤清單移除";
			}
			else if( $ever_chase == 0 )
			{	
				//查無商品的處理
				
				//insert
				$ac_query = "INSERT INTO  `marketSecondHand_chasingList`(`stu_id`, `trade_id`, `markTime`, `star`) VALUES ('$stu_id', '$chase_id', now(), 0)";
				$alt = "已加入追蹤清單";
			}
			if( mysqli_query( $conn, $ac_query ) )
			{
				echo '<script type="text/javascript">alert("'.$alt.'");</script>';
			}
			else
			{
				echo '<script type="text/javascript">alert("追蹤失敗，請重新嘗試或聯絡管理人員");</script>';
			}			
		}
		else
		{
			echo '<script type="text/javascript">alert("權限不足！您尚未登入會員、或是未通過信箱認證！");</script>';
		}
	}
	
	/*設定搜尋條件 開始*/	
	$pre_query = "SELECT `trade_id`, `least_price`, `number`, `category`, `title`, `description`, `product_pic`, `start_date`, `end_date`, `start_time`, `end_time`, `stu_id` AS seller_id, `username`, `facebook`, AVG(rate) AS item_rate_avg, ( SELECT AVG(rate) FROM marketSecondHand_comment NATURAL LEFT JOIN marketSecondHand_trade WHERE stu_id = `seller_id` GROUP BY stu_id ) AS seller_rate_avg, COUNT(buy_list) AS bid_times, ( SELECT COUNT(bidder_id) FROM marketSecondHand_bidList WHERE buy_list = 1 AND marketSecondHand_trade.trade_id = marketSecondHand_bidList.trade_id ) AS sell_out_times, ( SELECT SUM(wanted_number) FROM marketSecondHand_bidList WHERE buy_list = 1 AND marketSecondHand_trade.trade_id = marketSecondHand_bidList.trade_id ) AS sell_out_num, ( SELECT `star` FROM `marketSecondHand_chasingList` WHERE `stu_id` = '$stu_id' AND `marketSecondHand_chasingList`.`trade_id` = marketSecondHand_trade.trade_id ) AS star FROM `marketSecondHand_productInfo` INNER JOIN `marketSecondHand_trade` USING ( product_id ) NATURAL LEFT JOIN `marketSecondHand_bidList` NATURAL LEFT JOIN `marketSecondHand_time` NATURAL LEFT JOIN `Member` NATURAL LEFT JOIN `member_Info` NATURAL LEFT JOIN `marketSecondHand_comment` NATURAL LEFT JOIN `marketSecondHand_chasingList`";
	
	//WHERE
	if( !empty($_GET['kwd']) || !empty($_GET['d1']) || !empty($_GET['d2']) || !empty($_GET['p1']) || !empty($_GET['p2']) || !empty($_GET['liv1']) || !empty($_GET['liv2']) || !empty($_GET['usr']) || !empty($_GET['ct']) )
	{
		$query = "WHERE 1=1 ";
		
		//關鍵字(暫不支援AND和NOT LIKE)
		$keywords = mysqli_real_escape_string( $conn, chop(trim($_GET['kwd'])) );
		$keyword = explode( " ", $keywords );
		$word_num = 0;
		$query .= "AND ( ";
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
			$usr = mysqli_real_escape_string( $conn, chop(trim($_GET['usr'])) );
			$query .= "AND `stu_id` LIKE '%$usr%' ";
			$showAdv++;
		}		
		//分類
		if( !empty($_GET['ct']) ) {
			$category = mysqli_real_escape_string( $conn, chop(trim($_GET['ct'])) );
			$category = str_pad( $category, 10, "_", STR_PAD_RIGHT ); 
			$query .= "AND `category` LIKE '$category' ";
		}
	}
	else
	{
		$query = "";
	}
	
	$query .= " GROUP BY (trade_id) ";
		
	/*計算搜尋筆數 開始*/
	$item_num_query = "SELECT `trade_id` FROM `marketSecondHand_productInfo` INNER JOIN `marketSecondHand_trade` USING ( product_id ) NATURAL LEFT JOIN  `marketSecondHand_time` ".$query;
	$result_count = mysqli_query( $conn, $item_num_query );
	$search_result_num = mysqli_num_rows($result_count);
	/*計算搜尋筆數 中斷*/
	
	//ORDER BY
	$query .= "ORDER BY ";
	if( !empty($_GET['od']) )
	{
		$order_col = intval( mysqli_real_escape_string( $conn, chop(trim($_GET['od'])) ) );
		$order_sc = mysqli_real_escape_string( $conn, chop(trim($_GET['sc'])) );
		if( $order_sc == 'de' )	$order_sc = "DESC ";
		else $order_sc = "ASC ";
		
		switch( $order_col )
		{
			case 1 : //上架時間 start_date & start_time
				$query .= "`start_date` $order_sc, `start_time` $order_sc ";
				break;
			case 2 : //截標時間 end_date & end_time
				$query .= "`end_date` $order_sc, `end_time` $order_sc ";
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
	
	//LIMIT : 控制每頁筆數
	if( !empty($_GET['p']) )	
		$page = mysqli_real_escape_string( $conn, chop(trim($_GET['p'])) );
	else
		$page = 1;
	if( !empty($_GET['pi']) ){
		$page_item = mysqli_real_escape_string( $conn, chop(trim($_GET['pi'])) );
	}
	else
		$page_item = 9; 
	$query .= "LIMIT ".( $page_item*($page-1) ).",".( $page_item*$page)." ";
	
	$query = $pre_query.$query;
	$result = mysqli_query( $conn, $query );
	
	//
	$num_of_result = mysqli_num_rows($result);
	$num_of_page = intval($search_result_num/$page_item)+1;
		
	$rul = "marketSearch.php?";
	$rul .= "kwd=".$keywords;
	$rul .= "&d1=".$dateFrom."&d2=".$dateTo;
	$rul .= "&p1=".$priceAbove."&p2=".$priceBelow;
	$rul .= "&liv1=".$liv1."&liv2=".$liv2;
	$category = mysqli_real_escape_string( $conn, chop(trim($_GET['ct'])) );
	$rul .= "&usr=".$usr."&ct=".$category;
	$rul .= "&p=".$page;
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
    <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script-->
	<script>
	/*
		$(document).ready(function(){
				$().tooltip();
							$('.productTitle').tooltip({
				selector: "a[rel=popover]"
			});	
				
				$('.productTitle').popover({
					selector: "a[rel=popover]"
		});	
	*/
	</script>
	<style>
	h3, h2, h1, table, tr, td, li, ul, th, p, legend, label, option, button {
			font-family: "微軟正黑體", "Arial";
	}
	.block {
		padding-left:5px;
		padding-bottom:5px;
		padding-right:5px;
		padding-top:5px;
		/*height:210px;*/
		width:280px;
		float:left;
		border-bottom:#CCC 1px solid;
		border-right:#CCC 1px solid;
		border-top:#CCC 1px solid;
		border-left:#ccc 1px solid;
	}	
	.block_row {
		padding-top:10px;
		padding-bottom:20px;
	}
	
	.block a:link {color:#009; text-decoration:none;}
	.block a:visited {color:#009; text-decoration:none;} 
	.block a:hover {color:#06C; text-decoration:underline;} 
	.block a:active {color:#06C; text-decoration:underline;}
	
	.productCategory {
		font-size:12px;
		text-align:center;
		font-family:微軟正黑體;
		padding-left:3px;
	}
	.productTitle {
		font-size:17px;
		text-align:center;
		font-family:微軟正黑體;
		font-weight:600;
		border-bottom:#ccc 1px solid;
		padding:3px;
	}
	.productImg {
		width:130px;
		height:145px;
		padding-top:10px;
		float:left;
	}
	.productImg img{
		width:130px;
		height:130px;
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
	.btn_div {
		width:100px;
		height:30px;		
		float:left;
		margin-left:30px;
		font-family:微軟正黑體;
	}
	.btn_div a:link {color:#FFF; text-decoration:none;}
	.btn_div a:visited {color:#FFF; text-decoration:none;} 
	.btn_div a:hover {color:#FFF; text-decoration:none;} 
	.btn_div a:active {color:#FFF; text-decoration:none;}
	.act{
		padding-top:5px;
		text-align:center;
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

	</style>

</head>

<body>

<!--header-->
<?php
	require_once( "marketNavi.php" );
	require_once( "marketAnnouce.php" );
?>

<!--整頁內容包container裡面-->
<div class = "container">

	<!--market bar-->
    <?php
	    require_once( "memberStateLine.php" );
	?>
	
  	<!--進階搜尋 開始-->
	<form method="get" action="./marketSearch.php" id="" class="">
    	<div class="accordion" id="advanceSearchBlock">
     	   <div class="accordion-group">
     	       <div class="accordion-heading">
     	       		<div class="accordion-inner form-inline">
						<span>
							關鍵字<button type="submit" class="btn btn-mini btn-link"><i class="icon-search"></i></button>
							<input type="text" class="input-medium" id="kwd" name="kwd" placeholder="請輸入關鍵字" value="<?php echo $keywords;?>" >　
							<label class="checkbox">		
								<?php
									if( !empty($_GET['ct']) ) {
										echo '<input type="checkbox" id="ct_sch" name="ct" value="'.$_GET['ct'].'">';
									}
									else
									{
										echo '<input type="checkbox" id="ct_sch" name="ct" value="" disabled>';
									}
								?>
								在分類中搜尋
							</label>
						</span>
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
							<input type="text" class="input-small" id="d1" name="d1" placeholder="2012-12-01" value="<?php echo $dateFrom; ?>">
							 ~ 
							<input type="text" class="input-small" id="d2" name="d2" placeholder="2012-12-31" value="<?php echo $dateTo; ?>">
						</span>
						∣
						<span>
							價格 <i class="icon-filter"></i>
							<input type="text" class="span1" id="p1" name="p1" placeholder="達於" value="<?php echo $priceAbove; ?>">
							 - 
							<input type="text" class="span1" id="p2" name="p2" placeholder="小於" value="<?php echo $priceBelow; ?>">
						</span>
						∣
						<span>
							 <i class="icon-zoom-in"></i>  
								<label class="checkbox">
									<input type="checkbox" id="liv1" name="liv1" value="1" checked> 拍賣中
								</label>
								<label class="checkbox">
									<input type="checkbox" id="liv2" name="liv2" value="2" placeholder=""> 已下架
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
	
	<!--排序方式與時間 開始-->			
	<div class="row-fluid">
		<div class="span6">
			<ul class="nav nav-pills">
			<li class="disabled"><a>排序 <i class="icon-resize-vertical"></i></a></li>
<?php

	$odrl[1] = "&od=1&sc=".$order_sc;
	$odrl[2] = "&od=2&sc=".$order_sc;
	$odrl[3] = "&od=3&sc=".$order_sc;
	

	if( $order_sc == 'DESC ' )
	{
		$change_sc = 'a';
		$od_icon = '<i class="icon-arrow-up"></i>';
		
	}
	else
	{
		$od_icon = '<i class="icon-arrow-down"></i>';
		$change_sc = 'de';
	}
	
	switch($order_col)
	{
		case '1':
			$odr = "&od=1&sc=".$change_sc;
			echo '<li class="active"><a href="'.$rul.$odr.'">上架時間 '.$od_icon.'</a></li>';
			echo '<li class=""><a href="'.$rul.$odrl[2].'">截標時間 <i class="icon-minus"></i></a></li>';
			echo '<li class=""><a href="'.$rul.$odrl[3].'">參考價格 <i class="icon-minus"></i></a></li>';
			break;
		case '2':
			$odr = "&od=2&sc=".$change_sc;
			echo '<li class=""><a href="'.$rul.$odrl[1].'">上架時間 <i class="icon-minus"></i></a></li>';
			echo '<li class="active"><a href="'.$rul.$odr.'">截標時間 '.$od_icon.'</a></li>';
			echo '<li class=""><a href="'.$rul.$odrl[3].'">參考價格 <i class="icon-minus"></i>'.'</i></a></li>';
			break;
		case '3':
			$odr = "&od=3&sc=".$change_sc;
			echo '<li class=""><a href="'.$rul.$odrl[1].'">上架時間 <i class="icon-minus"></i></a></li>';
			echo '<li class=""><a href="'.$rul.$odrl[2].'">截標時間 <i class="icon-minus"></i></a></li>';
			echo '<li class="active"><a href="'.$rul.$odr.'">參考價格 '.$od_icon.'</a></li>';
			break;
		default:
			$odr = "&od=1&sc=".$change_sc;
			echo '<li class="active"><a href="'.$rul.$odr.'">上架時間 '.$od_icon.'</a></li>';
			echo '<li class=""><a href="'.$rul.$odrl[2].'">截標時間 <i class="icon-minus"></i></a></li>';
			echo '<li class=""><a href="'.$rul.$odrl[3].'">參考價格 <i class="icon-minus"></i></a></li>';
			break;
	}
	
	$rul .= "&od=".$order_col."&sc=".$order_sc;
?>
			<!--li class=""><a href="#">上架時間 <i class="icon-arrow-down"></i></a></li>
			<li class=""><a href="#">截標時間 <i class="icon-minus"></i></a></li>
			<li class=""><a href="#">參考價格 <i class="icon-minus"></i></a></li-->		
			</ul>
		</div>
		<div class="span3 pull-right" style="margin-top:10px;">
			搜尋時間 <i class="icon-time"></i> <?php echo date('Y-m-d h:i:s');?>	
		</div>
	</div>
	<!--排序方式與時間 結束-->
	
<?php

if( $num_of_result <= 0 ) {

?>

	<div class="alert alert-danger fade in" style="font-family: '微軟正黑體', 'Arial';">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Sorry!</strong> &nbsp;&nbsp;目前查無商品喔！ 
	</div>

<?php	
}
else 
{
	//$i = 要生產幾個 row div
	if( $num_of_result%3 != 0 && $page == $num_of_page )
		$i = intval($num_of_result/3)+1;
	else
		$i = 3;

	//echo $query;
	for( $i; $i > 0; $i--)
	{
		echo '<div class="row block_row">';
		
		//$j = 每行&最後一行要有多少個項目
		if( $i == 1 && $page == $num_of_page ) {
			if( $num_of_result%3 != 0 )
				$j = $num_of_result%3;
			else
				$j = 3;
		}
		else
			$j = 3;
			
		for( $j; $j > 0; $j-- )
		{
			$row = mysqli_fetch_assoc($result);
			//賣家資料	
			$seller_id = $row['seller_id'];
			$seller_name = $row['username'];
			$seller_fb = $row['facebook'];
			//商品資料
			//trade
			$trade_id = $row['trade_id'];
			$least_price = $row['least_price'];
			$number = $row['number'];
			$category = $row['category'];
			$echoCat = echoCategory($category);
			//productInfo
			$title = $row['title'];
			$description = $row['description'];
			$product_pic = $row['product_pic'];
			$product_pic = "../member/images/".$seller_id."/market/".$product_pic;			
			//time
			$start_date = $row['start_date'];
			$end_date = $row['end_date'];
			$start_time = $row['start_time'];
			$end_time = $row['end_time'];
			//orher
			$item_rate_avg = $row['item_rate_avg'];//商品評價
			$seller_rate_avg = $row['seller_rate_avg'];//賣家評價
			$sell_out_times = $row['sell_out_times'];//成交次數
			$bid_times = $row['bid_times'];//出價次數
			$total_num = $row['sell_out_num'] + $number;//總數
			//$ = $row[''];
			
			//商品block
			$html = '<div class="span4 block">';
			$html .= '	<div class="productCategory">';
			$html .= $echoCat[1]." > ".$echoCat[2]." > ".$echoCat[3];
			$html .= '	</div>';
			$html .= '	<div class="productTitle" >';
			$html .= '		<a href="#" data-delay=500  rel="popover" data-placement="top" data-trigger="click" title="商品評價：'.$item_rate_avg.'　　成交次數：'.$sell_out_times.'<br>起始時間：'.$start_date.'　'.$start_time.'<br>結束時間：'.$end_date.'　'.$end_time.'<br>" data-content="'.$description.'"　>'.$title.'</a>';
			$html .= '	</div>';
			$html .= '	<div class="productImg">';
			$html .= '		<a href="productDetail.php?trade='.$trade_id.'" target="_blank"><img src="'.$product_pic.'" class="img-rounded" alt="'.$title.'"/></a>';
			$html .= '	</div>';
			$html .= '	<div class="productText">';
			$html .= '		賣方帳號：'.$seller_id.'<br>';
			$html .= '		賣方暱稱：<a href="'.$seller_fb.'" target="_blank">'.$seller_name.'</a><br />';
			$html .= '		賣方評價：'.$seller_rate_avg.'<br>';
			$html .= '		參考價格：'.$least_price.'<br>';
			$html .= '		出價次數：'.$bid_times.'<br>';
			$html .= '		剩餘數量：'.$number.'<br>';
			$html .= '		全部數量：'.$total_num.'<br>';
			$html .= '	</div>';
			$html .= '	<div class="act">';
			//$html .= '<div class="btn_div"><a class="btn btn-primary" type="price" href="productDetail.php?trade='.$trade_id.'" target="_blank">我要出價</a></div> ';
			$html .= '		<div class="btn_div"><a class="btn btn-primary" data-toggle="modal" href="#bid-'.$trade_id.'">我要出價</a></div> ';
			//追蹤鈕
			$html .= '		<form method="post" action="'.$rul.'" id="form-'.$trade_id.'" >';
			if( isset($row['star']) ) {
				$html .= '		<div class="btn_div"><button class="btn btn-info" type="submit" name="add_chase" value="'.$trade_id.'">取消追蹤</button></div>';
			}
			else {
				$html .= '		<div class="btn_div"><button class="btn btn-info" type="submit" name="add_chase" value="'.$trade_id.'">我要追蹤</button></div>';
			}
			$html .= '		</form>';
			$html .= '	</div>';
			$html .= '</div>';
			
			//快速出價跳窗
			$html .= '<div id="bid-'.$trade_id.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
			$html .= '	<div class="modal-header">';
			$html .= '		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
			$html .= '		<h3 id="myModalLabel">我要出價</h3>';
			$html .= '	</div>';
			$html .= '	<div class="modal-body">';
			$html .= '		<form class="form-horizontal" action="buyS.php" method="post">';
			$html .= '			<div class="control-group">';
			$html .= '				<input type="hidden" name="trade" id="trade" value="'.$trade_id.'">';
			$html .= '				<label class="control-label">商品標題</label>';
			$html .= '				<div class="controls">';
			$html .= $title;
			$html .= '				</div>';
			$html .= '			</div>			<hr/>';
			$html .= '			<div class="control-group">';
			$html .= '				<label class="control-label">我要用</label>';
			$html .= '				<div class="controls">';
			$html .= '					<input type="radio" name="pay_type" id="pay_type" value="0" />錢　';
			$html .= '					<input type="radio" name="pay_type" id="pay_type" value="1" />物品　';
			$html .= '					<input type="radio" name="pay_type" id="pay_type" value="2" />錢+物品　<br/>';
			$html .= '					<input type="text" name="pay_info" id="pay_info" />';
			$html .= '				</div>';
			$html .= '			</div>';
			$html .= '			<div class="control-group">';
			$html .= '				<label class="control-label">交換</label>';
			$html .= '				<div class="controls">';
			$html .= '					<input class="input-mini" type="text" name="num" id="num"/>個';
			$html .= '				</div>';
			$html .= '			</div>';
			$html .= '			<div class="control-group">';
			$html .= '				<div class="controls">';
			$html .= '					<button type="submit" name="" class="btn">確定出價</button>';
			$html .= '				</div>';
			$html .= '			</div>';
			$html .= '		</form>';
			$html .= '	</div>';
			$html .= '</div>';
			//$html .= '';
					
			echo $html;		
		}
		echo "</div>";
	}	
}
	
?>
    <div class="pagination pagination-centered">
    <ul>
<?php

	if( $page == 1 )
		echo '<li> <a class="disabled">《</a></li>';
	else
		echo '<li> <a href="'.$rul.($page-1).'" class="disabled">《</a></li>';
	
	for( $k=1; $k<=$num_of_page; $k++ )
	{
		$prul = "&p=".$k;
		if( $k == $page )
			echo '<li class="active"><a href="#">'.$k.'</a></li>';
		else
			echo '<li><a href="'.$rul.$prul.'">'.$k.'</a></li>';
	}
	$prul = "&p=".($page+1);
	if( $page == $num_of_page )
		echo '<li> <a class="disabled">》</a></li>';
	else
		echo '<li> <a href="'.$rul.$prul.'">》</a></li>';
	
?>
	</ul>
    </div>


</div>

<!--Footer-->
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