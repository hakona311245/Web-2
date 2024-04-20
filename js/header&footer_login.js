class Myheader extends HTMLElement{
    connectedCallback(){
        this.innerHTML=`   
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
                              <?php echo $item['user_name'] ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <li><a class="dropdown-item" href="login.php">Đăng nhập</a></li>
                              <li><a class="dropdown-item" href="register.php">Đăng Ký</a></li>
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
        `    
    }
}

customElements.define('header-template', Myheader)

class Myfooter extends HTMLElement{
    connectedCallback(){
        this.innerHTML=`   

        <footer class="bg-light text-dark pt-5 pb-4">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase md-4 font-weight-bold text-uppercase">
                        Thương hiệu SGtech
                    </h5>
                    <p>Cam đoan chất lượng sản phẩm tin dùng</p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase md-4 font-weight-bold text-uppercase">
                        Các sản phẩm của chúng tôi
                    </h5>
                    <p class="my-0">
                        <a href="#" class="text-md-left" style="text-decoration: none;">Laptop chất lượng cao</a>
                    </p>
                    <p class="my-0">
                        <a href="#" class="text-md-left" style="text-decoration: none;">Laptop chất lượng cao</a>
                    </p>
                    <p class="my-0">
                        <a href="#" class="text-md-left" style="text-decoration: none;">Laptop chất lượng cao</a>
                    </p>
                    <p class="my-0">
                        <a href="#" class="text-md-left" style="text-decoration: none;">Laptop chất lượng cao</a>
                    </p>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase  mb-4 font font-weight-bold text-uppercase">Những đường link bạn quan tâm</h5>
                    <p class="my-0">
                        <a href="#" class="text-md-left" style="text-decoration: none;">Laptop chất lượng cao</a>
                    </p>
                    <p class="my-0">
                        <a href="#" class="text-md-left" style="text-decoration: none;">Laptop chất lượng cao</a>
                    </p>
                    <p class="my-0">
                        <a href="#" class="text-md-left" style="text-decoration: none;">Laptop chất lượng cao</a>
                    </p>
                    <p class="my-0">
                        <a href="#" class="text-md-left" style="text-decoration: none;">Laptop chất lượng cao</a>
                    </p>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase  mb-4 font font-weight-bold text-uppercase">
                        Liên hệ chúng tôi
                    </h5>
                    <p>
                        <i class="fas fa-home mr-3"></i>
                        Nhập địa chỉ vào đây
                    </p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i>
                        Nhập địa chỉ vào đây
                    </p>
                    <p>
                        <i class="fas fa-phone mr-3"></i>
                        Nhập địa chỉ vào đây
                    </p>
                    <p>
                        <i class="fas fa-print mr-3"></i>
                        Nhập địa chỉ vào đây
                    </p>
                </div>
            </div>
            <hr class="mb-4">
            <div class="row align-items-center">
                <div class="col-md-7 col-lg-8">
                    
                </div>
            </div>
        </div>
    </footer>
        `    
    }
}
customElements.define('footer-template', Myfooter)