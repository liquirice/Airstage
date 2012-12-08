<?php
	// Last Modified Day : 2012.09.14
	require_once( "../global/setSession.php" );
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) ) {
		echo '<script type="text/javascript">alert("請先登入唷～"); location.href="../index.php"</script>';
		exit();
	} 
	
	if( isset($_POST['submit']) && isset($_SESSION['stu_id']) ) {
		require_once( "../global/connectVar.php" );
		
		$stu_id = $_SESSION['stu_id'];
		$original = sha1(mysqli_real_escape_string( $conn, trim($_POST['original']) ));
		$new_1 = sha1(mysqli_real_escape_string( $conn, trim($_POST['new_1']) ));
		$new_2 = sha1(mysqli_real_escape_string( $conn, trim($_POST['new_2']) ));
		
		
		$query = "SELECT psw FROM Member WHERE psw = '$original' AND stu_id = '$stu_id'";
		$result = mysqli_query( $conn, $query );
		
		if( mysqli_num_rows($result) == 0 ) {
			echo '<script type="text/javascript">alert("Original Password is Wrong!"); location.href="modifiedPwd.php"</script>';	
		} else {
			if( $new_1 != $new_2 ) {
				echo '<script type="text/javascript">alert("New Password Check Erro!"); location.href="modifiedPwd.php"</script>';	
			} else {
				$query = "UPDATE Member SET psw = '$new_1' WHERE stu_id = '$stu_id'";
				$result = mysqli_query( $conn, $query );	
				echo '<script type="text/javascript">alert("Password Modified Success!"); location.href="modifiedPwd.php"</script>';	
			}
		}
		mysqli_close( $conn );					
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<link href="tm2.ico" rel="shortcut icon"/>
<link href="assets/css/bootstrap.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<title>│Airstage 西灣人│會員中心：修改密碼</title>
<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script language="javascript" type="text/javascript">var app = "accounts";</script>
<link rel="stylesheet" type="text/css" href="../plugin/shadowbox/shadowbox.css">
<base target="_parent">
<style type="text/css">
	body,td,th {
		font-family: "微軟正黑體", "Arial";
		font-size: 14px;
	}
	body {
		//background-image: url(../jpg/background.png);
		background-repeat: repeat-x;
		background-color: #F2F2F2;
	}
	.d {
		font-size: 13px;
	}
</style>
</head>

<body>

<div align="center">
<?php
	require_once( "../global/navi_white/navi.php" );
?>
</div>
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
						
						<p class="lead">♠ 修改密碼</p>
						<h5>請完成以下表格以<font color="#FF0000">修改密碼</font></h5><br />
						
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
						
							<div class="control-group">
						    	<label class="control-label">原始密碼</label>
						    	<div class="controls">
							    	<input type="password" name = "original" id = "original" placeholder="original">
							    </div>
						    </div>
						    <div class="control-group">
						    	<label class="control-label">修改密碼</label>
						    	<div class="controls">
							    	<input type="password" name = "new_1" id = "new_1" placeholder="new">
							    </div>
						    </div>
						    <div class="control-group">
						    	<label class="control-label">確認密碼</label>
						    	<div class="controls">
							    	<input type="password" name = "new_2" id = "new_2" placeholder="check">
							    </div>
						    </div>
						    <button type = "submit" name = "submit" class="btn btn-primary"><i class="icon-edit icon-white"></i> 送出修改</button>
						
                        <!-- End of form -->
						</form>
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
			</td>
        </tr>
		
	</table>
</div>
<script src = "assets/js/bootstrap-modal.js"></script>
<script src = "assets/js/jquery.js"></script>
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