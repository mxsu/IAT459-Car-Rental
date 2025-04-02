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
    <h1>Booking Confirmation</h1>
    <p>Thank you for your booking!</p>
    <p>Your booking details are as follows:</p>
    <ul>
        <li><strong>First Name:</strong> <?= htmlspecialchars($_SESSION['first_name']) ?></li>
        <li><strong>Last Name:</strong> <?= htmlspecialchars($_SESSION['last_name']) ?></li>
        <li><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email']) ?></li>
        <li><strong>Car Model:</strong> <?= htmlspecialchars($_SESSION['car_model']) ?></li>
        <li><strong>Location:</strong> <?= htmlspecialchars($_SESSION['location']) ?></li>
        <li><strong>Pick Up Date:</strong> <?= htmlspecialchars($_SESSION['start-date']) ?></li>
        <li><strong>Return Date:</strong> <?= htmlspecialchars($_SESSION['end-date']) ?></li>
    </ul>

    <p>If you have any questions, please contact us.</p>

    <button onclick="window.location.href='index.php'">Back to Home</button>
</body>

</html>