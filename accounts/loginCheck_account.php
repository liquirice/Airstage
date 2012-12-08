<?php
	// Last Modified Day : 2012.09.14
	// Check whether the member is login or not.
	if( !isset($_SESSION['name']) || !isset($_SESSION['stu_id']) || !isset($_SESSION['auth']) ){
		echo '<script type="text/javascript">alert("請先登入唷～"); location.href="../index.php"</script>';
	} else {
		echo '<a href="revises.php" style="border:0; color:#000000; font-size:14px"><b>'.$_SESSION['name'].
		'</b></a>&nbsp;&nbsp;|&nbsp;
		<a href="../member/logout.php" style="border:0; color:#000000; font-size:14px"><b>登出</b></a>';
	}
?>