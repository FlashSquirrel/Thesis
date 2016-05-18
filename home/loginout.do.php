<?php
if($_GET['action'] == "logout"){
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    echo '注销登录成功！点击此处 <a href="login.php">登录</a>';
    exit;
}
//
//unset($_SESSION['id']);
//unset($_SESSION['name']);
//session_destroy();
//echo "<script>location.href='login.php';</script>";
//exit();
?>