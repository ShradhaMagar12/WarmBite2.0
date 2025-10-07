<?php
function check_login() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
}

function check_role($role) {
    if ($_SESSION['user_role'] !== $role) {
        // Redirect to their own dashboard if they try to access another role's page
        $dashboard = $_SESSION['user_role'] . '_dashboard.php';
        header("Location: $dashboard");
        exit;
    }
}
?>
