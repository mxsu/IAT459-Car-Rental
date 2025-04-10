<?php
include("../includes/connect-db.php");

// SQL Query to fetch all booking history for the logged-in user
$sql = "SELECT `Booking ID`, `Car Code`, `Location`, `Start Date`, `End Date` FROM booking WHERE email = ? ORDER BY `Start Date` ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['email']); // Bind the email from the session

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<div class='card-container-history'>"; // Container for all cards

    // Fetch and display rows
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card-history' id='booking-" . $row['Booking ID'] . "'>"; // Start each card

        // Loop through each field in the row and display the data in a card
        foreach ($row as $key => $value) {
            echo "<div class='card-item-history'>";
            echo "<strong>" . htmlspecialchars($key) . ":</strong> " . htmlspecialchars($value);
            echo "</div>";
        }

        // Add the Cancel Booking button
        $booking_id = htmlspecialchars($row['Booking ID']);
        echo "<form action='' method='POST' class='cancel-booking-form' data-booking-id='$booking_id'>";
        echo "<input type='hidden' name='booking_id' value='$booking_id'>";
        echo "<button type='submit' name='cancel_booking' class='cancel-btn-history'>Cancel Booking</button>";
        echo "</form>";

        echo "</div>"; // End each card
    }

    echo "</div>"; // End card container
} else {
    echo "No records found.";
}


?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // AJAX request to handle the cancellation of booking
    $(document).on('submit', '.cancel-booking-form', function(event) {
        event.preventDefault(); // Prevent default form submission

        var form = $(this);
        var booking_id = form.find('input[name="booking_id"]').val(); // Get the booking ID

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '', // Submit to the same page
            data: {
                cancel_booking: true,
                booking_id: booking_id
            },
            success: function(response) {
                // On success, remove the booking card from the DOM
                $('#booking-' + booking_id).fadeOut();
                alert("Booking canceled successfully!");
            },
            error: function() {
                alert("Error: Unable to cancel the booking.");
            }
        });
    });
</script>

<?php
include("../includes/connect-db.php");

// Handle the form submission to cancel the booking (AJAX)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cancel_booking']) && isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];

    // Start a transaction to ensure both queries are executed together
    $conn->begin_transaction();

    try {
        // SQL query to delete the payment record using the booking_id
        $sql_payment = "DELETE FROM payment WHERE `booking_id` = ?";
        $stmt_payment = $conn->prepare($sql_payment);
        $stmt_payment->bind_param("i", $booking_id); // "i" for integer type

        if (!$stmt_payment->execute()) {
            throw new Exception("Error deleting payment record");
        }

        // SQL query to delete the booking from the database
        $sql_booking = "DELETE FROM booking WHERE `Booking ID` = ?";
        $stmt_booking = $conn->prepare($sql_booking);
        $stmt_booking->bind_param("i", $booking_id); // "i" for integer type

        if (!$stmt_booking->execute()) {
            throw new Exception("Error deleting booking record");
        }

        // Commit the transaction
        $conn->commit();
        echo "success"; // Return success response for AJAX
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $conn->rollback();
        echo "error: " . $e->getMessage(); // Return error response with error message
    }

    // Close prepared statements
    $stmt_payment->close();
    $stmt_booking->close();
}

$conn->close();
