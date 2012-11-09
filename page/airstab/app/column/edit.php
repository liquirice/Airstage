<?php
session_start();
include('../../../../conn.php');
if(empty($_SESSION['name']) || empty($_SESSION['stu_id'])){
		echo '<script type="text/javascript" language="javascript">alert("請先登入!"); location.href="../../../../member/login.php";</script>';
}

$rno = $_GET['rno'];
$_SESSION['readrno'] = $rno;

$get = 'SELECT * FROM `Col` WHERE rno = '.$rno.' LIMIT 1';
$result = mysqli_query($conn, $get);
$getresult = mysqli_fetch_array($result);

if($getresult['stu_id'] != $_SESSION['stu_id']){
	echo '<script type="text/javascript" language="javascript">alert("無權訪問!"); location.href="index.php";</script>';
}

$member = 'SELECT * FROM `Member` WHERE stu_id = "'.$getresult['stu_id'].'" LIMIT 1';
$membertemp = mysqli_query($conn, $member);
$getmember = mysqli_fetch_array($membertemp);
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
<script type="text/javascript" src="../../../../plugin/shadowbox/shadowbox.js"></script>
<script type="text/javascript" src="../../../../plugin/validate/jquery.validate.js"></script>

<!-- Utility Dependencies -->
<script src="http://yui.yahooapis.com/2.9.0/build/yahoo-dom-event/yahoo-dom-event.js"></script> 
<script src="http://yui.yahooapis.com/2.9.0/build/element/element-min.js"></script> 
<!-- Needed for Menus, Buttons and Overlays used in the Toolbar -->
<script src="http://yui.yahooapis.com/2.9.0/build/container/container_core-min.js"></script>
<!-- Source file for Rich Text Editor-->
<script src="http://yui.yahooapis.com/2.9.0/build/editor/simpleeditor-min.js"></script>
<title>編輯文章 - Airstage</title>

<script type="text/javascript" language="javascript">
var coltype = "none";
var app = "column";
window.onbeforeunload = function(){
		    if(!confirm('你確定要離開此頁面?'))
		    	return "按一下[取消]停留在此頁";
	}
$.validator.addMethod("valid", function(type, element) {
        return (this.optional(element) || type != 'null')
    }, "請選擇文章分類");
$(function(){
	$("#delete").click(function(){
	if(confirm('你確定要刪除文章?')){
		$.post("delete.php",{rno:"<?php echo $rno ?>"}, function(message){
			alert(message);
			window.location.href="index.php";
		});
	}
	else
		return "按一下[取消]停留在此頁";
	});
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
    	//content.saveHTML();
 
    	//The var html will now have the contents of the textarea
    	var html = content.getEditorHTML();
    	//var html = content.get('element').value;
   		if(html == ''){
			alert('內容不能為空!!!');
		}
		else{
			$("#shelf").val("article");
			$('#realcontent').val(html);
			$('form').attr('action', 'updatecol.php?rno=<?php echo $getresult['rno']; ?>').submit();
		}
	});
	YAHOO.util.Event.on('save', 'click', function() {
    	//Put the HTML back into the text area
    	content.saveHTML();
 
    	//The var html will now have the contents of the textarea
    	var html = content.get('element').value;
		
		$("#shelf").val("draft");
		$('#realcontent').val(html);
		$('form').attr('action', 'updatecol.php?rno=<?php echo $getresult['rno']; ?>').submit();
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
	<?php include("../../../../model/navi.php"); ?>
	<table border="0" width="980" height="693" cellspacing="0" cellpadding="0">
		<tr>
			<td height="5px"></td>
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
					<?php require("coltype.php"); ?>
					<tr>
						<td valign="top" height="45" colspan="2">
						<p align="center">
						<font face="微軟正黑體">
						<img border="0" src="jpg/line3.jpg" width="875" height="30" align="top"></font></td>
					</tr>
					<tr>
						<td height="666" align="center" colspan="2" valign="top">
                        	<form method="post" name="form" action="" id="form" enctype = "multipart/form-data">
										<table border="0" width="88%" cellspacing="0" cellpadding="0" style="font-family: PMingLiU; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; " height="312">
											<tr>
												<td width="80%" valign="top">
												<p style="margin-top: 0; margin-bottom: 0">
												<b>
												<font face="微軟正黑體" size="5" color="#333333">♠</font><font color="#333333" face="微軟正黑體" size="4">&nbsp; 
												編輯文章</font></b></font></p><br><br><br>
												<font face="微軟正黑體">
												<select size="1" name="type" id="type">
												<?php
												if($getresult['class'] == 'column'){
													echo '
													<option value="null">文章分類</option>
													<option selected value="column">專欄文章</option>
													<option value="food">食尚指南</option>
													<option value="school">校園話題</option>
													<option value="concerts">藝文創作</option>';
												}
												else if($getresult['class'] == 'news'){
													echo '
													<option value="null">文章分類</option>
													<option value="column">專欄文章</option>
													<option selected value="food">食尚指南</option>
													<option value="school">校園話題</option>
													<option value="concerts">藝文創作</option>';
												}
												else if($getresult['class'] == 'school'){
													echo '
													<option value="null">文章分類</option>
													<option value="column">專欄文章</option>
													<option value="food">食尚指南</option>
													<option selected value="school">校園話題</option>
													<option value="concerts">藝文創作</option>';
												}
												else if($getresult['class'] == 'concerts'){
													echo '
													<option value="null">文章分類</option>
													<option value="column">專欄文章</option>
													<option value="food">食尚指南</option>
													<option value="school">校園話題</option>
													<option selected value="concerts">藝文創作</option>';
												}
												?>
												</select> </font>
												<font face="微軟正黑體" color="#C0C0C0">&nbsp;<input type="text" name="title" id="title" size="61" style="color: #000000; border: 1px solid #C0C0C0" placeholder="文章標題" value="<?php echo ''.$getresult['title'].''; ?>" />　　　　　　　</font>
												<?php
													/*if($getresult['display'] == 'small'){
														echo '
															<input type="radio" value="small" checked name="display"><font size="2" color="#808080" face="微軟正黑體">顯示小檔案</font>
															<input type="radio" value="username" name="display"><font face="微軟正黑體" size="2" color="#808080">僅用暱稱</font>
															<input type="radio" value="clubs" name="display"><font face="微軟正黑體" size="2" color="#808080">社團名義</font>
														';
													}
													else if($getresult['display'] == 'username'){
														echo '
															<input type="radio" value="small" name="display"><font size="2" color="#808080" face="微軟正黑體">顯示小檔案</font>
															<input type="radio" value="username" checked name="display"><font face="微軟正黑體" size="2" color="#808080">僅用暱稱</font>
															<input type="radio" value="clubs" name="display"><font face="微軟正黑體" size="2" color="#808080">社團名義</font>
														';
													}
													else if($getresult['display'] == 'clubs'){
														echo '
															<input type="radio" value="small" name="display"><font size="2" color="#808080" face="微軟正黑體">顯示小檔案</font>
															<input type="radio" value="username" name="display"><font face="微軟正黑體" size="2" color="#808080">僅用暱稱</font>
															<input type="radio" value="clubs" checked name="display"><font face="微軟正黑體" size="2" color="#808080">社團名義</font>
														';
													}*/
												?>
												<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
												<table border="1" width="100%" cellspacing="0" cellpadding="5" height="560" bordercolor="#C0C0C0">
													<tr>
														<td style="border-style: solid; border-width: 0px" bgcolor="#E7E7E7" valign="top">
														<p align="right">
														<input type="button" id="delete" value="" style="width:48px; height:29px; background:url(jpg/delete.png); background-repeat:no-repeat; border:0; cursor:pointer" />&nbsp;
														<input type="button" id="post" value="" style="width:48px; height:29px; background:url(jpg/bt01.png); background-repeat:no-repeat; border:0; cursor:pointer" onclick="window.document.body.onbeforeunload=null;return true;" />&nbsp;
														<input type="button" id="save" value="" style="width:72px; height:29px; background:url(jpg/bt02.png); background-repeat:no-repeat; border:0; cursor:pointer" onclick="window.document.body.onbeforeunload=null;return true;" /></p></td>
													</tr>
													<tr>
														<td style="border-style: solid; border-width: 0px" colspan="2"><textarea cols="120" rows="40" name="content" id="content" style="border:0; resize:none"><?php echo ''.$getresult['realcontent'].''; ?></textarea><input type="hidden" name="realcontent" value="" id="realcontent" /><input type="hidden" value="<?php echo $getresult["front"]; ?>" name="pic" id="pic" /><input type="hidden" value="" name="shelf" id="shelf" /></td>
													</tr>
													<tr>
                                                      	<td colspan="2" style="font-size:12px">上傳封面<input type="file" name="front_pic" id="front_pic" value="上傳封面" /></td>
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
		<tr background="../../../../jpg/last.png">
            <td align="center" colspan="2" height="106px">
                <?php include("../../../../model/footer.php"); ?>
            </td>
        </tr>
	</table>
</div>
<div id="fb-root"></div>
<div id="fb-root"></div>
</body>

</html>