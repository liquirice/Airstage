<?php
include("lib\connection.php");


$member_detail_sql = mysql_query("SELECT * FROM member_detail");
$member_check_sql = mysql_query("SELECT * FROM member_check");



echo"<table border='2' >";
echo"<tr>		
		<td></td>	
		<td>member_id</td>	
		<td>student_id</td> 
		<td>name</td> 
		<td>gender</td> 
		<td>department</td>
		<td>grade</td> 
		<td>email</td> 
		<td>passwd</td> 
		<td>confirm_passwd</td> 
		<td>hp</td> 
		<td>fb</td> 
		<td>twitter</td> 
		<td>plurk</td> 
		<td>skype</td> 
		<td>msn</td> 
		<td>second_email</td> 
		<td>dorm</td> 
		<td>floor</td> 
		<td>room</td> 
		<td>food</td>
		<td>address</td> 
		<td>club</td> 
		<td>club_id</td> 
		<td>id</td> 
		<td>hometown</td> 
		<td>transport</td> 
	</tr>";
while($data = mysql_fetch_array($member_detail_sql)){
	echo"<tr> 
			 <td><a href=\"revise_delete.php?student_id={$data['student_id']}\">Delete</a></td>	
			 <td>{$data['m_id']}</td> 
			<td>{$data['student_id']}</td> 
			<td>{$data['name']}</td> 
			<td>{$data['gender']}</td> 
			<td>{$data['department']}</td>
			<td>{$data['grade']}</td> 
			<td>{$data['email']}</td> 
			<td>{$data['passwd']}</td> 
			<td>{$data['confirm_passwd']}</td> 
			<td>{$data['hp']}</td> 
			<td>{$data['fb']}</td> 
			<td>{$data['twitter']}</td> 
			<td>{$data['plurk']}</td> 
			<td>{$data['skype']}</td> 
			<td>{$data['msn']}</td> 
			<td>{$data['second_email']}</td> 
			<td>{$data['dorm']}</td> 
			<td>{$data['floor']}</td> 
			<td>{$data['room']}</td> 
			<td>{$data['food']}</td> 
			<td>{$data['address']}</td> 
			<td>{$data['club']}</td> 
			<td>{$data['club_id']}</td> 
			<td>{$data['id']}</td> 
			<td>{$data['hometown']}</td> 
			<td>{$data['transport']}</td>										
		 </tr>";
}
echo"</table>";

echo"<table border='2' >";
echo"<tr>	
		<td></td> 		
		<td>student_id</td> 		
		<td>gender</td> 
		<td>email</td> 
		<td>hp</td> 
		<td>fb</td> 
		<td>twitter</td> 
		<td>plurk</td> 
		<td>skype</td> 
		<td>msn</td> 
		<td>second_email</td> 
		<td>dorm</td> 
		<td>food</td>
		<td>address</td> 
		<td>club</td> 
		<td>club_id</td> 
		<td>hometown</td> 
		<td>transport</td> 
	</tr>";
while($data = mysql_fetch_array($member_check_sql)){
	echo"<tr> 
			 <td><a href=\"revise_delete.php?student_id={$data['student_id']}\">Delete</a></td>	
			<td>{$data['student_id_check']}</td> 		 
			<td>{$data['gender_check']}</td> 
			<td>{$data['email_check']}</td> 
			<td>{$data['hp_check']}</td> 
			<td>{$data['fb_check']}</td> 
			<td>{$data['twitter_check']}</td> 
			<td>{$data['plurk_check']}</td> 
			<td>{$data['skype_check']}</td> 
			<td>{$data['msn_check']}</td> 
			<td>{$data['second_email_check']}</td> 
			<td>{$data['dorm_check']}</td> 		
			<td>{$data['food_check']}</td> 
			<td>{$data['address_check']}</td> 
			<td>{$data['club_check']}</td> 
			<td>{$data['club_id_check']}</td> 
			<td>{$data['hometown_check']}</td> 
			<td>{$data['transport_check']}</td>										
		 </tr>";
}
echo"</table>";










?>