<div class="navbar" style="font-family: '微軟正黑體', 'Arial';">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      
	<?php
		if( isset($_SESSION['stu_id']) && isset($_SESSION['nick']) ) {
	?>
	  
      <a class="brand" href="../accounts/revises.php"><?php echo $_SESSION['nick']; ?></a>
      <div class="nav-collapse" style="font-family: '微軟正黑體', 'Arial';">
        <ul class="nav">
        	<li class="divider-vertical"></li>
        	<li class="dropdown">
	        	<a href="" class="dropdown-toggle" data-toggle="dropdown">前往 <b class="caret"></b></a>
	            <ul class="dropdown-menu">    
	              <li><a href="marketIndex.php"><i class="icon-globe"></i> 市場首頁</a></li>
	              <li class="divider"></li>
	              <li class="nav-header">二手市場</li>       
	              <li><a href="#"><i class="icon-book"></i> 二手書區</a></li>
	              <li><a href="#"><i class="icon-wrench"></i> 雜物區</a></li>
	              <li><a href="#"><i class="icon-question-sign"></i> 求物區</a></li>
	              <li class="divider"></li>
	              <li class="nav-header">限時競標</li>
	              <li><a href="#"><i class="icon-book"></i> 書本區</a></li>
	              <li><a href="#"><i class="icon-wrench"></i> 雜物區</a></li>
	              <li class="divider"></li>
	              <li class="nav-header">校園團購</li>	           
	              <li><a href="#"><i class="icon-book"></i> 教課書區</a></li>
	              <li><a href="#"><i class="icon-leaf"></i> 飲食區</a></li>
	              <li><a href="#"><i class="icon-question-sign"></i> 求物區</a></li>
	            </ul>
	        </li>         
	        <li class="dropdown">
	        	<a href="" class="dropdown-toggle" data-toggle="dropdown">交易管理介面 <b class="caret"></b></a>
	            <ul class="dropdown-menu">   
	              <li><a href="onChasing.php"><i class="icon-bell"></i> 追蹤清單</a></li>
	              <li><a href="myRate.php"><i class="icon-heart"></i> 我的評分</a></li>
	              <li class="divider"></li>
	              <li class="nav-header">進階管理</li>
	              <li><a href="buyerInterface.php"><i class="icon-camera"></i> 買方總管理</a></li>
	              <li><a href="sellerInterface.php"><i class="icon-share-alt"></i> 賣方總管理</a></li>	          
	            </ul>
	        </li>
			<li><a data-toggle="modal" href="#newProduct">刊登商品</a></li>
			<li><a data-toggle="modal" href="#buyS">我要出價</a></li>			
	        <li><a href = "../member/logout.php">登出</a></li>
        </ul>
		
		<!-- newProduct Popframe -->
		<?php require_once("newProduct_Popframe.php"); ?>

		<!-- test buyS Popframe -->
		<div id="buyS" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<?php
			require_once("../connectVar.php");
			//$trade_id隨每樣商品不同 -> js(只要一個buyS Popframe就好) or php(有幾項商品就要有幾個buyS Popframe)
			//判斷為"新增"或"修改"出價
			//測試資料
			$stu_id = "test01";
			//$trade_id = 5;
			$result = mysqli_query( $conn, "SELECT * FROM `marketSecondHand_bidList` WHERE `bidder_id` = '{$stu_id}' AND `trade_id` = '{$trade_id}'" );
			$check = mysqli_fetch_assoc($result);
			?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 id="myModalLabel"><?php echo (isset($check)!=1) ? "我要出價" : "修改出價" ; ?></h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action = "buyS.php" method = "post">
					<div class="control-group">
						<label class="control-label">商品編號</label>
						<div class="controls">
							<?php echo $trade_id.'<input type="hidden" name="trad_id" id="trad_id" value="'.$trade_id.'" >'; ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">商品標題</label>
						<div class="controls">
							test
							<?php
								//SQL式待更新
								$result = mysqli_query( $conn, "SELECT 'title' FROM `marketsecondhand_productinfo` WHERE `trade_id` = '{$trade_id}'" );
								$product_result = mysqli_fetch_assoc($result);
								echo $product_result['title'];
								print_r($product_result);
							?>
						</div>
					</div>
					<hr/>
					<div class="control-group">
						<label class="control-label">我要用</label>
						<div class="controls">
						<?php
							if($check) {
								switch ( $check['exchange_type'] ) {
									case 0:
										echo '<label class="checkbox inline"><input type="radio" name="exchange_type" id="exchange_type" value="0" checked="checked"/>錢　</label>'.
											 '<label class="checkbox inline"><input type="radio" name="exchange_type" id="exchange_type" value="1" />物品　</label>'.
											 '<label class="checkbox inline"><input type="radio" name="exchange_type" id="exchange_type" value="2" />錢+物品 </label>';
										break;
									case 1:
										echo '<label class="checkbox inline"><input type="radio" name="exchange_type" id="exchange_type" value="0" />錢　</label>'.
											 '<label class="checkbox inline"><input type="radio" name="exchange_type" id="exchange_type" value="1" checked="checked"/>物品　</label>'.
											 '<label class="checkbox inline"><input type="radio" name="exchange_type" id="exchange_type" value="2" />錢+物品　</label>';
										break;
									case 2:
										echo '<label class="radio inline"><input type="radio" name="exchange_type" id="exchange_type" value="0" /> 錢　</label>'.
											 '<label class="radio inline"><input type="radio" name="exchange_type" id="exchange_type" value="1" /> 物品　</label>'.
											 '<label class="radio inline""><input type="radio" name="exchange_type" id="exchange_type" value="2" checked="checked"/>錢+物品　</label>';
										break;
								}
								echo '<br/><input type="text" name="exchange_info" id="exchange_info"  value="'.$check['exchange_info'].'" />';
							}else {
						?>
								<input type="radio" name="exchange_type" id="exchange_type" value="0" />錢　
								<input type="radio" name="exchange_type" id="exchange_type" value="1" />物品　
								<input type="radio" name="exchange_type" id="exchange_type" value="2" />錢+物品　
								<br/><input type="text" name="exchange_info" id="exchange_info" />
						<?php
							}
						?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">交換</label>
						<div class="controls">
						<?php
							if($check) {
								echo '<input class="input-mini" type="text" name="wanted_number" id="wanted_number" value="'.$check['wanted_number'].'"/>個';
							}else {
								echo '<input class="input-mini" type="text" name="wanted_number" id="wanted_number"/>個';
							}
						?>
						</div>
					</div>			
					<div class="control-group">
						<div class="controls">
							<button type="submit" name="" class="btn"><?php echo (isset($check)!=1) ? "確定出價" : "修改出價" ; ?></button>
						</div>
					</div>
				</form>
			</div>
		</div>
		
		
    <?php
		} else {
	?>			
		<div class="nav-collapse">
			<ul class="nav">
				<li class="dropdown">
		        	<a href="" class="dropdown-toggle" data-toggle="dropdown">前往 <b class="caret"></b></a>
		            <ul class="dropdown-menu"> 
		              <li><a href="marketIndex.php">市場首頁</a></li>
	                  <li class="divider"></li>   
		              <li class="nav-header">二手市場</li>
		              <li><a href="#">二手書區</a></li>
		              <li><a href="#">雜物區</a></li>
		              <li><a href="#">求物區</a></li>
		              <li class="divider"></li>
		              <li class="nav-header">限時競標</li>
		              <li><a href="#">書本區</a></li>
		              <li><a href="#">雜物區</a></li>
		              <li class="divider"></li>
		              <li class="nav-header">校園團購</li>
		              <li><a href="#">教課書區</a></li>
		              <li><a href="#">飲食區</a></li>
		              <li><a href="#">求物區</a></li>
		            </ul>
		        </li> 
				<li><a data-toggle="modal" href="#login">登入</a></li>  
			</ul>
		
		
		<!-- Login Popframe -->
		<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 id="myModalLabel">會員登入</h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action = "marketLogin.php" method = "post">
					<div class="control-group">
						<label class="control-label">帳號</label>
						<div class="controls">
							<input type="text" name = "username" id="inputEmail" placeholder="B993040017 / 帳號">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">密碼</label>
						<div class="controls">
							<input type="password" name = "password" id="inputPassword" placeholder="Password">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button type="submit" name = "loginSubmit" class="btn">登入</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		
		
	<?php
		}
	?>
        <ul class="nav pull-right">
          <form class="navbar-search pull-left" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          	<input type="text" class="search-query span2" placeholder="搜尋商品">
          </form>
          <li class="divider-vertical"></li>
          <!--select name = "whereToSearch" class="span2">
          	<option>二手市場</option>
          	<option>限時競標</option>
          	<option>校園團購</option>
          </select-->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">從哪邊找呢？<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">二手市場</a></li>
              <li><a href="#">限時競標</a></li>
              <li><a href="#">校園團購</a></li>            
            </ul>
          </li>
        </ul>
      </div><!-- /.nav-collapse -->
    </div>
  </div><!-- /navbar-inner -->
</div><!-- /navbar -->
	