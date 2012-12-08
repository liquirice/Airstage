<?php 
	// Last Modified Day : 2012.09.13
	session_start();

	if( isset($_SESSION['stu_id']) || isset($_SESSION['name']) || isset($_SESSION['auth']) || isset($_SESSION['nick']) ) {
		// Clean the sessions.
		$_SESSION = array();
		
		if( isset($_COOKIE[session_name()]) ) {
			setcookie( session_name(), '', time()-3600 );
		}
		session_destroy();
	}
	
	// Clean the cookies.
	setcookie( 'stu_id', '', time()-3600 );
	setcookie( 'name', '', time()-3600 );
	setcookie( 'auth', '', time()-3600 );
	setcookie( 'nick', '', time()-3600 );
	
	echo '<script type="text/javascript">alert("Logout Success!"); location.href = document.referrer;</script>';
?>