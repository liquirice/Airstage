<?php
	// Last Modified Day : 2012.09.14
	require_once( "../setSession.php" );
	
	if( isset($_POST['submit']) && isset($_SESSION['stu_id']) ) {
		require_once( "../connectVar.php" );
		
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
<link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<title>│Airstage 西灣人│會員中心：修改密碼</title>
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
		font-size: 13px;
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
	</table>
</div>
</body>

</html>