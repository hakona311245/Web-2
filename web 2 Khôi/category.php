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
            <nav aria-label="breadcrumb" class="breadcrumb-nav breadcrumb-with-filter">
                <div class="container">
                	<a href="#" class="sidebar-toggler"><i class="icon-bars"></i>Filters</a>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item"><a href="#">Product Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Boxed</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

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
				
				<div class="sidebar-filter-overlay"></div><!-- End .sidebar-filter-overlay -->
                <aside class="sidebar-shop sidebar-filter sidebar-filter-banner">
                	<div class="sidebar-filter-wrapper">
                		<div class="widget widget-clean">
        					<label><i class="icon-close"></i>Filters</label>
        					<a href="#" class="sidebar-filter-clear">Clean All</a>
        				</div>
	                	<div class="widget">
							<h3 class="widget-title">
						        Browse Category
							</h3><!-- End .widget-title -->

							<div class="widget-body">
								<div class="filter-items filter-items-count">
									<div class="filter-item">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="cat-1">
											<label class="custom-control-label" for="cat-1">Women</label>
										</div><!-- End .custom-checkbox -->
										<span class="item-count">3</span>
									</div><!-- End .filter-item -->

									<div class="filter-item">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="cat-2">
											<label class="custom-control-label" for="cat-2">Men</label>
										</div><!-- End .custom-checkbox -->
										<span class="item-count">0</span>
									</div><!-- End .filter-item -->

									<div class="filter-item">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="cat-3">
											<label class="custom-control-label" for="cat-3">Holiday Shop</label>
										</div><!-- End .custom-checkbox -->
										<span class="item-count">0</span>
									</div><!-- End .filter-item -->

									<div class="filter-item">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="cat-4">
											<label class="custom-control-label" for="cat-4">Gifts</label>
										</div><!-- End .custom-checkbox -->
										<span class="item-count">0</span>
									</div><!-- End .filter-item -->

									<div class="filter-item">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="cat-5">
											<label class="custom-control-label" for="cat-5">Homeware</label>
										</div><!-- End .custom-checkbox -->
										<span class="item-count">0</span>
									</div><!-- End .filter-item -->

									<div class="filter-item">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="cat-6" checked="checked">
											<label class="custom-control-label" for="cat-6">Grid Categories Fullwidth</label>
										</div><!-- End .custom-checkbox -->
										<span class="item-count">13</span>
									</div><!-- End .filter-item -->

									<div class="sub-filter-items">
										<div class="filter-item">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="cat-7">
												<label class="custom-control-label" for="cat-7">Dresses</label>
											</div><!-- End .custom-checkbox -->
											<span class="item-count">3</span>
										</div><!-- End .filter-item -->

										<div class="filter-item">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="cat-8">
												<label class="custom-control-label" for="cat-8">T-shirts</label>
											</div><!-- End .custom-checkbox -->
											<span class="item-count">0</span>
										</div><!-- End .filter-item -->

										<div class="filter-item">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="cat-9">
												<label class="custom-control-label" for="cat-9">Bags</label>
											</div><!-- End .custom-checkbox -->
											<span class="item-count">4</span>
										</div><!-- End .filter-item -->

										<div class="filter-item">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="cat-10">
												<label class="custom-control-label" for="cat-10">Jackets</label>
											</div><!-- End .custom-checkbox -->
											<span class="item-count">2</span>
										</div><!-- End .filter-item -->

										<div class="filter-item">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="cat-11">
												<label class="custom-control-label" for="cat-11">Shoes</label>
											</div><!-- End .custom-checkbox -->
											<span class="item-count">2</span>
										</div><!-- End .filter-item -->

										<div class="filter-item">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="cat-12">
												<label class="custom-control-label" for="cat-12">Jumpers</label>
											</div><!-- End .custom-checkbox -->
											<span class="item-count">1</span>
										</div><!-- End .filter-item -->

										<div class="filter-item">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="cat-13">
												<label class="custom-control-label" for="cat-13">Jeans</label>
											</div><!-- End .custom-checkbox -->
											<span class="item-count">1</span>
										</div><!-- End .filter-item -->

										<div class="filter-item">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="cat-14">
												<label class="custom-control-label" for="cat-14">Sportwear</label>
											</div><!-- End .custom-checkbox -->
											<span class="item-count">0</span>
										</div><!-- End .filter-item -->
									</div><!-- End .sub-filter-items -->
								</div><!-- End .filter-items -->
							</div><!-- End .widget-body -->
						</div><!-- End .widget -->
					</div><!-- End .sidebar-filter-wrapper -->
                </aside><!-- End .sidebar-filter -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->


    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <?php include_once("includes/mobile_overlay.php"); ?>

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="singin-email">Username or email address *</label>
                                            <input type="text" class="form-control" id="singin-email" name="singin-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password" name="singin-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <a href="#" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email" name="register-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password" name="register-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login  btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    <?php include_once("includes/footer.php"); ?>

    <?php include_once("includes/script.php"); ?>
</body>


<!-- molla/product-category-boxed.html  22 Nov 2019 10:03:09 GMT -->
</html>