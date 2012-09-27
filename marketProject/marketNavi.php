<!-- Navigation Bar -->
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="brand" href="../index.php">Airstage</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
        	<li class="">
            	<a href="../index.php">活動牆</a>
            </li>
            <li class="active">
            	<a href="marketIndex.php">學生市集</a>
            </li>
            <li class="">
            	<a href="../accounts/revises.php">會員中心</a>         
            </li>
            <li class="">
            	<a href="">校園專欄</a>
            </li>
            <li class="">
            	<a href="">影音聯播</a>
            </li>      
            <?php
        		if( $_SESSION['auth'] == 2 ) {
            ?>
            <li class="">
            	<a href="../accounts/managerInterface.php">會員管理者介面</a>
            </li>
            <?php
        		}
            ?>                 
        </ul>
      </div>
    </div>
  </div>
</div>