<?php
session_start();
if(empty($_SESSION['name']) || empty($_SESSION['stu_id'])){
		echo '<script type="text/javascript" language="javascript">alert("請先登入!"); location.href="../../../../member/login.php";</script>';
}
?>
<!DOCTYPE HTML>
<html>

<head>
<link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<link rel="stylesheet" type="text/css" href="../../../../plugin/shadowbox/shadowbox.css">
<link href="../../../../css/validate.css" rel="stylesheet" type="text/css" />
<!-- Skin CSS file -->
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/assets/skins/sam/skin.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="../../../../plugin/jrumble/jquery.jrumble.1.3.min.js"></script>
<script type="text/javascript" src="../../../../plugin/shadowbox/shadowbox.js"></script>
<script type="text/javascript" src="../../../../plugin/validate/jquery.validate.js"></script>

<!-- Utility Dependencies -->
<script src="http://yui.yahooapis.com/2.9.0/build/yahoo-dom-event/yahoo-dom-event.js"></script> 
<script src="http://yui.yahooapis.com/2.9.0/build/element/element-min.js"></script> 
<!-- Needed for Menus, Buttons and Overlays used in the Toolbar -->
<script src="http://yui.yahooapis.com/2.9.0/build/container/container_core-min.js"></script>
<!-- Source file for Rich Text Editor-->
<script src="http://yui.yahooapis.com/2.9.0/build/editor/simpleeditor-min.js"></script>
<title>│Airstage 西灣人│Airs專欄：從校園影響力開始！</title>
<style fprolloverstyle>A:hover {text-decoration: underline; font-weight: bold}
</style>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $('#form').validate({
		success: 'valid',
		rules:{
			type:{valid:true},
			title:{required:true},
		},
		errorPlacement: function(error, element) { //指定错误信息位置 
			error.insertAfter(element);
		},
	});
});
$.validator.addMethod("valid", function(type, element) {
        return (this.optional(element) || type != 'null')
    }, "請選擇文章分類");
</script>
<script type="text/javascript" language="javascript">
$(function(){
	$('a').css('cursor', 'pointer');
	var content = new YAHOO.widget.SimpleEditor('content', {
    	height: '560px',
    	width: '',
    	dompath: true, //Turns on the bar at the bottom
    	animate: true,//Animates the opening, closing and moving of Editor windows
		toolbar: {
        	titlebar: '',
        	buttons: [
            	{ group: 'textstyle', label: '',
                	buttons: [
                    	{ type: 'push', label: 'Bold', value: 'bold' },
                    	{ type: 'push', label: 'Italic', value: 'italic' },
                    	{ type: 'push', label: 'Underline', value: 'underline' },
                    	{ type: 'separator' },
						{ type: 'push', label: '請輸入網址', value: 'createlink', disabled: true },
						{ type: 'push', label: '請選擇圖片', value: 'insertimage', disabled: false },
                	]
            	}
        	]
    	}

	});
	content.render();
	Shadowbox.init({
		players : ['html'],
		overlayColor: "#FFFFFF",
	});
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
	
	YAHOO.util.Event.on('post', 'click', function() {
    	//Put the HTML back into the text area
    	content.saveHTML();
 
    	//The var html will now have the contents of the textarea
    	var html = content.get('element').value;
		
		if(html == ''){
			alert('內容不能為空!!!');
		}
		else{
			$('#realcontent').val(html);
			$('form').attr('action', 'post.php').submit();
		}
	});
	YAHOO.util.Event.on('save', 'click', function() {
    	//Put the HTML back into the text area
    	content.saveHTML();
 
    	//The var html will now have the contents of the textarea
    	var html = content.get('element').value;
		
		$('#realcontent').val(html);
		$('form').attr('action', 'save.php').submit();
	});
	
})
</script>
<script language="JavaScript" fptype="dynamicanimation">
<!--
function dynAnimation() {}
function clickSwapImg() {}
//-->
</script>

</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="dynAnimation()" language="Javascript1.2" background="../../../../jpg/bgbank/basic.png" style="background-attachment: fixed" class="yui-skin-sam">

<div align="center">
	<table border="0" width="980" height="693" cellspacing="0" cellpadding="0">
  <tr>
			<td width="38" background="../../../../jpg/topbar001.png"></td>
        	<td height="43" width="99" background="../../../../jpg/topbar002.png" align="right"><p style="margin-top: 0; margin-bottom: 0"><a href="../../../../index.php"><img src="../theater/jpg/logo.png" name="logo" id="logo" align="left" /></a></td>
			<td height="75" background="../../../../jpg/topbar002.png" width="700" valign="top"><font color="#FFFFFF"><a onMouseOver="var img=document['fpAnimswapImgFP9'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP9'].src=document['fpAnimswapImgFP9'].imgRolln" target="_parent" href="../../index.htm"><img border="0" src="../../../../jpg/cal_bot001.png" width="89" height="75" alt="" name="fpAnimswapImgFP9" lowsrc="../../../../jpg/cal_bot002.png" id="fpAnimswapImgFP" dynamicanimation="fpAnimswapImgFP9"></a><img border="0" src="../../../../jpg/topbar002.png" width="20" height="75"><a href="../../../../index.php"><img src="../../../../jpg/air_bot002.png" width="89" height="75" border="0"></a></font></td>
			<td background="../../../../jpg/topbar003.png" width="124" valign="middle"><span style="margin-top: 0; margin-bottom: 0">
			<?php
			 	require_once( "loginCheck.php" );
			?>
			</span></td>
		</tr>
		<tr>
			<td background="../../../../jpg/bot.png" valign="top" height="65" colspan="4">
			<div align="center">
				<table border="0" width="98%" height="948" cellspacing="0" cellpadding="0">
					<tr>
						<td valign="top" height="151" colspan="2">
						<div align="center">
							<p align="center" style="margin-top: 0; margin-bottom: 0">
							<font size="2" face="微軟正黑體">
							<iframe name="I1" src="main2.htm" scrolling="no" border="0" frameborder="0" marginwidth="1" marginheight="1" width="963" height="141">
							您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</iframe></font></p>
						</div>
						</td>
					</tr>
					<tr>
						<td valign="bottom" height="84" width="75%">
						<font face="微軟正黑體">
						<img border="0" src="jpg/cry01.png" width="35" height="50"><a onMouseOver="var img=document['fpAnimswapImgFP26'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP26'].src=document['fpAnimswapImgFP26'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b1.jpg" id="fpAnimswapImgFP26" name="fpAnimswapImgFP26" dynamicanimation="fpAnimswapImgFP26" lowsrc="jpg/b102.jpg"></a><a onMouseOver="var img=document['fpAnimswapImgFP27'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP27'].src=document['fpAnimswapImgFP27'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b2.jpg" width="106" height="58" id="fpAnimswapImgFP27" name="fpAnimswapImgFP27" dynamicanimation="fpAnimswapImgFP27" lowsrc="jpg/b202.jpg"></a><a onMouseOver="var img=document['fpAnimswapImgFP28'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP28'].src=document['fpAnimswapImgFP28'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b3.jpg" id="fpAnimswapImgFP28" name="fpAnimswapImgFP28" dynamicanimation="fpAnimswapImgFP28" lowsrc="jpg/b302.jpg"></a><a onMouseOver="var img=document['fpAnimswapImgFP29'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP29'].src=document['fpAnimswapImgFP29'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b4.jpg" id="fpAnimswapImgFP29" name="fpAnimswapImgFP29" dynamicanimation="fpAnimswapImgFP29" lowsrc="jpg/b402.jpg"></a><a onMouseOver="var img=document['fpAnimswapImgFP30'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP30'].src=document['fpAnimswapImgFP30'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b5.jpg" id="fpAnimswapImgFP30" name="fpAnimswapImgFP30" dynamicanimation="fpAnimswapImgFP30" lowsrc="jpg/b502.jpg"></a><a onMouseOver="var img=document['fpAnimswapImgFP31'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP31'].src=document['fpAnimswapImgFP31'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/b6.jpg" id="fpAnimswapImgFP31" name="fpAnimswapImgFP31" dynamicanimation="fpAnimswapImgFP31" lowsrc="jpg/b602.jpg"></a></font></td>
						<td height="84" width="25%">
						<font face="微軟正黑體">
						<a onMouseOver="var img=document['fpAnimswapImgFP32'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP32'].src=document['fpAnimswapImgFP32'].imgRolln" href="javascript:void(0)">
						<img border="0" src="jpg/bb1.png" width="54" height="54" id="fpAnimswapImgFP32" name="fpAnimswapImgFP32" dynamicanimation="fpAnimswapImgFP32" lowsrc="jpg/bb102.png"></a><a onMouseOver="var img=document['fpAnimswapImgFP33'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP33'].src=document['fpAnimswapImgFP33'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/bb2.png" width="54" height="54" id="fpAnimswapImgFP33" name="fpAnimswapImgFP33" dynamicanimation="fpAnimswapImgFP33" lowsrc="jpg/bb202.png"></a><a onMouseOver="var img=document['fpAnimswapImgFP34'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP34'].src=document['fpAnimswapImgFP34'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/bb3.png" width="54" height="54" id="fpAnimswapImgFP34" name="fpAnimswapImgFP34" dynamicanimation="fpAnimswapImgFP34" lowsrc="jpg/bb302.png"></a><a onMouseOver="var img=document['fpAnimswapImgFP35'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP35'].src=document['fpAnimswapImgFP35'].imgRolln" href="javascript:void(0)"><img border="0" src="jpg/bb4.png" width="54" height="54" id="fpAnimswapImgFP35" name="fpAnimswapImgFP35" dynamicanimation="fpAnimswapImgFP35" lowsrc="jpg/bb402.png"></a></font></td>
					</tr>
					<tr>
						<td valign="top" height="45" colspan="2">
						<p align="center">
						<font face="微軟正黑體">
						<img border="0" src="jpg/line3.jpg" width="875" height="30" align="top"></font></td>
					</tr>
					<tr>
						<td height="666" align="center" colspan="2" valign="top">
                        	<form method="post" name="form" action="" id="form">
										<table border="0" width="88%" cellspacing="0" cellpadding="0" style="font-family: PMingLiU; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; " height="312">
											<tr>
												<td width="80%" valign="top">
												<p style="margin-top: 0; margin-bottom: 0">
												<b>
												<font face="微軟正黑體" size="5" color="#333333">♠</font><font color="#333333" face="微軟正黑體" size="4">&nbsp; 
												寫篇新文章</font></b></font></p><br><br><br>
												<font face="微軟正黑體">
												<select size="1" name="type" id="type">
													<option selected value="null">文章分類</option>
													<option value="column">專欄文章</option>
													<option value="news">新聞時事</option>
													<option value="school">校園話題</option>
													<option value="concerts">藝文創作</option>
												</select> </font>
												<font face="微軟正黑體" color="#C0C0C0">&nbsp;<input type="text" name="title" id="title" size="61" style="color: #C0C0C0; border: 1px solid #C0C0C0" placeholder="文章標題" />　　　　　　　</font><input type="radio" value="small" checked name="display"><font size="2" color="#808080" face="微軟正黑體">顯示小檔案</font><input type="radio" value="username" name="display"><font face="微軟正黑體" size="2" color="#808080">僅用暱稱</font><input type="radio" value="clubs" name="display"><font face="微軟正黑體" size="2" color="#808080">社團名義</font></p>
												<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
												<table border="1" width="100%" cellspacing="0" cellpadding="5" height="560" bordercolor="#C0C0C0">
													<tr>
														<td style="border-style: solid; border-width: 0px" bgcolor="#E7E7E7" valign="top">
														<p align="right">
														<input type="button" id="post" value="" style="width:48px; height:29px; background:url(jpg/bt01.png); background-repeat:no-repeat; border:0; cursor:pointer" />&nbsp;
														<input type="button" id="save" value="" style="width:72px; height:29px; background:url(jpg/bt02.png); background-repeat:no-repeat; border:0; cursor:pointer" /></p></td>
													</tr>
													<tr>
														<td style="border-style: solid; border-width: 0px" colspan="2"><textarea cols="120" rows="40" name="content" id="content" style="border:0; resize:none"></textarea><input type="hidden" name="realcontent" value="" id="realcontent" /></td>
													</tr>
												</table>
												</td>
											</tr>
											</table>
                                        </form>
										<font face="微軟正黑體">
										<br class="Apple-interchange-newline">
&nbsp;&nbsp;</font></td>
					</tr>
					</table>
			</div>
			</td>
		</tr>
		<tr>
			<td height="106" background="../../../../jpg/last.png" valign="top" colspan="4">
			<div align="right">
				<table border="0" width="51%" height="45">
					<tr>
						<td align="left" width="116">
						<p style="margin-top: 0; margin-bottom: 0">
						<font color="#FFFFFF" size="2" face="微軟正黑體">
						<a onMouseOver="var img=document['fpAnimswapImgFP21'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP21'].src=document['fpAnimswapImgFP21'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/index.htm">
			<img border="0" src="../../../../mo/jpg/b3.jpg" width="61" height="24" id="fpAnimswapImgFP21" name="fpAnimswapImgFP21" dynamicanimation="fpAnimswapImgFP21" lowsrc="../../../../mo/jpg/b302.jpg" align="right"></a><a onMouseOver="var img=document['fpAnimswapImgFP22'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP22'].src=document['fpAnimswapImgFP22'].imgRolln" target="_parent" href="https://www.facebook.com/pages/Airstage西灣人中山人的校園互動平台/356803227687619"><img border="0" src="../../../../mo/jpg/b0.jpg" width="31" height="24" id="fpAnimswapImgFP22" name="fpAnimswapImgFP22" dynamicanimation="fpAnimswapImgFP22" lowsrc="../../../../mo/jpg/b002.jpg" align="right"></a></font></td>
						<td align="left" width="68">
						<p style="margin-top: 0; margin-bottom: 0">
						<font color="#FFFFFF" size="2" face="微軟正黑體">
						<a onMouseOver="var img=document['fpAnimswapImgFP23'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP23'].src=document['fpAnimswapImgFP23'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/02.htm">
			<img border="0" src="../../../../mo/jpg/b1.jpg" width="62" height="24" id="fpAnimswapImgFP23" name="fpAnimswapImgFP23" dynamicanimation="fpAnimswapImgFP23" lowsrc="../../../../mo/jpg/b102.jpg" align="left"></a></font></td>
						<td align="left" width="109">
						<p style="margin-top: 0; margin-bottom: 0">
						<font color="#FFFFFF" size="2" face="微軟正黑體">
						<a onMouseOver="var img=document['fpAnimswapImgFP24'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP24'].src=document['fpAnimswapImgFP24'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/03.htm">
			<img border="0" src="../../../../mo/jpg/b2.jpg" width="61" height="24" id="fpAnimswapImgFP24" name="fpAnimswapImgFP24" dynamicanimation="fpAnimswapImgFP24" lowsrc="../../../../mo/jpg/b202.jpg" align="left"></a></font></td>
						<td align="left" valign="bottom">
						<p style="margin-top: 0; margin-bottom: 0">
						<font color="#FFFFFF" size="2" face="微軟正黑體">
						<a onMouseOver="var img=document['fpAnimswapImgFP25'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP25'].src=document['fpAnimswapImgFP25'].imgRolln" target="_parent" href="http://www.airstage.com.tw">
			<img border="0" src="../../../../mo/jpg/b4.jpg" width="124" height="30" id="fpAnimswapImgFP25" name="fpAnimswapImgFP25" dynamicanimation="fpAnimswapImgFP25" lowsrc="../../../../mo/jpg/b402.jpg" align="left"></a></font></td>
						<td align="left" width="31">&nbsp;</td>
					</tr>
				</table>
			</div>
			<p style="margin-top: 0; margin-bottom: 0">&nbsp;</td>
		</tr>
	</table>
</div>
<div id="fb-root"></div>
<div id="fb-root"></div>
</body>

</html>