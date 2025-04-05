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

    <div class="">
        <div class="">
            <?php if ($car) {
                // Display the car details
                echo "<h2>" . "Selected Car" . "</h2>";
                echo "<h3>" . htmlspecialchars($car['Manufacturer']) . " " . htmlspecialchars($car['Model']) . "</h3>";
                echo "<p>Seats: " . htmlspecialchars($car['Seating']) . "</p>";
                echo "<p>Fuel Type: " . htmlspecialchars($car['Fuel Type']) . "</p>";
                echo "<p>Daily Price: " . htmlspecialchars($car['daily_price']) . "</p>";
                echo "<p>Daily Mileage Allowance: " . htmlspecialchars($car['Mileage']) . "</p>";
                echo "<br>";
                echo "</div>";
            } else {
                echo "<p>No cars found for the selected car Code.</p>";
            }
            ?>
        </div>

        <div class="left-filter">
            <form action="../includes/detail-process.php" method="post">
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
        document.getElementById("filter-form").addEventListener("submit", function(event) {
            // Check if a radio button is selected
            if (!document.querySelector('input[name="coverage"]:checked')) {
                alert("Please select a coverage option to proceed.");
                event.preventDefault(); // Prevent the form from submitting
            }
        });
    </script>
</body>

</html>