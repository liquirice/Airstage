<div class="navbar navbar-inverse navbar-fixed-top" >
  <div class="navbar-inner" >
    <div class="container" >
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse" >
        <span class="icon-bar" ></span>
        <span class="icon-bar" ></span>
        <span class="icon-bar" ></span>
      </button>
      <?php 
	      if( isset($_SESSION['name']) && isset($_SESSION['nick']) && isset($_SESSION['auth']) && isset($_SESSION['stu_id']) ) {
		      echo "<a href='courseLogout.php' class='brand' style='color: #FFF; font-size: 14px;'>Logout</a>" . 
		      	   "<a href='../accounts/revises.php' class='brand' style='color: #FFF; font-size: 14px;'>" . $_SESSION['name'] . "</a>";
	      } else {
		      echo '<a href="#myModal" role="button" data-toggle="modal" class="brand" style="color: #FFF; font-size: 14px;">Login</a>';
	      }
      ?>
      <div class="nav-collapse collapse" >
        <ul class="nav" >
        	<li class="" >
				<a href="../index.php" ><img src="img/airs.png" />&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/nsysu.png" /></a>
            </li>
			<li>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</li>
			<li>
				<a href="../index.php" >活動牆</a>
            </li>  
			<li>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</li>    		
			<li class="" >
            	<a href="../column/" >專 &nbsp;&nbsp;&nbsp;&nbsp;欄</a>
            </li> 
			<li>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</li>
			<li class="" >
            	<a href="../marketProject/marketIndex.php" >市 &nbsp;&nbsp;&nbsp;&nbsp;集</a>
            </li>
			<li>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</li>
			<li class="active" >
            	<a href="index.php" >Facing Course</a>
            </li>
			<li>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</li>
            <li class="" >
            	<a href="../apps/index.php" >應用程式</a>         
            </li>            
        </ul>
      </div>
    </div>
  </div>
</div>

 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Facing Course Login</h3>
  </div>
  <div class="modal-body">
    <p>
	    <form class="form-horizontal" method="post" action="CourseLogin.php">
		  <div class="control-group">
		    <label class="control-label" for="inputEmail">帳號</label>
		    <div class="controls">
		      <input type="text" id="inputEmail" placeholder="Account" name="username">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="inputPassword">密碼</label>
		    <div class="controls">
		      <input type="password" id="inputPassword" placeholder="Password" name="pwd">
		    </div>
		  </div>
		  <div class="control-group">
		    <div class="controls">
		      <button type="submit" class="btn btn-primary" name="courselogin">Sign in</button>
		    </div>
		  </div>
		</form>
		<a href="../member/register/registerLaw.php"><button type="button" class="btn btn-primary" name="courselogin">Register</button></a>
    </p>
  </div>
</div>