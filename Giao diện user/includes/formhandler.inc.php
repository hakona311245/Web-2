<?php
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $username = $_POST["register-username"];
        $password = $_POST["register-password"];
        $email = $_POST["register-email"];
        $phone = $_POST["register-mobile"];
        // echo "test ".$username. $password . $email. $phone;
        try {
            require_once("dbh.inc.php");
            require_once("signup_model.inc.php");
            require_once("signup_contr.inc.php");
            
            //error handlers
            $errors = [];
            if(is_username_taken($pdo, $username)){
                $errors["username_taken"] = "Tên tài khoản đã được dùng";
            }
            if(is_input_empty($password, $email, $username, $phone)){
                $errors["empty_input"] = "Yêu cầu điền đầy đủ thông tin!";
            }
            if(is_email_invalid($email)){
                $errors["invalid_email"] = "Email không hợp lệ!";
            }
            if(is_email_registered($pdo , $email)){
                $errors["email_registered"] = "Email đã được sử dụng!";
            }
            if(is_phone_num_invalid($phone)){
                $errors["invalid_mobile"] = "Số điện thoại không hợp lệ";
            }
            
            require_once'config_session.inc.php';

            if($errors){
                $_SESSION["errors_signup"] = $errors;
                header("Location: ../login.php");
                die();
            }

            create_user($pdo, $username, $password, $email, $phone);

            header("Location: ../dashboard.php?signup=success");
            $pdo = null;
            $stmt = null;
            die();  
            


        } catch (PDOException $e) {
            die("Đăng ký không thành công: ". $e->getMessage());
        }
    }   else{
        header("Location:../login.php");
        die();
    }