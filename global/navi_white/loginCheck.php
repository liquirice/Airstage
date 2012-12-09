<?php

	// Last Modified Day : 2012.12.02
	// 會員登入link改為新版連結

 	// Check whether the member is login or not.
    require_once("/home/airstage/public_html/global/zhstring.php");
   
    $getnotify = "SELECT * FROM Member WHERE stu_id = '".$_SESSION["stu_id"]."' LIMIT 1";
    $connectsql = mysqli_fetch_array(mysqli_query($conn, $getnotify));

    $gotnotify = "SELECT * FROM notifications ORDER BY rno";
    $resultsql = mysqli_query($conn, $gotnotify);
    $resultsql2 = mysqli_query($conn, $gotnotify);

    $thenotify = explode(",", "".$connectsql["notify"]."");
    $readed = explode(",", "".$connectsql["readed"]."");
    $i=0;
    $x=0;
    $noteblock='';
    
    while($thenotify[$i] != ""){
        $i++;
    }
    while($readed[$x] != ""){
        $x++;
    }
    while($note2 = mysqli_fetch_array($resultsql2)){
        $y=0;
        while($y<$x){
        if($note2["rno"] == $readed[$y]){
            
            $notetime = $note2["posttime"];
            $realnotetime = date("m月d日 H:i",strtotime($notetime));
            if($note2["source"] == "宿網委員會")
                $pic = "cdpa";
            else if($note2["source"] == "宿服委員會")
                $pic = "dorm";
            else if($note2["source"] == "學生會")
                $pic = "sa";
            else if($note2["source"] == "系統公告")
                $pic = "system";
            $noteblock = '<div class="notify"><input type="hidden" value="'.$note2['object'].'" class="object" /><input type="hidden" value="'.$note2['source'].'" class="first" /><input type="hidden" value="'.$realnotetime.'" class="second" /><input type="hidden" value="'.$note2['content'].'" class="last" /><input type="hidden" value="'.$note2['rno'].'" class="rno" /><table align="center" style="cursor:pointer; font:微軟正黑體" class="top" width="330px" cellpadding="0px" cellspacing="0px"><tr height="45px"><td width="5px" rowspan="2"></td><td rowspan="2" width="40px"><img src="http://'.$_SERVER ['HTTP_HOST'].'/global/notifications/images/'.$pic.'.png" width="30px" height="29px" /></td><td style="font-size:12px; font-weight:bold" align="left">'.$note2['source'].'</td><td style="color:#0099cc; font-size:12px;" align="right">'.$realnotetime.'</td><td width="20px"></td></tr><tr><td colspan="2" style="color:#666666; font-size:12px;" valign="top" align="left">'.CuttingStr($note2["content"],30).'...</td></tr></table>'.$noteblock;
    
        }
        $y++;
        }
    }
    while($note = mysqli_fetch_array($resultsql)){
        $j=0;
        while($j<$i){
        if($note["rno"] == $thenotify[$j]){
            if($note["source"] == "宿網委員會")
                $pic = "cdpa";
            else if($note["source"] == "宿服委員會")
                $pic = "dorm";
            else if($note["source"] == "學生會")
                $pic = "sa";
            else if($note["source"] == "系統公告")
                $pic = "system";
            $notetime = $note["posttime"];
            $realnotetime = date("m月d日 H:i",strtotime($notetime));
            $noteblock = '<div class="notify"><input type="hidden" value="'.$note['object'].'" class="object" /><input type="hidden" value="'.$note['source'].'" class="first" /><input type="hidden" value="'.$realnotetime.'" class="second" /><input type="hidden" value="'.$note['content'].'" class="last" /><input type="hidden" value="'.$note2['rno'].'" class="rno" /><table align="center" style="cursor:pointer; font:微軟正黑體" class="top" width="330px" cellpadding="0px" cellspacing="0px"><tr height="45px"><td width="5px" rowspan="2"></td><td rowspan="2" width="40px"><img src="http://'.$_SERVER ['HTTP_HOST'].'/global/notifications/images/'.$pic.'.png" width="30px" height="29px" /></td><td style="font-size:12px; font-weight:bold" align="left">'.$note['source'].'</td><td style="color:#0099cc; font-size:12px;" align="right">'.$realnotetime.'</td><td width="20px"></td></tr><tr><td colspan="2" style="color:#666666; font-size:12px;" valign="top" align="left">'.CuttingStr($note["content"],30).'...</td></tr></table></div>'.$noteblock;
    
        }
        $j++;
        }
        
    }
?>
<link rel="stylesheet" href="http://<?php echo $_SERVER["HTTP_HOST"] ?>/plugin/zebra-dialog/css/zebra_dialog.css" type="text/css">
<script language="JavaScript" type="text/javascript" src="http://<?php echo $_SERVER["HTTP_HOST"] ?>/plugin/zebra-dialog/js/zebra_dialog.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("#notify").hide();
    $("#notifyblock").hover(function() {
            $(this).css("overflow-y", "scroll");
        }, function() {
            $(this).css("overflow-y", "hidden");
        });
    $(".notify").each(function() {
        $(this).click(function(){
            $("#notify").hide();
            if($(this).children(".first").val() == "學生會"){
                var picsrc = "sa";
            }
            else if($(this).children(".first").val() == "宿網委員會"){
                var picsrc = "cdpa";
            }
            else if($(this).children(".first").val() == "宿服委員會"){
                var picsrc = "dorm";
            }
            else if($(this).children(".first").val() == "系統公告"){
                var picsrc = "system";
            }
            $.Zebra_Dialog('<table><tr><td width="50px" align="center"><img src="http://<?php echo $_SERVER["HTTP_HOST"] ?>/global/notifications/images/'+picsrc+'.png" /></td><td align="left" width="70px" style="font-weight:bold; font-size:18px">'+$(this).children(".first").val()+'</td><td align="left" width="340px" style="color:#666666; font-weight:bold">通知編號 : '+$(this).children(".rno").val()+'</td></tr><tr><td height="15px" colspan="3"></td></tr><tr><td colspan="4" height="340px" valign="top" style="font-size:12px; color:#666666; line-height:1.5">'+$(this).children(".last").val()+'<br /></td></tr><tr><td><div class="fb-comments" data-href="http://www.airstage.com.tw/global/notifications?rno='+$(this).children(".rno").val()+'" data-width="470" data-num-posts="2"></div></td></tr><tr><td colspan="3" style="font-weight:bold; font-size:14px; line-height:1.5">發佈時間 : '+$(this).children(".second").val()+'<br />通知對象 : '+$(this).children(".object").val()+'</td><td><a id="showcomment" style="text-decoration:none; color:#666666; font-size:14px; font-weight:bold; cursor:pointer">顯示留言</a></td></tr></table>',{
                'title':false,
                'overlay_opacity':0.5,
                'type':false,
                'buttons':false,   
            })
            return false;
        })
    });
    $(".top").each(function(){
        $(this).hover(function() {
            $(this).css("background-color", "#f6f6f6")
        }, function() {
            $(this).css("background-color", "#FFFFFF")
        });
    });
    if($("#total").text() != 0){
        $("#total").addClass("read");
    }
    else
        $("#total").addClass("readed");
        
    $("#total").click(function(e){
        if($("#total").text() != 0){
        var strtitle = $("title").text();
       var realnum = strtitle.split(" ")[1]+strtitle.split(" ")[2]+strtitle.split(" ")[3]+strtitle.split(" ")[4];
       $("title").text(realnum);
        $.ajax({
            url:"<?php echo 'http://'.$_SERVER ['HTTP_HOST'].'/global/notifications/update.php'; ?>",
            type:"POST",
            data:{readed:"<?php echo $connectsql["notify"]; ?>"},
            success:function(){
                $("#total").text('0').removeClass('read').addClass('readed');
            }
        });
        }
       $("#notify").toggle();
       e.stopPropagation();
    });
    $("body").click(function(e){
        $("#notify").hide();
    });
    $("#total").hover(function() {
        if($(this).hasClass('read')){
            $(".read").css("background-image", "url(http://<?php echo ''.$_SERVER ['HTTP_HOST'].''; ?>/global/notifications/images/redbox02.png)")
        }
        else if($(this).hasClass('readed')){
            $(".readed").css("background-image", "url(http://<?php echo ''.$_SERVER ['HTTP_HOST'].''; ?>/global/notifications/images/blackbox02.png)")
        }
    }, function() {
        if($(this).hasClass('read')){
            $(".read").css("background-image", "url(http://<?php echo ''.$_SERVER ['HTTP_HOST'].''; ?>/global/notifications/images/redbox01.png)")
        }
        else if($(this).hasClass('readed')){
            $(".readed").css("background-image", "url(http://<?php echo ''.$_SERVER ['HTTP_HOST'].''; ?>/global/notifications/images/blackbox01.png)")
        }
    });
})
</script>
<style type="text/css" >
    .read{
        background-image:url(http://<?php echo ''.$_SERVER ['HTTP_HOST'].''; ?>/global/notifications/images/redbox01.png);
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
    }
    .readed{
        background-image:url(http://<?php echo ''.$_SERVER ['HTTP_HOST'].''; ?>/global/notifications/images/blackbox01.png);
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
    }
</style>
<?php
 	
	if( !isset($_SESSION['name']) || !isset($_SESSION['stu_id']) || !isset($_SESSION['auth']) ){
/*
	echo '<a href="http://'.$_SERVER ['HTTP_HOST'].'/Member/login.php" style="border:0 none; text-decoration:none; font-weight:700" id="login" rel="shadowbox; width=330; height=400" title=\'會員登入\'>

		<font color="#000000" size="2">會員登入</font></a>';
*/
	echo '<a href="http://'.$_SERVER ['HTTP_HOST'].'/member/register/login.php" style="border:0 none; text-decoration:none; font-weight:700" id="login" width=330; height=400">

		<font color="#000000" size="2">會員登入</font></a>';
	} else {
        //require("/home/Airstage/public_html/global/notifications/notify.php");
		echo '<div align="center" style="position:absolute; top:-2px; left:-18px; background-repeat:no-repeat; color:#FFFFFF; font-size:12px; width:15px; height:15px; cursor:pointer" id="total">'.$i.'</div><a href="http://'.$_SERVER ['HTTP_HOST'].'/accounts/revises.php" style="border:0; color:#000000; font-size:14px; "><b>'.$_SESSION['name'].

		'</b></a>&nbsp;&nbsp;|&nbsp;

		<a href="http://'.$_SERVER ['HTTP_HOST'].'/member/register/logout.php" style="border:0; color:#000000; font-size:14px; "><b>登出</b></a>
		<div style="background-image:url(http://'.$_SERVER ['HTTP_HOST'].'/global/notifications/images/mback_big.png); position:absolute; top:30px; z-index:99; left:-240px; width:343px; height:356px;" id="notify"><div style="height:45px""></div><div id="notifyblock" style="width:343px; height:268px; overflow-x: hidden; overflow-y: hidden;">'.$noteblock.'</div></div>';

	}
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1&appId=209856362473286";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>