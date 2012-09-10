<?php

//連接資料庫的參數
$host = "localhost";		//資料庫的主機位置：基本上都是localhost
$user = "airstage";			//MySQL登入帳號
$pass = "airstage0401";	//MySQL登入密碼
$db = "airstage";				//要執行的資料庫

//開始連接資料庫
$conn = mysql_connect($host,$user,$pass);	//要求連接資料庫
if(!$conn){	//判斷是否已連上：上面的指令是不是有回傳值
	die('Could not connect: ' . mysql_error());	//若沒有連上資料庫，die指令停止接下來一切的程式執行並印出MySQL回傳回來的error(mysqli_error)
}
else{
	//echo "connection successful";
}
mysql_select_db($db, $conn);

/*
mysqli_query($conn, "set names utf8");	//設定MySQL資料回傳的編碼：沒有設定的話，資料可能會出現亂碼
//SQL injection與Cross-site Scripting(XSS)過濾函式
function clean($str) {
	if(!get_magic_quotes_gpc()) {
		$str = addslashes($str);
	}
	$str = strip_tags(htmlspecialchars($str));
	return $str;
	
}*/
?>