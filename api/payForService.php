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
    $pullUser = mysqli_query($conn, "SELECT user_id FROM jobs WHERE id='$postID'");
    $pullUser = mysqli_fetch_assoc($pullUser);
    $pullUser = $pullUser['user_id'];

    $user_id = $_SESSION['user_id'];

    if ($pullUser != $user_id) {
        die("Error: This is not your job");
    }

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
            $setPaid = mysqli_query($conn, "UPDATE jobs SET paid=1 WHERE id='$postID'") or die(mysqli_errno($conn));
        } else {
            die("Payment Failure, Try Again");
        }
    }
} else {
    die("Fatal Error");
}
