class Myheader extends HTMLElement{
    connectedCallback(){
        this.innerHTML=`   
        <div class="header">
        <div class="logo-container">

            <div class="logo-row">
                <a href="Home.html"><img width="100" height="123" src="img/logopng.png"></a>
            </div>

            <div class="container my-4">
                <div class="row justify-content-center">
                  <div class="col-12 col-md-8">
                    <form class="d-flex">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                  </div>
                </div>
              </div>
            
            <div class="account-row">
                <div class="container my-4">
                    <div class="d-flex justify-content-end">
                      <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                          Account
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li><a class="dropdown-item" href="#signin">Sign In</a></li>
                          <li><a class="dropdown-item" href="#signup">Sign Up</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>    
            </div>

            <div class="cart-row">
                <i class="fa-solid fa-cart-shopping" style="color: rgb(44, 130, 221);"></i>
                <a href="">Giỏ Hàng</a>
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
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav custom-nav">
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
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
                        id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        >
                            Laptop Đồ Hoạ  
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
                </ul>
            </div>




        </nav>
    </div>
    </div> 
        `    
    }
}

customElements.define('header-template', Myheader)
