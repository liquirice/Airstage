<!--設計時千萬記得改utf8編碼-->
<?php
/*
	// Last Modified Day : 
	// 
	require_once( "../setSession.php" );
	
	//比對product_id & token，確保安全性，但我還不知道為什麼要這麼做（看起來似乎沒啥意義）。
	//總之確定是用 $_GET['num'] 抓trade_id
	$trade_id = intval( htmlspecialchars( trim( $_GET['num'] ) ) );
	$token = htmlspecialchars( trim( $_GET['token'] ) ) ;
	
	//判斷token是否正確
	if( SAH1($trade_id) != $token ) {
		//不正確，回到上一頁
		echo "<script type='text/javascript'>alert('商品網址有誤，請重新確認'); location.href='./secondHandIndex.php';</script>";
		exit();
	}
	else {
		require_once( "../connectVar.php" );
		
		$productDetail = "SELECT * FROM ( (`marketSecondHand_trade` INNER JOIN `marketSecondHand_time` USING ( time_id ) ) INNER JOIN `marketSecondHand_productInfo` USING ( product_id ) ) WHERE `marketSecondHand_trade`.`trade_id` = {$trade_id}";
		$result = mysqli_query( $conn, $productDetail );
		
		//判斷商品是否存在
		if( mysqli_num_rows($result) == 0 ) {
			echo "<script type='text/javascript'>alert('查無此商品，請重新確認'); history.back();</script>";
			$error = 2;
			exit();
		}
		else {
		}
		
		//判斷身分
		if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) ) {
			//訪客
	
		} 
		else {
			//賣家或買家
			//比對 $_SESSION['stu_id'] 是否等於此商品的stu_id，來看是否為賣家
		}
	}*/
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
	</style>
</head>

<body>

<!--header-->
<?php
	/*require_once( "marketNavi.php" );
	require_once( "marketAnnouce.php" );*/
?>

<!--整頁內容包container裡面-->
<div class = "container" >

	<!--market bar-->
    <?php
	   // require_once( "memberStateLine.php" );
	?>
	
	<!--路徑-->
	<ul class="breadcrumb">
		<li><a href="marketIndex.php">市場首頁</a> <span class="divider">/</span></li>
		<!--li>子目錄 <span class="divider">/</span></li-->
		<li class="active">當前頁面</li>
	</ul>
    
	<ul class="nav nav-tabs">
  		<li class="active"><a href="#">商品</a></li>
  		<li><a href="#">Comment</a></li>
	</ul>
	
    <div style="width:auto; height:500px;" >
    	<!--商品title (上)--> 
    	<div style="height:30px; font-size:24px;">
        <p class="text-info"><strong>title : 超萌斯汀玩偶</strong></p>
        </div>
		<!--商品資訊(中)-->
        <div style="width:940px; height:auto; " >  
        	<!--圖product_pic片(左)-->    
            <div style="float:left; width:400px;">         
                <ul class="thumbnails"> 
                        <li class="span4" ><a href="#" class="thumbnail" ><img src="http://placehold.it/360x270" alt="" width=""></a></li>
                </ul>
        	</div>
            <!--描述description(右)-->
            <div style=" margin:20px; width:940px; height:300px;font-size:24px;";><p class="muted">description:好玩好吃送禮自用兩相宜的斯汀玩偶</p></div>
        </div>
        <!--商品資訊(下)-->
        <div style="width:940px;" > 
			<div style=" margin:15px; width:440px; height:20px;font-size:14px; float:left;";><p class="muted"><i class="icon-user"></i>賣家帳號</p></div>
			<div style=" margin:15px; width:440px; height:20px;font-size:14px; float:right;";><p class="muted"><i class="icon-user"></i>賣家暱稱</p></div>
            <div style=" margin:15px; width:440px; height:20px;font-size:14px; float:left;";><p class="muted"><i class="icon-star"></i>賣家評價</p></div>
            <div style=" margin:15px; width:440px; height:20px;font-size:14px; float:left;";><p class="muted"><i class="icon-minus"></i>商品類別</p></div>
            <div style=" margin:15px; width:440px; height:20px;font-size:14px; float:left;";><p class="muted"><i class="icon-minus"></i>起始價格</p></div>
            <div style=" margin:15px; width:440px; height:20px;font-size:14px; float:left;";><p class="muted"><i class="icon-plus"></i>目前出價</p></div>
            <div style=" margin:15px; width:440px; height:20px;font-size:14px; float:left;";><p class="muted"><i class="icon-hand-right"></i>得標者</p></div>
            <div style=" margin:15px; width:440px; height:20px;font-size:14px; float:left;";><p class="muted"><i class="icon-heart"></i>商品數量</p></div>
            <div style=" margin:15px; width:440px; height:20px;font-size:14px; float:left;";><p class="muted"><i class="icon-ok"></i>出價次數</p></div>
            <div style=" margin:15px; width:440px; height:20px;font-size:14px; float:left;";><p class="muted"><i class="icon-ok"></i>成交次數</p></div>
            <div style=" margin:15px; width:440px; height:20px;font-size:14px; float:left;";><p class="muted"><i class="icon-circle-arrow-right"></i>付款方式</p></div>
            <div style=" margin:15px; width:440px; height:20px;font-size:14px; float:left;";><p class="muted"><i class="icon-circle-arrow-right"></i>取貨方式</p></div>
            <div style=" margin:15px; width:440px; height:20px;font-size:14px; float:left;";><p class="muted"><i class="icon-time"></i>開始時間</p></div>
            <div style=" margin:15px; width:440px; height:20px;font-size:14px; float:left;";><p class="muted"><i class="icon-time"></i>結束時間</p></div>
            <div style="clear:both;"></div>
         </div>
		<!--出價(下)-->
         <div style="margin-left:600px;">
         <p>
         <button class="btn btn-large btn-info" type="button" style="width:150px; height:50px;">我要出價</button>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  
         <button class="btn btn-large btn-danger" type="button" style="width:150px; height:50px;">直接購買</button>
         </p>
         </div>   
       </div> 
</div>

<!--Footer-->
<?php
	/*require_once( "marketFooter.php" );*/
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