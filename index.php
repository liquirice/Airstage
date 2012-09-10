<?php
	// Last Modified Day : 2012.09.07
	header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
	
	require_once( "connectVar.php" );
	require_once( "setSession.php" );
	
	$hot = "SELECT * FROM `Activities` WHERE type = 'hot' ORDER BY time ASC";
	$clubs = "SELECT * FROM `Activities` WHERE type = 'clubs' ORDER BY time ASC";
	$departments = "SELECT * FROM `Activities` WHERE type = 'departments' ORDER BY time ASC";
	$authorities = "SELECT * FROM `Activities` WHERE type = 'authorities' ORDER BY time ASC";
	$concerts = "SELECT * FROM `Activities` WHERE type = 'concerts' ORDER BY time ASC";
?>

<!DOCTYPE HTML>
<html><head>
<link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<link rel="stylesheet" type="text/css" href="plugin/shadowbox/shadowbox.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="plugin/shadowbox/shadowbox.js"></script>
<script type="text/javascript" src="plugin/jrumble/jquery.jrumble.1.3.min.js"></script>
<script type="text/javascript" src="plugin/bsjq/basic-jquery-slider.min.js"></script>
<link type="text/css" rel="stylesheet" href="plugin/bsjq/basic-jquery-slider.css" />
<title>│Airstage 西灣人│活動牆：開始倒數！</title>
<style fprolloverstyle>
A:hover {text-decoration: underline; font-weight: bold}
a{text-decoration:none;}
</style>
<link rel="stylesheet" type="text/css" href="css/index.css">

<script type="text/javascript">
$(document).ready(function() {
	/*$('.slidyContainer').slidy({
        throttle: false, // Set to true, and include jQuery throttle plugin (http://benalman.com/projects/jquery-throttle-debounce-plugin/)
        throttleTime: 500, // number of ms to wait for throttling
        showArrows: true, // Show arrows for next/prev image
        movePrev: 'movePrev', // Div id to use for previous button
        moveNext: 'moveNext', // Div id to use for next button
        useKeybord: true, // use keys defined below to expand / collapse sections
        auto: true,       // Start slideshow automatically
        interval: 120000,     // Time between each slide
        initialInterval: 12000  // Initial interval when page loads

    });*/
	$('#banner').bjqs({
          'animation' : 'slide',
          'width' : 961,
          'height' : 366,
		  'nextText' : '<img src="jpg/rightafter.png" name="right" onMouseOver="document.right.src=\'jpg/arrowsright.png\'" onMouseOut="document.right.src=\'jpg/rightafter.png\'" />',
		  'prevText' : '<img src="jpg/leftafter.png" name="left" onMouseOver="document.left.src=\'jpg/arrowsleft.png\'" onMouseOut="document.left.src=\'jpg/leftafter.png\'" />',
		  'showMarkers' : true,
		  'centerMarkers' : true,
		  'animationDuration': 1200,
		  'rotationSpeed' : 12000,
    });
	$(function(){
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
		$('#hot1').click(function(){
			var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
				$body.animate({
					scrollTop: $('#hot').offset().top
			}, 600);
			return false;
		});
		$('#clubs1').click(function(){
			var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
				$body.animate({
					scrollTop: $('#clubs').offset().top
			}, 600);
			return false;
		});
		$('#departments1').click(function(){
			var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
				$body.animate({
					scrollTop: $('#departments').offset().top
			}, 600);
			return false;
		});
		$('#authorities1').click(function(){
			var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
				$body.animate({
					scrollTop: $('#authorities').offset().top
			}, 600);
			return false;
		});
		$('#concerts1').click(function(){
			var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
				$body.animate({
					scrollTop: $('#concerts').offset().top
			}, 600);
			return false;
		});
	});
});
</script>
<script language="JavaScript" fptype="dynamicanimation">
<!--
function dynAnimation() {}
function clickSwapImg() {}
//-->
</script>
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

<script type="text/javascript">
var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34181090-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<style type="text/css">
body,td,th {
	font-family: "微軟正黑體";
}
body {
	background-image: url(jpg/background.png);
	background-repeat: repeat-x;
}
</style>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="dynAnimation();MM_preloadImages('jpg/sharenew2.png')" language="Javascript1.2">

<div align="center">
	<table border="0" width="980" height="75" cellspacing="0" cellpadding="0">
  <tr>
        	<td width="38" background="jpg/topbar001.png"></td>
        	<td height="43" width="99" background="jpg/topbar002.png" align="right"><p style="margin-top: 0; margin-bottom: 0"><a href="http://www.airstage.com.tw/nsysu/airs/index.php"><img src="page/airstab/app/theater/jpg/logo.png" name="logo" id="logo" align="left" /></a></td>
			<td height="75" background="jpg/topbar002.png" width="700" valign="top"><font color="#FFFFFF"><a href="index.php"><img border="0" src="jpg/cal_bot002.png" width="89" height="75"></a><img border="0" src="jpg/topbar002.png" width="20" height="75"><a onMouseOver="var img=document['fpAnimswapImgFP9'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP9'].src=document['fpAnimswapImgFP9'].imgRolln" target="_parent" href="page/airstab/index.htm"><img src="jpg/air_bot001.png" alt="" name="fpAnimswapImgFP9" width="89" height="75" lowsrc="jpg/air_bot002.png" id="fpAnimswapImgFP" border="0" dynamicanimation="fpAnimswapImgFP9"></a></font></td>
			<td background="jpg/topbar003.png" width="124" valign="middle"><span style="margin-top: 0; margin-bottom: 0">
			<?php
			 	require_once( "loginCheck.php" );
			?>
			</span></td>
			
           
	  </tr>
	</table>
<table width="980" border="0" cellpadding="0" cellspacing="0">
	  <tr>
	    <td colspan="3" align="center" valign="top" background="jpg/bot.png"><div align="center">
	      <?php include('news/news.php') ?>
        </div></td>
      </tr>
	  <tr>
	    <td colspan="3" align="center" valign="top" background="jpg/bot.png"><p>&nbsp;</p>
	      <!----------活動列表-------------->
	      <table width="862">
	<tr>
    	<td width="721" align="center" style="color:#333333; font-size:9pt"><img src="jpg/b.png" width="144" height="6"><a style="border:0; color:#333333; font-size:11pt; cursor:pointer" id="hot1" href="#hot"><b>熱門精選</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;
    	  <a style="border:0; color:#333333; font-size:11pt; cursor:pointer" id="clubs1" href="#clubs"><b>社團組織</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;
    	  <a style="border:0; color:#333333; font-size:11pt; cursor:pointer" id="departments1" href="#departments"><b>校內系所</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;
    	  <a style="border:0; color:#333333; font-size:11pt; cursor:pointer" id="authorities1" href="#authorities"><b>校方機構</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;
    	  <a style="border:0; color:#333333; font-size:11pt; cursor:pointer" id="concerts1" href="#concerts"><b>藝文音樂</b></a></td>
    	<td width="133" align="center" style="color:#333333; font-size:9pt"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image16','','jpg/sharenew2.png',1)"><img src="jpg/sharenew.png" name="Image16" width="133" height="32" border="0"<a onClick="window.open('activities/share.php','','menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=925,height=546')" style="border:0; cursor:pointer"></a></td>
        </tr>
    <tr>
    	<td colspan="2"><img src="activities/jpg/hor.jpg" width="850" /></td>
    </tr>
	<!--熱門精選-->
	<tr>
    	<td colspan="2"><a id="hot" name="hot" style="cursor:pointer; border:0"><img src="activities/jpg/t1.jpg" name="hot" /></a></td>
    </tr>
    <tr>
        <td colspan="2">
        <?php
		$a1=mysqli_query($conn,$hot);
		if(mysqli_num_rows($a1) != 0){
		while($hotlist = mysqli_fetch_array($a1)){
		if(date('Y-m-d') <= $hotlist['time']){
		$time = "".$hotlist['time']."-";
		list($year, $month, $day) = explode("-", $time);
		echo '
        	<table background="jpg/table.jpg" style="background-repeat:no-repeat">
            	<tr>
                	<td rowspan="8" class="tdimg" height="224" width="38%" align="center" valign="middle"><img class="img" src="activities/poster/'.$hotlist['poster'].'" /></td>
					<td rowspan="8" width="80px"></td>
                    <td class="title" valign="top" align="right" colspan="2">'.$hotlist['title'].'</td>';
					if($_SESSION['stu_id'] == $hotlist['stu_id']){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><form action="page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=918,height=545\')"><input type="hidden" name="rno" value="'.$hotlist['rno'].'" /><input type="submit" style="background-image:url(jpg/button4.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="" /></form>&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script>
</td>';
					}
					else if($_SESSION['stu_id'] != $hotlist['stu_id'] && $hotlist['signup'] == 'yes' && $hotlist['url1'] != ''){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><form action="page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$hotlist['rno'].'" /><input type="submit"  /></form>&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
					else if($_SESSION['stu_id'] != $hotlist['stu_id'] && $hotlist['signup'] == 'no' && $hotlist['url1'] != ''){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><form action="page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$hotlist['rno'].'" /><input type="submit" style="background-image:url(jpg/button6.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="" /></form>&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
					else if($_SESSION['stu_id'] != $hotlist['stu_id'] && $hotlist['signup'] == 'no' && $hotlist['url1'] == ''){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><img src="jpg/button2.png" width="115" height="34" /><a target="_blank" href="'.$hotlist['url2'].'"></a></img>&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
        echo '  </tr>    
				<tr>
                	<td class="description" colspan="2" valign="top">'.$hotlist['description'].'</td>
                </tr>
                <tr>
                	<td class="sub">活動名稱&nbsp;:&nbsp;</td>
                    <td class="name">'.$hotlist['name'].'</td>
                </tr>
                <tr>
                	<td class="sub">時&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;間&nbsp;:&nbsp;</td>
                    <td class="time">'.$hotlist['time'].'&nbsp;&nbsp;'.$hotlist['extratime'].'</td>
                </tr>
                <tr>
                	<td class="sub">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;點&nbsp;:&nbsp;</td>
                    <td class="venue">'.$hotlist['venue'].'</td>
                </tr>
                <tr>
                	<td class="sub">費&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;:&nbsp;</td>
                    <td class="fee">'.$hotlist['fee'].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">主辦單位&nbsp;:&nbsp;</td>
                    <td class="host">'.$hotlist['host'].'</td>
                </tr>';
				if($hotlist['note'] != ''){
				echo'
<tr>
					<td>附&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;註&nbsp;:&nbsp;</td>
					<td class="note">'.$hotlist['note'].'</td>
				</tr>';
				}
				echo'
            </table><br/><img src="jpg/grayline.png" /><br />';
				
		}
		}
		}
		?>
        </td>
    </tr>
    <!--社團組織-->
    <tr>
    	<td colspan="2"><a id="clubs" name="clubs" style="cursor:pointer; border:0"><img src="activities/jpg/t2.jpg" name="clubs" /></a></td>
    </tr>
    <tr>
        <td colspan="2">
        <?php
		$b1=mysqli_query($conn,$clubs);
		if(mysqli_num_rows($b1) != 0){
		while($clubslist = mysqli_fetch_array($b1)){
		if(date('Y-m-d') <= $clubslist['time']) {
		$time = "".$clubslist['time']."-";
		list($year, $month, $day) = explode("-", $time);
		echo '
        	<table background="jpg/table.jpg" style="background-repeat:no-repeat">
            	<tr>
                	<td rowspan="8" class="tdimg" height="224" width="38%" align="center" valign="middle"><img class="img" src="activities/poster/'.$clubslist["poster"].'" /></td>
					<td rowspan="8" width="80px"></td>
                    <td class="title" valign="top" colspan="2">'.$clubslist["title"].'</td>';
					if($_SESSION['stu_id'] == $clubslist['stu_id']){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><form action="page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=918,height=545\')"><input type="hidden" name="rno" value="'.$clubslist['rno'].'" /><input type="submit" style="background-image:url(jpg/button4.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="" /></form>&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
					else if($_SESSION['stu_id'] != $clubslist['stu_id'] && $clubslist['signup'] == 'yes' && $clubslist['url1'] != ''){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><form action="page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$clubslist['rno'].'" /><input type="submit" style="background-image:url(jpg/button3.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value=""  /></form>&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
					else if($_SESSION['stu_id'] != $clubslist['stu_id'] && $clubslist['signup'] == 'no' && $clubslist['url1'] != ''){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><form action="page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$clubslist['rno'].'" /><input type="submit" style="background-image:url(jpg/button6.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="" /></form>&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
					else if($_SESSION['stu_id'] != $clubslist['stu_id'] && $clubslist['signup'] == 'no' && $clubslist['url1'] == ''){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><a href="'.$clubslist['url2'].'" target="_blank"><img src="jpg/button2.png" width="115" height="34" /></a><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
        echo '</tr>
                <tr>
                	<td class="description" colspan="2" valign="top">'.$clubslist["description"].'</td>
                </tr>
                <tr>
                	<td class="sub">活動名稱&nbsp;:&nbsp;</td>
                    <td class="name">'.$clubslist["name"].'</td>
                </tr>
                <tr>
                	<td class="sub">時&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;間&nbsp;:&nbsp;</td>
                    <td class="time">'.$clubslist["time"].'&nbsp;&nbsp;'.$clubslist["extratime"].'</td>
                </tr>
                <tr>
                	<td class="sub">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;點&nbsp;:&nbsp;</td>
                    <td class="venue">'.$clubslist["venue"].'</td>
                </tr>
                <tr>
                	<td class="sub">費&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;:&nbsp;</td>
                    <td class="fee">'.$clubslist["fee"].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">主辦單位&nbsp;:&nbsp;</td>
                    <td class="host">'.$clubslist["host"].'</td>
                </tr>
				
            ';
				if($clubslist['note'] != ''){
				echo'
<tr>
					<td>附&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;註&nbsp;:&nbsp;</td>
					<td class="note">'.$clubslist['note'].'</td>
				</tr>';
}
echo'
				
            </table><br/><img src="jpg/grayline.png" /><br />';
		}
		}
		}
		?>
        </td>
    </tr>
    <!--校內系所-->
    <tr>
    	<td colspan="2"><a id="departments" name="departments" style="cursor:pointer; border:0"><img src="activities/jpg/t3.jpg" name="departments" /></a></td>
    </tr>
    <tr>
        <td colspan="2">
        <?php
		$c1=mysqli_query($conn,$departments);
		if(mysqli_num_rows($c1) != 0){
		while($departmentslist = mysqli_fetch_array($c1)){
		if(date('Y-m-d') <= $departmentslist['time']){
		$time = "".$departmentslist['time']."-";
		list($year, $month, $day) = explode("-", $time);
		echo '
        	<table background="jpg/table.jpg" style="background-repeat:no-repeat">
            	<tr>
                	<td rowspan="8" class="tdimg" height="224" width="38%" align="center" valign="middle"><img class="img" src="activities/poster/'.$departmentslist["poster"].'" /></td>
					<td rowspan="8" width="80px"></td>
                    <td class="title" valign="top" colspan="2">'.$departmentslist["title"].'</td>';
					if($_SESSION['stu_id'] == $departmentslist['stu_id']){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><form action="page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=918,height=545\')"><input type="hidden" name="rno" value="'.$departmentslist['rno'].'" /><input type="submit" style="background-image:url(jpg/button4.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="" /></form>&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
					else if($_SESSION['stu_id'] != $departmentslist['stu_id'] && $departmentslist['signup'] == 'yes' && $departmentslist['url1'] != ''){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><form action="page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$departmentslist['rno'].'" /><input type="submit" style="background-image:url(jpg/button3.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="" /></form>&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
					else if($_SESSION['stu_id'] != $departmentslist['stu_id'] && $departmentslist['signup'] == 'no' && $departmentslist['url1'] != ''){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><form action="page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$departmentslist['rno'].'" /><input type="submit" style="background-image:url(activities/jpg/button6.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="" /></form>&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
					else if($_SESSION['stu_id'] != $departmentslist['stu_id'] && $departmentslist['signup'] == 'no' && $departmentslist['url1'] == ''){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><a href="'.$departmentslist['url2'].'" target="_blank"><img src="jpg/button2.png" width="115" height="34" /></a><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
        echo '</tr>
                <tr>
                	<td class="description" colspan="2" valign="top">'.$departmentslist["description"].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">活動名稱&nbsp;:&nbsp;</td>
                    <td class="name">'.$departmentslist["name"].'</td>
                </tr>
                <tr>
                	<td class="sub">時&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;間&nbsp;:&nbsp;</td>
                    <td class="time">'.$departmentslist["time"].'&nbsp;&nbsp;'.$departmentslist["extratime"].'</td>
                </tr>
                <tr>
                	<td class="sub">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;點&nbsp;:&nbsp;</td>
                    <td class="venue">'.$departmentslist["venue"].'</td>
                </tr>
                <tr>
                	<td class="sub">費&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;:&nbsp;</td>
                    <td class="fee">'.$departmentslist["fee"].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">主辦單位&nbsp;:&nbsp;</td>
                    <td class="host">'.$departmentslist["host"].'</td>
                </tr>
            ';
				if($departmentslist['note'] != ''){
				echo'
<tr>
					<td>附&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;註&nbsp;:&nbsp;</td>
					<td class="note">'.$departmentslist['note'].'</td>
				</tr>';
}
echo'
				
            </table><br/><img src="jpg/grayline.png" /><br />';
		}
		}
		}
		?>
        </td>
    </tr>
    <!--校方機構-->
    <tr>
    	<td colspan="2"><a id="authorities" name="authorities" style="cursor:pointer; border:0"><img src="activities/jpg/t4.jpg" name="authorities" /></a></td>
    </tr>
    <tr>
        <td colspan="2">
        <?php
		$d1=mysqli_query($conn,$authorities);
		if(mysqli_num_rows($d1) != 0){
		while($authoritieslist = mysqli_fetch_array($d1)){
		if(date('Y-m-d') <= $authoritieslist['time']){
		$time = "".$authoritieslist['time']."-";
		list($year, $month, $day) = explode("-", $time);
		echo '
        	<table background="jpg/table.jpg" style="background-repeat:no-repeat">
            	<tr>
                	<td rowspan="8" class="tdimg" height="224" width="38%" align="center" valign="middle"><img class="img" src="activities/poster/'.$authoritieslist["poster"].'" /></td>
					<td rowspan="8" width="80px"></td>
                    <td class="title" valign="top" colspan="2">'.$authoritieslist["title"].'</td>';
					if($_SESSION['stu_id'] == $authoritieslist['stu_id']){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><form action="page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=918,height=545\')"><input type="hidden" name="rno" value="'.$authoritieslist['rno'].'" /><input type="submit" style="background-image:url(jpg/button4.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="" /></form>&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
					else if($_SESSION['stu_id'] != $authoritieslist['stu_id'] && $authoritieslist['signup'] == 'yes' && $authoritieslist['url1'] != ''){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><form action="page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$authoritieslist['rno'].'" /><input type="submit" style="background-image:url(jpg/button3.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="" /></form>&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
					else if($_SESSION['stu_id'] != $authoritieslist['stu_id'] && $authoritieslist['signup'] == 'no' && $authoritieslist['url1'] != ''){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><form action="page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$authoritieslist['rno'].'" /><input type="submit" style="background-image:url(jpg/button6.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="" /></form>&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
					else if($_SESSION['stu_id'] != $authoritieslist['stu_id'] && $authoritieslist['signup'] == 'no' && $authoritieslist['url1'] == ''){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><a href="'.$authoritieslist['url2'].'" target="_blank"><img src="jpg/button2.png" width="115" height="34" /></a><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}

        echo '</tr>
                <tr>
                	<td class="description" colspan="2" valign="top">'.$authoritieslist["description"].'</td>
                </tr>
                <tr>
                	<td class="sub">活動名稱&nbsp;:&nbsp;</td>
                    <td class="name">'.$authoritieslist["name"].'</td>
                </tr>
                <tr>
                	<td class="sub">時&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;間&nbsp;:&nbsp;</td>
                    <td class="time">'.$authoritieslist["time"].'&nbsp;&nbsp;'.$authoritieslist["extratime"].'</td>
                </tr>
                <tr>
                	<td class="sub">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;點&nbsp;:&nbsp;</td>
                    <td class="venue">'.$authoritieslist["venue"].'</td>
                </tr>
                <tr>
                	<td class="sub">費&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;:&nbsp;</td>
                    <td class="fee">'.$authoritieslist["fee"].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">主辦單位&nbsp;:&nbsp;</td>
                    <td class="host">'.$authoritieslist["host"].'</td>
                </tr>
				
            ';
				if($authoritieslist['note'] != ''){
				echo'
<tr>
					<td>附&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;註&nbsp;:&nbsp;</td>
					<td class="note">'.$authoritieslist['note'].'</td>
				</tr>';
}
echo'
				
            </table><br/><img src="jpg/grayline.png" /><br />';
		}
		}
		}
		?>
        </td>
    </tr>
    <!--藝文音樂-->
    <tr>
    	<td colspan="2"><a id="concerts" name="concerts" style="cursor:pointer; border:0"><img src="activities/jpg/t5.jpg" name="concerts" /></a></td>
    </tr>
    <tr>
        <td colspan="2">
        <?php
		$e1=mysqli_query($conn,$concerts);
		if(mysqli_num_rows($e1) != 0){
		while($concertslist = mysqli_fetch_array($e1)){
		if(date('Y-m-d') <= $concertslist['time']){
		$time = "".$concertslist['time']."-";
		list($year, $month, $day) = explode("-", $time);
		echo '
        	<table background="jpg/table.jpg" style="background-repeat:no-repeat">
            	<tr>
                	<td rowspan="8" class="tdimg" height="224" width="38%" align="center" valign="middle"><img class="img" src="activities/poster/'.$concertslist["poster"].'" /></td>
					<td rowspan="8" width="80px"></td>
                    <td class="title" valign="top" colspan="2">'.$concertslist["title"].'</td>';
					if($_SESSION['stu_id'] == $concertslist['stu_id']){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><form action="page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=918,height=545\')"><input type="hidden" name="rno" value="'.$concertslist['rno'].'" /><input type="submit" style="background-image:url(jpg/button4.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="" /></form>&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
					else if($_SESSION['stu_id'] != $concertslist['stu_id'] && $concertslist['signup'] == 'yes' && $concertslist['url1'] != ''){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><form action="page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$concertslist['rno'].'" /><input type="submit" style="background-image:url(jpg/button3.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="" /></form>&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
					else if($_SESSION['stu_id'] != $concertslist['stu_id'] && $concertslist['signup'] == 'no' && $concertslist['url1'] != ''){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><form action="page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$concertslist['rno'].'" /><input type="submit" style="background-image:url(jpg/button6.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="" /></form>&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
					else if($_SESSION['stu_id'] != $concertslist['stu_id'] && $concertslist['signup'] == 'no' && $concertslist['url1'] == ''){
						echo '
							<td align="center" width="115" rowspan="2" style="font-size:14px"><a href="'.$concertslist['url2'].'" target="_blank"><img src="jpg/button2.png" width="115" height="34" /></a><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
					}
        echo '</tr>
                <tr>
                	<td class="description" colspan="2" valign="top">'.$concertslist["description"].'</td>
                </tr>
                <tr>
                	<td class="sub">活動名稱&nbsp;:&nbsp;</td>
                    <td class="name">'.$concertslist["name"].'</td>
                </tr>
                <tr>
                	<td class="sub">時&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;間&nbsp;:&nbsp;</td>
                    <td class="time">'.$concertslist["time"].'&nbsp;&nbsp;'.$concertslist["extratime"].'</td>
                </tr>
                <tr>
                	<td class="sub">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;點&nbsp;:&nbsp;</td>
                    <td class="venue">'.$concertslist["venue"].'</td>
                </tr>
                <tr>
                	<td class="sub">費&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;:&nbsp;</td>
                    <td class="fee">'.$concertslist["fee"].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">主辦單位&nbsp;:&nbsp;</td>
                    <td class="host">'.$concertslist["host"].'</td>
                </tr>
				
            ';
				if($concertslist['note'] != ''){
				echo'
<tr>
					<td>附&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;註&nbsp;:&nbsp;</td>
					<td class="note">'.$concertslist['note'].'</td>
				</tr>';
}
echo'
				
            </table><br/><img src="jpg/grayline.png" /><br />';
		}
		}
		}
		?>
        </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
          </table>
<!----------活動列表-------------->
</td>
      </tr>
	  <tr>
	    <td height="106" background="jpg/last.png" colspan="3" align="left" valign="top"><div align="right">
	      <table border="0" width="51%" height="45">
	        <tr>
	          <td align="left" width="116"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP17'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP17'].src=document['fpAnimswapImgFP17'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/index.htm"> <img src="mo/jpg/b1.jpg" alt="" name="fpAnimswapImgFP17" width="61" height="24" lowsrc="mo/jpg/b102.jpg" id="fpAnimswapImgFP17" border="0" dynamicanimation="fpAnimswapImgFP17" align="right"></a><a onMouseOver="var img=document['fpAnimswapImgFP19'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP19'].src=document['fpAnimswapImgFP19'].imgRolln" target="_parent" href="https://www.facebook.com/pages/Airstage西灣人中山人的校園互動平台/356803227687619"><img src="mo/jpg/b0.jpg" alt="" name="fpAnimswapImgFP19" width="31" height="24" lowsrc="mo/jpg/b002.jpg" id="fpAnimswapImgFP19" border="0" dynamicanimation="fpAnimswapImgFP19" align="right"></a></font></td>
	          <td align="left" width="68"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP15'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP15'].src=document['fpAnimswapImgFP15'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/02.htm"> <img src="mo/jpg/b2.jpg" alt="" name="fpAnimswapImgFP15" width="62" height="24" lowsrc="mo/jpg/b202.jpg" id="fpAnimswapImgFP15" border="0" dynamicanimation="fpAnimswapImgFP15" align="left"></a></font></td>
	          <td align="left" width="109"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP18'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP18'].src=document['fpAnimswapImgFP18'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/03.htm"> <img src="mo/jpg/b3.jpg" alt="" name="fpAnimswapImgFP18" width="61" height="24" lowsrc="mo/jpg/b302.jpg" id="fpAnimswapImgFP18" border="0" dynamicanimation="fpAnimswapImgFP18" align="left"></a></font></td>
	          <td align="left" valign="bottom"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP20'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP20'].src=document['fpAnimswapImgFP20'].imgRolln" target="_parent" href="http://www.airstage.com.tw"> <img src="mo/jpg/b4.jpg" alt="" name="fpAnimswapImgFP20" width="124" height="30" lowsrc="mo/jpg/b402.jpg" id="fpAnimswapImgFP20" border="0" dynamicanimation="fpAnimswapImgFP20" align="left"></a></font></td>
	          <td align="left" width="31">&nbsp;</td>
            </tr>
          </table>
	      </div></td>
      </tr>
  </table>
</div>
<div id="fb-root"></div>
<script>
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	} (document, 'script', 'facebook-jssdk'));
</script>
</body>

</html>