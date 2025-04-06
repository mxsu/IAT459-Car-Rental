<?php
//We need to get the Booking ID from database and diplay it here?
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Marine Drive Rental</title>
    <link rel="stylesheet" href="https://cdn.jsDeliver.net/npm/water.css/out/water.min.css" />
    <?php
    include("../includes/navbar.php");
    ?>
</head>


<body>
    <?php
    require('../includes/reserve-car.php');
    $car = $_SESSION['car'];
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

    //removed total price to pay_query
    $booking_query = "INSERT INTO booking (`Booking ID`,email,`Car Code`, Location, `Start Date`, `End Date`, Coverage,) VALUES(FLOOR(RAND() * 90000000) + 10000000 ,?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($booking_query);
    $stmt->bind_param("ssssssd", $email, $car_code, $location, $start_date, $end_date, $coverage);

    // $pay_query = "INSERT INTO booking (`payment_date`,`payment_id`,`payment_total`) VALUES(CURRENT_DATE, FLOOR(RAND() * 90000000) + 10000000 ,?)";
    // $stmt = $conn->prepare($pay_query);
    // $stmt->bind_param("d", $total_price);

    if ($stmt->execute()) {
        echo "Booking successfully recorded";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
    ?>
    <h1>Booking Confirmation</h1>
    <p>Thank you for your booking!</p>
    <p>Your booking details are as follows:</p>
    <ul>
        <li><strong>Booking ID:</strong></li>
        <li><strong>First Name:</strong> <?= htmlspecialchars($_SESSION['first_name']) ?></li>
        <li><strong>Last Name:</strong> <?= htmlspecialchars($_SESSION['last_name']) ?></li>
        <li><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email']) ?></li>
        <li><strong>Car Model:</strong>
            <?= htmlspecialchars($car['Manufacturer'] . " " . $car['Model']) ?></li>
        <li><strong>Location:</strong> <?= htmlspecialchars($_SESSION['location']) ?></li>
        <li><strong>Pick Up Date:</strong> <?= htmlspecialchars($_SESSION['start-date']) ?></li>
        <li><strong>Return Date:</strong> <?= htmlspecialchars($_SESSION['end-date']) ?></li>
        <li><strong>Coverage:</strong> <?= htmlspecialchars($_SESSION['coverage']) ?></li>
        <li><strong>Total Price: $</strong> <?= htmlspecialchars($_SESSION['total-price']) ?></li>
        <li><strong>Payment ID:</strong></li>
    </ul>

    <p>If you have any questions, please contact us.</p>

    <form>
        <button type="submit">Back to Home</button>
    </form>

</body>

</html>