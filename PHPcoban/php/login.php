<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // So sánh với cookie đã lưu
    if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
        if ($_COOKIE["username"] === $username && $_COOKIE["password"] === $password) {
            // Lưu trạng thái đăng nhập
            setcookie("is_logged_in", "1", time() + 3600, "/");
            header("Location: welcome.php");
            exit();
        } else {
            $error = "Sai tài khoản hoặc mật khẩu.";
        }
    } else {
        $error = "Chưa có người dùng nào được đăng ký.";
    }
}
?>

<h2>Đăng nhập</h2>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="post" action="">
    Tên đăng nhập: <input type="text" name="username" required><br><br>
    Mật khẩu: <input type="password" name="password" required><br><br>
    <input type="submit" value="Đăng nhập">
</form>
