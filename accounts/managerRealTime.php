<?php
	// Last Modified Day : 2012.09.14
	require_once( "../global/setSession.php" );
	
	if( $_SESSION['auth'] != 2 || !isset($_SESSION['stu_id']) ) {
		echo '<script type="text/javascript">alert("You have no rights to access!"); location.href="../index.php"</script>';	
	} else {
		require_once( "../global/connectVar.php" );
		$query = "SELECT COUNT(stu_id) AS total FROM Member WHERE stu_id is not NULL";
		$totalMember = mysqli_query( $conn, $query ) or die('Query Error');
		
		$total = mysqli_fetch_array( $totalMember );
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<link href="tm2.ico" rel="shortcut icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<title>│Airstage 西灣人│管理者介面 - 線上即時資料</title>
<script>
	setTimeout("history.go(0);",30000);
</script>
<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script language="javascript" type="text/javascript">var app = "accounts";</script>
<link href="assets/css/bootstrap.css" rel="stylesheet">
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
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<table class="table">
								<h3>Airstage Center - Real-Time Information</h3><br />                                                     
								<tr class="info">
									<td>
										1.
                                    </td>
									<td>                                    
										目前會員總數：
                                    </td>
									<td>
										<span class="badge badge-info"><?php echo $total['total']; ?></span>
									</td>
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
<script src = "../plugin/jrumble/jquery.jrumble.1.3.min.js"></script>
</body>

</html>