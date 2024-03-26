<?php 
// phpinfo();
$dsn = "localhost";
$username = "";
$pwd= "";
$dbhname = "classicmodels";
try{
    $pdo= new PDO("sqlsrv:Server=$dsn; Database=$dbhname", $username, $pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection succeed.";
}   catch(PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}
 $pdo=null;
