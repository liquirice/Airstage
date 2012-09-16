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
<style fprolloverstyle>
	A:hover {text-decoration: underline; font-weight: bold}
	a{text-decoration:none;}
</style>
<script language="JavaScript" fptype="dynamicanimation">
<!--
	function dynAnimation() {}
	function clickSwapImg() {}
//-->
</script>

<script>
	setTimeout("history.go(0);",30000);
</script>

<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script language="javascript" type="text/javascript" src="../plugin/shadowbox/shadowbox.js"></script>
<script language="javascript" type="text/javascript" src="../plugin/jrumble/jquery.jrumble.1.3.min.js"></script>
<script type="text/javascript">
	Shadowbox.init({
		players : ['html'],
		overlayColor: "#FFFFFF",
	});
	$(function(){
	$('#logo').jrumble({
		x:2,
		y:2,
		rotation:1,
	});
	$('#logo').hover(function(){
		$(this).trigger('startRumble'); 
	}, function(){
		$(this).trigger('stopRumble');
        
    });
	});
</script>
<link rel="stylesheet" type="text/css" href="../plugin/shadowbox/shadowbox.css">
<base target="_parent">
<script language="JavaScript">
<!--
function FP_changeProp() {//v1.0
	 var args=arguments,d=document,i,j,id=args[0],o=FP_getObjectByID(id),s,ao,v,x;
	 d.$cpe=new Array(); if(o) for(i=2; i<args.length; i+=2) { v=args[i+1]; s="o"; 
	 ao=args[i].split("."); for(j=0; j<ao.length; j++) { s+="."+ao[j]; if(null==eval(s)) { 
	  s=null; break; } } x=new Object; x.o=o; x.n=new Array(); x.v=new Array();
	 x.n[x.n.length]=s; eval("x.v[x.v.length]="+s); d.$cpe[d.$cpe.length]=x;
	 if(s) eval(s+"=v"); }
}

function FP_getObjectByID(id,o) {//v1.0
	 var c,el,els,f,m,n; if(!o)o=document; if(o.getElementById) el=o.getElementById(id);
	 else if(o.layers) c=o.layers; else if(o.all) el=o.all[id]; if(el) return el;
	 if(o.id==id || o.name==id) return o; if(o.childNodes) c=o.childNodes; if(c)
	 for(n=0; n<c.length; n++) { el=FP_getObjectByID(id,c[n]); if(el) return el; }
	 f=o.forms; if(f) for(n=0; n<f.length; n++) { els=f[n].elements;
	 for(m=0; m<els.length; m++){ el=FP_getObjectByID(id,els[n]); if(el) return el; } }
	 return null;
}
// -->
</script>
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
	<table border="0" width="980" height="75" cellspacing="0" cellpadding="0">
		<tr>
        	<td width="38" background="../jpg/topbar001.png"></td>
        	<td height="43" width="99" background="../jpg/topbar002.png" align="right"><p style="margin-top: 0; margin-bottom: 0"><a href="http://www.airstage.com.tw/"><img src="../page/airstab/app/theater/jpg/logo.png" name="logo" id="logo" align="left" /></a></td>
			<td height="75" background="../jpg/topbar002.png" width="700" valign="top">
  			
			<font color="#FFFFFF">
      <a onMouseOver="var img=document['fpAnimswapImgFP9'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP9'].src=document['fpAnimswapImgFP9'].imgRolln" target="_parent" href="../index.php"><img border="0" src="../jpg/cal_bot001.png" width="89" height="75" id="fpAnimswapImgFP9" name="fpAnimswapImgFP9" dynamicanimation="fpAnimswapImgFP9" lowsrc="../jpg/cal_bot002.png"></a></font></a><font color="#FFFFFF"><img border="0" src="../jpg/topbar002.png" width="20" height="75"><a href="../page/airstab/index.htm"><img border="0" src="../jpg/air_bot002.png" width="89" height="75"></a></font></td>
			<td background="../jpg/topbar003.png" width="124" valign="middle"><span style="margin-top: 0; margin-bottom: 0">
			<?php
				require_once( "loginCheck_account.php" );
			?>
			</span></td>
		</tr>
	</table>
    
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
							<table border="0" width="65%" height="135">
								<tr>
									<td height="48" width="4%">
										<p style="line-height: 24px; margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium">
											<img src="jpg/gray.jpg" alt="" width="6" height="100%" border="0">
                                        </span>
                                    </td>
									<td height="48" width="8%">
										<p style="line-height: 24px; margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium">&nbsp;</span>
                                    </td>
									<td height="48" width="81%">
										<a href="revises.php" style=" text-decoration:none;">
                                    	<p style="line-height: 24px; margin-top: 0px; margin-bottom: 0px">
											<span style="vertical-align: medium; color:#666; "><b>
											<font size="2">編輯個人資料</font></b></a>
                                        	<br />
										<a href = "modifiedPwd.php" style = "text-decoration:none;">
											<font color="#666666" size="2">修改密碼</font></span>
                                        </p></a>
                                    </td>
								</tr>
								<tr>
									<td colspan="3" height="6">
									<p style="margin-top: 0px; margin-bottom: 0px">
									<font color="#FFFFFF" style="font-size: 1pt; vertical-align: medium">
									1</font></td>
								</tr>
								<tr>
									<td>
									<p style="line-height: 24px; margin-top: 0px; margin-bottom: 0px">
									<span style="vertical-align: medium">
									<img src="jpg/gray.jpg" alt="" width="6" height="100%" border="0"></span></td>
									<td><span style="vertical-align: medium">&nbsp;</span></td>
									<td>
									<p style="line-height: 24px; margin-top: 0px; margin-bottom: 0px">
										<span style="vertical-align: medium; text-decoration:none; color:#666;">
										<font size="2">
                                        	<a href = "managerInterface.php" style="color:#666;">管理者介面</a><br />
                                            <a href = "#" style="color:#666;">報名系統</a><br />
											<a href = "#" style="color:#666;">影音聯播</a><br />
											<a href = "#" style="color:#666;">專　　欄</a><br />
											<a href = "#" style="color:#666;">24HR幫幫忙</a><br /><br />
                                            目前連線 IP 位置 : <br />
											<?php echo $_SERVER['REMOTE_ADDR'];?>
                                    	</font>
                                        </span>
                                    </p>
									</td>
								</tr>
							</table>
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