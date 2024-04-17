<?php
$severname="localhost";
$username="root";
$password="";
$database="web2";

$conn = mysqli_connect($severname,$username,$password,$database);
if(!$conn){
    echo"Kết nối không thành công! ";
}
else{
    echo"Kết nối thành công";
}

?>