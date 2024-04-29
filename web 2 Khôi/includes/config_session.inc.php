<?php
// Ensure no session has started yet
if (session_status() === PHP_SESSION_NONE) {
    // Safe to set session settings
    ini_set('session.use_only_cookies', 1);
    ini_set('session.use_strict_mode', 1);
    session_set_cookie_params([
        'lifetime' => 1800,
        'domain' => 'localhost',
        'path' => '/',
        'secure' => true,
        'httponly' => true,
    ]);
    
    session_start();  // Now start the session
} else {
    // If a session is already started, proceed without attempting to start again or modify settings
}

if (isset($_SESSION["user_id"])) {
    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id_loggedin();
    } else {
        $interval = 60 * 30; // 30 minutes
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id_loggedin();
        }
    }
} else {
    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id();
    } else {
        $interval = 60 * 30; // 30 minutes
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id();
        }
    }
}

function regenerate_session_id() {
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}

function regenerate_session_id_loggedin() {
    // Check if a session is already active, and close it if necessary
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_write_close(); // Save and close the current session
    }

    // Get user ID from session data
    $userID = $_SESSION["user_id"];
    
    // Create a new session ID
    $newSessionID = session_create_id();
    $sessionID = $newSessionID . "_" . $userID;

    // Set the new custom session ID
    session_id($sessionID);
    
    // Update the session regeneration time
    $_SESSION["last_regeneration"] = time();
}

