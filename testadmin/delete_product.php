<?php
require_once("databaseadmin.php");
require_once("session.php");
require_once("function.php");

$filterAll = filter();
if(!empty($filterAll['pdt_id'])){
    $pdtID = $filterAll['pdt_id'];
    $ctg_PTD = $filterAll['pdt_ctg'];
    $userDetail = getRows("SELECT * FROM products WHERE pdt_id = $pdtID");
    
    if($userDetail > 0){
        // Kiểm tra xem có sản phẩm nào thuộc danh mục này không
        $productsInCategory = getRows("SELECT * FROM products WHERE pdt_ctg = $ctg_PTD");
        if($productsInCategory > 0) {
            // Nếu có, bạn có thể xử lý lỗi hoặc thực hiện hành động tùy thuộc vào yêu cầu của bạn
            // Ví dụ: thông báo cho người dùng và không xóa sản phẩm
            // hoặc xóa sản phẩm trước rồi xóa danh mục
        } else {
            // Không có sản phẩm thuộc danh mục này, tiến hành xóa
            $deleteCategory = delete('category', "ctg_id = $ctg_PTD");
            if(!$deleteCategory) {
                // Xử lý lỗi nếu cần
            }
        }

        // Xóa sản phẩm
        $deleteProduct = delete('products', "pdt_id = $pdtID");
        if(!$deleteProduct) {
            // Xử lý lỗi nếu cần
        }
    }
    
}
redirect('index1.php');
?>
