<?php
if(empty($_SESSION['name']) || empty($_SESSION['stu_id'])){
        echo '<script type="text/javascript" language="javascript">alert("請先登入!"); window.location.href="http://"+document.location.host+"/member/login.php";</script>';
}
?>