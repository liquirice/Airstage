#!/usr/bin/php -q
<?php
// Last Modified Day : 2012.09.06
//連接資料庫的參數
$host = "localhost"; //資料庫的主機位置：基本上都是localhost
$user = "Airstage";  //MySQL登入帳號
$pass = "airstage0401pma";  //MySQL登入密碼
$db = "Airstage";   //要執行的資料庫

//開始連接資料庫
$conn = @mysqli_connect($host,$user,$pass,$db); //要求連接資料庫
if(!$conn){ //判斷是否已連上：上面的指令是不是有回傳值
	echo mysqli_connect_error();
	exit();
}
mysqli_query($conn, "set names utf8"); //設定MySQL資料回傳的編碼：沒有設定的話，資料可能會出現亂碼

$updatemonth="UPDATE `Col` SET monthview=0";
if(mysqli_query($conn, $updatemonth))
	echo "update successful!";
else{
	echo "update failure";
	die;
}

?>
