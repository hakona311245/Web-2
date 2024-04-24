<?php
session_start();
require_once ('includes/product_view.php');
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
  <header-template></header-template>
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
  $sort_option ="";
  if(isset($_GET['sort'])){
    if($_GET['sort'] == "sort_price_asc"){
      $sort_option = "ASC";
    }
    elseif($_GET['sort'] == "sort_price_desc"){

    }
  }
  show_product(1, $pdo)
?> 

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