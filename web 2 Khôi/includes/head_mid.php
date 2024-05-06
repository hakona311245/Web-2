<div class="header-middle">
    <div class="container">
        <div class="header-left">
            <button class="mobile-menu-toggler">
                <span class="sr-only">Toggle mobile menu</span>
                <i class="icon-bars"></i>
            </button>
            
            <a href="index.php" class="logo">
                <img src="assets/images/demos/demo-3/logo.png" alt="Molla Logo" width="105" height="25">
            </a>
        </div><!-- End .header-left -->
        <div class="header-center">
            <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                <a href="search_products.php" class="search-toggle" role="button"><i class="icon-search"></i></a>
                <form action="search_products.php" method="get">
                    <div class="header-search-wrapper search-wrapper-wide">
                        <label for="q" class="sr-only">Search</label>
                        <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        <input type="search" class="form-control" name="keyword" id="q" placeholder="Search product ...">
                    </div><!-- End .header-search-wrapper -->
                </form>
            </div><!-- End .header-search -->
        </div>
        <div class="header-right">

            <div class="dropdown cart-dropdown">
                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                    <div class="icon">
                        <i class="icon-shopping-cart"></i>
                    </div>
                    <p>Cart</p>
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                    
                    <div class="dropdown-cart-action">
                        <a href="cart.php" class="btn btn-primary">View Cart</a>
                        <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .dropdown-cart-total -->
                </div><!-- End .dropdown-menu -->
            </div><!-- End .cart-dropdown -->
        </div><!-- End .header-right -->
    </div><!-- End .container -->
</div><!-- End .header-middle -->