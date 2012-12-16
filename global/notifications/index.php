<?php
session_start();
require("../validSession.php");
require("../connectVar.php");
require("../zhstring.php");
$select = "SELECT * FROM notifications ORDER BY rno DESC";

$totalnotify = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM Member WHERE stu_id='".$_SESSION["stu_id"]."'"));
    if($totalnotify["AUTH"] != 2){
        echo "<script type='text/javascript' language='javascript'>alert('您無權訪問此頁!'); window.location.href='../../index.php'</script>";
    }
    $numnotify = explode(",", "".$totalnotify["notify"]."");
    $count = 0;
    while($numnotify[$count] != ""){
        $count++;
    }

$result = mysqli_query($conn, $select);
while($sel = mysqli_fetch_array($result)){
    $time = $sel["posttime"];
    $realtime = date("m月d日 H:i",strtotime($time));    
    if($sel["source"] == "學生會"){
        $table = $table.'<table align="center" style="cursor:pointer; font:微軟正黑體" class="first" width="330px" cellpadding="0px" cellspacing="0px"><tr height="45px"><td width="5px" rowspan="2"></td><td rowspan="2" width="40px"><img src="images/sa.png" width="30px" height="29px" /></td><td style="font-size:12px; font-weight:bold" align="left">'.$sel['source'].'</td><td style="color:#0099cc; font-size:12px;" align="right">'.$realtime.'</td><td width="20px"></td></tr><tr><td colspan="2" style="color:#666666; font-size:12px;" valign="top" align="left">'.CuttingStr($sel["content"],30).'...</td></tr></table>';
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
$table = "<div id='first'>".$table."</div>";
?>
<!DOCTYPE HTML>
<html><head>
<link href="http://<?php echo $_SERVER ['HTTP_HOST'] ?>/global/images/tm2.ico" rel="shortcut icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php if($count!=0) echo "(".$count.")" ?> 發佈信息 ─ Airstage 西灣人</title>
<link rel="stylesheet" type="text/css" href="../css/validate.css" />
<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script language="javascript" type="text/javascript" src="../../plugin/validate/jquery.validate.js"></script>
<script language="javascript" type="text/javascript">
    var app = "none";
    $(document).ready(function(){
        $(".first").each(function(){
            $(this).hover(function() {
                $(this).css("background-color", "#f6f6f6")
            }, function() {
                $(this).css("background-color", "#FFFFFF")
            });
        });
        $("#preview").hover(function() {
            $(this).css("overflow-y", "scroll");
        }, function() {
            $(this).css("overflow-y", "hidden");
        });
        $("#post").click(function(){
            var source = $("#source").val();
            var object = $("#object").val();
            var content = $("#content").val();
            if(source == "null" || object == "null" || content == ""){
                return false;
            }
            else{
            $.ajax({
                url:"post.php",
                type:"POST",
                data:{source: source, object: object, content: content},
                success:function(data){
                    alert(data["message"]);
                    $("#preview").append(''+data["table"]+'');
                    $("#first").slideUp(800,function(){
                    $("#show").slideDown(5000); 
                    $("#first").remove();
                });
            },
            error:function(xhr, ajaxOptions, thrownError){
                alert(xhr.status+xhr.responseText+thrownError);
            },
            dataType :"json"});
            }
        });
        $('#form').validate({
        success: 'valid',
        rules:{
            source:{valid:true},
            object:{valid:true},
            content:{required:true},
        },
        errorPlacement: function(error, element) { //指定错误信息位置 
            error.insertAfter(element);
        },
    });
});
$.validator.addMethod("valid", function(type, element) {
        return (this.optional(element) || type != 'null')
    }, "請選擇!");
</script>
</head>
<body style="background-image: url(../images/bot.png); background-repeat: repeat-x;">
<?php require("../navi_white/navi.php"); ?>
<table align="center" width="980px" cellpadding="0px" cellspacing="0px">
    <tr>
        <td style="background-image: url(../images/bot.png)">
<div>
<form id="form">\
<table align="center" style="font-size: 14px; font-weight: bold">
    <tr>
        <td height="50px" colspan="2"></td>
    </tr>
    <tr>
        <td rowspan="5" align="left" width="342px" style="background-image: url(images/mback_center.jpeg); background-repeat: no-repeat" valign="top"><div style="height: 32px"></div><div id="preview" style="width:340px; height:265px; overflow-x: hidden; overflow-y: hidden; font-weight: normal"><?php echo $table; ?></div></td>
        <td rowspan="5" width="100px" align="center"><img src="images/line.jpeg" /></td>
        <td>發佈來源</td>
        <td>
            <select id="source" name="source">
                <option value="null">****請選擇****</option>
                <option value="宿網委員會">宿網委員會 CPDA</option>
                <option value="宿服委員會">宿服委員會 DORM</option>
                <option value="學生會">學生會 SA</option>
                <option value="系統公告">系統公告 SYSTEM</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>發佈對象</td>
        <td>
            <select id="object" name="object">
                <option value="null">****請選擇****</option>
                <option value="全校學生">全校學生</option>
            </select>
        </td>
    </tr>
    <tr>
        <td valign="bottom" height="30px">通知內容</td>
    </tr>
    <tr>
        <td colspan="2"><textarea cols="40" rows="10" name="content" id="content" style="resize: none"></textarea></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="button" id="post" name="post" value="發佈!" /></td>
    </tr>
</table>
</div>
</td></tr>
    <tr>
        <td style="background-image: url(../images/last.png)">
            <?php require("../footer.php") ?>
        </td>
    </tr>
</table>
</form>
</body>
</html>