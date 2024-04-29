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
                
                <?php include 'includes/head_top.php' ?>

                <?php include 'includes/head_mid.php' ?>

                <div class="header-bottom sticky-header">
                    <div class="container">
                        <div class="header-left">
                            <div class="dropdown category-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                                    Browse Categories <i class="icon-angle-down"></i>
                                </a>

                                <div class="dropdown-menu">
                                    <nav class="side-nav">
                                        <ul class="menu-vertical sf-arrows">
                                            <li class="item-lead"><a href="#">Daily offers</a></li>
                                            <li class="item-lead"><a href="#">Gift Ideas</a></li>
                                            <li><a href="#">Beds</a></li>
                                            <li><a href="#">Lighting</a></li>
                                            <li><a href="#">Sofas & Sleeper sofas</a></li>
                                            <li><a href="#">Storage</a></li>
                                            <li><a href="#">Armchairs & Chaises</a></li>
                                            <li><a href="#">Decoration </a></li>
                                            <li><a href="#">Kitchen Cabinets</a></li>
                                            <li><a href="#">Coffee & Tables</a></li>
                                            <li><a href="#">Outdoor Furniture </a></li>
                                        </ul><!-- End .menu-vertical -->
                                    </nav><!-- End .side-nav -->
                                </div><!-- End .dropdown-menu -->
                            </div><!-- End .category-dropdown -->
                        </div><!-- End .header-left -->

                        <div class="header-center">
                            <nav class="main-nav">
                                <ul class="menu sf-arrows">
                                    <li class="megamenu-container active">
                                        <a href="index.html" class="sf-with-ul">Home</a>

                                        <div class="megamenu demo">
                                            <div class="menu-col">
                                                <div class="menu-title">Choose your demo</div><!-- End .menu-title -->

                                                <div class="demo-list">
                                                    <div class="demo-item">
                                                        <a href="index-1.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/1.jpg);"></span>
                                                            <span class="demo-title">01 - furniture store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item">
                                                        <a href="index-2.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/2.jpg);"></span>
                                                            <span class="demo-title">02 - furniture store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item">
                                                        <a href="index-3.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/3.jpg);"></span>
                                                            <span class="demo-title">03 - electronic store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item">
                                                        <a href="index-4.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/4.jpg);"></span>
                                                            <span class="demo-title">04 - electronic store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item">
                                                        <a href="index-5.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/5.jpg);"></span>
                                                            <span class="demo-title">05 - fashion store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item">
                                                        <a href="index-6.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/6.jpg);"></span>
                                                            <span class="demo-title">06 - fashion store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item">
                                                        <a href="index-7.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/7.jpg);"></span>
                                                            <span class="demo-title">07 - fashion store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item">
                                                        <a href="index-8.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/8.jpg);"></span>
                                                            <span class="demo-title">08 - fashion store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item">
                                                        <a href="index-9.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/9.jpg);"></span>
                                                            <span class="demo-title">09 - fashion store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item">
                                                        <a href="index-10.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/10.jpg);"></span>
                                                            <span class="demo-title">10 - shoes store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item hidden">
                                                        <a href="index-11.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/11.jpg);"></span>
                                                            <span class="demo-title">11 - furniture simple store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item hidden">
                                                        <a href="index-12.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/12.jpg);"></span>
                                                            <span class="demo-title">12 - fashion simple store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item hidden">
                                                        <a href="index-13.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/13.jpg);"></span>
                                                            <span class="demo-title">13 - market</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item hidden">
                                                        <a href="index-14.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/14.jpg);"></span>
                                                            <span class="demo-title">14 - market fullwidth</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item hidden">
                                                        <a href="index-15.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/15.jpg);"></span>
                                                            <span class="demo-title">15 - lookbook 1</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item hidden">
                                                        <a href="index-16.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/16.jpg);"></span>
                                                            <span class="demo-title">16 - lookbook 2</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item hidden">
                                                        <a href="index-17.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/17.jpg);"></span>
                                                            <span class="demo-title">17 - fashion store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item hidden">
                                                        <a href="index-18.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/18.jpg);"></span>
                                                            <span class="demo-title">18 - fashion store (with sidebar)</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item hidden">
                                                        <a href="index-19.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/19.jpg);"></span>
                                                            <span class="demo-title">19 - games store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item hidden">
                                                        <a href="index-20.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/20.jpg);"></span>
                                                            <span class="demo-title">20 - book store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item hidden">
                                                        <a href="index-21.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/21.jpg);"></span>
                                                            <span class="demo-title">21 - sport store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item hidden">
                                                        <a href="index-22.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/22.jpg);"></span>
                                                            <span class="demo-title">22 - tools store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item hidden">
                                                        <a href="index-23.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/23.jpg);"></span>
                                                            <span class="demo-title">23 - fashion left navigation store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                    <div class="demo-item hidden">
                                                        <a href="index-24.html">
                                                            <span class="demo-bg" style="background-image: url(assets/images/menu/demos/24.jpg);"></span>
                                                            <span class="demo-title">24 - extreme sport store</span>
                                                        </a>
                                                    </div><!-- End .demo-item -->

                                                </div><!-- End .demo-list -->

                                                <div class="megamenu-action text-center">
                                                    <a href="#" class="btn btn-outline-primary-2 view-all-demos"><span>View All Demos</span><i class="icon-long-arrow-right"></i></a>
                                                </div><!-- End .text-center -->
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .megamenu -->
                                    </li>
                                    <li>
                                        <a href="category.html" class="sf-with-ul">Shop</a>

                                        <div class="megamenu megamenu-md">
                                            <div class="row no-gutters">
                                                <div class="col-md-8">
                                                    <div class="menu-col">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="menu-title">Shop with sidebar</div><!-- End .menu-title -->
                                                                <ul>
                                                                    <li><a href="category-list.html">Shop List</a></li>
                                                                    <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                                                                    <li><a href="category.html">Shop Grid 3 Columns</a></li>
                                                                    <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                                                                    <li><a href="category-market.html"><span>Shop Market<span class="tip tip-new">New</span></span></a></li>
                                                                </ul>

                                                                <div class="menu-title">Shop no sidebar</div><!-- End .menu-title -->
                                                                <ul>
                                                                    <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span class="tip tip-hot">Hot</span></span></a></li>
                                                                    <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                                                                </ul>
                                                            </div><!-- End .col-md-6 -->

                                                            <div class="col-md-6">
                                                                <div class="menu-title">Product Category</div><!-- End .menu-title -->
                                                                <ul>
                                                                    <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                                                                    <li><a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span class="tip tip-new">New</span></span></a></li>
                                                                </ul>
                                                                <div class="menu-title">Shop Pages</div><!-- End .menu-title -->
                                                                <ul>
                                                                    <li><a href="cart.html">Cart</a></li>
                                                                    <li><a href="checkout.html">Checkout</a></li>
                                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                                    <li><a href="dashboard.html">My Account</a></li>
                                                                    <li><a href="#">Lookbook</a></li>
                                                                </ul>
                                                            </div><!-- End .col-md-6 -->
                                                        </div><!-- End .row -->
                                                    </div><!-- End .menu-col -->
                                                </div><!-- End .col-md-8 -->

                                                <div class="col-md-4">
                                                    <div class="banner banner-overlay">
                                                        <a href="category.html" class="banner banner-menu">
                                                            <img src="assets/images/menu/banner-1.jpg" alt="Banner">

                                                            <div class="banner-content banner-content-top">
                                                                <div class="banner-title text-white">Last <br>Chance<br><span><strong>Sale</strong></span></div><!-- End .banner-title -->
                                                            </div><!-- End .banner-content -->
                                                        </a>
                                                    </div><!-- End .banner banner-overlay -->
                                                </div><!-- End .col-md-4 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .megamenu megamenu-md -->
                                    </li>
                                    <li>
                                        <a href="product.html" class="sf-with-ul">Product</a>

                                        <div class="megamenu megamenu-sm">
                                            <div class="row no-gutters">
                                                <div class="col-md-6">
                                                    <div class="menu-col">
                                                        <div class="menu-title">Product Details</div><!-- End .menu-title -->
                                                        <ul>
                                                            <li><a href="product.html">Default</a></li>
                                                            <li><a href="product-centered.html">Centered</a></li>
                                                            <li><a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a></li>
                                                            <li><a href="product-gallery.html">Gallery</a></li>
                                                            <li><a href="product-sticky.html">Sticky Info</a></li>
                                                            <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                                                            <li><a href="product-fullwidth.html">Full Width</a></li>
                                                            <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                                                        </ul>
                                                    </div><!-- End .menu-col -->
                                                </div><!-- End .col-md-6 -->

                                                <div class="col-md-6">
                                                    <div class="banner banner-overlay">
                                                        <a href="category.html">
                                                            <img src="assets/images/menu/banner-2.jpg" alt="Banner">

                                                            <div class="banner-content banner-content-bottom">
                                                                <div class="banner-title text-white">New Trends<br><span><strong>spring 2019</strong></span></div><!-- End .banner-title -->
                                                            </div><!-- End .banner-content -->
                                                        </a>
                                                    </div><!-- End .banner -->
                                                </div><!-- End .col-md-6 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .megamenu megamenu-sm -->
                                    </li>
                                    <li>
                                        <a href="#" class="sf-with-ul">Pages</a>

                                        <ul>
                                            <li>
                                                <a href="about.html" class="sf-with-ul">About</a>

                                                <ul>
                                                    <li><a href="about.html">About 01</a></li>
                                                    <li><a href="about-2.html">About 02</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="contact.html" class="sf-with-ul">Contact</a>

                                                <ul>
                                                    <li><a href="contact.html">Contact 01</a></li>
                                                    <li><a href="contact-2.html">Contact 02</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="faq.html">FAQs</a></li>
                                            <li><a href="404.html">Error 404</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="blog.html" class="sf-with-ul">Blog</a>

                                        <ul>
                                            <li><a href="blog.html">Classic</a></li>
                                            <li><a href="blog-listing.html">Listing</a></li>
                                            <li>
                                                <a href="#">Grid</a>
                                                <ul>
                                                    <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                                    <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                                    <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                                    <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Masonry</a>
                                                <ul>
                                                    <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                                    <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                                    <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                                    <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Mask</a>
                                                <ul>
                                                    <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                                    <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Single Post</a>
                                                <ul>
                                                    <li><a href="single.html">Default with sidebar</a></li>
                                                    <li><a href="single-fullwidth.html">Fullwidth no sidebar</a></li>
                                                    <li><a href="single-fullwidth-sidebar.html">Fullwidth with sidebar</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="elements-list.html" class="sf-with-ul">Elements</a>

                                        <ul>
                                            <li><a href="elements-products.html">Products</a></li>
                                            <li><a href="elements-typography.html">Typography</a></li>
                                            <li><a href="elements-titles.html">Titles</a></li>
                                            <li><a href="elements-banners.html">Banners</a></li>
                                            <li><a href="elements-product-category.html">Product Category</a></li>
                                            <li><a href="elements-video-banners.html">Video Banners</a></li>
                                            <li><a href="elements-buttons.html">Buttons</a></li>
                                            <li><a href="elements-accordions.html">Accordions</a></li>
                                            <li><a href="elements-tabs.html">Tabs</a></li>
                                            <li><a href="elements-testimonials.html">Testimonials</a></li>
                                            <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                                            <li><a href="elements-portfolio.html">Portfolio</a></li>
                                            <li><a href="elements-cta.html">Call to Action</a></li>
                                            <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
                                        </ul>
                                    </li>
                                </ul><!-- End .menu -->
                            </nav><!-- End .main-nav -->
                        </div><!-- End .header-center -->

                        <div class="header-right">
                            <i class="la la-lightbulb-o"></i><p>Clearance<span class="highlight">&nbsp;Up to 30% Off</span></p>
                        </div>
                    </div><!-- End .container -->
                </div><!-- End .header-bottom -->
            </header><!-- End .header -->

        <main class="main">
        	
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


	                		<?php while ($category = mysqli_fetch_assoc($categories)) { ?>
                                <div class="col-sm-6 col-md-3">
                                    <div class="banner banner-cat banner-badge">
                                        <a href="#">
                                                <img src="assets/images/category/boxed/banner-6.jpg" alt="Banner">
                                        </a>
                                        <a class="banner-link" href="category.php?status=catView&id=<?php echo $category['ctg_id'] ?>">
                                            <h3 class="banner-title"><?php echo $category['ctg_name'] ?></h3>
                                            <h4 class="banner-subtitle"><?php echo $category['item_count'] ?> Products</h4>
                                            <span class="banner-link-text">Shop Now</span>
                                        </a>
                                    </div>
                                </div>
                                <?php } ?><!-- End .col-md-3 -->


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