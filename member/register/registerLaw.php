<?php
	session_start();
	if( isset($_SESSION['stu_id']) || isset($_SESSION['name']) || isset($_SESSION['auth']) || isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("你已經是會員囉!"); location.href="../../index.php"</script>';
		exit();
	}
?>

<html>

<head>
<link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>使用條款 ─ Airstage 西灣人</title>
<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
var app = "none";
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
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
<style type="text/css">
body {
	background-color: #F2F2F2;
	background-image: url(../jpg/background.png);
	background-repeat: repeat-x;
}
</style>
</head>

<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('jpg/b402.png','jpg/bb102.png')">
<?php require("../../global/navi_white/navi.php") ?>
<div align="center">
	<table border="0" width="980" height="146" cellspacing="0" cellpadding="0" style="color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">
	  <tr>
			<td background="http://www.airstage.com.tw/nsysu/airs/jpg/bot.png" valign="top">

<div align="center">
	<img src="../jpg/cry.png" alt="" width="82" height="16">
	<table border="0" width="963" cellspacing="0" cellpadding="0" height="535">
		<tr>
			<td background="jpg/back.png" width="980" valign="top">
			<div align="center">
&nbsp;<table border="0" width="45%" cellspacing="0" cellpadding="0" height="453">
					<tr>
						<td colspan="3" background="jpg/bar.png">
						<p align="center"> <a href="registerLaw.php"><img border="0" src="jpg/b103.png" width="95" height="41"></a><img border="0" src="jpg/b2.png" width="95" height="41"><img border="0" src="jpg/b3.png" width="95" height="41"><a href="login.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','jpg/b402.png',1)"><img src="jpg/b4.png" alt="會員登入" name="Image6" width="95" height="41" border="0"></a></td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td width="399" height="393" background="jpg/box_law.png" valign="top">
						<div align="center">
							<table border="0" width="85%" cellspacing="0" cellpadding="0" height="362">
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td height="226" valign="top">
									  <p align="center">
									    <iframe name="I1" width="300" height="217" marginwidth="10" marginheight="10" style="border: 1px solid #C0C0C0" border="0" frameborder="0" src="lawcontact.htm" scrolling="yes"> 您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe>
									  </td>
								</tr>
								<tr>
									<td height="45">
									<p align="center"><a href="registerChoose.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('b','','jpg/bb102.png',1)"><img src="jpg/bb1.png" name="b" width="127" height="27" border="0"></a></td>
								</tr>
							</table>
						</div>
						</td>
						<td>&nbsp;</td>
					</tr>
				</table>
			</div>
			</td>
		</tr>
	</table>
</div>

			</td>
		</tr>
		<tr style="background-image:url(../../global/images/last.png)">
			<td><?php require("../../global/footer.php") ?></td>
		</tr>
	</table>
</div>

</body>

</html>
