<?php
header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
session_start();
//if(isset($_SESSION['username'])&&($_SESSION['username']!="")){
	if(empty($_SESSION['username'])){
		echo '<script type="text/javascript" language="javascript">alert("請先登入!"); location.href="../../../../../member/login.php";</script>';
	}
//}
include("../../../../../conn.php");
?>
<html>
<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>分享影片</title>

<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" language="javascript" src="../../../../../plugin/fancyValidate/fancyValidate.min.js"></script>
<script type="text/javascript" language="javascript" src="../../../../../plugin/fancyValidate/fancyValidate.additional.min.js"></script>
<script src="../../../../../plugin/fancyValidate/external/jquery.qtip/jquery.qtip.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../../../../plugin/fancyValidate/examples/css/example.css" />
<link rel="stylesheet" type="text/css" href="../../../../../plugin/fancyValidate/css/fancyValidate.css" />
<link href="../../../../../plugin/fancyValidate/external/jquery.qtip/jquery.qtip.min.css" rel="stylesheet" />
<script type="text/javascript" language="javascript">
$f.dom.ready(function() {
	 /*at = ['top right'],
	  my = ['bottom right'],
	  styles = ['jtools'],
	  $(":text").each(function(i) {
        this.api = $(this).qtip({
          content: {
            text: 'I really like owls!'
            , title: { text: my[i] + ' ' + at[i] + ' ' + styles[i], button: 'x' }
          }
          , position: {
            my: my[i]
		        , at: at[i]
          }
          //, show: { ready: true }
          , show: { event: false }
          , style: {
            tip: true // Give them tips with auto corner detection
            , classes: "ui-tooltip-" + styles[i] + " ui-tooltip-shadow ui-tooltip-rounded"
          }
          , hide: false
        }).qtip("api");
      });*/
	  
  $f("ss-form", {
	  rules:{
		  video_id:{
			  required:1,url:1
		  },
		  video_name:{
			  required:1
		  }
	  },
	  messages:{
		  video_id:{
			  required:"此欄位不能為空！",
			  url:"網址格式不正確！",
		  },
		  video_name:{
			  required:"此欄位不能為空",
		  }
	  },
	  
  });
});
</script>

</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">

<div align="center">
	<table border="0" width="389" background="02_po.jpg" height="322">
		<tr>
			<td>
<div class="ss-form-container">
<div class="ss-form"><form action="upload.php" method="POST" id="ss-form" target="_parent">

<input type="hidden" name="backupCache" value="">


<input type="hidden" name="pageNumber" value="0">
　<p>　</p>
<div class="errorbox-good">
<div class="ss-item ss-item-required ss-text"><div class="ss-form-entry"><p>
	<label for="entry_0"><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</font></label><label class="ss-q-title" for="entry_0"><font size="2">影片網址：</font></label><input type="text" name="video_id" id="video_id" size="33" value="" placeholder="輸入網址"></div></div></div>
<div class="errorbox-good">
<div class="ss-item  ss-text">
	<div class="ss-form-entry"><label class="ss-q-title" for="entry_1">
		<font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		標&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 題 
		</font>
</label><label class="ss-q-title" for="entry_0"><font size="2">：</font></label><label class="ss-q-title" for="entry_1"><font size="2">
		</font>
</label>
<label class="ss-q-help" for="entry_1"></label>
<input type="text" name="video_name" id="video_name" size="33" placeholder="輸入標題"></div></div></div>
<font size="2">
<br> </font><label class="ss-q-title" for="entry_2"><font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
簡&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 介</font></label><label class="ss-q-title" for="entry_0"><font size="2">：</font></label><div class="errorbox-good">
<div class="ss-item  ss-paragraph-text"><div class="ss-form-entry">
	<p align="center">
	<label class="ss-q-title" for="entry_2"><font size="2">&nbsp;</font></label><textarea name="description" rows="6" cols="41" id="description"></textarea></div></div></div>
　<div class="errorbox-good">
<div class="ss-item  ss-select">
	<div class="ss-form-entry"><label class="ss-q-title" for="entry_4">
		<font size="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		影片分類
		</font>
</label>
<label for="entry_4"></label>
<select name="type" id="type">
	<option value="社團">社團</option>
    <option value="系所">系所</option>
    <option value="中山大學">中山大學</option>
    <option value="校際">校際</option>
    <option value="企業">企業</option>
    <option value="政府機構">政府機構</option>
    <option value="其它">其它</option>
</select></div></div></div>
<div class="ss-item ss-navigate">
	<div class="ss-form-entry">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit" value="   分享影片   "></div></div></form>
</div></div></td>
		</tr>
	</table>
</div>

<div align="center">
	<table border="0" width="389" background="02_po2.jpg">
		<tr>
			<td>　</td>
		</tr>
	</table>
</div>

</body>

</html>
