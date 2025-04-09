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
    $conn = mysqli_connect($servername, $username, $password, $db);

    $image_path = "../images/default-car.jpg";
    $carCode = $car['Car Code'] ?? ''; // Get car code safely

    if (strpos($carCode, "Toyota_Corolla") !== false) {
        $image_path = "../images/toyota-corolla-sedan-2019-520018.jpg";
    } elseif (strpos($carCode, "Toyota_Prius") !== false) {
        $image_path = "../images/prius.jpg";
    } elseif (strpos($carCode, "Ford_Mustang") !== false) {
        $image_path = "../images/mustang.jpg";
    } elseif (strpos($carCode, "Dodge_Caravan") !== false) {
        $image_path = "../images/dodge_caravan.jpg";
    } elseif (strpos($carCode, "Toyota_Sienna") !== false) {
        $image_path = "../images/toyota_sienna.png";
    } elseif (strpos($carCode, "Ford_Escape") !== false) {
        $image_path = "../images/ford_escape.png";
    } elseif (strpos($carCode, "Ford_F150") !== false) {
        $image_path = "../images/fordf150.png";
    } elseif (strpos($carCode, "Ford_Transit") !== false) {
        $image_path = "../images/ford_transit.png";
    } elseif (strpos($carCode, "Volkswagen_Jetta") !== false) {
        $image_path = "../images/volkswagen_jetta.png";
    } elseif (strpos($carCode, "Ford_Focus") !== false) {
        $image_path = "../images/ford_focus.png";
    } elseif (strpos($carCode, "Hyundai_Ionic") !== false) {
        $image_path = "../images/ionic5.png";
    } elseif (strpos($carCode, "Ford_Lightning") !== false) {
        $image_path = "../images/ford_f150lightning.png";
    } elseif (strpos($carCode, "Nissan_Leaf") !== false) {
        $image_path = "../images/nissan_leaf.png";
    }

    $car['Image'] = $image_path; // ✅ Set it for use in the HTML later
    ?>

    <div class="booking-container">
        <div class="booking-summary">
            <h1>Booking Confirmation</h1>
            <p>Thank you for your booking!</p>
            <p>Your booking details are as follows:</p>
            <br>
            <?php if (!empty($car['Image'])): ?>
                <img src="<?= htmlspecialchars($car['Image']) ?>" alt="Car Image">
            <?php endif; ?>
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
            <br>
            <form action="index.php" method="POST">
                <button type="submit">Back to Home</button>
            </form>
        </div>
    </div>



</body>

</html>