<?php session_start();
include('po/conn.php');
$id = $_POST['id'];
$pw = $_POST['pw'];

//搜尋資料庫資料
$sql = "SELECT * FROM Member where username = '$id'";
$result = mysqli_query($conn, $sql);
$row = @mysql_fetch_row($result);

//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($id != null && $pw != null && $row[1] == $id && $row[2] == $pw)
{
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['username'] = $id;
        echo '<script type="text/javascript" language="javascript">alert("登入成功！");location.href="./index.htm"</script>';
}
else
{
        echo '<script type="text/javascript" language="javascript">alert("登入失敗！");location.href="./login.php"</script>';
}
?>
