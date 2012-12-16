<?php
/************************/
/* Dependencies: jSearch-1.0.js
/* Usage: Ajax live search query database select
/* Developer: bryantung89@gmail.com
/* Modified: N/A
/* Change log: N/A
/************************/

//set_include_path(get_include_path().PATH_SEPARATOR."/usr/share/php");
include("config.inc.php");

$searchDB = urldecode(xss_sqlClean($_POST['s']));
$query = urldecode(xss_sqlClean($_POST['q']));
if (empty($query)) {
	$query = urldecode(xss_sqlClean($_POST['k']));
	
	switch($searchDB){
		case "activities":
			$searchDB = "Activities";
			$searchRule = "type='".$query."' AND endtime>'".date("Y-m-d")."' ORDER BY starttime ASC";
			break;
			
		case "column":
			$searchDB = "Col";
			$searchRule = "";
			break;
	}
	
	$searchStmt = sprintf("SELECT * FROM %s WHERE %s",$searchDB,$searchRule);
} else {
	$queries = explode(" ",$query);
	$searchStmt = array();
	$specialType = array();
	$specialTypeColumn = "";
	foreach ($queries as $q) {
		switch($searchDB){
			case "activities":
				$searchDB = "Activities";
				$searchCol = array('title','name','description','starttime','endtime','venue','fee','host','type');
				$specialType = array('熱門'=>'hot','精選'=>'hot','社團'=>'clubs','組織'=>'clubs','校內'=>'departments','系所'=>'departments','校方'=>'authorities','機構'=>'authorities','藝文'=>'concerts','音樂'=>'concerts');
				$specialTypeColumn = "type";
				break;
				
			case "column":
				$searchDB = "Col";
				$searchCol = array('`Col`.title','`Col`.class','`Col`.stu_id','`Col`.realcontent','`Col`.uploadtime','`Member`.department','`Member`.name');
				$specialType = array('專欄'=>'column','食尚'=>'food','校園'=>'school','藝文'=>'concerts','創作'=>'concerts');
				$specialTypeColumn = "class";
				break;
		}
		$typeSearch = "";
		if (array_key_exists($q,$specialType)) {
			$typeSearch = sprintf(" OR %s LIKE '%s'",$specialTypeColumn,$specialType[$q]);
		}
		$stmt = sprintf("(%s%s)",(implode(" LIKE '%".$q."%' OR ",$searchCol))." LIKE '%".$q."%'",$typeSearch);
		array_push($searchStmt,$stmt);
	}
	
	$searchStmt = implode(' AND ',$searchStmt);
	switch($searchDB){
		case "Activities":
			$searchStmt = sprintf("SELECT * FROM %s WHERE %s AND endtime>'%s' ORDER BY starttime ASC",$searchDB,$searchStmt,date("Y-m-d"));
			break;
			
		case "Col":
			$searchStmt = sprintf("SELECT `Col`.*,`Member`.name,`Member`.department,`Member`.grade FROM `Col` JOIN `Member` ON `Col`.stu_id=`Member`.stu_id WHERE %s AND `Col`.shelf='article' ORDER BY `Col`.view DESC",$searchStmt);
			break;
	}
}

$getResult = mysqli_query($conn,$searchStmt);
$results = array();
while($res = mysqli_fetch_assoc($getResult)){
	switch($searchDB){
		case "Activities":
			$eNote = (!empty($res['note']))?'附　　註：<br><span style="color:#F00;">'.$res['note'].'</span><br>':'';
			$eCountdown = 0;
			if (strtotime($res['starttime'])>strtotime(date("Y-m-d"))) {
				$eCountdown = date("j",strtotime($res['starttime'])-strtotime(date("Y-m-d")));
			}
			$eLinkButton = '<a href="'.$res['url2'].'"><img src="../jpg/button'.($eCountdown==0?8:2).'.png" /></a>';
			$eTypeImg = array('hot'=>'t1','clubs'=>'t2','departments'=>'t3','authorities'=>'t4','concerts'=>'t5');
			$new = '
				<div class="event_strip">
					<div class="fleft event_img">
						<img src="../activities/poster/'.$res['poster'].'" width="300" />
					</div>
					<div class="fleft event_detail">
						<img src="../activities/jpg/'.$eTypeImg[$res['type']].'.jpg" />
						<div class="fb-like" data-href="'.$res["url2"].'" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false"></div>
						<h4>'.$res['title'].'</h4>
						<p>'.$res['description'].'</p>
						活動名稱：'.$res['name'].'<br>
						開始時間：'.$res['starttime'].' '.$res['extratime'].'<br>
						結束時間：'.$res['endtime'].'<br>
						活動地點：'.$res['venue'].'<br>
						費　　用：'.$res['fee'].'<br>
						主辦單位：'.$res['host'].'<br>
						'.$eNote.'<br>
					</div>
					<div class="event_cd">
						'.$eLinkButton.'<br>
						倒數 <span>'.$eCountdown.'</span> 天<br>
					</div>
					<div class="event_hr"></div>
				</div>
			';
			$new = preg_replace('/(\n\r|\r|\n|\t)/','',trim($new));
			array_push($results,$new);
			break;
			
		case "Col":
			$previewContent = strip_tags($res['realcontent']);
			if (mb_strlen($previewContent,"utf-8")>180) $previewContent = mb_substr($previewContent,0,180,"utf-8")."...";
			$new = '
				<div align="center" style="width:70%; cursor:pointer; margin:8px 0px;" class="article_strip" onclick="window.location.href=\'read.php?rno='.$res['rno'].'\'">
					<div style="float:left; width:26%;">
						<img src="../../accounts/images/'.$res['stu_id'].'/col/'.$res['front'].'" title="'.$res['title'].'" width="150" style="padding:5px; border:1px solid #EEE;" />
					</div>
					<div style="float:left; width:70%; text-align:justify; text-justify:inter-word;">
						<div style="clear:both;">
							<span style="color:#F16522; font-size:16px; float:left;">'.$res['title'].'</span>
							<span style="color:#777; font-size:11px; float:right; line-height:1.5;">'.$res['name'].'/'.$res['department'].$res['grade'].'級</span>
						</div>
						<div style="font-size:11px; line-height:2; clear:both;">'.$previewContent.'</div>
					</div>
					<div style="width:100%; background:url(/nsysu/airs/jpg/hor.jpg) top no-repeat; height:9px; clear:both;"></div>
				</div>
			';
			$new = preg_replace('/(\n\r|\r|\n|\t)/','',trim($new));
			array_push($results,$new);
			break;
	}
}

echo json_encode($results);
?>