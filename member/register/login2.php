<?php 
	session_start();
	require_once( "../../global/connectVar.php" );
	
	$stu_id = mysqli_real_escape_string( $conn, trim($_GET['st']) );
	$name = mysqli_real_escape_string( $conn, trim($_GET['nm']) );
	$auth = mysqli_real_escape_string( $conn, trim($_GET['a']) );
	$nick = mysqli_real_escape_string( $conn, trim($_GET['u']) );
	
	$_SESSION['stu_id'] = $stu_id;
	$_SESSION['name'] = $name; 
	$_SESSION['auth'] = $auth;
	$_SESSION['nick'] = $nick;
	setcookie( 'stu_id', $stu_id, time()+(60*60*24*10) );
	setcookie( 'name', $name, time()+(60*60*24*10) );
	setcookie( 'auth', $auth, time()+(60*60*24*10) );
	setcookie( 'nick', $nick, time()+(60*60*24*10) );
	
	echo '<script type="text/javascript">location.href="../../index.php"</script>';
?>