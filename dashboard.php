<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once 'includes/header.php';
?>

<div class="container mt-5">
    <h1>Welcome to your Dashboard</h1>
    <p>You are logged in as a <strong><?php echo htmlspecialchars($_SESSION['user_role']); ?></strong>.</p>
    <p>This is a placeholder for your dashboard content.</p>
    <a href="logout.php">Logout</a>
</div>

<?php require_once 'includes/footer.php'; ?>
