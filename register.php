<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Register</title> 
    <link rel="stylesheet" href="/css/register.css">
   </head>


<body>
  <div class="wrapper">
    <h2>ĐĂNG KÝ</h2>
    <form action="includes/formholder.inc.php" method="post">
      <div class="input-box">
        <input type="text" placeholder="Họ và tên" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Email" required>
      </div>
      <div class="input-box">
        <input type="number" placeholder="Số điện thoại" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" required>
      </div>

      <div class="input-box button">
        <input type="Submit" value="Đăng ký">
      </div>
      <div class="text">
        <h3>Bạn đã có tài khoản? <a href="#">Đăng nhập</a></h3>
      </div>
    </form>
  </div>
</body>
</html>