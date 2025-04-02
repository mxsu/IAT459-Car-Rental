<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Marine Drive Rental</title>
    <?php
    include("../includes/navbar.php");
    ?>
</head>


<body>

    <h1>Welcome to Marine Drive Rental</h1>

    <?php if (isset($_SESSION["user_id"])): ?>
        <p>Welcome back <?= htmlspecialchars($user["First Name"]) ?></p>
        <p><a href="logout.php">Log out</a></p>
        <br>
    <?php endif; ?>


    <form action="../includes/index-process.php" method="POST">
        <label for="browse">Search for a location:</label>
        <input type="text" id="browse" name="browse" placeholder="Enter a location">
        <div id="autocomplete-list" class="autocomplete-items"></div>
        <label for="start-date">Select a reserve date:</label>
        <br>
        <input type="date" id="start-date" name="start-date" min="<?= date('Y-m-d')  ?>" required>
        <label for="end-date">Select a return:</label>
        <input type="date" id="end-date" name="end-date" min="<?= date('Y-m-d') ?>" required>
        <br>
        <button type="submit">Search</button>
    </form>
    <script src="../JS/jquery.js"></script>
</body>

</html>