<?php
// Khởi động phiên làm việc
session_start();

// Kiểm tra nếu người dùng đã đăng nhập
if (isset($_SESSION['user_id'])) {
    // Xóa tất cả các biến phiên
    session_unset();
    
    // Hủy phiên hiện tại
    session_destroy();
}

// Chuyển hướng người dùng về trang index.php
header("Location: index.php");
exit();
?>
