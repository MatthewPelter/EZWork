<?php
session_start();
require_once("../classes/DB.php");

function securityscan($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if (isset($_SESSION['user_id']) && isset($_POST['rate']) && isset($_POST['ratee'])) {
    if (empty($_POST['rate']) || empty($_POST['ratee'])) {
        die("Error: Missing Data");
    }

    $user_id = $_SESSION['user_id'];
    $rate = securityscan($_POST['rate']);
    $ratee = securityscan($_POST['ratee']);

    $setRating = mysqli_query($conn, "INSERT INTO ratings(rater, ratee, rating) VALUES('$user_id', '$ratee', '$rate')") or die(mysqli_error($conn));
    if ($setRating) {
        echo "Success!";
    } else {
        die("Error");
    }
} else {
    die("Fatal Error");
}
