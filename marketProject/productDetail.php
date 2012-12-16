<?php
	// Last Modified Day : 12/15
	require_once( "../global/setSession.php" );
	require_once( "../global/connectVar.php" );	
	require_once( "UserQueryFunction.php" );
	
	$trade_id = intval( htmlspecialchars( trim( $_GET['trade'] ) ) );
	
	$productDetail = "SELECT * FROM ( ( (`marketSecondHand_trade` LEFT JOIN `marketSecondHand_bidList` USING ( trade_id ) ) INNER JOIN `marketSecondHand_time` USING ( time_id ) ) INNER JOIN `marketSecondHand_productInfo` USING ( product_id ) )  WHERE `marketSecondHand_trade`.`trade_id` = {$trade_id}";
	$resultDetail = mysqli_query( $conn, $productDetail );
		
	//判斷商品是否存在
	if( mysqli_num_rows($resultDetail) == 0 ) {
		echo "<script type='text/javascript'>alert('查無此商品，請重新確認'); history.back();</script>";
		$error = 2;
		exit();
	}
	while ($rowDetail = mysqli_fetch_array($resultDetail) ){
		$title = $rowDetail['title']; //商品名稱
		$description = $rowDetail['description']; //商品描述
		$category = $rowDetail['category']; //商品分類
		$product_pic = $rowDetail['product_pic']; //商品圖片
		$stu_id = $rowDetail['stu_id']; //賣家ID
		$bidder_id = $rowDetail['bidder_id']; //競標者ID
		$buy_list = $rowDetail['buy_list']; //是否得標
		$number = $rowDetail['number']; //剩餘數量
		$least_price = $rowDetail['least_price']; //起始價格
		$start_date = $rowDetail['start_date'];  //起始日期
		$start_time = $rowDetail['start_time'];  //起始時間
		$end_date = $rowDetail['end_date'];    //結束日期
		$end_time = $rowDetail['end_time'];    //結束時間
		$exchange_info = $rowDetail['exchange_info'];
		$wanted_number = $rowDetail['wanted_number'];
		$update_time = $rowDetail['update_time']; 
		//判斷商品是否結標		
		if( $rowDetail['exist'] == 0 ){
			$exist = 0; //已結標
		}
		else {
			//判斷身分
			if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) ) {
				$identity = 1; //訪客，未登入
				$exist = 1; //未結標
			} 
			else {
				//比對 $_SESSION['stu_id'] 是否等於此商品的stu_id，來看是否為賣家
				if( $stu_id == $_SESSION['stu_id'] ){
					$identity = 2; //賣家
					$exist = 1; //未結標
					break;
				}
				else{  //買家
					//判斷買家是否出價或得標
					if( $bidder_id == $_SESSION['stu_id'] && $buy_list == 1 ){
						$identity = 3;//已得標之買家
						$exist = 1; //未結標
						break;
					}
					if( $bidder_id == $_SESSION['stu_id'] && $buy_list == 0 ){
						$identity = 4;//已出價，尚未得標之買家
						$exist = 1; //未結標
						break;
					}
					if( $bidder_id != $_SESSION['stu_id'] ){
						$identity = 5;//尚未出價之買家
						$exist = 1; //未結標
						break;
					}
				}
			}
		}
	}
?>
<!--設計時千萬記得改utf8編碼-->


<!DOCTYPE HTML>
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset = utf8" />
	<title>Airstage - Student Market - Contention</title>
	<link href = "../tm2.ico" rel = "shortcut icon" />
	<link href = "css/bootstrap.css" rel = "stylesheet" />
	<link href = "css/baseCss.css" rel = "stylesheet" />
	<link href="css/docs.css" rel="stylesheet">
	<meta http-equiv = "Content-Language" content = "zh-tw" />
	<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" language="javascript">var app = "market";</script>
	<style>
		.pDetail {width:380px; height:20px;font-size:14px; float:left; margin-bottom:25px;}
		.buyerDetail {width:110px;float:left; margin:4px;}
		h3, h2, h1, table, tr, td, li, ul, th, p {
			font-family: "微軟正黑體", "Arial";
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

<div class = "container" >
	<!--market bar-->
    <?php
	    require_once( "memberStateLine.php" );
	?>
	
	<!--路徑-->
	<ul class="breadcrumb">
    	<?php //判斷目錄
			$category_1 = substr($category, 0, 2);
			$category_2 = substr($category, 0, 6);
			$category_3 = substr($category, 0, 10);
			//判斷第1層目錄
			switch ($category_1){
				case '01':
					$category_1 = 書籍雜誌;
					break;
				case '02':
					$category_1 = 生活雜務;
					break;
			}
			//判斷第2層目錄
			switch ($category_2){
				case '010001':
					$category_2 = 課程用書;
					break;
				case '010002':
					$category_2 = 一般書籍;
					break;
				case '010003':
					$category_2 = 報刊雜誌;
					break;
				case '010004':
					$category_2 = 外文書籍;
					break;
				case '020001':
					$category_2 = 服飾精品;
					break;
				case '020002':
					$category_2 = 美容保養;
					break;
				case '020003':
					$category_2 = 文具小物;
					break;
				case '020004':
					$category_2 = '3C產品';
					break;
				case '020005':
					$category_2 = 各式票券;
					break;
				case '020006':
					$category_2 = 家具家電;
					break;
				case '020007':
					$category_2 = 交通工具;
					break;
				case '020008':
					$category_2 = 食品;
					break;
				case '020009':
					$category_2 = 其他雜物;
					break;
			}
			//判斷第3層目錄
			switch ($category_3){
				case '0100010001':
					$category_3 = 文學院;
					break;
				case '0100010002':
					$category_3 = 理學院;
					break;
				case '0100010003':
					$category_3 = 工學院;
					break;
				case '0100010004':
					$category_3 = 管理學院;
					break;
				case '0100010005':
					$category_3 = 海洋科學院;
					break;
				case '0100010006':
					$category_3 = 社會科學院;
					break;
				case '0100010007':
					$category_3 = 通識課程;
					break;
				case '0100010008':
					$category_3 = 其他課程;
					break;
				case '0100020001':
					$category_3 = 商業理財;
					break;
				case '0100020002':
					$category_3 = 文學小說;
					break;
				case '0100020003':
					$category_3 = 藝術設計;
					break;
				case '0100020004':
					$category_3 = 人文科普;
					break;
				case '0100020005':
					$category_3 = 語言電腦;
					break;
				case '0100020006':
					$category_3 = 心靈養生;
					break;
				case '0100020007':
					$category_3 = 休閒生活;
					break;
				case '0100020008':
					$category_3 = 其他書籍;
					break;
				case '0100030001':
					$category_3 = 新聞時事;
					break;
				case '0100030002':
					$category_3 = 財經企管;
					break;
				case '0100030003':
					$category_3 = 語言、文學、史地;
					break;
				case '0100030004':
					$category_3 = 科學、電腦;
					break;
				case '0100030005':
					$category_3 = 藝術、設計、攝影;
					break;
				case '0100030006':
					$category_3 = 相機攝影;
					break;
				case '0100030007':
					$category_3 = 流行時尚、影視偶像;
					break;
				case '0100030008':
					$category_3 = 旅遊、休閒、生活;
					break;
				case '0100030009':
					$category_3 = 其他雜誌;
					break;
				case '0100040001':
					$category_3 = 商業理財;
					break;
				case '0100040002':
					$category_3 = 文學小說;
					break;
				case '0100040003':
					$category_3 = 藝術設計;
					break;
				case '0100040004':
					$category_3 = 人文科普;
					break;
				case '0100040005':
					$category_3 = 語言電腦;
					break;
				case '0100040006':
					$category_3 = 心靈養生;
					break;
				case '0100040007':
					$category_3 = 休閒生活;
					break;
				case '0100040008':
					$category_3 = 其他書籍;
					break;
				case '0200010001':
					$category_3 = 女性時裝;
					break;
				case '0200010002':
					$category_3 = 男性時裝;
					break;
				case '0200010003':
					$category_3 = 其他;
					break;
				case '0200020001':
					$category_3 = 保養用品;
					break;
				case '0200020002':
					$category_3 = 化妝用品;
					break;
				case '0200020003':
					$category_3 = 健身用品;
					break;
				case '0200020004':
					$category_3 = 清潔用品;
					break;
				case '0200020005':
					$category_3 = 其他;
					break;
				case '0200030001':
					$category_3 = 文具用品;
					break;
				case '0200030002':
					$category_3 = 收納整理;
					break;
				case '0200030003':
					$category_3 = 其他;
					break;
				case '0200040001':
					$category_3 = 電腦與周邊;
					break;
				case '0200040002':
					$category_3 = 手機與周邊;
					break;
				case '0200040003':
					$category_3 = 影音與周邊;
					break;
				case '0200040004':
					$category_3 = 其他;
					break;
				case '0200050001':
					$category_3 = 交通票券;
					break;
				case '0200050002':
					$category_3 = 活動票券;
					break;
				case '0200050003':
					$category_3 = 餐券票券;
					break;
				case '0200050004':
					$category_3 = 電影票券;
					break;
				case '0200050005':
					$category_3 = 其他;
					break;
				case '0200060001':
					$category_3 = 電冰箱;
					break;
				case '0200060002':
					$category_3 = 廚房家電;
					break;
				case '0200060003':
					$category_3 = 其他家電;
					break;
				case '0200060004':
					$category_3 = 衛浴用品;
					break;
				case '0200060005':
					$category_3 = 各種家具;
					break;
				case '0200070001':
					$category_3 = 腳踏車;
					break;
				case '0200070002':
					$category_3 = 其他;
					break;
				case '0200080001':
					$category_3 = 食品;
					break;
				case '0200090001':
					$category_3 = 其他;
					break;
			}	
		?>
		<li><a href="marketIndex.php">市場首頁</a> <span class="divider">/</span></li>
		<li><a href="#"><?php echo $category_1;?></a><span class="divider">/</span></li>
        <li><a href="#"><?php echo $category_2;?></a><span class="divider">/</span></li>
        <li><a href="#"><?php echo $category_3;?></a><span class="divider">/</span></li>
		<li class="active">當前頁面</li>
	</ul>
	<!--商品頁標籤-->     
	<ul class="nav nav-tabs">
  		<li class="active"><a href="#product"  data-toggle="tab">商品</a></li>
        <?php if ($identity == 2){ ?>
        	<li><a href="#bidlist"  data-toggle="tab">詳細出價</a></li>
        <?php }?>
	</ul>
    <div id="myTabContent" class="tab-content" style="width:1200px">
    	<!--商品頁--> 
        <div class="tab-pane fade in active" id="product">
            <div class="span12">
                <!--商品title (上)--> 
                <div class="row" style="font-size:24px; margin-bottom:15px; "><p class="text-info"><p class="text-info"><strong><font color="#FF0000"><?php if($exist==0) { echo '[已結標]　'; }?></font><?php echo $title;?></strong></p></div>
                <!--商品資訊(中)-->
                <div class="row"> 
                    <!--圖片product_pic(左)-->
                    <div class="row">    
                    <div class="span6" style="float:left;">       
                        <ul class="thumbnails"><li class="span" ><a href="#" class="thumbnail" ><img src="../member/images/<?php echo $stu_id;?>/market/<?php echo $product_pic;?>" width="400px"></a></li></ul>
                    </div>
                    
                    <!--描述description(右)-->
                    <div class="span6" style="font-size:18px;";><p class="muted"><?php echo $description; ?></p></div>
                    <div style="clear:both;"></div>
                    </div>
                </div>
                <!--商品資訊(下)-->
                <div class="row"> 
                    <?php
                    //呼叫賣家暱稱帳號
                    $memberNickname = "SELECT `stu_id`, `username` FROM `marketSecondHand_trade` JOIN `Member` USING (stu_id) WHERE  `marketSecondHand_trade` .`trade_id`= {$trade_id}";
                    $resultNickname = mysqli_query( $conn, $memberNickname );
                    $rowNickname = mysqli_fetch_array($resultNickname);
                    
                    //計算賣家評價
                    $catchRate = 'SELECT `c`.`rate` FROM `marketSecondHand_trade` as `t`  RIGHT JOIN `marketSecondHand_comment` as `c`'.
                                'ON `t`.`trade_id` =  `c`.`trade_id`'.
                                'WHERE `t`.`stu_id` = "'.$rowNickname['stu_id'].'"';
                    $resultRate = mysqli_query($conn, $catchRate); 
                    $total_result = mysqli_num_rows($resultRate);
                    
                    $average = 0;
                    for($i=0;$i<$total_result;$i++){
                        $rowRate =mysqli_fetch_array($resultRate);	
                        $data[$i] = $rowRate[0];
                    }
                    $output = array_count_values($data);
                    for($i=1;$i<=5;$i++){
                        
                        if($output[(string)$i]==""){
                            $output[(string)$i] = 0;
                            }
                        $element_name = "length_";
                        $element_name .= (string)$i;
                        $$element_name = ((float)($output[(string)$i])/$total_result)*100;
                        $average += $i*$output[(string)$i];
                    }
                    $average = number_format((float)($average/$total_result),2);
                    
                    //計算出價次數及成交次數				
                    $productCount_bid = "SELECT * FROM ( `marketSecondHand_trade` LEFT JOIN `marketSecondHand_bidList` USING ( trade_id ) )  WHERE `marketSecondHand_trade`.`trade_id` = {$trade_id}";
                    $resultCount_bid = mysqli_query( $conn, $productCount_bid );
                    $count_bid = 0;
                    $count_buy = 0; 
                    while ($rowCount_bid = mysqli_fetch_array($resultCount_bid)){
                        if($rowCount_bid['buy_list'] == 1 || $rowCount_bid['buy_list'] == 0 ){
                            $count_bid ++ ;  //出價次數++
                            if($rowCount_bid['buy_list'] == 1){
                                $count_buy ++; //成交次數++
                            }					
                        }
                    }	
                    ?>
                    <div class="pDetail"><p class="muted"><i class="icon-user"></i> 賣家帳號<?php echo "　　".$stu_id;?></p></div>
                    <div class="pDetail"><p class="muted"><i class="icon-user"></i> 賣家暱稱 &nbsp;<a href="#" rel="popover" data-placement="bottom" title="<?php echo "  ".$rowNickname['username']; ?>" data-content="<?php getSellerInfo($rowNickname['username'], $conn); ?>"><?php echo $rowNickname['username']; ?></a></p></div>
                    <div class="pDetail"><p class="muted"><i class="icon-star"></i> 賣家評價<?php echo "　　".$average;?></p></div>
                    <div class="pDetail"><p class="muted"><i class="icon-heart"></i> 商品數量<?php echo "　　".$number;?>件</p></div>               
                    <div class="pDetail"><p class="muted"><i class="icon-plus"></i> 起始價格<?php echo "　　".$least_price;?>元</p></div>
                    <div class="pDetail"><p class="muted"><i class="icon-ok"></i> 出價次數<?php echo "　　".$count_bid;?>次</p></div>
                    <div class="pDetail"><p class="muted"><i class="icon-time"></i> 開始時間<?php echo "　　".$start_date." ".$start_time;?></p></div>
                    <div class="pDetail"><p class="muted"><i class="icon-ok"></i> 成交次數<?php echo "　　".$count_buy;?>次</p></div>
                    <div class="pDetail"><p class="muted"><i class="icon-time"></i> 結束時間<?php echo "　　".$end_date." ".$end_time;?></p></div>
                    <div style="clear:both;"></div>
                </div>	
                <?php
                
                //已得標之買家
                if ($identity == 3){ ?>
                    <!--出價for 得標者--> 
                    <div class="row" style="margin-top:20px;"> 
                        <div class="row"> 
                            <div class="offset2 span8 offset2" >
                                <div class="alert alert-error">
                                <form class="form-horizontal">
                                    <div class="control-group" style="margin-top:20px; margin-left:50px;font-size:28px;"><strong>您已得標!!!!!</strong></div>
                                    <div class="control-group" style="margin-top:10px;"><label class="control-label" for="inputEmail">你的出價</label>
                                        <div class="controls"><?php echo $exchange_info;?></div>
                                    </div>
                                    <div class="control-group"><label class="control-label" for="inputEmail" >購買數量</label>
                                        <div class="controls"><?php echo $wanted_number;?></div>
                                    </div>
                                    <div class="control-group"><label class="control-label" for="inputEmail">得標日期</label>
                                        <div class="controls"><?php echo $update_time;?></div>
                                    </div>
                                </form>
                                </div> 
                            </div>
                        </div>
                    </div> 
                    <!--出價for 得標者 END-->
                <?php }
                //已出價,尚未得標之買家
                if ($identity == 4){ ?>
                    <!--出價for 修改出價者-->
                    <div class="row" style="margin-top:20px;">
                    <form class="form-horizontal" method="post" action="buyS.php">
                        <div class="row"> 
                            <div class="offset2 span8 offset2">
                                <div class="alert alert-success">
                                    <input name="trade" type="hidden" value="<?php echo $trade_id;?>"/>
                                    <div class="control-group" style="margin-top:10px;"><label class="control-label" for="inputEmail">上次出價</label>
                                        <div class="controls"><?php echo $exchange_info; ?></div>
                                    </div>
                                    <div class="control-group"><label class="control-label" for="inputEmail" >上次購買數量</label>
                                        <div class="controls"><?php echo $wanted_number; ?></div>
                                    </div>
                                    <!--出價選單-->
                                    <div class="control-group"><label class="control-label" for="inputEmail" >出價方式</label>
                                        <div class="controls">
                                        <select class="span2" name="pay_type">
                                            <option value="0">錢</option>
                                            <option value="1">物品</option>
                                            <option value="2">錢+物品</option>
                                        </select>
                                        </div>
                                    </div>
                                    <!--出價選單-->
                                    <div class="control-group"><label class="control-label" for="inputEmail">重新出價</label>
                                        <div class="controls"><input class="span3" type="text" name="pay_info" id="inputEmail" placeholder="大於起始價格/物品"/></div>
                                    </div>
                                    <div class="control-group"><label class="control-label" for="inputEmail">購買數量</label>
                                        <div class="controls"><input class="span3" type="text" name="num" id="inputEmail" placeholder="1"/></div>
                                    </div>
                                    <div style="clear:both;"></div>
                                </div> 
                            </div>
                        </div>
                        <!--button-->
                        <div class="control-group" style="margin-left:450px;" >
                             <div class="controls"><p><button class="btn btn-large btn-success" type="submit" style="width:150px; height:50px;">修改出價</button></p></div>
                        </div>
                        <!--button-->
                    </form>
                    </div>
                    <!--出價for 修改出價者 END--> 
                    
                <?php }
                //尚未出價之買家
                if ($identity == 5 || $identity == 1){ ?>
                    <!--出價for 第一次出價者--> 
                    <div class="row" style="margin-top:20px;">
                    <form class="form-horizontal" method="post" action="buyS.php">
                        <div class="row"> 
                            <div class="offset2 span8 offset2" >
                                <div class="alert alert-info">
                                    <input name="trade" type="hidden" value="<?php echo $trade_id;?>"/>
                                    <div class="control-group" style="margin-top:10px;"><label class="control-label" for="inputEmail">起始價格</label>
                                        <div class="controls"><?php echo $least_price;?>元</div>
                                    </div>
                                    <div class="control-group"><label class="control-label" for="inputEmail" >剩餘數量</label>
                                        <div class="controls"><?php echo $number; ?></div>
                                    </div>
                                    <!--出價選單-->
                                    <div class="control-group"><label class="control-label" for="inputEmail" >出價方式</label>
                                        <div class="controls">
                                        <select class="span2" name="pay_type">
                                            <option value="0">錢</option>
                                            <option value="1">物品</option>
                                            <option value="2">錢+物品</option>
                                        </select>
                                        </div>
                                    </div>
                                    <!--出價選單end-->
                                    <div class="control-group"><label class="control-label" for="inputEmail">我要出價</label>
                                                <div class="controls"><input class="span3" type="text" name="pay_info" id="inputEmail" placeholder="大於起始價格/物品"></div>
                                    </div>
                                    <div class="control-group"><label class="control-label" for="inputEmail">購買數量</label>
                                                <div class="controls"><input class="span3" type="text" name="num" id="inputEmail" placeholder="1"></div>
                                    </div>
                                    <div style="clear:both;"></div>
                                </div> 
                           </div>
                        </div>
                        <div class="control-group" style="margin-left:450px;" >
                            <div class="controls"><p><button class="btn btn-large btn-primary" type="submit" style="width:150px; height:50px;">我要競標</button></p></div>
                        </div>
                    </form>
                    </div> 
                    <!--出價for 第一次出價者 END-->  
                <?php }?>
            </div> 
    
    
        </div>
        <!--詳細出價頁-->
        <div class="tab-pane fade" id="bidlist">
            <div class="span12">
                <!--title--> 
                <div class="row" style="font-size:24px; margin-bottom:15px; margin-left:35px;"><p class="text-info"><p class="muted"><strong>買家詳細出價</strong></p></div>
                <!--詳細出價(中)-->
                <div class="well" style="margin-right:63px; margin-left:35px;">
                    <div class="row" style="margin:20px;">
                        <div class="row">
                            <div class="buyerDetail" style="margin-left:20px; width:135px; margin-right:30px;"><strong>出價/得標時間</strong></div>
                            <div class="buyerDetail"><strong>買家帳號</strong></div>
                            <div class="buyerDetail"><strong>買家暱稱</strong></div>
                            <div class="buyerDetail"><strong>買家出價</strong></div>
                            <div class="buyerDetail"><strong>購買數量</strong></div>
                            <div class="buyerDetail"><strong>是否得標</strong></div>
                            <div style="clear:both;"></div>
                        </div>
                        
                        <!--出價資料START-->
                        <?php
                        $productDetail = "SELECT * FROM (`marketSecondHand_trade` LEFT JOIN `marketSecondHand_bidList` USING ( trade_id ) ) WHERE `marketSecondHand_trade`.`trade_id` = {$trade_id} ";
                        $resultDetail = mysqli_query( $conn, $productDetail );
                        
                        while ($rowDetail = mysqli_fetch_array($resultDetail) ){ ?>	
                            <div class="row">
                                <div class="buyerDetail" style="margin-left:20px; width:135px;margin-right:30px;" ><?php echo $rowDetail['update_time'];?></div>
                                <div class="buyerDetail"><?php echo $rowDetail['bidder_id'];?></div>
                                <div class="buyerDetail">
                                    <?php
                                    //呼叫買家暱稱
                                    $memberNickname = "SELECT `username` FROM `Member` WHERE `stu_id`='".$rowDetail['bidder_id']."'";
                                    $resultNickname = mysqli_query( $conn, $memberNickname );
                                    $rowNickname = mysqli_fetch_array($resultNickname);
                                    echo $rowNickname['username'];
                                    ?>
                                </div>
                                <div class="buyerDetail"><?php echo $rowDetail['exchange_info'];?></div>
                                <div class="buyerDetail"><?php echo $rowDetail['wanted_number'];?></div>
                                <div class="buyerDetail">
                                    <?php
                                    if ( $rowDetail['buy_list'] == 1 ) {
                                        echo '已得標';
                                    }
                                    else {
                                        echo '未得標';
                                    }
                                    ?>
                                </div>
                                <div style="clear:both;"></div><!--左邊這行是為了排版用,不能加資料也不能刪掉喔~-->
                            </div>
                        <?php } ?>
                        <!--出價資料END-->
                    </div>
                </div>     
                <!--管理按鈕-->
                <div class="offset9 span3">
                    <button class="btn btn-large btn-warning" type="button" style="width:120px; height:40px; margin-left:10px;"  onclick="location.href='sellerInterface.php'">管理出價</button>
                </div>
                <!--管理按鈕end-->
            </div>
        </div>
    </div>
	
</div>

<!--Footer-->
<?php
	require_once( "marketFooter.php" );
?>

<script src = "js/bootstrap-modal.js"></script>
<!--script src = "js/jquery.js"></script-->
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