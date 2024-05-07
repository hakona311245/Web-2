<?php
// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'web');

// Kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Lấy thông tin từ request GET
if (isset($_GET['order_id']) && isset($_GET['delivery_time'])) {
    $orderId = $_GET['order_id'];
    $deliveryTime = $_GET['delivery_time'];

    // Cập nhật thời gian giao hàng vào bảng order_details
    $sql = "UPDATE order_details SET day_delivered = '$deliveryTime' WHERE order_id = $orderId";

    if (mysqli_query($conn, $sql)) {
        echo "Thời gian giao hàng đã được cập nhật thành công.";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}

// Đóng kết nối
mysqli_close($conn);
?>
