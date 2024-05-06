Dưới đây là cấu trúc HTML của trang bạn đã cung cấp sau khi loại bỏ hoàn toàn dữ liệu:

```html
<?php

require_once("databaseadmin.php");
require_once("session.php");
require_once("function.php");

session_start();

?>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Danh sách đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/ordertable.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* CSS cho overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }

        /* CSS cho bảng sản phẩm */
        #productTableContainer {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none;
        }
    </style>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.php">Molla</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form> -->
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
               aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li>
                    <hr class="dropdown-divider"/>
                </li>
                <li><a class="dropdown-item" href="#!">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Danh sách khách hàng
                    </a>
                    <a class="nav-link" href="index1.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Danh sách sản phẩm
                    </a>

                    <a class="nav-link" href="index2.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Danh sách đơn hàng
                    </a>
                    <a class="nav-link" href="index3.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Thống kê
                            </a>
                </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Danh sách đơn hàng</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Bảng dữ liệu
                    </div>
                   
                    <div class="card-body">
                        <div class="nutthem_user"><a href="add_user.php"><i style="color:black" class="fa-solid fa-plus"></i></a></div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tên khách hàng</th>
                                <th>SĐT</th>
                                <th>Địa chỉ</th>
                                <th>Tổng tiền</th>
                                <th>Phương thức thanh toán</th>
                                <th>Sản phẩm</th>


                                <th>Thời gian giao hàng</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
// Kiểm tra xem biến $_GET['user_id'] có tồn tại không và không rỗng
if(isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    // Lấy user_id từ biến $_GET
    $userId = $_GET['user_id'];

    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "web";

    $conn = mysqli_connect($servername, $username, $password, $database);

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
    }

    // Truy vấn SQL để lấy thông tin của các đơn hàng của user_id được truyền qua
    $sql = "SELECT 
                op.id AS Order_ID,
                CONCAT(u.user_firstname, ' ', u.user_lastname) AS Customer_Name,
                u.user_mobile AS Phone_Number,
                CONCAT(op.address, ', ', op.address_ward, ', ', op.address_district, ', ', op.address_city) AS Address,
                op.total_bill AS Total_Amount,
                od.payment_method AS Payment_Method,
                od.day_delivered AS Delivery_Time,
                op.order_status AS Order_Status
            FROM 
                order_products op
            INNER JOIN 
                users u ON op.user_id = u.user_id
            INNER JOIN 
                order_details od ON op.id = od.order_id
            WHERE 
                op.user_id = $userId";

    // Thực thi truy vấn SQL
    $result = mysqli_query($conn, $sql);

    // Kiểm tra kết quả truy vấn
    if (mysqli_num_rows($result) > 0) {
        // Lặp qua từng hàng dữ liệu và hiển thị thông tin tương ứng
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['Order_ID']}</td>
                    <td>{$row['Customer_Name']}</td>
                    <td>{$row['Phone_Number']}</td>
                    <td>{$row['Address']}</td>
                    <td>{$row['Total_Amount']}</td>
                    <td>{$row['Payment_Method']}</td>
                    <td><a href='show_detail.php?order_id={$row['Order_ID']}'><button>View</button></a></td>
                    <td><input type=\"date\" id=\"deliveryTime_{$row['Order_ID']}\" value=\"{$row['Delivery_Time']}\" onchange=\"updateDeliveryTime({$row['Order_ID']}, this.value)\"></td>
                    <td>
                        <select id=\"orderStatus_{$row['Order_ID']}\" onchange=\"updateOrderStatus({$row['Order_ID']}, this.value)\">
                            <option value=\"Chưa xử lý\"" . ($row['Order_Status'] == 'Chưa xử lý' ? ' selected' : '') . ">Chưa xử lý</option>
                            <option value=\"Đang xử lý\"" . ($row['Order_Status'] == 'Đang xử lý' ? ' selected' : '') . ">Đang xử lý</option>
                            <option value=\"Đã giao\"" . ($row['Order_Status'] == 'Đã giao' ? ' selected' : '') . ">Đã giao</option>
                            <option value=\"Hủy đơn\"" . ($row['Order_Status'] == 'Hủy đơn' ? ' selected' : '') . ">Hủy đơn</option>
                        </select>
                    </td>
                </tr>";
        }
    } else {
        // Hiển thị thông báo nếu không tìm thấy đơn hàng
        echo "<tr><td colspan='9'>Không tìm thấy đơn hàng cho user_id này.</td></tr>";
    }

    // Đóng kết nối
    mysqli_close($conn);
} else {
    // Hiển thị thông báo nếu không có user_id được truyền qua
    echo "Không có user_id được truyền qua";
}
?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
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
    </div>
</div>
<script>
    // Your JavaScript functions will go here
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>
</html>