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

if (!isset($_SESSION['user_id'])) {
    die('{ "Error": "Invalid Authorization" }');
}

$input = file_get_contents("php://input");
$input = json_decode($input);

$notificationID = $input->notificationID;
$notificationID = securityscan($notificationID);

$notificationCheck = mysqli_query($conn, "SELECT receiver FROM notifications WHERE id='$notificationID'");
$notificationCheck = mysqli_fetch_assoc($notificationCheck);
$notificationCheck = $notificationCheck['receiver'];

if ($notificationCheck != $_SESSION['user_id']) {
    die('{ "Error": "This notification was not sent to you" }');
}


$query = mysqli_query($conn, "UPDATE notifications SET isRead = 1 WHERE id='$notificationID'") or die(mysqli_error($conn));

if ($query) {
    echo '{ "Success": "Notification set to read!" }';
} else {
    echo '{ "Error": "Query Failed" }';
}
