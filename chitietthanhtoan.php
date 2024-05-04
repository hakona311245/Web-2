<?php
// Kích hoạt phiên làm việc
session_start();

// Khai báo thông tin kết nối đến cơ sở dữ liệu
const _HOST = 'localhost';
const _DB = 'web2';
const _USER = 'root';
const _PASS = '';

try {
    // Kiểm tra lớp PDO có tồn tại không
    if (class_exists('PDO')) {
        // Thiết lập chuỗi kết nối
        $dsn = 'mysql:dbname=' . _DB . ';host=' . _HOST;

        // Thiết lập các tùy chọn cho kết nối PDO
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // Thay đổi 'SET NAME utf8' thành 'SET NAMES utf8'
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Kích hoạt thông báo lỗi dưới dạng ngoại lệ
        ];

        // Khởi tạo kết nối PDO
        $conn = new PDO($dsn, _USER, _PASS, $options);
    }
} catch (Exception $exp) {
    // Xử lý ngoại lệ nếu có lỗi xảy ra trong quá trình kết nối
    echo $exp->getMessage() . '<br>';
    echo 'Lỗi kết nối đến cơ sở dữ liệu';
    die(); // Dừng chương trình
}

// Kiểm tra xem session đã được khởi tạo và có giá trị user_id không
if (isset($_SESSION["user_id"])) {
    // Lấy user_id từ session
    $user_id = $_SESSION["user_id"];

    try {
        // Thực hiện truy vấn để lấy thông tin người dùng từ bảng taikhoannguoidung
        $sql = "SELECT * FROM taikhoannguoidung WHERE user_id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        // Lấy dữ liệu từ kết quả truy vấn
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Gán giá trị vào các biến tương ứng
            $email = $row["user_email"];
            $username = $row["user_name"];
            $userPhone = $row["user_phone"];
            $userAddress = $row["user_address"];
            // Gán giá trị user_id để sử dụng làm khóa ngoại
            $user_id_foreign_key = $row["user_id"];
        } else {
            // Không tìm thấy người dùng với user_id tương ứng
            // Chuyển hướng người dùng về trang đăng nhập
            header("Location: login.php");
            exit(); // Dừng việc thực thi mã ngay sau lệnh header
        }
    } catch (Exception $e) {
        // Xử lý ngoại lệ nếu có lỗi xảy ra trong quá trình thực hiện truy vấn
        echo $e->getMessage();
    }
} else {
    // Không có session user_id (người dùng chưa đăng nhập)
    // Chuyển hướng người dùng về trang đăng nhập
    header("Location: login.php");
    exit(); // Dừng việc thực thi mã ngay sau lệnh header
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="/css/chitietthanhtoan.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<div class="page">
    <div class="wrap">
        <div class="main">
            <div class="first">
                <div class="one">
                    <div class="title"><h2 class="one-one">Thông tin nhận hàng</h2></div>
                </div>
                <div class="two">
                   <div class="two1"> <p>Email:        <?php echo $email;?></p></div>
                   <div class="two2"> <p>Họ và tên:    <?php echo $username;?></p></div>
                   <div class="two3"> <p>Số điện thoại:<?php echo $userPhone;?></p></div>
                   <div class="two4"> <p>Địa chỉ: (có thể thay đổi)</p></div>
                   <!--- form --->
                   <form action="includes/kiemtraform.php" method="post">
    <div class="input-box">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <input class="divv1" type="text" name="user_address_official" placeholder="Your address" value="<?php echo $userAddress;?>">
    </div>
    <div class="dathang2"><button type="submit" name="add" class="dathang3">Đặt hàng</button></div>
                   </form>

                </div>
            </div>
            <div class="second">
                <div class="title"><h2>Thanh toán</h2></div>
                <div>
                    <div class="second-one">
                         <div><input type="checkbox">Chuyển khoản ngân hàng</div>
                         <div class="nganhang"><i class="fa-solid fa-landmark"></i></div>
                    </div>
                    <div class="second-3">
                         <div><input type="checkbox">Thanh toán khi ngân hàng(COD)</div>
                         <div class="money"><i class="fa-regular fa-money-bill-1"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            
                
                    <div><a href="" class="footer1">Chính sách hoàn trả</a></div>
            
                
                    <div><a href="" class="footer2">Chính sách bảo mật</a></div>
                
            
                    <div><a href="" class="footer3">Điều khoản sử dụng</a></div>
                
            
        </div>
    
    </div>
    <aside class="order-section" class="sidebar">
    <h2 class="title">Đơn hàng</h2>
    <table class="order-details">
        <thead>
            <tr>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            <!-- Thêm các dòng cho chi tiết sản phẩm -->
        </tbody>
    </table>
</aside>

</div>
</body>
</html>