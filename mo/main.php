<?php session_start(); 
if(isset($_SESSION['name']) == false){
	$_SESSION['name'] = "";
}
?>
<html><head>
<link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<title>│Airstage 西灣人│實驗室</title>
<style fprolloverstyle>A:hover {text-decoration: underline; font-weight: bold}
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
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="dynAnimation()" language="Javascript1.2">

<div align="center">
	<table border="0" width="980" height="75" cellspacing="0" cellpadding="0">
		<tr>
        	<td width="38" background="../jpg/top0201.jpg"></td>
        	<td height="43" width="99" background="../jpg/top0202.jpg" align="right"><p style="margin-top: 0; margin-bottom: 0"><a href="http://www.airstage.com.tw/"><img src="../page/airstab/app/theater/jpg/logo.png" name="logo" id="logo" align="left" /></a></td>
			<td height="75" background="../jpg/top0202.jpg" width="700" valign="top"></a><font color="#FFFFFF"><a href="http://www.airstage.com.tw"><img border="0" src="../jpg/calendar_button02.jpg" width="89" height="75"></a><img border="0" src="../jpg/wh.jpg" width="20" height="75"><a onMouseOver="var img=document['fpAnimswapImgFP9'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP9'].src=document['fpAnimswapImgFP9'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/airstab/index.htm"><img src="../jpg/airstab_button01.jpg" alt="" name="fpAnimswapImgFP9" width="89" height="75" lowsrc="../jpg/airstab_button02.jpg" id="fpAnimswapImgFP" border="0" dynamicanimation="fpAnimswapImgFP9"></a></font></td>
			<td background="../jpg/top0203.jpg" width="124" valign="middle"><span style="margin-top: 0; margin-bottom: 0">
			  <?php
				if($_SESSION['name'] == ""){
            	echo '<a LANGUAGE="VBScript" TARGET="screen" onClick="screen.location.href =\'main.htm\'" href="../member/login.php"  style="border:0 none; text-decoration:none; font-weight:700" id="login" rel="shadowbox; width=330; height=350" title=\'會員登入\'>
			<font color="#000000" size="2">會員登入</font></a>';
				}
				else if($_SESSION['name'] != ""){
					echo '<a href="correct.php" style="border:0; color:#000000; font-size:14px"><b>'.$_SESSION['name'].'</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="../member/logout.php" style="border:0; color:#000000; font-size:14px"><b>登出</b></a>';
				}
			?>
			</span></td>
			
           
		</tr>
	</table>
	<table width="980" height="693" border="0" cellpadding="0" cellspacing="0">
	  <tr>
	    <td background="jpg/bot.jpg" colspan="3">&nbsp;</td>
      </tr>
	  <tr>
	    <td height="106" background="jpg/last.jpg" colspan="3" align="left" valign="top"><div align="right">
	      <table border="0" width="51%" height="45">
	        <tr>
	          <td align="left" width="116"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP17'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP17'].src=document['fpAnimswapImgFP17'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/index.htm"> <img src="jpg/b3.jpg" alt="" name="fpAnimswapImgFP17" width="61" height="24" lowsrc="jpg/b302.jpg" id="fpAnimswapImgFP17" border="0" dynamicanimation="fpAnimswapImgFP17" align="right"></a><a onMouseOver="var img=document['fpAnimswapImgFP19'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP19'].src=document['fpAnimswapImgFP19'].imgRolln" target="_parent" href="https://www.facebook.com/pages/Airstage西灣人中山人的校園互動平台/356803227687619"><img src="jpg/b0.jpg" alt="" name="fpAnimswapImgFP19" width="31" height="24" lowsrc="jpg/b002.jpg" id="fpAnimswapImgFP19" border="0" dynamicanimation="fpAnimswapImgFP19" align="right"></a></font></td>
	          <td align="left" width="68"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP15'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP15'].src=document['fpAnimswapImgFP15'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/02.htm"> <img src="jpg/b1.jpg" alt="" name="fpAnimswapImgFP15" width="62" height="24" lowsrc="jpg/b102.jpg" id="fpAnimswapImgFP15" border="0" dynamicanimation="fpAnimswapImgFP15" align="left"></a></font></td>
	          <td align="left" width="109"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP18'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP18'].src=document['fpAnimswapImgFP18'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/03.htm"> <img src="jpg/b2.jpg" alt="" name="fpAnimswapImgFP18" width="61" height="24" lowsrc="jpg/b202.jpg" id="fpAnimswapImgFP18" border="0" dynamicanimation="fpAnimswapImgFP18" align="left"></a></font></td>
	          <td align="left" valign="bottom"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP20'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP20'].src=document['fpAnimswapImgFP20'].imgRolln" target="_parent" href="http://www.airstage.com.tw"> <img src="jpg/b4.jpg" alt="" name="fpAnimswapImgFP20" width="124" height="30" lowsrc="jpg/b402.jpg" id="fpAnimswapImgFP20" border="0" dynamicanimation="fpAnimswapImgFP20" align="left"></a></font></td>
	          <td align="left" width="31">&nbsp;</td>
            </tr>
          </table>
	      </div></td>
      </tr>
  </table>
</div>

</body>

</html>