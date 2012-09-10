<?php session_start(); 
if(isset($_SESSION['name']) == false){
	$_SESSION['name'] = "";
}
include('../../../../conn.php');
?>


<html><head>
<link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<title>│Airstage 西灣人│會員中心：修改個人資料</title>
<style fprolloverstyle>A:hover {text-decoration: underline; font-weight: bold}
</style>
<script language="JavaScript" fptype="dynamicanimation">
<!--
function dynAnimation() {}
function clickSwapImg() {}
//-->
</script>
<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script language="javascript" type="text/javascript" src="../../../../plugin/shadowbox/shadowbox.js"></script>
<script language="javascript" type="text/javascript" src="../../../../plugin/jrumble/jquery.jrumble.1.3.min.js"></script>
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
<link rel="stylesheet" type="text/css" href="../../../../plugin/shadowbox/shadowbox.css">
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
        	<td width="38" background="../../../../jpg/top0201.jpg"></td>
        	<td height="43" width="99" background="../../../../jpg/top0202.jpg" align="right"><p style="margin-top: 0; margin-bottom: 0"><a href="http://www.airstage.com.tw/"><img src="../theater/jpg/logo.png" name="logo" id="logo" align="left" /></a></td>
			<td height="75" background="../../../../jpg/top0202.jpg" width="700" valign="top">
  			
			<font color="#FFFFFF">
			<a onMouseOver="var img=document['fpAnimswapImgFP9'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP9'].src=document['fpAnimswapImgFP9'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/index.htm"><img border="0" src="../../../../jpg/calendar_button01.jpg" width="89" height="75" id="fpAnimswapImgFP9" name="fpAnimswapImgFP9" dynamicanimation="fpAnimswapImgFP9" lowsrc="../../../../jpg/calendar_button02.jpg"></a></font></a><font color="#FFFFFF"><img border="0" src="../../../../jpg/wh.jpg" width="20" height="75"><a href="http://www.airstage.com.tw/nsysu/airs/page/airstab/index.htm"><img border="0" src="../../../../jpg/airstab_button02.jpg" width="89" height="75"></a></font></td>
			<td background="../../../../jpg/top0203.jpg" width="124" valign="middle"><span style="margin-top: 0; margin-bottom: 0">
			  <?php
				if($_SESSION['name'] == ""){
            	echo '<a LANGUAGE="VBScript" TARGET="screen" onClick="screen.location.href =\'main.htm\'" href="../../../../member/login.php"  style="border:0 none; text-decoration:none; font-weight:700" id="login" rel="shadowbox; width=330; height=350" title=\'會員登入\'>
			<font color="#000000" size="2">會員登入</font></a>';
				}
				else if($_SESSION['name'] != ""){
					echo '<a href="correct.php" style="border:0; color:#000000; font-size:14px"><b>'.$_SESSION['name'].'</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="../../../../member/logout.php" style="border:0; color:#000000; font-size:14px"><b>登出</b></a>';
				}
			?>
			</span></td>
			
           
		</tr>
	</table>
	<div align="center">
	  <table border="0" width="980" height="693" cellspacing="0" cellpadding="0">
	    <tr>
	      <td background="../../../../jpg/bot.jpg" valign="top"><div align="center">
	        <table border="0" width="98%" cellspacing="0" cellpadding="0" height="761">
	          <tr>
	            <td align="left" valign="top" height="192" colspan="2" background="jpg/top.jpg" width="960"><p align="center">&nbsp;</p></td>
              </tr>
	          <tr>
	            <td align="left" valign="top" width="30%"><div align="center">
	              <p align="center">&nbsp;</p>
	              <table border="0" width="65%" height="135">
	                <tr>
	                  <td height="48" width="4%"><p style="line-height: 150%; margin-top: 0; margin-bottom: 0"> <img src="jpg/gray.jpg" alt="" width="6" height="50" border="0"></td>
	                  <td height="48" width="8%"><p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;</td>
	                  <td height="48" width="81%"><p style="line-height: 150%; margin-top: 0; margin-bottom: 0"> <b> <font size="2">修改個人資料</font></b></p>
	                    <p style="line-height: 150%; margin-top: 0; margin-bottom: 0"> <font size="2"><a href="index.htm"> <font color="#1F1F1F"> <span style="text-decoration: none">傳送即時短訊</span></font></a></font></td>
	                  </tr>
	                <tr>
	                  <td colspan="3" height="6"><p style="margin-top: 0; margin-bottom: 0"> <font color="#FFFFFF" style="font-size: 1pt">1</font></td>
	                  </tr>
	                <tr>
	                  <td><p style="line-height: 150%; margin-top: 0; margin-bottom: 0"> <img src="jpg/gray.jpg" alt="" width="6" height="75" border="0"></td>
	                  <td>&nbsp;</td>
	                  <td><p style="line-height: 150%; margin-top: 0; margin-bottom: 0"> <font size="2">影音聯播</font></p>
	                    <p style="line-height: 150%; margin-top: 0; margin-bottom: 0"> <font size="2">24HR幫幫忙</font></p>
	                    <p style="line-height: 150%; margin-top: 0; margin-bottom: 0"> <font size="2">報名系統</font></td>
	                  </tr>
	                </table>
	              </div></td>
	            <td align="center" valign="top" width="70%"><p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;</p>
	              <p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;</p>
	              
				  <!--重新排版&加上資料庫-->
				  <?php
				  	$stu_id=$_SESSION['stu_id'];
				  	$sql='SELECT * FROM `Member` WHERE stu_id="'.$stu_id.'"';
				  	$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_array($result);
					echo $sql;
//$name = $row['name'];
				  ?>
			<form action="revises_act.php" method="post">  
				<table border="0" width="640" cellspacing="1" height="150">
	            	<tr>
                    	<td align="center" colspan="3" height="28" valign="top">
                        <p align="left" style="margin-top: 0; margin-bottom: 0"> 
                        <font face="Times New Roman" size="5" style="font-weight: 700" color="#1F1F1F"> ♠</font>
                        <font face="微軟正黑體" size="4" color="#333333"> <b>修改個人資料</b></font>
                        <p align="left" style="margin-top: 0; margin-bottom: 0"> &nbsp;</td>
                    </tr>
	                <tr>
                    	<td align="center" colspan="3" height="6">
                        	<p style="margin-top: 0; margin-bottom: 0"> 
                            <font size="2"> 
                            	<img src="jpg/line.jpg" alt="" width="630" height="1" border="0" align="left">
                           	</font>
                        	<p style="margin-top: 0; margin-bottom: 0"> &nbsp;
                       		<p style="margin-top: 0; margin-bottom: 0" align="left">
                            	<font size="2">
                                	<b>（一）基本資料　</b>
                                	<font color="#333333">請</font>
                                	<font color="#FF0000">勾選</font>
                                	<font color="#333333">欲讓人看到的項目</font>
                               	</font>
                        <p style="margin-top: 0; margin-bottom: 0" align="left"> &nbsp;</td>
                    </tr>
	                <tr>
	                  	<td align="left" height="14" width="20">
                        	<input type="checkbox" name="check_student_id" value="1" checked>
                        </td>
	                  	<td align="left" height="14" width="80">
                        	<p align="left" style="margin-top: 0; margin-bottom: 0"> 
                            <font size="2">學　　號</font>
                        </td>
	                  	<td align="left" height="14" width="530">
                        	<p style="margin-top: 0; margin-bottom: 0"> 
                            <font color="#C0C0C0">
                            	<input type="text" name="stu_id" size="20" style="float: left; border: 1px solid #C0C0C0" value="<?php echo $row['stu_id']; ?>" />
                            </font>
                        </td>
                    </tr>
	                <tr>
	                  	<td align="left" height="13" width="20"></td>
	                  	<td align="left" height="13" width="80">
                        	<p align="left" style="margin-top: 0; margin-bottom: 0"> 
                            <font size="2">姓　　名</font>
                        </td>
	                  	<td align="left" height="13" width="530">
                        	<p style="margin-top: 0; margin-bottom: 0"> 
                            <font color="#C0C0C0">
	                    		<input name="name" size="20" style="float: left; border: 1px solid #C0C0C0" value="<?php echo $row['name']; ?>">
	                    	</font>
                        </td>
                    </tr>
	                <tr>
	                  	<td align="left" height="7" width="20">
                        	<input type="checkbox" name="check_gender" value="1" checked>
                        </td>
	                  	<td align="left" height="7" width="80">
                        	<p style="margin-top: 0; margin-bottom: 0">
                            <font size="2"> 性　　別</font>
                        </td>
	                  	<td align="left" height="7" width="530">
                        	<p style="margin-top: 0; margin-bottom: 0">
                        	<input type="radio" value="男" name="gender" style="text-shadow: rgba(50, 50, 50, 0.296875) 2px 2px 3px; "
							<?php 
								if($row['gender']=="男") echo "checked"; 
							?>>
	                    	<font size="2">男&nbsp;&nbsp;</font>
	                    	<input type="radio" value="V1" name="gender" style="text-shadow: rgba(50, 50, 50, 0.296875) 2px 2px 3px; "
                        	<?php
                        		if($row['gender']=="女") echo "checked";
							?>>
	                    	<font size="2">女</font>
                        </td>
                    </tr>
	                <tr>
	                  	<td align="left" height="6" width="20"></td>
	                  	<td align="left" height="6" width="80"><font size="2">系　　級</font></td>
	                  	<td align="left" height="6" width="530">
                            <select name="department" size="1">
                                <option value="不知啥系">不知道啥系</option>
                                <option disabled>【 　文學院 　】</option>
                                <option value="中文系">中文系</option>
                                <option value="外文系">外文系</option>
                                <option value="劇藝系">劇藝系</option>
                                <option value="音樂系">音樂系</option>
                                <option value="文院研究所">文院研究所</option>
                                <option value="文院教師與同仁">文院教師與同仁</option>
                                <option disabled>【 　社科院 　】</option>
                                <option value="政經系">政經系</option>
                                <option value="社會系">社會系</option>
                                <option value="社科院研究所">社科院研究所</option>
                                <option value="社科院教師與同仁">社科院教師與同仁</option>
                                <option disabled>【 　理學院 　】</option>
                                <option value="應數系">應數系</option>
                                <option value="化學系">化學系</option>
                                <option value="物理系">物理系</option>
                                <option value="生科系">生科系</option>
                                <option value="理院研究所">理院研究所</option>
                                <option value="理院教師與同仁">理院教師與同仁</option>
                                <option disabled>【 　工學院 　】</option>
                                <option value="電機系">電機系</option>
                                <option value="機電系">機電系</option>
                                <option value="資工系">資工系</option>
                                <option value="材光系">材光系</option>
                                <option value="工學院研究所">工學院研究所</option>
                                <option value="工院教師與同仁">工院教師與同仁</option>
                                <option disabled>【 　管學院 　】</option>
                                <option value="企管系">企管系</option>
                                <option value="財管系">財管系</option>
                                <option value="資管系">資管系</option>
                                <option value="管學院研究所">管學院研究所</option>
                                <option value="管院教師與同仁">管院教師與同仁</option>
                                <option disabled>【 　海科院 　】</option>
                                <option value="海資系">海資系</option>
                                <option value="海工系">海工系</option>
                                <option value="海科院研究所">海科院研究所</option>
                                <option value="海院教師與同仁">海院教師與同仁</option>
                                <option disabled>【   校方機構   】</option>
                                <option value="行政處室">行政處室</option>
                                <option value="藝文中心">藝文中心</option>
                                <option value="圖書資訊處">圖書資訊處</option>
                                <option value="產學營運中心">產學營運中心</option>
                                <option value="其他單位">其他單位</option>
                            </select>
                            <select size="1" name="grade">
                                <option>不知道啥</option>
                                <option selected value="105">105</option>
                                <option value="104">104</option>
                                <optionvalue="103">103</option>
                                <option value="102">102</option>
                                <option value="101">101</option>
                            </select>
	                    	<font size="2">級</font>
                        </td>
                    </tr>
	                <tr>
                        <td align="left" height="13" width="20">
                        	<input type="checkbox" name="check_email" value="1" checked>
                        </td>
                        <td align="left" height="13" width="80">
                        	<p style="margin-top: 0; margin-bottom: 0"><font size="2"> 信　　箱</font>
                        </td>
                        <td align="left" height="13" width="530">
                        	<p style="margin-top: 0; margin-bottom: 0"> 
                            <font color="#C0C0C0">
	                    		<input name="T3" size="35" style="float: left; border: 1px solid #C0C0C0" value="<?php echo $row['email']; ?>">
	                    	</font>
                        </td>
                    </tr>
	                <tr>
                        <td align="left" height="13" width="20"></td>
                        <td align="left" height="13" width="80">
                        	<p style="margin-top: 0; margin-bottom: 0">
                            <font size="2"> 密　　碼</font>
                        </td>
                        <td align="left" height="13" width="530">
                        	<p style="margin-top: 0; margin-bottom: 0"> 
                            <font color="#C0C0C0">
	                    		<input name="T4" size="35" style="float: left; color: #C0C0C0; border: 1px solid #C0C0C0">
	                    	</font>
                        </td>
                    </tr>
	                <tr>
                        <td align="left" height="13" width="20"></td>
                        <td align="left" height="13" width="80">
                        	<p style="margin-top: 0; margin-bottom: 0">
                            <font size="2"> 密碼確認</font>
                        </td>
                        <td align="left" height="13" width="530">
                        	<p style="margin-top: 0; margin-bottom: 0"> 
                            <font color="#C0C0C0">
	                    		<input name="T5" size="35" style="float: left; color: #C0C0C0; border: 1px solid #C0C0C0">
	                   		</font>
                        </td>
                    </tr>
	                <tr>
                        <td align="left" colspan="2" height="13" width="103"><p style="margin-top: 0; margin-bottom: 0"></td>
                        <td align="left" height="13" width="530"><p style="margin-top: 0; margin-bottom: 0"></td>
                    </tr>
	                <tr>
	                  	<td align="left" colspan="3" height="3" width="99%">
                        	<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
	                    	<p style="margin-top: 0; margin-bottom: 0">
                            	<font size="2"> 
                                	<b>（二）常用資料：</b>
                                    <font color="#333333">會自動記錄，方便以後不用重填</font>
                                </font>
                        	</p>
	                    	<p style="margin-top: 0; margin-bottom: 0">&nbsp;
                        </td>
                  	</tr>
				</table>
                <table border="0" width="640" cellspacing="1" height="357">
                  	<tr>
                    	<td align="left" colspan="3" height="2" width="99%">
                            <p style="margin-top: 0; margin-bottom: 0">
                                <font size="2"> 
                                    <img src="jpg/line.jpg" alt="" width="630" height="1" border="0" align="left">
                                </font>
                            </p>
                            <p style="margin-top: 0; margin-bottom: 0">&nbsp;
                    	</td>
                  	</tr>
                  	<tr>
                        <td align="left" height="1" width="27">
                        	<input type="checkbox" name="check_hp" value="1" />
                        </td>
                        <td align="left" height="1" width="79">
                        	<p style="margin-top: 0; margin-bottom: 0">
                            	<font size="2"> 手　　機　　</font>
                            </p>
                        </td>
                        <td align="left" height="1" width="522">
                        	<font color="#C0C0C0">
                      			<input name="hp" size="20" style="float: left; color: #C0C0C0; border: 1px solid #C0C0C0">
                      		</font>
                      	</td>
                    </tr>
                    <tr>
                        <td align="left" width="27"><input type="checkbox" name="check_fb" value="1"></td>
                        <td align="left" width="79"><font size="2">Facebook</font></td>
                        <td align="left" width="522">
                            <font color="#C0C0C0">
                                <input name="fb" size="34" style="float: left; color: #C0C0C0; border: 1px solid #C0C0C0">
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" width="27"><input type="checkbox" name="check_twitter" value="ON"></td>
                        <td align="left" width="79"><font size="2">Twitter</font></td>
                        <td align="left" width="522">
                            <font color="#C0C0C0">
                                <input name="twitter" size="34" style="float: left; color: #C0C0C0; border: 1px solid #C0C0C0">
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" width="27"><input type="checkbox" name="check_plurk" value="ON"></td>
                        <td align="left" width="79"><font size="2">plurk</font></td>
                        <td align="left" width="522">
                            <font color="#C0C0C0">
                                <input name="plurk" size="34" style="float: left; color: #C0C0C0; border: 1px solid #C0C0C0">
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" height="1" width="27"><input type="checkbox" name="check_skype" value="ON"></td>
                        <td align="left" height="1" width="79"><font size="2" face="Arial">Skype</font></td>
                        <td align="left" height="1" width="522">
                            <font color="#C0C0C0">
                                <input name="skype" size="34" style="float: left; color: #C0C0C0; border: 1px solid #C0C0C0">
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" width="27"><input type="checkbox" name="check_msn" value="1"></td>
                        <td align="left" width="79"><font size="2">MSN</font></td>
                        <td align="left" width="522">
                            <font color="#C0C0C0">
                                <input name="msn" size="34" style="float: left; color: #C0C0C0; border: 1px solid #C0C0C0">
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" width="27"><input type="checkbox" name="check_second_email" value="1"></td>
                        <td align="left" width="79"><font size="2">備用信箱</font></td>
                        <td align="left" width="522">
                            <font color="#C0C0C0">
                                <input name="second_email" size="34" style="float: left; color: #C0C0C0; border: 1px solid #C0C0C0">
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" height="2" width="27"><input type="checkbox" name="check_dorm" value="1"></td>
                        <td align="left" height="2" width="79"><p style="margin-top: 0; margin-bottom: 0"><font size="2"> 宿　　舍</font></td>
                        <td align="left" height="2" width="522">
                            <select size="1" name="dorm">
                                <option disabled value="">【武嶺山莊】</option>
                                <option value="武嶺一村">武嶺一村</option>
                                <option value="武嶺二村">武嶺二村</option>
                                <option value="武嶺三村">武嶺三村</option>
                                <option value="武嶺四村">武嶺四村</option>
                                <option disabled value="">【翠亨山莊】</option>
                                <option value="A棟">A棟</option>
                                <option value="B棟">B棟</option>
                                <option value="C棟">C棟</option>
                                <option value="D棟">D棟</option>
                                <option value="E棟">E棟</option>
                                <option value="F棟">F棟</option>
                                <option value="G棟">G棟</option>
                                <option value="H棟">H棟-女宿</option>
                                <option value="L棟">L棟-女宿</option>
                            </select>
                            <select size="1" name="floor">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                            <font size="2">樓</font>
                            <input type="text" name="room" size="6">
                            <font size="2">號房</font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" height="2" width="27"><input type="checkbox" name="check_food" value="ON"></td>
                        <td align="left" height="2" width="79"><p style="margin-top: 0; margin-bottom: 0"><font size="2"> 飲　　食</font></td>
                        <td align="left" height="2" width="522">
                            <select name="food">
                                <option value="葷食">葷食</option>
                                <option value="素食">素食</option>
                                <option value="不吃牛肉">不吃牛肉</option>
                                <option value="不吃豬肉">不吃豬肉</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" height="2" width="27"><input type="checkbox" name="check_address" value="1"></td>
                        <td align="left" height="2" width="79"><p style="margin-top: 0; margin-bottom: 0"><font size="2"> 住　　址</font></td>
                        <td align="left" height="2" width="522">
                            <font color="#C0C0C0">
                                <input name="address" size="55" style="float: left; color: #C0C0C0; border: 1px solid #C0C0C0">
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" width="27"><input type="checkbox" name="check_club" value="ON" checked></td>
                        <td align="left" width="79"><font size="2">社　　團</font></td>
                        <td align="left" width="522">
                            <select size="1" name="club">
                                <option disabled>請選擇社團</option>
                                <option disabled>【　服務性社團　】</option>
                                <option value="基服社">基服社</option>
                                <option value="滋青社">滋青社</option>
                                <option value="慈青社">慈青社</option>
                                <option value="原學社">原學社</option>
                                <option value="迴馨社">迴馨社</option>
                                <option value="扶根社">扶根社</option>
                                <option value="水上安全社">水上安全社</option>
                                <option value="綠色西灣社">綠色西灣社</option>
                                <option value="動物保護教育推廣社">動物保護教育推廣社</option>                                <option value="英語志工社">英語志工社</option>
                                <option value="法輪大法社">法輪大法社</option>
                                <option disabled>【　學術性社團　】</option>
                                <option value="AIESEC">AIESEC</option>
                                <option value="福爾摩沙社">福爾摩沙社</option>
                                <option value="青年領袖研習社">青年領袖研習社</option>
                                <option value="中山團契">中山團契</option>
                                <option value="學員團契">學員團契</option>
                                <option value="中諦佛學社">中諦佛學社</option>
                                <option value="奇蹟生命研習社">奇蹟生命研習社</option>
                                <option value="現代詩社">現代詩社</option>
                                <option value="喜樂團契">喜樂團契</option>
                                <option value="全人學社">全人學社</option>
                                <option value="西子劇坊">西子劇坊</option>
                                <option value="推理小說研究社">推理小說研究社</option>
                                <option value="嚴新氣功科學研習社">嚴新氣功科學研習社</option>
                                <option value="中醫社">中醫社</option>
                                <option value="易學社">易學社</option>
                                <option value="晨興設">晨興社</option>
                                <option value="思辨社">思辨社</option>
                                <option value="天文社">天文社</option>
                                <option value="命學社">命學社</option>
                                <option disabled>【　音樂性社團　】</option>
                                <option value="颺韻合唱團">颺韻合唱團</option>
                                <option value="吉他社">吉他社</option>
                                <option value="管樂社">管樂社</option>
                                <option value="南雁國樂社">南雁國樂社</option>
                                <option value="楊門樂社">揚門樂社</option>
                                <option value="室內樂社">室內樂社</option>
                                <option value="詩人詩頭會社">詩人詩頭會社</option>
                                <option disabled>【　學藝性社團　】</option>
                                <option value="攝影社">攝影社</option>
                                <option value="手語社">手語社</option>
                                <option value="美食社">美食社</option>
                                <option value="圍棋社">圍棋社</option>
                                <option value="電影社">電影社</option>
                                <option value="動畫社">動畫社</option>
                                <option value="書法社">書法社</option>
                                <option value="橋藝社">橋藝社</option>
                                <option value="美術社">美術社</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" width="27"><input type="checkbox" name="check_club_id" value="ON"></td>
                        <td align="left" width="79"><font size="2">社團身分</font></td>
                        <td align="left" width="522">
                            <font color="#C0C0C0">
                                <input name="club_id" size="20" style="float: left; border: 1px solid #C0C0C0" value="副會長">
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" width="27">&nbsp;</td>
                        <td align="left" width="79"><font size="2">身&nbsp; 分&nbsp; 證</font></td>
                        <td align="left" width="522">
                            <font color="#C0C0C0">
                                <input name="id" size="20" style="float: left; color: #C0C0C0; border: 1px solid #C0C0C0">
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" width="27">&nbsp;</td>
                        <td align="left" width="79"><font size="2">戶　　籍</font></td>
                        <td align="left" width="522">
                            <font color="#C0C0C0">
                                <input name="home_address" size="55" style="float: left; color: #C0C0C0; border: 1px solid #C0C0C0">
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" width="27"><input type="checkbox" name="check_hometown" value="1" checked></td>
                        <td align="left" width="79"><font size="2">家　　鄉</font></td>
                        <td align="left" width="522">
                            <select size="1" name="hometown">
                                <option disabled>【台灣】</option>
                                <option value="基隆">基隆</option>
                                <option value="台北">台北</option>
                                <option value="桃園">桃園</option>
                                <option value="新竹">新竹</option>
                                <option value="宜蘭">宜蘭</option>
                                <option value="苗栗">苗栗</option>
                                <option value="台中">台中</option>
                                <option value="彰化">彰化</option>
                                <option value="南投">南投</option>
                                <option value="花蓮">花蓮</option>
                                <option value="雲林">雲林</option>
                                <option value="嘉義">嘉義</option>
                                <option value="台南">台南</option>
                                <option value="高雄">高雄</option>
                                <option value="台東">台東</option>
                                <option value="屏東">屏東</option>
                                <option value="金門">金門</option>
                                <option value="澎湖">澎湖</option>
                                <option disabled>【海外】</option>
                                <option value="馬來西亞">馬來西亞</option>
                                <option value="新加坡">新加坡</option>
                                <option value="中國">中國</option>
                                <option value="澳門">澳門</option>
                                <option value="香港">香港</option>
                                <option value="菲律賓">菲律賓</option>
                                <option value="越南">越南</option>
                                <option value="印度">印度</option>
                                <option value="歐洲">歐洲</option>
                                <option value="澳洲">澳洲</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" width="27"><input type="checkbox" name="check_transport" value="1"></td>
                        <td align="left" width="79"><font size="2">交通工具</font></td>
                        <td align="left" width="522">
                            <select name="transport">
                                <option value="步行">步行</option>
                                <option value="會騎車,沒機車">會騎車,沒機車</option>
                                <option value="會騎車,有機車">會騎車,有機車</option>
                                <option value="汽車">汽車</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" width="27">&nbsp;</td>
                        <td align="left" width="79">&nbsp;</td>
                        <td align="left" width="522">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left" width="27">&nbsp;</td>
                        <td align="left" width="79">&nbsp;</td>
                        <td align="left" width="522">
                            <input type="submit" value="送出資料">
                            <input type="button" value="取消修改">
                        </td>
                    </tr>
                </table>
			</form>
			</td>
		</tr>
	</table>
	        <p>&nbsp;</p>
	        <p>&nbsp;</p>
	        <p>&nbsp;            
          </div></td>
        </tr>
	    <tr>
	      <td height="106" background="../../../../mo/jpg/last.jpg" valign="top"><div align="right">
	        <table border="0" width="51%" height="45">
	          <tr>
	            <td align="left" width="116"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP21'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP21'].src=document['fpAnimswapImgFP21'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/index.htm"> <img src="../../../../mo/jpg/b3.jpg" alt="" name="fpAnimswapImgFP21" width="61" height="24" border="0" align="right" lowsrc="../../../../mo/jpg/b302.jpg" id="fpAnimswapImgFP21" dynamicanimation="fpAnimswapImgFP21"></a><a onMouseOver="var img=document['fpAnimswapImgFP22'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP22'].src=document['fpAnimswapImgFP22'].imgRolln" target="_parent" href="https://www.facebook.com/pages/Airstage西灣人中山人的校園互動平台/356803227687619"><img src="../../../../mo/jpg/b0.jpg" alt="" name="fpAnimswapImgFP22" width="31" height="24" border="0" align="right" lowsrc="../../../../mo/jpg/b002.jpg" id="fpAnimswapImgFP22" dynamicanimation="fpAnimswapImgFP22"></a></font></td>
	            <td align="left" width="68"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP23'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP23'].src=document['fpAnimswapImgFP23'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/02.htm"> <img src="../../../../mo/jpg/b1.jpg" alt="" name="fpAnimswapImgFP23" width="62" height="24" border="0" align="left" lowsrc="../../../../mo/jpg/b102.jpg" id="fpAnimswapImgFP23" dynamicanimation="fpAnimswapImgFP23"></a></font></td>
	            <td align="left" width="109"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP24'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP24'].src=document['fpAnimswapImgFP24'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/03.htm"> <img src="../../../../mo/jpg/b2.jpg" alt="" name="fpAnimswapImgFP24" width="61" height="24" border="0" align="left" lowsrc="../../../../mo/jpg/b202.jpg" id="fpAnimswapImgFP24" dynamicanimation="fpAnimswapImgFP24"></a></font></td>
	            <td align="left" valign="bottom"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP25'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP25'].src=document['fpAnimswapImgFP25'].imgRolln" target="_parent" href="http://www.airstage.com.tw"> <img src="../../../../mo/jpg/b4.jpg" alt="" name="fpAnimswapImgFP25" width="124" height="30" border="0" align="left" lowsrc="../../../../mo/jpg/b402.jpg" id="fpAnimswapImgFP25" dynamicanimation="fpAnimswapImgFP25"></a></font></td>
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