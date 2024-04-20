<?php
  require_once 'includes/config_session.inc.php';
  require_once 'includes/login_view.inc.php';
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SG Tech</title>
    <script src="https://kit.fontawesome.com/8c6957fe62.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/header&footer.css"/>
  </head>
<body>
  <header-template></header-template>
  <main>
  <div class="wrapper">
    <h2>ĐĂNG NHẬP</h2>
    <form action="includes/login.inc.php" method="post">
      <div class="input-box">
        <input type="text" name="user_name" placeholder="Tên đăng nhập">
      </div>
      <div class="input-box">
        <input type="password" name="user_pwd" placeholder="Password">
      </div>

      <div class="input-box button">
        <input type="Submit" value="Đăng nhập">
      </div>
      <div class="text">
        <h3>Bạn chưa có tài khoản? <a href="register.php">Đăng kí</a></h3>
      </div>
    </form>
    <?php
      check_login_errors();
    ?>

  </div>
  </main>

  <footer-template></footer-template>

  <script src="js/headerandfooter.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>