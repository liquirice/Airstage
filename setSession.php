<?php
	// Last Modified Day : 2012.09.10
	// If the session doesn't exist, check cookies to get user info.
	
	session_start();
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) ){
		if ( isset($_COOKIE['name']) && isset($_COOKIE['stu_id']) ) {
	    	$_SESSION['stu_id'] = $_COOKIE['stu_id'];
	    	$_SESSION['name'] = $_COOKIE['name'];
	    }
	}
?>