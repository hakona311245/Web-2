<?php
// Kiểm tra xem có product_id được gửi đến không
if(isset($_POST['product_id'])) {
    // Lấy product_id từ dữ liệu gửi đi
    $productId = $_POST['product_id'];

    // Kết nối đến cơ sở dữ liệu (thay đổi thông tin kết nối phù hợp)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web2";

    // Tạo kết nối đến cơ sở dữ liệu
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    // Sử dụng prepared statement để xóa sản phẩm
    $sql = "DELETE FROM sanpham WHERE product_id = ?";
    $stmt = $conn->prepare($sql);

    // Kiểm tra xem prepared statement có thành công không
    if ($stmt) {
        // Gán giá trị cho tham số
        $stmt->bind_param("i", $productId);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            // Nếu xóa thành công, chuyển hướng hoặc hiển thị thông báo thành công
            header("Location: giohang.php"); // Chuyển hướng đến trang giỏ hàng sau khi xóa
            exit();
        } else {
            // Nếu có lỗi xảy ra trong quá trình xóa, hiển thị thông báo lỗi
            echo "Lỗi khi thực hiện câu lệnh xóa: " . $stmt->error;
        }

        // Đóng prepared statement
        $stmt->close();
    } else {
        // Nếu có lỗi khi chuẩn bị câu lệnh, hiển thị thông báo lỗi
        echo "Lỗi khi chuẩn bị câu lệnh: " . $conn->error;
    }

    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
} else {
    // Nếu không có product_id được gửi đến, xử lý hoặc chuyển hướng người dùng
    echo "Không có sản phẩm nào được chọn để xóa.";
}
?>
