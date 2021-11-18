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

if (isset($_POST['jobID'])) {
    $jobID = securityscan($_POST['jobID']);
} else {
    $jobID = NULL;
}

$id = mysqli_query($conn, "SELECT id FROM clients WHERE username='$receiver'");
$getID = mysqli_fetch_assoc($id);
$getID = $getID['id'];

if (strlen($body) > 100) {
    echo '{ "Error": "Message too long!"}';
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

$query = mysqli_query($conn, "INSERT INTO messages(body, sender, receiver, isread, jobID) VALUES('$body', '$sender', '$getID', 0, '$jobID')") or die(mysqli_errno($conn));
echo '{ "Success": "Message Sent!" }';
