<?php
session_start();
if(empty($_SESSION['name']) || empty($_SESSION['stu_id'])){
    echo '<script type="text/javascript" language="javascript">alert("請先登入!"); location.href="../member/register/login.php";</script>';
}
require("../global/connectVar.php");
$getCol = mysqli_query($conn, "SELECT * FROM Col WHERE stu_id = '".$_SESSION['stu_id']."' AND shelf='article'");
$getDra = mysqli_query($conn, "SELECT * FROM Col WHERE stu_id = '".$_SESSION['stu_id']."' AND shelf='draft'");
$getAbout = mysqli_query($conn, "SELECT * FROM Member WHERE stu_id = '".$_SESSION['stu_id']."' LIMIT 1");
$resultAbout = mysqli_fetch_array($getAbout);
$i=1;
$j=1;
$totalnotify = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM Member WHERE stu_id='".$_SESSION["stu_id"]."'"));
    $numnotify = explode(",", "".$totalnotify["notify"]."");
    $count = 0;
    while($numnotify[$count] != ""){
        $count++;
    }
?>
<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="http://<?php echo $_SERVER["HTTP_HOST"]; ?>/global/images/tm2.ico" rel="shortcut icon">

    <title><?php if($count!=0) echo "(".$count.")" ?> 我的書架 - Airstage</title>
    <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" language="javascript">
var app = "column";
    var coltype = "shelf";
    $(document).ready(function() {
        $("a").css({"text-decoration": "none", "cursor": "pointer"});
        $(".shelf td").each(function() {
            $(this).css({"border-right-color":"#CCCCCC","border-right-style":"solid", "border-right-width": "1px", "border-top-width": "1px", "border-bottom-width": "1px"});
        });
        $("a").hover(function(){
            $(this).css("text-decoration", "underline");
        });
        $("#saveabout").hover(function() {
            $(this).css("background-image", "url(images/b_save02.png)");
        }, function() {
            $(this).css("background-image", "url(images/b_save01.png)");
        });
        $("#saveabout").click(function() {
            var aboutauthor = $("#aboutauthor").val()
            $.ajax({
                url:"saveabout.php",
                type:"POST",
                data:{about:aboutauthor}
            }).done(function(message){
                alert(message);
            })
        });
    });
    </script>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
    <?php include("../global/navi_white/navi.php") ?>

    <table align="center" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td style="background-image:url(../global/images/bot.png)" valign="top">
                <table align="center" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td colspan="2" align="center" valign="top"><iframe name="I1" src="main2.htm" scrolling="no" border="0" frameborder="0" marginwidth="1" marginheight="1" width="959px" height="141px"></iframe></td>
                    </tr><?php require("coltype.php") ?>
                    <tr>
	                    <td height="30px"></td>
	                </tr>
                    <tr>
                        <td colspan="2">
                            <table align="center" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="background-image:url(images/shelf201.jpg)" width="879px" height="55px" colspan="2"></td>
                                </tr>

                                <tr>
                                    <td style="background-image:url(images/shelf202.jpg)" width="879px" align="center" colspan="2">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="764px" class="shelf">
                                            <tr style="background-image:url(images/shelf.jpg); font:微軟正黑體; font-size:12px; font-weight:bold;" align="center">
                                                <td width="38px" height="31px">編號</td>

                                                <td width="380px">文章標題</td>

                                                <td width="77px">分類</td>

                                                <td width="148px">撰寫時間</td>

                                                <td width="81px">多少人看過</td>

                                                <td width="40px">編輯</td>
                                            </tr><?php
                                                            while($resultCol = mysqli_fetch_array($getCol)){
                                                                if($i%2 == 0)
                                                                    $color = "#FFFFFF";
                                                                else
                                                                    $color = "#F1F4F9";
                                                                if($resultCol["class"] == "column")
	                                                                $class = "專欄文章";
	                                                            else if($resultCol["class"] == "food")
	                                                                $class = "食尚指南";
	                                                            else if($resultCol["class"] == "school")
	                                                                $class = "校園話題";
	                                                            else if($resultCol["class"] == "concerts")
	                                                                $class = "藝文創作";
                                                                echo "
                                                                <tr align='center' bgcolor='".$color."' style='font-size:12px; cursor:pointer' onclick=\"window.location.href='read.php?rno=".$resultCol["rno"]."'\">
                                                                    <td height='28px'>".$resultCol["rno"]."</td>
                                                                    <td>".$resultCol["title"]."</td>
                                                                    <td>".$class."</td>
                                                                    <td>".$resultCol["uploadtime"]."</td>
                                                                    <td>".$resultCol["view"]."</td>
                                                                    <td><a href='edit.php?rno=".$resultCol["rno"]."' style='color:#000000'>編輯</a></td>
                                                                </tr>";
                                                                $i++;
                                                            }
                                                            ?>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="background-image:url(images/shelf203.jpg)" width="879px" height="14px" colspan="2"></td>
                                </tr><!---斷點=-->

                                <tr>
                                    <td height="30px" colspan="2"></td>
                                </tr><!---斷點=-->

                                <tr>
                                    <td style="background-image:url(images/shelf301.jpg)" width="879px" height="55px" colspan="2"></td>
                                </tr>

                                <tr>
                                    <td style="background-image:url(images/shelf202.jpg)" width="879px" align="center" colspan="2">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="764px" class="shelf">
                                            <tr style="background-image:url(images/shelf.jpg); font:微軟正黑體; font-size:12px; font-weight:bold;" align="center">
                                                <td width="54.2px" height="31px">編號</td>

                                                <td width="396.2px">文章標題</td>

                                                <td width="93.2px">分類</td>

                                                <td width="164.2px">撰寫時間</td>

                                                <td width="56.2px">編輯</td>
                                            </tr><?php
                                                            while($resultDra = mysqli_fetch_array($getDra)){
                                                                if($j%2 == 0)
                                                                    $color = "#FFFFFF";
                                                                else
                                                                    $color = "#F1F4F9";
                                                                if($resultDra["class"] == "column")
	                                                                $class = "專欄文章";
	                                                            else if($resultDra["class"] == "food")
	                                                                $class = "食尚指南";
	                                                            else if($resultDra["class"] == "school")
	                                                                $class = "校園話題";
	                                                            else if($resultDra["class"] == "concerts")
	                                                                $class = "藝文創作";
                                                                echo "
                                                                <tr bgcolor='".$color."' style='font-size:12px;' align='center'>
                                                                    <td height='28px'>".$resultDra["rno"]."</td>
                                                                    <td>".$resultDra["title"]."</td>
                                                                    <td>".$class."</td>
                                                                    <td>".$resultDra["uploadtime"]."</td>
                                                                    <td><a href='edit.php?rno=".$resultDra["rno"]."' style='color:#000000'>編輯</a></td>
                                                                </tr>";
                                                            }
                                                            ?>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="background-image:url(images/shelf203.jpg)" width="879px" height="14px" colspan="2"></td>
                                </tr><!--斷點-->
                                <tr>
                                    <td height="30px"></td>
                                </tr><!---斷點=-->
                                <tr>
                                    <td style="background:url(images/briefbox.png)" height="148px" align="center" colspan="2">
                                        <table>
                                            <tr>
                                                <td height="41px"></td>
                                            </tr>
                                            <tr>
                                                <td><textarea id="aboutauthor" onkeyup="this.value = this.value.slice(0, 70)" style="resize: none; background-color: #f2f2f2; border: none; font-size:12px; font:微軟正黑體;" rows="4" cols="117"><?php echo $resultAbout["aboutauthor"]; ?></textarea></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" valign="bottom" height="70px"><input type="button" value="" id="saveabout" style="background-image: url(images/b_save01.png); width: 72px; height: 50px; border: none; cursor: pointer" /></td>
                                    <td width="5px"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
	                    <td height="30px"></td>
	                </tr>
                </table>
            </td>
        </tr>
        <tr style="background-image:url(../global/images/last.png)">
            <td><?php include("../global/footer.php"); ?></td>
        </tr>
    </table>
</body>
</html>
