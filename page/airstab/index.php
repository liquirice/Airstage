<?php session_start(); 
if(isset($_SESSION['name']) == false){
	$_SESSION['name'] = "";
}
?>
<html><head>

<link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<title>│Airstage 西灣人│會員中心：修改個人資料</title>
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
<script language="javascript" type="text/javascript" src="../../plugin/shadowbox/shadowbox.js"></script>
<script language="javascript" type="text/javascript" src="../../plugin/jrumble/jquery.jrumble.1.3.min.js"></script>
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
<link rel="stylesheet" type="text/css" href="../../plugin/shadowbox/shadowbox.css">
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
}
body {
	background-image: url(../../jpg/background.png);
	background-repeat: repeat-x;
	background-color: #F2F2F2;
}
</style>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="dynAnimation()" language="Javascript1.2">

<div align="center">
	<table border="0" width="980" height="75" cellspacing="0" cellpadding="0">
		<tr>
        	<td width="38" background="../../jpg/topbar001.png"></td>
        	<td height="43" width="99" background="../../jpg/topbar002.png" align="right"><p style="margin-top: 0; margin-bottom: 0"><a href="http://www.airstage.com.tw/"><img src="app/theater/jpg/logo.png" name="logo" id="logo" align="left" /></a></td>
			<td height="75" background="../../jpg/topbar002.png" width="700" valign="top">
  			
			<font color="#FFFFFF">
      <a onMouseOver="var img=document['fpAnimswapImgFP9'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP9'].src=document['fpAnimswapImgFP9'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/index.htm"><img border="0" src="../../jpg/cal_bot001.png" width="89" height="75" id="fpAnimswapImgFP9" name="fpAnimswapImgFP9" dynamicanimation="fpAnimswapImgFP9" lowsrc="../../jpg/cal_bot002.png"></a></font></a><font color="#FFFFFF"><img border="0" src="../../jpg/topbar002.png" width="20" height="75"><a href="http://www.airstage.com.tw/nsysu/airs/page/airstab/index.htm"><img border="0" src="../../jpg/air_bot002.png" width="89" height="75"></a></font></td>
			<td background="../../jpg/topbar003.png" width="124" valign="middle"><span style="margin-top: 0; margin-bottom: 0">
			  <?php
				if($_SESSION['name'] == ""){
            	echo '<a LANGUAGE="VBScript" TARGET="screen" onClick="screen.location.href =\'main.htm\'" href="../../member/login.php"  style="border:0 none; text-decoration:none; font-weight:700" id="login" rel="shadowbox; width=330; height=350" title=\'會員登入\'>
			<font color="#000000" size="2">會員登入</font></a>';
				}
				else if($_SESSION['name'] != ""){
					echo '<a href="correct.php" style="border:0; color:#000000; font-size:14px"><b>'.$_SESSION['name'].'</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="../../member/logout.php" style="border:0; color:#000000; font-size:14px"><b>登出</b></a>';
				}
			?>
			</span></td>
			
           
		</tr>
	</table>
	<div align="center">
	  <table border="0" width="980" height="693" cellspacing="0" cellpadding="0">
	    <tr>
	      <td background="../../jpg/bot.png" valign="top"><div align="center"></div>
	        <table border="0" width="46%" height="693" cellspacing="0" cellpadding="0">
	          <tr>
	            <td height="196" background="../../jpg/bot.png"><p align="center">
	              <iframe name="top" width="971" height="196" marginwidth="1" marginheight="1" scrolling="no" border="0" frameborder="0" src="top.htm"> 您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe>
	            </td>
              </tr>
	          <tr>
	            <td background="../../jpg/bot.png"><div align="center">
	              <table border="0" width="71%" cellspacing="1" height="165">
	                <tr>
	                  <td height="68"><iframe name="link" width="900" height="53" src="sublink.htm" marginwidth="1" marginheight="1" scrolling="no" border="0" frameborder="0"> 您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe></td>
                    </tr>
	                <tr>
	                  <td><p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;</p>
	                    <p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
	                      <iframe name="box01" width="900" height="294" marginwidth="1" marginheight="1" scrolling="no" border="0" frameborder="0" src="box.htm"> 您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe>
                        </p></td>
                    </tr>
	                <tr>
	                  <td><iframe name="I1" width="900" height="53" src="sublink02.htm" marginwidth="1" marginheight="1" scrolling="no" border="0" frameborder="0"> 您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe></td>
                    </tr>
	                <tr>
	                  <td><iframe name="I3" width="900" height="599" marginwidth="1" marginheight="1" scrolling="no" border="0" frameborder="0" src="box02.htm"> 您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe></td>
                    </tr>
	                <tr>
	                  <td><iframe name="I2" width="900" height="53" src="sublink03.htm" marginwidth="1" marginheight="1" scrolling="no" border="0" frameborder="0"> 您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe></td>
                    </tr>
	                <tr>
	                  <td><iframe name="I4" width="900" height="294" marginwidth="1" marginheight="1" scrolling="no" border="0" frameborder="0" src="box03.htm"> 您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe></td>
                    </tr>
                  </table>
	              </div></td>
              </tr>
          </table></td>
        </tr>
	    <tr>
	      <td height="106" background="../../jpg/last.png" valign="top"><div align="right">
	        <table border="0" width="51%" height="45">
	          <tr>
	            <td align="left" width="116"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP21'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP21'].src=document['fpAnimswapImgFP21'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/index.htm"> <img src="../../mo/jpg/b1.jpg" alt="" name="fpAnimswapImgFP21" width="61" height="24" border="0" align="right" lowsrc="../../mo/jpg/b102.jpg" id="fpAnimswapImgFP21" dynamicanimation="fpAnimswapImgFP21"></a><a onMouseOver="var img=document['fpAnimswapImgFP22'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP22'].src=document['fpAnimswapImgFP22'].imgRolln" target="_parent" href="https://www.facebook.com/pages/Airstage西灣人中山人的校園互動平台/356803227687619"><img src="../../mo/jpg/b0.jpg" alt="" name="fpAnimswapImgFP22" width="31" height="24" border="0" align="right" lowsrc="../../mo/jpg/b002.jpg" id="fpAnimswapImgFP22" dynamicanimation="fpAnimswapImgFP22"></a></font></td>
	            <td align="left" width="68"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP23'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP23'].src=document['fpAnimswapImgFP23'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/02.htm"> <img src="../../mo/jpg/b2.jpg" alt="" name="fpAnimswapImgFP23" width="62" height="24" border="0" align="left" lowsrc="../../mo/jpg/b202.jpg" id="fpAnimswapImgFP23" dynamicanimation="fpAnimswapImgFP23"></a></font></td>
	            <td align="left" width="109"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP24'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP24'].src=document['fpAnimswapImgFP24'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/03.htm"> <img src="../../mo/jpg/b3.jpg" alt="" name="fpAnimswapImgFP24" width="61" height="24" border="0" align="left" lowsrc="../../mo/jpg/b302.jpg" id="fpAnimswapImgFP24" dynamicanimation="fpAnimswapImgFP24"></a></font></td>
	            <td align="left" valign="bottom"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP25'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP25'].src=document['fpAnimswapImgFP25'].imgRolln" target="_parent" href="http://www.airstage.com.tw"> <img src="../../mo/jpg/b4.jpg" alt="" name="fpAnimswapImgFP25" width="124" height="30" border="0" align="left" lowsrc="../../mo/jpg/b402.jpg" id="fpAnimswapImgFP25" dynamicanimation="fpAnimswapImgFP25"></a></font></td>
	            <td align="left" width="31">&nbsp;</td>
              </tr>
            </table>
	        </div>
	        <p>&nbsp;</td>
        </tr>
      </table>
  </div>
<p>&nbsp;</p>
</div>

</body>

</html>