<form action="test121028.php" method="post">
	<textarea name="t"></textarea>
	<input name="" type="submit" />
</form>
<?php
	require_once("../connectVar.php");
	$t= mysqli_real_escape_string( $conn, str_replace( chr(13).chr(10), "<br>", $_POST['t'] ) );
	echo "<br>".$t;
	echo date('Y-m-d', strtotime('+30 DAY'));
?>