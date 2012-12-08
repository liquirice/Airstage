<?php
require_once("../connectVar.php");
require("../zhstring.php");
$getnotify = "SELECT * FROM Member WHERE stu_id = ".$_SESSION["stu_id"]." LIMIT 1";
$connectsql = mysqli_fetch_array(mysqli_query($conn, $getnotify));

$gotnotify = "SELECT * FROM notifications";
$resultsql = mysqli_query($conn, $gotnotify);

$thenotify = explode(",", "".$connectsql["notify"]."");
$i=0;
while($thenotify[$i] != ""){
    while($note = mysqli_fetch_array($resultsql)){
        if($note["rno"] == $thenotify[$i]){
            if($note["source"] == "學生會"){
                $notetime = $note["posttime"];
                $realnotetime = date("m月d日 H:i",strtotime($notetime));
                $noteblock = $noteblock.'<table align="center" style="cursor:pointer; font:微軟正黑體" class="top" width="330px" cellpadding="0px" cellspacing="0px"><tr height="45px"><td width="5px" rowspan="2"></td><td rowspan="2" width="40px"><img src="images/school.png" width="30px" height="29px" /></td><td style="font-size:12px; font-weight:bold" align="left">'.$note['source'].'</td><td style="color:#0099cc; font-size:12px;" align="right">'.$realnotetime.'</td><td width="20px"></td></tr><tr><td colspan="2" style="color:#666666; font-size:12px;" valign="top" align="left">'.$note["content"].'</td></tr></table>';
            }
        }
        else {
            continue;
        }
    }
    $i++;
}
echo '<span style="background-image:url(http://'.$_SERVER ['HTTP_HOST'].'/activities/images/redbox.png); color:#FFFFFF; font-size:12px">'.$connectsql["notify"].'<div>'.$noteblock.'</div></span>';
?>