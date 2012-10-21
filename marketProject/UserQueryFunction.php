<?php
	function getWinnerInfo( $userID, $conn ) {
		$query = "SELECT username, stu_id, name, profile_pic, department FROM Member INNER JOIN member_info Using(stu_id) WHERE Member.stu_id = '$userID'";
		$result = mysqli_query( $conn, $query ) or die('User Query Error');
		$detail = mysqli_fetch_array( $result );
		echo $detail['stu_id'] . '<br />';
		echo $detail['name'] . '<br />';
		echo $detail['department'];
	}
	
	function getSellerInfo( $userID, $conn ) {
		$query = "SELECT * FROM Member " . 
				 "LEFT JOIN member_info ON Member.stu_id = member_info.stu_id " .
				 "LEFT JOIN display_check ON Member.stu_id = display_check.stu_id " . 
				 "WHERE Member.username = '$userID'";
		$result = mysqli_query( $conn, $query ) or die('User Query Error');
		$detail = mysqli_fetch_array( $result );
		
		echo '<div>';
		
		if( $detail['name_c'] == "on" )   echo $detail['name'] . ' - ';
		                                  echo $detail['department'] . '<br />';
		echo '</div>';
		
		// Image area.
		echo '<a href=\'' . $detail['facebook'] . '\' class=\'thumbnail\'><img src=\'http://placehold.it/188x120\' class=\'img-polaroid\' /></a>';
	}
?>