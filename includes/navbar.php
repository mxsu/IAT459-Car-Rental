<?php
session_start();
echo '<link rel="stylesheet" href="../css/styles.css">';
echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.min.css">';
echo '<link rel="stylesheet" href="../css/not-spaghetti.css">';
echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';



if (isset($_SESSION["user_id"])) {
    $mysqli = require("../includes/connect-db.php");
    $sql = "SELECT * FROM user WHERE user_id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}

$isSignedIn = isset($user); // Assuming session is used to track signed-in users
?>
<nav>
    <ul>
        <li>
            <a href="index.php">Home</a>
        </li>
        <li style="float: right;">
            <?php if ($isSignedIn): ?>
                <a href="logout.php">Logout</a>
                <a href="profile.php">Profile</a>
            <?php else: ?>
                <a href="login.php">Sign In</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>



<!-- <nav>
    <ul style="list-style-type: none; margin: 0; padding: 0; overflow: hidden; background-color: #333;">
        <li style="float: left;">
            <a href="index.php" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Home</a>
        </li>
        <li style="float: right;">
            <?php if ($isSignedIn): ?>
                <a href="logout.php" style="float: right; display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Logout</a>
                <a href="profile.php" style="float: right; display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Profile</a>
            <?php else: ?>
                <a href="login.php" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Sign In</a>
            <?php endif; ?>
        </li>
    </ul>
</nav> -->


<!--  -->