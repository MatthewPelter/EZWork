<?php
session_start();

//require_once("../classes/DB.php");

function securityscan($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['postID']) && isset($_SESSION['user_id'])) {
    $jobid = securityscan($_POST['postID']);
    $jobCheck = mysqli_query($conn, "SELECT user_id FROM jobs WHERE id='$jobid");
    $userid = mysqli_fetch_assoc($jobCheck);
    $user_id = $userid['user_id'];

    if (mysqli_num_rows($jobCheck) > 0) {
        if ($_SESSION['user_id'] == $user_id) {
            mysqli_query($conn, "DELETE FROM jobs WHERE id='$jobid") or die(mysqli_errno($conn));
            echo "Job deleted Successfully!";
        } else {
            echo "This is not your post...";
        }
    } else {
        echo "Job doesn't Exist";
    }
} else {
    echo "Error: Somthing went wrong :(";
}
