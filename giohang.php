<?php
// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "web2");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

// Lấy product_id từ form
$product_id = $_POST['product_id'];

// Truy vấn để lấy thông tin sản phẩm từ bảng products
$sql = "SELECT * FROM sanpham WHERE product_id = '$product_id'";
$result = mysqli_query($conn, $sql);

// Kiểm tra xem có sản phẩm không
if (mysqli_num_rows($result) > 0) {
    // Lặp qua các hàng kết quả
    while ($row = mysqli_fetch_assoc($result)) {
        // Lưu thông tin sản phẩm vào các biến
        $product_name = $row['product_name'];
        $product_price = $row['price'];

        // Thêm dữ liệu vào bảng chitiethoadon
        $insert_query = "INSERT INTO chitiethoadon (product_id, product_name, product_price) VALUES ('$product_id', '$product_name', '$product_price')";
        
        if (mysqli_query($conn, $insert_query)) {
            echo "Sản phẩm đã được thêm vào giỏ hàng thành công!";
        } else {
            echo "Lỗi khi chèn sản phẩm vào bảng chitiethoadon: " . mysqli_error($conn);
        }
    }
} else {
    echo "Không tìm thấy sản phẩm!";
}
// Truy vấn để lấy thông tin sản phẩm từ bảng chitiethoadon
$sql_cart = "SELECT * FROM chitiethoadon";
$result_cart = mysqli_query($conn, $sql_cart);

// Đóng kết nối
mysqli_close($conn);
?>



<!-- Phần HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SG Tech</title>
    <script src="https://kit.fontawesome.com/8c6957fe62.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="giohang.css">
    <link rel="stylesheet" href="css/homestyle.css"/>
    <link rel="stylesheet" href="css/header&footer.css"/>
</head>
<body>

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

<div class="container mt-5">
    <h1 class="text-left">Giỏ hàng</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng cộng</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="cart-items">
    <?php
        if ($result_cart && mysqli_num_rows($result_cart) > 0) {
            $count = 1;
            while ($cart_row = mysqli_fetch_assoc($result_cart)) {
                echo "<tr>";
                echo "<td>" . $count++ . "</td>"; // Số thứ tự
                echo "<td>" . $cart_row['product_name'] . "</td>"; // Tên sản phẩm
                echo "<td>" . $cart_row['product_price'] . "</td>"; // Giá
                echo "<td>1</td>"; // Số lượng - Ở đây mặc định là 1, bạn có thể thay đổi nếu cần
                echo "<td>" . $cart_row['product_price'] . "</td>"; // Tổng cộng - Ở đây mặc định là giá sản phẩm, bạn có thể thay đổi nếu cần
                echo "<td>
                    <form method='post' action='includes/xoasanpham.php'>
                        <input type='hidden' name='product_id' value='" . $cart_row['product_id'] . "'>
                        <button type='submit' class='btn btn-danger'>Xóa</button>
                    </form>
                    </td>";
                echo "</tr>";
            }
        } else {
            // Hiển thị thông báo nếu giỏ hàng trống
            echo "<tr><td colspan='6'>Giỏ hàng trống!</td></tr>";
        }
    ?>
    </tbody>

    </table>
    <form action="chitietthanhtoan.php" method="post">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary" type="submit">Thanh toán</button>
        </div>
    </form>
</div>

<footer-template></footer-template>
<script src="js/headerandfooter.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    document.addEventListener("DOMContentLoaded", function(){
      // Get dropdowns on the page
      var dropdowns = document.querySelectorAll('.dropdown');
    
      // Add hover event to each dropdown
      dropdowns.forEach(function(dropdown) {
        dropdown.addEventListener('mouseenter', function(e) {
          var dropdownMenu = this.querySelector('.dropdown-menu');  
          if (dropdownMenu) {
            dropdownMenu.classList.add('show');
          }
        });
    
        dropdown.addEventListener('mouseleave', function(e) {
          var dropdownMenu = this.querySelector('.dropdown-menu');
          if (dropdownMenu) {
            dropdownMenu.classList.remove('show');
          }
        });
      });
    });
</script>

</body>
</html>
