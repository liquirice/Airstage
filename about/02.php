<?php session_start(); ?>
<!DOCTYPE HTML>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<title>│Airstage 西灣人│Studio ：我們的工作室！</title>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script language="JavaScript" fptype="dynamicanimation">
var app = "none";
<!--
function dynAnimation() {}
function clickSwapImg() {}
-->
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>

</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="dynAnimation();MM_preloadImages('jpg/man2.png')" language="Javascript1.2">

<div align="center">
	<?php require("../global/navi_white/navi.php"); ?>
	<table border="0" width="980" height="693" cellspacing="0" cellpadding="0">
		<tr>
			<td background="../../jpg/bot.jpg" colspan="2" valign="top">
			<div align="center">
				<table border="0" width="98%" cellspacing="0" cellpadding="0" height="525">
					<tr>
						<td align="left" valign="top">
						<table border="0" width="963" cellspacing="0" cellpadding="0" height="509">
						  <tr>
						    <td height="136" valign="top" align="right"><img src="../../jpg/cry.png" alt="" width="82" height="11"><img src="bluesky.png" width="963" height="304" border="0" usemap="#Map" />
					        </td>
					      </tr>
						  <tr>
						    <td valign="middle"><table border="0" width="922" cellspacing="0" cellpadding="0">
						      <tr>
						        <td width="71"><p style="line-height: 150%; margin-top: 0; margin-bottom: 0">　</td>
						        <td width="246"><p style="line-height: 150%; margin-top: 0; margin-bottom: 0"><b> <font face="微軟正黑體" size="2"><font color="#00CCFF">代　表：</font> 郭宇軒 Eric 
						          Kuo<br>
						          <font color="#00CCFF">系　所：</font> 中山大學企管系103級<br>
						          <font color="#00CCFF">電　話：</font> 0983-628610<br>
						          <font color="#00CCFF">地　址： </font>高雄市鹽埕區富野路<br>
						          <br>
						          <font color="#00CCFF">Skype : </font>darknightshadowwings<br>
						          <font color="#00CCFF">E-mail :</font> shdowwings@gmail.com</font></b></td>
						        <td width="404"><p style="line-height: 150%; margin-top: 0; margin-bottom: 0"> <img src="jpg/02.htm1.jpg" alt="" width="364" height="180" border="0"></td>
						        <td width="201"><p style="line-height: 150%; margin-top: 0; margin-bottom: 0"><a href="https://www.facebook.com/messages/maxwell.darknight" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image10','','jpg/man2.png',1)"><img src="jpg/man.png" name="Image10" width="192" height="197" border="0"></a></td>
					          </tr>
					        </table></td>
					      </tr>
						  <tr>
						    <td>&nbsp;</td>
					      </tr>
						  <tr>
						    <td>&nbsp;</td>
					      </tr>
					    </table></td>
					</tr>
				</table>
				</div>
			</td>
		</tr>
	</table>
</div>


<map name="Map">
  <area shape="rect" coords="384,15,477,49" href="02.php">
  <area shape="rect" coords="282,13,376,48" href="index.php">
  <area shape="rect" coords="487,15,586,45" href="04.php" target="_parent">
  <area shape="rect" coords="591,16,680,46" href="03.php">
</map>
</body>

</html>