<?php
require('../includes/connect-db.php');
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['car-code'] = $_POST['car-code'];
} else {
    echo " No POST data received from filter-cars.php.";
}
echo $_SESSION['car-code'];

$carCode = $_SESSION['car-code'];

// Prepare the SQL query to fetch the first car of the specified body type
// $query = "SELECT * FROM `car` c 
// JOIN `car specifications` cs ON c.`Car Code` = cs.`Car Code` 
// WHERE cs.`Car Code` = ? LIMIT 1";

$query = "SELECT * FROM `car specifications` WHERE `Car Code` = ? LIMIT 1";


// Initialize the prepared statement
$stmt = mysqli_prepare($conn, $query);

// Bind the parameter (body_type)
mysqli_stmt_bind_param($stmt, "s", $carCode);

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
    <?php
    include("../includes/navbar.php");
    ?>
</head>

<body>

    <div class="">
        <div class="">
            <?php if ($car) {
                // Display the car details
                echo "<h2>" . htmlspecialchars($car['Manufacturer']) . "</h2>";
                echo "<h2>" . htmlspecialchars($car['Model']) . "</h2>";
                echo "<p>Seats: " . htmlspecialchars($car['Seating']) . "</p>";
                echo "<p>Fuel Type: " . htmlspecialchars($car['Fuel Type']) . "</p>";

                echo "</div>";
            } else {
                echo "<p>No cars found for the selected car Code.</p>";
            }
            ?>
        </div>

        <div class="left-filter">
            <form action="../includes/detail-process.php" method="post" id="filter-form">
                <input type="radio" id="no" name="coverage" value="0">
                <label for="no"> No Coverage </label><br>

                <input type="radio" id="basic" name="coverage" value="1">
                <label for="basic"> Basic </label><br>

                <input type="radio" id="full" name="coverage" value="2">
                <label for="full"> Full </label><br>

                <button type="submit">Reserve</button>
            </form>
        </div>
    </div>
</body>

</html>