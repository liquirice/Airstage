<?php
session_start();
if(empty($_SESSION['name']) || empty($_SESSION['stu_id'])){
    echo '<script type="text/javascript" language="javascript">alert("請先登入!"); location.href="../../../../member/login.php";</script>';
}
require("../../../../conn.php");
$getCol = mysqli_query($conn, "SELECT * FROM Col WHERE stu_id = '".$_SESSION['stu_id']."' AND shelf='article'");
$getDra = mysqli_query($conn, "SELECT * FROM Col WHERE stu_id = '".$_SESSION['stu_id']."' AND shelf='draft'");
$i=1;
$j=1;
?>
<!DOCTYPE html>

<html>
<head>
    <link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon">

    <title>我的書架 - Airstage</title>
    <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" language="javascript">
var app = "column";
    var coltype = "shelf";
    $(function() {
        $("a").css({"text-decoration": "none", "cursor": "pointer"});
        $(".shelf td").each(function() {
            $(this).css({"border-right-color":"#CCCCCC","border-right-style":"solid", "border-right-width": "1px", "border-top-width": "1px", "border-bottom-width": "1px"});
        });
        $("a").hover(function(){
            $(this).css("text-decoration", "underline");
        });
    });
    </script>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" background="../../../../jpg/bgbank/basic.png">
    <?php include("../../../../model/navi.php") ?>

    <table align="center" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td style="background-image:url(../../../../jpg/bot.png)" valign="top">
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
                                    <td style="background-image:url(jpg/shelf201.jpg)" width="879px" height="55px"></td>
                                </tr>

                                <tr>
                                    <td style="background-image:url(jpg/shelf202.jpg)" width="879px" align="center">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="764px" class="shelf">
                                            <tr style="background-image:url(jpg/shelf.jpg); font:微軟正黑體; font-size:10px; font-weight:bold;" align="center">
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
                                                                <tr align='center' bgcolor='".$color."' style='font-size:15px; cursor:pointer' onclick=\"window.location.href='read.php?rno=".$resultCol["rno"]."'\">
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
                                    <td style="background-image:url(jpg/shelf203.jpg)" width="879px" height="14px"></td>
                                </tr><!---斷點=-->

                                <tr>
                                    <td height="30px"></td>
                                </tr><!---斷點=-->

                                <tr>
                                    <td style="background-image:url(jpg/shelf301.jpg)" width="879px" height="55px"></td>
                                </tr>

                                <tr>
                                    <td style="background-image:url(jpg/shelf202.jpg)" width="879px" align="center">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="764px" class="shelf">
                                            <tr style="background-image:url(jpg/shelf.jpg); font:微軟正黑體; font-size:10px; font-weight:bold;" align="center">
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
                                                                <tr bgcolor='".$color."' style='font-size:15px;' align='center'>
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
                                    <td style="background-image:url(jpg/shelf203.jpg)" width="879px" height="14px"></td>
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
        <tr style="background-image:url(../../../../jpg/last.png)">
            <td><?php include("../../../../model/footer.php"); ?></td>
        </tr>
    </table>
</body>
</html>
