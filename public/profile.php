<?php
require('../includes/connect-db.php');
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected Successfully";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Cars</title>
    <?php
    include("../includes/navbar.php");
    ?>
</head>


<body>
    <?php if (isset($_SESSION["user_id"])): ?>

        <p>Welcome back <?= htmlspecialchars($user["First Name"]) ?></p>
        <p><a href="logout.php">Log out</a></p>
        <br>
    <?php endif; ?>

    <div class="grid-container">
        <div class="grid-25">
            <h3>Profile Settings</h3>






        </div>
        <div class="grid-75">
            <h3>Booking History</h3>

            <?php include("../includes/booking-history.php"); ?>



        </div>
    </div>


</body>