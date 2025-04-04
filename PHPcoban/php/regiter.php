<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];


    // Lưu thông tin vào cookie (giả lập DB)
    setcookie("username", $username, time() + 3600, "/");
    setcookie("password", $password, time() + 3600, "/"); // Chưa mã hóa để đơn giản
    // var_dump($_COOKIE);

    echo "Đăng ký thành công. <a href='login.php'>Đăng nhập ngay</a>";
}
?>

<h2>Đăng ký</h2>
<form method="post" action="">
    Tên đăng nhập: <input type="text" name="username" required><br><br>
    Mật khẩu: <input type="password" name="password" required><br><br>
    <input type="submit" value="Đăng ký">
</form>
