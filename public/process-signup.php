<?php
// Tutorial used
// https://www.youtube.com/watch?v=5L9UhOnuos0


session_start(); // Start session
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION["form_data"] = $_POST; // Store form inputs in session
}
//CHECK FORM FOR VALIDITY AND FILLED OUT
if (empty($_POST["first-name"] || $_POST["last-name"])) {
    header("Location: signup.php");
    die("Name is required");
}
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    header("Location: signup.php");
    die("Valid email is required");
}
if (strlen($_POST["password"]) < 8) {
    header("Location: signup.php");
    die("Password must be at least 8 characters long");
}
if (! preg_match("/[a-z]/i", $_POST["password"])) {
    header("Location: signup.php");
    die("Password must contain at least one letter");
}
if (! preg_match("/[0-9]/", $_POST["password"])) {
    header("Location: signup.php");
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    header("Location: signup.php");
    die("Passwords do not match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$role = "member";

$mysqli = require("../includes/connect-db.php");

//EMAIL CHECK
$sql_check = "SELECT email FROM `user` WHERE email = ?";
$stmt_check = $mysqli->prepare($sql_check);

if (!$stmt_check) {
    die("SQL error: " . $mysqli->error);
}

$stmt_check->bind_param("s", $_POST["email"]);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    die("Email already taken");
}

$stmt_check->close();


//SQL insertion
$sql = "INSERT INTO `user` (`email`, `first name`, `last name`, `password`, `role`) VALUES (?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

if (! $stmt->prepare($sql)) {
    die("SQL error:" . $mysqli->error);
}

$stmt->bind_param(
    "sssss",
    $_POST["email"],
    $_POST["first-name"],
    $_POST["last-name"],
    $password_hash,
    $role
);

if ($stmt->execute()) {
    header("Location: signup-success.php");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("email already taken");
    }
    die($mysqli->error . " " . $stmt->errno);
}


// print_r($_POST);
// var_dump($password_hash);
