<?php

require('../includes/connect-db.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$bodyType = $_GET['body_type'];

// Prepare the SQL query to fetch the first car of the specified body type
$query = "SELECT * FROM `car` c 
JOIN `car specifications` cs ON c.`Car Code` = cs.`Car Code` 
WHERE cs.`body type` = ? LIMIT 1";


// Initialize the prepared statement
$stmt = mysqli_prepare($conn, $query);

// Bind the parameter (body_type)
mysqli_stmt_bind_param($stmt, "s", $bodyType);

// Execute the statement
mysqli_stmt_execute($stmt);


// Get the result
$result = mysqli_stmt_get_result($stmt);

// Fetch the first car
$car = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Cars</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
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

    <div class="container">

        <div class="car-select">
            <?php if ($car) {
                // Display the car details
                echo "<div class='car-details'>";
                echo "<h2>" . htmlspecialchars($car['Manufacturer']) . "</h2>";
                echo "<h2>" . htmlspecialchars($car['Model']) . "</h2>";
                echo "<p>Seats: " . htmlspecialchars($car['Seating']) . "</p>";
                echo "<p>Fuel Type: " . htmlspecialchars($car['Fuel Type']) . "</p>";
                echo "<p><a href='reserve.php?id=" . $car['id'] . "'>Reserve this car</a></p>";
                echo "</div>";
            } else {
                echo "<p>No cars found for the selected body type.</p>";
            }
            ?>
        </div>
        <div class="insurance-select">
            <input type="checkbox" id="no" name="coverage[]" value="0">
            <label for="no"> No Coverage </label><br>
            <input type="checkbox" id="basic" name="coverage[]" value="0">
            <label for="basic"> Basic </label><br>
            <input type="checkbox" id="full" name="coverage[]" value="0">
            <label for="full"> Full </label><br>
        </div>
    </div>
    </div>
</body>

</html>