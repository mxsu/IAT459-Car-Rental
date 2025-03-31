<?php

require('../includes/connect-db.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Cars</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <?php
    include("../includes/navbar.php");
    ?>
</head>


<body>
    <h1>Welcome to the Marine Drive Rentals</h1>
    <p>Browse our selection of cars below.</p>
    <h2>Filter Cars</h2>
    <div class="container">

        <div class="left-filter">
            <form id="filter-form">
                <!-- Car Body Type -->
                <h3>Car Body Type</h3>
                <input type="checkbox" id="car" name="body_type[]" value="Car">
                <label for="car"> Car </label><br>
                <input type="checkbox" id="suv" name="body_type[]" value="SUV">
                <label for="suv"> SUV </label><br>
                <input type="checkbox" id="truck" name="body_type[]" value="Truck">
                <label for="truck"> Truck </label><br>
                <input type="checkbox" id="van" name="body_type[]" value="Van">
                <label for="vab"> Van </label><br>

                <!-- Fuel Type -->
                <h3>Fuel Type</h3>
                <input type="checkbox" id="gas" name="fuel_type[]" value="Gasoline">
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
        <div class="right-content">

            <div class="card">
                <img src="../images/toyota-corolla-sedan-2019-520018.jpg" alt="Card Image">
                <div class="card-content">
                    <h2 class="card-title">Card Title</h2>
                    <p class="card-text">Testing</p>
                    <p class="card-text-small">Gasoline 5 Seat FWD</p>
                </div>
                <div class="card-button-section">
                    <div class="card-text">Price</div>
                    <div class="card-title">$69.55</div>
                    <button type=button class="card-button" onclick="redirectToDetailPage(this)" data-body-type="Car">Pay Now</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../JS/jquery.js"></script>
</body>

</html>