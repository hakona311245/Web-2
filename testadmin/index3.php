<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Danh sách khách hàng-SG Tech admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/ordertable.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">SGtech</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
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



                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Thống kê mức chi tiêu của khách hàng</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Bảng dữ liệu
                            </div>
                            <div class="date-filter">
                            <form>
                                <label for="start-date">Từ ngày:</label>
                                <input type="date" id="start-date" name="start-date">

                                <label for="end-date">Đến ngày:</label>
                                <input type="date" id="end-date" name="end-date">

                                <button type="submit">Lọc</button>
                            </form>
                        </div>
                        <div class="card-body">
                <div class="nutthem_user"><a href="add_user.php"><i style="color:black" class="fa-solid fa-plus"></i></a></div>
                <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tên khách hàng</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Các đơn hàng</th>
                                <th>Tổng chi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
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

    // Truy vấn để lấy thông tin của khách hàng
    $query = "SELECT users.user_id, users.user_name, users.user_mobile, users.user_email, user_address.user_address,
    GROUP_CONCAT(DISTINCT order_products.id) AS order_ids,
    SUM(order_products.total_bill) AS total_cost
    FROM users
    INNER JOIN user_address ON users.user_id = user_address.user_id
    LEFT JOIN order_products ON users.user_id = order_products.user_id
    WHERE order_products.user_id IS NULL OR users.user_id = order_products.user_id
    GROUP BY users.user_id";
    $result = mysqli_query($conn, $query);

    // Kiểm tra kết quả của truy vấn
    if ($result && mysqli_num_rows($result) > 0) {
       

        // Lặp qua từng hàng dữ liệu và hiển thị thông tin tương ứng
// Lặp qua từng hàng dữ liệu và hiển thị thông tin tương ứng
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['user_id'] . "</td>";
    echo "<td>" . $row['user_name'] . "</td>";
    echo "<td>" . $row['user_mobile'] . "</td>";
    echo "<td>" . $row['user_email'] . "</td>";
    echo "<td>" . $row['user_address'] . "</td>";

    // Hiển thị nút xem duy nhất nếu có ID đơn hàng
    if (!empty($row['order_ids'])) {
        // Tách chuỗi ID thành mảng các ID
        $order_ids_array = explode(",", $row['order_ids']);
        // Chỉ hiển thị nút xem cho ID đầu tiên
        $first_order_id = $order_ids_array[0];
        echo "<td>";
        echo "<button class='view-btn' data-order-ids='$first_order_id' style='background-color: white; color: black;'>Xem</button>";
        echo "</td>";
    } else {
        // Nếu không có ID đơn hàng, hiển thị thông báo
        echo "<td>Không có đơn hàng</td>";
    }
    echo "<td>" . ($row['total_cost'] ? $row['total_cost'] : 0) . "</td>";
    echo "</tr>";
}

        echo "</tbody>";
        echo "</table>";
    } else {
        // Hiển thị thông báo nếu không có dữ liệu
        echo "Không có dữ liệu";
    }

    // Đóng kết nối
    mysqli_close($conn);
?>
<script>
    document.querySelector('.view-btn').addEventListener('click', (event) => {
        const orderIds = event.target.dataset.orderIds;
        // Tạo một URL cho trang danh sách đơn hàng và truyền ID đơn hàng qua URL
        const url = 'index2.php?orderIds=' + orderIds;
        // Chuyển hướng người dùng đến trang danh sách đơn hàng
        window.location.href = url;
    });
</script>


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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    </body>
</html>