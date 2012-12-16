<?php 
	// Last Modified Day : 2012.12.02
	header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
	session_start(); 
	
	if( isset($_SESSION['stu_id']) || isset($_SESSION['name']) || isset($_SESSION['auth']) ) {
		echo '<script type="text/javascript">alert("你已經登入囉!"); location.href="../../index.php"</script>';
		exit();
	}
	
	if( isset($_POST['id']) ) {
	
		require_once( "../../global/connectVar.php" );
		
		$stu_id = mysqli_real_escape_string( $conn, trim($_POST['id']) );
		$pw = sha1( mysqli_real_escape_string( $conn, trim($_POST['pw']) ) );
		
		$query = "SELECT * FROM Member WHERE (username = '$stu_id' OR stu_id = '$stu_id') AND psw = '$pw'";
		$result = mysqli_query( $conn, $query );
		
		if( mysqli_num_rows($result) == 0 ) {
			// NO such account.
			echo '<script type="text/javascript">alert("登入失敗");location.href="./index.php"</script>';
		} else {
			// Write user into session to authenticate.
			$row = mysqli_fetch_array( $result );
	        $_SESSION['stu_id'] = $row['stu_id'];
			$_SESSION['name'] = $row['name']; 
			$_SESSION['auth'] = $row['AUTH'];
			$_SESSION['nick'] = $row['username'];
			setcookie( 'stu_id', $row['stu_id'], time()+(60*60*24*10) );
			setcookie( 'name', $row['name'], time()+(60*60*24*10) );
			setcookie( 'auth', $row['AUTH'], time()+(60*60*24*10) );
			setcookie( 'nick', $row['username'], time()+(60*60*24*10) );
			echo '<script type="text/javascript">alert("Welcome Back");location.href="../../index.php"</script>';
			exit();
		}
		mysqli_close( $conn );
	}
?>
<html>
<head>
    <link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>會員登入 ─ Airstage 西灣人</title>
    <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
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
	/*enter登入 開始*/
	$('#pw').on('keydown',function(e){
	if(e.keyCode==13){
	$('form#login').submit();
	}
	});
	/*enter登入 結束*/
    </script>
    <style type="text/css">
		body {
			background-color: #F2F2F2;
			background-image: url(../jpg/background.png);
			background-repeat: repeat-x;
		}
		.v {
			font-family: "微軟正黑體";
			font-size: 12px;
		}
    </style>
</head>

<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('jpg/c302.png','jpg/c202.png','jpg/c102.png','jpg/bb_log02.png','jpg/bb_reg02.png','jpg/bb_log2.png','jpg/bb_reg2.png')">
    <?php require("../../global/navi_white/navi.php") ?>

    <div align="center">
        <table border="0" width="980" height="146" cellspacing="0" cellpadding="0" style="color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px;">
            <tr>
                <td background="http://www.airstage.com.tw/nsysu/airs/jpg/bot.png" valign="top">
                    <div align="center"><img src="../jpg/cry.png" alt="" width="82" height="16">
                      <table border="0" width="963" cellspacing="0" cellpadding="0" height="535">
                          <tr>
                                <td background="jpg/back.png" width="980" valign="top">
                                    <div align="center">
                                        &nbsp;

                                        <table border="0" width="45%" cellspacing="0" cellpadding="0" height="455">
                                            <tr>
                                                <td colspan="3" background="jpg/bar.png">
                                                    <p align="center"><font face="微軟正黑體"><a href="registerLaw.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','jpg/c102.png',1)"><img src="jpg/c1.png" name="Image7" width="103" height="41" border="0"></a><a href="registerLaw.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','jpg/c202.png',1)"><img src="jpg/c2.png" name="Image6" width="103" height="41" border="0"></a><a href="registerMail.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image5','','jpg/c302.png',1)"><img src="jpg/c3.png" name="Image5" width="103" height="41" border="0"></a><img src="jpg/c4.png" width="98" height="41"></font></p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>

                                                <td width="399" height="395" background="jpg/box_log.png" valign="top">
                                                    <div align="center">
                                                        <table border="0" width="85%" cellspacing="0" cellpadding="0" height="389">
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                            </tr>

                                                            <tr>
                                                                <td height="318" valign="top">
                                                                    <p align="center">&nbsp;</p>

                                                                    <div align="center">
                                                                        <table border="0" width="86%" cellspacing="0" cellpadding="0" height="82">
                                                                            <tr>
                                                                                <td width="100%" height="82" style="text-align:center;">
                                                                                <form name="login" id="login" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

						<span class="v">學號&nbsp;
						<input type="text" name="id" placeholder="請輸入帳號或學號" class=""/> <br /><br />
						密碼&nbsp;
						<input type="password" name="pw" id="pw" class="" o/> 
						<br><br>

<a onMouseOver="MM_swapImage('Image8','','jpg/bb_log2.png',1)" onMouseOut="MM_swapImgRestore()" href="javascript:document.login.submit();" style="text-decoration: none; font-weight: 100;"><img style="padding-right:10px;" src="jpg/bb_log.png"/></a><a href="./registerLaw.php"><img src="jpg/bb_reg.png" name="Image9" width="74" height="27" border="0"></a></span><br />
						<!--a href='forgetPassword.php' class = "btn btn-danger">忘記密碼?</a-->
                                                                                </form>

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
        <tr style="background-image:url(../global/images/last.png)">
			<td><?php require("../global/footer.php") ?></td>
		</tr>
        </table>
    </div>
</body>
</html>
