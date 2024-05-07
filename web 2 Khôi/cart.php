<?php
session_start(); // Start the session at the very top to ensure it's the first thing happening.

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function redirectToLogin() {
    header("Location: login.php");
    exit();
}

// Check if the user is logged in. If not, redirect to the login page.
if (!isLoggedIn()) {
    redirectToLogin();
}

include_once("admin/function/admin_function.php");
$obj = new adminback();
include_once("includes/header.php");
// Handle the add to cart form submission
if (isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = []; // Initialize the cart if it doesn't exist
    }

    $product_id = $_POST['product_id'];
    $quantity = intval($_POST['quantity']);
    $product_details = $obj->getProductDetails($product_id);

    if ($product_details && $quantity > 0) { // Check if the product exists and the quantity is valid
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += $quantity; // Update existing item quantity
        } else {
            // Add new item to the cart
            $_SESSION['cart'][$product_id] = [
                'product_id' => $product_id,
                'product_name' => $product_details['pdt_name'],
                'price' => $product_details['pdt_price'],
                'quantity' => $quantity
            ];
        }
        header("Location: cart.php"); // Optionally redirect to cart page to see updated cart
        exit();
    }
}

// Handle item removal from the cart
if (isset($_GET['remove'])) {
    $product_id = $_GET['remove'];
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]); // Remove the item from the cart
    }
    header("Location: cart.php"); // Redirect to the cart page to avoid resubmission
    exit();
}

// Handle quantity updates
if (isset($_POST['update_cart'])) {
    $product_id = $_POST['product_id'];
    $new_quantity = intval($_POST['quantity']);

    if (isset($_SESSION['cart'][$product_id]) && $new_quantity > 0) {
        $_SESSION['cart'][$product_id]['quantity'] = $new_quantity;
    } elseif ($new_quantity <= 0) {
        unset($_SESSION['cart'][$product_id]); // Remove the item if quantity is zero or less
    }

    header("Location: cart.php"); // Redirect to avoid form resubmission issues
    exit();
}

$totalAmount = 0;
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $totalAmount += $item['price'] * $item['quantity'];
    }
}

// Handle shipping cost selection
if (isset($_POST['shipping'])) {
    $_SESSION['shipping_cost'] = floatval($_POST['shipping']);
}

// Initialize cart and shipping cost
$totalAmount = 0;
$shippingCost = $_SESSION['shipping_cost'] ?? 0; // Default to $0 if not set

// Calculate the subtotal of the cart
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $totalAmount += $item['price'] * $item['quantity'];
    }
}

// Total amount including shipping
$totalAmountIncludingShipping = $totalAmount + $shippingCost;

$_SESSION['total_with_shipping'] = $totalAmountIncludingShipping;   
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
                <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
            </div>
        </div>

        <br>
        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (!empty($_SESSION['cart'])) {
                                            foreach ($_SESSION['cart'] as $product_id => $item) {
                                                echo "<tr>";
                                                echo "<td>{$item['product_name']}</td>";
                                                echo "<td>\${$item['price']}</td>";
                                                echo "<td><form action='cart.php' method='post'>
                                                    <input type='number' name='quantity' value='{$item['quantity']}' min='1' style='width: 60px;'>
                                                    <input type='hidden' name='product_id' value='{$product_id}'>
                                                    <button type='submit' name='update_cart'>Update</button>
                                                    </form></td>";
                                                echo "<td>\$" . ($item['price'] * $item['quantity']) . "</td>";
                                                echo "<td><a href='?remove={$product_id}' class='btn-remove'>Remove</a></td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                                echo "<tr><td colspan='5'>Your cart is empty.</td></tr>";
                                        }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                        <!-- Additional elements for cart summary can be added here -->
                        
                        <aside class="col-lg-3">
    <form action="cart.php" method="post">
        <div class="summary summary-cart">
            <h3 class="summary-title">Cart Total</h3>

            <table class="table table-summary">
                <tbody>
                    <tr class="summary-subtotal">
                        <td>Subtotal:</td>
                        <td>$<?= number_format($totalAmount, 2) ?></td>
                    </tr>
                    <tr class="summary-shipping">
                        <td>Shipping:</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="summary-shipping-row">
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="free-shipping" name="shipping" value="0" class="custom-control-input" <?= $shippingCost == 0 ? 'checked' : '' ?> onchange="this.form.submit()">
                                <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                            </div>
                        </td>
                        <td>$0.00</td>
                    </tr>
                    <tr class="summary-shipping-row">
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="standard-shipping" name="shipping" value="10" class="custom-control-input" <?= $shippingCost == 10 ? 'checked' : '' ?> onchange="this.form.submit()">
                                <label class="custom-control-label" for="standard-shipping">Standard: $10.00</label>
                            </div>
                        </td>
                        <td>$10.00</td>
                    </tr>
                    <tr class="summary-shipping-row">
                        <td>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="express-shipping" name="shipping" value="20" class="custom-control-input" <?= $shippingCost == 20 ? 'checked' : '' ?> onchange="this.form.submit()">
                                <label class="custom-control-label" for="express-shipping">Express: $20.00</label>
                            </div>
                        </td>
                        <td>$20.00</td>
                    </tr>
                    <tr class="summary-total">
                        <td>Total:</td>
                        <td>$<?= number_format($totalAmountIncludingShipping, 2) ?></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <form action="checkout.php" method="post">
            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</button>
        </form>
        </div>
    
    
    <a href="search_products.php" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
</aside>


                    
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once("includes/footer.php"); // Includes the footer content ?>
    <!-- All necessary scripts for the Molla template -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- More scripts can be included as needed -->
</body>

</html>
