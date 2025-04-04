<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [
        ['id' => 1, 'name' => 'công', 'dob' => '2005-05-05', 'email' => 'c@gmail.com', 'phone' => '0987654321', 'address' => 'thanh hóa', 'status' => 1],
        ['id' => 2, 'name' => 'phước', 'dob' => '2002-05-06', 'email' => 'p@gmail.com', 'phone' => '0912345678', 'address' => 'thanh hóa', 'status' => 0],
        ['id' => 3, 'name' => 'quyền', 'dob' => '2001-05-07', 'email' => 'c@gmail.com', 'phone' => '0971234567', 'address' => 'thanh hóa', 'status' => 1],
        ['id' => 4, 'name' => 'tuyên', 'dob' => '2000-05-08', 'email' => 'd@gmail.com', 'phone' => '0969876543', 'address' => 'thanh hóa', 'status' => 1],
        ['id' => 5, 'name' => 'anh', 'dob' => '2004-05-09', 'email' => 'e@gmail.com', 'phone' => '0934567890', 'address' => 'thanh hóa', 'status' => 0]
    ];
}




$students = $_SESSION['students'];

usort($students, function ($a, $b) {
    return $b['id'] - $a['id'];
});

$studentsPerPage = 10;
$totalStudents = count($students);
$totalPages = ceil($totalStudents / $studentsPerPage);

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($currentPage < 1) $currentPage = 1;
if ($currentPage > $totalPages) $currentPage = $totalPages;

$startIndex = ($currentPage - 1) * $studentsPerPage;
$studentsToShow = array_slice($students, $startIndex, $studentsPerPage);

?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sinh Viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
    body {
        background-color: #f8f9fa;
    }
    .btn-custom {
        background-color: #007bff;
        color: white;
    }
    .btn-custom:hover {
        background-color: #0056b3;
    }
    .table th {
        background-color: #007bff !important;
        color: white;
    }
</style>

</head>
<body class="container mt-5">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-primary">📋 Danh sách sinh viên</h2>
    <div>
        <span class="me-3">👤 <strong><?= $_SESSION['user'] ?></strong></span>
        <a href="logout.php" class="btn btn-danger">Đăng xuất</a>
    </div>
</div>


    <?php if (!empty($success_message)) : ?>
        <div class="alert alert-success"><?= $success_message ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-between mb-3">
    <a href="add.php" class="btn btn-orange">➕ Thêm sinh viên</a>
    <input type="text" id="searchInput" class="form-control w-25" placeholder="🔍 Bạn Muốn tìm kiếm Gì...">
</div>


    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle shadow-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ và Tên</th>
                    <th>Ngày Sinh</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa chỉ</th>
                    <!-- <th>Trạng Thái</th> -->
                    <th>Hành động</th>
                </tr>
            </thead>
        <tbody id="studentTable">
            <?php foreach ($studentsToShow as $student) : ?>
                <tr>
                    <td><?= $student['id'] ?></td>
                    <td><?= $student['name'] ?></td>
                    <td><?= date("d/m/Y", strtotime($student['dob'])) ?></td>
                    <td><?= $student['email'] ?></td>
                    <td><?= $student['phone'] ?? 'N/A' ?></td>
                    <td><?= $student['address'] ?? 'Chưa cập nhật' ?></td>
                    <!-- <td>
                        <?php if (isset($student['status']) && $student['status'] == 1) : ?>
                            <span class="badge bg-success">Hoạt động</span>
                        <?php else : ?>
                            <span class="badge bg-danger">Tạm ngừng</span>
                        <?php endif; ?>
                        
                    </td> -->
                    <td>
                        <a href="detail.php?id=<?= $student['id'] ?>" class="btn btn-info btn-sm">📄 Xem</a>
                        <a href="edit.php?id=<?= $student['id'] ?>" class="btn btn-warning btn-sm">✏ Sửa</a>
                        <a href="delete.php?id=<?= $student['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?');">🗑 Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>


    </table>
</div>

<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item <?= ($currentPage == 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $currentPage - 1 ?>">«</a>
        </li>
        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
        <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $currentPage + 1 ?>">»</a>
        </li>
    </ul>
</nav>


<script>
    document.getElementById("searchInput").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#studentTable tr");

        rows.forEach(row => {
            let name = row.cells[1].textContent.toLowerCase();
            let email = row.cells[3].textContent.toLowerCase();
            let phone = row.cells[4].textContent.toLowerCase();
            let address = row.cells[5].textContent.toLowerCase();

            if (name.includes(filter) || email.includes(filter) || phone.includes(filter) || address.includes(filter)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
</script>


</body>
</html>
