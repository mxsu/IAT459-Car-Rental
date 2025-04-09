<?php
require('../includes/connect-db.php');
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

$carCode = $_SESSION['car-code'];  // Or another method to get the car code
$location = $_SESSION['location'];  // Or another method to get the location

// Prepare the query
$query = "SELECT * FROM `car` c 
          JOIN `car specifications` cs ON c.`Car Code` = cs.`Car Code` 
          WHERE c.`Car Code` = ? AND c.Location = ? LIMIT 1";

// Prepare the statement
$stmt = mysqli_prepare($conn, $query);

// Bind the parameters
mysqli_stmt_bind_param($stmt, "ss", $carCode, $location);  // Assuming both carCode and location are strings

// Execute the query
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Fetch the car details
$car = mysqli_fetch_assoc($result);

// Check if the car exists
if ($car) {
    // Do something with the $car data
} else {
    echo "No car found.";
}

$_SESSION['car'] = $car;

$_SESSION['total-car-price'] = $car['daily_price'] * $_SESSION['total-days'];
