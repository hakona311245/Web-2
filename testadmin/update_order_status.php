<?php
// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'web');

// Kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Lấy thông tin từ request GET
if (isset($_GET['order_id']) && isset($_GET['status'])) {
    $orderId = $_GET['order_id'];
    $status = $_GET['status'];

    // Cập nhật trạng thái đơn hàng vào bảng order_products
    $sql = "UPDATE order_products SET order_status = '$status' WHERE id = $orderId";

    if (mysqli_query($conn, $sql)) {
        echo "Trạng thái đơn hàng đã được cập nhật thành công.";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}

// Đóng kết nối
mysqli_close($conn);
?>
