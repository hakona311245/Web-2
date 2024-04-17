<?php
// Kiểm tra xem có dữ liệu được gửi từ form không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem trường user_address đã được gửi từ form chưa
    if(isset($_POST["user_address"])) {
        // Lấy giá trị của trường user_address từ form
        $user_address = $_POST["user_address"];

        // Tiến hành cập nhật giá trị vào cột user_address_official trong bảng hoa_don
        try {
            // Kết nối đến cơ sở dữ liệu
            require_once("db_connection.php");

            // Chuẩn bị câu lệnh SQL để cập nhật giá trị
            $sql = "UPDATE hoa_don SET user_address_official = :user_address WHERE user_id = 10"; // Đổi user_id thành id của người dùng tương ứng

            // Chuẩn bị và thực thi câu lệnh SQL
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':user_address', $user_address);
            $stmt->execute();

            // Đóng kết nối
            $conn = null;
            
            // Chuyển hướng người dùng hoặc hiển thị thông báo thành công tùy vào yêu cầu của ứng dụng
        } catch (PDOException $e) {
            // Xử lý lỗi nếu có
            echo "Lỗi: " . $e->getMessage();
        }
    } else {
        // Xử lý nếu trường user_address không được gửi từ form
        echo "Lỗi: Không có dữ liệu được gửi từ form!";
    }
} else {
    // Xử lý nếu không phải là phương thức POST
    echo "Lỗi: Phương thức không hợp lệ!";
}
?>
