<?php
header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
include('../conn.php');
session_start();
if(isset($_SESSION['name']) == false){
	$_SESSION['name']= '';
}
$hot = "SELECT * FROM `Activities` WHERE type = 'hot'";
$clubs = "SELECT * FROM `Activities` WHERE type = 'clubs'";
$departments = "SELECT * FROM `Activities` WHERE type = 'departments'";
$authorities = "SELECT * FROM `Activities` WHERE type = 'authorities'";
$concerts = "SELECT * FROM `Activities` WHERE type = 'concerts'";
if(isset($_GET['action']) == false){
	$_SESSION['action']= '';
}
else if($_GET['action']){
	$_SESSION['action']=$_GET['action'];
}
?>
<style>
td{
	font-size:12px;
}
.img{
	width:300;
	height:210;
}
.title{
	font-weight:bold;
	font-size:16px;
	color:#000000;
}
.sub{
	color:#666666;
}
.description{
	font-size:13px;
	color:#666;
	width:100%;
	font-weight:bold;
	font:msjh;
	height:50px;
}
.name{
	color:#666666;
	width:700px;
}
.time{
	color:#666666;
}
.venue{
	color:#666666;
}
.fee{
	color:#666666;
}
.host{
	color:#666666;
}
.tdimg{
	border: 1px solid #C0C0C0;
}
</style>
<table width="850">
	<tr>
    	<td align="center" style="color:#333333; font-size:9pt" width="740">
        	<a style="border:0; color:#333333; font-size:11pt; cursor:pointer" href="#hot"><b>熱門精選</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;
        	<a style="border:0; color:#333333; font-size:11pt; cursor:pointer" href="#clubs"><b>社團組織</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a style="border:0; color:#333333; font-size:11pt; cursor:pointer" href="#departments"><b>校內系所</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a style="border:0; color:#333333; font-size:11pt; cursor:pointer" href="#authorities"><b>校方機構</b></a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a style="border:0; color:#333333; font-size:11pt; cursor:pointer" href="#concerts"><b>藝文音樂</b></a></td>
        <td align="right" style="color:#666666; font-size:10pt; border:1px solid #cccccc;"><b><a onclick="window.open('share.php','','menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=950,height=560')" style="border:0; cursor:pointer">分享新活動</a>&nbsp;+</b></td>
    </tr>
    <tr>
    	<td colspan="2"><img src="jpg/hor.jpg" width="850" /></td>
    </tr>
	<!--熱門精選-->
	<tr>
    	<td colspan="2"><a id="hot" name="hot" style="cursor:pointer; border:0"><img src="jpg/t1.jpg" name="hot" /></a></td>
    </tr>
    <tr>
        <td colspan="2">
        <?php
		$a1=mysqli_query($conn,$hot);
		if(mysqli_num_rows($a1) != 0){
		while($hotlist = mysqli_fetch_array($a1)){
			echo ''.$hotlist['poster'].'';
		echo '
        	<table>
            	<tr>
                	<td rowspan="7" class="tdimg" height="224" width="38%" align="center" valign="middle"><img class="img" src="poster/'.$hotlist['poster'].'" /></td>
					<td rowspan="7" width="80px"></td>
                    <td class="title" valign="top" align="right" colspan="2">'.$hotlist['title'].'</td>';
					if($_SESSION['stu_id'] == $hotlist['stu_id']){
						echo '
							<td align="right" width="115" rowspan="2"><form action="../page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$hotlist['rno'].'" /><b><input type="submit" style="background-image:url(jpg/button.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="活動管理" /></b></form></td>';
					}
					else if($_SESSION['stu_id'] != $hotlist['stu_id'] && $hotlist['signup'] == 'yes'){
						echo '
							<td align="right" width="115" rowspan="2"><form action="../page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$hotlist['rno'].'" /><b><input type="submit" style="background-image:url(jpg/button.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="我要報名" /></b></form></td>';
					}
					else if($_SESSION['stu_id'] != $hotlist['stu_id'] && $hotlist['signup'] == 'no'){
						echo '
							<td align="right" width="115" rowspan="2"><form action="../page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$hotlist['rno'].'" /><b><input type="submit" style="background-image:url(jpg/button.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="詳細資訊" /></b></form></td>';
					}
        echo '  </tr>    
				<tr>
                	<td class="description" colspan="2" valign="top">'.$hotlist['description'].'</td>
                </tr>
                <tr>
                	<td class="sub">活動名稱&nbsp;:&nbsp;</td>
                    <td class="name">'.$hotlist['name'].'</td>
                </tr>
                <tr>
                	<td class="sub">時&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;間&nbsp;:&nbsp;</td>
                    <td class="time">'.$hotlist['time'].'&nbsp;&nbsp;'.$hotlist['extratime'].'</td>
                </tr>
                <tr>
                	<td class="sub">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;點&nbsp;:&nbsp;</td>
                    <td class="venue">'.$hotlist['venue'].'</td>
                </tr>
                <tr>
                	<td class="sub">費&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;:&nbsp;</td>
                    <td class="fee">'.$hotlist['fee'].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">主辦單位&nbsp;:&nbsp;</td>
                    <td class="host">'.$hotlist['host'].'</td>
                </tr>
            </table><br/><br/>';
		};
		}
		?>
        </td>
    </tr>
    <!--社團組織-->
    <tr>
    	<td colspan="2"><a id="clubs" name="clubs" style="cursor:pointer; border:0"><img src="jpg/t2.jpg" name="clubs" /></a></td>
    </tr>
    <tr>
        <td colspan="2">
        <?php
		$b1=mysqli_query($conn,$clubs);
		if(mysqli_num_rows($b1) != 0){
			
		while($clubslist = mysqli_fetch_array($b1)){
		echo '
        	<table>
            	<tr>
                	<td rowspan="7" class="tdimg"" height="224" width="38%" align="center" valign="middle"><img class="img" src="poster/'.$clubslist["poster"].'" /></td>
					<td rowspan="7" width="80px"></td>
                    <td class="title" valign="top" colspan="2">'.$clubslist["title"].'</td>';
					if($_SESSION['stu_id'] == $clubslist['stu_id']){
						echo '
							<td align="right" width="115" rowspan="2"><form action="../page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$clubslist['rno'].'" /><b><input type="submit" style="background-image:url(jpg/button.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="活動管理" /></b></form></td>';
					}
					else if($_SESSION['stu_id'] != $clubslist['stu_id'] && $clubslist['signup'] == 'yes'){
						echo '
							<td align="right" width="115" rowspan="2"><form action="../page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$clubslist['rno'].'" /><b><input type="submit" style="background-image:url(jpg/button.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="我要報名" /></b></form></td>';
					}
					else if($_SESSION['stu_id'] != $clubslist['stu_id'] && $clubslist['signup'] == 'no'){
						echo '
							<td align="right" width="115" rowspan="2"><form action="../page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$clubslist['rno'].'" /><b><input type="submit" style="background-image:url(jpg/button.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="詳細資訊" /></b></form></td>';
					}
        echo '</tr>
                <tr>
                	<td class="description" colspan="2" valign="top">'.$clubslist["description"].'</td>
                </tr>
                <tr>
                	<td class="sub">活動名稱&nbsp;:&nbsp;</td>
                    <td class="name">'.$clubslist["name"].'</td>
                </tr>
                <tr>
                	<td class="sub">時&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;間&nbsp;:&nbsp;</td>
                    <td class="time">'.$clubslist["time"].'&nbsp;&nbsp;'.$clubslist["extratime"].'</td>
                </tr>
                <tr>
                	<td class="sub">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;點&nbsp;:&nbsp;</td>
                    <td class="venue">'.$clubslist["venue"].'</td>
                </tr>
                <tr>
                	<td class="sub">費&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;:&nbsp;</td>
                    <td class="fee">'.$clubslist["fee"].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">主辦單位&nbsp;:&nbsp;</td>
                    <td class="host">'.$clubslist["host"].'</td>
                </tr>
            </table><br/><br/>';
		};
		}
		?>
        </td>
    </tr>
    <!--校內系所-->
    <tr>
    	<td colspan="2"><a id="departments" name="departments" style="cursor:pointer; border:0"><img src="jpg/t3.jpg" name="departments" /></a></td>
    </tr>
    <tr>
        <td colspan="2">
        <?php
		$c1=mysqli_query($conn,$departments);
		if(mysqli_num_rows($c1) != 0){
		while($departmentslist = mysqli_fetch_array($c1)){
		echo '
        	<table>
            	<tr>
                	<td rowspan="7"  class="tdimg" height="224" width="38%" align="center" valign="middle"><img class="img" src="poster/'.$departmentslist["poster"].'" /></td>
					<td rowspan="7" width="80px"></td>
                    <td class="title" valign="top" colspan="2">'.$departmentslist["title"].'</td>';
					if($_SESSION['stu_id'] == $departmentslist['stu_id']){
						echo '
							<td align="right" width="115" rowspan="2"><form action="../page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$departmentslist['rno'].'" /><b><input type="submit" style="background-image:url(jpg/button.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="活動管理" /></b></form></td>';
					}
					else if($_SESSION['stu_id'] != $departmentslist['stu_id'] && $departmentslist['signup'] == 'yes'){
						echo '
							<td align="right" width="115" rowspan="2"><form action="../page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$departmentslist['rno'].'" /><b><input type="submit" style="background-image:url(jpg/button.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="我要報名" /></b></form></td>';
					}
					else if($_SESSION['stu_id'] != $departmentslist['stu_id'] && $departmentslist['signup'] == 'no'){
						echo '
							<td align="right" width="115" rowspan="2"><form action="../page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$departmentslist['rno'].'" /><b><input type="submit" style="background-image:url(jpg/button.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="詳細資訊" /></b></form></td>';
					}
        echo '</tr>
                <tr>
                	<td class="description" colspan="2" valign="top">'.$departmentslist["description"].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">活動名稱&nbsp;:&nbsp;</td>
                    <td class="name">'.$departmentslist["name"].'</td>
                </tr>
                <tr>
                	<td class="sub">時&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;間&nbsp;:&nbsp;</td>
                    <td class="time">'.$departmentslist["time"].'&nbsp;&nbsp;'.$departmentslist["extratime"].'</td>
                </tr>
                <tr>
                	<td class="sub">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;點&nbsp;:&nbsp;</td>
                    <td class="venue">'.$departmentslist["venue"].'</td>
                </tr>
                <tr>
                	<td class="sub">費&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;:&nbsp;</td>
                    <td class="fee">'.$departmentslist["fee"].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">主辦單位&nbsp;:&nbsp;</td>
                    <td class="host">'.$departmentslist["host"].'</td>
                </tr>
            </table><br/><br/>';
		};
		}
		?>
        </td>
    </tr>
    <!--校方機構-->
    <tr>
    	<td colspan="2"><a id="authorities" name="authorities" style="cursor:pointer; border:0"><img src="jpg/t4.jpg" name="authorities" /></a></td>
    </tr>
    <tr>
        <td colspan="2">
        <?php
		$d1=mysqli_query($conn,$authorities);
		if(mysqli_num_rows($d1) != 0){
		while($authoritieslist = mysqli_fetch_array($d1)){
		echo '
        	<table>
            	<tr>
                	<td rowspan="7"  class="tdimg" height="224" width="38%" align="center" valign="middle"><img class="img" src="poster/'.$authoritieslist["poster"].'" /></td>
					<td rowspan="7" width="80px"></td>
                    <td class="title" valign="top" colspan="2">'.$authoritieslist["title"].'</td>';
					if($_SESSION['stu_id'] == $authoritieslist['stu_id']){
						echo '
							<td align="right" width="115" rowspan="2"><form action="../page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$authoritieslist['rno'].'" /><b><input type="submit" style="background-image:url(jpg/button.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="活動管理" /></b></form></td>';
					}
					else if($_SESSION['stu_id'] != $authoritieslist['stu_id'] && $authoritieslist['signup'] == 'yes'){
						echo '
							<td align="right" width="115" rowspan="2"><form action="../page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$authoritieslist['rno'].'" /><b><input type="submit" style="background-image:url(jpg/button.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="我要報名" /></b></form></td>';
					}
					else if($_SESSION['stu_id'] != $authoritieslist['stu_id'] && $authoritieslist['signup'] == 'no'){
						echo '
							<td align="right" width="115" rowspan="2"><form action="../page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$authoritieslist['rno'].'" /><b><input type="submit" style="background-image:url(jpg/button.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="詳細資訊" /></b></form></td>';
					}
        echo '</tr>
                <tr>
                	<td class="description" colspan="2" valign="top">'.$authoritieslist["description"].'</td>
                </tr>
                <tr>
                	<td class="sub">活動名稱&nbsp;:&nbsp;</td>
                    <td class="name">'.$authoritieslist["name"].'</td>
                </tr>
                <tr>
                	<td class="sub">時&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;間&nbsp;:&nbsp;</td>
                    <td class="time">'.$authoritieslist["time"].'&nbsp;&nbsp;'.$authoritieslist["extratime"].'</td>
                </tr>
                <tr>
                	<td class="sub">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;點&nbsp;:&nbsp;</td>
                    <td class="venue">'.$authoritieslist["venue"].'</td>
                </tr>
                <tr>
                	<td class="sub">費&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;:&nbsp;</td>
                    <td class="fee">'.$authoritieslist["fee"].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">主辦單位&nbsp;:&nbsp;</td>
                    <td class="host">'.$authoritieslist["host"].'</td>
                </tr>
            </table><br/><br/>';
		};
		}
		?>
        </td>
    </tr>
    <!--藝文音樂-->
    <tr>
    	<td colspan="2"><a id="concerts" name="concerts" style="cursor:pointer; border:0"><img src="jpg/t5.jpg" name="concerts" /></a></td>
    </tr>
    <tr>
        <td colspan="2">
        <?php
		$e1=mysqli_query($conn,$concerts);
		if(mysqli_num_rows($e1) != 0){
		while($concertslist = mysqli_fetch_array($e1)){
		echo '
        	<table>
            	<tr>
                	<td rowspan="7"  class="tdimg" height="224" width="38%" align="center" valign="middle"><img class="img" src="poster/'.$concertslist["poster"].'" /></td>
					<td rowspan="7" width="80px"></td>
                    <td class="title" valign="top" colspan="2">'.$concertslist["title"].'</td>';
					if($_SESSION['stu_id'] == $concertslist['stu_id']){
						echo '
							<td align="right" width="115" rowspan="2"><form action="../page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$concertslist['rno'].'" /><b><input type="submit" style="background-image:url(jpg/button.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="活動管理" /></b></form></td>';
					}
					else if($_SESSION['stu_id'] != $concertslist['stu_id'] && $concertslist['signup'] == 'yes'){
						echo '
							<td align="right" width="115" rowspan="2"><form action="../page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$concertslist['rno'].'" /><b><input type="submit" style="background-image:url(jpg/button.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="我要報名" /></b></form></td>';
					}
					else if($_SESSION['stu_id'] != $concertslist['stu_id'] && $concertslist['signup'] == 'no'){
						echo '
							<td align="right" width="115" rowspan="2"><form action="../page/airstab/app/apply/apply02.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$concertslist['rno'].'" /><b><input type="submit" style="background-image:url(jpg/button.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115; height:34; cursor:pointer;" value="詳細資訊" /></b></form></td>';
					}
        echo '</tr>
                <tr>
                	<td class="description" colspan="2" valign="top">'.$concertslist["description"].'</td>
                </tr>
                <tr>
                	<td class="sub">活動名稱&nbsp;:&nbsp;</td>
                    <td class="name">'.$concertslist["name"].'</td>
                </tr>
                <tr>
                	<td class="sub">時&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;間&nbsp;:&nbsp;</td>
                    <td class="time">'.$concertslist["time"].'&nbsp;&nbsp;'.$concertslist["extratime"].'</td>
                </tr>
                <tr>
                	<td class="sub">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;點&nbsp;:&nbsp;</td>
                    <td class="venue">'.$concertslist["venue"].'</td>
                </tr>
                <tr>
                	<td class="sub">費&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;:&nbsp;</td>
                    <td class="fee">'.$concertslist["fee"].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">主辦單位&nbsp;:&nbsp;</td>
                    <td class="host">'.$concertslist["host"].'</td>
                </tr>
            </table><br/><br/>';
		};
		}
		?>
        </td>
    </tr>
</table>
<!---?php
if($_SESSION['action'] == 'signup'){
	$_SESSION['action'] = $_GET['action'];
	$rno = $_GET['rno'];
	echo '<script type="text/javascript" language="javascript">window.open(\'../page/airstab/app/apply/apply02.php\',\'\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"</script>';
}
?>