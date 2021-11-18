<?php
session_start();

function securityscan($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (!isset($_SESSION['userid']) && !isset($_SESSION['user_id'])) {
    die("Error");
}

$username = $_SESSION['userid'];
$userID = $_SESSION['user_id'];


if (isset($_POST['submit'])) {
    require_once("../classes/DB.php");


    $job_id = $_GET['id'];
    $job_id = mysqli_real_escape_string($conn, $job_id);
    $job_id = htmlspecialchars($job_id);

    $jobSQL = "SELECT user_id FROM jobs WHERE jobs.id='$job_id' LIMIT 1";
    $jobResult = mysqli_query($conn, $jobSQL);

    if (mysqli_num_rows($jobResult) > 0) {
        $r = mysqli_fetch_assoc($jobResult);
        $uid = $r['user_id'];
        if ($user_id != $uid) {
            die("You cannot edit someone else's post...");
        }
    } else {
        header("location: ./jobs.php");
    }

    $length = securityscan($_POST['length']);
    $title = securityscan($_POST['title']);
    $size = securityscan($_POST['size']);
    $budget = securityscan($_POST['budget']);
    $rate = securityscan($_POST['rate']);
    $description = securityscan($_POST['description']);

    $editPost = mysqli_query($conn, "UPDATE jobs SET length = '$length', title = '$title', size = '$size', budget = '$budget', rate = '$rate', description = '$description' WHERE id='$job_id'") or die(mysqli_errno($conn));
    if ($editPost) {
        header("location: ./job?id=" . $job_id);
    } else {
        die("We had an error editing your post...");
    }
}
