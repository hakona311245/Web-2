<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Responsive Login and Signup Form </title>

        <!-- CSS -->
        <link rel="stylesheet" href="/css/login.css">
                
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
                        
    </head>
    <form action="" method="post">
    <body>
        <section class="container forms">
            <div class="form login">
                <div class="form-content">
                    <header>ĐĂNG NHẬP</header>
                    <form action="#">
                        <div class="field input-field">
                            <input type="text" placeholder="Tên đăng nhập" class="input">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Password" class="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="form-link">
                            <a href="#" class="forgot-pass">Quên mật khẩu?</a>
                        </div>

                        <div class="field button-field">
                            <button>Đăng nhập</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Bạn chưa có tài khoản? <a href="#" class="link signup-link">Đăng ký tại đây</a></span>
                    </div>
                </div>


               

            </div>
        </section>

        <!-- JavaScript -->
        <script src="script.js"></script>
    </body>
</form>
</html>