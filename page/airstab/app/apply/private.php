<?php
echo'
<div id="private">
<form action="apply02.php?action=private" method="post">
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
	$prirno = $url['rno'];
	$private = $_POST['private'];
	$old = $url['stu_id'];
	$new = ''.$old.','.$private.'';
	$updatepri = "UPDATE Activities SET stu_id = '$new' WHERE rno = $prirno";
	
	if(mysqli_query($conn, $updatepri)){
		echo '<script type="text/javascript" language="javascript">alert("設定成功!"); window.reload();</script>';
	}
	else{
		echo '<script type="text/javascript" language="javascript">alert("設定失敗!請重新再來"); window.reload();</script>';
	}
}
?>