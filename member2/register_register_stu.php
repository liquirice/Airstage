<?php
	session_start();
	if( isset($_SESSION['stu_id']) || isset($_SESSION['name']) || isset($_SESSION['auth']) ) {
		echo '<script type="text/javascript">alert("你已經是會員囉!"); location.href="../index.php"</script>';
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
<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" language="javascript" src="../plugin/fancyValidate/fancyValidate.min.js"></script>
<script type="text/javascript" language="javascript" src="../plugin/fancyValidate/fancyValidate.additional.min.js"></script>
<script src="../plugin/fancyValidate/external/jquery.qtip/jquery.qtip.min.js">
</script>
<link rel="stylesheet" type="text/css" href="../plugin/fancyValidate/examples/css/example.css" />
<link rel="stylesheet" type="text/css" href="../plugin/fancyValidate/css/fancyValidate.css" />
<link href="../plugin/fancyValidate/external/jquery.qtip/jquery.qtip.min.css" rel="stylesheet" />
<script type="text/javascript" language="javascript">
$f.dom.ready(function() {
  $f("form", {
	  rules:{
		  username:{
			  required:1
		  },
		  psw:{
			  required:1
		  },
		  psw2:{
			  required:1,compareTo:"psw",
		  },
		  name:{
			  required:1,
		  },
		  stu_id:{
			  required:1,
			  pattern:/^[A-Za-z0-9]+$/,
			  rangelength:[10,10],
		  },
		  gender:{
			  required:1
		  },
		  email:{
			  required:1,email:1,
		  },
		  department:{
			  required:1
		  },
		  grade:{
			  required:1
		  },

	  },
	  messages:{
		  username:{
			  required:"必填項目",
		  },
		  psw:{
			  required:"必填項目",
		  },
		  psw2:{
			  required:"必填項目", compareTo:"密碼有誤",
		  },
		  name:{
			  required:"必填項目",
		  },
		  stu_id:{
			  required:"必填項目",
			  pattern:"格式有誤",
			  rangelength:"學號格式有誤！",
		  },
		  gender:{
			  required:"必填項目",
		  },
		  email:{
			  required:"此欄位不能為空！",
		  },
		  department:{
			  required:" ",
		  },
		  grade:{
			  required:" ",
		  },
	  },
	  
  });
});
</script>
<style type="text/css">
body {
	background-image: url(../jpg/background.png);
	background-repeat: repeat-x;
	background-color: #F2F2F2;
}
.th_font {
	font-style:'微軟正黑體';
	font-size:14px;
	font-family: "Times New Roman";
}
</style>
</head>

<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('jpg/bb202.png','jpg/b402.png','jpg/b102.png')">
<?php require("../model/navi.php") ?>
<div align="center">
	<table border="0" width="980" height="146" cellspacing="0" cellpadding="0" style="color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">
	  <tr>
			<td background="http://www.airstage.com.tw/nsysu/airs/jpg/bot.png" valign="top">

<img src="../jpg/cry.png" alt="" width="82" height="16">
<div align="center">
	<table border="0" width="963" cellspacing="0" cellpadding="0" height="535">
		<tr>
			<td background="jpg/back.png" width="980" valign="top">
			<div align="center">
&nbsp;
<table border="0" width="45%" cellspacing="0" cellpadding="0" height="455">
					<tr>
						<td colspan="3" background="jpg/bar.png">
						<p align="center"><a href="register_law.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','jpg/b102.png',1)"><img src="jpg/b1.png" alt="使用條款" name="Image7" width="95" height="41" border="0"></a><img border="0" src="jpg/b203.png" width="95" height="41"><img border="0" src="jpg/b3.png" width="95" height="41"><a href="register_log.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('999','','jpg/b402.png',1)"><img src="jpg/b4.png" alt="會員登入" name="Image6" width="95" height="41" border="0"></a></td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td width="399" height="395" background="jpg/box_register.png" valign="top">
						<div align="center">
							<table border="0" width="85%" cellspacing="0" cellpadding="0" height="389">
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td height="307" valign="top" style="text-align:center; color: #06C;">
									<div><form method="post" action="m2new.php" id="form">
                                    
									  <table border="0">
									    <tr>
									      <td width="60" align="right" valign="top" class="th_font" scope="row">學號</td>
									      <td width="10" align="right" class="th_font" scope="row">&nbsp;</td>
									      <td width="240"><input type="text" name="stu_id" id="stu_id" value=""  placeholder="認證依據，請據實填寫" /></td>
								        </tr>
									    <tr>
									      <td width="60" align="right" valign="top" class="th_font" scope="row">密碼</td>
									      <td width="10" align="right" class="th_font" scope="row">&nbsp;</td>
									      <td width="240"><input type="password" name="psw" id="psw" value="" /></td>
								        </tr>
									    <tr>
									      <td width="60" align="right" valign="top" class="th_font" scope="row">確認密碼</td>
									      <td width="10" align="right" class="th_font" scope="row">&nbsp;</td>
									      <td width="240"><input type="password" name="psw2" id="psw2" value="" /></td>
								        </tr>
									    <tr>
									      <td width="60" align="right" valign="top" class="th_font" scope="row">姓名</td>
									      <td width="10" align="right" class="th_font" scope="row">&nbsp;</td>
									      <td width="240"><input type="text" name="name" id="name" value="" placeholder="請填入真實姓名" /></td>
								        </tr>
									    <tr>
									      <td width="60" align="right" valign="top" class="th_font" scope="row">暱稱</td>
									      <td width="10" align="right" class="th_font" scope="row">&nbsp;</td>
									      <td width="240"><input type="text" name="username" id="username" value="" /></td>
								        </tr>
									    <tr>
									      <td width="60" align="right" valign="top" class="th_font" scope="row">系級</td>
									      <td width="10" align="right" class="th_font" scope="row">&nbsp;</td>
									      <td width="240" style="font:微軟正黑體; font-size:12px"><select name="department" id="department">
				<option value="" checked>請選擇</option>
				<option disabled>【 　文學院 　】</option>
							  <option value="中文系">中文系</option>
							  <option value="外文系">外文系</option>
							  <option value="劇藝系">劇藝系</option>
							  <option value="音樂系">音樂系</option>
							  <option value="文院碩博士">文院碩博士</option>
							  
							  <option disabled>【 　社科院 　】</option>
							  <option value="政經系">政經系</option>
							  <option value="社會系">社會系</option>
							  <option value="社科院碩博士">社科院碩博士</option>
							 
							  <option disabled>【 　理學院 　】</option>
							  <option value="應數系">應數系</option>
							  <option value="化學系">化學系</option>
							  <option value="物理系">物理系</option>
							  <option value="生科系">生科系</option>
							  <option value="理院碩博士">理院碩博士</option>
							  
							  <option disabled>【 　工學院 　】</option>
							  <option value="電機系">電機系</option>
							  <option value="機電系">機電系</option>
							  <option value="資工系">資工系</option>
							  <option value="材光系">材光系</option>
                              <option value="光電系">光電系</option>
							  <option value="工學院碩博士">工學院碩博士</option>
							  
							  <option disabled>【 　管學院 　】</option>
							  <option value="企管系">企管系</option>
							  <option value="財管系">財管系</option>
							  <option value="資管系">資管系</option>
							  <option value="管學院碩博士">管學院碩博士</option>
							  
							  <option disabled>【 　海科院 　】</option>
							  <option value="海科系">海科系</option>
							  <option value="海資系">海資系</option>
							  <option value="海工系">海工系</option>
							  <option value="海科院碩博士">海科院碩博士</option>
							  
			</select>
							        <select name="grade" id="grade" style="width:60px;">
				<option value="">請選擇</option>
				<option value="100">100級</option>
				<option value="101">101級</option>
				<option value="102">102級</option>
				<option value="103">103級</option>
				<option value="104">104級</option>
				<option value="105">105級</option>
			</select></td>
								        </tr>
									    <tr>
									      <td width="60" align="right" valign="top" class="th_font" scope="row">性別</td>
									      <td width="10" align="right" class="th_font" scope="row">&nbsp;</td>
									      <td width="240" style="font-size:14px"><input type="radio" value="男" name="gender" />男&nbsp;&nbsp;<input type="radio" value="女" name="gender" />女</td>
								        </tr>
									    <tr>
									      <td width="60" align="right" valign="top" class="th_font" scope="row">Facebook </td>
									      <td width="10" align="right" class="th_font" scope="row">&nbsp;</td>
									      <td width="240"><input type="text" name="fb_id" style="width:235px;"/></td>
								        </tr>
								      </table>
									  <p><a href="register_mail.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('999','','jpg/bb202.png',1)">
                                      <input type="image" src="jpg/bb2.png" onClick="document.login.submit();"></a></p>
                                    
                                    </form></div>
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
