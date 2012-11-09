<html>
<?php
	session_start();
	if( isset($_SESSION['stu_id']) || isset($_SESSION['name']) || isset($_SESSION['auth']) ) {
		echo '<script type="text/javascript">alert("你已經不是新會員囉!"); location.href="../index.php"</script>';
	exit();
	}

?>
<head>
<link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>會員註冊 ─ Airstage 西灣人</title>
<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
var app = "none";
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
	background-color: #F2F2F2;
	background-image: url(../jpg/background.png);
	background-repeat: repeat-x;
}
A.goBackIndex{
	text-decoration: none;
	border-left-color: #98A850;
	border-bottom-color: #98A850;
	border-right-color: #98A850;
	border-top-color: #98A850;
	background-color: #98A850;
	padding: 5px;
	;
	color: #FFF;
	font-size: 14px;
	text-align: center;
}
</style>
</head>

<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('jpg/b402.png','jpg/b102.png','jpg/bb302.png')">
<?php require("../model/navi.php") ?>
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
&nbsp;<table border="0" width="45%" cellspacing="0" cellpadding="0" height="455">
					<tr>
						<td colspan="3" background="jpg/bar.png">
						<p align="center">
					  <font face="微軟正黑體"><a href="register_law.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','jpg/b102.png',1)"><img src="jpg/b1.png" alt="使用條款" name="Image7" width="95" height="41" border="0"></a><img border="0" src="jpg/b2.png" width="95" height="41"><img border="0" src="jpg/b303.png" width="95" height="41"><a href="register_log.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','jpg/b402.png',1)"><img src="jpg/b4.png" alt="會員登入" name="Image6" width="95" height="41" border="0"></a></font></td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td width="399" height="395" background="jpg/box_mail.png" valign="top">
						<div align="center">
							<table border="0" width="85%" cellspacing="0" cellpadding="0" height="389">
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td height="318" valign="top">
									<p align="center">
									&nbsp;<div align="center">
										<table border="0" width="86%" cellspacing="0" cellpadding="0" height="235" >
											<tr>
												<td height="35">
												<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
												<font face="微軟正黑體"><font color="#676767" size="2">
												</font><font face="微軟正黑體"><b><?php echo $_SESSION['stu_name']; unset($_SESSION['stu_name']); ?></b></font><font color="#676767" size="2">同學：</font></font></td>
											</tr>
											<tr>
												<td height="144" style="vertical-align:text-top;"><!--
												<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
												<font face="微軟正黑體" color="#676767" size="2">
                                                
												註冊的驗證信已寄到學校信箱囉！<br>
												請盡速至<a href="http://student.nsysu.edu.tw/cgi-bin/owmmdir/openwebmail.pl" style="text-decoration: none"><font color="#009999">中山大學學生網路郵局</font></a>收信以驗證學生身分，完成帳號的開啟。<br>
												<br>
												忘記學校信箱密碼嗎？請直接傳FB訊息給</font><font face="微軟正黑體" size="2" color="#009999">服務中心</font><font face="微軟正黑體" color="#676767" size="2">來進行人工驗證。</font></td>
											</tr>
											<tr>
												<td>
												  <p align="center"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image5','','jpg/bb302.png',1)"><img src="jpg/bb3.png" name="Image5" width="127" height="27" border="0"></a>-->
                                                  <p>第一階段註冊程序已經完成囉。<br>
                                                    信箱驗證將於近期開放。                                                    </p>
                                                  <p> <span><a class="goBackIndex" href="../index.php">回首頁</a></span></p>
                                                  </td>
											</tr>
										</table>
									</div>
									</td>
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
		<tr style="background-image:url(../jpg/last.png)">
			<td><?php require("../model/footer.php") ?></td>
		</tr>
	</table>
</div>

</body>

</html>
