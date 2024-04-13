<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "web2";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Xử lý dữ liệu từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];
    $address = $_POST['address'];

    // Cập nhật thông tin người dùng trong cơ sở dữ liệu
    $sql = "UPDATE taikhoannguoidung 
            SET user_name='$fullname', 
                user_email='$email', 
                user_phone='$phone', 
                user_address='$address' 
            WHERE user_id = 1"; // Thay user_id = 1 bằng ID của người dùng muốn cập nhật thông tin

    if ($conn->query($sql) === TRUE) {
        // Hiển thị thông báo cập nhật thành công
        echo "<script>alert('Cập nhật thông tin thành công');</script>";
    } else {
        // Hiển thị thông báo lỗi
        echo "Lỗi: " . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
?>
