<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = count($_SESSION['students']) + 1;
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $status = isset($_POST['status']) ? 1 : 0;

        $_SESSION['students'][] = [
            'id' => $id, 'name' => $name, 'dob' => $dob,
            'email' => $email, 'phone' => $phone, 'address' => $address, 'status' => $status
        ];

        $_SESSION['success_message'] = "Thêm sinh viên thành công!";
        header("Location: index.php");
        exit();
    }




?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sinh Viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h2>Thêm Sinh Viên</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Họ và Tên</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Ngày sinh</label>
            <input type="date" name="dob" id="dob" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="status" id="status" checked>
                <label class="form-check-label" for="status">đang học</label>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>

</body>
</html>
