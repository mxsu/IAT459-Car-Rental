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

    // Define a mapping array between car codes and image paths
    $carImageMap = [
        "Toyota_Corolla_2023" => "../images/toyota_corolla.png",
        "Toyota_Prius_2023" => "../images/prius.jpg",
        "Ford_Mustang_2020" => "../images/mustang.jpg",
        "Dodge_Caravan_2023" => "../images/dodge_caravan.jpg",
        "Toyota_Sienna_2023" => "../images/toyota_sienna.png",
        "Ford_Escape_2025" => "../images/ford_escape.png",
        "Ford_EscapeHybrid_2025" => "../images/ford_escape.png",
        "Ford_F150_2020" => "../images/fordf150.png",
        "Ford_Transit_2023" => "../images/ford_transit.png",
        "Volkswagen_Jetta_2022" => "../images/volkswagen_jetta.png",
        "Ford_Focus_2022" => "../images/ford_focus.png",
        "Hyundai_Ionic5_2024" => "../images/ionic5.png",
        "Ford_Lightning_2024" => "../images/ford_f150lightning.png",
        "Nissan_Leaf_2024" => "../images/nissan_leaf.png",
    ];

    // Check each possible car code
    foreach ($carImageMap as $code => $path) {
        if (strpos($carCode, $code) !== false) {
            $image_path = $path;
            break; // Stop checking once we find a match
        }
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