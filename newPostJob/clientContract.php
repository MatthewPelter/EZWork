<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");

$username = $_SESSION['userid'];
$userID = $_SESSION['user_id'];

$sql = "SELECT * FROM jobs WHERE user_id='$userID'";
$jobResult = mysqli_query($conn, $sql) or die(mysqli_errno($conn));

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
                <li><a href="../ClientProfile/index.php">My Profile</a></li>
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
                if (mysqli_num_rows($jobResult) > 0) {
                    if($r['status'] == 1 || $r['status'] == -1){
                        while ($r = mysqli_fetch_assoc($jobResult)) { ?>
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
                                    <p>Job Posted on <span id="date"><?php echo $r['datePosted']; ?></span> by <span id="postedBy">                                            <?php if ($unameFetched['username'] != $_SESSION['userid']) {
                                        echo "<a href='../Profile/userprofile.php?name=" . $unameFetched['username'] . "'>" . $unameFetched['username'] . "</a>";
                                    } else {
                                        echo $unameFetched['username'];
                                    }  ?></span></p>
                                </div>
                            </div>
    
    
    
    
                        <?php
                        }
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