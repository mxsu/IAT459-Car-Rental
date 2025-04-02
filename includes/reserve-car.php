<?php

require('../includes/connect-db.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$id = $_GET['id'];

// Prepare the SQL query to fetch the first car of the specified body type
$query = "SELECT * FROM `car` c 
JOIN `car specifications` cs ON c.`Car Code` = cs.`Car Code` 
WHERE c.id = ? LIMIT 1";


// Initialize the prepared statement
$stmt = mysqli_prepare($conn, $query);

// Bind the parameter (id)
mysqli_stmt_bind_param($stmt, "i", $id);

// Execute the statement
mysqli_stmt_execute($stmt);


// Get the result
$result = mysqli_stmt_get_result($stmt);

// Fetch the first car
$car = mysqli_fetch_assoc($result);
