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
    die("{ 'Error': 'Message too long!' }");
}

$sender = $_SESSION['user_id'];
$postBody = file_get_contents("php://input");
$postBody = json_decode($postBody);

$body = $postBody->body;
$receiver = $postBody->receiver;

$body = securityscan($body);
$receiver = securityscan($receiver);

$id = mysqli_query($conn, "SELECT id FROM clients WHERE username='$receiver'");
$getID = mysqli_fetch_assoc($id);
$getID = $getID['id'];

if (strlen($body) > 100) {
    echo "{ 'Error': 'Message too long!' }";
}

if ($body == null) {
    $body = "";
}
if ($receiver == null) {
    die();
}
if ($userid == null) {
    die();
}

$query = mysqli_query($conn, "INSERT INTO messages(body, sender, receiver, isread) VALUES('$body', '$sender', '$getID', 0)") or die(mysqli_errno($conn));
echo '{ "Success": "Message Sent!" }';
