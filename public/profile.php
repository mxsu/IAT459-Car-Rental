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
    <div class="profile-container">
        <div class="profile-settings-container">
            <h3>Profile Settings</h3>
            <br>
            Name, Driver License,
            <!-- Additional Profile Info here -->
        </div>

        <div class="booking-history-container">
            <h3>Booking History</h3>
            <?php include("../includes/booking-history.php"); ?>
        </div>
    </div>
</body>

</html>