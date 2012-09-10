<?php
include("./lib/connection.php");

if(isset($_POST['formSubmit'])) {	
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER_SET_CLIENT=utf8");
mysql_query("SET CHARACTER_SET_RESULTS=>utf8");
		//get checkbox value
		if(isset($_POST['student_id_checkbox'])) 
        {			
			$_POST['student_id_checkbox'] =1;
			
		} 
        else 
        {
			
			$_POST['student_id_checkbox'] =0;
		}
		
		if(isset($_POST['gender_checkbox'])) 
        {
			$_POST['gender_checkbox'] = 1;
		} 
        else 
        {
			$_POST['gender_checkbox'] = 0;
		}
		
		if(isset($_POST['email_checkbox'])) 
        {
			$_POST['email_checkbox'] = 1;
		} 
        else 
        {
			$_POST['email_checkbox'] = 0;
		}
		
		if(isset($_POST['hp_checkbox'])) 
        {
			$_POST['hp_checkbox'] =1;
		} 
        else 
        {
			$_POST['hp_checkbox']=0;
		}
		
		if(isset($_POST['fb_checkbox'])) 
        {
			$_POST['fb_checkbox'] =1;
		} 
        else 
        {
			$_POST['fb_checkbox'] = 0;
		}
		
		if(isset($_POST['twitter_checkbox'])) 
        {
			$_POST['twitter_checkbox'] =1;
		} 
        else 
        {
			$_POST['twitter_checkbox'] =0;
		}
		
		if(isset($_POST['plurk_checkbox'])) 
        {
			$_POST['plurk_checkbox'] = 1;
		} 
        else 
        {
			$_POST['plurk_checkbox']=0;
		}
		
		if(isset($_POST['skype_checkbox'])) 
        {
			$_POST['skype_checkbox'] =1;
		} 
        else 
        {
			$_POST['skype_checkbox']=0;
		}
		
		if(isset($_POST['msn_checkbox'])) 
        {
			$_POST['msn_checkbox']=1;
		} 
        else 
        {
			$_POST['msn_checkbox']=0;
		}
		
		if(isset($_POST['second_email_checkbox'])) 
        {
			$_POST['second_email_checkbox'] = 1;
		} 
        else 
        {
			$_POST['second_email_checkbox']=0;
		}
		
		if(isset($_POST['dorm_checkbox'])) 
        {
			$_POST['dorm_checkbox']=1;
		} 
        else 
        {
			$_POST['dorm_checkbox']=0;
		}
		
		if(isset($_POST['food_checkbox'])) 
        {
			$_POST['food_checkbox']=1;
		} 
        else 
        {
			$_POST['food_checkbox']=0;
		}
		
		if(isset($_POST['address_checkbox'])) 
        {
			$_POST['address_checkbox']=1;
		} 
        else 
        {
			$_POST['address_checkbox']=0;
		}
		
		if(isset($_POST['club_checkbox'])) 
        {
			$_POST['club_checkbox']=1;
		} 
        else 
        {
			$_POST['club_checkbox']=0;
		}
		
		if(isset($_POST['club_id_checkbox'])) 
        {
			$_POST['club_id_checkbox']=1;
		} 
        else 
        {
			$_POST['club_id_checkbox']=0;
		}
		
		if(isset($_POST['hometown_checkbox'])) 
        {
			$_POST['hometown_checkbox']=1;
		} 
        else 
        {
			$_POST['hometown_checkbox']=0;
		}
		
		if(isset($_POST['transport_checkbox'])) 
        {
			$_POST['transport_checkbox']=1;
		} 
        else 
        {
			$_POST['transport_checkbox']=0;
		}
		
		echo $_POST['student_id_check']."<br>";
		echo $_POST['name']."<br>";
		echo $_POST['gender']."<br>";
		echo $_POST['department'].$_POST['grade']."<br>";
		echo $_POST['email']."<br>";
		echo $_POST['passwd']."<br>";
		echo $_POST['passwd_confirm']."<br>";
		echo $_POST['hp']."<br>";
		echo $_POST['fb']."<br>";
		echo $_POST['twitter']."<br>";
		echo $_POST['plurk']."<br>";
		echo $_POST['skype']."<br>";
		echo $_POST['msn']."<br>";
		echo $_POST['second_email']."<br>";
		echo $_POST['dorm'].$_POST['floor'].$_POST['room']."<br>";
		echo $_POST['food']."<br>";
		echo $_POST['address']."<br>";
		echo $_POST['club']."<br>";
		echo $_POST['club_id']."<br>";
		echo $_POST['id']."<br>";
		echo $_POST['national']."<br>";
		echo $_POST['hometown']."<br>";
		echo $_POST['transport']."<br>";
		
		echo 'student'.$_POST['student_id_checkbox']."<br>";		
		echo 'gender'.$_POST['gender_check']."<br>";
		echo 'email'.$_POST['email_check']."<br>";
				
	
$sql_insert = "INSERT INTO 
member_detail (student_id,
						name, 
						gender, 
						department, 
						grade, email,
						passwd,
						confirm_passwd,
						hp,
						fb,
						twitter,
						plurk,
						skype,
						msn,
						second_email,
						dorm,
						floor,
						room,
						food,
						address,
						club,
						club_id,
						id,
						hometown,
						transport) 
VALUES ('$_POST[student_id]',
				'$_POST[name]',
				'$_POST[gender]',
				'$_POST[department]',
				'$_POST[grade]',
				'$_POST[email]',
				'$_POST[passwd]',
				'$_POST[passwd_confirm]',
				'$_POST[hp]',
				'$_POST[fb]',
				'$_POST[twitter]',
				'$_POST[plurk]',
				'$_POST[skype]',
				'$_POST[msn]',
				'$_POST[second_email]',
				'$_POST[dorm]',
				'$_POST[floor]',
				'$_POST[room]',
				'$_POST[food]',
				'$_POST[address]',
				'$_POST[club]',
				'$_POST[club_id]',
				'$_POST[id]',
				'$_POST[hometown]',
				'$_POST[transport]')";



$member_check_sql_insert = "INSERT INTO 
member_check (student_id_check,					
						gender_check, 						
						email_check,					
						hp_check,
						fb_check,
						twitter_check,
						plurk_check,
						skype_check,
						msn_check,
						second_email_check,
						dorm_check,				
						food_check,
						address_check,
						club_check,
						club_id_check,				
						hometown_check,
						transport_check) 
						
VALUES ('$_POST[student_id_checkbox]',
				'$_POST[gender_checkbox]',
				'$_POST[email_checkbox]',		
				'$_POST[hp_checkbox]',
				'$_POST[fb_checkbox]',
				'$_POST[twitter_checkbox]',
				'$_POST[plurk_checkbox]',
				'$_POST[skype_checkbox]',
				'$_POST[msn_checkbox]',
				'$_POST[second_email_checkbox]',
				'$_POST[dorm_checkbox]',		
				'$_POST[food_checkbox]',
				'$_POST[address_checkbox]',
				'$_POST[club_checkbox]',
				'$_POST[club_id_checkbox]',
				'$_POST[hometown_checkbox]',
				'$_POST[transport_checkbox]')";

if (!mysql_query($sql_insert))
  {
  die('Error : ' . mysql_error());
  }
  	echo "1 record added",$sql_insert."<br/>";	
	
	
	if (!mysql_query($member_check_sql_insert))
  {
  die('Error : ' . mysql_error());
  }
  	echo "1 record added",$member_check_sql_insert."<br/>";	


}//if end





/*釋放資源*/
//mysql_free_result($sql_insert); //釋放與mysql的連線
/*斷開連線*/
//mysql_close();
?>
<html>
<head>
<link href="http://www.airstage.com.tw/nsysu/airs/tm2.ico" rel="shortcut icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<title>│Airstage 西灣人│會員中心：修改個人資料</title>

<style fprolloverstyle>
	A:hover {text-decoration: underline; font-weight: bold}
</style>
<style type="text/css"> 
input.error { 
/* If the field is error, color it like this */
    background: #FBE3E4;
    color: #D12F19;
    border-color: #FBC2C4;
	border-radius: 7px;/*讓input框架變圓*/
	-moz-border-radius: 7px;/*讓input框架變圓*/
}    
label.error {
/* If the field is wrong, style the error text like this */
        background: url("./picture/uncheck.png") no-repeat;
        padding-left: 16px;
        margin-left: .3em;
        color: red;
}

input.valid{
	/* If the field is error, color it like this */
    border-style:solid;
    color: #000000;
    border-color: #00B311;
	border-radius: 7px;/*讓input框架變圓*/
	-moz-border-radius: 7px;/*讓input框架變圓*/
}
label.valid {
/* If the field is right, style the label like this */
        background: url("./picture/check.gif") no-repeat;
        padding-left: 16px;
        margin-left: .3em; 
		border-radius: 7px;/*讓input框架變圓*/
		-moz-border-radius: 7px;/*讓input框架變圓*/
		
}
#form {
/* Rawr */
    width:600px;
	
}
input{
/* Float the inputs to the left */
    /*float:left;*/
	border-radius: 7px; /*讓input框架變圓*/
	-moz-border-radius: 7px;/*讓input框架變圓*/
	
}

#form1{
	background-color : #FFF;
	}

option:first { color:#999; }

.block { display: block; }
form.cmxform label.error { display: none; }	

</style>



<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>

<script language="JavaScript" fptype="dynamicanimation">
<!--
function dynAnimation() {}
function clickSwapImg() {}
//-->
</script>


<script type="text/javascript"> 
    $(document).ready(function() { 
// Validate starting
        $("#form1").validate({
// Validate form with Id = Form1
            success: "valid", // Give the label the class "valid" when it's OK.
            rules: { // Rules for our stuff               
				
				student_id: 
                    {
                        required: true,
                        studentidValid:true 
               		 },
				
				name: // the input with the ID username:
                    {
                        required: true, //Is required                        
						//uidValid:true// Add custom rule to validate userid field							
                }, // close it - "," means = "more to come"
				
				gender: "required",
				
				department:				 
                    {
                        required: true,                        
                },				
				grade:{
						required:true,
					},
					
				email: 
                    {
                        required: true,
                        email: true // Has to be an email
                },
				
                passwd:  // the input with the id password 1
                    {
                        required: true, // is required 
                        rangelength: [6, 20]   // gotta be 6-20 characters
                },
				
                passwd_confirm: // id password2
                    {
                        required: true,
                        equalTo: "#passwd" // HAS to be EQUAL TO item with the ID password1
                },
				
				
				
				/*
				date:{
					required:true,
					dateISO:true,
					
					},
					*/
					
				hp: 
                    {
                        //required: true,
                        hpValid:true // Has to be a phone number
               		 },					
                fb: 
                    {
                        //required: true,
                        email: true // Has to be an email
                },
                twitter: 
                    {
                        //required: true,
                        email: true // Has to be an email
                },
                plurk: 
                    {
                        //required: true,
                        email: true // Has to be an email
                },
                skype: 
                    {
                        //required: true,
                        email: true // Has to be an email
                },
                msn: 
                    {
                        //required: true,
                        email: true // Has to be an email
                },
                second_email: 
                    {
                        //required: true,
                        email: true // Has to be an email
                },
				
				dorm:				 
                    {                       
                        emptyValid:true       //match empty data  
                	},				
				floor:
					{
						emptyValid:true       //match empty data  
					},
				room:				 
                    {
                       emptyValid:true       //match empty data  
                	},	
				food:				 
                    {
                       emptyValid:true       //match empty data  
                	},
				address:				 
                    {
                        emptyValid:true       //match empty data   
                	},
				club:				 
                    {
                        emptyValid:true       //match empty data                    
                	},
				club_id:				 
                    {
                       emptyValid:true       //match empty data      
                	},
				id:				 
                    {
                        emptyValid:true       //match empty data            
                	},
				national:				 
                    {
                       emptyValid:true       //match empty data                 
                	},
				hometown:				 
                    {
                       emptyValid:true       //match empty data                 
                	},
				transport:				 
                    {
                        emptyValid:true       //match empty data                          
                	},
            }   ,
			
			errorPlacement: function(error, element) { //指定错误信息位置 
if (element.is(':radio') || element.is(':checkbox')) { //如果是radio或checkbox 
var eid = element.attr('name'); //获取元素的name属性 
error.appendTo(element.parent()); //将错误信息添加当前元素的父结点后面 
} else { 
error.insertAfter(element); 
} 
},    
        	
			
		
		});          // Closing everything
    });
	
	//http://stackoverflow.com/questions/1699611/first-letter-should-not-be-a-number-using-jquery	
	// Add custom validation method to validate user id
// Change regular expression according to your need

	$.validator.addMethod("emptyValid", function(empty, element) {
        return (this.optional(element) || empty.match());
    }, "");

	$.validator.addMethod("studentidValid", function(studentid, element) {
        return (this.optional(element) || studentid.match(/[A-Za-z]{1}\d{9}/i));
    }, "請輸入正確的學號");
	
    $.validator.addMethod("hpValid", function(hp, element) {
        return (this.optional(element) || hp.match(/[0-9]{10}/i));
    }, "請輸入正確的電話號碼");
	
</script>

</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" onLoad="dynAnimation()" language="Javascript1.2">

<div align="center">
	&nbsp;<table border="0" width="980" height="693" cellspacing="0" cellpadding="0">
		<tr>
			<td background="../../../../jpg/bot.jpg" valign="top">
			<div align="center">
			<form  id="form1" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
				<table border="0" width="98%" cellspacing="0" cellpadding="0" height="761">
					<tr>
						<td align="left" valign="top" height="192" colspan="2" background="jpg/top.jpg" width="960">
						<p align="center">&nbsp;
						</p>
						</td>
					</tr>
					<tr>
						<td align="left" valign="top" width="30%">
			<div align="center">
				<p align="center">&nbsp;</p>
				<table border="0" width="65%" height="135">
					<tr>
						<td height="48" width="4%">
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						<img border="0" src="jpg/gray.jpg" width="6" height="50"></td>
						<td height="48" width="8%">
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;</td>
						<td height="48" width="81%">
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						<b>
						<font size="2">修改個人資料</font></b></p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						<font size="2"><a href="index.htm">
						<font color="#1F1F1F">
						<span style="text-decoration: none">傳送即時短訊</span></font></a></font></td>
					</tr>
					<tr>
						<td colspan="3" height="6">
						<p style="margin-top: 0; margin-bottom: 0">
						<font color="#FFFFFF" style="font-size: 1pt">1</font></td>
					</tr>
					<tr>
						<td>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						<img border="0" src="jpg/gray.jpg" width="6" height="75"></td>
						<td>&nbsp;</td>
						<td>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						<font size="2">影音聯播</font></p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						<font size="2">24HR幫幫忙</font></p>
						<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">
						<font size="2">報名系統</font></td>
					</tr>
				</table>
			</div>
						</td>
						<td align="center" valign="top" width="70%">
			<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;</p>
			<p style="line-height: 150%; margin-top: 0; margin-bottom: 0">&nbsp;</p>
			<table border="0" width="640" cellspacing="1" height="150">
				<tr>
					<td align="center" colspan="3" height="28" valign="top">
					<p align="left" style="margin-top: 0; margin-bottom: 0">
		<font face="Times New Roman" size="5" style="font-weight: 700" color="#1F1F1F">
		♠</font><font face="微軟正黑體" size="4" color="#333333"> <b>修改個人資料</b></font><p align="left" style="margin-top: 0; margin-bottom: 0">
		&nbsp;</td>
				</tr>
				<tr>
					<td align="center" colspan="3" height="6">
					<p style="margin-top: 0; margin-bottom: 0">
					<font size="2">
					<img border="0" src="jpg/line.jpg" width="630" height="1" align="left"></font><p style="margin-top: 0; margin-bottom: 0">
					&nbsp;<p style="margin-top: 0; margin-bottom: 0" align="left">
					<font size="2"><b>（一）基本資料　</b><font color="#333333">請</font><font color="#FF0000">勾選</font><font color="#333333">欲讓人看到的項目</font></font><p style="margin-top: 0; margin-bottom: 0" align="left">
					&nbsp;</td>
				</tr>
				<tr>
					<td align="left" height="14" width="20">
					<input type="checkbox" name="student_id_checkbox" value="ON" checked></td>
					<td align="left" height="14" width="80">
					<p align="left" style="margin-top: 0; margin-bottom: 0">
					<font size="2">學　　號</font></td>
					<td align="left" height="14" width="530">
					<p style="margin-top: 0; margin-bottom: 0">
					
					<input name="student_id" id="student_id" size="20"  maxlength="10"></font></td>
				</tr>
				<tr>
					<td align="left" height="13" width="20"></td>
					<td align="left" height="13" width="80">
					<p align="left" style="margin-top: 0; margin-bottom: 0">
					<font size="2">姓　　名</font></td>
					<td align="left" height="13" width="530">
					<p style="margin-top: 0; margin-bottom: 0">
					
					<input name="name" id="name" size="20"  value="郭宇軒"></font></td>
				</tr>
				<tr>
					<td align="left" height="7" width="20">
						<input type="checkbox" name="gender_checkbox" value="ON" checked>
					</td>
					<td align="left" height="7" width="80">
					<p style="margin-top: 0; margin-bottom: 0"><font size="2">
					性　　別</font></td>
					<td align="left" height="7" width="530">
					<p style="margin-top: 0; margin-bottom: 0">
					<input type="radio" value="boy" name="gender" id="gender" style="text-shadow: rgba(50, 50, 50, 0.296875) 2px 2px 3px; " checked><font size="2">男&nbsp;&nbsp;</font>
					<input type="radio" value="girl" name="gender" id="gender" style="text-shadow: rgba(50, 50, 50, 0.296875) 2px 2px 3px; "><font size="2">女</font></td>
				</tr>
				<tr>
					<td align="left" height="6" width="20"></td>
					<td align="left" height="6" width="80"><font size="2">系　　級</font></td>
					<td align="left" height="6" width="530">
						<select size="1" name="department" id="department">	
							<optgroup label="【文學院】">							
								<option>中文系</option>
								<option>外文系</option>
								<option>劇藝系</option>
								<option>音樂系</option>
							</optgroup>
							<optgroup label="【社科院】">							
								<option>政經系</option>
								<option>社會系</option>
							</optgroup>
							<optgroup label="【理學院】">						
								<option>應數系</option>
								<option>化學系</option>
								<option>物理系</option>
								<option>生科系</option>
							</optgroup>
							<optgroup label="【工學院】">							
								<option>電機系</option>
								<option>機電系</option>
								<option>資工系</option>
								<option>材光系</option>
							</optgroup>
								<optgroup label="【管理學院】">
								<option value="business_administration" selected>企管系</option>
								<option value="financial_management">財管系</option>
								<option value="information_management">資管系</option>
							</optgroup>
							<optgroup label="【海科院】">							
								<option>海資系</option>
								<option>海工系</option>
							</optgroup>
						</select>
						<select size="1" name="grade" id="grade">	
							<option>101</option>
							<option>102</option>
							<option selected>103</option>
							<option>104</option>
						</select>
						<font size="2">級</font></td>
				</tr>
				<tr>
					<td align="left" height="13" width="20">
					<input type="checkbox" name="email_checkbox" value="ON" checked></td>
					<td align="left" height="13" width="80">
					<p style="margin-top: 0; margin-bottom: 0"><font size="2">
					信　　箱</font></td>
					<td align="left" height="13" width="530">
					<p style="margin-top: 0; margin-bottom: 0">
					
					<input name="email" id="email" placeholder="www@example.com" size="35" value="maxwell_darknight@yahoo.com.tw"></font></td>
				</tr>
				<tr>
					<td align="left" height="13" width="20"></td>
					<td align="left" height="13" width="80">
					<p style="margin-top: 0; margin-bottom: 0"><font size="2">
					密　　碼</font></td>
					<td align="left" height="13" width="530">
					<p style="margin-top: 0; margin-bottom: 0">
					
					<input type="password" name="passwd" id="passwd" size="35"   value="123"></font></td>
				</tr>
				<tr>
					<td align="left" height="13" width="20"></td>
					<td align="left" height="13" width="80">
					<p style="margin-top: 0; margin-bottom: 0"><font size="2">
					密碼確認</font></td>
					<td align="left" height="13" width="530">
					<p style="margin-top: 0; margin-bottom: 0">
					
					<input type="password" name="passwd_confirm" id="passwd_confirm" size="35"   value="123"></font></td>
				</tr>
				<tr>
					<td align="left" colspan="2" height="13" width="103">
					<p style="margin-top: 0; margin-bottom: 0"></td>
					<td align="left" height="13" width="530">
					<p style="margin-top: 0; margin-bottom: 0"></td>
				</tr>
				<tr>
					<td align="left" colspan="3" height="3" width="99%">
					<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
					<p style="margin-top: 0; margin-bottom: 0"><font size="2">
					<b>（二）常用資料：</b><font color="#333333">會自動記錄，方便以後不用重填</font></font></p>
					<p style="margin-top: 0; margin-bottom: 0">&nbsp;</td>
				</tr>
			</table>
			<table border="0" width="640" cellspacing="1" height="357">
				<tr>
					<td align="left" colspan="3" height="2" width="99%">
					<p style="margin-top: 0; margin-bottom: 0"><font size="2">
					<img border="0" src="jpg/line.jpg" width="630" height="1" align="left"></font></p>
					<p style="margin-top: 0; margin-bottom: 0">&nbsp;</td>
				</tr>
				<tr>
					<td align="left" height="1" width="27">
					<input type="checkbox" name="hp_checkbox" value="ON"></td>
					<td align="left" height="1" width="79">
					<p style="margin-top: 0; margin-bottom: 0"><font size="2">
					手　　機　　</font></td>
					<td align="left" height="1" width="522">
					
					<input name="hp" id="hp" size="20"   value="0975705499" maxlength="10"></font></td>
				</tr>
				<tr>
					<td align="left" width="27">
					<input type="checkbox" name="fb_checkbox" value="ON"></td>
					<td align="left" width="79">
					<font size="2">Facebook</font></td>
					<td align="left" width="522">
					
					<input name="fb" id="fb" size="34"  ></font></td>
				</tr>
				<tr>
					<td align="left" width="27">
					<input type="checkbox" name="twitter_checkbox" value="ON"></td>
					<td align="left" width="79">
					<font size="2">Twitter</font></td>
					<td align="left" width="522">
					
					<input name="twitter" id="twitter" size="34"   ></font></td>
				</tr>
				<tr>
					<td align="left" width="27">
					<input type="checkbox" name="plurk_checkbox" value="ON"></td>
					<td align="left" width="79">
					<font size="2">plurk</font></td>
					<td align="left" width="522">
					
					<input name="plurk" id="plurk" size="34"   ></font></td>
				</tr>
				<tr>
					<td align="left" height="1" width="27">
					<input type="checkbox" name="skype_checkbox" value="ON"></td>
					<td align="left" height="1" width="79">
					<font size="2" face="Arial">Skype</font></td>
					<td align="left" height="1" width="522">
					
					<input name="skype" id="skype" size="34"   ></font></td>
				</tr>
				<tr>
					<td align="left" width="27">
					<input type="checkbox" name="msn_checkbox" value="ON"></td>
					<td align="left" width="79"><font size="2">MSN</font></td>
					<td align="left" width="522">
					
					<input name="msn" id="msn" size="34"  ></font></td>
				</tr>
				<tr>
					<td align="left" width="27">
					<input type="checkbox" name="second_email_checkbox" value="ON"></td>
					<td align="left" width="79"><font size="2">備用信箱</font></td>
					<td align="left" width="522">
					
					<input name="second_email" id="second_email" size="34"  ></font></td>
				</tr>
				<tr>
					<td align="left" height="2" width="27">
					<input type="checkbox" name="dorm_checkbox" value="ON"></td>
					<td align="left" height="2" width="79">
					<p style="margin-top: 0; margin-bottom: 0"><font size="2">
					宿　　舍</font></td>
					
									
					<td align="left" height="2" width="522">
						<select size="1" name="dorm" id="dorm">
							<optgroup label="【武嶺山莊】">					
								<option value="wuling1">武嶺一村</option>
								<option value="wuling2">武嶺二村</option>
								<option value="wuling3">武嶺三村</option>
								<option value="wuling4">武嶺四村</option>
							</optgroup>
							<optgroup label="【翠亨山莊】">
								<option value="cuiheng_a">A棟</option>
								<option value="cuiheng_b">B棟</option>
								<option value="cuiheng_c">C棟</option>
								<option value="cuiheng_d">D棟</option>
								<option value="cuiheng_e">E棟</option>
								<option value="cuiheng_f">F棟</option>
								<option value="cuiheng_g">G棟</option>
								<option value="cuiheng_h">H棟-女宿</option>
								<option value="cuiheng_l">L棟-女宿</option>
							</optgroup>
						</select>
						<select size="1" name="floor" id="floor">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
						</select>
						<font size="2">樓</font>
						<input type="text" name="room" id="room" size="6">
						<font size="2">號房</font>
					</td>
				</tr>
				<tr>
					<td align="left" height="2" width="27">
					<input type="checkbox" name="food_checkbox" value="ON"></td>
					<td align="left" height="2" width="79">
					<p style="margin-top: 0; margin-bottom: 0"><font size="2">
					飲　　食</font></td>
					<td align="left" height="2" width="522">					
                    <input type="checkbox" name="not_vege" id="not_vege" value="not_vegetarian"><label for="not_vege">葷食</label>
                	<input type="checkbox" name="vege" id="vege" value="vegetarian"><label for="vege">素食</label>
                    <input type="checkbox" name="not_beef" id="non_beef" value="not_beef"><label for="not_beef">不吃牛</label>
                    <input type="checkbox" name="not_pork" id="not_pork" value="not_pork"><label for="not_pork">不吃豬</label>
                    </td>
				</tr>
				<tr>
					<td align="left" height="2" width="27">
					<input type="checkbox" name="address_checkbox" value="ON"></td>
					<td align="left" height="2" width="79">
					<p style="margin-top: 0; margin-bottom: 0"><font size="2">
					住　　址</font></td>
					<td align="left" height="2" width="522">					
					<input name="address" id="address" size="55"  >
                    </td>
				</tr>
				<tr>
					<td align="left" width="27">
					<input type="checkbox" name="club_checkbox" value="ON" checked></td>
					<td align="left" width="79"><font size="2">社　　團</font></td>
					<td align="left" width="522">
					<select size="1" name="club" id="club">	
						<optgroup label="【服務性社團】">						
							<option>基服社</option>
							<option>福沙社</option>
						</optgroup>
						<optgroup label="【學術性社團】">							
							<option value="aiesec" selected>AIESEC</option>
						</optgroup>
					</select>
					</td>
				</tr>
				<tr>
					<td align="left" width="27">
					<input type="checkbox" name="club_id_checkbox" value="ON"></td>
					<td align="left" width="79"><font size="2">社團身分</font></td>
					<td align="left" width="522">
					
					<input name="club_id" id="club_id" size="20"  value="副會長"></font></td>
				</tr>
				<tr>
					<td align="left" width="27">&nbsp;</td>
					<td align="left" width="79"><font size="2">身&nbsp; 分&nbsp; 證</font></td>
					<td align="left" width="522">
					
					<input name="id" id="id" size="20"  ></font></td>
				</tr>
				<tr>
					<td align="left" width="27">&nbsp;</td>
					<td align="left" width="79"><font size="2">戶　　籍</font></td>
					<td align="left" width="522">
					
					<input name="national" id="national"  value="national" size="55"  ></font></td>
				</tr>
				<tr>
					<td align="left" width="27">
					<input type="checkbox" name="hometown_checkbox" value="ON" checked></td>
					<td align="left" width="79"><font size="2">家　　鄉</font></td>
					<td align="left" width="522">
					<select size="1" name="hometown" id="hometown">
						<optgroup label="【台灣】">						
							<option value="taipei">台北</option>
							<option value="kaohsiung" selected>高雄</option>
							<option value="tainan">台南</option>
							<option value="taizhong">台中</option>
						</optgroup>
						<optgroup label="【海外】">						
							<option value="china">中國</option>
							<option value="macau">澳門</option>
							<option value="hongkong">香港</option>
							<option value="vietman">越南</option>
							<option value="malaysia">馬來西亞</option>
						</optgroup>
					</select>
					</td>
				</tr>
				<tr>
					<td align="left" width="27">
					<input type="checkbox" name="transport_checkbox" value="ON"></td>
					<td align="left" width="79"><font size="2">交通工具</font></td>
					<td align="left" width="522">					
                        <input type="checkbox" name="walk" id="walk" value="walk"><label for="walk">步行</label>
                        <input type="checkbox" name="ride_nocar" id="ride_nocar" value="ride_nocar"><label for="ride_nocar">會騎車，沒機車</label>
                        <input type="checkbox" name="ride_gotcar" id="ride_gotcar" value="ride_gotcar"><label for="ride_gotcar">會騎車，有機車</label>
                        <input type="checkbox" name="car" id="car" value="car"><label for="car">汽車</label>
                    </td>
				</tr>
				<tr>
					<td align="left" width="27">&nbsp;</td>
					<td align="left" width="79">&nbsp;</td>
					<td align="left" width="522">&nbsp;</td>
				</tr>
				<tr>
					<td align="left" width="27">&nbsp;</td>
					<td align="left" width="79">&nbsp;</td>
					<td align="left" width="522">
						<input type="submit" value="送出資料" name="formSubmit">　　
						<input type="submit" value="取消修改" name="B2"></td>
				</tr>
			</table>
						</td>
					</tr>
				</table>
			</form> 					  <!-- form end-->
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</div>
			</td>
		</tr>
		<tr>
			<td height="106" background="../../../../mo/jpg/last.jpg" valign="top">
			<div align="right">
				<table border="0" width="51%" height="45">
					<tr>
						<td align="left" width="116"><font color="#FFFFFF">
						<a onMouseOver="var img=document['fpAnimswapImgFP21'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP21'].src=document['fpAnimswapImgFP21'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/index.htm">
			<img border="0" src="../../../../mo/jpg/b3.jpg" width="61" height="24" id="fpAnimswapImgFP21" name="fpAnimswapImgFP21" dynamicanimation="fpAnimswapImgFP21" lowsrc="../../../../mo/jpg/b302.jpg" align="right"></a><a onMouseOver="var img=document['fpAnimswapImgFP22'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP22'].src=document['fpAnimswapImgFP22'].imgRolln" target="_parent" href="https://www.facebook.com/pages/Airstage西灣人中山人的校園互動平台/356803227687619"><img border="0" src="../../../../mo/jpg/b0.jpg" width="31" height="24" id="fpAnimswapImgFP22" name="fpAnimswapImgFP22" dynamicanimation="fpAnimswapImgFP22" lowsrc="../../../../mo/jpg/b002.jpg" align="right"></a></font></td>
						<td align="left" width="68"><font color="#FFFFFF">
						<a onMouseOver="var img=document['fpAnimswapImgFP23'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP23'].src=document['fpAnimswapImgFP23'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/02.htm">
			<img border="0" src="../../../../mo/jpg/b1.jpg" width="62" height="24" id="fpAnimswapImgFP23" name="fpAnimswapImgFP23" dynamicanimation="fpAnimswapImgFP23" lowsrc="../../../../mo/jpg/b102.jpg" align="left"></a></font></td>
						<td align="left" width="109"><font color="#FFFFFF">
						<a onMouseOver="var img=document['fpAnimswapImgFP24'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP24'].src=document['fpAnimswapImgFP24'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/03.htm">
			<img border="0" src="../../../../mo/jpg/b2.jpg" width="61" height="24" id="fpAnimswapImgFP24" name="fpAnimswapImgFP24" dynamicanimation="fpAnimswapImgFP24" lowsrc="../../../../mo/jpg/b202.jpg" align="left"></a></font></td>
						<td align="left" valign="bottom"><font color="#FFFFFF">
						<a onMouseOver="var img=document['fpAnimswapImgFP25'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP25'].src=document['fpAnimswapImgFP25'].imgRolln" target="_parent" href="http://www.airstage.com.tw">
			<img border="0" src="../../../../mo/jpg/b4.jpg" width="124" height="30" id="fpAnimswapImgFP25" name="fpAnimswapImgFP25" dynamicanimation="fpAnimswapImgFP25" lowsrc="../../../../mo/jpg/b402.jpg" align="left"></a></font></td>
						<td align="left" width="31">&nbsp;</td>
					</tr>
				</table>
			</div>
			<p>&nbsp;</td>
		</tr>
	</table>
</div>

</body>

</html>