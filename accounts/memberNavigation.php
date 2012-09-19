<table border="0" width="65%" height="135">
	<tr>
		<td>
		<!--blockquote>
			<a href="revises.php" style=" text-decoration:none;">
        	<p>
        	
        	<font size="2" color="#666666">編輯個人資料</font></a><br />
        	
			<a href = "modifiedPwd.php" style = "text-decoration:none;">
			<font size="2" color="#666666">修改密碼</font></a><br />
			
            <a href = "classSchedule.php" style="color: #666; text-decoration:none;" >
            <font color="#666666" size="2">我的課表</font></a><br />
            
            <a href = "#" style="color: #666; text-decoration:none;" > 
            <font color="#666666" size="2">Air 行事曆</font></a>   
            
            </p>        
        </blockquote-->
	        <div class="dropdown clearfix">
	              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display: block; position: static; margin-bottom: 5px; width: 220px;">
	                <li><a tabindex="-1" href="revises.php">編輯個人資料</a></li>
	                <li><a tabindex="-1" href="modifiedPwd.php">修改密碼</a></li>
	                <li class="divider"></li>
	                <li><a tabindex="-1" href="classSchedule.php" target="_self">我的課表</a></li>
	                <li><a tabindex="-1" href="#">Air 行事曆</a></li>	                	            
	              </ul>
	        </div>
        </td>
	</tr>
	
	<tr>
		<td>
			<!--font size="2">
			<blockquote>
			
                <a href = "#" style="color:#666;"></a><br />
				<a href = "#" style="color:#666;"></a><br />
				<a href = "#" style="color:#666;"></a><br />
				<a href = "#" style="color:#666;"></a><br /><br />
                目前連線 IP 位置 : <br />
				<?php echo $_SERVER['REMOTE_ADDR'];?>
			</blockquote>
        	</font-->
        	<br />
	        <ul class="nav nav-list">
			  <li class="nav-header">Where To Go</li>
			  <?php
				if( $_SESSION['auth'] == "2" )
					echo '<li class="active"><a href = "managerInterface.php" style="color:#FFF;">管理者介面</a></li>';
			  ?>
			  
			  <li><a href="#">報名系統</a></li>
			  <li><a href="#">影音聯播</a></li>
			  <li><a href="#">專　　欄</a></li>
			  <li><a href="#">24HR幫幫忙</a></li>
			  ...
			</ul>
			<br />
			<div class="alert alert-info">
				<button type="button" class = "close" data-dismiss="alert">&times;</button>
				<strong>目前連線 IP 位置 : <br /><?php echo $_SERVER['REMOTE_ADDR'];?></strong>
  			</div>				
		</td>
	</tr>
</table>