<div class="navbar">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      
      <a class="brand" href="../accounts/revises.php"><?php echo 'Arwindy'; ?></a>
      <div class="nav-collapse">
        <ul class="nav">
        	<li class="divider-vertical"></li>
          	<li><a href="#">我的評分</a></li>         
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">交易管理介面 <b class="caret"></b></a>
            <ul class="dropdown-menu">           
              <li><a href="#">成交記錄</a></li>
              <li><a href="#">追蹤清單</a></li>
              <li class="divider"></li>
              <li class="nav-header">進階管理</li>
              <li><a href="#">買方總管理</a></li>
              <li><a href="#">賣方總管理</a></li>
            </ul>
          </li>
        </ul>
        
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
	