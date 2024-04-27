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
        
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="img/productcard/zephyrusg15.png" alt="Laptop Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2 class="mb-3">Laptop Model XYZ</h2>
                <p><strong>CPU:</strong> Intel Core i7-10750H</p>
                <p><strong>RAM:</strong> 16GB DDR4</p>
                <p><strong>VGA:</strong> NVIDIA GTX 1660 Ti 6GB</p>
                <p><strong>Cấu hình máy:</strong> 512GB SSD, 15.6" Full HD Display</p>
                <p><strong>Giá tiền:</strong> $1200</p>
                <div class="mt-4">
                    <label for="quantity" class="form-label">Số lượng:</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="10" value="1" class="form-control w-25">
                </div>
                <button class="btn btn-primary mt-3" action="">Thêm vào giỏ hàng</button>
            </div>
        </div>
    </div>



    </main>
  <footer-template></footer-template>



    <script src="js/header&footer_login.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
    

</html>