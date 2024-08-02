<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user_details'] = [
        "user_id" => $_POST['user_id'],
        "username" => $_POST['username'],
        "email" => $_POST['email'],
        "password" => $_POST['password']
    ];

    $_SESSION['tax_form_details'] = [
        "tax_form_id" => $_POST['tax_form_id'],
        "form_type" => $_POST['form_type'],
        "submission_date" => $_POST['submission_date']
    ];

    $_SESSION['tax_return_details'] = [
        "tax_return_id" => $_POST['tax_return_id'],
        "return_date" => $_POST['return_date'],
        "status" => $_POST['status']
    ];

    $_SESSION['payment_details'] = [
        "payment_id" => $_POST['payment_id'],
        "amount" => $_POST['amount'],
        "payment_date" => $_POST['payment_date']
    ];

    header('Location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Online Tax Paying System</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="dashboard-container">
        <h1>Online Tax Paying System</h1>
        <form method="POST" action="dashboard.php">
            <h2>User Details</h2>
            <input type="text" name="user_id" placeholder="User ID" required><br>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>

            <h2>Tax Form Details</h2>
            <input type="text" name="tax_form_id" placeholder="Tax Form ID" required><br>
            <input type="text" name="form_type" placeholder="Form Type" required><br>
            <input type="date" name="submission_date" placeholder="Submission Date" required><br>

            <h2>Tax Return Details</h2>
            <input type="text" name="tax_return_id" placeholder="Tax Return ID" required><br>
            <input type="date" name="return_date" placeholder="Return Date" required><br>
            <input type="text" name="status" placeholder="Status" required><br>

            <h2>Payment Details</h2>
            <input type="text" name="payment_id" placeholder="Payment ID" required><br>
            <input type="number" name="amount" placeholder="Amount" required><br>
            <input type="date" name="payment_date" placeholder="Payment Date" required><br>

            <button type="submit">Submit</button>
        </form>

        <?php if (isset($_SESSION['user_details'])) : ?>
            <a href="report.php">Generate Report</a><br>
        <?php endif; ?>

        <a href="logout.php">Logout</a>
    </div>
</body>

</html>