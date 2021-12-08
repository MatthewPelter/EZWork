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

    $offerJob = mysqli_query($conn, "SELECT * FROM offerjobs WHERE id='$postID'");
    if (mysqli_num_rows($offerJob) > 0) {
        $r = mysqli_fetch_assoc($offerJob);
        if ($r['client_id'] != $user_id && $r['freelancer_id'] != $user_id) {
            die("Invalid Authorization");
        }

        $client = $r['client_id'];
        $freelancer = $r['freelancer_id'];

        date_default_timezone_set("America/New_York");
        $date = date('Y-m-d H:i:s');

        if ($r['freelancer_id'] == $user_id) {
            $setFreelancerComplete = mysqli_query($conn, "UPDATE offerjobs SET freelancer_complete=1 WHERE id='$postID'") or die(mysqli_error($conn));
            $sendNotification = mysqli_query($conn, "INSERT INTO notifications (type, receiver, sender, isRead, sentAt) VALUES ('fc', '$client', '$user_id', 0, '$date')") or die(mysqli_errno($conn));
        } else if ($r['client_id'] == $user_id) {
            $job_id = $r['job_id'];
            $pullBudget = mysqli_query($conn, "SELECT budget FROM jobs WHERE id='$job_id'") or die(mysqli_error($conn));
            $pullBudget = mysqli_fetch_assoc($pullBudget);
            $pullBudget = $pullBudget['budget'];
            $setFunds = mysqli_query($conn, "UPDATE clients SET funds = funds + '$pullBudget' WHERE id='$freelancer'") or die(mysqli_error($conn));
            $setPaid = mysqli_query($conn, "UPDATE offerjobs SET status=1 WHERE id='$postID'") or die(mysqli_error($conn));

            $sendNotification = mysqli_query($conn, "INSERT INTO notifications (type, receiver, sender, isRead, sentAt) VALUES ('pr', '$freelancer', '$user_id', 0, '$date')") or die(mysqli_errno($conn));
        }
    } else {
        die("Job does not exist");
    }
} else {
    die("Fatal Error");
}
