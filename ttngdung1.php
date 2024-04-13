<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/stylettngdung.css">
</head>
<style>
    /* CSS code to style the edit information section */
.containertt form {
    max-width: 720px;
    margin: 0 auto;
}

.containertt label {
    font-weight: bold;
    margin-top: 15px;
    display: block;
}

.containertt input[type="text"],
.containertt input[type="email"],
.containertt input[type="tel"],
.containertt textarea {
    width: 90%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.containertt input[type="submit"] {
    background-color: #000000;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

.containertt input[type="submit"]:hover {
    background-color: #195ecd;
}

/* Optional: Style for the success alert */
#js-global-alert {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 300px;
    max-width: 100%;
    padding: 15px;
    border-radius: 5px;
    background-color: #4CAF50;
    color: white;
    z-index: 9999;
}

#js-global-alert .close {
    position: absolute;
    top: 5px;
    right: 10px;
    cursor: pointer;
}

@media only screen and (max-width: 768px) {
    /* Adjustments for smaller screens */
    .containertt form {
        padding: 0 20px;
    }
}

</style>
<body>
    <section class="signup page_customer_account">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
                    <div class="block-account">
                        <h5 class="title-account">Trang tài khoản</h5>
                        <p>Xin chào, <span style="color:#141414;">Thành Hưng</span>&nbsp;!</p>
                       <ul>
                            <li>
                                <a disabled="disabled" href="ttngdung.php" class="title-info active" title="Thông tin tài khoản" >Thông tin tài khoản</a>
                            </li>
                            <li>
                                <a class="title-info active" href="ttngdung1.php" title="Đơn hàng của bạn">Thay đổi thông tin</a>
                            </li>
                            <li>
                                <a class="title-info" href="ttngdung2.php" title="Đổi mật khẩu">Đổi mật khẩu</a>
                            </li>
                            <li>
                                <a class="title-info" href="login.php" title="Đăng xuất">Đăng xuất</a>
                            </li>
                        </ul>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac">
                    <h1 class="title-head margin-top-0">Chỉnh sửa thông tin</h1>
                    <div class="containertt">
                        <form method="post">
                            <label for="fullname">Họ tên:</label>
                            <input type="text" id="fullname" name="fullname" value="Thành Hưng">
                
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="thanhhungnguyen8204@gmail.com">
                
                            <label for="phone">Điện thoại:</label>
                            <input type="tel" id="phone" name="phone" value="0376640875">
                
                            <label for="company">Công ty:</label>
                            <input type="text" id="company" name="company" value="Đại học Sài Gòn">
                
                            <label for="address">Địa chỉ:</label>
                            <textarea id="address" name="address" rows="4">ấp 1b xã vĩnh lộc A huyện Bình Chánh, Huyện Bình Chánh, TP Hồ Chí Minh, Vietnam</textarea>
                
                            <input type="submit" value="Lưu thay đổi">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div id="js-global-alert" class="alert alert-success" role="alert">
        <button type="button" class="close"><span aria-hidden="true"><span aria-hidden="true">&times;</span></span></button>
        <h5 class="alert-heading"></h5>
        <p class="alert-content"></p>
    </div>
</body>
</html>