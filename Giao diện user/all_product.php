<?php

session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();

$cata_info = $obj->p_display_catagory();
$cataDatas = array();
while ($data = mysqli_fetch_assoc($cata_info)) {
    $cataDatas[] = $data;
}

// Set the number of products per page
$products_per_page = 12;

// Calculate the total number of products
$total_products = $obj->getTotalNumberOfProducts();

// Calculate the total number of pages
$total_pages = ceil($total_products / $products_per_page);

// Get the current page number from the URL parameter (default to 1 if not set)
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($current_page - 1) * $products_per_page;

// Fetch the products for the current page
$pdt_info = $obj->view_all_product($offset, $products_per_page);
$pdt_datas = mysqli_fetch_all($pdt_info, MYSQLI_ASSOC);
$start_item = ($current_page - 1) * $products_per_page + 1;
$end_item = min($start_item + $products_per_page - 1, $total_products);
?>


<?php
include_once("includes/head.php");
?>

<body class="biolife-body">
    <!-- Preloader -->

    <?php
    include_once("includes/preloader.php");
    ?>

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-03">

        <?php
        include_once("includes/header_top.php");
        ?>

        <?php
        include_once("includes/header_middle.php");
        ?>

        <?php
        include_once("includes/header_bottom.php");
        ?>

    </header>

    <div class="container">
        <nav class="biolife-nav">
        </nav>
    </div>
    <!-- Page Contain -->
    <div class="page-contain category-page left-sidebar">
        <div class="container">
            <div class="row">
                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="product-category grid-style">
                        <div id="top-functions-area" class="top-functions-area" >
                            <div class="flt-item to-left group-on-mobile">
                                <div data-title="Price:" class="selector-item">
                                    <div class="nice-selectt disabled">
                                        <span class="current">
                                            <b>Showing <?php echo $start_item; ?>-<?php echo $end_item; ?> of <?php echo $total_products; ?> products</b>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flt-item to-right">
                                <span class="flt-title">Sort</span>
                                <div class="wrap-selectors">
                                    <div class="selector-item orderby-selector">
                                        <select name="orderby" class="orderby" aria-label="Shop order">
                                            <option value="menu_order" selected="selected">Default sorting</option>
                                            <option value="popularity">popularity</option>
                                            <option value="rating">average rating</option>
                                            <option value="date">newness</option>
                                            <option value="price">price: low to high</option>
                                            <option value="price-desc">price: high to low</option>
                                        </select>
                                    </div>
                                    <div class="selector-item viewmode-selector">
                                        <a href="all_product.php" class="viewmode grid-mode active"><i class="biolife-icon icon-grid"></i></a>
                                        <a href="category-list-left-sidebar.php" class="viewmode detail-mode"><i class="biolife-icon icon-list"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <ul class="products-list">
                                <?php
                                foreach ($pdt_datas as $pdt_data) {
                                    ?>
                                <li class="product-item col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <form action="addtocart.php" method="post">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="single_product.php?status=singleproduct&&id=<?php echo $pdt_data['pdt_id'] ?>" class="link-to-product">
                                                    <img src="admin/uploads/<?php echo $pdt_data['pdt_img'] ?>" alt="dd" width="270" height="270" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <b class="categories"> <?php echo $pdt_data['ctg_name'] ?> </b>
                                                <h4 class="product-title"><a href="single_product.php?status=singleproduct&&id=<?php echo $pdt_data['pdt_id'] ?>" class="pr-name"><?php echo $pdt_data['pdt_name'] ?></a></h4>
                                                <div class="price">
                                                    <ins><span class="price-amount"><?php echo $pdt_data['pdt_price'] ?><span class="currencySymbol"> .VND</span></span></ins>
                                                </div>
                                                <div class="shipping-info">
                                                    <p class="shipping-day">3-Day Shipping</p>
                                                    <p class="for-today">Pree Pickup Today</p>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                                    <div class="buttons"> 
                                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                        <!-- <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a> -->
                                                        <button type="submit" name="addtocart" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="pdt_name" value="<?php echo $pdt_data['pdt_name']; ?>">
                                            <input type="hidden" name="pdt_price" value="<?php echo $pdt_data['pdt_price']; ?>">
                                            <input type="hidden" name="pdt_img" value="<?php echo $pdt_data['pdt_img']; ?>">
                                            <input type="hidden" name="pdt_id" value="<?php echo $pdt_data['pdt_id']; ?>">
                                        </div>
                                    </form>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>

                        <div class="biolife-panigations-block">
                            <ul class="panigation">
                                <?php if ($current_page > 1): ?>
                                    <li><a href="?page=<?php echo $current_page - 1; ?>" class="link-page prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                <?php endif; ?>
                                
                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li <?php if ($i == $current_page) echo 'class="current-page"'; ?>><a href="?page=<?php echo $i; ?>" class="link-page"><?php echo $i; ?></a></li>
                                <?php endfor; ?>
                                
                                <?php if ($current_page < $total_pages): ?>
                                    <li><a href="?page=<?php echo $current_page + 1; ?>" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- Sidebar -->
                <aside id="sidebar" class="sidebar col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <div class="biolife-mobile-panels">
                        <span class="biolife-current-panel-title">Sidebar</span>
                        <a class="biolife-close-btn" href="#" data-object="open-mobile-filter">&times;</a>
                    </div>
                    <div class="sidebar-contain">
                        <div class="widget biolife-filter">
                            <h4 class="wgt-title">Categories</h4>
                            <div class="wgt-content">
                                <ul class="cat-list">
                                    <?php foreach ($cataDatas as $category): ?>
                                        <li class="menu-item menu-item-has-children has-megamenu">
                                            <a href="catagory.php?status=catView&&id=<?php  echo $category['ctg_id'] ?>" class="menu-name" data-title="<?php echo $category['ctg_name']?>"><?php echo $category['ctg_name']?> </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="widget price-filter biolife-filter">
                            <h4 class="wgt-title">Price</h4>
                            <div class="wgt-content">
                                <div class="frm-contain">
                                    <form action="search_product.php" name="price-filter" id="price-filter" method="get">
                                        <input type="hidden" name="search" value="1">
                                        <input type="hidden" name="keyword" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                                        <input type="hidden" name="category" value="<?php echo isset($_GET['category']) ? htmlspecialchars($_GET['category']) : ''; ?>">
                                        <p class="f-item">
                                            <label for="pr-from">$</label>
                                            <input class="input-number" type="number" id="pr-from" name="min_price" value="<?php echo isset($_GET['min_price']) ? htmlspecialchars($_GET['min_price']) : ''; ?>">
                                        </p>
                                        <p class="f-item">
                                            <label for="pr-to">to $</label>
                                            <input class="input-number" type="number" id="pr-to" name="max_price" value="<?php echo isset($_GET['max_price']) ? htmlspecialchars($_GET['max_price']) : ''; ?>">
                                        </p>
                                        <p class="f-item">
                                            <button class="btn-submit" type="submit">go</button>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="widget biolife-filter">
                            <h4 class="wgt-title">Recently Viewed</h4>
                            <div class="wgt-content">
                                <ul class="products">
                                    <li class="pr-item">
                                        <div class="contain-product style-widget">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product" tabindex="0">
                                                    <img src="assets/images/products/p-13.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Fresh Fruit</b>
                                                <h4 class="product-title"><a href="#" class="pr-name" tabindex="0">National Fresh Fruit</a></h4>
                                                <div class="price">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="pr-item">
                                        <div class="contain-product style-widget">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product" tabindex="0">
                                                    <img src="assets/images/products/p-14.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Fresh Fruit</b>
                                                <h4 class="product-title"><a href="#" class="pr-name" tabindex="0">National Fresh Fruit</a></h4>
                                                <div class="price">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="pr-item">
                                        <div class="contain-product style-widget">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product" tabindex="0">
                                                    <img src="assets/images/products/p-10.jpg" alt="dd" width="270" height="270" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">Fresh Fruit</b>
                                                <h4 class="product-title"><a href="#" class="pr-name" tabindex="0">National Fresh Fruit</a></h4>
                                                <div class="price">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="widget biolife-filter">
                            <h4 class="wgt-title">Product Tags</h4>
                            <div class="wgt-content">
                                <ul class="tag-cloud">
                                    <li class="tag-item"><a href="#" class="tag-link">Fresh Fruit</a></li>
                                    <li class="tag-item"><a href="#" class="tag-link">Natural Food</a></li>
                                    <li class="tag-item"><a href="#" class="tag-link">Hot</a></li>
                                    <li class="tag-item"><a href="#" class="tag-link">Organics</a></li>
                                    <li class="tag-item"><a href="#" class="tag-link">Dried Organic</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </div>

    <!-- FOOTER -->

    <?php
    include_once("includes/footer.php");
    ?>

    <!--Footer For Mobile-->
    <?php
    include_once("includes/mobile_footer.php");
    ?>

    <?php
    include_once("includes/mobile_global.php")
    ?>

    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

    <?php
    include_once("includes/script.php")
    ?>
</body>

</html>