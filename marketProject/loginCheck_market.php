<?php
	// Last Modified Day : 2012.10.02
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		// Not in the login statement.
		echo '<script type="text/javascript">alert("請先登入再下標唷"); location.href="marketIndex.php"</script>';
		/*' . $_SERVER["SCRIPT_FILENAME"] . '*/
	}
?>