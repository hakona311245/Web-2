<?php
require_once("databaseadmin.php");
require_once("session.php");
require_once("function.php");

$filterAll = filter();

if(!empty($filterAll['user_id'])){
    $userID = $filterAll['user_id'];


    // // Xóa user trong đơn hàng trước
    // $userAddressDeleted = delete('order_products', "user_id = $userID");
    // Xóa user_address trước
    $userAddressDeleted = delete('user_address', "user_id = $userID");


    if($userAddressDeleted > 0){
        // Nếu có bản ghi user_address được xóa, tiếp tục xóa user trong bảng users
        $deleteUser = delete('users', "user_id = $userID");
        
        if($deleteUser > 0){
            // Nếu xóa thành công, thì redirect về trang index.php
            redirect('index.php');
        } else {
            // Nếu xóa user không thành công, có thể xử lý thông báo lỗi ở đây nếu cần
        }
    } else {
        // Nếu không có bản ghi user_address nào được xóa, có thể xử lý thông báo lỗi hoặc tương ứng ở đây nếu cần
    }
} else {
    // Nếu không có user_id được cung cấp, có thể xử lý thông báo lỗi hoặc tương ứng ở đây nếu cần
}
