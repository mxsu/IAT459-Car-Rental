<?php
// booking-confirmation-process.php
require('../includes/connect-db.php');


$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// insert into booking table: email, car_code, location, start date, end date, coverage, total_price
$email = $_SESSION['email'];
$car_code = $_SESSION['car-code'];
$location = $_SESSION['location'];
$start_date = $_SESSION['start-date'];
$end_date = $_SESSION['end-date'];
$coverage = $_SESSION['coverage'];
$total_price = $_SESSION['total-price'];

// if email and car code are in a stored booking then booking should fail
$check_booking_query = "SELECT `Booking ID` FROM booking WHERE email = ? AND `Car Code` = ?";
$stmt_check = $conn->prepare($check_booking_query);
$stmt_check->bind_param("ss", $_SESSION['email'], $_SESSION['car-code']);
$stmt_check->execute();
$stmt_check->store_result();

// if ($stmt_check->num_rows > 0) {
//     $_SESSION['booking_error'] = "You already have a booking!";
// } else {
// Insert booking query
$booking_query = "INSERT INTO booking (email, `Car Code`, `Location`, `Start Date`, `End Date`, Coverage) VALUES(?, ?, ?, ?, ?, ?)";
$book_stmt = $conn->prepare($booking_query);
$book_stmt->bind_param("sssssd", $email, $car_code, $location, $start_date, $end_date, $coverage);

if ($book_stmt->execute()) {
    // Get the auto-incremented Booking ID
    $booking_id = $conn->insert_id;  // This will give you the last inserted ID
    $_SESSION['booking_success'] = "Booking successfully recorded with ID: " . $booking_id;
} else {
    $_SESSION['booking_error'] = "Error: " . $book_stmt->error;
}
$book_stmt->close();

// Store the booking ID in the session for future use
$_SESSION['booking_id'] = $booking_id;  // Save the ID to the session

// Insert into payments table
$pay_query = "INSERT INTO payment (`payment_date`, `payment_total`, `booking_id`) VALUES (CURRENT_DATE, ?, ?)";
$pay_stmt = $conn->prepare($pay_query);
$pay_stmt->bind_param("ds", $total_price, $_SESSION['booking_id']);  // Using the session value for the booking ID

if ($pay_stmt->execute()) {
    // Get the auto-incremented payment ID
    $payment_id = $conn->insert_id;  // This will give you the last inserted payment ID
    $_SESSION['payment_success'] = "Payment successfully recorded with Payment ID: " . $payment_id;
} else {
    $_SESSION['payment_error'] = "Error: " . $pay_stmt->error;
}

$pay_stmt->close();

$_SESSION['payment_id'] = $payment_id;  // Save the payment ID to the session

// Close the connection
$conn->close();
