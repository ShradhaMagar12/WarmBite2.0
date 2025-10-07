<?php
require_once 'includes/auth.php';

// Ensure user is logged in and is a donor
if (!is_logged_in() || $_SESSION['user_role'] !== 'donor') {
    header('Location: login.php');
    exit;
}

require_once 'db/config.php';
$pdo = db();

$user_id = $_SESSION['user_id'];

// Fetch donor profile
$stmt = $pdo->prepare("SELECT * FROM donor_profiles WHERE user_id = ?");
$stmt->execute([$user_id]);
$profile = $stmt->fetch();

$pageTitle = 'Donor Dashboard';
include 'includes/header.php';
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Welcome, <?php echo isset($profile['full_name']) ? htmlspecialchars(explode(' ', $profile['full_name'])[0]) : 'Donor'; ?>!</h1>
    </div>

    <?php if ($profile): ?>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>My Profile</h4>
                <a href="donor_profile.php" class="btn btn-sm btn-outline-secondary">Edit Profile</a>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($profile['full_name']); ?></h5>
                <p class="card-text">
                    <strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['user_email']); ?><br>
                    <strong>Phone:</strong> <?php echo htmlspecialchars($profile['phone'] ?: 'N/A'); ?><br>
                    <strong>Address:</strong> <?php echo htmlspecialchars($profile['address'] ?: 'N/A'); ?><br>
                    <strong>City:</strong> <?php echo htmlspecialchars($profile['city'] ?: 'N/A'); ?><br>
                    <strong>State:</strong> <?php echo htmlspecialchars($profile['state'] ?: 'N/A'); ?><br>
                </p>
            </div>
        </div>

        <div class="mt-4">
            <h3>Start a New Donation</h3>
            <p>Ready to make a difference? Click the button below to start a new donation request.</p>
            <a href="donation_request.php" class="btn btn-primary">New Donation Request</a>
        </div>

    <?php else: ?>
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">Complete Your Profile</h4>
            <p>Welcome to DonateConnect! To start making donations, please complete your profile with your contact information.</p>
            <hr>
            <a href="donor_profile.php" class="btn btn-primary">Create My Profile</a>
        </div>
    <?php endif; ?>

</div>

<?php include 'includes/footer.php'; ?>
