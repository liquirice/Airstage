<?php
	session_start();
	if( isset($_SESSION['stu_id']) || isset($_SESSION['name']) || isset($_SESSION['auth']) ) {
		echo '<script type="text/javascript">alert("你已經是會員囉!"); location.href="../../index.php"</script>';
	exit();
	}
?>

<html>

<head>
<link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>會員註冊 ─ Airstage 西灣人</title>
<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
app = "none";
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
<style type="text/css">
body {
	background-image: url(../jpg/background.png);
	background-repeat: repeat-x;
	background-color: #F2F2F2;
}
</style>
</head>

<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('jpg/b402.png','jpg/b102.png','jpg/stu102.png','jpg/staf102.png')">
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
						<p align="center"><a href="registerLaw.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','jpg/b102.png',1)"><img src="jpg/b1.png" name="Image7" width="95" height="41" border="0"></a><img border="0" src="jpg/b203.png" width="95" height="41"><img border="0" src="jpg/b3.png" width="95" height="41"><a href="login.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','jpg/b402.png',1)"><img src="jpg/b4.png" alt="會員登入" name="Image6" width="95" height="41" border="0"></a></td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td width="399" height="393" background="jpg/box_choose.png" valign="top">
						<div align="center">
							<table border="0" width="85%" cellspacing="0" cellpadding="0" height="277">
								<tr>
									<td colspan="2">&nbsp;</td>
								</tr>
								<tr>
									<td height="62" valign="top" colspan="2">
									<p align="center">&nbsp;</td>
								</tr>
								<tr>
									<td height="124" width="54%">
								    <p align="center"><a href="registerStudent.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image8','','jpg/stu102.png',1)"><img src="jpg/stu1.png" name="Image8" width="123" height="99" border="0"></a></td>
									<td height="124" width="46%"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image9','','jpg/staf102.png',1)"><img src="jpg/staf1.png" name="Image9" width="123" height="99" border="0"></a></td>
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
