<?php
session_start();
include_once ("admin/function/admin_function.php");
$obj = new adminback();
$categories = $obj->getCategories();
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
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Product Category Boxed<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->

            <br>

            <div class="page-content">
            	<div class="categories-page">
	                <div class="container">
                        <div class="row">
                            <?php
                            if (isset($_GET['id'])) {
                                $ctg_id = $_GET['id'];
                                $products = $obj->getProductsByCategory($ctg_id);
                            
                                if (mysqli_num_rows($products) > 0) {
                                    while ($product = mysqli_fetch_assoc($products)) {
                                        ?>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="banner banner-cat banner-badge">
                                                <img src="assets/images/products/<?php echo $product['pdt_img']; ?>" alt="<?php echo $product['pdt_name']; ?>">
                                                <a class="banner-link" href="product_detail.php?id=<?php echo $product['pdt_id']; ?>">
                                                    <h3 class="banner-title"><?php echo $product['pdt_name']; ?></h3>
                                                    <h4 class="banner-subtitle">$<?php echo $product['pdt_price']; ?></h4>
                                                    <span class="banner-link-text">View Product</span>
                                                </a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    echo '<div class="col-12">No products found in this category.</div>';
                                }
                            } else {
                                echo '<div class="col-12">Invalid category ID.</div>';
                            }
                            ?>
                        </div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .categories-page -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->


    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <?php include_once("includes/mobile_overlay.php"); ?>

    <?php include_once("includes/footer.php"); ?>

    <?php include_once("includes/script.php"); ?>
</body>


<!-- molla/product-category-boxed.html  22 Nov 2019 10:03:09 GMT -->
</html>