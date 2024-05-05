<?php

require_once("databaseadmin.php");
require_once("session.php");
require_once("function.php");



$filterAll = filter();

if(!empty($filterAll['user_id'])){
    $userID = $filterAll['user_id'];
    //ktra xem userid co ton tai trong database khong
    //neu ton tai thi => lay ra thong tin nguoi dung
    //neu khong ton tai thi => chuyen huong ve trang list

    $userDetail=oneRaw("SELECT * FROM users WHERE user_id = $userID");
    if(!empty($userDetail)){
        //ton tai
        setFlashData('user_detail',$userDetail);
    }
    else {
        redirect('index.php');
    }
}
    if(isPost()){
        $filterAll = filter();
        $errors = [];
 
        if(empty($filterAll['user_name'])){
            $errors ['user_name']['required'] = 'Username bắt buộc phải nhập'; 
        }
     
        if(empty($filterAll['user_firstname'])){
            $errors ['user_firstname']['required'] = 'Họ bắt buộc phải nhập'; 
        }

        if(empty($filterAll['user_lastname'])){
            $errors ['user_firstname']['required'] = 'Tên bắt buộc phải nhập'; 
        }
        
        if(empty($filterAll['user_mobile'])){
            $errors ['user_mobile']['required'] = 'SĐT bắt buộc phải nhập'; 
        }


        // if(empty($filterAll['user_address'])){
        //     $errors ['user_address']['required'] = 'Địa chỉ bắt buộc phải nhập'; 
        // }

        if(empty($filterAll['user_email'])){
            $errors ['user_email']['required'] = 'Email bắt buộc phải nhập'; 
        }else{
            $email = $filterAll['user_email'];
            $sql = "SELECT user_id FROM users WHERE user_email = '$email' AND user_id <> $userID" ;//AND id <> $userID"
            if(getRows($sql) > 0){
                $errors['user_email']['unique'] = 'Email đã được đăng kí';
            }
        }

        if(empty($filterAll['user_password'])){
            $errors ['user_password']['required'] = 'Pass bắt buộc phải nhập'; 
        }
    
        if(empty($filterAll['user_cfpwd'])){
            $errors ['user_cfpwd']['required'] = 'Pass bắt buộc phải nhập'; 
        }else{
            if($filterAll['user_password'] != $filterAll['user_cfpwd']){
                $errors ['user_cfpwd']['match'] = 'Mật khẩu không đúng';
            }
        }

        // echo '<pre>';
        // print_r($errors);
        // echo '</pre>';
        if(empty($errors)){
            $dataUpdate = [
                'user_name' => $filterAll['user_name'],
                'user_firstname' => $filterAll['user_firstname'],
                'user_lastname' => $filterAll['user_lastname'],
                'user_mobile' => $filterAll['user_mobile'],
                'user_email' => $filterAll['user_email'],
                'created_at' => date('Y-m-d H:i:s'),
                'is_locked' => $filterAll['is_locked'],
            ];

            if(!empty($filterAll['user_password'])){
                $dataUpdate = [
                    'user_name' => $filterAll['user_name'],
                    'user_firstname' => $filterAll['user_firstname'],
                    'user_lastname' => $filterAll['user_lastname'],
                    'user_email' => $filterAll['user_email'],
                    'user_mobile' => $filterAll['user_mobile'],
                    'user_password' => $filterAll['user_password'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'is_locked' => $filterAll['is_locked'],
                ];
                // $dataUpdate['password'] = password_hash($filterAll['user_pwd'],PASSWORD_DEFAULT);
            }

            $contition ="user_id=$userID";
            $insertStatus = update('users', $dataUpdate,$contition);
            if($insertStatus){
                setFlashData('smg','Sửa người dùng thành công!!');
                setFlashData('smg_type', 'success');
                
            }
            else{
                setFlashData('smg','Hệ thống đang lỗi vui lòng thử lại sau');
                setFlashData('smg_type', 'danger');
                
            }
        }else{
            setFlashData('smg', 'Vui lòng kiểm tra lại dữ liệu!');
            setFlashData('smg_type', 'danger');
            setFlashData('errors', $errors);
            setFlashData('old', $filterAll);
            redirect('update_user.php?user_id='.$userID.'');
        }
        
    }
    $smg = getFlashData('smg');
    $smg_type = getFlashData('smg_type');
    $errors = getFlashData('errors');
    $old = getFlashData('old');
    $userDatail = getFlashData('user_detail');
    if(!empty($userDatail)){
        $old = $userDatail;
    }
 
    // echo '<pre>';
    // print_r($userDatail);
    // echo '</pre>';
        // echo $filterAll['id'];
    
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
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">SGtech</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form> -->
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    <body class="">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Account</h3></div>
                                    <?php
                                        if(!empty($smg)){
                                            getSmg($smg, $smg_type);
                                        }
                                    ?> 
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input style="text-align: left;" name="user_name" class="form-control" id="inputFirstName" type="text" placeholder="Enter your full name" 
                                                        value="<?php echo old('user_name',$old);?>"/>
                                                         <label for="inputFirstName">Username</label>
                                                         <?php echo (!empty($errors['user_name']['required'])) ? '<span class="error-message">' . $errors['user_name']['required'] . '</span>' : null;
                                                        ?>                                               
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input style="text-align: left;" name="user_firstname" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" 
                                                        value="<?php echo old('user_firstname',$old);?>"/>
                                                         <label for="inputFirstName">Họ</label>
                                                         <?php echo (!empty($errors['user_firstname']['required'])) ? '<span class="error-message">' . $errors['user_firstname']['required'] . '</span>' : null;
                                                        ?>                                               
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input style="text-align: left;" name="user_lastname" class="form-control" id="inputFirstName" type="text" placeholder="Enter your full name" 
                                                        value="<?php echo old('user_lastname',$old);?>"/>
                                                         <label for="inputFirstName">Tên</label>
                                                         <?php echo (!empty($errors['user_lastname']['required'])) ? '<span class="error-message">' . $errors['user_lastname']['required'] . '</span>' : null;
                                                        ?>                                               
                                                    </div>
                                                </div>
                                            </div>
                                           <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input style="text-align: left;" name="user_mobile" class="form-control" id="inputFirstName" type="text" placeholder="Enter your phonenumber" 
                                                        value="<?php echo old('user_mobile',$old);?>" />
                                                        <label for="inputFirstName">Số điện thoại</label>
                                                        <?php echo (!empty($errors['user_mobile']['required'])) ? '<span class="error-message">' . $errors['user_mobile']['required'] . '</span>' : null;?>
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
                                                        <input name="user_email" class="form-control" id="inputFirstName" type="email" placeholder="Enter your Email" value="
                                                        <?php echo old('user_email',$old);
                                                        ?>"
                                                        />
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
                                                        <input style="text-align: left;" name="user_password" class="form-control" id="inputPassword" type="password" placeholder="Password(Không nhập nếu không thay đổi)"/>
                                                        <label for="inputPassword">Mật khẩu</label>
                                                        <?php echo (!empty($errors['user_password']['required'])) ? '<span class="error-message">' . $errors['user_password']['required'] . '</span>' : null;?>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input style="text-align: left;" name="user_cfpwd" class="form-control" id="inputPasswordConfirm" type="password" placeholder="Password(Không nhập nếu không thay đổi)"/>
                                                        <label for="inputPasswordConfirm">Nhập lại mật khẩu</label>
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
                                                        <select class="activebox" name="is_locked" id="">
                                                            <option value="active">Active</option>
                                                            <option value="banned">Banned</option>
                                                        </select>
                                                    </div>
                                                    </div>
                                                </div>
                                            <div class="mt-4 mb-0">
                                            <input type="hidden" name="user_id" value="<?php echo $userID ?>">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" href="">Update Account</button>
                                            </div>
                                            </div>
                                               
                                        </form>
                                        <br>
                                        <a style="text-align : center;" class="nutdidetrove"  href="index.php"><button class="trovenao" style="border-radius :8px; color :black;">Trở về</button></a>
                                        <br>
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
