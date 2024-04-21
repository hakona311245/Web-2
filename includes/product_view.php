<?php
require_once ('includes/dbh.inc.php');
function show_product(int $productid, object $pdo){
    // Truy vấn cơ sở dữ liệu để lấy thông tin sản phẩm
    $query = "SELECT * FROM sanpham WHERE product_id = :productid";
    $stmt = $pdo -> prepare($query);
    $stmt -> bindParam(":productid", $productid);
    $stmt -> execute();
    $result = $stmt -> fetch(PDO::FETCH_ASSOC);

        echo '<div class="product-card">
        <a href="your-target-page-url.html" class="product-link">
        <div class="product-img-container">
          <img src="img/productcard/asustuff15.webp" alt="Product Image" class="product-img">
        </div>
        </a>
        <div class="product-info">
        <a href="your-target-page-url.html" class="product-link">
            <div class="product-name">'.htmlspecialchars($result["product_name"]).'</div>
            </a>
            <div class="product-specs">
                <div>CPU: '.htmlspecialchars($result["CPU"]).'</div>
                <div>GPU: '.htmlspecialchars($result["VGA"]).'</div>
                <div>RAM: '.htmlspecialchars($result["RAM"]).'</div>
                <div>SSD: '.htmlspecialchars($result["Memory"]).'</div>
                <div>Màn: '.htmlspecialchars($result["resolution"]).'</div>
                <div>Cân nặng: '.htmlspecialchars($result["weight"]).'</div>
            </div>
          
            <button class="add-to-cart-btn">Thêm Vào Giỏ Hàng </button>
        </div>
        </div>';
}

function product_by_command(object $pdo, string $result){
 // Truy vấn cơ sở dữ liệu để lấy thông tin sản phẩm
 $query = "SELECT * FROM sanpham where product_name ;";
 $stmt = $pdo -> prepare($query);
 $stmt -> execute();
 $result = $stmt -> fetch(PDO::FETCH_ASSOC);

     echo '<div class="product-card">
     <a href="your-target-page-url.html" class="product-link">
     <div class="product-img-container">
       <img src="img/productcard/asustuff15.webp" alt="Product Image" class="product-img">
     </div>
     </a>
     <div class="product-info">
     <a href="your-target-page-url.html" class="product-link">
         <div class="product-name">'.htmlspecialchars($result["product_name"]).'</div>
         </a>
         <div class="product-specs">
             <div>CPU: '.htmlspecialchars($result["CPU"]).'</div>
             <div>GPU: '.htmlspecialchars($result["VGA"]).'</div>
             <div>RAM: '.htmlspecialchars($result["RAM"]).'</div>
             <div>SSD: '.htmlspecialchars($result["Memory"]).'</div>
             <div>Màn: '.htmlspecialchars($result["resolution"]).'</div>
             <div>Cân nặng: '.htmlspecialchars($result["weight"]).'</div>
         </div>
       
         <button class="add-to-cart-btn">Thêm Vào Giỏ Hàng </button>
     </div>
     </div>';
} 