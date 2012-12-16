<?php
session_start();
require_once("../global/connectVar.php");
$getmember = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM Member WHERE stu_id='".$_SESSION["stu_id"]."' LIMIT 1"));
$getmemberpic = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM member_Info WHERE stu_id='".$_SESSION["stu_id"]."' LIMIT 1"));
$title = $_POST["title"];
$realcontent = $_POST["editor1"];

?>
<!DOCTYPE html>
<html>
    <head>
        <link href="http://airstage.com.tw/global/images/tm2.ico" rel="shortcut icon">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Language" content="zh-tw">
        <title>預覽文章 ─ Airstage 西灣人</title>
    </head>
<body>
<table align="center" border="0" width="688px" cellspacing="0" cellpadding="0" style="font-family: PMingLiU; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; ">
                                        <tr>
                                            <td width="550px">
                                                <p align="left"></p>

                                                <header><b><font face="微軟正黑體" color="#830B0B" style="font-size: 15pt"><?php echo ''.$title.'';?></font></b></header>
                                                <p>

                                                <p align="left"><span style="color: rgb(116, 116, 116); font-family: 微軟正黑體; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255); "><time datetime="<?php echo date('Y-m-d'); ?>"><?php echo date('Y-m-d'); ?></time></span><span style="color: rgb(116, 116, 116); font-family: 微軟正黑體; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none; ">&nbsp;&nbsp;撰文者：<?php echo ''.$getmember["department"].''.$getmember['grade'].'級  '.$_SESSION["name"].''; ?></span></p>
                                            </td>

                                            <td width="69px" valign="bottom">
                                                &nbsp;

                                                <!--div class="fb-like" data-href="http://<?php echo $_SERVER["HTTP_HOST"]; ?>/column/read.php?rno=<?php echo ''.$rno.''; ?>" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false"></div-->
                                            </td>

                                            <td width="69px" valign="bottom">
                                                <!--a href="https://www.facebook.com/dialog/feed?app_id=209856362473286&link=http://www.airstage.com.tw/column/read.php?rno=<?php echo ''.$rno.''; ?>&picture=http://<?php echo $_SERVER["HTTP_HOST"]; ?>/column/images/b301.jpg&name=<?php echo ''.$getresult['title'].''; ?>&caption=Airstage&nbsp;西灣人|Airs專欄：從校園影響力開始&redirect_uri=http://<?php echo $_SERVER["HTTP_HOST"]; ?>/column/read.php?rno=<?php echo ''.$rno.''; ?>"><img id="share" src="images/share1.png" width="61" height="22px" width="59px" border="0" align="absbottom"></a-->
                                            </td>
                                        </tr>

                                        <tr>
                                            <td background="images/lineblock.png" height="15px" colspan="3"></td>
                                        </tr>

                                        <tr>
                                            <td colspan="3" width="400px" style="font-size:15px; font:微軟正黑體; font-family: '微軟正黑體'; color: #333;">
                                                <article style="line-height:28px" id="article">
                                                    <?php
                                                        /*if($getresult['front'] != ''){
                                                            list($width, $height) = getimagesize("../member/images/".$getresult["stu_id"]."/column/".$getresult['front']."");
                                                            if($width>600){
                                                                $x = $width-600;
                                                                $y = ($x/$width);
                                                                $width = $width*(1-$y);
                                                                $height = $height*(1-$y);
                                                            }
                                            
                                                            echo '<img src="../member/images/'.$getresult["stu_id"].'/column/'.$getresult['front'].'" width="'.$width.'px" height="'.$height.'px" /><br />';}*/
                                                            echo $realcontent;
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
</td></tr></table>
</body>
</html>