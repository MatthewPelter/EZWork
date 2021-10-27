<?php
session_start();

function securityscan($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Converting the username to a userid from the user that is logged in
$username = $_SESSION['userid'];
$getUserID = "SELECT id FROM clients WHERE username = '$username'";
$getResult = mysqli_query($conn, $getUserID);
$row = mysqli_fetch_assoc($getResult);
$userID = $row['id'];

if (isset($_POST['submit'])) {
    require_once("../classes/DB.php");

    $length = securityscan($_POST['length']);

    $title = securityscan($_POST['title']);

    $skills = securityscan($_POST['skills']);
    $size = securityscan($_POST['size']);
    $location = securityscan($_POST['location']);
    $budget = securityscan($_POST['budget']);
    $rate = securityscan($_POST['rate']);
    $description = securityscan($_POST['description']);


    $user_id = $userID;

    $image = securityscan($_POST['image']);
    
    $freelancer_id = "NONE";
     
    $status = 0;


    $sql = "INSERT INTO job(length,title,skills,size,location,budget, rate, description, image) VALUES('$length', '$title', '$skills', '$size', '$location', '$budget', '$rate', '$description', '$image')";

    $result = mysqli_query($conn, $sql) or die(mysqli_errno($conn));

    if ($result) {
        $_SESSION['userid'] = $username;
        header("Location: ../ClientProfile/index");
    } else {
        echo "not working";
    }
}