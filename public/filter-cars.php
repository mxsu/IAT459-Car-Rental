<?php
require('../includes/connect-db.php');
session_start();
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$location = $_SESSION['location'] ?? ''; // Get location from session
if (empty($location)) {
    echo "Location is not set in the session.";
    exit;
}

// Escape the location string properly
$location = mysqli_real_escape_string($conn, $location);

$limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 4;
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
$offset = ($page - 1) * $limit;

// Start base query
$query = "
    SELECT cs.Manufacturer, cs.Model, cs.`Body Type`, cs.`Drive Train`, cs.`Fuel Type`, 
           cs.`Car Code`, cs.daily_price, cs.Seating 
    FROM `car specifications` AS cs 
    JOIN car AS c ON cs.`Car Code` = c.`Car Code` 
    WHERE c.Location = '$location'
";

// Add filters based on user input
if (!empty($_POST['body_type'])) {
    $bodyTypes = implode("','", array_map(function ($item) use ($conn) {
        return mysqli_real_escape_string($conn, $item);
    }, $_POST['body_type']));
    $query .= " AND cs.`Body Type` IN ('$bodyTypes')";
}

if (!empty($_POST['fuel_type'])) {
    $fuelTypes = implode("','", array_map(function ($item) use ($conn) {
        return mysqli_real_escape_string($conn, $item);
    }, $_POST['fuel_type']));
    $query .= " AND cs.`Fuel Type` IN ('$fuelTypes')";
}

if (!empty($_POST['seats'])) {
    $seatConditions = [];
    foreach ($_POST['seats'] as $seat) {
        $seat = mysqli_real_escape_string($conn, $seat);
        if ($seat === "6+") {
            $seatConditions[] = "cs.Seating > 6";
        } else {
            $seatConditions[] = "cs.Seating = '$seat'";
        }
    }
    $query .= " AND (" . implode(" OR ", $seatConditions) . ")";
}

// Add LIMIT and OFFSET
$query .= "GROUP BY cs.`Car Code`";
$query .= "ORDER BY cs.`Car Code` ASC"; // Order by Car Code
$query .= " LIMIT $limit OFFSET $offset";

// Execute
$result = mysqli_query($conn, $query);

// Display results
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $image_path = "../images/default-car.jpg"; // Default image
        if (strpos($row['Car Code'], "Toyota_Corolla") !== false) {
            $image_path = "../images/toyota-corolla-sedan-2019-520018.jpg";
        } elseif (strpos($row['Car Code'], "Toyota_Prius") !== false) {
            $image_path = "../images/prius.jpg";
        } elseif (strpos($row['Car Code'], "Ford_Mustang") !== false) {
            $image_path = "../images/mustang.jpg";
        } elseif (strpos($row['Car Code'], "Dodge_Caravan") !== false) {
            $image_path = "../images/dodge_caravan.jpg";
        } elseif (strpos($row['Car Code'], "Toyota_Sienna") !== false) {
            $image_path = "../images/toyota_sienna.png";
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
                <div class='card-title'>{$row["daily_price"]}</div> 
                <!-- change to actual price later -->
                <form action='detail.php' method='POST'>
                    <input type='hidden' name='car-code' value='{$row["Car Code"]}'>
                    <button type='submit' class='card-button'>Pay Now</button>
                </form>
            </div>
        </div>";
    }
} else {
    echo "<p>No cars match your filters.</p>";
}

// Get total rows to calculate number of pages
$count_query = "SELECT COUNT(*) AS total FROM `car specifications` AS cs JOIN car AS c ON c.`Car Code` = cs.`Car Code` WHERE c.Location = '$location'";

if (isset($_POST['body_type']) && !empty($_POST['body_type'])) {

    $bodyTypes = implode("','", $_POST['body_type']);
    $count_query .= " AND cs.`Body Type` IN ('$bodyTypes')";
}

if (isset($_POST['fuel_type']) && !empty($_POST['fuel_type'])) {

    $fuelTypes = implode("','", $_POST['fuel_type']);
    $count_query .= " AND cs.`Fuel Type` IN ('$fuelTypes')";
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
    $count_query .= " AND (" . implode(" OR ", $seatConditions) . ")";
}

$count_result = mysqli_query($conn, $count_query);
$row = mysqli_fetch_assoc($count_result);
$total_rows = $row['total'];
$total_pages = ceil($total_rows / $limit);

// Display pagination as buttons
if ($total_pages > 1) {
    echo "<div class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<button class='pagination-btn' data-page='$i'>$i</button>";
    }
    echo "</div>";
}

mysqli_close($conn);
