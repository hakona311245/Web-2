<?php

const _HOST = 'localhost';
const _DB = 'web';
const _USER = 'root';
const _PASS = '';

try{
    if(class_exists('PDO')){
        $dsn = 'mysql:dbname='._DB.';host='._HOST;

        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAME utf8', //set utf8
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Tạo thông báo ra ngoại lệ khi gặp lỗi
        ];
        $conn = new PDO($dsn, _USER, _PASS);
    }

}catch(Exception $exp){
    echo $exp -> getMessage().'<br>';
    echo 'loi';
    die();
}
function query($sql, $data =[], $check=false){
    global $conn;
    $status = false;
    try{
        $statement = $conn -> prepare($sql);
        if(!empty($data)){
            $status = $statement -> execute($data);
        }else{
            $status = $statement -> execute();
        }  
    }catch(Exception $exp){
        echo $exp -> getMessage().'<br>';
        echo 'File: '.$exp ->getFile().'<br>';
        echo 'Line: '.$exp ->getLine();
    }
    if($check){
        return $statement;
    }
    return $status;
}
function insert($table, $data){
    $key = array_keys($data);
    $list_keys = implode(',', $key);
    $value = ':'.implode(',:', $key);

    $sql = 'INSERT INTO '. $table. '('. $list_keys. ')'. 'VALUE('. $value. ')';
    $status = query($sql, $data);
    return $status;
}

function update($table, $data, $condition =''){
    $update = '';
    foreach ($data as $key => $value){
        $update .= $key. '= :'. $key. ',';
    }
    $update = trim($update, ',');

    if(!empty($condition)){
        $sql = 'UPDATE '. $table. ' SET '. $update. ' WHERE '. $condition; 
    }
    else{
        $sql = 'UPDATE '. $table. ' SET '. $update;
    }
    $status = query($sql, $data);
    return $status;
}

function delete($table, $condition=''){
    if(!empty($condition)){
        $sql = 'DELETE FROM '. $table. ' WHERE '. $condition;
    }
    else{
        $sql = 'DELETE FROM '. $table;
    }
    $status = query($sql);
    return $status;
}

function getRaw($sql){
    $status = query($sql, '', true);
    if(is_object($status)){
        $dataFetch = $status -> fetchAll(PDO::FETCH_ASSOC);
    }
    return $dataFetch;
}


function oneRaw($sql){
    $status = query($sql, '', true);
    if(is_object($status)){
        $dataFetch = $status -> fetch();
    }
    return $dataFetch;
}

function getRows($sql){
    $status = query($sql, '', true);
    if(!empty($status)){
        return $status->rowCount();
    }
    else{
        return 0;
    }
}
?>