<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");


$username = $_SESSION['userid'];
//$getUserID = "SELECT id FROM clients WHERE username = '$username'";
// $getResult = mysqli_query($conn, $getUserID);
// $userrow = mysqli_fetch_assoc($getResult);
$userID = $_SESSION['user_id'];
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
            <title>EZWork | My Postings</title>
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
                <li><a href="../ClientProfile/index.php">My Profile</a></li>
                <li>/</li>
                <li>Job Postings</li>
            </ul>
            <button onclick="location.href='../newPostJob/length.php'">Post a New Job</button>
        </div>
        <div class="myJobs-container">
            <div class="myJobs-container-header">
                <div class="searchBar">
                    <h3>All My Job Postings</h3>
                </div>

            </div>

            <div class="postedJob">
                <span>
                    <?php
                    $jobSQL = "SELECT * FROM jobs WHERE user_id='$userID' ORDER BY id DESC";
                    $jobResult = mysqli_query($conn, $jobSQL) or die(mysqli_errno($conn));
                    if (mysqli_num_rows($jobResult) == 0) {
                        echo "You currently have no job postings listed.";
                    }
                    ?>
                </span>
                <?php
                if (mysqli_num_rows($jobResult) > 0) {
                    while ($r = mysqli_fetch_assoc($jobResult)) {
                ?>
                        <div class="allJobsCard" style="overflow-y: scroll;">

                            <div class="postedJob" data-postid="<?php echo $r['id']; ?>">
                                <div class="jobTitle">
                                    <h4 id="jobTitle"><a href="../newPostJob/job.php?id=<?php echo $r['id']; ?>"><?php echo $r['title']; ?></a></h4>

                                </div>
                                <p>Status:
                                    <?php if ($r['status'] == 0) { ?>
                                        <span style="color: lightgreen;"><?php echo "Open"; ?></span>
                                    <?php } else if($r['status'] == 1) { ?>
                                        <span style="color: red;"><?php echo "Closed"; ?></span>                         
                                    <?php }else{ ?>
                                        <span style="color: yellow;"><?php echo "In-Progress"; ?></span>                                              
                                    <?php } ?>
                                </p>
                                <p>Job Posted on <span id="date"><?php echo $r['datePosted']; ?></span> by <span id="postedBy">Me</span></p>
                            </div>
                        </div>

                <?php
                    }
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

        <!--DataList-->
        <datalist id="allskills">
        
        </datalist>
</body>
<!--Script for the search bar and datalist-->
<script src="../SkillsContainer/searchProfile.js"></script>
</html>