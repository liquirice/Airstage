<?php
	// Last Modified Day : 2012.09.13
	
	if( isset($_POST['submit']) ) {
		require_once( "../connectVar.php" );
		require_once( "PEAR/Mail-1.2.0/Mail.php" );
		
		$stu_id = mysqli_real_escape_string( $conn, trim($_POST['stu_id']) );
		$to = mysqli_real_escape_string( $conn, trim($_POST['email']) );
		
		$host = 'ssl://smtp.gmail.com';
		$port = '465';
		$user = 'airstagestudio@gmail.com';
		$pswd = '86088608';
		$from = 'Studio Airstage<airstagestudio@gmail.com>';
		$subject = 'Airstage Studio - 密碼修改通知信';
		
		$query = "SELECT name FROM Member WHERE stu_id = '$stu_id' AND email = '$to'";
		$result = mysqli_query( $conn, $query );
		
		if( mysqli_num_rows($result) == 0 ) {
			echo '<script type="text/javascript">alert("資料錯誤唷，再試一次吧"); location.href="forgetPassword.php"</script>';
		} else {
			$row = mysqli_fetch_array( $result );
			$randToken = rand();
			$update = "UPDATE Member SET psw = '$randToken' WHERE stu_id = '$stu_id'";
			
			// Email handling.
			$content = "親愛的" . $row['name'] . "你好：\n" .
					   "這是系統密碼修改通知信請勿回覆，您的密碼已經修改為下：\n\n" .
					   "$randToken\n\n" .
					   "請點以下網址重新登入後進入個人資料修改頁面進行密碼修改：\n" .
					   "http://www.airstage.com.tw/nsysu/airs/index.php\n" .
					   "\n若有任何有關平台的疑問，請洽平台負責人：&nbsp;郭宇軒&nbsp;|&nbsp;e-mail : shdowwings@gmail.com\n" .
					   "若有任何有關系統的疑問，請洽系統負責人：&nbsp;甘忠禾&nbsp;|&nbsp;e-mail : two_saki@hotmail.com\n" .
					   "\n國立中山大學&nbsp;|&nbsp;Airstage&nbsp;Studio&nbsp;|&nbsp;西灣人"; 

			
			echo '<script type="text/javascript">alert("1");</script>';	
			$headers = array('From'=>$from, 'To'=>$to, 'Subject'=>$subject, 'MIME-Version'=>'1.0', 'Content-Type'=>'text/html; charset=utf-8', 'Content-Transfer-Encoding'=>'8bit');
						echo '<script type="text/javascript">alert("2");</script>';
			$smtp = Mail::factory( 'smtp', array('host'=>$host, 'port'=>$port, 'auth'=>true, 'username'=>$user, 'password'=>$pswd) );
						echo '<script type="text/javascript">alert("3");</script>';
			$mail = $smtp -> send( $to, $headers, $content ); 
						echo '<script type="text/javascript">alert("4");</script>';
			
			if( PEAR::isError($mail) ) {
				echo '<script type="text/javascript">alert("Email 發送失敗！請稍後再試一次"); location.href="forgetPassword.php"</script>';
			} else {
				echo '<script type="text/javascript">alert("密碼修改信已經寄出，請至信箱收信喔"); location.href="login.php"</script>';	
			}
			
			
			mysqli_close( $conn );
		}
	}
?>

<br />
<div style="height:350; width:330; background-color:#FFFFFF">
	<table align="center" bgcolor="#FFFFFF" width="300" height="250">
		<tr>
	    	<td align="center" valign="bottom" height="80">
	        	<b style="font-size:18px;">忘記密碼</b>
	        </td>
	    </tr>
	    <br />
	    <tr>
	    	<td align="center" style="font-size:16px; font-weight:bold" valign="top">
	        	<form name="psw" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	        		學號&nbsp;&nbsp;<input type="text" name="stu_id" size = "25"/><br /><br />
	            	Email&nbsp;&nbsp;<input type="text" name="email" size = "25"/><br />
	            	<input type = "submit" value = "提交" name = "submit" />
	        	</form>
	        </td>
	    </tr>
	</table>
</div>
<br />
