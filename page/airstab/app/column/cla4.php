<?php
session_start();
include('../../../../conn.php');
require("zhstring.php");
$col = mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "concerts" ORDER BY uploadtime DESC');
?>
<!DOCTYPE HTML>

<html>
<head>
    <link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="zh-tw">
    <link rel="stylesheet" type="text/css" href="../../../../plugin/shadowbox/shadowbox.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" language="javascript" type="text/javascript"></script>
    <script type="text/javascript" src="../../../../plugin/shadowbox/shadowbox.js"></script>
    <title>藝文創作 ─ Airstage 西灣人</title>
    <script type="text/javascript"> 
    var coltype = "conselect";
	var app = "column";
	// 背景區塊的透明度
    var _opacity = .6;
    $(function(){
    Shadowbox.init({
        players : ['html'],
        overlayColor: "#FFFFFF",
    });
    $("#block table").each(function(){
    	$(this).hover(function(){
	    	$(this).css("background-color", "rgb(238,238,238)");
    	}, function(){
	    	$(this).css("background-color", "white");
    	})
    })
    });
    </script>
    <style fprolloverstyle="" type="text/css">
    body,td,th {
    font-family: "微軟正黑體";
    font-size: 10px;
    }
    body {
    background-image: url(../../../../jpg/bgbank/basic.png);
    background-repeat: repeat-x;
    background-color: #F2F2F2;
    }
    </style>
    <script language="JavaScript" fptype="dynamicanimation" type="text/javascript">
<!--
    function dynAnimation() {}
    function clickSwapImg() {}
    //-->
    </script>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onload="dynAnimation()" language="Javascript1.2" style="background-attachment: fixed">
    <!--header-->
    <!--等專欄的CSS寫好再套
?php
    require_once( "columnNavi.php" );
?
-->
<?php include("../../../../model/navi.php") ?>
    <div align="center">
        

        <table border="0" width="980" height="171" cellspacing="0" cellpadding="0">
            <tr>
                <td style="background-image:url(../../../../jpg/bot.png)">
                    <table align="center">
                        <tr>
                            <td width="961" height="345px" valign="top" colspan="2" align="center"><iframe src="window.php" width="961px" height="330px" scrolling="no" style="border:0"></iframe></td>
                        </tr>

                        <?php require("coltype.php") ?>

                        <tr>
                            <td valign="top" height="40" colspan="2">
                                <p align="center"><img border="0" src="jpg/line3.jpg" width="875" height="30" align="top"></p>
                            </td>
                        </tr>
                        <tr>
	                        <td colspan='5' width='608px' align="center">
	                        	<div id="block">
                      
                                	<?php
                                		while($colresult = mysqli_fetch_array($col)){
                                			$removetag = strip_tags($colresult["realcontent"]);
                                			$short = CuttingStr($removetag, 180);
                                			$colmember = mysqli_fetch_array(mysqli_query($conn , "SELECT * FROM `Member` WHERE stu_id='".$colresult["stu_id"]."' LIMIT 1"));
	                                		echo "
	                                		<table width='608px' onclick=\"window.location.href='read.php?rno=".$colresult["rno"]."'\" style='cursor:pointer'>
	                                		<tr>
	                                			<td rowspan='3' width='186px' height='140px'>";
	                                			if($colresult["front"]!='') echo "<img src='../../../../accounts/images/".$colresult['stu_id']."/col/".$colresult["front"]."' width='186px' height='140px' />";
	                                			else echo "<img src='jpg/replace.jpg' width='186px' height='140px' />";
	                                			echo "</td>
	                                			<td width='249px' height='18px' style='font-size:16px'><b style='color:#F16522'>".$colresult["title"]."</b></td>
	                                			<td width='173px' height='18px' style='font-size:11px; color:#777777'>".$colmember["name"]."/".$colmember["department"]."".$colmember["grade"]."級</td>
	                                		</tr>
	                                		<tr>
	                                			<td colspan='2' width='394px'style='font-size:11px; line-height:2;'>".$short."...</td>
	                                		</tr>
	                                		<tr>
	                                			<td><div class='fb-like' data-href='http://www.airstage.com.tw/nsysu/airs/page/airstab/app/column/read.php?rno=".$colresult["rno"]."' data-send='false' data-width='50' data-layout='button_count' data-show-faces='false'></div></td>
	                                		</tr>
	                                		</table>";
                                		}
                                	?>
	                        	</div>
                            </td>
	                    </tr>
                    </table>
                </td>
            </tr>

            <tr background="../../../../jpg/last.png">
                <td align="center" colspan="4" width="961px">
                    <?php include("../../../../model/footer.php"); ?>
                </td>
            </tr>
        </table>
    </div>
    <!---FB讚--->
    <div id="fb-root"></div><script type="text/javascript">
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
</body>
</html>
