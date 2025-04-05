<?php

//Not safe to store keys in where ppl can access thru github
// but i aint installing dotenv for this small project

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

// $key = getenv('ENCRYPTION_KEY');
// $iv = getenv('ENCRYPTION_IV');

$key = "cb99cd838d807530795d6396cf1adb74";
$iv = "e5a8fdcfb56d8866512aaea83c481ce1";

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['card_name'] = $_POST['card_name'];
    $_SESSION['expiry_date'] = $_POST['expiry_date'];
    $_SESSION['cvv'] = $_POST['cvv'];

    // $ccNum = $_POST['card_number'];
    // $ccNum = openssl_encrypt($ccNum, 'AES-128-CBC', $key, 0, $iv);
    // echo ' $ccNum ';
    // $_SESSION['card_number'] = $ccNum;
    // $decrypt = openssl_decrypt($ccNum, 'AES-128-CBC', $key, 0, $iv);
    // $lastDigits = substr($decrypt, -4);
    // echo "$lastDigits";
}
header("Location: ../public/booking-confirmation.php");
exit;
