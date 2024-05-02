<?php
  require_once("./testadmin/databaseadmin.php");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SG Tech</title>
    <script src="https://kit.fontawesome.com/8c6957fe62.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/productcard.css"/>
    <link rel="stylesheet" href="css/homestyle.css"/>
    <link rel="stylesheet" href="css/header&footer.css"/>
</head>
<body>
  <header-template></header-template>
    <main>
        
    <?php
// Kết nối đến cơ sở dữ liệu
$pdo = new PDO('mysql:host=localhost;dbname=web2', 'root', '');

// Kiểm tra xem id sản phẩm được truyền qua URL hay không
if(isset($_GET['id'])) {
    // Lấy id sản phẩm từ URL
    $product_id = $_GET['id'];

    // Truy vấn cơ sở dữ liệu để lấy thông tin sản phẩm dựa trên id
    $sql = "SELECT * FROM sanpham WHERE product_id = :product_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra xem sản phẩm có tồn tại hay không
    if($product) {
        // Hiển thị thông tin sản phẩm
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo $product['hinhanh']; ?>" alt="Product Image" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2 class="mb-3"><?php echo $product['product_name']; ?></h2>
            <p><strong>CPU:</strong> <?php echo $product['CPU']; ?></p>
            <p><strong>RAM:</strong> <?php echo $product['RAM']; ?></p>
            <p><strong>VGA:</strong> <?php echo $product['VGA']; ?></p>
            <p><strong>Cấu hình máy:</strong> <?php echo $product['Memory']; ?> SSD, <?php echo $product['resolution']; ?>" Full HD Display</p>
            <p><strong>Giá tiền:</strong> <?php echo number_format($product['price'], 0,",",".");?>đ</p>
            <button class="btn btn-primary mt-3" action="">Thêm vào giỏ hàng</button>
        </div>
    </div>
</div>
<?php
    } else {
        // Hiển thị thông báo nếu sản phẩm không tồn tại
        echo '<div class="container">';
        echo '<p>Sản phẩm không tồn tại.</p>';
        echo '</div>';
    }
}
?>




    </main>
  <footer-template></footer-template>



    <script src="js/header&footer_login.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
    

</html>