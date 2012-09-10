<?php 
	// Last Modified Day : 2012.09.06
	header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
	session_start();
	include('../conn.php');
	$id = clean($_POST['id']);
	$pw = clean($_POST['pw']); // TODO : Add sha1()

	// Search the user info from DB.
	$sql = "SELECT * FROM Member WHERE username = '$id' OR stu_id = '$id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$name = $row['name'];
	$stu_id = $row['stu_id'];

	// Check whether the account & pwd is empty or not.
	// Check whether the member is in DB or not as well.
	if(($id != NULL && $pw != NULL) && (($row['username'] == $id || $row['stu_id'] == $id) && $row['psw'] == $pw))
	{
        // Write user into session to authenticate.
        $_SESSION['stu_id'] = $stu_id;
		$_SESSION['name'] = $name;
		setcookie( 'stu_id', $stu_id, time()+(60*60*24) );
		setcookie( 'name', $name, time()+(60*60*24) );
		echo '<script language="javascript">alert("登入成功!"); self.opener.location.reload();</script>';
		exit();
	}
	else
	{
        echo '<script type="text/javascript" language="javascript">alert("登入失敗");location.href="./login.php"</script>';
	}
?>
