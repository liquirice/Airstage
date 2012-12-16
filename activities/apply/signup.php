<?php
session_start();
if(isset($_SESSION['name']) == false){
	$_SESSION['name'] = '';
}
require("../../global/connectVar.php");
if(empty($_SESSION['rno'])){
	echo '<script type="text/javascript" language="javascript">alert("請從首頁進入!"); location.href = "../../index.php"</script>';
}
$select = 'SELECT * FROM `Activities` WHERE rno = "'.$_SESSION['rno'].'"';
$result = mysqli_query($conn, $select);
$url = mysqli_fetch_array($result);
?>
<style>
.sub{
	color:#333333;
}
</style>
<body style="background-image: url(images/bg.png)">

<?php
if($_SESSION['name'] == ''){
echo '
<form method="post" action="submit.php?type=signup">
<table align="center" background="images/box.png" style="background-repeat:no-repeat" width="846" height="606">
<tr height="150" valign="bottom" style="font-size:22px; font-weight:bold; color:#FFF"><td width="50"></td><td align="left" width="373"> '.$url["name"].'</td><td align="right" width="373">'.$url["time"].'</td><td width="50"></td></tr>
<tr height="50"><td colspan="4"></td></tr>

<tr valign="top">
<td align="center" colspan="2">
<table width="336" style="font-size:14px">
	<tr>
		<td colspan="2" align="center" style="font-size:18px"><b>基本資料</b>&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:#808080; font-size:14px; cursor:pointer" href="../../../../member/login.php">已經註冊?</a></td>
    </tr>
    <tr>
    	<td class="sub" align="right">學號</td>
        <td><input type="text" name="stu_id" /></td>
    </tr>
    <tr>
    	<td class="sub" align="right">姓名</td>
        <td><input type="text" name="name" /></td>
    </tr>
    <tr>
    	<td class="sub" align="right">帳號</td>
        <td><input type="text" name="username" /></td>
    </tr>
    <tr>
    	<td class="sub" align="right">系級</td>
    	<td>
        	<select name="departments">
            	<option value="null">系所</option>
            </select>
        	<select name="year">
            	<option value="101">101級</option>
            </select>
        </td>
    </tr>
    <tr>
    	<td class="sub" align="right">性別</td>
        <td><input type="radio" name="gender" value="男" checked />男&nbsp;&nbsp;<input type="radio" name="gender" value="女" />女</td>
    </tr>
    <tr>
    	<td class="sub" align="right">email</td>
        <td><input type="text" name="email" /></td>
    </tr>
    <tr>
    	<td class="sub" align="right">密碼</td>
        <td><input type="password" name="psw" /></td>
    </tr>
    <tr>
    	<td class="sub" align="right">確認密碼</td>
        <td><input type="password" name="psw2" /></td>
    </tr>
    <tr>
    	<td colspan="2" height="50" valign="bottom" style="color:#808080;">輸入完基本資料等同於同時完成<a href="../../index.php" target="_blank" style="color:#0066FF">「Airstage西灣人」</a>帳號的註冊</td>
    </tr>
</table>';
}
else {
	echo '
	<form method="post" action="submit.php?type=logged">
<table align="center" background="images/box.png" style="background-repeat:no-repeat" width="846" height="606">
<tr height="150" valign="bottom" style="font-size:22px; font-weight:bold; color:#FFF"><td width="50"></td><td align="left" width="373"> '.$url["name"].'</td><td align="right" width="373">'.$url["time"].'</td><td width="50"></td></tr>
<tr height="50"><td colspan="4"></td></tr>
<tr valign="top">
<td style="font-size:14px" align="center" width="496" colspan="2"><b>歡迎，'.$_SESSION['name'].'</b>';
}
?>
</td>

<td valign="top" colspan="2">
<table style="font-size:14px" height="98%">
	<tr>
    	<td style="font-size:18px" colspan="2" align="center"><b>活動需要資料</b></td>
    </tr>
    <tr>
    	<td class="sub" align="right">手機</td>
        <td><input type="text" name="phone" maxlength="10" /></td>
    </tr>
    <tr>
    	<td class="sub" align="right">Facebook</td>
     	<td><input type="text" name="fb" /></td>
    </tr>
    <tr>
    	<td class="sub" align="right">交通工具</td>
        <td>
        	<select name="trans">
        		<option value="步行">步行</option>
                <option value="會騎車,沒機車">會騎車,沒機車</option>
                <option value="會騎車,有機車">會騎車,有機車</option>
                <option value="汽車" >汽車</option>
            </select>
        </td>
    </tr>
    <tr>
    	<td class="sub" align="right">葷素</td>
        <td>
        	<select name="food">
            	<option value="葷食">葷食</option>
                <option value="素食">素食</option>
                <option value="不吃牛肉">不吃牛肉</option>
                <option value="不吃豬肉">不吃豬肉</option>
            </select>
        </td>
    </tr>
    <tr>
    	<td class="sub" align="right">備註</td>
        <td><textarea name="extra"></textarea></td>
    </tr>
    <tr>
    	<td colspan="2"  align="center" valign="bottom" height="109"><input type="submit" style="background-image:url(images/botton.jpg); background-repeat:no-repeat; width:138px; height:55px; border:none; cursor:pointer" value="" />
    </table>
</td>
</tr>
</table>
</form>
</body>