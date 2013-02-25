<?php
	require_once( "setSession.php" );
	require_once( "DepartmentParse.php" );
	require_once( "../connectVar.php" );
	
	$course_id = mysqli_real_escape_string( $conn, trim($_GET['id']) );
	
	// Course Detail.
	$query = "SELECT * FROM coursedetail WHERE course_id = '$course_id'";
	$result = mysqli_query( $conn, $query ) or die('id Error');
	
	if( mysqli_num_rows($result) == 0 ) {
		// Direct To Error Page.
	} else {
		$row = mysqli_fetch_array( $result );
	}
	
	// Commit Result.
	$query = "SELECT date, time, description FROM commentdetail WHERE course_id = '$course_id' ORDER BY date DESC, time DESC";
	$commit = mysqli_query( $conn, $query ) or die('commit Error');
	
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
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Facing Course - Course Detail</title>
	<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="css/docs.css" rel="stylesheet" type="text/css" media="screen" />
	<style>
		h4, h3,h2, table, tr, td, li, ul, th, p, select, b {
			font-family: "微軟正黑體", "Arial";
		}
		b {
			color: #007daa;
		}
	</style>
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
		<div class="post">
			<h2 class="title"><img src="img/notebook.png" /> &nbsp;<?php echo $row['course_nameCH']; ?><br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['course_nameEN']; ?></h2>
			<a href="#" class="thumbnail" >
                <img src="img/pics01.jpg" width="900" height="250" alt="" />
            </a>
			<br />
			
			<!-- Warning Area -->
			<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Attention!</strong> 為了保障評分公信度, 每個人對每一門課只能評鑑一次喔! 
			</div>
			<br />
			
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
						<i class="icon-shopping-cart"></i> <b>教材與講授品質</b> : <br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['teach_quality'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['teach_quality']; ?>%;"><?php echo $row['teach_quality']; ?>%</div>
						</div>
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>教材準備與上課品質，愈大愈優異。
						</div>
					</li>							
					<li>
						<i class="icon-resize-small"></i> <b>課程實用度</b> : <br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['practical_rank'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['practical_rank']; ?>%;"><?php echo $row['practical_rank']; ?>%</div>
						</div>
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>該課程的應用與實用程度，愈大愈實用。
						</div>
					</li>
					<li>
						<i class="icon-list"></i> <b>助教強度</b> : <br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['TA_rank'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['TA_rank']; ?>%;"><?php echo $row['TA_rank']; ?>%</div>
						</div>
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>助教的能力與表現，愈大愈強。
						</div>
					</li>
					<li>
						<i class="icon-leaf"></i> <b>開放程度</b> : <br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['nutrition_rank'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['nutrition_rank']; ?>%;"><?php echo $row['nutrition_rank']; ?>%</div>
						</div>
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>上課緊繃與學期修課沈重度，愈大愈輕鬆。
						</div>
					</li>
					<li>
						<i class="icon-tint"></i> <b>點名頻率</b> : <br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['roll_freq'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['roll_freq']; ?>%;"><?php echo $row['roll_freq']; ?>%</div>
						</div>
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>上課時的點名頻率，愈大愈高。
						</div>
					</li>
				</ul>
			</div>
			<div id="column2">
				<ul class="list-style1">
					<li class="first">
						<i class="icon-text-height"></i> <b>考試難度</b> : <br /><br />
						<div class="progress progress-<?php NegativeColor( $row['test_dif'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['test_dif']; ?>%;"><?php echo $row['test_dif']; ?>%</div>
						</div>
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>該課程考試的難度，愈大愈難。
						</div>
					</li>	
					<li>
						<i class="icon-pencil"></i> <b>作業難度</b> : <br /><br />
						<div class="progress progress-<?php NegativeColor( $row['homework_dif'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['homework_dif']; ?>%;"><?php echo $row['homework_dif']; ?>%</div>
						</div>
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>該課程作業的難度，愈大愈難。
						</div>
					</li>
					<li>
						<i class="icon-hand-up"></i> <b>得分難度</b> : <br /><br />
						<div class="progress progress-<?php NegativeColor( $row['grade_dif'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['grade_dif']; ?>%;"><?php echo $row['grade_dif']; ?>%</div>
						</div>
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>取得高分總成績的難度，愈大愈難。
						</div>
					</li>
					<li>
						<i class="icon-refresh"></i> <b>耗時程度</b> : <br /><br />
						<div class="progress progress-<?php NegativeColor( $row['time_cost'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['time_cost']; ?>%;"><?php echo $row['time_cost']; ?>%</div>
						</div>
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>所花費時間的比例程度，愈大愈耗時。
						</div>
					</li>
					<li>
						<i class="icon-ok-circle"></i> <b>加簽難度</b> : <br /><br />
						<div class="progress progress-<?php NegativeColor( $row['sign_dif'] ); ?> progress-striped active">
							<div class="bar" style="width: <?php echo $row['sign_dif']; ?>%;"><?php echo $row['sign_dif']; ?>%</div>
						</div>
						<div class="alert alert-info fade in" style="font-family: '微軟正黑體', 'Arial';">
							<strong>項目說明：</strong>該課程加簽難度，愈大愈難。
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="about">
		<h2 class="title">Current Rank</h2>
		<i class="icon-ok"></i> <b>目前總評分<b> :<br /><br />
		<div class="progress progress-danger progress-striped active">
			<div class="bar" style="width: <?php echo ($row['current_rank']/24); ?>%;"><?php echo "Rank - " . $row['current_rank']." - "; echo sprintf("%.2f", ($row['current_rank']/24)); echo "%"; ?></div>
		</div>
	</div>
	
	<div id="about">
		<h2 class="title">Comments</h2>
		<div data-spy="scroll" data-target="#navbarExample" data-offset="0" class="scrollspy-example" style="height: 500px; color: #000;">
		<?php
			while( $Comment = mysqli_fetch_array( $commit ) ) {
		?>
			<div class="comment">
				<h5># <span class="label label-info"><?php echo $Comment['date']; ?></span> - <span class="label label-success"><?php echo $Comment['time']; ?></span></h5>
				<p>
					<?php echo "- ".$Comment['description']; ?>
				</p>
			</div>
			<hr />
		<?php
			}
		?>
		</div>
		<br /><br />
		<a href="judgeForm.php?id=<?php echo $course_id; ?>" style="color: #FFF;"><button class="btn btn-large btn-block btn-primary" type="button">我要加入該課程評鑑</button></a>
	</div>
</div>

<?php
	require_once( "CourseFooter.php" );
	require_once( "scriptInclude.php" );
?>
</body>
</html>
