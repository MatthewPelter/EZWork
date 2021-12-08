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

    $postID = securityscan($_POST['postID']);
    $pullUser = mysqli_query($conn, "SELECT user_id, freelancer_id, typeOfJob FROM jobs WHERE id='$postID'");
    $pullUser = mysqli_fetch_assoc($pullUser);
    $pullUserID = $pullUser['user_id'];

    $user_id = $_SESSION['user_id'];


    if ($pullUserID != $user_id && $pullUser['typeOfJob'] == "require") {
        die("Error: This is not your job");
    }

    $pullFreelancer = $pullUser['freelancer_id'];
    $pullFreelancerUserID = mysqli_query($conn, "SELECT id FROM clients WHERE freelancer_id='$pullFreelancer'") or die(mysqli_error($conn));
    $pullFreelancerUserID = mysqli_fetch_assoc($pullFreelancerUserID);
    $pullFreelancerUserID = $pullFreelancerUserID['id'];

    $pullBalance = mysqli_query($conn, "SELECT funds FROM clients WHERE id='$user_id'");
    $pullBalance = mysqli_fetch_assoc($pullBalance);
    $pullBalance = $pullBalance['funds'];

    $pullBudget = mysqli_query($conn, "SELECT budget FROM jobs WHERE id='$postID'");
    $pullBudget = mysqli_fetch_assoc($pullBudget);
    $pullBudget = $pullBudget['budget'];

    if ($pullBalance < $pullBudget) {
        die("insufficient");
    } else {
        $setFunds = mysqli_query($conn, "UPDATE clients SET funds = funds - '$pullBudget' WHERE id='$user_id'") or die(mysqli_errno($conn));
        if ($setFunds) {
            date_default_timezone_set("America/New_York");
            $date = date('Y-m-d H:i:s');
            if ($pullUser['typeOfJob'] == "require") {
                $setPaid = mysqli_query($conn, "UPDATE jobs SET paid=1 WHERE id='$postID'") or die(mysqli_errno($conn));
                $sendNotification = mysqli_query($conn, "INSERT INTO notifications (type, receiver, sender, isRead, sentAt) VALUES ('p', '$pullFreelancerUserID', '$user_id', 0, '$date')") or die(mysqli_errno($conn));
            } else {
                $setOfferJob = mysqli_query($conn, "INSERT INTO offerjobs(job_id, freelancer_id, client_id, status, freelancer_complete) VALUES ('$postID', '$pullUserID', '$user_id', 0, 0)");
                $sendNotification = mysqli_query($conn, "INSERT INTO notifications (type, receiver, sender, isRead, sentAt) VALUES ('p', '$pullUserID', '$user_id', 0, '$date')") or die(mysqli_errno($conn));
            }
        } else {
            die("Payment Failure, Try Again");
        }
    }
} else {
    die("Fatal Error");
}
