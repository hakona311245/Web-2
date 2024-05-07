<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in. If not, redirect to the login page.
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include_once("admin/function/admin_function.php");
$obj = new adminback();

// Fetch user details
$userDetails = $obj->getUserDetails($_SESSION['user_id']);

if (!$userDetails) {
    // Handle the case where no user details are found
    echo "User details not found.";
    exit;
}

include 'includes/signup_view.inc.php';
include_once("includes/header.php"); // This file should include the initial part of the HTML structure.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $firstName = $_POST['first_name'] ?? $userDetails['first_name'];
    $lastName = $_POST['last_name'] ?? $userDetails['last_name'];
    $userName = $_POST['user_name'] ?? $userDetails['user_name'];
    $email = $_POST['email'] ?? $userDetails['email'];
    $address = $_POST['address'] ?? $userDetails['address'];
    $ward = $_POST['ward'] ?? $userDetails['ward'];
    $district = $_POST['district'] ?? $userDetails['district'];
    $city = $_POST['city'] ?? $userDetails['city'];
    $phone = $_POST['phone'] ?? $userDetails['phone'];

    // Call update method
    $updateResult = $obj->updateUserDetails($_SESSION['user_id'], $firstName, $lastName, $userName, $email, $address, $ward, $district, $city, $phone);

}
// Assuming session start and user login checks are done before this
$orders = $obj->getUserOrders($_SESSION['user_id']);
?>

<html lang="en">
<body>
    <div class="page-wrapper">
        <header class="header header-intro-clearance header-3">
            <?php include 'includes/head_top.php'; ?>
            <?php include 'includes/head_mid.php'; ?>
            <?php include 'includes/head_bottom.php'; ?>
        </header><!-- End .header -->

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">My Account<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <br>        
            <div class="page-content">
            	<div class="dashboard">
	                <div class="container">
	                	<div class="row">
	                		<aside class="col-md-4 col-lg-3">
	                			<ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
								    <li class="nav-item">
								        <a class="nav-link" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link active" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
								    </li>
									<form action="Log_out.php">
								    	<li class="nav-item">
											<a href="" class="nav-link"><button  type="submit" style="background:none!important; border:none; padding:0!important; color: orange; cursor:pointer;">Sign Out</button></a>
								    	</li>
									</form>
								</ul>
	                		</aside><!-- End .col-lg-3 -->

	                		<div class="col-md-8 col-lg-9">
	                			<div class="tab-content">
								    <div class="tab-pane fade" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
									<form action="Log_out.php" method="post">
    									<p>Hello <span class="font-weight-normal text-dark"><?php echo $userDetails['user_name']; ?></span> (not <?php echo $userDetails['user_name']; ?>? 
    										<button type="submit" style="background:none!important; border:none; padding:0!important; color: orange; text-decoration:underline; cursor:pointer;">Log out</button>)
										</p>
									</form>
								    	From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade show active" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
    <div class="table-responsive">
        <h4>Order Details</h4>
        <table class="table table-striped table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="text-center">Order ID</th>
                    <th scope="col" class="text-center">Product Name</th>
                    <th scope="col" class="text-center">Payment Method</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($orders as $order) {
                    $orderDetails = $obj->getOrderDetails($order['id']); // Assuming this returns all details for each order
                    foreach ($orderDetails as $detail) {
                        $productDetails = $obj->getProductDetailsById($detail['product_id']); // Fetch product details by product ID
                        echo "<tr>";
                        echo "<td class='text-center'>" . htmlspecialchars($order['id']) . "</td>";
                        echo "<td class='text-center'>" . htmlspecialchars($productDetails['pdt_name']) . "</td>"; // Display product name
                        echo "<td class='text-center'>" . htmlspecialchars($detail['payment_method']) . "</td>"; // Display payment method
                        echo "<td class='text-center'>" . htmlspecialchars($detail['quantity']) . "</td>"; // Display quantity
                        echo "<td class='text-center'>" . htmlspecialchars($detail['total']) . "</td>"; // Display total cost
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <a href="category.php" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
</div><!-- .End .tab-pane -->


								    <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
								    	<p>The following addresses will be used on the checkout page by default.</p>

								    	<div class="row">
								    		<div class="col-lg-6">
								    			<div class="card card-dashboard">
								    				<div class="card-body">
								    					<h3 class="card-title">Billing Address</h3><!-- End .card-title -->

														<?php
															if($userDetails['address']==null)	{
																$userDetails['address'] = "<Vui lòng điền địa chỉ>";

															echo'
															<p>'.$userDetails['user_name'].'<br>
															'.$userDetails['address'].'<br>
															'.$userDetails['phone'].'<br>
															'.$userDetails['email'].'<br>
															';
															}	else{
															echo'
															<p>'.$userDetails['user_name'].'<br>
															'.$userDetails['address'].'<br>
															'.$userDetails['ward'].', '.$userDetails['district'].', '.$userDetails['city'].'<br>
															'.$userDetails['phone'].'<br>
															'.$userDetails['email'].'<br>
															';
															}
														?>
														
														<a href="#tab-account" class="tab-trigger-link">Edit <i class="icon-edit"></i></a></p>
								    				</div><!-- End .card-body -->
								    			</div><!-- End .card-dashboard -->
								    		</div><!-- End .col-lg-6 -->
								    	</div><!-- End .row -->
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
								    	<form action="?update=success" method="post">
			                				<div class="row">
			                					<div class="col-sm-6">
			                						<label>First Name *</label>
			                						<input type="text" class="form-control" name="first_name" value="<?php echo htmlspecialchars($userDetails['first_name']); ?>">
			                					</div><!-- End .col-sm-6 -->

			                					<div class="col-sm-6">
			                						<label>Last Name *</label>
			                						<input type="text" class="form-control" name="last_name" value="<?php echo htmlspecialchars($userDetails['last_name']); ?>">
			                					</div><!-- End .col-sm-6 -->
			                				</div><!-- End .row -->

		            						<label>User Name *</label>
		            						<input type="text" class="form-control" name="user_name" value="<?php echo htmlspecialchars($userDetails['user_name']); ?>" placeholder="Username">
		            						<small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>
											
											<label>Your address *</label>
		        							<input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($userDetails['address']); ?>" placeholder="House number and Street name">

											<div class="row">
			                					<div class="col-sm-6">
			                						<label>Ward *</label>
			                						<input type="text" class="form-control" name="ward" value="<?php echo htmlspecialchars($userDetails['ward']); ?>">
			                					</div><!-- End .col-sm-6 -->

			                					<div class="col-sm-6">
			                						<label>District *</label>
			                						<input type="text" class="form-control" name="district" value="<?php echo htmlspecialchars($userDetails['district']); ?>" > 
			                					</div><!-- End .col-sm-6 -->

												<div class="col-sm-6">
			                						<label>City *</label>
			                						<input type="text" class="form-control" name="city" value="<?php echo htmlspecialchars($userDetails['city']); ?>">
			                					</div><!-- End .col-sm-6 -->
			                				</div><!-- End .row -->

		                					<label>Email address *</label>
		        							<input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($userDetails['email']); ?>">

		                					<button type="submit" class="btn btn-outline-primary-2">
			                					<span>SAVE CHANGES</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>
			                			</form>
								    </div><!-- .End .tab-pane -->
								</div>
	                		</div><!-- End .col-lg-9 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .dashboard -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
   

    <?php include 'includes/footer.php' ?>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->
</html>