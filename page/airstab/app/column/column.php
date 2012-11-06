<?php
session_start();
include('../../../../conn.php');
$col = mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "column" LIMIT 8');
$new = mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "news" LIMIT 8');
$sch = mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "school" LIMIT 8');
$con = mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "concerts" LIMIT 8');

$topcol = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "column" ORDER BY view DESC LIMIT 1'));
$topnew = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "news" ORDER BY view DESC LIMIT 1'));
$topsch = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "school" ORDER BY view DESC LIMIT 1'));
$topcon = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM `Col` WHERE class = "concerts" ORDER BY view DESC LIMIT 1'));

function left_string($s,$m,$symbol)
{
   $n=strlen($s);
   $e=explode('<', $s);
   $ne=strlen($e[0]);
   if($ne <= $m){
   for($i=0;$i<$n;$i++)
   {
      $t=ord(substr($s,$i,1));   
      if($t>=128)
      {
        $s1=substr($s,$i,3);
        $i=$i+2;
      }
      else
        $s1=substr($s,$i,1);
      
       $c=$c+1;
       if($c<=$m)
         $s2=$s2.$s1;
       else
         $i=$n+1;
   }
   }
   else if($ne > $m){
       $s2=$e[0];
   }
   return $s2;
}
?>
<!DOCTYPE HTML>

<html>
<head>
    <link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="zh-tw">
    <link rel="stylesheet" type="text/css" href="../../../../plugin/shadowbox/shadowbox.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js">
</script>
    <script type="text/javascript" src="../../../../plugin/jrumble/jquery.jrumble.1.3.min.js">
</script>
    <script type="text/javascript" src="../../../../plugin/shadowbox/shadowbox.js">
</script>

    <title>專欄 ─ Airstage 西灣人</title>
    <script language="javascript" type="text/javascript">
$(function(){
    
    $('a').css('text-decoration', 'none');
    //圖片變換
    $("#share").hover(function(){
        $(this).attr("src","jpg/share2.png");
    }, function(){
        $(this).attr("src","jpg/share1.png");
    });
    $("#index").hover(function(){
        $(this).attr("src","jpg/b102.jpg");
    }, function(){
        $(this).attr("src","jpg/b1.jpg");
    });
    $("#news").hover(function(){
        $(this).attr("src","jpg/b302.jpg");
    }, function(){
        $(this).attr("src","jpg/b3.jpg");
    });
    $("#school").hover(function(){
        $(this).attr("src","jpg/b402.jpg");
    }, function(){
        $(this).attr("src","jpg/b4.jpg");
    });
    $("#concert").hover(function(){
        $(this).attr("src","jpg/b502.jpg");
    }, function(){
        $(this).attr("src","jpg/b5.jpg");
    });
    $("#clubs").hover(function(){
        $(this).attr("src","jpg/b602.jpg");
    }, function(){
        $(this).attr("src","jpg/b6.jpg");
    });
    $("#write").hover(function(){
        $(this).attr("src","jpg/bb102.png");
    }, function(){
        $(this).attr("src","jpg/bb1.png");
    });
    $("#mine").hover(function(){
        $(this).attr("src","jpg/bb202.png");
    }, function(){
        $(this).attr("src","jpg/bb2.png");
    });

    Shadowbox.init({
        players : ['html'],
        overlayColor: "#FFFFFF",
    });
    $('#fpAnimswapImgFP12').jrumble({
        x:2,
        y:2,
        rotation:1,
    });
    $('#fpAnimswapImgFP12').hover(function(){
        $(this).trigger('startRumble'); 
    }, function(){
        $(this).trigger('stopRumble');
    });
    })
    </script>
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
    .abgne-yahoo-slide .title h3 {
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
// 背景區塊的透明度 
    var _opacity = .6;
    $(function(){
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
A:hover {text-decoration: underline; font-weight: bold}
    A{text-decoration: none}
    body,td,th {
    font-family: "微軟正黑體";
    font-size: 10px;
    }
    body {
    background-image: url(../../../../jpg/bgbank/basic.png);
    background-repeat: repeat-x;
    background-color: #F2F2F2;
    }
    #glideDiv0 {
    position:fixed;
    top:0;
    left:0;
    width:100%;
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

    <div align="center">
        <div>
            <div id="wrap_outer"></div>

            <div id="glideDiv0" style="border: 0 solid #FFFFFF; z-index:1001">
                <table border="0" width="100%" cellspacing="0" cellpadding="0" height="55">
                    <tr>
                        <td background="../naviwhite/naviback.png" align="center">
                            <table border="0" width="961" cellspacing="0" cellpadding="0" height="55">
                                <tr>
                                    <td align="center" width="250">
                                        <p align="left"><font size="2" face="微軟正黑體"><a onmouseover="var img=document['fpAnimswapImgFP12'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP12'].src=document['fpAnimswapImgFP12'].imgRolln" href="javascript:void(0)"><img src="../naviwhite/airstage.png" alt="" border="0" align="middle" lowsrc="../naviwhite/airstage2.png" id="fpAnimswapImgFP12" dynamicanimation="fpAnimswapImgFP12"></a><img src="../naviwhite/nsysu.png" alt="" border="0" align="middle"></font></p>
                                    </td>

                                    <td align="center" width="554" valign="top">
                                        <div align="left">
                                            <table border="0" width="454" cellspacing="0" cellpadding="0" height="47">
                                                <tr>
                                                    <td align="center" valign="bottom">
                                                        <table border="0" width="39%" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td><a onmouseover="var img=document['fpAnimswapImgFP13'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP13'].src=document['fpAnimswapImgFP13'].imgRolln" href="http://www.airstage.com.tw"><img src="../naviwhite/b01.png" alt="" width="86" height="35" border="0" lowsrc="../naviwhite/b0103.png" id="fpAnimswapImgFP13" dynamicanimation="fpAnimswapImgFP13"></a></td>

                                                                <td><a onmouseover="var img=document['fpAnimswapImgFP14'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP14'].src=document['fpAnimswapImgFP14'].imgRolln" href="http://www.airstage.com.tw/nsysu/airs/page/airstab/app/column/"><img src="../naviwhite/b0202.png" alt="" width="86" height="35" border="0" lowsrc="../naviwhite/b0203.png" id="fpAnimswapImgFP14" dynamicanimation="fpAnimswapImgFP14"></a></td>

                                                                <td><a onmouseover="var img=document['fpAnimswapImgFP15'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP15'].src=document['fpAnimswapImgFP15'].imgRolln" href="javascript:void(0)"><img src="../naviwhite/b03.png" alt="" width="86" height="35" border="0" lowsrc="../naviwhite/b0303.png" id="fpAnimswapImgFP15" dynamicanimation="fpAnimswapImgFP15"></a></td>

                                                                <td><a onmouseover="var img=document['fpAnimswapImgFP16'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP16'].src=document['fpAnimswapImgFP16'].imgRolln" href="http://www.airstage.com.tw/nsysu/airs/page/airstab/index.php"><img src="../naviwhite/b04.png" alt="" width="86" height="35" border="0" lowsrc="../naviwhite/b0403.png" id="fpAnimswapImgFP16" dynamicanimation="fpAnimswapImgFP16"></a></td>

                                                                <td><a onmouseover="var img=document['fpAnimswapImgFP17'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP17'].src=document['fpAnimswapImgFP17'].imgRolln" href="http://www.airstage.com.tw/nsysu/airs/member/login.php"><img src="../naviwhite/b05.png" alt="" width="86" height="35" border="0" lowsrc="../naviwhite/b0503.png" id="fpAnimswapImgFP17" dynamicanimation="fpAnimswapImgFP17"></a></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>

                                    <td align="center" width="157">
                                        <div align="center">
                                            <table border="0" width="64%" cellspacing="0" cellpadding="0" height="3">
                                                <tr>
                                                    <td><span style="margin-top: 0; margin-bottom: 0"><?php
                                                                                                                                                                                                                                require_once( "loginCheck.php" );
                                                                                                                                                                                                                                ?></span></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>

            <p>&nbsp;</p>
        </div>

        <table border="0" width="980" height="171" cellspacing="0" cellpadding="0">
            <tr>
                <td style="background-image:url(../../../../jpg/bot.png)">
                    <table align="center">
                        <tr>
                            <td width="961" height="345px" valign="top" colspan="2" align="center"><iframe src="window.php" width="961px" height="345px" scrolling="no" style="border:0"></iframe></td>
                        </tr>

                        <tr>
                            <td valign="bottom" height="78" width="75%"><img border="0" src="jpg/cry01.png" width="20" height="50"> <img border="0" style="cursor:pointer" src="jpg/b1.jpg" id="index" onclick="window.location.href='index.php'"> <img border="0" style="cursor:pointer" src="jpg/b202.jpg" width="106" height="58" id="column" onclick="window.location.href='column.php'"> <img border="0" style="cursor:pointer" src="jpg/b3.jpg" id="news"> <img border="0" style="cursor:pointer" src="jpg/b4.jpg" id="school"> <img border="0" style="cursor:pointer" src="jpg/b5.jpg" id="concert"> <img border="0" style="cursor:pointer" src="jpg/b6.jpg" id="clubs"></td>

                            <td height="78" width="25%"><a href="new.php"><img border="0" src="jpg/bb1.png" width="54" height="54" id="write"></a> <a href="javascript:void(0)"><img border="0" src="jpg/bb2.png" width="54" height="54" id="mine"></a> <!--a onmouseover="var img=document['fpAnimswapImgFP34'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP34'].src=document['fpAnimswapImgFP34'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/bb3.png" width="54" height="54" id="fpAnimswapImgFP34" dynamicanimation="fpAnimswapImgFP34" lowsrc="jpg/bb302.png"></a><a onmouseover="var img=document['fpAnimswapImgFP35'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP35'].src=document['fpAnimswapImgFP35'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/bb4.png" width="54" height="54" id="fpAnimswapImgFP35" dynamicanimation="fpAnimswapImgFP35" lowsrc="jpg/bb402.png"></a--></td>
                        </tr>

                        <tr>
                            <td valign="top" height="40" colspan="2">
                                <p align="center"><img border="0" src="jpg/line3.jpg" width="875" height="30" align="top"></p>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <div id="columnfield">
                                    <div>
                                        <table align="left" cellpadding="0" cellspacing="0" border="0px">
                                            <tr>
                                                <td><img border="0" src="jpg/l0.png" /></td>
                                            </tr>

                                            <tr>
                                                <td><img border="0" src="jpg/l01.png" id="sch_link" /></td>
                                            </tr>

                                            <tr>
                                                <td><img border="0" src="jpg/l02.png" id="social_link" /></td>
                                            </tr>

                                            <tr>
                                                <td><img border="0" src="jpg/l3.png" /></td>
                                            </tr>

                                            <tr>
                                                <td><img border="0" src="jpg/l04.png" id="work_link" /></td>
                                            </tr>

                                            <tr>
                                                <td><img border="0" src="jpg/l05.png" id="course_link" /></td>
                                            </tr>

                                            <tr>
                                                <td><img border="0" src="jpg/l06.png" id="comp_link" /></td>
                                            </tr>

                                            <tr>
                                                <td><img border="0" src="jpg/l9.png" id="sch_link" /></td>
                                            </tr>

                                            <tr>
                                                <td><img border="0" src="jpg/l07.png" id="occu_link" /></td>
                                            </tr>

                                            <tr>
                                                <td><img border="0" src="jpg/l08.png" id="up_link" /></td>
                                            </tr>

                                            <tr>
                                                <td><img border="0" src="jpg/l11.png" /></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr background="../../../../jpg/last.png">
                <td align="center" colspan="2" width="961px">
                    <table align="center" width="961px">
                        <tr>
                            <td height="106" valign="top">
                                <div align="right">
                                    <table border="0" width="51%" height="45">
                                        <tr>
                                            <td align="left" width="116">
                                                <p style="margin-top: 0; margin-bottom: 0"><font color="#FFFFFF" size="2"><a onmouseover="var img=document['fpAnimswapImgFP21'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP21'].src=document['fpAnimswapImgFP21'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/index.htm"><img border="0" src="../../../../mo/jpg/b3.jpg" width="61" height="24" id="fpAnimswapImgFP21" dynamicanimation="fpAnimswapImgFP21" lowsrc="../../../../mo/jpg/b302.jpg" align="right"></a><a onmouseover="var img=document['fpAnimswapImgFP22'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP22'].src=document['fpAnimswapImgFP22'].imgRolln" target="_parent" href="https://www.facebook.com/pages/Airstage西灣人中山人的校園互動平台/356803227687619"><img border="0" src="../../../../mo/jpg/b0.jpg" width="31" height="24" id="fpAnimswapImgFP22" dynamicanimation="fpAnimswapImgFP22" lowsrc="../../../../mo/jpg/b002.jpg" align="right"></a></font></p>
                                            </td>

                                            <td align="left" width="68">
                                                <p style="margin-top: 0; margin-bottom: 0"><a onmouseover="var img=document['fpAnimswapImgFP23'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP23'].src=document['fpAnimswapImgFP23'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/02.htm"><font color="#FFFFFF" size="2"><img border="0" src="../../../../mo/jpg/b1.jpg" width="62" height="24" id="fpAnimswapImgFP23" dynamicanimation="fpAnimswapImgFP23" lowsrc="../../../../mo/jpg/b102.jpg" align="left"></font></a></p>
                                            </td>

                                            <td align="left" width="109">
                                                <p style="margin-top: 0; margin-bottom: 0"><a onmouseover="var img=document['fpAnimswapImgFP24'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP24'].src=document['fpAnimswapImgFP24'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/03.htm"><font color="#FFFFFF" size="2"><img border="0" src="../../../../mo/jpg/b2.jpg" width="61" height="24" id="fpAnimswapImgFP24" dynamicanimation="fpAnimswapImgFP24" lowsrc="../../../../mo/jpg/b202.jpg" align="left"></font></a></p>
                                            </td>

                                            <td align="left" valign="bottom">
                                                <p style="margin-top: 0; margin-bottom: 0"><a onmouseover="var img=document['fpAnimswapImgFP25'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP25'].src=document['fpAnimswapImgFP25'].imgRolln" target="_parent" href="http://www.airstage.com.tw"><font color="#FFFFFF" size="2"><img border="0" src="../../../../mo/jpg/b4.jpg" width="124" height="30" id="fpAnimswapImgFP25" dynamicanimation="fpAnimswapImgFP25" lowsrc="../../../../mo/jpg/b402.jpg" align="left"></font></a></p>
                                            </td>

                                            <td align="left" width="31">&nbsp;</td>
                                        </tr>
                                    </table>
                                </div>

                                <p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
