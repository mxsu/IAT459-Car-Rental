<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['location'] = $_POST['browse'];
    $_SESSION['start-date'] = $_POST['start-date'];
    $_SESSION['end-date'] = $_POST['end-date'];
}

header("Location: ../public/browse.php");
exit();
