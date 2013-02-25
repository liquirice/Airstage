<?php
	// Don't need to login before viewing.
	require_once( "setSession.php" );
	require_once( "DepartmentParse.php" );
	require_once( "../connectVar.php" );
	
	$query = "SELECT current_rank, course_nameCH, course_id, course_department FROM coursedetail ORDER BY current_rank DESC LIMIT 0, 5";
	$topResult = mysqli_query( $conn, $query ) or die('Top Error');
	
	$query = "SELECT course_nameCH, course_id, current_rank, judge_people, course_department FROM coursedetail ORDER BY judge_people DESC LIMIT 0, 5";
	$hotResult = mysqli_query( $conn, $query ) or die('hot Error');
	
	function PasitiveColor( $value ) {
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
	<title>Facing Course</title>
	<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="css/docs.css" rel="stylesheet" type="text/css" media="screen" />
	<style>
		h4, h3, table, tr, td, li, ul, th, select, a, p {
			font-family:微軟正黑體, Arial;
		}
	</style>
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
			<h2 class="title" ><img src="img/notebook.png" /> &nbsp;Notification</h2>
			<p>
				<a href="#" class="thumbnail" >
					<img src="img/pics01.jpg" width="820" height="250" alt="" />
				</a>
			</p>
			
			<!-- Warning Area -->
			<div class="alert alert-info fade in" style="font-family:微軟正黑體, Arial; " >
				<button type="button" class="close" data-dismiss="alert" >×</button>
				<strong>Attention!</strong> 博士班課程暫不開放評鑑 敬請見諒 m(__)m<br />
				<strong>新專頁開放：</strong> 細項評分專頁已開放，項目會陸續增加！<a href="rankDetail.php">細項評分專頁</a>
			</div>
			
			<p>A New Course Judge System for Students in <strong>National Sun-Yet Sen University.</strong> 更多評分請見<a href="rankDetail.php">細項評分專頁</a></p>				
			<div data-spy="scroll" data-target="#navbarExample" data-offset="0" class="scrollspy-example" >
				<h4># 網站聲明</h4>
				<p>
					本網站創立動機發心於提供國立中山大學同學一個課程好壞的查詢管道，並且同時提供教授們檢視自己在學生心目中的形象與教學狀況，評分採用 Airstage 西灣人的資料庫，
					意味著只有中山的學生能夠評鑑，並且每一個人對每一門課只能評鑑一次，以確保資料客觀性。本站亦提供在每次評鑑時有一次對該課程進行詳細評價說明的機會，但禁止各種涉及色情、暴力、侮辱等攻擊性質的言語，如有發現，該留言將進行刪除，Airstage 以全力控管本站治安，希望各位中山的同學能夠以客觀的角度來評價每一門課，讓自己與其他同學均能受惠，同時 Airstage 不負任何留言項的法律責任。
					<p.s.> 評鑑前需註冊 Airstage 的會員方可進入評鑑，但瀏覽課程則不在此限。
				</p>	
				<h4># 評分方式</h4>	
				<p>
					每一門課的各項起始分數均為 50%，總評分的起始分數為 1200 分，各項評價與總評分會隨著同學每一次的評價而作更動，總評分的調整幅度不會大以確保單筆資料的影響範圍。
					再次強調，希望每個中山的同學能夠以客觀的角度來面對每一次的評鑑，一旦評鑑後便不能修改，如果希望這是一個只屬於中山大學不同於其他學校與PTT的課程查詢文化，盼望各位秉持公平正義之精神來為各位的課程與後輩努力，Airstage 在此感謝大家的支持。
				</p>			
			</div>
			<p></p>
		</div>
		
		<div id="two-column">
			<div id="column1" >
				<h2>Top Rank</h2>
				<ul class="list-style1">
				<?php
					$counter = 1;
					while( $row = mysqli_fetch_array($topResult) ) {
						if( $counter == 1 ) {
				?>
						<li class='first'><a href='courseDetail.php?id=<?php echo $row['course_id']; ?>'>
						<?php echo "# " . $counter; ?> <?php DepartmentParse( $row['course_department'] ); ?><?php echo " - " .  $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['current_rank'] ); ?> progress-striped active">
							<div class="bar" style="width:<?php echo ($row['current_rank']/24); ?>%;">
							<?php echo $row['current_rank']." - "; echo sprintf("%.2f", ($row['current_rank']/24)); echo "%"; ?>
							</div>
						</div>
						</li>
				<?php
						} else {
				?>
				
						<li><a href='courseDetail.php?id=<?php echo $row['course_id']; ?>'>
						<?php echo "# ".$counter; ?> <?php DepartmentParse( $row['course_department'] ); ?><?php echo " - " .  $row['course_nameCH']; ?></a><br /><br />
						<div class="progress progress-<?php PasitiveColor( $row['current_rank'] ); ?> progress-striped active">
							<div class="bar" style="width:<?php echo ($row['current_rank']/24); ?>%;">
							<?php echo $row['current_rank']." - "; echo sprintf("%.2f", ($row['current_rank']/24)); echo "%"; ?>
							</div>
						</div>
						</li>
				<?php
						}
						$counter++;
					}
				?>
				</ul>
			</div>
			
			<div id="column2" >
				<h2>Hot Comment</h2>
				<ul class="list-style1">
					<?php
						$counter = 1;
						while( $row = mysqli_fetch_array($hotResult) ) {
							if( $counter == 1 ) {
					?>
							<li class='first'><a href='courseDetail.php?id=<?php echo $row['course_id']; ?>'>
							<?php echo "# " . $counter; ?> <?php DepartmentParse( $row['course_department'] ); ?><?php echo " - " .  $row['course_nameCH'] . " - " . $row['judge_people'] . " 人"; ?></a><br /><br />
							<div class="progress progress-<?php PasitiveColor( $row['current_rank'] ); ?> progress-striped active">
								<div class="bar" style="width:<?php echo ($row['current_rank']/24); ?>%;">
								<?php echo $row['current_rank']." - "; echo sprintf("%.2f", ($row['current_rank']/24)); echo "%"; ?>
								</div>
							</div>
							</li>
					<?php
							} else {
					?>
					
							<li><a href='courseDetail.php?id=<?php echo $row['course_id']; ?>'>
							<?php echo "# ".$counter; ?> <?php DepartmentParse( $row['course_department'] ); ?><?php echo " - " .  $row['course_nameCH'] . " - " . $row['judge_people'] . " 人"; ?></a><br /><br />
							<div class="progress progress-<?php PasitiveColor( $row['current_rank'] ); ?> progress-striped active">
								<div class="bar" style="width:<?php echo ($row['current_rank']/24); ?>%;">
								<?php echo $row['current_rank']." - "; echo sprintf("%.2f", ($row['current_rank']/24)); echo "%"; ?>															</div>
							</div>
							</li>
					<?php
							}
							$counter++;
						}
					?>
				</ul>
			</div>
		</div>
		
		<div id="two-column" >
			<div id="column1" >
				<hr />
				<h2>Course Searching</h2>
				<ul class="list-style1" >
					<form class="form-search" method="get" action="searchResult.php">
						<div class="input-append" >
							<input type="text" class="search-query span3" placeholder="Class Name" name="CourseName"/>
							<button type="submit" name="CourseSearch" class="btn btn-primary" >
							<i class="icon-ok icon-white" ></i> &nbsp;Search</button>
						</div>
					</form>
					
					<li class="first" >
						<blockquote>
							<small>Enter the Course Name to Search</small>
						</blockquote>
					</li>
				</ul>
			</div>
			<div id="column2" >
				<hr />
				<h2>Professor Searching</h2>
				<ul class="list-style1" >
					<form class="form-search" method="get" action="searchResult.php">
						<div class="input-append" >
							<input type="text" class="search-query span3" placeholder="Professor Name" name="ProfessorName"/>
							<button type="submit" name="ProfessorSearch" class="btn btn-primary" >
							<i class="icon-ok icon-white" ></i> &nbsp;Search</button>
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
	<!--br />
	
	<div id="menu" >
		<img src="img/topper.png" />
	</div-->
	
	<div id="about" >
		<h2 class="title" >Department Searching</h2>
		<form class="form-search" method="get" action="searchResult.php">
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
		<button type="submit" name="DepartmentSearch" class="btn btn-primary"><i class="icon-ok icon-white" ></i> &nbsp;Search</button>
		</form>
		<p></p>
	</div>
</div>

<?php
	require_once( "CourseFooter.php" );
	require_once( "scriptInclude.php" );
?>

</body></html>