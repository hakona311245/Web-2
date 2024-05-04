<?php
session_start();
include_once("admin/function/admin_function.php");
$obj = new adminback();

// Retrieve search parameters from GET request
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : 0;
$min_price = isset($_GET['min_price']) ? $_GET['min_price'] : 0;
$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : PHP_INT_MAX;

// Set pagination variables
$limit = 12; // Number of products per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch matching products using search_product() function
$search_results = $obj->search_product($keyword, $offset, $limit, $category, $min_price, $max_price);
$total_results = $obj->get_search_results_count($keyword, $category, $min_price, $max_price);
$total_pages = ceil($total_results / $limit);
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
        			<h1 class="page-title">Grid 4 Columns<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->

            <br>

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                			<div class="toolbox">
                				<div class="toolbox-left">
                                <div class="toolbox-info">
                                    Showing <?php echo ($search_results && mysqli_num_rows($search_results) > 0) ? mysqli_num_rows($search_results) : 0; ?> of <?php echo $total_results; ?> Products
                                </div><!-- End .toolbox+--info -->
                				</div><!-- End .toolbox-left -->
                			</div><!-- End .toolbox -->

                            <div class="products mb-3">
                                <div class="row justify-content-center">
                                    <?php if ($search_results && mysqli_num_rows($search_results) > 0) {
                                        while ($product = mysqli_fetch_assoc($search_results)) { ?>
                                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                                <div class="product product-7 text-center">
                                                    <figure class="product-media">
                                                        <a href="product_detail.php?id=<?php echo $product['pdt_id']; ?>">
                                                            <img src="assets/images/products/<?php echo $product['pdt_img']; ?>" alt="<?php echo $product['pdt_name']; ?>" class="product-image">
                                                        </a>
                                                        <form action="cart.php?id=<? $_SESSION['user_id'] ?>" method="post">
                                                            <div class="product-action">
                                                                <input type="hidden" name="product_id" value="<?php echo $product['pdt_id']; ?>">
                                                                <input type="hidden" name="add_to_cart" value="1">
                                                                <input type="number" name="quantity" value="1" min="1" style="width: 60px; display: none;">
                                                                <button name="add_to_cart" type="submit" class="btn-product btn-cart" style="border: none;" value="$product['pdt_id']"><span>add to cart</span></button>
                                                            </div><!-- End .product-action -->
                                                        </form>
                                                    </figure><!-- End .product-media -->
                                                    <div class="product-body">
                                                        <div class="product-cat">
                                                            <a href="category.php?status=catView&id=<?php echo $product['ctg_id'] ?>"><?php echo $product['ctg_name']; ?></a>
                                                        </div><!-- End .product-cat -->
                                                        <h3 class="product-title"><a href="product_detail.php?id=<?php echo $product['pdt_id']; ?>"><?php echo $product['pdt_name']; ?></a></h3><!-- End .product-title -->
                                                        <div class="product-price">
                                                            $<?php echo $product['pdt_price']; ?>
                                                        </div><!-- End .product-price -->
                                                        
                                                        <div class="product-nav product-nav-thumbs">
                                                            <?php
                                                            $product_images = $obj->getProductImages($product['pdt_id']);
                                                            $i = 0;
                                                            while ($image = mysqli_fetch_assoc($product_images)) {
                                                                $active = ($i == 0) ? 'active' : '';
                                                                ?>
                                                                <a href="#" class="<?php echo $active; ?>">
                                                                    <img src="assets/images/products/single/gallery/<?php echo $image['image_url']; ?>" alt="product desc">
                                                                </a>
                                                                <?php
                                                                $i++;
                                                            }
                                                            ?>
                                                        </div><!-- End .product-nav -->
                                                    </div><!-- End .product-body -->
                                                </div><!-- End .product -->
                                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                        <?php }
                                    } else { ?>
                                        <div class="col-12">
                                            <p>No products found matching your search criteria.</p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div><!-- End .products -->
                                
                                

                			<nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <?php if ($page > 1) { ?>
                                        <li class="page-item">
                                            <button class="page-link page-link-prev" href="?keyword=<?php echo $keyword; ?>&category=<?php echo $category; ?>&min_price=<?php echo $min_price; ?>&max_price=<?php echo $max_price; ?>&page=<?php echo $page - 1; ?>" aria-label="Previous">
                                                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                        </button>
                                        </li>
                                    <?php }
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        if ($i == $page) { ?>
                                            <li class="page-item active" aria-current="page"><button class="page-link" href="#"><?php echo $i; ?></button></li>
                                        <?php } else { ?>
                                            <li class="page-item"><button class="page-link" href="?keyword=<?php echo $keyword; ?>&category=<?php echo $category; ?>&min_price=<?php echo $min_price; ?>&max_price=<?php echo $max_price; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></button></li>
                                        <?php }
                                    }
                                    if ($page < $total_pages) { ?>
                                        <li class="page-item">
                                            <button class="page-link page-link-next" href="?keyword=<?php echo $keyword; ?>&category=<?php echo $category; ?>&min_price=<?php echo $min_price; ?>&max_price=<?php echo $max_price; ?>&page=<?php echo $page + 1; ?>" aria-label="Next">
                                                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                            </button>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                		</div><!-- End .col-lg-9 -->
                		<aside class="col-lg-3 order-lg-first">
                			<div class="sidebar sidebar-shop">
                				<div class="widget widget-clean">
                					<label>Filters:</label>
                					<a href="search_products.php" onclick="window.location.reload();" class="sidebar-filter-clear">Clean All</a>
                				</div><!-- End .widget widget-clean -->

                				<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
									        Category
									    </a>
									</h3><!-- End .widget-title -->

                                    <div class="collapse show" id="widget-1">
                                        <div class="widget-body">
                                            <div class="filter-items filter-items-count">
                                                <?php
                                                $categories = $obj->getCategories();
                                                $category_counts = $obj->getCategoryCounts($keyword);                    
                                                while ($category = mysqli_fetch_assoc($categories)) {
                                                    $category_id = $category['ctg_id'];
                                                    $category_name = $category['ctg_name'];
                                                    $item_count = isset($category_counts[$category_id]) ? $category_counts[$category_id] : 0;
                                                    ?>
                                                    
                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="radio" class="custom-control-input" id="cat-<?php echo $category_id; ?>" name="category" value="<?php echo $category_id; ?>" <?php echo (isset($_GET['category']) && $_GET['category'] == $category_id) ? 'checked' : ''; ?>>
                                                            <label class="custom-control-label" for="cat-<?php echo $category_id; ?>"><?php echo $category_name; ?></label>
                                                        </div><!-- End .custom-radio -->
                                                        <span class="item-count"><?php echo $item_count; ?></span>
                                                    </div><!-- End .filter-item -->
                                                    <?php
                                                }
                                                ?>
                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
        						</div><!-- End .widget -->

        						<div class="widget price-filter">
                                    <h4 class="wgt-title">Price</h4>
                                    <div class="wgt-content">
                                        <div class="frm-contain">
                                            <form action="search_products.php" name="price-filter" id="price-filter" method="get">
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
                                                <button class="btn-submit btn-go" type="submit">Go</button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- End .widget -->
                			</div><!-- End .sidebar sidebar-shop -->
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <?php include_once("includes/mobile_overlay.php"); ?>


   

    <?php include_once("includes/footer.php"); ?>

    <?php include_once("includes/script.php"); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var categoryRadios = document.querySelectorAll('input[name="category"]');
            categoryRadios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    var selectedCategory = this.value;
                    var url = new URL(window.location.href);
                    url.searchParams.set('category', selectedCategory);
                    window.location.href = url.toString();
                });
            });
        });
    </script>
</body>


<!-- molla/category-4cols.html  22 Nov 2019 10:02:55 GMT -->
</html>