<?php
// Thêm địa chỉ mới sau khi đặt hàng
require_once 'ketnoi.php';

if(isset($_POST['add'])){
    $user_address_official = $_POST['user_address_official'];
    $user_id = $_POST['user_id'];

    // Thực hiện truy vấn INSERT với sử dụng giá trị của biến $user_id
    if($conn->query("INSERT INTO hoa_don (user_id, user_address_official) VALUES ($user_id, N'$user_address_official')")){
        echo "Đặt hàng thành công!";
    } else {
        echo "Đặt hàng không thành công!";
    }
}
?>
