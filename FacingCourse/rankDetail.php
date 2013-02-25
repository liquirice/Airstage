<?php
	// Don't need to login before viewing.
	require_once( "setSession.php" );
	require_once( "DepartmentParse.php" );
	require_once( "../connectVar.php" );
	
	// New Comments.
	$query = "SELECT date, time, course_id, current_rank, course_nameCH , course_department " .
			 "FROM commentdetail INNER JOIN coursedetail Using(course_id) " .
			 "ORDER BY date DESC, time DESC " . 
			 "LIMIT 0 , 8";
	$newComment = mysqli_query( $conn, $query ) or die('Commit Error');
	
	// Positive.
	$query = "SELECT course_nameCH, course_department, teach_quality, course_id " . 
			 "FROM coursedetail ORDER BY teach_quality DESC LIMIT 0, 11";
	$topTeach = mysqli_query( $conn, $query ) or die('Teach Error');
	
	$query = "SELECT course_nameCH, course_department, practical_rank, course_id " . 
			 "FROM coursedetail ORDER BY practical_rank DESC LIMIT 0, 11";
	$topPractical = mysqli_query( $conn, $query ) or die('Practical Error');
	
	$query = "SELECT course_nameCH, course_department, TA_rank, course_id " . 
			 "FROM coursedetail ORDER BY TA_rank DESC LIMIT 0, 11";
	$topTA = mysqli_query( $conn, $query ) or die('TA Error');
	
	$query = "SELECT course_nameCH, course_department, nutrition_rank, course_id " . 
			 "FROM coursedetail ORDER BY nutrition_rank DESC LIMIT 0, 11";
	$topNutrition = mysqli_query( $conn, $query ) or die('Nutrition Error');
	
	$query = "SELECT course_nameCH, course_department, roll_freq, course_id " . 
			 "FROM coursedetail ORDER BY roll_freq DESC LIMIT 0, 11";
	$topRoll = mysqli_query( $conn, $query ) or die('Roll Error');
	
	// Down.
	$query = "SELECT course_nameCH, course_department, test_dif, course_id " . 
			 "FROM coursedetail ORDER BY test_dif DESC LIMIT 0, 11";
	$topTest = mysqli_query( $conn, $query ) or die('Test Error');
	
	$query = "SELECT course_nameCH, course_department, homework_dif, course_id " . 
			 "FROM coursedetail ORDER BY homework_dif DESC LIMIT 0, 11";
	$topHomework = mysqli_query( $conn, $query ) or die('Homework Error');
	
	$query = "SELECT course_nameCH, course_department, grade_dif, course_id " . 
			 "FROM coursedetail ORDER BY grade_dif DESC LIMIT 0, 11";
	$topGrade = mysqli_query( $conn, $query ) or die('Grade Error');
	
	$query = "SELECT course_nameCH, course_department, time_cost, course_id " . 
			 "FROM coursedetail ORDER BY time_cost DESC LIMIT 0, 11";
	$topTime = mysqli_query( $conn, $query ) or die('Time Error');
	
	$query = "SELECT course_nameCH, course_department, sign_dif, course_id " . 
			 "FROM coursedetail ORDER BY sign_dif DESC LIMIT 0, 11";
	$topSign = mysqli_query( $conn, $query ) or die('Roll Error');
	
	
	// Total Statistic
	$query = "SELECT COUNT(comment_id) AS total FROM commentdetail";
	$total = mysqli_query( $conn, $query ) or die('total Error');
	$totalCount = mysqli_fetch_array( $total );
	
	function PasitiveColor( $value ) {
		if( ($value > 75) && ($value <= 100) ) {
			echo 'inverse';
		} else if( ($value <= 75) && ($value > 50) ) {
			echo 'info';
		} else if( ($value <= 50) && ($value > 25) ) {
			echo 'success';
		} else {
			echo 'warning';
		}
	}
	
	function NegativeColor( $value ) {
		if( ($value > 75) && ($value <= 100) ) {
			echo 'danger';
		} else if( ($value <= 75) && ($value > 50) ) {
			echo 'warning';
		} else if( ($value <= 50) && ($value > 25) ) {
			echo 'success';
		} else {
			echo 'inverse';
		}
	}
	
	function RankColor( $value ) {
		if( ($value <= 2400) && ($value > 1920) ) {
			echo 'inverse';
		} else if( ($value <= 1920) && ($value > 1440) ) {
			echo 'info';
		} else if( ($value <= 1440) && ($value > 960) ) {
			echo 'success';
		} else if( ($value <= 960) && ($value > 480) ) {
			echo 'warning';
		} else {
			echo 'dnager';
		}
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" ><head>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Ranking Area</title>
	<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="css/docs.css" rel="stylesheet" type="text/css" media="screen" />
	<style>
		h4, h3, h2, table, tr, td, li, ul, th, select, a, p {
			font-family:微軟正黑體, Arial;
		}
	</style>
	
	<script language="javascript">
		setTimeout("self.location.reload();",120000);
	</script> 
	
</head>
<body>

<?php
	require_once( "CourseNavi.php" );
?>

<div id="wrapper" >
	<?php
		require_once( "headerAndZigzag.php" );
	?>

	<div id="page" >
		<div class="post" >
			<h2 class="title" ><img src="img/notebook.png" /> &nbsp;Ranking Area</h2>
						
			<!-- Warning Area -->
			<div class="alert alert-info fade in" style="font-family:微軟正黑體, Arial; " >
				<button type="button" class="close" data-dismiss="alert" >×</button>
				<strong>Attention!</strong> 此頁面提供各項更細部的課程排比以供各位同學參考。細項將陸續增加。
			</div>
			
			<h3>The New Comments</h3>
			<p>
				<?php
					$counter = 1;
					while( $row = mysqli_fetch_array($newComment) ) {
				?>
					<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"># <?php echo $counter;?>
					- <?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a>
					- <span class="label label-info"><?php echo $row['date']; ?></span> - <span class="label label-success"><?php echo $row['time']; ?></span><br /><br />
					<div class="progress progress-<?php RankColor( $row['current_rank'] ); ?> progress-striped active">
						<div class="bar" style="width: <?php echo ($row['current_rank']/24); ?>%;">
							<?php echo $row['current_rank']." - "; echo sprintf("%.2f", ($row['current_rank']/24)); echo "%"; ?>
						</div>
					</div>
				<?php
						$counter++;
					}
				?>
			</p>
			
			<br />
			<h3>Detail Ranking <font color="red">TOP 10</font></h3>
			<div class="tabbable">
			  <ul class="nav nav-tabs">
			    <li class="active"><a href="#tab1" data-toggle="tab">教材與講授品質</a></li>
			    <li><a href="#tab3" data-toggle="tab">課程實用度</a></li>
			    <li><a href="#tab2" data-toggle="tab">助教強度</a></li>
			    <li><a href="#tab4" data-toggle="tab">開放程度</a></li>
			    <li><a href="#tab5" data-toggle="tab">點名頻率</a></li>			 
			  </ul>
			  <div class="tab-content">
			    <div class="tab-pane active" id="tab1">
			      <div id="two-column">
			      	<div id="column1" >
			      	<?php
			      		$counter = 1;
			      		while( $row = mysqli_fetch_array($topTeach) ) {
				      		if( $counter == 6 ) break;
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['teach_quality'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['teach_quality']; ?>%;"><?php echo $row['teach_quality']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      	<div id="column2" >
			      	<?php
			      		while( $row = mysqli_fetch_array($topTeach) ) {
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['teach_quality'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['teach_quality']; ?>%;"><?php echo $row['teach_quality']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      </div>
			    </div>
			    <div class="tab-pane" id="tab2">
			      <div id="two-column">
			      	<div id="column1" >
			      	<?php
			      		$counter = 1;
			      		while( $row = mysqli_fetch_array($topTA) ) {
				      		if( $counter == 6 ) break;
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['TA_rank'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['TA_rank']; ?>%;"><?php echo $row['TA_rank']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      	<div id="column2" >
			      	<?php
			      		while( $row = mysqli_fetch_array($topTA) ) {
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['TA_rank'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['TA_rank']; ?>%;"><?php echo $row['TA_rank']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      </div>
			    </div>
			    <div class="tab-pane" id="tab3">
			      <div id="two-column">
			      	<div id="column1" >
			      	<?php
			      		$counter = 1;
			      		while( $row = mysqli_fetch_array($topPractical) ) {
				      		if( $counter == 6 ) break;
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['practical_rank'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['practical_rank']; ?>%;"><?php echo $row['practical_rank']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      	<div id="column2" >
			      	<?php
			      		while( $row = mysqli_fetch_array($topPractical) ) {
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['practical_rank'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['practical_rank']; ?>%;"><?php echo $row['practical_rank']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      </div>
			    </div>
			    <div class="tab-pane" id="tab4">
			      <div id="two-column">
			      	<div id="column1" >
			      	<?php
			      		$counter = 1;
			      		while( $row = mysqli_fetch_array($topNutrition) ) {
				      		if( $counter == 6 ) break;
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['nutrition_rank'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['nutrition_rank']; ?>%;"><?php echo $row['nutrition_rank']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      	<div id="column2" >
			      	<?php
			      		while( $row = mysqli_fetch_array($topNutrition) ) {
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['nutrition_rank'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['nutrition_rank']; ?>%;"><?php echo $row['nutrition_rank']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      </div>
			    </div>
			    <div class="tab-pane" id="tab5">
			      <div id="two-column">
			      	<div id="column1" >
			      	<?php
			      		$counter = 1;
			      		while( $row = mysqli_fetch_array($topRoll) ) {
				      		if( $counter == 6 ) break;
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['roll_freq'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['roll_freq']; ?>%;"><?php echo $row['roll_freq']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      	<div id="column2" >
			      	<?php
			      		while( $row = mysqli_fetch_array($topRoll) ) {
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['roll_freq'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['roll_freq']; ?>%;"><?php echo $row['roll_freq']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      </div>
			    </div>
			  </div>
			  <a href="#">> Back Top</a>
			</div>

			<hr />
			
			<div class="tabbable">
			  <ul class="nav nav-tabs">
			    <li class="active"><a href="#tab6" data-toggle="tab">考試難度</a></li>
			    <li><a href="#tab7" data-toggle="tab">作業難度</a></li>
			    <li><a href="#tab8" data-toggle="tab">得分難度</a></li>
			    <li><a href="#tab9" data-toggle="tab">耗時程度</a></li>
			    <li><a href="#tab10" data-toggle="tab">加簽難度</a></li>			 
			  </ul>
			  <div class="tab-content">
			    <div class="tab-pane active" id="tab6">
			      <div id="two-column">
			      	<div id="column1" >
			      	<?php
			      		$counter = 1;
			      		while( $row = mysqli_fetch_array($topTest) ) {
				      		if( $counter == 6 ) break;
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php NegativeColor( $row['test_dif'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['test_dif']; ?>%;"><?php echo $row['test_dif']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      	<div id="column2" >
			      	<?php
			      		while( $row = mysqli_fetch_array($topTest) ) {
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php NegativeColor( $row['test_dif'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['test_dif']; ?>%;"><?php echo $row['test_dif']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      </div>
			    </div>
			    <div class="tab-pane" id="tab7">
			      <div id="two-column">
			      	<div id="column1" >
			      	<?php
			      		$counter = 1;
			      		while( $row = mysqli_fetch_array($topHomework) ) {
				      		if( $counter == 6 ) break;
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php NegativeColor( $row['homework_dif'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['homework_dif']; ?>%;"><?php echo $row['homework_dif']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      	<div id="column2" >
			      	<?php
			      		while( $row = mysqli_fetch_array($topHomework) ) {
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php NegativeColor( $row['homework_dif'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['homework_dif']; ?>%;"><?php echo $row['homework_dif']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      </div>
			    </div>			    
			    <div class="tab-pane" id="tab8">
			      <div id="two-column">
			      	<div id="column1" >
			      	<?php
			      		$counter = 1;
			      		while( $row = mysqli_fetch_array($topGrade) ) {
				      		if( $counter == 6 ) break;
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php NegativeColor( $row['grade_dif'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['grade_dif']; ?>%;"><?php echo $row['grade_dif']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>			      	
			      	<div id="column2" >
			      	<?php
			      		while( $row = mysqli_fetch_array($topGrade) ) {
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php NegativeColor( $row['grade_dif'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['grade_dif']; ?>%;"><?php echo $row['grade_dif']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      </div>
			    </div>
			    <div class="tab-pane" id="tab9">
			      <div id="two-column">
			      	<div id="column1" >
			      	<?php
			      		$counter = 1;
			      		while( $row = mysqli_fetch_array($topTime) ) {
				      		if( $counter == 6 ) break;
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php NegativeColor( $row['time_cost'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['time_cost']; ?>%;"><?php echo $row['time_cost']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      	<div id="column2" >
			      	<?php
			      		while( $row = mysqli_fetch_array($topTime) ) {
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php NegativeColor( $row['time_cost'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['time_cost']; ?>%;"><?php echo $row['time_cost']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      </div>
			    </div>
			    <div class="tab-pane" id="tab10">
			      <div id="two-column">
			      	<div id="column1" >
			      	<?php
			      		$counter = 1;
			      		while( $row = mysqli_fetch_array($topSign) ) {
				      		if( $counter == 6 ) break;
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php NegativeColor( $row['sign_dif'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['sign_dif']; ?>%;"><?php echo $row['sign_dif']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>
			      	</div>
			      	<div id="column2" >
			      	<?php
			      		while( $row = mysqli_fetch_array($topSign) ) {
			      	?>
			      		<a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo "# $counter - "; ?>
			      		<?php DepartmentParse( $row['course_department'] ); ?> - <?php echo $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php NegativeColor( $row['sign_dif'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['sign_dif']; ?>%;"><?php echo $row['sign_dif']; ?>%</div>
						</div>
					<?php
							$counter++;
						}
					?>					
			      	</div>
			      </div>
			    </div>
			  </div>
			</div>	
			<a href="#">> Back Top</a>		
		</div>
		
		<div id="two-column">
			<h3>Department Comments Statistic Report - Total : <font color="red"><?php echo $totalCount['total']; ?></font></h3>
			<a href="#">> Back Top</a>
			<!--div id="column1" >
				<a href="searchResult.php?Dep=33&Grade=7"><h5><i class="icon-wrench"></i> 資工系（ CSE ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=29&Grade=7"><h5><i class="icon-wrench"></i> 電機系（ EE ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=32&Grade=7"><h5><i class="icon-wrench"></i> 機電系（ MEME ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=34&Grade=7"><h5><i class="icon-wrench"></i> 光電系（ EO ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=35&Grade=7"><h5><i class="icon-wrench"></i> 材光系（ MOES ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=50&Grade=7"><h5><i class="icon-wrench"></i> 海工系（ MAEV ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=26&Grade=7"><h5><i class="icon-tasks"></i> 物理系（ PHYS ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=27&Grade=7"><h5><i class="icon-tasks"></i> 化學系（ CHE ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=28&Grade=7"><h5><i class="icon-tasks"></i> 應數系（ MATH ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=24&Grade=7"><h5><i class="icon-leaf"></i> 生科系（ BIOS ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
			</div>
			<div id="column2" >
				<a href="searchResult.php?Dep=18&Grade=7"><h5><i class="icon-book"></i> 中文系（ CL ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=19&Grade=7"><h5><i class="icon-book"></i> 外文系（ DFLL ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>						
				
				<a href="searchResult.php?Dep=21&Grade=7"><h5><i class="icon-headphones"></i> 音樂系（ MUSI ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=23&Grade=7"><h5><i class="icon-headphones"></i> 劇藝系（ TA ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=37&Grade=7"><h5><i class="icon-user"></i> 企管系（ BM ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=38&Grade=7"><h5><i class="icon-user"></i> 資管系（ MIS ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=39&Grade=7"><h5><i class="icon-user"></i> 財管系（ FM ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=42&Grade=7"><h5><i class="icon-user"></i> 政經系（ PE ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=46&Grade=7"><h5><i class="icon-user"></i> 社會系（ SOC ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
				
				<a href="searchResult.php?Dep=51&Grade=7"><h5><i class="icon-leaf"></i> 海資系（ MBR ）</h5></a>
				<div class="progress progress-info progress-striped active">
					<div class="bar" style="width: 20%;">20%</div>
				</div>
				<ul class="list-style1">
					<li></li>
				</ul>
			</div>
		</div-->
		
	</div>
	
</div>

<!--div id="about">
	<h2 class="title">Department Statistic Report</h2>
	<i class="icon-ok"></i> <b>各系所評鑑數目總計<b> : &nbsp;&nbsp;&nbsp;<span class="badge badge-info">8</span><br /><br />
	
	<i class="icon-ok"></i> <b>資工系<b> : &nbsp;&nbsp;&nbsp;<span class="badge badge-info">8</span><br /><br />
	<div class="progress progress-danger progress-striped active">
		<div class="bar" style="width: 20%;">20%</div>
	</div>
</div-->

<?php
	require_once( "CourseFooter.php" );
	require_once( "scriptInclude.php" );
?>

</body></html>