<?php
session_start();
require("../global/connectVar.php");
$aboutauthor = $_POST["about"];
if(mysqli_query($conn, "UPDATE Member SET aboutauthor='$aboutauthor' WHERE stu_id = '".$_SESSION["stu_id"]."'")){
    echo "儲存成功!";
}
else {
	echo "儲存失敗!";
}
?>