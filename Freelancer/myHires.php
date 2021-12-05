<?php
session_start();
include '../components/session-checker.php';
require_once("../classes/DB.php");

$username = $_SESSION['userid'];
$userID = $_SESSION['user_id'];

    $sql = "SELECT * FROM jobs WHERE user_id='$userID' AND freelancer_id <> ''";
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
            <title>EZWork | My Hires</title>
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

    <div class="myHired">

        <div class="myHiredHeader">
            <h2>My Hires</h2>
            <ul>
                <li><a href="../ClientProfile/index.php">My Profile</a></li>
                <li>/</li>
                <li>My Hires</li>
            </ul>
        </div>
        <?php
                if( mysqli_num_rows($jobResult) == 0){
        ?>
                <div class="noHired">
                    <span>Seems like you have not hired anyone for some reason.</span>
                    <img src="../Image/sad-cartoon.gif" alt="no-activity">
                </div>
               
        <?php
                }
        ?>        
        <div class="myHiredContainer">
        <?php

                if (mysqli_num_rows($jobResult) > 0) {
                    while ($r = mysqli_fetch_assoc($jobResult)) {
        ?>
                    <?php
                        $freeID = $r['freelancer_id'];
                        $getFreelancersSQL = "SELECT * from clients WHERE freelancer_id='$freeID'";
                        $freelancers = mysqli_query($conn, $getFreelancersSQL) or die(mysqli_errno($conn));
                    
                        if (mysqli_num_rows($freelancers) > 0) {
                            while ($f = mysqli_fetch_assoc($freelancers)) {
                    ?>
                    <a href="../Profile/userprofile.php?name=<?php echo $f['username']; ?>">
                        <div class="freelancerCard">
                            <div class="freelancerImg">
                                <img src="<?php echo $f['avatar']; ?>" alt=`<?php echo $f['username']; ?>`>
                            </div>
                            <div class="freelancerInfo">
                                <h2><?php echo $f['username']; ?></h2>
                                
                                <!-- Couldn't get the data such as expertise for each freelacner
                                <h3>
                                    Software Developer                                
                                </h3>
                                <h4>$ 
                                    <span>
                                        10
                                    </span>
                                     per hour
                                </h4>
                                
                                <h5>
                                   
                                </h5>
                                -->
                                <?php
                                    $freeID = $f['freelancer_id'];
                                    $pullJobs = mysqli_query($conn, "SELECT COUNT(*) AS completedJobs FROM jobs WHERE freelancer_id = '$freeID' AND status=1");
                                    $pullJobCount = mysqli_fetch_assoc($pullJobs);                            
                                ?>
                                <p><?php echo $pullJobCount['completedJobs']; ?> jobs completed</p>
                            </div>
                        </div>
                    </a>
                    <?php
                            }
                        }
                    ?>
                                  
<?php
                    }
                }
?>              
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