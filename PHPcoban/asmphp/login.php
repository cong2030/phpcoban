<?php
session_start();

$users = [
    'Công' => '1',   
    'user1' => '2'    
];

$logout_message = "";
if (isset($_SESSION['success_message'])) {
    $logout_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu!";
    } elseif (!isset($users[$username])) {
        $error = "Tên đăng nhập hoặc Mật khẩu không tồn tại!";
    } elseif ($users[$username] !== $password) {
        $error = "Tên đăng nhập hoặc Mật khẩu không tồn tại";
    } else {
        $_SESSION['user'] = $username;
        $_SESSION['success_message'] = "Đăng nhập thành công!";
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h2 class="mb-3">Đăng nhập</h2>

    <?php if (!empty($logout_message)) : ?>
        <div class="alert alert-success"><?= $logout_message ?></div>
    <?php endif; ?>

    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập</label>
            <input type="text" name="username" id="username" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" name="password" id="password" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary">Đăng nhập</button>
    </form>

</body>
</html>
