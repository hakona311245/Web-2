<?php
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $username = $_POST["user_name"];
        $password = $_POST["user_pwd"];
        $email = $_POST["user_email"];
        $phone = $_POST["user_phone"];
        try {
            require_once("dbh.inc.php");
            $query = "INSERT into taikhoannguoidung (user_name, user_pwd, user_email, user_phone) Values (:user_name, :user_pwd, :user_email, :user_phone);";
            
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":user_name", $username);
            $stmt->bindParam(":user_pwd", $password);
            $stmt->bindParam(":user_email", $email);
            $stmt->bindParam(":user_phone", $phone);

            $stmt->execute();

            $pdo=null;
            $stmt=null;
            header("Location: ../register.php");
            die();
        } catch (PDOException $e) {
            die("Đăng ký không thành công: ". $e->getMessage());
        }
    }   else{
        header("Location:../register.php");
    }