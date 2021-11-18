<?php
session_start();
echo "hello";
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
$user_id = $_SESSION['user_id'];


if (isset($_POST['submit'])) {
    require_once("../classes/DB.php");
    // wow -_-
    $linkedin = securityscan($_POST['linkedin']);

    $expertise = securityscan($_POST['expertise']);
    $experience = securityscan($_POST['experience']);

    $school = securityscan($_POST['school']);
    $degree = securityscan($_POST['degree']);
    $fos = securityscan($_POST['fos']);
    $schoolStart = securityscan($_POST['schoolStart']);
    $schoolEnd = securityscan($_POST['schoolEnd']);

    $jobTitle = securityscan($_POST['jobTitle']);
    $company = securityscan($_POST['company']);
    $jobLocation = securityscan($_POST['jobLocation']);
    $jobStart = securityscan($_POST['jobStart']);
    $jobEnd = securityscan($_POST['jobEnd']);

    $hourRate = securityscan($_POST['hourRate']);
    $description = securityscan($_POST['description']);

    $country = securityscan($_POST['country']);
    $street = securityscan($_POST['street']);
    $apt = securityscan($_POST['apt']);
    $city = securityscan($_POST['city']);
    $state = securityscan($_POST['state']);
    $zip = securityscan($_POST['zip']);

    $createFreelancer = mysqli_query(
        $conn,
        "INSERT INTO freelancers(linkedin, user_id, expertise, experience, school, degree, fos, schoolStart, schoolEnd, jobTitle, company, jobLocation, jobStart, jobEnd, hourRate, description, country, street, apt, city, state, zip) 
    VALUES ($linkedin, $user_id, $expertise, $experience, $school, $degree, $fos, $schoolStart, $schoolEnd, $jobTitle, $company, $jobLocation, $jobStart, $jobEnd, $hourRate, $description, $country, $street, $apt, $city, $state, $zip)"
    ) or die(mysqli_errno($conn));
    if ($createFreelancer) {
        $sql = "SELECT id FROM freelancers WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $fetchFreelancerID = mysqli_fetch_assoc($result);
        $fetchFreelancerID = $fetchFreelancerID['id'];

        mysqli_query($conn, "UPDATE clients SET freelancer_id = '$fetchFreelancerID' WHERE id = '$user_id'") or die(mysqli_errno($conn));

        echo "You are now a freelancer!";
    } else {
        echo "could not insert into database";
    }
} else {
    echo "submit not set";
}
