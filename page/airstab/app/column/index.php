<?php
session_start();
include('../../../../conn.php');
require("zhstring.php");
$col = mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "column" AND shelf = "article" LIMIT 8');
$new = mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "news" AND shelf = "article" LIMIT 8');
$sch = mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "school" AND shelf = "article" LIMIT 8');
$con = mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "concerts" AND shelf = "article" LIMIT 8');

$topcol = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "column" AND shelf = "article" ORDER BY view DESC LIMIT 1'));
$topnew = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "news" AND shelf = "article" ORDER BY view DESC LIMIT 1'));
$topsch = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "school" AND shelf = "article" ORDER BY view DESC LIMIT 1'));
$topcon = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "concerts" AND shelf = "article" ORDER BY view DESC LIMIT 1'));

$secondcol = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "column" AND shelf = "article" ORDER BY view DESC LIMIT 1,1'));
$secondnew = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "news" AND shelf = "article" ORDER BY view DESC LIMIT 1,1'));
$secondsch = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "school" AND shelf = "article" ORDER BY view DESC LIMIT 1,1'));
$secondcon = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "concerts" AND shelf = "article" ORDER BY view DESC LIMIT 1,1'));

$thirdcol = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "column" AND shelf = "article" ORDER BY view DESC LIMIT 2,1'));
$thirdnew = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "news" AND shelf = "article" ORDER BY view DESC LIMIT 2,1'));
$thirdsch = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "school" AND shelf = "article" ORDER BY view DESC LIMIT 2,1'));
$thirdcon = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "concerts" AND shelf = "article" ORDER BY view DESC LIMIT 2,1'));
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
    <title>專欄 ─ Airstage 西灣人</title>
    
    <style type="text/css">
.abgne_tip_gallery_block2 {
        margin: 0;
        padding: 0;
        width: 349px;
        height: 232px;
        overflow: hidden;
        position: relative;
        border: 1px solid #ccc;
    }
    .abgne_tip_gallery_block3 {
        margin: 0;
        padding: 0;
        width: 161px;
        height: 104px;
        overflow: hidden;
        position: relative;
        border: 1px solid #ccc;
    }
    .abgne-yahoo-slide img {
        border: 0;
    }
    .abgne-yahoo-slide  a {
        text-decoration: none;
        color: #fff; 
    }
    .abgne-yahoo-slide  a:hover {
        color: #fc6;
    }
    .abgne-yahoo-slide ul, .abgne-yahoo-slide li {
        margin: 0;
        padding: 0;
        list-style: none;
        z-index: 1000;
    }
    .abgne-yahoo-slide .title {
        position: absolute;
        bottom: 0;
        left: 0;
        margin: 0;
        width: 100%;
        height: 50px;
        line-height: 50px;
    }
    .abgne-yahoo-slide .othertitle {
        position: absolute;
        bottom: 0;
        left: 0;
        margin: 0;
        width: 161px;
        height: 50px;
        line-height: 2;
    }
    .abgne-yahoo-slide .othertitle h3 {
    	font-size: 12px;
        margin: 0;
        padding: 0 0 0 20px;
        position: absolute;
        z-index: 1000;
    }
   .abgne-yahoo-slide .title h3 {
   		font-size: 14px;
        margin: 0;
        padding: 0 0 0 20px;
        position: absolute;
        z-index: 1000;
    }
    .abgne-yahoo-slide .desc {
        position: absolute;
        bottom: 50px;
        left: 0;
        width: 100%;
        z-index: 999;
        display: none;
        overflow: hidden;
        color: #fff;
    }
    .abgne-yahoo-slide .desc p {
        padding: 10px 10px 0;
        font-size: 12px;
        color: #ccc;
        z-index: 998;
    }
    /* 用來當透明背景用的 */
    .maskCss {
        width: 100%;
        background-color: #000;
        position: absolute;
        z-index: 997;
    }
    </style>
    <script type="text/javascript"> 
    var coltype = "index";
	var app = "column";
	// 背景區塊的透明度
    var _opacity = .6;
    $(function(){
    Shadowbox.init({
        players : ['html'],
        overlayColor: "#FFFFFF",
    });
        // 把每一個 abgne-yahoo-slide 取出做處理
        $('.abgne-yahoo-slide').each(function(){
            // 取得標題及說明描述的高度
            var $this = $(this), 
                $title = $this.find('.title'), 
                _titleHeight = $title.outerHeight(true),
                $desc = $this.find('.desc'),
                _descHeight = $desc.outerHeight(true),
                _speed = 400;
            
            // 設定 $desc 的高度為 0 並顯示
            // 接著插入一個當做背景用的區塊
            $desc.css({
                height: 0,
                display: 'block'
            }).append($('<div><\/div>').css({
                height: _descHeight,
                opacity: _opacity
            }).addClass('maskCss')).find('p').css('position', 'absolute');
            
            // 插入一個當做背景用的區塊
            $title.append($('<div><\/div>').css({
                height: _titleHeight,
                opacity: _opacity
            }).addClass('maskCss'));
            
            // 當滑鼠移到區塊上時
            $this.hover(function(){
                // 改變 $desc 的高度為原本高度
                $desc.stop().animate({
                    height: _descHeight
                }, _speed);
            }, function(){
                // 改變 $desc 的高度為 0
                $desc.stop().animate({
                    height: 0
                }, _speed);
            });
        });
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
                            <td colspan="2">
                                <div id="indexfield">
                                    <?php include('col.php'); ?><br>
                                    <?php include('news.php'); ?><br>
                                    <?php include('sch.php'); ?><br>
                                    <?php include('con.php') ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr background="../../../../jpg/last.png">
                <td align="center" colspan="2" width="961px">
                    <?php include("../../../../model/footer.php"); ?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
