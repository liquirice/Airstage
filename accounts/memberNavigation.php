<table border="0" width="65%" height="135">
	<tr>
		<td>
	    	<div class="dropdown clearfix">
	              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; width: 220px;">
	                <li><a tabindex="-1" href="revises.php">編輯個人資料</a></li>
	                <li><a tabindex="-1" href="modifiedPwd.php">修改密碼</a></li>
	                <li class="divider"></li>
	                <li><a tabindex="-1" href="classSchedule.php" target="_self">我的課表</a></li>
	                <li><a tabindex="-1" href="#">Air 行事曆</a></li>	  
	                <li class="divider"></li>              	            
	                <li class="dropdown-submenu">
				    	<a tabindex="-1" href="#">應用程式</a>
				    	<ul class="dropdown-menu">
				    	<?php
							if( $_SESSION['auth'] == "2" )
								echo '<li><a href = "managerInterface.php">管理者介面</a></li>';
						?>
					    	<li><a href="#">報名系統</a></li>
							<li><a href="#">影音聯播</a></li>
							<li><a href="#">專　　欄</a></li>
							<li><a href="#">24HR幫幫忙</a></li>
					    </ul>
					</li>
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