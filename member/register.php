<!DOCTYPE HTML>
<html>
<? 
	// Last Modified Day : 2012.09.10
	require_once( "connectVar.php" );
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
		  }
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
</head>
<body>
<div style="height:350; width:330; background-color:#FFFFFF">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p class="f">9/11號，開放西灣人會員註冊&nbsp;!</p>
</div>
</body>

</html>
