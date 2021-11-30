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


if (isset($_SESSION['user_id']) && isset($_POST['card'])) {
    if (empty($_POST['card'])) {
        die("Error: Missing Data");
    }

    $user_id = $_SESSION['user_id'];
    $card = securityscan($_POST['card']);
    $setCard = mysqli_query($conn, "UPDATE clients SET card = '$card' WHERE id='$user_id'") or die(mysqli_errno($conn));
    if ($setCard) {
        echo "Success: Card Set!";
    } else {
        echo "We could not set your card. Try again.";
    }
} else {
    die("Fatal Error");
}
