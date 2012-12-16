<?php
	// Version:1.0.1
	// Last Modified Day : 2012.11.17
	header('P3P: CP="NOI ADM DEV COM NAV OUR STP"');
	
	//require_once( "global/redirectFilter.php" );
	require_once( "global/connectVar.php" );
	require_once( "global/setSession.php" );
	
	$allevent = mysqli_query($conn,"SELECT * FROM `Activities` ORDER BY starttime ASC");//列表用
	$num = mysqli_query($conn, "SELECT * FROM `Activities` ORDER BY starttime DESC");//活動數量用
	$totalnotify = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM Member WHERE stu_id='".$_SESSION["stu_id"]."'"));
    $numnotify = explode(",", "".$totalnotify["notify"]."");
    $count = 0;
    while($numnotify[$count] != ""){
        $count++;
    }
	
	$h = 0;
	$c = 0;
	$d = 0;
	$a = 0;
	$con = 0;
	$hotlist = "";
	$clubslist = "";
	$departmentslist = "";
	$authoritieslist = "";
	$concertslist = "";
	
	while($allnum = mysqli_fetch_array($num)){
		//熱門精選數字及顏色決定
		if($allnum["type"] == "hot"){
			if(date('Y-m-d') < $allnum['starttime']){
				$h++;
				if($geth != "red")
				$hclass = 'align="center" width="14" height="14" background="activities/images/graybox.png" style="color:#FFF; font-size:9px; font:Arial, Helvetica, sans-serif; background-repeat:no-repeat;"';
			}
			else if(date('Y-m-d') >= $allnum['starttime'] && date("Y-m-d") <= $allnum["endtime"]){
				$h++;
				$hclass = 'align="center" width="14" height="14" background="activities/images/redbox.png"  style="color:#FFF; font-size:9px; font:Arial, Helvetica, sans-serif; background-repeat:no-repeat"';
				$geth = "red";
			}
			elseif($geth != "red"){
				$hclass = 'align="center" width="14" height="14" background="activities/images/graybox.png" style="color:#FFF; font-size:9px; font:Arial, Helvetica, sans-serif; background-repeat:no-repeat;"';
			}
		}
		//社團活動數字與顏色決定
		elseif($allnum["type"] == "clubs"){
			if(date('Y-m-d') < $allnum['starttime']){
				$c++;
				if($getc != "red")
				$cclass = 'align="center" width="14" height="14" background="activities/images/graybox.png" style="color:#FFF; font-size:9px; font:Arial, Helvetica, sans-serif; background-repeat:no-repeat;"';
			}
			else if(date('Y-m-d') >= $allnum['starttime'] && date("Y-m-d") <= $allnum["endtime"]){
				$c++;
				$cclass = 'align="center" width="14" height="14" background="activities/images/redbox.png"  style="color:#FFF; font-size:9px; font:Arial, Helvetica, sans-serif; background-repeat:no-repeat"';
				$getc = "red";
			}
			elseif($getc != "red"){
				$cclass = 'align="center" width="14" height="14" background="activities/images/graybox.png" style="color:#FFF; font-size:9px; font:Arial, Helvetica, sans-serif; background-repeat:no-repeat;"';
			}
		}
		//校內系所數字與顏色決定
		elseif($allnum["type"] == "departments"){
			if(date('Y-m-d') < $allnum['starttime']){
				$d++;
				if($getd != "red")
				$dclass = 'align="center" width="14" height="14" background="activities/images/graybox.png" style="color:#FFF; font-size:9px; font:Arial, Helvetica, sans-serif; background-repeat:no-repeat;"';
			}
			else if(date('Y-m-d') >= $allnum['starttime'] && date("Y-m-d") <= $allnum["endtime"]){
				$d++;
				$dclass = 'align="center" width="14" height="14" background="activities/images/redbox.png"  style="color:#FFF; font-size:9px; font:Arial, Helvetica, sans-serif; background-repeat:no-repeat"';
				$getd = "red";
			}
			elseif($getd != "red"){
				$dclass = 'align="center" width="14" height="14" background="activities/images/graybox.png" style="color:#FFF; font-size:9px; font:Arial, Helvetica, sans-serif; background-repeat:no-repeat;"';
			}
		}
		//校方機構數字與顏色決定
		elseif($allnum["type"] == "authorities"){
			if(date('Y-m-d') < $allnum['starttime']){
				$a++;
				if($geta != "red")
				$aclass = 'align="center" width="14" height="14" background="activities/images/graybox.png" style="color:#FFF; font-size:9px; font:Arial, Helvetica, sans-serif; background-repeat:no-repeat;"';
			}
			else if(date('Y-m-d') >= $allnum['starttime'] && date("Y-m-d") <= $allnum["endtime"]){
				$a++;
				$aclass = 'align="center" width="14" height="14" background="activities/images/redbox.png"  style="color:#FFF; font-size:9px; font:Arial, Helvetica, sans-serif; background-repeat:no-repeat"';
				$geta = "red";
			}
			elseif($geta != "red"){
				$aclass = 'align="center" width="14" height="14" background="activities/images/graybox.png" style="color:#FFF; font-size:9px; font:Arial, Helvetica, sans-serif; background-repeat:no-repeat;"';
			}
		}
		//藝文音樂數字與顏色決定
		elseif($allnum["type"] == "concerts"){
			if(date('Y-m-d') < $allnum['starttime']){
				$con++;
				if($getcon != "red")
				$conclass = 'align="center" width="14" height="14" background="activities/images/graybox.png" style="color:#FFF; font-size:9px; font:Arial, Helvetica, sans-serif; background-repeat:no-repeat;"';
			}
			else if(date('Y-m-d') >= $allnum['starttime'] && date("Y-m-d") <= $allnum["endtime"]){
				$con++;
				$conclass = 'align="center" width="14" height="14" background="activities/images/redbox.png"  style="color:#FFF; font-size:9px; font:Arial, Helvetica, sans-serif; background-repeat:no-repeat"';
				$getcon = "red";
			}
			elseif($getcon != "red"){
				$conclass = 'align="center" width="14" height="14" background="activities/images/graybox.png" style="color:#FFF; font-size:9px; font:Arial, Helvetica, sans-serif; background-repeat:no-repeat;"';
			}
		}
	}
	
	while($all = mysqli_fetch_array($allevent)){
		//熱門精選列表
		if($all["type"] == "hot"){
			if(date('Y-m-d') <= $all['endtime']){
				$time = "".$all['starttime']."-";
				list($year, $month, $day) = explode("-", $time);
				if($all["starttime"] <= date("Y-m-d") && $all["endtime"] >= date("Y-m-d"))
					$pic = "button8.png";
				$hotlist=$hotlist.'
        	<table background="activities/images/table.jpg" style="background-repeat:no-repeat" width="875px" class="info">
            	<tr>
                	<td rowspan="10" class="tdimg" height="224" width="38%" align="center" valign="middle"><img class="img" height="210" width="300" src="member/images/'.$all['stu_id'].'/activities/'.$all['poster'].'" /></td>
					<td rowspan="10" width="2%"></td>
                    <td class="title" width="300px" valign="top" align="left" colspan="2">'.$all['title'].'</td>
                    <td rowspan="10" width="10%"></td>';
				if($_SESSION['stu_id'] == $all['stu_id']){
					$hotlist = $hotlist.'
						<td align="center" width="26%" rowspan="2" style="font-size:14px"><form action="activities/apply/index.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=918,height=545\')"><input type="hidden" name="rno" value="'.$all['rno'].'" /><input class="button4" type="submit" style="background-image:url(activities/images/button4.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115px; height:34px; cursor:pointer;" value="" /></form><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script>
</td>';
				}
				else if($_SESSION['stu_id'] != $all['stu_id'] && $all['signup'] == 'yes' && $all['url1'] != ''){
					if($all["starttime"] > date("Y-m-d"))
						$pic = "button3.png";
					$hotlist = $hotlist.'
						<td align="center" width="26%" rowspan="2" style="font-size:14px"><form action="activities/apply/index.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$all['rno'].'" /><input class="button3" type="submit"  style="background-image:url(activities/images/'.$pic.'); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115px; height:34px; cursor:pointer;" value="" /></form><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
				}
				else if($_SESSION['stu_id'] != $all['stu_id'] && $all['signup'] == 'no' && $all['url1'] != ''){
					if($all["starttime"] > date("Y-m-d"))
						$pic = "button6.png";
					$hotlist=$hotlist.'
						<td align="center" width="14%" rowspan="2" style="font-size:14px"><form action="activities/apply/index.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$all['rno'].'" /><input class="button6" type="submit" style="background-image:url(activities/images/'.$pic.'); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115px; height:34px; cursor:pointer;" value="" /></form><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
				}
				else if($_SESSION['stu_id'] != $all['stu_id'] && $all['signup'] == 'no' && $all['url1'] == ''){
					if($all["starttime"] > date("Y-m-d"))
						$pic = "button2.png";
					$hotlist=$hotlist.'
						<td align="center" width="20%" rowspan="2" style="font-size:14px"><a target="_blank" href="'.$all['url2'].'"><img class="button2" src="activities/images/'.$pic.'" width="115" height="34" /></a><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
				}
				$hotlist=$hotlist.'  </tr>    
				<tr>
                	<td class="description" colspan="2" valign="top">'.$all['description'].'</td>
                </tr>
                <tr>
                	<td class="sub">活動名稱&nbsp;:&nbsp;</td>
                    <td class="name">'.$all['name'].'</td>
                </tr>
                <tr>
                	<td class="sub">開始時間&nbsp;:&nbsp;</td>
                    <td class="time">'.$all['starttime'].'&nbsp;&nbsp;'.$all['extratime'].'</td>
                </tr>
                <tr>
                	<td class="sub">結束時間&nbsp;:&nbsp;</td>
                    <td class="time">'.$all['endtime'].'&nbsp;&nbsp;'.$all['extratime2'].'</td>
                </tr>
                <tr>
                	<td class="sub">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;點&nbsp;:&nbsp;</td>
                    <td class="venue">'.$all['venue'].'</td>
                </tr>
                <tr>
                	<td class="sub">費&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;:&nbsp;</td>
                    <td class="fee">'.$all['fee'].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">主辦單位&nbsp;:&nbsp;</td>
                    <td class="host">'.$all['host'].'</td>
                </tr>';
				if($all['note'] != ''){
					$hotlist=$hotlist.'<tr>
						<td>附&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;註&nbsp;:&nbsp;</td>
						<td class="note">'.$all['note'].'</td>
						</tr>';
				}
				$hotlist=$hotlist.'
				<tr>
					<td colspan="2" align="left">
						<div class="fb-like" data-href="'.$all["url2"].'" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false"></div>
					</td>
				</tr>
            </table><br/><img src="activities/images/grayline.png" /><br />';
				
            }
		}
		//社團活動列表
		elseif($all["type"] == "clubs"){
			if(date('Y-m-d') <= $all['endtime']){
				$time = "".$all['starttime']."-";
				list($year, $month, $day) = explode("-", $time);
				if($all["starttime"] <= date("Y-m-d") && $all["endtime"] >= date("Y-m-d"))
					$pic = "button8.png";
				$clubslist=$clubslist.'
        	<table background="activities/images/table.jpg" style="background-repeat:no-repeat" width="875px" class="info">
            	<tr>
                	<td rowspan="10" class="tdimg" height="224" width="38%" align="center" valign="middle"><img class="img" height="210" width="300" src="member/images/'.$all['stu_id'].'/activities/'.$all['poster'].'" /></td>
					<td rowspan="10" width="2%"></td>
                    <td class="title" width="300px" valign="top" align="left" colspan="2">'.$all['title'].'</td>
                    <td rowspan="10" width="10%"></td>';
				if($_SESSION['stu_id'] == $all['stu_id']){
					$clubslist = $clubslist.'
						<td align="center" width="26%" rowspan="2" style="font-size:14px"><form action="activities/apply/index.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=918,height=545\')"><input type="hidden" name="rno" value="'.$all['rno'].'" /><input type="submit" class="button4" style="background-image:url(activities/images/button4.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115px; height:34px; cursor:pointer;" value="" /></form><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script>
</td>';
				}
				else if($_SESSION['stu_id'] != $all['stu_id'] && $all['signup'] == 'yes' && $all['url1'] != ''){
					if($all["starttime"] > date("Y-m-d"))
						$pic = "button3.png";
					$clubslist = $clubslist.'
						<td align="center" width="26%" rowspan="2" style="font-size:14px"><form action="activities/apply/index.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$all['rno'].'" /><input type="submit" class="button3"  style="background-image:url(activities/images/'.$pic.'); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115px; height:34px; cursor:pointer;" value="" /></form><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
				}
				else if($_SESSION['stu_id'] != $all['stu_id'] && $all['signup'] == 'no' && $all['url1'] != ''){
					if($all["starttime"] > date("Y-m-d"))
						$pic = "button6.png";
					$clubslist=$clubslist.'
						<td align="center" width="14%" rowspan="2" style="font-size:14px"><form action="activities/apply/index.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$all['rno'].'" /><input class="button6" type="submit" style="background-image:url(activities/images/'.$pic.'); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115px; height:34px; cursor:pointer;" value="" /></form><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
				}
				else if($_SESSION['stu_id'] != $all['stu_id'] && $all['signup'] == 'no' && $all['url1'] == ''){
					if($all["starttime"] > date("Y-m-d"))
						$pic = "button2.png";
					$clubslist=$clubslist.'
						<td align="center" width="20%" rowspan="2" style="font-size:14px"><a target="_blank" href="'.$all['url2'].'"><img class="button2" src="activities/images/'.$pic.'" width="115" height="34" /></a><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
				}
				$clubslist=$clubslist.'  </tr>    
				<tr>
                	<td class="description" colspan="2" valign="top">'.$all['description'].'</td>
                </tr>
                <tr>
                	<td class="sub">活動名稱&nbsp;:&nbsp;</td>
                    <td class="name">'.$all['name'].'</td>
                </tr>
                <tr>
                	<td class="sub">開始時間&nbsp;:&nbsp;</td>
                    <td class="time">'.$all['starttime'].'&nbsp;&nbsp;'.$all['extratime'].'</td>
                </tr>
                <tr>
                	<td class="sub">結束時間&nbsp;:&nbsp;</td>
                    <td class="time">'.$all['endtime'].'&nbsp;&nbsp;'.$all['extratime2'].'</td>
                </tr>
                <tr>
                	<td class="sub">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;點&nbsp;:&nbsp;</td>
                    <td class="venue">'.$all['venue'].'</td>
                </tr>
                <tr>
                	<td class="sub">費&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;:&nbsp;</td>
                    <td class="fee">'.$all['fee'].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">主辦單位&nbsp;:&nbsp;</td>
                    <td class="host">'.$all['host'].'</td>
                </tr>';
				if($all['note'] != ''){
					$clubslist=$clubslist.'<tr>
						<td>附&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;註&nbsp;:&nbsp;</td>
						<td class="note">'.$all['note'].'</td>
						</tr>';
				}
				$clubslist=$clubslist.'
				<tr>
					<td colspan="2" align="left">
						<div class="fb-like" data-href="'.$all["url2"].'" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false"></div>
					</td>
				</tr>
            </table><br/><img src="activities/images/grayline.png" /><br />';
				
            }
		}
		//校內系所列表
		elseif($all["type"] == "departments"){
			if(date('Y-m-d') <= $all['endtime']){
				$time = "".$all['starttime']."-";
				list($year, $month, $day) = explode("-", $time);
				if($all["starttime"] <= date("Y-m-d") && $all["endtime"] >= date("Y-m-d"))
					$pic = "button8.png";
				$departmentslist=$departmentslist.'
        	<table background="activities/images/table.jpg" style="background-repeat:no-repeat" width="875px" class="info">
            	<tr>
                	<td rowspan="10" class="tdimg" height="224" width="38%" align="center" valign="middle"><img class="img" height="210" width="300" src="member/images/'.$all['stu_id'].'/activities/'.$all['poster'].'" /></td>
					<td rowspan="10" width="2%"></td>
                    <td class="title" width="300px" valign="top" align="left" colspan="2">'.$all['title'].'</td>
                    <td rowspan="10" width="10%"></td>';
				if($_SESSION['stu_id'] == $all['stu_id']){
					$departmentslist = $departmentslist.'
						<td align="center" width="26%" rowspan="2" style="font-size:14px"><form action="activities/apply/index.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=918,height=545\')"><input type="hidden" name="rno" value="'.$all['rno'].'" /><input type="submit" class="button4" style="background-image:url(activities/images/button4.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115px; height:34px; cursor:pointer;" value="" /></form><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script>
</td>';
				}
				else if($_SESSION['stu_id'] != $all['stu_id'] && $all['signup'] == 'yes' && $all['url1'] != ''){
					if($all["starttime"] > date("Y-m-d"))
						$pic = "button3.png";
					$departmentslist = $departmentslist.'
						<td align="center" width="26%" rowspan="2" style="font-size:14px"><form action="activities/apply/index.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$all['rno'].'" /><input type="submit" class="button3"  style="background-image:url(activities/images/'.$pic.'); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115px; height:34px; cursor:pointer;" value="" /></form><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
				}
				else if($_SESSION['stu_id'] != $all['stu_id'] && $all['signup'] == 'no' && $all['url1'] != ''){
					if($all["starttime"] > date("Y-m-d"))
						$pic = "button6.png";
					$departmentslist=$departmentslist.'
						<td align="center" width="14%" rowspan="2" style="font-size:14px"><form action="activities/apply/index.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$all['rno'].'" /><input type="submit" class="button6" style="background-image:url(activities/images/'.$pic.'); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115px; height:34px; cursor:pointer;" value="" /></form><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
				}
				else if($_SESSION['stu_id'] != $all['stu_id'] && $all['signup'] == 'no' && $all['url1'] == ''){
					if($all["starttime"] > date("Y-m-d"))
						$pic = "button2.png";
					$departmentslist=$departmentslist.'
						<td align="center" width="20%" rowspan="2" style="font-size:14px"><a target="_blank" href="'.$all['url2'].'"><img class="button2" src="activities/images/'.$pic.'" width="115" height="34" /></a><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
				}
				$departmentslist=$departmentslist.'  </tr>    
				<tr>
                	<td class="description" colspan="2" valign="top">'.$all['description'].'</td>
                </tr>
                <tr>
                	<td class="sub">活動名稱&nbsp;:&nbsp;</td>
                    <td class="name">'.$all['name'].'</td>
                </tr>
                <tr>
                	<td class="sub">開始時間&nbsp;:&nbsp;</td>
                    <td class="time">'.$all['starttime'].'&nbsp;&nbsp;'.$all['extratime'].'</td>
                </tr>
                <tr>
                	<td class="sub">結束時間&nbsp;:&nbsp;</td>
                    <td class="time">'.$all['endtime'].'&nbsp;&nbsp;'.$all['extratime2'].'</td>
                </tr>
                <tr>
                	<td class="sub">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;點&nbsp;:&nbsp;</td>
                    <td class="venue">'.$all['venue'].'</td>
                </tr>
                <tr>
                	<td class="sub">費&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;:&nbsp;</td>
                    <td class="fee">'.$all['fee'].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">主辦單位&nbsp;:&nbsp;</td>
                    <td class="host">'.$all['host'].'</td>
                </tr>';
				if($all['note'] != ''){
					$departmentslist=$departmentslist.'<tr>
						<td>附&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;註&nbsp;:&nbsp;</td>
						<td class="note">'.$all['note'].'</td>
						</tr>';
				}
				$departmentslist=$departmentslist.'
				<tr>
					<td colspan="2" align="left">
						<div class="fb-like" data-href="'.$all["url2"].'" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false"></div>
					</td>
				</tr>
            </table><br/><img src="activities/images/grayline.png" /><br />';
				
            }
		}
		//校方機構列表
		elseif($all["type"] == "authorities"){
			if(date('Y-m-d') <= $all['endtime']){
				$time = "".$all['starttime']."-";
				list($year, $month, $day) = explode("-", $time);
				if($all["starttime"] <= date("Y-m-d") && $all["endtime"] >= date("Y-m-d"))
					$pic = "button8.png";
				$authoritieslist=$authoritieslist.'
        	<table background="activities/images/table.jpg" style="background-repeat:no-repeat" width="875px" class="info">
            	<tr>
                	<td rowspan="10" class="tdimg" height="224" width="38%" align="center" valign="middle"><img class="img" height="210" width="300" src="member/images/'.$all['stu_id'].'/activities/'.$all['poster'].'" /></td>
					<td rowspan="10" width="2%"></td>
                    <td class="title" width="300px" valign="top" align="left" colspan="2">'.$all['title'].'</td>
                    <td rowspan="10" width="10%"></td>';
				if($_SESSION['stu_id'] == $all['stu_id']){
					$authoritieslist = $authoritieslist.'
						<td align="center" width="26%" rowspan="2" style="font-size:14px"><form action="activities/apply/index.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=918,height=545\')"><input type="hidden" name="rno" value="'.$all['rno'].'" /><input type="submit" class="button4" style="background-image:url(activities/images/button4.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115px; height:34px; cursor:pointer;" value="" /></form><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script>
</td>';
				}
				else if($_SESSION['stu_id'] != $all['stu_id'] && $all['signup'] == 'yes' && $all['url1'] != ''){
					if($all["starttime"] > date("Y-m-d"))
						$pic = "button3.png";
					$authoritieslist = $authoritieslist.'
						<td align="center" width="26%" rowspan="2" style="font-size:14px"><form action="activities/apply/index.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$all['rno'].'" /><input type="submit" class="button3"  style="background-image:url(activities/images/'.$pic.'); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115px; height:34px; cursor:pointer;" value="" /></form><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
				}
				else if($_SESSION['stu_id'] != $all['stu_id'] && $all['signup'] == 'no' && $all['url1'] != ''){
					if($all["starttime"] > date("Y-m-d"))
						$pic = "button6.png";
					$authoritieslist=$authoritieslist.'
						<td align="center" width="14%" rowspan="2" style="font-size:14px"><form action="activities/apply/index.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$all['rno'].'" /><input type="submit" class="button6" style="background-image:url(activities/images/'.$pic.'); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115px; height:34px; cursor:pointer;" value="" /></form><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
				}
				else if($_SESSION['stu_id'] != $all['stu_id'] && $all['signup'] == 'no' && $all['url1'] == ''){
					if($all["starttime"] > date("Y-m-d"))
						$pic = "button2.png";
					$authoritieslist=$authoritieslist.'
						<td align="center" width="20%" rowspan="2" style="font-size:14px"><a target="_blank" href="'.$all['url2'].'"><img class="button2" src="activities/images/'.$pic.'" width="115" height="34" /></a><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
				}
				$authoritieslist=$authoritieslist.'  </tr>    
				<tr>
                	<td class="description" colspan="2" valign="top">'.$all['description'].'</td>
                </tr>
                <tr>
                	<td class="sub">活動名稱&nbsp;:&nbsp;</td>
                    <td class="name">'.$all['name'].'</td>
                </tr>
                <tr>
                	<td class="sub">開始時間&nbsp;:&nbsp;</td>
                    <td class="time">'.$all['starttime'].'&nbsp;&nbsp;'.$all['extratime'].'</td>
                </tr>
                <tr>
                	<td class="sub">結束時間&nbsp;:&nbsp;</td>
                    <td class="time">'.$all['endtime'].'&nbsp;&nbsp;'.$all['extratime2'].'</td>
                </tr>
                <tr>
                	<td class="sub">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;點&nbsp;:&nbsp;</td>
                    <td class="venue">'.$all['venue'].'</td>
                </tr>
                <tr>
                	<td class="sub">費&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;:&nbsp;</td>
                    <td class="fee">'.$all['fee'].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">主辦單位&nbsp;:&nbsp;</td>
                    <td class="host">'.$all['host'].'</td>
                </tr>';
				if($all['note'] != ''){
					$authoritieslist = $authoritieslist.'<tr>
						<td>附&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;註&nbsp;:&nbsp;</td>
						<td class="note">'.$all['note'].'</td>
						</tr>';
				}
				$authoritieslist = $authoritieslist.'
				<tr>
					<td colspan="2" align="left">
						<div class="fb-like" data-href="'.$all["url2"].'" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false"></div>
					</td>
				</tr>
            </table><br/><img src="activities/images/grayline.png" /><br />';
				
            }
		}
		//藝文音樂列表
		elseif($all["type"] == "concerts"){
			if(date('Y-m-d') <= $all['endtime']){
				$time = "".$all['starttime']."-";
				list($year, $month, $day) = explode("-", $time);
				if($all["starttime"] <= date("Y-m-d") && $all["endtime"] >= date("Y-m-d"))
					$pic = "button8.png";
				$concertslist=$concertslist.'
        	<table background="activities/images/table.jpg" style="background-repeat:no-repeat" width="875px" class="info">
            	<tr>
                	<td rowspan="10" class="tdimg" height="224" width="38%" align="center" valign="middle"><img class="img" height="210" width="300" src="member/images/'.$all['stu_id'].'/activities/'.$all['poster'].'" /></td>
					<td rowspan="10" width="2%"></td>
                    <td class="title" width="300px" valign="top" align="left" colspan="2">'.$all['title'].'</td>
                    <td rowspan="10" width="10%"></td>';
				if($_SESSION['stu_id'] == $all['stu_id']){
					$concertslist = $concertslist.'
						<td align="center" width="26%" rowspan="2" style="font-size:14px"><form action="activities/apply/index.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=918,height=545\')"><input type="hidden" name="rno" value="'.$all['rno'].'" /><input type="submit" class="button4" style="background-image:url(activities/images/button4.png); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115px; height:34px; cursor:pointer;" value="" /></form><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script>
</td>';
				}
				else if($_SESSION['stu_id'] != $all['stu_id'] && $all['signup'] == 'yes' && $all['url1'] != ''){
					if($all["starttime"] > date("Y-m-d"))
						$pic = "button3.png";
					$concertslist = $concertslist.'
						<td align="center" width="26%" rowspan="2" style="font-size:14px"><form action="activities/apply/index.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$all['rno'].'" /><input type="submit"  class="button3" style="background-image:url(activities/images/'.$pic.'); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115px; height:34px; cursor:pointer;" value="" /></form><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
				}
				else if($_SESSION['stu_id'] != $all['stu_id'] && $all['signup'] == 'no' && $all['url1'] != ''){
					if($all["starttime"] > date("Y-m-d"))
						$pic = "button6.png";
					$concertslist=$concertslist.'
						<td align="center" width="14%" rowspan="2" style="font-size:14px"><form action="activities/apply/index.php" method="get" target="foo" onSubmit="window.open(\'\',\'foo\',\'menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=900,height=700\')"><input type="hidden" name="rno" value="'.$all['rno'].'" /><input class="button6" type="submit" style="background-image:url(activities/images/'.$pic.'); background-repeat:no-repeat; background-size:115px 34px; border:0; width:115px; height:34px; cursor:pointer;" value="" /></form><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
				}
				else if($_SESSION['stu_id'] != $all['stu_id'] && $all['signup'] == 'no' && $all['url1'] == ''){
					if($all["starttime"] > date("Y-m-d"))
						$pic = "button2.png";
					$concertslist=$concertslist.'
						<td align="center" width="20%" rowspan="2" style="font-size:14px"><a target="_blank" href="'.$all['url2'].'"><img src="activities/images/'.$pic.'" class="button2" width="115" height="34" /></a><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;<script language="javascript">var now=new Date();var spday=new Date('.$year.','.$month.'-1,'.$day.');a=(spday.getTime()-now.getTime())/(24*60*60*1000);a=Math.ceil(a); if(a<0){document.write("<b>0</b>");} else {document.write("<b>"+a+"</b>");}</script></td>';
				}
				$concertslist=$concertslist.'  </tr>    
				<tr>
                	<td class="description" colspan="2" valign="top">'.$all['description'].'</td>
                </tr>
                <tr>
                	<td class="sub">活動名稱&nbsp;:&nbsp;</td>
                    <td class="name">'.$all['name'].'</td>
                </tr>
                <tr>
                	<td class="sub">開始時間&nbsp;:&nbsp;</td>
                    <td class="time">'.$all['starttime'].'&nbsp;&nbsp;'.$all['extratime'].'</td>
                </tr>
                <tr>
                	<td class="sub">結束時間&nbsp;:&nbsp;</td>
                    <td class="time">'.$all['endtime'].'&nbsp;&nbsp;'.$all['extratime2'].'</td>
                </tr>
                <tr>
                	<td class="sub">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;點&nbsp;:&nbsp;</td>
                    <td class="venue">'.$all['venue'].'</td>
                </tr>
                <tr>
                	<td class="sub">費&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;:&nbsp;</td>
                    <td class="fee">'.$all['fee'].'</td>
                </tr>
                <tr valign="top">
                	<td class="sub">主辦單位&nbsp;:&nbsp;</td>
                    <td class="host">'.$all['host'].'</td>
                </tr>';
				if($all['note'] != ''){
					$concertslist = $concertslist.'<tr>
						<td>附&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;註&nbsp;:&nbsp;</td>
						<td class="note">'.$all['note'].'</td>
						</tr>';
				}
				$concertslist = $concertslist.'
				<tr>
					<td colspan="2" align="left">
						<div class="fb-like" data-href="'.$all["url2"].'" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false"></div>
					</td>
				</tr>
            </table><br/><img src="activities/images/grayline.png" /><br />';
				
            }
		}
	}
?>

<!DOCTYPE HTML>
<html><head>
<link href="global/images/tm2.ico" rel="shortcut icon"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="zh-tw">
<link rel="stylesheet" type="text/css" href="plugin/shadowbox/shadowbox.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="plugin/shadowbox/shadowbox.js"></script>
<script type="text/javascript" src="plugin/jrumble/jquery.jrumble.1.3.min.js"></script>
<script type="text/javascript" src="plugin/bsjq/basic-jquery-slider.min.js"></script>
<link type="text/css" rel="stylesheet" href="plugin/bsjq/basic-jquery-slider.css" />
<title><?php if($count!=0) echo "(".$count.")" ?> 活動牆 ─ Airstage 西灣人</title>
<style fprolloverstyle>
A:hover {text-decoration: underline; font-weight: bold;}
a{text-decoration:none;}
</style>
<link rel="stylesheet" type="text/css" href="global/css/index.css">

<script type="text/javascript">
/*google分析*/
var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34181090-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
/*google分析*/
var app = "index";
$(function(){
	Shadowbox.init({
		players : ['html'],
		overlayColor: "#FFFFFF",
	});
	$(document).ready(function(){
	$(".button4").each(function() {
	    if($(this).css("background-image") != "url(activities/images/button8.png)"){
	       $(this).hover(function() {
	            $(this).css("background-image", "url(activities/images/button402.png)");
           }, function() {
                $(this).css("background-image", "url(activities/images/button4.png)");
           });
	    }
	    else {
	        $(this).hover(function() {
                $(this).css("background-image", "url(activities/images/button802.png)");
           }, function() {
                $(this).css("background-image", "url(activities/images/button8.png)");
           });
	    }
	});
	$(".button6").each(function() {
        if($(this).css("background-image") == "url(activities/images/button8.png)"){
           $(this).hover(function() {
                $(this).css("background-image", "url(activities/images/button602.png)");
           }, function() {
                $(this).css("background-image", "url(activities/images/button6.png)");
           });
        }
        else {
            $(this).hover(function() {
                $(this).css("background-image", "url(activities/images/button802.png)");
           }, function() {
                $(this).css("background-image", "url(activities/images/button8.png)");
           });
        }
    });
    $(".button3").each(function() {
        if($(this).css("background-image") != "url(activities/images/button8.png)"){
           $(this).hover(function() {
                $(this).css("background-image", "url(activities/images/button302.png)");
           }, function() {
                $(this).css("background-image", "url(activities/images/button3.png)");
           });
        }
        else {
            $(this).hover(function() {
                $(this).css("background-image", "url(activities/images/button802.png)");
           }, function() {
                $(this).css("background-image", "url(activities/images/button8.png)");
           });
        }
    });
	$(".button2").each(function() {
        if($(this).attr("src") != "activities/images/button8.png"){
           $(this).hover(function() {
                $(this).attr("src", "activities/images/button202.png");
           }, function() {
                $(this).attr("src", "activities/images/button2.png");
           });
        }
        else {
            $(this).hover(function() {
                $(this).attr("src", "activities/images/button802.png");
           }, function() {
                $(this).attr("src", "activities/images/button8.png");
           });
        }
    });
	$(".description, .title, .name, .time, .venue, .fee, .host, .note").attr("align","left");
	$(".sub").attr("width", "68px");
	$(".info").each(function(){
		$(this).hover(function(){
			$(this).attr("background", "activities/images/table2.jpg");
		}, function() {
			$(this).attr("background", "activities/images/table.jpg");
		})
	})
	$('#banner').bjqs({
          'animation' : 'slide',
          'width' : 961,
          'height' : 366,
		  'nextText' : '<img src="activities/images/rightafter.png" name="right" onMouseOver="document.right.src=\'activities/images/arrowsright.png\'" onMouseOut="document.right.src=\'activities/images/rightafter.png\'" />',
		  'prevText' : '<img src="activities/images/leftafter.png" name="left" onMouseOver="document.left.src=\'activities/images/arrowsleft.png\'" onMouseOut="document.left.src=\'activities/images/leftafter.png\'" />',
		  'showMarkers' : true,
		  'centerMarkers' : true,
		  'animationDuration': 1200,
		  'rotationSpeed' : 12000,
    });
		$('#fpAnimswapImgFP12').jrumble({
			x:2,
			y:2,
			rotation:1,
		});
		$('#fpAnimswapImgFP12').hover(function(){
			$(this).trigger('startRumble'); 
		}, function(){
			$(this).trigger('stopRumble');
        });
        $("#Image16").hover(function(){
        	$(this).attr("src", "activities/images/sharenew2.png");
        }, function(){
	       	$(this).attr("src", "activities/images/sharenew.png") 
        });
		$('#hot1').click(function(){
			var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
				$body.animate({
					scrollTop: $('#hot').offset().top-60
			}, 600);
			return false;
		});
		$('#clubs1').click(function(){
			var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
				$body.animate({
					scrollTop: $('#clubs').offset().top-60
			}, 600);
			return false;
		});
		$('#departments1').click(function(){
			var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
				$body.animate({
					scrollTop: $('#departments').offset().top-60
			}, 600);
			return false;
		});
		$('#authorities1').click(function(){
			var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
				$body.animate({
					scrollTop: $('#authorities').offset().top-60
			}, 600);
			return false;
		});
		$('#concerts1').click(function(){
			var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
				$body.animate({
					scrollTop: $('#concerts').offset().top-60
			}, 600);
			return false;
		});
	});
});
</script>


<style type="text/css">
body,td,th {
	font-family: "微軟正黑體";
}
body {
	background-image: url(global/images/bot.png);
	background-repeat: repeat-x;
}
#glideDiv0 {
	position:fixed;
	top:0;
	left:0;
	width:100%;
}
</style>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">

<div align="center">
  <?php require("global/navi_white/navi.php"); ?>
  <table width="980" border="0" cellpadding="0" cellspacing="0">
	  <tr>
	    <td colspan="3" align="center" valign="top" background="global/images/bot.png"><div align="center">
	      <?php include('news/news.php') ?>
        </div></td>
    </tr>
	  <tr>
	    <td colspan="3" align="center" valign="top" background="global/images/bot.png"><p>&nbsp;</p>
	      <!--------活動列表-------------->
	      <table width="862">
	<tr>
    	<td width="721" align="center" style="color:#333333; font-size:9pt">
        <table height="14" border="0" width="610">
        	<tr height="14">
            	<td width="144"><img src="images/b.png" width="144" height="6"></td>
                <td width="80"><a style="border:0; color:#333333; font-size:11pt; cursor:pointer" id="hot1" href="#hot"><b>熱門精選</b></a></td>
                <td <?php echo ''.$hclass.'><b>'.$h.''; ?></b></td>
                <td width="80" align="right"><a style="border:0; color:#333333; font-size:11pt; cursor:pointer" id="clubs1" href="#clubs"><b>社團組織</b></a></td>
                <td <?php echo ''.$cclass.'><b>'.$c.''; ?></b></td>
                <td width="80" align="right"><a style="border:0; color:#333333; font-size:11pt; cursor:pointer" id="departments1" href="#departments"><b>校內系所</b></a></td>
                <td <?php echo ''.$dclass.'><b>'.$d.''; ?></b></td>
                <td width="80" align="right"><a style="border:0; color:#333333; font-size:11pt; cursor:pointer" id="authorities1" href="#authorities"><b>校方機構</b></a></td>
                <td <?php echo ''.$aclass.'><b>'.$a.''; ?></b></td>
    	  		<td width="80" align="right"><a style="border:0; color:#333333; font-size:11pt; cursor:pointer" id="concerts1" href="#concerts"><b>藝文音樂</b></a></td>
                <td <?php echo ''.$conclass.'><b>'.$con.''; ?></b></td>
            </tr>
        </table>
        </td>
    	<td width="133" align="center" style="color:#333333; font-size:9pt"><a onClick="window.open('activities/share.php','','menubar=no,status=no,scrollbars=no,top=200,left=200,toolbar=no,width=925,height=546')" style="border:0; cursor:pointer"><img src="activities/images/sharenew.png" id="Image16" width="133" height="32" border="0"></a></td>
        </tr>
    <tr>
    	<td colspan="2"><img src="activities/images/hor.jpg" width="850" /></td>
    </tr>
	<!--熱門精選-->
	<tr>
    	<td colspan="2" align="left"><a id="hot" name="hot" style="cursor:pointer; border:0"><img src="activities/images/t1.jpg" name="hot" /></a></td>
    </tr>
    <tr>
        <td colspan="2" id="main">
        <?php
		echo $hotlist;
		?>
        </td>
    </tr>
    <!--社團組織-->
    <tr>
    	<td colspan="2" align="left"><a id="clubs" name="clubs" style="cursor:pointer; border:0"><img src="activities/images/t2.jpg" name="clubs" /></a></td>
    </tr>
    <tr>
        <td colspan="2">
        <?php
        echo $clubslist;
		?>
        </td>
    </tr>
    <!--校內系所-->
    <tr>
    	<td colspan="2" align="left"><a id="departments" name="departments" style="cursor:pointer; border:0"><img src="activities/images/t3.jpg" name="departments" /></a></td>
    </tr>
    <tr>
        <td colspan="2">
        <?php
		echo $departmentslist;
		?>
        </td>
    </tr>
    <!--校方機構-->
    <tr>
    	<td colspan="2" align="left"><a id="authorities" name="authorities" style="cursor:pointer; border:0"><img src="activities/images/t4.jpg" name="authorities" /></a></td>
    </tr>
    <tr>
        <td colspan="2">
        <?php
		echo $authoritieslist;
		?>
        </td>
    </tr>
    <!--藝文音樂-->
    <tr>
    	<td colspan="2" align="left"><a id="concerts" name="concerts" style="cursor:pointer; border:0"><img src="activities/images/t5.jpg" name="concerts" /></a></td>
    </tr>
    <tr>
        <td colspan="2">
        <?php
		echo $concertslist;
		?>
        </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
          </table>
<!----------活動列表-------------->
</td>
      </tr>
	  <tr>
	    <td height="106" style="background-image:url(global/images/last.png)" colspan="3" align="left" valign="top">
	    	<?php require("global/footer.php"); ?>
	    </td>
      </tr>
  </table>
</div>
<!--div id="fb-root"></div>
<script>
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	} (document, 'script', 'facebook-jssdk'));
</script-->

<?php mysqli_close( $conn ); ?>

</body>

</html>