<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thu Thập Thông Tin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
$girlFriendName = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy tên người yêu cũ từ form
    if(isset($_POST['save'])){
        $girlFriendName =($_POST['name']);

        // biết lưu huỷ bằng cách
        
        // Kiểm tra nếu tên là "Công Hưng"
        if ($girlFriendName === "Công Hưng") {
            $message = "$girlFriendName không phải nyc của bạn";
        } else {
            $message = "Tên bạn nhập là: $girlFriendName";
        }
    }
    
}
?>

<body class="container mt-5">
    <h2 class="mb-4">Nhập Thông Tin Cá Nhân</h2>
    <form method="post" action="" class="border p-4 rounded shadow-sm">
        <div class="mb-3">
            <label for="name" class="form-label">Tên người yêu cũ:</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($girlFriendName) ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ:</label>
            <input type="text" id="address" name="address" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="situation" class="form-label">Hoàn cảnh:</label>
            <input type="text" id="situation" name="situation" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="income" class="form-label">Thu nhập:</label>
            <input type="number" id="income" name="income" class="form-control" required>
        </div>
        
        <div class="form-check mb-3">
            <input type="checkbox" id="married" name="married" class="form-check-input">
            <label for="married" class="form-check-label">Đã có chồng</label>
        </div>
        
        <div class="form-check mb-3">
            <input type="checkbox" id="has_children" name="has_children" class="form-check-input">
            <label for="has_children" class="form-check-label">Đã có con</label>
        </div>
        
        <button type="submit" class="btn btn-primary" name="save">Lưu thông tin</button>
        <button type="submit" class="btn btn-danger"  name="save">Huỷ thông tin</button>
    </form>

    <?php if ($message): ?>
        <div class="alert alert-warning mt-3"> <?= htmlspecialchars($message) ?> </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
