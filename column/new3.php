<?php
session_start();
require ("../global/validSession.php");
require("../global/connectVar.php");
$totalnotify = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM Member WHERE stu_id='".$_SESSION["stu_id"]."' LIMIT 1"));
if($totalnotify["AUTH"] <= -1){
    echo "<script language='javascript' type='text/javascript'>alert('記得去信箱認證帳號才有權限進來喔!'); window.location.href='index.php';</script>";
}
    $numnotify = explode(",", "".$totalnotify["notify"]."");
    $count = 0;
    while($numnotify[$count] != ""){
        $count++;
    }
?>
<!DOCTYPE HTML>

<html>
<head>
    <link href="http://airstage.com.tw/global/images/tm2.ico" rel="shortcut icon">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="zh-tw">
    <link rel="stylesheet" type="text/css" href="../plugin/shadowbox/shadowbox.css">
    <link href="../global/css/validate.css" rel="stylesheet" type="text/css">
    <link href="../plugin/ckeditor/skins/moono/editor.css?t=CAPD" rel="stylesheet" type="text/css">
    <script src="http://code.jquery.com/jquery-latest.min.js" language="javascript" type="text/javascript"></script>
    <script type="text/javascript" src="../plugin/shadowbox/shadowbox.js"></script>
    <script type="text/javascript" src="../plugin/validate/jquery.validate.js"></script>
    <script type="text/javascript" src="../plugin/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="../plugin/ckeditor/config.js?t=CAPD"></script>
    <script type="text/javascript" src="../plugin/ckeditor/lang/zh.js?t=CAPD"></script>

    <title><?php if($count!=0) echo "(".$count.")" ?> 寫新文章 ─ Airstage 西灣人</title>
    <script type="text/javascript" language="javascript">
    var coltype = "none";
    var app = "column";
    window.onbeforeunload = function(){
		    if(!confirm('你確定要離開此頁面?'))
		    	return "按一下[取消]停留在此頁";
	}
$(document).ready(function(){
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
	    $(this).attr("src","images/b202.jpg");
    }, function(){
	    $(this).attr("src","images/b2.jpg");
    });
    $("#food").hover(function(){
	    $(this).attr("src","images/b302.jpg");
    }, function(){
	    $(this).attr("src","images/b3.jpg");
    });
    $("#school").hover(function(){
	    $(this).attr("src","images/b402.jpg");
    }, function(){
	    $(this).attr("src","images/b4.jpg");
    });
    $("#concert").hover(function(){
	    $(this).attr("src","images/b502.jpg");
    }, function(){
	    $(this).attr("src","images/b5.jpg");
    });
    $("#clubs").hover(function(){
	    $(this).attr("src","images/b602.jpg");
    }, function(){
	    $(this).attr("src","images/b6.jpg");
    });
    $("#write").hover(function(){
	    $(this).attr("src","images/bb102.png");
    }, function(){
	    $(this).attr("src","images/bb1.png");
    });
    $("#mine").hover(function(){
	    $(this).attr("src","images/bb202.png");
    }, function(){
	    $(this).attr("src","images/bb2.png");
    });
    $("#imgur").hover(function() {
        $(this).attr("src", "images/imgur02.png");
    }, function() {
        $(this).attr("src", "images/imgur01.png");
    });
    $("#type").change(function(){
        if($("#type option:selected").val() == "column"){
            $(".smalltype").replaceWith("<select name='smalltype' class='smalltype columntype'><option value='新聞'>新聞</option><option value='科技'>科技</option><option value='人文'>人文</option><option value='商管'>商管</option><option value='生活'>生活</option><option value='運動'>運動</option><option value='旅行'>旅行</option><option value='學習'>學習</option><option value='其他'>其他</option></select>");
        }
        
        else if($("#type option:selected").val() == "food"){
            $(".smalltype").replaceWith("<select name='smalltype' class='smalltype foodtype'><option value='美食'>美食</option><option value='景點'>景點</option></select>")
        }
        
        else if($("#type option:selected").val() == "school"){
            $(".smalltype").replaceWith("<select name='smalltype' class='smalltype schooltype'><option value='校園議題'>校園議題</option><option value='升學考試'>升學考試</option><option value='交換留學'>交換留學</option><option value='推薦知識'>推薦知識</option><option value='西灣故事'>西灣故事</option><option value='社團活動'>社團活動</option><option value='工讀實習'>工讀實習</option></select>")
        }
        
        else if($("#type option:selected").val() == "concerts"){
            $(".smalltype").replaceWith("<select name='smalltype' class='smalltype concertstype'><option value='短篇'>短篇</option><option value='中篇'>中篇</option><option value='長篇'>長篇</option><option value='繪圖'>繪圖</option></select>")
        }
    })
    
    $("#post").click(function(){
        if(CKEDITOR.instances.editor1.getData() == "")
            alert("內容不能為空");
        else{
            $("#shelf").val("article");
            $('form').submit();
        }
    });
    $("#save").click(function(){
        $("#shelf").val("draft");
        $('form').submit();
    });

    })
    </script>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" class="yui-skin-sam" style="background-attachment: fixed;">
<?php include("../global/navi_white/navi.php"); ?>
	<div align="center">
    	<table border="0" width="980" height="65" cellspacing="0" cellpadding="0">
            <tr>
            	<td width="961" height="65" valign="top" background="../global/images/bot.png">
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
                                	<p align="center"><font face="微軟正黑體"><img border="0" src="images/line3.jpg" width="875" height="30" align="top"></font></p>
                                </td>
                            </tr>
                            <tr>
                                <td height="666" align="center" colspan="2" valign="top">
                                    <form method="post" action="post.php" id="form" enctype = "multipart/form-data">
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

                                                        <option value="food">
                                                            食尚指南
                                                        </option>

                                                        <option value="school">
                                                            校園話題
                                                        </option>

                                                        <option value="concerts">
                                                            藝文創作
                                                        </option>
                                                    </select>
                                                    <input class="smalltype" type="hidden" />
                                                    </font>
                                                    <font face="微軟正黑體" color="#C0C0C0">&nbsp;<input type="text" name="title" id="title" size="61" style="color: #C0C0C0; border: 1px solid #C0C0C0" placeholder="文章標題">　　　　　　　</font>
                                                    <?php
                                                    /*<input type="radio" value="small" checked name="display"><font size="2" color="#808080" face="微軟正黑體">顯示小檔案</font><input type="radio" value="username" name="display"><font face="微軟正黑體" size="2" color="#808080">僅用暱稱</font><input type="radio" value="clubs" name="display"><font face="微軟正黑體" size="2" color="#808080">社團名義</font>*/ ?>
                                                    <p>

                                                    <p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>

                                                    <table border="1" width="100%" cellspacing="0" cellpadding="5" height="560" bordercolor="#C0C0C0">
                                                        <tr>
                                                            <td style="border-style: solid; border-width: 0px" bgcolor="#E7E7E7" valign="top" colspan="3">
                                                                <p align="right"><input type="button" id="save" value="" style="width:72px; height:29px; background:url(images/bt02.png); background-repeat:no-repeat; border:0; cursor:pointer" onclick="window.document.body.onbeforeunload=null;return true;">&nbsp; <input type="button" id="post" value="" style="width:48px; height:29px; background:url(images/bt01.png); background-repeat:no-repeat; border:0; cursor:pointer" onclick="window.document.body.onbeforeunload=null;return true;"></p>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="border-style: solid; border-width: 0px" colspan="3">
                                                                <textarea class="ckeditor" id="editor1" name="editor1"></textarea><input type="hidden" name="shelf" value="" id="shelf" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                        	<td align="left" style="font-size:12px; border: none">上傳封面<input type="file" name="front_pic" id="front_pic" value="上傳封面" /></td>
                                                        	<td align="right" style="font-size: 12px; color: #666666; border:none;" valign="middle" valign="middle">上傳封面以外的圖檔, 請點</td>
                                                        	<td align="right" style="border:none" width="80px"><a target="_blank" href="http://imgur.com" style="cursor:pointer"><img src="images/imgur01.png" width="80px" height="26px" id="imgur" /></a></td>
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
        
            <tr background="../global/images/last.png">
                <td align="center" colspan="2" width="961px">
                    <?php include("../global/footer.php"); ?>
                </td>
            </tr>
        </table>      
</body>
</html>
