<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['card_name'] = $_POST['card_name'];
    $_SESSION['expiry_date'] = $_POST['expiry_date'];
    $_SESSION['cvv'] = $_POST['cvv'];
}
header("Location: ../public/booking-confirmation.php");
exit;
