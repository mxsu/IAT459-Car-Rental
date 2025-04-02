<?php
require('../includes/connect-db.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected Successfully";

// Start base query
$query = "SELECT Manufacturer, Model, `Body Type`, `Drive Train`, `Fuel Type`, Seating, `Car Code` FROM `car specifications` WHERE 1=1";

// Add filters based on user input
if (isset($_POST['body_type']) && !empty($_POST['body_type'])) {
    $bodyTypes = implode("','", $_POST['body_type']);
    $query .= " AND `Body Type` IN ('$bodyTypes')";
}

if (isset($_POST['fuel_type']) && !empty($_POST['fuel_type'])) {
    $fuelTypes = implode("','", $_POST['fuel_type']);
    $query .= " AND `Fuel Type` IN ('$fuelTypes')";
}

if (isset($_POST['seats']) && !empty($_POST['seats'])) {
    $seatConditions = [];
    foreach ($_POST['seats'] as $seat) {
        if ($seat === "6+") {
            $seatConditions[] = "Seating > 6"; 
        } else {
            $seatConditions[] = "Seating = '$seat'"; 
        }
    }
    $query .= " AND (" . implode(" OR ", $seatConditions) . ")";
}

// Execute query
$result = mysqli_query($conn, $query);

// Check and output results
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $image_path = "../images/default-car.jpg"; // Default image
        if (strpos($row['Car Code'], "Toyota_Corolla") !== false) {
            $image_path = "../images/toyota-corolla-sedan-2019-520018.jpg";
        } elseif (strpos($row['Car Code'], "Toyota_Prius") !== false) {
            $image_path = "../images/prius.jpg";
        }elseif (strpos($row['Car Code'], "Ford_Mustang") !== false) {
            $image_path = "../images/mustang.jpg";
        }

        echo "
        <div class='card'>
            <img src='$image_path' alt='Card Image'>
            <div class='card-content'>
                <h2 class='card-title'>{$row["Manufacturer"]} {$row["Model"]}</h2>
                <p class='card-text'>{$row["Body Type"]}</p>
                <p class='card-text-small'>{$row["Drive Train"]} {$row["Fuel Type"]} {$row["Seating"]} Seats</p>
            </div>
            <div class='card-button-section'>
                        <div class='card-text'>Price</div>
                        <div class='card-title'>$69.95</div> 
                        <!-- change to actual price later -->
                        <button type='button' class='card-button' onclick='redirectToDetailPage(this)' data-body-type='Car'>Pay Now</button>
                    </div>
            
        </div>";
    }
} else {
    echo "<p>No cars match your filters.</p>";
}

mysqli_close($conn);
?>