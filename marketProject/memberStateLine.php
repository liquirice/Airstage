<<<<<<< HEAD
<div class="navbar" style="font-family: '微軟正黑體', 'Arial';">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      
	<?php
		if( isset($_SESSION['stu_id']) && isset($_SESSION['nick']) && isset($_SESSION['auth']) && isset($_SESSION['name']) ) {
			if( $_SESSION['auth'] == 0 ) {
				echo '<script type="text/javascript">alert("你還沒通過信箱認證唷!通過了才能登入市集~"); location.href="marketIndex.php"</script>';
			} else {
	?>
	  
      <a class="brand" href="../accounts/revises.php"><?php echo $_SESSION['nick']; ?></a>
      <div class="nav-collapse" style="font-family: '微軟正黑體', 'Arial';">
        <ul class="nav">
        	<li class="divider-vertical"></li>
        	<li class="dropdown">
	        	<a href="" class="dropdown-toggle" data-toggle="dropdown">前往 <b class="caret"></b></a>
	            <ul class="dropdown-menu">    
	              <li><a href="marketIndex.php"><i class="icon-home"></i> 市場首頁</a></li>
	              <li class="divider"></li>
	              <li class="nav-header">二手市場</li>      
				  <li><a href="categoryS.php"><i class="icon-globe"></i> 全部分類</a></li>				  
	              <li><a href="marketSearch.php?ct=01"><i class="icon-book"></i> 書籍雜誌</a></li>			
					  <li><a href="marketSearch.php?ct=02"><i class="icon-question-sign"></i> 生活雜務</a></li>
	              <li class="divider"></li>
	              <li class="nav-header">限時競標</li>
	              <!--li><a href="#"><i class="icon-book"></i> 書本區</a></li>
	              <li><a href="#"><i class="icon-wrench"></i> 雜物區</a></li-->
	              <li class="divider"></li>
	              <li class="nav-header">校園團購</li>	           
	              <!--li><a href="#"><i class="icon-book"></i> 教課書區</a></li>
	              <li><a href="#"><i class="icon-leaf"></i> 飲食區</a></li>
	              <li><a href="#"><i class="icon-question-sign"></i> 求物區</a></li-->
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
			<li><a href="publication.php">刊登商品</a></li>
	        <li><a href = "../member/register/logout.php">登出</a></li>
        </ul>
		
		
		
    <?php
		} 
	} else {
	?>			
		<div class="nav-collapse">
			<ul class="nav">
				<li class="dropdown">
		        	<a href="" class="dropdown-toggle" data-toggle="dropdown">前往 <b class="caret"></b></a>
		            <ul class="dropdown-menu"> 
		              <li><a href="marketIndex.php"><i class="icon-home"></i> 市場首頁</a></li>
	                  <li class="divider"></li>   
		              <li class="nav-header">二手市場</li>
		              <li><a href="categoryS.php"><i class="icon-globe"></i> 全部分類</a></li>				  
					  <li><a href="marketSearch.php?ct=01"><i class="icon-book"></i> 書籍雜誌</a></li>			
					  <li><a href="marketSearch.php?ct=02"><i class="icon-question-sign"></i> 生活雜務</a></li>
		              <li class="divider"></li>
		              <li class="nav-header">限時競標</li>
		              <!--li><a href="#">書本區</a></li>
		              <li><a href="#">雜物區</a></li-->
		              <li class="divider"></li>
		              <li class="nav-header">校園團購</li>
		              <!--li><a href="#">教課書區</a></li>
		              <li><a href="#">飲食區</a></li>
		              <li><a href="#">求物區</a></li-->
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
          <form class="navbar-search pull-left" action="marketSearch.php" method="get">
          	<input type="text" class="search-query span2" name="kwd" placeholder="搜尋商品">
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
=======
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
	              <li><a href="marketIndex.php"><i class="icon-home"></i> 市場首頁</a></li>
	              <li class="divider"></li>
	              <li class="nav-header">二手市場</li>      
				  <li><a href="categoryS.php"><i class="icon-globe"></i> 全部分類</a></li>				  
	              <li><a href="#"><i class="icon-book"></i> 書籍雜誌</a></li>
	              <li><a href="#"><i class="icon-wrench"></i> 服飾精品</a></li>
	              <li><a href="#"><i class="icon-question-sign"></i> 生活雜務</a></li>
	              <li class="divider"></li>
	              <li class="nav-header">限時競標</li>
	              <!--li><a href="#"><i class="icon-book"></i> 書本區</a></li>
	              <li><a href="#"><i class="icon-wrench"></i> 雜物區</a></li-->
	              <li class="divider"></li>
	              <li class="nav-header">校園團購</li>	           
	              <!--li><a href="#"><i class="icon-book"></i> 教課書區</a></li>
	              <li><a href="#"><i class="icon-leaf"></i> 飲食區</a></li>
	              <li><a href="#"><i class="icon-question-sign"></i> 求物區</a></li-->
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
	        <li><a href = "../member/register/logout.php">登出</a></li>
        </ul>
		
		<!-- newProduct Popframe -->
		<?php require_once("newProduct_Popframe.php"); ?>
		
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
>>>>>>> 8196fc654633f729663dc150d634f0eef8af1a58
	