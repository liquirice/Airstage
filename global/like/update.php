<?php
session_start();
require("../connectVar.php");
$rno = $_POST["rno"];
$app = $_POST["app"];
$type = $_POST["type"];
if($type == "like"){
    if($app == "column"){
        $getcol = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM Col WHERE rno=$rno LIMIT 1")) ;
        $newlike = $getcol["like"]+1;
        $getmember =  mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM member_Info WHERE stu_id='".$_SESSION["stu_id"]."' LIMIT 1")) ;
        $memberliked=explode(",", $getmember['like']);
        $i=0;
        while($memberliked[$i] != ''){
            if(substr($memberliked[$i], 0,3)=="col"){
                $collike = explode("_",$memberliked[$i]);
                if($collike[1] == $rno){
                    echo "你已推過此文,請求無法完成!";
                    exit;
                }
            }
            $i++;
        }
        if($getmember["like"] != '')
            $memberlike = $getmember["like"].",col_".$rno;
        else {
            $memberlike = "col_".$rno;
        }
        if(mysqli_query($conn,"UPDATE Col SET `like`=$newlike WHERE rno=$rno") && mysqli_query($conn, "UPDATE member_Info SET `like` = '$memberlike' WHERE stu_id='".$_SESSION["stu_id"]."'")){
            echo $newlike;
        }
        else {
            echo $newlike.",".$rno.",".$memberlike.",".$_SESSION["stu_id"];
        }
    }
}

else if($type == "liked"){
    if($app == "column"){
        $getcol = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM Col WHERE rno=$rno LIMIT 1")) ;
        $newlike = $getcol["like"]-1;
        $getmember =  mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM member_Info WHERE stu_id='".$_SESSION["stu_id"]."' LIMIT 1")) ;
        $memberliked=explode(",", $getmember['like']);
        $i=0;
        while($memberliked[$i] != ''){
            if(substr($memberliked[$i], 0,3)=="col"){
                $collike = explode("_",$memberliked[$i]);
                if($collike[1] != $rno){
                    $memberlike = $memberlike.",".$memberliked[$i];
                }
                else
                    $memberlike = $memberlike;
            }
            $i++;
        }
        if($mmberlike == $getmember['like']){
            echo "你已取消推過此文,請求無法完成!";
            exit;
        }
        else{
            if(mysqli_query($conn,"UPDATE Col SET `like`=$newlike WHERE rno=$rno") && mysqli_query($conn, "UPDATE member_Info SET `like` = '$memberlike' WHERE stu_id='".$_SESSION["stu_id"]."'")){
                echo $newlike;
            }
        }
    }
}
?>