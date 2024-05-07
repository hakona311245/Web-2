<?php   
    declare(strict_types=1);
    function get_user(object $pdo, string $email){
        $query = "SELECT * FROM users WHERE user_email = :username;";
        $stmt = $pdo -> prepare($query);
        $stmt -> bindParam(":username", $email);
        $stmt -> execute();
    
        $result = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $result;
    }