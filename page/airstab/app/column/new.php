<?php
session_start();
if(empty($_SESSION['name']) || empty($_SESSION['stu_id'])){
        echo '<script type="text/javascript" language="javascript">alert("請先登入!"); location.href="../../../../member/login.php";</script>';
}
?>
<!DOCTYPE HTML>

<html>
<head>
    <link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="zh-tw">
    <link rel="stylesheet" type="text/css" href="../../../../plugin/shadowbox/shadowbox.css">
    <link href="../../../../css/validate.css" rel="stylesheet" type="text/css">
    <!-- Skin CSS file -->
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/assets/skins/sam/skin.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" language="javascript" type="text/javascript"></script>
    <script type="text/javascript" src="../../../../plugin/shadowbox/shadowbox.js"></script>
    <script type="text/javascript" src="../../../../plugin/validate/jquery.validate.js"></script>
    <!-- Utility Dependencies -->
    <script src="http://yui.yahooapis.com/2.9.0/build/yahoo-dom-event/yahoo-dom-event.js" type="text/javascript"></script>
    <script src="http://yui.yahooapis.com/2.9.0/build/element/element-min.js" type="text/javascript"></script>
    <!-- Needed for Menus, Buttons and Overlays used in the Toolbar -->
    <script src="http://yui.yahooapis.com/2.9.0/build/container/container_core-min.js" type="text/javascript"></script>
    <!-- Source file for Rich Text Editor-->

    <script src="http://yui.yahooapis.com/2.9.0/build/editor/simpleeditor-min.js" type="text/javascript"></script>

    <title>寫新文章 ─ Airstage 西灣人</title>
    <script type="text/javascript" language="javascript">
    var coltype = "none";
    var app = "column";
    window.onbeforeunload = function(){
		    if(!confirm('你確定要離開此頁面?'))
		    	return "按一下[取消]停留在此頁";
	}
$(function(){
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
    $.validator.addMethod("valid", function(type, element) {
        return (this.optional(element) || type != 'null')
    }, "請選擇文章分類");
    
    $("#column").hover(function(){
	    $(this).attr("src","jpg/b202.jpg");
    }, function(){
	    $(this).attr("src","jpg/b2.jpg");
    });
    $("#food").hover(function(){
	    $(this).attr("src","jpg/b302.jpg");
    }, function(){
	    $(this).attr("src","jpg/b3.jpg");
    });
    $("#school").hover(function(){
	    $(this).attr("src","jpg/b402.jpg");
    }, function(){
	    $(this).attr("src","jpg/b4.jpg");
    });
    $("#concert").hover(function(){
	    $(this).attr("src","jpg/b502.jpg");
    }, function(){
	    $(this).attr("src","jpg/b5.jpg");
    });
    $("#clubs").hover(function(){
	    $(this).attr("src","jpg/b602.jpg");
    }, function(){
	    $(this).attr("src","jpg/b6.jpg");
    });
    $("#write").hover(function(){
	    $(this).attr("src","jpg/bb102.png");
    }, function(){
	    $(this).attr("src","jpg/bb1.png");
    });
    $("#mine").hover(function(){
	    $(this).attr("src","jpg/bb202.png");
    }, function(){
	    $(this).attr("src","jpg/bb2.png");
    });
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

    YAHOO.util.Event.on('post', 'click', function() {
        //Put the HTML back into the text area
        content.saveHTML();

        //The var html will now have the contents of the textarea
        var html = content.get('element').value;
        
        if(html == ''){
            alert('內容不能為空!!!');
        }
        else{
        	$("#shelf").val("article");
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
        $("#shelf").val("draft");
        $('form').attr('action', 'post.php').submit();
    });

    })
    </script>
    <script language="JavaScript" fptype="dynamicanimation" type="text/javascript">
<!--
    function dynAnimation() {}
    function clickSwapImg() {}
    //-->
    </script>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onload="dynAnimation()" language="Javascript1.2" background="../../../../jpg/bgbank/basic.png" style="background-attachment: fixed" class="yui-skin-sam">
<?php include("../../../../model/navi.php"); ?>
	<div align="center">
    	<table border="0" width="980" height="65" cellspacing="0" cellpadding="0">
            <tr>
            	<td width="961" height="65" valign="top" background="../../../../jpg/bot.png">
                	<div align="center">
                		<table border="0" width="98%" height="948" cellspacing="0" cellpadding="0">
                			<tr>
                            	<td valign="top" height="151" colspan="2">
                                    <div align="center">
                                        <p align="center" style="margin-top: 0; margin-bottom: 0"><font size="2" face="微軟正黑體"><iframe name="I1" src="main2.htm" scrolling="no" border="0" frameborder="0" marginwidth="1" marginheight="1" width="963" height="141"><font size="2" face="微軟正黑體">您的瀏覽器不支援內置框架或目前的設定為不顯示內置框架。</font></iframe></font></p>
                                    </div>
                                </td>
                            </tr>
                            <?php require("coltype.php"); ?>

                            <tr>
                                <td valign="top" height="45" colspan="2">
                                	<p align="center"><font face="微軟正黑體"><img border="0" src="jpg/line3.jpg" width="875" height="30" align="top"></font></p>
                                </td>
                            </tr>
                            <tr>
                                <td height="666" align="center" colspan="2" valign="top">
                                    <form method="post" action="" id="form" enctype = "multipart/form-data">
                                        <table border="0" width="88%" cellspacing="0" cellpadding="0" style="font-family: PMingLiU; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; " height="312">
                                            <tr>
                                                <td width="80%" valign="top">
                                                    <p style="margin-top: 0; margin-bottom: 0"><b><font face="微軟正黑體" size="5" color="#333333">♠</font><font color="#333333" face="微軟正黑體" size="4">&nbsp; 寫篇新文章</font></b></p><br>
                                                    <br>
                                                    <br>
                                                    <font face="微軟正黑體"><select size="1" name="type" id="type">
                                                        <option selected value="null">
                                                            文章分類
                                                        </option>

                                                        <option value="column">
                                                            專欄文章
                                                        </option>

                                                        <option value="news">
                                                            新聞時事
                                                        </option>

                                                        <option value="school">
                                                            校園話題
                                                        </option>

                                                        <option value="concerts">
                                                            藝文創作
                                                        </option>
                                                    </select></font>
                                                    <font face="微軟正黑體" color="#C0C0C0">&nbsp;<input type="text" name="title" id="title" size="61" style="color: #C0C0C0; border: 1px solid #C0C0C0" placeholder="文章標題">　　　　　　　</font><input type="radio" value="small" checked name="display"><font size="2" color="#808080" face="微軟正黑體">顯示小檔案</font><input type="radio" value="username" name="display"><font face="微軟正黑體" size="2" color="#808080">僅用暱稱</font><input type="radio" value="clubs" name="display"><font face="微軟正黑體" size="2" color="#808080">社團名義</font>
                                                    <p>

                                                    <p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>

                                                    <table border="1" width="100%" cellspacing="0" cellpadding="5" height="560" bordercolor="#C0C0C0">
                                                        <tr>
                                                            <td style="border-style: solid; border-width: 0px" bgcolor="#E7E7E7" valign="top">
                                                                <p align="right"><input type="button" id="post" value="" style="width:48px; height:29px; background:url(jpg/bt01.png); background-repeat:no-repeat; border:0; cursor:pointer" onclick="window.document.body.onbeforeunload=null;return true;">&nbsp; <input type="button" id="save" value="" style="width:72px; height:29px; background:url(jpg/bt02.png); background-repeat:no-repeat; border:0; cursor:pointer" onclick="window.document.body.onbeforeunload=null;return true;"></p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="border-style: solid; border-width: 0px" colspan="2">
                                                            <textarea cols="120" rows="40" name="content" id="content" style="border:0; resize:none">
</textarea><input type="hidden" name="realcontent" value="" id="realcontent"><input type="hidden" name="shelf" value="" id="shelf" /></td>
                                                        </tr>
                                                        <tr>
                                                        	<td colspan="2" style="font-size:12px">上傳封面<input type="file" name="front_pic" id="front_pic" value="上傳封面" /></td>
                                                        </tr>
                                                    </table>                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        
            <tr background="../../../../jpg/last.png">
                <td align="center" colspan="2" width="961px">
                    <?php include("../../../../model/footer.php"); ?>
                </td>
            </tr>
        </table>

        <div id="fb-root"></div>

        <div id="fb-root"></div>
</body>
</html>
