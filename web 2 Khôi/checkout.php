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

include_once("includes/header.php"); // This file should include the initial part of the HTML structure.

if (isset($_POST['placeOrder'])) {
    // Lấy dữ liệu từ form
    $paymentMethod = $_POST['paymentMethod'];
    $shippingInfo = [
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'district' => $_POST['district'],
        'city' => $_POST['city'],
        'ward' => $_POST['ward']
    ];

    // Gọi hàm để lưu đơn hàng vào cơ sở dữ liệu
    if ($obj->placeOrder($userDetails['user_id'], $_SESSION['cart'], $_SESSION['total_with_shipping'], $paymentMethod, $shippingInfo)) {
                            // Xoá các sản phẩm trong giỏ hàng sau khi đặt hàng thành công
                            unset($_SESSION['cart']);
                            $_SESSION['cart'] = [];
        // Redirect và thông báo cho người dùng
        echo "<script> window.location.href = 'checkout.php';  alert('Order placed successfully.');</script>";
    } else {
        echo "<script>alert('Failed to place order. Please try again.');</script>";
    }
}

// echo $obj->placeOrder($_SESSION['user_id'], $_SESSION['cart'], $_SESSION['total_with_shipping'], $paymentMethod, $shippingInfo);

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
                    <h1 class="page-title">Checkout<span>Shop</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->

           <!-- Checkout Form HTML with Pre-filled User and Address Information -->
<br>
<div class="page-content">
    <div class="checkout">
        <div class="container">
        <form action="" method="post">
    <div class="row">
        <div class="col-lg-9">
            <h2 class="checkout-title">Billing Details</h2>
            <div class="row">
                <div class="col-sm-6">
                    <label>First Name *</label>
                    <input type="text" class="form-control" name="first_name" value="<?php echo htmlspecialchars($userDetails['first_name']); ?>" required>
                </div>
                <div class="col-sm-6">
                    <label>Last Name *</label>
                    <input type="text" class="form-control" name="last_name" value="<?php echo htmlspecialchars($userDetails['last_name']); ?>" required>
                </div>
            </div>

            <label>City *</label>
            <input type="text" class="form-control" name="city" value="<?php echo htmlspecialchars($userDetails['city']); ?>" required> <!-- Assuming 'city' gives an indication of the country contextually -->

            <label style="font-weight: bold;">Fix your address for wanted destination in the bill</label>

            <br>

            <label>Street address *</label>
            <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($userDetails['address']); ?>" placeholder="House number and Street name" required>

            <div class="row">
                <div class="col-sm-6">
                    <label>Ward *</label>
                    <input type="text" class="form-control" name="ward" value="<?php echo htmlspecialchars($userDetails['ward']); ?>" required>
                </div>
                <div class="col-sm-6">
                    <label>District *</label>
                    <input type="text" class="form-control" name="district" value="<?php echo htmlspecialchars($userDetails['district']); ?>" required> <!-- Assuming 'district' for 'state', modify if incorrect -->
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label>Phone *</label>
                    <input type="tel" class="form-control" name="phone" value="<?php echo htmlspecialchars($userDetails['phone']); ?>" required>
                </div>
            </div>

            <label>Email address *</label>
            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($userDetails['email']); ?>">

            <label>Order notes (optional)</label>
            <textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
        </div>
        <aside class="col-lg-3">
    <div class="summary">
        <h3 class="summary-title">Your Order</h3>
        <table class="table table-summary">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $subtotal = 0;
                if (!empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $item) {
                        $productTotal = $item['price'] * $item['quantity'];
                        $subtotal += $productTotal;
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($item['product_name']) . "</td>";
                        echo "<td>$" . number_format($productTotal, 2) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Your cart is empty.</td></tr>";
                }
                ?>
                <tr class="summary-subtotal">
                    <td>Subtotal:</td>
                    <td>$<?= number_format($subtotal, 2); ?></td>
                </tr>
                <tr>
                    <td>Shipping:</td>
                    <td>$<?= number_format($_SESSION['shipping_cost'] ?? 0, 2); ?></td>
                </tr>
                <tr class="summary-total">
                    <td>Total:</td>
                    <td>$<?= number_format($_SESSION['total_with_shipping'], 2); ?></td>
                </tr>
            </tbody>
        </table>
            <div class="accordion-summary" id="accordion-payment">
                <div class="card">
                    <div class="card-header" id="heading-1">
                        <h2 class="card-title">
                            <label>
                                <input type="radio" name="paymentMethod" value="Direct Bank Transfer" checked>
                                Direct Bank Transfer
                            </label>
                        </h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading-2">
                        <h2 class="card-title">
                            <label>
                                <input type="radio" name="paymentMethod" value="Check Payments">
                                Check Payments
                            </label>
                        </h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading-3">
                        <h2 class="card-title">
                            <label>
                                <input type="radio" name="paymentMethod" value="Cash on delivery">
                                Cash on delivery
                            </label>
                        </h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading-4">
                        <h2 class="card-title">
                            <label>
                                <input type="radio" name="paymentMethod" value="PayPal">
                                PayPal
                            </label>
                        </h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading-5">
                        <h2 class="card-title">
                            <label>
                                <input type="radio" name="paymentMethod" value="Credit Card (Stripe)">
                                Credit Card (Stripe)
                            </label>
                            <img src="assets/images/payments-summary.png" alt="payments cards">
                        </h2>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block" name="placeOrder">
                <span class="btn-text">Place Order</span>
                <span class="btn-hover-text">Place Order</span>
            </button>
        
    </div>
</aside>
    </div>
        
</form>

    </div>
    <!-- Additional content here -->
        </div>
    </div>
</div>

                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
    </div><!-- End .page-wrapper -->
</body>
</html>
