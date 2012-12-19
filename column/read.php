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
$like="column";
$rno = $_GET['rno'];
$_SESSION['readrno'] = $rno;

if(!isset($_COOKIE['temprno'.$rno.''])){
    setcookie('temprno'.$rno.'', 0, time()+(60*60*24*365));
}

$hot = 'SELECT * FROM `Col` WHERE shelf= "article" ORDER BY dayview DESC LIMIT 5';
$hotresult = mysqli_query($conn, $hot);

$hot2 = 'SELECT * FROM `Col` WHERE shelf="article" ORDER BY monthview DESC LIMIT 5';
$hot2result = mysqli_query($conn, $hot2);

$get = 'SELECT * FROM `Col` WHERE rno = '.$rno.' AND shelf = "article" LIMIT 1';
$result = mysqli_query($conn, $get);
$getresult = mysqli_fetch_array($result);
if($getresult['rno'] == ""){
	echo "<script language='javascript' type='text/javascript'>alert('查無此文章!'); window.location.href='index.php'</script>";
}
$time = explode(' ', ''.$getresult['uploadtime'].'');
$member = 'SELECT * FROM `Member` WHERE stu_id = "'.$getresult['stu_id'].'" LIMIT 1';
$membertemp = mysqli_query($conn, $member);
$getmember = mysqli_fetch_array($membertemp);
$memberpic = 'SELECT profile_pic FROM `member_Info` WHERE stu_id = "'.$getresult['stu_id'].'" LIMIT 1';
$memberpictemp = mysqli_query($conn, $memberpic);
$getmemberpic = mysqli_fetch_array($memberpictemp);
if($_COOKIE['temprno'.$rno.''] == 0){
	$monthview = $getresult['monthview'] + 1;
	$dayview = $getresult['dayview']+1;
    $view = $getresult['view'] + 1;
	//echo "$monthview = ".$monthview." $dayview = ".$dayview." $view = ".$view;
    $update = "UPDATE `Col` SET monthview='".$monthview."',dayview='".$dayview."', view='".$view."' WHERE rno=".$_SESSION['readrno']."";
    if(mysqli_query($conn, $update)){
        setcookie('temprno'.$rno.'', 1, time()+(60*60*24*365));
    }
    else
        echo '<script language="javascript" type="text/javascript">alert("有問題")</script>';
}
?>
<!DOCTYPE HTML>

<html>
<head>
    <link href="http://www.airstage.com.tw/global/images/tm2.ico" rel="shortcut icon">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta property="og:title" content="<?php echo $getresult["title"] ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.airstage.com.tw/column/read.php?rno=<?php echo $getresult["rno"] ?>" />
    <meta property="og:image" content="http://www.airstage.com.tw/column/images/b301.jpg" />
    <meta property="og:site_name" content="Airstage" />
    <meta property="fb:admins" content="100000120819158" />
    <link rel="stylesheet" type="text/css" href="../plugin/shadowbox/shadowbox.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../plugin/shadowbox/shadowbox.js"></script>
    <title><?php if($count!=0) echo "(".$count.")"; echo "".$getresult["title"]."" ?> ─ Airstage 西灣人</title>
    <script language="javascript" type="text/javascript">
    var coltype = "<?php echo $getresult["class"] ?>";
    var rno = "<?php echo $rno ?>";
    var app = "column";
$(document).ready(function(){
    $('#article strong, #article b').css('color', '#F16522');
    //圖片變換
    $(".order").each(function(){
        $(this).hover(function(){
            $(this).css("color", "#CD7300")
        }, function(){
            $(this).css("color", "#000000")
        })
    })
    $("#share").hover(function(){
	    $(this).attr("src","images/share2.png");
    }, function(){
	    $(this).attr("src","images/share1.png");
    });
    $(".orderblock").each(function(){
        $(this).hover(function(){
            $(this).css("background","#F2F2F2")
        }, function(){
            $(this).css("background","#FFFFFF")
        })
    })
    
    Shadowbox.init({
        players : ['html'],
        overlayColor: "#FFFFFF",
    });
    })
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

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" style="background-attachment: fixed; font-family: '微軟正黑體';">
    <div align="center">
    <?php include("../global/navi_white/navi.php") ?>
        <table border="0" width="980" height="693" cellspacing="0" cellpadding="0">
            <tr>
            	<td height="10px" colspan="5"></td>
            </tr>
            <tr>
                <td background="../global/images/bot.png" valign="top" height="65" colspan="5">
                    <div align="center">
                        <table border="0" width="959px" cellspacing="0" cellpadding="0">
                            <tr>
                                <td valign="top" height="151px" colspan="5">
                                    <div align="center">
                                        <p align="center" style="margin-top: 0; margin-bottom: 0"><font size="2"><iframe name="I1" src="main2.htm" scrolling="no" border="0" frameborder="0" marginwidth="1" marginheight="1" width="959px" height="141px"><font size="2"><font size="2">您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</font></font></iframe></font></p>
                                    </div>
                                </td>
                            </tr>

                            <?php require("coltype.php"); ?>

                            <tr>
                                <td valign="top" height="45" colspan="5"></td>
                            </tr>

                            <tr>
                            	<td width="45px" rowspan="2"></td>
                                <td align="left" colspan="2" width="688px">
                                    <table border="0" width="688px" cellspacing="0" cellpadding="0" style="font-family: PMingLiU; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; ">
                                        <tr>
                                            <td width="550px">
                                                <p align="left"></p>

                                                <header><b><font face="微軟正黑體" color="#830B0B" style="font-size: 15pt"><?php echo ''.$getresult['title'].'';?></font></b></header>
                                                <p>

                                                <p align="left"><span style="color: rgb(116, 116, 116); font-family: 微軟正黑體; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255); "><time datetime="<?php echo ''.$time[0].''; ?>"><?php echo ''.$time[0].''; ?></time></span><span style="color: rgb(116, 116, 116); font-family: 微軟正黑體; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none; ">&nbsp;&nbsp;撰文者：<?php echo ''.$getmember['department'].''.$getmember['grade'].'級  '.$getmember['name'].''; ?></span></p>
                                            </td>

                                            <td width="69px" valign="bottom">
                                                &nbsp;

                                                <div class="fb-like" data-href="http://<?php echo $_SERVER["HTTP_HOST"]; ?>/column/read.php?rno=<?php echo ''.$rno.''; ?>" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false"></div>
                                            </td>

                                            <td width="69px" valign="bottom">
                                                <a href="https://www.facebook.com/dialog/feed?app_id=209856362473286&link=http://www.airstage.com.tw/column/read.php?rno=<?php echo ''.$rno.''; ?>&picture=http://<?php echo $_SERVER["HTTP_HOST"]; ?>/column/images/b301.jpg&name=<?php echo ''.$getresult['title'].''; ?>&caption=Airstage&nbsp;西灣人|Airs專欄：從校園影響力開始&redirect_uri=http://<?php echo $_SERVER["HTTP_HOST"]; ?>/column/read.php?rno=<?php echo ''.$rno.''; ?>"><img id="share" src="images/share1.png" width="61" height="22px" width="59px" border="0" align="absbottom"></a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td background="images/lineblock.png" height="15px" colspan="3"></td>
                                        </tr>

                                        <tr>
                                            <td colspan="3" width="400px" style="font-size:15px; font:微軟正黑體; font-family: '微軟正黑體'; color: #333;">
                                                <article style="line-height:28px" id="article">
                                                    <?php
                                                        if($getresult['front'] != ''){
                                                            list($width, $height) = getimagesize("../member/images/".$getresult["stu_id"]."/column/".$getresult['front']."");
                                                            if($width>600){
                                                                $x = $width-600;
                                                                $y = ($x/$width);
                                                                $width = $width*(1-$y);
                                                                $height = $height*(1-$y);
                                                            }
                                            
                                                            echo '<img src="../member/images/'.$getresult["stu_id"].'/column/'.$getresult['front'].'" width="'.$width.'px" height="'.$height.'px" /><br />';} echo ''.$getresult['realcontent'].'';
                                                    ?><br />
                                                 </article>

                                                <table border="0" width="404px" height="146">
                                                    <tr>
                                                        <td style="background-repeat:no-repeat; background-image: url(images/box_writer.png)" width="404px" height="187" align="right">
                                                            <footer>
                                                                <table border="0" width="380px" align="left" cellspacing="0" cellpadding="0" height="157">
                                                                    <tr>
                                                                        <td width="190px" align="center" rowspan="4">
                                                                            <table border="0" width="170px" cellpadding="4" cellspacing="4">
                                                                                <tr>
                                                                                    <td align="center" style="border: 1px solid #CCCCCC" height="152px" width="152px"><!--圖片放置處=-->
                                                                                    <?php if($getmemberpic['profile_pic'] == '')
                                                                                        echo '本人無頭像';
                                                                                    else
                                                                                        echo '<img width="143" height="143" src="../member/images/'.$getmember['stu_id'].'/member/'.$getmemberpic['profile_pic'].'" />'; ?></td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                        <td width="5px"></td>
                                                                        <td valign="bottom" colspan="2" align="left" height="50px">
                                                                            <p style="line-height: 150%; margin-top: 0; margin-bottom: 0; font-size:14px"><b><font face="微軟正黑體" color="#0088AA">關於<?php echo ''.$getmember['name'].''; ?></font></b></p>

                                                                            <p style="line-height: 150%; margin-top: 0; margin-bottom: 0"><b><font face="微軟正黑體" color="#484848" style="font-size: 10pt"><?php echo ''.$getmember['department'].''.$getmember['grade'].'級'; ?></font></b></p>
                                                                        </td>
                                                                    </tr>                                                                    
                                                                    <tr>
                                                                        <td valign="bottom" colspan="2">
                                                                            <table>                                                                                                                                                               
                                                                                <tr>
                                                                                    <td width="5px" height="86px"></td>
                                                                                    <td style="font:12px 微軟正黑體; color:#666666; font-weight: bold; line-height: 1.2">
                                                                                        <br /><?php echo $getmember["aboutauthor"]; ?>
                                                                                    </td>
                                                                                    <?php if($getmember["aboutauthor"]!= "") echo '<td align="right" valign="bottom" width="14px"></td>'; ?>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="45px" align="left" valign="center" width="200px" colspan="3"><br /><img border="0" src="images/more.png" width="40" height="10" align="right"></td>

                                                       
                                                                    </tr>
                                                                </table>
                                                            </footer>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <p>&nbsp;</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="3" background="images/lineblock.png" height="15px">&nbsp;</td>
                                        </tr>

                                        <tr>
                                            <td colspan="3" height="49" valign="top" align="right">
                                                <div class="fb-like" style="float:left" data-href="http://www.airstage.com.tw/column/read.php?rno=<?php echo ''.$rno.''; ?>" data-send="false" data-width="410" data-show-faces="true"></div>
                                                <div style="float:right">
                                                    <p style="float:left; font-size:14px; line-height: 1.5">共有 <span style="font-size:22px">
                                                        <?php echo $getresult["view"]; ?>
                                                    </span> 個人閱讀過</p>&nbsp;&nbsp;
                                                    <div style="float: right">
                                                        <?php if($_SESSION["stu_id"] != ''){include("../global/like/like.php");} ?>
                                                    </div>
                                                </div>
                                      
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="3">
                                                &nbsp;

                                                <div class="fb-comments" data-href="http://www.airstage.com.tw/column/read.php?rno=<?php echo ''.$rno.''; ?>;" data-num-posts="2" data-width="688"></div>
                                            </td>
                                        </tr>
                                    </table><br class="Apple-interchange-newline">
                                    &nbsp;&nbsp;
                                </td>
                                <!--td width="45px" align="right" rowspan="2"></td-->
                                <!-- !右邊資訊區-->
                                <td width="136px" rowspan="2" align="left" valign="top">
                                    <table>
                                        <tr>
                                            <td colspan="2" style="font-size:18px"><b>今日熱門排行</b></td>
                                        </tr>
                                        <tr>
                                             <td>
                                        <?php
                                        while($hots = mysqli_fetch_array($hotresult)){
                                        if($hots["dayview"]!=0){
                                            $daypic = "SELECT profile_pic FROM `member_Info` WHERE stu_id = '".$hots['stu_id']."' LIMIT 1" ;
                                            $daypro = "SELECT * FROM `Member` WHERE stu_id = '".$hots['stu_id']."' LIMIT 1";
                                            $proday = mysqli_fetch_array(mysqli_query($conn, $daypro));
                                            $picday = mysqli_fetch_array(mysqli_query($conn, $daypic));
                                            if($picday['profile_pic'] == '')
                                                echo '';
                                            else
                                                echo '<table class="orderblock"><tr><td rowspan="2"><img width="44px" height="44px" src="../member/images/'.$hots['stu_id'].'/member/'.$picday['profile_pic'].'" /></td><td><a style="font-size:10px; color:#000; text-decoration:none" href="read.php?rno='.$hots['rno'].'" class="order">'.CuttingStr($hots['title'],30).'</a></td></tr><tr><td style="font-size:10px; color:#CCC">'.$proday['name'].'</td</tr></table>';
                                            }
                                        }
                                        ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="30px"></td>
                                        </tr>

                                        <tr>
                                            <td colspan="2" style="font-size:18px"><b>本月熱門排行</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                        <?php
                                        while($monthhots = mysqli_fetch_array($hot2result)){
                                        if($monthhots["monthview"] != 0){
                                            $monthpic = "SELECT profile_pic FROM `member_Info` WHERE stu_id = '".$monthhots['stu_id']."' LIMIT 1" ;
                                            $monthpro = "SELECT * FROM `Member` WHERE stu_id = '".$monthhots['stu_id']."' LIMIT 1";
                                            $pro2 = mysqli_fetch_array(mysqli_query($conn, $monthpro));
                                            $pic2 = mysqli_fetch_array(mysqli_query($conn, $monthpic));
                                            if($pic2['profile_pic'] == '')
                                                echo '';
                                            else
                                                echo '<table class="orderblock"><tr><td rowspan="2"><img width="44px" height="44px" src="../member/images/'.$monthhots['stu_id'].'/member/'.$pic2['profile_pic'].'" /></td><td><a style="font-size:10px; color:#000; text-decoration:none" href="read.php?rno='.$monthhots['rno'].'" class="order">'.CuttingStr($monthhots['title'],30).'</a></td></tr><tr><td style="font-size:10px; color:#CCC">'.$pro2['name'].'</td></tr></table>';
                                            }
                                        }
                                        if($getresult['stu_id'] == $_SESSION['stu_id']){
	                                        echo '<table><tr><td><a style="font-size:10px; color:#000" href="edit.php?rno='.$getresult['rno'].'">編輯文章</a></td></tr></table>';
                                        }
                                        ?>
                                        </td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="45px" rowspan="2"></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>

            <tr background="../global/images/last.png">
                <td align="center" colspan="2" width="961px">
                    <?php include("../global/footer.php"); ?>
                </td>
            </tr>
        </table>
    </div>


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
