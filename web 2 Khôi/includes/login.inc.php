<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["singin-email"];
    $password = $_POST["singin-password"];
    try {
        require_once("dbh.inc.php");
        require_once("login_model.inc.php");
        require_once("login_contr.inc.php");
        
        // Error handlers
        $errors = [];
        if (is_input_empty($username, $password)) {
            $errors["empty_input"] = "Yêu cầu điền đầy đủ thông tin!";
        }

        $result = get_user($pdo, $username);
        
        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "Nhập sai thông tin";
        }
        if (!is_username_wrong($result) && is_pwd_wrong($password, $result["user_password"])) {
            $errors["login_incorrect"] = "Nhập sai thông tin";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../login.php");
            die();
        }

        // Initialize session with a custom session ID
        $newSessionID = session_create_id();
        $sessionID = $newSessionID . "_" . $result["user_id"];
        session_id($sessionID);
        session_start();

        $_SESSION["user_id"] = $result["user_id"];
        $_SESSION["user_username"] = htmlspecialchars($result["user_name"]);
        $_SESSION["last_regeneration"] = time();

        // Initialize or restore the shopping cart
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        header("Location: ../index.php?=success");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Đăng ký không thành công: " . $e->getMessage());
    }
} else {
    header("Location: ../login.php");
    die();
}
