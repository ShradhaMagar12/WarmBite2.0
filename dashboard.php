<?php
session_start();
require_once 'includes/auth.php';
check_login();

if (isset($_SESSION['user_role'])) {
    $role = $_SESSION['user_role'];
    if ($role == 'donor') {
        header("Location: donor_dashboard.php");
        exit;
    } elseif ($role == 'ngo') {
        header("Location: ngo_dashboard.php");
        exit;
    } else {
        // Fallback for other roles, e.g. super_admin
        // For now, just a simple message.
        echo "Welcome, you are logged in!";
    }
} else {
    // Should not happen if check_login() is working correctly
    header("Location: login.php");
    exit;
}
?>