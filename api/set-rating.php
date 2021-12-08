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

$user_id = $_SESSION['user_id'];

$input = file_get_contents("php://input");
$input = json_decode($input);

$job_id = $input->job_id;
$ratee = $input->ratee;
$rate = $input->rate;

$job_id = securityscan($job_id);
$ratee = securityscan($ratee);
$rate = securityscan($rate);


if ($job_id == null || $job_id == "") {
    die('{ "Error": "Job ID is null or empty" }');
}
if ($ratee == null || $ratee == "") {
    die('{ "Error": "Ratee is null or empty" }');
}
if ($rate == null || $rate == "") {
    die('{ "Error": "Rate is null or empty" }');
}

$setRating = mysqli_query($conn, "INSERT INTO ratings(rater, ratee, rating, job_id) VALUES('$user_id', '$ratee', '$rate', '$job_id')") or die(mysqli_error($conn));
if ($setRating) {
    echo '{ "Success": "Rating Set!" }';
} else {
    die('{ "Error": "Could not set" }');
}
