<?php

require_once("./testadmin/databaseadmin.php");
require_once("./testadmin/session.php");
require_once("./testadmin/function.php");

session_start();
$user_name = $_SESSION['user_username'];
$userInfo = getRaw("SELECT * FROM taikhoannguoidung WHERE user_name ='$user_name'");

// echo '<pre>';
// print_r($userInfo);
// echo '</pre>';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/stylettngdung.css">
</head>
<body>
    <section class="signup page_customer_account">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
                    <div class="block-account">
                        <h5 class="title-account">Trang tài khoản</h5>
                        <?php if(!empty($userInfo)):
                                foreach($userInfo as $item):  
                         ?>
                        <p>Xin chào, <span style="color:#141414;"><?php echo $item['user_name']; ?></span>&nbsp;!</p>
                        <ul>
                            <li>
                                <a disabled="disabled" href="ttngdung.php" class="title-info active" title="Thông tin tài khoản" >Thông tin tài khoản</a>
                            </li>
                            <!-- <li>
                                <a class="title-info" href="ttngdung1.php" title="Đơn hàng của bạn">Thay đổi thông tin</a>
                            </li>
                            <li>
                                <a class="title-info" href="ttngdung2.php" title="Đổi mật khẩu">Đổi mật khẩu</a>
                            </li> -->
                            <li>
                                <a class="title-info" href="login.php" title="Đăng xuất">Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac">
                    <h1 class="title-head margin-top-0">Thông tin tài khoản</h1>
                    <div class="form-signup name-account m992">
                        <p><strong>Họ tên:</strong><?php echo $item['user_name']; ?></p>
                        <p> <strong>Email:</strong><?php echo $item['user_email']; ?></p>

                        <p> <strong>Điện thoại:</strong><?php echo $item['user_phone']; ?></p>

                        <p><strong>Địa chỉ :</strong><?php echo $item['user_address']; ?></p>

                    </div>
                                   <?php endforeach; 
                                        endif;
                                        ?>
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