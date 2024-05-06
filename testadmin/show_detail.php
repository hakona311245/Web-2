<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/ordertable.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn-back {
            margin-bottom: 20px;
            background-color: black;
        }
        html {
    height: 100%;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.container {
    flex: 1; /* Đảm bảo nội dung container sẽ mở rộng để điền vào không gian còn lại */
}

footer {
    flex-shrink: 0; /* Ngăn footer co lại nếu cần */
}

    </style>
</head>
<body>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.php">Molla</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#!">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>

<div class="container">
    <h1 class="text-center">Chi tiết đơn hàng</h1>
    <?php
    // Kết nối đến CSDL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
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
            // Khởi tạo biến tổng tiền
            $total_price = 0;
            // Hiển thị thông tin chi tiết đơn hàng
            echo "<table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>";
            while($row = mysqli_fetch_assoc($result)) {
                $subtotal = $row['quantity'] * $row['pdt_price']; // Tính giá bán mỗi sản phẩm
                $total_price += $subtotal; // Cộng vào tổng tiền
                echo "<tr>
                        <td>{$row['order_id']}</td>
                        <td>{$row['pdt_name']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['pdt_price']}</td>
                        <td>$subtotal</td>
                    </tr>";
            }
            // Hiển thị tổng tiền ngoài bảng
            echo "<tr>
                    <td colspan='4'><strong>Tổng tiền</strong></td>
                    <td>$total_price</td>
                </tr>";
            echo "</tbody></table>";
            // Thêm nút trở về
            echo "<a href='javascript:history.go(-1)' class='btn btn-primary btn-back d-block mx-auto'>Trở về</a>";
        } else {
            echo "Không tìm thấy thông tin chi tiết đơn hàng.";
        }
    } else {
        echo "Thiếu thông tin order_id.";
    }
    ?>
</div>
<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>

<!-- jQuery và Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
