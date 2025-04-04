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


    <h1>Welcome to the Marine Drive Rentals</h1>
    <?php
    if (isset($_SESSION["location"])) {
        echo "Location: " . htmlspecialchars($_SESSION["location"]) . nl2br("\n");
    } else {
        echo "Location is not set in the session.";
    }
    if (isset($_SESSION["start-date"])) {
        echo "Pickup Date: " . htmlspecialchars($_SESSION["start-date"]) . nl2br("\n");
    } else {
        echo "start-date is not set in the session.";
    }
    if (isset($_SESSION["end-date"])) {
        echo "Return Date: " . htmlspecialchars($_SESSION["end-date"]) . nl2br(" \n");
    } else {
        echo "end-date is not set in the session.";
    }

    ?>
    <h1>Welcome to Marine Drive Rentals</h1>

    <p>Browse our selection of cars below.</p>

    <h2>Filter Cars</h2>
    <div class="container">


        <!-- Filters Section -->

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


                <label for="van"> Van </label><br>


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

                <!-- Submit Button -->
                <button type="submit">Apply Filters</button>
            </form>
        </div>
        <!-- Cars Section -->
        <div class="right-content">



            <p>Loading cars...</p>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            function fetchCars(limit = 4) {
                let formData = $("#filter-form").serialize() + "&limit=" + limit;

                $.ajax({
                    type: "POST",
                    url: "filter-cars.php",
                    data: formData,
                    success: function(response) {
                        $(".right-content").html(response);
                    },
                    error: function() {
                        alert("Failed to retrieve cars. Please try again.");
                    }
                });
            }

            // Fetch cars on page load
            fetchCars();

            // Fetch cars when form is submitted
            $("#filter-form").submit(function(event) {
                event.preventDefault(); // Prevent form from reloading the page
                fetchCars();
            });
        });
    </script>
    <script src="../JS/jquery.js"></script>
</body>

</html>