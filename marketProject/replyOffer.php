<?php
	session_start();
	
	//Last Modified 2012.12.07
	require_once 'Mail.php';
	include('Mail/mime.php');
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入!"); location.href="marketIndex.php"</script>';
	} else {
		require_once( "../connectVar.php" );
		require_once( "UserQueryFunction.php" );
		
		$stu_id = $_SESSION['stu_id'];
		$trade_id = mysqli_real_escape_string( $conn, trim($_GET['trade']) );
		$buyer_id = mysqli_real_escape_string( $conn, trim($_GET['buyer']) );
		
<<<<<<< HEAD
		$query = "SELECT marketSecondHand_productInfo.title, marketSecondHand_bidList.*,marketSecondHand_trade.number, Member.username, Member.email, marketSecondHand_trade.least_price " .
=======
		/*$query = "SELECT marketSecondHand_productInfo.title, marketSecondHand_bidList.*, Member.username, Member.email, marketSecondHand_trade.least_price " .
>>>>>>> 8196fc654633f729663dc150d634f0eef8af1a58
				 "FROM marketSecondHand_trade " .
				 "LEFT JOIN marketSecondHand_bidList ON marketSecondHand_bidList.trade_id = marketSecondHand_trade.trade_id " .
				 "LEFT JOIN marketSecondHand_productInfo ON marketSecondHand_productInfo.product_id = marketSecondHand_trade.product_id " .
				 "LEFT JOIN Member ON Member.stu_id = marketSecondHand_bidList.bidder_id " .
				 "WHERE marketSecondHand_trade.trade_id = '$trade_id' AND marketSecondHand_trade.stu_id = '$stu_id' AND marketSecondHand_bidList.bidder_id = '$buyer_id'";*/
				 
		//test		 
<<<<<<< HEAD
		/*$query = "SELECT marketsecondhand_productinfo. * ,marketSecondHand_productInfo.title, marketSecondHand_bidList.*, Member.username, Member.email,". 
=======
		$query = "SELECT marketsecondhand_productinfo. * ,marketSecondHand_productInfo.title, marketSecondHand_bidList.*, Member.username, Member.email,". 
>>>>>>> 8196fc654633f729663dc150d634f0eef8af1a58
					"marketSecondHand_trade.least_price, marketSecondHand_trade.number ".
					"FROM marketSecondHand_trade ".
					"LEFT JOIN marketSecondHand_bidList ON marketSecondHand_bidList.trade_id = marketSecondHand_trade.trade_id ".
					"LEFT JOIN marketSecondHand_productInfo ON marketSecondHand_productInfo.product_id = marketSecondHand_trade.product_id ".
					"LEFT JOIN Member ON Member.stu_id = marketSecondHand_bidList.bidder_id ".
					"WHERE marketSecondHand_trade.trade_id =7 AND marketSecondHand_trade.stu_id = 'B004020013' AND marketSecondHand_bidList.bidder_id = 'B004020012'";
				 
		$result = mysqli_query( $conn, $query ) or die('Forbidden!');
		
		/*if( mysqli_num_rows($result) == 0 ) {
			echo '<script type="text/javascript">alert("You have No Rights To Access This Page!"); location.href="marketIndex.php"</script>';	
		}*/
		
		$row = mysqli_fetch_array( $result );
		
		if( isset($_POST['send']) ) {
			// TODO : Send Email to the buyer by gmail.
			
			$email_account = substr($_SESSION['stu_id'],-9);
			
			$from = "airstagestudio@gmail.com";
			$to = "b".$email_account."@student.nsysu.edu.tw";
			$subject = "[系統寄信]Airstage賣方回覆";
<<<<<<< HEAD
			$body = '<p style="size:20px,font-weight:bold;">親愛的 '.$_POST['username'].' 同學：</p>'.
			'<p style="margin-left:50px;">您在Airstage二手市集對於'.$_POST['title'].'的出價，賣家回覆囉</p>'.
			'<p style="margin-left:50px;">賣家回覆：'.$_POST['reply'].'</p>'.
			'<p style="margin-left:50px;">商品名稱：'.$_POST['title'].'</p>'.
			'<p style="margin-left:50px;">商品剩餘數量：'.$_POST['number'].'</p>'.
			'<p style="margin-left:50px;">感謝您對Airstage二手市集的支持！</p>'.
			'<p style="margin-left:300px;margin-top:30px;"><a href="http://www.airstage.com.tw/">Airstage</a></p>';
=======
			$body = '<p style="size:20px,font-weight:bold;">親愛的'.$row['username'].'同學：</p>'.
			'<p style="margin-left:50px;">您在Airstage二手市集對於'.$row['title'].'的出價，賣家回覆囉</p>'.
			'<p style="margin-left:50px;">賣家回覆：'.$_POST['reply'].'</p>'.
			'<p style="margin-left:50px;">商品名稱：'.$row['title'].'：</p>'.
			'<p style="margin-left:50px;">商品剩餘數量：'.$row['number'].'</p>'.
			'<p style="margin-left:50px;">感謝您對Airstage二手市集的支持！</p>'.
			'<p style="margin-left:300px;margin-top:200px;"><a href="http://www.airstage.com.tw/">Airstage</a></p>';
>>>>>>> 8196fc654633f729663dc150d634f0eef8af1a58
			$host = "smtp.gmail.com";
			$username = "airstagestudio"; // same as $from in most cases
			$password = "86088608";
			
			$headers = array ('From' => $from,
				'To' => $to,
				'Subject' => '=?utf8?B?' . base64_encode($subject) . '?=', 
                'Content-type' => 'text/html; charset=utf-8'
			);
			
			$mime = new Mail_Mime("\n");
			$mime->setHTMLBody($body);
			$mime_params = array(
			  'text_encoding' => '7bit',
			  'text_charset'  => 'UTF-8',
			  'html_charset'  => 'UTF-8',
			  'head_charset'  => 'UTF-8'
			);
			
			$body = $mime->get($mime_params);
			$headers = $mime->headers($headers);
			
			$email = Mail::factory('smtp',
			array ('host' => $host,
			'auth' => true,
			'username' => $username,
			'password' => $password
			)
			);
			
			$result = $email->send($to, $headers, $body);
			
			if (PEAR::isError($result))
			echo "Error occurred: " . $result->getMessage();
			else;
		
			//echo $id . '<br />';
			
			echo '<script type="text/javascript">alert("回覆已送出!"); location.href="sellerInterface.php"</script>';
		}
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
	<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" language="javascript">var app = "market";</script>
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
		<li class="active">交易回覆頁 - <?php echo $row['title']; ?></li>
	</ul>
	
	<!-- Warning Area -->
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Airstage 提醒：</strong>寫好的回覆會經由Email的方式發信給該出價者。
    </div>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal">
    	<legend>交易回覆表單</legend>
        
        
        <input type="hidden" name="email" value="<?php echo $row['email'] ?>" />
        <input type="hidden" name="title" value="<?php echo $row['title'] ?>" />
        <input type="hidden" name="number" value="<?php echo $row['number'] ?>" />
        <input type="hidden" name="username" value="<?php echo $row['username'] ?>" />
    	
    	<div class="control-group">
		  <label class="control-label" for="inputEmail">商品名稱</label>
		  <div class="controls">
		  	<span class="input-xlarge uneditable-input"><?php echo $row['title']; ?></span>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label" for="inputEmail">自訂最低出價</label>
		  <div class="controls">
		  	<span class="input-xlarge uneditable-input"><?php echo $row['least_price']; ?></span>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label" for="inputPassword">買方資料</label>
		  <div class="controls">
		    <a href="#" rel="popover" data-placement="bottom" title="<?php echo $row['username']; ?>" data-content="<?php getSellerInfo($row['username'], $conn); ?>"><?php echo $row['username']; ?></a>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label" for="inputEmail">欲購數量</label>
		  <div class="controls">
		  	<span class="input-xlarge uneditable-input"><?php echo $row['wanted_number']; ?></span>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label" for="inputPassword">交易方式</label>
		  <div class="controls">
		    <span class="input-xlarge uneditable-input">
		    <?php 
		    	if( $row['exchange_type'] == 0 ) echo '金錢';
		    	else if( $row['exchange_type'] == 1 ) echo'以物易物';
		    	else echo '其他'; 
		    ?>
		    </span>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label" for="inputPassword">買方條件</label>
		  <div class="controls">
		    <span class="input-xlarge uneditable-input"><?php echo $row['exchange_info']; ?></span>
		  </div>
		</div>
		
		<div class="control-group">
		  <label class="control-label">回覆需求</label>
		  <div class="controls">
		    <textarea placeholder="寫下想跟買方說的話。。。" style="height: 200px;" name="reply"></textarea>
		  </div>
		</div>
    	
    	<div class="form-actions">
		  <button type="submit" class="btn btn-primary" name="send"><i class="icon-plane icon-white"></i> 寄出</button>
		  <button type="reset" class="btn btn-info"><i class="icon-refresh icon-white"></i> 清除重填</button>
		</div>
    </form>
    
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