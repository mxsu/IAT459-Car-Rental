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
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<nav>
    <ul style="list-style-type: none; margin: 0; padding: 0; overflow: hidden; background-color: #333;">
        <li style="float: left;">
            <a href="index.php" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Home</a>
        </li>

        <li style="float: right;">
            <a href="signin.php" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Sign In</a>
        </li>
    </ul>
</nav>

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
            <?php
            require('../includes/connect-db.php');

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $db);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            // echo "Connected successfully";

            $car_query = "SELECT Manufacturer, Model, `Body Type`, `Drive Train`, `Fuel Type`, Seating, `Car Code` FROM `car specifications`";
            $result = mysqli_query($conn, $car_query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { 
                    $image_path = ""; //empty image path

                    
                    if (strpos($row['Car Code'], "Toyota_Corolla") !== false) {
                        $image_path = "../images/toyota-corolla-sedan-2019-520018.jpg";
                    } elseif (strpos($row['Car Code'], "Toyota_Prius") !== false) {
                        $image_path = "../images/prius.jpg";
                    } else {
                        $image_path = "../images/default-car.jpg"; 
                    }
        
                    ?>
                    <div class="card">
                        <img src="<?= $image_path ?>" alt="Card Image">
                        <div class="card-content">
                            <h2 class="card-title"><?= $row["Manufacturer"] . " " . $row["Model"] ?></h2>
                            <p class="card-text"><?= $row["Body Type"] ?></p>
                            <p class="card-text-small"><?= $row["Drive Train"] . " " . $row["Fuel Type"] . " " . $row["Seating"] . " Seats" ?></p>
                        </div>
                        <div class="card-button-section">
                            <div class="card-text">Price</div>
                            <div class="card-title">$69.95</div> 
                            <!-- change to actual price later -->
                            <button type="button" class="card-button" onclick="redirectToDetailPage(this)" data-body-type="Car">Pay Now</button>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <p>No cars available.</p>
            <?php }
            mysqli_close($conn); ?>
        </div>
    </div>
    <script src="../JS/jquery.js"></script>
</body>

</html>