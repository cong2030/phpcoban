<?php
//bai2
// Biến toàn cục
$globalMessage = "Chào mừng bạn đến với hệ thống!";

// Hàm chào mừng người dùng
function greetUser($name = "Guest") {
    global $globalMessage; // Sử dụng biến toàn cục
    $localMessage = "Chúc bạn một ngày tốt lành!"; // Biến cục bộ

    echo "$globalMessage Xin chào, $name! $localMessage <br>";
}

// Gọi hàm với các giá trị khác nhau
greetUser(); // Mặc định là "Guest"
greetUser("em công");
greetUser("công");
?>


