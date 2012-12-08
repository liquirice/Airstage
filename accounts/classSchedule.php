<?php
	// Last Modified Day : 2012.09.14
	require_once( "../global/setSession.php" );
	
	if( $_SESSION['auth'] == 0 || !isset($_SESSION['stu_id']) ) {
		echo '<script type="text/javascript">alert("You have no rights to access!"); location.href="../index.php"</script>';	
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<link href="tm2.ico" rel="shortcut icon"/>
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<title>│Airstage 西灣人|會員中心 - 我的課表</title>
<style type="text/css">
	body,td,th {
		font-family: "微軟正黑體", Arial;
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
		require_once( "memberHeader.php" );
	?>
    
	<div align="center">
		<table border="0" width="980" height="693" cellspacing="0" cellpadding="0">
	    <tr>
	      <td background="../jpg/bot.png" valign="top"><div align="center">
	        <table border="0" width="98%" cellspacing="0" cellpadding="0" height="761">
	          <tr>
	            <td align="left" valign="top" height="192" colspan="2" background="jpg/top.jpg" width="960">
                	<p align="center"><span style="vertical-align: medium">&nbsp;</span>
                </td>
              </tr>
	          <tr>
	            <td align="left" valign="top" width="30%"><div align="center">
	              <p align="center"><span style="vertical-align: medium">&nbsp;</span></p>						
	              </div>
						</td>
						<td align="center" valign="top" width="70%">
							<p style="line-height: 24px; margin-top: 0px; margin-bottom: 0px">
							<span style="vertical-align: medium">&nbsp;</span></font></font></p>
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<table border="0" width="950" cellspacing="1" height="150">
								<tr>
									<td align="center" colspan="3" height="28" valign="top">
										<span style="vertical-align: medium">
										<font size="5" color="#1F1F1F" style="font-weight: 700">
										♠</font><span class="Apple-converted-space">&nbsp;</span>
                                    	<font size="4" color="#333333"><b>我的課表 [<a href="classScheduleEdit.php" style="color: #666; text-decoration:none;">編輯</a>]</b></font></span> 
                                    	<br /><br /> 
                                    	
                                    	<!-- Progress Line -->
                                    	開發中。。。
                                    	<div class="progress progress-striped active">
	                                    	<div class="bar" style="width: 60%;"></div>
	                                    </div>
                                    	
                                    	
                                    	<form method = "get" action = "<?php echo $_SERVER['PHP_SELF']; ?>">   
                                    		<select name = "year">
                                    			<option>年度選擇</option>
                                    		</select>
                                    		<select name = "season">
                                    			<option value = "1">上學期</option>
                                    			<option value = "2">下學期</option>
                                    		</select>
                                    		<input type = "submit" name = "year" value = "查詢" class = "btn">
                                    	</form>                       
                                    </td>
								</tr>
                                
								<tr>
									<td align="center" colspan="3" height="50">																		
											<span style="vertical-align: medium">							
											<img src="jpg/line.jpg" alt="" width="900" height="1" border="0" align="center"></span>
										<p style="margin-top: 0px; margin-bottom: 0px">
											<span style="vertical-align: medium">&nbsp;</span>
	                                    </p>
										<p align="center" style="margin-top: 0px; margin-bottom: 0px">
											<span style="vertical-align: medium; font-size:20px;"><b>2012 Autumn</b></span>
	                                    </p>
                                    </td>                                 
								</tr>
							</table>
                            
                            <!--table border="0" width="950" cellspacing="2" cellpadding="8">    
								<tr>									
									<td align="center" height="14" width="50">
										<font size="4"><b>課程時間</b></font>
									</td>
									<td align="center" height="14" width="50">
                                    	<font size="4"><b>Sun.</b></font>
                                    </td>
									<td align="center" height="14" width="50">
                            			<font size="4"><b>Mon.</b></font>
                                    </td>
									<td align="center" height="14" width="50">
										<font size="4"><b>Tue.</b></font>
									</td>
									<td align="center" height="14" width="50">
										<font size="4"><b>Wed.</b></font>
									</td>
									<td align="center" height="14" width="50">
										<font size="4"><b>Thu.</b></font>
									</td>
									<td align="center" height="14" width="50">
										<font size="4"><b>Fri.</b></font>
									</td>
									<td align="center" height="14" width="50">
										<font size="4"><b>Sat.</b></font>
									</td>									
								</tr>                              
                                
                                <tr>
                                	<td align="center" height="14" width="50">
                                		07:00 ~ 07:50
                                	</td>
									<td align="center" height="14" width="50">
                                    	                                    
									</td>
									<td align="center" height="14" width="50">
                            			
                                    </td>
									<td align="center" height="14" width="50">
										
									</td>
									<td align="center" height="14" width="50">
										
									</td>
									<td align="center" height="14" width="50">
										
									</td>
									<td align="center" height="14" width="50">
										
									</td>
									<td align="center" height="14" width="50">
										
									</td>
								</tr> 
                                
                                <tr>
                                	<td align="center" height="14" width="50">
                                		08:00 ~ 08:50
                                	</td>
									<td align="center" height="14" width="50">
                                    	Sun.
                                    </td>
									<td align="center" height="14" width="50">
                            			Mon.
                                    </td>
									<td align="center" height="14" width="50">
										Tue.
									</td>
									<td align="center" height="14" width="50">
										Wed.
									</td>
									<td align="center" height="14" width="50">
										Thu.
									</td>
									<td align="center" height="14" width="50">
										Fri.
									</td>
									<td align="center" height="14" width="50">
										Sat.
									</td>
								</tr> 
								
								<tr>
                                	<td align="center" height="14" width="50">
                                		09:00 ~ 09:50
                                	</td>
									<td align="center" height="14" width="50">
                                    	Sun.
                                    </td>
									<td align="center" height="14" width="50">
                            			Mon.
                                    </td>
									<td align="center" height="14" width="50">
										Tue.
									</td>
									<td align="center" height="14" width="50">
										Wed.
									</td>
									<td align="center" height="14" width="50">
										Thu.
									</td>
									<td align="center" height="14" width="50">
										Fri.
									</td>
									<td align="center" height="14" width="50">
										Sat.
									</td>
								</tr> 
								
								<tr>
                                	<td align="center" height="14" width="50">
                                		10:00 ~ 10:50
                                	</td>
									<td align="center" height="14" width="50">
                                    	Sun.
                                    </td>
									<td align="center" height="14" width="50">
                            			Mon.
                                    </td>
									<td align="center" height="14" width="50">
										Tue.
									</td>
									<td align="center" height="14" width="50">
										Wed.
									</td>
									<td align="center" height="14" width="50">
										Thu.
									</td>
									<td align="center" height="14" width="50">
										Fri.
									</td>
									<td align="center" height="14" width="50">
										Sat.
									</td>
								</tr> 
								
								<tr>
                                	<td align="center" height="14" width="50">
                                		11:00 ~ 11:50
                                	</td>
									<td align="center" height="14" width="50">
                                    	Sun.
                                    </td>
									<td align="center" height="14" width="50">
                            			Mon.
                                    </td>
									<td align="center" height="14" width="50">
										Tue.
									</td>
									<td align="center" height="14" width="50">
										Wed.
									</td>
									<td align="center" height="14" width="50">
										Thu.
									</td>
									<td align="center" height="14" width="50">
										Fri.
									</td>
									<td align="center" height="14" width="50">
										Sat.
									</td>
								</tr> 
								
								<tr>
                                	<td align="center" height="14" width="50">
                                		<span style="vertical-align: medium">							
	                                		<img src="jpg/line.jpg" width="70" height="1" border="0" align="center">	
	                                	</span>
                                	</td>
									<td align="center" height="14" width="50">
                                    	
                                    </td>
									<td align="center" height="14" width="50">
                            			
                                    </td>
									<td align="center" height="14" width="50">
									
									</td>
									<td align="center" height="14" width="50">
										
									</td>
									<td align="center" height="14" width="50">
										
									</td>
									<td align="center" height="14" width="50">
										
									</td>
									<td align="center" height="14" width="50">
										
									</td>
								</tr>
								
								<tr>
                                	<td align="center" height="14" width="50">
                                		12:00 ~ 12:50
                                	</td>
									<td align="center" height="14" width="50">
                                    	Sun.
                                    </td>
									<td align="center" height="14" width="50">
                            			Mon.
                                    </td>
									<td align="center" height="14" width="50">
										Tue.
									</td>
									<td align="center" height="14" width="50">
										Wed.
									</td>
									<td align="center" height="14" width="50">
										Thu.
									</td>
									<td align="center" height="14" width="50">
										Fri.
									</td>
									<td align="center" height="14" width="50">
										Sat.
									</td>
								</tr> 
								
								<span style="vertical-align: medium">							
									<img src="jpg/line.jpg" width="900" height="1" border="0" align="center">	
								</span>
								
								<tr>
                                	<td align="center" height="14" width="50">
                                		<span style="vertical-align: medium">							
	                                		<img src="jpg/line.jpg" width="70" height="1" border="0" align="center">	
	                                	</span>
                                	</td>
									<td align="center" height="14" width="50">
                                    	
                                    </td>
									<td align="center" height="14" width="50">
                            			
                                    </td>
									<td align="center" height="14" width="50">
									
									</td>
									<td align="center" height="14" width="50">
										
									</td>
									<td align="center" height="14" width="50">
										
									</td>
									<td align="center" height="14" width="50">
										
									</td>
									<td align="center" height="14" width="50">
										
									</td>
								</tr>
								
								<tr>
                                	<td align="center" height="14" width="50">
                                		13:00 ~ 13:50
                                	</td>
									<td align="center" height="14" width="50">
                                    	Sun.
                                    </td>
									<td align="center" height="14" width="50">
                            			Mon.
                                    </td>
									<td align="center" height="14" width="50">
										Tue.
									</td>
									<td align="center" height="14" width="50">
										Wed.
									</td>
									<td align="center" height="14" width="50">
										Thu.
									</td>
									<td align="center" height="14" width="50">
										Fri.
									</td>
									<td align="center" height="14" width="50">
										Sat.
									</td>
								</tr> 
								
								<tr>
                                	<td align="center" height="14" width="50">
                                		14:00 ~ 14:50
                                	</td>
									<td align="center" height="14" width="50">
                                    	Sun.
                                    </td>
									<td align="center" height="14" width="50">
                            			Mon.
                                    </td>
									<td align="center" height="14" width="50">
										Tue.
									</td>
									<td align="center" height="14" width="50">
										Wed.
									</td>
									<td align="center" height="14" width="50">
										Thu.
									</td>
									<td align="center" height="14" width="50">
										Fri.
									</td>
									<td align="center" height="14" width="50">
										Sat.
									</td>
								</tr> 
								
								<tr>
                                	<td align="center" height="14" width="50">
                                		15:00 ~ 15:50
                                	</td>
									<td align="center" height="14" width="50">
                                    	Sun.
                                    </td>
									<td align="center" height="14" width="50">
                            			Mon.
                                    </td>
									<td align="center" height="14" width="50">
										Tue.
									</td>
									<td align="center" height="14" width="50">
										Wed.
									</td>
									<td align="center" height="14" width="50">
										Thu.
									</td>
									<td align="center" height="14" width="50">
										Fri.
									</td>
									<td align="center" height="14" width="50">
										Sat.
									</td>
								</tr> 
								
								<tr>
                                	<td align="center" height="14" width="50">
                                		16:00 ~ 16:50
                                	</td>
									<td align="center" height="14" width="50">
                                    	Sun.
                                    </td>
									<td align="center" height="14" width="50">
                            			Mon.
                                    </td>
									<td align="center" height="14" width="50">
										Tue.
									</td>
									<td align="center" height="14" width="50">
										Wed.
									</td>
									<td align="center" height="14" width="50">
										Thu.
									</td>
									<td align="center" height="14" width="50">
										Fri.
									</td>
									<td align="center" height="14" width="50">
										Sat.
									</td>
								</tr> 
								
								<tr>
                                	<td align="center" height="14" width="50">
                                		17:00 ~ 17:50
                                	</td>
									<td align="center" height="14" width="50">
                                    	Sun.
                                    </td>
									<td align="center" height="14" width="50">
                            			Mon.
                                    </td>
									<td align="center" height="14" width="50">
										Tue.
									</td>
									<td align="center" height="14" width="50">
										Wed.
									</td>
									<td align="center" height="14" width="50">
										Thu.
									</td>
									<td align="center" height="14" width="50">
										Fri.
									</td>
									<td align="center" height="14" width="50">
										Sat.
									</td>
								</tr>
								
								<tr>
                                	<td align="center" height="14" width="50">
                                		<span style="vertical-align: medium">							
	                                		<img src="jpg/line.jpg" width="70" height="1" border="0" align="center">	
	                                	</span>
                                	</td>
									<td align="center" height="14" width="50">
                                    	
                                    </td>
									<td align="center" height="14" width="50">
                            			
                                    </td>
									<td align="center" height="14" width="50">
									
									</td>
									<td align="center" height="14" width="50">
										
									</td>
									<td align="center" height="14" width="50">
										
									</td>
									<td align="center" height="14" width="50">
										
									</td>
									<td align="center" height="14" width="50">
										
									</td>
								</tr>
								
								<tr>
                                	<td align="center" height="14" width="50">
                                		18:20 ~ 19:10
                                	</td>
									<td align="center" height="14" width="50">
                                    	Sun.
                                    </td>
									<td align="center" height="14" width="50">
                            			Mon.
                                    </td>
									<td align="center" height="14" width="50">
										Tue.
									</td>
									<td align="center" height="14" width="50">
										Wed.
									</td>
									<td align="center" height="14" width="50">
										Thu.
									</td>
									<td align="center" height="14" width="50">
										Fri.
									</td>
									<td align="center" height="14" width="50">
										Sat.
									</td>
								</tr>  											                                                  
								
								<tr>
                                	<td align="center" height="14" width="50">
                                		19:15 ~ 20:05
                                	</td>
									<td align="center" height="14" width="50">
                                    	Sun.
                                    </td>
									<td align="center" height="14" width="50">
                            			Mon.
                                    </td>
									<td align="center" height="14" width="50">
										Tue.
									</td>
									<td align="center" height="14" width="50">
										Wed.
									</td>
									<td align="center" height="14" width="50">
										Thu.
									</td>
									<td align="center" height="14" width="50">
										Fri.
									</td>
									<td align="center" height="14" width="50">
										Sat.
									</td>
								</tr>
								
								<tr>
                                	<td align="center" height="14" width="50">
                                		20:10 ~ 21:00
                                	</td>
									<td align="center" height="14" width="50">
                                    	Sun.
                                    </td>
									<td align="center" height="14" width="50">
                            			Mon.
                                    </td>
									<td align="center" height="14" width="50">
										Tue.
									</td>
									<td align="center" height="14" width="50">
										Wed.
									</td>
									<td align="center" height="14" width="50">
										Thu.
									</td>
									<td align="center" height="14" width="50">
										Fri.
									</td>
									<td align="center" height="14" width="50">
										Sat.
									</td>
								</tr>
								
								<tr>
                                	<td align="center" height="14" width="50">
                                		21:05 ~ 22:55
                                	</td>
									<td align="center" height="14" width="50">
                                    	Sun.
                                    </td>
									<td align="center" height="14" width="50">
                            			Mon.
                                    </td>
									<td align="center" height="14" width="50">
										Tue.
									</td>
									<td align="center" height="14" width="50">
										Wed.
									</td>
									<td align="center" height="14" width="50">
										Thu.
									</td>
									<td align="center" height="14" width="50">
										Fri.
									</td>
									<td align="center" height="14" width="50">
										Sat.
									</td>
								</tr>
                            </table>
						</td>
					</tr>
				</table>
				
				<br />
				<p>	
					<a href = "revises.php" style = "text-decoration:none; color: #666;">-> 回到個人資料修改</a>
				</p>
				<p><span style="vertical-align: medium">&nbsp;</span></p>
				<p><span style="vertical-align: medium">&nbsp;</span></p>
				<p><span style="vertical-align: medium">&nbsp;</span></div>
			</td>
		</tr>
	</table-->
</div>

<script src="assets/js/bootstrap-alert.js"></script>
<script src="assets/js/jquery.js"></script>
</body>
</html>