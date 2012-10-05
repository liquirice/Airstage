<?php
	// Last Modified Day : 2012.09.15
	require_once( "../setSession.php" );
	
	if( $_SESSION['auth'] != 2 || !isset($_SESSION['stu_id']) ) {
		echo '<script type="text/javascript">alert("You have no rights to access!"); location.href="../index.php"</script>';	
	} else {
		require_once( "../connectVar.php" );
		$queryFlag = 0;
		
		if( isset($_POST['stu_id_submit']) ) {
			$stu_id = mysqli_real_escape_string( $conn, trim($_POST['stu_id']) );
			$query = "SELECT * FROM Member INNER JOIN member_Info Using(stu_id) WHERE Member.stu_id = '$stu_id'";
			$queryFlag = 1;
		} else if( isset($_POST['name_submit']) ) {
			$name = mysqli_real_escape_string( $conn, trim($_POST['name']) );
			$query = "SELECT * FROM Member INNER JOIN member_Info Using(stu_id) WHERE Member.name = '$name'";
			$queryFlag = 1;
		} else if( isset($_POST['email_submit']) ) {
			$email = mysqli_real_escape_string( $conn, trim($_POST['email']) );
			$query = "SELECT * FROM Member INNER JOIN member_Info Using(stu_id) WHERE Member.email = '$email'";
			$queryFlag = 1;
		} else if( isset($_POST['grade_submit']) ) {
			$grade = mysqli_real_escape_string( $conn, trim($_POST['grade']) );
			$query = "SELECT * FROM Member WHERE grade = '$grade'";
			$queryFlag = 1;
		} else if( isset($_POST['department_submit']) ) {
			$department = mysqli_real_escape_string( $conn, trim($_POST['department']) );
			$query = "SELECT * FROM Member WHERE department = '$department'";
			$queryFlag = 1;
		} else if( isset($_POST['facebook_submit']) ) {
			$facebook = mysqli_real_escape_string( $conn, trim($_POST['facebook']) );
			$query = "SELECT * FROM member_Info INNER JOIN Member Using(stu_id) WHERE member_Info.facebook = '$facebook'";
			$queryFlag = 1;
		}
		
		$result = @mysqli_query( $conn, $query ) /*or die(mysqli_error())*/;
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<link href="tm2.ico" rel="shortcut icon"/>
<meta http-equiv="Content-Type" content=" charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<title>│Airstage 西灣人│管理者介面 - 使用者查詢</title>
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<base target="_parent">
<style type="text/css">
	body,td,th {
		font-family: "微軟正黑體", "Arial";
		font-size: 14px;
	}
	body {
		background-color: #dad9d9;
	}
	.d {
		font-size: 13px;
	}
</style>
</head>

<body>
<div align="center">
	<?php
		require_once( "memberHeader.php" );
	?>
	<div align="center">
		<table border="0" width="980" height="693" cellspacing="0" cellpadding="0" >
	    <tr>
	      <td background="../jpg/bot.png" valign="top"><div align="center">
	        <table border="0" width="98%" cellspacing="0" cellpadding="0" height="761">
	          <tr>
	            <td align="left" valign="top" height="192" colspan="2" background="jpg/top.jpg" width="960">
                	<p align="center"><span style="vertical-align: medium">&nbsp;</span>
                </td>
              </tr>
	          <tr>
	            <td align="left" valign="top" width="30%"><div align="center">
	              <p align="center"><span style="vertical-align: medium">&nbsp;</span></p>
						<?php
							require_once( "memberNavigation.php" );							
						?>
						</div>
						</td>
						<td align="center" valign="top" width="70%">
							<h3>♠ Airstage 管理者介面 - 使用者查詢</h3><br />
							<table class="table table-hover">
							<tbody>
								<tr>
									<td>#</td>
                                    <td><b>選擇查詢模式:</b></td>
                                    <td></td>
								</tr>
                                
								<tr>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-inline">
									<td> 1. </td>
									<td>學號查詢</td>
									<td>
                                        <input type="text" name="stu_id" id="stu_id" class="input-medium search-query" placeholder="B993040017"/>&nbsp;
                                        <button type="submit" name = "stu_id_submit" id = "stu_id_submit" value="Query" class="btn btn-primary"><i class="icon-search icon-white"></i>uery</button>                                                                              
									</td>
                                </form>
								</tr>
                                
                                <tr>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
									<td> 2. </td>
									<td>姓名查詢</td>
									<td>										
                                        <input type="text" name="name" id="name" class="input-medium search-query" placeholder="江緯宸"/>&nbsp;
                                        <button type="submit" name = "name_submit" id = "name_submit" class="btn btn-info"><i class="icon-search icon-white"></i>uery</button>                                                                
									</td>
                                </form>
								</tr>
								
                                <tr>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
									<td> 3. </td>
									<td>Email查詢</td>
									<td>										
                                        <input type="text" name="email" id="email" class="input-medium search-query" placeholder="archerwindy@gmail.com"/>&nbsp;
                                        <button type="submit" name = "email_submit" id = "email_submit" class="btn btn-success"><i class="icon-search icon-white"></i>uery</button>                                       
									</td>
                                </form>
								</tr>
                                
                                <tr>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="navbar-form pull-left">
									<td> 4. </td>
									<td>Facebook查詢</td>
									<td>										
                                        <input type="text" name="facebook" id="facebook" class="input-medium search-query" placeholder="facebook URL""/>&nbsp;
                                        <button type="submit" name = "facebook_submit" id = "facebook_submit" class="btn btn-success"><i class="icon-search icon-white"></i>uery</button>                                                                               
									</td>
                                </form>                                                              
								</tr> 
                                
                                <tr>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
									<td> 5. </td>
									<td>級次查詢</td>
									<td>									
                                        <input type="text" name="grade" id="grade" class="input-medium search-query" placeholder="103"/>&nbsp;
                                        <button type="submit" name = "grade_submit" id = "grade_submit" class="btn btn-danger"><i class="icon-search icon-white"></i>uery</button>                                                                            
									</td>
                                </form>
								</tr>
                                
                                <tr>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
									<td> 6. </td>
									<td>系所查詢</td>
									<td>										
                                        <input type="text" name="department" id="department" class="input-medium search-query" placeholder="資工系"/>&nbsp;
                                        <button type="submit" name = "department_submit" id = "department_submit" class="btn btn-danger"><i class="icon-search icon-white"></i>uery</button>                                       
									</td>
                                </form>
								</tr>                                                          
                                
                                 		
							</table>																														
                            
                            <table class="table table-hover"> 
                            	<tbody>                      
                                <?php
									// Fetch the data out.
                                    if( @mysqli_num_rows($result) == 0 && $queryFlag == 1 ) {
										echo '<div class="alert alert-error fade in">Error! No Such Result!<button type="button" class="close" data-dismiss="alert">&times;</button></div>';	
									} else {
										if( isset($_POST['stu_id_submit']) || isset($_POST['name_submit']) 
										  || isset($_POST['email_submit']) || isset($_POST['facebook_submit']) ) {
											$row = mysqli_fetch_array( $result );
								?>                                	 
                    			
                                	<div class="alert alert-success fade in">
                                		<button type=button class="close" data-dismiss="alert">&times;</button><strong>Query Success!</strong>
                                	</div>
                                			
                                	
                                	<tr>
                                		<td> * </td>
                                		<td>學號</td>
										<td><?php echo $row['stu_id'];?></td>
                                    </tr>
                                    <tr>
                                		<td> * </td>                                		
                                		<td>帳號</td>
                                		<td><?php echo $row['username'];?></td>
                                    </tr>
                                    <tr>
                                		<td> * </td>
                                		<td>姓名</td>                                		
										<td><?php echo $row['name'].'&nbsp;&nbsp;'.$row['gender'];?></td>
                                    </tr>                                                                
                                    <tr>
                                		<td> * </td>
                                		<td>系級</td>
										<td><?php echo $row['department'].'&nbsp;&nbsp;'.$row['grade'];?></td>
                                    </tr>
                                    <tr>
                                		<td> * </td>                                		
                                		<td>家鄉</td>
										<td><?php echo $row['home'];?></td>
                                    </tr>
                                    <tr>
                                		<td> * </td>                                		
                                		<td>宿舍狀況</td>
										<td><?php echo $row['dorm'].'&nbsp;&nbsp;'.$row['room']; ?></td>
                                    </tr>
                                    <tr>
                                		<td> * </td>                                		
                                		<td>校外住址</td>
										<td><?php echo $row['outAddr'];?></td>
                                    </tr>
                                    <tr>
                                		<td> * </td>                                		
                                		<td>Email</td>
										<td><?php echo $row['email'];?></td>
                                    </tr>
                                    <tr>
                                		<td> * </td>                                		
                                		<td>Facebook</td>
										<td><?php echo $row['facebook'];?></td>
                                    </tr>
                                    <tr>
                                		<td> * </td>                                		
                                		<td>MSN</td>
										<td><?php echo $row['msn'];?></td>
                                    </tr>
                                    <tr>
                                		<td> * </td>                                		
                                		<td>Twitter</td>
										<td><?php echo $row['twitter'];?></td>
                                    </tr>
                                    <tr>
                                		<td> * </td>                                		
                                		<td>Plurk</td>
										<td><?php echo $row['plurk'];?></td>
                                    </tr>
                                    <tr>
                                		<td> * </td>                                		
                                		<td>Skype</td>
										<td><?php echo $row['skype'];?></td>
                                    </tr>
                                    <tr>
                                		<td> * </td>                                		
                                		<td>Phone</td>
										<td><?php echo $row['phone'];?></td>
                                    </tr>
                                    <tr>
                                		<td> * </td>                                		
                                		<td>Authen</td>
										<td><?php echo $row['AUTH'];?></td>
                                    </tr>
                                    
                                 <?php                                           																			
										} else if( isset($_POST['grade_submit']) || isset($_POST['department_submit']) ) {
											echo '
											<thead>
							                	<tr>
							                		<th> # </th>
							                		<th>學號</th>
							                		<th>系所</th>
							                		<th>級次</th>
							                		<th>姓名</th>
							                		<th>性別</th>
							                		<th>Email</th>
							                		<th>權限</th>
							                	</tr>
							                </thead>
							                <div class="alert alert-success fade in">Query Success!<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
											while( $row = mysqli_fetch_array( $result ) ) {
								 ?>   
				                           
                             		<tr>
                                		<td> * </td>
                                		<td><?php echo $row['stu_id']; ?></td>
                                        <td><?php echo $row['department'];?></td>
										<td><?php echo $row['grade'];?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['gender'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td><?php echo $row['AUTH'];?></td>
                               	 	</tr>
                                 <?php	
								 				
											}
										} 
									}								 
								 ?> 
							</tbody>                                   
							</table>                                              
						</td>
					</tr>
				</table>               
                
				<p><span style="vertical-align: medium">&nbsp;</span></p>
				<p><span style="vertical-align: medium">&nbsp;</span></p>
				<p><span style="vertical-align: medium">&nbsp;</span></div>
			</td>
		</tr>
	</table>
</div>

<?php mysqli_close( $conn ); ?>

<script src = "assets/js/bootstrap-modal.js"></script>
<script src = "assets/js/jquery.js"></script>
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
</body>
</html>