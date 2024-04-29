<?php
// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "web2");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

// Xác định product_id từ biểu mẫu POST
$product_id = $_POST['product_id'];

// Thực hiện truy vấn xóa từ bảng chitiethoadon
$delete_query = "DELETE FROM chitiethoadon WHERE product_id = '$product_id'";
if (mysqli_query($conn, $delete_query)) {
    echo "Đã xóa sản phẩm khỏi giỏ hàng thành công!";
} else {
    echo "Lỗi khi xóa sản phẩm khỏi giỏ hàng: " . mysqli_error($conn);
}

// Đóng kết nối
mysqli_close($conn);
?>
