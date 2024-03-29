<?php 
// phpinfo();
$dsn = "mysql:host=localhost;dbname=web2";
$username = "root";
$pwd= "";
try{
    $pdo= new PDO($dsn, $username, $pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection succeed.";
}   catch(PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}
 $pdo=null;
