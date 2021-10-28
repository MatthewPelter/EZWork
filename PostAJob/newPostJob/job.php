<?php
session_start(); // Session starts here.
require_once('../../classes/DB.php');

if (!isset($_SESSION['userid'])) {
    header('Location: ../../login/index');
    echo "NOT LOGGED IN";
} else {
    $username = $_SESSION['userid'];
    $sql = "SELECT * FROM clients WHERE username = '$username' limit 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header('Location: ../../login/index');
    }
}

$job_id = $_GET['id'];
$job_id = mysqli_real_escape_string($conn, $job_id);
$job_id = htmlspecialchars($job_id);

$jobSQL = "SELECT * FROM jobs WHERE id='$job_id' LIMIT 1";
$jobResult = mysqli_query($conn, $jobSQL);
$dataFound = false;

if (mysqli_num_rows($jobResult) > 0) {
    $dataFound = true;
    $r = mysqli_fetch_assoc($jobResult);

    $uid = $r['user_id'];
    $unameSQL = "SELECT username FROM clients WHERE id='$uid'";
    $unameResult = mysqli_query($conn, $unameSQL);
    $unameFetched = mysqli_fetch_assoc($unameResult);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Styles/style.css" />

    <title>Document</title>
</head>

<body>

    <?php
    include '../../navbar.php';
    ?>
    <?php if ($dataFound) { ?>
        <div class="user-postings">
            <div class="card title">
                <h3><?php echo $r['title']; ?></h3>
                <span><a href="jobs">All Postings</a></span>
            </div>
            <div class="card result">
                <h1>Posted By: <?php echo $unameFetched['username']; ?></h1>
                <h1>Description: <?php echo $r['description']; ?></h1>
                <h1>Job Type: <?php if ($r['length'] == 'l') {
                                    echo "Designated, longer term work";
                                } else {
                                    echo "Short term or part time work";
                                } ?></h1>
                <h1>Scope of Job: </h1>
                <h1>Size: <?php echo ucfirst($r['size']); ?></h1>
                <h1>Freelance Location: <?php if ($r['location'] == 'us') {
                                            echo "United States ONLY";
                                        } else {
                                            echo "Worldwide";
                                        } ?></h1>
                <h1><?php if ($r['budget'] > 0) {
                        echo "Project Budget: " . $r['budget'];
                    } else if ($r['rate'] > 0) {
                        echo "Hourly Rate: " . $r['rate'];
                    } else {
                        echo "No budget or pay rate set yet...";
                    } ?></h1>
                <h1>Status: <?php if ($r['status'] == 0) {
                                echo "Open";
                            } else {
                                echo "Open";
                            } ?></h1>
                <h1>Posted on <?php echo $r['datePosted']; ?></h1>
            </div>
        </div>
    <?php } else { ?>
        <div class="user-postings">
            <div class="card title">
                <h3>We could not locate that job</h3>
                <span><a href="jobs">All Postings</a></span>
            </div>
        </div>
    <?php
    } ?>

</body>
<script src="../../ClientProfile/app.js"></script>

</html>