<?php

declare(strict_types=1);

function get_username(object $pdo, string $username){
    $query = "SELECT user_name FROM users WHERE user_name = :username;";
    $stmt = $pdo -> prepare($query);
    $stmt -> bindParam(":username", $username);
    $stmt -> execute();

    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email){
    $query = "SELECT user_name FROM users WHERE user_email = :email;";
    $stmt = $pdo -> prepare($query);
    $stmt -> bindParam(":email", $email);
    $stmt -> execute();

    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $result;
}
 
function set_user(object $pdo , string $pwd, string $email, string $phone){
    $query = "INSERT INTO users(user_email, user_mobile, user_password) VALUE (:email, :phone, :pwd);";
    $stmt = $pdo -> prepare($query);
    $options = ['cost' => 12];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
    $stmt -> bindParam(":email", $email);
    $stmt -> bindParam(":phone", $phone);
    // $stmt -> bindParam(":pwd", $pwd);
    $stmt -> bindParam(":pwd", $hashedPwd);
    $stmt -> execute();

    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $result;
}