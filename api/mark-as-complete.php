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


    $pullUser = mysqli_query($conn, "SELECT 'user_id', 'freelancer_id' FROM jobs WHERE id='$postID'") or die(mysqli_error($conn));
    $pullUser = mysqli_fetch_assoc($pullUser);
    $pullUser = $pullUser['user_id'];

    $pullFreelancer = $pullUser['freelancer_id'];
    $pullFreelancerUserID = mysqli_query($conn, "SELECT id FROM clients WHERE freelancer_id='$pullFreelancer'") or die(mysqli_error($conn));
    $pullFreelancerUserID = mysqli_fetch_assoc($pullFreelancerUserID);
    $pullFreelancerUserID = $pullFreelancerUserID['id'];
} else {
    die("Fatal Error");
}
