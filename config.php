<?php

$host="localhost"; // Host name 
$username="Airstage"; // Mysql username 
$password="airstage0401pma"; // Mysql password 
$db_name="test"; // Database name 


//Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect to server"); 
mysql_select_db("$db_name")or die("cannot select DB");

?>
