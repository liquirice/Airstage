<?php
	// Last Modified Day : 2012.09.14
	require_once( "../global/setSession.php" );
	
	if( $_SESSION['auth'] != 2 || !isset($_SESSION['stu_id']) ) {
		echo '<script type="text/javascript">alert("You have no rights to access!"); location.href="../index.php"</script>';	
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<link href="tm2.ico" rel="shortcut icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<title>│Airstage 西灣人│管理者介面</title>
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../plugin/shadowbox/shadowbox.css">
<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script language="javascript" type="text/javascript">var app = "accounts";</script>
<base target="_parent">
<style type="text/css">
	body,td,th {
		font-family: "微軟正黑體", "Arial";
		font-size: 14px;
	}
	body {
		background-image: url(../jpg/background.png);
		background-repeat: repeat-x;
		background-color: #F2F2F2;
	}
	.d {
		font-size: 13px;
	} 
	a {
		text-decoration: none;
	}
</style>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="dynAnimation()" language="Javascript1.2">

<div align="center">
	<?php
		require_once( "../global/navi_white/navi.php" );
	?>
    
	<div align="center">
		<table border="0" width="980" height="693" cellspacing="0" cellpadding="0">
	    <tr>
	      <td background="../global/images/bot.png" valign="top"><div align="center">
	        <table border="0" width="98%" cellspacing="0" cellpadding="0" height="761">
	          <tr>
	            <td align="left" valign="top" height="192" colspan="2" background="jpg/top.jpg" width="960">
                	<p align="center"><span style="vertical-align: medium">&nbsp;</span>
                </td>
              </tr>
	          <tr>
	            <td align="left" valign="top" width="30%"><div align="center">
	              <p align="center"><span style="vertical-align: medium">&nbsp;</span></p>
						<?php
							require_once( "memberNavigation.php" );							
						?>
						</div>
						</td>
						<td align="center" valign="top" width="70%">
						<p style="line-height: 24px; margin-top: 0px; margin-bottom: 0px">
						<span style="vertical-align: medium">&nbsp;</span></font></font></p>
						
						<h3>♠ Airstage Center</h3>
						
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<table border="0" width="645" cellspacing="1" height="150" class="table table-hover">
								<tr>
									<td> 1. </td>
									<td><a href = "managerQuery.php" style="text-decoration:none; color:#000;">God Member Query</a></td>
									<td></td>
								</tr>
                                
                                <tr>
									<td> 2. </td>
									<td><a href = "managerRealTime.php" style="text-decoration:none; color:#000;">Real-Time Information</a></td>
									<td></td>
								</tr>
                                
                                <tr>
									<td> 3. </td>
									<td><a href = "managerTotal.php" style="text-decoration:none; color:#000;">Statistic Information</a></td>
									<td></td>
								</tr>
								
                                <tr>
									<td> 4. </td>
									<td><a href = "managerAnnounce.php" style="text-decoration:none; color:#000;">Notification Sender</a></td>
									<td></td>
								</tr>
								
                                <tr>
									<td> 5. </td>
									<td><a href = "managerNews.php" style="text-decoration:none; color:#000;">E-Paper</a></td>
									<td></td>
								</tr>                                                                                  
							</table>
						</td>
					</tr>
				</table>
				<p><span style="vertical-align: medium">&nbsp;</span></p>
				<p><span style="vertical-align: medium">&nbsp;</span></p>
				<p><span style="vertical-align: medium">&nbsp;</span></div>
			</td>
		</tr>
		<tr>
	      <td height="106" background="../global/images/last.png" valign="top">
	      	<?php require_once("../global/footer.php"); ?>
        </tr>
	</table>
</div>
<script src = "assets/js/bootstrap-modal.js"></script>
<script src = "assets/js/application.js"></script>
<script src = "assets/js/bootstrap-transition.js"></script>
<script src = "assets/js/bootstrap-alert.js"></script>
<script src = "assets/js/bootstrap-modal.js"></script>
<script src = "assets/js/bootstrap-dropdown.js"></script>
<script src = "assets/js/bootstrap-scrollspy.js"></script>
<script src = "assets/js/bootstrap-tab.js"></script>
<script src = "assets/js/bootstrap-tooltip.js"></script>
<script src = "assets/js/bootstrap-popover.js"></script>
<script src = "assets/js/bootstrap-button.js"></script>
<script src = "assets/js/bootstrap-collapse.js"></script>
<script src = "assets/js/bootstrap-carousel.js"></script>
<script src = "assets/js/bootstrap-typeahead.js"></script>
<script src = "assets/js/bootstrap-affix.js"></script>
</body>

</html>