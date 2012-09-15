<?php
	// Last Modified Day : 2012.09.12
 	// Check whether the member is login or not.
	if( !isset($_SESSION['name']) || !isset($_SESSION['stu_id']) || !isset($_SESSION['auth']) ){
	echo '<a LANGUAGE="VBScript" TARGET="screen" onClick="screen.location.href =\'main.htm\'" href="member/login.php" style="border:0 none; text-decoration:none; font-weight:700" id="login" rel="shadowbox; width=330; height=350" title=\'會員登入\'>
		<font color="#000000" size="2">會員登入</font></a>';
	} else {
		echo '<a href="accounts/revises.php" style="border:0; color:#000000; font-size:14px"><b>'.$_SESSION['name'].
		'</b></a>&nbsp;&nbsp;|&nbsp;
		<a href="member/logout.php" style="border:0; color:#000000; font-size:14px"><b>登出</b></a>';
	}
?>