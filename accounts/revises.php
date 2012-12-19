<?php
	// Last Modified Day : 2012.09.27
	require_once( "redirectFilter.php" );
	require_once( "../global/setSession.php" );
	
	if( !isset($_SESSION['stu_id']) || !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入唷～"); location.href="../index.php"</script>';
	} else {
		if( $_SESSION['auth'] == 0 ) {
			echo '<script type="text/javascript">alert("記得去信箱認證帳號才有權限進來唷!"); location.href="../index.php"</script>';
		} else {
			require_once( "../global/connectVar.php" );
			require_once( "uploadPath.php" );
			$stu_id = $_SESSION['stu_id'];
			
			// Clean the profile picture.
			if( isset($_POST['clean_pic']) ) {
				$query = "UPDATE member_Info SET profile_pic = '' WHERE stu_id = '$stu_id'";
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
				$about = mysqli_real_escape_string( $conn, trim($_POST['about']) );
				
				// Common info.
				$group = mysqli_real_escape_string( $conn, trim($_POST['group']) );
				$groupLevel = mysqli_real_escape_string( $conn, trim($_POST['groupLevel']) );
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
				$stu_id_c = mysqli_real_escape_string( $conn, trim($_POST['stu_id_c']) );
				$name_c = mysqli_real_escape_string( $conn, trim($_POST['name_c']));
				$gender_c = mysqli_real_escape_string( $conn, trim($_POST['gender_c']));
				$grade_c = mysqli_real_escape_string( $conn, trim($_POST['grade_c']));
				$facebook_c = mysqli_real_escape_string( $conn, trim($_POST['facebook_c']));
				$group_c = mysqli_real_escape_string( $conn, trim($_POST['group_c']));
				$groupLevel_c = mysqli_real_escape_string( $conn, trim($_POST['groupLevel_c']));
				$msn_c = mysqli_real_escape_string( $conn, trim($_POST['msn_c']));
				$twitter_c = mysqli_real_escape_string( $conn, trim($_POST['twitter_c']));
				$plurk_c = mysqli_real_escape_string( $conn, trim($_POST['plurk_c']));
				$skype_c = mysqli_real_escape_string( $conn, trim($_POST['skype_c']));
				$phone_c = mysqli_real_escape_string( $conn, trim($_POST['phone_c']));
				$email_c = mysqli_real_escape_string( $conn, trim($_POST['email_c']));
				$home_c = mysqli_real_escape_string( $conn, trim($_POST['home_c']));
				$dorm_c = mysqli_real_escape_string( $conn, trim($_POST['dorm_c']));
				$outAddr_c = mysqli_real_escape_string( $conn, trim($_POST['outAddr_c']) );
				$car_c = mysqli_real_escape_string( $conn, trim($_POST['car_c']) );
				$about_c = mysqli_real_escape_string( $conn, trim($_POST['about_c']) );
				$profile_pic_c = mysqli_real_escape_string( $conn, trim($_POST['profile_pic_c']) );
					
				// Profile Pic.
				$picName = $_FILES['profile_pic']['name'];
				$picType = $_FILES['profile_pic']['type'];
				$picSize = $_FILES['profile_pic']['size'];
				$picTemp = $_FILES['profile_pic']['temp'];
			
				if( !empty($picName) ) {
					if( (($picType == 'image/gif') || ($picType == 'image/jpeg') || ($picType == 'image/png') || ($picType == 'image/pjpeg')) && ($picSize > 0) && ($picSize <= MAXSIZE) ) {
						
						

					
						
						/*
						if ($_FILES['profile_pic']['error']  > 0)
						   {
							   echo "Apologies, an error has occurred.";
							   echo "Error Code: " . $_FILES['profile_pic']['error'];
						   }
						else
						   {	
						   //"/home/airstage/public_html/test_area/move_uploaded_file/test2/" . $_FILES['profile_pic']['name']
						   //"/home/airstage/public_html/accounts/images/" . $_FILES['profile_pic']['name']					
						   $target = UPLOADPATH . $picName;
						   if(move_uploaded_file($_FILES['profile_pic']['tmp_name'],$target)){				
						   		echo "Succcessful!!" ;
							}
							else{
								echo "fail!!";
							}
						   }

						
						if( $_FILES['profile_pic']['error'] > 0 ) {
							echo "Error: " . $_FILES['profile_pic']['error'];
						}						
						else{
							$target = UPLOADPATH . $picName;
							//move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);
							if(move_uploaded_file($_FILES['profile_pic']['name'],"images/test.png")){
								echo "Error: " . $_FILES['profile_pic']['error']."<br/>";
								echo "檔案名稱: " . $_FILES['profile_pic']['name']."<br/>";
								echo "檔案類型: " . $_FILES['profile_pic']['type']."<br/>";
								echo "檔案大小: " . ($_FILES['profile_pic']['size'] / 1024)." Kb<br />";
								echo "暫存名稱: " . $_FILES['profile_pic']['tmp_name'];
								}
							else{
								echo "Error: " . $_FILES['profile_pic']['error']."<br/>";
								echo "檔案名稱: " . $_FILES['profile_pic']['name']."<br/>";
								echo "檔案類型: " . $_FILES['profile_pic']['type']."<br/>";
								echo "檔案大小: " . ($_FILES['profile_pic']['size'] / 1024)." Kb<br />";
								echo "暫存名稱: " . $_FILES['profile_pic']['tmp_name'];
								//$query = "UPDATE member_Info SET profile_pic = '$picName' WHERE stu_id = '$stu_id'";
								echo "Error: " . $_FILES['profile_pic']['error']."<br/>";
								echo "Error:move_uploaded_file " ;
								
								}
							}
							
							//$upload_dir = "images/";
							if (is_writable(UPLOADPATH)) {
								// do upload logic here
								echo 'Upload directory is writable, or does not exist.';
							}
							else {
								echo 'Upload directory is not writable, or does not exist.';
							}
							*/
						
						
						if( $_FILES['profile_pic']['error'] == 0 ) {
							// Move to the target folder.
							//$target = UPLOADPATH . $picName;
							$target = UPLOADPATH . $picName;

							
							//echo $_FILES['profile_pic']['name']."<br/>";
						
							if( move_uploaded_file( $_FILES['profile_pic']['tmp_name'], $target) ) {
								/*
								echo $target."<br/>";
								echo "<table border=\"1\">";
								echo "<tr><td>Client Filename: </td>
								   <td>" . $_FILES['profile_pic']['name'] . "</td></tr>";
								echo "<tr><td>File Type: </td>
								   <td>" . $_FILES['profile_pic']['type'] . "</td></tr>";
								echo "<tr><td>File Size: </td>
								   <td>" . ($_FILES['profile_pic']['size'] / 1024) . " Kb</td></tr>";
								echo "<tr><td>Name of Temp File: </td>
								   <td>" . $_FILES['profile_pic']['tmp_name'] . "</td></tr>";
								echo "</table>";
								*/
								
								$query = "UPDATE member_Info SET profile_pic = '$picName' WHERE stu_id = '$stu_id'";
								$result = mysqli_query( $conn, $query ) or die('Update Error0');
							}
							else{
								echo "Error:move_uploaded_file " ;								
								}
								
							/*
							if(move_uploaded_file($_FILES['profile_pic']['name'], $target)) {
								echo "The file ".  basename( $_FILES['profile_pic']['name']). " has been uploaded";
								//$query = "UPDATE member_Info SET profile_pic = '$picName' WHERE stu_id = '$stu_id'";
								//$result = mysqli_query( $conn, $query ) or die('Update Error0');
							} 
							else{
								echo "There was an error uploading the file, please try again!";
							}
							*/
						} else {
							echo "fail to upload picture";
						}
					}
				}
				else{
					//echo $picName."Empty";
					}
				
				// Update the basic info.
				$query = "UPDATE Member SET gender = '$gender', department = '$department', grade = '$grade', email = '$email', username = '$username', aboutauthor = '$about' ".
						 " WHERE stu_id = '$stu_id'";
				$result = mysqli_query( $conn, $query ) or die('Update Error1');
				
				// Upadte the common info.
				$query = "UPDATE member_Info SET msn = '$msn', twitter = '$twitter', plurk = '$plurk', skype = '$skype', facebook = '$facebook', `group` = '$group', groupLevel = '$groupLevel'".
				 		 " ,phone = '$phone', food = '$food', home = '$home', id = '$id', dorm = '$dorm', room = '$room', outAddr = '$outAddr', car = '$car'".
				 		 " WHERE stu_id = '$stu_id'";
				$result = mysqli_query( $conn, $query ) or die('Update Error2');
				
				// Upadte the checkbox.
				$query = "UPDATE display_check SET stu_id_c = '$stu_id_c', name_c = '$name_c', gender_c = '$gender_c', grade_c = '$grade_c', facebook_c = '$facebook_c', about_c = '$about_c'".
						 " ,msn_c = '$msn_c', twitter_c = '$twitter_c', plurk_c = '$plurk_c', skype_c = '$skype_c', phone_c = '$phone_c', email_c = '$email_c', home_c = '$home_c'".
						 " ,dorm_c = '$dorm_c', outAddr_c = '$outAddr_c', car_c = '$car_c', profile_pic_c = '$profile_pic_c', group_c = '$group_c', groupLevel_c = '$groupLevel_c' ".
						 " WHERE stu_id = '$stu_id'";
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<title>會員中心─ Airstage 西灣人</title>
<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script language="javascript" type="text/javascript">var app = "accounts";</script>
<base target="_parent">
<style type="text/css">
	body,td,th {
	font-family: "微軟正黑體", Arial;
	font-size: 14px;
	}
	body {
		//background-image: url(../jpg/background.png);
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
		require_once( "../global/navi_white/navi.php" );
	?>	
	<div align="center">
	  <table border="0" width="980" height="693" cellspacing="0" cellpadding="0">
	    <tr>
	      <td background="../global/images/bot.png" valign="top"><div align="center">
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
							  <option value="文院碩博士">文院碩博士</option>
							  <option value="文院教師與同仁">文院教師與同仁</option>
							  <option disabled>【 　社科院 　】</option>
							  <option value="政經系">政經系</option>
							  <option value="社會系">社會系</option>
							  <option value="社科院碩博士">社科院碩博士</option>
							  <option value="社科院教師與同仁">社科院教師與同仁</option>
							  <option disabled>【 　理學院 　】</option>
							  <option value="應數系">應數系</option>
							  <option value="化學系">化學系</option>
							  <option value="物理系">物理系</option>
							  <option value="生科系">生科系</option>
							  <option value="理院碩博士">理院碩博士</option>
							  <option value="理院教師與同仁">理院教師與同仁</option>
							  <option disabled>【 　工學院 　】</option>
							  <option value="電機系">電機系</option>
							  <option value="機電系">機電系</option>
							  <option value="資工系">資工系</option>
							  <option value="材光系">材光系</option>
							  <option value="工學院碩博士">工學院碩博士</option>
							  <option value="工院教師與同仁">工院教師與同仁</option>
							  <option disabled>【 　管學院 　】</option>
							  <option value="企管系">企管系</option>
							  <option value="財管系">財管系</option>
							  <option value="資管系">資管系</option>
							  <option value="管學院碩博士">管學院碩博士</option>
							  <option value="管院教師與同仁">管院教師與同仁</option>
							  <option disabled>【 　海科院 　】</option>
							  <option value="海資系">海資系</option>
							  <option value="海工系">海工系</option>
							  <option value="海科院碩博士">海科院碩博士</option>
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
	                    	<input type="checkbox" name="msn_c" id="check_msn" <?php if($check['msn_c'] == "on") { echo "checked"; }?> /> &nbsp;MSN
	                    </label>
	                    </td>
	                    <td>
	                    	<img src="https://encrypted-tbn3.google.com/images?q=tbn:ANd9GcTBZwvwVjMGbhInOthILiljaNLc_AC0AdmBsvlqdC3OLz6RVttG" width="14" height="14">&nbsp;
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
	                    	<img src="https://encrypted-tbn0.google.com/images?q=tbn:ANd9GcRXwLPUkXaduzV_Mna-a74rv4K5w-oirMO4H0hEbjnNMkI9BIbS0A" width="14" height="14">&nbsp;
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
	                    	<img src="https://encrypted-tbn0.google.com/images?q=tbn:ANd9GcR1JaAOCNgLEWVxxyk8qXiq4otEva94IQbiEAZNeJy7iYP04o7Y" width="14" height="14">&nbsp;
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
	                    	<img src="https://encrypted-tbn2.google.com/images?q=tbn:ANd9GcTxk19xab9zH7syPeMI7E1uaF5o9CUw0wl0RIIG8zzqH6TyYCPc" width="14" height="14">&nbsp;
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
	                    	<i class="icon-signal icon"></i>&nbsp;&nbsp;<input name="phone" class="span4" value = "<?php echo $row['phone'];?>" />
	                    </td>	                    
                      </tr>
                      
	                  <tr>
	                    <td>
	                    <label class="checkbox">
		                    <input type="checkbox" name="email_c" id="check_email" <?php if($check['email_c'] == "on") { echo "checked"; }?> />&nbsp;常用信箱
	                    </label>
		                </td>
	                    <td>
	                    	<i class="icon-envelope"></i>&nbsp;&nbsp;<input type = "text "name="email" class="span4" value = "<?php echo $row['email'];?>" placeholder="一定要填喔！"/>
	                    </td>	                    
                      </tr>
                      
	                  <tr>
	                    <td>
						<label class="checkbox">
	                      	<input type="checkbox" name="group_c" id="group_c" <?php if($check['group_c'] == "on") { echo "checked"; }?>>&nbsp;社　　團
	                    </label>
						</td>
	                    <td>
						<i class="icon-qrcode"></i>&nbsp;
	                      <select size="1" name="group">&nbsp;
	                      	<option value="">有參加社團嗎？</option>
	                        
	                        <option disabled>【　服務性社團　】</option>
	                        
	                        <option value="基服社" <?php if($row['group'] == "基服社") echo 'selected';?>>基服社</option>
	                        
	                        <option value="滋青社" <?php if($row['group'] == "滋青社") echo 'selected';?>>滋青社</option>
	                        
	                        <option value="慈青社" <?php if($row['group'] == "慈青社") echo 'selected';?>>慈青社</option>
	                        
	                        <option value="原學社" <?php if($row['group'] == "原學社") echo 'selected';?>>原學社</option>
	                        
	                        <option value="迴馨社" <?php if($row['group'] == "迴馨社") echo 'selected';?>>迴馨社</option>
	                        
	                        <option value="扶根社" <?php if($row['group'] == "扶根社") echo 'selected';?>>扶根社</option>
	                        
	                        <option value="CDPA" <?php if($row['group'] == "CDPA") echo 'selected';?>>CDPA - 中山網推會</option>
							
							<option value="水上安全社" <?php if($row['group'] == "水上安全社") echo 'selected';?>>水上安全社</option>
	                        
	                        <option value="綠色西灣社" <?php if($row['group'] == "綠色西灣社") echo 'selected';?>>綠色西灣社</option>
	                        
	                        <option value="動物保護教育推廣社" <?php if($row['group'] == "動物保護教育推廣社") echo 'selected';?>>動物保護教育推廣社</option>
	                        
	                        <option value="英語志工社" <?php if($row['group'] == "英語志工社") echo 'selected';?>>英語志工社</option>
	                        
	                        <option value="法輪大法社" <?php if($row['group'] == "法輪大法社") echo 'selected';?>>法輪大法社</option>
	                        
	                        <option disabled>【　學術性社團　】</option>
	                        
	                        <option value="AIESEC" <?php if($row['group'] == "AIESEC") echo 'selected';?>>AIESEC</option>
	                        
	                        <option value="福爾摩沙社" <?php if($row['group'] == "福爾摩沙社") echo 'selected';?>>福爾摩沙社</option>
	                        
	                        <option value="青年領袖研習社" <?php if($row['group'] == "青年領袖研習社") echo 'selected';?>>青年領袖研習社</option>
	                        
	                        <option value="中山團契" <?php if($row['group'] == "中山團契") echo 'selected';?>>中山團契</option>
	                        
	                        <option value="學員團契" <?php if($row['group'] == "學員團契") echo 'selected';?>>學員團契</option>
	                        
	                        <option value="中諦佛學社" <?php if($row['group'] == "中諦佛學社") echo 'selected';?>>中諦佛學社</option>
	                        
	                        <option value="奇蹟生命研習社" <?php if($row['group'] == "奇蹟生命研習社") echo 'selected';?>>奇蹟生命研習社</option>
	                        
	                        <option value="現代詩社" <?php if($row['group'] == "現代詩社") echo 'selected';?>>現代詩社</option>
	                        
	                        <option value="喜樂團契" <?php if($row['group'] == "喜樂團契") echo 'selected';?>>喜樂團契</option>
	                        
	                        <option value="全人學社" <?php if($row['group'] == "全人學社") echo 'selected';?>>全人學社</option>
	                        
	                        <option value="西子劇坊" <?php if($row['group'] == "西子劇坊") echo 'selected';?>>西子劇坊</option>
	                        
	                        <option value="推理小說研究社" <?php if($row['group'] == "推理小說研究社") echo 'selected';?>>推理小說研究社</option>
	                        
	                        <option value="嚴新氣功科學研習社" <?php if($row['group'] == "嚴新氣功科學研習社") echo 'selected';?>>嚴新氣功科學研習社</option>
	                        
	                        <option value="中醫社" <?php if($row['group'] == "中醫社") echo 'selected';?>>中醫社</option>
	                        
	                        <option value="易學社" <?php if($row['group'] == "易學社") echo 'selected';?>>易學社</option>
	                        
	                        <option value="晨興設" <?php if($row['group'] == "晨興設") echo 'selected';?>>晨興社</option>
	                        
	                        <option value="思辨社" <?php if($row['group'] == "思辨社") echo 'selected';?>>思辨社</option>
	                        
	                        <option value="天文社" <?php if($row['group'] == "天文社") echo 'selected';?>>天文社</option>
	                        
	                        <option value="命學社" <?php if($row['group'] == "命學社") echo 'selected';?>>命學社</option>
	                        
	                        <option disabled>【　表演性社團　】</option>
	                        
							<option value="勁舞社" <?php if($row['group'] == "勁舞社") echo 'selected';?>>勁舞社</option>
							
	                        <option value="颺韻合唱團" <?php if($row['group'] == "颺韻合唱團") echo 'selected';?>>颺韻合唱團</option>
	                        
	                        <option value="吉他社" <?php if($row['group'] == "吉他社") echo 'selected';?>>吉他社</option>
	                        
	                        <option value="管樂社" <?php if($row['group'] == "管樂社") echo 'selected';?>>管樂社</option>
	                        
	                        <option value="南雁國樂社" <?php if($row['group'] == "南雁國樂社") echo 'selected';?>>南雁國樂社</option>
	                        
	                        <option value="楊門樂社" <?php if($row['group'] == "楊門樂社") echo 'selected';?>>揚門樂社</option>
	                        
	                        <option value="室內樂社" <?php if($row['group'] == "室內樂社") echo 'selected';?>>室內樂社</option>
	                        
	                        <option value="詩人詩頭會社" <?php if($row['group'] == "詩人詩頭會社") echo 'selected';?>>詩人詩頭會社</option>
	                        
	                        <option disabled>【　學藝性社團　】</option>
	                        
	                        <option value="攝影社" <?php if($row['group'] == "攝影社") echo 'selected';?>>攝影社</option>
	                        
	                        <option value="手語社" <?php if($row['group'] == "手語社") echo 'selected';?>>手語社</option>
	                        
	                        <option value="美食社" <?php if($row['group'] == "美食社") echo 'selected';?>>美食社</option>
	                        
	                        <option value="圍棋社" <?php if($row['group'] == "圍棋社") echo 'selected';?>>圍棋社</option>
	                        
	                        <option value="電影社" <?php if($row['group'] == "電影社") echo 'selected';?>>電影社</option>
	                        
	                        <option value="動畫社" <?php if($row['group'] == "動畫社") echo 'selected';?>>動畫社</option>
	                        
	                        <option value="書法社" <?php if($row['group'] == "書法社") echo 'selected';?>>書法社</option>
	                        
	                        <option value="橋藝社" <?php if($row['group'] == "橋藝社") echo 'selected';?>>橋藝社</option>
	                        
	                        <option value="美術社" <?php if($row['group'] == "美術社") echo 'selected';?>>美術社</option>
	                        
                          </select>
	                    </td>
                      </tr>
                      
	                  <tr>
	                    <td>
						<label class="checkbox">
		                    <input type="checkbox" name="groupLevel_c" id="groupLevel_c" <?php if($check['groupLevel_c'] == "on") { echo "checked"; }?> />&nbsp;社團身分
		                </label>
						</td>
	               	    <td>
						  <i class="icon-barcode"></i>&nbsp;
	                      <select name="groupLevel" size="1">
	                        <option value="">社團裡的身分？</option>
	                        <option value="0" <?php if($row['groupLevel'] == "0") echo 'selected';?>>會長</option>
	                        <option value="1" <?php if($row['groupLevel'] == "1") echo 'selected';?>>副會長</option>
	                        <option value="2" <?php if($row['groupLevel'] == "2") echo 'selected';?>>社團幹部</option>
	                        <option value="3" <?php if($row['groupLevel'] == "3") echo 'selected';?>>社團成員</option>
                          </select>
	                      </font></span>
	                     </td>
                      </tr>
                      
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
	                    	<i class="icon-pencil"></i>&nbsp;&nbsp;<input name="id" size="34" value ="<?php echo $row['id'];?>" />
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
	                    	<i class="icon-flag"></i>&nbsp;&nbsp;<input name="outAddr" class="span4" value = "<?php echo $row['outAddr']; ?>" />
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
	                    	<input type="checkbox" name="about_c" id="about_c" <?php if($check['about_c'] == "on") { echo "checked"; }?> /> &nbsp;個人簡介
	                    </label>
	                    </td>
	                    <td>
	                    	<i class="icon-comment"></i>&nbsp;&nbsp;
							<textarea placeholder="關於我是什麼呢?" name="about" style="height: 200px; width: 400px;" ><?php echo $row['aboutauthor'];?></textarea>
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
	      <td height="106" background="../global/images/last.png" valign="top">
	      	<?php require_once("../global/footer.php"); ?>
        </tr>
  
  
	    </table>
	</div>
<p>&nbsp;</p>
</div>

<?php mysqli_close( $conn ); ?>
<script src = "assets/js/bootstrap-modal.js"></script>
<script src = "assets/js/application.js"></script>
<script src = "assets/js/bootstrap-transition.js"></script>
<script src = "assets/js/bootstrap-alert.js"></script>
<script src = "assets/js/bootstrap-modal.js"></script>
<script src = "assets/js/bootstrap-dropdown.js"></script>
<script src = "assets/js/bootstrap-scrollspy.js"></script>
<script src = "assets/js/bootstrap-tab.js"></script>
<script src = "assets/js/bootstrap-tooltip.js"></script>
<script src = "assets/js/bootstrap-popover.js"></script>
<script src = "assets/js/bootstrap-button.js"></script>
<script src = "assets/js/bootstrap-collapse.js"></script>
<script src = "assets/js/bootstrap-carousel.js"></script>
<script src = "assets/js/bootstrap-typeahead.js"></script>
<script src = "assets/js/bootstrap-affix.js"></script>
<script src = "../plugin/jrumble/jquery.jrumble.1.3.min.js"></script>
</body>



</html>