<?php
	require_once( "setSession.php" );
	require_once( "DepartmentParse.php" );
	require_once( "../connectVar.php" );
	
	$ErrorMessage = "";
	$pageSize = 20;
	
	if( !isset($GET['p']) ) {
		$currentPage = 0;
	} else {
		$currentPage = mysqli_real_escape_string( $conn, trim($_GET['p']) );	
	}
	
	// Set Search Type.
	if( isset($_GET['sf']) ) {
		$searchFlag = mysqli_real_escape_string( $conn, trim($_GET['sf']) );
	}
	
	
	if( isset($_GET['CourseSearch']) || $searchFlag == '0' ) {
		$courseName = mysqli_real_escape_string( $conn, trim($_GET['CourseName']) );	
		
		if( isset($_GET['permute']) ) {
			$permute = mysqli_real_escape_string( $conn, trim($_GET['permute']) );
			$priority = mysqli_real_escape_string( $conn, trim($_GET['priority']) );
			
			if( $priority == 'u' ) {
				$query = "SELECT * FROM coursedetail WHERE (course_nameCH LIKE '%$courseName%') OR (course_nameEN LIKE '%$courseName%') ORDER BY $permute DESC";
			} else if( $priority == 'd' ) {
				$query = "SELECT * FROM coursedetail WHERE (course_nameCH LIKE '%$courseName%') OR (course_nameEN LIKE '%$courseName%') ORDER BY $permute ASC";
			}
		} else {
			$query = "SELECT * FROM coursedetail WHERE (course_nameCH LIKE '%$courseName%') OR (course_nameEN LIKE '%$courseName%') ORDER BY course_nameCH ASC";
		}
		
		$result = mysqli_query( $conn, $query ) or die('Course Error');
		
		if( mysqli_num_rows($result) == 0 ) {
			$ErrorMessage = "No Such Result - 查無此結果！";
		} else {
			$ErrorMessage = "Query Success - 查詢成功！";
		}
		$searchFlag = '0';
		
	} else if( isset($_GET['ProfessorSearch']) || $searchFlag == '1' ) {
		$professorName = mysqli_real_escape_string( $conn, trim($_GET['ProfessorName']) );
		
		if( isset($_GET['permute']) ) {
			$permute = mysqli_real_escape_string( $conn, trim($_GET['permute']) );
			$priority = mysqli_real_escape_string( $conn, trim($_GET['priority']) );
			
			if( $priority == 'u' ) {
				$query = "SELECT * FROM coursedetail WHERE professor LIKE '%$professorName%' ORDER BY $permute DESC";	
			} else if( $priority == 'd' ) {
				$query = "SELECT * FROM coursedetail WHERE professor LIKE '%$professorName%' ORDER BY $permute ASC";
			}
		} else {
			$query = "SELECT * FROM coursedetail WHERE professor LIKE '%$professorName%' ORDER BY professor ASC";
		}
		
		$result = mysqli_query( $conn, $query ) or die('Professor Error');
		
		if( mysqli_num_rows($result) == 0 ) {
			$ErrorMessage = "No Such Result - 查無此結果！";
		} else {
			$ErrorMessage = "Query Success - 查詢成功！";
		}
		$searchFlag = '1';
		
	} else if( isset($_GET['DepartmentSearch']) || $searchFlag == '2' || isset($_GET['Dep']) ) {
		$department = mysqli_real_escape_string( $conn, trim($_GET['Dep']) );
		$grade = mysqli_real_escape_string( $conn, trim($_GET['Grade']) );
		$currentPage = mysqli_real_escape_string( $conn, trim($_GET['p']) );
		$start = ( $currentPage * $pageSize );
		
		if( $grade == '7' ) {
			$query = "SELECT * FROM coursedetail WHERE course_department = '$department'";
		} else {
			$query = "SELECT * FROM coursedetail WHERE course_department = '$department' AND course_grade = '$grade'";	
		}
		
		$result = mysqli_query( $conn, $query ) or die('Department Error');
		
		if( mysqli_num_rows($result) == 0 ) {
			$ErrorMessage = "No Such Result - 查無此結果！";
		} else {
			$ErrorMessage = "Query Success - 查詢成功！";
			$total = mysqli_num_rows($result);
			$totalPages= ceil( $total / $pageSize );
		}
		
		if( isset($_GET['permute']) ) {
			$permute = mysqli_real_escape_string( $conn, trim($_GET['permute']) );
			$priority = mysqli_real_escape_string( $conn, trim($_GET['priority']) );
			
			if( $priority == 'u' ) {
				if( $grade == '7' ) {
					$query = "SELECT * FROM coursedetail WHERE course_department = '$department' ORDER BY $permute DESC ";
				} else {
					$query = "SELECT * FROM coursedetail WHERE course_department = '$department' AND course_grade = '$grade' ORDER BY $permute DESC ";	
				}
			} else if( $priority == 'd' ) {
				if( $grade == '7' ) {
					$query = "SELECT * FROM coursedetail WHERE course_department = '$department' ORDER BY $permute ASC ";
				} else {
					$query = "SELECT * FROM coursedetail WHERE course_department = '$department' AND course_grade = '$grade' ORDER BY $permute ASC ";	
				}
			}
		} else {
			if( $grade == '7' ) {
				$query = "SELECT * FROM coursedetail WHERE course_department = '$department' ORDER BY course_grade ASC, course_nameCH ASC ";
			} else {
				$query = "SELECT * FROM coursedetail WHERE course_department = '$department' AND course_grade = '$grade' ORDER BY course_grade ASC, course_nameCH ASC";	
			}
		}
		
		$result = mysqli_query( $conn, $query ) or die('Second Department Error');
		$searchFlag = '2';
	}
	
	// Create URL of Sorting.
	function sortURLCourse( $cName, $permute, $pri ) {
		echo "<a href='searchResult.php?permute=$permute&priority=$pri&CourseName=$cName&sf=0'>"; 
	}
	
	function sortURLProfessor( $pName, $permute, $pri ) {
		echo "<a href='searchResult.php?permute=$permute&priority=$pri&ProfessorName=$pName&sf=1'>";
	}
	
	function sortURLAll( $Dep, $gd, $permute, $pri ) {
		echo "<a href='searchResult.php?permute=$permute&priority=$pri&Dep=$Dep&Grade=$gd&sf=2'>";
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Facing Course - Search Result</title>
	<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="css/docs.css" rel="stylesheet" type="text/css" media="screen" />
	<style>
		h4, h3, table, tr, td, li, ul, th, p, select {
			font-family: "微軟正黑體", "Arial";
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
			<h2 class="title"><img src="img/pad.png" /> &nbsp;Course Searching Result</h2>
			<!--a href="#" class="thumbnail">
                <img src="img/pics01.jpg" width="820" height="250" alt="" />
            </a-->
			<br />
			
			<!-- Warning Area -->
			<div class="alert alert-info" style="font-family: '微軟正黑體', 'Arial';">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Attention ! <?php echo $ErrorMessage; ?></strong> 
			</div>
			
			
			<table class="table table-striped">	
              <thead>
                <tr>
                  <th>#</th>
                  <th>
                  	課程名稱
                  	<?php
						if( $permute == '' || $priority == 'u' ) {
							switch( $searchFlag ) {
								case 0:
									sortURLCourse( $courseName, course_nameCH, d );
									break;
								case 1:
									sortURLProfessor( $professorName, course_nameCH, d );							
									break;
								case 2:								
									sortURLAll( $department, $grade, course_nameCH, d );
									break;
								default:
									// Direct to Error Page.
							}	
						} else {
							switch( $searchFlag ) {
								case 0:
									sortURLCourse( $courseName, course_nameCH, u );
									break;
								case 1:
									sortURLProfessor( $professorName, course_nameCH, u );							
									break;
								case 2:								
									sortURLAll( $department, $grade, course_nameCH, u );
									break;
								default:
									// Direct to Error Page.
							}
						}
						
						if( $permute == 'course_nameCH' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>	
                  </th>
                  <th>
                  	系所
                  	<?php
						if( $permute == '' || $priority == 'u' ) {
							switch( $searchFlag ) {
								case 0:
									sortURLCourse( $courseName, course_department, d );
									break;
								case 1:
									sortURLProfessor( $professorName, course_department, d );							
									break;
								case 2:								
									sortURLAll( $department, $grade, course_department, d );
									break;
								default:
									// Direct to Error Page.
							}	
						} else {
							switch( $searchFlag ) {
								case 0:
									sortURLCourse( $courseName, course_department, u );
									break;
								case 1:
									sortURLProfessor( $professorName, course_department, u );							
									break;
								case 2:								
									sortURLAll( $department, $grade, course_department, u );
									break;
								default:
									// Direct to Error Page.
							}
						}
						
						if( $permute == 'course_department' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>
                  </th>
                  <th>
                  	開課年級
                  	<?php
						if( $permute == '' || $priority == 'u' ) {
							switch( $searchFlag ) {
								case 0:
									sortURLCourse( $courseName, course_grade, d );
									break;
								case 1:
									sortURLProfessor( $professorName, course_grade, d );							
									break;
								case 2:								
									sortURLAll( $department, $grade, course_grade, d );
									break;
								default:
									// Direct to Error Page.
							}	
						} else {
							switch( $searchFlag ) {
								case 0:
									sortURLCourse( $courseName, course_grade, u );
									break;
								case 1:
									sortURLProfessor( $professorName, course_grade, u );							
									break;
								case 2:								
									sortURLAll( $department, $grade, course_grade, u );
									break;
								default:
									// Direct to Error Page.
							}
						}
						
						if( $permute == 'course_grade' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>
                  </th>
				  <th>
				  	開課教授
				  	<?php
						if( $permute == '' || $priority == 'u' ) {
							switch( $searchFlag ) {
								case 0:
									sortURLCourse( $courseName, professor, d );
									break;
								case 1:
									sortURLProfessor( $professorName, professor, d );							
									break;
								case 2:								
									sortURLAll( $department, $grade, professor, d );
									break;
								default:
									// Direct to Error Page.
							}	
						} else {
							switch( $searchFlag ) {
								case 0:
									sortURLCourse( $courseName, professor, u );
									break;
								case 1:
									sortURLProfessor( $professorName, professor, u );							
									break;
								case 2:								
									sortURLAll( $department, $grade, professor, u );
									break;
								default:
									// Direct to Error Page.
							}
						}
						
						if( $permute == 'professor' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>
				  </th>
				  <th>
				  	課程學分
				  	<?php
						if( $permute == '' || $priority == 'u' ) {
							switch( $searchFlag ) {
								case 0:
									sortURLCourse( $courseName, unit, d );
									break;
								case 1:
									sortURLProfessor( $professorName, unit, d );							
									break;
								case 2:								
									sortURLAll( $department, $grade, unit, d );
									break;
								default:
									// Direct to Error Page.
							}	
						} else {
							switch( $searchFlag ) {
								case 0:
									sortURLCourse( $courseName, unit, u );
									break;
								case 1:
									sortURLProfessor( $professorName, unit, u );							
									break;
								case 2:								
									sortURLAll( $department, $grade, unit, u );
									break;
								default:
									// Direct to Error Page.
							}
						}
						
						if( $permute == 'unit' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>	
				  </th>
				  <th>
				  	目前評價			
					<?php
						if( $permute == '' || $priority == 'u' ) {
							switch( $searchFlag ) {
								case 0:
									sortURLCourse( $courseName, current_rank, d );
									break;
								case 1:
									sortURLProfessor( $professorName, current_rank, d );							
									break;
								case 2:								
									sortURLAll( $department, $grade, current_rank, d );
									break;
								default:
									// Direct to Error Page.
							}	
						} else {
							switch( $searchFlag ) {
								case 0:
									sortURLCourse( $courseName, current_rank, u );
									break;
								case 1:
									sortURLProfessor( $professorName, current_rank, u );							
									break;
								case 2:								
									sortURLAll( $department, $grade, current_rank, u );
									break;
								default:
									// Direct to Error Page.
							}
						}
						
						if( $permute == 'current_rank' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>
				  </th>
				  <th>
				  	評鑑人數				  	
					<?php
						if( $permute == '' || $priority == 'u' ) {
							switch( $searchFlag ) {
								case 0:
									sortURLCourse( $courseName, judge_people, d );
									break;
								case 1:
									sortURLProfessor( $professorName, judge_people, d );							
									break;
								case 2:								
									sortURLAll( $department, $grade, judge_people, d );
									break;
								default:
									// Direct to Error Page.
							}	
						} else {
							switch( $searchFlag ) {
								case 0:
									sortURLCourse( $courseName, judge_people, u );
									break;
								case 1:
									sortURLProfessor( $professorName, judge_people, u );							
									break;
								case 2:								
									sortURLAll( $department, $grade, judge_people, u );
									break;
								default:
									// Direct to Error Page.
							}
						}
						
						if( $permute == 'judge_people' && @$priority == 'd' ) echo '<i class="icon-chevron-up"></i></a>';
						else echo '<i class="icon-chevron-down"></i></a>';	
					?>
				  </th>
                </tr>
              </thead>
              <tbody>
              <?php
              	$counter = 1;
              	while( $row = mysqli_fetch_array($result) ) {
              ?>
                <tr>
                  <td><?php echo $counter; ?></td>
                  <td><a href="courseDetail.php?id=<?php echo $row['course_id']; ?>"><?php echo $row['course_nameCH']; ?></a></td>            
                  <td><?php DepartmentParse( $row['course_department'] ); ?></td>
                  <td>
	                  <?php
	                  	switch( $row['course_grade'] ) {
		                  	case 1: echo '一年級'; break;
		                  	case 2: echo '二年級'; break;
		                  	case 3: echo '三年級'; break;
		                  	case 4: echo '四年級'; break;
		                  	case 5: echo '碩士班'; break;
	                  	}
	                  ?>
                  </td>
				  <td><?php echo $row['professor']; ?></td>
				  <td><?php echo $row['unit']; ?></td>
				  <td><?php echo $row['current_rank']; ?></td>		
				  <td><?php echo $row['judge_people']; ?></td>
                </tr>
              <?php
              		$counter++;
              	}
              ?>
              </tbody>
            </table>
			<a href="#">> Back Top</a>
			<hr />
			
			
			<?php
				if( $searchFlag == '212332323' ) {
			?>
			<!-- Pagination Area -->
			<div class="pagination pagination-centered">
			  <ul>	
			  	<?php
			  		if( $currentPage == 0 ) {
				  		echo "<li class='disabled'><a href='#'>&laquo;</a></li>";
			  		} else {
				  		echo "<li><a href='searchResult.php?Dep=".$department."Grade=".$grade."p=".($currentPage-1)."'>&laquo;</a></li>";
			  		}
			  	
					for( $i = 0; $i < $totalPages; $i++ ) {
						if( $i == $currentPage ) {
							echo "<li class='active'><a href='searchResult.php?Dep=".$department."Grade=".$grade."p=".($currentPage+1)."'>" . ($i+1) . "</a></li>";
						} else {
							echo "<li><a href='searchResult.php?Dep=".$department."Grade=".$grade."p=".($currentPage+1)."'>". ($i+1) . "</a></li>";
						}
				    }
				    
				    if( $currentPage == $totalPages-1 ) {
					    echo "<li class='disabled'><a href='#'>&raquo;</a></li>";
				    } else {
					    echo "<li><a href='searchResult.php?Dep=".$department."Grade=".$grade."p=".($currentPage+1)."'>&raquo;</a></li>";
				    }
				?>
				</ul>
			</div>
			<?php
				}
			?>
						
			</p>
		</div>
		<div id="two-column">
			<div id="column1">
				<h2>Course Searching</h2>
				<ul class="list-style1">
					<form class="form-search" method="get">
						<div class="input-append">
							<input type="text" class="search-query span3" placeholder="Class Name" name="CourseName"/>
							<Button type="submit" name="CourseSearch" class="btn btn-primary" >
							<i class="icon-ok icon-white"></i> &nbsp;Search</button>
						</div>
					</form>
					
					<li class="first" >
						<blockquote>
							<small>Enter the Course Name to Search</small>
						</blockquote>
					</li>
				</ul>
			</div>
			<div id="column2">
				<h2>Professor Searching</h2>
				<ul class="list-style1">
					<form class="form-search" method="get">
						<div class="input-append">
							<input type="text" class="search-query span3" placeholder="Professor Name" name="ProfessorName"/>
							<Button type="submit" name="ProfessorSearch" class="btn btn-primary" >
							<i class="icon-ok icon-white"></i> &nbsp;Search</button>
						</div>
					</form>
					<li class="first" >
						<blockquote>
							<small>Enter the Professor Name to Search</small>
						</blockquote>
					</li>
				</ul>
			</div>
		</div>
	</div>
	
	<div id="about">
		<h2 class="title">Department Searching</h2>
		<p>
		<form class="form-search" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<select class="span4" name="Dep">
			<option disabled>開課系所 ( Department )</option>
			<option value="0" >國語文</option>
			<option value="1" >英文初級</option>
			<option value="2" >英文中級</option>
			<option value="3" >英文中高級</option>
			<option value="4" >英文高級</option>
			<option value="5" >運動與健康</option>
			<option value="6" >興趣選修</option>
			<option value="7" >通識教育</option>
			<option value="8" >應用性課程</option>
			<option value="9" >普通物理小組</option>
			<option value="10" >跨院選修( 通 )</option>
			<option value="11" >跨院選修( 文 )</option>
			<option value="12" >跨院選修( 理 )</option>
			<option value="13" >跨院選修( 工 )</option>
			<option value="14" >跨院選修( 管 )</option>
			<option value="15" >跨院選修( 海 )</option>
			<option value="16" >跨院選修( 社 )</option>
			<option value="17" >服務學習</option>
			<option value="18" >中國語文學系 ( CL )</option>
			<option value="19" >外國語文學系 ( DFLL )</option>
			<option value="20" >文學院 ( LIBA )</option>
			<option value="21" >音樂學系 ( MUSI )</option>
			<option value="22" >哲學碩士 ( PHIL )</option>
			<option value="23" >劇場藝術學系 ( TA )</option>
			<option value="24" >生命科學系 ( BIOS )</option>
			<option value="25" >生物醫學碩士 ( IMBS )</option>
			<option value="26" >化學系 ( CHE )</option>
			<option value="27" >物理學系 ( PHYS )</option>
			<option value="28" >應用數學系 ( MATH )</option>
			<option value="29" >電機工程學系 ( EE )</option>
			<option value="30" >電機電力碩士 ( IMPE )</option>
			<option value="31" >通訊工程碩士 ( ICE )</option>
			<option value="32" >機械與機電工程學系 ( MEME )</option>
			<option value="33" >資訊工程學系 ( CSE )</option>
			<option value="34" >光電工程學系 ( EO )</option>
			<option value="35" >材料與光電工程學系 ( MOES )</option>
			<option value="36" >環境工程碩士 ( ENVE )</option>
			<option value="37" >企業管理學系 ( BM )</option>
			<option value="38" >資訊管理學系 ( MIS )</option>
			<option value="39" >財務管理學系 ( FM )</option>
			<option value="40" >人力資源管理碩士 ( HRM )</option>
			<option value="41" >傳播管理碩士 ( ICM )</option>
			<option value="42" >政治經濟學系 ( PE )</option>
			<option value="43" >公共事務碩士 ( PAM )</option>
			<option value="44" >政治碩士 ( IPS )</option>
			<option value="45" >經濟碩士 ( ECON )</option>
			<option value="46" >教育碩士 ( IOE )</option>
			<option value="47" >亞太碩士 ( CAPS )</option>
			<option value="48" >社會系 ( SOC )</option>
			<option value="49" >社科院 ( CSS )</option>
			<option value="50" >海洋環境與工程學系 ( MAEV )</option>
			<option value="51" >海洋環境暨資源學系 ( MBR )</option>
			<option value="52" >海洋生物碩士 ( MRBI )</option>
			<option value="53" >海洋地質化學碩士 ( IMGC )</option>
			<option value="54" >海洋事務碩士 ( MA )</option>
			<option value="55" >海下物理碩士 ( UTAO )</option>
			<option value="56" >海洋學程 ( BPM )</option>
			<option value="57" >中學學程 ( STP )</option>
			<option value="58" >醫學管理學程 ( IHCM )</option>
			<option value="59" >國際經營學程 ( IB )</option>
		</select>
           
        <select class="span3" name="Grade">
        	<option value = "7" selected>All</option>
            <option value = "1">一年級</option>
            <option value = "2">二年級</option>
            <option value = "3">三年級</option>
            <option value = "4">四年級</option>
			<option value = "5">碩士班</option>
			<!--option>博士班</option-->             
        </select>
		&nbsp;
		<Button type="submit" name="DepartmentSearch" class="btn btn-primary"><i class="icon-ok icon-white"></i> &nbsp;Search</button>
		</form>
		</p>
	</div>
</div>

<?php
	require_once( "CourseFooter.php" );
	require_once( "scriptInclude.php" );
?>

</body>
</html>
