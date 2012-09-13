<?php
session_start();
include("../../../../conn.php");
if(empty($_SESSION['rno'])){
	echo '<script type="text/javascript" language="javascript">alert("請從首頁進入!"); location.href = "http://www.airstage.com.tw/nsysu/airs/index.php"</script>';
}
$rno = $_SESSION['rno'];
$event = "SELECT * FROM Activities WHERE rno = $rno";
$select= "SELECT * FROM List";
$eventresult = mysqli_query($conn, $event);
$result = mysqli_query($conn, $select);
$eventname = mysqli_fetch_array($eventresult);
$i = 0;
$temp = '';
echo '
<div id="adminlist">
<table align="center">
	<tr>
    	<td align="center" colspan="4" style="font-weight:bold; font-size:18px">'.$eventname['title'].'&nbsp;&nbsp;|&nbsp;&nbsp;報名名單"; ?></td>
    </tr>';
	if(mysqli_num_rows($result) == 0){
		echo'
    		<tr>
    			<td align="center" style="font-size:14px; font-weight:bold;">還沒有人報名哦!趕快和你的好朋友一起報名吧!</td>
    		</tr>';
	}
	else if(mysqli_num_rows($result) != 0){
			while($list = mysqli_fetch_array($result)){
				$stu_id = $list['event'.$rno.''];
				if($stu_id != ''){
					$member = "SELECT * FROM Member WHERE stu_id = '$stu_id'";
					$memberinfo = "SELECT * FROM member_info WHERE stu_id = '$stu_id'";
					$got = mysqli_query($conn, $member);
					$gotinfo = mysqli_query($conn, $memberinfo);
					$member_list = mysqli_fetch_array($got);
					$member_listinfo = mysqli_fetch_array($gotinfo);
					if($member_listinfo['food'] == 0){
						$food = '葷';
					}
					else if($member_listinfo['food'] == 1){
						$food = '素';
					}
					if($member_listinfo['car'] == 0){
						$car = '步行';
					}
					else if($member_listinfo['car'] == 1){
						$car = '會騎車,沒機車';
					}
					else if($member_listinfo['car'] == 2){
						$car = '會騎車,有機車';
					}
					else if($member_listinfo['car'] == 3){
						$car = '汽車';
					}
					if($member_listinfo['dorm'] == '住'){
						$dorm = '無';
					}
					else{
						$dorm = ''.$member_listinfo['dorm'].'棟'.$member_listinfo['room'].'';
					}
					if($member_listinfo['outAddr'] == ''){
						$outAddr = '無';
					}
					else{
						$outAddr = ''.$member_listinfo['outAddr'].'';
					}
					$all = '
    					<tr align="center" style="font-size:14px">
    						<td>'.$member_list["stu_id"].'</td>
        					<td><a href="'.$member_listinfo["facebook"].'" style="cursor:pointer" target="_blank">'.$member_list["name"].'</a></td>
        					<td>'.$member_list["gender"].'</td>
							<td>'.$member_list["department"].'</td>
        					<td>'.$member_list["grade"].'</td>
							<td>'.$food.'</td>
							<td>'.$member_list["email"].'</td>
							<td>'.$car.'</td>
							<td>'.$dorm.'</td>
							<td>'.$outAddr.'</td>
							<td>'.$member_listinfo["phone"].'</td>
    					</tr>';	
					if($all == $temp){
						$all = $all;
						$temp = $all;
					}
					else {
						$temp = $temp.''.$all;
					}
					$i++;
				}
			}
			//判定如果資料表裡為空
			if($i == 0){
				echo '
					<tr>
    					<td align="center" style="font-size:14px; font-weight:bold;">還沒有人報名哦!趕快和你的好朋友一起報名吧!</td>
    				</tr>';
			}
			//如果資料表不為空
			else{
				echo '<tr align="center" style="font-size:14px;">
    					<td>學號</td>
						<td>姓名</td>
						<td>性別</td>
						<td>系</td>
						<td>級</td>
						<td>葷素</td>
						<td>email</td>
						<td>交通工具</td>
						<td>宿舍</td>
						<td>校外住址</td>
						<td>手機號碼</td>
    				</tr>'.$temp.'';
			}
	}
echo'
</table>
</div>
';
?>