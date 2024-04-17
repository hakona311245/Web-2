<?php
const _HOST = 'localhost';
const _DB = 'web2';
const _USER = 'root';
const _PASS = '';

try{
    if(class_exists('PDO')){
        $dsn = 'mysql:dbname='._DB.';host='._HOST;

        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAME utf8', //set utf8
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Tạo thông báo ra ngoại lệ khi gặp lỗi
        ];
        $conn = new PDO($dsn, _USER, _PASS);
    }

}catch(Exception $exp){
    echo $exp -> getMessage().'<br>';
    echo 'loi';
    die();
}
// email
$sql = "SELECT user_email FROM taikhoannguoidung WHERE user_id = 10";
$result = $conn->query($sql);
if ($result->rowCount() > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $email = $row["user_email"];
} else {
    $email = ""; 
}



// Thực hiện truy vấn họ và tên
$sql = "SELECT user_name FROM taikhoannguoidung WHERE user_id = 10";
$result = $conn->query($sql);
if ($result->rowCount() > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $username = $row["user_name"];
} else {
    $username = ""; 
}

// số điện thoại
$sql = "SELECT user_phone FROM taikhoannguoidung WHERE user_id = 10";
$result = $conn->query($sql);
if ($result->rowCount() > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $userPhone = $row["user_phone"];
} else {
    $userPhone = ""; 
}

//địa chỉ
$sql = "SELECT user_address FROM taikhoannguoidung WHERE user_id = 10";
$result = $conn->query($sql);
if ($result->rowCount() > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $userAddress = $row["user_address"];
} else {
    $userAddress = ""; 
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
                   <form action="includes/formhandler1.inc.php" method="post">
                        <div class="input-box">
                            <input class="divv1" type="text" name="user_address" placeholder="your address" value="<?php echo $userAddress;?>">
                        </div>
                   </form>
                </div>
            </div>
            <div class="second">
                <div class="title"><h2>Thanh toán</h2></div>
                <div>
                    <div class="second-one">
                         <div><input type="radio">Chuyển khoản ngân hàng</div>
                         <div class="nganhang"><i class="fa-solid fa-landmark"></i></div>
                    </div>
                    <div class="second-3">
                         <div><input type="radio">Thanh toán khi ngân hàng(COD)</div>
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
    <aside class="sidebar">
        <div class="header">
            <h2 class="title">Đơn hàng</h2>
        </div>
        <div class="product">
            <div class="hinhanh">
                <img src="" alt=""><!--hình ảnh (đã css chỉ cần chèn link)-->
            </div>
            <div class="product-description">
                <span>..........</span><!--tên sản phẩm-->
                <br>
                <span class="product-property">........</span><!--thông số sản phẩm-->
                <br>
                <span class="product-property">........</span><!--số lượng sản phẩm-->
            </div>
            <div class="price">
                <span class="price1">.........</span><!--giá tiền-->
            </div>
        </div>
        <div class="khunggiamgia">
            <div class="magiamgia">
                <input type="text" placeholder="nhập mã giảm giá" class="magiamgia1">
            </div>
            <div class="apdung">
                <button type="button" class="apdung1">Áp dụng</button>
            </div>
        </div>
        <div class="tamtinh">
            <span>Tạm tính</span>
            <span class="tamtinh1"></span><!--giá tiền (tạm tính)-->
        </div>
        <div class="phivanchuyen">
            <span class="phivanchuyen1">Phí vận chuyển</span>
        </div>
        <div class="gachngang"></div>
        <div class="tong cong">
            <span class="tongcong1">Tổng cộng</span>
            <span class="tongcong2">.........</span> <!--chỗ để giá tiền tổng cộng-->
        </div>
        <div class="dathang">
            <div class="dathang1"><a href="">Quay về giỏ hàng</a></div>
           <form action="includes/formhandler1.inc.php" method="post">
           <div class="dathang2"><button type="button" class="dathang3">Đặt hàng</button></div>
           </form>
        </div>
    </aside>
</div>
</body>
</html>
