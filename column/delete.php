<?php
session_start();
include('../global/connectVar.php');
$rno = $_POST["rno"];
$getresult = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM Col WHERE rno = $rno LIMIT 1"));
if($getresult["front_pic"] != ""){
    if(mysqli_query($conn, "DELETE FROM Col WHERE rno = $rno" && unlink("../member/images/".$_SESSION[stu_id]."/column/".$getresult["front_pic"].""))){
	   echo "刪除成功!";
    }
    else
	   echo "刪除失敗";
    exit();
}
else{
    if(mysqli_query($conn, "DELETE FROM Col WHERE rno = $rno" )){
       echo "刪除成功!";
    }
    else
       echo "刪除失敗";
    exit();
}
?>