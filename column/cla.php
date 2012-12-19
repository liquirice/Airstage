<?php
session_start();
include('../global/connectVar.php');
require("../global/zhstring.php");
$totalnotify = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM Member WHERE stu_id='".$_SESSION["stu_id"]."'"));
    $numnotify = explode(",", "".$totalnotify["notify"]."");
    $count = 0;
    while($numnotify[$count] != ""){
        $count++;
    }
?>
<!DOCTYPE HTML>

<html>
<head>
    <link href="http://www.airstage.com.tw/global/images/tm2.ico" rel="shortcut icon">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="zh-tw">
    <script src="http://code.jquery.com/jquery-latest.min.js" language="javascript" type="text/javascript"></script>
    <title><?php if($count!=0) echo "(".$count.")" ?> 專欄文章 ─ Airstage 西灣人</title>
    <script type="text/javascript"> 
    var coltype = "columnselect";
	var app = "column";
	// 背景區塊的透明度
    var _opacity = .6;
    $(document).ready(function(){
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
    });
    $("#type a").css("cursor", "pointer");
    $("#type a").each(function() {
      $(this).click(function(){
         var type=$(this).attr("id");
         $("#block table").each(function() {
            if(!$(this).hasClass(type)){
                $(this).hide(1);
            }
            else{
                $(this).delay(20).fadeIn('slow');
            }
         });
      })
    });
    });
    </script>
    <style fprolloverstyle="" type="text/css">
    body,td,th {
    font-family: "微軟正黑體";
    font-size: 10px;
    }
    body {
    background-repeat: repeat-x;
    background-color: #F2F2F2;
    }
    </style>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" style="background-attachment: fixed">
    
<?php include("../global/navi_white/navi.php") ?>
    <div align="center">
        

        <table border="0" width="980" height="171" cellspacing="0" cellpadding="0">
            <tr>
                <td style="background-image:url(../global/images/bot.png)">
                    <table align="center">
                        <tr>
                            <td width="961" height="345px" valign="top" colspan="2" align="center"><iframe src="window.php" width="961px" height="330px" scrolling="no" style="border:0"></iframe></td>
                        </tr>

                        <?php require("coltype.php") ?>

                        <tr>
                            <td valign="top" height="40" colspan="2">
                                <p align="center"><img border="0" src="images/line3.jpg" width="875" height="30" align="top"></p>
                            </td>
                        </tr>
                        <tr>
	                        <td colspan='4' width='608px' align="center">
	                            <div style="width: 750px">
                                <div style="width:90px; float: left; font-size: 16px; border: 1px solid; border-radius: 7px; color: #666666; border-color: #CCCCCC" id="type">
                                    <br /><a id="news">新聞</a><br /><br />
                                    <a id="tech">科技</a><br /><br />
                                    <a id="human">人文</a><br /><br />
                                    <a id="busi">商管</a><br /><br />
                                    <a id="life">生活</a><br /><br />
                                    <a id="sport">運動</a><br /><br />
                                    <a id="travel">旅行</a><br /><br />
                                    <a id="study">學習</a><br /><br />
                                    <a id="other">其他</a><br /><br />
                                </div>
	                        	<div id="block" style="float: right">
	                        	    <?php
	                        	    $col = mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "column" AND shelf = "article" ORDER BY uploadtime DESC');
	                        	    $arr = array("新聞"=>"news","科技"=>"tech","人文"=>"human","商管"=>"busi","生活"=>"life","運動"=>"sport","旅行"=>"travel","學習"=>"study","其他"=>"other");
                                        while($colresult = mysqli_fetch_array($col)){
                                            $removetag = strip_tags($colresult["realcontent"]);
                                            $short = CuttingStr($removetag, 180);
                                            $colmember = mysqli_fetch_array(mysqli_query($conn , "SELECT * FROM `Member` WHERE stu_id='".$colresult["stu_id"]."' LIMIT 1"));
                                            $table = $table."
                                            <table width='608px' onclick=\"window.location.href='read.php?rno=".$colresult["rno"]."'\" style='cursor:pointer' class='".$arr[$colresult["type"]]."'>
                                            <tr>
                                                <td rowspan='3' width='190px' height='139px'>";
                                                if($colresult["front"]!='') $table = $table."<img src='../member/images/".$colresult['stu_id']."/column/".$colresult["front"]."' width='186px' height='140px' />";
                                                else $table = $table."<img src='images/replace.jpg' width='186px' height='140px' />";
                                                $table = $table."</td>
                                                <td width='249px' height='18px' style='font-size:16px' align='left'><b style='color:#F16522'>".$colresult["title"]."</b></td>
                                                <td width='137px' height='18px' style='font-size:11px; color:#777777' align='right'>".$colmember["name"]."/".$colmember["department"]."".$colmember["grade"]."級</td>
                                            </tr>
                                            <tr>
                                                <td colspan='2' width='394px'style='font-size:11px; line-height:2;' align='left'>".$short."...</td>
                                            </tr>
                                            <tr>
                                                <td align='left'><div class='fb-like' data-href='http://www.airstage.com.tw/column/read.php?rno=".$colresult["rno"]."' data-send='false' data-width='50' data-layout='button_count' data-show-faces='true'></div></td>
                                            </tr>
                                            </table>";
                                        }
                                        echo $table;
	                        	    ?>
                                </div>
                                </div>
                            </td>
	                    </tr>
                    </table>
                </td>
            </tr>

            <tr background="../global/images/last.png">
                <td align="center" colspan="4" width="961px">
                    <?php include("../global/footer.php"); ?>
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
