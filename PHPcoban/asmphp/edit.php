<?php
    session_start();

    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit();
    }

    $id = $_GET['id'];
    $students = &$_SESSION['students'];

    foreach ($students as &$student) {
        if ($student['id'] == $id) {
            $currentStudent = &$student;
            break;
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $currentStudent['name'] = $_POST['name'];
        $currentStudent['dob'] = $_POST['dob'];
        $currentStudent['email'] = $_POST['email'];
        $currentStudent['phone'] = $_POST['phone'];
        $currentStudent['address'] = $_POST['address'];
        $currentStudent['status'] = isset($_POST['status']) ? 1 : 0;
    
        $_SESSION['success_message'] = "Cập nhật sinh viên thành công!";
        header("Location: index.php");
        exit();
    }
    


?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa Sinh Viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h2>Sửa Thông Tin Sinh Viên</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Họ và Tên</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= $currentStudent['name'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Ngày sinh</label>
            <input type="date" name="dob" id="dob" class="form-control" value="<?= $currentStudent['dob'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $currentStudent['email'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" value="<?= $currentStudent['phone'] ?? '' ?>" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" name="address" id="address" class="form-control" value="<?= $currentStudent['address'] ?? '' ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="status" id="status" <?= isset($currentStudent['status']) && $currentStudent['status'] ? 'checked' : '' ?>>
                <label class="form-check-label" for="status">đang học</label>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
        <a href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>

</body>
</html>
