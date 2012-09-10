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
      <a onMouseOver="var img=document['fpAnimswapImgFP9'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP9'].src=document['fpAnimswapImgFP9'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/index.htm"><img border="0" src="../jpg/cal_bot001.png" width="89" height="75" id="fpAnimswapImgFP9" name="fpAnimswapImgFP9" dynamicanimation="fpAnimswapImgFP9" lowsrc="../jpg/cal_bot002.png"></a></font></a><font color="#FFFFFF"><img border="0" src="../jpg/topbar002.png" width="20" height="75"><a href="http://www.airstage.com.tw/nsysu/airs/page/airstab/index.htm"><img border="0" src="../jpg/air_bot002.png" width="89" height="75"></a></font></td>
			<td background="../jpg/topbar003.png" width="124" valign="middle"><span style="margin-top: 0; margin-bottom: 0">
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
	<div align="center">
	  <table border="0" width="980" height="693" cellspacing="0" cellpadding="0">
	    <tr>
	      <td background="../jpg/bot.png" valign="top"><div align="center">
	        <table border="0" width="98%" cellspacing="0" cellpadding="0" height="761">
	          <tr>
	            <td align="left" valign="top" height="192" colspan="2" background="jpg/top.jpg" width="960"><p align="center"><font face="微軟正黑體"> <span style="vertical-align: medium">&nbsp;</span></td>
              </tr>
	          <tr>
	            <td align="left" valign="top" width="30%"><div align="center">
	              <p align="center"> <font face="微軟正黑體"> <span style="vertical-align: medium">&nbsp;</span></p>
	              <table border="0" width="65%" height="60">
	                <tr>
	                  <td height="48" width="4%"><p style="line-height: 24px; margin-top: 0px; margin-bottom: 0px"> <span style="vertical-align: medium"> <img src="jpg/gray.jpg" alt="" width="6" height="50" border="0"></span></td>
	                  <td height="48" width="8%"><p style="line-height: 24px; margin-top: 0px; margin-bottom: 0px"> <span style="vertical-align: medium">&nbsp;</span></td>
	                  <td height="48" width="81%"><p style="line-height: 24px; margin-top: 0px; margin-bottom: 0px"> <span style="vertical-align: medium"><b> <font size="2">修改個人資料</font></b></span></p>
	                    <p style="line-height: 24px; margin-top: 0px; margin-bottom: 0px"> <font color="#C0C0C0" size="2"> <span style="text-decoration: none; vertical-align: medium"> 偏好設定</span></font></td>
	                  </tr>
	                <tr>
	                  <td colspan="3" height="6"><p style="margin-top: 0px; margin-bottom: 0px"> <font color="#FFFFFF" style="font-size: 1pt; vertical-align: medium"> 1</font></td>
	                  </tr>
	                </table>
	              </div></td>
	            <td align="center" valign="top" width="70%"><p style="line-height: 24px; margin-top: 0px; margin-bottom: 0px">&nbsp;</p>
	              <form method="post" action="http://www.airstage.com.tw/nsysu/airs/page/airstab/app/accounts/revises_act.php">
	              <table border="0" width="645" cellspacing="1" height="324">
	                  <tr>
	                    <td align="center" colspan="4" height="28" valign="top"><p align="left" style="margin-top: 0px; margin-bottom: 0px"> <span style="vertical-align: medium"> <font face="微軟正黑體" size="5" color="#1F1F1F" style="font-weight: 700"> ♠</font><font face="微軟正黑體"><span class="Apple-converted-space">&nbsp;</span></font><font face="微軟正黑體" size="4" color="#333333"><b>修改個人資料</b></font></span></p>
	                      <p align="left" style="margin-top: 0px; margin-bottom: 0px"> <font face="微軟正黑體"> <span style="vertical-align: medium">&nbsp;</span></td>
                      </tr>
	                  <tr>
	                    <td align="center" colspan="4" height="6"><p style="margin-top: 0px; margin-bottom: 0px"> <font face="微軟正黑體"> <span style="vertical-align: medium"> <font size="2"> <img src="http://www.airstage.com.tw/nsysu/airs/page/airstab/app/accounts/jpg/line.jpg" alt="" width="630" height="1" border="0" align="left"></font></span></p>
	                      <p style="margin-top: 0px; margin-bottom: 0px"> <span style="vertical-align: medium">&nbsp;</span></p>
	                      <p align="left" style="margin-top: 0px; margin-bottom: 0px"> <span style="vertical-align: medium"> <font size="2"><b>（一）基本資料　</b><span class="Apple-converted-space">&nbsp;</span><font color="#333333">請</font><span class="Apple-converted-space">&nbsp;</span><font color="#FF0000">勾選</font><span class="Apple-converted-space">&nbsp;</span><font color="#333333">欲讓人看到的項目</font></font></span></p>
	                      <p align="left" style="margin-top: 0px; margin-bottom: 0px">&nbsp;</p></td>
                      </tr>
	                  <tr>
	                    <td align="left" height="14" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="checkbox" name="check_student_id" value="1" checked>
	                      </font></span></td>
	                    <td height="14" colspan="2" align="left"><p align="left" style="margin-top: 0px; margin-bottom: 0px"> <span style="vertical-align: medium"> <font size="2" face="微軟正黑體">學　　號</font></span></td>
	                    <td align="left" height="14" width="502"><p style="margin-top: 0px; margin-bottom: 0px"></td>
                      </tr>
	                  <tr>
	                    <td align="left" height="13" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="checkbox" name="check_name" value="1" checked id="check_name">
	                      </font></span></td>
	                    <td height="13" colspan="2" align="left"><p align="left" style="margin-top: 0px; margin-bottom: 0px"> <span style="vertical-align: medium"> <font size="2" face="微軟正黑體">姓　　名</font></span></td>
	                    <td align="left" height="13" width="502"><p style="margin-top: 0px; margin-bottom: 0px"></td>
                      </tr>
	                  <tr>
	                    <td align="left" height="7" width="22"></td>
	                    <td height="7" colspan="2" align="left"><p style="margin-top: 0px; margin-bottom: 0px"> <span style="vertical-align: medium"> <font size="2" face="微軟正黑體">性　　別</font></span></td>
	                    <td align="left" height="7" width="502"><p style="margin-top: 0px; margin-bottom: 0px"> <span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="radio" value="男" name="gender" style="text-shadow: rgba(50, 50, 50, '0.292969) 2px 2px 3px'" checked>
	                      <span class="Apple-converted-space">&nbsp;</span><font size="2">男&nbsp;&nbsp;</font><span class="Apple-converted-space">&nbsp;</span>
	                      <input type="radio" value="V" name="gender" style="text-shadow: rgba(50, 50, 50, '0.292969) 2px 2px 3px'">
	                      <span class="Apple-converted-space">&nbsp;</span><font size="2">女</font></font></span></td>
                      </tr>
	                  <tr>
	                    <td align="left" height="6" width="22"></td>
	                    <td height="6" colspan="2" align="left"><span style="vertical-align: medium"> <font size="2" face="微軟正黑體">系　　級</font></span></td>
	                    <td align="left" height="6" width="502"><font face="微軟正黑體">
	                      <select name="department" size="1">
  <option value="不知啥系">哪個科系呢？</option>
  <option disabled>【 　文學院 　】</option>
  <option value="中文系">中文系</option>
  <option value="外文系">外文系</option>
  <option value="劇藝系">劇藝系</option>
  <option value="音樂系">音樂系</option>
  <option value="文院研究所">文院碩博士</option>
  <option value="文院教師與同仁">文院教師與同仁</option>
  <option disabled>【 　社科院 　】</option>
  <option value="政經系">政經系</option>
  <option value="社會系">社會系</option>
  <option value="社科院研究所">社科院碩博士</option>
  <option value="社科院教師與同仁">社科院教師與同仁</option>
  <option disabled>【 　理學院 　】</option>
  <option value="應數系">應數系</option>
  <option value="化學系">化學系</option>
  <option value="物理系">物理系</option>
  <option value="生科系">生科系</option>
  <option value="理院研究所">理院碩博士</option>
  <option value="理院教師與同仁">理院教師與同仁</option>
  <option disabled>【 　工學院 　】</option>
  <option value="電機系">電機系</option>
  <option value="機電系">機電系</option>
  <option value="資工系">資工系</option>
  <option value="材光系">材光系</option>
  <option value="工學院研究所">工學院碩博士</option>
  <option value="工院教師與同仁">工院教師與同仁</option>
  <option disabled>【 　管學院 　】</option>
  <option value="企管系">企管系</option>
  <option value="財管系">財管系</option>
  <option value="資管系">資管系</option>
  <option value="管學院研究所">管學院碩博士</option>
  <option value="管院教師與同仁">管院教師與同仁</option>
  <option disabled>【 　海科院 　】</option>
  <option value="海資系">海資系</option>
  <option value="海工系">海工系</option>
  <option value="海科院研究所">海科院碩博士</option>
  <option value="海院教師與同仁">海院教師與同仁</option>
  <option disabled>【&nbsp;&nbsp;校方機構&nbsp;&nbsp;】</option>
  <option value="行政處室">行政處室</option>
  <option value="藝文中心">藝文中心</option>
  <option value="圖書資訊處">圖書資訊處</option>
  <option value="產學營運中心">產學營運中心</option>
  <option value="其他單位">其他單位</option>
</select>
<span class="Apple-converted-space">&nbsp;</span>
	                      <select size="1" name="grade">
	                        <span class="Apple-converted-space"></span>
	                        <option selected>第幾級呢？</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="105">105</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="104">104</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="102">102</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="101">101</option>
	                        <span class="Apple-converted-space"></span>
                          </select>
	                      <span class="Apple-converted-space">&nbsp;</span></font></td>
                      </tr>
	                  <tr>
	                    <td align="left" height="13" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="checkbox" name="check_facebook" value="1" checked id="check_facebook">
	                      </font></span></td>
	                    <td align="left" height="13" width="89"><p style="margin-top: 0px; margin-bottom: 0px"><span style="vertical-align: medium"><font size="2" face="微軟正黑體" color="#0099FF"> 
	                      Facebook</font></span></td>
	                    <td align="right" width="19"><span style="margin-top: 0px; margin-bottom: 0px"><font face="微軟正黑體"><img src="http://www.pccillin.com.tw/images/fb.gif" alt=""></font></span></td>
	                    <td align="left" height="13" width="502"><p style="margin-top: 0px; margin-bottom: 0px"> <span style="vertical-align: medium"> <font face="微軟正黑體" color="#C0C0C0">
	                      <input name="T3" size="35" style="float: left; border: 1px solid rgb(192, 192, 192)">
	                      </font></span></td>
                      </tr>
	                  <tr>
	                    <td align="left" height="13" width="22"></td>
	                    <td height="13" colspan="2" align="left"><p style="margin-top: 0px; margin-bottom: 0px"> <span style="vertical-align: medium"> <font face="微軟正黑體" size="2" color="#FF0000"> 新的密碼</font></span></td>
	                    <td align="left" height="13" width="502"><p style="margin-top: 0px; margin-bottom: 0px"> <span style="vertical-align: medium"> <font face="微軟正黑體" color="#C0C0C0">
	                      <input name="T4" size="35" style="float: left; color: rgb(192, 192, 192); border: 1px solid rgb(192, 192, 192)">
	                      </font></span></td>
                      </tr>
	                  <tr>
	                    <td align="left" height="13" width="22"></td>
	                    <td height="13" colspan="2" align="left"><p style="margin-top: 0px; margin-bottom: 0px"> <span style="vertical-align: medium"> <font size="2" face="微軟正黑體" color="#FF0000"> 密碼確認</font></span></td>
	                    <td align="left" height="13" width="502"><p style="margin-top: 0px; margin-bottom: 0px"> <span style="vertical-align: medium"> <font face="微軟正黑體" color="#C0C0C0">
	                      <input name="T5" size="35" style="float: left; color: rgb(192, 192, 192); border: 1px solid rgb(192, 192, 192)">
	                      </font></span></td>
                      </tr>
	                  <tr>
	                    <td align="left" colspan="3" height="13"><p style="margin-top: 0px; margin-bottom: 0px"></td>
	                    <td align="left" height="13" width="502"><p style="margin-top: 0px; margin-bottom: 0px"></td>
                      </tr>
	                  <tr>
	                    <td align="left" colspan="4" height="42"><p style="margin-top: 0px; margin-bottom: 0px"><span style="vertical-align: medium">&nbsp;</span><span style="vertical-align: medium"><font size="2"><img src="http://www.airstage.com.tw/nsysu/airs/page/airstab/app/accounts/jpg/line.jpg" alt="" width="630" height="1" border="0" align="left"></font></span></p>
                          <p style="margin-top: 0px; margin-bottom: 0px"></td>
                      </tr>
                    </table>
	                <table border="0" width="646" cellspacing="1" height="357">
	                  <tr>
	                    <td align="left" colspan="5" height="2"><p style="margin-top: 0px; margin-bottom: 0px"> <font face="微軟正黑體"></p>
	                      <p style="margin-top: 0px; margin-bottom: 0px"><font size="2"><b>（二）常用資料：</b><span class="Apple-converted-space">&nbsp;</span><font color="#333333">會自動記錄，方便以後不用重填</font></font>                          
	                      <p style="margin-top: 0px; margin-bottom: 0px"></td>
                      </tr>
	                  <tr>
	                    <td align="left" height="1" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="checkbox" name="check_msn" value="1" id="check_msn">
	                      </font></span></td>
	                    <td align="left" height="1" width="93"><p style="margin-top: 0px; margin-bottom: 0px"> <font color="#0099FF"><span style="vertical-align: medium"><font face="微軟正黑體" size="2">MSN　</font></span></font></td>
	                    <td align="left" width="17"><span style="margin-top: 0px; margin-bottom: 0px"><font color="#0099FF"><font face="微軟正黑體"><img src="https://encrypted-tbn3.google.com/images?q=tbn:ANd9GcTBZwvwVjMGbhInOthILiljaNLc_AC0AdmBsvlqdC3OLz6RVttG" alt="" width="16" height="16"></font></font></span></td>
	                    <td align="left" height="1" colspan="2"><span style="vertical-align: medium"> <font face="微軟正黑體" color="#C0C0C0">
	                      <input name="msn" size="34" style="float: left; color: rgb(192, 192, 192); border: 1px solid rgb(192, 192, 192)">
	                      </font></span></td>
                      </tr>
	                  <tr>
	                    <td align="left" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="checkbox" name="check_twitter" value="ON">
	                      </font></span></td>
	                    <td align="left"><font color="#0099FF"><span style="vertical-align: medium"><font face="微軟正黑體" size="2">Twitter</font></span></font></td>
	                    <td align="left"><font color="#0099FF"><font face="微軟正黑體"><img src="https://encrypted-tbn0.google.com/images?q=tbn:ANd9GcRXwLPUkXaduzV_Mna-a74rv4K5w-oirMO4H0hEbjnNMkI9BIbS0A" alt=""></font></font></td>
	                    <td align="left" colspan="2"><span style="vertical-align: medium"> <font face="微軟正黑體" color="#C0C0C0">
	                      <input name="twitter" size="34" style="float: left; color: rgb(192, 192, 192); border: 1px solid rgb(192, 192, 192)">
	                      </font></span></td>
                      </tr>
	                  <tr>
	                    <td align="left" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="checkbox" name="check_plurk" value="ON">
	                      </font></span></td>
	                    <td align="left"><font color="#0099FF"> <span style="vertical-align: medium"><font face="微軟正黑體" size="2">Plurk</font></span></font></td>
	                    <td align="left"><font color="#0099FF"><span style="vertical-align: medium"><font face="微軟正黑體"><img src="https://encrypted-tbn0.google.com/images?q=tbn:ANd9GcR1JaAOCNgLEWVxxyk8qXiq4otEva94IQbiEAZNeJy7iYP04o7Y" alt=""></font></span></font></td>
	                    <td align="left" colspan="2"><span style="vertical-align: medium"> <font face="微軟正黑體" color="#C0C0C0">
	                      <input name="plurk" size="34" style="float: left; color: rgb(192, 192, 192); border: 1px solid rgb(192, 192, 192)">
	                      </font></span></td>
                      </tr>
	                  <tr>
	                    <td align="left" height="1" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="checkbox" name="check_skype" value="ON">
	                      </font></span></td>
	                    <td height="1" align="left"><font color="#0099FF"><span style="vertical-align: medium"><font size="2" face="微軟正黑體">Skype</font></span></font></td>
	                    <td height="1" align="left"><font color="#0099FF"><font face="微軟正黑體"><img src="https://encrypted-tbn2.google.com/images?q=tbn:ANd9GcTxk19xab9zH7syPeMI7E1uaF5o9CUw0wl0RIIG8zzqH6TyYCPc" alt=""></font></font></td>
	                    <td align="left" height="1" colspan="2"><span style="vertical-align: medium"> <font face="微軟正黑體" color="#C0C0C0">
	                      <input name="skype" size="34" style="float: left; color: rgb(192, 192, 192); border: 1px solid rgb(192, 192, 192)">
	                      </font></span></td>
                      </tr>
	                  <tr>
	                    <td align="left" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="checkbox" name="check_phone" value="1" id="check_phone">
	                      </font></span></td>
	                    <td colspan="2" align="left"><font size="2" face="微軟正黑體">手　　機</font></td>
	                    <td align="left" colspan="2"><span style="vertical-align: medium"> <font face="微軟正黑體" color="#C0C0C0">
	                      <input name="phone" size="34" style="float: left; color: rgb(192, 192, 192); border: 1px solid rgb(192, 192, 192)">
	                      </font></span></td>
                      </tr>
	                  <tr>
	                    <td align="left" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="checkbox" name="check_email" value="1" id="check_email">
	                      </font></span></td>
	                    <td colspan="2" align="left"><span style="vertical-align: medium"> <font size="2" face="微軟正黑體">常用信箱</font></span></td>
	                    <td align="left" colspan="2"><span style="vertical-align: medium"> <font face="微軟正黑體" color="#C0C0C0">
	                      <input name="email" size="34" style="float: left; color: rgb(192, 192, 192); border: 1px solid rgb(192, 192, 192)">
	                      </font></span></td>
                      </tr>
	                  <tr>
	                    <td align="left" height="2" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="checkbox" name="check_clubs" value="1" id="check_clubs">
	                      </font></span></td>
	                    <td height="2" colspan="2" align="left"><span style="vertical-align: medium"> <font size="2" face="微軟正黑體">社　　團</font></span></td>
	                    <td align="left" height="2" colspan="2"><font face="微軟正黑體">
	                      <select size="1" name="club">
	                        <span class="Apple-converted-space"></span>
	                        <option disabled>有參加社團嗎？</option>
	                        <span class="Apple-converted-space"></span>
	                        <option disabled>【　服務性社團　】</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="基服社">基服社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="滋青社">滋青社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="慈青社">慈青社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="原學社">原學社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="迴馨社">迴馨社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="扶根社">扶根社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="水上安全社">水上安全社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="綠色西灣社">綠色西灣社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="動物保護教育推廣社">動物保護教育推廣社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="英語志工社">英語志工社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="法輪大法社">法輪大法社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option disabled>【　學術性社團　】</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="AIESEC">AIESEC</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="福爾摩沙社">福爾摩沙社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="青年領袖研習社">青年領袖研習社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="中山團契">中山團契</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="學員團契">學員團契</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="中諦佛學社">中諦佛學社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="奇蹟生命研習社">奇蹟生命研習社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="現代詩社">現代詩社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="喜樂團契">喜樂團契</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="全人學社">全人學社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="西子劇坊">西子劇坊</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="推理小說研究社">推理小說研究社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="嚴新氣功科學研習社">嚴新氣功科學研習社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="中醫社">中醫社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="易學社">易學社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="晨興設">晨興社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="思辨社">思辨社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="天文社" selected>天文社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="命學社">命學社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option disabled>【　音樂性社團　】</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="颺韻合唱團">颺韻合唱團</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="吉他社">吉他社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="管樂社">管樂社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="南雁國樂社">南雁國樂社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="楊門樂社">揚門樂社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="室內樂社">室內樂社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="詩人詩頭會社">詩人詩頭會社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option disabled>【　學藝性社團　】</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="攝影社">攝影社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="手語社">手語社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="美食社">美食社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="圍棋社">圍棋社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="電影社">電影社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="動畫社">動畫社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="書法社">書法社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="橋藝社">橋藝社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="美術社">美術社</option>
	                        <span class="Apple-converted-space"></span>
                          </select>
	                    </font></td>
                      </tr>
	                  <tr>
	                    <td align="left" height="2" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="checkbox" name="check_level" value="ON" id="check_level">
	                      </font></span></td>
	                    <td height="2" colspan="2" align="left"><span style="vertical-align: medium"> <font size="2" face="微軟正黑體">社團身分</font></span></td>
	                    <td align="left" height="2" colspan="2"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <select name="level" size="1">
	                        <option selected>社團裡的身分？</option>
	                        <option>會長</option>
	                        <option>副會長</option>
	                        <option>社團幹部</option>
	                        <option>社團成員</option>
                          </select>
	                      </font></span></td>
                      </tr>
	                  <tr>
	                    <td align="left" height="0" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="checkbox" name="check_food" value="1" id="check_food">
	                      </font></span></td>
	                    <td height="0" colspan="2" align="left"><p style="margin-top: 0px; margin-bottom: 0px"> <span style="vertical-align: medium"> <font size="2" face="微軟正黑體">飲　　食</font></span></td>
	                    <td height="0" colspan="2" align="left"><font face="微軟正黑體">
	                      <select name="food" size="1">
	                        <span class="Apple-converted-space"></span>
	                        <option>有不能吃的嗎？</option>
	                        <option value="葷食">葷食</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="素食">素食</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="不吃牛肉">不吃牛肉</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="不吃豬肉">不吃豬肉</option>
	                        <span class="Apple-converted-space"></span>
                          </select>
	                    </font></td>
                      </tr>
	                  <tr>
	                    <td align="left" height="1"><font face="微軟正黑體">
	                      <input type="checkbox" name="check_special" value="1" id="check_special">
	                    </font></td>
	                    <td height="1" colspan="2" align="left" class="d">特別身分</td>
	                    <td height="1" colspan="2" align="left"><select name="food0" size="1">
	                      <option selected>其他身分？</option>
	                      <option>【　中山學生會　】</option>
	                      <option>會長</option>
	                      <option>副會長</option>
	                      <option>活動部</option>
	                      <option>權益部</option>
	                      <option>社團部</option>
	                      <option>財務部</option>
	                      <option>新聞部</option>
	                      <option>秘書部</option>
	                      <option>【　Airstage　】</option>
	                      <option>營運部</option>
	                      <option>技術部</option>
	                      <option>管理員</option>
	                      <option>【　各類部門　】</option>
	                      <option>校園大使</option>
	                      <option>禮儀大使</option>
	                      <option>宿網委員會</option>
	                      <option>中山大學教職員</option>
	                      <option>畢業校友</option>
	                      <option>合作廠商</option>
                        </select></td>
                      </tr>
	                  <tr>
	                    <td align="left" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="checkbox" name="check_hometown" value="ON" id="check_hometown">
	                      </font></span></td>
	                    <td colspan="2" align="left"><span style="vertical-align: medium"> <font size="2" face="微軟正黑體">家　　鄉</font></span></td>
	                    <td align="left" colspan="2"><font face="微軟正黑體">
	                      <select size="1" name="hometown">
	                        <span class="Apple-converted-space"></span>
	                        <option>來至哪裡呀？</option>
	                        <option disabled>【台灣】</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="基隆">基隆</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="台北">台北</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="桃園">桃園</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="新竹">新竹</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="宜蘭">宜蘭</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="苗栗">苗栗</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="台中">台中</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="彰化">彰化</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="南投">南投</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="花蓮">花蓮</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="雲林">雲林</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="嘉義">嘉義</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="台南">台南</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="高雄">高雄</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="台東">台東</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="屏東">屏東</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="金門">金門</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="澎湖">澎湖</option>
	                        <span class="Apple-converted-space"></span>
	                        <option disabled>【海外】</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="馬來西亞">馬來西亞</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="新加坡">新加坡</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="中國">中國</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="澳門">澳門</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="香港">香港</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="菲律賓">菲律賓</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="越南">越南</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="印度">印度</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="歐洲">歐洲</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="澳洲">澳洲</option>
	                        <span class="Apple-converted-space"></span>
	                        <option>美洲</option>
	                        <option>亞洲</option>
                          </select>
	                    </font></td>
                      </tr>
	                  <tr>
	                    <td align="left" width="22">&nbsp;</td>
	                    <td colspan="2" align="left"><font face="微軟正黑體"> <span style="vertical-align: medium"> <font size="2">身&nbsp; 分&nbsp; 證</font></span></font></td>
	                    <td align="left" colspan="2"><span style="vertical-align: medium"> <font face="微軟正黑體" color="#C0C0C0">
	                      <input name="id" size="34" style="float: left; color: rgb(192, 192, 192); border: 1px solid rgb(192, 192, 192)">
	                      </font></span></td>
                      </tr>
	                  <tr>
	                    <td align="left" width="22"><font face="微軟正黑體"> <span style="vertical-align: medium">
	                      <input type="checkbox" name="check_dorm" value="ON" id="check_dorm">
	                      </span></td>
	                    <td colspan="2" align="left"><span style="vertical-align: medium"> <font size="2" face="微軟正黑體">宿　　舍</font></span></td>
	                    <td align="left" colspan="2"><font face="微軟正黑體">
	                      <select size="1" name="dorm">
	                        <span class="Apple-converted-space"></span>
	                        <option selected>住哪一棟呢？</option>
	                        <option disabled value>【武嶺山莊】</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="武嶺一村">武嶺一村</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="武嶺二村">武嶺二村</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="武嶺三村">武嶺三村</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="武嶺四村">武嶺四村</option>
	                        <span class="Apple-converted-space"></span>
	                        <option disabled value>【翠亨山莊】</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="A棟">A棟</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="B棟">B棟</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="C棟">C棟</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="D棟">D棟</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="E棟">E棟</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="F棟">F棟</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="G棟">G棟</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="H棟">H棟-女宿</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="L棟">L棟-女宿</option>
	                        <span class="Apple-converted-space"></span>
                          </select>
	                      <span class="Apple-converted-space">&nbsp;</span>
	                      <select size="1" name="floor">
	                        <span class="Apple-converted-space"></span>
	                        <option value="1">1</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="2">2</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="3">3</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="4">4</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="5">5</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="6">6</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="7">7</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="8">8</option>
	                        <span class="Apple-converted-space"></span>
                          </select>
	                      <span class="Apple-converted-space">&nbsp;</span><font size="2">樓</font><span class="Apple-converted-space">&nbsp;</span>
	                      <input type="text" name="room" size="6">
	                      <span class="Apple-converted-space">&nbsp;</span><font size="2">號</font></font></td>
                      </tr>
	                  <tr>
	                    <td align="left" width="22"><font face="微軟正黑體"> <span style="vertical-align: medium">&nbsp;</span></td>
	                    <td colspan="2" align="left"><font face="微軟正黑體"> <span style="vertical-align: medium"> <font size="2">戶　　籍</font></span></font></td>
	                    <td align="left" colspan="2"><span style="vertical-align: medium"> <font face="微軟正黑體" color="#C0C0C0">
	                      <input name="home_address" size="55" style="float: left; color: rgb(192, 192, 192); border: 1px solid rgb(192, 192, 192)">
	                      </font></span></td>
                      </tr>
	                  <tr>
	                    <td align="left" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="checkbox" name="check_address0" value="1">
	                      </font></span></td>
	                    <td colspan="2" align="left"><span style="vertical-align: medium"> <font face="微軟正黑體" size="2">校外住址</font></span></td>
	                    <td align="left" colspan="2"><span style="vertical-align: medium"> <font face="微軟正黑體" color="#C0C0C0">
	                      <input name="address0" size="55" style="float: left; color: rgb(192, 192, 192); border: 1px solid rgb(192, 192, 192)">
	                      </font></span></td>
                      </tr>
	                  <tr>
	                    <td align="left" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="checkbox" name="check_transport" value="1">
	                      </font></span></td>
	                    <td colspan="2" align="left"><span style="vertical-align: medium"> <font size="2" face="微軟正黑體">交通工具</font></span></td>
	                    <td align="left" colspan="2"><font face="微軟正黑體">
	                      <select name="transport" size="1">
	                        <span class="Apple-converted-space"></span>
	                        <option>有機車嗎？</option>
	                        <option value="步行">步行</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="會騎車,沒機車">會騎車,沒機車</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="會騎車,有機車">會騎車,有機車</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="汽車">汽車</option>
	                        <span class="Apple-converted-space"></span>
                          </select>
	                    </font></td>
                      </tr>
	                  <tr>
	                    <td align="left" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="checkbox" name="check_photo" value="1" id="check_photo">
	                      </font></span></td>
	                    <td colspan="2" align="left"><font size="2" face="微軟正黑體"> 個人圖像</font></td>
	                    <td align="left" colspan="2">&nbsp;</td>
                      </tr>
	                  <tr>
	                    <td align="left" width="22"><font face="微軟正黑體"> <span style="vertical-align: medium">&nbsp;</span></td>
	                    <td colspan="2" align="left"><font face="微軟正黑體"> <span style="vertical-align: medium">&nbsp;</span></td>
	                    <td align="left" width="242"><table border="0" width="216" cellspacing="0" cellpadding="0" height="200">
	                      <tr>
	                        <td width="216" height="200" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0" align="center"><img src="jpg/head.jpg" alt="" width="205" height="185" border="0" align="middle"></td>
	                        </tr>
	                      </table></td>
	                    <td align="left" width="248"><font face="微軟正黑體"><font size="2">上傳圖像</font>
	                      <input type="file" name="photoimg" id="photoimg" placeholder="限jpg檔,大小不可超過1MB">
	                      </font></td>
                      </tr>
	                  <tr>
	                    <td align="left" colspan="5">&nbsp;</td>
	                    
                      <td width="5"></tr>
	                  <tr>
	                    <td align="left" colspan="5">&nbsp;</td>
                      </tr>
	                  <tr>
	                    <td align="left" width="22">&nbsp;</td>
	                    <td colspan="2" align="left">&nbsp;</td>
	                    <td align="left" colspan="2"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      <input type="submit" value="送出資料">
	                      <span class="Apple-converted-space">&nbsp;</span>
	                      <input type="button" value="取消修改">
	                      </font></span></td>
                      </tr>
                    </table>
	              </form></td>
              </tr>
            </table>
	        <p><font face="微軟正黑體"><span style="vertical-align: medium">&nbsp;</span></p>
	        <p><span style="vertical-align: medium">&nbsp;</span></p>
	        <p><span style="vertical-align: medium">&nbsp;</span>      
	        </div></td>
        </tr>
	    <tr>
	      <td height="106" background="../jpg/last.png" valign="top"><div align="right">
	        <table border="0" width="51%" height="45">
	          <tr>
	            <td align="left" width="116"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP21'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP21'].src=document['fpAnimswapImgFP21'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/index.htm"> <img src="../mo/jpg/b1.jpg" alt="" name="fpAnimswapImgFP21" width="62" height="24" border="0" align="right" lowsrc="../mo/jpg/b102.jpg" id="fpAnimswapImgFP21" dynamicanimation="fpAnimswapImgFP21"></a><a onMouseOver="var img=document['fpAnimswapImgFP22'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP22'].src=document['fpAnimswapImgFP22'].imgRolln" target="_parent" href="https://www.facebook.com/pages/Airstage西灣人中山人的校園互動平台/356803227687619"><img src="../mo/jpg/b0.jpg" alt="" name="fpAnimswapImgFP22" width="31" height="24" border="0" align="right" lowsrc="../mo/jpg/b002.jpg" id="fpAnimswapImgFP22" dynamicanimation="fpAnimswapImgFP22"></a></font></td>
	            <td align="left" width="68"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP23'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP23'].src=document['fpAnimswapImgFP23'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/02.htm"> <img src="../mo/jpg/b2.jpg" alt="" name="fpAnimswapImgFP23" width="61" height="24" border="0" align="left" lowsrc="../mo/jpg/b202.jpg" id="fpAnimswapImgFP23" dynamicanimation="fpAnimswapImgFP23"></a></font></td>
	            <td align="left" width="109"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP24'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP24'].src=document['fpAnimswapImgFP24'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/03.htm"> <img src="../mo/jpg/b3.jpg" alt="" name="fpAnimswapImgFP24" width="61" height="24" border="0" align="left" lowsrc="../mo/jpg/b302.jpg" id="fpAnimswapImgFP24" dynamicanimation="fpAnimswapImgFP24"></a></font></td>
	            <td align="left" valign="bottom"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP25'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP25'].src=document['fpAnimswapImgFP25'].imgRolln" target="_parent" href="http://www.airstage.com.tw"> <img src="../mo/jpg/b4.jpg" alt="" name="fpAnimswapImgFP25" width="124" height="30" border="0" align="left" lowsrc="../mo/jpg/b402.jpg" id="fpAnimswapImgFP25" dynamicanimation="fpAnimswapImgFP25"></a></font></td>
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