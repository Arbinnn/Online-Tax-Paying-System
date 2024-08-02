<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['user_details'])) {
    header('Location: dashboard.php');
    exit;
}

$user_details = $_SESSION['user_details'];
$payment_details = $_SESSION['payment_details'];
$tax_form_details = $_SESSION['tax_form_details'];
$tax_return_details = $_SESSION['tax_return_details'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Report - Online Tax Paying System</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="report-container">
        <h1>User Report</h1>
        <p>Date: <?php echo date("Y/m/d"); ?></p>

        <h2>User Details</h2>
        <p>Username: <?php echo $user_details["username"]; ?></p>
        <p>Email: <?php echo $user_details["email"]; ?></p>
        <p>User ID: <?php echo $user_details["user_id"]; ?></p>

        <h2>Payment Details</h2>
        <p>Payment ID: <?php echo $payment_details["payment_id"]; ?></p>
        <p>Amount: <?php echo $payment_details["amount"]; ?></p>
        <p>Payment Date: <?php echo $payment_details["payment_date"]; ?></p>

        <h2>Tax Form Details</h2>
        <p>Tax Form ID: <?php echo $tax_form_details["tax_form_id"]; ?></p>
        <p>Form Type: <?php echo $tax_form_details["form_type"]; ?></p>
        <p>Submission Date: <?php echo $tax_form_details["submission_date"]; ?></p>

        <h2>Tax Return Details</h2>
        <p>Tax Return ID: <?php echo $tax_return_details["tax_return_id"]; ?></p>
        <p>Return Date: <?php echo $tax_return_details["return_date"]; ?></p>
        <p>Status: <?php echo $tax_return_details["status"]; ?></p>
    </div>
</body>

</html>