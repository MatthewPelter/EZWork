<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");


$username = $_SESSION['userid'];
$getUserID = "SELECT id FROM clients WHERE username = '$username'";
$getResult = mysqli_query($conn, $getUserID);
$userrow = mysqli_fetch_assoc($getResult);
$userID = $userrow['id'];
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
        <title>EZWork | Find Jobs or Freelancers</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
        <link rel="icon" href="../logo/logo.svg">
        <link rel="stylesheet" href="../Styles/style.css">

        <style type="text/css">
            .alert {
                padding: 20px;
                background-color: #f44336;
                color: white;
                opacity: 1;
                transition: opacity 0.6s;
                margin-bottom: 15px;
                position: fixed;
                top: 5rem;
                right: 2rem;
            }

            .alert.success {
                background-color: #04AA6D;
            }

            .alert.info {
                background-color: #2196F3;
            }

            .alert.warning {
                background-color: #ff9800;
            }

            .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }

            .closebtn:hover {
                color: black;
            }
        </style>
    </head>
</head>

<body>
    <!-- NAV BAR -->
    <?php include '../navbar.php'; ?>
    <!-- END NAVBAR -->

    <div class="profile">
        <div class="user-profile-header">
            <h2 id="username"><?php echo $_SESSION['userid']; ?></h2>
            <div class="quick-links">
                <button id="quick-link-job" onclick="location.href='../PostAJob/newPostJob/length.php'">Post A Job</button>
                <button id="quick-link-market">Browse Marketplace</button>
            </div>
        </div>
        <div class="user-profile-body">
            <div class="user-postings">
                <div class="card title">
                    <h3>My Postings</h3>
                    <span><a href="../PostAJob/newPostJob/jobs">All Jobs</a></span>
                </div>
                <div class="card result">
                    <button id="quick-link-job2" onclick="location.href='../PostAJob/newPostJob/length.php'">Post A Job</button>
                    <span>
                        <?php
                        $jobSQL = "SELECT * FROM jobs WHERE user_id='$userID' ORDER BY id DESC";
                        $jobResult = mysqli_query($conn, $jobSQL) or die(mysqli_errno($conn));
                        if (mysqli_num_rows($jobResult) == 0) {
                            echo "You currently have no job postings listed.";
                        }
                        ?>
                    </span>
                </div>

                <?php
                if (mysqli_num_rows($jobResult) > 0) {
                    while ($r = mysqli_fetch_assoc($jobResult)) {
                ?>
                        <div class="postedJob">
                            <div class="jobTitle">
                                <h4 id="jobTitle"><a href="../PostAJob/newPostJob/job.php?id=<?php echo $r['id']; ?>"><?php echo $r['title']; ?></a></h4>
                                <i class="fa fa-ellipsis-v" id="jobGodMode" aria-hidden="true"></i>
                                <div class="jobEdit">
                                    <div class="exit">
                                        <i class="fa fa-times" id="exitJobEdit"></i>
                                    </div>
                                    <button onclick="location.href='../PostAJob/reviewJobPost.php'">Edit</button>
                                    <button style="color: red;" id="deleteJob">Delete</button>
                                </div>
                            </div>
                            <p>Status: <span id="status"><?php if ($r['status'] == 0) {
                                                                echo "Open";
                                                            } else {
                                                                echo "Open";
                                                            } ?></span></p>
                            <p>Job Posted on <span id="date"><?php echo $r['datePosted']; ?></span> by <span id="postedBy">Me</span></p>
                        </div>

                <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../footer.php'; ?>
    <!-- END Footer -->
    <?php
    if (isset($_GET['messagestatus'])) {
        if ($_GET['messagestatus'] == 1) {
    ?>
            <div class="alert success">
                <span class="closebtn">&times;</span>
                <strong>Success!</strong> Your message was sent sucessfully!.
            </div>

    <?php
        }
    }
    ?>


    <!--DataList-->
    <datalist id="allskills">

    </datalist>
</body>

</html>