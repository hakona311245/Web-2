<?php
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        try {
            require_once("dbh.inc.php");
            $query = "INSERT ";
        } catch (PDOException $e) {
            die("Đăng ký không thành công: ". $e->getMessage());
        }
    }   else{
        header("Location:../register.php");
    }