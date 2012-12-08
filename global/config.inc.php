<?php
global $htmlRoot;
global $module;
global $mysql;
global $conn;

$htmlRoot = "/var/www/html/nsysu/airs";
$module = $htmlRoot."/model";
$mysql = $module."/connectVar.php";

require($mysql);

function xss_sqlClean($str){
	if(!get_magic_quotes_gpc()){
		$str = addslashes($str);
	}
	$str = strip_tags(htmlspecialchars($str));
	return $str;
}



?>
