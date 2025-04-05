<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['location'] = $_POST['browse'];
    $_SESSION['start-date'] = $_POST['start-date'];
    $_SESSION['end-date'] = $_POST['end-date'];
    $_SESSION['total-days'] = (strtotime($_SESSION['end-date']) - strtotime($_SESSION['start-date'])) / (60 * 60 * 24);
}

header("Location: ../public/browse.php");
exit();
