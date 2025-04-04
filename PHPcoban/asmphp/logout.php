<?php
    session_start();
    unset($_SESSION['user']);
    $_SESSION['success_message'] = "Bạn đã đăng xuất thành công!";
    header("Location: login.php");
    exit();
?>
