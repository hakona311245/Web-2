<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in. If not, redirect to the login page.
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if(!isset($_SESSION['cart'])){
    header("Location: cart.php");
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
    if ($obj->placeOrder($_SESSION['user_id'], $_SESSION['cart'], $_SESSION['total_with_shipping'], $paymentMethod, $shippingInfo)) {
                            // Xoá các sản phẩm trong giỏ hàng sau khi đặt hàng thành công
                            unset($_SESSION['cart']);
                            $_SESSION['cart'] = [];
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

                    <label>Phone *</label>
                    <input type="tel" class="form-control" name="phone" value="<?php echo htmlspecialchars($userDetails['phone']); ?>" required>

                    <h2 class="checkout-title">Change address destination</address></h2>

                    <label>Street address *</label>
                    <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($userDetails['address']); ?>" placeholder="House number and Street name" required>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Ward *</label>
                            <input type="text" class="form-control" name="ward" value="<?php echo htmlspecialchars($userDetails['ward']); ?>" required>
                        </div>
                        <div class="col-sm-6">
                            <label>District *</label>
                            <input type="text" class="form-control" name="district" value="<?php echo htmlspecialchars($userDetails['district']); ?>" required>
                        </div>
                    </div>

                    <label>City *</label>
                    <input type="text" class="form-control" name="city" value="<?php echo htmlspecialchars($userDetails['city']); ?>" required>
                </div>
                <aside class="col-lg-3" style="background-color: #f8f9fa;"> <!-- Assuming #f8f9fa is the color of the aside -->
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
                        <div class="accordion" id="accordion-payment">
                            <div class="card">
                                <div class="card-header" style="background-color: #f8f9fa;"> <!-- Applied same color here -->
                                    <label>
                                        <input type="radio" name="paymentMethod" value="Direct Bank Transfer" checked> Direct Bank Transfer
                                    </label>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" style="background-color: #f8f9fa;">
                                    <label>
                                        <input type="radio" name="paymentMethod" value="Check Payments"> Check Payments
                                    </label>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" style="background-color: #f8f9fa;">
                                    <label>
                                        <input type="radio" name="paymentMethod" value="Cash on Delivery"> Cash on Delivery
                                    </label>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" style="background-color: #f8f9fa;">
                                    <label>
                                        <input type="radio" name="paymentMethod" value="PayPal"> PayPal
                                    </label>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" style="background-color: #f8f9fa;">
                                    <label>
                                        <input type="radio" name="paymentMethod" value="Credit Card (Stripe)"> Credit Card (Stripe)
                                        <img src="assets/images/payments-summary.png" alt="payments cards">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-order btn-block" name="placeOrder">Place Order</button>
                    </div>
                </aside>
            </div>
        </form>
    </div>
</div>

</main><!-- End .main -->
</div><!-- End .page-wrapper -->
</body>
</html>
