<?php

require('../includes/connect-db.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// echo "Connected successfully";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Cars</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php
    include("../includes/navbar.php");
    ?>
</head>


<body>

    <div class="browse-info">
        <div class="browse-column">
            <?php
            if (isset($_SESSION["location"])) {
                echo "<p style='font-size: 18px;'><strong>Location:</strong> " . htmlspecialchars($_SESSION["location"]) . "</p>";
            } else {
                echo "<p style='font-size: 18px;'><strong>Location:</strong> Not set</p>";
            }
            ?>
            <h2>Browse our selection of cars below.</h2>
        </div>
        <div class="browse-column">
            <?php
            if (isset($_SESSION["start-date"])) {
                echo "<p style='font-size: 18px;'><strong>Pickup Date:</strong> " . htmlspecialchars($_SESSION["start-date"]) . "</p>";
            } else {
                echo "<p style='font-size: 18px;'><strong>Pickup Date:</strong> Not set</p>";
            }

            if (isset($_SESSION["end-date"])) {
                echo "<p style='font-size: 18px;'><strong>Return Date:</strong> " . htmlspecialchars($_SESSION["end-date"]) . "</p>";
            } else {
                echo "<p style='font-size: 18px;'><strong>Return Date:</strong> Not set</p>";
            }
            ?>
        </div>
    </div>

    <div class="container">
        <!-- Filters Section -->
        <div class="left-filter">
            <h2>Filter Cars</h2>
            <form id="filter-form">
                <input type="hidden" name="page" id="page-number" value="1">

                <!-- Search Bar -->
                <h3>Search for a car</h3>
                <input type="text" id="search-bar" name="search" placeholder="Search for a car...">

                <!-- Car Body Type -->
                <h3>Car Body Type</h3>
                <input type="checkbox" id="car" name="body_type[]" value="Car">
                <label for="car"> Car </label><br>
                <input type="checkbox" id="suv" name="body_type[]" value="SUV">
                <label for="suv"> SUV </label><br>
                <input type="checkbox" id="truck" name="body_type[]" value="Truck">
                <label for="truck"> Truck </label><br>
                <input type="checkbox" id="van" name="body_type[]" value="Van">


                <label for="van"> Van </label><br>


                <!-- Fuel Type -->
                <h3>Fuel Type</h3>
                <input type="checkbox" id="gas" name="fuel_type[]" value="Gas">
                <label for="gas"> Gasoline </label><br>
                <input type="checkbox" id="electric" name="fuel_type[]" value="Electric">
                <label for="electric"> Electric </label><br>
                <input type="checkbox" id="hybrid" name="fuel_type[]" value="Hybrid">
                <label for="hybrid"> Hybrid </label><br>

                <!-- Seats -->
                <h3>Seats</h3>
                <input type="checkbox" id="seats2" name="seats[]" value="2">
                <label for="seats2"> 2 </label><br>
                <input type="checkbox" id="seats4" name="seats[]" value="4">
                <label for="seats4"> 4 </label><br>
                <input type="checkbox" id="seats5" name="seats[]" value="5">
                <label for="seats5"> 5 </label><br>
                <input type="checkbox" id="seats6+" name="seats[]" value="6+">
                <label for="seats6+"> 6+ </label><br>
                <br>
                <!-- Submit Button -->
                <button type="submit">Apply Filters</button>
            </form>
        </div>
        <!-- Cars Section -->
        <div class="right-content">



            <p>Loading cars...</p>

        </div>
    </div>
    <script src="../JS/jquery.js"></script>
</body>

</html>