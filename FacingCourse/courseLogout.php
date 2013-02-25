<?php 
	// Last Modified Day : 2012.09.13
	session_start();
	
	$current = "http://" . $_SERVER['HTTP_HOST'];
	$direct = "http://www.airstage.com.tw";
	
	
	if( $current == $direct ) {
		// First in www condition.	
		if( isset($_SESSION['stu_id']) || isset($_SESSION['name']) || isset($_SESSION['auth']) || isset($_SESSION['nick']) ) {
			// Clean the sessions.
			$_SESSION = array();
			
			if( isset($_COOKIE[session_name()]) ) {
				setcookie( session_name(), '', time()-864001 );
			}
			
			// Be sure to clean.
			unset( $_SESSION['stu_id'] );
			unset( $_SESSION['name'] );
			unset( $_SESSION['auth'] );
			unset( $_SESSION['nick'] );
			session_destroy();
		}
		
		// Clean the cookies.
		setcookie( 'stu_id', '', time()-864001 );
		setcookie( 'name', '', time()-864001 );
		setcookie( 'auth', '', time()-864001 );
		setcookie( 'nick', '', time()-864001 );
		echo '<script type="text/javascript">location.href="index.php";</script>';
	} else {
		// First without www condition.
		if( isset($_SESSION['stu_id']) || isset($_SESSION['name']) || isset($_SESSION['auth']) || isset($_SESSION['nick']) ) {
			// Clean the sessions.
			$_SESSION = array();
			
			if( isset($_COOKIE[session_name()]) ) {
				setcookie( session_name(), '', time()-864001 );
			}
			
			// Be sure to clean.
			unset( $_SESSION['stu_id'] );
			unset( $_SESSION['name'] );
			unset( $_SESSION['auth'] );
			unset( $_SESSION['nick'] );
			session_destroy();
		}
		
		// Clean the cookies.
		setcookie( 'stu_id', '', time()-864001 );
		setcookie( 'name', '', time()-864001 );
		setcookie( 'auth', '', time()-864001 );
		setcookie( 'nick', '', time()-864001 );
		echo '<script type="text/javascript">location.href="index.php";</script>';
	}
?>