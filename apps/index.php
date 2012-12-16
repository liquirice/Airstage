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
    <link href="http://airstage.com.tw/global/images/tm2.ico" rel="shortcut icon">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="zh-tw">
    <script src="http://code.jquery.com/jquery-latest.min.js" language="javascript" type="text/javascript"></script>
    <title><?php if($count!=0) echo "(".$count.")" ?> 應用程式 ─ Airstage 西灣人</title>
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
                            <td width="961" align="center" valign="top">
                                <p align="center">&nbsp;</p>                            </td>
                        </tr>

                        <?php /*require("coltype.php")*/ ?>
                    </table>
                </td>
            </tr>

            <tr>
                <td align="center" colspan="4" width="961px" style="background-image:url(../global/images/last.png)">
                    <?php require("../global/footer.php"); ?>
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
