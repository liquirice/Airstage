<?php
session_start();
require('../global/connectVar.php');
require_once("../global/zhstring.php");

$all = mysqli_query($conn, 'SELECT * FROM `Col` WHERE shelf = "article" ORDER BY uploadtime DESC');
$totalnotify = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM Member WHERE stu_id='".$_SESSION["stu_id"]."'"));
    $numnotify = explode(",", "".$totalnotify["notify"]."");
    $count = 0;
    while($numnotify[$count] != ""){
        $count++;
    }
$col = "";
$food = "";
$sch = "";
$con = "";
$w=1;
$x=1;
$y=1;
$z=1;
$a=1;
$b=1;
$c=1;
$d=1;

$secondcol = "";
$secondfood = "";
$secondsch = "";
$secondcon = "";
$thirdcol = "";
$thirdsch = "";
$thirdfood = "";
$thirdcon = "";
while($column = mysqli_fetch_array($all)){
	if($column["class"] == "column" && $w<=8){
		$col = $col.'● <a style="color:#666666" style="font-size:9pt;" href="read.php?rno='.$column['rno'].'">'.CuttingStr($column['title'],30).'</a><br>';
		$w++;
	}
	elseif($column["class"] == "food" && $x<=8){
		$food = $food.'● <a style="color:#666666" style="font-size:9pt;" href="read.php?rno='.$column['rno'].'">'.CuttingStr($column['title'],30).'</a><br>';
		$x++;
	}
	elseif($column["class"] == "school" && $y<=8){
		$sch = $sch.'● <a style="color:#666666" style="font-size:9pt;" href="read.php?rno='.$column['rno'].'">'.CuttingStr($column['title'],30).'</a><br>';
		$y++;
	}
	elseif($column["class"] == "concerts" && $z<=8){
		$con = $con.'● <a style="color:#666666" style="font-size:9pt;" href="read.php?rno='.$column['rno'].'">'.CuttingStr($column['title'],30).'</a><br>';
		$z++;
	}
};
$top = mysqli_query($conn, 'SELECT * FROM `Col` WHERE shelf = "article" ORDER BY view DESC'); 
while($topall = mysqli_fetch_array($top)){
	if($topall["class"] == "column" && $a == 1){
		$topcol = '<a target="_top" href="read.php?rno='.$topall['rno'].'">';
			if($topall["front"] != ""){
				$topcol = $topcol.'<img border="0" src="../member/images/'.$topall["stu_id"].'/column/'.$topall["front"].'" width="349px" height="232px" />';
			}
			else {
				$topcol = $topcol.'<img border="0" src="images/p1.jpg" width="349px" height="232px" />';
			}
		$topcol = $topcol.'</a><div class="title"><h3><a href="read.php?rno='.$topall['rno'].'" title="'.$topall['title'].'">'.$topall['title'].' </a></h3></div><div class="desc"><p><span style="color:#FFF">';
        $removecon = strip_tags($topall['realcontent']);  
        $topcol = $topcol.CuttingStr($removecon,100);
        $topcol = $topcol.'</span><a href="read.php?rno='.$topall['rno'].'" target="_blank" style="cursor:pointer">更多»</a></p></div>';
        $a++;
	}
	
	elseif($topall["class"] == "food" && $b == 1){
		$topfood = '<a target="_top" href="read.php?rno='.$topall['rno'].'">';
			if($topall["front"] != ""){
				$topfood = $topfood.'<img border="0" src="../member/images/'.$topall["stu_id"].'/column/'.$topall["front"].'" width="349px" height="232px" />';
			}
			else {
				$topfood = $topfood.'<img border="0" src="images/p1.jpg" width="349px" height="232px" />';
			}
		$topfood = $topfood.'</a><div class="title"><h3><a href="read.php?rno='.$topall['rno'].'" title="'.$topall['title'].'">'.$topall['title'].' </a></h3></div><div class="desc"><p><span style="color:#FFF">';
        $removecon = strip_tags($topall['realcontent']);  
        $topfood = $topfood.CuttingStr($removecon,100);
        $topfood = $topfood.'</span><a href="read.php?rno='.$topall['rno'].'" target="_blank" style="cursor:pointer">更多»</a></p></div>';
        $b++;
	}
	
	elseif($topall["class"] == "school" && $c == 1){
		$topsch = '<a target="_top" href="read.php?rno='.$topall['rno'].'">';
			if($topall["front"] != ""){
				$topsch = $topsch.'<img border="0" src="../member/images/'.$topall["stu_id"].'/column/'.$topall["front"].'" width="349px" height="232px" />';
			}
			else {
				$topsch = $topsch.'<img border="0" src="images/p1.jpg" width="349px" height="232px" />';
			}
		$topsch = $topsch.'</a><div class="title"><h3><a href="read.php?rno='.$topall['rno'].'" title="'.$topall['title'].'">'.$topall['title'].' </a></h3></div><div class="desc"><p><span style="color:#FFF">';
        $removecon = strip_tags($topall['realcontent']);  
        $topsch = $topsch.CuttingStr($removecon,100);
        $topsch = $topsch.'</span><a href="read.php?rno='.$topall['rno'].'" target="_blank" style="cursor:pointer">更多»</a></p></div>';
        $c++;
	}
	
	elseif($topall["class"] == "concerts" && $d == 1){
		$topcon = '<a target="_top" href="read.php?rno='.$topall['rno'].'">';
			if($topall["front"] != ""){
				$topcon = $topcon.'<img border="0" src="../member/images/'.$topall["stu_id"].'/column/'.$topall["front"].'" width="349px" height="232px" />';
			}
			else {
				$topcon = $topcon.'<img border="0" src="images/p1.jpg" width="349px" height="232px" />';
			}
		$topcon = $topcon.'</a><div class="title"><h3><a href="read.php?rno='.$topall['rno'].'" title="'.$topall['title'].'">'.$topall['title'].' </a></h3></div><div class="desc"><p><span style="color:#FFF">';
        $removecon = strip_tags($topall['realcontent']);  
        $topcon = $topcon.CuttingStr($removecon,100);
        $topcon = $topcon.'</span><a href="read.php?rno='.$topall['rno'].'" target="_blank" style="cursor:pointer">更多»</a></p></div>';
        $d++;
	}
	
	elseif($topall["class"] == "column" && $a == 2){
		if($topall["front"] != "") {
			$secondcol = $secondcol.'<a href="read.php?rno='.$topall["rno"].'"><img border="0" src="../member/images/'.$topall["stu_id"].'/column/'.$topall["front"].'" width="161px" height="104px"></a>';
		}
		else
			$secondcol = $secondcol.'<a href="read.php?rno='.$topall["rno"].'"><img border="0" src="images/p1.jpg" width="161px" height="104px"></a>';			$secondcol = $secondcol.' <div class="othertitle"><h3><a href="read.php?rno='.$topall['rno'].'" title="'.$topall['title'].'">'.$topall['title'].'</a></h3><div class="maskCss" style="height: 50px; opacity: 0.6; "></div></div>';
		$a++;
	}
	
	elseif($topall["class"] == "food" && $b == 2){
		if($topall["front"] != "") {
			$secondfood = $secondfood.'<a href="read.php?rno='.$topall["rno"].'"><img border="0" src="../member/images/'.$topall["stu_id"].'/column/'.$topall["front"].'" width="161px" height="104px"></a>';
		}
		else
			$secondfood = $secondfood.'<a href="read.php?rno='.$topall["rno"].'"><img border="0" src="images/p1.jpg" width="161px" height="104px"></a>';			$secondfood = $secondfood.' <div class="othertitle"><h3><a href="read.php?rno='.$topall['rno'].'" title="'.$topall['title'].'">'.$topall['title'].'</a></h3><div class="maskCss" style="height: 50px; opacity: 0.6; "></div></div>';
		$b++;
	}
	
	elseif($topall["class"] == "school" && $c == 2){
		if($topall["front"] != "") {
			$secondsch = $secondsch.'<a href="read.php?rno='.$topall["rno"].'"><img border="0" src="../member/images/'.$topall["stu_id"].'/column/'.$topall["front"].'" width="161px" height="104px"></a>';
		}
		else
			$secondsch = $secondsch.'<a href="read.php?rno='.$topall["rno"].'"><img border="0" src="images/p1.jpg" width="161px" height="104px"></a>';			$secondsch = $secondsch.' <div class="othertitle"><h3><a href="read.php?rno='.$topall['rno'].'" title="'.$topall['title'].'">'.$topall['title'].'</a></h3><div class="maskCss" style="height: 50px; opacity: 0.6; "></div></div>';
		$c++;
	}
	
	elseif($topall["class"] == "concerts" && $d == 2){
		if($topall["front"] != "") {
			$secondcon = $secondcon.'<a href="read.php?rno='.$topall["rno"].'"><img border="0" src="../member/images/'.$topall["stu_id"].'/column/'.$topall["front"].'" width="161px" height="104px"></a>';
		}
		else
			$secondcon = $secondcon.'<a href="read.php?rno='.$topall["rno"].'"><img border="0" src="images/p1.jpg" width="161px" height="104px"></a>';			$secondcon = $secondcon.' <div class="othertitle"><h3><a href="read.php?rno='.$topall['rno'].'" title="'.$topall['title'].'">'.$topall['title'].'</a></h3><div class="maskCss" style="height: 50px; opacity: 0.6; "></div></div>';
		$d++;
	}
	
	elseif($topall["class"] == "column" && $a==3){
		if($topall["front"] != "") {
			$thirdcol = $thirdcol.'<a href="read.php?rno='.$topall["rno"].'"><img border="0" src="../member/images/'.$topall["stu_id"].'/column/'.$topall["front"].'" width="161px" height="104px"></a>';
		}
		else
			$thirdcol = $thirdcol.'<a href="read.php?rno='.$topall["rno"].'"><img border="0" src="images/p1.jpg" width="161px" height="104px"></a>';
		$thirdcol = $thirdcol.' <div class="othertitle"><h3><a href="read.php?rno='.$topall['rno'].'" title="'.$topall['title'].'">'.$topall['title'].'</a></h3><div class="maskCss" style="height: 50px; opacity: 0.6; "></div></div>';
		$a++;
	}
	
	elseif($topall["class"] == "food" && $b==3){
		if($topall["front"] != "") {
			$thirdfood = $thirdfood.'<a href="read.php?rno='.$topall["rno"].'"><img border="0" src="../member/images/'.$topall["stu_id"].'/column/'.$topall["front"].'" width="161px" height="104px"></a>';
		}
		else
			$thirdfood = $thirdfood.'<a href="read.php?rno='.$topall["rno"].'"><img border="0" src="images/p1.jpg" width="161px" height="104px"></a>';
		$thirdfood = $thirdfood.' <div class="othertitle"><h3><a href="read.php?rno='.$topall['rno'].'" title="'.$topall['title'].'">'.$topall['title'].'</a></h3><div class="maskCss" style="height: 50px; opacity: 0.6; "></div></div>';
		$b++;
	}
	
	elseif($topall["class"] == "school" && $c==3){
		if($topall["front"] != "") {
			$thirdsch = $thirdsch.'<a href="read.php?rno='.$topall["rno"].'"><img border="0" src="../member/images/'.$topall["stu_id"].'/column/'.$topall["front"].'" width="161px" height="104px"></a>';
		}
		else
			$thirdsch = $thirdsch.'<a href="read.php?rno='.$topall["rno"].'"><img border="0" src="images/p1.jpg" width="161px" height="104px"></a>';
		$thirdsch = $thirdsch.' <div class="othertitle"><h3><a href="read.php?rno='.$topall['rno'].'" title="'.$topall['title'].'">'.$topall['title'].'</a></h3><div class="maskCss" style="height: 50px; opacity: 0.6; "></div></div>';
		$c++;
	}
	
	elseif($topall["class"] == "concerts" && $d==3){
		if($topall["front"] != "") {
			$thirdcon = $thirdcon.'<a href="read.php?rno='.$topall["rno"].'"><img border="0" src="../member/images/'.$topall["stu_id"].'/column/'.$topall["front"].'" width="161px" height="104px"></a>';
		}
		else
			$thirdcon = $thirdcon.'<a href="read.php?rno='.$topall["rno"].'"><img border="0" src="images/p1.jpg" width="161px" height="104px"></a>';
		$thirdcon = $thirdcon.' <div class="othertitle"><h3><a href="read.php?rno='.$topall['rno'].'" title="'.$topall['title'].'">'.$topall['title'].'</a></h3><div class="maskCss" style="height: 50px; opacity: 0.6; "></div></div>';
		$d++;
	}
}
?>
<!DOCTYPE HTML>

<html>
<head>
    <link href="http://airstage.com.tw/global/images/tm2.ico" rel="shortcut icon">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="zh-tw">
    <link rel="stylesheet" type="text/css" href="../plugin/shadowbox/shadowbox.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" language="javascript" type="text/javascript"></script>
    <script type="text/javascript" src="../plugin/shadowbox/shadowbox.js"></script>
    <title><?php if($count!=0) echo "(".$count.")" ?> 專欄 ─ Airstage 西灣人</title>
    
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
    $(document).ready(function(){
        $(".list a").each(function(){
            $(this).hover(function(){
                $(this).css("color", "#F59B00")
            },
            function(){
                $(this).css("color", "#666666")
            })
        })
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
    <!--header-->
    <!--等專欄的CSS寫好再套
?php
    require_once( "columnNavi.php" );
?
-->
<?php require("../global/navi_white/navi.php") ?>
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
                            <td colspan="2">
                                <div id="indexfield">
                                    <?php include('col.php'); ?><br>
                                    <?php include('food.php'); ?><br>
                                    <?php include('sch.php'); ?><br>
                                    <?php include('con.php') ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr background="../global/images/last.png">
                <td align="center" colspan="2" width="961px">
                    <?php require("../global/footer.php"); ?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
