<?php
require('../includes/connect-db.php');
session_start();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get location from session and escape it for security
$location = $_SESSION['location'] ?? ''; // Get location from session
if (empty($location)) {
    echo "Location is not set in the session.";
    exit;
}
$location = mysqli_real_escape_string($conn, $location);

// Pagination settings
$limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 4;
$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
$offset = ($page - 1) * $limit;

$searchTerm = isset($_POST['search']) ? mysqli_real_escape_string($conn, $_POST['search']) : '';

// Start base query
$query = "
    SELECT cs.Manufacturer, cs.Model, cs.`Body Type`, cs.`Drive Train`, cs.`Fuel Type`, 
           cs.`Car Code`, cs.daily_price, cs.Seating, cs.Mileage 
    FROM `car specifications` AS cs 
    JOIN car AS c ON cs.`Car Code` = c.`Car Code` 
    WHERE c.Location = '$location'
";

// Apply search condition if there's a search term
if (!empty($searchTerm)) {
    $query .= " AND (cs.Manufacturer LIKE '%$searchTerm%' OR cs.Model LIKE '%$searchTerm%')";
}

// Apply other filters as usual (body type, fuel type, seats, etc.)
if (isset($_POST['body_type']) && !empty($_POST['body_type'])) {
    $bodyTypes = implode("','", array_map(function ($item) use ($conn) {
        return mysqli_real_escape_string($conn, $item);
    }, $_POST['body_type']));
    $query .= " AND cs.`Body Type` IN ('$bodyTypes')";
}

if (isset($_POST['fuel_type']) && !empty($_POST['fuel_type'])) {
    $fuelTypes = implode("','", array_map(function ($item) use ($conn) {
        return mysqli_real_escape_string($conn, $item);
    }, $_POST['fuel_type']));
    $query .= " AND cs.`Fuel Type` IN ('$fuelTypes')";
}

if (isset($_POST['seats']) && !empty($_POST['seats'])) {
    $seatConditions = [];
    foreach ($_POST['seats'] as $seat) {
        if ($seat === "6+") {
            $seatConditions[] = "cs.Seating > 6";
        } else {
            $seatConditions[] = "cs.Seating = '$seat'";
        }
    }
    $query .= " AND (" . implode(" OR ", $seatConditions) . ")";
}

// Add LIMIT and OFFSET for pagination
$query .= " LIMIT $limit OFFSET $offset";

// Execute the query to fetch cars
$result = mysqli_query($conn, $query);

// Display cars
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $image_path = "../images/default-car.jpg"; // Default image
        if (strpos($row['Car Code'], "Toyota_Corolla") !== false) {
            $image_path = "../images/toyota-corolla-sedan-2019-520018.jpg";
        } elseif (strpos($row['Car Code'], "Toyota_Prius") !== false) {
            $image_path = "../images/prius.jpg";
        } elseif (strpos($row['Car Code'], "Ford_Mustang") !== false) {
            $image_path = "../images/mustang.jpg";
        } elseif (strpos($row['Car Code'], "Dodge_Caravan") !== false) {
            $image_path = "../images/dodge_caravan.jpg";
        } elseif (strpos($row['Car Code'], "Toyota_Sienna") !== false) {
            $image_path = "../images/toyota_sienna.png";
        }elseif (strpos($row['Car Code'], "Ford_Escape") !== false) {
            $image_path = "../images/ford_escape.png";
        }elseif (strpos($row['Car Code'], "Ford_F150") !== false) {
            $image_path = "../images/fordf150.png";
        }elseif (strpos($row['Car Code'], "Ford_Transit") !== false) {
            $image_path = "../images/ford_transit.png";
        }elseif (strpos($row['Car Code'], "Volkswagen_Jetta") !== false) {
            $image_path = "../images/volkswagen_jetta.png";
        }elseif (strpos($row['Car Code'], "Ford_Focus") !== false) {
            $image_path = "../images/ford_focus.png";
        }elseif (strpos($row['Car Code'], "Hyundai_Ionic") !== false) {
            $image_path = "../images/ionic5.png";
        }elseif (strpos($row['Car Code'], "Ford_Lightning") !== false) {
            $image_path = "../images/ford_f150lightning.png";
        }elseif (strpos($row['Car Code'], "Nissan_Leaf") !== false) {
            $image_path = "../images/nissan_leaf.png";
        }

        echo "
        <div class='card'>
            <img src='$image_path' alt='Card Image'>
            <div class='card-content'>
                <h2 class='card-title'>{$row["Manufacturer"]} {$row["Model"]}</h2>
                <p class='card-text'>{$row["Body Type"]}</p>
                <p class='card-text-small'>
                {$row["Seating"]} Seats <br>
                {$row["Drive Train"]} <br>
                {$row["Fuel Type"]} <br>
                {$row["Mileage"]} KM per day <br>
                </p>
            </div>
            <div class='card-button-section'>
                <div class='card-text'>Price</div>
                <div class='card-title'>{$row["daily_price"]}</div>
                <form action='detail.php' method='POST'>
                    <input type='hidden' name='car-code' value='{$row["Car Code"]}'>
                    <button type='submit' class='card-button'>Pay Now</button>
                </form>
            </div>
        </div>";
    }
} else {
    echo "<p>No cars match your filters.</p>";
}

// Pagination buttons
if ($result) {
    // Get total number of cars for pagination
    $count_query = "
    SELECT COUNT(*) AS total 
    FROM `car specifications` AS cs 
    JOIN car AS c ON c.`Car Code` = cs.`Car Code`
    WHERE c.Location = '$location'
";

    // Apply the same search condition to the count query
    if (!empty($searchTerm)) {
        $count_query .= " AND (cs.Manufacturer LIKE '%$searchTerm%' OR cs.Model LIKE '%$searchTerm%')";
    }

    // Apply other filters to the count query
    if (isset($_POST['body_type']) && !empty($_POST['body_type'])) {
        $bodyTypes = implode("','", array_map(function ($item) use ($conn) {
            return mysqli_real_escape_string($conn, $item);
        }, $_POST['body_type']));
        $count_query .= " AND cs.`Body Type` IN ('$bodyTypes')";
    }

    if (isset($_POST['fuel_type']) && !empty($_POST['fuel_type'])) {
        $fuelTypes = implode("','", array_map(function ($item) use ($conn) {
            return mysqli_real_escape_string($conn, $item);
        }, $_POST['fuel_type']));
        $count_query .= " AND cs.`Fuel Type` IN ('$fuelTypes')";
    }

    if (isset($_POST['seats']) && !empty($_POST['seats'])) {
        $seatConditions = [];
        foreach ($_POST['seats'] as $seat) {
            if ($seat === "6+") {
                $seatConditions[] = "Seating > 6";
            } else {
                $seatConditions[] = "Seating = '$seat'";
            }
        }
        $count_query .= " AND (" . implode(" OR ", $seatConditions) . ")";
    }

    // Execute the count query
    $count_result = mysqli_query($conn, $count_query);
    $row = mysqli_fetch_assoc($count_result);
    $total_rows = $row['total'];

    // Calculate total pages for pagination
    $total_pages = ceil($total_rows / $limit);

    // Display pagination buttons
    if ($total_pages > 1) {
        echo "<div class='pagination'>";
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<button class='pagination-btn' data-page='$i'>$i</button>";
        }
        echo "</div>";
    }
}

mysqli_close($conn);
