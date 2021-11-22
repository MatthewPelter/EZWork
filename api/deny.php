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

//$sender = $_SESSION['user_id'];
$input = file_get_contents("php://input");
$input = json_decode($input);

$jobID = $input->jobID;
$my_id = $input->id;
$freelancer_id = $input->freelancer_id;

$jobID = securityscan($jobID);
$freelancer_id = securityscan($freelancer_id);

if ($my_id != $_SESSION['user_id']) {
    die('{ "Error": "Invalid Authorization" }');
}
if ($jobID == null || $jobID == "") {
    die('{ "Error": "Job ID is null or empty" }');
}
if ($freelancer_id == null || $freelancer_id == "") {
    die('{ "Error": "Freelancer ID is null or empty" }');
}
if ($my_id == null || $my_id == "") {
    die('{ "Error": "ID field is null or empty" }');
}

$check = mysqli_query($conn, "SELECT * FROM messages WHERE jobID = '$jobID' AND sender='$freelancer_id' AND receiver='$my_id'");
if (mysqli_num_rows($check) > 0) {
    $query = mysqli_query($conn, "UPDATE messages SET response = 1 WHERE jobID='$jobID' AND sender='$freelancer_id' AND receiver='$my_id'") or die(mysqli_error($conn));
    echo '{ "Success": "Denied!" }';
} else {
    die('{ "Error": "Invalid Data" }');
}