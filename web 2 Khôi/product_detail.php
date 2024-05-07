<?php 

session_start();
    include_once ("admin/function/admin_function.php");
    $obj = new adminback();

    if (isset($_GET['id'])) {
        $pdt_id = $_GET['id'];
        $product = $obj->getProductDetails($pdt_id);
    
        if ($product) {
            // Product found, display the details
            $productImages = $obj->getProductImages($pdt_id);
            // ...
        } else {
            // Product not found, handle the error case
            echo "Product not found.";
        }
    } else {
        // No pdt_id provided, handle the error case
        echo "Invalid product ID.";
    }
    
    // Retrieve the pdt_id from the URL parameter
    if (isset($_GET['id'])) {
        $pdt_id = $_GET['id'];
        // Fetch the product details based on the pdt_id
        $product = $obj->getProductDetails($pdt_id);
        // Fetch the product images based on the pdt_id
        $productImages = $obj->getProductImages($pdt_id);
    }
?>
<?php
include_once("includes/header.php");
?>
<body>
    <div class="page-wrapper">
        <header class="header header-intro-clearance header-3">
            
            <?php include_once("includes/head_top.php") ?>
            
            <?php include_once("includes/head_mid.php") ?>
        
            <?php include_once("includes/head_bottom.php") ?>
                
        </header><!-- End .header -->

        <main class="main">
            <div class="page-content">
                <div class="product-details-top">
                    <div class="bg-light pb-5 mb-4">
                        <br>
                        <div class="container">
                        <div class="product-gallery-carousel owl-carousel owl-full owl-nav-dark">
                            <?php while ($image = mysqli_fetch_assoc($productImages)) { ?>
                                <figure class="product-gallery-image">
                                    <img src="assets/images/products/single/gallery/<?php echo $image['image_url']; ?>" data-zoom-image="assets/images/products/single/gallery/<?php echo $image['image_url']; ?>" alt="product image">
                                </figure>
                            <?php } ?>
                        </div><!-- End .owl-carousel -->
                        </div><!-- End .container -->
                    </div><!-- End .bg-light pb-5 -->

                    <div class="product-details product-details-centered product-details-separator">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="product-title"><?php echo $product['pdt_name']; ?></h1><!-- End .product-title -->
                                    <div class="product-price">$<?php echo $product['pdt_price']; ?></div><!-- End .product-price -->
                                    <div class="product-content"><?php echo $product['pdt_des']; ?></div><!-- End .product-content -->
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6">
                                    
                                <form action="cart.php?id=<? $_SESSION['user_id'] ?>" method="post">
                                    <div class="product-details-action">
                                        <div class="details-action-col">
                                            <input type="hidden" name="product_id" value="  <?php echo $product['pdt_id']; ?>">
                                                <div class="product-details-quantity">
                                                    <input type="number" name="quantity" class="form-control" value="1" min="1" max="10" step="1">
                                                </div>
                                            <?php if (isset($_SESSION['user_id'])) { ?>
                                                <button type="submit" name="add_to_cart" class="btn-product btn-cart"><span>add to cart</span></button>
                                            <?php } else { ?>
                                                <a href="login.php" class="btn-product btn-cart"><span>Login to add to cart</span></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </form>


                                    <div class="product-details-footer details-footer-col">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                                <!-- lấy danh mục sản phẩm từ db -->

                                        </div><!-- End .product-cat -->

                                        <div class="social-icons social-icons-sm">
                                            <span class="social-label">Share:</span>
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        </div>
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .container -->
                    </div><!-- End .product-details -->
                </div><!-- End .product-details-top -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <?php include_once("includes/mobile_overlay.php"); ?>


   

    <?php include_once("includes/script.php"); ?>

    <?php include_once("includes/footer.php"); ?>

</body>


<!-- molla/product-gallery.html  22 Nov 2019 10:03:29 GMT -->
</html>