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


if (isset($_SESSION['user_id']) && isset($_POST['funds'])) {
    if (empty($_POST['funds'])) {
        die("Error: Missing Data");
    }

    $user_id = $_SESSION['user_id'];
    $funds = securityscan($_POST['funds']);
    $setFunds = mysqli_query($conn, "UPDATE clients SET funds = funds + '$funds' WHERE id='$user_id'") or die(mysqli_errno($conn));
    if ($setFunds) {
        echo "Funds were successfully added!";
    } else {
        echo "We could not set your funds. Try again.";
    }
} else {
    die("Fatal Error");
}
