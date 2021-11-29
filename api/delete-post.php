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
    die("Error: Invalid Authorization");
}

if (isset($_POST['postID'])) {
    $jobid = securityscan($_POST['postID']);
    $jobCheck = mysqli_query($conn, "SELECT user_id FROM jobs WHERE id='$jobid'");
    $userid = mysqli_fetch_assoc($jobCheck);
    $user_id = $userid['user_id'];

    if (mysqli_num_rows($jobCheck) > 0) {
        if ($_SESSION['user_id'] == $user_id) {

            mysqli_query($conn, "DELETE FROM jobs WHERE id='$jobid'") or die(mysqli_errno($conn));
            mysqli_query($conn, "DELETE FROM messages WHERE jobID='$jobid'") or die(mysqli_errno($conn));
            echo "Post has been deleted!";
        } else {
            die("This is not your post...");
        }
    } else {
        die("Job does not exist!");
    }
} else {
    die("Error: Something went wrong!");
}
