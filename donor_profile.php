<?php
require_once 'includes/auth.php';

// Only donors can access this page
if (!is_logged_in() || $_SESSION['user_role'] !== 'donor') {
    header('Location: login.php');
    exit;
}

require_once 'db/config.php';
$pdo = db();

$user_id = $_SESSION['user_id'];
$profile = null;
$message = '';

// Check if profile exists
$stmt = $pdo->prepare("SELECT * FROM donor_profiles WHERE user_id = ?");
$stmt->execute([$user_id]);
$profile = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $state = trim($_POST['state'] ?? '');

    if (empty($full_name)) {
        $message = '<div class="alert alert-danger">Full name is required.</div>';
    } else {
        if ($profile) {
            // Update existing profile
            $stmt = $pdo->prepare("UPDATE donor_profiles SET full_name = ?, phone = ?, address = ?, city = ?, state = ? WHERE user_id = ?");
            $stmt->execute([$full_name, $phone, $address, $city, $state, $user_id]);
            $message = '<div class="alert alert-success">Profile updated successfully!</div>';
        } else {
            // Create new profile
            $stmt = $pdo->prepare("INSERT INTO donor_profiles (user_id, full_name, phone, address, city, state) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$user_id, $full_name, $phone, $address, $city, $state]);
            $message = '<div class="alert alert-success">Profile created successfully!</div>';
        }
        // Refresh profile data after insert/update
        $stmt = $pdo->prepare("SELECT * FROM donor_profiles WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $profile = $stmt->fetch();
    }
}

$pageTitle = 'My Profile';
include 'includes/header.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>My Profile</h2>
                    <p>Manage your personal information.</p>
                </div>
                <div class="card-body">
                    <?php echo $message; ?>
                    <form action="donor_profile.php" method="POST">
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo htmlspecialchars($profile['full_name'] ?? ''); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($profile['phone'] ?? ''); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3"><?php echo htmlspecialchars($profile['address'] ?? ''); ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="<?php echo htmlspecialchars($profile['city'] ?? ''); ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control" id="state" name="state" value="<?php echo htmlspecialchars($profile['state'] ?? ''); ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo $profile ? 'Update Profile' : 'Save Profile'; ?></button>
                        <a href="donor_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
