<html>
<? 
	include("../conn.php")
?>
<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>會員註冊</title>

<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" language="javascript" src="../plugin/fancyValidate/fancyValidate.min.js"></script>
<script type="text/javascript" language="javascript" src="../plugin/fancyValidate/fancyValidate.additional.min.js"></script>
<script src="../plugin/fancyValidate/external/jquery.qtip/jquery.qtip.min.js"></script>
<link rel="stylesheet" type="text/css" href="../plugin/fancyValidate/examples/css/example.css" />
<link rel="stylesheet" type="text/css" href="../plugin/fancyValidate/css/fancyValidate.css" />
<link href="../plugin/fancyValidate/external/jquery.qtip/jquery.qtip.min.css" rel="stylesheet" />
<script type="text/javascript" language="javascript">
$f.dom.ready(function() {
	 
	  
  $f("form", {
	  rules:{
		  stu_id:{
			  required:1,
			  pattern:/^[A-Za-z0-9]+$/,
			  rangelength:[10,10],
		  },
		  name:{
			  required:1,
		  },
		  id:{
			  required:1,
		  },
		  gender:{
			  required:1
		  },
		  email:{
			  required:1,email:1,
		  },
		  psw:{
			  required:1
		  },
		  psw2:{
			  required:1,compareTo:"psw",
		  },
	  },
	  messages:{
		  stu_id:{
			  required:"此欄位不能為空！",
			  pattern:"學號格式有誤!",
			  rangelength:"學號格式有誤!",
		  },
		  name:{
			  required:"此欄位不能為空",
		  },
		  id:{
			  required:"此欄位不能為空",
		  },
		  gender:{
			  required:"此欄位不能為空！",
		  },
		  email:{
			  required:"此欄位不能為空！",email:"email格式不正確!",
		  },
		  psw:{
			  required:"此欄位不能為空！",
		  },
		  psw2:{
			  required:"此欄位不能為空！", compareTo:"密碼不正確!",
		  },
	  },
	  
  });
});
</script>
<script type="text/javascript" language="javascript">
(function(){
	var reloadImg = function(dImg) {
		var sOldUrl = dImg.src;
		var sNewUrl = sOldUrl + "?rnd=" + Math.random();
		dImg.src = sNewUrl;
	};

	var dReloadLink = document.getElementById("reload-img");

	var dImg = document.getElementById("captchaimg");

	dReloadLink.onclick = function(e) {
		reloadImg(dImg);
		if(e) e.preventDefault();
		return false;
	};
})();
</script>
</head>
<body>
<div style="height:400; width:330; background-color:#FFFFFF"><form method="post" action="new.php" id="form">
<table align="left" width="330" height="400" style="font-size:14px; font-weight:bold; background-repeat:no-repeat" background="img/bgreg.png">
	<tr>
    	<td height="50">
        </td>
    </tr>
	<tr>
    	<td align="right">學號</td>
        <td><input type="text" name="stu_id" id="stu_id" value="" /></td>
    </tr>
    <tr>
    	<td align="right">姓名</td>
        <td><input type="text" name="name" id="name" value="" placeholder="請填入真實姓名" /></td>
    </tr>
    <tr>
    	<td align="right">帳號</td>
        <td><input type="text" name="id" id="id" value="" /></td>
    </tr>
    <tr>
    	<td align="right">性別</td>
        <td><input type="radio" value="男" name="gender" />男&nbsp;&nbsp;<input type="radio" value="女" name="gender" />女</td>
    </tr>
    <tr>
    	<td align="right">電子信箱</td>
        <td><input type="text" name="email" /></td>
    </tr>
    <tr>
    	<td align="right">密碼</td>
        <td><input type="password" name="psw" id="psw" value="" /></td>
    </tr>
    <tr>
    	<td align="right">確認密碼</td>
        <td><input type="password" name="psw2" id="psw2" value="" /></td>
    </tr>
	<tr>
		<td align="right">驗證碼</td>
		<td>
			<img src="captcha.php" id="captchaimg" />
			( <a href="#" id="reload-img">重新產生</a> ) 
		</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="text" name="captcha" id="captcha">
	</tr>
    <tr>
    	<td colspan="2" align="center"><input type="submit" value="送出" name="submit" /></td>
    </tr>
</table>
</form>
</div>
</body>

</html>
