<?php
	session_start(); 
	
	if( isset($_POST['loginSubmit']) ) {
		require_once( "../connectVar.php" );
		$username = mysqli_real_escape_string( $conn, trim($_POST['username']) );
		$pw = sha1( mysqli_real_escape_string( $conn, trim($_POST['password']) ) );
		
		$query = "SELECT * FROM Member WHERE (username = '$username' OR stu_id = '$username') AND psw = '$pw'";
		$result = mysqli_query( $conn, $query );
		
		if( mysqli_num_rows($result) == 0 ) {
			// NO such account.
			echo '<script type="text/javascript">alert("資料錯誤！");location.href="marketIndex.php"</script>';
		} else {
			// Write user into session to authenticate.
			$row = mysqli_fetch_array( $result );
	        $_SESSION['stu_id'] = $row['stu_id'];
			$_SESSION['name'] = $row['name']; 
			$_SESSION['auth'] = $row['AUTH'];
			$_SESSION['nick'] = $row['username'];
			setcookie( 'stu_id', $row['stu_id'], time()+(60*60*24*10) );
			setcookie( 'name', $row['name'], time()+(60*60*24*10) );
			setcookie( 'auth', $row['AUTH'], time()+(60*60*24*10) );
			setcookie( 'nick', $row['username'], time()+(60*60*24*10) );
			echo '<script type="text/javascript">location.href = document.referrer</script>';
			exit();
		}
		mysqli_close( $conn );
	}
?>