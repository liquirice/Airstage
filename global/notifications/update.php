<?php
session_start();
require("../connectVar.php");
$read = $_POST["readed"];
if($read != ""){
$allmember = mysqli_query($conn, "SELECT * FROM Member");
$rows = mysqli_num_rows($allmember);
$select = "SELECT * FROM Member WHERE stu_id = '".$_SESSION["stu_id"]."' LIMIT 1";
$exploderead = explode(",", "$read");
$i=0;

while($exploderead[$i] != ""){
    $i++;
}
$get = "SELECT * FROM notifications";
$getnote = mysqli_query($conn, $get);

while($gotnote = mysqli_fetch_array($getnote)){
    $j=0;
    while($j<$i){
        if($gotnote["rno"] == $exploderead[$j]){
            $readednote = $gotnote["readed"]+1;
            $percentage = ($gotnote["readed"]+1)/$rows;
            mysqli_query($conn, "UPDATE notifications SET readed='$readednote', rate='$percentage%' WHERE rno='".$gotnote["rno"]."'");
            echo "UPDATE notifications SET readed='$readednote', rate='$percentage%'";
        }$j++;
    }
}

$selected = mysqli_fetch_array(mysqli_query($conn, $select));
if($selected["readed"] != "")
    $readed = $read.",".$selected["readed"];
else 
    $readed = $read;
$update = "UPDATE Member SET notify = '', readed = '$readed' WHERE stu_id = '".$_SESSION["stu_id"]."'";
mysqli_query($conn, $update);
exit;
}
?>