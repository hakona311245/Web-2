<?php
require_once("databaseadmin.php");
require_once("session.php");
require_once("function.php");
    if(isPost()){
        $filterAll = filter();
        $errors = [];
 
        if(empty($filterAll['user_name'])){
            $errors ['user_name']['required'] = 'Họ bắt buộc phải nhập'; 
        }
    
        if(empty($filterAll['user_phone'])){
            $errors ['user_phone']['required'] = 'Số điện thoại bắt buộc phải nhập'; 
        }

        if(empty($filterAll['user_email'])){
            $errors ['user_email']['required'] = 'Email bắt buộc phải nhập'; 
        }else{
            $email = $filterAll['user_email'];
            $sql = "SELECT user_id FROM taikhoannguoidung WHERE user_email = '$email'" ;//AND id <> $userID"
            if(getRows($sql) > 0){
                $errors['user_email']['unique'] = 'Email đã được đăng kí';
            }
        }
        
        if(empty($filterAll['user_pwd'])){
            $errors ['user_pwd']['required'] = 'Pass bắt buộc phải nhập'; 
        }else{
            if(strlen($filterAll['user_pwd']) < 8){
                $errors['user_pwd']['min'] = 'pass phải lớn hơn 8 kí tự';
            }
        }
    
        if(empty($filterAll['user_cfpwd'])){
            $errors ['user_cfpwd']['required'] = 'Pass bắt buộc phải nhập'; 
        }else{
            if($filterAll['user_pwd'] != $filterAll['user_cfpwd']){
                $errors ['user_cfpwd']['match'] = 'Mật khẩu không đúng';
            }
        }
        // echo '<pre>';
        // print_r($errors);
        // echo '</pre>';
        
        if(empty($errors)){
    
           
            $dataInsert = [
                'user_name' => $filterAll['user_name'],
   
                'user_email' => $filterAll['user_email'],
                'user_phone' => $filterAll['user_phone'],
                'user_pwd' => $filterAll['user_pwd'],
                'created_at' => date('Y-m-d H:i:s'),
                'user_status' => $filterAll['user_status'],
            ];
            $insertStatus = insert('taikhoannguoidung', $dataInsert);
            if($insertStatus){
                setFlashData('smg', 'Đăng ký thành công!!');
                setFlashData('smg_type', 'success');
                // redirect('?module=user&action=list_user');
            }
        }else{
            setFlashData('errors', $errors);
            setFlashData('old', $filterAll);
            // redirect('?module=user&action=list_user');
        }
    }
    $smg = getFlashData('smg');
    $smg_type = getFlashData('smg_type');
    $errors = getFlashData('errors');
    // $old = getFlashData('old');
    // $userInfo = getFlashData('user_detail');
    // if(!empty($userInfo)){
    //     $old = $userInfo;
    // }
    
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Account</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="user_name" class="form-control" id="inputFirstName" type="text" placeholder="Enter your full name" />
                                                        <label for="inputFirstName">Full name</label>
                                                        <?php echo (!empty($errors['user_name']['required'])) ? '<span class="error-message">' . $errors['user_name']['required'] . '</span>' : null;?>
                                                    </div>
                                                </div>
                                            </div>
                                           <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="user_phone" class="form-control" id="inputFirstName" type="text" placeholder="Enter your phonenumber" />
                                                        <label for="inputFirstName">Số điện thoại</label>
                                                        <?php echo (!empty($errors['user_phone']['required'])) ? '<span class="error-message">' . $errors['user_phone']['required'] . '</span>' : null;?>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="form-floating mb-3">
                                                <input name="user_email" class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div> -->
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="user_email" class="form-control" id="inputFirstName" type="email" placeholder="Enter your Email" />
                                                        <label for="inputFirstName">Email</label>
                                                        <?php
                                                        if (!empty($errors['user_email'])) {
                                                            echo '<span class="error-message">' . reset($errors['user_email']) . '</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="user_pwd" class="form-control" id="inputPassword" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                        <?php echo (!empty($errors['user_pwd']['required'])) ? '<span class="error-message">' . $errors['user_pwd']['required'] . '</span>' : null;?>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input name="user_cfpwd" class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                        <?php
                                                        if (!empty($errors['user_cfpwd'])) {
                                                            echo '<span class="error-message">' . reset($errors['user_cfpwd']) . '</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                    </div>
                                                </div>
                                                  </div>
                                                  <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <div class="Status_go">Status:</div>
                                                        <select class="activebox" name="user_status" id="">
                                                            <option value="active">Active</option>
                                                            <option value="banned">Banned</option>
                                                        </select>
                                                    </div>
                                                    </div>
                                                </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" href="">Create Account</button></div>
                                            </div>
                                            
                                        </form>
                                    </div>
                        
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
    </body>
</html>
