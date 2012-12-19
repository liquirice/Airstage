<?php
session_start();
include('../global/connectVar.php');
require ("../global/validSession.php");

$totalnotify = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM Member WHERE stu_id='".$_SESSION["stu_id"]."'"));
    $numnotify = explode(",", "".$totalnotify["notify"]."");
    $count = 0;
    while($numnotify[$count] != ""){
        $count++;
    }

$rno = $_GET['rno'];
$_SESSION['readrno'] = $rno;

$get = 'SELECT * FROM `Col` WHERE rno = '.$rno.' LIMIT 1';
$result = mysqli_query($conn, $get);
$getresult = mysqli_fetch_array($result);

if($getresult['stu_id'] != $_SESSION['stu_id']){
	echo '<script type="text/javascript" language="javascript">alert("無權訪問!"); location.href="index.php";</script>';
    exit();
}

$member = 'SELECT * FROM `Member` WHERE stu_id = "'.$getresult['stu_id'].'" LIMIT 1';
$membertemp = mysqli_query($conn, $member);
$getmember = mysqli_fetch_array($membertemp);
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
<title><?php if($count!=0) echo "(".$count.")" ?> 編輯文章 - Airstage</title>

<script type="text/javascript" language="javascript">
var rno = '';
window.setTimeout("autosave();",30000);
function autosave(){
    document.getElementById("save").click();
    setTimeout("autosave();",30000);
}
var coltype = "none";
var app = "column";
window.onbeforeunload = function(){
		    if(!confirm('你確定要離開此頁面?'))
		    	return "按一下[取消]停留在此頁";
	}
$.validator.addMethod("valid", function(type, element) {
        return (this.optional(element) || type != 'null')
    }, "請選擇文章分類");
$(document).ready(function(){
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
	
	$("#preview").hover(function(){
        $(this).css("background-image","url(images/view02.png)");
    }, function(){
        $(this).css("background-image","url(images/view01.png)");
    });
    $("#save").hover(function(){
        $(this).css("background-image","url(images/save02.png)");
    }, function(){
        $(this).css("background-image","url(images/save01.png)");
    });
    $("#post").hover(function(){
        $(this).css("background-image","url(images/pub02.png)");
    }, function(){
        $(this).css("background-image","url(images/pub01.png)");
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
            $(".smalltype").replaceWith("<select name='smalltype' class='smalltype concertstype'><option value='短篇'>短篇</option><option value='中篇'>中篇</option><option value='長篇'>長篇</option><option value='繪圖'>繪圖</option><option value='攝影'>攝影</option></select>")
        }
    });
    
    $("#preview").click(function(){
       $("#form").attr({action: "preview.php",target:"_blank"});
       $("form").submit();
       $("#form").removeAttr("action").removeAttr("target");
       $("#form").attr("action", "post.php");
    })
    $("#post").click(function(){
        if(CKEDITOR.instances.editor1.getData() == "")
            alert("內容不能為空");
        else if($("#front_pic").val()!=''){
            //判定上傳圖片大小及種類
            var fileSize = 0; //檔案大小
            var f = document.getElementById("front_pic");
            var re = /\.(jpg|pjpeg|JPG|jpeg|png)$/i;  //允許的圖片副檔名 
            if (!re.test(f.value)) { 
                alert("圖片格式不允許!"); 
            }
            else {
                //FOR IE
                if ($.browser.msie) {
                    var img = new Image();
                    img.onload = checkSize;
                    img.src = f.val();
                    fileSize = this.fileSize;
                }
                //FOR Firefox,Chrome
                else {
                    fileSize = f.files.item(0).size;
                }
                //檢查檔案大小

                if ((fileSize / 1048576) > 1) {
                    //alert(fileSize);
                    alert("您所選擇的檔案大小為 "+(fileSize / 1048576).toPrecision(4) + "MB, 已超過上傳上限"+1 +"MB, 不允許上傳！");
                }
                else {
                    $("#shelf").val("article");
                    $('form').submit();
                }
            //結束判定
            }
        }
        else{
            $("#shelf").val("article");
            $('form').submit();
        }
    });
    $("#save").click(function(){
        var rno = $("#rno").val();
        $.ajax({
            url:"updatecol.php",
            type:"POST",
            data:{
                shelf:"draft",
                type:$("#type").val(),
                smalltype:$(".smalltype").val(),
                title:$("#title").val(),
                editor1:CKEDITOR.instances.editor1.getData(),
                rno:<?php echo $_SESSION['readrno']; ?>,
            },
            success:function(data){
                $("#saveblock").append("<span id='message' style='font-color:#666666; float:left; display:none; line-height:2'>已儲存 "+data["time"]+"</span>");
                $("#message").fadeIn('fast',function(){
                    $(this).delay(2500).fadeOut('fast', function(){
                        $(this).remove();
                    });
                });
            },
            dataType:"json"
        })
    });
	
})
</script>

</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" style="background-attachment: fixed" class="yui-skin-sam">

<div align="center">
	<?php include("../global/navi_white/navi.php"); ?>
	<table border="0" width="980" height="693" cellspacing="0" cellpadding="0">
		<tr>
			<td height="5px"></td>
		</tr>
		<tr>
			<td background="../global/images/bot.png" valign="top" height="65" colspan="4">
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
						<img border="0" src="images/line3.jpg" width="875" height="30" align="top"></font></td>
					</tr>
					<tr>
						<td height="666" align="center" colspan="2" valign="top">
                        	<form method="post" name="form" action="updatecol.php" id="form" enctype = "multipart/form-data">
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
												else if($getresult['class'] == 'food'){
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
												</select>
												<select class="smalltype" name="smalltype">
												    <?php
												        if($getresult["type"] == '新聞' || $getresult["type"] == '科技' || $getresult["type"] == '人文' || $getresult["type"] == '商管' || $getresult["type"] == '生活' || $getresult["type"] == '運動' || $getresult["type"] == '旅行' || $getresult["type"] == '學習' || $getresult["type"] == '其他'){
												           $arr = array('新聞','科技','人文','商管','生活','運動', '旅行','學習','其他');
                                                           $i = 0;
                                                           while($arr[$i] != ''){
                                                               if($getresult["type"] == $arr[$i]){
                                                                   echo "<option selected value='".$arr[$i]."'>".$arr[$i]."</option>";
                                                               }
                                                               else {
                                                                   echo "<option value='".$arr[$i]."'>".$arr[$i]."</option>";
                                                               }
                                                               $i++;
                                                           }
												        }
                                                        
                                                        else if($getresult["type"] == '美食' || $getresult["type"] == '景點'){
                                                           $arr = array('美食','景點');
                                                           $i = 0;
                                                           while($arr[$i] != ''){
                                                               if($getresult["type"] == $arr[$i]){
                                                                   echo "<option selected value='".$arr[$i]."'>".$arr[$i]."</option>";
                                                               }
                                                               else {
                                                                   echo "<option value='".$arr[$i]."'>".$arr[$i]."</option>";
                                                               }
                                                               $i++;
                                                           }
                                                        }
                                                        else if($getresult["type"] == '校園議題' || $getresult["type"] == '升學考試' || $getresult["type"] == '交換留學' || $getresult["type"] == '推薦知識' || $getresult["type"] == '西灣故事' || $getresult["type"] == '社團活動' || $getresult["type"] == '工讀實習'){
                                                           $arr = array('校園議題','升學考試','交換留學','推薦知識','西灣故事','社團活動', '工讀實習');
                                                           $i = 0;
                                                           while($arr[$i] != ''){
                                                               if($getresult["type"] == $arr[$i]){
                                                                   echo "<option selected value='".$arr[$i]."'>".$arr[$i]."</option>";
                                                               }
                                                               else {
                                                                   echo "<option value='".$arr[$i]."'>".$arr[$i]."</option>";
                                                               }
                                                               $i++;
                                                           }
                                                        }
                                                        else if($getresult["type"] == '短篇' || $getresult["type"] == '中篇' || $getresult["type"] == '長篇' || $getresult["type"] == '繪圖' || $getresult["type"] == '攝影'){
                                                           $arr = array('短篇','中篇','長篇','繪圖', '攝影');
                                                           $i = 0;
                                                           while($arr[$i] != ''){
                                                               if($getresult["type"] == $arr[$i]){
                                                                   echo "<option selected value='".$arr[$i]."'>".$arr[$i]."</option>";
                                                               }
                                                               else {
                                                                   echo "<option value='".$arr[$i]."'>".$arr[$i]."</option>";
                                                               }
                                                               $i++;
                                                           }
                                                        }
                                                    ?>
												</select>
												</font>
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
														<td style="border-style: solid; border-width: 0px" bgcolor="#E7E7E7" valign="top" colspan="3" id="saveblock">
														<span id="saveblock" style="float:left; width:10px; height:40px"></span>
                                                        <span style="float: right">
														<input type="button" id="delete" value="" style="width:48px; height:29px; background:url(images/delete.png); background-repeat:no-repeat; border:0; cursor:pointer" onclick="window.document.body.onbeforeunload=null;return true;" />&nbsp;
														<input type="button" id="preview" value="" onclick="window.document.body.onbeforeunload=null;return true;" style="width:74px; height:29px; background-image: url(images/view01.png); background-repeat: no-repeat; cursor: pointer; border: none;" />&nbsp;
														<input type="button" id="save" value="" style="width:74px; height:29px; background:url(images/save01.png); background-repeat:no-repeat; border:0; cursor:pointer" onclick="<?php /*checkFile('save');*/ ?> window.document.body.onbeforeunload=null;return true;" />&nbsp;
														<input type="button" id="post" value="" style="width:74px; height:29px; background:url(images/pub01.png); background-repeat:no-repeat; border:0; cursor:pointer" onclick="<?php /*checkFile('post');*/ ?> window.document.body.onbeforeunload=null;return true;" /></span></td>
													</tr>
													<tr>
														<td style="border-style: solid; border-width: 0px" colspan="3"><textarea class="ckeditor" id="editor1" name="editor1"><?php echo ''.$getresult['realcontent'].''; ?></textarea><input type="hidden" value="<?php echo $getresult["front"]; ?>" name="pic" id="pic" /><input type="hidden" value="" name="shelf" id="shelf" /></td>
													</tr>
													<tr>
                                                      	<td align="left" style="font-size:12px; border:none">上傳封面<input type="file" name="front_pic" id="front_pic" value="上傳封面" /></td>
                                                      	<td align="right" style="font-size: 12px; color: #666666; border:none;" valign="middle" valign="middle">上傳封面以外的圖檔, 請點</td>
                                                        <td align="right" style="border:none" width="80px"><a target="_blank" href="http://imgur.com" style="text-decoration: none; border: none"><img src="images/imgur01.png" width="80px" height="26px" id="imgur" /></a></td>
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
		<tr background="../global/images/last.png">
            <td align="center" colspan="2" height="106px">
                <?php include("../global/footer.php"); ?>
            </td>
        </tr>
	</table>
</div>
<div id="fb-root"></div>
</body>

</html>