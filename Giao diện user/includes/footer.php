<?php 
$obj = new adminback();  // Create an object of the adminback class
// $links = $obj->display_links();  // Call the display_links method of the adminback object
// $link = mysqli_fetch_assoc($links);  // Fetch an associative array from the returned mysqli result
?>
<footer class="footer">
	<div class="footer-middle">
        <div class="container">
        	<div class="row">
        		<div class="col-sm-6 col-lg-3">
        			<div class="widget widget-about">
        				<img src="assets/images/demos/demo-3/logo-footer.png" class="footer-logo" alt="Footer Logo" width="105" height="25">
        				<p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>
        				<div class="widget-call">
                            <i class="icon-phone"></i>
                            Got Question? Call us 24/7
                            <a href="tel:#">+0123 456 789</a>         
                        </div><!-- End .widget-call -->
        			</div><!-- End .widget about-widget -->
        		</div><!-- End .col-sm-6 col-lg-3 -->
        		<div class="col-sm-6 col-lg-3">
        			<div class="widget">
        				<h4 class="widget-title">My Account</h4><!-- End .widget-title -->
        				<ul class="widget-list">
        					<li><a href="login.php">Sign In</a></li>
        					<li><a href="cart.php">View Cart</a></li>
        					<li><a href="dashboard.php">Track My Order</a></li>
        				</ul><!-- End .widget-list -->
        			</div><!-- End .widget -->
        		</div><!-- End .col-sm-6 col-lg-3 -->
        	</div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->
    <div class="footer-bottom">
    	<div class="container">
    		<p class="footer-copyright">Copyright © 2019 Molla Store. All Rights Reserved.</p><!-- End .footer-copyright -->
    		<figure class="footer-payments">
    			<img src="assets/images/payments.png" alt="Payment methods" width="272" height="20">
    		</figure><!-- End .footer-payments -->
    	</div><!-- End .container -->
    </div><!-- End .footer-bottom -->
</footer><!-- End .footer -->