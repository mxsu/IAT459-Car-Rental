<?php
session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require("../includes/connect-db.php");
    $sql = "SELECT * FROM user WHERE user_id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Marine Drive Rental</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
</head>
<?php
$isSignedIn = isset($user); // Assuming session is used to track signed-in users
?>
<nav>
    <ul style="list-style-type: none; margin: 0; padding: 0; overflow: hidden; background-color: #333;">
        <li style="float: left;">
            <a href="index.php" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Home</a>
        </li>
        <li style="float: right;">
            <?php if ($isSignedIn): ?>
                <a href="profile.php" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Profile</a>
            <?php else: ?>
                <a href="login.php" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Sign In</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>

<body>
    <h1>Welcome to Marine Drive Rental</h1>
    <?php if (isset($_SESSION["user_id"])): ?>
        <p>Welcome back <?= htmlspecialchars($user["First Name"]) ?></p>
        <p><a href="logout.php">Log out</a></p>
    <?php endif; ?>


    <form action="browse.php" method="GET">
        <label for="browse">Search for a location:</label>
        <input type="text" id="browse" name="browse" placeholder="Enter a location">
        <label for="car-type">or choose Location:</label>
        <select id="car-type" name="car_type">
            <option value="sedan">Vancouver International Airport (YVR)</option>
            <option value="suv">Main Street Science World</option>
        </select>
        <label for="date">Select a reserve date:</label>
        <br>
        <input type="date" id="date" name="date" min="<?= date('Y-m-d') ?>">
        <label for="date">Select a return:</label>
        <input type="date" id="date" name="date" min="<?= date('Y-m-d') ?>">
        <br>
        <button type="submit">Search</button>
    </form>
</body>

</html>