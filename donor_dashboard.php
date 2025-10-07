<?php
session_start();
require_once 'includes/auth.php';
check_login();
check_role('donor');

require_once 'includes/header.php';
?>

<div class="container mt-5">
    <h1>Welcome, Donor!</h1>
    <p>This is your dashboard. Here you can manage your profile and donations.</p>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</div>

<?php require_once 'includes/footer.php'; ?>
