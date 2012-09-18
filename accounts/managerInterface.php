<?php
	// Last Modified Day : 2012.09.14
	require_once( "../setSession.php" );
	
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
<link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
	a {
		text-decoration: none;
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
						
						<h3>♠ Airstage 管理者介面</h3>
						<h4>請點選功能操作 : </h4><br />
						
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<table border="0" width="645" cellspacing="1" height="150" class="table table-hover">
								<tr>
									<td> 1. </td>
									<td><a href = "managerQuery.php" style="text-decoration:none; color:#000;">使用者查詢</a></td>
									<td></td>
								</tr>
                                
                                <tr>
									<td> 2. </td>
									<td><a href = "managerRealTime.php" style="text-decoration:none; color:#000;">線上即時資料查詢</a></td>
									<td></td>
								</tr>
                                
                                <tr>
									<td> 3. </td>
									<td><a href = "managerTotal.php" style="text-decoration:none; color:#000;">整體性資料查詢</a></td>
									<td></td>
								</tr>
								
                                <tr>
									<td> 4. </td>
									<td><a href = "managerAnnounce.php" style="text-decoration:none; color:#000;">發送全站公告</a></td>
									<td></td>
								</tr>
								
                                <tr>
									<td> 5. </td>
									<td><a href = "managerNews.php" style="text-decoration:none; color:#000;">電子報功能</a></td>
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
	</table>
</div>
</body>

</html>