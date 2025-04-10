<?php
require('../includes/connect-db.php');
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected Successfully";
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
            <?php if (isset($_SESSION["user_id"])): ?>

                <p>Welcome back <?= htmlspecialchars($user["First Name"]) . " " . $user["Last Name"] ?></p>
                <p><a href="logout.php">Log out</a></p>
            <?php endif; ?>
            <h3>Profile Settings</h3>
            <form action="../includes/update-profile.php" method="POST" class="profile-update-form">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="">
                <label for="driver_license">Driver License Number:</label>
                <input type="text" id="driver_license" name="driver_license" value="">

                <label for="expiration_date">DL Expiration Date:</label>
                <input type="date" id="expiration_date" name="expiration_date" value="" min="<?= date('Y-m-d')  ?>">
                <label for="province">Province:</label>
                <input type="text" id="province" name="province" value="">
                <label for="age">Age:</label>
                <input type="text" id="age" name="age" value="">
                <br>
                <button type="submit" name="update_profile">Update Profile</button>
            </form>
            <!-- Additional Profile Info here -->
        </div>

        <div class="booking-history-container">
            <h3>Booking History</h3>
            <?php include("../includes/booking-history.php"); ?>
        </div>
    </div>
</body>

</html>