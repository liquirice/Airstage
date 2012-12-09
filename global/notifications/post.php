<?php 
session_start();
require("../connectVar.php");
require("../zhstring.php");
$source = $_POST["source"];
$object = $_POST["object"];
$content = $_POST["content"];
$table='';
$post = "INSERT INTO notifications(source, object, content, stu_id) VALUES('$source', '$object', '$content', '".$_SESSION['stu_id']."')";
if(mysqli_query($conn, $post)){
    $new = "SELECT * FROM notifications ORDER BY rno DESC LIMIT 1";
    $getnew = mysqli_fetch_array(mysqli_query($conn, $new));
    $newrno = $getnew["rno"];
    if($object == "全校學生"){
        $notify = "SELECT * FROM Member";
        $getnotify = mysqli_query($conn, $notify);
        while($resultnotify = mysqli_fetch_array($getnotify)){
            if($resultnotify["notify"] != ""){
                $addnotify = $newrno.",".$resultnotify["notify"];
            }
            else {
                $addnotify = $newrno;
            }
            $add = "UPDATE Member SET notify = '$addnotify' WHERE rno = ".$resultnotify['rno']."";
            if(mysqli_query($conn, $add)){
                continue;
            }
            else{
                $arr = array("message" => "發佈失敗!".$add."", "table" => "");
                echo json_encode($arr);
                exit;
            }
        }
    }
    $select = "SELECT * FROM notifications ORDER BY rno DESC";
    $result = mysqli_query($conn, $select);
    while($sel = mysqli_fetch_array($result)){
        $time = $sel["posttime"];
        $realtime = date("m月d日 H:i", strtotime($time));
        if($sel["source"] == "學生會"){
            $table = $table.'<table align="center" style="cursor:pointer; font:微軟正黑體" class="first" width="330px" cellpadding="0px" cellspacing="0px"><tr height="45px"><td width="5px" rowspan="2"></td><td rowspan="2" width="40px"><img src="images/sa.png" width="30px" height="29px" /></td><td style="font-size:12px; font-weight:bold" align="left">'.$sel['source'].'</td><td style="color:#0099cc; font-size:12px;" align="right">'.$realtime.'</td><td width="20px"></td></tr><tr><td colspan="2" style="color:#666666; font-size:12px;" valign="top" align="left">'.CuttingStr($sel["content"],30).'</td></tr></table>';
        }
        else if($sel["source"] == "系統公告"){
            $table = $table.'<table align="center" style="cursor:pointer; font:微軟正黑體" class="first" width="330px" cellpadding="0px" cellspacing="0px"><tr height="45px"><td width="5px" rowspan="2"></td><td rowspan="2" width="40px"><img src="images/system.png" width="30px" height="29px" /></td><td style="font-size:12px; font-weight:bold" align="left">'.$sel['source'].'</td><td style="color:#0099cc; font-size:12px;" align="right">'.$realtime.'</td><td width="20px"></td></tr><tr><td colspan="2" style="color:#666666; font-size:12px;" valign="top" align="left">'.CuttingStr($sel["content"],30).'...</td></tr></table>';
        }
        else if($sel["source"] == "宿服委員會"){
            $table = $table.'<table align="center" style="cursor:pointer; font:微軟正黑體" class="first" width="330px" cellpadding="0px" cellspacing="0px"><tr height="45px"><td width="5px" rowspan="2"></td><td rowspan="2" width="40px"><img src="images/dorm.png" width="30px" height="29px" /></td><td style="font-size:12px; font-weight:bold" align="left">'.$sel['source'].'</td><td style="color:#0099cc; font-size:12px;" align="right">'.$realtime.'</td><td width="20px"></td></tr><tr><td colspan="2" style="color:#666666; font-size:12px;" valign="top" align="left">'.CuttingStr($sel["content"],30).'...</td></tr></table>';
        }
        else if($sel["source"] == "宿網委員會"){
            $table = $table.'<table align="center" style="cursor:pointer; font:微軟正黑體" class="first" width="330px" cellpadding="0px" cellspacing="0px"><tr height="45px"><td width="5px" rowspan="2"></td><td rowspan="2" width="40px"><img src="images/cdpa.png" width="30px" height="29px" /></td><td style="font-size:12px; font-weight:bold" align="left">'.$sel['source'].'</td><td style="color:#0099cc; font-size:12px;" align="right">'.$realtime.'</td><td width="20px"></td></tr><tr><td colspan="2" style="color:#666666; font-size:12px;" valign="top" align="left">'.CuttingStr($sel["content"],30).'...</td></tr></table>';
        }      
    }
    $table = "<div id='show'>".$table."</div>";
    $arr = array("message" => "發佈成功!", "table" => $table);
    echo json_encode($arr);
}
else {
    $arr = array("message" => "發佈失敗");
    echo json_encode($arr);
}
?>