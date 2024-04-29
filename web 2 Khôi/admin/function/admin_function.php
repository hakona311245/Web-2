<?php 
class adminback 
{
    private $conn;

    function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "web";

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$this->conn) {
            die("Databse connection error!!!");
        }
    }

    function getCategories() {
        $query = "SELECT c.ctg_id, c.ctg_name, COUNT(p.pdt_id) AS item_count 
                  FROM category c
                  LEFT JOIN products p ON c.ctg_id = p.pdt_ctg
                  GROUP BY c.ctg_id";
        $result = mysqli_query($this->conn, $query);
        
        // Debug statement
        // print_r(mysqli_fetch_all($result, MYSQLI_ASSOC));
        
        return $result;
    }

    function getProductsByCategory($ctg_id) {
        $query = "SELECT * FROM products WHERE pdt_ctg = $ctg_id";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    function getProductDetails($pdt_id) {
        $query = "SELECT p.*, c.ctg_name 
                  FROM products p
                  INNER JOIN category c ON p.pdt_ctg = c.ctg_id
                  WHERE p.pdt_id = $pdt_id";
        $result = mysqli_query($this->conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_assoc($result);
            return $product;
        } else {
            return false;
        }
    }

    function getProductImages($pdt_id) {
        $query = "SELECT * FROM product_images WHERE pdt_id = $pdt_id";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    function search_product($keyword, $offset, $limit, $category = 0, $min_price = 0, $max_price = PHP_INT_MAX) {
        $query = "SELECT * FROM `product_info_ctg` WHERE `pdt_name` LIKE '%$keyword%' AND `pdt_status` = 1";
        if (!empty($category) && $category != 0) {
            $query .= " AND `ctg_id` = $category";
        }
        if ($min_price != 0 || $max_price != PHP_INT_MAX) {
            $query .= " AND `pdt_price` BETWEEN $min_price AND $max_price";
        }
        $query .= " ORDER BY `pdt_id` LIMIT $offset, $limit";
        $search_query = mysqli_query($this->conn, $query);
        if ($search_query) {
            return $search_query;
        } else {
            return null;
        }
    }

    function get_search_results_count($keyword, $category, $min_price, $max_price) {
        $query = "SELECT COUNT(*) as total FROM `product_info_ctg` WHERE `pdt_name` LIKE '%$keyword%' AND `pdt_status` = 1";
        if (!empty($category) && $category != 0) {
            $query .= " AND `ctg_id` = $category";
        }
        if ($min_price != 0 || $max_price != PHP_INT_MAX) {
            $query .= " AND `pdt_price` BETWEEN $min_price AND $max_price";
        }
        $result = $this->conn->query($query);
        if ($result) {
            $row = $result->fetch_assoc();
            return (int) $row['total'];
        } else {
            return 0;
        }
    }
    function getCategoryCounts($keyword) {
        $query = "SELECT c.ctg_id, COUNT(p.pdt_id) AS item_count 
                  FROM category c
                  LEFT JOIN products p ON c.ctg_id = p.pdt_ctg
                  WHERE p.pdt_name LIKE '%$keyword%' AND p.pdt_status = 1
                  GROUP BY c.ctg_id";
        $result = mysqli_query($this->conn, $query);
        
        $category_counts = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $category_counts[$row['ctg_id']] = $row['item_count'];
        }
        
        return $category_counts;
    }
    function fetchCartItems($obj, $user_id) {
        $cartItems = [];
        $sql = "SELECT op.product_id, op.product_name, op.product_price, op.product_quantity, p.pdt_img
                FROM order_products op
                JOIN products p ON p.pdt_id = op.product_id
                WHERE op.user_id = ?";
        $stmt = $obj->conn->prepare($sql); // Ensuring that we use the mysqli connection from the passed object
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $cartItems[] = array(
                'product_id' => $row['product_id'],
                'product_name' => $row['product_name'],
                'price' => $row['product_price'],
                'quantity' => $row['product_quantity'],
                'product_img' => $row['pdt_img'] // Ensure this column name matches what's in your products table
            );
        }
        $stmt->close();
        return $cartItems;
    }
    public function getUserDetails($userId) {
        // Query that joins the user table with the user_address table to fetch all necessary information
        $query = "SELECT users.user_firstname AS first_name, users.user_lastname AS last_name, users.user_email AS email, 
                         users.user_mobile AS phone, user_address.user_address AS address, user_address.user_ward AS ward, 
                         user_address.user_district AS district, user_address.user_city AS city
                  FROM users
                  LEFT JOIN user_address ON users.user_id = user_address.user_id
                  WHERE users.user_id = ?";
        $stmt = $this->conn->prepare($query);
    
        if (!$stmt) {
            echo "Error preparing statement: " . $this->conn->error;
            return false;
        }
    
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $userDetails = $result->fetch_assoc();
            $stmt->close();
            return $userDetails;
        } else {
            $stmt->close();
            return false;
        }
    }
    function initializeCartSession($userId) {
        if (!isset($_SESSION['cart'][$userId])) {
            $_SESSION['cart'][$userId] = [];
        }
    }
    
    
    public function placeOrder($userId, $cart, $totalAmount, $paymentMethod, array $shippingInfo) {
        $order_time = time(); // Capture the timestamp at the very beginning
    
        $this->conn->begin_transaction();
        try {
            // Insert into order_details table
            $orderStatus = 1; // Example: '1' could mean 'Pending'
            $stmt = $this->conn->prepare("INSERT INTO order_details (user_id, order_status, payment_method, Shipping_mobile, address_name, address_ward, address_district, address_city, order_time, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iissssssid", $userId, $orderStatus, $paymentMethod, $shippingInfo['phone'], $shippingInfo['address'], $shippingInfo['ward'], $shippingInfo['district'], $shippingInfo['city'], $order_time, $totalAmount);
    
            $stmt->execute();
            $orderId = $this->conn->insert_id;
            $stmt->close();
    
            // Insert each item from the cart into order_products
            foreach ($cart as $item) {
                $subtotal = $item['price'] * $item['quantity'];
                $stmt = $this->conn->prepare("INSERT INTO order_products (order_id, product_id, product_name, product_price, product_quantity, subtotal) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("iisdii", $orderId, $item['product_id'], $item['product_name'], $item['price'], $item['quantity'], $subtotal);
                $stmt->execute();
                $stmt->close();
            }
            
            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollback();
            return $e;
        }
    }
    
    
    
    
    
}



