<?php

declare(strict_types=1);

function get_username(object $pdo, string $username){
    $query = "SELECT user_name FROM taikhoannguoidung WHERE user_name = :username;";
    $stmt = $pdo -> prepare($query);
    $stmt -> bindParam(":username", $username);
    $stmt -> execute();

    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email){
    $query = "SELECT user_name FROM taikhoannguoidung WHERE user_email = :email;";
    $stmt = $pdo -> prepare($query);
    $stmt -> bindParam(":email", $email);
    $stmt -> execute();

    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $result;
}
 
function set_user(object $pdo , string $pwd, string $username, string $email, string $phone){
    $query = "INSERT INTO taikhoannguoidung(user_name, user_email, user_phone, user_pwd) VALUE (:username, :email, :phone, :pwd);";
    $stmt = $pdo -> prepare($query);
    $options = ['cost' => 12];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
    $stmt -> bindParam(":username", $username);
    $stmt -> bindParam(":email", $email);
    $stmt -> bindParam(":phone", $phone);
    $stmt -> bindParam(":pwd", $hashedPwd);
    $stmt -> execute();

    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $result;
}