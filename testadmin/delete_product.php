<?php
require_once("databaseadmin.php");
require_once("session.php");
require_once("function.php");


$filterAll = filter();
if(!empty($filterAll['pdt_id'])){
    $userID = $filterAll['pdt_id'];
    $userDetail = getRows("SELECT * FROM products WHERE pdt_id = $pdtID");
    
    if($userDetail > 0){
        
        
             $deleteUser  = delete('products', "pdt_id = $pdtID");

    }
}
redirect('index1.php');
?>