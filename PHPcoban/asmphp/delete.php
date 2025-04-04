<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['students'] = array_filter($_SESSION['students'], function ($student) use ($id) {
        return $student['id'] != $id;
    });

    $_SESSION['students'] = array_values($_SESSION['students']);

    $_SESSION['success_message'] = "Xóa sinh viên thành công!";
}

header("Location: index.php");
exit();

?>
