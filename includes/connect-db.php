<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "car_rental";

// $servername = "localhost";
// $username = "customer";
// $password = "BE!@iA!npa[74@Xp";
// $db = "car_rental";

$mysqli = new mysqli($servername, $username, $password, $db);

if ($mysqli->connect_errno) {
    die("connection error: " . $mysqli->connect_error);
}


return $mysqli;
