<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Cars</title>
    <link rel="stylesheet" href="../css/styles.css">
    <?php
    include("../includes/navbar.php");
    ?>
</head>


<body class="column-50-50">
    <?php
    require('../includes/reserve-car.php');
    ?>


    <?php if ($car) {
        // Display the car details
        echo "<h2>" . htmlspecialchars($car['Manufacturer']) . "</h2>";
        echo "<h2>" . htmlspecialchars($car['Model']) . "</h2>";
        echo "<p>Seats: " . htmlspecialchars($car['Seating']) . "</p>";
        echo "<p>Fuel Type: " . htmlspecialchars($car['Fuel Type']) . "</p>";
    } else {
        echo "<p>No cars found for the selected body type.</p>";
    }
    ?>



    <form action="../includes/reserve-process.php" method="post">
        <h3>Enter Your Details</h3>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo isset($_SESSION['first_name']) ? htmlspecialchars($_SESSION['first_name']) : ''; ?>" required>
        <br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>
        <br>
        <!-- <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number" required>
        <br> -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <!-- <button type="submit">Proceed to Checkout</button> -->

        <h3>Payment Details</h3>
        <label for="card_name">Name on Card:</label>
        <input type="text" id="card_name" name="card_name" required>
        <br>
        <label for="card_number">Card Number:</label>
        <input type="text" id="card_number" name="card_number" pattern="\d{16}" maxlength="16" required>
        <br>
        <label for="expiry_date">Expiry Date:</label>
        <input type="month" id="expiry_date" name="expiry_date" required>
        <br>
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" pattern="\d{3}" maxlength="3" required>
        <br>
        <!-- <button type="submit">Submit Payment</button> -->

        <label>
            <input type="checkbox"> Terms and conditions
        </label>
        <p>By checking this box, you agree to our terms and conditions, including our privacy policy and rental agreement.</p>
        <br>
        <button type="submit">Reserve</button>
    </form>

    <a href="booking-confirmation.php" class="button">Next Page</a>

</body>

</html>