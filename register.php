<?php
session_start();
require_once 'db/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Validation
    if (empty($email) || empty($password) || empty($role)) {
        $error = "All fields are required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } else {
        $pdo = db();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $error = "Email already exists";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
            if ($stmt->execute([$email, $hashed_password, $role])) {
                $_SESSION['user_id'] = $pdo->lastInsertId();
                $_SESSION['user_role'] = $role;
                if ($role == 'donor') {
                    header("Location: donor_dashboard.php");
                } elseif ($role == 'ngo') {
                    header("Location: ngo_dashboard.php");
                } else {
                    header("Location: dashboard.php");
                }
                exit;
            } else {
                $error = "Registration failed";
            }
        }
    }
}

require_once 'includes/header.php';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Register</h3>
                </div>
                <div class="card-body">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form action="register.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Register as:</label>
                            <select name="role" class="form-select">
                                <option value="donor">Donor</option>
                                <option value="ngo">NGO</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
