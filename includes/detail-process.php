<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['coverage'] = $_POST['coverage[]'];
}

header("Location: ../public/reserve.php");
exit();
