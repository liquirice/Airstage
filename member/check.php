<?php
	// Last Modified Day : 2012.09.15
	require_once( "../connectVar.php" );
	
	//���scheck.php�O�S�Ϊ�
	if( !isset($_GET['user']) && !isset($_GET['token']) ) {
		echo '<script type="text/javascript">alert("�Х��n�J���"); location.href="../index.php"</script>';
	}
	
	$username = $_GET['user'];
	$token = $_GET['token'];
	
	$sqlevent = mysqli_query($conn,"SELECT * FROM `member` WHERE `username` = '{$username}'");
	$getresult = mysqli_fetch_array($sqlevent);
		
	$stu_id = $getresult['stu_id'];
	$AUTH = $getresult['AUTH'];
	
	//�T�{�b���O�_�ݭn�{��
	if( $AUTH > 0)
	{
		echo '<script type="text/javascript">alert("�ʧ@���ѡI�z�w�g�{�ҹL�o�I"); location.href="../index.php"</script>';
	} 
	else
	{
		if( sha1($stu_id) === substr($token, 0, 40) ){
			$update_AUTH = "UPDATE `airstage`.`member` SET `AUTH` = '1' WHERE `member`.`username` = '{$username}'";
			if(mysqli_query($conn, $update_AUTH)){
				echo '<script type="text/javascript">alert("�{�Ҧ��\�I\n\n�Э��s�n�J"); location.href="../index.php"</script>';
			}else{
				echo '<script type="text/javascript">alert("�{�ҥ��ѡI�ЦA�դ@���I"); location.href="../index.php"</script>';
			}
		}
		else
		{
			echo '<script type="text/javascript">alert("�{�ҳs�����~�I�Э��s�{�ҡI"); location.href="../index.php"</script>';
		}
	}
?>