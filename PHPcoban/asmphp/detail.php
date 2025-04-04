<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    $_SESSION['success_message'] = "Không tìm thấy sinh viên!";
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$students = $_SESSION['students'];

$currentStudent = null;
foreach ($students as $student) {
    if ($student['id'] == $id) {
        $currentStudent = $student;
        break;
    }
}

if (!$currentStudent) {
    $_SESSION['success_message'] = "Không tìm thấy sinh viên!";
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết Sinh Viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <div class="card shadow-lg p-4">
        <h2 class="mb-4 text-primary">📄 Chi tiết Sinh Viên</h2>

        <div class="mb-3">
            <strong>ID:</strong>
            <p class="form-control"><?= $currentStudent['id'] ?></p>
        </div>

        <div class="mb-3">
            <strong>Họ và Tên:</strong>
            <p class="form-control"><?= $currentStudent['name'] ?></p>
        </div>

        <div class="mb-3">
            <strong>Ngày Sinh:</strong>
            <p class="form-control"><?= date("d/m/Y", strtotime($currentStudent['dob'])) ?></p>
        </div>

        <div class="mb-3">
            <strong>Email:</strong>
            <p class="form-control"><?= $currentStudent['email'] ?></p>
        </div>

        <div class="mb-3">
            <strong>Số Điện Thoại:</strong>
            <p class="form-control"><?= $currentStudent['phone'] ?></p>
        </div>
        <div class="mb-3">
            <strong>Địa chỉ:</strong>
            <p class="form-control"><?= $currentStudent['address'] ?? 'Chưa cập nhật' ?></p>
        </div>
        <div class="mb-3">
            <strong>Trạng thái:</strong>
             <?php if ($currentStudent['status'] == 1) : ?>
                <span class="badge bg-success">đang  học</span>
            <?php else : ?>
                <span class="badge bg-danger">nghỉ học</span>
            <?php endif; ?>
        </div>
        
        <a href="index.php" class="btn btn-secondary">⬅ Quay lại</a>
    </div>

</body>
</html>
