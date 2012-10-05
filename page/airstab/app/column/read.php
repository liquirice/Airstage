<?php
session_start();
include('../../../../conn.php');
$rno = $_GET['rno'];
$get = 'SELECT * FROM `Col` WHERE rno = '.$rno.' LIMIT 1';
$result = mysqli_query($conn, $get);
$getresult = mysqli_fetch_array($result);
$time = explode(' ', ''.$getresult['uploadtime'].'');
$member = 'SELECT * FROM `Member` WHERE stu_id = "'.$getresult['stu_id'].'" LIMIT 1';
$membertemp = mysqli_query($conn, $member);
$getmember = mysqli_fetch_array($membertemp);
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
				<table border="0" width="98%" cellspacing="0" cellpadding="0">
					<tr>
						<td valign="top" height="151" colspan="2">
						<div align="center">
							<p align="center" style="margin-top: 0; margin-bottom: 0">
							<font size="2">
							<iframe name="I1" src="main2.htm" scrolling="no" border="0" frameborder="0" marginwidth="1" marginheight="1" width="963" height="141">
							您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe></font></p>
						</div>
						</td>
					</tr>
					<tr>
						<td valign="bottom" height="84" width="75%">
						<img border="0" src="jpg/cry01.png" width="35" height="50"><a onMouseOver="var img=document['fpAnimswapImgFP26'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP26'].src=document['fpAnimswapImgFP26'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b1.jpg" id="fpAnimswapImgFP26" name="fpAnimswapImgFP26" dynamicanimation="fpAnimswapImgFP26" lowsrc="jpg/b102.jpg"></a><a onMouseOver="var img=document['fpAnimswapImgFP27'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP27'].src=document['fpAnimswapImgFP27'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b202.jpg" width="106" height="58" id="fpAnimswapImgFP27" name="fpAnimswapImgFP27" dynamicanimation="fpAnimswapImgFP27" lowsrc="jpg/b202.jpg"></a><a onMouseOver="var img=document['fpAnimswapImgFP28'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP28'].src=document['fpAnimswapImgFP28'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b3.jpg" id="fpAnimswapImgFP28" name="fpAnimswapImgFP28" dynamicanimation="fpAnimswapImgFP28" lowsrc="jpg/b302.jpg"></a><a onMouseOver="var img=document['fpAnimswapImgFP29'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP29'].src=document['fpAnimswapImgFP29'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b4.jpg" id="fpAnimswapImgFP29" name="fpAnimswapImgFP29" dynamicanimation="fpAnimswapImgFP29" lowsrc="jpg/b402.jpg"></a><a onMouseOver="var img=document['fpAnimswapImgFP30'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP30'].src=document['fpAnimswapImgFP30'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b5.jpg" id="fpAnimswapImgFP30" name="fpAnimswapImgFP30" dynamicanimation="fpAnimswapImgFP30" lowsrc="jpg/b502.jpg"></a><a onMouseOver="var img=document['fpAnimswapImgFP31'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP31'].src=document['fpAnimswapImgFP31'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b6.jpg" id="fpAnimswapImgFP31" name="fpAnimswapImgFP31" dynamicanimation="fpAnimswapImgFP31" lowsrc="jpg/b602.jpg"></a></td>
						<td height="84" width="25%">
						<a onMouseOver="var img=document['fpAnimswapImgFP32'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP32'].src=document['fpAnimswapImgFP32'].imgRolln" href="javascript:void(0)">
						<img border="0" src="jpg/bb1.png" width="54" height="54" id="fpAnimswapImgFP32" name="fpAnimswapImgFP32" dynamicanimation="fpAnimswapImgFP32" lowsrc="jpg/bb102.png"></a><a onMouseOver="var img=document['fpAnimswapImgFP33'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP33'].src=document['fpAnimswapImgFP33'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/bb2.png" width="54" height="54" id="fpAnimswapImgFP33" name="fpAnimswapImgFP33" dynamicanimation="fpAnimswapImgFP33" lowsrc="jpg/bb202.png"></a><a onMouseOver="var img=document['fpAnimswapImgFP34'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP34'].src=document['fpAnimswapImgFP34'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/bb3.png" width="54" height="54" id="fpAnimswapImgFP34" name="fpAnimswapImgFP34" dynamicanimation="fpAnimswapImgFP34" lowsrc="jpg/bb302.png"></a><a onMouseOver="var img=document['fpAnimswapImgFP35'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP35'].src=document['fpAnimswapImgFP35'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/bb4.png" width="54" height="54" id="fpAnimswapImgFP35" name="fpAnimswapImgFP35" dynamicanimation="fpAnimswapImgFP35" lowsrc="jpg/bb402.png"></a></td>
					</tr>
					<tr>
						<td valign="top" height="45" colspan="2">
						<p align="center">
						<img border="0" src="jpg/line3.jpg" width="875" height="30" align="top"></td>
					</tr>
					<tr>
						<td align="center" colspan="2">
										<table border="0" width="88%" cellspacing="0" cellpadding="0" style="font-family: PMingLiU; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; ">
											<tr>
												<td width="80%">
												<p align="left">
												<b>
												<font face="微軟正黑體" color="#830B0B" style="font-size: 15pt">
												<?php echo ''.$getresult['title'].'';?></font></b><p align="left">
												<span style="color: rgb(116, 116, 116); font-family: 微軟正黑體; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255); ">
												<?php echo ''.$time[0].''; ?>　</span><span style="color: rgb(116, 116, 116); font-family: 微軟正黑體; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none; ">撰文者：<?php echo ''.$getmember['department'].''.$getmember['grade'].'級  '.$getmember['name'].''; ?></span></td>
												<td width="10%" valign="bottom">
												&nbsp;<div class="fb-like" data-href="http://www.airstage.com.tw/nsysu/airs/page/airstab/app/column/read.php?rno=<?php echo ''.$rno.''; ?>" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false"></div></td>
												<td width="10%">
												<a href="https://www.facebook.com/dialog/feed?app_id=209856362473286&link=http://www.airstage.com.tw/nsysu/airs/page/airstab/app/column/read.php?rno=<?php echo ''.$rno.''; ?>&picture=http://www.airstage.com.tw/nsysu/airs/page/airstab/jpg/b301.jpg&name=<?php echo ''.$getresult['title'].''; ?>&caption=Airstage&nbsp;西灣人|Airs專欄：從校園影響力開始&redirect_uri=http://www.airstage.com.tw/nsysu/airs/page/airstab/app/column/read.php?rno=<?php echo ''.$rno.''; ?>"><img border="0" src="jpg/share.png" width="66" height="67"></a></td>
											</tr>
											<tr>
												<td background="http://www.airstage.com.tw/nsysu/airs/page/airstab/app/column/jpg/gline.png" colspan="3">&nbsp;
												</td>
											</tr>
											<tr>
												<td colspan="3" style="font-size:13px; font:微軟正黑體">
                                                <?php echo ''.$getresult['realcontent'].''; ?>
												<table border="0" width="48%" height="146">
													<tr>
														<td background="jpg/box_writer.png" width="402" height="187" align="right">
														<table border="0" width="100%" cellspacing="0" cellpadding="0" height="93">
															<tr>
																<td width="50%" align="center" rowspan="2">
																<table border="0" width="56%" cellpadding="4" cellspacing="4">
																	<tr>
																		<td style="border: 1px solid #CCCCCC">
																		<img border="0" src="jpg/head.jpg" width="143" height="143"></td>
																	</tr>
																</table>
																</td>
																<td valign="top" colspan="2">
																<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
																<b>
																<font face="微軟正黑體" color="#0088AA">
																關於<?php echo ''.$getmember['name'].''; ?></font></b></p>
																<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
																<b>
																<font face="微軟正黑體" color="#484848" style="font-size: 10pt">
																<?php echo ''.$getmember['department'].''.$getmember['grade'].'級'; ?></font></b></p>
																<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
																<b>
																<font face="微軟正黑體" color="#484848" style="font-size: 10pt">
																中山颺韻合唱團團長</font></b></p>
																<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
																<b>
																<font face="微軟正黑體" color="#484848" style="font-size: 10pt">
																中山大學學生會權益部次長</font></b></td>
															</tr>
															<tr>
																<td height="10" align="right" valign="bottom" width="46%">
																<img border="0" src="jpg/more.png" width="40" height="10" align="right"></td>
																<td height="10" align="right" valign="bottom" width="4%">
																</td>
															</tr>
														</table>
														</td>
													</tr>
												</table>
												<p>&nbsp;</td>
											</tr>
											<tr>
												<td colspan="3" background="http://www.airstage.com.tw/nsysu/airs/page/airstab/app/column/jpg/gline.png" height="30">&nbsp;
												</td>
											</tr>
											<tr>
												<td colspan="3" height="49">
												<div class="fb-like" data-href="http://www.airstage.com.tw/nsysu/airs/page/airstab/app/column/read.php?rno=<?php echo ''.$rno.''; ?>" data-send="false" data-width="450" data-show-faces="true"></div></td>
											</tr>
											<tr>
												<td colspan="3">
												&nbsp;<div class="fb-comments" data-href="http://www.airstage.com.tw/nsysu/airs/page/airstab/app/column/read.php?rno=<?php echo ''.$rno.''; ?>" data-num-posts="2" data-width="840"></div></td>
											</tr>
										</table>
										<br class="Apple-interchange-newline">
&nbsp;&nbsp;</td>
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
<div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>

</html>