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

if (isset($_POST['jobID']) && isset($_SESSION['user_id'])) {
    $jobid = securityscan($_POST['jobID']);
    $jobCheck = mysqli_query($conn, "SELECT user_id FROM jobs WHERE id='$jobid");
    $userid = mysqli_fetch_assoc($jobCheck);
    $userid = $userid['user_id'];
    if ($_SESSION['user_id'] == $userid) {
        mysqli_query($conn, "DELETE FROM jobs WHERE id='$jobid") or die(mysqli_errno($conn));
        echo "Job deleted Successfully!";
    } else {
        echo "This is not your post...";
    }
}
