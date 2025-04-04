<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thu Thập Thông Tin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body class="container mt-5">
    <h2 class="mb-4">Nhập Thông Tin Cá Nhân</h2>
    <form method="post" action="" class="border p-4 rounded shadow-sm">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control"  required>
        </div>
        
        <div class="mb-3">
            <label for="address" class="form-label">Email:</label>
            <input type="text" id="address" name="address" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="situation" class="form-label">Address:</label>
            <input type="text" id="situation" name="situation" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="income" class="form-label">Product:</label>
           <select name="product" id="product">
                <option value="laptop">laptop</option>
                <option value="smp">smp</option>
                <option value="tablet">tablet</option>
               
           </select>
        </div>

        <div class="mb-3">
            <label for="income" class="form-label">Quantity:</label>
            <input type="number" id="income" name="income" class="form-control" required>
        </div>
        
        
        <button type="submit" class="btn btn-primary" name="save">Place Order</button>
        
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
