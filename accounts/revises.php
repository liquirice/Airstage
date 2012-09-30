<?php
	// Last Modified Day : 2012.09.27
	require_once( "../setSession.php" );
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) ) {
		echo '<script type="text/javascript">alert("請先登入唷～"); location.href="../index.php"</script>';
	} else {
		if( $_SESSION['auth'] == 0 ) {
			echo '<script type="text/javascript">alert("記得去信箱認證帳號才有權限進來唷!"); location.href="../index.php"</script>';
		} else {
			require_once( "../connectVar.php" );
			require_once( "uploadPath.php" );
			$stu_id = $_SESSION['stu_id'];
			
			// Clean the profile picture.
			if( isset($_POST['clean_pic']) ) {
				$query = "UPDATE member_Info SET profile_pic = ''";
				$result = mysqli_query( $conn, $query ) or die( 'Clean Error' );
				echo '<script type="text/javascript">alert("清除完成！");</script>';
			}
			
			// Upadte the user info.
			if( isset($_POST['submit']) ) {
				// Basic info.
				$username = mysqli_real_escape_string( $conn, trim($_POST['username']) );
				$gender = mysqli_real_escape_string( $conn, trim($_POST['gender']) );
				$department = mysqli_real_escape_string( $conn, trim($_POST['department']) );
				$grade = mysqli_real_escape_string( $conn, trim($_POST['grade']) );
				$facebook = mysqli_real_escape_string( $conn, trim($_POST['facebook']) );
				
				// Common info.
				$msn = mysqli_real_escape_string( $conn, trim($_POST['msn']) );
				$twitter = mysqli_real_escape_string( $conn, trim($_POST['twitter']) );
				$plurk = mysqli_real_escape_string( $conn, trim($_POST['plurk']) );
				$skype = mysqli_real_escape_string( $conn, trim($_POST['skype']) );
				$phone = mysqli_real_escape_string( $conn, trim($_POST['phone']) );
				$email = mysqli_real_escape_string( $conn, trim($_POST['email']) ); 
				$food = mysqli_real_escape_string( $conn, trim($_POST['food']) );
				$home = mysqli_real_escape_string( $conn, trim($_POST['home']) );
				$id = mysqli_real_escape_string( $conn, trim($_POST['id']) );
				$dorm = mysqli_real_escape_string( $conn, trim($_POST['dorm']) );
				$room = mysqli_real_escape_string( $conn, trim($_POST['room']) );
				$outAddr = mysqli_real_escape_string( $conn, trim($_POST['outAddr']) );
				$car = mysqli_real_escape_string( $conn, trim($_POST['car']) );
				
				// Checkboxes.
				$stu_id_c = $_POST['stu_id_c'];
				$name_c = $_POST['name_c'];
				$gender_c = $_POST['gender_c'];
				$grade_c = $_POST['grade_c'];
				$facebook_c = $_POST['facebook_c'];
				$msn_c = $_POST['msn_c'];
				$twitter_c = $_POST['twitter_c'];
				$plurk_c = $_POST['plurk_c'];
				$skype_c = $_POST['skype_c'];
				$phone_c = $_POST['phone_c'];
				$email_c = $_POST['email_c'];
				$home_c = $_POST['home_c'];
				$dorm_c = $_POST['dorm_c'];
				$outAddr_c = $_POST['outAddr_c'];
				$car_c = $_POST['car_c'];
				$profile_pic_c = $_POST['profile_pic_c'];
					
				// Profile Pic.
				$picName = $_FILES['profile_pic']['name'];
				$picType = $_FILES['profile_pic']['type'];
				$picSize = $_FILES['profile_pic']['size'];
				
				if( !empty($picName) ) {
					if( (($picType == 'image/gif') || ($picType == 'image/jpeg') || ($picType == 'image/png') || ($picType == 'image/pjpeg')) && ($picSize > 0) && ($picSize <= MAXSIZE) ) {
						if( $_FILES['profile_pic']['error'] == 0 ) {
							// Move to the target folder.
							$target = UPLOADPATH . $picName;
							if( move_uploaded_file( $_FILES['profile_pic']['tmp_name'], $target) ) {
								$query = "UPDATE member_Info SET profile_pic = '$picName'";
								$result = mysqli_query( $conn, $query ) or die('Update Error0');
							}
						}
					}
				}
				
				// Update the basic info.
				$query = "UPDATE Member SET gender = '$gender', department = '$department', grade = '$grade', email = '$email', username = '$username'".
						 " WHERE stu_id = '$stu_id'";
				$result = mysqli_query( $conn, $query ) or die('Update Error1');
				
				// Upadte the common info.
				$query = "UPDATE member_Info SET msn = '$msn', twitter = '$twitter', plurk = '$plurk', skype = '$skype', facebook = '$facebook'".
				 		 " ,phone = '$phone', food = '$food', home = '$home', id = '$id', dorm = '$dorm', room = '$room', outAddr = '$outAddr', car = '$car'".
				 		 " WHERE stu_id = '$stu_id'";
				$result = mysqli_query( $conn, $query ) or die('Update Error2');
				
				// Upadte the checkbox.
				$query = "UPDATE display_check SET stu_id_c = '$stu_id_c', name_c = '$name_c', gender_c = '$gender_c', grade_c = '$grade_c', facebook_c = '$facebook_c'".
						 " ,msn_c = '$msn_c', twitter_c = '$twitter_c', plurk_c = '$plurk_c', skype_c = '$skype_c', phone_c = '$phone_c', email_c = '$email_c', home_c = '$home_c'".
						 " ,dorm_c = '$dorm_c', outAddr_c = '$outAddr_c', car_c = '$car_c', profile_pic_c = '$profile_pic_c'";
				$result = mysqli_query( $conn, $query ) or die('Upadte Error3');
				
				echo '<script type="text/javascript">alert("更新完成！");</script>';
			}
				
			$query = "SELECT * FROM Member INNER JOIN member_Info Using(stu_id) WHERE Member.stu_id = '$stu_id'";
			$result = mysqli_query( $conn, $query );
			
			$displayCheck = "SELECT * FROM display_check WHERE stu_id = '$stu_id'";
			$checkResult = mysqli_query( $conn, $displayCheck );
			
			if( mysqli_num_rows($result) == 0 ) {
				echo '<script type="text/javascript">alert("查無此使用者，請重新登入"); location.href="../index.php"</script>';
			} else {
				$row = mysqli_fetch_array( $result );	
				$check = mysqli_fetch_array( $checkResult );
			}
		}
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<link href="tm2.ico" rel="shortcut icon"/>
<link href="assets/css/bootstrap.css" rel="stylesheet">
<!--link href="../css/bootstrap-Full/docs/assets/css/bootstrap-responsive.css" rel="stylesheet"-->
<!--link href="../css/bootstrap-Full/docs/assets/css/docs.css" rel="stylesheet"-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<title>│Airstage 西灣人│會員中心：編輯個人資料</title>
<base target="_parent">
<style type="text/css">
	body,td,th {
		font-family: "微軟正黑體", "Arial";
		font-size: 14px;
	}
	body {
		background-image: url(../jpg/background.png);
		background-repeat: repeat-x;
		background-color: #F2F2F2;
	}
	.d {
		font-size: 13px;
	}
	h5 {
		text-align: left;
	}
</style>
</head>

<body>

<div align="center">
	<?php
		require_once( "memberHeader.php" );
	?>
	
	<div align="center">
	  <table border="0" width="980" height="693" cellspacing="0" cellpadding="0">
	    <tr>
	      <td background="../jpg/bot.png" valign="top"><div align="center">
	        <table border="0" width="98%" cellspacing="0" cellpadding="0" height="761">
	          <tr>
	            <td align="left" valign="top" height="192" colspan="2" background="jpg/top.jpg" width="960"></td>
              </tr>
	          <tr>
	            <td align="left" valign="top" width="30%"><div align="center">
	              <p align="center"> <font face="微軟正黑體"> <span style="vertical-align: medium">&nbsp;</span></p>
	              
	              <?php
	              	require_once( "memberNavigation.php" );
	              ?>
	              
	              </div></td>
	            
	            <td align="center" valign="top" width="70%"><p style="line-height: 24px; margin-top: 0px; margin-bottom: 0px">&nbsp;</p>
	            
	            <!-- Start of the form -->
	            <div class="navbar">
	            	
	            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype = "multipart/form-data">
	            <h5>♠（一）基本資料( 請<font color="#FF7573">勾選</font>欲讓人看到的項目 )</h5>
	            <!--hr class="bs-docs-separator" /-->
	              <table width="645" class="table table-hover">
	              <tbody>
	                  <tr>
	                    <td>
		                    <label class="checkbox">
		                    	<input type="checkbox" name="stu_id_c" <?php if($check['stu_id_c'] == "on") { echo 'checked'; } ?> />&nbsp;學　　號
		                    </label>
	                    </td>
	                    <td>
		                    <i class="icon-book"></i>&nbsp;<?php echo $row['stu_id'];?>	                  
		                </td>	                  
                      </tr>
                      
	                  <tr>
	                    <td>
	                    <label class="checkbox">
	                      <input type="checkbox" name="name_c" id="check_name" <?php if($check['name_c'] == "on") { echo "checked"; }?> />&nbsp;姓　　名
	                    </label>
	                    </td>
	                    <td> 
		                	<i class="icon-user"></i>&nbsp;<?php echo $row['name'];?>
	                    </td>
                      </tr>
                      
                      <tr>
	                    <td>
	                    <label class="checkbox">
	                    	<input type="checkbox" disabled checked/>&nbsp;匿　　稱
	                    </label>
	                    </td>
	                    <td>
	                    	<div class="controls">
	                    		<input name="username" class="span3" value = "<?php echo $row['username'];?> " placeholder="輸入你的匿稱吧"/>
	                    	</div>
	                    </td>
                      </tr>
                      
	                  <tr>
	                    <td>
	                    <label class="checkbox">
	                      <input type="checkbox" name="gender_c" id="check_gender" <?php if($check['gender_c'] == "on") { echo "checked"; }?> />&nbsp;性　　別
	                    </label>
	                    </td>
	                    <td>
	                    <label class="radio inline">
	                      <input type="radio" value="男" name="gender" <?php if($row['gender'] == "男") { echo "checked"; } ?> />
	                      男&nbsp;&nbsp;
	                    </label>
	                    <label class="radio inline">
	                      <input type="radio" value="女" name="gender" <?php if($row['gender'] == "女") { echo "checked"; } ?> />
	                      女
	                    </label>
	                    </td>	                 
                      </tr>
                      
	                  <tr>
	                    <td>
	                    <label class="checkbox">
	                      <input type="checkbox" name="grade_c" id="check_grade" <?php if($check['grade_c'] == "on") { echo "checked"; }?> />&nbsp;系　　級
	                    </label>	
	                    </td>
	                    <td>                    
	                      <select name="department" size="1" class="span2">
							  <option value="<?php if($row['department'] == "") { echo '不知啥系">哪個科系呢？'; } else { echo $row['department'].'">'.$row['department']; } ?></option>
							  <option disabled>【 　文學院 　】</option>
							  <option value="中文系">中文系</option>
							  <option value="外文系">外文系</option>
							  <option value="劇藝系">劇藝系</option>
							  <option value="音樂系">音樂系</option>
							  <option value="文院研究所">文院碩博士</option>
							  <option value="文院教師與同仁">文院教師與同仁</option>
							  <option disabled>【 　社科院 　】</option>
							  <option value="政經系">政經系</option>
							  <option value="社會系">社會系</option>
							  <option value="社科院研究所">社科院碩博士</option>
							  <option value="社科院教師與同仁">社科院教師與同仁</option>
							  <option disabled>【 　理學院 　】</option>
							  <option value="應數系">應數系</option>
							  <option value="化學系">化學系</option>
							  <option value="物理系">物理系</option>
							  <option value="生科系">生科系</option>
							  <option value="理院研究所">理院碩博士</option>
							  <option value="理院教師與同仁">理院教師與同仁</option>
							  <option disabled>【 　工學院 　】</option>
							  <option value="電機系">電機系</option>
							  <option value="機電系">機電系</option>
							  <option value="資工系">資工系</option>
							  <option value="材光系">材光系</option>
							  <option value="工學院研究所">工學院碩博士</option>
							  <option value="工院教師與同仁">工院教師與同仁</option>
							  <option disabled>【 　管學院 　】</option>
							  <option value="企管系">企管系</option>
							  <option value="財管系">財管系</option>
							  <option value="資管系">資管系</option>
							  <option value="管學院研究所">管學院碩博士</option>
							  <option value="管院教師與同仁">管院教師與同仁</option>
							  <option disabled>【 　海科院 　】</option>
							  <option value="海資系">海資系</option>
							  <option value="海工系">海工系</option>
							  <option value="海科院研究所">海科院碩博士</option>
							  <option value="海院教師與同仁">海院教師與同仁</option>
							  <option disabled>【&nbsp;&nbsp;校方機構&nbsp;&nbsp;】</option>
							  <option value="行政處室">行政處室</option>
							  <option value="藝文中心">藝文中心</option>
							  <option value="圖書資訊處">圖書資訊處</option>
							  <option value="產學營運中心">產學營運中心</option>
							  <option value="其他單位">其他單位</option>
						</select>
						
	                    <select size="1" name="grade" class="span2">
	                        <option selected>第幾級呢？</option>
	                        <option value="105" <?php if($row['grade'] == '105') { echo "selected"; }?>>105</option>
	                        <option value="104" <?php if($row['grade'] == '104') { echo "selected"; }?>>104</option>
	                        <option value="103" <?php if($row['grade'] == '103') { echo "selected"; }?>>103</option>
	                        <option value="102" <?php if($row['grade'] == '102') { echo "selected"; }?>>102</option>
	                        <option value="101" <?php if($row['grade'] == '101') { echo "selected"; }?>>101</option>
	                      </select>
	                    </td>
                      </tr>
	                  <tr>
	                    <td>
	                    <label class="checkbox">
	                      	<input type="checkbox" name="facebook_c" id="check_facebook" <?php if($check['facebook_c'] == "on") { echo "checked"; }?> />&nbsp;Facebook
	                    </label>
	                    </td>
	                    <td>
		                    <div class="controls">
		                    	<img src="http://www.pccillin.com.tw/images/fb.gif" >
		                    	<input name="facebook" class="span5" value = "<?php echo $row['facebook'];?>" placeholder="想分享FB給別人知道嗎？" />
		                    </div>
	                    </td>	                  
                      </tr>   
                    </tbody>                   
                    </table>
                    
                    <!-- Next Part Start --> 
                    
                    <br />
                    
                    <h5>♠（二）常用資料：</h5> 
	                <table width="645" class="table table-hover">	     
	                <tbody>           
	                  <tr>
	                    <td>
	                    <label class="checkbox">
	                    	<input type="checkbox" name="msn_c" id="check_msn" "<?php if($check['msn_c'] == "on") { echo "checked"; }?> /> &nbsp;MSN
	                    </label>
	                    </td>
	                    <td>
	                    	<img src="https://encrypted-tbn3.google.com/images?q=tbn:ANd9GcTBZwvwVjMGbhInOthILiljaNLc_AC0AdmBsvlqdC3OLz6RVttG" width="14" height="14">
	                    	<input name="msn" class="span4" value = "<?php echo $row['msn'];?>" />
	                    </td>
                      </tr>
                      
	                  <tr>
	                    <td>
	                    <label class="checkbox">
	                      	<input type="checkbox" name="twitter_c" <?php if($check['twitter_c'] == "on") { echo "checked"; }?> />&nbsp;Twitter
	                    </label>
	                    </td>
	                    <td>
	                    	<img src="https://encrypted-tbn0.google.com/images?q=tbn:ANd9GcRXwLPUkXaduzV_Mna-a74rv4K5w-oirMO4H0hEbjnNMkI9BIbS0A" width="14" height="14">
	                    	<input name="twitter" class="span4" value = "<?php echo $row['twitter'];?>" />
	                    </td>	                  
                      </tr>
                      
	                  <tr>
	                    <td>
	                    <label class="checkbox">
	                      	<input type="checkbox" name="plurk_c" <?php if($check['plurk_c'] == "on") { echo "checked"; }?> />&nbsp;Plurk
	                    </label>
	                    </td>
	                    <td>
	                    	<img src="https://encrypted-tbn0.google.com/images?q=tbn:ANd9GcR1JaAOCNgLEWVxxyk8qXiq4otEva94IQbiEAZNeJy7iYP04o7Y" width="14" height="14">
	                    	<input name="plurk" class="span4" value = "<?php echo $row['plurk'];?>" />
	                    </td>	                   
                      </tr>
                      
	                  <tr>
	                    <td>
	                    <label class="checkbox">
		                    <input type="checkbox" name="skype_c" <?php if($check['skype_c'] == "on") { echo "checked"; }?> />&nbsp;Skype
	                    </label>
		                </td>
	                    <td>
	                    	<img src="https://encrypted-tbn2.google.com/images?q=tbn:ANd9GcTxk19xab9zH7syPeMI7E1uaF5o9CUw0wl0RIIG8zzqH6TyYCPc" width="14" height="14">
	                    	<input name="skype" class="span4" value = "<?php echo $row['skype'];?>" />
	                    </td>	                  
                      </tr>
                      
	                  <tr>
	                    <td>
	                    <label class="checkbox">
		                    <input type="checkbox" name="phone_c" id="check_phone" <?php if($check['phone_c'] == "on") { echo "checked"; }?> />&nbsp;手　　機
	                    </label>
		                </td>
	                    <td>
	                    	<i class="icon-signal icon"></i>&nbsp;<input name="phone" class="span4" value = "<?php echo $row['phone'];?>" />
	                    </td>	                    
                      </tr>
                      
	                  <tr>
	                    <td>
	                    <label class="checkbox">
		                    <input type="checkbox" name="email_c" id="check_email" <?php if($check['email_c'] == "on") { echo "checked"; }?> />&nbsp;常用信箱
	                    </label>
		                </td>
	                    <td>
	                    	<i class="icon-envelope"></i>&nbsp;<input type = "text "name="email" class="span4" value = "<?php echo $row['email'];?>" placeholder="一定要填喔！"/>
	                    </td>	                    
                      </tr>
                      
	                  <!--tr>
	                    <td align="left" height="2" width="22"><span style="vertical-align: medium"> <font face="微軟正黑體">
	                      	<input type="checkbox" name="check_clubs" value="1" id="check_clubs"></font></span>
	                    </td>
	                    <td height="2" colspan="2" align="left">
	                    	<span style="vertical-align: medium"> <font size="2" face="微軟正黑體">社　　團</font></span>
	                    </td>
	                    <td align="left" height="2" colspan="2"><font face="微軟正黑體">
	                      <select size="1" name="club">
	                        <span class="Apple-converted-space"></span>
	                        <option disabled>有參加社團嗎？</option>
	                        <span class="Apple-converted-space"></span>
	                        <option disabled>【　服務性社團　】</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="基服社">基服社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="滋青社">滋青社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="慈青社">慈青社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="原學社">原學社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="迴馨社">迴馨社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="扶根社">扶根社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="水上安全社">水上安全社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="綠色西灣社">綠色西灣社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="動物保護教育推廣社">動物保護教育推廣社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="英語志工社">英語志工社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="法輪大法社">法輪大法社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option disabled>【　學術性社團　】</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="AIESEC">AIESEC</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="福爾摩沙社">福爾摩沙社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="青年領袖研習社">青年領袖研習社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="中山團契">中山團契</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="學員團契">學員團契</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="中諦佛學社">中諦佛學社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="奇蹟生命研習社">奇蹟生命研習社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="現代詩社">現代詩社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="喜樂團契">喜樂團契</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="全人學社">全人學社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="西子劇坊">西子劇坊</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="推理小說研究社">推理小說研究社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="嚴新氣功科學研習社">嚴新氣功科學研習社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="中醫社">中醫社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="易學社">易學社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="晨興設">晨興社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="思辨社">思辨社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="天文社" selected>天文社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="命學社">命學社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option disabled>【　音樂性社團　】</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="颺韻合唱團">颺韻合唱團</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="吉他社">吉他社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="管樂社">管樂社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="南雁國樂社">南雁國樂社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="楊門樂社">揚門樂社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="室內樂社">室內樂社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="詩人詩頭會社">詩人詩頭會社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option disabled>【　學藝性社團　】</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="攝影社">攝影社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="手語社">手語社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="美食社">美食社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="圍棋社">圍棋社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="電影社">電影社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="動畫社">動畫社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="書法社">書法社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="橋藝社">橋藝社</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="美術社">美術社</option>
	                        <span class="Apple-converted-space"></span>
                          </select>
	                    </font></td>
                      </tr-->
                      
	                  <!--tr>
	                    <td align="left" height="2" width="22">
	                    	<span style="vertical-align: medium"> <font face="微軟正黑體">
		                    <input type="checkbox" name="check_level" value="ON" id="check_level"></font></span>
		                </td>
	                    <td height="2" colspan="2" align="left">
	                    	<span style="vertical-align: medium"> <font size="2" face="微軟正黑體">社團身分</font></span>
	                    </td>
	                    <td align="left" height="2" colspan="2"><span style="vertical-align: medium"><font face="微軟正黑體">
	                      <select name="level" size="1">
	                        <option selected>社團裡的身分？</option>
	                        <option>會長</option>
	                        <option>副會長</option>
	                        <option>社團幹部</option>
	                        <option>社團成員</option>
                          </select>
	                      </font></span>
	                     </td>
                      </tr-->
                      
	                  <tr>
	                    <td>
	                    <label class="checkbox">
	                    	<input type="checkbox" disabled />&nbsp;飲　　食
	                    </label>
		                </td>
	                    <td>
	                    	<i class="icon-glass"></i>&nbsp;
	                    	<select name="food" size="1">
	                        	<option>有不能吃的嗎？</option>
	                        	<option value="0" <?php if( $row['food'] == 0 ) { echo "selected"; } ?> />葷食</option>
	                        	<option value="1" <?php if( $row['food'] == 1 ) { echo "selected"; }?> />素食</option>
	                        </select>
	                    </td>	                   
                      </tr>
                      
	                  <tr>
	                    <td>
	                    <label class="checkbox">
	                      	<input type="checkbox" name="home_c" id="check_hometown" <?php if($check['home_c'] == "on") { echo "checked"; }?> />&nbsp;家　　鄉
	                    </label>
	                    </td>	                  
	                    <td>
	                    <i class="icon-home"></i>&nbsp;
	                      <select size="1" name="home">
	                        <option selected>來至哪裡呀？</option>
	                        <option disabled>【台灣】</option>
	                        <option value="Keelung" <?php if($row['home'] == "Keelung") echo 'selected';?>>基隆</option>
	                        <option value="Taipei" <?php if($row['home'] == "Taipei") echo 'selected';?>>台北</option>
	                        <option value="Taoyuan" <?php if($row['home'] == "Taoyuan") echo 'selected';?>>桃園</option>
	                        <option value="Hsinchu" <?php if($row['home'] == "Hsinchu") echo 'selected';?>>新竹</option>
	                        <option value="Ilan" <?php if($row['home'] == "Ilan") echo 'selected';?>>宜蘭</option>
	                        <option value="Miaoli" <?php if($row['home'] == "Miaoli") echo 'selected';?>>苗栗</option>
	                        <option value="Taichung" <?php if($row['home'] == "Taichung") echo 'selected';?>>台中</option>
	                        <option value="Changhua" <?php if($row['home'] == "Changhua") echo 'selected';?>>彰化</option>
	                        <option value="Nantou" <?php if($row['home'] == "Nantou") echo 'selected';?>>南投</option>
	                        <option value="Hualien" <?php if($row['home'] == "Hualien") echo 'selected';?>>花蓮</option>
	                        <option value="Yunlin" <?php if($row['home'] == "Yunlin") echo 'selected';?>>雲林</option>
	                        <option value="Chiayi" <?php if($row['home'] == "Chiayi") echo 'selected';?>>嘉義</option>
	                        <option value="Tainan" <?php if($row['home'] == "Tainan") echo 'selected';?>>台南</option>
	                        <option value="Kaohsiung" <?php if($row['home'] == "Kaohsiung") echo 'selected';?>>高雄</option>
	                        <option value="Taitung" <?php if($row['home'] == "Taitung") echo 'selected';?>>台東</option>
	                        <option value="Pingtung" <?php if($row['home'] == "Pingtung") echo 'selected';?>>屏東</option>
	                        <option value="Golden" <?php if($row['home'] == "Golden") echo 'selected';?>>金門</option>
	                        <option value="Penghu" <?php if($row['home'] == "Penghu") echo 'selected';?>>澎湖</option>
	                        <option disabled>【海外】</option>
	                        <option value="Malaysia" <?php if($row['home'] == "Malaysia") echo 'selected';?>>馬來西亞</option>
	                        <option value="Singapore" <?php if($row['home'] == "Singapore") echo 'selected';?>>新加坡</option>
	                        <option value="China" <?php if($row['home'] == "China") echo 'selected';?>>中國</option>
	                        <option value="Macao" <?php if($row['home'] == "Macao") echo 'selected';?>>澳門</option>
	                        <option value="HongKong" <?php if($row['home'] == "HongKong") echo 'selected';?>>香港</option>
	                        <option value="Philippines" <?php if($row['home'] == "Philippines") echo 'selected';?>>菲律賓</option>
	                        <option value="Vietnam" <?php if($row['home'] == "Vietnam") echo 'selected';?>>越南</option>
	                        <option value="India" <?php if($row['home'] == "India") echo 'selected';?>>印度</option>
	                        <option value="Europe" <?php if($row['home'] == "Europe") echo 'selected';?>>歐洲</option>
	                        <option value="Australia" <?php if($row['home'] == "Australia") echo 'selected';?>>澳洲</option>
	                        <option value="America" <?php if($row['home'] == "America") echo 'selected';?>>美洲</option>
	                        <option value="Asia" <?php if($row['home'] == "Asia") echo 'selected';?>>亞洲</option>	                        
                          </select>
	                    </td>
                      </tr>
                      
	                  <tr>
	                    <td>
	                    <label class="checkbox">
		                    <input type="checkbox" disabled />&nbsp; 身  分  證	
	                    </label>
	                    </td>
	                    <td>	                    
	                    	<i class="icon-pencil"></i>&nbsp;<input name="id" size="34" value ="<?php echo $row['id'];?>" />
	                    </td>	                    
                      </tr>
                      
	                  <tr>
	                    <td>
	                    <label class="checkbox">
	                      	<input type="checkbox" name="dorm_c" id="check_dorm" <?php if($check['dorm_c'] == "on") { echo "checked"; }?> />&nbsp;宿　　舍
	                    </label>
	                    </td>
	                    <td>
	                    <i class="icon-tags"></i>&nbsp;
	                      <select size="1" name="dorm" class="span2">
	                        <span class="Apple-converted-space"></span>
	                        <option selected>住哪一棟呢？</option>
	                        <option disabled value>【武嶺山莊】</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="1" <?php if($row['dorm'] == "1") { echo "selected";}?>>武嶺一村</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="2" <?php if($row['dorm'] == "2") { echo "selected";}?>>武嶺二村</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="3" <?php if($row['dorm'] == "3") { echo "selected";}?>>武嶺三村</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="4" <?php if($row['dorm'] == "4") { echo "selected";}?>>武嶺四村</option>
	                        <span class="Apple-converted-space"></span>
	                        <option disabled value>【翠亨山莊】</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="A" <?php if($row['dorm'] == "A" || $row['dorm'] == "a") { echo "selected";}?>>翠亨A棟</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="B" <?php if($row['dorm'] == "B" || $row['dorm'] == "b") { echo "selected";}?>>翠亨B棟</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="C" <?php if($row['dorm'] == "C" || $row['dorm'] == "c") { echo "selected";}?>>翠亨C棟</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="D" <?php if($row['dorm'] == "D" || $row['dorm'] == "d") { echo "selected";}?>>翠亨D棟</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="E" <?php if($row['dorm'] == "E" || $row['dorm'] == "e") { echo "selected";}?>>翠亨E棟</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="F" <?php if($row['dorm'] == "F" || $row['dorm'] == "f") { echo "selected";}?>>翠亨F棟</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="G" <?php if($row['dorm'] == "G" || $row['dorm'] == "g") { echo "selected";}?>>翠亨G棟</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="H" <?php if($row['dorm'] == "H" || $row['dorm'] == "h") { echo "selected";}?>>翠亨H棟-女宿</option>
	                        <span class="Apple-converted-space"></span>
	                        <option value="L" <?php if($row['dorm'] == "L" || $row['dorm'] == "l") { echo "selected";}?>>翠亨L棟-女宿</option>
	                        <span class="Apple-converted-space"></span>
                          </select>	   
                          <div class="controls">                  
	                      房號 -
	                      <input type="text" name="room" size="2" class="span1" value = <?php echo $row['room']; ?> />
                          </div>
	                    </td>
                      </tr>                     	               
                      
	                  <tr>
	                    <td>
	                    <label class="checkbox">
	                      	<input type="checkbox" name="outAddr_c" <?php if($check['outAddr_c'] == "on") { echo "checked"; }?> />&nbsp;校外住址
	                    </label>
	                    </td>
	                    <td>
	                    	<i class="icon-flag"></i>&nbsp;<input name="outAddr" class="span4" value = "<?php echo $row['outAddr']; ?>" />
	                    </td>
                      </tr>
                      
	                  <tr>
	                    <td>
	                    <label class="checkbox">
	                      	<input type="checkbox" name="car_c" <?php if($check['car_c'] == "on") { echo "checked"; }?> />&nbsp;交通工具
	                    </label>
	                    </td>
	                    <td>
	                    <i class="icon-road"></i>&nbsp;
	                      <select name="car" size="1">
	                        <option selected>有機車嗎？</option>
	                        <option value="0" <?php if($row['car'] == "0") { echo "selected"; }?>>步行</option>
	                        <option value="1" <?php if($row['car'] == "1") { echo "selected"; }?>>會騎車,沒機車</option>
	                        <option value="2" <?php if($row['car'] == "2") { echo "selected"; }?>>會騎車,有機車</option>
	                        <option value="3" <?php if($row['car'] == "3") { echo "selected"; }?>>汽車</option>
                          </select>
	                    </td>
                      </tr>
                      
	                  <tr>
	                    <td>
	                    <label class="checkbox">
	                      	<input type="checkbox" name="profile_pic_c" id="profile_pic_c" <?php if($check['profile_pic_c'] == "on") { echo "checked"; }?> />&nbsp;個人圖像
	                    </label>
	                    </td>
	                    <td>
		                    <ul class="thumbnails">
		                    	<li class="span5">
			                    	<a href="" class="thumbnail">
			                    		<i class="icon-picture"></i>&nbsp; <img src="<?php echo UPLOADPATH . $row['profile_pic']; ?>" class="img-polaroid" />
			                    	</a>			                    	
		                    	</li>
		                    </ul>
		                    <div class="alert alert-info fade in span4">
			                    <strong style="font-size: 13px;">檔案大小不可以超過1Mb喔！</strong><br />
		                    </div>
		                    <input type="file" name="profile_pic" id="profile_pic" class="btn btn-small" value="上傳檔案" />
		                    <button type = "submit" name = "clean_pic" id = "clean_pic" class="btn btn-large"><i class="icon-refresh"></i> 清除圖像</button>
	                    </td>	                   
                      </tr>                     	                  
                    </tbody>                    	               
                    </table>
                    <button type = "submit" name = "submit" class="btn btn-info"><i class="icon-leaf icon-white"></i> 修改資料</button>
                    <!-- End of form -->
	              </form>
	        </div>
	       </td>
          </tr>
        </table>
        <br />
        <br /> 
        <br />   
	        </div>
	      </td>
        </tr>
        
	    <tr>
	      <td height="106" background="../jpg/last.png" valign="top"><div align="right">
	        <table border="0" width="51%" height="45">
	          <tr>
	            <td align="left" width="116"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP21'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP21'].src=document['fpAnimswapImgFP21'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/index.htm"> <img src="../mo/jpg/b1.jpg" alt="" name="fpAnimswapImgFP21" width="62" height="24" border="0" align="right" lowsrc="../mo/jpg/b102.jpg" id="fpAnimswapImgFP21" dynamicanimation="fpAnimswapImgFP21"></a><a onMouseOver="var img=document['fpAnimswapImgFP22'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP22'].src=document['fpAnimswapImgFP22'].imgRolln" target="_parent" href="https://www.facebook.com/pages/Airstage西灣人中山人的校園互動平台/356803227687619"><img src="../mo/jpg/b0.jpg" alt="" name="fpAnimswapImgFP22" width="31" height="24" border="0" align="right" lowsrc="../mo/jpg/b002.jpg" id="fpAnimswapImgFP22" dynamicanimation="fpAnimswapImgFP22"></a></font></td>
	            <td align="left" width="68"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP23'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP23'].src=document['fpAnimswapImgFP23'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/02.htm"> <img src="../mo/jpg/b2.jpg" alt="" name="fpAnimswapImgFP23" width="61" height="24" border="0" align="left" lowsrc="../mo/jpg/b202.jpg" id="fpAnimswapImgFP23" dynamicanimation="fpAnimswapImgFP23"></a></font></td>
	            <td align="left" width="109"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP24'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP24'].src=document['fpAnimswapImgFP24'].imgRolln" target="_parent" href="http://www.airstage.com.tw/nsysu/airs/page/studio/03.htm"> <img src="../mo/jpg/b3.jpg" alt="" name="fpAnimswapImgFP24" width="61" height="24" border="0" align="left" lowsrc="../mo/jpg/b302.jpg" id="fpAnimswapImgFP24" dynamicanimation="fpAnimswapImgFP24"></a></font></td>
	            <td align="left" valign="bottom"><font color="#FFFFFF"> <a onMouseOver="var img=document['fpAnimswapImgFP25'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onMouseOut="document['fpAnimswapImgFP25'].src=document['fpAnimswapImgFP25'].imgRolln" target="_parent" href="http://www.airstage.com.tw"> <img src="../mo/jpg/b4.jpg" alt="" name="fpAnimswapImgFP25" width="124" height="30" border="0" align="left" lowsrc="../mo/jpg/b402.jpg" id="fpAnimswapImgFP25" dynamicanimation="fpAnimswapImgFP25"></a></font></td>
	            <td align="left" width="31">&nbsp;</td>
              </tr>
            </table>
	        </div>
	        <p>&nbsp;</td>
        </tr>
  
  
	    </table>
	</div>
<p>&nbsp;</p>
</div>

<?php mysqli_close( $conn ); ?>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootstrap-dropdown.js"></script>
<script src="assets/js/bootstrap-tooltip.js"></script>
<script src="assets/js/jquery.js"></script>
</body>



</html>