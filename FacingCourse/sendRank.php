<?php
	require_once( "setSession.php" );
	require_once( "../connectVar.php" );

	if( !isset($_SESSION['name']) || !isset($_SESSION['auth']) || !isset($_SESSION['stu_id']) || !isset($_SESSION['nick']) ) {
		echo '<script type="text/javascript">alert("您沒有權力觀看此頁面！") location.href="index.php";</script>';
	} else {
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
			
			echo $course_id."<br />";
			echo $test."<br />";
			echo $commit."<br />";
		} 
	}
	
?>