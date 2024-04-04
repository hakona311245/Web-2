<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="/css/stylettngdung.css">
</head>
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
                                <a class="title-info" href="ttngdung1.php" title="Đơn hàng của bạn">Thay đổi thông tin</a>
                            </li>
                            <li>
                                <a class="title-info active" href="ttngdung2.php" title="Đổi mật khẩu">Đổi mật khẩu</a>
                            </li>
                            <li>
                                <a class="title-info" href="login.php" title="Đăng xuất">Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac">
                    <div class="container">
                        <h2>ĐỔI MẬT KHẨU</h2>
                        <h3>Để đảm bảo tính bảo mật bạn vui lòng đặt lại mật khẩu với ít nhất 8 kí tự.</h3>
                        <form id="change-password-form" action="#" method="post">
                            <div class="form-group">
                                <label for="current-password">Mật khẩu hiện tại:*</label>
                                <input type="password" id="current-password" name="current-password" required>
                            </div>
                            <div class="form-group">
                                <label for="new-password">Mật khẩu mới:*</label>
                                <input type="password" id="new-password" name="new-password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Xác nhận lại mật khẩu:*</label>
                                <input type="password" id="confirm-password" name="confirm-password" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Đặt lại mật khẩu">
                            </div>
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

    <script>
        document.getElementById('change-password-form').addEventListener('submit', function(event) {
            var newPassword = document.getElementById('new-password').value;
            var confirmPassword = document.getElementById('confirm-password').value;
            if (newPassword !== confirmPassword) {
                alert('New Password and Confirm Password do not match!');
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
</body>
<style>
/* Định dạng form */


h2 {
    font-size: 24px;
    margin-bottom: 20px;
    color:   #444;
}
h3 {
    font-size: 18px;
    margin-bottom: 20px;
    color:   #444;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    display: block;
}

input[type="password"] {
    width: 60%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    padding: 10px 20px;
    background-color: #000000;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #2b4aae;

    border: none;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px 20px;

}

/* Thiết lập phản hồi hợp lý cho màn hình nhỏ */
@media screen and (max-width: 768px) {
    .container {
        padding: 10px;
    }

    h2 {
        font-size: 20px;
    }
}
</style>

</html>
