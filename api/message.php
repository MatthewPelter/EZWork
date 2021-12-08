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

$sender = $_SESSION['user_id'];
$postBody = file_get_contents("php://input");
$postBody = json_decode($postBody);

$body = $postBody->body;
$receiver = $postBody->receiver;

$body = securityscan($body);
$receiver = securityscan($receiver);
// i am stupid and made you send a username instead of a user id and im too lazy to fix it. now I have to convert username to a id. im dumb 
$id = mysqli_query($conn, "SELECT id FROM clients WHERE username='$receiver'");
$getID = mysqli_fetch_assoc($id);
$getID = $getID['id'];

if (strlen($body) > 100) {
    die('{ "Error": "Message too long!" }');
}

if ($body == null || $body == "") {
    die('{ "Error": "Message body cannot be empty!" }');
}
if ($receiver == null) {
    die('{ "Error": "Missing receiver!" }');
}
if ($sender == null) {
    die('{ "Error": "Missing Sender!" }');
}

if (isset($postBody->jobID)) {
    $jobID = $postBody->jobID;
    $jobID = securityscan($jobID);
    $query = mysqli_query($conn, "INSERT INTO messages(body, sender, receiver, isread, jobID, response) VALUES('$body', '$sender', '$getID', 0, '$jobID', NULL)") or die(mysqli_errno($conn));
} else {
    $query = mysqli_query($conn, "INSERT INTO messages(body, sender, receiver, isread, jobID, response) VALUES('$body', '$sender', '$getID', 0, NULL, NULL)") or die(mysqli_errno($conn));
}

if ($query) {
    date_default_timezone_set("America/New_York");
    $date = date('Y-m-d H:i:s');
    if ($jobID != NULL) {
        $sendNotification = mysqli_query($conn, "INSERT INTO notifications (type, receiver, sender, isRead, sentAt) VALUES ('r', '$getID', '$sender', 0, '$date')") or die(mysqli_errno($conn));
    } else {
        $sendNotification = mysqli_query($conn, "INSERT INTO notifications (type, receiver, sender, isRead, sentAt) VALUES ('m', '$getID', '$sender', 0, '$date')") or die(mysqli_errno($conn));
    }

    echo '{ "Success": "Message Sent!" }';
} else {
    echo '{ "Error": "Query Failed" }';
}
