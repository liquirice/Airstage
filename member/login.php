<?php 
	// Last Modified Day : 2012.09.10
	header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
	session_start(); 
	
	echo $_COOKIE['name'];
	echo $_SESSION['name'];
	
	if( isset($_POST['submit']) ) {
		require_once( "../connectVar.php" );
		$stu_id = mysqli_real_escape_string( $conn, trim($_POST['id']) );
		$pw = mysqli_real_escape_string( $conn, trim($_POST['pw']) );
		
		$query = "SELECT * FROM Member WHERE username = '$stu_id' OR stu_id = '$stu_id' AND psw = '$pw'";
		$result = mysqli_query( $conn, $query );
		
		if( mysqli_num_rows($result) == 0 ) {
			// NO such account.
			echo '<script type="text/javascript" language="javascript">alert("登入失敗");location.href="./login.php"</script>';
		} else {
			// Write user into session to authenticate.
			$row = mysqli_fetch_array( $result );
	        $_SESSION['stu_id'] = $row['stu_id'];
	        $_SESSION['name'] = $row['name']; 
			setcookie( 'stu_id', $row['stu_id'], time()+(60*60*24*5) );
			setcookie( 'name', $row['name'], time()+(60*60*24*5) );
			echo '<script language="javascript">alert("登入成功!"); self.opener.location.reload();</script>';
			exit();
		}
	}
?>

<div style="height:350; width:330; background-color:#FFFFFF;">
  <table align="center" background="img/bglogin.png" style="background-repeat:no-repeat" width="330" height="350">
	<tr>
		<td style="font-weight:bold; font-size:16px" align="center" valign="middle">
			<form name="login" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" style="color: #000000; font-size: 14px;">
				  學號
				<input type="text" name="id" placeholder="請輸入帳號或學號" /> <br /><br />
				密碼&nbsp;
				<input type="password" name="pw" /> <br />
				
	            <a href='forgot.php' style="color:#000; font-size:12px; cursor:pointer">忘記密碼?</a>&nbsp;&nbsp;
				<input type="submit" name="submit" value="登入" />&nbsp;&nbsp;
	            <input type="button" onclick="location.href='register.php'" name="register" value="註冊會員" />
			</form>
		</td>
	</tr>
</table>
</div>