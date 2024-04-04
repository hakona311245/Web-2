<!DOCTYPE html>
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
    <link rel="stylesheet" href="css/productpage.css"/>
    <link rel="stylesheet" href="/css/boloc.css">

</head>
<body>
  <header-template></header-template>
    <main>

    <div class="page-title">
      LAPTOP GAMING
    </div>
    <div class="brand-page">
      Tất cả các hãng
    </div>

    <!-- Nút chính -->


    <button class="button filter-button" id="dropdownButton">Bộ Lọc</button>

    <!-- Các nút con -->
    <div class="dropdown-content filter-option" id="dropdownContent">
    
    <div class="dropdown-item">
        Kích Thước:
        <br>
        <button class="size-button">13.3 inch</button>
        <button class="size-button">14 inch</button>
        <button class="size-button">15.6 inch</button>
        <button class="size-button">16 inch</button>
        <button class="size-button">17.3 inch</button>


        </div>

        <div class="dropdown-item">
            Nhu Cầu:
            <br>
            <button class="usage-button">Laptop Gaming</button>
            <button class="usage-button">Học tập - Văn phòng</button>
            <button class="usage-button">Đồ hoạ - Kỹ thuật</button>
        </div>
        <div class="dropdown-item">
            Độ Phân Giải:
            <br>
            <button class="resolution-button">Laptop màn Full HD</button>
            <button class="resolution-button">Laptop màn 2K</button>
            <button class="resolution-button">Laptop màn 4K</button>
            <button class="resolution-button">Laptop Độ phân giải khác</button>
        </div>

        <button class="result-button" id="clearButton">Bỏ Chọn</button>
        <button class="result-button" id="showResultButton">Xem Kết Quả</button>
    </div>
    </div>

  <div class="browse-tags">
    <span>Sắp xếp theo:</span>
    <span class="custom-dropdown custom-dropdown--white">
  <select class="sort-by custom-dropdown__select custom-dropdown__select--white">
  <option value="price-ascending" data-filter="&sortby=(price:product=asc)">Giá: Tăng dần</option>
  <option value="price-descending" data-filter="&sortby=(price:product=desc)">Giá: Giảm dần</option>
  <option value="title-ascending" data-filter="&sortby=(title:product=asc)">Tên: A-Z</option>
  <option value="title-descending" data-filter="&sortby=(price:product=desc)">Tên: Z-A</option>
  <option value="created-ascending" data-filter="&sortby=(updated_at:product=desc)">Cũ nhất</option>
  <option value="created-descending" data-filter="&sortby=(updated_at:product=asc)">Mới nhất</option>
  <option value="best-selling" data-filter="&sortby=(sold_quantity:product=desc)">Bán chạy nhất</option>
  <!--<option value="quantity-descending" >Tồn kho: Giảm dần</option>-->
  </select>
  </span>
  </div>

    <div class="container product-container">
    
    
    <div class="product-card">
    <a href="your-target-page-url.html" class="product-link">
    <div class="product-img-container">
    
      <img src="img/productcard/asustuff15.webp" alt="Product Image" class="product-img">
   
        
    </div>
    </a>
    <div class="product-info">
    <a href="your-target-page-url.html" class="product-link">
        <div class="product-name">Laptop gaming ASUS ROG Zephyrus G14 GA403UU QS101W</div>
        </a>
        <div class="product-specs">
            <div>CPU: i7-13620H</div>
            <div>GPU: RTX 4070</div>
            <div>RAM: 16 GB</div>
            <div>SSD: 512 GB</div>
            <div>Màn: 15.6" FHD</div>
            <div>RAM: 16 GB</div>
        </div>
      
        <button class="add-to-cart-btn">Thêm Vào Giỏ Hàng </button>
    </div>
    </div>
    <div class="product-card">
    <a href="your-target-page-url.html" class="product-link">
    <div class="product-img-container">
    
      <img src="img/productcard/asustuff15.webp" alt="Product Image" class="product-img">
   
        
    </div>
    </a>
    <div class="product-info">
    <a href="your-target-page-url.html" class="product-link">
        <div class="product-name">Laptop gaming ASUS ROG Zephyrus G14 GA403UU QS101W</div>
        </a>
        <div class="product-specs">
            <div>CPU: i7-13620H</div>
            <div>GPU: RTX 4070</div>
            <div>RAM: 16 GB</div>
            <div>SSD: 512 GB</div>
            <div>Màn: 15.6" FHD</div>
            <div>RAM: 16 GB</div>
        </div>
      
        <button class="add-to-cart-btn">Thêm Vào Giỏ Hàng </button>
    </div>
    </div>

    <div class="product-card">
    <a href="your-target-page-url.html" class="product-link">
    <div class="product-img-container">
    
      <img src="img/productcard/asustuff15.webp" alt="Product Image" class="product-img">
   
        
    </div>
    </a>
    <div class="product-info">
    <a href="your-target-page-url.html" class="product-link">
        <div class="product-name">Laptop gaming ASUS ROG Zephyrus G14 GA403UU QS101W</div>
        </a>
        <div class="product-specs">
            <div>CPU: i7-13620H</div>
            <div>GPU: RTX 4070</div>
            <div>RAM: 16 GB</div>
            <div>SSD: 512 GB</div>
            <div>Màn: 15.6" FHD</div>
            <div>RAM: 16 GB</div>
        </div>
      
        <button class="add-to-cart-btn">Thêm Vào Giỏ Hàng </button>
    </div>
    </div>

    <div class="product-card">
    <a href="your-target-page-url.html" class="product-link">
    <div class="product-img-container">
    
      <img src="img/productcard/asustuff15.webp" alt="Product Image" class="product-img">
   
        
    </div>
    </a>
    <div class="product-info">
    <a href="your-target-page-url.html" class="product-link">
        <div class="product-name">Laptop gaming ASUS ROG Zephyrus G14 GA403UU QS101W</div>
        </a>
        <div class="product-specs">
            <div>CPU: i7-13620H</div>
            <div>GPU: RTX 4070</div>
            <div>RAM: 16 GB</div>
            <div>SSD: 512 GB</div>
            <div>Màn: 15.6" FHD</div>
            <div>RAM: 16 GB</div>
        </div>
      
        <button class="add-to-cart-btn">Thêm Vào Giỏ Hàng </button>
    </div>
    </div>



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