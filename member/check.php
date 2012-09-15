<?php
	// Last Modified Day : 2012.09.15
	require_once( "../connectVar.php" );
	
	//直連check.php是沒用的
	if( !isset($_GET['user']) && !isset($_GET['token']) ) {
		echo '<script type="text/javascript">alert("請先登入唷～"); location.href="../index.php"</script>';
	}
	
	$username = $_GET['user'];
	$token = $_GET['token'];
	
	$sqlevent = mysqli_query($conn,"SELECT * FROM `member` WHERE `username` = '{$username}'");
	$getresult = mysqli_fetch_array($sqlevent);
		
	$stu_id = $getresult['stu_id'];
	$AUTH = $getresult['AUTH'];
	
	//確認帳號是否需要認證
	if( $AUTH > 0)
	{
		echo '<script type="text/javascript">alert("動作失敗！您已經認證過囉！"); location.href="../index.php"</script>';
	} 
	else
	{
		if( sha1($stu_id) === substr($token, 0, 40) ){
			$update_AUTH = "UPDATE `airstage`.`member` SET `AUTH` = '1' WHERE `member`.`username` = '{$username}'";
			if(mysqli_query($conn, $update_AUTH)){
				echo '<script type="text/javascript">alert("認證成功！\n\n請重新登入"); location.href="../index.php"</script>';
			}else{
				echo '<script type="text/javascript">alert("認證失敗！請再試一次！"); location.href="../index.php"</script>';
			}
		}
		else
		{
			echo '<script type="text/javascript">alert("認證連結有誤！請重新認證！"); location.href="../index.php"</script>';
		}
	}
?>