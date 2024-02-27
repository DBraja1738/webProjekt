<?php
session_start();

// Initialize session data array
$sessionData = array();

// Check if session variables are set before accessing them
if (!isset($_SESSION["id"])) {
    $sessionData["id"] = '';
    $sessionData['username'] = '';
    $sessionData['role'] = '';
    $sessionData['isAuthenticated'] = false;
}else{
    $sessionData['id'] = $_SESSION['id'];
    $sessionData['username'] = $_SESSION['username'];
    $sessionData['role'] = $_SESSION['role'];
    $sessionData['isAuthenticated'] = true;
}



header('Content-Type: application/json');
echo json_encode($sessionData);
?>