<?php
session_start(); // Session starts here.
require_once('../classes/DB.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/index');
    die("NOT LOGGED IN");
} else {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM clients WHERE id = '$user_id' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../login/index');
        die();
    }
    $myData = mysqli_fetch_assoc($result);
}

$job_id = $_GET['id'];
$job_id = mysqli_real_escape_string($conn, $job_id);
$job_id = htmlspecialchars($job_id);

$jobSQL = "SELECT * FROM offerjobs WHERE id='$job_id' LIMIT 1";
$jobResult = mysqli_query($conn, $jobSQL);

if (mysqli_num_rows($jobResult) > 0) {
    $r = mysqli_fetch_assoc($jobResult);

    if ($r['client_id'] != $user_id && $r['freelancer_id'] != $user_id) {
        die("Invalid Authorization");
    }
} else {
    header("location: ./jobs.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A platform for skilled workers or talented people to freelance, find projects to work on, extra ways to earn income.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e9089fea9d.js" crossorigin="anonymous"></script>
    <title>EZWork | <?php echo $r['title']; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="icon" href="../logo/logo.svg">
    <link rel="stylesheet" href="../Styles/style.css">

</head>

<body>
    <h1>Active Job</h1>
    <?php
    $client = $r['client_id'];
    $freelancer = $r['freelancer_id'];
    $clientName = mysqli_query($conn, "SELECT username FROM clients WHERE id='$client'");
    $clientName = mysqli_fetch_assoc($clientName);
    $clientName = $clientName['username'];

    $freelancerName = mysqli_query($conn, "SELECT username FROM clients WHERE id='$freelancer'");
    $freelancerName = mysqli_fetch_assoc($freelancerName);
    $freelancerName = $freelancerName['username'];
    ?>

    <h2>Client: <?php echo $clientName; ?></h2>
    <h2>Freelancer: <?php echo $freelancerName; ?></h2>
    <p>Status: <?php echo ($r['status'] == 0) ? "Open" : "Closed"; ?></p>


    <?php
    if ($r['freelancer_id'] == $user_id && $r['freelancer_complete'] == 0) { ?>
        <button class="completeFreelancer">
            <i class="fa fa-flag" aria-hidden="true"></i>
            Mark Job as Complete
        </button>
    <?php
    }
    ?>
    <?php if ($r['client_id'] == $user_id && $r['freelancer_complete'] == 1) { ?>
        <button class="completeFreelancer">
            <i class="fa fa-flag" aria-hidden="true"></i>
            Mark Job as Complete
        </button>
    <?php } ?>

</body>

</html>