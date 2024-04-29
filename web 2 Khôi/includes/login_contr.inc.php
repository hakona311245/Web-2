<?php   
declare(strict_types=1);
    function is_input_empty(string $username, string $pwd){
        if(empty($username)||empty($pwd)){
            return true;
        }
        else {
            return false;
        }
    }
    function is_username_wrong(bool|array $result){
        if(!$result){
            return true;
        }
        else{
            return false;
        }
    }
    function is_pwd_wrong(string $password, string $hashedPwd){
        if($password == $hashedPwd) {
            return false;
        } else {
            return !password_verify($password, $hashedPwd);
        }
        
    }
    
