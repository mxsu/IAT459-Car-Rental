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

                // $car['Image'] = $image_path; 

                // Display the image
                echo "<img src='$image_path' alt='" . htmlspecialchars($car['Model']) . "' class='car-image-detail'>";

                // Car details in two columns
                echo "<div class='car-details-detail'>";
                echo "<div class='car-detail'>";
                echo "<p><strong>Seats:</strong> " . htmlspecialchars($car['Seating']) . "</p>";
                echo "<p><strong>Fuel Type:</strong> " . htmlspecialchars($car['Fuel Type']) . "</p>";
                echo "<p><strong>Daily Price:</strong> " . htmlspecialchars($car['daily_price']) . "</p>";
                echo "<p><strong>Drive Train:</strong> " . htmlspecialchars($car['Drive Train']) . "</p>";
                echo "<div class='car-detail'>";
                echo "<p><strong>Daily Mileage Allowance:</strong> " . htmlspecialchars($car['Mileage']) . "</p>";
                echo "</div>";
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
                <label for="basic"> Basic. $50.00 a day </label><br>

                <input type="radio" id="full" name="coverage" value="full">
                <label for="full"> Full Coverage. $100.00 a day </label><br>

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