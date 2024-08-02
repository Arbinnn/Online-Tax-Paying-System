<?php
include('db.php');
session_start();

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    // Validation checks
    if (strlen($username) < 3) {
        $error = "Username must be at least 3 characters long";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters long";
    } else {
        $password_hashed = md5($password);

        // Insert the new user into the database
        $sql = "INSERT INTO taxes (username, password, email) VALUES ('$username', '$password_hashed', '$email')";

        if ($conn->query($sql) === TRUE) {
            // Log the user in by creating a session
            $_SESSION['username'] = $username;
            header('Location: dashboard.php'); // Redirect to dashboard
            exit;
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Online Tax Paying System</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="register-container">
        <h1>Register</h1>
        <form method="POST" action="register.php">
            <input type="text" name="username" placeholder="Username" required>
            <?php if (strpos($error, 'Username') !== false) : ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>

            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="password" placeholder="Password" required>
            <?php if (strpos($error, 'Password') !== false) : ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>

            <button type="submit">Register</button>
        </form>
        <a href="login.php">Already have an account? Login</a>
    </div>
</body>

</html>