<?php
include("../../../../conn.php");
$rno = $_POST["rno"];

if(mysqli_query($conn, "DELETE FROM Col WHERE rno = $rno")){
	echo "刪除成功!";
}
else
	echo "刪除失敗";
exit();
?>