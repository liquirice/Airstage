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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>報名名單</title>
</head>

<body>
<table align="center">
	<tr>
    	<td align="center" colspan="4" style="font-weight:bold; font-size:18px"><?php echo "".$eventname['title']."&nbsp;&nbsp;|&nbsp;&nbsp;報名名單"; ?></td>
    </tr>
    <?php
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
					$got = mysqli_query($conn, $member);
					$member_list = mysqli_fetch_array($got);
					$all = '
    					<tr align="center" style="font-size:14px">
    						<td>'.$member_list["name"].'</td>
        					<td>'.$member_list["gender"].'</td>
        					<td>'.$member_list["department"].'</td>
        					<td>'.$member_list["grade"].'</td>
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
    					<td>名字</td>
        				<td>性別</td>
        				<td>系</td>
        				<td>級</td>
    				</tr>'.$temp.'';
			}
	}
	?>
</table>
</body>
</html>