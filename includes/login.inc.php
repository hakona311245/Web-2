<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["user_name"];
    $password = $_POST["user_pwd"];
        try {
            require_once("dbh.inc.php");
            require_once("login_model.inc.php");
            require_once("login_contr.inc.php");
            
            //error handlers
            $errors = [];
            if(is_input_empty($username, $password)){
                $errors["empty_input"] = "Yêu cầu điền đầy đủ thông tin!";
            }

            $result = get_user($pdo ,$username);
            
            if(is_username_wrong($result)){
                $errors["login_incorrect"] = "Nhập sai thông tin";
            }
            if(!is_username_wrong($result) && is_pwd_wrong($password, $result["user_pwd"])){
                $errors["login_incorrect"] = "Nhập sai thông tin";
            }

            require_once'config_session.inc.php';

            if($errors){
                $_SESSION["errors_login"] = $errors;
                header("Location: ../login.php");
                die();
            }

            $newSessionID = session_create_id();
            $sessionID = $newSessionID . "_" . $result["user_id"];
            session_id($sessionID);

            $_SESSION["user_id"] = $result["user_id"];
            $_SESSION["user_username"] = htmlspecialchars($result["user_name"]);
            
            $_SESSION["last_regeneration"] = time();

            header("Location: ../home.php?login=success");
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