<?php
	// Last Modified Day : 2012.09.14
	require_once( "../setSession.php" );
	
	if( $_SESSION['auth'] != 2 || !isset($_SESSION['stu_id']) ) {
		echo '<script type="text/javascript">alert("You have no rights to access!"); location.href="../index.php"</script>';	
	} else {

        $time = gettimeofday(void);
        
        // File initialization.
        if( @filesize("time.txt") <= 0 ) {
                $fd_time = fopen("time.txt","w+");
                fputs($fd_time,$time[sec]);
                fclose($fd_time);
                
                $fd_ip = fopen("ip.txt","w+");
                fclose($fd_ip);
        }


		// Update time.
        $tmp = file("time.txt");
        $equal = ($time[sec] - $tmp[0]);
        if( $equal > 60 ) {
                $fd_time = fopen("time.txt","w+");
                fputs($fd_time,"");
                fclose($fd_time);
        }
        		
		// Check IP address.
        $fd_ip = fopen("ip.txt","a+");
        $ip = $REMOTE_ADDR;
        
        $ip_adds = file("ip.txt");
        for( $i = 0; $i < count($ip_adds); $i++ ) {
                if( $ip."\n" == $ip_adds[$i] ) {
                        $ip_check = 1;
                        break;
                }
        }
        
        if( $ip_check != 1 ) {
                fputs($fd_ip, $ip."\n");
        }
        fclose($fd_ip);
        
        $ip_adds = file("ip.txt");        
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
<link href="assets/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
	body,td,th {
		font-family: "微軟正黑體";
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
						<?php
							require_once( "memberNavigation.php" );
						?>
						</div>
						</td>
						<td align="center" valign="top" width="70%">
						<p style="line-height: 24px; margin-top: 0px; margin-bottom: 0px">
						<span style="vertical-align: medium">&nbsp;</span></font></font></p>
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<table border="0" width="645" cellspacing="1" height="150">
								<tr>
									<td align="center" colspan="3" height="28" valign="top">
									<p align="left" style="margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium">
										<font size="5" color="#1F1F1F" style="font-weight: 700">
										♠</font><span class="Apple-converted-space">&nbsp;</span>
                                    	<font size="4" color="#333333"><b>Airstage 管理者介面 - 線上即時資料查詢</b></font></span>
                                    </p>														
									<span style="vertical-align: medium">&nbsp;</span>
                                    </td>
								</tr>
                                
								<tr>
									<td align="center" colspan="3" height="6">
									<p style="margin-top: 0px; margin-bottom: 0px">										
										<span style="vertical-align: medium">							
										<img src="jpg/line.jpg" alt="" width="630" height="1" border="0" align="left"></span></p>
									<p style="margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium">&nbsp;</span>
                                    </p>
									<p align="left" style="margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium"><b>功能顯示數據：</b></span>
                                    </p>
									<p align="left" style="margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium">&nbsp;</span>
                                    </p>
                                    </td>
								</tr>
                                
								<tr>
									<td align="left" height="14" width="21">
                                    	<p align="left" style="margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium">1. </span></p>
                                    </td>
									<td align="left" height="14" width="98">                                    
										<p align="left" style="margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium">目前線上人數：</span></p>
                                    </td>
									<td align="left" height="14" width="513">
										<p style="margin-top: 0px; margin-bottom: 0px"></p>
										<?php echo count($ip_adds); ?>
									</td>
								</tr>
                                
                                <tr>
                                	<td><p></p></td>
                                </tr>
                                
                                <tr>
									<td align="left" height="14" width="21">
                                    	<p align="left" style="margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium">2. </span></p>
                                    </td>
									<td align="left" height="14" width="120">                                  
										<p align="left" style="margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium">目前線上列表：</span></p>
                                    </td>
									<td align="left" height="14" width="513">
										<p style="margin-top: 0px; margin-bottom: 0px"></p>                             
									</td>
								</tr>
                                
                                <tr>
                                	<td><p></p></td>
                                </tr>
                                
                                <!--tr>
									<td align="left" height="14" width="21">
                                    	<p align="left" style="margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium">3. </span></p>
                                    </td>
									<td align="left" height="14" width="120">
                                    	<a href = "managerTotal.php" style="text-decoration:none; color:#000;">
										<p align="left" style="margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium">整體性資料查詢</span></p></a>
                                    </td>
									<td align="left" height="14" width="513">
										<p style="margin-top: 0px; margin-bottom: 0px"></p>                             
									</td>
								</tr>
                                
                                <tr>
                                	<td><p></p></td>
                                </tr>
                                
                                <tr>
									<td align="left" height="14" width="21">
                                    	<p align="left" style="margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium">4. </span></p>
                                    </td>
									<td align="left" height="14" width="120">
                                    	<a href = "managerAnnounce.php" style="text-decoration:none; color:#000;">
										<p align="left" style="margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium">發送全站公告 Email</span></p></a>
                                    </td>
									<td align="left" height="14" width="513">
										<p style="margin-top: 0px; margin-bottom: 0px"></p>                             
									</td>
								</tr>
                                
                                <tr>
                                	<td><p></p></td>
                                </tr>
                                
                                <tr>
									<td align="left" height="14" width="21">
                                    	<p align="left" style="margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium">5. </span></p>
                                    </td>
									<td align="left" height="14" width="98">
                                    	<a href = "managerNews.php" style="text-decoration:none; color:#000;">
										<p align="left" style="margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium">電子報功能</span></p></a>
                                    </td>
									<td align="left" height="14" width="513">
										<p style="margin-top: 0px; margin-bottom: 0px"></p>         
									</td>
								</tr>
                                <tr>
                                	<td></td>
                                </tr-->                                                       
							</table>
             			</td>
					</tr>
				</table>
				<p><span style="vertical-align: medium">&nbsp;</span></p>
				<p><span style="vertical-align: medium">&nbsp;</span></p>
				<p><span style="vertical-align: medium">&nbsp;</span></div>
			</td>
		</tr>
	</table>
</div>
</body>

</html>