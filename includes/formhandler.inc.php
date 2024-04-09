<?php
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $username = $_POST["user_name"];
        $password = $_POST["user_pwd"];
        $email = $_POST["user_email"];
        $phone = $_POST["user_phone"];
        // echo "test ".$username. $password . $email. $phone;
        try {
            require_once("dbh.inc.php");
            require_once("signup_model.inc.php");

            require_once("signup_contr.inc.php");
            
            //error handlers
            $errors = [];
            if(is_input_empty($username, $password, $email, $phone)){
                $errors["empty_input"] = "Yêu cầu điền đầy đủ thông tin!";
            }
            if(is_email_invalid($email)){
                $errors["invalid_email"] = "Email không hợp lệ!";
            }
            if(is_username_taken($pdo ,$username)){
                $errors["username_taken"] = "Tên này đã được sử dụng!";
            }
            if(is_email_registered($pdo , $email)){
                $errors["email_registered"] = "Email đã được sử dụng!";
            }
            if(is_phone_num_invalid($phone)){
                $errors["phone_num_invalid"] = "Số điện thoại không hợp lệ!";
            }
            
            require_once'config_session.inc.php';

            if($errors){
                $_SESSION["errors_signup"] = $errors;
                header("Location: ../register.php");
                die();
            }

            create_user($pdo , $pwd, $username, $email, $phone);

            header("Location: ../register.php?signup=success");
            $pdo = null;
            $stmt = null;
            die();  
            


        } catch (PDOException $e) {
            die("Đăng ký không thành công: ". $e->getMessage());
        }
    }   else{
        header("Location:../register.php");
        die();
    }