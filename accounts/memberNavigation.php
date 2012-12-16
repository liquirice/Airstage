<table border="0" width="65%" height="135">
	<tr>
		<td>
	    	<div class="dropdown clearfix">
	              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; width: 220px;">
	                <li><a tabindex="-1" href="revises.php">編輯個人資料</a></li>
	                <li><a tabindex="-1" href="modifiedPwd.php">修改密碼</a></li>
					<?php
						if( $_SESSION['auth'] == 2 ) {
					?>
					<li class="divider"></li>
					<li class="dropdown-submenu">
						<a tabindex="-1" href="managerInterface.php">Airstage Center</a>
						<ul class="dropdown-menu">
							<li><a tabindex="-1" href="managerQuery.php">God Member Query</a></li>
							<li><a tabindex="-1" href="managerRealTime.php">Real-Time Information</a></li>
							<li><a tabindex="-1" href="#">Statistic Information</a></li>
							<li><a tabindex="-1" href="#">Notification Sender</a></li>
							<li><a tabindex="-1" href="#">E-Paper</a></li>
						</ul>
					</li>
					<?php
						}
					?>
	              </ul>
	         </div>
        </td>
	</tr>
	
	<tr>
		<td>
			<br />
			<div class="alert alert-info fade in">
				<button type="button" class = "close" data-dismiss="alert">&times;</button>
				<strong>目前連線 IP 位置 : <br /><?php echo $_SERVER['REMOTE_ADDR'];?></strong>
  			</div>				
		</td>
	</tr>
</table>