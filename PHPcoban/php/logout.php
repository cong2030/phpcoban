<?php
foreach ($_COOKIE as $key => $value) {
    setcookie($key, "", time() - 3600, "/");
}
echo "Đã xoá tất cả cookie.";
?>
