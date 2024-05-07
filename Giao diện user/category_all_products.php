<?php
session_start();
include_once("admin/function/admin_function.php");
$obj = new adminback();
$products = $obj->getAllProducts();

include_once("includes/header.php");
?>

<body>
    <div class="page-wrapper">
        <header class="header header-intro-clearance header-3">
        <?php include_once("includes/head_top.php"); ?>
        <?php include_once("includes/head_mid.php"); ?>
        <?php include_once("includes/head_bottom.php"); ?>
        </header><!-- End .header -->

        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">All Products<span>Shop</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->

            <br>

            <div class="page-content">
                <div class="categories-page">
                    <div class="container">
                        <div class="row">
                            <?php
                            if (mysqli_num_rows($products) > 0) {
                                while ($product = mysqli_fetch_assoc($products)) {
                                    ?>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="banner banner-cat banner-badge">
                                            <img src="assets/images/products/<?php echo htmlspecialchars($product['pdt_img']); ?>" alt="<?php echo htmlspecialchars($product['pdt_name']); ?>">
                                            <a class="banner-link" href="product_detail.php?id=<?php echo htmlspecialchars($product['pdt_id']); ?>">
                                                <h3 class="banner-title"><?php echo htmlspecialchars($product['pdt_name']); ?></h3>
                                                <h4 class="banner-subtitle">$<?php echo htmlspecialchars($product['pdt_price']); ?></h4>
                                                <span class="banner-link-text">View Product</span>
                                            </a>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo '<div class="col-12">No products found.</div>';
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
</html>
