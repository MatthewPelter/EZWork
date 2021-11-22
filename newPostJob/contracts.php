<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");

$username = $_SESSION['userid'];
$user_id = $_SESSION['user_id'];

$checkFreelancer = mysqli_query($conn, "SELECT freelancer_id FROM clients WHERE id = '$user_id'");
$checkFreelancer = mysqli_fetch_assoc($checkFreelancer);
$checkFreelancer = $checkFreelancer['freelancer_id'];

if ($checkFreelancer == NULL) {
    die("You are not a freelancer buddy");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="A platform for skilled workers or talented people to freelance, find projects to work on, extra ways to earn income.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/e9089fea9d.js" crossorigin="anonymous"></script>
        <title>EZWork | Contracts</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
        <link rel="icon" href="../logo/logo.svg">
        <link rel="stylesheet" href="../Styles/style.css">
    </head>
</head>

<body>
    <!-- NAV BAR -->
    <?php include '../navbar.php'; ?>
    <!-- END NAVBAR -->



    <?php
    $fetchContracts = mysqli_query($conn, "SELECT * FROM jobs WHERE freelancer_id='$checkFreelancer'");

    if (mysqli_num_rows($fetchContracts) > 0) {
        while ($row = mysqli_fetch_assoc($fetchContracts)) {
            echo "Title" . $row['title'];
            if ($row['status'] == 0) {
                echo "Status: Open";
            } else if ($row['status'] == 1) {
                echo "Status: Closed";
            } else {
                echo "Status: In-Progress";
            }

            echo "Date Posted: " . $row['datePosted'];

            $jobid = $row['id'];
            print("<a href='./jobs?id=$jobid'>View Job</a>");
        }
    } else { ?>
        <h1>No current contracts</h1>

    <?php
    }
    ?>







    <!-- Footer -->
    <?php include '../footer.php'; ?>
    <!-- END Footer -->
</body>

</html>