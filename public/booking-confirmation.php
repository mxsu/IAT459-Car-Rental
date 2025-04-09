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
    require('../includes/booking-process.php');
    ?>
</head>


<body>
    <?php
    require('../includes/reserve-car.php');
    // require('../includes/detail-process.php');
    $car = $_SESSION['car'];
    require('../includes/connect-db.php');
    $conn = mysqli_connect($servername, $username, $password, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    ?>
    <h1>Booking Confirmation</h1>
    <p>Thank you for your booking!</p>
    <p>Your booking details are as follows:</p>
    <ul>
        <li><strong>Booking ID:</strong> <?= htmlspecialchars($_SESSION['booking_id']) ?></li>
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
        <li><strong>Payment ID:</strong> <?= htmlspecialchars($_SESSION['payment_id']) ?> </li>
    </ul>

    <p>If you have any questions, please contact us.</p>

    <form action="index.php" method="POST">
        <button type="submit">Back to Home</button>
    </form>

</body>

</html>