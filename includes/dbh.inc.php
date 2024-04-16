<?php 
// phpinfo();
$dsn = "mysql:host=localhost;dbname=web2";
$user_name = "root";
$pwd= "";
try{
    $pdo= new PDO($dsn, $user_name, $pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}   catch(PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}