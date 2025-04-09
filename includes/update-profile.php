<?php
session_start();
include("connect-db.php"); // Include your DB connection

$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    die("You must be logged in to view this page.");
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    // Get the submitted form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_SESSION['email']; // Assuming email is used as a unique identifier for the user

    // Prepare and execute the SQL statement to update the user table (only first and last name)
    $sql_user = "UPDATE user SET `First Name` = ?, `Last Name` = ? WHERE email = ?";
    $stmt_user = $conn->prepare($sql_user);

    // Bind the parameters (first_name, last_name)
    $stmt_user->bind_param("sss", $first_name, $last_name, $email);

    if (!$stmt_user->execute()) {
        $_SESSION['update_error'] = "Error: Unable to update user profile.";
        $stmt_user->close();
        $conn->close();
        header("Location: profile.php");
        exit();
    }

    // Close the statement
    $stmt_user->close();

    // Prepare and execute the SQL statement to update or insert into the driver license table
    // First, check if the email exists in the driver's license table
    $sql_check_license = "SELECT * FROM `members drivers license` WHERE Email = ?";
    $stmt_check_license = $conn->prepare($sql_check_license);
    $stmt_check_license->bind_param("s", $email);
    $stmt_check_license->execute();
    $stmt_check_license->store_result();

    // If the email exists, update the driver's license info
    if ($stmt_check_license->num_rows > 0) {
        // Email exists, update the driver's license info
        $driver_license = $_POST['driver_license'];
        $expdate = $_POST['expiration_date'];
        $expdate = date('Y-m-d', strtotime($expdate));
        $province = $_POST['province'];
        $age = $_POST['age'];

        $sql_license = "UPDATE `members drivers license` SET `DL Number` = ?, `Expiration Date` = ?, Province = ?, Age = ? WHERE Email = ?";
        $stmt_license = $conn->prepare($sql_license);
        $stmt_license->bind_param("issis", $driver_license, $expdate, $province, $age, $email);

        if (!$stmt_license->execute()) {
            $_SESSION['update_error'] = "Error: Unable to update driver license information.";
        } else {
            $_SESSION['update_success'] = "Profile updated successfully!";
        }
        $stmt_license->close();
    } else {
        // Email does not exist, insert the driver's license information
        $driver_license = $_POST['driver_license'];
        $province = $_POST['province'];
        $expdate = $_POST['expiration_date'];
        $expdate = date('Y-m-d', strtotime($expdate));
        $age = $_POST['age'];

        $sql_insert_license = "INSERT INTO `members drivers license` (Email, `DL Number`, `Expiration Date`, Province, Age) VALUES (?, ?, ?, ?, ?)";
        $stmt_insert_license = $conn->prepare($sql_insert_license);
        $stmt_insert_license->bind_param("sissi", $email, $driver_license, $expdate, $province, $age);

        if (!$stmt_insert_license->execute()) {
            $_SESSION['update_error'] = "Error: Unable to insert driver license information.";
        } else {
            $_SESSION['update_success'] = "Profile updated successfully!";
        }
        $stmt_insert_license->close();
    }

    // Close statements
    $stmt_check_license->close();

    // Redirect back to the profile page
    header("Location: ../public/profile.php");
    exit();
}

// Close the database connection
$conn->close();
