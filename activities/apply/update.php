<?php
//選擇修改活動資料
	if($_SESSION['record'] == 'update'){
		echo '
		<div id="update">
			<table width="947" height="573">
				<tr>
				<td width="507">
					<table width="507" height="100%" align="left" cellspacing="0" cellpadding="0" style="margin:0; padding:0; border:none" align="center" >
						<tr>
							<td align="center" height="80" colspan="2"></td>
						</tr>
						<form action="index.php?action=correct" method="post" name="form" target="_self" id="updateform">
						<tr>
							<td><img src="../images/cub.png" />活動分類</td>
							<td>
								<select name="type" id="type">';
								if($url['type'] == 'clubs'){
									echo'
        								<option value="clubs" selected>社團組織</option>
            							<option value="departments">校內系所</option>
            							<option value="authorities">校方機構</option>
            							<option value="concerts">藝文音樂</option>';
								}
								else if($url['type'] == 'departments'){
									echo'
        								<option value="clubs">社團組織</option>
            							<option value="departments" selected>校內系所</option>
            							<option value="authorities">校方機構</option>
            							<option value="concerts">藝文音樂</option>';
								}
								else if($url['type'] == 'authorities'){
									echo'
        								<option value="clubs">社團組織</option>
            							<option value="departments">校內系所</option>
            							<option value="authorities" selected>校方機構</option>
            							<option value="concerts">藝文音樂</option>';
								}
								else if($url['type'] == 'concerts'){
									echo'
        								<option value="clubs">社團組織</option>
            							<option value="departments">校內系所</option>
            							<option value="authorities">校方機構</option>
            							<option value="concerts" selected>藝文音樂</option>';
								}
                                else{
                                    echo'
                                        <option value="clubs">社團組織</option>
                                        <option value="departments">校內系所</option>
                                        <option value="authorities">校方機構</option>
                                        <option value="concerts">藝文音樂</option>';
                                }
							echo'
        						</select>
							</td>
						</tr>
						<tr>
							<td><img src="../images/cub.png" />大標題</td>
							<td><input type="text" name="title" id="title" value="'.$url['title'].'" placeholder="2012中山校園演唱會" /></td>
						</tr>
						<tr>
							<td colspan="2"><img src="../images/cub.png" />活動簡介<br />
							&nbsp;&nbsp;&nbsp;<textarea rows="4" id="description" cols="50" name="description" placeholder="演出藝人：陳綺貞|盧廣仲|魏如萱|蛋堡|李佳薇|張芸京|玩聲樂團 (host:NONO)">'.$url['description'].'</textarea></td>
						</tr>
						<tr>
							<td><img src="../images/cub.png" />活動名稱</td>
							<td><input type="text" name="name" placeholder="活末日之花　奇蹟綻放" id="name" value="'.$url['name'].'" /></td>
						</tr>
						<tr>
							<td><img src="../images/cub.png" />活動開始日期</td>
							<td><input type="text" name="starttime" placeholder="2012/05/25" class="date" value="'.$url['starttime'].'" />&nbsp;&nbsp;<input type="text" name="extratime" placeholder=" 5:45 開放入場" value="'.$url['extratime'].'" /></td>
						</tr>
						<tr>
							<td height="50px"><img src="../images/cub.png" />活動結束日期</td>
							<td><input type="text" name="endtime" placeholder="2012/05/30" class="date" value="'.$url['endtime'].'" />&nbsp;&nbsp;<input type="text" name="extratime2" placeholder=" 5:45 正式結束" value="'.$url['extratime2'].'" /></td>
						</tr>
						<tr>
							<td><img src="../images/cub.png" />地點</td>
							<td><input type="text" name="venue" id="venue" value="'.$url['venue'].'" placeholder="西子灣沙灘海水浴場" /></td>
						</tr>
						<tr>
							<td><img src="../images/cub.png" />費用</td>
							<td><input type="text" size="53" id="fee" name="fee" value="'.$url['fee'].'" placeholder="貴賓票－免費 校內票－$250 校外票－$400" /></td>
						</tr>
						<tr>
							<td><img src="../images/cub.png" />主辦單位</td>
							<td><input type="text" size="53" id="host" name="host" value="'.$url['host'].'" placeholder="中山大學學生會" /></td>
						<tr>
					</table>
				</td>
				<td valign="top">
					<table>
						<tr>
							<td height="80" colspan="2"></td>
						</tr>
						<tr>
							<td colspan="2" class="type" width="100"><img src="../images/cub.png" />活動主頁<br /><br />&nbsp;&nbsp;&nbsp;<input type="text" size="50" value="'.$url['url1'].'" id="url1" name="url1" placeholder="Google協作平台、無名小站等,沒有可空白" /><br />&nbsp;&nbsp;&nbsp;<input type="button" onclick="window.open(\'https://sites.google.com/\')" value="申請Google協作平台" /></td>
    					</tr>
    					<!--網址2-->
    					<tr>
    						<td colspan="2" class="type" width="100"><img src="../images/cub.png" />Facebook網址<br /><br />&nbsp;&nbsp;&nbsp;<input type="text" size="50" id="url2" value="'.$url['url2'].'" name="url2" placeholder="活動資訊的Facebook網址" /></td>
    					</tr>
						<tr>
							<td colspan="2" class="type" width="100"><img src="../images/cub.png" />附註<br /><br />
							&nbsp;&nbsp;&nbsp;<textarea name="note" id="note" cols="30" id="note"" placeholder="注意事項" rows="4">'.$url['note'].'</textarea></td>
						</tr>';
						/*<tr>
							<td height="100" align="center" valign="middle" bgcolor="#f1f1f1">是否需要開啟【線上報名】與【有誰參加】的功能?<br /><br />';
							if($url['signup'] == 'yes'){
								echo '
									<input type="radio" value="yes" name="signup" checked="checked" />需要&nbsp;&nbsp;<input type="radio" name="signup" value="no" />不需要</td>
								</tr>';
							}
							else if($url['signup'] == 'no'){
								echo '
									<input type="radio" value="yes" name="signup" />需要&nbsp;&nbsp;<input type="radio" name="signup" value="no" checked="checked" />不需要</td>
								</tr>';
							}*/
						echo '
						<tr>
    						<td colspan="2" align="center"><br /><input type="submit" value="" style="background-image:url(../images/bt.png); background-repeat:no-repeat; width:127px; height:41px; cursor:pointer" /></td>
    					</tr></form>
						<tr>
							<td align="center"><form action="index.php?option=type"><input type="submit" class="back" value="返回上頁" /></form></td>
						</tr>
						</table>
					</td>
					</tr>
				</table>
			</div>';
}
//提交資料
	else if($_SESSION['record'] == 'correct'){
		$type = $_POST['type'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$name = $_POST['name'];
		$starttime = $_POST['starttime'];
		$endtime = $_POST["endtime"];
		$extratime = $_POST['extratime'];
		$extratime2 = $_POST['extratime2'];
		$venue = $_POST['venue'];
		$fee = $_POST['fee'];
		$host = $_POST['host'];
		$url1 = $_POST['url1'];
		$url2 = $_POST['url2'];
		$note = $_POST['note'];
		//$signup = $_POST['signup'];
		
		$update = "UPDATE Activities SET type = '$type', title = '$title', description = '$description', name = '$name', starttime = '$starttime', endtime = '$endtime', extratime = '$extratime', extratime2 = '$extratime2', venue = '$venue', fee = '$fee', host = '$host', url1 = '$url1', url2 = '$url2', note = '$note' WHERE rno = ".$url['rno']."";
		//將資料更新至Activities
		if(mysqli_query($conn,$update)){
			$check = "SELECT event".$url['rno']." FROM `List`";
			//判定如果需要使用報名系統
			if($signup == 'yes'){
				//如果已經建立好list的報名名單
				if(mysqli_query($conn, $check)){
					header("location:./index.php?action=poster&option=none");
				}
				//如果尚未建立list的報名名單
				else{
					$newevent = 'ALTER TABLE `List` ADD `event'.$url['rno'].'` VARCHAR( 10 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL';
					$newextra = 'ALTER TABLE `List` ADD `extra'.$url['rno'].'` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL';
					//如果成功建立list資料表
					if(mysqli_query($conn, $newevent) && mysqli_query($conn, $newextra)){
						$_SESSION['option'] = 'none';
						header("location:./index.php?action=poster&option=none");
					}
					//建立list資料表失敗
					else {
						echo "<script type='text/javascript' language='javascript'>alert('系統錯誤!請再試一次'); location.href='share.php?action=update';</script>";
					}
				}
				
			}
			//不需要使用報名系統
			else{
				/*//如果已經建立好資料表就刪除
                if(mysqli_query($conn, $check)){
                    //刪除資料表
                    header("location:./index.php?action=poster&option=none");
                }
                //如果沒有就跳過
                else{
                    header("location:./index.php?action=poster&option=none");
                }*/
                echo "<script type='text/javascript' language='javascript'>window.location.href='index.php?action=poster&option=none';</script>";
                echo "test";
			}
		}
		//提交失敗
		else{
			echo "<script type='text/javascript' language='javascript'>alert('提交失敗!請再試一次'); window.location.href='index.php?action=update';</script>";
		}
	}
	else if($_SESSION['record'] == 'poster'){
		$_SESSION['option'] = 'none';
		echo '
		<div id="img">
			<!--第三部份-->
			<table cellspacing="0" width="918" height="545">
    			<tr>';
				if($url['poster'] == ''){
					echo '<td height="423"></td>';
				}
				else{
					echo'<td height="423" align="center"><img src="../../accounts/images/'.$_SESSION["stu_id"].'/activities/'.$url['poster'].'"</td>';
				}
		echo '
    			</tr>
    			<!--上傳圖片-->
    			<tr align="center">
    				<td><form id="imageform" method="post" enctype="multipart/form-data" action="index.php?action=upload" target="_self"><img src="../images/cub.png" />上傳海報<input type="file" name="photoimg" id="photoimg" placeholder="限jpg檔,大小不可超過1MB" /></td>
				</tr>
				<tr align="center">
					<td align="center"><input type="submit" value="" style="background-image:url(../images/bt2.png); background-repeat:no-repeat; width:127px; height:41px; cursor:pointer" /></form></td>
				</tr>
				<tr>
					<td align="center"><form action="index.php?option=type"><input type="submit" class="back" value="不需更新" /></form></td>
				</tr>
			</table></div>';
	}
	else if($_SESSION['record'] == 'upload'){
		if(!file_exists("../../member/images/".$_SESSION["stu_id"]."/activities"))
            mkdir("../../member/images/".$_SESSION["stu_id"]."/activities", 0777);
		$valid_formats = array("jpg", "JPG");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name)){
				list($txt, $ext) = explode(".", $name);
				if(in_array($ext,$valid_formats)){
					if($size<(1024*1024)){
						//$actual_image_name = $url['rno'].".".$ext;
						//$tmp = $_FILES['photoimg']['tmp_name'];
						if(move_uploaded_file($_FILES['photoimg']['tmp_name'], "../../member/images/".$_SESSION["stu_id"]."/activities/".$url['rno'].".".$ext."")){
							mysqli_query($conn,"UPDATE `Activities`  SET `poster` = '$actual_image_name' WHERE `rno` = '".$_SESSION['rno']."'");
							$_SESSION['record'] = '';
							echo "<script type='text/javascript' language='javascript'>alert('修改成功!'); location.href='index.php?option=type';</script>";
						}
						else{
							echo "<script type='text/javascript' language='javascript'>alert('上傳失敗'); location.href='index.php?action=poster&option=none';</script>";
						}
					}
					else{
						echo "<script type='text/javascript' language='javascript'>alert('圖片不可超過1MB'); location.href='index.php?action=poster&option=none';</script>";
					}
				}
				else{
					echo "<script type='text/javascript' language='javascript'>alert('圖片只限JPG');  location.href='index.php?action=poster&option=none';</script>";
				}
			}
			else{
				echo "<script type=\"text/javascript\" language=\"javascript\">alert('請選擇圖片'); location.href='index.php?action=poster&option=none';</script>";
			}
			exit;
		}
	}
?>