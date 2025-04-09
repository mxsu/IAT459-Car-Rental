<?php
require('../includes/connect-db.php');
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['car-code'] = $_POST['car-code'];
} else {
    echo " No POST data received from filter-cars.php.";
}

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

$_SESSION['car'] = $car;

// print_r($_SESSION['car']);
mysqli_close($conn);
