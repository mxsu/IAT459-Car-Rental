<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['coverage'] = $_POST['coverage'];
    if ($_SESSION['coverage'] == 'none') {
        $_SESSION['insurance-price'] = 0;
    }
    if ($_SESSSION['coverage'] == 'basic') {
        $_SESSION['insurance-price'] = 25;
    }
    if ($_SESSION['coverage'] == 'full') {
        $_SESSION['insurance-price'] = 42;
    }
    $_SESSION['total-insurance'] = $_SESSION['insurance-price'] * $_SESSION['total-days'];
}
header("Location: ../public/payment.php");
exit();
