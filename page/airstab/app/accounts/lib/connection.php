<?php

//�s����Ʈw���Ѽ�
$host = "localhost";		//��Ʈw���D����m�G�򥻤W���Olocalhost
$user = "airstage";			//MySQL�n�J�b��
$pass = "airstage0401";	//MySQL�n�J�K�X
$db = "airstage";				//�n���檺��Ʈw

//�}�l�s����Ʈw
$conn = mysql_connect($host,$user,$pass);	//�n�D�s����Ʈw
if(!$conn){	//�P�_�O�_�w�s�W�G�W�������O�O���O���^�ǭ�
	die('Could not connect: ' . mysql_error());	//�Y�S���s�W��Ʈw�Adie���O����U�Ӥ@�����{������æL�XMySQL�^�Ǧ^�Ӫ�error(mysqli_error)
}
else{
	//echo "connection successful";
}
mysql_select_db($db, $conn);

/*
mysqli_query($conn, "set names utf8");	//�]�wMySQL��Ʀ^�Ǫ��s�X�G�S���]�w���ܡA��ƥi��|�X�{�ýX
//SQL injection�PCross-site Scripting(XSS)�L�o�禡
function clean($str) {
	if(!get_magic_quotes_gpc()) {
		$str = addslashes($str);
	}
	$str = strip_tags(htmlspecialchars($str));
	return $str;
	
}*/
?>