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
<html>

<head>
<link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<link rel="stylesheet" type="text/css" href="../../../../plugin/shadowbox/shadowbox.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="../../../../plugin/jrumble/jquery.jrumble.1.3.min.js"></script>
<script type="text/javascript" src="../../../../plugin/shadowbox/shadowbox.js"></script>
<title>│Airstage 西灣人│Airs專欄：從校園影響力開始！</title>
<script language="javascript" type="text/javascript">
$(function(){
	$('a').css('text-decoration', 'none');
	Shadowbox.init({
		players : ['html'],
		overlayColor: "#FFFFFF",
	});
	$('#logo').jrumble({
		x:2,
		y:2,
		rotation:1,
	});
	$('#logo').hover(function(){
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
			}).append($('<div></div>').css({
				height: _descHeight,
				opacity: _opacity
			}).addClass('maskCss')).find('p').css('position', 'absolute');
			
			// 插入一個當做背景用的區塊
			$title.append($('<div></div>').css({
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
<style fprolloverstyle>A:hover {text-decoration: underline; font-weight: bold}
</style>
<script language="JavaScript" fptype="dynamicanimation">
<!--
function dynAnimation() {}
function clickSwapImg() {}
//-->
</script>

</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="dynAnimation()" language="Javascript1.2" background="../../../../jpg/bgbank/basic.png" style="background-attachment: fixed">

<div align="center">
	<table border="0" width="980" height="693" cellspacing="0" cellpadding="0">
  <tr>
			<td width="38" background="../../../../jpg/topbar001.png"></td>
        	<td height="43" width="99" background="../../../../jpg/topbar002.png" align="right"><p style="margin-top: 0; margin-bottom: 0"><a href="../../../../index.php"><img src="../theater/jpg/logo.png" name="logo" id="logo" align="left" /></a></td>
			<td height="75" background="../../../../jpg/topbar002.png" width="700" valign="top"><font color="#FFFFFF"><a onMouseOver="var img=document['fpAnimswapImgFP9'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP9'].src=document['fpAnimswapImgFP9'].imgRolln" target="_parent" href="../../../../index.php"><img border="0" src="../../../../jpg/cal_bot001.png" width="89" height="75" alt="" name="fpAnimswapImgFP9" lowsrc="../../../../jpg/cal_bot002.png" id="fpAnimswapImgFP" dynamicanimation="fpAnimswapImgFP9"></a><img border="0" src="../../../../jpg/topbar002.png" width="20" height="75"><a href="../../index.htm"><img src="../../../../jpg/air_bot002.png" width="89" height="75" border="0"></a></font></td>
			<td background="../../../../jpg/topbar003.png" width="124" valign="middle"><span style="margin-top: 0; margin-bottom: 0">
			<?php
			 	require_once( "loginCheck.php" );
			?>
			</span></td>
		</tr>
		<tr>
			<td background="../../../../jpg/bot.png" valign="top" height="65" colspan="4">
			<div align="center">
				<table border="0" width="98%" height="1659" cellspacing="0" cellpadding="0">
					<tr>
						<td valign="top" height="170" colspan="2">
						<div align="center">
							<p align="center" style="margin-top: 0; margin-bottom: 0">
							<font size="2">
							<iframe name="I1" src="main.htm" scrolling="no" border="0" frameborder="0" marginwidth="1" marginheight="1" width="963" height="330">
							您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe></font></p>
						</div>
						</td>
					</tr>
					<tr>
						<td valign="bottom" height="78" width="75%">
						<img border="0" src="jpg/cry01.png" width="20" height="50"><a onMouseOver="var img=document['fpAnimswapImgFP26'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP26'].src=document['fpAnimswapImgFP26'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b1.jpg" id="fpAnimswapImgFP26" name="fpAnimswapImgFP26" dynamicanimation="fpAnimswapImgFP26" lowsrc="jpg/b102.jpg"></a><a onMouseOver="var img=document['fpAnimswapImgFP27'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP27'].src=document['fpAnimswapImgFP27'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b2.jpg" width="106" height="58" id="fpAnimswapImgFP27" name="fpAnimswapImgFP27" dynamicanimation="fpAnimswapImgFP27" lowsrc="jpg/b202.jpg"></a><a onMouseOver="var img=document['fpAnimswapImgFP28'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP28'].src=document['fpAnimswapImgFP28'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b3.jpg" id="fpAnimswapImgFP28" name="fpAnimswapImgFP28" dynamicanimation="fpAnimswapImgFP28" lowsrc="jpg/b302.jpg"></a><a onMouseOver="var img=document['fpAnimswapImgFP29'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP29'].src=document['fpAnimswapImgFP29'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b4.jpg" id="fpAnimswapImgFP29" name="fpAnimswapImgFP29" dynamicanimation="fpAnimswapImgFP29" lowsrc="jpg/b402.jpg"></a><a onMouseOver="var img=document['fpAnimswapImgFP30'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP30'].src=document['fpAnimswapImgFP30'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b5.jpg" id="fpAnimswapImgFP30" name="fpAnimswapImgFP30" dynamicanimation="fpAnimswapImgFP30" lowsrc="jpg/b502.jpg"></a><a onMouseOver="var img=document['fpAnimswapImgFP31'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP31'].src=document['fpAnimswapImgFP31'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b6.jpg" id="fpAnimswapImgFP31" name="fpAnimswapImgFP31" dynamicanimation="fpAnimswapImgFP31" lowsrc="jpg/b602.jpg"></a></td>
						<td height="78" width="25%">
						<a onMouseOver="var img=document['fpAnimswapImgFP32'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP32'].src=document['fpAnimswapImgFP32'].imgRolln" href="new.php">
						<img border="0" src="jpg/bb1.png" width="54" height="54" id="fpAnimswapImgFP32" name="fpAnimswapImgFP32" dynamicanimation="fpAnimswapImgFP32" lowsrc="jpg/bb102.png"></a><a onMouseOver="var img=document['fpAnimswapImgFP33'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP33'].src=document['fpAnimswapImgFP33'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/bb2.png" width="54" height="54" id="fpAnimswapImgFP33" name="fpAnimswapImgFP33" dynamicanimation="fpAnimswapImgFP33" lowsrc="jpg/bb202.png"></a><a onMouseOver="var img=document['fpAnimswapImgFP34'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP34'].src=document['fpAnimswapImgFP34'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/bb3.png" width="54" height="54" id="fpAnimswapImgFP34" name="fpAnimswapImgFP34" dynamicanimation="fpAnimswapImgFP34" lowsrc="jpg/bb302.png"></a><a onMouseOver="var img=document['fpAnimswapImgFP35'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP35'].src=document['fpAnimswapImgFP35'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/bb4.png" width="54" height="54" id="fpAnimswapImgFP35" name="fpAnimswapImgFP35" dynamicanimation="fpAnimswapImgFP35" lowsrc="jpg/bb402.png"></a></td>
					</tr>
					<tr>
						<td valign="top" height="40" colspan="2">
						<p align="center">
						<img border="0" src="jpg/line3.jpg" width="875" height="30" align="top"></td>
					</tr>
					<tr>
						<td height="285" align="center" colspan="2">
										<?php include('col.php'); ?><br />
										<?php include('sch.php'); ?><br />
										<?php include('news.php'); ?><br />
                                        <?php include('con.php') ?>
										</td>
					</tr>
					<tr>
						<td height="17" align="center" colspan="2">
						</td>
					</tr>
					</table>
			</div>
			</td>
		</tr>
		<tr>
			<td height="106" background="../../../../jpg/last.png" valign="top" colspan="4">
			<div align="right">
				<table border="0" width="51%" height="45">
					<tr>
						<td align="left" width="116">
						<p style="margin-top: 0; margin-bottom: 0">
						<font color="#FFFFFF" size="2">
						<a onMouseOver="var img=document['fpAnimswapImgFP21'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP21'].src=document['fpAnimswapImgFP21'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/index.htm">
			<img border="0" src="../../../../mo/jpg/b3.jpg" width="61" height="24" id="fpAnimswapImgFP21" name="fpAnimswapImgFP21" dynamicanimation="fpAnimswapImgFP21" lowsrc="../../../../mo/jpg/b302.jpg" align="right"></a><a onMouseOver="var img=document['fpAnimswapImgFP22'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP22'].src=document['fpAnimswapImgFP22'].imgRolln" target="_parent" href="https://www.facebook.com/pages/Airstage西灣人中山人的校園互動平台/356803227687619"><img border="0" src="../../../../mo/jpg/b0.jpg" width="31" height="24" id="fpAnimswapImgFP22" name="fpAnimswapImgFP22" dynamicanimation="fpAnimswapImgFP22" lowsrc="../../../../mo/jpg/b002.jpg" align="right"></a></font></td>
						<td align="left" width="68">
						<p style="margin-top: 0; margin-bottom: 0">
						<font color="#FFFFFF" size="2">
						<a onMouseOver="var img=document['fpAnimswapImgFP23'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP23'].src=document['fpAnimswapImgFP23'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/02.htm">
			<img border="0" src="../../../../mo/jpg/b1.jpg" width="62" height="24" id="fpAnimswapImgFP23" name="fpAnimswapImgFP23" dynamicanimation="fpAnimswapImgFP23" lowsrc="../../../../mo/jpg/b102.jpg" align="left"></a></font></td>
						<td align="left" width="109">
						<p style="margin-top: 0; margin-bottom: 0">
						<font color="#FFFFFF" size="2">
						<a onMouseOver="var img=document['fpAnimswapImgFP24'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP24'].src=document['fpAnimswapImgFP24'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/03.htm">
			<img border="0" src="../../../../mo/jpg/b2.jpg" width="61" height="24" id="fpAnimswapImgFP24" name="fpAnimswapImgFP24" dynamicanimation="fpAnimswapImgFP24" lowsrc="../../../../mo/jpg/b202.jpg" align="left"></a></font></td>
						<td align="left" valign="bottom">
						<p style="margin-top: 0; margin-bottom: 0">
						<font color="#FFFFFF" size="2">
						<a onMouseOver="var img=document['fpAnimswapImgFP25'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP25'].src=document['fpAnimswapImgFP25'].imgRolln" target="_parent" href="http://www.airstage.com.tw">
			<img border="0" src="../../../../mo/jpg/b4.jpg" width="124" height="30" id="fpAnimswapImgFP25" name="fpAnimswapImgFP25" dynamicanimation="fpAnimswapImgFP25" lowsrc="../../../../mo/jpg/b402.jpg" align="left"></a></font></td>
						<td align="left" width="31">&nbsp;</td>
					</tr>
				</table>
			</div>
			<p style="margin-top: 0; margin-bottom: 0">&nbsp;</td>
		</tr>
	</table>
</div>

</body>

</html>