<?php

require_once("./testadmin/databaseadmin.php");
require_once("./testadmin/session.php");
require_once("./testadmin/function.php");

session_start();
$user_name = $_SESSION['user_username'];
$userInfo = getRaw("SELECT * FROM taikhoannguoidung WHERE user_name ='$user_name'");

// echo '<pre>';
// print_r($userInfo);
// echo '</pre>';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/stylettngdung.css">
    <script src="https://kit.fontawesome.com/8c6957fe62.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/productcard.css"/>
    <link rel="stylesheet" href="css/homestyle.css"/>
    <link rel="stylesheet" href="css/header&footer.css"/>
</head>
 <!-- php chạy điều kiện cho header và footer sau khi kiểm tra session -->
 <header>
        <div class="header">
            <div class="logo-container">
    
                <div class="logo-row">
                    <a href="Home.php"><img width="100" height="123" src="img/logopng.png"></a>
                </div>
                
                <div class="container my-4">
                    <div class="row justify-content-center">
                      <div class="col-12 col-md-8">
                        <form class="d-flex" action="search.php" method="post">
                          <input class="form-control me-2" name="usersearch" type="search" placeholder="Nhập vào sản phẩm cần tìm" aria-label="Search">
                          <button class="search-btn btn btn-outline-success" type="submit">Search</button>
                        </form>
                      </div>
                    </div>
                  </div>
                            
                <div class="account-row">
                    <div class="container my-4">
                        <div class="d-flex justify-content-end">
                          <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                              <?php 
            if(!empty($userInfo)){
                foreach($userInfo as $item)
                        echo htmlspecialchars($item['user_name']);
                        echo '</button>';
                        echo   '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                        echo     '<li><a class="dropdown-item" href="ttngdung.php">Thông tin người dùng</a></li>';
                        echo     '<li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>';
            }else{
                echo "Tài khoản";      
                echo '</button>';
                        echo   '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
                        echo     '<li><a class="dropdown-item" href="login.php">Đăng nhập</a></li>';
                        echo    '<li><a class="dropdown-item" href="register.php">Đăng Ký</a></li>';
            }
?>
                            </ul>
                          </div>
                        </div>
                      </div>    
                </div>
    
                <div class="cart-container">
                  <a href="giohang.php" class="cart-link">
                    <div class="icon-wrapper">
                      <i class="fa-solid fa-cart-shopping"></i>
                      <span class="item-count">3</span> <!-- Example item count -->
                    </div>
                    <span class="cart-text">Giỏ hàng</span>
                  </a>
                </div>
  
            </div>
    
            <div class="navigation-container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <button 
                type = "button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
                class="navbar-toggler">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-list collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav custom-nav">
                        <li class="nav-item ">
                            <a href="Home.php" class="nav-link">
                                Home
                            </a>
                        </li>
    
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle"
                            id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            >
                                Laptop Văn Phòng
                            </a>
                            <ul class="dropdown-menu"
                            aria-labelledby="navbarDropdown">
                                <li>
                                  <a href="#"
                                    class="dropdown-item">Asus</a>
                                
                                </li>
                                <li>
                                  <a href="#"
                                    class="dropdown-item">Acer</a>
                                  
                                </li>
                                <li>
                                  <a href="#"
                                    class="dropdown-item">Dell</a>
                                </li>
                                <li>
                                  <a href="#"
                                    class="dropdown-item">HP</a>
                                </li>
                                <li>
                                  <a href="#"
                                    class="dropdown-item">Lenovo</a>
                                </li>
                                <li>
                                  <a href="#"
                                    class="dropdown-item">MSI</a>
                                </li>
                            </ul>
                        </li>
    
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle"
                            id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            >
                                Laptop Gaming
                            </a>
                            <ul class="dropdown-menu"
                            aria-labelledby="navbarDropdown">
                            <li>
                                  <a href="Laptopgaming.php"
                                    class="dropdown-item">Tất cả các hãng</a>
                                
                                </li>
                            <li>
                                  <a href="#"
                                    class="dropdown-item">Asus</a>
                                
                                </li>
                                <li>
                                  <a href="#"
                                    class="dropdown-item">Acer</a>
                                  
                                </li>
                                <li>
                                  <a href="#"
                                    class="dropdown-item">Dell</a>
                                </li>
                                <li>
                                  <a href="#"
                                    class="dropdown-item">HP</a>
                                </li>
                                <li>
                                  <a href="#"
                                    class="dropdown-item">Lenovo</a>
                                </li>
                                <li>
                                  <a href="#"
                                    class="dropdown-item">MSI</a>
                                </li>
                            </ul>
                        </li>
    
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle"
                               id="navbarDropdownGraphics" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Laptop Đồ Hoạ
                            </a>
                            <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <li>
                                  <a href="#"
                                    class="dropdown-item">Asus</a>
                                
                                </li>
                                <li>
                                  <a href="#"
                                    class="dropdown-item">Acer</a>
                                  
                                </li>
                                <li>
                                  <a href="#"
                                    class="dropdown-item">Dell</a>
                                </li>
                                <li>
                                  <a href="#"
                                    class="dropdown-item">HP</a>
                                </li>
                                <li>
                                  <a href="#"
                                    class="dropdown-item">Lenovo</a>
                                </li>
                                <li>
                                  <a href="#"
                                    class="dropdown-item">MSI</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
    
    
    
    
            </nav>
        </div>  
        </div> 
    
    </header>
<body>
    <section class="signup page_customer_account">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
                    <div class="block-account">
                        <h5 class="title-account">Trang tài khoản</h5>
                        <?php if(!empty($userInfo)):
                                foreach($userInfo as $item):  
                         ?>
                        <p>Xin chào, <span style="color:#141414;"><?php echo $item['user_name']; ?></span>&nbsp;!</p>
                        <ul>
                            <li>
                                <a disabled="disabled" href="ttngdung.php" class="title-info active" title="Thông tin tài khoản" >Thông tin tài khoản</a>
                            </li>
                            <!-- <li>
                                <a class="title-info" href="ttngdung1.php" title="Đơn hàng của bạn">Thay đổi thông tin</a>
                            </li>
                            <li>
                                <a class="title-info" href="ttngdung2.php" title="Đổi mật khẩu">Đổi mật khẩu</a>
                            </li> -->
                            <li>
                                <a class="title-info" href="login.php" title="Đăng xuất">Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac">
                    <h1 class="title-head margin-top-0">Thông tin tài khoản</h1>
                    <div class="form-signup name-account m992">
                        <p><strong>Họ tên:</strong><?php echo $item['user_name']; ?></p>
                        <p> <strong>Email:</strong><?php echo $item['user_email']; ?></p>

                        <p> <strong>Điện thoại:</strong><?php echo $item['user_phone']; ?></p>

                        <p><strong>Địa chỉ :</strong><?php echo $item['user_address']; ?></p>

                    </div>
                                   <?php endforeach; 
                                        endif;
                                        ?>
                </div>
            </div>
        </div>
    </section>
    <div id="js-global-alert" class="alert alert-success" role="alert">
        <button type="button" class="close"><span aria-hidden="true"><span aria-hidden="true">&times;</span></span></button>
        <h5 class="alert-heading"></h5>
        <p class="alert-content"></p>
    </div>
    <footer-template></footer-template>
<script src="js/header&footer_login.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>