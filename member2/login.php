<?php 
	// Last Modified Day : 2012.11.09
	// copy form member/login.php
	header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
	session_start(); 
	
	if( isset($_SESSION['stu_id']) || isset($_SESSION['name']) || isset($_SESSION['auth']) ) {
		echo '<script type="text/javascript">alert("你已經登入囉!"); location.href="../index.php"</script>';
	exit();
	}

	
	if( isset($_POST['submit']) ) {
		require_once( "../connectVar.php" );
		$stu_id = mysqli_real_escape_string( $conn, trim($_POST['id']) );
		$pw = sha1( mysqli_real_escape_string( $conn, trim($_POST['pw']) ) );
		
		$query = "SELECT * FROM Member WHERE (username = '$stu_id' OR stu_id = '$stu_id') AND psw = '$pw'";
		$result = mysqli_query( $conn, $query );
		
		if( mysqli_num_rows($result) == 0 ) {
			// NO such account.
			echo '<script type="text/javascript">alert("登入失敗");location.href="./login.php"</script>';
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
			echo '<div class="alert alert-success">Welcome Back</div>';
			echo 'Page.RegisterClientScriptBlock("<script> parent.location ="../index.php";parent.$.fancybox.close();</script>");';
			exit();
		}
		mysqli_close( $conn );
	}
?>