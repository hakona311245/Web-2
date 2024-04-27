<?php
  require_once("databaseadmin.php");
  require_once("session.php");
  require_once("function.php");
  if(isLoginAdmin()){
    redirect('index.php');
  }
  
  
  if(isPost()){
    $filterAll = filter();
    if(!empty(trim($filterAll['email'])) && !empty(trim($filterAll['password']))){
      $email = $filterAll['email'];
      $password = $filterAll['password'];

      $adminQuery = oneRaw("SELECT * FROM admin WHERE email ='$email'");
      if(!empty($adminQuery)){
        $passwordAdmin = $adminQuery['password'];
        if($passwordAdmin == $password){
              redirect('index.php');
          }
              
        else{
          setFlashData('smg', 'Mật khẩu không chính xác');
          setFlashData('smg_type', 'danger');
        }
      }else{
      setFlashData('smg', 'Email không tồn tại');
      setFlashData('smg_type', 'danger');
      }
    }else{
      setFlashData('smg', 'Vui lòng nhập email và mật khẩu');
      setFlashData('smg_type', 'danger');
    }
    // redirect('loginadmin.php');
  }
  $smg = getFlashData('smg');
  $smg_type = getFlashData('smg_type');
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SG Tech</title>
    <script src="https://kit.fontawesome.com/8c6957fe62.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/registeradmin.css">
    <link rel="stylesheet" href="css/header&footer.css">
  </head>
<body>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="loginadmin.php">SGtech</a>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
              
            </ul>
        </nav>
  <main>
  <div class="wrapper">
    <h2>ĐĂNG NHẬP ADMIN</h2>
    <?php
                if(!empty($smg)){
                    getSmg($smg, $smg_type);
                }
            ?>
    <form action="" method="post">
      <div class="input-box">
        <input type="email" name="email" placeholder="Nhập Email">
      </div>
      
      <div class="input-box">
        <input type="password" name="password" placeholder="Password">
      </div>

      <div class="input-box button">
      <button type="submit" class="btn">Submit</button>     </div>
   
    </form>
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


  <script src="js/headerandfooter.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
