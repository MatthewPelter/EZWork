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

if (isset($_SESSION['user_id']) && isset($_POST['avatar_link'])) {
    if (empty($_POST['avatar_link'])) {
        die("Avatar Link not set");
    }

    $user_id = $_SESSION['user_id'];
    $link = securityscan($_POST['avatar_link']);
    $setAvatar = mysqli_query($conn, "UPDATE clients SET avatar = '$link' WHERE id='$user_id'") or die(mysqli_errno($conn));
    if ($setAvatar) {
        echo "Avatar has been set!";
    } else {
        echo "We could not set your avatar. Try again.";
    }
} else {
    echo "ERROR";
}
