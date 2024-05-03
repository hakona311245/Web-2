<?php
require_once("databaseadmin.php");
require_once("session.php");
require_once("function.php");


$filterAll = filter();
if(!empty($filterAll['user_id'])){
    $userID = $filterAll['user_id'];
    $userDetail = getRows("SELECT * FROM users WHERE user_id = $userID");
    if($userDetail > 0){
        
        
            $deleteUser = delete('users', "user_id = $userID");
        
    }
}
redirect('index.php');
?>