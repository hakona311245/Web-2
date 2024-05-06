<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order Details</title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    img {
        width: 50px;
        height: auto;
    }
</style>
</head>
<body>

<?php
// databaseadmin.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

// Tạo kết nối đến CSDL
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Kiểm tra xem có tham số order_id được truyền từ URL không
if(isset($_GET['order_id']) && !empty($_GET['order_id'])) {
    // Lấy order_id từ URL
    $order_id = $_GET['order_id'];

    // Truy vấn để lấy thông tin chi tiết của đơn hàng
    $sql = "SELECT od.order_id, od.product_id, od.quantity, od.total, p.pdt_name, p.pdt_img, p.pdt_price
            FROM order_details od 
            INNER JOIN products p ON od.product_id = p.pdt_id 
            WHERE od.order_id = $order_id";

    $result = mysqli_query($conn, $sql);

    // Kiểm tra xem có kết quả trả về không
    if(mysqli_num_rows($result) > 0) {
        // Hiển thị thông tin chi tiết đơn hàng
        echo "<table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>";
        
        while($row = mysqli_fetch_assoc($result)) {
            $subtotal = $row['quantity'] * $row['pdt_price']; // Tính giá bán mỗi sản phẩm
            echo "<tr>
                    <td>{$row['order_id']}</td>
                    <td><img src='{$row['pdt_img']}' alt='{$row['pdt_name']}'></td>
                    <td>{$row['pdt_name']}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['pdt_price']}</td>
                    <td>$subtotal</td>
                </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "Không tìm thấy thông tin chi tiết đơn hàng.";
    }
} else {
    echo "Thiếu thông tin order_id.";
}
?>

</body>
</html>
