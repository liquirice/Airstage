<?php session_start(); 
if(isset($_SESSION['name']) == false){
	$_SESSION['name'] = "";
}
?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<title>│Airstage 西灣人│實驗室</title>
<style fprolloverstyle>A:hover {text-decoration: underline; font-weight: bold}
</style>
<script language="JavaScript" fptype="dynamicanimation">
<!--
function dynAnimation() {}
function clickSwapImg() {}
//-->
</script>
<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script language="javascript" type="text/javascript" src="../../../../plugin/shadowbox/shadowbox.js"></script>
<script language="javascript" type="text/javascript" src="../../../../plugin/jrumble/jquery.jrumble.1.3.min.js"></script>
<script type="text/javascript">
	Shadowbox.init({
		players : ['html'],
		overlayColor: "#FFFFFF",
	});
	$(function(){
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
	});
</script>
<link rel="stylesheet" type="text/css" href="../../../../plugin/shadowbox/shadowbox.css">
<base target="_parent">
<script language="JavaScript">
<!--
function FP_changeProp() {//v1.0
 var args=arguments,d=document,i,j,id=args[0],o=FP_getObjectByID(id),s,ao,v,x;
 d.$cpe=new Array(); if(o) for(i=2; i<args.length; i+=2) { v=args[i+1]; s="o"; 
 ao=args[i].split("."); for(j=0; j<ao.length; j++) { s+="."+ao[j]; if(null==eval(s)) { 
  s=null; break; } } x=new Object; x.o=o; x.n=new Array(); x.v=new Array();
 x.n[x.n.length]=s; eval("x.v[x.v.length]="+s); d.$cpe[d.$cpe.length]=x;
 if(s) eval(s+"=v"); }
}

function FP_getObjectByID(id,o) {//v1.0
 var c,el,els,f,m,n; if(!o)o=document; if(o.getElementById) el=o.getElementById(id);
 else if(o.layers) c=o.layers; else if(o.all) el=o.all[id]; if(el) return el;
 if(o.id==id || o.name==id) return o; if(o.childNodes) c=o.childNodes; if(c)
 for(n=0; n<c.length; n++) { el=FP_getObjectByID(id,c[n]); if(el) return el; }
 f=o.forms; if(f) for(n=0; n<f.length; n++) { els=f[n].elements;
 for(m=0; m<els.length; m++){ el=FP_getObjectByID(id,els[n]); if(el) return el; } }
 return null;
}
// -->
</script>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="dynAnimation()" language="Javascript1.2">

<div align="center">
	<table border="0" width="980" height="693" cellspacing="0" cellpadding="0">
		<tr>
        	<td width="38" background="../../../../jpg/top0201.jpg"></td>
        	<td height="43" width="99" background="../../../../jpg/top0202.jpg" align="right"><p style="margin-top: 0; margin-bottom: 0"><a href="http://www.airstage.com.tw/"><img src="jpg/logo.png" name="logo" id="logo" align="left" /></a></td>
			<td height="75" background="../../../../jpg/top0202.jpg" width="700" valign="top">
  			
			<font color="#FFFFFF">
			<a onMouseOver="var img=document['fpAnimswapImgFP9'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP9'].src=document['fpAnimswapImgFP9'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/index.htm"><img border="0" src="../../../../jpg/calendar_button01.jpg" width="89" height="75" id="fpAnimswapImgFP9" name="fpAnimswapImgFP9" dynamicanimation="fpAnimswapImgFP9" lowsrc="../../../../jpg/calendar_button02.jpg"></a></font></a><font color="#FFFFFF"><img border="0" src="../../../../jpg/wh.jpg" width="20" height="75"><a href="http://www.airstage.com.tw/nsysu/airs/page/airstab/index.htm"><img border="0" src="../../../../jpg/airstab_button02.jpg" width="89" height="75"></a></font></td>
			<td background="../../../../jpg/top0203.jpg" width="124" valign="middle"><span style="margin-top: 0; margin-bottom: 0">
			  <?php
				if($_SESSION['name'] == ""){
            	echo '<a LANGUAGE="VBScript" TARGET="screen" onClick="screen.location.href =\'main.htm\'" href="../../../../member/login.php"  style="border:0 none; text-decoration:none; font-weight:700" id="login" rel="shadowbox; width=330; height=350" title=\'會員登入\'>
			<font color="#000000" size="2">會員登入</font></a>';
				}
				else if($_SESSION['name'] != ""){
					echo '<a href="correct.php" style="border:0; color:#000000; font-size:14px"><b>'.$_SESSION['name'].'</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="../../../../member/logout.php" style="border:0; color:#000000; font-size:14px"><b>登出</b></a>';
				}
			?>
			</span></td>
			
           
		</tr>
		<tr>
			<td height="450" background="jpg/screen.jpg" colspan="4">
			<table border="0" width="100%">
				<tr>
					<td colspan="3" height="44">
			<object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj8" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="4" height="35" align="left">
				<param name="movie">
				<param name="quality" value="High">
				<param name="menu" value="false">
				<param name="wmode" value="transparent">
				<embed pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj8" width="4" height="35" quality="High" menu="false" wmode="transparent"></object>
			<object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj7" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="198" height="35" align="left">
				<param name="movie" value="../../../../swf/broadcast.swf">
				<param name="quality" value="High">
				<param name="menu" value="false">
				<param name="wmode" value="transparent">
				<embed src="../../../../swf/broadcast.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj7" width="198" height="35" quality="High" menu="false" wmode="transparent"></object>
					</td>
				</tr>
				<tr>
					<td width="17%">&nbsp;
					</td>
					<td width="68%">
					<p align="center">
			<iframe name="screen" marginwidth="1" marginheight="1" height="386" width="639" scrolling="no" border="0" frameborder="0" src="coming.htm" style="z-index:-1">
			您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe>
					</td>
					<td width="14%">&nbsp;</td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td height="244" background="jpg/con1.jpg" colspan="4">
			<table border="0" width="100%" height="223">
				<tr>
					<td width="225" rowspan="2">
			<table border="0" width="104%" height="238">
				<tr>
					<td height="65" align="left" width="38%">
		<p style="margin-top: 0; margin-bottom: 0" align="left">&nbsp;
</p>
					</td>
					<td height="65" align="left" width="57%">
		<div style="width: 107px; height: 67px; visibility: visible" id="b1" onClick="FP_changeProp(/*id*/'left',0,'style.visibility','visible')">
			<font color="#FFFFFF">
					<a onMouseOver="var img=document['fpAnimswapImgFP12'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP12'].src=document['fpAnimswapImgFP12'].imgRolln" target="black" href="epi/big.htm">
					<img border="0" src="jpg/button5.png" width="71" height="65" id="fpAnimswapImgFP12" name="fpAnimswapImgFP12" dynamicanimation="fpAnimswapImgFP12" lowsrc="jpg/button6.png" align="left"></a></font></div>
					</td>
				</tr>
				<tr>
					<td colspan="2"><font color="#FFFFFF">
					<a onMouseOver="var img=document['fpAnimswapImgFP10'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP10'].src=document['fpAnimswapImgFP10'].imgRolln" target="_parent" href="index.htm">
					<img border="0" src="jpg/button5.png" width="77" height="65" id="fpAnimswapImgFP10" name="fpAnimswapImgFP10" dynamicanimation="fpAnimswapImgFP10" lowsrc="jpg/button6.png" align="right"></a></font></a><a href="../../../callendar/box/jex8.htm"><font color="#FFFFFF"> 
</font></a><font color="#FFFFFF">&nbsp;</font></td>
				</tr>
				<tr>
					<td height="94" colspan="2">
					<table border="0" width="100%" height="100%">
						<tr>
							<td>&nbsp;</td>
							<td width="120" valign="top">
							<p align="left"><font color="#FFFFFF">
					<a onMouseOver="var img=document['fpAnimswapImgFP11'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP11'].src=document['fpAnimswapImgFP11'].imgRolln" LANGUAGE="VBScript" TARGET="screen" onClick="screen.location.href ='main.htm'" rel="shadowbox; width=330; height=350" href="./po/index.htm" title="新增影片" style="cursor:pointer">
					<img border="0" src="jpg/button5.png" width="64" height="66" id="fpAnimswapImgFP11" name="fpAnimswapImgFP11" dynamicanimation="fpAnimswapImgFP11" lowsrc="jpg/button6.png" align="left"></a></font></td>
						</tr>
					</table>
					</td>
				</tr>
			</table>
					</td>
					<td height="227">
					<iframe name="black" width="720" height="118" marginwidth="1" marginheight="1" scrolling="no" border="0" frameborder="0" src="epi/big.htm" target="screen">
					您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td background="../../../../jpg/bot.jpg" colspan="4">
			<div align="center">
				<table border="0" width="57%" cellspacing="1" height="165">
					<tr>
						<td>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;
						</p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
		<img border="0" src="../../../../jpg/hor.jpg" width="643" height="10"></p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;
						</p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						<a name="01" href="http://www.airstage.com.tw/nsysu/airs/page/airstab/app/theater/index.htm#top">
						<img border="0" src="../../../callendar/jpg/t1.jpg" width="113" height="20"></a></p></td>
					</tr>
					<tr>
						<td>
						<iframe name="I1" width="659" height="550" marginwidth="1" marginheight="1" scrolling="no" border="0" frameborder="0" src="box/box001.htm">
						您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe></td>
					</tr>
					<tr>
						<td>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;
		</p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
		<img border="0" src="../../../../jpg/hor.jpg" width="643" height="10"></p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;
		</p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
		<a name="02" href="http://www.airstage.com.tw/nsysu/airs/page/airstab/app/theater/index.htm#top">
						<img border="0" src="../../../callendar/jpg/t2.jpg" width="129" height="20"></a></p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;
		</p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						<iframe name="I7" width="659" height="197" marginwidth="1" marginheight="1" scrolling="no" border="0" frameborder="0" src="box/box002.htm">
						您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe>
						</p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;
		</p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
		<img border="0" src="../../../../jpg/hor.jpg" width="643" height="10"></p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
		<a name="03" href="http://www.airstage.com.tw/nsysu/airs/page/airstab/app/theater/index.htm#top">
						<img border="0" src="../../../callendar/jpg/t3.jpg" width="177" height="20"></a></p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;
		</p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						<iframe name="I6" width="659" height="197" marginwidth="1" marginheight="1" scrolling="no" border="0" frameborder="0" src="box/box003.htm">
						您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe>
						</p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
		<img border="0" src="../../../../jpg/hor.jpg" width="643" height="10"></p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						<a name="04" href="http://www.airstage.com.tw/nsysu/airs/page/airstab/app/theater/index.htm#top">
						<img border="0" src="../../../callendar/jpg/t4.jpg" width="177" height="20"></a></p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;
						</p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						<iframe name="I2" width="659" height="378" marginwidth="1" marginheight="1" scrolling="no" border="0" frameborder="0" src="box/box004.htm">
						您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe></p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						&nbsp;<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
		<img border="0" src="../../../../jpg/hor.jpg" width="643" height="10"><p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						&nbsp;<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						<a name="05" href="http://www.airstage.com.tw/nsysu/airs/page/airstab/app/theater/index.htm#top">
						<img border="0" src="../../../callendar/jpg/t5.jpg" width="153" height="20"></a><p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						&nbsp;<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						<iframe name="I5" width="659" height="197" marginwidth="1" marginheight="1" scrolling="no" border="0" frameborder="0" src="box/box005.htm">
						您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;
		</p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;
		</p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
		<img border="0" src="../../../../jpg/hor.jpg" width="643" height="10"></p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;
						</p></td>
					</tr>
					</table>
			</div>
			</td>
		</tr>
		<tr>
			<td height="106" background="../../jpg/lastbar.jpg" colspan="4">
			<object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj3" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="980" height="106" align="middle">
				<param name="movie" value="../../../../swf/lastbar.swf">
				<param name="quality" value="Best">
				<param name="loop" value="false">
				<param name="menu" value="false">
				<embed src="../../../../swf/lastbar.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj3" width="980" height="106" quality="Best" loop="false" menu="false"></object>
			</td>
		</tr>
	</table>
</div>

</body>

</html>