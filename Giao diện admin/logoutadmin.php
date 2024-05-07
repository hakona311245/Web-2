<?php
require_once("databaseadmin.php");
require_once("session.php");
require_once("function.php");

session_start();
$token = getSession('tokenLoginAdmin');
delete('tokenloginadmin', "token='$token'");
session_destroy();
header("Location: loginadmin.php");
exit;

?>