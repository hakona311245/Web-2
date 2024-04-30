
<?php
require_once("./testadmin/databaseadmin.php");
require_once("./testadmin/session.php");
require_once("./testadmin/function.php");
require_once ('includes/product_view.php');
session_start();
if(isLogin())
{
  $user_name = $_SESSION['user_username'];
  $userInfo = getRaw("SELECT * FROM taikhoannguoidung WHERE user_name ='$user_name'");
}

// removeSession('user_username');

// echo '<pre>';
// print_r($userInfo);
// echo '</pre>';
//  if(!empty($userInfo)):
//   foreach($userInfo as $item):  
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SG Tech</title>
    <script src="https://kit.fontawesome.com/8c6957fe62.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/productcard.css"/>
    <link rel="stylesheet" href="css/header&footer.css"/>
    <link rel="stylesheet" href="css/productpage.css"/>
    <link rel="stylesheet" href="/css/boloc.css">

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
    <main>

    <div class="page-title">
      LAPTOP GAMING
    </div>
    <div class="brand-page">
      Tất cả các hãng
    </div>

    
<div class="" id="dropdownContent">
    
    <div class="container mt-3">
    <!-- Size Filter -->
    <div class="card mb-3">
        <div class="card-header">Kích Thước:</div>
        <div class="card-body">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="size13" value="13.3 inch">
                <label class="form-check-label" for="size13">13.3 inch</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="size14" value="14 inch">
                <label class="form-check-label" for="size14">14 inch</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="size156" value="15.6 inch">
                <label class="form-check-label" for="size156">15.6 inch</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="size16" value="16 inch">
                <label class="form-check-label" for="size16">16 inch</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="size173" value="17.3 inch">
                <label class="form-check-label" for="size173">17.3 inch</label>
            </div>
        </div>
    </div>

    <!-- Usage Filter -->
    <div class="card mb-3">
        <div class="card-header">Nhu Cầu:</div>
        <div class="card-body">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gaming" value="Laptop Gaming">
                <label class="form-check-label" for="gaming">Laptop Gaming</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="office" value="Học tập - Văn phòng">
                <label class="form-check-label" for="office">Học tập - Văn phòng</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="graphics" value="Đồ hoạ - Kỹ thuật">
                <label class="form-check-label" for="graphics">Đồ hoạ - Kỹ thuật</label>
            </div>
        </div>
    </div>

    <!-- Resolution Filter -->
    <div class="card mb-3">
        <div class="card-header">Độ Phân Giải:</div>
        <div class="card-body">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="fullHD" value="Laptop màn Full HD">
                <label class="form-check-label" for="fullHD">Laptop màn Full HD</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="2k" value="Laptop màn 2K">
                <label class="form-check-label" for="2k">Laptop màn 2K</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="4k" value="Laptop màn 4K">
                <label class="form-check-label" for="4k">Laptop màn 4K</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="otherRes" value="Laptop Độ phân giải khác">
                <label class="form-check-label" for="otherRes">Laptop Độ phân giải khác</label>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-secondary" id="clearButton">Bỏ Chọn</button>
        <button class="btn btn-primary" id="showResultButton">Xem Kết Quả</button>
    </div>
</div>


  <div class="browse-tags">

  <form action="" method="GET">
    <span>Sắp xếp theo</span>
  <select name="sort" class="sort-by custom-dropdown__select custom-dropdown__select--white">
  <option>---Option---</option>  
  <option value="price-ascending" <?php if(isset($_GET['sort']) && $_GET['sort'] == "sort_price_asc"){echo "selected";}?>>Giá: Tăng dần</option>
  <option value="price-descending" <?php if(isset($_GET['sort']) && $_GET['sort'] == "sort_price_desc"){echo "selected";}?>>Giá: Giảm dần</option>
  <option value="title-ascending" data-filter="&sortby=(title:product=asc)">Tên: A-Z</option>
  <option value="title-descending" data-filter="&sortby=(price:product=desc)">Tên: Z-A</option>
  <!--<option value="quantity-descending" >Tồn kho: Giảm dần</option>-->
  </select>
    <button type="submit">Tìm</button>
  </form>

  </div>

    <div class="container product-container">
    
    <?php
  $sort_option = "";
  if(isset($_GET['sort'])){
    if($_GET['sort'] == "sort_price_asc"){
      $sort_option = "ASC";
    }
    elseif($_GET['sort'] == "sort_price_desc"){
      $sort_option = "DESC";
    }
  }

  // Kết nối đến cơ sở dữ liệu
  $pdo = new PDO('mysql:host=localhost;dbname=web2', 'root', '');

  // Query lấy dữ liệu sản phẩm với sắp xếp theo giá
  $sql = "SELECT * FROM sanpham ORDER BY price $sort_option";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?> 

<?php foreach($products as $product): ?>
  <div class="product-card">
    <a href="your-target-page-url.html" class="product-link">
      <div class="product-img-container">
        <img src="<?php echo $product['hinhanh']; ?>" alt="Product Image" class="product-img">
      </div>
    </a>
    <div class="product-info">
      <a href="your-target-page-url.html" class="product-link">
        <div class="product-name"><?php echo htmlspecialchars($product['product_name']); ?></div>
      </a>
      <div class="product-specs">
        <div>CPU: <?php echo htmlspecialchars($product['CPU']); ?></div>
        <div>GPU: <?php echo htmlspecialchars($product['VGA']); ?></div>
        <div>RAM: <?php echo htmlspecialchars($product['RAM']); ?></div>
        <div>SSD: <?php echo htmlspecialchars($product['Memory']); ?></div>
        <div>Màn: <?php echo htmlspecialchars($product['resolution']); ?></div>
        <div>Cân nặng: <?php echo htmlspecialchars($product['weight']); ?></div>
      </div>
      <button class="add-to-cart-btn">Thêm Vào Giỏ Hàng </button>
    </div>
  </div>
<?php endforeach; ?>


    </div>
  


    </main>
  <footer-template></footer-template>


    <script src="/js/boloc.js"></script>
    <script src="js/headerandfooter.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
    

</html>