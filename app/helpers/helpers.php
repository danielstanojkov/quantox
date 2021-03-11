<?php
session_start();

// Flash Message Helper
function flash($name = '', $message = '', $class = 'alert alert-success')
{
    // Guard Clause
    if (!$name) return;

    // Setting To Session
    if ($message) {
        $_SESSION[$name] = $message;
        $_SESSION[$name . '_class'] = $class;
    }

    // Reading From Session
    if (!$message && !empty($_SESSION[$name])) {
        $class = $_SESSION[$name . '_class'] ? $_SESSION[$name . '_class'] : '';
        echo '<div class= "' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
        unset($_SESSION[$name]);
        unset($_SESSION[$name . '_class']);
    }
}


// Redirect Helper
function redirect($location)
{
    header("Location: " . URL_ROOT . '/' . $location);
    die;
}


// Check if user is Auth
function isLoggedIn()
{
    return isset($_SESSION['user_id']) ? true : false;
}
