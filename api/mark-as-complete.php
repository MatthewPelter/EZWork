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


if (isset($_SESSION['user_id']) && isset($_POST['postID'])) {
    if (empty($_POST['postID'])) {
        die("Error: Missing Data");
    }

    $user_id = $_SESSION['user_id'];
    $postID = securityscan($_POST['postID']);


    $pullUser = mysqli_query($conn, "SELECT user_id, freelancer_id FROM jobs WHERE id='$postID'") or die(mysqli_error($conn));
    $pullUser = mysqli_fetch_assoc($pullUser);
    $pullUserID = $pullUser['user_id'];

    $pullFreelancer = $pullUser['freelancer_id'];
    $pullFreelancerUserID = mysqli_query($conn, "SELECT id FROM clients WHERE freelancer_id='$pullFreelancer'") or die(mysqli_error($conn));
    $pullFreelancerUserID = mysqli_fetch_assoc($pullFreelancerUserID);
    $pullFreelancerUserID = $pullFreelancerUserID['id'];
    date_default_timezone_set("America/New_York");
    $date = date('Y-m-d H:i:s');
    if ($pullUserID == $user_id) {
        $pullBudget = mysqli_query($conn, "SELECT budget FROM jobs WHERE id='$postID'") or die(mysqli_error($conn));
        $pullBudget = mysqli_fetch_assoc($pullBudget);
        $pullBudget = $pullBudget['budget'];
        $setFunds = mysqli_query($conn, "UPDATE clients SET funds = funds + '$pullBudget' WHERE id='$pullFreelancerUserID'") or die(mysqli_error($conn));
        $setPaid = mysqli_query($conn, "UPDATE jobs SET status=1 WHERE id='$postID'") or die(mysqli_error($conn));

        $sendNotification = mysqli_query($conn, "INSERT INTO notifications (type, receiver, sender, isRead, sentAt) VALUES ('pr', '$pullFreelancerUserID', '$user_id', 0, '$date')") or die(mysqli_errno($conn));
    } else if ($pullFreelancerUserID == $user_id) {
        $setFreelancerComplete = mysqli_query($conn, "UPDATE jobs SET freelancer_complete=1 WHERE id='$postID'") or die(mysqli_error($conn));
        $sendNotification = mysqli_query($conn, "INSERT INTO notifications (type, receiver, sender, isRead, sentAt) VALUES ('fc', '$pullUserID', '$user_id', 0, '$date')") or die(mysqli_errno($conn));
    } else {
        die("Error: This is not your job");
    }
} else {
    die("Fatal Error");
}
