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


    <div class="myJobs">
        <div class="myJobs-header">
            <ul>
                <li><a href="../ClientProfile/index.php">Freelancer</a></li>
                <li>/</li>
                <li>Contracts</li>
            </ul>
            <button onclick="location.href='../newPostJob/length.php'">Post a New Job</button>
        </div>
        <div class="myJobs-container">
            <div class="myJobs-container-header">
                <div class="searchBar">
                    <h3>My Contracts</h3>
                </div>
            </div>

            <div class="postedJob">

                <?php
                $fetchContracts = mysqli_query($conn, "SELECT *, clients.username AS uname FROM jobs JOIN clients ON jobs.user_id = clients.id WHERE freelancer_id='$checkFreelancer'");

                if (mysqli_num_rows($fetchContracts) > 0) {
                    while ($row = mysqli_fetch_assoc($fetchContracts)) { ?>
                        <div class="allJobsCard" style="overflow-y: scroll;">
                            <div class="postedJob" data-postid="<?php echo $row['id']; ?>">
                                <div class="jobTitle">
                                    <h4 id="jobTitle"><a href="../newPostJob/job.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>

                                </div>
                                <p>Status: <span id="status"><?php if ($row['status'] == 0) {
                                                                    echo "Status: Open";
                                                                } else if ($row['status'] == 1) {
                                                                    echo "Status: Closed";
                                                                } else {
                                                                    echo "Status: In-Progress";
                                                                } ?></span></p>
                                <p>Job Posted on <span id="date"><?php echo $row['datePosted']; ?></span> by <span id="postedBy"><?php echo $row['uname']; ?></span></p>
                            </div>
                        </div>




                    <?php
                    }
                } else { ?>
                    <h1>No current contracts</h1>

                <?php
                }
                ?>
            </div>


            <div class="spacer">
                <h3>SPACER</h3>
            </div>
        </div>
    </div>










    <!-- Footer -->
    <?php include '../footer.php'; ?>
    <!-- END Footer -->
</body>

</html>