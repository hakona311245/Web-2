<?php
// Bắt đầu một phiên làm việc
session_start();

// Kiểm tra nếu người dùng đã đăng nhập
if(isset($_SESSION['user_id'])) {
    // Nếu có, xóa tất cả các biến phiên và hủy phiên hiện tại
    session_unset();
    session_destroy();
}

// Chuyển hướng người dùng đến trang đăng nhập hoặc trang chính sau khi đăng xuất
header("Location: login.php");
exit;
?>
