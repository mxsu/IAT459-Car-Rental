<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Marine Drive Rental</title>
</head>
<?php
$isSignedIn = isset($_SESSION['user']); // Assuming session is used to track signed-in users
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
                <a href="signin.php" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Sign In</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>

<body>
    <h1>Welcome to Marine Drive Rental</h1>
    <form action="browse.php" method="GET">
        <label for="browse">Search for a location:</label>
        <input type="text" id="browse" name="browse" placeholder="Enter a location">
        <button type="submit">Search</button>
    </form>
</body>

</html>