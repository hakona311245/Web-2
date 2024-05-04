<div class="header-left">
            <div class="dropdown category-dropdown">
                <a href="product-category-boxed copy.php" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                    Browse Categories <i class="icon-angle-down"></i>
                </a>
                <div class="dropdown-menu">
                    <nav class="side-nav">
                    <ul class="menu-vertical sf-arrows">
                        <?php 
                            $categories = $obj->getCategories();
                            foreach ($categories as $category) {
                        ?>
                        <li>
                            <a href="category.php?status=catView&id=<?php echo $category['ctg_id'] ?>" class="menu-name" data-title="<?php echo $category['ctg_name'] ?>"><?php echo $category['ctg_name'] ?></a>
                        </li>
                        <?php } ?>
                    </ul><!-- End .menu-vertical --><!-- End .menu-vertical -->
                    </nav><!-- End .side-nav -->
                </div><!-- End .dropdown-menu -->
            </div><!-- End .category-dropdown -->
        </div><!-- End .header-left -->