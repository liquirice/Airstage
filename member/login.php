<?php 
	// Last Modified Day : 2012.09.06
	session_start(); 
?>

<div style="height:350; width:330; background-color:#FFFFFF;">
  <table align="center" background="img/bglogin.png" style="background-repeat:no-repeat" width="330" height="350">
	<tr>
		<td style="font-weight:bold; font-size:16px" align="center" valign="middle">
			<form name="form" method="post" action="connect.php" style="color: #000000; font-size: 14px;">
			  學號
			<input type="text" name="id" placeholder="請輸入帳號或學號" /> <br /><br />
			密碼&nbsp;
			<input type="password" name="pw" /> <br />
			
            <a href='forgot.php' style="color:#000; font-size:12px; cursor:pointer">忘記密碼?</a>&nbsp;&nbsp;
			<input type="submit" name="button" value="登入" />&nbsp;&nbsp;
            <input type="button" onclick="location.href='register.php'" name="register" value="註冊會員" />
			</form>
		</td>
	</tr>
</table>
</div>