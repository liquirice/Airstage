<?php
echo'
<div id="private">
<form action="apply02.php?action=private" method="post" target="_self">
<table align="center" background="jpg/st.png" style="background-repeat:no-repeat">
	<tr>
		<td>可管理此活動者的學號:</td><td>'.$url['stu_id'].'</td>
	</tr>
	<tr>
		<td align="center">請輸入欲共同管理此活動者的學號</td>
		<td><input type="text" name="private" /><br /><span style="color:#FF0000; font-size:12px">請將各個學號以","分開</span></td>
	</tr>
	<tr>
		<td align="center">請輸入欲刪除管理此活動者的學號</td>
		<td><input type="text" name="delete" /><br /><span style="color:#FF0000; font-size:12px">請將各個學號以","分開</span></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" value="提交" /></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="button" class="back" value="返回上頁" /></td>
	</tr>
</table>
</form>
</div>
';
if($_SESSION['record'] == 'private'){
	//新增權限部份
	//如果有輸入新增的學號
	if($_POST['private'] != ''){
		$prirno = $url['rno'];
		$private = $_POST['private'];
		$old = $url['stu_id'];
		$new = ''.$old.','.$private.'';
	}
	else
		$new = '';
	//刪除權限的部份
	//如果有輸入刪除的學號
	if($_POST['delete'] != ''){
		$tempdel = ''.$_POST['delete'].',';
		$delete = explode(',', $tempdel);
		$tempexi = ''.$url['stu_id'].',';
		$exist = explode(',', $tempexi);
		$exi = 0;
		$del = 0;
		while($exist[$exi] != NULL){
			$exi++;
		}
		while($delete[$del] != NULL){
			$del++;
		}
		for($de=0; $de < $del; $de++){
			for($ex=0; $ex < $exi; $ex++){
				if($delete[$de] == $exist[$exi]){
					$new = ''.$new.'';
				}
				else if($delete[$de] != $exist[$exi]){
					if($new == ''){
						$new = ''.$exist[$exi].'';
					}
					else
						$new = ''.$new.''.$exist[$exi].'';
				}
			}
		}
		if($new == $url['stu_id']){
			echo '<script language="javascript" type="text/javascript">alert("您欲刪除之學號並無權限,請再三確認後才輸入,謝謝!"); location.href="apply02.php?option=type";</script>';
		}
	}
	if($new == ''){
		echo '<script language="javascript" type="text/javascript">alert("不能將所有權限都刪除,請重新操作"); location.href="apply02.php?option=type;"</script>';
	}
	else{
		$updatepri = "UPDATE Activities SET stu_id = '$new' WHERE rno = $prirno";
	
		if(mysqli_query($conn, $updatepri)){
			echo '<script type="text/javascript" language="javascript">alert("設定成功!"); location.href="apply02.php?option=type;</script>';
		}
		else{
			echo '<script type="text/javascript" language="javascript">alert("設定失敗!請重新再來"); location.href="apply02.php?option=type;</script>';
		}
	}
}
?>