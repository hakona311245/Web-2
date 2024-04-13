<?php
require_once("function.php");
    if(isPost()){
        $filterAll = filter();
        $errors = [];
        
        if(empty($filterAll['user_name'])){
            $errors ['user_name']['required'] = 'Họ bắt buộc phải nhập'; 
        }
    
        if(empty($filterAll['phone'])){
            $errors ['phone_number']['required'] = 'Số điện thoại bắt buộc phải nhập'; 
        }
    
        if(empty($filterAll['email'])){
            $errors ['email']['required'] = 'Email bắt buộc phải nhập'; 
        }else{
            $email = $filterAll['email'];
            $sql = "SELECT id FROM users WHERE email = '$email' AND id <> $userID";
            if(getRows($sql) > 0){
                $errors['email']['unique'] = 'Email đã được đăng kí';
            }
        }
        
        if(empty($filterAll['password'])){
            $errors ['password']['required'] = 'Pass bắt buộc phải nhập'; 
        }else{
            if(strlen($filterAll['password']) < 8){
                $errors['password']['min'] = 'pass phải lớn hơn 8 kí tự';
            }
        }
    
        if(empty($filterAll['confirm_password'])){
            $errors ['confirm_password']['required'] = 'Pass bắt buộc phải nhập'; 
        }else{
            if($filterAll['password'] != $filterAll['confirm_password']){
                $errors ['confirm_password']['match'] = 'K dung';
            }
        }
    
        if(empty($errors)){
    
           
            $dataInsert = [
                'first_name' => $filterAll['first_name'],
                'last_name' => $filterAll['last_name'],
                'email' => $filterAll['email'],
                'phone_number' => $filterAll['phone_number'],
                'password' => $filterAll['password'],
                'reg_date' => date('Y-m-d H:i:s'),
                'status' => $filterAll['status'],
                'activeToken' => $activeToken
            ];
            $insertStatus = insert('users', $dataInsert);
            if($insertStatus){
                setFlashData('smg', 'Đăng ký thành công!!');
                setFlashData('smg_type', 'success');
                redirect('?module=user&action=list_user');
            }
        }else{
            setFlashData('errors', $errors);
            setFlashData('old', $filterAll);
            redirect('?module=user&action=list_user');
        }
    }
    $smg = getFlashData('smg');
    $smg_type = getFlashData('smg_type');
    $errors = getFlashData('errors');
    $old = getFlashData('old');
    $userInfo = getFlashData('user_detail');
    if(!empty($userInfo)){
        $old = $userInfo;
    }
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
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">First name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><a class="btn btn-primary btn-block" href="index.php">Create Account</a></div>
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
