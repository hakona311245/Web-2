<?php

declare(strict_types=1);

function is_input_empty(string $pwd, string $email){
    
    if(empty($pwd)||empty($email)){
        return true;
    }
    else{
        return false;
    }
}       

function is_email_invalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}

function is_phone_num_invalid(string $phone) {
    // Kiểm tra xem số điện thoại có 10 chữ số và bắt đầu bằng số 0 không
    if (preg_match('/^0\d{9}$/', $phone)) {
        return false; // Hợp lệ
    } else {
        return true; // Không hợp lệ
    }
}

// function is_username_taken(object $pdo , string $username){
//     if (get_username($pdo, $username)) {
//         return true;
//     }
//     else{
//         return false;
//     }
// }

function is_email_registered(object $pdo , string $email){
    if(get_email($pdo, $email)){
        return true;
    }
    else{
        return false;
    }
}

function create_user(object $pdo , string $pwd, string $email, string $phone){
    set_user($pdo , $pwd, $email, $phone);
}