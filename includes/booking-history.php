<?php
include("../includes/connect-db.php");

// SQL Query to fetch all data
$sql = "SELECT `Booking ID`, `Car Code`, Location, `Start Date`, `End Date`, `Total Price` FROM booking WHERE email = ? ORDER BY `Start Date` ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['email']); // "s" means string type

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>";

    // Fetch column names dynamically
    while ($field = $result->fetch_field()) {
        echo "<th>" . htmlspecialchars($field->name) . "</th>";
    }

    echo "</tr>";

    // Fetch and display rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}




// Close the MySQLi connection
$conn->close();
