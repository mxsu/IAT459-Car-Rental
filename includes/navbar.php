<?php
session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require("../includes/connect-db.php");
    $sql = "SELECT * FROM user WHERE user_id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}

$isSignedIn = isset($user); // Assuming session is used to track signed-in users
?>
<nav>
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
</nav>


<!--  -->