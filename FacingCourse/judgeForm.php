<?php
	require_once( "setSession.php" );
	require_once( "DepartmentParse.php" );
	require_once( "../connectVar.php" );
	
	if( !isset($_SESSION['name']) || !isset($_SESSION['stu_id']) || !isset($_SESSION['auth']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("請先登入會員才能評鑑喔！"); location.href="index.php";</script>';
	} else {
		$stu_id = $_SESSION['stu_id'];
		$course_id = mysqli_real_escape_string( $conn, trim($_GET['id']) );
		$query = "SELECT commenter FROM commentdetail WHERE commenter = '$stu_id' AND course_id = '$course_id'";
		$result = mysqli_query( $conn, $query ) or die('Check Error');
		
		if( mysqli_num_rows($result) != 0 ) {
			echo '<script type="text/javascript">alert("您已經對該課程評鑑過囉！"); location.href="courseDetail.php?id=' . $course_id . '";</script>';
		}
	
	
		if( isset($_POST['sendRanking']) ) {
			$course_id = mysqli_real_escape_string( $conn, trim($_POST['courseID']) );		
			$teach = mysqli_real_escape_string( $conn, trim($_POST['teach_result']) );
			$test = mysqli_real_escape_string( $conn, trim($_POST['test_result']) );
			$practical = mysqli_real_escape_string( $conn, trim($_POST['practical_result']) );
			$TA = mysqli_real_escape_string( $conn, trim($_POST['TA_result']) );
			$homework = mysqli_real_escape_string( $conn, trim($_POST['homework_result']) );
			$roll = mysqli_real_escape_string( $conn, trim($_POST['roll_result']) );
			$nutrition = mysqli_real_escape_string( $conn, trim($_POST['nutrition_result']) );
			$sign = mysqli_real_escape_string( $conn, trim($_POST['sign_result']) );
			$grade = mysqli_real_escape_string( $conn, trim($_POST['grade_result']) );
			$time = mysqli_real_escape_string( $conn, trim($_POST['time_result']) );
			$commit = mysqli_real_escape_string( $conn, trim($_POST['description']) );
			
			if( $teach == "" || $test == "" || $practical == "" || $TA == "" || $homework == "" || $roll == "" || $nutrition == "" || $sign == "" || $grade == "" ||
				$commit == "" || $time == "" ) {
				echo '<script type="text/javascript">alert("有欄位沒有完成填寫喔！請重新填寫。"); </script>';
			} else {
				// Step 1 : Check the user have been commit before or not.
				$query = "SELECT commenter FROM commentdetail WHERE commenter = '$stu_id' AND course_id = '$course_id'";
				$result = mysqli_query( $conn, $query ) or die('Check Error');
				
				if( mysqli_num_rows($result) != 0 ) {
					echo '<script type="text/javascript">alert("您已經對該課程評鑑過囉！"); location.href="index.php";</script>';
				} else {
					// Step 2 : Compute the average of the total for each part and insert into the CourseDetail.
					
					// Insert into the CommentDetail.
					$query = "INSERT INTO commentdetail(course_id, commenter, teach_q, time_c, sign_d, test_d, homework_d, grade_d, " . 
							 "TA_r, practical_r, rollCall_r, nutrition_r, date, time, description) " . 
							 "VALUES('$course_id', '$stu_id', '$teach', '$time', '$sign', '$test', '$homework', '$grade', '$TA', '$practical', '$roll', '$nutrition', CURDATE(), CURTIME()" .
							 ", '$commit')";
					$result = mysqli_query( $conn, $query ) or die('Insert Error'); 
					
					// Average for each part and insert into the CourseDetail for current display.
					$query = "SELECT SUM(teach_q) AS teach,SUM(time_c) AS time,SUM(sign_d) AS sign,SUM(test_d) AS test,SUM(homework_d) AS homework, " .
					 		 "SUM(grade_d) AS grade,SUM(TA_r) AS TA,SUM(practical_r) AS practical,SUM(rollCall_r) AS roll,SUM(nutrition_r) AS nutrition, " .
					 		 "COUNT(course_id) AS total, current_rank, judge_people " . 
							 "FROM commentdetail INNER JOIN coursedetail Using(course_id)" . 
							 "WHERE course_id = '$course_id' AND coursedetail.course_id = '$course_id'";
					$result = mysqli_query( $conn, $query ) or die('total Error');
					$sum = mysqli_fetch_array( $result );
					
					$teachAvg = ($sum['teach']+50) / ($sum['total']+1);
					$timeAvg = ($sum['time']+50) / ($sum['total']+1);
					$signAvg = ($sum['sign']+50) / ($sum['total']+1);
					$testAvg = ($sum['test']+50) / ($sum['total']+1);
					$homeworkAvg = ($sum['homework']+50) / ($sum['total']+1);
					$gradeAvg = ($sum['grade']+50) / ($sum['total']+1);
					$TAAvg = ($sum['TA']+50) / ($sum['total']+1);
					$practicalAvg = ($sum['practical']+50) / ($sum['total']+1);
					$rollAvg = ($sum['roll']+50) / ($sum['total']+1);
					$nutritionAvg = ($sum['nutrition']+50) / ($sum['total']+1);
					
					// For rank.
					$Pasitive = $teach + $practical + $TA + $nutrition + $roll;
					$Negative = $test + $homework + $grade + $time + $sign;					
					
					$test = 100 - $test;
					$homework = 100 - $homework;
					$grade = 100 - $grade;
					$time = 100 - $time;
					$sign = 100 - $sign;
					
					$total = ($Pasitive + $test + $homework + $grade + $time + $sign) / 100;
					
					if( $Negative >= $Pasitive ) {
						$rank = $sum['current_rank'] - $total;
					} else {
						$rank = $sum['current_rank'] + $total;
					}
					
					$people = $sum['judge_people'] + 1;
					
					// Insert once to complete two changes.
					$query = "UPDATE coursedetail SET current_rank = '$rank', teach_quality = '$teachAvg', time_cost = '$timeAvg', sign_dif = '$signAvg', " .
							 "test_dif = '$testAvg', homework_dif = '$homeworkAvg', grade_dif = '$gradeAvg', TA_rank = '$TAAvg', practical_rank = '$practicalAvg', " . 
							 "roll_freq = '$rollAvg', nutrition_rank = '$nutritionAvg', judge_people = '$people' WHERE course_id = '$course_id'";
					$result = mysqli_query( $conn, $query ) or die('Update Error');
					
					echo "<script type='text/javascript'>alert('評鑑完成！'); location.href='courseDetail.php?id=$course_id';</script>";
				}		
			}	
		}
		
		if( !isset($_POST['sendRanking']) ) {
			$course_id = mysqli_real_escape_string( $conn, trim($_GET['id']) );	
		}
	
		// Course Detail.
		$query = "SELECT * FROM coursedetail WHERE course_id = '$course_id'";
		$result = mysqli_query( $conn, $query ) or die('id Error');
		
		if( mysqli_num_rows($result) == 0 ) {
			// Direct To Error Page.
		} else {
			$row = mysqli_fetch_array( $result );
		}
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Facing Course - Judge Form</title>
	<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="css/docs.css" rel="stylesheet" type="text/css" media="screen" />
	<style>
		h4, h3,h2, table, tr, td, li, ul, th, p, select {
			font-family: "微軟正黑體", "Arial";
		}
		b {
			color: #007daa;
		}
		textarea {
			width: 98%;
			height: 350px;
		}
	</style>
	
	<script type="text/javascript">
	
		function send_value( id ,rate ){
			$(id).attr("value",rate*10);				
		}
	
	</script>
</head>
<body>

<?php
	require_once( "CourseNavi.php" );
?>

<div id="wrapper">
	<?php
		require_once( "headerAndZigzag.php" );
	?>
	
	<div id="page">
	<!-- Form start here -->
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="post">	
			<h2 class="title"><img src="img/pad.png" /> &nbsp;評鑑表單 - <?php echo $row['course_nameEN']; ?> - <?php echo $row['course_nameCH']; ?></h2>
			<a href="#" class="thumbnail">
                <img src="img/pics01.jpg" width="820" height="250" alt="" />
            </a>
			<br />
			
			<input type="hidden" value="<?php echo $course_id; ?>" name="courseID" />
			
			<!-- Warning Area -->
			<div class="alert alert-warning fade in" style="font-family: '微軟正黑體', 'Arial';">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>為了保障評分公信度, 每個人對每一門課只能評鑑一次喔!</strong>  <br />
				<strong>每一項均為必填欄位，包含細部評分，造成不便敬請見諒。</strong>
			</div>
			
			<table class="table table-striped">
				<tr>
					<td><i class="icon-book"></i> <b>課程名稱</b> : <?php echo $row['course_nameCH']; ?></td>
					<td><i class="icon-globe"></i> <b>系所名稱</b> : <?php DepartmentParse( $row['course_department'] ); ?></td>
				</tr>
				<tr>
					<td><i class="icon-tag"></i> <b>開課年級</b> : <?php switch( $row['course_grade'] ) {
		                  	case 1: echo '一年級'; break;
		                  	case 2: echo '二年級'; break;
		                  	case 3: echo '三年級'; break;
		                  	case 4: echo '四年級'; break;
		                  	case 5: echo '碩士班'; break;
	                  	}?>
	                </td>
					<td><i class="icon-user"></i> <b>教授姓名</b> : <?php echo $row['professor']; ?></td>
				</tr>
				<tr>
					<td><i class="icon-bookmark"></i> <b>課程學分</b> : <?php echo $row['unit']; ?></td>
					<td><i class="icon-edit"></i> <b>評分人數</b> : <?php echo $row['judge_people']; ?></td>
				</tr>
			</table>		
		</div>
		
		<div id="two-column">
			<div id="column1">
				<ul class="list-style1">
					<li class="first">
						<i class="icon-shopping-cart"></i> <b>教材與講授品質</b> : 
						<br /><br />
						<div class="btn-group" data-toggle="buttons-radio">
						  <button type="button" class="btn btn-danger" onClick="send_value(teach_result,1)" autofocus>1</button>
						  <button type="button" class="btn btn-danger" onClick="send_value(teach_result,2)">2</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(teach_result,3)">3</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(teach_result,4)">4</button>
						  <button type="button" class="btn btn-success" onClick="send_value(teach_result,5)">5</button>
						  <button type="button" class="btn btn-success" onClick="send_value(teach_result,6)">6</button>
						  <button type="button" class="btn btn-info" onClick="send_value(teach_result,7)">7</button>
						  <button type="button" class="btn btn-info" onClick="send_value(teach_result,8)">8</button>
						  <button type="button" class="btn btn-info" onClick="send_value(teach_result,9)">9</button>
						  <button type="button" class="btn btn-info" onClick="send_value(teach_result,10)">10</button>					
						</div>				
						<input type="hidden" value="" id="teach_result" name="teach_result"/>	
						
						<br />						
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>教材準備與上課品質，愈大愈優異。
						</div>
					</li>
					<li>
						<i class="icon-resize-small"></i> <b>課程實用度</b> : 
						<br /><br />
						<div class="btn-group" data-toggle="buttons-radio">
						  <button type="button" class="btn btn-danger" onClick="send_value(practical_result,1)">1</button>
						  <button type="button" class="btn btn-danger" onClick="send_value(practical_result,2)">2</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(practical_result,3)">3</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(practical_result,4)">4</button>
						  <button type="button" class="btn btn-success" onClick="send_value(practical_result,5)">5</button>
						  <button type="button" class="btn btn-success" onClick="send_value(practical_result,6)">6</button>
						  <button type="button" class="btn btn-info" onClick="send_value(practical_result,7)">7</button>
						  <button type="button" class="btn btn-info" onClick="send_value(practical_result,8)">8</button>
						  <button type="button" class="btn btn-info" onClick="send_value(practical_result,9)">9</button>
						  <button type="button" class="btn btn-info" onClick="send_value(practical_result,10)">10</button>					
						</div>				
						<input type="hidden" value="" id="practical_result" name="practical_result"/>	
						
						<br />						
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>該課程的應用與實用程度，愈大愈實用。
						</div>
					</li>
					<li>
						<i class="icon-list"></i> <b>助教強度</b> : 
						<br /><br />
						<div class="btn-group" data-toggle="buttons-radio">
						  <button type="button" class="btn btn-danger" onClick="send_value(TA_result,1)">1</button>
						  <button type="button" class="btn btn-danger" onClick="send_value(TA_result,2)">2</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(TA_result,3)">3</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(TA_result,4)">4</button>
						  <button type="button" class="btn btn-success" onClick="send_value(TA_result,5)">5</button>
						  <button type="button" class="btn btn-success" onClick="send_value(TA_result,6)">6</button>
						  <button type="button" class="btn btn-info" onClick="send_value(TA_result,7)">7</button>
						  <button type="button" class="btn btn-info" onClick="send_value(TA_result,8)">8</button>
						  <button type="button" class="btn btn-info" onClick="send_value(TA_result,9)">9</button>
						  <button type="button" class="btn btn-info" onClick="send_value(TA_result,10)">10</button>					
						</div>				
						<input type="hidden" value="" id="TA_result" name="TA_result"/>	
						
						<br />						
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>助教的能力與表現，愈大愈強。
						</div>
					</li>
					<li>
						<i class="icon-leaf"></i> <b>開放程度</b> : 
						<br /><br />
						<div class="btn-group" data-toggle="buttons-radio">
						  <button type="button" class="btn btn-danger" onClick="send_value(nutrition_result,1)">1</button>
						  <button type="button" class="btn btn-danger" onClick="send_value(nutrition_result,2)">2</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(nutrition_result,3)">3</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(nutrition_result,4)">4</button>
						  <button type="button" class="btn btn-success" onClick="send_value(nutrition_result,5)">5</button>
						  <button type="button" class="btn btn-success" onClick="send_value(nutrition_result,6)">6</button>
						  <button type="button" class="btn btn-info" onClick="send_value(nutrition_result,7)">7</button>
						  <button type="button" class="btn btn-info" onClick="send_value(nutrition_result,8)">8</button>
						  <button type="button" class="btn btn-info" onClick="send_value(nutrition_result,9)">9</button>
						  <button type="button" class="btn btn-info" onClick="send_value(nutrition_result,10)">10</button>					
						</div>				
						<input type="hidden" value="" id="nutrition_result" name="nutrition_result"/>	
						
						<br />						
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>上課緊繃與學期修課沈重度，愈大愈輕鬆。
						</div>
					</li>
					<li>
						<i class="icon-tint"></i> <b>點名頻率</b> : 
						<br /><br />
						<div class="btn-group" data-toggle="buttons-radio">
						  <button type="button" class="btn btn-danger" onClick="send_value(roll_result,1)">1</button>
						  <button type="button" class="btn btn-danger" onClick="send_value(roll_result,2)">2</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(roll_result,3)">3</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(roll_result,4)">4</button>
						  <button type="button" class="btn btn-success" onClick="send_value(roll_result,5)">5</button>
						  <button type="button" class="btn btn-success" onClick="send_value(roll_result,6)">6</button>
						  <button type="button" class="btn btn-info" onClick="send_value(roll_result,7)">7</button>
						  <button type="button" class="btn btn-info" onClick="send_value(roll_result,8)">8</button>
						  <button type="button" class="btn btn-info" onClick="send_value(roll_result,9)">9</button>
						  <button type="button" class="btn btn-info" onClick="send_value(roll_result,10)">10</button>					
						</div>				
						<input type="hidden" value="" id="roll_result" name="roll_result"/>	
						
						<br />						
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>上課時的點名頻率，愈大愈高。
						</div>
					</li>
				</ul>
			</div>
			<div id="column2">
				<ul class="list-style1">
					<li class="first">
						<i class="icon-text-height"></i> <b>考試難度</b> : 
						<br /><br />
						<div class="btn-group" data-toggle="buttons-radio">
						  <button type="button" class="btn btn-danger" onClick="send_value(test_result,1)">1</button>
						  <button type="button" class="btn btn-danger" onClick="send_value(test_result,2)">2</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(test_result,3)">3</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(test_result,4)">4</button>
						  <button type="button" class="btn btn-success" onClick="send_value(test_result,5)">5</button>
						  <button type="button" class="btn btn-success" onClick="send_value(test_result,6)">6</button>
						  <button type="button" class="btn btn-info" onClick="send_value(test_result,7)">7</button>
						  <button type="button" class="btn btn-info" onClick="send_value(test_result,8)">8</button>
						  <button type="button" class="btn btn-info" onClick="send_value(test_result,9)">9</button>
						  <button type="button" class="btn btn-info" onClick="send_value(test_result,10)">10</button>					
						</div>				
						<input type="hidden" value="" id="test_result" name="test_result"/>	
						
						<br />						
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>該課程考試的難度，愈大愈難。
						</div>
					</li>
					<li>
						<i class="icon-pencil"></i> <b>作業難度</b> : 
						<br /><br />
						<div class="btn-group" data-toggle="buttons-radio">
						  <button type="button" class="btn btn-danger" onClick="send_value(homework_result,1)">1</button>
						  <button type="button" class="btn btn-danger" onClick="send_value(homework_result,2)">2</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(homework_result,3)">3</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(homework_result,4)">4</button>
						  <button type="button" class="btn btn-success" onClick="send_value(homework_result,5)">5</button>
						  <button type="button" class="btn btn-success" onClick="send_value(homework_result,6)">6</button>
						  <button type="button" class="btn btn-info" onClick="send_value(homework_result,7)">7</button>
						  <button type="button" class="btn btn-info" onClick="send_value(homework_result,8)">8</button>
						  <button type="button" class="btn btn-info" onClick="send_value(homework_result,9)">9</button>
						  <button type="button" class="btn btn-info" onClick="send_value(homework_result,10)">10</button>					
						</div>				
						<input type="hidden" value="" id="homework_result" name="homework_result"/>	
						
						<br />						
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>該課程作業的難度，愈大愈難。
						</div>
					</li>
					<li>
						<i class="icon-hand-up"></i> <b>得分難度</b> : 
						<br /><br />
						<div class="btn-group" data-toggle="buttons-radio">
						  <button type="button" class="btn btn-danger" onClick="send_value(grade_result,1)">1</button>
						  <button type="button" class="btn btn-danger" onClick="send_value(grade_result,2)">2</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(grade_result,3)">3</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(grade_result,4)">4</button>
						  <button type="button" class="btn btn-success" onClick="send_value(grade_result,5)">5</button>
						  <button type="button" class="btn btn-success" onClick="send_value(grade_result,6)">6</button>
						  <button type="button" class="btn btn-info" onClick="send_value(grade_result,7)">7</button>
						  <button type="button" class="btn btn-info" onClick="send_value(grade_result,8)">8</button>
						  <button type="button" class="btn btn-info" onClick="send_value(grade_result,9)">9</button>
						  <button type="button" class="btn btn-info" onClick="send_value(grade_result,10)">10</button>					
						</div>				
						<input type="hidden" value="" id="grade_result" name="grade_result"/>	
						
						<br />						
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>取得高分總成績的難度，愈大愈難高分。
						</div>						
					</li>
					<li>
						<i class="icon-refresh"></i> <b>耗時程度</b> : 
						<br /><br />
						<div class="btn-group" data-toggle="buttons-radio">
						  <button type="button" class="btn btn-danger" onClick="send_value(time_result,1)">1</button>
						  <button type="button" class="btn btn-danger" onClick="send_value(time_result,2)">2</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(time_result,3)">3</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(time_result,4)">4</button>
						  <button type="button" class="btn btn-success" onClick="send_value(time_result,5)">5</button>
						  <button type="button" class="btn btn-success" onClick="send_value(time_result,6)">6</button>
						  <button type="button" class="btn btn-info" onClick="send_value(time_result,7)">7</button>
						  <button type="button" class="btn btn-info" onClick="send_value(time_result,8)">8</button>
						  <button type="button" class="btn btn-info" onClick="send_value(time_result,9)">9</button>
						  <button type="button" class="btn btn-info" onClick="send_value(time_result,10)">10</button>					
						</div>				
						<input type="hidden" value="" id="time_result" name="time_result"/>	
						
						<br />						
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>所花費時間比例，愈大愈耗時。
						</div>
					</li>
					
					<li>
						<i class="icon-ok-circle"></i> <b>加簽難度</b> : 
						<br /><br />
						<div class="btn-group" data-toggle="buttons-radio">
						  <button type="button" class="btn btn-danger" onClick="send_value(sign_result,1)">1</button>
						  <button type="button" class="btn btn-danger" onClick="send_value(sign_result,2)">2</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(sign_result,3)">3</button>
						  <button type="button" class="btn btn-warning" onClick="send_value(sign_result,4)">4</button>
						  <button type="button" class="btn btn-success" onClick="send_value(sign_result,5)">5</button>
						  <button type="button" class="btn btn-success" onClick="send_value(sign_result,6)">6</button>
						  <button type="button" class="btn btn-info" onClick="send_value(sign_result,7)">7</button>
						  <button type="button" class="btn btn-info" onClick="send_value(sign_result,8)">8</button>
						  <button type="button" class="btn btn-info" onClick="send_value(sign_result,9)">9</button>
						  <button type="button" class="btn btn-info" onClick="send_value(sign_result,10)">10</button>					
						</div>				
						<input type="hidden" value="" id="sign_result" name="sign_result"/>	
						
						<br />						
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>該課程加簽難度，愈大愈難。
						</div>
					</li>
				</ul>
			</div>
		</div>
		<br />
		<textarea name="description" placeholder="對該課程細部評價（匿名呈現）" ><?php if(isset($commit)) echo $commit; ?></textarea>
		<br />
		<button class="btn btn-large btn-block btn-primary" type="submit" name="sendRanking" data-loading-text="Loading...">Send Ranking - 送出評鑑</button>
	</div>
	</form>
	<!-- End Form -->
	
	<div id="about">
		<h2 class="title">Current Rank</h2>
		<i class="icon-ok"></i> <b>目前總評分<b> :<br /><br />
		<div class="progress progress-danger progress-striped active">
			<div class="bar" style="width: <?php echo ($row['current_rank']/24); ?>%;"><?php echo "Rank - " . $row['current_rank']." - "; echo sprintf("%.2f", ($row['current_rank']/24)); echo "%"; ?></div>
		</div>
	</div>
	
</div>

<?php
	require_once( "CourseFooter.php" );
	require_once( "scriptInclude.php" );
?>

</body>
</html>
