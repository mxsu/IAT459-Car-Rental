<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Cars</title>
    <link rel="stylesheet" href="../css/styles.css">
    <?php include("../includes/navbar.php"); ?>

</head>

<body class="column-50-50">
    <?php
    require('../includes/reserve-car.php');
    $car = $_SESSION['car'];
    // print_r($car);
    ?>
    <div class="grid-container-payment">
        <!-- Left column with 3 cards -->
        <div class="grid-50-payment">
            <div class="card-payment">
                <h3>Booking Details</h3>
                <p>Location: <?php echo htmlspecialchars($_SESSION['location']); ?></p>
                <p>Pickup Date: <?php echo htmlspecialchars($_SESSION['start-date']); ?></p>
                <p>Return Date: <?php echo htmlspecialchars($_SESSION['end-date']); ?></p>
                <p>Total Days: <?php echo htmlspecialchars($_SESSION['total-days']); ?></p>
            </div>
            <div class="card-payment">
                <h3>Car Details</h3>
                <?php if ($car) {
                    // Display the car details
                    echo "<h3>" . htmlspecialchars($car['Manufacturer']) . " " . htmlspecialchars($car['Model']) . "</h3>";

                    // Assuming you have a way to determine the car image (e.g., based on the car code)
                    $image_path = "../images/default-car.jpg"; // Default image
                    if (strpos($car['Car Code'], "Toyota_Corolla") !== false) {
                        $image_path = "../images/toyota-corolla-sedan-2019-520018.jpg";
                    } elseif (strpos($car['Car Code'], "Toyota_Prius") !== false) {
                        $image_path = "../images/prius.jpg";
                    } elseif (strpos($car['Car Code'], "Ford_Mustang") !== false) {
                        $image_path = "../images/mustang.jpg";
                    } elseif (strpos($car['Car Code'], "Dodge_Caravan") !== false) {
                        $image_path = "../images/dodge_caravan.jpg";
                    } elseif (strpos($car['Car Code'], "Toyota_Sienna") !== false) {
                        $image_path = "../images/toyota_sienna.png";
                    }
                ?>
                    <div class="car-details">
                        <div class="car-info">
                            <p>Seating: <?php echo htmlspecialchars($car['Seating']); ?></p>
                            <p>Body Type: <?php echo htmlspecialchars($car['Body Type']); ?></p>
                            <p>Fuel Type: <?php echo htmlspecialchars($car['Fuel Type']); ?></p>
                            <p>Drive Train: <?php echo htmlspecialchars($car['Drive Train']); ?></p>
                            <p>Daily Mileage Allowance: <?php echo htmlspecialchars($car['Mileage']); ?></p>
                            <p>Daily Car Price: <?php echo htmlspecialchars($car['daily_price']); ?></p>
                            <p><strong>Total Car Price:</strong> <?php echo htmlspecialchars($_SESSION['total-car-price']); ?></p>
                        </div>
                        <div class="car-image">
                            <img src="<?php echo $image_path; ?>" alt="<?php echo htmlspecialchars($car['Model']); ?>" class="car-image-detail" style="width: 100%; height: auto;">
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="card-payment">
                <h3>Insurance</h3>
                <p>Insurance: <?php echo htmlspecialchars($_SESSION['coverage']); ?></p>
                <p>Insurance Price: <?php echo htmlspecialchars($_SESSION['insurance-price']); ?></p>
                <p>Total Price: $<?php echo htmlspecialchars($_SESSION['total-price'] = $_SESSION['total-car-price'] + $_SESSION['insurance-price']); ?></p>
            </div>
        </div>

        <!-- Right column with form -->
        <div class="grid-50-payment">
            <form action="../includes/payment-process.php" method="post">
                <h3>Enter Your Details</h3>
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo isset($_SESSION['first_name']) ? htmlspecialchars($_SESSION['first_name']) : ''; ?>" required>

                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="<?php echo isset($_SESSION['last_name']) ? htmlspecialchars($_SESSION['last_name']) : ''; ?>" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" required>

                <h3>Payment Details</h3>
                <label for="card_name">Name on Card:</label>
                <input type="text" id="card_name" name="card_name" required>

                <label for="card_number">Card Number:</label>
                <input type="text" id="card_number" name="card_number" pattern="\d{16}" maxlength="16" required>

                <label for="expiry_date">Expiry Date:</label>
                <input type="month" id="expiry_date" name="expiry_date" required>

                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" pattern="\d{3}" maxlength="3" required>

                <label>
                    <input type="checkbox" required> Terms and conditions
                </label>

                <p>By checking this box, you agree to our terms and conditions, including our privacy policy and rental agreement.</p>

                <button type="submit">Reserve</button>
            </form>
        </div>
    </div>
</body>

</html>