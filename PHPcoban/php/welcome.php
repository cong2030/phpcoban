<?php
if (!isset($_COOKIE["is_logged_in"])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Chào mừng bạn đến với ngôi nhà của <?php echo $_COOKIE["username"]; ?>!</h2>
<p><a href="logout.php">Đăng xuất</a></p>
