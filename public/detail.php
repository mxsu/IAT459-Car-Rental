<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Cars</title>
    <?php
    include("../includes/navbar.php");
    include('../includes/filter-car-process.php');
    $car = $_SESSION['car'] ?? null; // Get the car details from the session
    ?>
</head>

<body>

    <div class="container-detail">
        <div class="car-info-detail">
            <?php if ($car) {
                // Display the car details
                echo "<h2>" . "Selected Car" . "</h2>";
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

                // Display the image
                echo "<img src='$image_path' alt='" . htmlspecialchars($car['Model']) . "' class='car-image-detail'>";

                // Car details in two columns
                echo "<div class='car-details-detail'>";
                echo "<div class='car-detail'>";
                echo "<p><strong>Seats:</strong> " . htmlspecialchars($car['Seating']) . "</p>";
                echo "<p><strong>Fuel Type:</strong> " . htmlspecialchars($car['Fuel Type']) . "</p>";
                echo "<p><strong>Daily Price:</strong> " . htmlspecialchars($car['daily_price']) . "</p>";
                echo "</div>";
                echo "<div class='car-detail'>";
                echo "<p><strong>Daily Mileage Allowance:</strong> " . htmlspecialchars($car['Mileage']) . "</p>";
                echo "</div>";
                echo "</div>"; // End car-details
                echo "<br>";
            } else {
                echo "<p>No cars found for the selected car Code.</p>";
            }
            ?>
        </div>

        <div class="coverage-options-detail">
            <form action="../includes/detail-process.php" method="post" id="coverage-form">
                <h3>Select Coverage Option</h3>

                <!-- Radio buttons for coverage options -->
                <input type="radio" id="no" name="coverage" value="none">
                <label for="no"> No Coverage. $0.00</label><br>

                <input type="radio" id="basic" name="coverage" value="basic">
                <label for="basic"> Basic. $25.00 a day </label><br>

                <input type="radio" id="full" name="coverage" value="full">
                <label for="full"> Full Coverage. $42.00 a day </label><br>

                <button type="submit">Reserve</button>
            </form>
        </div>
    </div>

    <script>
        // Validate form submission
        document.getElementById("coverage-form").addEventListener("submit", function(event) {
            // Check if a radio button is selected
            if (!document.querySelector('input[name="coverage"]:checked')) {
                alert("Please select a coverage option to proceed.");
                event.preventDefault(); // Prevent the form from submitting
            }
        });
    </script>
</body>

</html>