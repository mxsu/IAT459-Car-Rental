<?php

require('../includes/connect-db.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$id = $_GET['id'];

// Prepare the SQL query to fetch the first car of the specified body type
$query = "SELECT * FROM `car` c 
JOIN `car specifications` cs ON c.`Car Code` = cs.`Car Code` 
WHERE c.id = ? LIMIT 1";


// Initialize the prepared statement
$stmt = mysqli_prepare($conn, $query);

// Bind the parameter (id)
mysqli_stmt_bind_param($stmt, "i", $id);

// Execute the statement
mysqli_stmt_execute($stmt);


// Get the result
$result = mysqli_stmt_get_result($stmt);

// Fetch the first car
$car = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Cars</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<nav>
    <ul style="list-style-type: none; margin: 0; padding: 0; overflow: hidden; background-color: #333;">
        <li style="float: left;">
            <a href="index.php" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Home</a>
        </li>

        <li style="float: right;">
            <a href="signin.php" style="display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none;">Sign In</a>
        </li>
    </ul>
</nav>

<body>

    <div class="container">

        <div class="car-select">
            <?php if ($car) {
                // Display the car details
                echo "<div class='car-details'>";
                echo "<h2>" . htmlspecialchars($car['Manufacturer']) . "</h2>";
                echo "<h2>" . htmlspecialchars($car['Model']) . "</h2>";
                echo "<p>Seats: " . htmlspecialchars($car['Seating']) . "</p>";
                echo "<p>Fuel Type: " . htmlspecialchars($car['Fuel Type']) . "</p>";
                echo "<p><a href='reserve.php?id=" . $car['id'] . "'>Reserve this car</a></p>";
                echo "</div>";
            } else {
                echo "<p>No cars found for the selected body type.</p>";
            }
            ?>
        </div>
        <div class="checkout-container">
            <form action="checkout.php" method="post">
                <h3>Enter Your Details</h3>
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
                <br>
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
                <br>
                <label for="phone_number">Phone Number:</label>
                <input type="tel" id="phone_number" name="phone_number" required>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <button type="submit">Proceed to Checkout</button>
            </form>
        </div>
        <div class="checkout-container">
            <form action="process-payment.php" method="post">
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
                <button type="submit">Submit Payment</button>
            </form>
        </div>
        <div class="checkout-container">
            <form>
                <label>
                    <input type="checkbox"> Terms and conditions
                </label>
                <br>
                </label>
                <br>
                <button type="submit">Reserve</button>
            </form>
        </div>
    </div>
    </div>
</body>

</html>