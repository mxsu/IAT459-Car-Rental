<?php


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Marine Drive Rental</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <?php
    include("../includes/navbar.php");
    ?>
</head>



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
<?php
include("../includes/footer.php");
?>

</html>