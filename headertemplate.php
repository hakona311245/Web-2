<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SG Tech</title>
    <script src="https://kit.fontawesome.com/8c6957fe62.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="css/homestyle.css"/>

</head>
<body style="height:2000px">
    
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
                          Tài Khoản
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li><a class="dropdown-item" href="login.php">Đăng Nhập</a></li>
                          <li><a class="dropdown-item" href="register.php">Đăng Ký</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>    
            </div>


            <div class="cart-container">
              <a href="Cart.html" class="cart-link">
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
                              <ul>
                                <li>
                                  <a href="#" class="dropdown-item">Asus Vivobook</a>
                                </li>
                                <li>
                                  <a href="#" class="dropdown-item">Asus Zenbook</a>
                                </li>
                              </ul>
                            </li>
                            <li>
                              <a href="#"
                                class="dropdown-item">Dell</a>
                              <ul>
                                <li>
                                  <a href="#" class="dropdown-item">Dell Inspiron</a>
                                </li>
                                <li>
                                  <a href="#" class="dropdown-item">Dell Lattitude</a>
                                </li>
                                <li>
                                  <a href="#" class="dropdown-item">Dell XPS</a>
                                </li>
                              </ul>
                            </li>
                            <li>
                              <a href="#"
                                class="dropdown-item">HP</a>
                              <ul>
                                <li>
                                  <a href="#" class="dropdown-item">HP Probook</a>
                                </li>
                                <li>
                                  <a href="#" class="dropdown-item">HP Envy</a>
                                </li>
                                <li>
                                  <a href="#" class="dropdown-item">HP Pavilion</a>
                                </li>
                              </ul>
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
                            <li><a href="#"
                                class="dropdown-item">Asus</a></li>
                            <li><a href="#"
                                class="dropdown-item">Asus</a></li>
                            <li><a href="#"
                                class="dropdown-item">Asus</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle"
                           id="navbarDropdownGraphics" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Laptop Đồ Hoạ
                        </a>
                        <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <li><a href="#" class="dropdown-item">Asus</a></li>
                            <li><a href="#" class="dropdown-item">Asus</a></li>
                            <li><a href="#" class="dropdown-item">Asus</a></li>
                        </ul>
                    </li>
                </ul>
            </div>




        </nav>
    </div>  
    </div> 

</header>
    <main>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <!-- New indicator for the fourth slide -->
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <!-- Existing carousel items -->
          <div class="carousel-item active">
            <img src="img/Wallpaper laptop/zephyrus g14 ad.webp" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/Wallpaper laptop/strix scar g16-18.webp" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/Wallpaper laptop/zephyrus g16.webp" class="d-block w-100" alt="...">
          </div>
          <!-- New carousel item -->
          <div class="carousel-item">
            <img src="img/Wallpaper laptop/vivobook.webp  " class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <!-- Optional caption here -->
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      

      <h2 style="text-align: center; margin: 2rem">HÃY KHÁM PHÁ CÁC SẢN PHẨM CỦA CHÚNG MÌNH</h2>
      <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="image-container">
                <a href="laptopgaming.html">
                    <img src="img/ROG gallery.webp" alt="Image 1">
                    <div class="image-description">Description for Image 1</div>
                  </a>  
                </div>
            </div>
            <div class="col-md-4">
                <div class="image-container">
                    <img src="image2.jpg" alt="Image 2">
                    <div class="image-description">Description for Image 2</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="image-container">
                    <img src="image3.jpg" alt="Image 3">
                    <div class="image-description">Description for Image 3</div>
                </div>
            </div>
        </div>
    </div>
      

    </main>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    
</body>
</html>