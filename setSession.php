<?php
	// Last Modified Day : 2012.09.15
	// If the session doesn't exist, check cookies to get user info.
	
	session_start();
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ){
		if ( isset($_COOKIE['name']) && isset($_COOKIE['stu_id']) && isset($_COOKIE['auth']) && isset($_COOKIE['nick']) ) {
	    	$_SESSION['stu_id'] = $_COOKIE['stu_id'];
	    	$_SESSION['name'] = $_COOKIE['name'];
			$_SESSION['auth'] = $_COOKIE['auth'];
			$_SESSION['nick'] = $_COOKIE['nick'];
	    }
	}
?>