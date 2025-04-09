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
    <div style="position: relative;">
        <img src="../images/Jeffrey-Eisen-Vancouver.jpg" alt="Jeffery Eisen Vancouver" style="width:100%; height:700px; object-fit: cover;">

        <div class="index-box">

            <form action="../includes/index-process.php" method="POST">

                <div>
                    <label for="browse">Search for a location:</label>
                    <input type="text" id="browse" name="browse" placeholder="Enter a location">
                    <div id="autocomplete-list" class="autocomplete-items"></div>
                </div>
                <div id="autocomplete-list" class="autocomplete-items"></div>
                <div>
                    <label for="start-date">Select a reserve date:</label>
                    <input type="date" id="start-date" name="start-date" min="<?= date('Y-m-d')  ?>" required>
                </div>
                <div>
                    <label for="end-date">Select a return date: </label>
                    <input type="date" id="end-date" name="end-date" min="<?= date('Y-m-d') ?>" required>
                </div>
                <div style="display: flex; justify-content: center; margin-top: 10px;"><button type="submit">Search</button></div>

            </form>

        </div>
    </div>

    <script src="../JS/jquery.js"></script>
</body>

</html>